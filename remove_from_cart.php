<?php
session_start();

if (isset($_GET['index'])) {
    $index = $_GET['index'];
    unset($_SESSION['cart'][$index]); // Remove selected item
    $_SESSION['cart'] = array_values($_SESSION['cart']); // Re-index array
}

header("Location: cart.php"); // Redirect back to cart
exit;
?>
