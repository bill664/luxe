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
    $first_name = trim($_POST['first_name'] ?? '');
    $last_name = trim($_POST['last_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $role = $_POST['role'] ?? 'buyer';
    $terms = isset($_POST['terms']);
    $newsletter = isset($_POST['newsletter']);
    
    $errors = [];
    
    // Validation
    if (empty($first_name)) $errors[] = "First name is required";
    if (empty($last_name)) $errors[] = "Last name is required";
    if (empty($email)) $errors[] = "Email is required";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email format";
    if (empty($password)) $errors[] = "Password is required";
    if (strlen($password) < 6) $errors[] = "Password must be at least 6 characters";
    if ($password !== $confirm_password) $errors[] = "Passwords do not match";
    if (!$terms) $errors[] = "You must agree to the terms of service";
    if (!in_array($role, ['buyer', 'seller'])) $errors[] = "Invalid role selected";
    
    if (empty($errors)) {
        if ($pdo) {
            // Database registration
            try {
                // Check if email already exists
                $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
                $stmt->execute([$email]);
                if ($stmt->fetch()) {
                    $errors[] = "Email already registered";
                } else {
                    // Hash password and insert user
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, phone, password, role, newsletter, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
                    $stmt->execute([$first_name, $last_name, $email, $phone, $hashed_password, $role, $newsletter ? 1 : 0]);
                    
                    $_SESSION['user_id'] = $pdo->lastInsertId();
                    $_SESSION['user_email'] = $email;
                    $_SESSION['user_role'] = $role;
                    $_SESSION['user_name'] = $first_name . ' ' . $last_name;
                    
                    header("Location: " . ($role === 'seller' ? 'seller-dashboard.php' : 'index.php'));
                    exit;
                }
            } catch(PDOException $e) {
                $errors[] = "Registration failed. Please try again.";
            }
        } else {
            // File-based storage for demo purposes
            $users_file = 'users.json';
            $users = [];
            
            if (file_exists($users_file)) {
                $users = json_decode(file_get_contents($users_file), true) ?: [];
            }
            
            // Check if email already exists
            foreach ($users as $user) {
                if ($user['email'] === $email) {
                    $errors[] = "Email already registered";
                    break;
                }
            }
            
            if (empty($errors)) {
                $new_user = [
                    'id' => count($users) + 1,
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'email' => $email,
                    'phone' => $phone,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'role' => $role,
                    'newsletter' => $newsletter,
                    'created_at' => date('Y-m-d H:i:s')
                ];
                
                $users[] = $new_user;
                file_put_contents($users_file, json_encode($users, JSON_PRETTY_PRINT));
                
                $_SESSION['user_id'] = $new_user['id'];
                $_SESSION['user_email'] = $email;
                $_SESSION['user_role'] = $role;
                $_SESSION['user_name'] = $first_name . ' ' . $last_name;
                
                header("Location: " . ($role === 'seller' ? 'seller-dashboard.php' : 'index.php'));
                exit;
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
    <title>Registration - LuxeMarket</title>
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

    <!-- Registration Section -->
    <section class="dashboard" style="display: flex; justify-content: center; align-items: center; min-height: 80vh; background-color: #f1f5f9;">
        <div class="main-content" style="max-width: 700px; width: 100%;">
            <h1 style="text-align: center; margin-bottom: 2rem; font-family: var(--font-primary);">Create Your Account</h1>
            
            <?php if (!empty($errors)): ?>
                <div class="alert alert-error" style="background: #fee; color: #c33; padding: 1rem; border-radius: 8px; margin-bottom: 2rem; border: 1px solid #fcc;">
                    <ul style="margin: 0; padding-left: 1.5rem;">
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            
            <div style="display: flex; gap: 2rem; margin-bottom: 2rem;">
                <button id="join-buyer" class="btn btn-primary" style="flex: 1;">Join as Buyer</button>
                <button id="join-seller" class="btn btn-secondary" style="flex: 1;">Join as Seller</button>
            </div>
            
            <form action="register.php" method="post">
                <input type="hidden" name="role" id="role" value="buyer">
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div class="form-group">
                        <label for="first-name">First Name</label>
                        <input type="text" id="first-name" name="first_name" placeholder="Enter your first name" required 
                               value="<?php echo htmlspecialchars($_POST['first_name'] ?? ''); ?>">
                    </div>
                    <div class="form-group">
                        <label for="last-name">Last Name</label>
                        <input type="text" id="last-name" name="last_name" placeholder="Enter your last name" required
                               value="<?php echo htmlspecialchars($_POST['last_name'] ?? ''); ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required
                           value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                </div>
                
                <div class="form-group">
                    <label for="phone">Phone Number (optional)</label>
                    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number"
                           value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>">
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
                    <input type="checkbox" id="terms" name="terms" required <?php echo isset($_POST['terms']) ? 'checked' : ''; ?>>
                    <label for="terms">I agree to the 
                        <a href="#" style="color: var(--accent-color);">Terms of Service</a> 
                        and 
                        <a href="#" style="color: var(--accent-color);">Privacy Policy</a>
                    </label>
                </div>
                
                <div class="form-group">
                    <input type="checkbox" id="newsletter" name="newsletter" <?php echo isset($_POST['newsletter']) ? 'checked' : ''; ?>>
                    <label for="newsletter">Subscribe to our newsletter</label>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Create Account</button>
                </div>
            </form>
            
            <div style="text-align: center; margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #eee;">
                <p>Already have an account? <a href="login.php" style="color: var(--accent-color); font-weight: 600; text-decoration: none;">Login</a></p>
            </div>
        </div>
    </section>

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
