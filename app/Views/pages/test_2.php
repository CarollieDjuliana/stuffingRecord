<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Galeri</title>
</head>

<body>
    <h1>Halaman Galeri</h1>

    <!-- Form untuk mengunggah foto -->
    <form id="uploadFormFront">
        <input type="file" id="fileInputFront" accept="image/*" required>
        <button type="submit">Unggah Foto Depan</button>
    </form>
    <!-- Daftar foto akan ditampilkan di sini -->
    <div id="frontPhotoList">
        <h2>Foto Depan</h2>
        <!-- Daftar foto depan akan ditampilkan di sini -->
    </div>
    <form id="uploadFormBack">
        <input type="file" id="fileInputBack" accept="image/*" required>
        <button type="submit">Unggah Foto Belakang</button>
    </form>
    <div id="backPhotoList">
        <h2>Foto Belakang</h2>
        <!-- Daftar foto belakang akan ditampilkan di sini -->
    </div>

    <form id="uploadFormMiddle">
        <input type="file" id="fileInputMiddle" accept="image/*" required>
        <button type="submit">Unggah Foto Tengah</button>
    </form>
    <div id="middlePhotoList">
        <h2>Foto Tengah</h2>
        <!-- Daftar foto tengah akan ditampilkan di sini -->
    </div>



    <!-- <script src="gallery.js"></script> -->
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

    // Dapatkan key aktivitas dari URL
    const urlParams = new URLSearchParams(window.location.search);
    const activityKey = urlParams.get('key');

    // Formulir dan daftar foto depan
    const uploadFormFront = document.getElementById('uploadFormFront');
    const fileInputFront = document.getElementById('fileInputFront');
    const frontPhotoList = document.getElementById('frontPhotoList');

    // Formulir dan daftar foto belakang
    const uploadFormBack = document.getElementById('uploadFormBack');
    const fileInputBack = document.getElementById('fileInputBack');
    const backPhotoList = document.getElementById('backPhotoList');

    // Formulir dan daftar foto tengah
    const uploadFormMiddle = document.getElementById('uploadFormMiddle');
    const fileInputMiddle = document.getElementById('fileInputMiddle');
    const middlePhotoList = document.getElementById('middlePhotoList');

    function uploadPhoto(form, fileInput, photoList, photoType) {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const file = fileInput.files[0];

            if (file) {
                // Simpan foto ke Firebase Storage dengan nama berdasarkan format yang diinginkan
                const storageRef = ref(storage, `activities/${activityKey}/${photoType}_${activityKey}.${file.name.split('.').pop()}`);
                await uploadBytes(storageRef, file);

                // Dapatkan URL download foto yang baru diunggah
                const downloadURL = await getDownloadURL(storageRef);

                // Simpan URL download ke Firebase Database
                dbPush(dbRef(database, `activities/${activityKey}/photos/${photoType}`), downloadURL);

                // Kosongkan input file
                fileInput.value = '';
            }
        });
    }

    // Panggil fungsi uploadPhoto untuk masing-masing jenis foto
    uploadPhoto(uploadFormFront, fileInputFront, frontPhotoList, 'depan');
    uploadPhoto(uploadFormBack, fileInputBack, backPhotoList, 'belakang');
    uploadPhoto(uploadFormMiddle, fileInputMiddle, middlePhotoList, 'tengah');

    // Fungsi untuk menampilkan daftar foto dari Firebase Database
    function displayPhotos(photoList, photoType) {
        dbOnValue(dbRef(database, `activities/${activityKey}/photos/${photoType}`), (snapshot) => {
            photoList.innerHTML = ''; // Kosongkan daftar foto sebelum memuat data

            snapshot.forEach((childSnapshot) => {
                const photoURL = childSnapshot.val();

                // Tampilkan foto
                const img = document.createElement('img');
                img.src = photoURL;
                photoList.appendChild(img);
            });
        });
    }

    // Panggil fungsi displayPhotos untuk masing-masing jenis foto
    displayPhotos(frontPhotoList, 'depan');
    displayPhotos(backPhotoList, 'belakang');
    displayPhotos(middlePhotoList, 'tengah');
</script>