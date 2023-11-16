<?= $this->extend('/layout/template'); ?>

<?= $this->section('content'); ?>

<body>
    <div class="container">
        <h5>Edit Data</h5>
        <div class="row">
            <div class="col-md-6">
                <form id="edit-form" class="mt-4">
                    <div class="form-group">
                        <label for="edited-shipper">Shipper</label>
                        <input type="text" class="form-control" id="edited-shipper" placeholder="Shipper">
                    </div>
                    <div class="form-group mt-2">
                        <label for="edited-no-booking">No Booking</label>
                        <input type="text" class="form-control" id="edited-no-booking" placeholder="No Booking">
                    </div>
                    <div class="form-group mt-2">
                        <label for="edited-term">Term</label>
                        <input type="text" class="form-control" id="edited-term" placeholder="Term">
                    </div>
                    <div class="form-group mt-2">
                        <label for="edited-commodity">Commodity</label>
                        <input type="text" class="form-control" id="edited-commodity" placeholder="Commodity">
                    </div>
                    <div class="form-group mt-2">
                        <label for="edited-quantity">Quantity</label>
                        <input type="text" class="form-control" id="edited-quantity" placeholder="Quantity">
                    </div>
                    <div class="form-group mt-2">
                        <label for="edited-grade">Grade</label>
                        <input type="text" class="form-control" id="edited-grade" placeholder="Grade">
                    </div>
                    <div class="form-group mt-2">
                        <label for="edited-shipping-line">Shipping Line</label>
                        <input type="text" class="form-control" id="edited-shipping-line" placeholder="Shipping Line">
                    </div>
                    <div class="form-group mt-2">
                        <label for="edited-vessel-name">Vessel Name</label>
                        <input type="text" class="form-control" id="edited-vessel-name" placeholder="Vessel Name">
                    </div>
                    <div class="form-group mt-2">
                        <label for="edited-voyage">Voyage</label>
                        <input type="text" class="form-control" id="edited-voyage" placeholder="Voyage">
                    </div>
                    <div class="form-group mt-2">
                        <label for="edited-port-of-loading">Port of Loading</label>
                        <input type="text" class="form-control" id="edited-port-of-loading" placeholder="Port of Loading">
                    </div>
                    <div class="form-group mt-2">
                        <label for="edited-destination">Destination</label>
                        <input type="text" class="form-control" id="edited-destination" placeholder="Destination">
                    </div>
                    <div class="form-group mt-2">
                        <label for="edited-etd">ETD</label>
                        <input type="date" class="form-control" id="edited-etd" placeholder="ETD">
                    </div>
                    <div class="form-group mt-2">
                        <label for="edited-stuffing-place">Stuffing Place</label>
                        <input type="text" class="form-control" id="edited-stuffing-place" placeholder="Stuffing Place">
                    </div>
                    <div class="form-group mt-2">
                        <label for="edited-stuffing-by">Stuffing By</label>
                        <input type="text" class="form-control" id="edited-stuffing-by" placeholder="Stuffing By">
                    </div>
                    <div class="form-group mt-2">
                        <label for="edited-location">Location</label>
                        <input type="text" class="form-control" id="edited-location" placeholder="Location">
                    </div>
                    <div class="form-group mt-2">
                        <label for="edited-weather">Weather</label>
                        <input type="text" class="form-control" id="edited-weather" placeholder="Weather">
                    </div>
                    <div class="form-group mt-2">
                        <label for="edited-inspected-by">Inspected By</label>
                        <input type="text" class="form-control" id="edited-inspected-by" placeholder="Inspected By">
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="mt-4">
                    <h5>Data Container</h5>
                    <div id="edited-container-data">

                    </div>
                </div>
            </div>
        </div>

        <button id="update-button" class="btn btn-primary mt-3 mb-3">UPDATE</button>
    </div>


    <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-database.js"></script>

    <script type="module">
        import {
            initializeApp
        } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-app.js";
        import {
            getDatabase,
            ref,
            update,
            get
        } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-database.js";

        // Konfigurasi Firebase SDK
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

        const app = initializeApp(firebaseConfig);
        const db = getDatabase(app);

        const shipper = new URLSearchParams(window.location.search).get("shipper");
        const no_booking = new URLSearchParams(window.location.search).get("no_booking");

        const dataPath = "activity/" + shipper + "/" + no_booking;
        const dataRef = ref(db, dataPath);

        // Membaca data dari Firebase
        function loadData() {
            get(dataRef).then((snapshot) => {
                if (snapshot.exists()) {
                    const data = snapshot.val();

                    // Menampilkan data ke dalam formulir
                    document.getElementById("edited-no-booking").value = data.no_booking;
                    document.getElementById("edited-shipper").value = data.shipper;
                    document.getElementById("edited-term").value = data.term;
                    document.getElementById("edited-commodity").value = data.commodity;
                    document.getElementById("edited-quantity").value = data.quantity;
                    document.getElementById("edited-grade").value = data.grade;
                    document.getElementById("edited-shipping-line").value = data.shipping_line;
                    document.getElementById("edited-vessel-name").value = data.vessel_name;
                    document.getElementById("edited-voyage").value = data.voyage;
                    document.getElementById("edited-port-of-loading").value = data.port_of_loading;
                    document.getElementById("edited-destination").value = data.destination;
                    document.getElementById("edited-etd").value = data.etd;
                    document.getElementById("edited-stuffing-place").value = data.stuffing_place;
                    document.getElementById("edited-stuffing-by").value = data.stuffing_by;
                    document.getElementById("edited-location").value = data.location;
                    document.getElementById("edited-weather").value = data.weather;
                    document.getElementById("edited-inspected-by").value = data.inspected_by;

                    const containerData = data.container_data;

                    // Menampilkan data container ke dalam formulir
                    const editedContainerData = document.getElementById("edited-container-data");
                    editedContainerData.innerHTML = "";

                    for (const containerNumber in containerData) {
                        if (containerData.hasOwnProperty(containerNumber)) {
                            const container = containerData[containerNumber];

                            const containerDiv = document.createElement("div");
                            containerDiv.innerHTML = `
                            <div class="container mt-3">
                                <h6>Container ${containerNumber}</h6>
                                    <div class="form-group mt-2">
                                        <label for="edited-container-number-${containerNumber}">Container Number</label>
                                        <input type="text" class="form-control" name="edited-container-number" id="edited-container-number-${containerNumber}" value="${containerNumber}" placeholder="Container Number">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="edited-seal-number-${containerNumber}">Seal Number</label>
                                        <input type="text" class="form-control" name="edited-seal-number" id="edited-seal-number-${containerNumber}" value="${container.seal_number}" placeholder="Seal Number">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="edited-stuffing-date-${containerNumber}">Stuffing Date</label>
                                        <input type="date" class="form-control" name="edited-stuffing-date" id="edited-stuffing-date-${containerNumber}" value="${container.stuffing_date}" placeholder="Stuffing Date">
                                    </div>
                            </div>
                            `;


                            editedContainerData.appendChild(containerDiv);
                        }
                    }
                }
            });
        }

        loadData(); // Memuat data saat halaman dimuat

        // Menambahkan event listener untuk tombol Update
        document.getElementById("update-button").addEventListener("click", () => {
            // Mengambil data dari formulir yang telah diedit
            const editedData = {
                no_booking: document.getElementById("edited-no-booking").value,
                shipper: document.getElementById("edited-shipper").value,
                term: document.getElementById("edited-term").value,
                commodity: document.getElementById("edited-commodity").value,
                quantity: document.getElementById("edited-quantity").value,
                grade: document.getElementById("edited-grade").value,
                shipping_line: document.getElementById("edited-shipping-line").value,
                vessel_name: document.getElementById("edited-vessel-name").value,
                voyage: document.getElementById("edited-voyage").value,
                port_of_loading: document.getElementById("edited-port-of-loading").value,
                destination: document.getElementById("edited-destination").value,
                etd: document.getElementById("edited-etd").value,
                stuffing_place: document.getElementById("edited-stuffing-place").value,
                stuffing_by: document.getElementById("edited-stuffing-by").value,
                location: document.getElementById("edited-location").value,
                weather: document.getElementById("edited-weather").value,
                inspected_by: document.getElementById("edited-inspected-by").value,
                container_data: {},
            };

            // Mengambil data container yang telah diedit
            const editedContainers = document.getElementsByName("edited-container-number");
            const editedContainerData = {};

            for (let i = 0; i < editedContainers.length; i++) {
                // const containerNumber = editedContainers[i].value;
                const containerNumber = document.getElementsByName("edited-container-number")[i].value;
                const sealNumber = document.getElementsByName("edited-seal-number")[i].value;
                const stuffingDate = document.getElementsByName("edited-stuffing-date")[i].value;

                editedContainerData[containerNumber] = {
                    container_number: containerNumber,
                    seal_number: sealNumber,
                    stuffing_date: stuffingDate,
                };
            }

            // Memasukkan data container yang diedit ke dalam objek data
            editedData.container_data = editedContainerData;

            // Memperbarui data di Firebase
            update(dataRef, editedData)
                .then(() => {
                    alert("Data berhasil diperbarui!");
                    window.location.href = '/showData?shipper=' + shipper + '&no_booking=' + no_booking;

                })
                .catch((error) => {
                    console.error("Error updating data: ", error);
                });
        });
    </script>
</body>

<?= $this->endSection(); ?>