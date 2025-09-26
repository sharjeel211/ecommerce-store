<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <!-- we used this pfor logo placement -->
        <div class="d-flex align-items-center">
            <a class="navbar-brand" href="index.php">
                <img src="tshirts/logo1.png" alt="E-commerce Logo" width="100" height="50" href="index.html">
            </a>
        </div>

        
        <div class="mx-auto text-white font-weight-bold text-center" style="font-size: 24px;">
            IQRA STORE
        </div>

        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav ">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="index.php" id="productsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Products
                    </a>
                    <div class="dropdown-menu" aria-labelledby="productsDropdown">
                        <a class="dropdown-item" href="index.php">All Products</a>
                        <a class="dropdown-item" href="tshirts.php">T-Shirts</a>
                        <a class="dropdown-item" href="polo.php">Polo Shirts</a>
                        <a class="dropdown-item" href="dropshoulder.php">Drop Shoulder</a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="Dashboard.php">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="signup.php">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
           
            </ul>
        </div>
    </div>
</nav>
