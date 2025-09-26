<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']);

    if ($username !== 'admin') { // Prevent signup as "admin"
        $query = "INSERT INTO users (full_name, username, email, password) VALUES ('$full_name', '$username', '$email', '$password')";
        mysqli_query($conn, $query);
        echo "Signup successful! <a href='login.php'>Login here</a>";
    } else {
        echo "Restricted: Admin account cannot be created via signup!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Signup - IQRA STORE</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Signup Form -->
    <div class="container d-flex justify-content-center align-items-center flex-grow-1">
        <div class="card p-4 shadow" style="width: 350px;">
            <h2 class="text-center">Create Account</h2>
            <form action="signup.php" method="POST">
                <div class="mb-3">
                    <label for="full_name" class="form-label">Full Name:</label>
                    <input type="text" class="form-control" name="full_name" placeholder="Enter Full Name" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter Username" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Signup</button>
            </form>

            <!-- Login Link -->
            <p class="mt-3 text-center">Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>

    <!-- Footer (Fixed at the bottom) -->
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        © 2025 IQRA STORE. All Rights Reserved.
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
