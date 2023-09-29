<?= $this->extend('/layout/template'); ?>

<?= $this->section('content'); ?>

<body>
    <div class="container-fluid p-3">
        <!-- title -->
        <h5 class="text-lg, p-3">STUFFING RECORD MUSI KALIJAYA</h5>
        <!-- add activity button -->
        <div class=" text-md p-5">
            <button type="button" id="add_activity" class="btn btn-warning fw-bold float-end p-3" onclick="window.location.href = '/addActivity'">ADD ACTIVITY</button>
        </div>
        <!-- search bar -->
        <div class="input-group p-3">
            <div class="form-outline">
                <input id="search-focus" type="search" id="form1" class="form-control" />
            </div>
            <button type="button" name="searchButton" class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>
        </div>
        <!-- record tabel -->
        <table class="table container-fluid table-responsive" style="max-width: 100%; width: 100%;">
            <thead>
                <tr>
                    <th scope="col">DATE</th>
                    <th scope="col">SHIPPER</th>
                    <th scope="col">NO.BOOKING</th>
                    <th scope="col">LOCATION</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">UPDATE DATA</th>
                    <th scope="col">SHOW DATA</th>
                </tr>
            </thead>
            <tbody id="data-table-body">

            </tbody>
        </table>
    </div>

</body>
<script type="module" src="<?= base_url('/assets/js/dashboard.js'); ?>"></script>


<!-- <script type="module">
    // Import the functions you need from the SDKs you need
    import {
        initializeApp
    } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-app.js";
    import {
        getAnalytics
    } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-analytics.js";
    import {
        getAuth,
        createUserWithEmailAndPassword,
        signInWithEmailAndPassword,
        signOut
    } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-auth.js";

    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
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
    const analytics = getAnalytics(app);
    // const auth = getAuth();
    console.log(app);
    // Menggunakan Firebase Auth untuk memeriksa status login
    const auth = firebase.auth();

    auth.onAuthStateChanged((user) => {
        if (user) {
            // Pengguna sudah login, izinkan akses ke halaman dashboard
            // Di sini Anda dapat menampilkan konten dashboard atau melakukan tindakan lain
        } else {
            // Pengguna belum login, arahkan mereka kembali ke halaman login atau tampilkan pesan kesalahan
            window.location.href = '/login'; // Ganti dengan URL halaman login Anda
        }
    });
</script> -->

<?= $this->endSection(); ?>