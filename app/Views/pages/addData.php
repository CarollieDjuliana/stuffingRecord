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

      <div class="row m-3">
        <div class="col">
            <button id="openCameraButton' . $index . '" class="btn btn-primary" data-index="' . $index . '">Open Camera</button>
        </div>
        <div class="col">
            <input type="file" id="fileInput' . $index . '" class="btn " accept="image/*" data-index="' . $index . '" name="' . $index . '-' . $container_fill . '" " value="Select Photos">
        </div>
        <div class="col">
            <!-- Tombol untuk Upload Gambar -->
            <button id="uploadButton' . $index . '" class="btn btn-success" data-index="' . $index . '" " name="' . $index . '-' . $container_fill . '">Upload Image</button>
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
                <div id="photoList' . $index . '"></div>
                <p id="uploadedText' . $index . '" style="display: none;">Uploaded <i class="fa-solid fa-circle-check" style="color: #34b233;"></i></p>
            </div>
        </div>
    </div>
    <hr>
    <!-- penampung result -->
    <div class="row"></div>';

    return $html;
}
?>


<!-- Modal untuk Menampilkan Kamera -->
<div class="modal fade" id="cameraModal" tabindex="-1" role="dialog" aria-labelledby="cameraModalLabel"
    aria-hidden="true" data-index="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cameraModalLabel">Camera View</h5>
                <button id="closeButton_x" type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <video id="cameraView" autoplay data-index="-1"></video>
            </div>
            <div class="modal-footer">
                <button id="closeButton" type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    data-dismiss="modal">Close</button>
                <button id="captureButton" class="btn btn-primary" data-index="-1">Capture Image</button>
            </div>
        </div>
    </div>
</div>

<!-- page -->
<div class="container">
    <div class="content-upper mt-4">
        <h6>
            <div id="shipper"></div>
        </h6>
        <div class="row">
            <div class="col-8">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>NO. CONTAINER </td>
                            <td>:</td>
                            <td id="container_number"></td>
                        </tr>
                        <tr>
                            <td>SEAL NUMBER </td>
                            <td>:</td>
                            <td id="seal_number"></td>
                        </tr>
                        <tr>
                            <td>STUFFING DATE </td>
                            <td>:</td>
                            <td id="stuffing_date"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
    </div>

    <div class="content-under">
        <!-- form take picture -->
        <div class="row">
            <?= form_foto("EMPTY CONTAINER", 0); ?>
            <!-- <div id="uploadedImage0"></div> -->
        </div>
        <div class="row">
            <?= form_foto("QUARTER FILL CONTAINER", 1); ?>
            <!-- <div id="uploadedImage1"></div> -->
        </div>
        <div class="row">
            <?= form_foto("HALF FILL CONTAINER", 2); ?>
            <!-- <div id="uploadedImage2"></div> -->
        </div>
        <div class="row">
            <?= form_foto("CONTAINER FULL", 3); ?>
            <!-- <div id="uploadedImage3"></div> -->
        </div>
        <div class="row">
            <?= form_foto("CONTAINER CLOSED", 4); ?>
            <!-- <div id="uploadedImage4"></div> -->
        </div>
        <div class="row">
            <?= form_foto("CONTAINER SEGEL", 5); ?>
            <!-- <div id="uploadedImage5"></div> -->
        </div>


    </div>



    <!-- Modal Bootstrap untuk konfirmasi -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to change this activity into complete?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmCloseButton">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- SIDEBAR -->
    <?= $this->section('sidebar'); ?>
    <h5><span class="text-decoration-none px-3 py-2 d-block font-weight-bold" style="font-size : 60%">CONTAINERS</span>
    </h5>
    <!-- Menampilkan jumlah foto yang sudah di upload -->
    <div class="uploadedContainer">
        <span class="text-white px-3 py-2 d-block font-weight-bold">Uploaded (<span
                id="photoDisplayRatio"></span>)</span>
    </div>
    <div id="photoDisplayRatio"></div>
    <div id="data-table-container" class="button-container"></div>
    <!-- Tombol " Close This Activity" -->
    <div class="mt-5 close-activity-button px-2 py-2">
        <button id="closeActivityButton" class="btn btn-danger">Close This Activity</button>
    </div>
    <?= $this->endSection(); ?>

    <!-- Sertakan Bootstrap JS (wajib) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Sertakan Firebase Konfigurasi dan Kode JavaScript -->
    <script type="module" src="<?= '/assets/js/uploadImage.js'; ?>"></script>
    <script type="module" src="<?= '/assets/js/addData.js'; ?>"></script>
</div>
<?= $this->endSection(); ?>