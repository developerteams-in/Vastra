<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
    <h1>Your Cart</h1>
    <div id="cart-items">
        <?php if (!empty($cart)): ?>
            <ul class="list-group">
                <?php foreach ($cart as $item): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center" data-id="<?php echo esc($item['id']); ?>">
                        <div class="d-flex align-items-center">
                            <img src="<?php echo base_url('uploads/' . esc($item['product_image'])); ?>" alt="Product Image" class="img-thumbnail" style="width: 60px; height: 60px;">
                            <div class="ms-3">
                            <h5><?php echo esc(isset($item['product_name']) ? $item['product_name'] : 'Unknown Product'); ?></h5>
                                <p>Size: <?php echo esc(isset($item['product_size']) ? $item['product_size'] : 'Unknown Size'); ?></p>
                                <p>₹<?php echo esc(isset($item['product_price']) ? $item['product_price'] : 0); ?> x <?php echo esc(isset($item['quantity']) ? $item['quantity'] : 0); ?></p>
                            </div>
                        </div>
                        <button class="btn btn-danger btn-sm remove-item">Remove</button>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.remove-item').click(function() {
        const $itemElement = $(this).closest('.list-group-item');
        const cartId = $itemElement.data('id'); // Get the cart item's id from the data-id attribute

        if (!cartId) {
            alert('Error: Invalid Cart ID');
            return;
        }

        // Send AJAX POST request
        $.ajax({
            url: '/cart/remove', // URL endpoint for removing items
            type: 'POST',
            data: { cart_id: cartId },
            success: function(response) {
                if (response.status) {
                    // Remove the item from the DOM on success
                    $itemElement.remove();
                    
                    // If no items left in the cart
                    if ($('#cart-items .list-group-item').length === 0) {
                        $('#cart-items').html('<p>Your cart is empty.</p>');
                    }
                } else {
                    alert(response.message); // Show server error message
                }
            },
            error: function() {
                alert('Something went wrong.');
            }
        });
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
