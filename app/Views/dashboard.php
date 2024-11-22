

<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
<div class="d-flex justify-content-center">
  <h1>Welcome to the Dashboard</h1>
</div>
    <a href="/logout" class="btn btn-danger float-end">Logout</a>
    
    <h2 class="mt-4 fs-5">User List</h2>
    <a href="/users/create" class="btn btn-success mb-3 fs-sm-5">Create New</a>
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
                            <a href="/users/edit/<?= htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8') ?>" 
                               class="btn btn-warning btn-sm">Edit</a>
                            <a href="/users/delete/<?= htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8') ?>" 
                               class="btn btn-danger btn-sm"
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

<?= $this->endSection() ?>
