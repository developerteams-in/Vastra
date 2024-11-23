<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Add New Product</h2>

    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('message')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('message') ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="/addProduct" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="productName" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="productName" name="productName" value="<?= old('productName') ?>" required>
        </div>

        <div class="mb-3">
            <label for="productDescription" class="form-label">Product Description</label>
            <textarea class="form-control" id="productDescription" name="productDescription" rows="4" required><?= old('productDescription') ?></textarea>
        </div>

        <div class="mb-3">
            <label for="productPrice" class="form-label">Product Price</label>
            <input type="number" class="form-control" id="productPrice" name="productPrice" step="0.01" value="<?= old('productPrice') ?>" required>
        </div>

        <div class="mb-3">
            <label for="productCategory" class="form-label">Product Category</label>
            <select class="form-select" id="productCategory" name="productCategory" required>
                <option value="" disabled selected>Select a category</option>
                <option value="ladies" <?= old('productCategory') === 'ladies' ? 'selected' : '' ?>>Ladies</option>
                <option value="men" <?= old('productCategory') === 'men' ? 'selected' : '' ?>>Men</option>
                <option value="kids" <?= old('productCategory') === 'kids' ? 'selected' : '' ?>>Kids</option>
                <option value="sport" <?= old('productCategory') === 'sport' ? 'selected' : '' ?>>Sport</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="productImage" class="form-label">Product Image</label>
            <input type="file" class="form-control" id="productImage" name="productImage" accept="image/*" required>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Add Product</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
