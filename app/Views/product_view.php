<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<?php
    $user = session()->get('user');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="<?= esc($product['productName']) ?>" />
    <meta property="og:description" content="<?= esc($product['productDescription']) ?>" />
    <meta property="og:image" content="<?= base_url('uploads/' . esc($product['productImage'])) ?>" />
    <meta property="og:type" content="product" />
    <title><?= esc($product['productName']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-img {
            max-width: 100%;
            height: auto;
        }
        .product-title {
            font-size: 1.8rem;
            font-weight: bold;
        }

        .product-price {
            font-size: 1.5rem;
            color: #e67e22;
        }

        .product-description {
            font-size: 1rem;
            color: #7f8c8d;
        }

        .action-btns .btn {
            width: 150px;
        }

        .product-details-container {
            padding: 30px;
            border: 1px solid black; /* Add border to the details container */
        }

        /* Responsive Image Styling */
        @media (max-width: 768px) {
            .product-img {
                max-width: 100%;
                height: auto;
            }
        }

        /* Footer links styling */
        .footer-links li {
            margin-bottom: 8px;
        }
    </style>
</head>

<body>
    <div class="container product-details-container">
        <div class="row">
            <!-- Left Column for Product Image -->
            <div class="col-md-6 product-image-container">
                <!-- <img src="https://cdn.pixabay.com/photo/2023/02/08/06/29/fashion-7775824_1280.jpg" alt="Product Image"
                    class="img-fluid mb-3" style="max-height: 300px; object-fit: cover;"> -->
                <img style="max-height: 500px; object-fit: cover;" src="<?= base_url('uploads/' . esc($product['productImage'])) ?>" alt="<?= esc($product['productName']) ?>"
                    class="product-img mb-3">
            </div>

            <!-- Right Column for Product Info -->
            <div class="col-md-6">
                <h2 class="product-title"><?= esc($product['productName']) ?></h2>
                <p class="product-price">₹<?= number_format($product['productPrice'], 2) ?></p>
                <p class="product-description"><?= esc($product['productDescription']) ?></p>

                <div class="d-flex action-btns mt-3">
                    <!-- Checkout Form -->
                    <form action="<?= site_url('/product_view') ?>" method="post" class="me-3">
                        <?= csrf_field() ?>
                        <input type="hidden" name="product_id" value="<?= esc($product['id']) ?>">
                        <input type="hidden" name="product_name" value="<?= esc($product['productName']) ?>">
                        <input type="hidden" name="product_price" value="<?= esc($product['productPrice']) ?>">
                        <button type="button" class="btn btn-success"onclick="window.location.href = '<?= $user ? '/cart' : '/login' ?>';"><i class="bi bi-bag p-2"></i>Bag</button>
                    </form>
                    <!-- Buy Now Form -->
                    <form action="<?= site_url('product_view/' . esc($product['id'])) ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="product_id" value="<?= esc($product['id']) ?>">
                        <input type="hidden" name="product_name" value="<?= esc($product['productName']) ?>">
                        <input type="hidden" name="product_price" value="<?= esc($product['productPrice']) ?>">
                        <button type="button" class="btn btn-success"onclick="window.location.href = '<?= $user ? '/buy' : '/login' ?>';">Buy Now</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Offers Section -->
    <section class="bg-light py-5">
        <div class="container text-center">
            <h3>Check out our latest offers!</h3>
        </div>
    </section>
    <hr class="border-top border-1 border-success my-4 d-none d-sm-block">

       <!-- Footer -->
       <?= $this->include('footer'); ?>
       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?= $this->endSection() ?>
