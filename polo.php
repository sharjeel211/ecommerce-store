<?php
session_start();
include 'navbar.php';
include 'db.php';


$limit = 9; 
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;


$result = mysqli_query($conn, "SELECT * FROM products WHERE category='Polo' LIMIT $limit OFFSET $offset");


$countResult = mysqli_query($conn, "SELECT COUNT(*) AS total FROM products WHERE category='Polo'");
$countRow = mysqli_fetch_assoc($countResult);
$totalProducts = $countRow['total'];
$totalPages = ceil($totalProducts / $limit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Polo Shirts - IQRA STORE</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
       
        .custom-img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 8px;
            transition: transform 0.3s ease-in-out;
            cursor: pointer;
        }

        
        .custom-img:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center">Polo Shirts Collection</h1>
        <p class="text-center">Explore our premium range of Polo Shirts!</p>

       
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($result)) { 
                $imagePath = 'poloshirts/' . basename($row['image']); ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?php echo $imagePath; ?>" class="custom-img" onclick="openImage('<?php echo $imagePath; ?>')" alt="<?php echo $row['name']; ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                            <p class="card-text fw-bold">Rs <?php echo $row['price']; ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        
        <nav>
            <ul class="pagination justify-content-center mt-3">
                <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                    <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                        <a class="page-link" href="polo.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </div>

    
    <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Product Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    <script>
        function openImage(imageSrc) {
            document.getElementById("modalImage").src = imageSrc;
            new bootstrap.Modal(document.getElementById('imageModal')).show();
        }
    </script>
</body>
</html>
