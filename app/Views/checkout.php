<?php
$user = session()->get('user'); // User information from session
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
        /* Styling the active step */
        .step-link.active {
            color: #28a745;
            font-weight: bold;
            position: relative;
        }
        .step-link.active::after {
            content: '';
            display: block;
            width: 100%;
            height: 2px;
            background-color: #28a745;
            position: absolute;
            bottom: -4px;
            left: 0;
        }
        .step-link:hover {
            color: #28a745;
            text-decoration: underline;
        }
        .separator {
            color: #ccc;
        }
    </style>
    <style>
   
        .main-container {
            display: flex;
            gap: 8px;
            width: 100%;
            justify-content: space-between;
            max-width: 1200px;
            flex-wrap: wrap;
        }
        .product-container {
            padding:100px;
            flex: 1;
            min-width: 300px;
            max-width: 600px;
            text-align: center;
            margin-bottom: 20px;
            max-height: 600px; /* Define max height to control overflow */
            overflow-y: auto; /* Add scroll when content overflows */
        }
        .product-container img {
            width: 40%;
            border-radius: 12px;
        }
        .product-container h5 {
            font-size: 22px;
            color: #1a202c;
            margin: 12px 0;
        }
        .product-container p {
            font-size: 18px;
            color: #4a5568;
        }
        .payment-container {
            width: 350px; /* Set width */
            height: 700px; /* Set height */
            background-color: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            padding: 32px;
            text-align: center;
            overflow-y: auto; /* Make payment form scrollable if it exceeds height */
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
    </style>
</head>
<body>
<nav class="d-flex justify-content-between align-items-center p-3 bg-white border-bottom">
        <div>
            <a class="navbar-brand text-danger fw-bold fs-4" href="/">Vastra</a>
        </div>
        <ul class="list-unstyled d-flex align-items-center mb-0">
            <li><a href="/cart" class="text-decoration-none step-link text-black">BAG</a></li>
            <li><span class="mx-3 separator">---------</span><a href="/address" class="text-decoration-none step-link text-black">ADDRESS</a></li>
            <li><span class="mx-3 separator">---------</span><a href="/checkout" class="text-decoration-none step-link  active">PAYMENT</a></li>
        </ul>
        <div class="d-flex align-items-center">
            <i class="bi bi-shield-check text-success fs-4 me-2"></i>
            <span class="text-muted">100% SECURE</span>
        </div>
    </nav>
    <div class="main-container">
        <!-- Product Container (left side) -->
        <div class="product-container">
            <?php foreach ($cart_items as $cart_item): ?>
            <img src="<?= base_url('uploads/' . htmlspecialchars($cart_item['product_image'])) ?>" alt="<?= esc($cart_item['product_name']) ?>" />
            <h5><?= esc($cart_item['product_name']) ?></h5>
            <p>Price: ₹<?= number_format($cart_item['product_price'], 2) ?></p>
            <p>Size: <?= esc($cart_item['product_size']) ?></p>
            <p>Quantity: <?= esc($cart_item['quantity']) ?></p>
            <?php endforeach; ?>
        </div>

        <!-- Payment Container (right side) -->
        <div class="payment-container">
            <img src="<?= base_url('images/vastra.png') ?>" alt="Logo" style="width: 30%;">
            <h2>Payment for your purchase</h2>
            <h6 class="product-price">Total Price: ₹<span id="total-price">
                <?php
                // Calculate total price for cart items
                $totalPrice = array_reduce($cart_items, function($carry, $item) {
                    return $carry + ($item['product_price'] * $item['quantity']);
                }, 0);
                echo number_format($totalPrice, 2);
                ?>
            </span></h6>

            <!-- Payment Options -->
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

                <button type="submit" class="submit-button">Pay ₹<span id="total-price"><?= number_format($totalPrice, 2) ?></span></button>
            </form>
        </div>
    </div>

    <script>
        var stripe = Stripe('<?= esc($publishableKey) ?>'); // Stripe publishable key
        
        var elements = stripe.elements();
        var card = elements.create('card');
        card.mount('#card-element');

        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createPaymentMethod({
                type: 'card',
                card: card,
                billing_details: {
                    email: document.getElementById('email').value,
                },
            }).then(function(result) {
                if (result.error) {
                    alert('Error: ' + result.error.message);
                } else {
                    // Prepare the data to send with the POST request
                    var postData = {
                        payment_method: result.paymentMethod.id,
                        user_id: '<?= esc($user['id']) ?>', // Send user ID from the session
                        total_price: '<?= $totalPrice ?>', // Total price for the cart
                    };

                    // Send the data to your server
                    fetch('/checkout/process', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(postData), // Sending the data as JSON
                    })
                    .then(response => response.json())
                    .then(function(data) {
                        if (data.status === 'success') {
                            alert('Payment successful!');
                        } else {
                            alert('Payment failed: ' + data.message);
                        }
                    }).catch(function(error) {
                        alert('Error: ' + error.message);
                    });
                }
            });
        });
    </script>
    <script>
    const handlePayment = async (stripeToken) => {
    const response = await fetch('/checkout/process', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            stripeToken: stripeToken.id // This should be a valid Stripe Token object
        })
    });

    const data = await response.json();

    if (data.status === 'success') {
        // Payment succeeded, you can use the `clientSecret` to confirm the payment on frontend
        console.log('Payment Successful!', data.clientSecret);
    } else {
        // Payment failed
        alert('Payment failed: ' + data.message);
    }
};
</script>
</body>
</html>
