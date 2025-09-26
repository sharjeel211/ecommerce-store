<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id']; 
    $query = "DELETE FROM products WHERE id=$id";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Product deleted successfully!'); window.location.href='view_products.php';</script>";
    } else {
        echo "<script>alert('Error deleting product: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Delete Product - IQRA STORE</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
  
    <?php include 'navbar.php'; ?>

    <div class="container-fluid d-flex">
        
        <?php include 'sidebar.php'; ?>

       
        <div class="p-4 flex-grow-1">
            <h2>Delete Product</h2>
            <form method="POST" class="border p-4 shadow rounded bg-white">
                <label class="form-label">Enter Product ID to Delete:</label>
                <input type="text" name="id" required class="form-control mb-3">
                <button type="submit" class="btn btn-danger w-100">Delete Product</button>
            </form>
        </div>
    </div>

    
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        © 2025 IQRA STORE. All Rights Reserved.
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
