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
        /* Additional styles for form */
        .form-control:focus {
            border-color: #28a745;
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .card p {
            margin: 0;
        }
        .card strong {
            font-size: 1.2em;
        }
        .btn-transparent {
            background-color: transparent;
            border: 1px solid black;
            color: black;
            padding: 5px 10px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        .btn-transparent:hover {
            background-color: black;
            color: white;
            text-decoration: none;
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
            <li>
                <a href="/cart" class="text-decoration-none step-link text-black">BAG</a>
            </li>
            <li>
                <span class="mx-3 separator">---------</span>
                <a href="/address" class="text-decoration-none step-link active">ADDRESS</a>
            </li>
            <li>
                <span class="mx-3 separator">---------</span>
                <a href="/checkout" class="text-decoration-none step-link text-black">PAYMENT</a>
            </li>
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
                    <div id="address-list"></div>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addressModal">ADD ADDRESS</button>
                </div>
                <script>
                    async function fetchAddresses() {
                        try {
                            const response = await fetch('/address/fetch'); // Direct URL to the endpoint
                            const data = await response.json();

                            const addressList = document.getElementById('address-list');
                            addressList.innerHTML = '';

                            if (data.length === 0) {
                                addressList.innerHTML = '<p>No addresses found.</p>';
                                return;
                            }

                            data.forEach(address => {
                                const addressCard = document.createElement('div');
                                addressCard.classList.add('card', 'mb-3', 'p-3');

                                addressCard.innerHTML = `
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <strong>${address.full_name}</strong>
                                            <p>${address.address}, ${address.city}, ${address.state} - ${address.zip_code}</p>
                                            <p><small>Phone: ${address.phone_number}</small></p>
                                        </div>
                                        <div>
                                            <button class="btn btn-transparent btn-sm" onclick="editAddress(${address.id})">Edit</button>
                                            <button class="btn btn-transparent btn-sm me-2" onclick="removeAddress(${address.id})">Remove</button>
                                        </div>
                                    </div>
                                `;
                                addressList.appendChild(addressCard);
                            });
                        } catch (error) {
                            console.error('Error fetching addresses:', error);
                            document.getElementById('address-list').innerHTML = '<p>Failed to load addresses.</p>';
                        }
                    }

                    // Function to handle edit action
                    function editAddress(addressId) {
                        fetch(`/address/get/${addressId}`)
                            .then(response => response.json())
                            .then(address => {
                                document.getElementById('edit-address-id').value = address.id;
                                document.getElementById('edit-full-name').value = address.full_name;
                                document.getElementById('edit-phone').value = address.phone_number;
                                document.getElementById('edit-address').value = address.address;
                                document.getElementById('edit-city').value = address.city;
                                document.getElementById('edit-state').value = address.state;
                                document.getElementById('edit-zip-code').value = address.zip_code;
                                document.getElementById('edit-user-id').value = userId; // Add user_id to the form field

                                const editModal = new bootstrap.Modal(document.getElementById('editAddressModal'));
                                editModal.show();
                            })
                            .catch(error => console.error('Error fetching address details:', error));
                    }

                    async function removeAddress(addressId) {
                        if (confirm('Are you sure you want to remove this address?')) {
                            try {
                                const response = await fetch(`/address/remove/${addressId}`, {
                                    method: 'DELETE'
                                });
                                const result = await response.json();

                                if (result.success) {
                                    alert('Address removed successfully.');
                                    fetchAddresses(); 
                                } else {
                                    alert('Failed to remove the address.');
                                }
                            } catch (error) {
                                console.error('Error removing address:', error);
                                alert('An error occurred while removing the address.');
                            }
                        }
                    }

                    document.addEventListener('DOMContentLoaded', fetchAddresses);
                </script>
            </div>

            <div class="col-lg-5 col-sm-12">
                <div class="card h-90">
                    <div class="card-body">
                        <p style="font-weight: 700;" class="mb-5">PRICE DETAILS</p>
                        <div class="d-flex justify-content-between mb-2">
                            <p>Total MRP</p>
                            ₹0
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
    <div class="modal fade" id="editAddressModal" tabindex="-1" aria-labelledby="editAddressModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAddressModalLabel">Edit Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form method="post" action="<?= isset($editing) ? site_url('address/update/'.$address['id']) : site_url('address/store') ?>" id="edit-address-form">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id" id="edit-address-id">
                        <input type="text" name="full_name" id="edit-full-name" class="form-control mb-3" placeholder="Full Name" name="full_name" value="<?= old('full_name', $address['full_name'] ?? '') ?>" required>
                        <input type="text" name="phone_number" id="edit-phone" class="form-control mb-3" placeholder="Phone Number" name="phone_number" value="<?= old('phone_number', $address['phone_number'] ?? '') ?>" required>
                        <textarea name="address" id="edit-address" class="form-control mb-3" placeholder="Address" <?= old('address', $address['address'] ?? '') ?> required></textarea>
                        <input type="text" name="city" id="edit-city" class="form-control mb-3" placeholder="City" name="city" value="<?= old('city', $address['city'] ?? '') ?>" required>
                        <input type="text" name="state" id="edit-state" class="form-control mb-3" placeholder="State"  name="state" value="<?= old('state', $address['state'] ?? '') ?>" required>
                        <input type="text" name="zip_code" id="edit-zip-code" class="form-control mb-3" placeholder="Zip Code" name="zip_code" value="<?= old('zip_code', $address['zip_code'] ?? '') ?>" required>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="edit-address-form" class="btn btn-danger">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
    <script>
    function editAddress(addressId) {
    fetch(`/address/get/${addressId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to fetch address details');
            }
            return response.json();
        })
        .then(address => {
            // Check if address data is valid
            if (address) {
                document.getElementById('edit-address-id').value = address.id;
                document.getElementById('edit-full-name').value = address.full_name || '';
                document.getElementById('edit-phone').value = address.phone_number || '';
                document.getElementById('edit-address').value = address.address || '';
                document.getElementById('edit-city').value = address.city || '';
                document.getElementById('edit-state').value = address.state || '';
                document.getElementById('edit-zip-code').value = address.zip_code || '';

                const editModal = new bootstrap.Modal(document.getElementById('editAddressModal'));
                editModal.show();
            } else {
                alert('Address data is missing or malformed');
            }
        })
        .catch(error => {
            console.error('Error fetching address details:', error);
            alert('An error occurred while fetching address details.');
        });
}

</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
