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

// Ambil data dari Firebase
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
         <table class="table">
         <tbody>
             <tr>
                 <td>${data.date}</td>
                 <td>${data.shipper}</td>
                 <td>${data.no_booking}</td>
                 <td>${data.location}</td>
                 <td>CLOSED</td>
                 <td><button type="button" class="btn btn-primary">Primary</button></td>
                 <td><a href="showData?shipper=3&no_booking=3" class="btn btn-warning">Read</a></td>
             </tr>
         `;
     } else {
         console.log("Data tidak ditemukan");
     }
 })
 .catch((error) => {
     console.error("Error reading data: ", error);
 });

