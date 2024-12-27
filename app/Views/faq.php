<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Vastra Beauty</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Custom styling for FAQ page */
        .faq-section {
            margin-top: 2rem;
            line-height: 1.6;
        }

        .faq-title {
            font-size: 2rem;
            font-weight: bold;
            color: #d9534f;
        }

        .faq-question {
            font-size: 1.2rem;
            font-weight: bold;
            color: #555;
            margin-top: 1rem;
        }

        .faq-answer {
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
    <h1 class="display-4 text-danger">Frequently Asked Questions (FAQ)</h1>
    <p class="lead">Find answers to the most common questions regarding our offers, products, and services at Vastra.</p>
</div>

<!-- FAQ Section -->
<div class="container faq-section">
    <div class="faq-title mb-4">What is the Offer?</div>
    <div class="faq-question">Buy any beauty products worth ₹1999 & above during the festive sale at Vastra and get exclusive discounts on your next purchase.</div>
    <div class="faq-answer">This special offer allows customers to enjoy discounts when purchasing beauty products over ₹1999 during the festival period. The offer is available on selected products only.</div>

    <div class="faq-title mb-4">What is the Offer Duration?</div>
    <div class="faq-question">When is the offer valid?</div>
    <div class="faq-answer">This offer is valid from 00:00 hrs on 5th December 2024 to 23:59 hrs on 17th December 2024 or until stocks last.</div>

    <div class="faq-title mb-4">How Do I Check Customer Eligibility?</div>
    <div class="faq-question">Who is eligible for the offer?</div>
    <div class="faq-answer">To be eligible, customers must purchase products from the beauty category for ₹1999 or more in a single transaction during the offer period. Only one discount can be availed per eligible transaction/customer.</div>

    <div class="faq-title mb-4">Can I Use Any Payment Method to Avail the Offer?</div>
    <div class="faq-question">What payment methods can I use?</div>
    <div class="faq-answer">Yes, you can avail the offer irrespective of the mode of payment, whether through Bank Debit, Credit Cards, or UPI options.</div>

    <div class="faq-title mb-4">How Many Times Can This Offer Be Availed?</div>
    <div class="faq-question">Can I avail this offer multiple times?</div>
    <div class="faq-answer">The offer can be availed only once per account during the offer period.</div>

    <div class="faq-title mb-4">When Can Customers Avail the Offer?</div>
    <div class="faq-question">When will the offer be available?</div>
    <div class="faq-answer">The offer is available during the festival period from 5th December 2024 to 17th December 2024. After this, customers can redeem their offer after the return/cancellation window ends (typically 10 to 12 days after purchase).</div>

    <div class="faq-title mb-4">How Can I Redeem the Offer?</div>
    <div class="faq-question">How do I claim my offer?</div>
    <div class="faq-answer">Once the return/cancellation window is closed, you will receive a notification via email and SMS from Vastra. You can then redeem your discount or gift on your next purchase. Follow the instructions in the notification to claim your offer.</div>

    <div class="faq-title mb-4">Other Terms and Conditions</div>
    <div class="faq-question">What are the terms and conditions for this offer?</div>
    <div class="faq-answer">Please read the terms and conditions carefully before participating in the offer. You can refer to our Terms and Conditions page for all the necessary details about the offer and its validity.</div>
</div>

<hr class="border-top border-1 border-success my-4 d-none d-sm-block">
<!-- Footer Section -->
<?= $this->include('footer'); ?>
</body>
</html>
<?= $this->endSection() ?>
