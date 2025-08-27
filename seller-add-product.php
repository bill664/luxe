<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product - LuxeMarket</title>
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
                <li><a href="seller-dashboard.php">Dashboard</a></li>
                <li><a href="seller-dashboard.php">My Products</a></li>
                <li><a href="seller-dashboard.php">Orders</a></li>
                <li><a href="seller-dashboard.php">Analytics</a></li>
                <li><a href="seller-dashboard.php">Settings</a></li>
            </ul>
        </nav>
        <div class="auth-buttons">
            <a href="seller-dashboard.php" class="btn btn-secondary">My Account</a>
            <a href="index.php" class="btn btn-primary">Logout</a>
        </div>
    </header>

    <!-- Add Product Section -->
    <section class="dashboard">
        <div class="dashboard-header">
            <h1>Add New Product</h1>
            <div>
                <button class="btn btn-secondary">Save as Draft</button>
                <button class="btn btn-primary">Publish Product</button>
            </div>
        </div>
        
        <div class="dashboard-content">
            <div class="sidebar">
                <ul>
                    <li><a href="seller-dashboard.php"><i class="fas fa-tachometer-alt"></i> Overview</a></li>
                    <li><a href="#" class="active"><i class="fas fa-box"></i> Products</a></li>
                    <li><a href="#"><i class="fas fa-shopping-cart"></i> Orders</a></li>
                    <li><a href="#"><i class="fas fa-comments"></i> Messages</a></li>
                    <li><a href="#"><i class="fas fa-chart-line"></i> Analytics</a></li>
                    <li><a href="#"><i class="fas fa-money-bill-wave"></i> Earnings</a></li>
                    <li><a href="#"><i class="fas fa-star"></i> Reviews</a></li>
                    <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
                </ul>
            </div>
            
            <div class="main-content">
                <form class="upload-form">
                    <h2>Basic Information</h2>
                    <div class="form-group">
                        <label for="product-title">Product Title*</label>
                        <input type="text" id="product-title" placeholder="Enter product title" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="product-category">Category*</label>
                        <select id="product-category" required>
                            <option value="">Select category</option>
                            <option value="fashion">Fashion & Apparel</option>
                            <option value="electronics">Electronics</option>
                            <option value="home">Home & Decor</option>
                            <option value="jewelry">Jewelry & Watches</option>
                            <option value="beauty">Beauty & Personal Care</option>
                            <option value="sports">Sports & Fitness</option>
                            <option value="books">Books & Media</option>
                            <option value="toys">Toys & Games</option>
                            <option value="art">Art & Collectibles</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="product-subcategory">Subcategory</label>
                        <select id="product-subcategory">
                            <option value="">Select subcategory</option>
                            <!-- Subcategories will be populated based on selected category -->
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="product-description">Description*</label>
                        <textarea id="product-description" rows="6" placeholder="Describe your product in detail" required></textarea>
                    </div>
                    
                    <h2>Pricing</h2>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                        <div class="form-group">
                            <label for="product-price">Price ($)*</label>
                            <input type="number" id="product-price" placeholder="Enter price" step="0.01" min="0" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="product-compare-price">Compare-at Price ($)</label>
                            <input type="number" id="product-compare-price" placeholder="Original price (if on sale)" step="0.01" min="0">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="product-tax">Tax Class</label>
                        <select id="product-tax">
                            <option value="standard">Standard</option>
                            <option value="reduced">Reduced Rate</option>
                            <option value="zero">Zero Rate</option>
                        </select>
                    </div>
                    
                    <h2>Inventory</h2>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                        <div class="form-group">
                            <label for="product-sku">SKU (Stock Keeping Unit)</label>
                            <input type="text" id="product-sku" placeholder="Enter SKU">
                        </div>
                        
                        <div class="form-group">
                            <label for="product-quantity">Quantity*</label>
                            <input type="number" id="product-quantity" placeholder="Available quantity" min="0" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <input type="checkbox" id="product-track-inventory">
                        <label for="product-track-inventory">Track inventory</label>
                    </div>
                    
                    <div class="form-group">
                        <input type="checkbox" id="product-continue-selling">
                        <label for="product-continue-selling">Continue selling when out of stock</label>
                    </div>
                    
                    <h2>Images</h2>
                    <div class="form-group">
                        <label for="product-images">Product Images*</label>
                        <div style="border: 2px dashed #ddd; border-radius: var(--border-radius); padding: 2rem; text-align: center; margin-top: 0.5rem;">
                            <i class="fas fa-cloud-upload-alt" style="font-size: 3rem; color: var(--text-muted); margin-bottom: 1rem;"></i>
                            <p>Drag and drop images here or click to browse</p>
                            <p style="font-size: 0.9rem; color: var(--text-muted);">Upload up to 10 images. First image will be used as the product thumbnail.</p>
                            <input type="file" id="product-images" multiple accept="image/*" style="display: none;">
                            <button type="button" class="btn btn-secondary" style="margin-top: 1rem;">Browse Files</button>
                        </div>
                    </div>
                    
                    <div style="display: flex; gap: 1rem; margin-top: 1rem; overflow-x: auto; padding-bottom: 1rem;">
                        <!-- Image previews will be shown here -->
                    </div>
                    
                    <h2>Shipping</h2>
                    <div class="form-group">
                        <label for="product-weight">Weight (kg)</label>
                        <input type="number" id="product-weight" placeholder="Product weight" step="0.01" min="0">
                    </div>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1rem;">
                        <div class="form-group">
                            <label for="product-length">Length (cm)</label>
                            <input type="number" id="product-length" placeholder="Length" step="0.1" min="0">
                        </div>
                        
                        <div class="form-group">
                            <label for="product-width">Width (cm)</label>
                            <input type="number" id="product-width" placeholder="Width" step="0.1" min="0">
                        </div>
                        
                        <div class="form-group">
                            <label for="product-height">Height (cm)</label>
                            <input type="number" id="product-height" placeholder="Height" step="0.1" min="0">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <input type="checkbox" id="product-free-shipping">
                        <label for="product-free-shipping">Free shipping</label>
                    </div>
                    
                    <h2>Variants</h2>
                    <div class="form-group">
                        <input type="checkbox" id="product-has-variants">
                        <label for="product-has-variants">This product has multiple options, like different sizes or colors</label>
                    </div>
                    
                    <div id="variants-container" style="display: none; margin-top: 1rem;">
                        <div style="display: flex; gap: 1rem; margin-bottom: 1rem;">
                            <div class="form-group" style="flex: 1;">
                                <label for="variant-option">Option Name</label>
                                <input type="text" id="variant-option" placeholder="e.g. Size, Color, Material">
                            </div>
                            <div class="form-group" style="flex: 1;">
                                <label for="variant-values">Option Values</label>
                                <input type="text" id="variant-values" placeholder="e.g. Small, Medium, Large (comma separated)">
                            </div>
                            <button type="button" class="btn btn-secondary" style="align-self: flex-end; height: 42px;"><i class="fas fa-plus"></i> Add Option</button>
                        </div>
                    </div>
                    
                    <h2>SEO</h2>
                    <div class="form-group">
                        <label for="product-meta-title">Meta Title</label>
                        <input type="text" id="product-meta-title" placeholder="SEO title (leave blank to use product title)">
                    </div>
                    
                    <div class="form-group">
                        <label for="product-meta-description">Meta Description</label>
                        <textarea id="product-meta-description" rows="3" placeholder="SEO description (leave blank to use product description)"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="product-tags">Tags (comma separated)</label>
                        <input type="text" id="product-tags" placeholder="e.g. leather, wallet, handmade">
                    </div>
                    
                    <div style="display: flex; justify-content: space-between; margin-top: 2rem;">
                        <button type="button" class="btn btn-secondary">Cancel</button>
                        <div>
                            <button type="button" class="btn btn-secondary" style="margin-right: 1rem;">Save as Draft</button>
                            <button type="submit" class="btn btn-primary">Publish Product</button>
                        </div>
                    </div>
                </form>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle variants section
            const hasVariantsCheckbox = document.getElementById('product-has-variants');
            const variantsContainer = document.getElementById('variants-container');
            
            if (hasVariantsCheckbox && variantsContainer) {
                hasVariantsCheckbox.addEventListener('change', function() {
                    variantsContainer.style.display = this.checked ? 'block' : 'none';
                });
            }
            
            // Image upload functionality
            const browseButton = document.querySelector('.btn-secondary');
            const fileInput = document.getElementById('product-images');
            const previewContainer = document.querySelector('.form-group + div');
            
            if (browseButton && fileInput && previewContainer) {
                browseButton.addEventListener('click', function() {
                    fileInput.click();
                });
                
                fileInput.addEventListener('change', function() {
                    previewContainer.innerHTML = '';
                    
                    for (let i = 0; i < this.files.length; i++) {
                        const file = this.files[i];
                        if (!file.type.startsWith('image/')) continue;
                        
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const preview = document.createElement('div');
                            preview.style.width = '100px';
                            preview.style.height = '100px';
                            preview.style.backgroundColor = '#f8f9fa';
                            preview.style.borderRadius = 'var(--border-radius)';
                            preview.style.overflow = 'hidden';
                            preview.style.position = 'relative';
                            preview.style.flexShrink = '0';
                            
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.style.width = '100%';
                            img.style.height = '100%';
                            img.style.objectFit = 'cover';
                            
                            const removeBtn = document.createElement('button');
                            removeBtn.innerHTML = '<i class="fas fa-times"></i>';
                            removeBtn.style.position = 'absolute';
                            removeBtn.style.top = '5px';
                            removeBtn.style.right = '5px';
                            removeBtn.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
                            removeBtn.style.color = 'white';
                            removeBtn.style.border = 'none';
                            removeBtn.style.borderRadius = '50%';
                            removeBtn.style.width = '20px';
                            removeBtn.style.height = '20px';
                            removeBtn.style.cursor = 'pointer';
                            removeBtn.style.display = 'flex';
                            removeBtn.style.alignItems = 'center';
                            removeBtn.style.justifyContent = 'center';
                            
                            removeBtn.addEventListener('click', function() {
                                preview.remove();
                            });
                            
                            preview.appendChild(img);
                            preview.appendChild(removeBtn);
                            previewContainer.appendChild(preview);
                        };
                        
                        reader.readAsDataURL(file);
                    }
                });
            }
        });
    </script>
</body>
</html>