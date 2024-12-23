<!-- favorites.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Favourites</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Scroll Container */
        .product-cards {
            display: flex;
            flex-wrap: nowrap;
            gap: 10px;
            overflow-x: auto;
            padding-bottom: 10px;
        }

        /* Hide Scrollbar */
        .product-cards::-webkit-scrollbar {
            display: none;  /* Chrome, Safari */
        }

        .product-cards {
            scrollbar-width: none;  /* Firefox */
        }

        .card {
            flex: 0 0 auto;
            width: 220px;
            height: 400px;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-img-top {
            object-fit: cover;
            height: 250px;
            width: 100%;
        }

        .card-body {
            text-align: center;
            padding: 10px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .btn-remove {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 1;
            color:red;
            font-weight: bold; 
        }

        .card-btns {
            display: flex;
            justify-content: space-between;
            gap: 5px;
            margin-top: 10px;
        }

        .btn-cart,
        .btn-buy {
            width: 48%;
            font-size: 0.75rem;  /* Smaller text size */
        }

        /* Adjust for smaller screens */
        @media (max-width: 576px) {
            .product-cards {
                flex-wrap: nowrap;
            }

            .card {
                width: 180px;
            }
        }

        /* Adjust for medium screens */
        @media (min-width: 576px) and (max-width: 768px) {
            .card {
                width: 200px;
            }
        }

        /* Adjust for larger screens */
        @media (min-width: 768px) {
            .product-cards {
                justify-content: flex-start;
            }

            .card {
                width: 220px;
            }
        }
    </style>
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
                <div class="product-cards">
                    <?php if (!empty($favorites)): ?>
                        <?php foreach ($favorites as $favorite): ?>
                            <div class="card">
                                <!-- Remove button icon -->
                                <a href="<?= base_url('favorites/remove/' . $favorite['product_id']) ?>" 
                                   class="btn btn-sm btn-remove">
                                    <i class="bi bi-x-lg"></i>
                                </a>
                                
                                <img class="card-img-top img-fluid" 
                                     src="<?= base_url('uploads/' . $favorite['productImage']) ?>"  
                                     alt="<?= $favorite['productName'] ?>">

                                <div class="card-body">
                                    <h5 class="card-title text-truncate" style="font-size: 0.8rem;">
                                        <?= $favorite['productName'] ?>
                                    </h5>
                                    <h6 class="card-title text-truncate" style="font-size: 0.8rem;">
                                        <?= $favorite['productDescription'] ?>
                                    </h6>
                                    <p class="card-text" style="font-size: 0.75rem;">
                                        ₹<?= $favorite['productPrice'] ?>
                                    </p>
                                    <!-- Add to Cart and Buy Now Buttons -->
                                    <div class="card-btns">
                                        <a href="<?= base_url('cart/add/' . $favorite['product_id']) ?>" class="btn btn-danger btn-cart">Add to Cart</a>
                                        <a href="<?= base_url('checkout/buy/' . $favorite['product_id']) ?>" class="btn btn-danger btn-buy">Buy Now</a>
                                    </div>
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

    <!-- Bootstrap JS for responsive functionality (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
