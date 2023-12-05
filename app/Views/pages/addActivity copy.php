<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<body>
    <div class="container mt-3">
        <h5 class="text-center">ADD ACTIVITY</h5>
        <hr>
        <form id="form1" method="post">
            <div class="row">
                <div class="col-md-6">
                    <label for="shipper" class="form-label mt-3">SHIPPER</label>
                    <select class="form-select" id="shipper" name="shipper" required>
                        <option value="Maersk">Maersk</option>
                        <option value="APL">APL</option>
                        <option value="other">Other</option>
                    </select>

                    <div id="otherShipper" style="display:none;">
                        <label for="other_shipper" class="form-label mt-3">Other Shipper :</label>
                        <input type="text" class="form-control" id="other_shipper" name="other_shipper">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="no_booking" class="form-label mt-3">NO.BOOKING</label>
                    <input type="text" class="form-control" id="no_booking" name="no_booking" required>
                </div>
                <div class="col-md-6">
                    <label for="term" class="form-label mt-3">TERM</label>
                    <select class="form-select" id="term" name="term" required>
                        <option selected value="CFS/CY">CFS/CY</option>
                        <option value="CY/CY">CY/CY</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="commodity" class="form-label mt-3">COMMODITY</label>
                    <input type="text" class="form-control" id="commodity" name="commodity" value="RUBBER" required>
                </div>
                <div class="col-md-6">
                    <label for="quantity" class="form-label mt-3">QUANTITY</label>
                    <input type="text" class="form-control" id="quantity" name="quantity" required>
                </div>
                <div class="col-md-6">
                    <label for="grade" class="form-label mt-3">GRADE</label>
                    <input type="text" class="form-control" id="grade" name="grade" value="1 SIR 20" required>
                </div>
                <div class="col-md-6">
                    <label for="shipping_line" class="form-label mt-3">SHIPPING LINE</label>
                    <select class="form-select" id="shipping_line" name="shipping_line" required>
                        <option value="Maersk">Maersk</option>
                        <option value="APL">APL</option>
                        <option value="other">Other</option>
                    </select>

                    <div id="otherShippingLineContainer" style="display:none;">
                        <label for="other_shipping_line" class="form-label mt-3">Other Shipping Line:</label>
                        <input type="text" class="form-control" id="other_shipping_line" name="other_shipping_line">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="customer" class="form-label mt-3">CUSTOMER</label>
                    <select class="form-select" id="customer" name="customer" required>
                        <option value="Maersk">customer1</option>
                        <option value="APL">customer2</option>
                        <option value="other">Other</option>
                    </select>

                    <div id="otherCustomer" style="display:none;">
                        <label for="other_customer" class="form-label mt-3">Other Shipping Line:</label>
                        <input type="text" class="form-control" id="other_customer" name="other_customer">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="vessel_name" class="form-label mt-3">VESSEL NAME</label>
                    <input type="text" class="form-control" id="vessel_name" name="vessel_name" required>
                </div>
                <div class="col-md-6">
                    <label for="voyage" class="form-label mt-3">VOYAGE</label>
                    <input type="text" class="form-control" id="voyage" name="voyage" required>
                </div>
                <div class="col-md-6">
                    <label for="port_of_loading" class="form-label mt-3">PORT OF LOADING</label>
                    <input type="text" class="form-control" id="port_of_loading" name="port_of_loading" value="PALEMBANG" required>
                </div>
                <div class="col-md-6">
                    <label for="destination" class="form-label mt-3">DESTINATION</label>
                    <input type="text" class="form-control" id="destination" name="destination" required>
                </div>
                <div class="col-md-6">
                    <label for="etd" class="form-label mt-3">E.T.D</label>
                    <input type="date" class="form-control" id="etd" name="etd" required>
                </div>
                <div class="col-md-6">
                    <label for="stuffing_date" class="form-label mt-3">STUFFING DATE</label>
                    <input type="date" class="form-control" id="stuffing_date" name="stuffing_date" required>
                </div>
                <div class="col-md-6">
                    <label for="stuffing_place" class="form-label mt-3">STUFFING PLACE</label>
                    <input type="text" class="form-control" id="stuffing_place" name="stuffing_place" value="CONTAINER YARD" required>
                </div>
                <div class="col-md-6">
                    <label for="stuffing_place" class="form-label mt-3">STUFFING PLACE</label>
                    <select id="stuffing_place" class="form-select" name="stuffing_place" required>
                        <option selected>CONTAINER YARD / TRUCKS</option>
                        <option>CONTAINER YARD / BARGES</option>
                        <option value="other">Other</option>
                    </select>
                    <div id="otherStuffingPlace" style="display:none;">
                        <label for="other_stuffing_place" class="form-label mt-3">Other Stuffing Place :</label>
                        <input type="text" class="form-control" id="other_stuffing_place" name="other_stuffing_place" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="stuffing_by" class="form-label mt-3">STUFFING BY</label>
                    <input type="text" class="form-control" id="stuffing_by" name="stuffing_by" value="PT. PBM MUSI KALIJAYA" required>
                </div>
                <div class="col-md-6">
                    <label for="location" class="form-label mt-3">LOCATION</label>
                    <select id="location" class="form-select" name="location" required>
                        <option selected>UTPK</option>
                        <option>DEPO INTIRUP</option>
                        <option>GUI KUTO</option>
                        <option>PTP</option>
                        <option>DEPO BRP</option>
                        <option value="other">Other</option>
                    </select>

                    <div id="otherLocationContainer" style="display:none;">
                        <label for="other_location" class="form-label mt-3">Other Location:</label>
                        <input type="text" class="form-control" id="other_location" name="other_location">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="weather" class="form-label mt-3">WEATHER</label>
                    <select id="weather" class="form-select" name="weather" required>
                        <option selected>Good</option>
                        <option>Moderate</option>
                        <option>Bad</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inspected_by" class="form-label mt-3">INSPECTED BY</label>
                    <select id="inspected_by" class="form-select" name="inspected_by" required>
                        <option>UMAR</option>
                        <option>KOMADI</option>
                        <option>TIRMAN</option>
                        <option>THOYIB</option>
                        <option value="other">Other</option>
                    </select>

                    <div id="otherInspectedByContainer" style="display:none;">
                        <label for="other_inspected_by" class="form-label mt-3">Other Inspected By:</label>
                        <input type="text" class="form-control" id="other_inspected_by" name="other_inspected_by">
                    </div>
                </div>
            </div>
        </form>

        <div class="col-12 mt-5 mb-5">
            <div class="d-flex justify-content-between">
                <button class="btn btn-danger" onclick="cancel()">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="saveData()">Next</button>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    // Function to handle the change event of the location dropdown
    document.getElementById('location').addEventListener('change', function() {
        var otherLocationContainer = document.getElementById('otherLocationContainer');
        var otherInput = document.getElementById('other_location');

        if (this.value === 'other') {
            otherLocationContainer.style.display = 'block';
            otherInput.setAttribute('required', 'required');
        } else {
            otherLocationContainer.style.display = 'none';
            otherInput.removeAttribute('required');
        }
    });

    // Function to handle the change event of the shipping_line dropdown
    document.getElementById('shipping_line').addEventListener('change', function() {
        var otherShippingLineContainer = document.getElementById('otherShippingLineContainer');
        var otherInput = document.getElementById('other_shipping_line');

        if (this.value === 'other') {
            otherShippingLineContainer.style.display = 'block';
            otherInput.setAttribute('required', 'required');
        } else {
            otherShippingLineContainer.style.display = 'none';
            otherInput.removeAttribute('required');
        }
    });

    // Function to handle the change event of the inspected_by dropdown
    document.getElementById('inspected_by').addEventListener('change', function() {
        var otherInspectedByContainer = document.getElementById('otherInspectedByContainer');
        var otherInput = document.getElementById('other_inspected_by');

        if (this.value === 'other') {
            otherInspectedByContainer.style.display = 'block';
            otherInput.setAttribute('required', 'required');
        } else {
            otherInspectedByContainer.style.display = 'none';
            otherInput.removeAttribute('required');
        }
    });

    // Function to handle the change event of the inspected_by dropdown
    document.getElementById('stuffing_place').addEventListener('change', function() {
        var otherStuffingPlaceContainer = document.getElementById('otherStuffingPlace');
        var otherInput = document.getElementById('other_stuffing_place');

        if (this.value === 'other') {
            otherStuffingPlaceContainer.style.display = 'block';
            otherInput.setAttribute('required', 'required');
        } else {
            otherStuffingPlaceContainer.style.display = 'none';
            otherInput.removeAttribute('required');
        }
    });
</script>


<!-- Include Firebase SDK script -->
<script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-app-compat.js"></script>
<script>
    const firebaseConfig = {
        apiKey: "AIzaSyDWnzARzRIX5eb4q3A0tDwb_4iSmZ5EHTY",
        authDomain: "stuffingrecord-mkj.firebaseapp.com",
        databaseURL: "https://stuffingrecord-mkj-default-rtdb.asia-southeast1.firebasedatabase.app",
        projectId: "stuffingrecord-mkj",
        storageBucket: "stuffingrecord-mkj.appspot.com",
        messagingSenderId: "515562362541",
        appId: "1:515562362541:web:f692bb65ef317963765824",
        measurementId: "G-4GEZPYYPS5"
    };

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);

    // Function to save data from the first page
    function saveData() {
        const formElements = [
            'shipper', 'no_booking', 'quantity', 'date', 'term', 'commodity', 'grade',
            'shipping_line', 'vessel_name', 'voyage', 'port_of_loading', 'destination',
            'etd', 'stuffing_date', 'stuffing_place', 'stuffing_by', 'location', 'weather', 'inspected_by',
            'customer'
        ];

        const formData = {};
        let isValid = true;

        formElements.forEach(elementId => {
            const element = document.getElementById(elementId);
            if (element) {
                formData[elementId] = element.value;
                if (!formData[elementId]) {
                    isValid = false;
                }
            }
        });

        // Check if custom location input is visible and has a value
        const shipper = document.getElementById('shipper');
        if (location.value === 'other') {
            const othershipping_line = document.getElementById('other_shipper');
            if (othershipping_line) {
                formData['shipper'] = othershipping_line.value;
                if (!formData['shipper']) {
                    isValid = false;
                }
            }
        }

        // Check if custom location input is visible and has a value
        const location = document.getElementById('location');
        if (location.value === 'other') {
            const otherLocationInput = document.getElementById('other_location');
            if (otherLocationInput) {
                formData['location'] = otherLocationInput.value;
                if (!formData['location']) {
                    isValid = false;
                }
            }
        }

        // Check if custom location input is visible and has a value
        const shipping_line = document.getElementById('shipping_line');
        if (location.value === 'other') {
            const othershipping_line = document.getElementById('other_shipping_line');
            if (othershipping_line) {
                formData['shipping_line'] = othershipping_line.value;
                if (!formData['shipping_line']) {
                    isValid = false;
                }
            }
        }

        // Check if custom location input is visible and has a value
        const customer = document.getElementById('customer');
        if (location.value === 'other') {
            const otherCustomer = document.getElementById('other_customer');
            if (otherCustomer) {
                formData['customer'] = otherCustomer.value;
                if (!formData['customer']) {
                    isValid = false;
                }
            }
        }

        // Check if custom location input is visible and has a value
        const inspected_by = document.getElementById('inspected_by');
        if (location.value === 'other') {
            const otherinspected_by = document.getElementById('other_inspected_by');
            if (otherinspected_by) {
                formData['inspected_by'] = otherinspected_by.value;
                if (!formData['inspected_by']) {
                    isValid = false;
                }
            }
        }


        // Check if custom location input is visible and has a value
        const stuffing_place = document.getElementById('stuffing_place');
        if (location.value === 'other') {
            const otherinspected_by = document.getElementById('other_stuffing_place');
            if (otherinspected_by) {
                formData['stuffing_place'] = otherinspected_by.value;
                if (!formData['stuffing_place']) {
                    isValid = false;
                }
            }
        }

        if (isValid) {
            localStorage.setItem('dataForm1', JSON.stringify(formData));
            window.location.href = '/addActivityContainer';
        } else {
            alert('Please fill in all fields before proceeding to the next form.');
        }
    }


    // Function to cancel the process and go back to the previous page
    function cancel() {
        localStorage.removeItem('dataForm1');
        window.location.href = '/dashboard'; // Replace with your main page
    }

    // Function to load saved data when the page loads
    function loadSavedData() {
        const savedData = localStorage.getItem('dataForm1');
        if (savedData) {
            const formData = JSON.parse(savedData);

            Object.keys(formData).forEach(key => {
                const element = document.getElementById(key);
                if (element) {
                    element.value = formData[key];
                }
            });
        }
    }

    // Load saved data when the page loads
    window.onload = loadSavedData;
</script>

<?= $this->endSection(); ?>