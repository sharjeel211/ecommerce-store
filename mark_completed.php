<?php
session_start();
include 'db.php';

if (isset($_GET['id'])) {
    $order_id = $_GET['id'];
    $query = "UPDATE orders SET status='Completed' WHERE id='$order_id'";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Order marked as completed!'); window.location.href='view_orders.php';</script>";
    } else {
        echo "<script>alert('Error updating order: " . mysqli_error($conn) . "');</script>";
    }
}
?>
