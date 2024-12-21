<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Favourites</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container my-5">
        <!-- Header Section -->
        <a href="/" class="text-black">
            <i class="bi bi-house text-black"></i> Vastra
        </a>
        <h1 class="text-center mb-4">Your Favourites</h1>
        
        <!-- Favourites Section -->
        <div class="container my-5">
        <h1 class="text-center mb-4">Your Favorites</h1>
        <div class="row">
            <!-- app/Views/favorites/index.php -->
<!-- app/Views/favorites.php -->

<h2>Your Favorite Products</h2>

<?php if (!empty($favorites)): ?>
    <ul>
        <?php foreach ($favorites as $favorite): ?>
            <li>
                <h3><?= esc($favorite['productName']) ?></h3>
                <p><?= esc($favorite['productDescription']) ?></p>
                <p>Price: ₹<?= esc($favorite['productPrice']) ?></p>
                <img src="<?= base_url('uploads/' . esc($favorite['productImage'])) ?>" alt="<?= esc($favorite['productName']) ?>" width="100">
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>You have no favorite products yet.</p>
<?php endif; ?>

   
</body>

</html>
