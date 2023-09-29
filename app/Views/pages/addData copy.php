<?= $this->extend('/layout/template'); ?>

<?= $this->section('content'); ?>

<?php
function form_foto($container_fill)
{
    $html = '
    <div class="row">
        <div class="col">';
    $html .= $container_fill;
    $html .= '</div>
    </div>
    <div class="row m-3">
        <div class="col">
            <input type="file" id="' . $container_fill . '" class="btn btn-light" accept="image/*">Capture Image <i class="fas fa-camera"></i></input>
        </div>
        <div class="col">
            <input type="file" id="' . $container_fill . '" class="btn btn-light" accept="image/*">Select Image <i class="fas fa-upload"></i></input>
        </div>
        <div class="col">
            <button class="btn btn-warning" id="uploadButton">Upload Gambar</button>
        </div>
    </div>
    <!-- penampung result -->
    <div class="row"></div>';

    return $html;
}
?>


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
            <?php echo form_foto("EMPTY CONTAINER"); ?>
        </div>
        <div class="row">
            <?php echo form_foto("1/4 FILL CONTAINER "); ?>
        </div>
        <div class="row">
            <?php echo form_foto("1/2 FILL CONTAINER "); ?>
        </div>
        <div class="row">
            <?php echo form_foto("CONTAINER FULL"); ?>
        </div>
        <div class="row">
            <?php echo form_foto("CONTAINER CLOSED"); ?>
        </div>
        <div class="row">
            <?php echo form_foto("CONTAINER SEGEL"); ?>
        </div>
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
<script type="module" src="<?= base_url('/assets/js/uploadImage.js'); ?>"></script>
<?= $this->endSection(); ?>