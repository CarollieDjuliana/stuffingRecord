<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="<?= '/assets/css/style.css'; ?>" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>


<body>
    <div class="main-container d-flex">
        <div class="sidebar " id="side_nav">
            <div class="header-box px-2 pb-4 d-flex justify-content-between">
                <h1 class="fs-4"><img src="/assets/images/logo.png" alt="Logo" width="45%" style="margin: 1rem;"
                        class="d-inline-block align-text-top"></h1>
                <button class="btn d-md-none d-block close-btn px-1 py-0 text-black"><i
                        class="fa-solid fa-bars-staggered 3xl" style="margin: 0.5rem; size:200%;"></i></button>
            </div>

            <ul class="list-unstyled px-2">
                <div class="button-container">
                    <li><a href="/dashboard" class="btn btn-light dashboard-button"><i class="fa-solid fa-house"></i>
                            Dashboard</a></li>
                    <li><a href="/profile" class="btn btn-light profile-button"><i class="fa-solid fa-user"></i>
                            Account</a></li>
                    <li><a href="/logout" class="btn btn-light"><i
                                class="fa-solid fa-right-from-bracket fa-rotate-180"></i> Log Out</a></li>
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
                        <a class="navbar-brand fs-5" href="#"><img src="/assets/images/logoWithText.png" alt="Logo"
                                width="50%" class="d-inline-block align-text-top"></a>
                    </div>
                    <h6 class="p-3">STUFFING RECORD PT. MUSI KALIJAYA</h6>
                </div>
            </nav>

            <div class="dashboard-content px-3 pt-4">
                <?= $this->renderSection('content'); ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center text-lg-start text-white" style="background-color: #70747c">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2023 Copyright: PT Musi Kali Jaya
            <!-- <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a> -->
        </div>
    </footer>
    <!-- Footer -->


    <!-- End of .container -->

    <!-- Sertakan Bootstrap JS dan jQuery (wajib) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- <script type="module" src="<?= '/assets/js/logout.js'; ?>"></script> -->
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
    const dashboardUrl = "/dashboard";
    const profileUrl = "/profile";

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