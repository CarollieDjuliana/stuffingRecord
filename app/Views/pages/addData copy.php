<!-- Tambahkan bagian HTML Anda di sini -->
<?= $this->extend('/layout/template'); ?>

<?= $this->section('content'); ?>

<?php
function form_foto($container_fill, $index)
{
    $html = '
    <div class="row">
        <div class="col">
            ' . $container_fill . '
        </div>
    </div>

    <div class="row">
        <div class="col">
            <!-- Container untuk menampilkan preview foto yang akan diambil -->
            <img id="imagePreview' . $index . '" src="" alt="Preview" style="max-width: 100%; height: auto;">
        </div>
    </div>

    <div class="row m-3">
        <div class="col">
            <button id="openCameraButton' . $index . '" class="btn btn-primary" data-index="' . $index . '">Open Camera</button>
        </div>
        <div class="col">
            <input type="file" id="fileInput' . $index . '" class="btn btn-light" accept="image/*" data-index="' . $index . '">Select Image <i class="fas fa-upload"></i></input>
        </div>
        <div class="col">
            <!-- Tombol untuk Upload Gambar -->
            <button id="uploadButton' . $index . '" class="btn btn-success" data-index="' . $index . '">Upload Image</button>
        </div>
    </div>
    <!-- penampung result -->
    <div class="row">
        <div class="col">
            <div class="image-container">
                <!-- Tampilkan Gambar yang Diambil -->
                <img id="capturedImage' . $index . '" style="display: none;" alt="Captured Image">
                <img id="selectedImage' . $index . '" style="display: none;" alt="Selected Image">
                <img id="uploadedImage' . $index . '" style="display: none;" alt="Uploaded Image">
                <p id="uploadedText' . $index . '" style="display: none;">Uploaded <i class="fa-solid fa-circle-check" style="color: #34b233;"></i></p>
            </div>
        </div>
    </div>
    <!-- penampung result -->
    <div class="row"></div>';

    return $html;
}
?>

<!-- Modal untuk Menampilkan Kamera -->
<div class="modal fade" id="cameraModal" tabindex="-1" role="dialog" aria-labelledby="cameraModalLabel" aria-hidden="true" data-index="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cameraModalLabel">Camera View</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <video id="cameraView" autoplay data-index="-1"></video>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="captureButton" class="btn btn-primary" data-index="-1">Capture Image</button>
            </div>
        </div>
    </div>
</div>

<!-- page -->
<div class="container">
    <div class="content-upper mt-4">
        <h3>Add Photos</h3>
        <div class="row">
            <div class="col-8">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>NO. CONTAINER </td>
                            <td>:</td>
                            <td>GESU 1442634</td>
                        </tr>
                        <tr>
                            <td>SEAL NUMBER </td>
                            <td>:</td>
                            <td>CMACGM H5168192</td>
                        </tr>
                        <tr>
                            <td>STUFFING DATE </td>
                            <td>:</td>
                            <td>25TH AUGUST 2022</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col">
                <!-- toggle sidebar -->
                <button class="btn btn-primary mt-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Choose Container</button>
            </div>
        </div>
        <hr>
    </div>

    <div class="content-under">
        <!-- form take picture -->
        <div class="row">
            <?= form_foto("EMPTY CONTAINER", 0); ?>
        </div>
        <div class="row">
            <?= form_foto("1/4 FILL CONTAINER ", 1); ?>
        </div>
        <div class="row">
            <?= form_foto("1/2 FILL CONTAINER ", 2); ?>
        </div>
        <div class="row">
            <?= form_foto("CONTAINER FULL", 3); ?>
        </div>
        <div class="row">
            <?= form_foto("CONTAINER CLOSED", 4); ?>
        </div>
        <div class="row">
            <?= form_foto("CONTAINER SEGEL", 5); ?>
        </div>
    </div>
</div>

<!-- sidebar -->
<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title m-5" id="offcanvasWithBothOptionsLabel">Backdrop with scrolling</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="sidebar-heading">Container</div>
        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action">Container 1</a>
            <a href="#" class="list-group-item list-group-item-action">Container 2</a>
            <a href="#" class="list-group-item list-group-item-action">Container 3</a>
            <a href="#" class="list-group-item list-group-item-action">Container 4</a>
            <a href="#" class="list-group-item list-group-item-action">Container 5</a>
        </div>
    </div>
</div>

<!-- Sertakan Bootstrap JS (wajib) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Sertakan Firebase Konfigurasi dan Kode JavaScript -->
<script type="module" src="<?= base_url('/assets/js/uploadImage.js'); ?>"></script>

<?= $this->endSection(); ?>