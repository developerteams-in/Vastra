<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<?php
    $user = session()->get('user');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($product['productName']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
    .product-sizes {
    margin-top: 20px;
    display: flex;
    justify-content: center;
    gap: 5px;
    margin-bottom: 15px
    font-size: 1rem;
    color: #7f8c8d;
}
  .product-img {
            max-width: 100%;
            height: auto;
        }
        .product-title {
            font-size: 1.8rem;
            font-weight: bold;
        }

        .product-price {
            font-size: 1.5rem;
            color: #e67e22;
        }

        .product-description {
            font-size: 1rem;
            color: #7f8c8d;
        }

        .action-btns .btn {
            width: 150px;
        }

        .product-details-container {
            padding: 30px;
            border: 1px solid black;
        }

        .quantity-btns {
            display: flex;
            align-items: center;
            font-size: 1rem;
            color: #7f8c8d;
        }
   #product_quantity{
    border:none;

   }
        .quantity-btns button {
            width: 40px;
            height: 40px;
            font-size: 20px;
        }

        .size-options label {
            margin-right: 10px;
        }

        /* Responsive Image Styling */
        @media (max-width: 768px) {
            .product-img {
                max-width: 100%;
                height: auto;
            }
        }
    </style>
</head>

<body>
    <div class="container product-details-container">
        <div class="row">
            <!-- Left Column for Product Image -->
            <div class="col-md-6 product-image-container">
                <img style="max-height: 500px; object-fit: cover;" src="<?= base_url('uploads/' . esc($product['productImage'])) ?>" alt="<?= esc($product['productName']) ?>" class="product-img mb-3">
            </div>

            <!-- Right Column for Product Info -->
            <div class="col-md-6">
                <h6>Product Details:</h6>
                <h2 class="product-title"><?= esc($product['productName']) ?></h2>
                <p class="product-price" id="price">₹<?= number_format($product['productPrice'], 2) ?></p>
                <p class="product-description"><?= esc($product['productDescription']) ?></p>
                
                <!-- Size Selection -->
            <div class="product-sizes col-md-4 mb-4 mt-4 ">
            <h6>Sizes:</h6>
            <button type="submit" class="size-btn bg-black text-white border border-0 rounded">XS</button>
            <button type="submit"  class="size-btn bg-black text-white border border-0 rounded">S</button>
            <button type="submit"  class="size-btn bg-black text-white border border-0 rounded">M</button>
            <button type="submit"  class="size-btn bg-black text-white border border-0 rounded">L</button>
            <button type="submit"  class="size-btn bg-black text-white border border-0 rounded">XL</button>
          </div>

                <!-- Quantity Selection with + and - buttons -->
                <h6 class="mb-3 mt-4" style="color: #7f8c8d;">Quantity</h6>
                <div class="quantity-btns mb-3 mt-4">
                    <button type="button" id="decrease-quantity" class="btn btn-secondary">-</button>
                    <input type="text" id="product_quantity" class="form-control" value="1" min="1" style="width: 60px; text-align: center;">
                    <button type="button" id="increase-quantity" class="btn btn-secondary">+</button>
                </div>
    <div class="d-flex action-btns mt-3">
        
    <!-- Add to Cart Button -->
    <?php if (isset($user) && $user): ?>
        <button type="button" class="btn btn-success me-3 add-to-cart" 
            data-id="<?= esc($product['id']) ?>" 
            data-name="<?= esc($product['productName']) ?>" 
            data-price="<?= esc($product['productPrice']) ?>" 
            data-quantity="1">
            Add to Cart
        </button>
    <?php else: ?>
        <a href="<?= site_url('login') ?>" class="btn btn-primary me-3">
            Add to Cart
        </a>
    <?php endif; ?>
    
    <!-- Buy Now Form -->
    <form action="<?= site_url('checkout/' . esc($product['id'])) ?>" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="product_id" value="<?= esc($product['id']) ?>">
        <input type="hidden" name="product_name" value="<?= esc($product['productName']) ?>">
        <input type="hidden" name="product_price" value="<?= esc($product['productPrice']) ?>">
        <input type="hidden" name="quantity" id="hidden-quantity" value="1">
        <input type="hidden" name="selected_sizes" id="hidden-sizes" value="">
        <button type="submit" class="btn btn-success">Buy Now</button>
    </form>
</div>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function () {
    $('.add-to-cart').click(function () {
        let productId = $(this).data('id');
        let productName = $(this).data('name');
        let productPrice = $(this).data('price');
        let productQuantity = $('#product_quantity').val();
        let selectedSizes = []; // Capture size selections if implemented

        $.ajax({
            url: '<?= site_url("cart/add") ?>',
            type: 'POST',
            data: {
                product_id: productId,
                product_name: productName,
                product_price: productPrice,
                product_quantity: productQuantity,
                selected_sizes: selectedSizes.join(','),
            },
            success: function (response) {
                alert(response.message);
                window.location.href = '<?= site_url("cart") ?>'; // Redirect to cart page
            },
            error: function () {
                alert('An error occurred. Please try again.');
            }
        });
    });
});

    </script>
   
    <script>
        $(document).ready(function() {
            // Update total price based on quantity
            function updateTotalPrice() {
                var quantity = $('#product_quantity').val();
                var pricePerProduct = <?= esc($product['productPrice']) ?>;
                var totalPrice = pricePerProduct * quantity;
                $('#total-price').text(totalPrice.toFixed(2));
                $('#hidden-quantity').val(quantity); // Update hidden quantity
            }

            // Increase quantity
            $('#increase-quantity').click(function() {
                var quantity = parseInt($('#product_quantity').val());
                $('#product_quantity').val(quantity + 1);
                updateTotalPrice();
            });

            // Decrease quantity
            $('#decrease-quantity').click(function() {
                var quantity = parseInt($('#product_quantity').val());
                if (quantity > 1) {
                    $('#product_quantity').val(quantity - 1);
                    updateTotalPrice();
                }
            });

            // Update price on manual input
            $('#product_quantity').on('input', function() {
                updateTotalPrice();
            });

            // Capture selected sizes
            $('form').on('submit', function() {
                let selectedSizes = [];
                $('input[name="size[]"]:checked').each(function() {
                    selectedSizes.push($(this).val());
                });
                $('#hidden-sizes').val(selectedSizes.join(','));
            });
        });
    </script>
</body>

</html>
<?= $this->endSection() ?>
