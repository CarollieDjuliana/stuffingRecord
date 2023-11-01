<?= $this->extend('/layout/templateBeforeLogin'); ?>

<?= $this->section('content'); ?>
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

    }
</style>

<body>
    <div class="container-fluid">
        <!-- button back -->
        <!-- <button type="button" class="btn m-2"> <i class="fa-regular fa-circle-left"></i> Back</script></button> -->
        <!-- form login -->
        <div class="d-flex justify-content-center align-items-center m-3 mt-5">
            <div class="card mb-3 p-md-3" style="width: 36rem;">
                <div class="card-body">
                    <h6 class="card-title text-center ">LOGIN<br>STUFFING RECORD <br>PT. MUSI KALIJAYA</h6>
                    <form name="login_form" id="login_form" method="post" action="Pages/dashboard" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="login_email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="login_email" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="login_password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="login_password">
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i id="eyeIcon" class="fas fa-eye"></i>
                                </button>

                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <button type="button" class="btn bg-custom " id="login" name="login">Log in</button>
                        </div>
                    </form>
                    <p id="error-message"></p>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<!-- <script type="module" src="<?php echo base_url('/assets/js/firebase-config.js'); ?>"></script>
<script type="module" src="<?php echo base_url('/assets/js/login.js'); ?>"></script> -->
<!-- <script type="module" src="./firebase-config.js"></script>
<script src="./login.js"></script> -->

<script type="module" src="<?= base_url('/assets/js/fireConfig.js'); ?>"></script>

<script type="module" src="<?= base_url('/assets/js/login.js'); ?>"></script>
<?= $this->endSection(); ?>