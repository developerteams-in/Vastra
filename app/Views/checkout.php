<?php
    $user = session()->get('user');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe Payment Form</title>
    <script src="https://js.stripe.com/v3/"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom right, #f8f9fc, #e7e9f3);
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
            margin: 0;
            padding: 20px;
            gap: 20px;
            flex-direction: column;
        }

        .main-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            width: 100%;
        }

    .payment-container {
    background-color: #fff; 
    border-radius: 16px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    padding: 32px;
    width: 100%;
    max-width: 400px;
    text-align: center;
}

.product-container {
    border-radius: 16px;
    padding: 32px;
    width: 100%;
    max-width: 400px;
    text-align: center;
}


        .payment-container img {
            width: 80px;
            margin-bottom: 16px;
        }

        .payment-container h2 {
            font-size: 22px;
            font-weight: 600;
            color: #1a202c;
            margin: 12px 0;
        }

        .payment-container p {
            font-size: 18px;
            color: #4a5568;
            margin-bottom: 24px;
        }

        .btn-custom {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            padding: 12px;
            background-color: #2d3748;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-custom .bi {
            font-size: 18px;
            color: #fff;
        }

        .btn-custom:hover {
            background-color: #1a202c;
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 24px 0;
            font-size: 14px;
            color: #a0aec0;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background-color: #e2e8f0;
        }

        .divider::before {
            margin-right: 12px;
        }

        .divider::after {
            margin-left: 12px;
        }

        .form-group {
            margin-bottom: 16px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 6px;
            color: #4a5568;
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 14px;
        }

        .form-group input::placeholder {
            color: #a0aec0;
        }

        .submit-button {
            width: 100%;
            padding: 12px;
            background-color: #2d3748;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-button:hover {
            background-color: #1a202c;
        }

        .product-container {
            text-align: center;
        }

        .product-container img {
            width: 100%;
            border-radius: 12px;
        }

        .product-container h2 {
            font-size: 22px;
            color: #1a202c;
            margin: 12px 0;
        }

        .product-container p {
            font-size: 18px;
            color: #4a5568;
        }

        /* Responsive Layout */
        @media (max-width: 768px) {
            .main-container {
                flex-direction: column;
                align-items: center;
            }
            body {
            height: 200vh;
            margin: 0;
            padding: 20px;
            gap: 20px;
        }
            .payment-container,
            .product-container {
                width: 100%;
                max-width: 100%;
            }

            .payment-container {
                margin-top: 20px;
            }

            .product-container {
                margin-bottom: 20px;
            }
        }

        @media (max-width: 576px) {
            .payment-container {
                padding: 20px;
            }

            .product-container {
                padding: 20px;
            }

            .payment-container h2 {
                font-size: 18px;
            }

            .product-container h2 {
                font-size: 18px;
            }

            .product-container p,
            .payment-container p {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    
    <div class="main-container">
    <div class="product-container">
        
        <img class="card-img-top img-fluid" 
        src="<?= base_url('uploads/' . htmlspecialchars($product['productImage'], ENT_QUOTES, 'UTF-8')) ?>"  
        alt="<?= htmlspecialchars($product['productName'], ENT_QUOTES, 'UTF-8') ?>" 
        style="object-fit: cover; height: 20%; width:50%;">
        <h2 class="product-title"><?= esc($product['productName']) ?></h2>
                <!-- Display Total Price Based on Quantity -->
                <h6 class="product-price">Total Price: ₹<span id="total-price"><?= number_format($product['productPrice'], 2) ?></span></h6>
                <p class="product-description"><?= esc($product['productDescription']) ?></p>
                 <form action="<?= site_url('checkout/' . esc($product['id'])) ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="product_id" value="<?= esc($product['id']) ?>">
                        <input type="hidden" name="product_name" value="<?= esc($product['productName']) ?>">
                        <input type="hidden" name="product_price" value="<?= esc($product['productPrice']) ?>">
                    </form>
                 </div>


        <div class="payment-container">
            <img src="<?= base_url('images/vastra.png') ?>" style="width: 30%;" alt="Logo">
            <h2>Abstraction Magazine</h2>
            <h6 class="product-price">Total Price: ₹<span id="total-price"><?= number_format($product['productPrice'], 2) ?></span></h6>
            <button class="btn-custom">
                <i class="bi bi-apple"></i> Apple Pay
            </button>
            <div class="divider">Or pay with card</div>
            <form id="payment-form">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label>Card Information</label>
                    <div id="card-element"></div>
                </div>
                <div class="form-group">
                    <label for="country">Country or Region</label>
                    <select id="country">
                        <option>United States</option>
                        <option>India</option>
                        <option>United Kingdom</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="zip">ZIP</label>
                    <input type="text" id="zip" placeholder="Enter ZIP code" required>
                </div>
                <button type="submit" class="submit-button">Pay ₹<span id="total-price"><?= number_format($product['productPrice'], 2) ?></span></button>
            </form>
        </div>
    </div>

    <script>
        var stripe = Stripe('your-publishable-key'); // Replace with your Stripe publishable key
        var elements = stripe.elements();
        var card = elements.create('card', {
            style: {
                base: {
                    fontSize: '16px',
                    color: '#32325d',
                    '::placeholder': {
                        color: '#a0aec0',
                    },
                },
            },
        });
        card.mount('#card-element');

        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            stripe.createPaymentMethod({
                type: 'card',
                card: card,
                billing_details: {
                    email: document.getElementById('email').value,
                },
            }).then(function (result) {
                if (result.error) {
                    alert('Error: ' + result.error.message);
                } else {
                    alert('Payment Method Created Successfully: ' + result.paymentMethod.id);
                    // Add further processing here.
                }
            });
        });
    </script>
</body>
</html>
