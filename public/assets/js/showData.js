import {
    initializeApp
} from "https://www.gstatic.com/firebasejs/9.10.0/firebase-app.js";
import {
    getDatabase,
    ref,
    get
} from "https://www.gstatic.com/firebasejs/9.10.0/firebase-database.js";

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

// Inisialisasi Firebase 
const app = initializeApp(firebaseConfig);
const db = getDatabase();

// document.getElementById("read").onclick = function() {
    // Mendefinisikan path untuk data yang akan dibaca
    // window.location.href = "showData.php";
    const shipper = new URLSearchParams(window.location.search).get("shipper");
    const no_booking = new URLSearchParams(window.location.search).get("no_booking");
    const dataPath = "activity/" + shipper + "/" + no_booking;

    const dataRef = ref(db, dataPath);

    
    // Membaca data
    get(dataRef)
        .then((snapshot) => {
            if (snapshot.exists()) {
                const data = snapshot.val();

                // Menampilkan data dalam tabel Bootstrap
                const tableBody = document.getElementById("data-table-body");
                tableBody.innerHTML = `
                    <tr>
                        <td>${data.term}</td>
                        <td>${data.comodity}</td>
                        <td>${data.quantity}</td>
                        <td>${data.grade}</td>
                        <td>${data.shipping_line}</td>
                        <td>${data.vassel_name}</td>
                        <td>${data.voyage}</td>
                        <td>${data.port_of_loading}</td>
                        <td>${data.destination}</td>
                        <td>${data.etd}</td>
                        <td>${data.stuffing_place}</td>
                        <td>${data.stuffing_by}</td>
                        <td>${data.location}</td>
                        <td>${data.weather}</td>
                    </tr>
                `;
            } else {
                console.log("Data tidak ditemukan");
            }
        })
        .catch((error) => {
            console.error("Error reading data: ", error);
        });
// };
