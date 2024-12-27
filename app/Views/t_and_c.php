<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Conditions - Vastra Beauty</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Custom styling for Terms & Conditions page */
        .terms-section {
            margin-top: 2rem;
            line-height: 1.6;
        }

        .terms-title {
            font-size: 2rem;
            font-weight: bold;
            color: #d9534f;
        }

        .terms-content {
            font-size: 1rem;
            color: #555;
        }

        .highlight {
            font-weight: bold;
            color: #d9534f;
        }
    </style>
</head>
<body>
<hr class="border-top border-1 border-success my-4 d-none d-sm-block">

<!-- Hero Section -->
<div class="container text-center py-5">
    <h1 class="display-4 text-danger">Terms and Conditions</h1>
    <p class="lead">Please read the following terms and conditions carefully before participating in any offers or using our platform.</p>
</div>

<!-- Terms and Conditions Section -->
<div class="container terms-section">
    <div class="terms-title mb-4">Welcome to Vastra</div>

    <div class="terms-content">
        <p>This page details a limited period Offer provided by our participating sellers redeemable through our Vastra Marketplace Platform only in the mobile application. Please read these terms and conditions carefully before participating. You should understand that by participating in the Offer and using our Platform, you agree to be bound by these terms and conditions including Terms of Use and Privacy Policy of the Platform. Please understand that if you refuse to accept these terms and conditions, you will not be able to access the offers provided under our Platform.</p>

        <h5 class="highlight">Offer Terms & Conditions</h5>
        <ul>
            <li>Offer valid for a limited period only.</li>
            <li>The Offer is applicable only on one application per User.</li>
            <li>The offer is funded by the Brand.</li>
        </ul>

        <h5 class="highlight">General Terms and Conditions</h5>
        <ul>
            <li>This Offer is valid across India, except Tamil Nadu and Puducherry.</li>
            <li>The Offer is open to only end consumers and not the resellers of the products.</li>
            <li>Rewards shall not be settled with cash in lieu by Vastra and are not transferable.</li>
            <li>Vastra reserves the right to terminate, withdraw, suspend, amend, extend, modify, add, or remove portions of this Offer at any time without any prior written notice.</li>
            <li>The Offer shall not be available on the purchase of any products that are returned or refunded by the Purchaser or if the order for such Products is cancelled by the Purchaser.</li>
            <li>By participating in this Offer, the Purchaser will be deemed to be an adult and having read, understood, acknowledged, and consented to these detailed terms & conditions.</li>
            <li>Vastra shall not be responsible for any loss, injury, or any other liability arising due to participation by any person in this Offer.</li>
        </ul>

        <h5 class="highlight">Prize Details</h5>
        <ul>
            <li>The Prize can neither be encashed nor exchanged for any other product listed on the Platform or otherwise.</li>
            <li>The Winners shall not be entitled to any claim against the Company or Platform except the Prize.</li>
        </ul>

        <h5 class="highlight">Taxes and Liabilities</h5>
        <ul>
            <li>The Winners of the Offer shall not be liable for any taxes applicable on the Prize, however, shall be required to share their PAN details.</li>
            <li>The Offer shall be subject to the Income-Tax Act, 1961, and all disbursements shall be subject to TDS, as applicable.</li>
        </ul>

        <h5 class="highlight">Miscellaneous</h5>
        <ul>
            <li>This T&C shall be governed in accordance with the applicable laws in India. Courts at Bangalore shall have the exclusive jurisdiction to settle any dispute that may arise under this T&C.</li>
            <li>In the event the Vastra App is downloaded from Apple’s App Store, note that Apple’s App Store is only an app downloading platform and in no way, shape, or form, Apple is responsible/involved for any contest/offer being run on the Vastra App.</li>
        </ul>

        <p class="mt-4">For any queries regarding the Offer, please contact our customer service team.</p>
    </div>
</div>

<hr class="border-top border-1 border-success my-4 d-none d-sm-block">
<!-- Footer Section -->
<?= $this->include('footer'); ?>
</body>
</html>
<?= $this->endSection() ?>
