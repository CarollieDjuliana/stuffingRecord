<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <script src="https://kit.fontawesome.com/e589d529a5.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="<?= base_url('/assets/css/style.css'); ?>" rel="stylesheet" type="text/css">
    <!--<script src="<?= base_url(); ?>/public/assets/js/mylib.js" type="text/javascript"></script>
    <link rel="stylesheet" href="<?= base_url('/public/assets/css/style.css') ?>" /> -->
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="/assets/images/logo.png" alt="Logo" width="25%" height="25%" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link px-3" href="#">Account</a>
                    <a class="nav-link px-3" href="#"><i class="fa-solid fa-right-from-bracket"></i></a>
                </div>
            </div>
        </div>
    </nav>

    <!-- back button -->
    <!-- <button type="button" class="btn btn-outline-secondary mt-5 ms-5"> <i class="fa-solid fa-caret-left"></i> Back </button> -->

    <?= $this->renderSection('content'); ?>

    <!-- footer -->
    <footer>
        <div class="container mb-5">
            <div class="fixed-bottom text-center p-1 bg-custom mt-10">
                © 2023 PT Musi Kalijaya
            </div>
        </div>
    </footer>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

</body>

</html>