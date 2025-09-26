<?php
session_start();
include 'db.php';


$countResult = mysqli_query($conn, "SELECT COUNT(*) AS total FROM products");
$countRow = mysqli_fetch_assoc($countResult);
$totalProducts = $countRow['total'];


$categoryFilter = isset($_GET['category']) ? $_GET['category'] : '';
$query = "SELECT * FROM products";
if ($categoryFilter) {
    $query .= " WHERE category='$categoryFilter'";
}
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Products - IQRA STORE</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
   
    <?php include 'navbar.php'; ?>

    <div class="container-fluid d-flex">
     
        <?php include 'sidebar.php'; ?>

       
        <div class="p-4 flex-grow-1">
            <h2>Product List</h2>
            <p class="fw-bold">Total Products: <?php echo $totalProducts; ?></p>

            <!-- filter used for category -->
            <form method="GET" class="mb-3">
                <label class="form-label">Filter by Category:</label>
                <select name="category" class="form-select w-50 d-inline-block">
                    <option value="">All Categories</option>
                    <option value="T-Shirt" <?php if ($categoryFilter == "T-Shirt") echo "selected"; ?>>T-Shirt</option>
                    <option value="Polo" <?php if ($categoryFilter == "Polo") echo "selected"; ?>>Polo</option>
                    <option value="Drop Shoulder" <?php if ($categoryFilter == "Drop Shoulder") echo "selected"; ?>>Drop Shoulder</option>
                </select>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>

           
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <!-- <th>Image</th> -->
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['category']; ?></td>
                            <td>$<?php echo $row['price']; ?></td>
                            <!-- <td><img src="<?php echo $row['image']; ?>" width="50"></td> -->
                            <td><?php echo $row['description']; ?></td>
                            <td>
                                <a href="update_product.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete_product.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        © 2025 IQRA STORE. All Rights Reserved.
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
