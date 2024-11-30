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
    #line-separator {
      margin: 20px 0;
      border: 1px solid #ddd;
    }
a{
    color:black !important;
    text-decoration: none;
    list-style: none;
}
    .overlay-popup {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
    }

    .popup-container {
      background: white;
      padding: 20px;
      width: 80%;
      max-width: 800px;
      height:600px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      position: relative;
    }

    /* Style for the close button */
    .close-btn-popup {
      position: absolute;
      top: 10px;
      right: 10px;
      background-color: black;
      color: white;
      padding: 5px 10px;
      font-size: 18px;
      border-radius: 50%;
      cursor: pointer;
      border: none;
    }

    .close-btn-popup:hover {
      background-color: #333;
    }

    .product-details h2, .product-details p {
      margin: 10px 0;
    }

    .image-gallery {
      display: flex;
      gap: 10px;
    }

    .product-image {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 5px;
    }

    .size-buttons button {
      padding: 8px 12px;
      margin: 5px;
      border: 1px solid #ddd;
      border-radius: 5px;
      cursor: pointer;
    }

    .size-buttons button:hover {
      background-color: #f0f0f0;
    }

    .add-to-cart-btn {
      display: flex;
      align-items: center;
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #28a745;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .add-to-cart-btn:hover {
      background-color: #218838;
    }

    .open-popup-btn {
      padding: 10px 20px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin: 20px;
    }

    .open-popup-btn:hover {
      background-color: #0056b3;
    }
</style>
  </style>
<!-- popup code start here  -->
 <style>
     #line-2 {
      margin: 20px 0;
      border: 1px solid #ddd;
    }

    .popup-overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
    }

    .popup-content {
      background: white;
      padding: 20px;
      width: 80%;
      max-width: 800px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      position: relative;
    }

    /* Style for the close button */
    .close-btn {
      position: absolute;
      top: 10px;
      right: 10px;
      background-color: black;
      color: white;
      padding: 5px 10px;
      font-size: 18px;
      border-radius: 50%;
      cursor: pointer;
      border: none;
    }

    .close-btn:hover {
      background-color: #333;
    }

    .product-info h2, .product-info p {
      margin: 10px 0;
    }

    .product-images {
      display: flex;
      gap: 10px;
    }

    .product-image {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 5px;
    }

    .product-sizes button {
      padding: 8px 12px;
      margin: 5px;
      border: 1px solid #ddd;
      border-radius: 5px;
      cursor: pointer;
    }

    .product-sizes button:hover {
      background-color: #f0f0f0;
    }

    .add-to-bag {
      display: flex;
      align-items: center;
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #28a745;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .add-to-bag:hover {
      background-color: #218838;
    }

    .open-popup-btn {
      padding: 10px 20px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin: 20px;
    }

    .open-popup-btn:hover {
      background-color: #0056b3;
    }
    </style>
 <!-- popup code end here  -->
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
    <header class="text-white text-center py-5 position-relative top-0 " style="height: 60vh; overflow: hidden;">
    <!-- Video Background -->
    <video autoplay loop muted playsinline 
        class="absolute top-0 left-0 w-full h-full object-cover" style="opacity:0.7">
        <source src="<?= base_url('videos/back.mp4'); ?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Content (Text and Button on Video) -->
    <div class="container position-absolute text-center" style="z-index:99; top:25%;">
        <!-- Optional Dark Overlay for Better Contrast -->
        <div class=" p-5 rounded-md">
            <h1 class="display-4" style="z-index:-1;">Discover Our Latest Styles</h1>
            <p class="lead">Fresh Looks for Every Occasion</p>
            <a href="/product_view" class="btn btn-light btn-lg"style="z-index:0;">Shop Now</a>
        </div>
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
                        <a href="<?= site_url('product_view/' . $product['id']) ?>">
                        <div class="card" style="width: 220px; height: 350px;">
                            <img class="card-img-top img-fluid" 
                                 src="<?= base_url('uploads/' . htmlspecialchars($product['productImage'], ENT_QUOTES, 'UTF-8')) ?>"  
                                 alt="<?= htmlspecialchars($product['productName'], ENT_QUOTES, 'UTF-8') ?>" 
                                 style="object-fit: cover; height: 65%; width: 100%;">
                                 <div class="card-body text-center p-2">
                                     <h5 class="card-title text-truncate" style="font-size: 0.8rem;">
                                         <?= htmlspecialchars($product['productName'], ENT_QUOTES, 'UTF-8') ?>
                                        </h5>
                                        <h5 class="card-title text-truncate" style="font-size: 0.5rem;">
                                            <?= htmlspecialchars($product['productDescription'], ENT_QUOTES, 'UTF-8') ?>
                                        </h5>
                                        <p class="card-text" style="font-size: 0.75rem;">
                                            ₹<?= htmlspecialchars($product['productPrice'], ENT_QUOTES, 'UTF-8') ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
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
                        <a href="/product_view">
                        <div class="card" style="width: 220px; height: 350px;">
                            <img class="card-img-top img-fluid" 
                                 src="<?= base_url('uploads/' . htmlspecialchars($product['productImage'], ENT_QUOTES, 'UTF-8')) ?>"  
                                 alt="<?= htmlspecialchars($product['productName'], ENT_QUOTES, 'UTF-8') ?>" 
                                 style="object-fit: cover; height: 65%; width: 100%;">
                            <div class="card-body text-center p-2">
                                <h5 class="card-title text-truncate" style="font-size: 0.8rem;">
                                    <?= htmlspecialchars($product['productName'], ENT_QUOTES, 'UTF-8') ?>
                                </h5>
                                <h5 class="card-title text-truncate" style="font-size: 0.5rem;">
                                    <?= htmlspecialchars($product['productDescription'], ENT_QUOTES, 'UTF-8') ?>
                                </h5>
                                <p class="card-text" style="font-size: 0.75rem;">
                                    ₹<?= htmlspecialchars($product['productPrice'], ENT_QUOTES, 'UTF-8') ?>
                                </p>
                            </div>
                        </div>
                        </a>
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
                        <a href="<?= site_url('product_view/' . $product['id']) ?>">
                        <div class="card" style="width: 220px; height: 350px;">
                            <img class="card-img-top img-fluid" 
                                 src="<?= base_url('uploads/' . htmlspecialchars($product['productImage'], ENT_QUOTES, 'UTF-8')) ?>"  
                                 alt="<?= htmlspecialchars($product['productName'], ENT_QUOTES, 'UTF-8') ?>" 
                                  style="object-fit: cover; height: 65%; width: 100%;">
                            <div class="card-body text-center p-2">
                                <h5 class="card-title text-truncate" style="font-size: 0.8rem;">
                                    <?= htmlspecialchars($product['productName'], ENT_QUOTES, 'UTF-8') ?>
                                </h5>
                                <h5 class="card-title text-truncate" style="font-size: 0.5rem;">
                                    <?= htmlspecialchars($product['productDescription'], ENT_QUOTES, 'UTF-8') ?>
                                </h5>
                                <p class="card-text" style="font-size: 0.75rem;">
                                    ₹<?= htmlspecialchars($product['productPrice'], ENT_QUOTES, 'UTF-8') ?>
                                </p>
                                
                            </div>
                        </div>
                        </a>
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
                        <a href="<?= site_url('product_view/' . $product['id']) ?>">
                        <div class="card" style="width: 220px; height: 350px;">
                            <img class="card-img-top img-fluid" 
                                 src="<?= base_url('uploads/' . htmlspecialchars($product['productImage'], ENT_QUOTES, 'UTF-8')) ?>"  
                                 alt="<?= htmlspecialchars($product['productName'], ENT_QUOTES, 'UTF-8') ?>" 
                                 style="object-fit: cover; height: 65%; width: 100%;">
                            <div class="card-body text-center p-2">
                                <h5 class="card-title text-truncate" style="font-size: 0.6rem;">
                                    <?= htmlspecialchars($product['productName'], ENT_QUOTES, 'UTF-8') ?>
                                </h5>
                                <h5 class="card-title text-truncate" style="font-size: 0.5rem;">
                                    <?= htmlspecialchars($product['productDescription'], ENT_QUOTES, 'UTF-8') ?>
                                </h5>
                                <p class="card-text" style="font-size: 0.75rem;">
                                    ₹<?= htmlspecialchars($product['productPrice'], ENT_QUOTES, 'UTF-8') ?>
                                </p>
                            </div>
                        </div>
                        </a>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No products found in this category.</p>
                <?php endif; ?>
             
        </section>
    </div>

    <hr class="border-top border-1 border-success my-4 d-none d-sm-block">

<!-- Partner Section -->
<h4 class="text-center  mb-4">PARTNER</h4>
  <div class="w-10 h-auto py-4 pb-5" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
  <img src="<?= base_url('images/logo.png') ?>" style="width: 50%;" alt="Logo">
  </div>
<!-- JavaScript -->
<hr class="border-top border-1 border-success my-4 d-none d-sm-block">

<header class="text-center text-success  py-5 mb-12" style="height: 200px;">
      <h1 class="display-4 fw-bold text-4xl sm:text-6xl md:text-8xl lg:text-9xl opacity-4 mb-4 sm:mb-0">SHOP NOW</h1>
      <p class="lead fw-bold text-2xl sm:text-4xl md:text-6xl lg:text-7xl opacity-4">| Explore Collections</p>
</header>

<hr class="border-top border-1 border-success my-4 d-none d-sm-block">


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
   
</body>

</html>

<?= $this->endSection() ?>