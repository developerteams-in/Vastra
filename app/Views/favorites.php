<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorites</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="container py-5">
        <h1 class="mb-4 text-center">Favorites</h1>
        <div class="row">
            <!-- Product Card Start -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">Product Name</h5>
                        <p class="card-text text-muted">Price: <strong>$49.99</strong></p>
                        <p class="card-text">This is a short description of the product. It provides details about the product features and benefits.</p>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-success btn-sm">
                                <i class="fas fa-plus"></i> Add to Cart
                            </button>
                            <button class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Remove
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product Card End -->

            <!-- Duplicate Product Cards -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">Another Product</h5>
                        <p class="card-text text-muted">Price: <strong>$29.99</strong></p>
                        <p class="card-text">Description for the second product goes here. Highlights its key features.</p>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-success btn-sm">
                                <i class="fas fa-plus"></i> Add to Cart
                            </button>
                            <button class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Remove
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
