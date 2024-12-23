<!-- favorites.php -->
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
        <a href="/" class="text-black">
            <i class="bi bi-house text-black"></i> Vastra
        </a>
        <h1 class="text-center mb-4">Your Favourites</h1>
        <section class="py-4">
            <h2 class="text-left mb-4">Your Favorites</h2>
            <div class="scroll-container py-3">
                <div class="product-cards d-flex gap-4">
                    <?php if (!empty($favorites)): ?>
                        <?php foreach ($favorites as $favorite): ?>
                            <div class="card" style="width: 220px; height: 350px;">
                                <img class="card-img-top img-fluid" 
                                     src="<?= base_url('uploads/' . $favorite['productImage']) ?>"  
                                     alt="<?= $favorite['productName'] ?>" 
                                     style="object-fit: cover; height: 250px; width: 100%;">

                                <div class="card-body text-center p-2">
                                    <h5 class="card-title text-truncate" style="font-size: 0.8rem;">
                                        <?= $favorite['productName'] ?>
                                    </h5>
                                    <p class="card-text" style="font-size: 0.75rem;">
                                        ₹<?= $favorite['productPrice'] ?>
                                    </p>
                                    <!-- Remove button -->
                                    <a href="<?= base_url('favorites/remove/' . $favorite['product_id']) ?>" class="btn btn-danger btn-sm">Remove</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No favorites yet.</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
