<?php
session_start();

// Redirect if already logged in
if (isset($_SESSION['user_id'])) {
    $redirect = $_GET['redirect'] ?? 'index.php';
    header("Location: $redirect");
    exit;
}

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

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if (empty($email) || empty($password)) {
        $error = "Please enter both email and password";
    } else {
        if ($pdo) {
            // Database authentication
            try {
                $stmt = $pdo->prepare("SELECT id, email, password, role, first_name, last_name FROM users WHERE email = ?");
                $stmt->execute([$email]);
                $user = $stmt->fetch();
                
                if ($user && password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_email'] = $user['email'];
                    $_SESSION['user_role'] = $user['role'];
                    $_SESSION['user_name'] = $user['first_name'] . ' ' . $user['last_name'];
                    
                    $redirect = $_GET['redirect'] ?? 'index.php';
                    header("Location: $redirect");
                    exit;
                } else {
                    $error = "Invalid email or password";
                }
            } catch(PDOException $e) {
                $error = "Login failed. Please try again.";
            }
        } else {
            // File-based authentication for demo purposes
            $users_file = 'users.json';
            if (file_exists($users_file)) {
                $users = json_decode(file_get_contents($users_file), true) ?: [];
                
                foreach ($users as $user) {
                    if ($user['email'] === $email && password_verify($password, $user['password'])) {
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['user_email'] = $user['email'];
                        $_SESSION['user_role'] = $user['role'];
                        $_SESSION['user_name'] = $user['first_name'] . ' ' . $user['last_name'];
                        
                        $redirect = $_GET['redirect'] ?? 'index.php';
                        header("Location: $redirect");
                        exit;
                    }
                }
                $error = "Invalid email or password";
            } else {
                $error = "No users found. Please register first.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LuxeMarket</title>
    <link rel="stylesheet" href="luxe-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
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
            <a href="signup.php" class="btn btn-primary">Sign Up</a>
        </div>
    </header>

    <!-- Login Section -->
    <section class="dashboard" style="display: flex; justify-content: center; align-items: center; min-height: 80vh; background-color: #f1f5f9;">
        <div class="main-content" style="max-width: 500px; width: 100%;">
            <h1 style="text-align: center; margin-bottom: 2rem; font-family: var(--font-primary);">Welcome Back</h1>
            
            <?php if ($error): ?>
                <div class="alert alert-error" style="background: #fee; color: #c33; padding: 1rem; border-radius: 8px; margin-bottom: 2rem; border: 1px solid #fcc;">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>
            
            <form action="login.php<?php echo isset($_GET['redirect']) ? '?redirect=' . urlencode($_GET['redirect']) : ''; ?>" method="post">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required 
                           value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                
                <div class="form-group" style="display: flex; justify-content: space-between; align-items: center;">
                    <label style="margin: 0;">
                        <input type="checkbox" name="remember" id="remember">
                        Remember me
                    </label>
                    <a href="#" style="color: var(--accent-color); text-decoration: none;">Forgot Password?</a>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>
                </div>
            </form>
            
            <div style="text-align: center; margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #eee;">
                <p>Don't have an account? <a href="signup.php" style="color: var(--accent-color); font-weight: 600; text-decoration: none;">Sign Up</a></p>
            </div>
            
            <div style="text-align: center; margin-top: 2rem;">
                <p style="margin-bottom: 1rem;">Or login with</p>
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
</body>
</html>
