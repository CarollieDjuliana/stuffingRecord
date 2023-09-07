<?= $this->extend('/layout/template'); ?>

<?= $this->section('content'); ?>

<?php
function generate_form($numInputs)
{
    for ($i = 1; $i <= $numInputs; $i++) {
        echo "<label for='input{$i}'>Input {$i}:</label>";
        echo "<input type='text' id='input{$i}' name='input{$i}'><br>";
    }
}

if (isset($_POST['numInputs'])) {
    $numInputs = intval($_POST['numInputs']);
    generate_form($numInputs);
}
?>

<body>
    <div class="container mt-5 ">
        <h3 class="text-center">STUFFING RECORD</h3>
        <h5 class="text-center">PT. PBM MUSI KALIJAYA PALEMBANG</h5>
        <form action="" class="row g-3 mb-5 mt-3">
            <div class="col-md-6">
                <label for="SHIPPER" class="form-label">SHIPPER</label>
                <input type="text" class="form-control" id="SHIPPER">
            </div>
            <div class="col-md-6">
                <label for="NO_BOOKING" class="form-label">NO.BOOKING</label>
                <input type="text" class="form-control" id="NO_BOOKING">
            </div>
            <div class="col-md-6">
                <label for="TERM" class="form-label">TERM</label>
                <input type="text" class="form-control" id="TERM">
            </div>
            <div class="col-md-6">
                <label for="COMODITY" class="form-label">COMODITY</label>
                <input type="text" class="form-control" id="COMODITY">
            </div>
            <div class="col-md-6">
                <label for="QUANTITY" class="form-label">QUANTITY</label>
                <input type="text" class="form-control" id="QUANTITY">
            </div>
            <div class="col-md-6">
                <label for="GRADE" class="form-label">GRADE</label>
                <input type="text" class="form-control" id="GRADE">
            </div>
            <br>
            <div class="col-md-6">
                <label for="SIPPING_LINE" class="form-label">SIPPING LINE</label>
                <input type="text" class="form-control" id="SIPPING_LINE">
            </div>
            <div class="col-md-6">
                <label for="VESSEL_NAME" class="form-label">VESSEL NAME</label>
                <input type="text" class="form-control" id="VESSEL_NAME">
            </div>
            <div class="col-md-6">
                <label for="VOYAGE" class="form-label">VOYAGE</label>
                <input type="text" class="form-control" id="VOYAGE">
            </div>
            <div class="col-md-6">
                <label for="PORT_OF_LOADING" class="form-label">PORT OF LOADING</label>
                <input type="text" class="form-control" id="PORT_OF_LOADING">
            </div>
            <div class="col-md-6">
                <label for="DESTINATION" class="form-label">DESTINATION</label>
                <input type="text" class="form-control" id="DESTINATION">
            </div>
            <div class="col-md-6">
                <label for="E.T.D" class="form-label">E.T.D</label>
                <input type="date" class="form-control" id="E.T.D">
            </div>
            <br>

            <div class="col-md-6">
                <label for="STUFFING_PLACE" class="form-label">STUFFING PLACE</label>
                <input type="text" class="form-control" id="STUFFING_PLACE">
            </div>
            <div class="col-md-6">
                <label for="STUFFING_BY" class="form-label">STUFFING BY</label>
                <input type="text" class="form-control" id="STUFFING_BY">
            </div>
            <div class="col-md-6">
                <label for="LOCATION" class="form-label">LOCATION</label>
                <select id="LOCATION" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="WEATHER" class="form-label">WEATHER</label>
                <select id="LOCATION" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>

        </form>

        <label for="numInputs">NUMBER OF CONTAINERS :</label>
        <input type="number" id="numInputs" name="numInputs" min="1" max="50" value="1">
        <button id="generateForm"> Add </button>
        <form action="">
            <div id="formContainer"></div>
            <div id="pesanContainer"></div>
        </form>

        <div class="col-12 mt-5">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Check me out
                </label>
            </div>
        </div>
        <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary"> Submit </button>
        </div>
    </div>

    <script>
        function generateInput(index) {
            var keterangan = document.createElement("h5");
            keterangan.innerHTML = "Container : " + index;
            keterangan.setAttribute("class", "mt-5");
            formContainer.appendChild(keterangan);

            // container number
            var label = document.createElement("label");
            label.innerHTML = "Container Number";
            label.setAttribute("for", "num_container");

            var input = document.createElement("input");
            input.setAttribute("type", "text");
            input.setAttribute("name", "input");
            input.setAttribute("id", "container_num");
            input.setAttribute("class", "form-control");

            var br = document.createElement("br");

            formContainer.appendChild(label);
            formContainer.appendChild(input);
            formContainer.appendChild(br);
            // seal number
            var label = document.createElement("label");
            label.innerHTML = "Seal Number";
            label.setAttribute("for", "seal_number");

            var input = document.createElement("input");
            input.setAttribute("type", "text");
            input.setAttribute("name", "input");
            input.setAttribute("id", "seal_number");
            input.setAttribute("class", "form-control");

            var br = document.createElement("br");

            formContainer.appendChild(label);
            formContainer.appendChild(input);
            formContainer.appendChild(br);
            // Stuffing date
            var label = document.createElement("label");
            label.innerHTML = "Stuffing Date";
            label.setAttribute("for", "stuffing_date");


            var input = document.createElement("input");
            input.setAttribute("type", "date");
            input.setAttribute("name", "input");
            input.setAttribute("id", "stuffing_date");
            input.setAttribute("class", "form-control");

            var br = document.createElement("br");

            formContainer.appendChild(label);
            formContainer.appendChild(input);
            formContainer.appendChild(br);
            // garis
            // var hr = document.createElement("hr");
            // formContainer.appendChild(hr);

        }

        document.getElementById("generateForm").addEventListener("click", function() {
            var numInputs = parseInt(document.getElementById("numInputs").value);
            var formContainer = document.getElementById("formContainer");
            formContainer.innerHTML = "";

            // var pesanContainer = document.getElementById("pesanContainer");
            // pesanContainer.innerHTML = "";


            for (var i = 1; i <= numInputs; i++) {
                // var pesan = "Ini adalah pesan untuk Container " + i + ".";
                // pesanContainer.innerHTML += "<p>" + pesan + "</p>";
                generateInput(i);
            }
        });

        document.getElementById("stuff_date").addEventListener("click", function() {
            var selectedDate = document.getElementById("tanggal").value;
            alert("Tanggal yang dipilih: " + selectedDate);
        });
    </script>

</body>

<?= $this->endSection(); ?>