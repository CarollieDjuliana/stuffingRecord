<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <!-- Add Bootstrap CDN links -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        /* Additional CSS for box colors */
        .box {
            width: 100%;
            height: 150px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
            border-radius: 10px;
            padding: 15px;
            text-align: top;
        }

        /* Colors for different statuses */
        .box-yellow {
            background-color: #FCE22A;
            /* Yellow */
        }

        .box-green {
            background-color: #53BF9D;
            /* Green */
        }

        .box-green-light {
            background-color: #30E3DF;
        }

        .box-red {
            background-color: #D61355;
            /* Red */
        }

        .box-blue {
            background-color: #0079FF;
            /* Red */
        }

        /* Adjustments for better alignment */
        h1 {
            margin-left: 20px;
        }
    </style>
</head>

<body>

    <h1 class="mt-4">Dashboard</h1>

    <!-- Bootstrap grid system to arrange boxes one per row -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <label for="start-date">Tanggal Awal:</label>
                <input type="date" id="start-date">
            </div>
            <div class="col-md-4">
                <label for="end-date">Tanggal Akhir:</label>
                <input type="date" id="end-date">
            </div>
            <div class="col-md-4">
                <button onclick="getFilteredData()">Filter</button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="box box-blue">
                    <h6>Jumlah Aktifitas</h6>
                    <p id="activity-count">0</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="box box-red">
                    <h6>Jumlah Aktivitas Complete</h6>
                    <p id="complete-count">0</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-green">
                    <h6>Jumlah Aktivitas On Progress</h6>
                    <p id="progress-count">0</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="box box-yellow">
                    <h6>Jumlah Container yang telah di Stuffing</h6>
                    <p id="container-count-complete">0</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-green">
                    <h6>Jumlah Container yang akan di Stuffing</h6>
                    <p id="container-count-progress">0</p>
                </div>
            </div>
        </div>
    </div>

    <script type="module">
        // Inisialisasi Firebase
        import {
            initializeApp
        } from 'https://www.gstatic.com/firebasejs/9.10.0/firebase-app.js';
        import {
            getDatabase,
            ref,
            onValue
        } from 'https://www.gstatic.com/firebasejs/9.10.0/firebase-database.js';

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

        initializeApp(firebaseConfig);

        function loadDashboardData() {
            const activitiesRef = ref(getDatabase(), "activity");

            onValue(activitiesRef, (snapshot) => {
                const activities = snapshot.val();
                console.log('Activities:', activities);

                let activityCount = 0;
                let completeCount = 0;
                let progressCount = 0;
                let containerCountComplete = 0;
                let containerCountProgress = 0;

                for (const shipper in activities) {
                    for (const no_booking in activities[shipper]) {
                        console.log('Shipper:', shipper);
                        console.log('No Booking:', no_booking);

                        const status = activities[shipper][no_booking].status;
                        console.log('Status:', status);

                        // Update based on the status
                        if (status && status.toUpperCase() === "COMPLETE") {
                            completeCount++;

                            // Check if there are containers
                            const containers = activities[shipper][no_booking].container_data;
                            if (containers) {
                                containerCountComplete += Object.keys(containers).length;
                            }
                        } else if (status && status.toUpperCase() === "ON PROGRESS") {
                            progressCount++;
                            // Check if there are containers
                            const containers = activities[shipper][no_booking].container_data;
                            if (containers) {
                                containerCountProgress += Object.keys(containers).length;
                            }
                        }

                        activityCount++;
                    }
                }

                console.log('Activity Count:', activityCount);
                console.log('Container Count Complete:', containerCountComplete);
                console.log('Container Count Progress:', containerCountProgress);
                console.log('Complete Count:', completeCount);
                console.log('Progress Count:', progressCount);

                document.getElementById("activity-count").textContent = activityCount;
                document.getElementById("container-count-complete").textContent = containerCountComplete;
                document.getElementById("container-count-progress").textContent = containerCountProgress;
                document.getElementById("complete-count").textContent = completeCount;
                document.getElementById("progress-count").textContent = progressCount;
            });
        }

        window.getFilteredData = function() {
            const startDate = document.getElementById("start-date").value;
            const endDate = document.getElementById("end-date").value;

            if (startDate && endDate) {
                const activitiesRef = ref(getDatabase(), "activity");

                onValue(activitiesRef, (snapshot) => {
                    const activities = snapshot.val();
                    console.log('Activities:', activities);

                    let activityCount = 0;
                    let completeCount = 0;
                    let progressCount = 0;
                    let containerCountComplete = 0;
                    let containerCountProgress = 0;

                    const start = new Date(startDate);
                    const end = new Date(endDate);

                    for (const shipper in activities) {
                        for (const no_booking in activities[shipper]) {
                            console.log('Shipper:', shipper);
                            console.log('No Booking:', no_booking);

                            const status = activities[shipper][no_booking].status;
                            console.log('Status:', status);

                            const date = activities[shipper][no_booking].date;
                            const activityDate = new Date(date);

                            // Check if activity date is within the selected range
                            if (activityDate >= start && activityDate <= end) {
                                // Update based on the status
                                if (status && status.toUpperCase() === "COMPLETE") {
                                    completeCount++;

                                    // Check if there are containers
                                    const containers = activities[shipper][no_booking].container_data;
                                    if (containers) {
                                        containerCountComplete += Object.keys(containers).length;
                                    }
                                } else if (status && status.toUpperCase() === "ON PROGRESS") {
                                    progressCount++;
                                    // Check if there are containers
                                    const containers = activities[shipper][no_booking].container_data;
                                    if (containers) {
                                        containerCountProgress += Object.keys(containers).length;
                                    }
                                }

                                activityCount++;
                            }
                        }
                    }

                    console.log('Activity Count:', activityCount);
                    console.log('Container Count Complete:', containerCountComplete);
                    console.log('Container Count Progress:', containerCountProgress);
                    console.log('Complete Count:', completeCount);
                    console.log('Progress Count:', progressCount);

                    document.getElementById("activity-count").textContent = activityCount;
                    document.getElementById("container-count-complete").textContent = containerCountComplete;
                    document.getElementById("container-count-progress").textContent = containerCountProgress;
                    document.getElementById("complete-count").textContent = completeCount;
                    document.getElementById("progress-count").textContent = progressCount;
                });
            } else {
                alert("Silakan pilih tanggal awal dan tanggal akhir terlebih dahulu!");
            }
        }

        document.addEventListener("DOMContentLoaded", () => {
            loadDashboardData();
        });
    </script>


</body>

</html>