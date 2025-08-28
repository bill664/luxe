<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Admin - LuxeMarket</title>
    <link rel="stylesheet" href="luxe-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .contact-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .chat-container {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 1rem;
        }
        
        .chat-header {
            background: var(--accent-color);
            color: white;
            padding: 1rem;
            text-align: center;
            font-weight: 600;
        }
        
        .chat-messages {
            height: 400px;
            overflow-y: auto;
            padding: 1rem;
            background: #f8fafc;
        }
        
        .message {
            margin-bottom: 1rem;
            padding: 0.75rem;
            border-radius: 8px;
            max-width: 80%;
        }
        
        .message.user {
            background: var(--accent-color);
            color: white;
            margin-left: auto;
            text-align: right;
        }
        
        .message.admin {
            background: #e2e8f0;
            color: #1a202c;
            margin-right: auto;
        }
        
        .message-time {
            font-size: 0.75rem;
            opacity: 0.7;
            margin-top: 0.25rem;
        }
        
        .chat-input-container {
            display: flex;
            gap: 0.5rem;
            padding: 1rem;
            background: white;
            border-top: 1px solid #e2e8f0;
        }
        
        .chat-input {
            flex: 1;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 1rem;
        }
        
        .chat-send-btn {
            padding: 0.75rem 1.5rem;
            background: var(--accent-color);
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.2s;
        }
        
        .chat-send-btn:hover {
            background: var(--accent-color-dark);
        }
        
        .chat-send-btn:disabled {
            background: #9ca3af;
            cursor: not-allowed;
        }
        
        .loading {
            text-align: center;
            color: #6b7280;
            padding: 2rem;
        }
        
        .error {
            background: #fee;
            color: #c33;
            padding: 1rem;
            border-radius: 6px;
            margin-bottom: 1rem;
            border: 1px solid #fcc;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header>
        <a href="index.php" class="logo">
            <i class="fas fa-crown logo-icon"></i>
            Luxe<span>Market</span>
        </a>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="browse.php">Browse</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
        <div class="auth-buttons">
            <?php if (isset($_SESSION['user_id'])): ?>
                <span>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
                <a href="logout.php" class="btn btn-secondary">Logout</a>
            <?php else: ?>
                <a href="login.php" class="btn btn-secondary">Login</a>
                <a href="signup.php" class="btn btn-primary">Sign Up</a>
            <?php endif; ?>
        </div>
    </header>

    <div class="contact-container">
        <h1 style="text-align: center; margin-bottom: 2rem; font-family: var(--font-primary);">Contact Admin</h1>
        
        <div class="chat-container">
            <div class="chat-header">
                <i class="fas fa-headset"></i> Live Chat Support
            </div>
            
            <div id="chat-messages" class="chat-messages">
                <div class="loading">Loading messages...</div>
            </div>
            
            <div class="chat-input-container">
                <input type="text" id="message-input" class="chat-input" placeholder="Type your message..." maxlength="500">
                <button id="send-button" class="chat-send-btn">
                    <i class="fas fa-paper-plane"></i> Send
                </button>
            </div>
        </div>
        
        <div style="text-align: center; margin-top: 2rem; color: #6b7280;">
            <p><i class="fas fa-info-circle"></i> Our support team typically responds within 24 hours.</p>
            <p>For urgent matters, please call our support line: <strong>1-800-LUXE-MKT</strong></p>
        </div>
    </div>

    <script>
        class ChatManager {
            constructor() {
                this.messagesContainer = document.getElementById('chat-messages');
                this.messageInput = document.getElementById('message-input');
                this.sendButton = document.getElementById('send-button');
                this.userId = '<?php echo $_SESSION['user_id'] ?? 'anonymous_' . uniqid(); ?>';
                this.isLoading = false;
                
                this.initializeEventListeners();
                this.loadMessages();
                this.startAutoRefresh();
            }
            
            initializeEventListeners() {
                this.sendButton.addEventListener('click', () => this.sendMessage());
                this.messageInput.addEventListener('keypress', (e) => {
                    if (e.key === 'Enter' && !e.shiftKey) {
                        e.preventDefault();
                        this.sendMessage();
                    }
                });
            }
            
            async loadMessages() {
                try {
                    this.showLoading();
                    
                    const response = await fetch('backend/get_admin_messages.php');
                    const data = await response.json();
                    
                    if (data.success) {
                        this.displayMessages(data.messages);
                    } else {
                        this.showError(data.error || 'Failed to load messages');
                    }
                } catch (error) {
                    console.error('Error loading messages:', error);
                    this.showError('Failed to load messages. Please try again.');
                }
            }
            
            async sendMessage() {
                const message = this.messageInput.value.trim();
                if (!message || this.isLoading) return;
                
                this.isLoading = true;
                this.sendButton.disabled = true;
                this.sendButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
                
                try {
                    const formData = new FormData();
                    formData.append('message', message);
                    
                    const response = await fetch('backend/contact_admin.php', {
                        method: 'POST',
                        body: formData
                    });
                    
                    const data = await response.json();
                    
                    if (data.success) {
                        this.messageInput.value = '';
                        this.loadMessages(); // Reload to show the new message
                    } else {
                        this.showError(data.error || 'Failed to send message');
                    }
                } catch (error) {
                    console.error('Error sending message:', error);
                    this.showError('Failed to send message. Please try again.');
                } finally {
                    this.isLoading = false;
                    this.sendButton.disabled = false;
                    this.sendButton.innerHTML = '<i class="fas fa-paper-plane"></i> Send';
                }
            }
            
            displayMessages(messages) {
                if (messages.length === 0) {
                    this.messagesContainer.innerHTML = '<div class="loading">No messages yet. Start the conversation!</div>';
                    return;
                }
                
                this.messagesContainer.innerHTML = messages.map(msg => {
                    const isUser = msg.user_id === this.userId;
                    const messageClass = isUser ? 'message user' : 'message admin';
                    const sender = isUser ? 'You' : 'Admin';
                    const time = new Date(msg.created_at).toLocaleTimeString();
                    
                    return `
                        <div class="${messageClass}">
                            <div class="message-content">${this.escapeHtml(msg.message)}</div>
                            <div class="message-time">${sender} • ${time}</div>
                        </div>
                    `;
                }).join('');
                
                this.scrollToBottom();
            }
            
            showLoading() {
                this.messagesContainer.innerHTML = '<div class="loading">Loading messages...</div>';
            }
            
            showError(message) {
                this.messagesContainer.innerHTML = `<div class="error">${this.escapeHtml(message)}</div>`;
            }
            
            scrollToBottom() {
                this.messagesContainer.scrollTop = this.messagesContainer.scrollHeight;
            }
            
            startAutoRefresh() {
                // Refresh messages every 10 seconds
                setInterval(() => {
                    if (!this.isLoading) {
                        this.loadMessages();
                    }
                }, 10000);
            }
            
            escapeHtml(text) {
                const div = document.createElement('div');
                div.textContent = text;
                return div.innerHTML;
            }
        }
        
        // Initialize chat when page loads
        document.addEventListener('DOMContentLoaded', () => {
            new ChatManager();
        });
    </script>
</body>
</html>