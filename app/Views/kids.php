<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vastra Responsive Design</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

  <style>
    #debug-icon{
    display: none !important;
}
    span{
        color:red;
    }
 .scroll-container {
    width: 100%;
    overflow-x: scroll;  /* Forces scrollbar to appear */
    overflow-y: hidden;  /* Disable vertical scroll */
    white-space: nowrap;  /* Prevent line breaks inside the container */
    padding-bottom: 10px; /* Optional padding for scrollbar spacing */
    position: relative;
}
a{
    color:black !important;
    text-decoration: none;
    list-style: none;
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

    </style>
  <style>
    
    body {
      font-family: Arial, sans-serif;
    }

    .brand-logo {
      font-size: 1.5rem;
      font-weight: bold;
      color: red;
    }
    .close-btn{
      display: none;
    } 
    .sidebar {
      display: block;
      transition: all 0.3s ease;
    }
    .filter-btn {
      display: none;
      background-color: #f8f9fa;
      border: none;
      padding: 10px 15px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      cursor: pointer;
    }
    .sidebar.open {
      transform: translateX(0);
    }

    
    .filter-btn .fa-filter {
      font-size: 1.2rem;
    }

    @media (max-width: 768px) {
      .filter-btn {
        display: inline-block;
        margin-bottom: 15px;
      }
      .close-btn {
      display: none;
      position: absolute;
      top: 10px;
      right: 10px;
      background: none;
      border: none;
      font-size: 1.5rem;
      cursor: pointer;
    }
    .close-btn {
        display: block;
      }

      .sidebar {

        position: absolute;
        z-index: 10;
        margin-top:0px;
        top: 0px;
        left: 0;
        height: 100vh;
        background-color: white;
        width: 350px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
      }
     
      .sidebar.hidden {
        transform: translateX(-500px);
      }

    }
  </style>
</head>
<body>
<header class="text-white text-center py-5"
    style="background: url('https://images.unsplash.com/photo-1611428813653-aa606c998586?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTAwfHxraWRzJTIwZmFzaGlvbnxlbnwwfHwwfHx8MA%3D%3D') no-repeat center center; background-size: cover;">
    <div class="container">
        <h1 class="display-4">Discover Our Latest Cloth's Styles for <span>Kids<span></h1>
        <p class="lead text-danger">Stylish Looks for Every Occasion</p>
    </div>
</header>


  <div class="container-fluid ">
    <div class="row">
      <!-- Sidebar Toggle Button -->
      <div class="col-12 text-end">
        <button class="filter-btn" onclick="toggleSidebar()">
          MORE
        </button>
      </div>

      <!-- Sidebar -->
      <div class="col-md-3 mt-5 sidebar hidden" id="sidebar">
          <button class="close-btn bg-black text-white w-4 h-2 border-redius-50 mt-5 pt-2" onclick="toggleSidebar()">&times;</button>
        <h5 class="mt-5 pt-2">Offers</h5>
        <ul>
          <a href=""><li>Member Exclusive Prices</li></a>
          <a href=""><li>Shirts: From ₹1499</li></a>
          <a href=""><li>Overshirts: From ₹1999</li></a>
        </ul>
        <h5 class="mt-4">Shop by Product</h5>
        <ul>
        <a href=""><li>T-Shirts & Tops</li></a>
        <a href=""><li>Hoodies & Sweatshirts</li></a>
        <a href=""><li>Basics</li></a>
        <a href=""><li>Blazers & Suits</li></a>
        <a href=""><li>Socks</li></a>
        <a href=""><li>Sportswear</li></a>
        </ul>
        <a href=""><h5 class="mt-4">Vastra Care</h5></a>
        <ul>
           <a href=""><li>Learn more about sustainability and product care.</li></a>
        </ul>
      </div>

      <!-- Main Content -->
      <div class="col-md-9">
        <div class="row">
        <div class="container bg-[#D0FFB2]">
        <section class="py-4">
            <h2 class="text-left mb-4">KIDS</h2>
            <div class="scroll-container py-3">
                <div class="product-cards d-flex gap-4">
                    <!-- Product Cards -->
                  <?php if (!empty($kids)): ?>
                    <?php foreach ($kids as $product): ?>
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
        </section>
        
</div>
</div>
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

     <!-- Footer -->
     <?= $this->include('footer'); ?>
  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById("sidebar");
      sidebar.classList.toggle("hidden");
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<?= $this->endSection() ?>
