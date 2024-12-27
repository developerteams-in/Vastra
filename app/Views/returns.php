<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Returns & Exchange Policy | Vastra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
        <a class="navbar-brand text-center w-100" href="#">Returns & Exchange Policy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container my-5">
        <p class="lead">At Vastra, a premium clothing fashion company, we pride ourselves on providing top-quality, luxurious products. Our returns and exchange policy ensures a seamless shopping experience for our valued customers.</p>

        <div class="alert alert-info text-center" role="alert">
            <strong>Note:</strong> Vastra's products are manufactured to the highest standards. Returns are carefully reviewed to maintain our premium quality promise.
        </div>

        <div class="accordion" id="returnsPolicyAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        General Guidelines
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#returnsPolicyAccordion">
                    <div class="accordion-body">
                        <ul>
                            <li>Products must be unused, with original tags and packaging intact.</li>
                            <li>Seal tags (if any) should remain attached and intact.</li>
                            <li>Returns will be picked up from the delivery address or can be self-shipped to our facility.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Return Methods
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#returnsPolicyAccordion">
                    <div class="accordion-body">
                        <ul>
                            <li><strong>Pick Up:</strong> Available in most locations. Our delivery agent will pick up the product and conduct a quality check during the pickup.</li>
                            <li><strong>Self-Ship:</strong> If pickup is unavailable, you may self-ship the product. Shipping costs will be reimbursed as Vastra credits upon validation of the courier receipt.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Exchange Policy
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#returnsPolicyAccordion">
                    <div class="accordion-body">
                        <ul>
                            <li>Exchange is available for size mismatches or defective items, subject to stock availability and serviceability of your address.</li>
                            <li>If the exchange item is of a higher value, the difference will be charged to you. If of a lower value, the difference will be refunded.</li>
                            <li>Exchanges are allowed for the same or different products of equivalent or differing value.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Exceptions & Rules
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#returnsPolicyAccordion">
                    <div class="accordion-body">
                        <ul>
                            <li>Non-returnable items include intimate wear, socks, swimwear, and certain categories of jewelry and accessories.</li>
                            <li>Products damaged or returned without original tags will not be accepted.</li>
                            <li>Self-shipped returns will undergo quality checks at our warehouse. If they fail, the product will be returned to you.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <h3>How to Initiate a Return or Exchange</h3>
            <p>To initiate a return or exchange, log in to your Vastra account, navigate to "My Orders," and select the product you wish to return or exchange. Follow the on-screen instructions to complete your request.</p>

            <h3>Contact Us</h3>
            <p>If you have questions or need further assistance, our customer support team is here to help. Reach out to us via email at <a href="mailto:support@vastra.com">support@vastra.com</a> or call us at +91 6387841012.</p>
        </div>

        <p class="mt-4">Thank you for shopping with Vastra! Your satisfaction is our priority.</p>
    </div>
  <!-- Footer -->
  <?= $this->include('footer'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?= $this->endSection() ?>