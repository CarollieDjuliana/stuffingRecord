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

    // Inisialisasi variabel isFirstContainer
let isFirstContainer = true;

  // Iterasi melalui data dan mengumpulkan baris-baris tabel
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

        // Ambil kunci pertama dari container_data (jika ada)
        const containerKeys = Object.keys(noBooking.container_data);
        if (containerKeys.length > 0) {
          const containerKey = containerKeys[0];
          const containerData = noBooking.container_data[containerKey];
          const container_num = containerData.container_number;

          // Tambahkan tautan "Edit Container 1" ke dalam tabel
          tableHTML += `
            <tr>
              <td>${date}</td>
              <td>${shipperKey}</td>
              <td>${noBookingKey}</td>
              <td>${lokasi}</td>
              <td>${status}</td>
              <td><a href="addData?shipper=${shipperKey}&no_booking=${noBookingKey}&container=${containerKey}" class="btn btn-primary">Edit</a></td>
              <td><a href="showData?shipper=${shipperKey}&no_booking=${noBookingKey}" class="btn btn-success">Show</a></td>
            </tr>
          `;
        }
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

// Ambil semua tombol "Edit" pada setiap baris tabel
const editButtons = document.querySelectorAll('.edit-activity');

// Tambahkan event listener pada setiap tombol "Edit"
editButtons.forEach(button => {
    button.addEventListener('click', function() {
        // Ambil data-activity-id dari tombol yang diklik
        const activityId = button.getAttribute('data-activity-id');
        // Tambahkan pernyataan console.log untuk memeriksa nilai activityId
        console.log('Clicked Edit Button with activityId:', activityId);
        // Navigasi ke halaman "addData.php" dengan mengirim data-activity-id
        window.location.href = '/addData.php?activityId=' + encodeURIComponent(activityId);
    });
});

// Misalkan Anda memiliki elemen input untuk pencarian
const searchInput = document.getElementById('search-focus');

// Tambahkan event listener ke input pencarian
searchInput.addEventListener('input', handleSearch);

// Fungsi untuk menangani pencarian
function handleSearch() {
  const searchTerm = searchInput.value.toLowerCase();

  // Seleksi semua baris data dalam tabel
  const rows = document.querySelectorAll('#data-table-body tr');

  // Iterasi melalui baris data dan sembunyikan yang tidak sesuai dengan pencarian
  rows.forEach(row => {
    const dateCell = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
    const noBookingCell = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
    const shipperCell = row.querySelector('td:nth-child(2)').textContent.toLowerCase();

    // Periksa apakah baris data cocok dengan pencarian
    const dateMatch = dateCell.includes(searchTerm);
    const noBookingMatch = noBookingCell.includes(searchTerm);
    const shipperMatch = shipperCell.includes(searchTerm);

    // Tampilkan atau sembunyikan baris sesuai dengan pencarian
    if (dateMatch || noBookingMatch || shipperMatch) {
      row.style.display = ''; // Tampilkan baris
    } else {
      row.style.display = 'none'; // Sembunyikan baris
    }
  });
}

// Misalkan Anda memiliki tombol sort dengan ikon Font Awesome.
const sortDateButton = document.getElementById('sort-date-button');
let ascendingOrder = true; // Status urutan awal adalah naik (ascending).

// Tambahkan event listener untuk tombol sort
sortDateButton.addEventListener('click', handleSortByDate);

// Fungsi untuk mengurutkan data berdasarkan tanggal
function handleSortByDate() {
  // Seleksi semua baris data dalam tabel
  const rows = Array.from(document.querySelectorAll('#data-table-body tr'));

  // Sort rows berdasarkan tanggal
  rows.sort((rowA, rowB) => {
    const dateA = new Date(rowA.querySelector('td:nth-child(1)').textContent);
    const dateB = new Date(rowB.querySelector('td:nth-child(1)').textContent);

    return ascendingOrder ? dateA - dateB : dateB - dateA;
  });

  // Ubah status urutan
  ascendingOrder = !ascendingOrder;

  // Sisipkan ulang baris-baris yang telah diurutkan ke dalam tabel
  const tableBody = document.getElementById('data-table-body');
  tableBody.innerHTML = ''; // Kosongkan isi tabel

  rows.forEach(row => {
    tableBody.appendChild(row);
  });

  // Ganti ikon Font Awesome sesuai dengan status urutan
  if (ascendingOrder) {
    sortDateButton.innerHTML = '<i class="fas fa-sort-up" style="color: #000000;"></i>';
  } else {
    sortDateButton.innerHTML = '<i class="fas fa-sort-down" style="color: #000000;"></i>';
  }
}

