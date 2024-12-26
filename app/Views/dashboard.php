<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 bg-light vh-100 p-3">
            <h4>Menu</h4>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link active" href="/dashboard">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="/add_products">Add Products</a></li>
                <li class="nav-item"><a class="nav-link" href="/product_list">Product List</a></li>
                <li class="nav-item" style="position: fixed; bottom: 0; width:4%; text-align: center;">
                  <a class="nav-link btn btn-danger text-white" href="/logout" style="margin-top: 20px;">Exit</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 p-4">
            <h1>Dashboard</h1>
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5>Total Orders</h5>
                            <p><?= $totalOrders ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5>Pending Orders</h5>
                            <p><?= $pendingOrders ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5>Completed Orders</h5>
                            <p><?= $completedOrders ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5>Total Sales</h5>
                            <p>₹<?= $totalSales ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Orders Table -->
            <h2>Orders</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product Name</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?= esc($order['id']) ?></td>
                            <td><?= esc($order['productName']) ?></td>
                            <td>₹<?= esc($order['total_price']) ?></td>
                            <td>
                                <select class="form-select" id="status-<?= esc($order['id']) ?>" onchange="updateOrderStatus(<?= esc($order['id']) ?>)">
                                    <option value="completed" <?= $order['status'] === 'completed' ? 'selected' : '' ?>>Completed</option>
                                    <option value="pending" <?= $order['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                                    <option value="canceled" <?= $order['status'] === 'canceled' ? 'selected' : '' ?>>Canceled</option>
                                </select>
                            </td>
                            <td>
                                <button class="btn btn-primary" onclick="updateOrderStatus(<?= esc($order['id']) ?>)">Update</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
   function updateOrderStatus(orderId) {
    const status = document.getElementById('status-' + orderId).value;

    fetch('<?= base_url('dashboard/update-order-status') ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({
            id: orderId,
            status: status
        })
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message); // Show success or error message
        if (data.status === 'success') {
            location.reload(); // Reload to reflect updated status
        }
    })
    .catch(error => console.error('Error:', error));
}

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<?= $this->endSection() ?>
