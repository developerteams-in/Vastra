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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            border: 1px solid black;
        }

        .quantity-btns {
            display: flex;
            align-items: center;
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
    <div class="container product-details-container">
        <div class="row">
            <!-- Left Column for Product Image -->
            <div class="col-md-6 product-image-container">
                <img style="max-height: 500px; object-fit: cover;" src="<?= base_url('uploads/' . esc($product['productImage'])) ?>" alt="<?= esc($product['productName']) ?>"
                    class="product-img mb-3">
            </div>

            <!-- Right Column for Product Info -->
            <div class="col-md-6">
                <h2 class="product-title"><?= esc($product['productName']) ?></h2>
                <p class="product-price" id="price">₹<?= number_format($product['productPrice'], 2) ?></p>
                <p class="product-description"><?= esc($product['productDescription']) ?></p>
                
                <!-- Quantity Selection with + and - buttons -->
                <h6>Quantity</h6>
                <div class="quantity-btns mb-3">
                    <button type="button" id="decrease-quantity" class="btn btn-secondary">-</button>
                    <input type="number" id="product_quantity" class="form-control" value="1" min="1" style="width: 60px; text-align: center;">
                    <button type="button" id="increase-quantity" class="btn btn-secondary">+</button>
                </div>

                <!-- Display Total Price Based on Quantity -->
                <h6 class="product-price" >Total Price: ₹<span id="total-price"><?= number_format($product['productPrice'], 2) ?></span></h6>

                <div class="d-flex action-btns mt-3">
                    <!-- Add to Cart Button -->
                    <button type="button" class="btn btn-success add-to-cart" data-id="<?= esc($product['id']) ?>" data-name="<?= esc($product['productName']) ?>" data-price="<?= esc($product['productPrice']) ?>" data-quantity="1">
                        <i class="bi bi-bag p-2"></i> Add to Cart
                    </button>
                    <!-- Buy Now Form -->
                    <form action="<?= site_url('checkout/' . esc($product['id'])) ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="product_id" value="<?= esc($product['id']) ?>">
                        <input type="hidden" name="product_name" value="<?= esc($product['productName']) ?>">
                        <input type="hidden" name="product_price" value="<?= esc($product['productPrice']) ?>">
                        <input type="hidden" name="quantity" id="hidden-quantity" value="1">
                        <button type="submit" class="btn btn-success ">Buy Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Function to update the total price based on quantity
            function updateTotalPrice() {
                var quantity = $('#product_quantity').val();
                var pricePerProduct = <?= esc($product['productPrice']) ?>;
                var totalPrice = pricePerProduct * quantity;
                $('#total-price').text(totalPrice.toFixed(2));
                $('#hidden-quantity').val(quantity); // Update the hidden quantity field for the form
            }

            // Increase quantity
            $('#increase-quantity').click(function() {
                var quantity = parseInt($('#product_quantity').val());
                $('#product_quantity').val(quantity + 1);
                updateTotalPrice();
            });

            // Decrease quantity
            $('#decrease-quantity').click(function() {
                var quantity = parseInt($('#product_quantity').val());
                if (quantity > 1) {
                    $('#product_quantity').val(quantity - 1);
                    updateTotalPrice();
                }
            });

            // Update the price when quantity is changed manually
            $('#product_quantity').on('input', function() {
                updateTotalPrice();
            });

            // Add to Cart functionality
            $('.add-to-cart').click(function() {
                var productId = $(this).data('id');
                var quantity = $('#product_quantity').val();

                $.ajax({
                    url: '<?= site_url('product_view/cart') ?>',
                    method: 'POST',
                    data: {
                        product_id: productId,
                        quantity: quantity,
                        <?= csrf_token() ?>: '<?= csrf_hash() ?>'
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            alert('Product added to cart');
                            updateCartCount();
                        } else {
                            alert('Error: ' + response.message);
                        }
                    },
                    error: function() {
                        alert('There was an error adding the product to your cart');
                    }
                });
            });

            // Update Cart Count
            function updateCartCount() {
                $.ajax({
                    url: '<?= site_url('product_view/count') ?>',
                    method: 'GET',
                    success: function(response) {
                        $('#cart-count').text(response.cart_count);  // Ensure your header has an element with id="cart-count"
                    }
                });
            }
        });
    </script>

</body>

</html>
<?= $this->endSection() ?>
