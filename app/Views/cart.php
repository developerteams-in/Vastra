<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Scrollable Cart Area */
        #cart-items {
            height: 400px; /* Set a fixed height for scroll */
            overflow-y: auto; /* Enable vertical scroll */
            border: 1px solid #ddd; /* Add a border for better visualization */
            padding: 5px;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <!-- Cart Title -->
        <a href="/"  class="text-black"><i class="bi bi-house text-black"></i>Vastra</a>
        <h1 class="text-center mb-4">Your Bag Items</h1>
        <!-- Main Section - Two Columns -->
        <div class="row">
            <!-- Left Side - Cart Items -->
            <div class="col-lg-7 col-sm-12 mb-3">
                <div id="cart-items">
                    <?php if (!empty($cart)): ?>
                        <ul class="list-group">
                            <?php foreach ($cart as $item): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center" data-id="<?php echo esc($item['id']); ?>">
                                    <div class="d-flex align-items-center">
                                        <img src="<?php echo base_url('uploads/' . esc($item['product_image'])); ?>" alt="Product Image"
                                            class="img-thumbnail" style="width: 60px; height: 60px;">
                                        <div class="ms-3">
                                            <h5><?php echo esc(isset($item['product_name']) ? $item['product_name'] : 'Unknown Product'); ?></h5>
                                            <p class="mb-1">Size: <?php echo esc(isset($item['product_size']) ? $item['product_size'] : 'Unknown Size'); ?></p>
                                            <p class="mb-0">₹<?php echo esc(isset($item['product_price']) ? $item['product_price'] : 0); ?> x
                                                <?php echo esc(isset($item['quantity']) ? $item['quantity'] : 0); ?></p>
                                        </div>
                                    </div>
                                    <button class="btn btn-danger btn-sm remove-item">Remove</button>
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
                <div class="card h-100">
                    <div class="card-header bg-black text-white text-center">
                        <h4>Checkout Summary</h4>
                    </div>
                    <div class="card-body">
                        <p>Add items worth<span class="text-danger"> ₹70.00</span> for FREE Delivery</p>
                        <p><strong>Total Quantity:</strong> <span id="total-quantity">0</span></p>
                        <p><strong>Total Price:</strong> ₹<span id="total-price">0</span></p>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button id="checkout-btn" class="btn btn-success btn-lg" style="width: 100%;">Proceed to Checkout</button>
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
                alert('Redirecting to Checkout...');
                window.location.href = "/checkout";
            });
        });
    </script>
</body>

</html>
