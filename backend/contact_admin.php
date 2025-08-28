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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = trim($_POST['message'] ?? '');
    
    if (empty($message)) {
        echo json_encode(['success' => false, 'error' => 'Message is required']);
        exit;
    }
    
    // Get user ID from session or create anonymous user
    $user_id = $_SESSION['user_id'] ?? 'anonymous_' . uniqid();
    $user_email = $_SESSION['user_email'] ?? 'anonymous@example.com';
    
    if ($pdo) {
        try {
            // Insert admin message
            $stmt = $pdo->prepare("INSERT INTO admin_messages (user_id, user_email, message, created_at) VALUES (?, ?, ?, NOW())");
            $stmt->execute([$user_id, $user_email, $message]);
            
            echo json_encode(['success' => true, 'message_id' => $pdo->lastInsertId()]);
        } catch(PDOException $e) {
            echo json_encode(['success' => false, 'error' => 'Failed to send message']);
        }
    } else {
        // File-based storage for demo purposes
        $messages_file = '../admin_messages.json';
        $messages = [];
        
        if (file_exists($messages_file)) {
            $messages = json_decode(file_get_contents($messages_file), true) ?: [];
        }
        
        $new_message = [
            'id' => count($messages) + 1,
            'user_id' => $user_id,
            'user_email' => $user_email,
            'message' => $message,
            'created_at' => date('Y-m-d H:i:s'),
            'is_admin_reply' => 0,
            'admin_reply' => null,
            'admin_reply_time' => null
        ];
        
        $messages[] = $new_message;
        file_put_contents($messages_file, json_encode($messages, JSON_PRETTY_PRINT));
        
        echo json_encode(['success' => true, 'message_id' => $new_message['id']]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}
?>
