<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard - IQRA STORE</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
   
    <?php include 'navbar.php'; ?>

    <div class="container-fluid d-flex flex-grow-1">
       
        <?php include 'sidebar.php'; ?>

        
        <div class="p-4 flex-grow-1">
            <h1>Welcome to Admin Panel</h1>
            <p>Manage your store efficiently using the tools in the sidebar.</p>
        </div>
    </div>

    
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        © 2025 IQRA STORE. All Rights Reserved.
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
