<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Chart.js -->
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-12 col-md-3 col-lg-2  vh-50 vh-md-100 d-flex flex-column p-3">
            <!-- Button to toggle sidebar on mobile -->
            <button class="btn btn-info d-md-none mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-expanded="false" aria-controls="sidebarMenu">
                Toggle Menu
            </button>
            <!-- Sidebar Menu -->
            <div class="collapse d-md-block" id="sidebarMenu">
                <h4 class="mb-4">Menu</h4>
                <ul class="nav flex-column">
                    
                    <li class="nav-item">
                        <a class="nav-link active" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/user_list">User_List</a>
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
        <div class="col-12 col-md-9 col-lg-10 p-4">
            
                            <a href="/users/create" class="btn btn-success mb-3 fs-sm-5 ">Create New</a>
                    
            <!-- Dashboard Header -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php if (!empty($users) && is_array($users)): ?>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($user['password'], ENT_QUOTES, 'UTF-8') ?></td>
                <td>
                    <a href="/users/edit/<?= htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8') ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/users/delete/<?= htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8') ?>" class="btn btn-danger btn-sm"
                       onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="5">No users found.</td>
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
