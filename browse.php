<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Products - LuxeMarket</title>
    <link rel="stylesheet" href="luxe-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
<script src="https://sites.super.myninja.ai/_assets/ninja-daytona-script.js"></script>
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
                <li><a href="signup.php">Sell</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
        <div class="auth-buttons">
            <a href="login.php" class="btn btn-secondary">Login</a>
            <a href="signup.php" class="btn btn-primary">Sign Up</a>
        </div>
    </header>

    <!-- Search Bar -->
    <div class="search-container">
        <div class="search-bar">
            <input type="text" placeholder="Chale everything some dey here...">
            <button><i class="fas fa-search"></i> Search</button>
        </div>
    </div>

    <!-- Browse Section -->
    <section class="dashboard">
        <div class="dashboard-header">
            <h1>Browse Products</h1>
            <div>
                <select style="padding: 0.7rem; border-radius: var(--border-radius); border: 1px solid #ddd; margin-right: 1rem;">
                    <option>Sort by: Newest First</option>
                    <option>Sort by: Price Low to High</option>
                    <option>Sort by: Price High to Low</option>
                    <option>Sort by: Most Popular</option>
                </select>
                <button class="btn btn-secondary"><i class="fas fa-filter"></i> Filters</button>
            </div>
        </div>
        
        <div class="dashboard-content">
            <div class="sidebar">
                <h3 style="margin-bottom: 1rem;">Categories</h3>
                <ul>
                    <li><a href="#"><i class="fas fa-tshirt"></i> Fashion & Apparel</a></li>
                    <li><a href="#"><i class="fas fa-laptop"></i> Electronics</a></li>
                    <li><a href="#"><i class="fas fa-home"></i> Home & Decor</a></li>
                    <li><a href="#"><i class="fas fa-gem"></i> Jewelry & Watches</a></li>
                    <li><a href="#"><i class="fas fa-car"></i> Automotive</a></li>
                    <li><a href="#"><i class="fas fa-dumbbell"></i> Sports & Fitness</a></li>
                    <li><a href="#"><i class="fas fa-book"></i> Books & Media</a></li>
                    <li><a href="#"><i class="fas fa-gift"></i> Gifts</a></li>
                </ul>
                
                <h3 style="margin: 2rem 0 1rem;">Price Range</h3>
                <div style="padding: 0 0.5rem;">
                    <input type="range" min="0" max="1000" value="500" style="width: 100%; margin-bottom: 1rem;">
                    <div style="display: flex; justify-content: space-between;">
                        <input type="number" placeholder="Min" style="width: 45%; padding: 0.5rem; border: 1px solid #ddd; border-radius: var(--border-radius);">
                        <input type="number" placeholder="Max" style="width: 45%; padding: 0.5rem; border: 1px solid #ddd; border-radius: var(--border-radius);">
                    </div>
                    <button class="btn btn-primary" style="width: 100%; margin-top: 1rem;">Apply Filter</button>
                </div>
                
                <h3 style="margin: 2rem 0 1rem;">Seller Rating</h3>
                <ul>
                    <li>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="checkbox" style="margin-right: 0.5rem;">
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span style="margin-left: 0.5rem;">(5.0)</span>
                        </label>
                    </li>
                    <li>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="checkbox" style="margin-right: 0.5rem;">
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <span style="margin-left: 0.5rem;">(4.0+)</span>
                        </label>
                    </li>
                    <li>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="checkbox" style="margin-right: 0.5rem;">
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <span style="margin-left: 0.5rem;">(3.0+)</span>
                        </label>
                    </li>
                </ul>
                
                <h3 style="margin: 2rem 0 1rem;">Shipping Options</h3>
                <ul>
                    <li>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="checkbox" style="margin-right: 0.5rem;">
                            Free Shipping
                        </label>
                    </li>
                    <li>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="checkbox" style="margin-right: 0.5rem;">
                            Same Day Delivery
                        </label>
                    </li>
                    <li>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="checkbox" style="margin-right: 0.5rem;">
                            International Shipping
                        </label>
                    </li>
                </ul>
            </div>
            
            <div class="main-content" style="padding: 0;">
                <h2 style="padding: 1.5rem;">Latest Products</h2>
                <div class="products-grid" style="padding: 0 1.5rem 1.5rem;">
                    <div class="product-card">
                        <span class="product-badge">New</span>
                        <div class="product-image">
                            <i class="fas fa-image fa-3x"></i>
                        </div>
                        <div class="product-info">
                            <h3>Premium Leather Wallet</h3>
                            <p>Handcrafted genuine leather wallet with multiple compartments</p>
                            <div class="product-meta">
                                <div class="product-price">$89.99</div>
                                <div class="product-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                            <a href="product-detail.php" class="btn btn-primary" style="width: 100%;">View Details</a>
                        </div>
                    </div>
                    
                    <div class="product-card">
                        <div class="product-image">
                            <i class="fas fa-image fa-3x"></i>
                        </div>
                        <div class="product-info">
                            <h3>Designer Watch Collection</h3>
                            <p>Limited edition luxury timepiece with Swiss movement</p>
                            <div class="product-meta">
                                <div class="product-price">$299.99</div>
                                <div class="product-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <a href="product-detail.php" class="btn btn-primary" style="width: 100%;">View Details</a>
                        </div>
                    </div>
                    
                    <div class="product-card">
                        <span class="product-badge">Sale</span>
                        <div class="product-image">
                            <i class="fas fa-image fa-3x"></i>
                        </div>
                        <div class="product-info">
                            <h3>Artisan Ceramic Vase</h3>
                            <p>Handmade ceramic vase with unique glaze finish</p>
                            <div class="product-meta">
                                <div class="product-price">$59.99</div>
                                <div class="product-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div>
                            <a href="product-detail.php" class="btn btn-primary" style="width: 100%;">View Details</a>
                        </div>
                    </div>
                    
                    <div class="product-card">
                        <div class="product-image">
                            <i class="fas fa-image fa-3x"></i>
                        </div>
                        <div class="product-info">
                            <h3>Premium Coffee Maker</h3>
                            <p>Professional-grade coffee machine with temperature control</p>
                            <div class="product-meta">
                                <div class="product-price">$149.99</div>
                                <div class="product-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                            <a href="product-detail.php" class="btn btn-primary" style="width: 100%;">View Details</a>
                        </div>
                    </div>
                    
                    <div class="product-card">
                        <div class="product-image">
                            <i class="fas fa-image fa-3x"></i>
                        </div>
                        <div class="product-info">
                            <h3>Luxury Scented Candle Set</h3>
                            <p>Set of 3 premium scented candles in elegant glass containers</p>
                            <div class="product-meta">
                                <div class="product-price">$45.99</div>
                                <div class="product-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <a href="luxe-product-detail.html" class="btn btn-primary" style="width: 100%;">View Details</a>
                        </div>
                    </div>
                    
                    <div class="product-card">
                        <div class="product-image">
                            <i class="fas fa-image fa-3x"></i>
                        </div>
                        <div class="product-info">
                            <h3>Wireless Noise-Cancelling Headphones</h3>
                            <p>Premium audio with active noise cancellation and long battery life</p>
                            <div class="product-meta">
                                <div class="product-price">$199.99</div>
                                <div class="product-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                            <a href="product-detail.php" class="btn btn-primary" style="width: 100%;">View Details</a>
                        </div>
                    </div>
                    
                    <div class="product-card">
                        <span class="product-badge">New</span>
                        <div class="product-image">
                            <i class="fas fa-image fa-3x"></i>
                        </div>
                        <div class="product-info">
                            <h3>Handcrafted Wooden Desk</h3>
                            <p>Solid oak desk with minimalist design and built-in cable management</p>
                            <div class="product-meta">
                                <div class="product-price">$499.99</div>
                                <div class="product-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <a href="product-detail.php" class="btn btn-primary" style="width: 100%;">View Details</a>
                        </div>
                    </div>
                    
                    <div class="product-card">
                        <div class="product-image">
                            <i class="fas fa-image fa-3x"></i>
                        </div>
                        <div class="product-info">
                            <h3>Gourmet Chocolate Collection</h3>
                            <p>Assortment of premium handmade chocolates from around the world</p>
                            <div class="product-meta">
                                <div class="product-price">$39.99</div>
                                <div class="product-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div>
                            <a href="product-detail.php" class="btn btn-primary" style="width: 100%;">View Details</a>
                        </div>
                    </div>
                </div>
                
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