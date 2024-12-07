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
                    <li class="list-group-item d-flex justify-content-between align-items-center" data-index="<?php echo $item['id']; ?>">
                        Product ID: <?php echo esc($item['product_id']); ?> - Quantity: <?php echo esc($item['quantity']); ?>
                        <button class="btn btn-danger btn-sm remove-item">Remove</button>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.remove-item').click(function() {
        const $itemElement = $(this).closest('[data-index]');
        const index = $itemElement.data('index');

        $.ajax({
            url: '/cart/remove',
            type: 'POST',
            data: { index: index },
            success: function(response) {
                if (response.status === 'success') {
                    $itemElement.remove();
                    if ($('#cart-items .list-group-item').length === 0) {
                        $('#cart-items').html('<p>Your cart is empty.</p>');
                    }
                } else {
                    alert('Failed to remove item from cart.');
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
