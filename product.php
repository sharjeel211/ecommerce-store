<?php
session_start();
include 'navbar.php';
include 'db.php';


if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('Invalid product!'); window.history.back();</script>";
    exit;
}

$product_id = mysqli_real_escape_string($conn, $_GET['id']);

// Fetch product details
$query = "SELECT * FROM products WHERE id = '$product_id'";
$result = mysqli_query($conn, $query);

if (!$row = mysqli_fetch_assoc($result)) {
    echo "<script>alert('Product not found!'); window.history.back();</script>";
    exit;
}


$imagePath = !empty($row['image']) ? $row['image'] : "assets/images/default.jpg"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $row['name']; ?> - IQRA STORE</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <!-- Image Section -->
            <div class="col-md-6">
                <?php
$categoryDir = strtolower(str_replace(' ', '', $row['category'])); // e.g., T-Shirt → tshirt
$imagePath = $categoryDir . '/' . basename($row['image']);
?>
<img src="<?php echo $imagePath; ?>" class="img-fluid rounded shadow" alt="<?php echo $row['name']; ?>"> </div>

            <!-- Details Section -->
            <div class="col-md-6">
                <h2><?php echo $row['name']; ?></h2>
                <p class="fw-bold">Category: <?php echo $row['category']; ?></p>
                <p><?php echo $row['description']; ?></p>
                <h4 class="text-success fw-bold">Rs <?php echo $row['price']; ?></h4>

                <!-- Add to Cart Form -->
                <form action="cart.php" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">

                    <!-- Size Selection Dropdown -->
                    <div class="mb-3">
                        <label for="size">Select Size:</label>
                        <select name="size" class="form-control" required>
                            <option value="Small">Small</option>
                            <option value="Medium">Medium</option>
                            <option value="Large">Large</option>
                            <option value="Extra Large">Extra Large</option>
                        </select>
                    </div>

                    <!-- Quantity Selector -->
                    <div class="mb-3">
                        <label for="quantity">Quantity:</label>
                        <input type="number" name="quantity" value="1" min="1" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer at the Bottom -->
    <footer class="mt-5">
        <?php include 'footer.php'; ?>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
