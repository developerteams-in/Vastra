<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping Policy - Vastra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>

    <!-- Main Content -->
    <div class="container mt-5">
        <h1 class="text-center mb-4">Shipping Policy</h1>

        <p>Thank you for shopping with Vastra! We aim to provide fast, efficient, and affordable shipping to all our customers. Please read through our shipping policy to understand the charges and guidelines better.</p>

        <!-- Shipping Fee Section -->
        <div class="accordion" id="shippingFeeAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="shippingFeeHeading">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#shippingFee" aria-expanded="true" aria-controls="shippingFee">
                        1. Shipping Fee Overview
                    </button>
                </h2>
                <div id="shippingFee" class="accordion-collapse collapse show" aria-labelledby="shippingFeeHeading" data-bs-parent="#shippingFeeAccordion">
                    <div class="accordion-body">
                        <p>Shipping fees are charged for providing delivery services, including handling returns and customer support. These charges apply depending on the order value and category.</p>
                        <ul>
                            <li>Orders below INR 1199 in most categories (except personal care) will incur a shipping charge.</li>
                            <li>For personal care orders below INR 299, a shipping fee applies.</li>
                            <li>The final shipping fee is calculated after applying any discounts, coupons, or offers.</li>
                            <li>Shipping fees are subject to change; please review at checkout.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Insider Shipping Fee Section -->
        <div class="accordion mt-3" id="insiderShippingAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="insiderShippingHeading">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#insiderShipping" aria-expanded="true" aria-controls="insiderShipping">
                        2. Shipping Fee for Insiders
                    </button>
                </h2>
                <div id="insiderShipping" class="accordion-collapse collapse show" aria-labelledby="insiderShippingHeading" data-bs-parent="#insiderShippingAccordion">
                    <div class="accordion-body">
                        <p>As a Vastra Insider, you enjoy free shipping on all orders, no matter the value. However, shipping fees are still applied to cover platform services like technical support and brand aggregation.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Refund of Shipping Fee Section -->
        <div class="accordion mt-3" id="refundAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="refundHeading">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#refundShipping" aria-expanded="true" aria-controls="refundShipping">
                        3. Refund of Shipping Fee
                    </button>
                </h2>
                <div id="refundShipping" class="accordion-collapse collapse show" aria-labelledby="refundHeading" data-bs-parent="#refundAccordion">
                    <div class="accordion-body">
                        <p>The shipping fee can be refunded under certain conditions:</p>
                        <ul>
                            <li>If the entire order is lost or undelivered, a full refund will be provided, including the shipping fee.</li>
                            <li>If part of the order is cancelled, shipping fees will not be refunded.</li>
                            <li>Shipping fees are non-refundable for returns or exchanges.</li>
                            <li>Shipping fees will not be refunded for accounts with excessive return behavior that violates our fair usage policy.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Information Section -->
        <h2 class="section-title">Additional Information</h2>
        <p class="content">We strive to ensure the quickest delivery times possible. However, shipping times may vary based on your location, the availability of products, and other external factors such as weather conditions or shipping carrier delays.</p>
        <p class="content">If you have any questions about your order's shipping status, please don't hesitate to contact our customer service team. We're here to help!</p>

        <h2 class="section-title">Contact Us</h2>
        <p class="content">For any further inquiries or issues related to your order, please reach out to us through the contact details provided on our Contact Us page. We are committed to providing excellent service and resolving any concerns promptly.</p>
    </div>

     <!-- Footer -->
  <?= $this->include('footer'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?= $this->endSection() ?>