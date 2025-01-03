<?php
    $user = session()->get('user');
?>
<?php
$user = session()->get('user');
$cartCount = 0; // Default count is 0
if ($user) {
    $cartModel = new \App\Models\CartModel();
    $cartCount = $cartModel->getCartCount($user['id']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vastra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<style>
   #searchResults {
    position: absolute;
    top: 100%;
    left: 50%; /* Center horizontally */
    transform: translateX(-50%); /* Adjust for centering */
    width: 40%; /* Adjust the width as needed */
    max-height: 300px; /* Height of the results container */
    overflow-y: auto;
    background: #fff;
    border: 1px solid #ddd;
    z-index: 1000;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Optional: Add shadow for better visibility */
    border-radius: 5px; /* Optional: Add rounded corners */
}

#searchResults li {
    display: flex;
    align-items: center;
    padding: 10px;
    cursor: pointer;
    border-bottom: 1px solid #f0f0f0;
}

#searchResults li:hover {
    background-color: #f9f9f9;
}

#searchResults img {
    width: 50px;
    height: 50px;
    object-fit: cover;
    margin-right: 10px;
}

        .badge {
            font-size: 12px;
            position: absolute;
            top: 0;
            right: 0;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
        }
    </style>
    <style>
        /* Your existing styles */
        #searchForm {
            position: relative;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            transition: all 1s;
            width: 50px;
            height: 50px;
        }

        #searchInput {
            position: absolute;
            background: transparent;
            color: black;
            top: 0;
            left: 0;
            width: 0;
            height: 42.5px;
            line-height: 30px;
            outline: 0;
            border:none;
            font-size: 1em;
            border-radius: 20px;
            padding: 0 20px;
        }

        .bi-search {
            box-sizing: border-box;
            padding: 10px;
            width: 35px;
            height: 35px;
            position: absolute;
            top: 0;
            right: 0;
            border-radius: 4px;
            color: grey;
            text-align: center;
            font-size: 1em;
            transition: all 1s;
        }

        #searchForm:focus-within,
        #searchForm:hover,
        #searchForm:valid {
            width: 500px;
            cursor: pointer;
        }

        #searchForm:hover #searchInput,
        #searchForm:focus-within #searchInput,
        #searchForm:valid #searchInput {
            width: 100%;
            border: 1px solid black;
        }
    
        #searchForm:hover .bi-search,
        #searchForm:focus-within .bi-search,
        #searchForm:valid .bi-search {
            color: grey !important;
        }

        #searchForm:valid button {
            display: block;
        }

        @media (max-width: 768px) {
            #searchForm {
                width: 40px;
            }
            #searchForm:valid,
            #searchForm:focus-within,
            #searchForm:hover {
                width: 250px;
            }

            #searchForm:hover #searchInput,
            #searchForm:focus-within #searchInput,
            #searchForm:valid #searchInput {
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            .navbar-nav .nav-item {
                margin-bottom: 0px;
            }

            .navbar-nav .nav-link {
                font-size: 14px;
            }

            #searchForm {
                width: 50px;
            }

            #searchForm:valid,
            #searchForm:focus-within,
            #searchForm:hover {
                width: 150px;
            }
        }

        /* Dropdown styles */
        .nav-item.dropdown {
            position: relative;
        }

        .nav-link.dropdown-toggle {
            cursor: pointer;
        }

        /* Dropdown menu styles */
        .dropdown-menu {
            background-color: white;
            border-radius: 0.25rem;
            border: 1px solid #ccc;
            display: none; /* Initially hidden */
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            min-width: 200px;
        }

        .dropdown-menu .dropdown-item {
            color: #000;
            padding: 8px 20px;
            text-decoration: none;
        }

        .dropdown-menu .dropdown-item:hover {
            background-color: #f8f9fa;
        }

        /* Show dropdown menu when hovered */
        .nav-item.dropdown:hover .dropdown-menu {
            display: block;
        }

        .nav-item.dropdown:hover .dropdown-toggle {
            color: #dc3545; /* Change color of the dropdown button on hover */
        }

        /* Mobile View Styles */
        @media (max-width: 768px) {
            /* Hide menu by default on mobile */
            .navbar-collapse {
                display: none;
            }

            .navbar-collapse.active {
                display: block;
            }

            .navbar-toggler {
                display: block;
                cursor: pointer;
            }

            .navbar-toggler-icon {
                background-color: transparent;
                border: none;
            }
        }
    </style>
</head>
<body>
   <!-- Navigation Bar -->
   <nav class="navbar navbar-expand-lg sticky-top bg-white">
        <div class="container">
            <a class="navbar-brand text-danger fw-bold fs-4" href="/">Vastra</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" id="menu-icon">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="/ladies">Ladies</a></li>
                    <li class="nav-item"><a class="nav-link" href="/men">Men</a></li>
                    <li class="nav-item"><a class="nav-link" href="/kids">Kids</a></li>
                    <li class="nav-item"><a class="nav-link" href="/sport">Sport</a></li>
                    <li class="nav-item"><a class="nav-link" href="/magazine">Magazine</a></li>
                </ul>
                <ul class="navbar-nav">
                <li class="nav-item">
    <form id="searchForm" action="javascript:void(0);">
        <input id="searchInput" type="search" autofocus required placeholder="Search products...">
        <i class="bi bi-search"></i>
    </form>
</li>
<ul id="searchResults" style="position: absolute; background: white; list-style: none; padding: 10px; display: none;"></ul>

                    <?php if ($user): ?>
                        <!-- Dropdown for logged-in user -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hii, <?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') ?> <img src="<?= base_url('images/user.png') ?>" style="width:25px; height:25px;" alt="Logo">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/profile">Profile</a></li>
                                <li><a class="dropdown-item" href="/orders">Your Orders</a></li>
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="/favorites" onclick="toggleVisibility('favourites-popup')">
                            <i class="bi bi-heart p-1 "></i>Favorites</a></li>    
                        <li class="nav-item position-relative">
    <a class="nav-link text-center" href="/cart" style="display: inline-block;">
        <?php if ($cartCount > 0): ?>
            <!-- Fixed position badge above the icon -->
            <span class="badge bg-black text-white position-absolute top-0 end-0 rounded-circle" style="width: 20px; height: 20px; font-size: 12px; line-height: 12px;">
                <?php echo $cartCount; ?>
            </span>
        <?php endif; ?>
        <i class="bi bi-bag"></i> Bag
    </a>
</li>


                    <?php else: ?>
                        <!-- If no user is logged in, show register and login options -->
                        <li class="nav-item"><a class="nav-link" href="/register">Become a Member</a></li>
                        <li class="nav-item"><a class="nav-link" href="/login">SignIn</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <?= $this->renderSection('content') ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Get elements
        const menuIcon = document.getElementById('menu-icon');
        const navbarCollapse = document.getElementById('navbarNav');

        // Toggle the menu on mobile when the menu icon is clicked
        menuIcon.addEventListener('click', () => {
            navbarCollapse.classList.toggle('active');
        });
    </script>

<script>
    function togglePopup() {
      var popup = document.getElementById('popup');
      popup.style.display = popup.style.display === 'flex' ? 'none' : 'flex';
    }
  </script>

<script>
$(document).ready(function() {
    function updateCartCount() {
        $.ajax({
            url: '/cart/getCartCount',
            method: 'GET',
            success: function(response) {
                if (response.cartCount !== undefined) {
                    const $badge = $('.bi-bag').next('.badge');
                    if (response.cartCount > 0) {
                        if ($badge.length > 0) {
                            $badge.text(response.cartCount);
                        } else {
                            $('.bi-bag').after(`<span class="badge">${response.cartCount}</span>`);
                        }
                    } else {
                        $badge.remove();
                    }
                }
            },
            error: function() {
                console.error('Failed to fetch cart count.');
            }
        });
    }

    // Call the function on page load
    updateCartCount();

    // Optionally call it periodically or on certain actions
    setInterval(updateCartCount, 30000); // Update every 30 seconds
});

</script>
<script>
 document.addEventListener('DOMContentLoaded', () => {
    const searchForm = document.getElementById('searchForm');
    const searchInput = document.getElementById('searchInput');
    const resultsContainer = document.getElementById('searchResults');

    searchInput.addEventListener('input', function () {
        const query = searchInput.value.trim();

        if (query.length === 0) {
            resultsContainer.style.display = 'none';
            resultsContainer.innerHTML = ''; // Clear results
            return;
        }

        fetch(`/products/search?query=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                resultsContainer.innerHTML = ''; // Clear previous results
                if (data.length > 0) {
                    resultsContainer.style.display = 'block';
                    data.forEach(product => {
                        const listItem = document.createElement('li');
                        listItem.style.borderBottom = '1px solid #ddd';
                        listItem.style.padding = '8px';
                        listItem.innerHTML = `
                            <a href="/product/view/${product.id}" style="text-decoration: none; color: inherit; display: flex; align-items: center;">
                                <img src="/uploads/${product.productImage}" alt="${product.productName}" style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">
                                <strong>${product.productName}</strong>
                            </a>
                        `;
                        resultsContainer.appendChild(listItem);
                    });
                } else {
                    resultsContainer.style.display = 'block';
                    resultsContainer.innerHTML = '<li>No results found</li>';
                }
            })
            .catch(error => {
                console.error('Error fetching search results:', error);
                resultsContainer.style.display = 'none';
            });
    });

    // Hide results when clicking outside
    document.addEventListener('click', function (event) {
        if (!searchForm.contains(event.target)) {
            resultsContainer.style.display = 'none';
        }
    });
});


    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
