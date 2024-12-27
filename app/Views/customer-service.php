<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Service - Vastra</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <!-- Customer Service Section -->
  <div class="container my-5">
    <h1 class="text-center mb-4">Customer Service</h1>

    <!-- Contact Info -->
    <section id="contact">
      <h3>Contact Us</h3>
      <p>If you have any questions or need assistance, feel free to reach out to us:</p>
      <ul class="list-unstyled">
        <li><strong>Email:</strong> support@vastra.com</li>
        <li><strong>Phone:</strong> +91 6387841012</li>
        <li><strong>Address:</strong> 123 Fashion Street, City, Country</li>
      </ul>
    </section>

    <!-- Shipping Information -->
    <section id="shipping" class="mt-5">
      <h3>Shipping Information</h3>
      <p>We offer a variety of shipping options to suit your needs:</p>
      <ul class="list-unstyled">
        <li><strong>Standard Shipping:</strong> 5-7 business days</li>
        <li><strong>Express Shipping:</strong> 2-3 business days</li>
        <li><strong>International Shipping:</strong> Varies by destination</li>
      </ul>
      <p>All orders are processed within 24 hours of receipt. You will receive an email with tracking information once your order has shipped.</p>
    </section>

    <!-- Frequently Asked Questions -->
    <section id="faq" class="mt-5">
      <h3>Frequently Asked Questions</h3>
      <div class="accordion" id="faqAccordion">
        <div class="accordion-item">
          <h2 class="accordion-header" id="faqHeading1">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="true" aria-controls="faqCollapse1">
              What is the return policy?
            </button>
          </h2>
          <div id="faqCollapse1" class="accordion-collapse collapse show" aria-labelledby="faqHeading1" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              You can return your items within 30 days of purchase for a full refund or exchange. The item must be in its original condition with tags attached.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="faqHeading2">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
              How do I track my order?
            </button>
          </h2>
          <div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Once your order has shipped, you'll receive a tracking number via email. You can track your order through our website or the carrier's tracking portal.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="faqHeading3">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3">
              Do you offer gift cards?
            </button>
          </h2>
          <div id="faqCollapse3" class="accordion-collapse collapse" aria-labelledby="faqHeading3" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Yes, we offer digital gift cards available in various denominations. You can purchase them directly from our website.
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Returns & Exchanges -->
    <section id="returns" class="mt-5">
      <h3>Returns & Exchanges</h3>
      <p>We want you to be completely satisfied with your purchase. If you’re not happy, we accept returns and exchanges:</p>
      <ul class="list-unstyled">
        <li><strong>Returns:</strong> You can return your items within 30 days of receipt for a full refund. Please note that the return shipping fee is your responsibility unless the return is due to a mistake on our part.</li>
        <li><strong>Exchanges:</strong> If you would like to exchange an item, simply return it and place a new order for the item you wish to receive.</li>
      </ul>
      <p>For more details, please refer to our <a href="/returns">Returns Policy</a>.</p>
    </section>

    <!-- Privacy Policy -->
    <section id="privacy" class="mt-5">
      <h3>Privacy Policy</h3>
      <p>We value your privacy. Here's how we handle your information:</p>
      <ul class="list-unstyled">
        <li><strong>Personal Information:</strong> We collect only necessary information, such as your name, address, and payment details, to process your orders.</li>
        <li><strong>Data Security:</strong> We use secure encryption methods to protect your personal data from unauthorized access.</li>
        <li><strong>Cookies:</strong> We use cookies to enhance your shopping experience. By using our website, you consent to our use of cookies.</li>
      </ul>
      <p>For more details, please refer to our <a href="/privacy-policy">Privacy Policy</a>.</p>
    </section>

    <!-- Contact Form -->
    <section id="contact-form" class="mt-5">
      <h3>Send Us a Message</h3>
      <form>
        <div class="mb-3">
          <label for="name" class="form-label">Your Name</label>
          <input type="text" class="form-control" id="name" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Your Email</label>
          <input type="email" class="form-control" id="email" required>
        </div>
        <div class="mb-3">
          <label for="message" class="form-label">Your Message</label>
          <textarea class="form-control" id="message" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-danger">Submit</button>
      </form>
    </section>
  </div>

  <!-- Footer -->
  <?= $this->include('footer'); ?>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?= $this->endSection() ?>