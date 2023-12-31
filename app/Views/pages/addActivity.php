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
                        <option>PT ANEKA BUMI PRATAMA</option>
                        <option>PT BINTANG AGUNG PERSADA</option>
                        <option>PT BINTANG GASING PERSADA</option>
                        <option>PT BUKIT ANGKASA MAKMUR</option>
                        <option>PT BUMI BELITI ABADI</option>
                        <option>PT GADJAH RUKU</option>
                        <option>PT HOKTONG</option>
                        <option>PT KARET BATIN DELAPAN</option>
                        <option>PT KARINI UTAMA</option>
                        <option>PT KIRANA MUSI PERSADA</option>
                        <option>PT KIRANA PERMATA</option>
                        <option>PT KIRANA WINDU</option>
                        <option>PT KOMERING JAYA PERDANA</option>
                        <option>PT LINGGA DJAJA</option>
                        <option>PT MARDEC MUSI LESTARI</option>
                        <option>PT PANCA SAMUDERA SIMPATI</option>
                        <option>PT PERKEBUNAN NUSANTARA VII</option>
                        <option>PT PINAGO UTAMA</option>
                        <option>PT REMCO</option>
                        <option>PT STAR RUBBER</option>
                        <option>PT SRI TRANG LINGGA INDONESIA</option>
                        <option>PT SUNAN RUBBER</option>
                        <option>PT WARNA AGUNG SELATAN</option>
                        <option value="other">Other</option>
                    </select>

                    <div id="otherShipper" style="display:none;">
                        <label for="other_shipper" class="form-label mt-3">Other Shipper :</label>
                        <input type="text" class="form-control" id="other_shipper" name="other_shipper" placeholder="data tanpa titik atau simbol lainnya">
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
                        <option>MAERSK LINE</option>
                        <option>COSCO</option>
                        <option>ONE INDONESIA</option>
                        <option>HAPAG LLOYD</option>
                        <option>OOCL</option>
                        <option>EVERGREEN</option>
                        <option>CMA</option>
                        <option>SSL</option>
                        <option>RCL</option>
                        <option>WANHAI</option>
                        <option>MSC</option>
                        <option>YANG MING</option>
                        <option>SINOKOR</option>
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
                        <option>HAPAG LLOYD</option>
                        <option>MTKI</option>
                        <option>SAMUDERA AGENCIES INDONESIA</option>
                        <option>ONE INDONESIA</option>
                        <option>MSC</option>
                        <option>EVERGREEN</option>
                        <option>GLOBAL TRANSPORTASI NUSANTARA</option>
                        <option>CONTAINER MARITIME ACTIVITIES</option>
                        <option>OOCL INDONESIA</option>
                        <option>YANG MING</option>
                        <option value="other">Other</option>
                    </select>

                    <div id="otherCustomer" style="display:none;">
                        <label for="other_customer" class="form-label mt-3">Other Shipping Line:</label>
                        <input type="text" class="form-control" id="other_customer" name="other_customer">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="vessel_name" class="form-label mt-3">VESSEL NAME</label>
                    <select id="vessel_name" class="form-select" name="vessel_name" required>
                        <option>JOHAN FORTUNE</option>
                        <option>ATI BHUM</option>
                        <option>SINAR PENIDA</option>
                        <option>JML FORTUNE</option>
                        <option>SEJAHTERA</option>
                        <option>LINTAS BRANTAS</option>
                        <option>BENGAWAN MAS</option>
                        <option>LL 2517</option>
                        <option value="other">Other</option>
                    </select>
                    <div id="otherVesselName" style="display:none;">
                        <label for="other_vessel_name" class="form-label mt-3">Other Vessel Name :</label>
                        <input type="text" class="form-control" id="other_vessel_name" name="other_vessel_name" required>
                    </div>
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
                    <label for="date" class="form-label mt-3">STUFFING DATE</label>
                    <input type="date" class="form-control" id="date" name="date" required>
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
                        <option>CONTAINER YARD / WAREHOUSE</option>
                        <option>CONTAINER YARD</option>
                    </select>
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

    // Function to handle the change event of the stuffing_place dropdown
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

    // Function to handle the change event of the shipper dropdown
    document.getElementById('shipper').addEventListener('change', function() {
        var otherShipper = document.getElementById('otherShipper');
        var otherInput = document.getElementById('other_shipper');

        if (this.value === 'other') {
            otherShipper.style.display = 'block';
            otherInput.setAttribute('required', 'required');
        } else {
            otherShipper.style.display = 'none';
            otherInput.removeAttribute('required');
        }
    });

    // Function to handle the change event of the customer dropdown
    document.getElementById('customer').addEventListener('change', function() {
        var otherCustomer = document.getElementById('otherCustomer');
        var otherInput = document.getElementById('other_customer');

        if (this.value === 'other') {
            otherCustomer.style.display = 'block';
            otherInput.setAttribute('required', 'required');
        } else {
            otherCustomer.style.display = 'none';
            otherInput.removeAttribute('required');
        }
    });

    // Function to handle the change event of the customer dropdown
    document.getElementById('vessel_name').addEventListener('change', function() {
        var otherVesselName = document.getElementById('otherVesselName');
        var otherInput = document.getElementById('other_vessel_name');

        if (this.value === 'other') {
            otherVesselName.style.display = 'block';
            otherInput.setAttribute('required', 'required');
        } else {
            otherVesselName.style.display = 'none';
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
            'shipper',
            'no_booking',
            'quantity',
            'term',
            'commodity',
            'grade',
            'shipping_line',
            'vessel_name',
            'voyage',
            'port_of_loading',
            'destination',
            'etd',
            'date',
            'stuffing_place',
            'stuffing_by',
            'location',
            'weather',
            'inspected_by',
            'customer',
        ];

        const formData = {};
        let isValid = true;

        formElements.forEach(elementId => {
            const element = document.getElementById(elementId);
            if (element) {
                formData[elementId] = element.value;
                if (!formData[elementId]) {
                    isValid = false;
                    alert(`Please fill in the "${elementId}" field before proceeding to the next form.`);
                }
            }

        });

        const temp_noBooking = document.getElementById('no_booking');
        formData['no_booking'] = temp_noBooking.value.replace(/\s/g, '');

        // Check if custom location input is visible and has a value
        const shipperInput = document.getElementById('shipper');
        if (shipperInput.value === 'other') {
            const otherShipperInput = document.getElementById('other_shipper');
            if (otherShipperInput) {
                formData['shipper'] = otherShipperInput.value;
                if (!formData['shipper']) {
                    isValid = false;
                    alert('Please fill in the "location" field before proceeding to the next form.');
                }
            }
        }


        // Check if custom location input is visible and has a value
        const locationInput = document.getElementById('location');
        if (locationInput.value === 'other') {
            const otherLocationInput = document.getElementById('other_location');
            if (otherLocationInput) {
                formData['location'] = otherLocationInput.value;
                if (!formData['location']) {
                    isValid = false;
                    alert('Please fill in the "location" field before proceeding to the next form.');
                }
            }
        }

        // Check if custom shipping line input is visible and has a value
        const shippingLineInput = document.getElementById('shipping_line');
        if (shippingLineInput.value === 'other') {
            const otherShippingLineInput = document.getElementById('other_shipping_line');
            if (otherShippingLineInput) {
                formData['shipping_line'] = otherShippingLineInput.value;
                if (!formData['shipping_line']) {
                    isValid = false;
                    alert('Please fill in the "shipping_line" field before proceeding to the next form.');
                }
            }
        }

        // Check if custom customer input is visible and has a value
        const customerInput = document.getElementById('customer');
        if (customerInput.value === 'other') {
            const otherCustomerInput = document.getElementById('other_customer');
            if (otherCustomerInput) {
                formData['customer'] = otherCustomerInput.value;
                if (!formData['customer']) {
                    isValid = false;
                    alert('Please fill in the "customer" field before proceeding to the next form.');
                }
            }
        }

        // Check if custom inspected_by input is visible and has a value
        const inspectedByInput = document.getElementById('inspected_by');
        if (inspectedByInput.value === 'other') {
            const otherInspectedByInput = document.getElementById('other_inspected_by');
            if (otherInspectedByInput) {
                formData['inspected_by'] = otherInspectedByInput.value;
                if (!formData['inspected_by']) {
                    isValid = false;
                    alert('Please fill in the "inspected_by" field before proceeding to the next form.');
                }
            }
        }

        // Check if custom stuffing_place input is visible and has a value
        const stuffingPlaceInput = document.getElementById('stuffing_place');
        if (stuffingPlaceInput.value === 'other') {
            const otherStuffingPlaceInput = document.getElementById('other_stuffing_place');
            if (otherStuffingPlaceInput) {
                formData['stuffing_place'] = otherStuffingPlaceInput.value;
                if (!formData['stuffing_place']) {
                    isValid = false;
                    alert('Please fill in the "stuffing_place" field before proceeding to the next form.');
                }
            }
        }

        // Check if custom inspected_by input is visible and has a value
        const vesselNameInput = document.getElementById('vessel_name');
        if (vesselNameInput.value === 'other') {
            const otherVesselNameInput = document.getElementById('other_vessel_name');
            if (otherVesselNameInput) {
                formData['vessel_name'] = otherVesselNameInput.value;
                if (!formData['vessel_name']) {
                    isValid = false;
                    alert('Please fill in the "inspected_by" field before proceeding to the next form.');
                }
            }
        }


        if (isValid) {
            localStorage.setItem('dataForm1', JSON.stringify(formData));
            window.location.href = '/addActivityContainer';
        } else {
            // alert('Please fill in all fields before proceeding to the next form.');
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