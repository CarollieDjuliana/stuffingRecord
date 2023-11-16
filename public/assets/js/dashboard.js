import { getDatabase, ref, onValue, query, orderByChild } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-database.js";
import { firebaseApp } from './fireConfig.js';

const db = getDatabase(firebaseApp);

// Referensi ke "activity"
const activityRef = ref(db, "activity");
const sortedActivityQuery = query(activityRef, orderByChild("etd"));

// Menggunakan onValue untuk mendengarkan perubahan data
onValue(sortedActivityQuery, (snapshot) => {
  if (snapshot.exists()) {
    const activityData = snapshot.val();
    
    // Mengurutkan data berdasarkan tanggal
    const sortedData = sortDataByDate(activityData);

    // Inisialisasi string template untuk baris-baris tabel
    let tableHTML = '';
    // Inisialisasi variabel isFirstContainer
    let isFirstContainer = true;

    // Iterasi melalui data dan mengumpulkan baris-baris tabel
    for (const shipperKey in sortedData) {
      if (sortedData.hasOwnProperty(shipperKey)) {
        const shipper = sortedData[shipperKey];
        for (const noBookingKey in shipper) {
          if (shipper.hasOwnProperty(noBookingKey)) {
            const noBooking = shipper[noBookingKey];
            const lokasi = noBooking.location;
            const date = new Date(noBooking.etd);
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
                <td style="text-align: left;">${date.toLocaleDateString('id-ID')}</td>
                <td style="text-align: left;">${shipperKey}</td>
                <td style="text-align: left;">${noBookingKey}</td>
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

    // Mengurutkan data secara descending berdasarkan tanggal
    const sortedRows = Array.from(document.querySelectorAll('#data-table-body tr')).sort((rowA, rowB) => {
      const dateA = parseDate(rowA.querySelector('td:nth-child(1)').textContent);
      const dateB = parseDate(rowB.querySelector('td:nth-child(1)').textContent);
      return compareDates(dateB, dateA);
    });

    // Menambahkan baris-baris yang telah diurutkan ke dalam tabel
    addSortedRows(sortedRows);

    // Atur innerHTML tabel dengan semua baris data
    const tableBody = document.getElementById("data-table-body");
    tableBody.innerHTML = tableHTML;

    // Panggil fungsi handleSortByDate() untuk mengurutkan tabel secara default saat pertama kali load halaman
    handleSortByDate();

  } else {
    console.log("Data tidak ditemukan");
  }
}, (error) => {
  console.error("Error reading data: ", error);
});

// Fungsi untuk mengurutkan data berdasarkan tanggal terbaru
function sortDataByDate(activityData) {
  const sortedData = Object.keys(activityData)
    .sort((a, b) => new Date(activityData[b].etd) - new Date(activityData[a].etd))
    .reduce((obj, key) => {
      obj[key] = activityData[key];
      return obj;
    }, {});
  return sortedData;
}

// Misalkan Anda memiliki elemen input untuk pencarian
const searchInput = document.getElementById('search-focus');

// Tambahkan event listener ke input pencarian
searchInput.addEventListener('input', handleSearch);

// Fungsi untuk menangani pencarian
function handleSearch() {
  const searchTerm = searchInput.value.toLowerCase();

  // Seleksi semua baris data dalam tabel
  const rows = Array.from(document.querySelectorAll('#data-table-body tr'));

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

// Fungsi untuk menghapus semua baris dari tabel
function clearTable() {
  const tableBody = document.getElementById('data-table-body');
  tableBody.innerHTML = '';
}

// Fungsi untuk menambahkan ulang baris-baris yang telah diurutkan ke dalam tabel
function addSortedRows(sortedRows) {
  const tableBody = document.getElementById('data-table-body');
  sortedRows.forEach(row => {
    tableBody.appendChild(row);
  });
}

// Fungsi untuk mengurai tanggal dengan format "dd/mm/yyyy" menjadi objek Date
function parseDate(dateString) {
  const dateParts = dateString.split('/');
  if (dateParts.length === 3) {
    const day = parseInt(dateParts[0], 10);
    const month = parseInt(dateParts[1], 10);
    // Bulan dimulai dari 1 (Januari = 1)
    const year = parseInt(dateParts[2], 10);
    return new Date(year, month - 1, day); // Perhatikan pengurangan 1 pada bulan
  }
  return null;
}

// Fungsi untuk membandingkan dua tanggal
function compareDates(dateA, dateB) {
  if (dateA < dateB) {
    return -1;
  } else if (dateA > dateB) {
    return 1;
  } else {
    return 0;
  }
}


// Fungsi untuk mengurutkan data berdasarkan tanggal
function handleSortByDate() {
  // Seleksi semua baris data dalam tabel
  const rows = Array.from(document.querySelectorAll('#data-table-body tr'));

  // Sort rows berdasarkan tanggal
  rows.sort((rowA, rowB) => {
    const dateA = parseDate(rowA.querySelector('td:nth-child(1)').textContent);
    const dateB = parseDate(rowB.querySelector('td:nth-child(1)').textContent);

    return ascendingOrder ? compareDates(dateB, dateA) : compareDates(dateA, dateB);
  });

  // Ubah status urutan
  ascendingOrder = !ascendingOrder;

  // Hapus semua baris dari tabel
  clearTable();

  // Sisipkan ulang baris-baris yang telah diurutkan ke dalam tabel
  addSortedRows(rows);

  // Ganti ikon Font Awesome sesuai dengan status urutan
  if (ascendingOrder) {
    sortDateButton.innerHTML = '<i class="fas fa-sort-up" style="color: #000000;"></i>';
  } else {
    sortDateButton.innerHTML = '<i class="fas fa-sort-down" style="color: #000000;"></i>';
  }
}