<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #cart-items {
            overflow-y: auto; /* Allows vertical scrolling if content overflows */
            scrollbar-width: none; /* For Firefox */
        }

        #cart-items::-webkit-scrollbar {
            display: none; /* For Chrome, Safari, and Edge */
        }

        /* Styling the active step */
        .step-link.active {
            color: #28a745; /* Green color for active */
            font-weight: bold;
            position: relative;
        }

        /* Underline for active step */
        .step-link.active::after {
            content: '';
            display: block;
            width: 100%;
            height: 2px;
            background-color: #28a745;
            position: absolute;
            bottom: -4px;
            left: 0;
        }

        /* Hover effect for steps */
        .step-link:hover {
            color: #28a745; /* Green color on hover */
            text-decoration: underline;
        }

        .separator {
            color: #ccc; /* Light gray for separators */
        }

        /* Scrollable Cart Area */
        #cart-items {
            height: 400px; /* Set a fixed height for scroll */
            overflow-y: auto; /* Enable vertical scroll */
            padding: 5px;
        }
    </style>
</head>

<body>
    <nav class="d-flex justify-content-between align-items-center p-3 bg-white border-bottom">
        <!-- Logo Section -->
        <div>
            <a class="navbar-brand text-danger fw-bold fs-4" href="/">Vastra</a>
        </div>

        <!-- Steps Section -->
        <ul class="list-unstyled d-flex align-items-center mb-0">
            <li>
                <a href="/cart" class="text-decoration-none step-link active">BAG</a>
            </li>
            <li>
                <span class="mx-3 separator">---------</span>
                <a href="/cart" class="text-decoration-none step-link text-black">ADDRESS</a>
            </li>
            <li>
                <span class="mx-3 separator">---------</span>
                <a href="/cart" class="text-decoration-none step-link text-black">PAYMENT</a>
            </li>
        </ul>

        <!-- Secure Section -->
        <div class="d-flex align-items-center">
            <i class="bi bi-shield-check text-success fs-4 me-2"></i>
            <span class="text-muted">100% SECURE</span>
        </div>
    </nav>

    <div class="container my-5">
        <!-- Main Section - Two Columns -->
        <div class="row">
            <!-- Left Side - Cart Items -->
            <div class="col-lg-7 col-sm-12 mb-3">
                <div class="position-relative p-2 rounded" style="width: 750px; height: 80px; font-size: 14px; border: 1px solid rgba(0, 0, 0, 0.5);">
                    <h6><i class="fas fa-gift text-black" style="font-size: 15px;"></i> Available Offers</h6>
                    <p class="text-black mb-0" style="font-size: 12px;">10% Instant Discount on Axis Bank Credit Card and Credit Card EMI on a min spend of ₹3,500. TCA</p>
                    <!-- Show More button -->
                    <button class="position-absolute bottom-0 start-0 mb-1 ms-1 btn text-danger btn-sm" style="font-size: 10px;">
                        Show More
                    </button>
                </div>
                <div id="cart-items">
                    <?php if (!empty($cart)): ?>
                        <ul class="list-group">
                            <?php foreach ($cart as $item): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center" data-id="<?php echo esc($item['id']); ?>">
                                    <div class="d-flex align-items-center">
                                        <img src="<?php echo base_url('uploads/' . esc($item['product_image'])); ?>" alt="Product Image"
                                            class="img-thumbnail" style="width: 200px; height: 200px;">
                                        <div class="ms-3">
                                            <h5><?php echo esc(isset($item['product_name']) ? $item['product_name'] : 'Unknown Product'); ?></h5>
                                            <p class="mb-1">Size: <?php echo esc(isset($item['product_size']) ? $item['product_size'] : 'Unknown Size'); ?></p>
                                            <p class="mb-0">₹<?php echo esc(isset($item['product_price']) ? $item['product_price'] : 0); ?> x
                                                <?php echo esc(isset($item['quantity']) ? $item['quantity'] : 0); ?></p>
                                            <h6 class="mt-4 text-sm">
                                                <i class="bi bi-arrow-return-left" style="padding: 0.1rem; border-radius: 9999px; border: 1px solid black; font-size:9px;"></i>
                                                <span class="text-black">12 days </span><span style="font-size:10px;">return available</span>
                                            </h6>
                                        </div>
                                    </div>
                                    <button class="btn btn-black btn-sm remove-item" style="font-weight: 700; margin-bottom:200px;"><i class="bi bi-x-lg" style="font-size:18px; font-weight: 700;"></i></button>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p class="text-center">Your cart is empty.</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Right Side - Checkout Summary & Button -->
            <div class="col-lg-5 col-sm-12">
                <div class="card h-90 ">
                    <div class="card-body" id="price-details-section">
                        <p style="font-weight: 700;" class="mb-5">PRICE DETAILS</p>
                        
                        <div class="d-flex justify-content-between mb-2">
                            <p>Total MRP</p>
                            ₹<?php echo esc(isset($item['product_price']) ? $item['product_price'] : 0); ?> 
                        </div>
                        
                        <div class="d-flex justify-content-between mb-2">
                            <p>Coupon Discount</p>
                            <button class="btn btn-outline-danger btn-sm" style="width:100px; height:25px; font-size:12px;">Apply Coupon</button>
                        </div>
                        
                        <div class="d-flex justify-content-between mb-2">
                            <p>Platform Fee</p>
                            <span class="text-success">FREE</span>
                        </div>
                        
                        <div class="d-flex justify-content-between mb-5">
                            <p>Shipping Fee</p>
                            <span class="text-success">FREE</span>
                        </div>
                        
                        <p><strong>Total Quantity:</strong> <span id="total-quantity">0</span></p>
                        <p><strong>Total Price:</strong> ₹<span id="total-price">0</span></p>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <!-- Default to PLACE ORDER button, but will show the Continue Shopping button if the cart is empty -->
                    <button id="checkout-btn" class="btn btn-danger" style="width: 50%;">PLACE ORDER</button>
                    <button id="continue-shopping-btn" class="btn btn-danger" style="width: 50%; display: none;" onclick="window.location.href='/';">Continue Shopping</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Function to calculate total quantity and total price
            function updateCheckoutSummary() {
                let totalQuantity = 0;
                let totalPrice = 0;

                $('#cart-items .list-group-item').each(function () {
                    const quantity = parseInt($(this).find('p.mb-0').text().split('x')[1]);
                    const price = parseFloat($(this).find('p.mb-0').text().split('₹')[1].trim());
                    totalQuantity += quantity;
                    totalPrice += quantity * price;
                });

                $('#total-quantity').text(totalQuantity);
                $('#total-price').text(totalPrice.toFixed(2));

                // Check if the cart is empty and hide/show the PRICE DETAILS and buttons accordingly
                if ($('#cart-items .list-group-item').length === 0) {
                    $('#price-details-section').hide();  // Hide the price details section
                    $('#checkout-btn').hide();  // Hide the PLACE ORDER button
                    $('#continue-shopping-btn').show();  // Show the Continue Shopping button
                } else {
                    $('#price-details-section').show();  // Show the price details section
                    $('#checkout-btn').show();  // Show the PLACE ORDER button
                    $('#continue-shopping-btn').hide();  // Hide the Continue Shopping button
                }
            }

            // Call this function initially and on DOM changes
            updateCheckoutSummary();

            // Handle Remove Button Click
            $('.remove-item').click(function () {
                const $itemElement = $(this).closest('.list-group-item');
                const cartId = $itemElement.data('id');

                if (!cartId) {
                    alert('Error: Invalid Cart ID');
                    return;
                }

                $.ajax({
                    url: '/cart/remove',
                    type: 'POST',
                    data: { cart_id: cartId },
                    success: function (response) {
                        if (response.status) {
                            $itemElement.remove();
                            updateCheckoutSummary();

                            if ($('#cart-items .list-group-item').length === 0) {
                                $('#cart-items').html('<p class="text-center">Your cart is empty.</p>');
                            }
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function () {
                        alert('Something went wrong.');
                    }
                });
            });

            // Checkout Button Logic
            $('#checkout-btn').click(function () {
                window.location.href = "/address";
            });
        });
    </script>
</body>

</html>
