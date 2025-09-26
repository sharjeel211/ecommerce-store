<?php
include 'navbar.php';
include 'db.php';

// Fetch products based on category
function fetchProducts($conn, $category) {
    return mysqli_query($conn, "SELECT * FROM products WHERE category='$category' LIMIT 6");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - IQRA STORE</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .custom-img {
            width: 100%;
            height: 300px; 
            object-fit: cover;
            border-radius: 8px;
            transition: transform 0.3s ease-in-out;
        }
        .custom-img:hover {
            transform: scale(0.9);
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center">Welcome to IQRA STORE</h1>
        <p class="text-center">Discover trendy and stylish outfits curated for you!</p>

        <!-- T-Shirts Section -->
        <h2 class="text-center mt-4">T-Shirts Collection</h2>
        <div class="row">
            <?php 
            $products = fetchProducts($conn, 'T-Shirt');
            while ($row = mysqli_fetch_assoc($products)) { 
                $imagePath = 'tshirts/' . basename($row['image']); ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <a href="product.php?id=<?php echo $row['id']; ?>">
                            <img src="<?php echo $imagePath; ?>" class="custom-img" alt="<?php echo $row['name']; ?>">
                        </a>
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                            <p class="fw-bold">Rs <?php echo $row['price']; ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!-- Polo Shirts Section -->
        <h2 class="text-center mt-4">Polo Shirts Collection</h2>
        <div class="row">
            <?php 
            $products = fetchProducts($conn, 'Polo');
            while ($row = mysqli_fetch_assoc($products)) { 
                $imagePath = 'poloshirts/' . basename($row['image']); ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <a href="product.php?id=<?php echo $row['id']; ?>">
                            <img src="<?php echo $imagePath; ?>" class="custom-img" alt="<?php echo $row['name']; ?>">
                        </a>
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                            <p class="fw-bold">Rs <?php echo $row['price']; ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!-- Drop Shoulder Section -->
        <h2 class="text-center mt-4">Drop Shoulder Collection</h2>
        <div class="row">
            <?php 
            $products = fetchProducts($conn, 'Drop Shoulder');
            while ($row = mysqli_fetch_assoc($products)) { 
                $imagePath = 'dropshoulder/' . basename($row['image']); ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <a href="product.php?id=<?php echo $row['id']; ?>">
                            <img src="<?php echo $imagePath; ?>" class="custom-img" alt="<?php echo $row['name']; ?>">
                        </a>
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                            <p class="fw-bold">Rs <?php echo $row['price']; ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
