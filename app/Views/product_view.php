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
    <title><?= esc($product['productName']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Center the custom alert message */
        .custom-alert {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            padding: 20px;
            background-color: #dc3545;  /* Red for error messages */
            color: white;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 5px;
            text-align: center;
            display: none;
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .custom-alert.show {
            display: block;
            opacity: 1;
        }

        .custom-alert.fade-out {
            opacity: 0;
            transition: opacity 1s ease-out;
        }

        /* Alert Styling */
        .alert {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            padding: 20px;
            background-color: #28a745; /* Green for success messages */
            color: white;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 5px;
            text-align: center;
            display: none;
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .alert.show {
            display: block;
            opacity: 1;
        }

        .alert.fade-out {
            opacity: 0;
            transition: opacity 1s ease-out;
        }

        .size-btn.btn-selected {
            background-color: #e67e22 !important;
            color: white;
        }

        .product-sizes {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 5px;
            margin-bottom: 15px;
            font-size: 1rem;
            color: #7f8c8d;
        }

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
            border: 1px solid black;
        }

        .quantity-btns {
            display: flex;
            align-items: center;
            font-size: 1rem;
            color: #7f8c8d;
        }

        #product_quantity {
            border: none;
        }

        .quantity-btns button {
            width: 40px;
            height: 40px;
            font-size: 20px;
        }

        /* Responsive Image Styling */
        @media (max-width: 768px) {
            .product-img {
                max-width: 100%;
                height: auto;
            }
        }
    </style>
</head>

<body>
    <!-- Success Alert -->
    <div id="cart-alert" class="alert">
        Item added to cart successfully!
    </div>

    <div class="container product-details-container">
        <div class="row">
            <!-- Left Column for Product Image -->
            <div class="col-md-6 product-image-container">
                <img style="max-height: 500px; object-fit: cover;" src="<?= base_url('uploads/' . esc($product['productImage'])) ?>" alt="<?= esc($product['productName']) ?>" class="product-img mb-3">
            </div>

            <!-- Right Column for Product Info -->
            <div class="col-md-6">
                <h6>Product Details:</h6>
                <h2 class="product-title"><?= esc($product['productName']) ?></h2>
                <p class="product-price" id="price">₹<?= number_format($product['productPrice'], 2) ?></p>
                <p class="product-description"><?= esc($product['productDescription']) ?></p>
                
                <!-- Size Selection Section -->
                <div class="product-sizes col-md-4 mb-4 mt-4">
                    <h6>Sizes:</h6>
                    <button type="button" class="size-btn bg-black text-white border border-0 rounded">XS</button>
                    <button type="button" class="size-btn bg-black text-white border border-0 rounded">S</button>
                    <button type="button" class="size-btn bg-black text-white border border-0 rounded">M</button>
                    <button type="button" class="size-btn bg-black text-white border border-0 rounded">L</button>
                    <button type="button" class="size-btn bg-black text-white border border-0 rounded">XL</button>
                </div>

                <input type="hidden" name="selected_sizes" id="hidden-sizes" value="">

                <!-- Quantity Selection with + and - buttons -->
                <h6 class="mb-3 mt-4" style="color: #7f8c8d;">Quantity</h6>
                <div class="quantity-btns mb-3 mt-4">
                    <button type="button" id="decrease-quantity" class="btn btn-secondary">-</button>
                    <input type="text" id="product_quantity" class="form-control" value="1" min="1" style="width: 60px; text-align: center;">
                    <button type="button" id="increase-quantity" class="btn btn-secondary">+</button>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex action-btns mt-3">
                    <?php if (isset($user) && $user): ?>
                    <button type="button" class="btn btn-danger me-3 add-to-cart" 
                        data-id="<?= esc($product['id']) ?>" 
                        data-name="<?= esc($product['productName']) ?>" 
                        data-price="<?= esc($product['productPrice']) ?>" 
                        data-quantity="1"
                        data-image="<?= esc($product['productImage']) ?>">
                        Add to Cart
                    </button>
                    <?php else: ?>
                    <a href="<?= site_url('login') ?>" class="btn btn-danger me-3">
                        Add to Cart
                    </a>
                    <?php endif; ?>
                    <?php if (isset($user) && $user): ?>
                    <button type="button" class="btn btn-danger btn-buy-now add-to-cart" 
                        data-id="<?= esc($product['id']) ?>" 
                        data-name="<?= esc($product['productName']) ?>" 
                        data-price="<?= esc($product['productPrice']) ?>" 
                        data-quantity="1"
                        data-image="<?= esc($product['productImage']) ?>"
                        data-size="M">
                        Buy Now
                    </button>
                    <?php else: ?>
                    <a href="<?= site_url('login') ?>" class="btn btn-danger me-3">
                        Buy Now
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
   <!-- Bootstrap JavaScript -->
      <!-- Custom Error Alert -->
<div id="custom-alert" class="custom-alert">
    Please select a size
</div>

<script>
 $(document).ready(function () {
    // Quantity Decrease Button
    $('#decrease-quantity').click(function () {
        let currentQuantity = parseInt($('#product_quantity').val());
        if (currentQuantity > 1) {
            $('#product_quantity').val(currentQuantity - 1);
        }
    });

    // Quantity Increase Button
    $('#increase-quantity').click(function () {
        let currentQuantity = parseInt($('#product_quantity').val());
        $('#product_quantity').val(currentQuantity + 1);
    });

    // Add to Cart functionality
    $('.add-to-cart').click(function () {
        const productId = $(this).data('id');
        const productQuantity = $('#product_quantity').val();
        const productName = $(this).data('name');
        const productSize = $('#hidden-sizes').val();
        const productImage = $(this).data('image');
        const productPrice = $(this).data('price');

        if (!productSize) {
            // Show custom alert if size is not selected
            $('#custom-alert').addClass('show');  // Show alert
            setTimeout(function () {
                $('#custom-alert').removeClass('show');  // Hide alert after 3 seconds
            }, 3000);
            return;
        }

        // Immediate UI feedback
        $('#cart-alert').addClass('show');  // Show success alert
        setTimeout(function () {
            $('#cart-alert').removeClass('show');  // Hide after 3 seconds
        }, 3000);

        // Send AJAX request
        $.ajax({
            url: '/cart/add',
            method: 'POST',
            data: {
                product_id: productId,
                product_quantity: productQuantity,
                product_name: productName,
                product_size: productSize,
                product_image: productImage,
                product_price: productPrice,
                csrf_token: "<?= csrf_token() ?>"
            },
            success: function (response) {
                if (response.status) {
                    // Redirection after AJAX success
                    setTimeout(function () {
                        window.location.href = "<?= site_url('cart') ?>";  // Redirect to cart after 3 seconds
                    }, 1000);
                } else {
                    alert(response.message);
                }
            },
        });
    });

    // Size Selection functionality
    $('.size-btn').click(function () {
        $('.size-btn').removeClass('btn-selected');
        $(this).addClass('btn-selected');
        const size = $(this).text();
        $('#hidden-sizes').val(size);
    });

    // Buy Now Button functionality
    $('.btn-buy-now').click(function () {
        const productSize = $('#hidden-sizes').val();  // Get selected size
        if (!productSize) {
            // Show alert if size is not selected
            $('#custom-alert').addClass('show');
            setTimeout(function () {
                $('#custom-alert').removeClass('show');
            }, 3000);
            return;  // Prevent redirect if no size is selected
        }

        // Redirect to the address page if size is selected
        window.location.href = '/address';  // Change '/address' to your actual address page URL
    });
});

</script>

</body>
</html>
<?= $this->endSection() ?>
