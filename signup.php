<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - LuxeMarket</title>
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
                
            </ul>
        </nav>
        <div class="auth-buttons">
            <a href="login.php" class="btn btn-secondary">Login</a>
            <a href="register.php" class="btn btn-primary">Sign Up</a>
        </div>
    </header>

    <!-- Signup Section -->
    <section class="dashboard" style="display: flex; justify-content: center; align-items: center; min-height: 80vh; background-color: #f1f5f9;">
        <div class="main-content" style="max-width: 700px; width: 100%;">
            <h1 style="text-align: center; margin-bottom: 2rem; font-family: var(--font-primary);">Create Your Account</h1>
            
            <div style="display: flex; gap: 2rem; margin-bottom: 2rem;">
    <button id="join-buyer" class="btn btn-primary" style="flex: 1;">Join as Buyer</button>
    <button id="join-seller" class="btn btn-secondary" style="flex: 1;">Join as Seller</button>
</div>

            
       <form action="register.php" method="post">
    <!-- Hidden role field -->
    <input type="hidden" name="role" id="role" value="buyer">

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
        <div class="form-group">
            <label for="first-name">First Name</label>
            <input type="text" id="first-name" name="first_name" placeholder="Enter your first name" required>
        </div>
        <div class="form-group">
            <label for="last-name">Last Name</label>
            <input type="text" id="last-name" name="last_name" placeholder="Enter your last name" required>
        </div>
    </div>
    
    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
    </div>
    
    <div class="form-group">
        <label for="phone">Phone Number (optional)</label>
        <input type="tel" id="phone" name="phone" placeholder="Enter your phone number">
    </div>
    
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Create a password" required>
    </div>
    
    <div class="form-group">
        <label for="confirm-password">Confirm Password</label>
        <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm your password" required>
    </div>
    
    <div class="form-group">
        <input type="checkbox" id="terms" name="terms" required>
        <label for="terms">I agree to the 
            <a href="#" style="color: var(--accent-color);">Terms of Service</a> 
            and 
            <a href="#" style="color: var(--accent-color);">Privacy Policy</a>
        </label>
    </div>
    
    <div class="form-group">
        <input type="checkbox" id="newsletter" name="newsletter">
        <label for="newsletter">Subscribe to our newsletter</label>
    </div>
    
    <div class="form-group">
        <button type="submit" class="btn btn-primary" style="width: 100%;">Create Account</button>
    </div>
</form>


            
            <div style="text-align: center; margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #eee;">
                <p>Already have an account? <a href="login.php" style="color: var(--accent-color); font-weight: 600; text-decoration: none;">Login</a></p>
            </div>
            
            <div style="text-align: center; margin-top: 2rem;">
                <p style="margin-bottom: 1rem;">Or sign up with</p>
                <div style="display: flex; gap: 1rem; justify-content: center;">
                    <button class="btn btn-secondary" style="display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                        <i class="fab fa-google"></i> Google
                    </button>
                    <button class="btn btn-secondary" style="display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                        <i class="fab fa-facebook-f"></i> Facebook
                    </button>
                    <button class="btn btn-secondary" style="display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                        <i class="fab fa-apple"></i> Apple
                    </button>
                </div>
            </div>
        </div>
    </section>
            </form>
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
    const buyerButton = document.getElementById('join-buyer');
    const sellerButton = document.getElementById('join-seller');
    const roleInput = document.getElementById('role');

    if (buyerButton && sellerButton && roleInput) {
        buyerButton.addEventListener('click', function(e) {
            e.preventDefault();
            buyerButton.classList.add('btn-primary');
            buyerButton.classList.remove('btn-secondary');
            sellerButton.classList.add('btn-secondary');
            sellerButton.classList.remove('btn-primary');
            roleInput.value = "buyer";
        });

        sellerButton.addEventListener('click', function(e) {
            e.preventDefault();
            sellerButton.classList.add('btn-primary');
            sellerButton.classList.remove('btn-secondary');
            buyerButton.classList.add('btn-secondary');
            buyerButton.classList.remove('btn-primary');
            roleInput.value = "seller";
        });
    }
});
</script>

</body>
</html>