<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Careers at Vastra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<!-- Hero Section -->
<div class="container text-center mt-5">
    <h1 class="display-4">Join the Vastra Team</h1>
    <p class="lead">Explore exciting career opportunities with us.</p>
</div>

<!-- Job Openings Section -->
<div class="container mt-5" id="openings">
    <h2 class="mb-4">Current Openings</h2>
    <div class="accordion" id="jobOpeningsAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Frontend Developer
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#jobOpeningsAccordion">
                <div class="accordion-body">
                    <p><strong>Location:</strong> Remote</p>
                    <p><strong>Experience:</strong> 2+ years</p>
                    <p><strong>Skills:</strong> HTML, CSS, JavaScript, React.js</p>
                    <button class="btn btn-success" onclick="applyNow('Frontend Developer')">Apply Now</button>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Backend Developer
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#jobOpeningsAccordion">
                <div class="accordion-body">
                    <p><strong>Location:</strong> On-Site</p>
                    <p><strong>Experience:</strong> 3+ years</p>
                    <p><strong>Skills:</strong> Node.js, Express.js, MongoDB</p>
                    <button class="btn btn-success" onclick="applyNow('Backend Developer')">Apply Now</button>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    UI/UX Designer
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#jobOpeningsAccordion">
                <div class="accordion-body">
                    <p><strong>Location:</strong> Hybrid</p>
                    <p><strong>Experience:</strong> 2+ years</p>
                    <p><strong>Skills:</strong> Adobe XD, Figma, Prototyping, Wireframing</p>
                    <button class="btn btn-success" onclick="applyNow('UI/UX Designer')">Apply Now</button>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Digital Marketing Specialist
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#jobOpeningsAccordion">
                <div class="accordion-body">
                    <p><strong>Location:</strong> Remote</p>
                    <p><strong>Experience:</strong> 3+ years</p>
                    <p><strong>Skills:</strong> SEO, SEM, Social Media Marketing, Google Analytics</p>
                    <button class="btn btn-success" onclick="applyNow('Digital Marketing Specialist')">Apply Now</button>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    Quality Assurance Engineer
                </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#jobOpeningsAccordion">
                <div class="accordion-body">
                    <p><strong>Location:</strong> On-Site</p>
                    <p><strong>Experience:</strong> 4+ years</p>
                    <p><strong>Skills:</strong> Manual Testing, Automated Testing, Bug Tracking</p>
                    <button class="btn btn-success" onclick="applyNow('Quality Assurance Engineer')">Apply Now</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Interactive Section: Application Form Modal -->
<div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="applyModalLabel">Apply for a Position</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="applicationForm">
                    <div class="mb-3">
                        <label for="applicantName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="applicantName" required>
                    </div>
                    <div class="mb-3">
                        <label for="applicantEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="applicantEmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="applicantResume" class="form-label">Resume</label>
                        <input type="file" class="form-control" id="applicantResume" required>
                    </div>
                    <input type="hidden" id="jobTitle">
                    <button type="submit" class="btn btn-primary">Submit Application</button>
                </form>
            </div>
        </div>
    </div>
</div>


   <!-- Footer -->
   <?= $this->include('footer'); ?>

<script>
    function applyNow(jobTitle) {
        $('#jobTitle').val(jobTitle);
        $('#applyModalLabel').text(`Apply for ${jobTitle}`);
        $('#applyModal').modal('show');
    }

    $('#applicationForm').on('submit', function (e) {
        e.preventDefault();
        alert('Application submitted successfully!');
        $('#applyModal').modal('hide');
        this.reset();
    });
</script>

</body>
</html>
<?= $this->endSection() ?>
