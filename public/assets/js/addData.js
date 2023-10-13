import { initializeApp } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-app.js";
import { getDatabase, ref, update, onValue, get } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-database.js";
import { getStorage, listAll, getDownloadURL, ref as storageRef } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-storage.js";
// import { jsPDF } from "https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js";



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
const db = getDatabase(app);
const storage = getStorage(app);

const shipper = new URLSearchParams(window.location.search).get("shipper");
const no_booking = new URLSearchParams(window.location.search).get("no_booking");
const container = new URLSearchParams(window.location.search).get("container");
const dataPath = "activity/" + shipper + "/" + no_booking+'/'+'container_data' +'/'+ container;
const dataRef = ref(db, dataPath);




document.addEventListener("DOMContentLoaded", function () {
   
      // Membaca data
    get(dataRef)
    .then((snapshot) => {
      console.log("Data snapshot:", snapshot.val());
        if (snapshot.exists()) {
            const data = snapshot.val();
            console.log("Data exists:", data);
            
                // Menggunakan nilai-nilai variabel untuk menyusun HTML
                document.getElementById("container_number").textContent = data.container_number;
                
                document.getElementById("seal_number").textContent = data.seal_number;
                document.getElementById("stuffing_date").textContent = data.stuffing_date;
    
        } else {
            console.log("Data tidak ditemukan");
        }
    })
    .catch((error) => {
        console.error("Error reading data: ", error);
    });





    // Meng-handle klik tombol "Close This Activity"
    document.getElementById("closeActivityButton").addEventListener("click", function () {
      // Menampilkan modal konfirmasi
      const confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
      confirmationModal.show();
    });
  
    // Meng-handle klik tombol "OK" di dalam modal konfirmasi
    document.getElementById("confirmCloseButton").addEventListener("click", function () {
      // Mendapatkan referensi ke Firebase Realtime Database
      const db = getDatabase();
  
      // Mengubah status ke "COMPLETE"
      update(ref(db, "activity/" + shipper + "/" + no_booking), { status: "COMPLETE" })
        .then(() => {
          alert("Activity status changed to COMPLETE");
          // Menutup modal setelah konfirmasi
        const confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
        confirmationModal.hide();

        // Kembali ke halaman dashboard
        // window.location.href = "/dashboard";
        })
        .catch((error) => {
          console.error("Error updating status: ", error);
          // Menutup modal setelah konfirmasi
          const confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
          confirmationModal.hide();
        });
    });


    const activityRef = ref(db, "activity");

  onValue(activityRef, (snapshot) => {
    if (snapshot.exists()) {
      const activityData = snapshot.val();

      // Inisialisasi string template untuk baris-baris tabel
      let tableHTML = '';


      // Dapatkan `no_booking` dari URL saat ini
      const currentNoBooking = new URLSearchParams(window.location.search).get("no_booking");

      // Iterasi melalui data dan mengumpulkan baris-baris tabel
      for (const shipperKey in activityData) {
        if (activityData.hasOwnProperty(shipperKey)) {
          const shipper = activityData[shipperKey];
          for (const noBookingKey in shipper) {
            if (shipper.hasOwnProperty(noBookingKey)) {
              const noBooking = shipper[noBookingKey];
              const lokasi = noBooking.location;
              const date = noBooking.etd;
              const status = noBooking.status;

              if (noBookingKey === currentNoBooking) {
                // Dapatkan `container` dari URL saat ini
                const currentContainer = new URLSearchParams(window.location.search).get("container");
                
                // Tambahkan link untuk data container dengan kelas `active-button` jika `containerKey` sama dengan `currentContainer`
                const containerKeys = Object.keys(noBooking.container_data);
                containerKeys.forEach((containerKey, index) => {
                  const containerData = noBooking.container_data[containerKey];
                  const container_num = containerData.container_number;
                  tableHTML += `
                    <li><a href="addData?shipper=${shipperKey}&no_booking=${noBookingKey}&container=${containerKey}" class="btn btn-light ${containerKey === currentContainer ? 'active-button' : ''}">Container ${container_num}</a></li>
                  `;
                });
              }
            }
          }
        }
      }

        const tableBody = document.getElementById("data-table-container");
        tableBody.innerHTML = `
            
              ${tableHTML} 

          `;
      } else {
            console.log("Data tidak ditemukan");
        }
    }, (error) => {
        console.error("Error reading data: ", error);
        });


});

