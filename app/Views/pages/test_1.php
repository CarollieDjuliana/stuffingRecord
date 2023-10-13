<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
</head>

<body>
    <h1>Halaman Utama</h1>

    <!-- Form untuk input aktivitas -->
    <form id="activityForm">
        <label for="activityName">Nama Aktivitas:</label>
        <input type="text" id="activityName" required>
        <button type="submit">Tambah Aktivitas</button>
    </form>

    <!-- Tabel untuk menampilkan data aktivitas -->
    <table id="activityTable">
        <thead>
            <tr>
                <th>Nama Aktivitas</th>
                <th>Galeri</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data aktivitas akan ditampilkan di sini -->
        </tbody>
    </table>

    <!-- <script src="index.js"></script> -->
</body>

</html>

<script type="module">
    import {
        initializeApp
    } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-app.js";
    import {
        getStorage,
        ref,
        uploadBytes,
        getDownloadURL
    } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-storage.js";
    import {
        getDatabase,
        ref as dbRef,
        push as dbPush,
        onValue as dbOnValue
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

    const app = initializeApp(firebaseConfig);
    const storage = getStorage(app);
    const database = getDatabase(app);

    const activityForm = document.getElementById('activityForm');
    const activityNameInput = document.getElementById('activityName');
    const activityTable = document.getElementById('activityTable').getElementsByTagName('tbody')[0];

    activityForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const activityName = activityNameInput.value.trim();

        // Simpan data aktivitas ke Firebase Database
        const newActivityRef = dbPush(dbRef(database, 'activities'), {
            name: activityName
        });

        activityNameInput.value = '';
    });

    // Memuat data aktivitas dari Firebase Database saat halaman dimuat
    dbOnValue(dbRef(database, 'activities'), (snapshot) => {
        activityTable.innerHTML = ''; // Kosongkan tabel sebelum memuat data

        snapshot.forEach((childSnapshot) => {
            const activityData = childSnapshot.val();
            const activityKey = childSnapshot.key;

            // Buat baris baru di tabel untuk setiap aktivitas
            const row = activityTable.insertRow();
            const nameCell = row.insertCell(0);
            const galleryCell = row.insertCell(1);

            nameCell.innerText = activityData.name;

            // Tambahkan tombol galeri untuk setiap aktivitas
            const galleryButton = document.createElement('button');
            galleryButton.innerText = 'Galeri';
            galleryButton.addEventListener('click', () => {
                // Redirect ke halaman galeri dengan key aktivitas
                window.location.href = `test2?key=${activityKey}`;
            });
            galleryCell.appendChild(galleryButton);
        });
    });
</script>