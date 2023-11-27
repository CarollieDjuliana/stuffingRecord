import { initializeApp } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-app.js";
import { getDatabase, ref, get } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-database.js";
import { getStorage, listAll, getDownloadURL, ref as storageRef } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-storage.js";

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
const storage = getStorage(app);

const shipper = new URLSearchParams(window.location.search).get("shipper");
const no_booking = new URLSearchParams(window.location.search).get("no_booking");
const dataPath = "activity/" + shipper + "/" + no_booking;
const dataRef = ref(db, dataPath);

// Membaca data container_data
get(dataRef)
    .then((snapshot) => {
        if (snapshot.exists()) {
            const data = snapshot.val();

            // Menggunakan nilai-nilai variabel untuk menyusun HTML
            document.getElementById("no_booking").textContent = data.no_booking;
            // document.getElementById("shipper").textContent = data.shipper;
            // document.getElementById("term").textContent = data.term;
            // document.getElementById("comodity").textContent = data.comodity;
            // document.getElementById("quantity").textContent = data.quantity;
            // document.getElementById("grade").textContent = data.grade;
            // document.getElementById("shipping_line").textContent = data.shipping_line;
            // document.getElementById("vessel_name").textContent = data.vessel_name;
            // document.getElementById("voyage").textContent = data.voyage;
            // document.getElementById("port_of_loading").textContent = data.port_of_loading;
            // document.getElementById("destination").textContent = data.destination;
            // document.getElementById("etd").textContent = data.etd;
            // document.getElementById("stuffing_place").textContent = data.stuffing_place;
            // document.getElementById("stuffing_by").textContent = data.stuffing_by;
            // document.getElementById("location").textContent = data.location;
            // document.getElementById("weather").textContent = data.weather;

}
});
    // Import library jsPDF
    <script src="path/to/jspdf.umd.min.js"></script>

    // Membuat instance dari jsPDF
    const doc = new jsPDF();

    // Mengambil elemen div yang ingin dikonversi
    const content = document.getElementById('nama-div');

    // Mengambil lebar konten pada div
    const width = content.offsetWidth;

    // Mengkonversi konten menjadi PDF dengan lebar yang sesuai
    doc.html(content, {
    callback: function (doc) {
    doc.save('file.pdf');
    },
    x: 0,
    y: 0,
    html2canvas: {
    width: width
    }
    });
    
