<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Product</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
<div class="row">
<!-- Sidebar -->
<div class="col-12 col-md-3 col-lg-2 bg-light vh-50 vh-md-100 d-flex flex-column p-3">
<!-- Button to toggle sidebar on mobile -->
<button class="btn btn-info d-md-none mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-expanded="false" aria-controls="sidebarMenu">
Toggle Menu
</button>
<!-- Sidebar Menu -->
<div class="collapse d-md-block bg-light" id="sidebarMenu">
<h4 class="mb-4">Menu</h4>
<ul class="nav flex-column">
<li class="nav-item">
<a class="nav-link active" href="/dashboard">Dashboard</a>
</li>
<li class="nav-item">
<a class="nav-link active" href="/user_list">User List</a>
</li>
<li class="nav-item">
<a class="nav-link" href="/add_products">Product Entry</a>
</li>
<li class="nav-item">
<a class="nav-link" href="/product_list">Product List</a>
</li>
<li class="nav-item d-block d-sm-block d-md-none mt-5">
<a class="nav-link btn btn-danger text-white" href="/logout">Exit</a>
</li>

<li class="nav-item d-none d-md-block position-fixed bottom-0 mb-5">
<a class="nav-link btn btn-danger text-white" href="/logout">Exit</a>
</li>
</ul>
</div>
</div>

<!-- Main Content -->
<div class="col-12 col-md-9 col-lg-10">
<div class="container mt-5">
<h2 class="text-center">Edit Product</h2>

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
<form action="/products_list/update/<?= $product['id'] ?>" method="post" enctype="multipart/form-data">

<?= csrf_field() ?>

<!-- Hidden field for product ID -->
<input type="hidden" name="productId" value="<?= $product['id'] ?>">

<div class="mb-3">
<label for="productName" class="form-label">Product Name</label>
<input type="text" class="form-control" id="productName" name="productName" value="<?= old('productName', $product['productName']) ?>" required>
</div>

<div class="mb-3">
<label for="productDescription" class="form-label">Product Description</label>
<textarea class="form-control" id="productDescription" name="productDescription" rows="4" required><?= old('productDescription', $product['productDescription']) ?></textarea>
</div>

<div class="mb-3">
<label for="productPrice" class="form-label">Product Price</label>
<input type="number" class="form-control" id="productPrice" name="productPrice" step="0.01" value="<?= old('productPrice', $product['productPrice']) ?>" required>
</div>

<div class="mb-3">
<label for="productCategory" class="form-label">Product Category</label>
<select class="form-select" id="productCategory" name="productCategory" required>
<option value="" disabled>Select a category</option>
<option value="newarrivals" <?= old('productCategory') === 'newarrivals' ? 'selected' : '' ?>>New Arrivals</option>
<option value="ladies" <?= old('productCategory', $product['productCategory']) === 'ladies' ? 'selected' : '' ?>>Ladies</option>
<option value="men" <?= old('productCategory', $product['productCategory']) === 'men' ? 'selected' : '' ?>>Men</option>
<option value="kids" <?= old('productCategory', $product['productCategory']) === 'kids' ? 'selected' : '' ?>>Kids</option>
<option value="sport" <?= old('productCategory', $product['productCategory']) === 'sport' ? 'selected' : '' ?>>Sport</option>
</select>
</div>

<div class="mb-3">
<label for="productImage" class="form-label">Product Image</label>
<input type="file" class="form-control" id="productImage" name="productImage" accept="image/*">
<img src="<?= base_url('public/uploads/' . $product['productImage']) ?>" alt="<?= $product['productName'] ?>" class="mt-3" style="max-width: 150px;">
</div>

<div class="d-flex justify-content-between">
<button type="submit" class="btn btn-primary">Update Product</button>
<button type="reset" class="btn btn-secondary">Reset</button>
</div>
</form>
</div>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

