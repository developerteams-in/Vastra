<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Favourites</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container my-5">
        <!-- Header Section -->
        <a href="/" class="text-black">
            <i class="bi bi-house text-black"></i> Vastra
        </a>
        <h1 class="text-center mb-4">Your Favourites</h1>
        
        <!-- Favourites Section -->
                <div id="favourites-items">
                    <?php if (!empty($favourites)): ?>
                        <ul class="list-group">
                            <?php foreach ($favourites as $item): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center" data-id="<?php echo esc($item['id']); ?>">
                                    <div class="d-flex align-items-center">
                                        <img src="<?php echo base_url('uploads/' . esc($item['product_image'])); ?>" alt="Product Image"
                                            class="img-thumbnail" style="width: 60px; height: 60px;">
                                        <div class="ms-3">
                                            <h5><?php echo esc(isset($item['product_name']) ? $item['product_name'] : 'Unknown'); ?></h5>
                                        </div>
                                    </div>
                                    <button class="btn btn-danger btn-sm remove-favourite">Remove</button>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p class="text-center">Your favourites list is empty.</p>
                    <?php endif; ?>
                </div>
            </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Handle Remove Button Click
            $('.remove-favourite').click(function () {
                const $itemElement = $(this).closest('.list-group-item');
                const favouriteId = $itemElement.data('id');

                if (!favouriteId) {
                    alert('Error: Invalid Favourite Item ID');
                    return;
                }

                $.ajax({
                    url: '/favourites/remove',
                    type: 'POST',
                    data: { favourite_id: favouriteId },
                    success: function (response) {
                        if (response.status) {
                            $itemElement.remove();

                            if ($('#favourites-items .list-group-item').length === 0) {
                                $('#favourites-items').html('<p class="text-center">Your favourites list is empty.</p>');
                            }
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function () {
                        alert('Something went wrong.');
                    }
                });
            });
        });
    </script>
</body>

</html>
