<?php
session_start();
include 'navbar.php';

if (empty($_SESSION['cart'])) {
    echo "<script>alert('Your cart is empty!'); window.location.href='index.php';</script>";
    exit;
}


$total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Checkout - IQRA STORE</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center">Checkout</h2>

        <form action="order_success.php" method="POST">
            <div class="row">
                
                <div class="col-md-6">
                    <h4>Billing Details</h4>
                    <div class="mb-3">
                        <label>Name:</label>
                        <input type="text" name="customer_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Email:</label>
                        <input type="email" name="customer_email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Address:</label>
                        <textarea name="customer_address" class="form-control" required></textarea>
                    </div>
                </div>

                
                <div class="col-md-6">
                    <h4>Your Order</h4>
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th>Product</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_SESSION['cart'] as $item) {
                                $subtotal = $item['price'] * $item['quantity'];
                                $total += $subtotal;
                            ?>
                            <tr>
                                <td><?php echo $item['name']; ?></td>
                                <td><?php echo $item['size']; ?></td>
                                <td><?php echo $item['quantity']; ?></td>
                                <td>Rs <?php echo $item['price']; ?></td>
                                <td class="fw-bold text-success">Rs <?php echo $subtotal; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <h3 class="text-end fw-bold">Grand Total: Rs <?php echo $total; ?></h3>
                </div>
            </div>
            <button type="submit" class="btn btn-success w-100 mt-3">Place Order</button>
        </form>
    </div>

    
    <footer class="mt-5">
        <?php include 'footer.php'; ?>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
