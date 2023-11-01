<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="<?= base_url('/assets/css/style.css'); ?>" rel="stylesheet" type="text/css">
</head>


<body>
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
                <h1 class="fs-4"><img src="/assets/images/logo.png" alt="Logo" width="45%" style="margin: 1rem;" class="d-inline-block align-text-top"></h1>
                <button class="btn d-md-none d-block close-btn px-1 py-0 text-black"><i class="fa-solid fa-bars-staggered 3xl" style="margin: 0.5rem; size:200%;"></i></button>
            </div>

            <ul class="list-unstyled px-2">
                <div class="button-container">
                    <li><a href="http://localhost:8080/dashboard" class="btn btn-light dashboard-button"><i class="fa-solid fa-house"></i> Dashboard</a></li>
                    <li><a href="http://localhost:8080/profile" class="btn btn-light profile-button"><i class="fa-solid fa-user"></i> Account</a></li>
                    <li><a href="#" class="btn btn-light"><i class="fa-solid fa-right-from-bracket fa-rotate-180"></i> Log Out</a></li>
                </div>
            </ul>

            <hr class="h-color mx-2">

            <ul class="list-unstyled px-2">
                <?= $this->renderSection('sidebar'); ?>
            </ul>
        </div>

        <div class="content">
            <nav class="navbar navbar-expand-md navbar-light bg-custom">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between d-md-none d-block">
                        <button class="btn px-1 py-0 open-btn me-2"><i class="fa-solid fa-bars 3xl"></i></button>
                        <a class="navbar-brand fs-4" href="#"><img src="/assets/images/logoWithText.png" alt="Logo" width="80%" height="80%" class="d-inline-block align-text-top"></a>
                    </div>
                    <h4 class="p-3">STUFFING RECORD PT. MUSI KALIJAYA</h4>
                </div>
            </nav>

            <div class="dashboard-content px-3 pt-4">
                <?= $this->renderSection('content'); ?>
            </div>
        </div>
    </div>
    <!-- 
    <footer>
        <div class="bottom-fix text-center p-1 bg-custom mt-10">
            © 2023 PT Musi Kalijaya
        </div>
    </footer> -->

    <!-- Fotter -->
    <!-- Remove the container if you want to extend the Footer to full width. -->


    <!-- Footer -->
    <footer class="text-center text-lg-start text-white" style="background-color: #70747c">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-between p-4" style="background-color: #ffbc14">
            <!-- Left -->
            <div class="me-5 text-black">
                <span>Get connected with us on social networks:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="" class="text-black me-4">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="text-black me-4">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="text-black me-4">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="text-black me-4">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="text-black me-4">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="text-black me-4">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold">Company name</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p>
                            Here you can use rows and columns to organize your footer
                            content. Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold">Products</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p>
                            <a href="#!" class="text-white">MDBootstrap</a>
                        </p>
                        <p>
                            <a href="#!" class="text-white">MDWordPress</a>
                        </p>
                        <p>
                            <a href="#!" class="text-white">BrandFlow</a>
                        </p>
                        <p>
                            <a href="#!" class="text-white">Bootstrap Angular</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold">Useful links</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p>
                            <a href="#!" class="text-white">Your Account</a>
                        </p>
                        <p>
                            <a href="#!" class="text-white">Become an Affiliate</a>
                        </p>
                        <p>
                            <a href="#!" class="text-white">Shipping Rates</a>
                        </p>
                        <p>
                            <a href="#!" class="text-white">Help</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold">Contact</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
                        <p><i class="fas fa-envelope mr-3"></i> info@example.com</p>
                        <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2023 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->


    <!-- End of .container -->

    <!-- Sertakan Bootstrap JS dan jQuery (wajib) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        $(".sidebar ul li").on('click', function() {
            $(".sidebar ul li.active").removeClass('active');
            $(this).addClass('active');
        });

        $('.open-btn').on('click', function() {
            $('.sidebar').addClass('active');

        });


        $('.close-btn').on('click', function() {
            $('.sidebar').removeClass('active');

        })
    </script>

    <script>
        // Get the current URL
        const currentUrl = window.location.href;

        // Define URLs for your navigation links
        const dashboardUrl = "http://localhost:8080/dashboard";
        const profileUrl = "http://localhost:8080/profile";

        // Get the navigation links
        const dashboardButton = document.querySelector(".dashboard-button");
        const profileButton = document.querySelector(".profile-button");

        // Check the current URL against each link's URL
        if (currentUrl === dashboardUrl) {
            dashboardButton.classList.add("active-button");
        } else if (currentUrl === profileUrl) {
            profileButton.classList.add("active-button");
        }
    </script>




</body>

</html>