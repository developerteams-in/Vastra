<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<?php if (session()->getFlashdata('message')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('message') ?>
    </div>
<?php endif; ?>

<?php if (isset($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-image: url('path_to_your_image.jpg'); /* Optional Background image */
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
   #btn{
    background-color: #1a202c;
    color: white;
    padding: 10px 20px;
    border-radius: 10px;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
   }
   #btn:hover{
    background-color:red;
   }
        span {
            color: red;
        }

        /* Hide image on mobile (<= 768px) */
        @media (max-width: 768px) {
            #register-img {
                display: none; /* Hide image on mobile devices */
            }
        }

        
    </style>
</head>
<body>
    <div class="container-fluid d-flex flex-column flex-md-row gap-0">
        <!-- Left side: Image -->
        <div class="col-12 col-md-6 d-flex justify-content-center align-items-center position-relative">
            <h1 class="position-absolute top-40 start-50 translate-middle text-center text-white" style="font-size: 90px;">
                <span>Vastra</span>
            </h1>
            <div class="text-center position-absolute top-50 start-50 translate-middle text-white py-4" style="width: 100%;">
                "Step into style—sign up to discover the latest trends at <span>Vastra</span>."
            </div>
            <img id="register-img" 
                 src="https://plus.unsplash.com/premium_photo-1676890199183-7594728c3800?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8Y2xvdGgnc3xlbnwwfHwwfHx8MA%3D%3D" 
                 alt="Vastra Clothing"
                 class="img-fluid object-cover" 
                 style="width:100%; height:640px; position:relative; z-index:-1; opacity: 0.7;">
        </div>

        <!-- Right side: Register form -->
        <div class="col-12 col-md-6 d-flex justify-content-center align-items-center bg-white p-4 rounded-end shadow-lg">
            <div class="form-container">
                <h2 class="font-bold text-center text-gray-800 mb-4" style="font-size: 22px;">Join Us Today!</h2>
                <form method="post" action="/register">
                    <?= csrf_field() ?> <!-- CSRF Token -->

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= old('name') ?>" placeholder="Enter your name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" placeholder="Enter your email" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    </div>

                    <button type="submit" id="btn" class="btn btn-primary  w-100 py-2 px-4">Register</button>
                </form>
                
                <div class="mt-3 text-center">
                    <p>Already have an account? <a href="/login" class="btn btn-link p-0">Sign In</a></p>
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
