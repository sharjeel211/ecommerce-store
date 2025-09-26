<?php
session_start();

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    
    if ($user && $password === $user['password']) {

        $_SESSION['username'] = $user['username'];

    
        if ($user['username'] === 'admin') {
            $_SESSION['admin'] = true;
            header("Location: dashboard.php");
        } else {
            header("Location: user_home.php"); 
        }
        exit;
    } else {
        echo "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login - IQRA STORE</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Login Form -->
    <div class="container d-flex justify-content-center align-items-center flex-grow-1">
        <div class="card p-4 shadow" style="width: 350px;">
            <h2 class="text-center">Login</h2>
            <form action="login.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
            
            <!-- Signup Link -->
            <p class="mt-3 text-center">Don't have an account? <a href="signup.php">Sign up here</a></p>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        © 2025 IQRA STORE. All Rights Reserved.
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
