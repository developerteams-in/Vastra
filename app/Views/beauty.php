<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Card Styling */
        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .product-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .product-card img {
            object-fit: cover;
            height: 150px; /* Fixed height for the images */
        }

        .product-card-body {
            padding: 1.5rem;
            text-align: center;
        }

        /* Title and Text Styling */
        .product-card-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #333;
        }

        .product-card-price {
            font-size: 1.1rem;
            font-weight: bold;
            color: #d9534f;
            margin-top: 0.5rem;
        }

        .product-card-text {
            font-size: 1rem;
            color: #777;
        }

        /* Quote Section Styling */
        .quote-section {
            font-style: italic;
            color: #555;
            margin-top: 1rem;
        }

        /* Row Styling */
        .product-row {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            justify-content: center;
        }

        .col-md-3 {
            max-width: 250px; /* Limit card width */
        }
    </style>
</head>
<body>
<hr class="border-top border-1 border-success my-4 d-none d-sm-block">
<!-- Hero Section -->
<div class="container text-center py-5">
    <h1 class="display-4 text-danger">Beauty Products</h1>
    <p class="lead">Explore our curated selection of premium beauty products tailored to your needs.</p>
</div>

<!-- Product Cards Section -->
<div class="container">
    <div class="product-row">
        <!-- Product 1: Hydrating Face Serum -->
        <div class="col-md-3">
            <div class="card product-card">
                <img src="https://cdn.pixabay.com/photo/2019/10/17/09/18/make-up-4556428_1280.jpg" class="card-img-top" alt="Face Serum">
                <div class="card-body product-card-body">
                    <h5 class="card-title product-card-title">Hydrating Face Serum</h5>
                    <p class="card-text product-card-text">Boost your skin's hydration with this nourishing face serum, perfect for dry and dull skin. Packed with moisturizing ingredients that help restore the skin's natural moisture balance, this serum ensures a glowing and fresh appearance throughout the day.</p>
                    <p class="product-card-price">$49.99</p>
                    <div class="quote-section">
                        <p>"A drop of this serum can make a world of difference—nourishing your skin deeply and bringing out its natural radiance."</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product 2: Nourishing Moisturizer -->
        <div class="col-md-3">
            <div class="card product-card">
                <img src="https://cdn.pixabay.com/photo/2022/11/06/00/56/skin-7573077_1280.png" class="card-img-top" alt="Moisturizer">
                <div class="card-body product-card-body">
                    <h5 class="card-title product-card-title">Nourishing Moisturizer</h5>
                    <p class="card-text product-card-text">Lock in moisture with this rich, hydrating formula that leaves skin soft and smooth. The nourishing properties of this moisturizer rejuvenate your skin, making it feel refreshed and deeply hydrated. Ideal for daily use, it provides long-lasting hydration and helps restore skin's elasticity.</p>
                    <p class="product-card-price">$34.99</p>
                    <div class="quote-section">
                        <p>"This moisturizer doesn’t just hydrate—it creates a lasting shield to protect your skin against dryness and environmental stressors."</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product 3: Long-Lasting Lipstick -->
        <div class="col-md-3">
            <div class="card product-card">
                <img src="https://cdn.pixabay.com/photo/2017/08/02/12/44/accessories-2571416_1280.jpg" class="card-img-top" alt="Lipstick">
                <div class="card-body product-card-body">
                    <h5 class="card-title product-card-title">Long-Lasting Lipstick</h5>
                    <p class="card-text product-card-text">Get bold, beautiful lips that last all day with our collection of highly pigmented lipsticks. The creamy texture glides on effortlessly and provides full coverage with a matte finish that stays put without smudging. Ideal for all-day wear, keeping your lips vibrant and stunning.</p>
                    <p class="product-card-price">$19.99</p>
                    <div class="quote-section">
                        <p>"Indulge in a lipstick that doesn’t budge—keep your lips bold, stunning, and vibrant throughout the day."</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product 4: Anti-Aging Cream -->
        <div class="col-md-3">
            <div class="card product-card">
                <img src="https://cdn.pixabay.com/photo/2016/04/13/22/26/cream-1327847_1280.jpg" class="card-img-top" alt="Anti-Aging Cream">
                <div class="card-body product-card-body">
                    <h5 class="card-title product-card-title">Anti-Aging Cream</h5>
                    <p class="card-text product-card-text">Fight fine lines and wrinkles with this powerful anti-aging cream that rejuvenates skin overnight. Formulated with retinol and antioxidants, this cream improves skin texture, restores youthful firmness, and minimizes the appearance of age spots. Wake up to smoother, more youthful-looking skin.</p>
                    <p class="product-card-price">$69.99</p>
                    <div class="quote-section">
                        <p>"Age gracefully with this anti-aging cream—it not only reduces wrinkles but also restores your skin's youthful glow."</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product 5: Revitalizing Face Mask -->
        <div class="col-md-3">
            <div class="card product-card">
                <img src="https://cdn.pixabay.com/photo/2013/07/18/10/56/woman-163540_1280.jpg" class="card-img-top" alt="Face Mask">
                <div class="card-body product-card-body">
                    <h5 class="card-title product-card-title">Revitalizing Face Mask</h5>
                    <p class="card-text product-card-text">This rejuvenating face mask restores radiance to tired skin. Packed with nourishing ingredients, it helps remove impurities while hydrating and detoxifying your complexion, giving you an instant glow and smoother texture. A quick solution for refreshing your skin before any event.</p>
                    <p class="product-card-price">$24.99</p>
                    <div class="quote-section">
                        <p>"Take your skincare routine to the next level—this mask helps detoxify, hydrate, and refresh, leaving your skin glowing and renewed."</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product 6: Vitamin C Serum -->
        <div class="col-md-3">
            <div class="card product-card">
                <img src="https://cdn.pixabay.com/photo/2017/07/25/18/56/lemons-2539163_1280.jpg" class="card-img-top" alt="Vitamin C Serum">
                <div class="card-body product-card-body">
                    <h5 class="card-title product-card-title">Vitamin C Serum</h5>
                    <p class="card-text product-card-text">Brighten and even out your complexion with this powerful vitamin C serum that reduces dark spots and boosts radiance. Packed with antioxidants, this serum helps protect the skin from free radicals and environmental damage while stimulating collagen production for firmer skin.</p>
                    <p class="product-card-price">$39.99</p>
                    <div class="quote-section">
                        <p>"Let your skin shine bright with the power of vitamin C—experience a brighter, more even complexion every day."</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer Section -->
<hr class="border-top border-1 border-success my-4 d-none d-sm-block">
<?= $this->include('footer'); ?>
</body>
</html>
<?= $this->endSection() ?>
