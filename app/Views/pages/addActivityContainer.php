<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<body>
    <div class="container mt-5">
        <h5 class="text-center">ADD CONTAINERS</h5>
        <form id="containerForm" method="post" class="form row g-3 mb-5 offset-md-">
            <div class="col-md-6 col-12" style="max-width: 20%; float: end;">
                <label for="num_containers" class="mt-3">Number of Containers</label>
                <input type="number" class="form-control" id="num_containers" name="num_containers" required>
            </div>
            <hr>
            <div id="formContainer" class="col-md-12 mt-3">
                <!-- Container input fields will be generated here based on user input -->
            </div>
            <div class="col-12 mt-5 mb-5">
                <div class="d-flex justify-content-between">
                    <a href="/addActivity" class="btn btn-danger">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>

<script type="module">
    import {
        initializeApp
    } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-app.js";
    import {
        getDatabase,
        ref,
        set
    } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-database.js";

    const dataForm1 = JSON.parse(localStorage.getItem('dataForm1'));
    const shipperV = dataForm1.shipper;
    const noBookingV = dataForm1.no_booking;
    const quantityV = dataForm1.quantity;
    var pattern = /(\d+)D/;
    console.log(dataForm1);


    var resultQuantity = quantityV.match(pattern);
    var valueQuantity = resultQuantity ? resultQuantity[1] : null;

    document.addEventListener("DOMContentLoaded", function() {
        const containerForm = document.querySelector('#containerForm');
        const numContainersInput = document.getElementById("num_containers");
        numContainersInput.value = valueQuantity;
        generateInputFields(valueQuantity);

        function generateInputFields(numContainers) {
            var formContainer = document.getElementById("formContainer");
            formContainer.innerHTML = "";

            for (var i = 1; i <= numContainers; i++) {
                var containerGroup = document.createElement("div");
                containerGroup.className = "row mb-3 mt-3 col-"; // Menambahkan kelas "row" dan "mb-3" untuk mengontrol lebar dan jarak

                containerGroup.innerHTML = `
                    <label for="container_num_${i}" class="col-4 col-form-label">Container Number ${i}</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="container_num_${i}" name="container_num_${i}" required>
                    </div>
                    
                    <label for="seal_number_${i}" class="col-4 col-form-label">Seal Number ${i}</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="seal_number_${i}" name="seal_number_${i}" required>
                    </div>

                    <label for="stuffing_date_${i}" class="col-4 col-form-label">Stuffing Date ${i}</label>
                    <div class="col-8">
                        <input type="date" class="form-control" id="stuffing_date_${i}" name="stuffing_date_${i}" required>
                    </div>
                `;

                formContainer.appendChild(containerGroup);
            }

        }

        document.getElementById("num_containers").addEventListener("input", function() {
            var numContainers = parseInt(this.value);
            generateInputFields(numContainers);
        });

        containerForm.addEventListener("submit", sendDataToFirebase);

        function sendDataToFirebase(event) {
            event.preventDefault();

            var numContainers = document.querySelector('#num_containers').value;
            var containerData = {};

            for (var i = 1; i <= numContainers; i++) {
                var containerNumValue = document.getElementById(`container_num_${i}`).value;
                var sealNumValue = document.getElementById(`seal_number_${i}`).value;
                var stuffingDateValue = document.getElementById(`stuffing_date_${i}`).value;

                // Mengubah nama properti sesuai yang diinginkan
                containerData[containerNumValue] = {
                    container_number: containerNumValue,
                    seal_number: sealNumValue,
                    stuffing_date: stuffingDateValue
                };
            }

            var dataToSave = containerData;

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
            const db = getDatabase();
            const dataPath = "activity/" + shipperV + "/" + noBookingV; // Perubahan jalur

            const form1 = {
                ...dataForm1,
                status: "ON PROGRESS"
            };
            set(ref(db, dataPath), form1)
                .then(() => {
                    alert("Data Inserted");
                    localStorage.removeItem('dataForm1');
                    window.location.href = "/dashboard";
                })
                .catch((error) => {
                    console.error("Error saving data: ", error);
                });

            const dataPathContainer = "activity/" + shipperV + "/" + noBookingV + "/container_data"; // Perubahan jalur

            set(ref(db, dataPathContainer), dataToSave)
                .then(() => {
                    alert("Data Inserted");
                    containerForm.reset();
                    window.location.href = "/dashboard";
                })
                .catch((error) => {
                    console.error("Error saving data: ", error);
                });
        }
    });
</script>
<?= $this->endSection(); ?>