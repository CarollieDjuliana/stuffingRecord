import { getDatabase, ref, get } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-database.js";
import { getStorage, listAll, getDownloadURL, ref as storageRef } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-storage.js";
import { firebaseApp } from './fireConfig.js';

const db = getDatabase(firebaseApp);
const storage = getStorage(firebaseApp);

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
            document.getElementById("shipper").textContent = data.shipper;
            document.getElementById("shipper2").textContent = data.shipper;
            document.getElementById("shipper3").textContent = data.shipper;
            document.getElementById("term").textContent = data.term;
            document.getElementById("commodity").textContent = data.commodity;
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
            document.getElementById("inspected_by").textContent = data.inspected_by;


 // Mencetak data kontainer untuk setiap kontainer dalam data.container_data
 for (const containerNumber in data.container_data) {
    const containerData = data.container_data[containerNumber];
    printContainerData(containerNumber, containerData);
}
} else {
console.log("Data tidak ditemukan");
}
});
    
const containerDataContainer = document.getElementById("containerDataContainer");

// Fungsi untuk mencetak data container
function printContainerData(containerNumber, containerData) {
    const rowCount = 18;
    const tableRowsHTML = generateTableRows(rowCount);

    // Membuat elemen <tr> untuk container data
    const containerRow = document.createElement('tr');
    containerRow.innerHTML = `
        <td>${containerData.container_number}</td>
        <td>${containerData.seal_number}</td>
        <td>${containerData.stuffing_date}</td>
        ${tableRowsHTML}
    `;

    // Menambahkan elemen <tr> ke dalam elemen "containerDataContainer"
    containerDataContainer.appendChild(containerRow);
}

function generateTableRows(rowCount) {
    let tableRows = '';

    for (let i = 1; i <= rowCount; i++) {   
        tableRows += '<td>NO</td>';
    }

    return tableRows;
}

// Fungsi untuk menampilkan daftar foto dari Firebase Storage
async function displayPhotos(photoList, folderName) {
    // Mendapatkan nilai containerNumber dari folderName
    const folderParts = folderName.split('/');
    const containerNumber = folderParts[folderParts.length - 1];

    // Referensi ke direktori penyimpanan gambar di Firebase Storage
    const storageDirRef = storageRef(storage, 'images/' + folderName);

    try {
        const listResult = await listAll(storageDirRef);
        let photosHTML = '';
        let rowCount = 0;

        // Tampilkan judul containerNumber hanya sekali di atas
        photosHTML += `
            <div class="page-break col-md-12 mb-3">
            <h6>Lampiran</h6>
            <h6 style="text-align: center;">Berikut merupakan dokumentasi dari prosess stuffing yang telah berjalan</h6>
                <h6>${containerNumber}</h6>
            </div>
        `;

        let photosToDisplay = [];

        for (const item of listResult.items) {
            const url = await getDownloadURL(item);
            const itemName = item.name;
            const nameParts = itemName.split('-');
            const firstNamePart = nameParts[1] + '- ' + containerNumber;

            photosToDisplay.push(`
                <div class="col-md-4 mb-3">
                    <img src="${url}" alt="${firstNamePart}" class="img-fluid mb-3" style="max-width: 100%;">
                    <p>${firstNamePart}</p>
                </div>
            `);

            rowCount++;

            if (rowCount === 3) {
                // Jika sudah ada 3 foto, tambahkan grup gambar ke daftar
                photosHTML += `
                    <div class="row">${photosToDisplay.join('')}</div>
                `;
                photosToDisplay = [];
                rowCount = 0;
            }
        }

        if (photosToDisplay.length > 0) {
            // Menambahkan sisa foto dalam grup terakhir ke daftar
            photosHTML += `
                <div class="row">${photosToDisplay.join('')}</div>
            `;
        }

        photoList.innerHTML += photosHTML;
    } catch (error) {
        console.error('Error saat mengambil daftar file:', error);
    }
}



// Fungsi untuk mengambil daftar folder container_number
async function getContainerNumbers(shipper, no_booking) {
    const storageDirRef = storageRef(storage, `images/${shipper}/${no_booking}`);

    try {
        const listResult = await listAll(storageDirRef);
        const containerNumbers = listResult.prefixes.map((prefix) => {
            const pathParts = prefix.fullPath.split('/');
            return pathParts[pathParts.length - 1];
        });

        return containerNumbers;
    } catch (error) {
        console.error("Error saat mengambil daftar container_number:", error);
        return [];
    }
}

// Panggil displayPhotos untuk semua folder container_number dalam no_booking
async function displayAllPhotos() {
    const containerNumbers = await getContainerNumbers(shipper, no_booking);

    if (containerNumbers.length === 0) {
        console.log("Tidak ada folder container_number (tidak ada foto).");
        return;
    }

    containerNumbers.forEach(async (containerNumber) => {
        const folderPath = `${shipper}/${no_booking}/${containerNumber}`;
        displayPhotos(document.getElementById('photoGallery'), folderPath);
    });
}

// Panggil displayAllPhotos untuk menampilkan semua foto
displayAllPhotos();

document.getElementById("edit-button").addEventListener("click", () => {
    // Redirect ke halaman edit data
    window.location.href = "editData?shipper=" + shipper + "&no_booking=" + no_booking;
});
