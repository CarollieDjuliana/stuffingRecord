// Import yang diperlukan dari Firebase SDK versi 9
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-app.js";
import { getDatabase, ref, set } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-database.js";

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

document.addEventListener("DOMContentLoaded", function () {
  var shipperV, no_bookingV, termV, comodityV, quantityV, gradeV, shipping_lineV, vassel_nameV, voyageV, port_of_loadingV, destinationV, etdV, stuffing_placeV, stuffing_byV, locationV, weatherV, stuffing_byV;

  function readForm() {
    shipperV = document.getElementById("shipper").value;
    no_bookingV = document.getElementById("no_booking").value;
    termV = document.getElementById("term").value;
    comodityV = document.getElementById("comodity").value;
    quantityV = document.getElementById("quantity").value;
    gradeV = document.getElementById("grade").value;
    shipping_lineV = document.getElementById("shipping_line").value;
    vassel_nameV = document.getElementById("vessel_name").value;
    voyageV = document.getElementById("voyage").value;
    port_of_loadingV = document.getElementById("port_of_loading").value;
    destinationV = document.getElementById("destination").value;
    etdV = document.getElementById("etd").value;
    stuffing_placeV = document.getElementById("stuffing_place").value;
    stuffing_byV = document.getElementById("stuffing_by").value;
    locationV = document.getElementById("location").value;
    weatherV = document.getElementById("weather").value;

    console.log(shipperV, no_bookingV, termV, comodityV, quantityV, gradeV, shipping_lineV, vassel_nameV, voyageV, port_of_loadingV, destinationV, etdV, stuffing_placeV, stuffing_byV, locationV, weatherV);
  }

  // insert
  document.getElementById("submit").onclick = function () {
    readForm();

    // Mendapatkan referensi ke Firebase Realtime Database
    const db = getDatabase();

    // Mendefinisikan path untuk data
    const dataPath = "activity/" + shipperV + "/" + no_bookingV;
    const dataRef = ref(db, dataPath);

    // Data yang akan disimpan di database
    const dataToSave = {
      shipper: shipperV,
      no_booking: no_bookingV,
      term: termV,
      comodity: comodityV,
      quantity: quantityV,
      grade: gradeV,
      shipping_line: shipping_lineV,
      vassel_name: vassel_nameV,
      voyage: voyageV,
      port_of_loading: port_of_loadingV,
      destination: destinationV,
      etd: etdV,
      stuffing_place: stuffing_placeV,
      stuffing_by: stuffing_byV,
      location: locationV,
      weather: weatherV,
    };

    // Menyimpan data ke Firebase Realtime Database
    set(dataRef, dataToSave)
      .then(() => {
        alert("Data Inserted");
        document.getElementById("shipper").value = "";
        document.getElementById("no_booking").value = "";
        document.getElementById("term").value = "";
        document.getElementById("comodity").value = "";
        document.getElementById("quantity").value = "";
        document.getElementById("grade").value = "";
        document.getElementById("shipping_line").value = "";
        document.getElementById("vessel_name").value = "";
        document.getElementById("voyage").value = "";
        document.getElementById("port_of_loading").value = "";
        document.getElementById("destination").value = "";
        document.getElementById("etd").value = "";
        document.getElementById("stuffing_place").value = "";
        document.getElementById("stuffing_by").value = "";
        document.getElementById("location").value = "";
        document.getElementById("weather").value = "";

        // Mengarahkan kembali ke halaman /dashboard
        window.location.href = "/dashboard";
      })
      .catch((error) => {
        console.error("Error saving data: ", error);
      });
  };
});
