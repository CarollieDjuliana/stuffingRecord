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
            document.getElementById("shipper").textContent = data.shipper;
            document.getElementById("term").textContent = data.term;
            document.getElementById("comodity").textContent = data.comodity;
            document.getElementById("quantity").textContent = data.quantity;
            document.getElementById("grade").textContent = data.grade;
            document.getElementById("shipping_line").textContent = data.shipping_line;
            document.getElementById("vassel_name").textContent = data.vassel_name;
            document.getElementById("voyage").textContent = data.voyage;
            document.getElementById("port_of_loading").textContent = data.port_of_loading;
            document.getElementById("destination").textContent = data.destination;
            document.getElementById("etd").textContent = data.etd;
            document.getElementById("stuffing_place").textContent = data.stuffing_place;
            document.getElementById("stuffing_by").textContent = data.stuffing_by;
            document.getElementById("location").textContent = data.location;
            document.getElementById("weather").textContent = data.weather;
// Menggunakan fungsi untuk menghasilkan tabel
const containerInspectionTable = generateContainerInspectionTable();
    
// Menambahkan tabel ke dalam elemen HTML dengan ID tertentu
document.getElementById("containerInspection").innerHTML = containerInspectionTable;
            // Mengakses data dalam subfolder container_number
            for (const containerNumber in data.container_data) {
                const containerData = data.container_data[containerNumber];
                // Memanggil fungsi untuk menampilkan data container
                printContainerData(containerNumber, containerData);
            }
        } else {
            console.log("Data tidak ditemukan");
        }
    })
    .catch((error) => {
        console.error("Error reading data: ", error);
    });


    function generateContainerInspectionTable() {
        const table = `
            <table class="table">
                    <tr>
                        <th>CONTAINER NUMBER</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>SEAL NUMBER</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>STUFFING DATE</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>ITEM</th>
                        <th colspan="2">JUDGEMENT</th>
                    </tr>
                    <tr>
                        <td rowspan="2">CEILING</td>
                        <td colspan="2">HOLES</td>
                    </tr>
                    <tr>
                        <td colspan="2">RUSTY / CORROSION</td>
                    </tr>
                    <tr>
                        <td rowspan="2">WALLS</td>
                        <td colspan="2">HOLES</td>
                    </tr>
                    <tr>
                        <td colspan="2">RUSTY / CORROSION</td>
                    </tr>
                    <tr>
                        <td rowspan="3">RIGHT SIDE</td>
                        <td colspan="2">HOLES / CRACK / DAMAGE</td>
                    </tr>
                    <tr>
                        <td colspan="2">LOSEN SCREW / BOLT</td>
                    </tr>
                    <tr>
                        <td colspan="2">RUSTY / CORROSION</td>
                    </tr>
                    <tr>
                        <td rowspan="3">LEFT SIDE</td>
                        <td colspan="2">HOLES / CRACK / DAMAGE</td>
                    </tr>
                    <tr>
                        <td colspan="2">LOSEN SCREW / BOLT</td>
                    </tr>
                    <tr>
                        <td colspan="2">RUSTY / CORROSION</td>
                    </tr>
                    <tr>
                        <td rowspan="3">FLOOR</td>
                        <td colspan="2">HOLES / CRACK / DAMAGE</td>
                    </tr>
                    <tr>
                        <td colspan="2">LOSEN SCREW / BOLT</td>
                    </tr>
                    <tr>
                        <td colspan="2">RUSTY / CORROSION</td>
                    </tr>
                    <tr>
                        <td rowspan="2">DOOR</td>
                        <td colspan="2">RUBBER SEAL BROKEN</td>
                    </tr>
                    <tr>
                        <td colspan="2">RUSTY / CORROSION</td>
                    </tr>
                    <tr>
                        <td rowspan="3">CLEANLINESS</td>
                        <td colspan="2">WOODEN CHIPS / SPLINTER</td>
                    </tr>
                    <tr>
                        <td colspan="2">PLASTIC RESIN, ETC</td>
                    </tr>
                    <tr>
                        <td colspan="2">WET, OIL STAINS</td>
                    </tr>
                </table>
        `;
    
        return table;
    }
    


// Fungsi untuk mencetak data container
function printContainerData(containerNumber, containerData) {

    // Menambahkan data container ke div dengan ID unik
    const containerDataContainer = document.getElementById("containerDataContainer");
    const rowCount = 18;
    const tableRowsHTML = generateTableRows(rowCount);
    containerDataContainer.innerHTML += `
        <table id="container_data_${containerNumber}" class="table">
            <tr>
                <th>CONTAINER NUMBER</th>
                <td>:</td>
                <td>${containerData.container_number}</td>
            </tr>
            <tr>
                <th>SEAL NUMBER</th>
                <td>:</td>
                <td>${containerData.seal_number}</td>
            </tr>
            <tr>
                <th>STUFFING DATE</th>
                <td>:</td>
                <td>${containerData.stuffing_date}</td>
            </tr>
            <tr>
                <th>NO</th>
                <th>YES</th>
                <th>ACTION</th>
            </tr>
        </tr>
            ${tableRowsHTML}
    `;
}
function generateTableRows(rowCount) {
    let tableRows = '';

    for (let i = 1; i <= rowCount; i++) {
        tableRows += '<tr>';
        tableRows += '<td>X</td>';
        tableRows += '<td></td>';
        tableRows += '<td></td>';
        tableRows += '</tr>';
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
            <div class="col-md-12 mb-3">
                <h3>${containerNumber}</h3>
            </div>
        `;

        for (const item of listResult.items) {
            const url = await getDownloadURL(item);
            const itemName = item.name;

            // Mengambil bagian awal dari nama dokumen
            const nameParts = itemName.split('-');
            const firstNamePart = nameParts[0];

            photosHTML += `
                <div class="col-md-4 mb-3">
                    <img src="${url}" alt="${firstNamePart}" class="img-fluid mb-3" style="max-width: 100%;">
                    <p>${firstNamePart}</p>
                </div>
            `;

            rowCount++;

            if (rowCount === 3) {
                photoList.innerHTML += `
                    <div class="row">${photosHTML}</div>
                `;
                photosHTML = '';
                rowCount = 0;
            }
        }

        if (photosHTML !== '') {
            photoList.innerHTML += `
                <div class="row">${photosHTML}</div>
            `;
        }
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
        console.log("Tidak ada folder container_number.");
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
