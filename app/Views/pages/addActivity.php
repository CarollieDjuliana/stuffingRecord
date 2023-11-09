<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<body>
    <div class="container mt-3">
        <h5 class="text-center">ADD ACTIVITY</h5>
        <hr>
        <form id="form1" action="/test2" method="post">
            <div class="row">
                <div class="col-md-6">
                    <label for="shipper" class="form-label mt-3">SHIPPER</label>
                    <input type="text" class="form-control" id="shipper" name="shipper" required>
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
                    <label for="comodity" class="form-label mt-3">COMODITY</label>
                    <input type="text" class="form-control" id="comodity" name="comodity" value="RUBBER" required>
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
                    <input type="text" class="form-control" id="shipping_line" name="shipping_line" required>
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
                    <label for="stuffing_place" class="form-label mt-3">STUFFING PLACE</label>
                    <input type="text" class="form-control" id="stuffing_place" name="stuffing_place" value="CONTAINER YARD" required>
                </div>
                <div class="col-md-6">
                    <label for="stuffing_by" class="form-label mt-3">STUFFING BY</label>
                    <input type="text" class="form-control" id="stuffing_by" name="stuffing_by" value="PT. PBM MUSI KALIJAYA" required>
                </div>
                <div class="col-md-6">
                    <label for="location" class="form-label mt-3">LOCATION</label>
                    <input type="text" class="form-control" id="location" name="location" value="UTPK" required>
                </div>

                <div class="col-md-6" id="otherLocationContainer" style="display: none;">
                    <label for="other_location" class="form-label mt-3">Other Location</label>
                    <input type="text" class="form-control" id="other_location" name="other_location">
                </div>
                <div class="col-md-6">
                    <label for="weather" class="form-label mt-3">WEATHER</label>
                    <select id="weather" class="form-select" name="weather" required>
                        <option selected>Good</option>
                        <option>Moderate</option>
                        <option>Bad</option>
                    </select>
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
            'shipper', 'no_booking', 'quantity', 'date', 'term', 'comodity', 'grade',
            'shipping_line', 'vessel_name', 'voyage', 'port_of_loading', 'destination',
            'etd', 'stuffing_place', 'stuffing_by', 'location', 'weather'
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