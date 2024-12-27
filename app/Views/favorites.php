<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Favourites</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .alert {
        position: fixed;
        top: 180px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 9999;
        width: 80%;
        max-width: 400px;
    }
</style>

    <style>
        /* Scroll Container */
        .product-cards {
            display: flex;
            flex-wrap: nowrap;
            gap: 10px;
            overflow-x: auto;
            padding-bottom: 10px;
        }

        /* Hide Scrollbar */
        .product-cards::-webkit-scrollbar {
            display: none;
        }

        .product-cards {
            scrollbar-width: none;
        }

        .card {
            flex: 0 0 auto;
            width: 220px;
            height: 400px;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-img-top {
            object-fit: cover;
            height: 250px;
            width: 100%;
        }

        .card-body {
            text-align: center;
            padding: 10px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .btn-remove {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 1;
            color: red;
            font-weight: bold;
        }

        .card-btns {
            display: flex;
            justify-content: space-between;
            gap: 5px;
            margin-top: 10px;
        }

        .btn-cart,
        .btn-buy-now {
            width: 48%;
            font-size: 0.75rem;
        }

        /* Adjust for smaller screens */
        @media (max-width: 576px) {
            .product-cards {
                flex-wrap: nowrap;
            }

            .card {
                width: 180px;
            }
        }

        /* Adjust for medium screens */
        @media (min-width: 576px) and (max-width: 768px) {
            .card {
                width: 200px;
            }
        }

        /* Adjust for larger screens */
        @media (min-width: 768px) {
            .product-cards {
                justify-content: flex-start;
            }

            .card {
                width: 220px;
            }
        }
    </style>
</head>

<body>
    <div class="container my-5">
       
        <h1 class="text-center mb-4">Your Favourites</h1>
        <section class="py-4">
            <div class="scroll-container py-3">
                <div class="product-cards">
                    <?php if (!empty($favorites)): ?>
                        <?php foreach ($favorites as $favorite): ?>
                            <div class="card">
                                <!-- Remove button icon -->
                                <a href="<?= base_url('favorites/remove/' . $favorite['product_id']) ?>" 
                                   class="btn btn-sm btn-remove">
                                    <i class="bi bi-x-lg"></i>
                                </a>
                                
                                <img class="card-img-top img-fluid" 
                                     src="<?= base_url('uploads/' . $favorite['productImage']) ?>"  
                                     alt="<?= $favorite['productName'] ?>">

                                <div class="card-body">
                                    <h5 class="card-title text-truncate" style="font-size: 0.8rem;">
                                        <?= $favorite['productName'] ?>
                                    </h5>
                                    <h6 class="card-title text-truncate" style="font-size: 0.8rem;">
                                        <?= $favorite['productDescription'] ?>
                                    </h6>
                                    <p class="card-text" style="font-size: 0.75rem;">
                                        ₹<?= $favorite['productPrice'] ?>
                                    </p>
                                    <!-- Add to Cart and Buy Now Buttons -->
                                    <div class="card-btns">
                                        <button type="button" class="btn btn-danger btn-cart add-to-cart" 
                                                data-id="<?= esc($favorite['product_id']) ?>" 
                                                data-name="<?= esc($favorite['productName']) ?>" 
                                                data-price="<?= esc($favorite['productPrice']) ?>" 
                                                data-quantity="1"
                                                data-image="<?= esc($favorite['productImage']) ?>"
                                                data-size="M"> <!-- Add size data here if required -->
                                            Add to Cart
                                        </button>
                                        <!-- Update the Buy Now button class to .btn-buy-now -->
                                       <button type="button" class="btn btn-danger btn-buy-now add-to-cart" 
                                              data-id="<?= esc($favorite['product_id']) ?>" 
                                              data-name="<?= esc($favorite['productName']) ?>" 
                                              data-price="<?= esc($favorite['productPrice']) ?>" 
                                              data-quantity="1"
                                              data-image="<?= esc($favorite['productImage']) ?>"
                                              data-size="M">
                                               Buy Now
                                      </button>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No favorites yet.</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </div>

    <!-- Bootstrap JS for responsive functionality (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- jQuery and Custom JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
  $(document).ready(function () {
    // Add to Cart functionality
    $('.add-to-cart').click(function () {
        const productId = $(this).data('id');
        const productQuantity = $(this).data('quantity');
        const productName = $(this).data('name');
        const productImage = $(this).data('image');
        const productPrice = $(this).data('price');
        const productSize = $(this).data('size'); // Size data
        const userId = "<?= session()->get('user')['id']; ?>"; // Get logged-in user's ID

        // Send AJAX request to add product to cart
        $.ajax({
            url: '/cart/add', // Make sure this route matches your controller method
            method: 'POST',
            data: {
                product_id: productId,
                product_quantity: productQuantity,
                product_name: productName,
                product_image: productImage,
                product_price: productPrice,
                product_size: productSize,
                user_id: userId,
                csrf_token: "<?= csrf_token() ?>" // CSRF Token for security
            },
            success: function (response) {
                if (response.status) {
                    // Show the success message from the response
                    showMessage(response.message, 'success'); 

                    // Redirect to the cart after 2 seconds
                    setTimeout(function () {
                        window.location.href = "<?= site_url('cart') ?>";
                    }, 2000); // 2000ms = 2 seconds
                } else {
                    showMessage(response.message, 'error'); // If not success, show error message
                }
            },
            error: function () {
                showMessage('');
            }
        });
    });

    // Function to display the message
    function showMessage(message, type) {
        // Create message box
        const messageBox = $('<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert"></div>');
        messageBox.text(message);
        $('body').append(messageBox); // Add message box to body

        // Automatically close the message box after 3 seconds
        setTimeout(function () {
            messageBox.alert('close'); // Close the alert
        }, 3000); // 3000ms = 3 seconds
    }

    // Buy Now Button functionality
    $('.btn-buy-now').click(function () {
        // Redirect to the address page (replace with your actual address page URL)
        window.location.href = '/address'; // You can change '/address' to the actual URL of your address page
    });
});

        </script>


    <!-- Footer -->
    <?= $this->include('footer'); ?>
</body>

</html>
<?= $this->endSection() ?>
