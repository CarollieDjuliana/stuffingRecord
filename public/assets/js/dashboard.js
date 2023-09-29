// Import yang diperlukan dari Firebase SDK versi 9
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-app.js";
import { getDatabase, ref, onValue, get } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-database.js";

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
const app = initializeApp(firebaseConfig);
const db = getDatabase();

// Referensi ke "activity"
const activityRef = ref(db, "activity");

// Menggunakan onValue untuk mendengarkan perubahan data
onValue(activityRef, (snapshot) => {
  if (snapshot.exists()) {
    const activityData = snapshot.val();

    // Inisialisasi string template untuk baris-baris tabel
    let tableHTML = '';

    // Iterasi melalui data dan mengumpulkan baris-baris tabel
    for (const shipperKey in activityData) {
      if (activityData.hasOwnProperty(shipperKey)) {
        const shipper = activityData[shipperKey];
        for (const noBookingKey in shipper) {
          if (shipper.hasOwnProperty(noBookingKey)) {
            const noBooking = shipper[noBookingKey];
            const lokasi = noBooking.location;
            const date = noBooking.etd;

            // Tambahkan baris data ke string template
            tableHTML += `
              <tr>
                <td>${date}</td>
                <td>${shipperKey}</td>
                <td>${noBookingKey}</td>
                <td>${lokasi}</td>
                <td>CLOSED</td>
                <td><button type="button" class="btn btn-primary">Edit</button></td>
                <td><a href="showData?shipper=3&no_booking=3" class="btn btn-warning">Read</a></td>
              </tr>
            `;
          }
        }
      }
    }

    // Atur innerHTML tabel dengan semua baris data
    const tableBody = document.getElementById("data-table-body");
    tableBody.innerHTML = `
        
          ${tableHTML}
        

    `;
  } else {
    console.log("Data tidak ditemukan");
  }
}, (error) => {
  console.error("Error reading data: ", error);
});