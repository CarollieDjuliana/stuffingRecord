<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD App</title>
</head>

<body>
    <h1>Data Detail</h1>
    <div id="data-container">
        <p>No Booking: <span id="no_booking"></span></p>
        <p>Shipper: <span id="shipper"></span></p>
        <p>Term: <span id="term"></span></p>
        <p>Comodity: <span id="comodity"></span></p>
        <p>Quantity: <span id="quantity"></span></p>
        <p>Grade: <span id="grade"></span></p>
        <p>Shipping Line: <span id="shipping_line"></span></p>
        <p>Vessel Name: <span id="vessel_name"></span></p>
        <p>Voyage: <span id="voyage"></span></p>
        <p>Port of Loading: <span id="port_of_loading"></span></p>
        <p>Destination: <span id="destination"></span></p>
        <p>ETD: <span id="etd"></span></p>
        <p>Stuffing Place: <span id="stuffing_place"></span></p>
        <p>Stuffing By: <span id="stuffing_by"></span></p>
        <p>Location: <span id="location"></span></p>
        <p>Weather: <span id="weather"></span></p>

        <div id="container-data">
            <!-- Kontainer untuk data container -->
        </div>
    </div>
    <button id="edit-button">Edit Data</button>
    <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-database.js"></script>


    <script type="module">
        import {
            initializeApp
        } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-app.js";
        import {
            getDatabase,
            ref,
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


        const shipper = "test7";
        const no_booking = "test7";

        const dataPath = "activity/" + shipper + "/" + no_booking;
        const dataRef = ref(db, dataPath);

        // Membaca data dari Firebase
        function loadData() {
            get(dataRef).then((snapshot) => {
                if (snapshot.exists()) {
                    const data = snapshot.val();

                    // Mengisi data ke elemen HTML
                    document.getElementById("no_booking").textContent = data.no_booking;
                    document.getElementById("shipper").textContent = data.shipper;
                    document.getElementById("term").textContent = data.term;
                    document.getElementById("comodity").textContent = data.comodity;
                    document.getElementById("quantity").textContent = data.quantity;
                    document.getElementById("grade").textContent = data.grade;
                    document.getElementById("shipping_line").textContent = data.shipping_line;
                    document.getElementById("vessel_name").textContent = data.vessel_name;
                    document.getElementById("voyage").textContent = data.voyage;
                    document.getElementById("port_of_loading").textContent = data.port_of_loading;
                    document.getElementById("destination").textContent = data.destination;
                    document.getElementById("etd").textContent = data.etd;
                    document.getElementById("stuffing_place").textContent = data.stuffing_place;
                    document.getElementById("stuffing_by").textContent = data.stuffing_by;
                    document.getElementById("location").textContent = data.location;
                    document.getElementById("weather").textContent = data.weather;

                    const containerData = data.container_data;

                    // Menggunakan containerData untuk menyusun HTML untuk data container
                    const containerDataHtml = Object.entries(containerData).map(([containerNumber, container]) => {
                        return `
                            <p>Container Number: ${containerNumber}</p>
                            <p>Seal Number: ${container.seal_number}</p>
                            <p>Stuffing Date: ${container.stuffing_date}</p>
                            <!-- Tambahkan elemen HTML lainnya sesuai dengan data container -->
                        `;
                    }).join('');

                    // Memasukkan data container ke dalam elemen HTML
                    document.getElementById("container-data").innerHTML = containerDataHtml;
                }
            });
        }

        loadData(); // Memuat data saat halaman dimuat

        // Menambahkan event listener untuk tombol Edit
        document.getElementById("edit-button").addEventListener("click", () => {
            // Redirect ke halaman edit data
            window.location.href = "test2?shipper=" + shipper + "&no_booking=" + no_booking;
        });
    </script>
</body>

</html>