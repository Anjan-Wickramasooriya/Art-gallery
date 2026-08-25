<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtStore - Professional Artwork Marketplace</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Ionicons for beautiful icons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <header class="navbar">
        <div class="container">
            <div class="logo">
                <a href="index.php"><h1>Art<span>Store</span></h1></a>
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact</a></li>
                <li style="margin-left: 1rem;">
                    <a href="cart.php" style="display: flex; align-items: center; gap: 5px;">
                        <ion-icon name="cart-outline" style="font-size: 1.3rem;"></ion-icon> Cart
                    </a>
                </li>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <li><a href="my_orders.php">My Orders</a></li>
                    <li>
                        <a href="actions/auth_process.php?logout=true" class="btn btn-primary" style="color: white;">Logout</a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="login.php" class="btn btn-primary" style="color: white; padding: 0.5rem 1.2rem;">Sign In</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </header>
    <main>
