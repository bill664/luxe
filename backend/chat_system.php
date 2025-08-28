<?php
session_start();

// Database configuration (you'll need to set this up)
$host = 'localhost';
$dbname = 'luxe_market';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // If database connection fails, create a simple file-based storage for demo
    $pdo = null;
}

// Chat system class
class ChatSystem {
    private $pdo;
    private $messages_file;
    
    public function __construct($pdo = null) {
        $this->pdo = $pdo;
        $this->messages_file = '../chat_messages.json';
    }
    
    // Send a message
    public function sendMessage($sender_id, $receiver_id, $message, $chat_type = 'user_to_user') {
        if ($this->pdo) {
            try {
                $stmt = $this->pdo->prepare("INSERT INTO chat_messages (sender_id, receiver_id, message, chat_type, created_at) VALUES (?, ?, ?, ?, NOW())");
                $stmt->execute([$sender_id, $receiver_id, $message, $chat_type]);
                return ['success' => true, 'message_id' => $this->pdo->lastInsertId()];
            } catch(PDOException $e) {
                return ['success' => false, 'error' => 'Failed to send message'];
            }
        } else {
            // File-based storage
            $messages = $this->loadMessages();
            $new_message = [
                'id' => count($messages) + 1,
                'sender_id' => $sender_id,
                'receiver_id' => $receiver_id,
                'message' => $message,
                'chat_type' => $chat_type,
                'created_at' => date('Y-m-d H:i:s'),
                'is_read' => 0
            ];
            
            $messages[] = $new_message;
            $this->saveMessages($messages);
            
            return ['success' => true, 'message_id' => $new_message['id']];
        }
    }
    
    // Get messages between two users
    public function getMessages($user1_id, $user2_id, $chat_type = 'user_to_user') {
        if ($this->pdo) {
            try {
                $stmt = $this->pdo->prepare("
                    SELECT * FROM chat_messages 
                    WHERE ((sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?))
                    AND chat_type = ?
                    ORDER BY created_at ASC
                ");
                $stmt->execute([$user1_id, $user2_id, $user2_id, $user1_id, $chat_type]);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch(PDOException $e) {
                return [];
            }
        } else {
            // File-based retrieval
            $messages = $this->loadMessages();
            $filtered_messages = [];
            
            foreach ($messages as $msg) {
                if ($msg['chat_type'] === $chat_type &&
                    (($msg['sender_id'] == $user1_id && $msg['receiver_id'] == $user2_id) ||
                     ($msg['sender_id'] == $user2_id && $msg['receiver_id'] == $user1_id))) {
                    $filtered_messages[] = $msg;
                }
            }
            
            // Sort by creation time
            usort($filtered_messages, function($a, $b) {
                return strtotime($a['created_at']) - strtotime($b['created_at']);
            });
            
            return $filtered_messages;
        }
    }
    
    // Get admin messages (for contact form)
    public function getAdminMessages($user_id) {
        if ($this->pdo) {
            try {
                $stmt = $this->pdo->prepare("
                    SELECT * FROM chat_messages 
                    WHERE (sender_id = ? OR receiver_id = ?)
                    AND chat_type = 'user_to_admin'
                    ORDER BY created_at ASC
                ");
                $stmt->execute([$user_id, $user_id]);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch(PDOException $e) {
                return [];
            }
        } else {
            // File-based retrieval
            $messages = $this->loadMessages();
            $filtered_messages = [];
            
            foreach ($messages as $msg) {
                if ($msg['chat_type'] === 'user_to_admin' &&
                    ($msg['sender_id'] == $user_id || $msg['receiver_id'] == $user_id)) {
                    $filtered_messages[] = $msg;
                }
            }
            
            // Sort by creation time
            usort($filtered_messages, function($a, $b) {
                return strtotime($a['created_at']) - strtotime($b['created_at']);
            });
            
            return $filtered_messages;
        }
    }
    
    // Get chat list for a user
    public function getChatList($user_id) {
        if ($this->pdo) {
            try {
                $stmt = $this->pdo->prepare("
                    SELECT DISTINCT 
                        CASE 
                            WHEN sender_id = ? THEN receiver_id
                            ELSE sender_id
                        END as other_user_id,
                        chat_type,
                        MAX(created_at) as last_message_time
                    FROM chat_messages 
                    WHERE sender_id = ? OR receiver_id = ?
                    GROUP BY other_user_id, chat_type
                    ORDER BY last_message_time DESC
                ");
                $stmt->execute([$user_id, $user_id, $user_id]);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch(PDOException $e) {
                return [];
            }
        } else {
            // File-based chat list
            $messages = $this->loadMessages();
            $chat_list = [];
            
            foreach ($messages as $msg) {
                if ($msg['sender_id'] == $user_id || $msg['receiver_id'] == $user_id) {
                    $other_user_id = $msg['sender_id'] == $user_id ? $msg['receiver_id'] : $msg['sender_id'];
                    $chat_key = $other_user_id . '_' . $msg['chat_type'];
                    
                    if (!isset($chat_list[$chat_key])) {
                        $chat_list[$chat_key] = [
                            'other_user_id' => $other_user_id,
                            'chat_type' => $msg['chat_type'],
                            'last_message_time' => $msg['created_at']
                        ];
                    } else {
                        if (strtotime($msg['created_at']) > strtotime($chat_list[$chat_key]['last_message_time'])) {
                            $chat_list[$chat_key]['last_message_time'] = $msg['created_at'];
                        }
                    }
                }
            }
            
            // Sort by last message time
            usort($chat_list, function($a, $b) {
                return strtotime($b['last_message_time']) - strtotime($a['last_message_time']);
            });
            
            return array_values($chat_list);
        }
    }
    
    // Mark messages as read
    public function markAsRead($sender_id, $receiver_id, $chat_type = 'user_to_user') {
        if ($this->pdo) {
            try {
                $stmt = $this->pdo->prepare("
                    UPDATE chat_messages 
                    SET is_read = 1 
                    WHERE sender_id = ? AND receiver_id = ? AND chat_type = ? AND is_read = 0
                ");
                $stmt->execute([$sender_id, $receiver_id, $chat_type]);
                return true;
            } catch(PDOException $e) {
                return false;
            }
        } else {
            // File-based mark as read
            $messages = $this->loadMessages();
            $updated = false;
            
            foreach ($messages as &$msg) {
                if ($msg['sender_id'] == $sender_id && 
                    $msg['receiver_id'] == $receiver_id && 
                    $msg['chat_type'] == $chat_type && 
                    $msg['is_read'] == 0) {
                    $msg['is_read'] = 1;
                    $updated = true;
                }
            }
            
            if ($updated) {
                $this->saveMessages($messages);
            }
            
            return $updated;
        }
    }
    
    // Load messages from file
    private function loadMessages() {
        if (file_exists($this->messages_file)) {
            $content = file_get_contents($this->messages_file);
            return json_decode($content, true) ?: [];
        }
        return [];
    }
    
    // Save messages to file
    private function saveMessages($messages) {
        file_put_contents($this->messages_file, json_encode($messages, JSON_PRETTY_PRINT));
    }
}

// Initialize chat system
$chat_system = new ChatSystem($pdo);

// Handle API requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['success' => false, 'error' => 'User not authenticated']);
        exit;
    }
    
    switch ($action) {
        case 'send_message':
            $receiver_id = $_POST['receiver_id'] ?? '';
            $message = trim($_POST['message'] ?? '');
            $chat_type = $_POST['chat_type'] ?? 'user_to_user';
            
            if (empty($message) || empty($receiver_id)) {
                echo json_encode(['success' => false, 'error' => 'Message and receiver are required']);
                exit;
            }
            
            $result = $chat_system->sendMessage($_SESSION['user_id'], $receiver_id, $message, $chat_type);
            echo json_encode($result);
            break;
            
        case 'get_messages':
            $other_user_id = $_POST['other_user_id'] ?? '';
            $chat_type = $_POST['chat_type'] ?? 'user_to_user';
            
            if (empty($other_user_id)) {
                echo json_encode(['success' => false, 'error' => 'Other user ID is required']);
                exit;
            }
            
            $messages = $chat_system->getMessages($_SESSION['user_id'], $other_user_id, $chat_type);
            
            // Mark messages as read
            $chat_system->markAsRead($other_user_id, $_SESSION['user_id'], $chat_type);
            
            echo json_encode(['success' => true, 'messages' => $messages]);
            break;
            
        case 'get_chat_list':
            $chat_list = $chat_system->getChatList($_SESSION['user_id']);
            echo json_encode(['success' => true, 'chat_list' => $chat_list]);
            break;
            
        default:
            echo json_encode(['success' => false, 'error' => 'Invalid action']);
            break;
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}
?>
