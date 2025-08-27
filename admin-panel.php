<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - LuxeMarket</title>
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
            Luxe<span>Market</span> Admin
        </a>
        <nav>
            <ul>
                <li><a href="admin-panel.php" class="active">Dashboard</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Sellers</a></li>
                <li><a href="#">Buyers</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </nav>
        <div class="auth-buttons">
            <a href="admin-dashboard.php" class="btn btn-secondary">Admin Profile</a>
            <a href="index.php" class="btn btn-primary">Logout</a>
        </div>
    </header>

    <!-- Admin Panel Section -->
    <section class="dashboard">
        <div class="dashboard-header">
            <h1>Admin Dashboard</h1>
            <div>
                <button class="btn btn-secondary"><i class="fas fa-download"></i> Export Data</button>
                <button class="btn btn-primary"><i class="fas fa-cog"></i> Settings</button>
            </div>
        </div>
        
        <!-- Stats Overview -->
        <div class="stats-grid">
            <div class="stat-card">
                <h3>Total Products</h3>
                <div class="number">1,247</div>
                <p>+85 this month</p>
            </div>
            <div class="stat-card">
                <h3>Active Sellers</h3>
                <div class="number">342</div>
                <p>+24 this month</p>
            </div>
            <div class="stat-card">
                <h3>Active Ads</h3>
                <div class="number">986</div>
                <p>Currently running</p>
            </div>
            <div class="stat-card">
                <h3>Total Revenue</h3>
                <div class="number">$128,450</div>
                <p>This month</p>
            </div>
        </div>
        
        <!-- Tabs -->
        <div class="tabs">
            <div class="tab active">Active Ads</div>
            <div class="tab">Sellers</div>
            <div class="tab">Pending Reviews</div>
            <div class="tab">Reports</div>
        </div>
        
        <div class="dashboard-content">
            <div class="sidebar">
                <ul>
                    <li><a href="#" class="active"><i class="fas fa-tachometer-alt"></i> Overview</a></li>
                    <li><a href="#"><i class="fas fa-box"></i> Products Management</a></li>
                    <li><a href="#"><i class="fas fa-users"></i> Seller Management</a></li>
                    <li><a href="#"><i class="fas fa-user-friends"></i> Buyer Management</a></li>
                    <li><a href="#"><i class="fas fa-ad"></i> Ad Management</a></li>
                    <li><a href="#"><i class="fas fa-chart-line"></i> Analytics</a></li>
                    <li><a href="#"><i class="fas fa-money-bill-wave"></i> Revenue</a></li>
                    <li><a href="#"><i class="fas fa-flag"></i> Reported Items</a></li>
                    <li><a href="#"><i class="fas fa-cog"></i> System Settings</a></li>
                </ul>
            </div>
            
            <div class="main-content" style="padding: 0; overflow-x: auto;">
                <div style="padding: 1.5rem;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                        <h2>Active Advertisements</h2>
                        <div>
                            <input type="text" placeholder="Search ads..." style="padding: 0.5rem; border-radius: var(--border-radius); border: 1px solid #ddd; margin-right: 0.5rem;">
                            <button class="btn btn-secondary"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
                
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Seller</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Date Posted</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Premium Leather Wallet</td>
                            <td>Leather Artisans Co.</td>
                            <td>Fashion & Accessories</td>
                            <td>$89.99</td>
                            <td>2025-08-17</td>
                            <td><span style="color: #38a169;">Active</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-secondary">View</button>
                                <button class="btn btn-warning">Suspend</button>
                                <button class="btn btn-danger">Remove</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Designer Watch Collection</td>
                            <td>Luxury Timepieces Inc.</td>
                            <td>Jewelry & Watches</td>
                            <td>$299.99</td>
                            <td>2025-08-16</td>
                            <td><span style="color: #38a169;">Active</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-secondary">View</button>
                                <button class="btn btn-warning">Suspend</button>
                                <button class="btn btn-danger">Remove</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Artisan Ceramic Vase</td>
                            <td>Handmade Pottery Studio</td>
                            <td>Home & Decor</td>
                            <td>$59.99</td>
                            <td>2025-08-15</td>
                            <td><span style="color: #38a169;">Active</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-secondary">View</button>
                                <button class="btn btn-warning">Suspend</button>
                                <button class="btn btn-danger">Remove</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Premium Coffee Maker</td>
                            <td>Gourmet Kitchen Supplies</td>
                            <td>Home & Kitchen</td>
                            <td>$149.99</td>
                            <td>2025-08-14</td>
                            <td><span style="color: #dd6b20;">Under Review</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-secondary">View</button>
                                <button class="btn btn-success">Approve</button>
                                <button class="btn btn-danger">Reject</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Luxury Scented Candle Set</td>
                            <td>Aroma Essentials</td>
                            <td>Home & Decor</td>
                            <td>$45.99</td>
                            <td>2025-08-13</td>
                            <td><span style="color: #38a169;">Active</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-secondary">View</button>
                                <button class="btn btn-warning">Suspend</button>
                                <button class="btn btn-danger">Remove</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Wireless Noise-Cancelling Headphones</td>
                            <td>Premium Audio Tech</td>
                            <td>Electronics</td>
                            <td>$199.99</td>
                            <td>2025-08-12</td>
                            <td><span style="color: #38a169;">Active</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-secondary">View</button>
                                <button class="btn btn-warning">Suspend</button>
                                <button class="btn btn-danger">Remove</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Handcrafted Wooden Desk</td>
                            <td>Artisan Furniture</td>
                            <td>Furniture</td>
                            <td>$499.99</td>
                            <td>2025-08-11</td>
                            <td><span style="color: #e53e3e;">Flagged</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-secondary">View</button>
                                <button class="btn btn-warning">Suspend</button>
                                <button class="btn btn-danger">Remove</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Gourmet Chocolate Collection</td>
                            <td>Sweet Delights</td>
                            <td>Food & Beverages</td>
                            <td>$39.99</td>
                            <td>2025-08-10</td>
                            <td><span style="color: #38a169;">Active</span></td>
                            <td class="action-buttons">
                                <button class="btn btn-secondary">View</button>
                                <button class="btn btn-warning">Suspend</button>
                                <button class="btn btn-danger">Remove</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <!-- Pagination -->
                <div style="display: flex; justify-content: center; padding: 2rem;">
                    <div style="display: flex; gap: 0.5rem;">
                        <a href="#" class="btn btn-secondary"><i class="fas fa-chevron-left"></i></a>
                        <a href="#" class="btn btn-primary">1</a>
                        <a href="#" class="btn btn-secondary">2</a>
                        <a href="#" class="btn btn-secondary">3</a>
                        <a href="#" class="btn btn-secondary">4</a>
                        <a href="#" class="btn btn-secondary">5</a>
                        <a href="#" class="btn btn-secondary"><i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Seller Management Section -->
        <div class="dashboard-content" style="margin-top: 2rem;">
            <div class="sidebar">
                <ul>
                    <li><a href="#"><i class="fas fa-tachometer-alt"></i> Overview</a></li>
                    <li><a href="#" class="active"><i class="fas fa-users"></i> Seller Management</a></li>
                    <li><a href="#"><i class="fas fa-box"></i> Products Management</a></li>
                    <li><a href="#"><i class="fas fa-user-friends"></i> Buyer Management</a></li>
                    <li><a href="#"><i class="fas fa-ad"></i> Ad Management</a></li>
                    <li><a href="#"><i class="fas fa-chart-line"></i> Analytics</a></li>
                    <li><a href="#"><i class="fas fa-money-bill-wave"></i> Revenue</a></li>
                    <li><a href="#"><i class="fas fa-flag"></i> Reported Items</a></li>
                    <li><a href="#"><i class="fas fa-cog"></i> System Settings</a></li>
                </ul>
            </div>
            
            <div class="main-content" style="padding: 0; overflow-x: auto;">
                <div style="padding: 1.5rem;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                        <h2>Seller Management</h2>
                        <div>
                            <input type="text" placeholder="Search sellers..." style="padding: 0.5rem; border-radius: var(--border-radius); border: 1px solid #ddd; margin-right: 0.5rem;">
                            <button class="btn btn-secondary"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
                
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Seller Name</th>
                            <th>Subscription</th>
                            <th>Products</th>
                            <th>Join Date</th>
                            <th>Status</th>
                            <th>Rating</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Leather Artisans Co.</td>
                            <td>Professional</td>
                            <td>24</td>
                            <td>2024-11-05</td>
                            <td><span style="color: #38a169;">Active</span></td>
                            <td>
                                <div class="product-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </td>
                            <td class="action-buttons">
                                <button class="btn btn-secondary">View</button>
                                <button class="btn btn-warning">Suspend</button>
                                <button class="btn btn-danger">Ban</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Luxury Timepieces Inc.</td>
                            <td>Enterprise</td>
                            <td>47</td>
                            <td>2024-09-18</td>
                            <td><span style="color: #38a169;">Active</span></td>
                            <td>
                                <div class="product-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </td>
                            <td class="action-buttons">
                                <button class="btn btn-secondary">View</button>
                                <button class="btn btn-warning">Suspend</button>
                                <button class="btn btn-danger">Ban</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Handmade Pottery Studio</td>
                            <td>Basic</td>
                            <td>8</td>
                            <td>2025-01-22</td>
                            <td><span style="color: #38a169;">Active</span></td>
                            <td>
                                <div class="product-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </td>
                            <td class="action-buttons">
                                <button class="btn btn-secondary">View</button>
                                <button class="btn btn-warning">Suspend</button>
                                <button class="btn btn-danger">Ban</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Gourmet Kitchen Supplies</td>
                            <td>Professional</td>
                            <td>32</td>
                            <td>2024-10-14</td>
                            <td><span style="color: #dd6b20;">Under Review</span></td>
                            <td>
                                <div class="product-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </td>
                            <td class="action-buttons">
                                <button class="btn btn-secondary">View</button>
                                <button class="btn btn-success">Approve</button>
                                <button class="btn btn-danger">Reject</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Artisan Furniture</td>
                            <td>Professional</td>
                            <td>18</td>
                            <td>2024-12-03</td>
                            <td><span style="color: #e53e3e;">Suspended</span></td>
                            <td>
                                <div class="product-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </td>
                            <td class="action-buttons">
                                <button class="btn btn-secondary">View</button>
                                <button class="btn btn-success">Reinstate</button>
                                <button class="btn btn-danger">Ban</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <!-- Pagination -->
                <div style="display: flex; justify-content: center; padding: 2rem;">
                    <div style="display: flex; gap: 0.5rem;">
                        <a href="#" class="btn btn-secondary"><i class="fas fa-chevron-left"></i></a>
                        <a href="#" class="btn btn-primary">1</a>
                        <a href="#" class="btn btn-secondary">2</a>
                        <a href="#" class="btn btn-secondary">3</a>
                        <a href="#" class="btn btn-secondary">4</a>
                        <a href="#" class="btn btn-secondary">5</a>
                        <a href="#" class="btn btn-secondary"><i class="fas fa-chevron-right"></i></a>
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