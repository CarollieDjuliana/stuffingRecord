import { getDatabase, ref, set } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-database.js";
import { firebaseApp } from './fireConfig.js';

document.addEventListener("DOMContentLoaded", function () {
  var shipperV, no_bookingV, termV, commodityV, quantityV, gradeV, shipping_lineV, vassel_nameV, voyageV, port_of_loadingV, destinationV, etdV, stuffing_placeV, stuffing_byV, locationV, weatherV;

  // Simpan data container ke dalam array
  var containerData = [];

  function readForm() {
    shipperV = document.getElementById("shipper").value;
    no_bookingV = document.getElementById("no_booking").value;
    termV = document.getElementById("term").value;
    commodityV = document.getElementById("commodity").value;
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
    inspected_byV = document.getElementById("inspected_by").value;

    
    // Simpan data container ke dalam array
    for (var i = 1; i <= numInputs; i++) {
      var containerNum = document.getElementById(`container_num_${i}`).value;
      var sealNum = document.getElementById(`seal_number_${i}`).value;
      var stuffingDate = document.getElementById(`stuffing_date_${i}`).value;

      // Simpan data container ke dalam array
      containerData.push({
        containerNum: containerNum,
        sealNum: sealNum,
        stuffingDate: stuffingDate
      });
    }

    console.log(shipperV, no_bookingV, termV, commodityV, quantityV, gradeV, shipping_lineV, vassel_nameV, voyageV, port_of_loadingV, destinationV, etdV, stuffing_placeV, stuffing_byV, locationV, weatherV, inspected_byV);
    console.log(containerData);
  }

// insert
document.getElementById("submit").onclick = function () {
  readForm();

  // Mendapatkan referensi ke Firebase Realtime Database
  const db = getDatabase(firebaseApp);

//pengkondisian node database
  var noBookingWithoutSymbol = "";
// Periksa apakah nomor booking mengandung simbol '/'
if (no_bookingV.includes('/')) {
  // Jika iya, ambil bagian sebelum simbol '/'
  const parts = no_bookingV.split('/');
  noBookingWithoutSymbol = parts[0];
  console.log("Nomor Booking tanpa simbol '/':", noBookingWithoutSymbol);
} else {
  // Jika tidak, gunakan nomor booking asli
  console.log("Nomor Booking asli:", no_bookingV);
}

const sanitizedShipperV = shipperV.replace(/[.\s#\$[\]]/g, ' ');
sanitizedShipperV = encodeURIComponent(sanitizedShipperV);
// const sanitizedShipperV = encodeURIComponent(shipperV);


  // Mendefinisikan path untuk data
  const dataPath = "activity/" + sanitizedShipperV + "/" + noBookingWithoutSymbol;
  const dataRef = ref(db, dataPath);

  // Data yang akan disimpan di database
  const dataToSave = {
    shipper: shipperV,
    no_booking: no_bookingV,
    term: termV,
    commodity: commodityV,
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
    inspected_by: inspected_byV,
    status : "ON PROGRESS"
  };

  // Menyimpan data ke Firebase Realtime Database
  set(dataRef, dataToSave)
    .then(() => {
      // alert("Data Inserted");
      document.getElementById("shipper").value = "";
      document.getElementById("no_booking").value = "";
      document.getElementById("term").value = "";
      document.getElementById("commodity").value = "";
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
      document.getElementById("inspected_by").value = "";

      // Mengarahkan kembali ke halaman /dashboard
      window.location.href = "/dashboard";

      // Pengiriman data container ke Firebase
      for (var i = 0; i < containerData.length; i++) {
        var containerNumValue = containerData[i].containerNum;
        var sealNumValue = containerData[i].sealNum;
        var stuffingDateValue = containerData[i].stuffingDate;

        // Mendefinisikan path untuk data form container
        const containerDataPath = dataPath + "/container_data/" + containerNumValue;

        // Data yang akan disimpan di database untuk form container
        const containerDataToSave = {
          container_number: containerNumValue,
          seal_number: sealNumValue,
          stuffing_date: stuffingDateValue,
        };

        // Menyimpan data form container ke Firebase Realtime Database
        set(ref(db, containerDataPath), containerDataToSave)
          .then(() => {
            // alert("Data Form Container Inserted");
          })
          .catch((error) => {
            console.error("Error saving data: ", error);
          });
      }
    })
    .catch((error) => {
      console.error("Error saving data: ", error);
    });
};


  function generateInput(index) {
    var formContainer = document.getElementById("formContainer");

    var keterangan = document.createElement("h5");
    keterangan.innerHTML = "Container : " + index;
    keterangan.setAttribute("class", "mt-5");
    formContainer.appendChild(keterangan);

    // container number
    var labelContainerNum = document.createElement("label");
    labelContainerNum.innerHTML = "Container Number";
    labelContainerNum.setAttribute("for", `container_num_${index}`);

    var inputContainerNum = document.createElement("input");
    inputContainerNum.setAttribute("type", "text");
    inputContainerNum.setAttribute("name", `container_num_${index}`);
    inputContainerNum.setAttribute("id", `container_num_${index}`);
    inputContainerNum.setAttribute("class", "form-control");
    inputContainerNum.setAttribute("required", "required");

    var br1 = document.createElement("br");

    // seal number
    var labelSealNum = document.createElement("label");
    labelSealNum.innerHTML = "Seal Number";
    labelSealNum.setAttribute("for", `seal_number_${index}`);

    var inputSealNum = document.createElement("input");
    inputSealNum.setAttribute("type", "text");
    inputSealNum.setAttribute("name", `seal_number_${index}`);
    inputSealNum.setAttribute("id", `seal_number_${index}`);
    inputSealNum.setAttribute("class", "form-control");
    inputSealNum.setAttribute("required", "required");

    var br2 = document.createElement("br");

    // Stuffing date
    var labelStuffingDate = document.createElement("label");
    labelStuffingDate.innerHTML = "Stuffing Date";
    labelStuffingDate.setAttribute("for", `stuffing_date_${index}`);

    var inputStuffingDate = document.createElement("input");
    inputStuffingDate.setAttribute("type", "date");
    inputStuffingDate.setAttribute("name", `stuffing_date_${index}`);
    inputStuffingDate.setAttribute("id", `stuffing_date_${index}`);
    inputStuffingDate.setAttribute("class", "form-control");
    inputStuffingDate.setAttribute("required", "required");

    var br3 = document.createElement("br");

    formContainer.appendChild(labelContainerNum);
    formContainer.appendChild(inputContainerNum);
    formContainer.appendChild(br1);
    formContainer.appendChild(labelSealNum);
    formContainer.appendChild(inputSealNum);
    formContainer.appendChild(br2);
    formContainer.appendChild(labelStuffingDate);
    formContainer.appendChild(inputStuffingDate);
    formContainer.appendChild(br3);
  }

  var numInputs = 1; // Set jumlah container awal

  document.getElementById("generateForm").addEventListener("click", function () {
    numInputs = parseInt(document.getElementById("numInputs").value);
    var formContainer = document.getElementById("formContainer");
    formContainer.innerHTML = "";
  
    for (var i = 1; i <= numInputs; i++) {
      generateInput(i);
    }
    // Perbarui variabel numInputs setelah menghasilkan input container
    numInputs = parseInt(document.getElementById("numInputs").value);
  });
  

  document.getElementById("stuff_date").addEventListener("click", function () {
    var selectedDate = document.getElementById("tanggal").value;
    alert("Tanggal yang dipilih: " + selectedDate);
  });
});
