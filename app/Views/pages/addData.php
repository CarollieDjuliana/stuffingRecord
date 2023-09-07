<?= $this->extend('/layout/template'); ?>

<?= $this->section('content'); ?>

<?php
function form_foto($container_fill)

{
    echo '
    <div class="row">
        <div class="col">';
    echo $container_fill;
    echo '</div>
    </div>
    <div class="row m-3">
        <!-- <div class="col"><input class="btn btn-light" type="button" value="upload"></div>
        <div class="col"><input class="btn btn-light" type="button" value="Input"></div> -->
        <div class="col">
            <button type="button" class="btn btn-light">Take Photo <i class="fas fa-camera"></i></button>
        </div>
        <div class="col">
            <button type="button" class="btn btn-light">Upload Photo <i class="fas fa-upload"></i></button>
        </div>
        <div class="col ">
            <input class="btn btn-warning" type="button" value="save">
    </div>
    </div>
<!-- penampung result -->
<div class="row">

</div>
    ';
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
                            <td>25TH AGUSTUS 2022</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col">
                <!-- toogle sidebar -->
                <button class="btn btn-primary mt-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Choose Container</button>
            </div>
        </div>
        <hr>
    </div>

    <div class="content-undder">
        <!-- form take picture -->
        <div class="row">
            <?php form_foto("EMPTY CONTAINER") ?>

            <!-- penampung result -->
            <div class="row">
                <button type="button" id="upload_empty_container" class="btn btn-light">Upload Photo <i class="fas fa-upload"></i></button>

            </div>
        </div>
        <div class="row">
            <?php form_foto("1/4 FILL CONTAINER ") ?>
            <!-- penampung result -->
            <div class="row">

            </div>
        </div>
        <div class="row">
            <?php form_foto("1/2 FILL CONTAINER ") ?>
            <!-- penampung result -->
            <div class="row">

            </div>
        </div>
        <div class="row">
            <?php form_foto("CONTAINER FULL") ?>
            <!-- penampung result -->
            <div class="row">

            </div>
        </div>
        <div class="row">
            <?php form_foto("CONTAINER CLOSED") ?>
            <!-- penampung result -->
            <div class="row">

            </div>
        </div>
        <div class="row">
            <?php form_foto("CONTAINER SEGEL") ?>
            <!-- penampung result -->
            <div class="row">

            </div>
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



<?= $this->endSection(); ?>