<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name']; 
    $description = $_POST['description'];

    
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $query = "UPDATE products SET name='$name', category='$category', price='$price', image='$target_file', description='$description' WHERE id=$id";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Product updated successfully!'); window.location.href='view_products.php';</script>";
    } else {
        echo "<script>alert('Error updating product: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Product - IQRA STORE</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <div class="container-fluid d-flex">
        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>

        <!-- Update Product Form -->
        <div class="p-4 flex-grow-1">
            <h2>Update Product</h2>
            <form method="POST" enctype="multipart/form-data" class="border p-4 shadow rounded bg-white">
                <div class="mb-3">
                    <label class="form-label">Product ID:</label>
                    <input type="text" name="id" required class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Product Name:</label>
                    <input type="text" name="name" required class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Category:</label>
                    <select name="category" class="form-select">
                        <option value="T-Shirt">T-Shirt</option>
                        <option value="Polo">Polo</option>
                        <option value="Drop Shoulder">Drop Shoulder</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Price:</label>
                    <input type="text" name="price" required class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload New Image:</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description:</label>
                    <textarea name="description" required class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-warning w-100">Update Product</button>
            </form>
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
