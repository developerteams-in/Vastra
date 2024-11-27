<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vastra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
 .scroll-container {
    width: 100%;
    overflow-x: scroll;  /* Forces scrollbar to appear */
    overflow-y: hidden;  /* Disable vertical scroll */
    white-space: nowrap;  /* Prevent line breaks inside the container */
    padding-bottom: 10px; /* Optional padding for scrollbar spacing */
    position: relative;
}
.product-cards {
    display: flex;  /* Flexbox ensures cards are aligned horizontally */
    gap: 20px;  /* Space between product cards */
}
.card {
    flex: 0 0 auto;  /* Prevent cards from stretching */
    width: 220px;
    height: 350px;
    transition: transform 0.3s ease-in-out;
    cursor: pointer;
}
.card:hover {
    transform: scale(1.05);  /* Optional hover effect */
}
/* Customize scrollbar in Webkit browsers (Chrome, Safari) */
.scroll-container::-webkit-scrollbar {
    overflow-y: hidden;
    display: none !important;

}
.scroll-container::-webkit-scrollbar-thumb {
    background-color: rgba(0, 0, 0, 0.5);  /* Color of the thumb */
    border-radius: 10px;
}
.scroll-container::-webkit-scrollbar-track {
    background-color: #f1f1f1;  /* Track color */
}

#debug-icon{
    display: none !important;
}
    </style>
</head>

<body>

    <!-- Hero Section -->
    <!-- Hero Section -->
    <header class="text-white text-center py-5"
        style="background: url('https://plus.unsplash.com/premium_photo-1695575593603-1f42ca27bb6d?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjV8fGZhc2hpb258ZW58MHx8MHx8fDA%3D') no-repeat center center; background-size: cover;">
        <div class="container">
            <h1 class="display-4">Discover Our Latest Styles</h1>
            <p class="lead">Fresh Looks for Every Occasion</p>
            <a href="#" class="btn btn-light btn-lg">Shop Now</a>
        </div>
    </header>
    <!-- Featured Products -->
    <div class="container bg-[#D0FFB2]">
        <section class="py-4">
            <h2 class="text-left mb-4">NEW ARRIVALS</h2>
            <div class="scroll-container py-3">
         <div class="product-cards d-flex gap-4">
                   <!-- Product Cards -->
                   <?php if (!empty($newarrivals)): ?>
                    <?php foreach ($newarrivals as $product): ?>
                        <div class="card" style="width: 220px; height: 350px;">
                            <img class="card-img-top img-fluid" 
                                 src="<?= base_url('uploads/' . htmlspecialchars($product['productImage'], ENT_QUOTES, 'UTF-8')) ?>"  
                                 alt="<?= htmlspecialchars($product['productName'], ENT_QUOTES, 'UTF-8') ?>" 
                                 style="object-fit: cover; height: 70%; width: 100%;">
                            <div class="card-body text-center p-2">
                                <h5 class="card-title text-truncate" style="font-size: 0.8rem;">
                                    <?= htmlspecialchars($product['productName'], ENT_QUOTES, 'UTF-8') ?>
                                </h5>
                                <p class="card-text" style="font-size: 0.75rem;">
                                    ₹<?= htmlspecialchars($product['productPrice'], ENT_QUOTES, 'UTF-8') ?>
                                </p>
                                <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No products found in this category.</p>
                <?php endif; ?>
</div>
</div>
</section>
<section class="py-4">
<h2 class="text-left mb-4">KIDS</h2>
<div class="scroll-container py-3">
<div class="product-cards d-flex gap-4">
<!-- Product Cards -->
<!-- Product Cards -->
<?php if (!empty($kids)): ?>
                    <?php foreach ($kids as $product): ?>
                        <div class="card" style="width: 220px; height: 350px;">
                            <img class="card-img-top img-fluid" 
                                 src="<?= base_url('uploads/' . htmlspecialchars($product['productImage'], ENT_QUOTES, 'UTF-8')) ?>"  
                                 alt="<?= htmlspecialchars($product['productName'], ENT_QUOTES, 'UTF-8') ?>" 
                                 style="object-fit: cover; height: 70%; width: 100%;">
                            <div class="card-body text-center p-2">
                                <h5 class="card-title text-truncate" style="font-size: 0.8rem;">
                                    <?= htmlspecialchars($product['productName'], ENT_QUOTES, 'UTF-8') ?>
                                </h5>
                                <p class="card-text" style="font-size: 0.75rem;">
                                    ₹<?= htmlspecialchars($product['productPrice'], ENT_QUOTES, 'UTF-8') ?>
                                </p>
                                <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No products found in this category.</p>
                <?php endif; ?>
</div>
</div>
</section>
        <section class="py-4">
            <h2 class="text-left mb-4">LADIES</h2>
            <div class="scroll-container py-3">
                <div class="product-cards d-flex gap-4">
                   
<!-- Product Cards -->
<?php if (!empty($ladies)): ?>
                    <?php foreach ($ladies as $product): ?>
                        <div class="card" style="width: 220px; height: 350px;">
                            <img class="card-img-top img-fluid" 
                                 src="<?= base_url('uploads/' . htmlspecialchars($product['productImage'], ENT_QUOTES, 'UTF-8')) ?>"  
                                 alt="<?= htmlspecialchars($product['productName'], ENT_QUOTES, 'UTF-8') ?>" 
                                 style="object-fit: cover; height: 70%; width: 100%;">
                            <div class="card-body text-center p-2">
                                <h5 class="card-title text-truncate" style="font-size: 0.8rem;">
                                    <?= htmlspecialchars($product['productName'], ENT_QUOTES, 'UTF-8') ?>
                                </h5>
                                <p class="card-text" style="font-size: 0.75rem;">
                                    ₹<?= htmlspecialchars($product['productPrice'], ENT_QUOTES, 'UTF-8') ?>
                                </p>
                                <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No products found in this category.</p>
                <?php endif; ?>
                </div>
            </div>
        </section>
    <section class="py-4">
            <h2 class="text-left mb-4">MEN</h2>
            <div class="scroll-container py-3">
                <div class="product-cards d-flex gap-4">
 <!-- Product Cards -->
               <?php if (!empty($men)): ?>
                    <?php foreach ($men as $product): ?>
                        <div class="card" style="width: 220px; height: 350px;">
                            <img class="card-img-top img-fluid" 
                                 src="<?= base_url('uploads/' . htmlspecialchars($product['productImage'], ENT_QUOTES, 'UTF-8')) ?>"  
                                 alt="<?= htmlspecialchars($product['productName'], ENT_QUOTES, 'UTF-8') ?>" 
                                 style="object-fit: cover; height: 70%; width: 100%;">
                            <div class="card-body text-center p-2">
                                <h5 class="card-title text-truncate" style="font-size: 0.8rem;">
                                    <?= htmlspecialchars($product['productName'], ENT_QUOTES, 'UTF-8') ?>
                                </h5>
                                <p class="card-text" style="font-size: 0.75rem;">
                                    ₹<?= htmlspecialchars($product['productPrice'], ENT_QUOTES, 'UTF-8') ?>
                                </p>
                                <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No products found in this category.</p>
                <?php endif; ?>
             
        </section>
    </div>
    <h4 class="text-center py-3 mb-4">PARTNER</h4>
    <div class="w-10 h-auto py-4 pb-5" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <img src="<?= base_url('images/logo.png') ?>" style="width: 50%;" alt="Logo">
    </div>

    <!-- Add Bootstrap Icons CDN -->


   <!-- Offers Section -->
   <section class="py-5" style="background-color: #D0FFB2; opacity: 0.7;">
    <div class="container text-center text-capitalize fw-bold">
        <h1 class="fw-bold text-start display-1" style="font-size: 300px; line-height: 0.8; opacity: 0.3; color: red;">UNIQUE</h1>
        <h1 class="fw-bold" style="font-size: 300px; opacity: 0.3; color: red;">FASHION</h1>
    </div>
</section>


    <!-- Offers Section -->
    <section class="bg-light py-5">
        <div class="container text-center">
            <h2>Special Offers</h2>
            <p>Up to 50% off on select items</p>
            <a href="#" class="btn bg-black text-white fw-bold">Shop now</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                <h5 class="text-black" style="font-size: 15px; margin-bottom:120px;">INDIA|₹</h5>
                    <ul class="list-unstyled">
                        <h5 class="text-danger fw-bold">VASTRA</h5>
                    </ul>
                </div>
                <div class="col-md-2">
                     <h5 class="fs-6">SHOP</h5>
                     <ul class="list-unstyled" style="font-size: 12px;">
                     <li style="margin-bottom: 10px;"><a href="#" class="text-black text-decoration-none">Ladies</a></li>
                     <li style="margin-bottom: 10px;"><a href="#" class="text-black text-decoration-none">Men</a></li>
                    <li style="margin-bottom: 10px;"><a href="#" class="text-black text-decoration-none">Body</a></li>
                    <li style="margin-bottom: 10px;"><a href="#" class="text-black text-decoration-none">Kids</a></li>
                    <li  style="margin-bottom: 10px;"><a href="#" class="text-black text-decoration-none">Sport</a></li>
                   </ul>
                  </div>

                <div class="col-md-2">
                    <h5 class="fs-6">CORPORATE INFO</h5>
                    <ul class="list-unstyled"style="font-size: 12px;">
                        <li style="margin-bottom: 10px;"><a href="#" class="text-black text-decoration-none">Career</a></li>
                        <li style="margin-bottom: 10px;"><a href="#" class="text-black text-decoration-none">About</a></li>
                        <li  style="margin-bottom: 10px;"><a href="#" class="text-black text-decoration-none">Group</a></li>
                        <li  style="margin-bottom: 10px;"><a href="#" class="text-black text-decoration-none">Press</a></li>
                        <li  style="margin-bottom: 10px;"><a href="#" class="text-black text-decoration-none">Investor relations</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="fs-6">HELPS</h5>
                    <ul class="list-unstyled"style="font-size: 12px;gap: 15px;">
                        <li  style="margin-bottom: 10px;"><a href="#" class="text-black text-decoration-none ">Customer service</a></li>
                        <li  style="margin-bottom: 10px;"><a href="#" class="text-black text-decoration-none">Contact</a></li>
                        <li  style="margin-bottom: 10px;"><a href="#" class="text-black text-decoration-none">Report a scam</a></li>
                        <li  style="margin-bottom: 10px;"><a href="#" class="text-black text-decoration-none">Cookie Notice</a></li>
                        <li  style="margin-bottom: 10px;"><a href="#" class="text-black text-decoration-none">Cookie Settings</a></li>
                    </ul>
                </div>
                <div class="col-md-2 "style="font-size: 13px;">
                <ul class="list-unstyled"style="font-size: 12px;">
                    <p>Sign up now to get exclusive offers, the latest fashion updates, and styling tips. Be the first to discover new trends and discounts. Stay inspired and elevate your wardrobe effortlessly!</p>
                    <a href="#" class="text-black text-decoration-none">Read More<i class="bi bi-arrow-right-short fs-6"></i></a>
                </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?= $this->endSection() ?>