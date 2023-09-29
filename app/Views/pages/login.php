<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <script src="https://kit.fontawesome.com/e589d529a5.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<style>
    .bg-custom {
        background-color: #fdb913;
    }

    body {

        /* Gunakan URL gambar sebagai nilai background-image */
        background-image: url("assets/images/SI_background.jpg");
        /* Properti CSS lainnya untuk mengatur latar belakang */
        background-size: cover;
        /* Sesuaikan gambar agar mengisi seluruh area */
        background-repeat: no-repeat;
        /* Hindari pengulangan gambar */
        background-attachment: fixed;
        /* Gambar tetap saat menggulir halaman */
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg bg-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="/assets/images/logo.png" alt="Logo" width="35%" height="35%" class="d-inline-block align-text-top">
            </a>
        </div>
    </nav>

    <div class="container-fluid">
        <!-- button back -->
        <!-- <button type="button" class="btn m-2"> <i class="fa-regular fa-circle-left"></i> Back</script></button> -->
        <!-- form login -->
        <div class="d-flex justify-content-center align-items-center m-3 mt-5 ">
            <div class="card mb-3 p-md-3" style="width: 36rem;">
                <div class="card-body">
                    <h3 class="card-title text-center ">STUFFING RECORD <br>PT. MUSI KALIJAYA</h3>
                    <form name="login_form" id="login_form" method="post" action="Pages/dashboard" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="login_email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="login_email" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="login_password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="login_password">
                        </div>
                        <!-- <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> -->
                        <div class="d-flex justify-content-center align-items-center">
                            <button type="button" class="btn bg-custom " id="login" name="login">Log in</button>
                        </div>
                    </form>
                    <p id="error-message"></p>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <footer>
        <div class="fixed-bottom text-center p-1 bg-custom">
            © 2023 PT Musi Kalijaya
        </div>
    </footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<!-- <script type="module" src="<?php echo base_url('/assets/js/firebase-config.js'); ?>"></script>
<script type="module" src="<?php echo base_url('/assets/js/login.js'); ?>"></script> -->
<!-- <script type="module" src="./firebase-config.js"></script>
<script src="./login.js"></script> -->

<!-- <script type="module" src="<?= base_url('/assets/js/fireConfig.js'); ?>"></script> -->

<script type="module" src="<?= base_url('/assets/js/login.js'); ?>"></script>