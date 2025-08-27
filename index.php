<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LuxeMarket - Premium Marketplace</title>
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
            Luxe<span> luxe-Market</span>
        </a>
        <nav>
            <ul>
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="browse.php">Browse</a></li>
                <li><a href="signup.php">Sell</a></li>
                <li><a href="login.php">Contact</a></li>
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
            <input type="text" placeholder=" Chale everything some dey here...">
            <button><i class="fas fa-search"></i> Search</button>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="hero">
        <h1>Discover Exceptional Products</h1>
        <p>LuxeMarket connects buyers with premium sellers in a sophisticated marketplace designed for discerning tastes.</p>
        <a href="browse.php" class="btn btn-gold">Explore Products</a>
    </section>

    <!-- Featured Products Section -->
    <section class="products">
        <h2 class="section-title">Featured Products</h2>
        <p class="section-subtitle">Discover our handpicked selection of premium products from verified sellers</p>
        
        <div class="products-grid">
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
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <h2 class="section-title">Why Choose LuxeMarket</h2>
        <p class="section-subtitle">We provide a premium marketplace experience for both buyers and sellers</p>
        
        <div class="features-grid">
            <div class="feature-card">
                <i class="fas fa-shield-alt"></i>
                <h3>Verified Sellers</h3>
                <p>All sellers undergo a thorough verification process to ensure quality and authenticity of products.</p>
            </div>
            
            <div class="feature-card">
                <i class="fas fa-comments"></i>
                <h3>Direct Communication</h3>
                <p>Connect with sellers directly through our integrated messaging system to discuss products and negotiate.</p>
            </div>
            
            <div class="feature-card">
                <i class="fas fa-shipping-fast"></i>
                <h3>Secure Shipping</h3>
                <p>Professional packaging and insured shipping options available for all purchases.</p>
            </div>
        </div>
    </section>

    <!-- Subscription Plans Section -->
    <section class="pricing">
        <h2 class="section-title">Seller Subscription Plans</h2>
        <p class="section-subtitle">Choose the perfect plan to showcase your products on LuxeMarket</p>
        
        <div class="pricing-grid">
            <div class="pricing-card">
                <h3>Basic Seller</h3>
                <div class="price">$19<span>/month</span></div>
                <ul>
                    <li><i class="fas fa-check"></i> List up to 10 products</li>
                    <li><i class="fas fa-check"></i> Basic messaging with buyers</li>
                    <li><i class="fas fa-check"></i> Standard commission rates</li>
                    <li><i class="fas fa-check"></i> Basic analytics</li>
                    <li><i class="fas fa-times"></i> Featured listings</li>
                    <li><i class="fas fa-times"></i> Priority support</li>
                </ul>
                <a href="luxe-signup.html" class="btn btn-primary" style="width: 100%;">Get Started</a>
            </div>
            
            <div class="pricing-card popular">
                <h3>Professional Seller</h3>
                <div class="price">$49<span>/month</span></div>
                <ul>
                    <li><i class="fas fa-check"></i> List up to 50 products</li>
                    <li><i class="fas fa-check"></i> Advanced messaging system</li>
                    <li><i class="fas fa-check"></i> Reduced commission rates</li>
                    <li><i class="fas fa-check"></i> Detailed analytics dashboard</li>
                    <li><i class="fas fa-check"></i> 5 featured listings per month</li>
                    <li><i class="fas fa-check"></i> Priority support</li>
                </ul>
                <a href="luxe-signup.html" class="btn btn-gold" style="width: 100%;">Get Started</a>
            </div>
            
            <div class="pricing-card">
                <h3>Enterprise Seller</h3>
                <div class="price">$99<span>/month</span></div>
                <ul>
                    <li><i class="fas fa-check"></i> Unlimited product listings</li>
                    <li><i class="fas fa-check"></i> Premium messaging with CRM</li>
                    <li><i class="fas fa-check"></i> Lowest commission rates</li>
                    <li><i class="fas fa-check"></i> Advanced analytics & reporting</li>
                    <li><i class="fas fa-check"></i> 15 featured listings per month</li>
                    <li><i class="fas fa-check"></i> Dedicated account manager</li>
                </ul>
                <a href="luxe-signup.html" class="btn btn-primary" style="width: 100%;">Get Started</a>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="features" style="background-color: #f1f5f9;">
        <h2 class="section-title">Popular Categories</h2>
        <p class="section-subtitle">Browse our most popular product categories</p>
        
        <div class="features-grid">
            <div class="feature-card">
                <i class="fas fa-tshirt"></i>
                <h3>Fashion & Apparel</h3>
                <p>Designer clothing, accessories, and footwear from premium brands and independent designers.</p>
                <a href="luxe-category.html" class="btn btn-secondary" style="margin-top: 1rem;">Browse Category</a>
            </div>
            
            <div class="feature-card">
                <i class="fas fa-laptop"></i>
                <h3>Electronics</h3>
                <p>High-end electronics, gadgets, and tech accessories from trusted sellers and brands.</p>
                <a href="luxe-category.html" class="btn btn-secondary" style="margin-top: 1rem;">Browse Category</a>
            </div>
            
            <div class="feature-card">
                <i class="fas fa-home"></i>
                <h3>Home & Decor</h3>
                <p>Luxury home furnishings, decor items, and artisanal pieces for elegant living spaces.</p>
                <a href="luxe-category.html" class="btn btn-secondary" style="margin-top: 1rem;">Browse Category</a>
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