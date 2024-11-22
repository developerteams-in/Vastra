<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vastra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
 .scroll-container {
    width: 100%;
    overflow-x: scroll;  /* Forces scrollbar to appear */
    overflow-y: hidden;  /* Disable vertical scroll */
    white-space: nowrap;  /* Prevent line breaks inside the container */
    padding-bottom: 10px; /* Optional padding for scrollbar spacing */
    position: relative;
}
.product-cards {
    display: flex;  /* Flexbox ensures cards are aligned horizontally */
    gap: 20px;  /* Space between product cards */
}
.card {
    flex: 0 0 auto;  /* Prevent cards from stretching */
    width: 220px;
    height: 350px;
    transition: transform 0.3s ease-in-out;
    cursor: pointer;
}
.card:hover {
    transform: scale(1.05);  /* Optional hover effect */
}
/* Customize scrollbar in Webkit browsers (Chrome, Safari) */
.scroll-container::-webkit-scrollbar {
    overflow-y: hidden;
    display: none !important;

}
.scroll-container::-webkit-scrollbar-thumb {
    background-color: rgba(0, 0, 0, 0.5);  /* Color of the thumb */
    border-radius: 10px;
}
.scroll-container::-webkit-scrollbar-track {
    background-color: #f1f1f1;  /* Track color */
}

#debug-icon{
    display: none !important;
}
    </style>
</head>

<body>

    <!-- Hero Section -->
    <!-- Hero Section -->
    <header class="text-white text-center py-5"
        style="background: url('https://plus.unsplash.com/premium_photo-1695575593603-1f42ca27bb6d?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjV8fGZhc2hpb258ZW58MHx8MHx8fDA%3D') no-repeat center center; background-size: cover;">
        <div class="container">
            <h1 class="display-4">Discover Our Latest Styles</h1>
            <p class="lead">Fresh Looks for Every Occasion</p>
            <a href="#" class="btn btn-light btn-lg">Shop Now</a>
        </div>
    </header>


    <!-- Featured Products -->
    <!-- Featured Products -->
    <div class="container bg-[#D0FFB2]">
        <section class="py-4">
            <h2 class="text-left mb-4">NEW ARRIVALS</h2>
            <div class="scroll-container py-3">
                <div class="product-cards d-flex gap-4">
                    <!-- Product Card 1 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://cdn.pixabay.com/photo/2024/08/24/05/02/woman-8993222_1280.jpg"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 2 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://cdn.pixabay.com/photo/2016/06/17/09/54/woman-1462985_1280.jpg"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Product Card 2 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://cdn.pixabay.com/photo/2022/02/04/12/49/woman-6992691_1280.jpg"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Product Card 2 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://images.unsplash.com/photo-1515511624704-b8916dcc30ea?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTE1fHxmYXNoaW9ufGVufDB8fDB8fHww"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Product Card 2 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://cdn.pixabay.com/photo/2020/10/23/16/50/woman-5679284_1280.jpg"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 3 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://cdn.pixabay.com/photo/2023/06/02/21/24/portrait-8036356_1280.jpg"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 4 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://cdn.pixabay.com/photo/2021/03/22/16/07/woman-6115105_1280.jpg"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 5 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://cdn.pixabay.com/photo/2019/08/07/07/05/woman-4390055_1280.jpg"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-4">
            <h2 class="text-left mb-4">KIDS</h2>
            <div class="scroll-container py-3">
                <div class="product-cards d-flex gap-4">
                    <!-- Product Card 1 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://cdn.pixabay.com/photo/2022/03/21/02/19/girl-7082139_1280.jpg"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 2 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://cdn.pixabay.com/photo/2021/04/12/17/31/child-6173408_1280.jpg"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Product Card 2 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://cdn.pixabay.com/photo/2021/08/11/11/54/kid-6538295_1280.jpg"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Product Card 2 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://cdn.pixabay.com/photo/2021/04/12/21/46/girl-6174060_1280.jpg"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Product Card 2 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://cdn.pixabay.com/photo/2021/08/13/13/11/kid-6543096_1280.jpg"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 3 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://cdn.pixabay.com/photo/2015/12/08/05/58/ice-skates-1082514_1280.jpg"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 4 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://cdn.pixabay.com/photo/2016/11/29/04/23/little-girl-1867297_1280.jpg"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 5 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://cdn.pixabay.com/photo/2021/09/13/05/34/kid-6620283_1280.jpg"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-4">
            <h2 class="text-left mb-4">LADIES</h2>
            <div class="scroll-container py-3">
                <div class="product-cards d-flex gap-4">
                    <!-- Product Card 1 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://images.unsplash.com/photo-1563178406-4cdc2923acbc?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzR8fGZhc2hpb24lMjBMQURJRVN8ZW58MHx8MHx8fDA%3D"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 2 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://plus.unsplash.com/premium_photo-1690034978688-dbdd03eab792?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjV8fGZhc2hpb24lMjBMQURJRVN8ZW58MHx8MHx8fDA%3D"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Product Card 2 -->
                       <!-- Product Card 2 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://images.unsplash.com/photo-1590770357970-ec6480b368c0?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzZ8fGZhc2hpb24lMjBMQURJRVN8ZW58MHx8MHx8fDA%3D"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Product Card 2 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://images.unsplash.com/photo-1608234808654-2a8875faa7fd?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mjd8fGZhc2hpb24lMjBMQURJRVN8ZW58MHx8MHx8fDA%3D"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Product Card 2 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://images.unsplash.com/photo-1593433824539-745a35f3f0b4?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTh8fGZhc2hpb24lMjBMQURJRVN8ZW58MHx8MHx8fDA%3D"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Product Card 2 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://images.unsplash.com/photo-1535979737658-bda006980c4f?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTV8fGZhc2hpb24lMjBMQURJRVN8ZW58MHx8MHx8fDA%3D"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 3 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://images.unsplash.com/photo-1488716820095-cbe80883c496?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTJ8fGZhc2hpb24lMjBMQURJRVN8ZW58MHx8MHx8fDA%3D"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 4 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://images.unsplash.com/photo-1589156191108-c762ff4b96ab?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8ZmFzaGlvbiUyMExBRElFU3xlbnwwfHwwfHx8MA%3D%3D"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 5 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://images.unsplash.com/photo-1545291730-faff8ca1d4b0?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8ZmFzaGlvbiUyMExBRElFU3xlbnwwfHwwfHx8MA%3D%3D"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <section class="py-4">
            <h2 class="text-left mb-4">MEN</h2>
            <div class="scroll-container py-3">
                <div class="product-cards d-flex gap-4">
                    <!-- Product Card 1 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://images.unsplash.com/photo-1618001789196-8b986847cd5e?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nzh8fGZhc2hpb24lMjBNRU58ZW58MHx8MHx8fDA%3D"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 2 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://images.unsplash.com/photo-1634113755405-4c34d7abcbb7?q=80&w=3088&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Product Card 2 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://images.unsplash.com/photo-1619603364904-c0498317e145?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NTN8fGZhc2hpb24lMjBNRU58ZW58MHx8MHx8fDA%3D"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Product Card 2 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://plus.unsplash.com/premium_photo-1727942421167-880ef66c0a68?q=80&w=3135&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Product Card 2 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://images.unsplash.com/photo-1622519407650-3df9883f76a5?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDd8fGZhc2hpb24lMjBNRU58ZW58MHx8MHx8fDA%3D"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 3 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://images.unsplash.com/photo-1611312449297-a69dc9c3987b?q=80&w=2216&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 4 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://images.unsplash.com/photo-1618577326126-ef1b48c95ca2?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzJ8fGZhc2hpb24lMjBNRU58ZW58MHx8MHx8fDA%3D"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 5 -->
                    <div class="card" style="width: 220px; height: 350px;">
                        <img src="https://images.unsplash.com/photo-1643858040625-3e806a9e5be3?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mjh8fGZhc2hpb24lMjBNRU58ZW58MHx8MHx8fDA%3D"
                            class="card-img-top img-fluid" alt="Modern Fit Cotton Shirt"
                            style="object-fit: cover; height: 70%; width: 100%;">
                        <div class="card-body text-center p-2">
                            <h5 class="card-title text-truncate" style="font-size: 0.8rem;">Modern Fit Cotton Shirt</h5>
                            <p class="card-text" style="font-size: 0.75rem;">₹1499</p>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-heart p-1"></i>Favorites
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <i class="bi bi-bag p-1"></i>Bag
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <h4 class="text-center py-3 mb-4">PARTNER</h4>
    <div class="w-10 h-auto py-4 pb-5" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <img src="<?= base_url('images/logo.png') ?>" style="width: 50%;" alt="Logo">
    </div>

    <!-- Add Bootstrap Icons CDN -->


   <!-- Offers Section -->
   <section class="py-5" style="background-color: #D0FFB2; opacity: 0.7;">
    <div class="container text-center text-capitalize fw-bold">
        <h1 class="fw-bold text-start display-1" style="font-size: 300px; line-height: 0.8; opacity: 0.3; color: red;">UNIQUE</h1>
        <h1 class="fw-bold" style="font-size: 300px; opacity: 0.3; color: red;">FASHION</h1>
    </div>
</section>


    <!-- Offers Section -->
    <section class="bg-light py-5">
        <div class="container text-center">
            <h2>Special Offers</h2>
            <p>Up to 50% off on select items</p>
            <a href="#" class="btn bg-black text-white fw-bold">Shop now</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                <h5 class="text-black" style="font-size: 15px; margin-bottom:120px;">INDIA|₹</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#" class="text-black text-decoration-none"></a></li>
                        <li><a href="#" class="text-black text-decoration-none"></a></li>
                        <li><a href="#" class="text-black text-decoration-none"></a></li>
                        <h5 class="text-danger fw-bold">VASTRA</h5>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5 class="fs-6">SHOP</h5>
                    <ul class="list-unstyled " style="font-size: 12px;">
                        <li><a href="#" class="text-black text-decoration-none">Ladies</a></li>
                        <li><a href="#" class="text-black text-decoration-none">Men</a></li>
                        <li><a href="#" class="text-black text-decoration-none">Body</a></li>
                        <li><a href="#" class="text-black text-decoration-none">Kids</a></li>
                        <li><a href="#" class="text-black text-decoration-none">Sport</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5 class="fs-6">CORPORATE INFO</h5>
                    <ul class="list-unstyled"style="font-size: 12px;">
                        <li><a href="#" class="text-black text-decoration-none">Career</a></li>
                        <li><a href="#" class="text-black text-decoration-none">About</a></li>
                        <li><a href="#" class="text-black text-decoration-none">Group</a></li>
                        <li><a href="#" class="text-black text-decoration-none">Press</a></li>
                        <li><a href="#" class="text-black text-decoration-none">Investor relations</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="fs-6">HELPS</h5>
                    <ul class="list-unstyled"style="font-size: 12px;">
                        <li><a href="#" class="text-black text-decoration-none">Customer service</a></li>
                        <li><a href="#" class="text-black text-decoration-none">Contact</a></li>
                        <li><a href="#" class="text-black text-decoration-none">Report a scam</a></li>
                        <li><a href="#" class="text-black text-decoration-none">Cookie Notice</a></li>
                        <li><a href="#" class="text-black text-decoration-none">Cookie Settings</a></li>
                        <li class="nav-item"><a class="nav-link text-danger fw-bold py-2"href="/admin"><ins>Vastra Admin</ins></a></li>
                    </ul>
                </div>
                <div class="col-md-2 "style="font-size: 13px;">
                <ul class="list-unstyled"style="font-size: 12px;">
                    <p>Sign up now to get exclusive offers, the latest fashion updates, and styling tips. Be the first to discover new trends and discounts. Stay inspired and elevate your wardrobe effortlessly!</p>
                    <a href="#" class="text-black text-decoration-none">Read More<i class="bi bi-arrow-right-short fs-6"></i></a>
                </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?= $this->endSection() ?>