<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-image: url('path_to_your_image.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
        span{
            color:red;
        }

        /* Hide image on mobile (<= 768px) */
        @media (max-width: 768px) {
            #login-img {
                display: none; /* Hide image on mobile devices */
            }
        }

    </style>
</head>
<body>
    <div class="container-fluid d-flex flex-column flex-md-row gap-0" >
        <!-- Left side: Image -->
 <div class="col-12 col-md-6 d-flex justify-content-center align-items-center position-relative">
 <h1 class="position-absolute top-40 start-50 translate-middle text-center text-white" style="font-size: 90px;"><span>Vastra</span></h1>
  <div class="">
    <h6 class="position-absolute top-50 start-50 translate-middle text-center py-4 text-white" style="width: 100%;">"Step into style—sign in to discover the latest trends at <span>Vastra</span>."</h6>
  </div>
  <img id="login-img" 
     src="https://plus.unsplash.com/premium_photo-1676890199183-7594728c3800?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8Y2xvdGgnc3xlbnwwfHwwfHx8MA%3D%3D" 
     alt="Vastra Clothing" 
     class="img-fluid object-cover" 
     style="width:100%; height:640px; position:relative; z-index:-1; opacity: 0.7;">

</div>

        <!-- Right side: Login form -->
        <div class="col-12 col-md-6 d-flex justify-content-center align-items-center bg-white p-4 rounded-end shadow-lg">
            <div class="w-100">
            <h2 class="font-bold text-center text-gray-800 mb-4" style="font-size: 22px;">Thanks for coming back!</h2>
                <?php if (session()->get('user')): ?>
                    <!-- Display logged-in user message -->
                    <div class="mb-4 text-success text-center">
                        <p>Welcome back, <?= session()->get('user')['name']; ?>!</p>
                    </div>
                <?php endif; ?>
                <form method="post" action="/login">
                    <?= csrf_field() ?> <!-- CSRF Token -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-10 mx-auto py-2 px-4 bg-black text-white text-center">Sign In</button>

                </form>

                <div class="mt-3 text-center">
                    <p>Don't have an account? <a href="/register" class="btn btn-link p-0">Become a Member</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>

<?= $this->endSection() ?>
