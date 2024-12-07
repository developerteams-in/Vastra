<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
    <h1>Your Cart</h1>

<?php if (!empty($cart)): ?>
    <ul>
        <?php foreach ($cart as $item): ?>
            <li>
                <?php echo esc($item['name']); ?> - Rs. <?php echo esc($item['price']); ?> x <?php echo esc($item['quantity']); ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Your cart is empty.</p>
<?php endif; ?>
</div>


<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
