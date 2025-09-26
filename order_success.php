<?php
session_start();
include 'navbar.php';
include 'db.php';

// Ensure cart is not empty
if (empty($_SESSION['cart'])) {
    echo "<script>alert('Your cart is empty!'); window.location.href='index.php';</script>";
    exit;
}

// Capture customer details
$customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
$customer_email = mysqli_real_escape_string($conn, $_POST['customer_email']);
$customer_address = mysqli_real_escape_string($conn, $_POST['customer_address']);
$total_price = 0;

// Convert cart items into JSON format for storage
$order_items = [];
foreach ($_SESSION['cart'] as $item) {
    $subtotal = $item['price'] * $item['quantity'];
    $total_price += $subtotal;
    $order_items[] = [
        "name" => $item['name'],
        "size" => $item['size'],
        "quantity" => $item['quantity'],
        "price" => $item['price']
    ];
}
$order_items_json = json_encode($order_items);

// Insert order into database
$query = "INSERT INTO orders (user_id, customer_name, customer_email, customer_address, total_price, products)
          VALUES (NULL, '$customer_name', '$customer_email', '$customer_address', '$total_price', '$order_items_json')";

if (mysqli_query($conn, $query)) {
    unset($_SESSION['cart']); // Clear cart session after order placement
    echo "<script>alert('Order placed successfully!'); window.location.href='order_success.php';</script>";
    exit;
} else {
    echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order Confirmation - IQRA STORE</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center">Order Successfully Placed!</h2>
        <p class="text-center">Thank you for shopping with IQRA STORE. Here are your order details:</p>

        <h4>Customer Details</h4>
        <p><strong>Name:</strong> <?php echo $customer_name; ?></p>
        <p><strong>Email:</strong> <?php echo $customer_email; ?></p>
        <p><strong>Shipping Address:</strong> <?php echo $customer_address; ?></p>

        <h4>Order Summary</h4>
        <table class="table table-bordered text-center">
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
                <?php foreach ($order_items as $item) { ?>
                    <tr>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo $item['size']; ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td>Rs <?php echo $item['price']; ?></td>
                        <td class="fw-bold text-success">Rs <?php echo $item['price'] * $item['quantity']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <h3 class="text-end fw-bold">Grand Total: Rs <?php echo $total_price; ?></h3>

        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-primary">Return to Shop</a>
        </div>
    </div>

    <footer class="mt-5">
        <?php include 'footer.php'; ?>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
