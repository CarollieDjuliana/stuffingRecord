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
        <div class="d-flex justify-content-center align-items-center m-3">
            <div class="card mb-3 p-md-3" style="width: 36rem;">
                <div class="card-body">
                    <h6 class="card-title text-center ">REGISTER <br> STUFFING RECORD <br>PT. MUSI KALIJAYA</h6>
                    <form id="registration_form" method="post" action="#" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="position" class="form-label">Jabatan/Posisi</label>
                            <input type="text" class="form-control" id="position">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password">
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i id="eyeIcon" class="fas fa-eye"></i>
                                </button>

                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="confirm_password">
                                <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                    <i id="confirmEyeIcon" class="fas fa-eye"></i>
                                </button>
                            </div>
                            <p id="password_error" class="text-danger"></p>
                        </div>



                        <div class="d-flex justify-content-center align-items-center">
                            <button type="button" id="register" class="btn bg-custom" name="register">Register</button>
                        </div>
                    </form>
                    <!-- <p id="error-message"></p> -->
                    <p>Already have an account? <a href="/login">Log in</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>


    <script type="module" src="<?= '/assets/js/register.js'; ?>"></script>

</body>

</html>
<?= $this->endSection(); ?>