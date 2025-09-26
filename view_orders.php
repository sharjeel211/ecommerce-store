<?php
session_start();
include 'navbar.php';
include 'db.php';

// Fetch all orders
$query = "SELECT * FROM orders ORDER BY order_date DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order Management - IQRA STORE</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content {
            flex: 1;
        }
        .sidebar {
            min-height: 100vh;
            padding: 15px;
            background-color: #f8f9fa; 
        }
        .footer {
            width: 100%;
            background-color: #f8f9fa;
            padding: 15px 0;
            text-align: center;
            position: relative;
            bottom: 0;
        }
        .list-group-item.active {
            background-color: transparent; 
            border: none;
            font-weight: bold; 
        }
    </style>
</head>

<body>
    <div class="container mt-4 content">
        <div class="row">
            
            <div class="col-md-3">
                <?php include 'sidebar.php'; ?>
            </div>

            
            <div class="col-md-9">
                <h2 class="text-center mb-4">Order Management</h2>

                <?php if (mysqli_num_rows($result) > 0) { ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Total Price</th>
                                    <th>Order Date</th>
                                    <th>Status</th>
                                    <th>Mark as Completed</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['customer_name']; ?></td>
                                    <td><?php echo $row['customer_email']; ?></td>
                                    <td><?php echo $row['customer_address']; ?></td>
                                    <td class="fw-bold text-success">Rs <?php echo $row['total_price']; ?></td>
                                    <td><?php echo $row['order_date']; ?></td>
                                    <td><?php echo isset($row['status']) && $row['status'] == 'Completed' ? '<span class="text-success">Completed</span>' : '<span class="text-warning">Pending</span>'; ?></td>
                                    <td>
                                        <?php if (isset($row['status']) && $row['status'] != 'Completed') { ?>
                                            <a href="mark_completed.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">Complete</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-warning text-center">
                        No orders found! <a href="index.php" class="btn btn-primary">Go to Shop</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- Footer at the Bottom -->
    <footer class="footer">
        <?php include 'footer.php'; ?>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
