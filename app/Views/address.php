<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
  .custom-card .btn-transparent {
    background-color: transparent; /* Transparent background */
    border: 1px solid black; /* 1px solid black border */
    color: black; /* Black text color */
    padding: 4px 8px; /* Smaller padding for smaller buttons */
    font-size: 0.875rem; /* Slightly smaller text */
}

.custom-card .btn-transparent:hover {
    background-color: black; /* Black background on hover */
    color: white; /* White text on hover */
}

.d-flex {
    display: flex;
}

.justify-content-end {
    justify-content: flex-end; /* Align buttons to the right */
}

.me-2 {
    margin-right: 0.5rem; /* Margin between the "EDIT" and "REMOVE" buttons */
}


        </style>
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
</head>
<body>
    <nav class="d-flex justify-content-between align-items-center p-3 bg-white border-bottom">
        <div>
            <a class="navbar-brand text-danger fw-bold fs-4" href="/">Vastra</a>
        </div>
        <ul class="list-unstyled d-flex align-items-center mb-0">
            <li><a href="/cart" class="text-decoration-none step-link text-black">BAG</a></li>
            <li><span class="mx-3 separator">---------</span><a href="/address" class="text-decoration-none step-link active">ADDRESS</a></li>
            <li><span class="mx-3 separator">---------</span><a href="/checkout" class="text-decoration-none step-link text-black">PAYMENT</a></li>
        </ul>
        <div class="d-flex align-items-center">
            <i class="bi bi-shield-check text-success fs-4 me-2"></i>
            <span class="text-muted">100% SECURE</span>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row">
            <div class="col-lg-7 col-sm-12 mb-3">
                <div class="card p-4">
                    <h4 class="mb-4">Shipping Address</h4>
                    <div id="address-list">
    <!-- Loop to display addresses -->
    <?php if (!empty($addresses)): ?>
        <?php foreach ($addresses as $address): ?>
            <div class="address-item mb-3">
                <div class="card p-3 custom-card">
                    <h6><strong>Name:</strong> <?= esc($address['full_name']); ?></h6>
                    <h6><strong>Phone:</strong> <?= esc($address['phone_number']); ?></h6>
                    <h6><strong>Address:</strong> <?= esc($address['address']); ?></h6>
                    <h6><strong>City:</strong> <?= esc($address['city']); ?></h6>
                    <h6><strong>State:</strong> <?= esc($address['state']); ?></h6>
                    <h6><strong>Zip Code:</strong> <?= esc($address['zip_code']); ?></h6>
                    <div class="d-flex justify-content-end">
                      <button type="button" class="btn btn-transparent btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editAddressModal" data-id="<?= $address['id'] ?>">EDIT</button>
                      <button class="btn btn-transparent btn-sm remove-address" data-id="<?= $address['id']; ?>">REMOVE</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No addresses available.</p>
    <?php endif; ?>
</div>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addressModal">ADD ADDRESS</button>
                </div>
            </div>

            <!-- Price details card -->
            <div class="col-lg-5 col-sm-12">
                <div class="card h-90">
                    <div class="card-body">
                        <p style="font-weight: 700;" class="mb-5">PRICE DETAILS</p>
                        <div class="d-flex justify-content-between mb-2">
                            <p>Total MRP</p>
                            ₹<?php echo esc(isset($item['product_price']) ? $item['product_price'] : 0); ?> 
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <p>Coupon Discount</p>
                            <button class="btn btn-outline-danger btn-sm" style="width:100px; height:25px; font-size:12px;">Apply Coupon</button>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <p>Platform Fee</p>
                            <span class="text-success">FREE</span>
                        </div>
                        <div class="d-flex justify-content-between mb-5">
                            <p>Shipping Fee</p>
                            <span class="text-success">FREE</span>
                        </div>
                        <p><strong>Total Quantity:</strong> <span id="total-quantity">0</span></p>
                        <p><strong>Total Price:</strong> ₹<span id="total-price">0</span></p>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button id="continue-btn" class="btn btn-danger" style="width: 50%;">CONTINUE</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Add Address -->
    <div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addressModalLabel">Add New Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= site_url('address/store') ?>" id="add-address-form">
                        <?= csrf_field() ?>
                        <input type="text" name="full_name" class="form-control mb-3" placeholder="Full Name" required>
                        <input type="text" name="phone_number" class="form-control mb-3" placeholder="Phone Number" required>
                        <textarea name="address" class="form-control mb-3" placeholder="Address" required></textarea>
                        <input type="text" name="city" class="form-control mb-3" placeholder="City" required>
                        <input type="text" name="state" class="form-control mb-3" placeholder="State" required>
                        <input type="text" name="zip_code" class="form-control mb-3" placeholder="Zip Code" required>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="add-address-form" class="btn btn-danger">Save Address</button>
                </div>
            </div>
        </div>
    </div>

<!-- Modal for Edit Address -->
<!-- Modal for Edit Address -->
<div class="modal fade" id="editAddressModal" tabindex="-1" aria-labelledby="editAddressModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAddressModalLabel">Edit Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Using the address values passed in the controller -->
                <?php if(isset($address)): ?>
                    <form method="post" action="<?= site_url('address/update/' . $address['id']) ?>" id="edit-address-form">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id" id="edit-address-id" value="<?= esc($address['id']); ?>">
                        <input type="text" name="full_name" id="edit-full-name" class="form-control mb-3" placeholder="Full Name" value="<?= esc($address['full_name']); ?>" required>
                        <input type="text" name="phone_number" id="edit-phone" class="form-control mb-3" placeholder="Phone Number" value="<?= esc($address['phone_number']); ?>" required>
                        <textarea name="address" id="edit-address" class="form-control mb-3" placeholder="Address" required><?= esc($address['address']); ?></textarea>
                        <input type="text" name="city" id="edit-city" class="form-control mb-3" placeholder="City" value="<?= esc($address['city']); ?>" required>
                        <input type="text" name="state" id="edit-state" class="form-control mb-3" placeholder="State" value="<?= esc($address['state']); ?>" required>
                        <input type="text" name="zip_code" id="edit-zip-code" class="form-control mb-3" placeholder="Zip Code" value="<?= esc($address['zip_code']); ?>" required>
                    </form>
                <?php else: ?>
                    <!-- Creating a new address -->
                    <form method="post" action="<?= site_url('address/store') ?>" id="create-address-form">
                        <?= csrf_field() ?>
                        <input type="text" name="full_name" id="create-full-name" class="form-control mb-3" placeholder="Full Name" required>
                        <input type="text" name="phone_number" id="create-phone" class="form-control mb-3" placeholder="Phone Number" required>
                        <textarea name="address" id="create-address" class="form-control mb-3" placeholder="Address" required></textarea>
                        <input type="text" name="city" id="create-city" class="form-control mb-3" placeholder="City" required>
                        <input type="text" name="state" id="create-state" class="form-control mb-3" placeholder="State" required>
                        <input type="text" name="zip_code" id="create-zip-code" class="form-control mb-3" placeholder="Zip Code" required>
                    </form>
                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <!-- Make sure the correct form is targeted by 'form' attribute -->
                <button type="submit" form="<?= isset($address) ? 'edit-address-form' : 'create-address-form' ?>" class="btn btn-danger">Save Changes</button>
            </div>
        </div>
    </div>
</div>

     <script>
    function editAddress(addressId) {
        fetch(`/address/get/${addressId}`)
            .then(response => response.json())
            .then(address => {
                if (address) {
                    document.getElementById('edit-address-id').value = address.id;
                    document.getElementById('edit-full-name').value = address.full_name;
                    document.getElementById('edit-phone').value = address.phone_number;
                    document.getElementById('edit-address').value = address.address;
                    document.getElementById('edit-city').value = address.city;
                    document.getElementById('edit-state').value = address.state;
                    document.getElementById('edit-zip-code').value = address.zip_code;

                    // Display the edit address modal
                    const editModal = new bootstrap.Modal(document.getElementById('editAddressModal'));
                    editModal.show();
                }
            })
            .catch(err => {
                console.error('Error fetching address:', err);
            });
    }

    document.querySelectorAll('.remove-address').forEach(button => {
        button.addEventListener('click', function () {
            const addressId = this.getAttribute('data-id');
            if (confirm('Are you sure you want to remove this address?')) {
                fetch(`/address/remove/${addressId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Remove the address from DOM
                        this.closest('.address-item').remove();
                    } else {
                        alert('Error removing address.');
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        });
    });
   
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
