<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <h3 class="text-center">STUFFING RECORD</h3>
    <h5 class="text-center">PT. PBM MUSI KALIJAYA PALEMBANG</h5>


    <form action="/submit" method="post" class="form row g-3 mb-5 mt-3">
        <div class="col-md-6">
            <label for="shipper" class="form-label">SHIPPER</label>
            <input type="text" class="form-control" id="shipper" name="shipper" required>
        </div>
        <div class="col-md-6">
            <label for="no_booking" class="form-label">NO.BOOKING</label>
            <input type="text" class="form-control" id="no_booking" name="no_booking" required>
        </div>
        <div class="col-md-6">
            <label for="term" class="form-label">TERM</label>
            <input type="text" class="form-control" id="term" name="term" value="CFS/CY" required>
        </div>
        <div class="col-md-6">
            <label for="comodity" class="form-label">COMODITY</label>
            <input type="text" class="form-control" id="comodity" name="comodity" value="RUBBER" required>
        </div>
        <div class="col-md-6">
            <label for="quantity" class="form-label">QUANTITY</label>
            <input type="text" class="form-control" id="quantity" name="quantity" required>
        </div>
        <div class="col-md-6">
            <label for="grade" class="form-label">GRADE</label>
            <input type="text" class="form-control" id="grade" name="grade" value="1 SIR 20" required>
        </div>
        <br>
        <div class="col-md-6">
            <label for="shipping_line" class="form-label">SIPPING LINE</label>
            <input type="text" class="form-control" id="shipping_line" name="shipping_line" required>
        </div>
        <div class="col-md-6">
            <label for="vessel_name" class="form-label">VESSEL NAME</label>
            <input type="text" class="form-control" id="vessel_name" name="vessel_name" required>
        </div>
        <div class="col-md-6">
            <label for="voyage" class="form-label">VOYAGE</label>
            <input type="text" class="form-control" id="voyage" name="voyage" required>
        </div>
        <div class="col-md-6">
            <label for="port_of_loading" class="form-label">PORT OF LOADING</label>
            <input type="text" class="form-control" id="port_of_loading" name="port_of_loading" value="PALEMBANG" required>
        </div>
        <div class="col-md-6">
            <label for="destination" class="form-label">DESTINATION</label>
            <input type="text" class="form-control" id="destination" name="destination" required>
        </div>
        <div class="col-md-6">
            <label for="etd" class="form-label">E.T.D</label>
            <input type="date" class="form-control" id="etd" name="etd" required>
        </div>
        <br>
        <div class="col-md-6">
            <label for="stuffing_place" class="form-label">STUFFING PLACE</label>
            <input type="text" class="form-control" id="stuffing_place" name="stuffing_place" value="CONTAINER YARD" required>
        </div>
        <div class="col-md-6">
            <label for="stuffing_by" class="form-label">STUFFING BY</label>
            <input type="text" class="form-control" id="stuffing_by" name="stuffing_by" value="PT. PBM MUSI KALIJAYA" required>
        </div>
        <div class="col-md-6">
            <label for="location" class="form-label">LOCATION</label>
            <select id="location" class="form-select" name="location" required>
                <option selected>UTPK</option>
                <option>DEPO INTIRUP</option>
                <option>GUI KUTO</option>
                <option>PTP</option>
                <option>DEPO BRP</option>
                <option>OTHER</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="weather" class="form-label">WEATHER</label>
            <select id="weather" class="form-select" name="weather" required>
                <option selected>Good</option>
                <option>Moderate</option>
                <option>Bad</option>
            </select>
        </div>
    </form>
</div>

<label for="numInputs">NUMBER OF CONTAINERS :</label>
<input type="number" id="numInputs" name="numInputs" min="1" max="50" value="1">
<button id="generateForm" type="button"> Add </button>
<form action="">
    <div id="formContainer"></div>
    <div id="pesanContainer"></div>
</form>

<div class="col-12 mt-5">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="stuff_date" required>
        <label class="form-check-label" for="stuff_date">
            Check me out
        </label>
    </div>
</div>
<div class="col-12 mt-3">
    <button id="submit" type="submit" class="btn btn-primary"> Submit </button>
</div>

<!-- <script src="<?= base_url('/assets/js/fireConfig.js'); ?>"></script> -->

<script type="module" src="<?= base_url('/assets/js/addActivity.js'); ?>"></script>

</body>

<?= $this->endSection(); ?>