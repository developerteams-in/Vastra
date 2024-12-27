<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vastra Magazine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Adjusting only the images in cards and keeping the height consistent */
        .card-img-top {
            object-fit: cover;
            height: 250px; /* Fixed height for all images except specific sections */
        }

        /* Typing Effect CSS */
        @keyframes typing {
            0% { width: 0; }
            100% { width: 35%; }
        }

        .typing-effect {
            display: inline-block;
            width: 0;
            overflow: hidden;
            white-space: nowrap;
            border-right: 3px solid black; /* cursor effect */
            animation: typing 3s steps(30) 1s 1 normal both, blink 0.75s step-end infinite;
        }

        @keyframes blink {
            50% { border-color: transparent; }
        }
    </style>
</head>
<body>
<hr class="border-top border-1 border-success my-4 d-none d-sm-block">
<!-- Hero Section -->
<div class="container text-center py-5">
    <h1 class="display-4 text-danger">Vastra Magazine</h1>
    <p class="lead typing-effect">Your ultimate guide to fashion, trends, and lifestyle.</p>
</div>

<!-- Magazine Features Section -->
<div class="container">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100">
                <img src="https://images.unsplash.com/photo-1558769132-cb1aea458c5e?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTV8fGNsb3RoaCdzJTIwZmFzaGlvbnxlbnwwfHwwfHx8MA%3D%3D" class="card-img-top img-fluid" alt="Fashion Trends">
                <div class="card-body">
                    <h5 class="card-title">Latest Fashion Trends</h5>
                    <p class="card-text">Stay updated with the latest styles and trends in the fashion world. Discover seasonal collections and what’s trending in global fashion shows.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <img src="https://images.unsplash.com/photo-1504198458649-3128b932f49e?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fGNsb3RoaCdzJTIwZmFzaGlvbnxlbnwwfHwwfHx8MA%3D%3D" class="card-img-top img-fluid" alt="Style Tips">
                <div class="card-body">
                    <h5 class="card-title">Style Tips</h5>
                    <p class="card-text">Expert advice to elevate your wardrobe and express your personality. Learn about mix-and-match techniques, accessories, and wardrobe essentials.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <img src="https://cdn.pixabay.com/photo/2018/05/10/08/59/book-3387071_1280.jpg" class="card-img-top img-fluid" alt="Sustainable Fashion">
                <div class="card-body">
                    <h5 class="card-title">Sustainable Fashion</h5>
                    <p class="card-text">Explore eco-friendly clothing and ethical fashion choices. Learn how Vastra is contributing to a sustainable future.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Additional Information Section -->
<div class="container py-5">
    <!-- Section 1: Image Left, Text Right -->
    <div class="row g-4 align-items-center">
        <div class="col-md-6">
            <img src="https://cdn.pixabay.com/photo/2017/09/01/21/53/sunglasses-2705642_1280.jpg" class="img-fluid rounded" alt="Fashion Evolution">
        </div>
        <div class="col-md-6">
            <div class="text-start">
                <h3>Behind the Scenes at Vastra</h3>
                <p>Take a closer look at the creative process behind our designs. From sketching to fabric selection, learn how our team brings innovative fashion to life.</p>
            </div>
        </div>
    </div>

    <!-- Section 2: Text Left, Image Right -->
    <div class="row g-4 mt-4 align-items-center">
        <div class="col-md-6 order-md-2">
            <img src="https://cdn.pixabay.com/photo/2016/11/21/17/01/woman-1846475_1280.jpg" class="img-fluid rounded" alt="Behind the Scenes">
        </div>
        <div class="col-md-6 order-md-1">
            <div class="text-start">
                <h3>Fashion Through the Ages</h3>
                <p>Explore the evolution of fashion trends and how they shape our current designs. Vastra’s magazine dives deep into the history of style and its modern interpretations.</p>
            </div>
        </div>
    </div>
</div>

<hr class="border-top border-1 border-success my-4 d-none d-sm-block">
<!-- Footer -->
<?= $this->include('footer'); ?>
</body>
</html>
<?= $this->endSection() ?>
