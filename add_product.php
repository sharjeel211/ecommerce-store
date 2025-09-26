<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $image_name = basename($_FILES["image"]["name"]);
    
   
    $allowed_types = ['image/jpeg', 'image/png', 'image/jpg'];
    $image_type = mime_content_type($_FILES["image"]["tmp_name"]);
    
    if (!in_array($image_type, $allowed_types)) {
        echo "<script>alert('Invalid image type! Only JPG, JPEG, and PNG allowed.');</script>";
        exit;
    }

    
    $target_dir = "uploads/" . strtolower(str_replace(' ', '', $category)) . "/";
    $target_file = $target_dir . $image_name;

    
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Move uploaded file
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // Insert into database using prepared statement
        $query = $conn->prepare("INSERT INTO products (name, category, price, image, description) VALUES (?, ?, ?, ?, ?)");
        $query->bind_param("sssss", $name, $category, $price, $target_file, $description);
        
        if ($query->execute()) {
            echo "<script>alert('Product added successfully!'); window.location.href='admin_dashboard.php';</script>";
        } else {
            echo "<script>alert('Database error: " . $conn->error . "');</script>";
        }
    } else {
        echo "<script>alert('Error uploading image. Check folder permissions.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Product - IQRA STORE</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    
    <?php include 'navbar.php'; ?>

    <div class="container-fluid d-flex">
        
        <?php include 'sidebar.php'; ?>

        <!-- Add Product Form -->
        <div class="p-4 flex-grow-1">
            <h2>Add a New Product</h2>
            <form method="POST" enctype="multipart/form-data" class="border p-4 shadow rounded bg-white">
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
                    <input type="number" name="price" required class="form-control" min="1">
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload Image:</label>
                    <input type="file" name="image" required class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description:</label>
                    <textarea name="description" required class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-success w-100">Add Product</button>
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
