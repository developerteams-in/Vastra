<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<?php
$user = session()->get('user'); // User information from session
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Orders</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .order-card {
      border: 1px solid #ddd;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }
    .order-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    }
    .order-card .card-body {
      padding: 20px;
    }
    .order-card .badge {
      font-size: 0.9rem;
    }
  </style>
</head>
<body>
  <div class="container my-5">
    <h2 class="text-center mb-4">Your Orders</h2>
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Product Name</th> 
                    <th>Order Date</th>
                    <th>Total Price</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= esc($order['productName']) ?></td>
                        <td><?= esc($order['order_date']) ?></td>
                        <td>₹<?= esc($order['total_price']) ?></td>
                        <td><?= esc($order['status']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="float-bottom" style="margin-top:300px;">
      <?= $this->include('footer'); ?>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?= $this->endSection() ?>
