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
        .size-btn.btn-selected {
  background-color: #e67e22 !important;
  color: white;
}

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
                
              
        <!-- Size Selection Section -->
<div class="product-sizes col-md-4 mb-4 mt-4">
  <h6>Sizes:</h6>
  <button type="button" class="size-btn bg-black text-white border border-0 rounded">XS</button>
  <button type="button" class="size-btn bg-black text-white border border-0 rounded">S</button>
  <button type="button" class="size-btn bg-black text-white border border-0 rounded">M</button>
  <button type="button" class="size-btn bg-black text-white border border-0 rounded">L</button>
  <button type="button" class="size-btn bg-black text-white border border-0 rounded">XL</button>
</div>

<input type="hidden" name="selected_sizes" id="hidden-sizes" value="">
  <!-- Size Selection end -->
                <!-- Quantity Selection with + and - buttons -->
                <h6 class="mb-3 mt-4" style="color: #7f8c8d;">Quantity</h6>
                <div class="quantity-btns mb-3 mt-4">
                    <button type="button" id="decrease-quantity" class="btn btn-secondary">-</button>
                    <input type="text" id="product_quantity" class="form-control" value="1" min="1" style="width: 60px; text-align: center;">
                    <button type="button" id="increase-quantity" class="btn btn-secondary">+</button>
                </div>
    <div class="d-flex action-btns mt-3">
        
    <!-- Add to Cart Button -->
 <!-- Add to Cart Button -->
<?php if (isset($user) && $user): ?>
    <button type="button" class="btn btn-danger me-3 add-to-cart" 
        data-id="<?= esc($product['id']) ?>" 
        data-name="<?= esc($product['productName']) ?>" 
        data-price="<?= esc($product['productPrice']) ?>" 
        data-quantity="1"
        data-image="<?= esc($product['productImage']) ?>">
        Add to Cart
    </button>
<?php else: ?>
    <a href="<?= site_url('login') ?>" class="btn btn-danger me-3">
        Add to Cart
    </a>
<?php endif; ?>
<?php if (isset($user) && $user): ?>
    <button type="button" class="btn btn-danger me-3 add-to-cart" 
        data-id="<?= esc($product['id']) ?>" 
        data-name="<?= esc($product['productName']) ?>" 
        data-price="<?= esc($product['productPrice']) ?>" 
        data-quantity="1"
        data-image="<?= esc($product['productImage']) ?>">
        Buy Now
    </button>
<?php else: ?>
    <a href="<?= site_url('login') ?>" class="btn btn-danger me-3">
      Buy Now
    </a>
<?php endif; ?>

             </div>
            </div>
        </div>
    </div>
    <h6 class="mt-4">You may also like:</h6>
    
    <script>
 $(document).ready(function () {
    $('.add-to-cart').click(function () {
        const productId = $(this).data('id');
        const productQuantity = $('#product_quantity').val();
        const productName = $(this).data('name');
        const productSize = $('#hidden-sizes').val();
        const productImage = $(this).data('image');
        const productPrice = $(this).data('price');

        if (!productSize) {
            alert('Please select a size');
            return;
        }

        $.ajax({
            url: '/cart/add',
            method: 'POST',
            data: {
                product_id: productId,
                product_quantity: productQuantity,
                product_name:productName,
                product_size: productSize,
                product_image: productImage,
                product_price: productPrice,
                csrf_token: "<?= csrf_token() ?>"
            },
            success: function (response) {
                if (response.status) {
                    alert(response.message);
                    window.location.href = "<?= site_url('cart') ?>";
                } else {
                    alert(response.message);
                }
            },
            error: function () {
                alert('Something went wrong');
            }
        });
    });

  $('.size-btn').click(function () {
    $('.size-btn').removeClass('btn-selected');
    $(this).addClass('btn-selected');
    const size = $(this).text();
    $('#hidden-sizes').val(size);
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
    <script>
        $(document).ready(function() {
  let selectedSize = "";

  // Handle clicks on size buttons
  $('.size-btn').click(function() {
    $('.size-btn').removeClass('btn-selected'); // Remove selection from all buttons
    $(this).addClass('btn-selected'); // Highlight clicked button
    selectedSize = $(this).text(); // Capture the clicked button's text
    $('#hidden-sizes').val(selectedSize); // Update hidden input
  });
  
  // Optional: Add CSS to visually highlight the selected size
  $('.btn-selected').css({
    'background-color': '#e67e22',
    'color': 'white'
  });
});

        </script>
</body>

</html>
<?= $this->endSection() ?>
