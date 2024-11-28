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
        <div class="col-12 col-md-3 col-lg-2 bg-light vh-50 vh-md-100 d-flex flex-column p-3">
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
            <!-- Dashboard Header -->
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="mb-4">Welcome to the Dashboard</h1>
            </div>

            <!-- Stats Section -->
            <div class="row mb-5">
                <div class="col-md-2 mb-2">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total Orders</h5>
                            <p class="card-text"><?php echo $totalOrders ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-2">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Pending Orders</h5>
                            <p class="card-text"><?php echo $pendingOrders ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-2">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Completed  Orders</h5>
                            <p class="card-text"><?php echo $completedOders ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-2">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total Sales</h5>
                            <p class="card-text">₹<?php echo $totalSales ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-2">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total Products</h5>
                            <p class="card-text"><?php echo $totalProducts ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Price Graph Section -->
            <h2 class="mt-4 fs-5">Price Trend</h2>
            <canvas id="priceChart" width="400" height="200" borderColor="red"></canvas>
            
            <script>
                var ctx = document.getElementById('priceChart').getContext('2d');
                var priceChart = new Chart(ctx, {
                    type: 'line', // Line chart
                    data: {
                        labels: <?//= json_encode($dateLabels) ?>, // Dates or time periods
                        datasets: [{
                            label: 'Price Trend',
                            data: <?//= json_encode($priceData) ?>, // Array of price data
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            fill: true
                        }]
                    }
                });
            </script>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
