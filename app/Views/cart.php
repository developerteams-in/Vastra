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

    <!-- Check if the cart is empty -->
    <?php if (empty($cartItems)): ?>
        <div class="alert alert-info" role="alert">
            Your cart is empty!
        </div>
    <?php else: ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cartItems as $item): ?>
                    <tr>
                        <td><?= esc($item['product_name']) ?></td>
                        <td>$<?= number_format($item['product_price'], 2) ?></td>
                        <td>
                            <form action="<?= site_url('/cart/updateQuantity') ?>" method="POST">
                                <?= csrf_field() ?>
                                <input type="hidden" name="item_id" value="<?= $item['id'] ?>">
                                <input type="number" name="quantity" value="<?= $item['quantity'] ?>" min="1" class="form-control" style="width: 70px;">
                                <button type="submit" class="btn btn-sm btn-primary mt-2">Update</button>
                            </form>
                        </td>
                        <td>$<?= number_format($item['product_price'] * $item['quantity'], 2) ?></td>
                        <td>
                            <a href="<?= site_url('/cart/remove/' . $item['id']) ?>" class="btn btn-sm btn-danger">Remove</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Total -->
        <div class="d-flex justify-content-end">
            <h4>Total: $<?= number_format(array_sum(array_map(function($item) {
                return $item['product_price'] * $item['quantity'];
            }, $cartItems)), 2) ?></h4>
        </div>

        <!-- Checkout Button -->
        <div class="d-flex justify-content-end mt-4">
            <a href="<?= site_url('/cart/checkout') ?>" class="btn btn-success">Proceed to Checkout</a>
        </div>
    <?php endif; ?>

</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
