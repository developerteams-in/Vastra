<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy - Vastra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .section-title {
            font-size: 1.5rem;
            margin-top: 20px;
        }
        .content {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <!-- Main Content -->
    <div class="container mt-5">
        <h1 class="text-center mb-4">Privacy Policy</h1>

        <p>At Vastra, we value and respect your privacy. This Privacy Policy outlines the information we collect, how it is used, and how we protect your data. By using our website and services, you agree to the terms of this policy.</p>

        <!-- Information We Collect Section -->
        <div class="accordion" id="infoAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="infoHeading">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#infoContent" aria-expanded="true" aria-controls="infoContent">
                        1. Information We Collect
                    </button>
                </h2>
                <div id="infoContent" class="accordion-collapse collapse show" aria-labelledby="infoHeading" data-bs-parent="#infoAccordion">
                    <div class="accordion-body">
                        <p>We collect two types of information:</p>
                        <ul>
                            <li><strong>Personal Information:</strong> Information such as your name, email address, phone number, billing/shipping address, and payment details that you provide when making a purchase or registering on our website.</li>
                            <li><strong>Non-Personal Information:</strong> We collect non-personal information such as browser type, operating system, IP address, and website usage data to improve the user experience.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- How We Use Your Information Section -->
        <div class="accordion mt-3" id="usageAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="usageHeading">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#usageContent" aria-expanded="true" aria-controls="usageContent">
                        2. How We Use Your Information
                    </button>
                </h2>
                <div id="usageContent" class="accordion-collapse collapse show" aria-labelledby="usageHeading" data-bs-parent="#usageAccordion">
                    <div class="accordion-body">
                        <p>The information we collect is used for the following purposes:</p>
                        <ul>
                            <li>To process orders and deliver products to you.</li>
                            <li>To communicate with you regarding your orders and customer support requests.</li>
                            <li>To improve and personalize your shopping experience.</li>
                            <li>To send marketing communications, promotions, and updates (with your consent).</li>
                            <li>To comply with legal obligations and prevent fraud.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Protection Section -->
        <div class="accordion mt-3" id="protectionAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="protectionHeading">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#protectionContent" aria-expanded="true" aria-controls="protectionContent">
                        3. How We Protect Your Information
                    </button>
                </h2>
                <div id="protectionContent" class="accordion-collapse collapse show" aria-labelledby="protectionHeading" data-bs-parent="#protectionAccordion">
                    <div class="accordion-body">
                        <p>Your data security is our top priority. We use various security measures, including:</p>
                        <ul>
                            <li>Encryption of sensitive data during transmission.</li>
                            <li>Secure servers and databases to store your personal information.</li>
                            <li>Strict access controls to protect against unauthorized data access.</li>
                        </ul>
                        <p>While we take all reasonable steps to protect your data, no method of transmission over the Internet or method of electronic storage is 100% secure.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sharing Your Information Section -->
        <div class="accordion mt-3" id="sharingAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="sharingHeading">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sharingContent" aria-expanded="true" aria-controls="sharingContent">
                        4. Sharing Your Information
                    </button>
                </h2>
                <div id="sharingContent" class="accordion-collapse collapse show" aria-labelledby="sharingHeading" data-bs-parent="#sharingAccordion">
                    <div class="accordion-body">
                        <p>We do not sell or rent your personal information. However, we may share your data in the following cases:</p>
                        <ul>
                            <li>With service providers who assist in processing orders or providing customer support.</li>
                            <li>When required by law or to protect the rights of Vastra.</li>
                            <li>With our business partners, only if you have provided consent to receive marketing communications.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cookies and Tracking Technologies Section -->
        <div class="accordion mt-3" id="cookiesAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="cookiesHeading">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#cookiesContent" aria-expanded="true" aria-controls="cookiesContent">
                        5. Cookies and Tracking Technologies
                    </button>
                </h2>
                <div id="cookiesContent" class="accordion-collapse collapse show" aria-labelledby="cookiesHeading" data-bs-parent="#cookiesAccordion">
                    <div class="accordion-body">
                        <p>We use cookies and other tracking technologies to enhance your experience on our website. These technologies help us:</p>
                        <ul>
                            <li>Remember your preferences and settings.</li>
                            <li>Track website usage and improve performance.</li>
                            <li>Serve targeted advertisements (with your consent).</li>
                        </ul>
                        <p>You can manage your cookie preferences through your browser settings. If you choose to disable cookies, some features of our website may not function properly.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Your Rights Section -->
        <div class="accordion mt-3" id="rightsAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="rightsHeading">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#rightsContent" aria-expanded="true" aria-controls="rightsContent">
                        6. Your Rights
                    </button>
                </h2>
                <div id="rightsContent" class="accordion-collapse collapse show" aria-labelledby="rightsHeading" data-bs-parent="#rightsAccordion">
                    <div class="accordion-body">
                        <p>You have the right to:</p>
                        <ul>
                            <li>Access and update your personal information.</li>
                            <li>Request the deletion of your personal data (where applicable).</li>
                            <li>Withdraw consent for marketing communications.</li>
                        </ul>
                        <p>If you wish to exercise any of these rights, please contact us at the details provided at the end of this policy.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Us Section -->
        <h2 class="section-title">Contact Us</h2>
        <p class="content">If you have any questions or concerns regarding this Privacy Policy, or if you would like to exercise your rights, please contact us:</p>
        <p>Email: <strong>support@vastra.com</strong></p>
        <p>Phone: <strong>+91-XXXXXXXXXX</strong></p>
    </div>

   <!-- Footer -->
  <?= $this->include('footer'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?= $this->endSection() ?>