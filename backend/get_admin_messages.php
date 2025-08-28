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

// Get user ID from session or create anonymous user
$user_id = $_SESSION['user_id'] ?? 'anonymous_' . uniqid();

if ($pdo) {
    try {
        // Get admin messages for this user
        $stmt = $pdo->prepare("
            SELECT * FROM admin_messages 
            WHERE user_id = ? 
            ORDER BY created_at ASC
        ");
        $stmt->execute([$user_id]);
        $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode(['success' => true, 'messages' => $messages]);
    } catch(PDOException $e) {
        echo json_encode(['success' => false, 'error' => 'Failed to retrieve messages']);
    }
} else {
    // File-based retrieval for demo purposes
    $messages_file = '../admin_messages.json';
    
    if (file_exists($messages_file)) {
        $all_messages = json_decode(file_get_contents($messages_file), true) ?: [];
        
        // Filter messages for this user
        $user_messages = [];
        foreach ($all_messages as $msg) {
            if ($msg['user_id'] === $user_id) {
                $user_messages[] = $msg;
            }
        }
        
        echo json_encode(['success' => true, 'messages' => $user_messages]);
    } else {
        echo json_encode(['success' => true, 'messages' => []]);
    }
}
?>
