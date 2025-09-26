<?php
session_start();
include 'navbar.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product = [
        "id" => $_POST['product_id'],
        "name" => $_POST['product_name'],
        "price" => $_POST['product_price'],
        "size" => $_POST['size'],
        "quantity" => $_POST['quantity']
    ];
    
    $_SESSION['cart'][] = $product; // Append to session
}

$total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Your Cart - IQRA STORE</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center">Your Shopping Cart</h2>

        <?php if (empty($_SESSION['cart'])) { ?>
            <div class="alert alert-warning text-center">
                Your cart is empty! <a href="index.php" class="btn btn-primary">Go to Shop</a>
            </div>
        <?php } else { ?>
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Product</th>
                            <th>Size</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['cart'] as $key => $item) { 
                            $subtotal = $item['price'] * $item['quantity'];
                            $total += $subtotal;
                        ?>
                        <tr>
                            <td><?php echo $item['name']; ?></td>
                            <td><?php echo $item['size']; ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td>Rs <?php echo $item['price']; ?></td>
                            <td class="fw-bold text-success">Rs <?php echo $subtotal; ?></td>
                            <td>
                                <a href="remove_from_cart.php?index=<?php echo $key; ?>" class="btn btn-danger btn-sm">Remove</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <h3 class="text-end fw-bold">Grand Total: Rs <?php echo $total; ?></h3>
            <div class="text-center">
                <a href="checkout.php" class="btn btn-primary btn-lg">Proceed to Checkout</a>
            </div>
        <?php } ?>
    </div>

    <!-- Footer at the Bottom -->
    <footer class="mt-5">
        <?php include 'footer.php'; ?>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
