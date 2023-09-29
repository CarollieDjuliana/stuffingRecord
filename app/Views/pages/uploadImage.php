<?= $this->extend('/layout/template'); ?>

<?= $this->section('content'); ?>
<script>
    // Periksa status login pengguna
    const user = firebase.auth().currentUser;

    if (!user) {
        // Pengguna belum login, arahkan ke halaman login atau lakukan tindakan lain
        window.location.href = '/login'; // Sesuaikan URL tujuan Anda
    } else {
        // Pengguna sudah login, izinkan untuk mengakses halaman upload gambar
        $(document).ready(function() {
            // ... Kode upload gambar ...

            // Jika pengguna mengklik tombol logout, logout pengguna
            $('#logout').on('click', function() {
                firebase.auth().signOut().then(function() {
                    // Logout berhasil, arahkan kembali ke halaman login
                    window.location.href = '/login';
                }).catch(function(error) {
                    // Handle error jika logout gagal
                    console.error(error);
                });
            });
        });
    }
</script>
<script type="module">
    import {
        initializeApp
    } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-app.js";
    import {
        getStorage,
        ref,
        uploadBytes
    } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-storage.js";

    const firebaseConfig = {
        apiKey: "AIzaSyDWnzARzRIX5eb4q3A0tDwb_4iSmZ5EHTY",
        authDomain: "stuffingrecord-mkj.firebaseapp.com",
        projectId: "stuffingrecord-mkj",
        storageBucket: "stuffingrecord-mkj.appspot.com",
        messagingSenderId: "515562362541",
        appId: "1:515562362541:web:f692bb65ef317963765824",
        measurementId: "G-4GEZPYYPS5"
    };

    // Inisialisasi Firebase
    const app = initializeApp(firebaseConfig);

    // Inisialisasi Firebase Storage
    const storage = getStorage(app);

    $(document).ready(function() {
        $('#uploadButton').on('click', function() {
            const fileInput = document.getElementById('fileInput');
            const selectedFile = fileInput.files[0];

            if (selectedFile) {
                // Definisikan path penyimpanan di Firebase Storage
                const storageRef = ref(storage, 'images/' + selectedFile.name);

                // Lakukan upload gambar
                uploadBytes(storageRef, selectedFile)
                    .then(function(snapshot) {
                        console.log('Gambar berhasil diupload.');
                    })
                    .catch(function(error) {
                        console.error('Error saat mengupload gambar:', error);
                    });
            } else {
                console.log('Pilih file gambar terlebih dahulu.');
            }
        });
    });
</script>

<body>
    <input type="file" id="fileInput">
    <button id="uploadButton">Upload Gambar</button>
</body>

<?= $this->endSection(); ?>