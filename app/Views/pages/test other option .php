<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Firebase</title>
    <!-- Include Firebase JavaScript SDK (version 8) -->
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-database.js"></script>

</head>

<body>

    <form id="myForm">
        <label for="options">Pilih Opsi:</label>
        <select id="options" onchange="showOtherOption()">
            <option>Opsi 1</option>
            <option>Opsi 2</option>
            <option value="other">Lainnya</option>
        </select>

        <div id="otherOption" style="display:none;">
            <label for="otherInput">Masukkan Pilihan Lainnya:</label>
            <input type="text" id="otherInput" name="otherInput">
        </div>

        <button type="button" onclick="saveData()">Simpan</button>
    </form>

    <script>
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
        firebase.initializeApp(firebaseConfig);

        // Fungsi untuk menampilkan atau menyembunyikan opsi lainnya
        function showOtherOption() {
            var optionsDropdown = document.getElementById("options");
            var otherOptionDiv = document.getElementById("otherOption");

            if (optionsDropdown.value === "other") {
                otherOptionDiv.style.display = "block";
            } else {
                otherOptionDiv.style.display = "none";
            }
        }

        // Fungsi untuk menyimpan data ke Firebase
        function saveData() {
            var selectedValue = "";
            var optionsDropdown = document.getElementById("options");
            var otherInputValue = document.getElementById("otherInput").value;

            if (optionsDropdown.value === "other") {
                selectedValue = otherInputValue;
            } else {
                selectedValue = optionsDropdown.value;
            }

            // Simpan data ke Firebase sesuai kebutuhan Anda
            var database = firebase.database();
            database.ref('data').push({
                selectedValue: selectedValue
            });

            // Tambahkan log atau tindakan lain yang diperlukan setelah menyimpan data
            console.log("Data berhasil disimpan ke Firebase!");
        }
    </script>

</body>

</html>