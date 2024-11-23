<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="d-flex justify-content-between">
        <h1>Products</h1>
        <a href="/products/create" class="btn btn-success">Add New Product</a>
    </div>

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Info</th> <!-- New Info Column -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($products) && is_array($products)): ?>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= htmlspecialchars($product['id'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($product['brand'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($product['price'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($product['info'], ENT_QUOTES, 'UTF-8') ?></td> <!-- Display Info -->
                        <td>
                            <a href="/products/edit/<?= htmlspecialchars($product['id'], ENT_QUOTES, 'UTF-8') ?>" 
                               class="btn btn-warning btn-sm">Edit</a>
                            <a href="/products/delete/<?= htmlspecialchars($product['id'], ENT_QUOTES, 'UTF-8') ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No products found.</td> <!-- Adjusted colspan to 6 -->
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
