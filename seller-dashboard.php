<?php
session_start();

// Save intended page if not logged in
if(!isset($_SESSION['user'])){
    $redirectUrl = urlencode($_SERVER['REQUEST_URI']);
    header("Location: login.php?redirect=$redirectUrl");
    exit;
}

// Allow only buyers to chat
if($_SESSION['user']['role'] !== 'buyer'){
    echo "<p>Only buyers can start chats with sellers.</p>";
    exit;
}
?>
<!-- Chat UI goes here -->






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard - LuxeMarket</title>
    <link rel="stylesheet" href="luxe-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
<script src="https://sites.super.myninja.ai/_assets/ninja-daytona-script.js"></script>
</head>
<body>
    <!-- Header Section -->
    <header>
        <a href="luxe-index.html" class="logo">
            <i class="fas fa-crown logo-icon"></i>
            Luxe<span>Market</span>
        </a>
        <nav>
            <ul>
                <li><a href="seller-dashboard.php" class="active">Dashboard</a></li>
                <li><a href="luxe-seller-products.html">My Products</a></li>
                <li><a href="luxe-seller-orders.html">Orders</a></li>
                <li><a href="luxe-seller-analytics.html">Analytics</a></li>
                <li><a href="luxe-seller-settings.html">Settings</a></li>
            </ul>
        </nav>
        <div class="auth-buttons">
            <a href="seller-dashboard.php" class="btn btn-secondary">My Account</a>
            <a href="index.php" class="btn btn-primary">Logout</a>
        </div>
    </header>

    <!-- Dashboard Section -->
    <section class="dashboard">
        <div class="dashboard-header">
            <h1>Seller Dashboard</h1>
            <a href="seller-add-product.php" class="btn btn-primary">+ Add New Product</a>
        </div>
        
        <!-- Stats Overview -->
        <div class="stats-grid">
            <div class="stat-card">
                <h3>Active Products</h3>
                <div class="number">24</div>
                <p>+3 this week</p>
            </div>
            <div class="stat-card">
                <h3>Total Sales</h3>
                <div class="number">$4,285</div>
                <p>This month</p>
            </div>
            <div class="stat-card">
                <h3>Active Chats</h3>
                <div class="number">12</div>
                <p>Buyer conversations</p>
            </div>
            <div class="stat-card">
                <h3>Subscription</h3>
                <div class="number">Professional</div>
                <p>Renews in 18 days</p>
            </div>
        </div>
        
        <div class="dashboard-content">
            <div class="sidebar">
                <ul>
                    <li><a href="#" class="active"><i class="fas fa-tachometer-alt"></i> Overview</a></li>
                    <li><a href="#"><i class="fas fa-box"></i> Products</a></li>
                    <li><a href="#"><i class="fas fa-shopping-cart"></i> Orders</a></li>
                    <li><a href="#"><i class="fas fa-comments"></i> Messages</a></li>
                    <li><a href="#"><i class="fas fa-chart-line"></i> Analytics</a></li>
                    <li><a href="#"><i class="fas fa-money-bill-wave"></i> Earnings</a></li>
                    <li><a href="#"><i class="fas fa-star"></i> Reviews</a></li>
                    <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
                </ul>
            </div>
            
            <div class="main-content">
                <h2>Recent Products</h2>
                <table class="admin-table" style="margin-bottom: 2rem;">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Views</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Premium Leather Wallet</td>
                            <td>$89.99</td>
                            <td><span style="color: #38a169;">Active</span></td>
                            <td>245</td>
                            <td class="action-buttons">
                                <button class="btn btn-secondary">Edit</button>
                                <button class="btn btn-danger">Remove</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Designer Watch Collection</td>
                            <td>$299.99</td>
                            <td><span style="color: #38a169;">Active</span></td>
                            <td>187</td>
                            <td class="action-buttons">
                                <button class="btn btn-secondary">Edit</button>
                                <button class="btn btn-danger">Remove</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Artisan Ceramic Vase</td>
                            <td>$59.99</td>
                            <td><span style="color: #38a169;">Active</span></td>
                            <td>132</td>
                            <td class="action-buttons">
                                <button class="btn btn-secondary">Edit</button>
                                <button class="btn btn-danger">Remove</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Premium Coffee Maker</td>
                            <td>$149.99</td>
                            <td><span style="color: #dd6b20;">Pending Review</span></td>
                            <td>0</td>
                            <td class="action-buttons">
                                <button class="btn btn-secondary">Edit</button>
                                <button class="btn btn-danger">Remove</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <h2>Recent Messages</h2>
                <div class="messages-container" style="margin-top: 1rem;">
                    <div class="contacts-list">
                        <div class="contact active">
                            <div class="contact-info">
                                <div class="contact-avatar">J</div>
                                <div class="contact-details">
                                    <h4>John Smith</h4>
                                    <p>Interested in your wallet</p>
                                </div>
                            </div>
                        </div>
                        <div class="contact">
                            <div class="contact-info">
                                <div class="contact-avatar">S</div>
                                <div class="contact-details">
                                    <h4>Sarah Johnson</h4>
                                    <p>Question about shipping</p>
                                </div>
                            </div>
                        </div>
                        <div class="contact">
                            <div class="contact-info">
                                <div class="contact-avatar">M</div>
                                <div class="contact-details">
                                    <h4>Michael Brown</h4>
                                    <p>Custom order inquiry</p>
                                </div>
                            </div>
                        </div>
                        <div class="contact">
                            <div class="contact-info">
                                <div class="contact-avatar">A</div>
                                <div class="contact-details">
                                    <h4>Amanda Lee</h4>
                                    <p>Order confirmation</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-area">
                        <div class="chat-header">
                            <div class="contact-avatar">J</div>
                            <h3>John Smith</h3>
                            <div style="margin-left: auto; color: #48bb78;">
                                <i class="fas fa-circle"></i> Online
                            </div>
                        </div>
                        <div class="chat-messages">
                            <div class="message received">
                                <p>Hello! I'm interested in your Premium Leather Wallet. Could you tell me more about the material used?</p>
                            </div>
                            <div class="message sent">
                                <p>Hi John, thank you for your interest! The wallet is made from full-grain Italian leather, which is the highest quality grade. It's vegetable-tanned and will develop a beautiful patina over time.</p>
                            </div>
                            <div class="message received">
                                <p>That sounds great. Does it have RFID protection? And how many card slots does it have?</p>
                            </div>
                            <div class="message sent">
                                <p>Yes, it includes RFID blocking technology to protect your cards. It has 8 card slots, 2 currency compartments, and a zippered coin pocket.</p>
                            </div>
                            <div class="message received">
                                <p>Perfect! One last question - do you offer international shipping?</p>
                            </div>
                        </div>
                        <div class="chat-input">
                            <input type="text" placeholder="Type your message here...">
                            <button class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer>
        <div class="footer-content">
            <div class="footer-column">
                <h3>LuxeMarket</h3>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Our Team</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Press</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>For Sellers</h3>
                <ul>
                    <li><a href="#">Sell on LuxeMarket</a></li>
                    <li><a href="#">Seller Resources</a></li>
                    <li><a href="#">Subscription Plans</a></li>
                    <li><a href="#">Seller Dashboard</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>For Buyers</h3>
                <ul>
                    <li><a href="#">Browse Products</a></li>
                    <li><a href="#">Buyer Protection</a></li>
                    <li><a href="#">Shipping & Returns</a></li>
                    <li><a href="#">Payment Options</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Support</h3>
                <ul>
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 LuxeMarket. All rights reserved. The premium marketplace for exceptional products.</p>
        </div>
    </footer>

    <script src="luxe-script.js"></script>
</body>
</html>