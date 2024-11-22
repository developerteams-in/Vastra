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
        style="background: url('https://images.unsplash.com/photo-1543728069-a3f97c5a2f32?q=80&w=2938&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center; background-size: cover;">
        <div class="container">
        <h1 class="display-4">Discover Our Latest Cloth's Styles for <span>Ladies</span></h1>
            <p class="lead">Stylish Looks for Every Moment</p>
        </div>
    </header>

  <div class="container-fluid mt-4">
    <div class="row">
      <!-- Sidebar Toggle Button -->
      <div class="col-12 text-end">
        <button class="filter-btn" onclick="toggleSidebar()">
          <i class="fa fa-filter"></i> Filter
        </button>
      </div>

      <!-- Sidebar -->
       <div class="col-md-3 mt-5 sidebar hidden" id="sidebar">
          <button class="close-btn bg-black text-white w-4 h-2 border-redius-50 mt-5 pt-2" onclick="toggleSidebar()">&times;</button>
        <h5 class="mt-5 pt-2">Offers</h5>
        <ul>
          <li>Member Exclusive Prices</li>
          <li>Shirts: From ₹1499</li>
          <li>Overshirts: From ₹1999</li>
        </ul>
        <h5 class="mt-4">Shop by Product</h5>
        <ul>
          <li>T-Shirts & Tops</li>
          <li>Hoodies & Sweatshirts</li>
          <li>Basics</li>
          <li>Blazers & Suits</li>
          <li>Socks</li>
          <li>Sportswear</li>
        </ul>
        <h5 class="mt-4">Vastra Care</h5>
        <ul>
          <li>Learn more about sustainability and product care.</li>
        </ul>
      </div>

      <!-- Main Content -->
      <div class="col-md-9">
        <div class="row">
        <div class="container bg-[#D0FFB2]">
        <section class="py-4">
            <h2 class="text-left mb-4">NEW ARRIVALS</h2>
            <div class="scroll-container py-3">
                <div class="product-cards d-flex gap-4">
                    <!-- Product Card 1 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://cdn.pixabay.com/photo/2024/08/24/05/02/woman-8993222_1280.jpg"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
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

                    <!-- Product Card 2 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://cdn.pixabay.com/photo/2016/06/17/09/54/woman-1462985_1280.jpg"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
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
                    <!-- Product Card 2 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://cdn.pixabay.com/photo/2022/02/04/12/49/woman-6992691_1280.jpg"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
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
                    <!-- Product Card 2 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://images.unsplash.com/photo-1515511624704-b8916dcc30ea?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTE1fHxmYXNoaW9ufGVufDB8fDB8fHww"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
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
                    <!-- Product Card 2 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://cdn.pixabay.com/photo/2020/10/23/16/50/woman-5679284_1280.jpg"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
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

                    <!-- Product Card 3 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://cdn.pixabay.com/photo/2023/06/02/21/24/portrait-8036356_1280.jpg"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
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

                    <!-- Product Card 4 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://cdn.pixabay.com/photo/2021/03/22/16/07/woman-6115105_1280.jpg"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
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

                    <!-- Product Card 5 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://cdn.pixabay.com/photo/2019/08/07/07/05/woman-4390055_1280.jpg"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
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
                </div>
            </div>
        </section>
        
</div>
</div>
</div>

  <!-- Partner Section -->
  <h4 class="text-center py-3 mb-4">PARTNER</h4>
    <div class="w-10 h-auto py-4 pb-5" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <img src="<?= base_url('images/logo.png') ?>" style="width: 50%;" alt="Logo">
    </div>
  <!-- JavaScript -->

  <header class="text-success text-center py-5"
        style="background: url('https://images.unsplash.com/photo-1570833181606-e694d0560b0c?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjE0fHxsYWRpZXMlMjBmYXNoaW9uJTIwYmFubmVyJTIwZm9yJTIwc29jaWFsJTIwbWVkaWF8ZW58MHx8MHx8fDA%3D') no-repeat center center; background-size: cover; opacity: 0.7;">
        <div class="container">
        <h1 class="display-4 fw-bold" style="font-size:200px; float:left;opacity: 4; ">SHOP NOW</h1>
            <p class="lead fw-bold" style="font-size:90px; float:right;opacity: 4;">|Explore Collections</p>
        </div>
    </header>


    <!-- Footer -->
    <footer class="bg-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                <h5 class="text-black" style="font-size: 15px; margin-bottom:120px;">INDIA|₹</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#" class="text-black text-decoration-none"></a></li>
                        <li><a href="#" class="text-black text-decoration-none"></a></li>
                        <li><a href="#" class="text-black text-decoration-none"></a></li>
                        <h5 class="text-danger fw-bold">VASTRA</h5>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5 class="fs-6">SHOP</h5>
                    <ul class="list-unstyled " style="font-size: 12px;">
                        <li><a href="#" class="text-black text-decoration-none">Ladies</a></li>
                        <li><a href="#" class="text-black text-decoration-none">Men</a></li>
                        <li><a href="#" class="text-black text-decoration-none">Body</a></li>
                        <li><a href="#" class="text-black text-decoration-none">Kids</a></li>
                        <li><a href="#" class="text-black text-decoration-none">Sport</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5 class="fs-6">CORPORATE INFO</h5>
                    <ul class="list-unstyled"style="font-size: 12px;">
                        <li><a href="#" class="text-black text-decoration-none">Career</a></li>
                        <li><a href="#" class="text-black text-decoration-none">About</a></li>
                        <li><a href="#" class="text-black text-decoration-none">Group</a></li>
                        <li><a href="#" class="text-black text-decoration-none">Press</a></li>
                        <li><a href="#" class="text-black text-decoration-none">Investor relations</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="fs-6">HELPS</h5>
                    <ul class="list-unstyled"style="font-size: 12px;">
                        <li><a href="#" class="text-black text-decoration-none">Customer service</a></li>
                        <li><a href="#" class="text-black text-decoration-none">Contact</a></li>
                        <li><a href="#" class="text-black text-decoration-none">Report a scam</a></li>
                        <li><a href="#" class="text-black text-decoration-none">Cookie Notice</a></li>
                        <li><a href="#" class="text-black text-decoration-none">Cookie Settings</a></li>
                        <li class="nav-item"><a class="nav-link text-danger fw-bold py-2"href="/admin"><ins>Vastra Admin</ins></a></li>
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