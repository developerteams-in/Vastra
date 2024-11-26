<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
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

                     <li class="nav-item d-none d-md-block position-fixed bottom-0  mb-5">
                        <a class="nav-link btn btn-danger text-white" href="/logout">Exit</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-12 col-md-9 col-lg-10 offset-lg-2 offset-md-3 ms-md-auto">
            <div class="container mt-5">
                <div class="d-flex justify-content-between flex-wrap">
                    <h1>Products</h1>
                    <a href="/add_products" class="btn btn-success">Add New Product</a>
                </div>

                <div class="table-responsive mt-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($products) && is_array($products)): ?>
                                <?php foreach ($products as $product): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($product['id'], ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlspecialchars($product['productName'], ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlspecialchars($product['productDescription'], ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlspecialchars($product['productPrice'], ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlspecialchars($product['productCategory'], ENT_QUOTES, 'UTF-8') ?></td>
                                        <td>
                                            <img src="<?= htmlspecialchars($product['productImage'], ENT_QUOTES, 'UTF-8') ?>" 
                                                 alt="<?= htmlspecialchars($product['productName'], ENT_QUOTES, 'UTF-8') ?>" 
                                                 style="width: 100px; height: auto;">
                                        </td>
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
                                    <td colspan="7">No products found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
