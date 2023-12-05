<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mkjStuffingRecord</title>
    <link rel="icon" href="<?php echo base_url('/assets/images/logo_tab.png'); ?>" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- <link href="<?= base_url('/assets/css/style.css'); ?>" rel="stylesheet" type="text/css"> -->
</head>


<body>
    <div class="main-container d-flex">
        <div class="content">
            <nav class="navbar navbar-expand-md navbar-light bg-custom">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between d-md-none d-block">
                        <a class="navbar-brand fs-5" href="#"><img src="/assets/images/logoWithText.png" alt="Logo" width="50%" class="d-inline-block align-text-top"></a>
                    </div>
                    <div class="d-none d-md-flex align-items-center"> <!-- This div contains the logo and text for medium and larger screens -->
                        <a class="navbar-brand " href="#"><img src="/assets/images/logoWithText.png" alt="Logo" width="20%" class="d-inline-block align-text-top"></a>
                        <!-- <img src="/assets/images/logo.png" alt="Logo" width="8%" class="d-inline-block align-text-top m-3" style="margin-right: 10px;"> -->
                        <!-- <h4 class="p-3" style="margin-left: 10px;">STUFFING RECORD PT. MUSI KALIJAYA</h4> -->
                    </div>
                </div>
            </nav>

            <div class="dashboard-content px-3 pt-4 m-0">

                <?= $this->renderSection('content'); ?>
                <div class="container text-center">
                    <footer class="text-center text-white">
                        © 2023 Copyright: PT Musi Kali Jaya
                    </footer>
                </div>
            </div>
        </div>
    </div>
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