<?= $this->extend('/layout/template'); ?>

<?= $this->section('content'); ?>
<style>
    /* Additional CSS for box colors */
    .box {
        width: calc(20% - 10px);
        height: 80px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
        padding: 10px;
        text-align: top;
        background-color: #FFBC14;
        margin: 0 5px 5px 0;
    }

    /* Font size and bold for numbers */
    p {
        font-size: 12px;
        font-weight: bold;
    }

    /* Date Filter Row adjustments */
    .date-filter-row {
        margin-bottom: 10px;
    }

    .date-filter-row .col-md-4 {
        flex: 0 0 33.33%;
        max-width: 33.33%;
    }

    @media (max-width: 767px) {

        /* Date Filter Row adjustments for smaller screens */
        .date-filter-row .col-md-4 {
            flex: 0 0 100%;
            max-width: 100%;
            margin-bottom: 5px;
        }

        /* Adjust box width for smaller screens */
        .box {
            width: calc(50% - 5px);
        }
    }
</style>
</head>

<body>
    <!-- Bootstrap grid system to arrange boxes one per row -->
    <div class="container">
        <!-- Date Filter Row -->
        <div class="row align-items-center mb-4">
            <div class="col-md-4 mb-2">
                <label for="start-date">Tanggal Awal:</label>
                <input type="date" id="start-date" class="form-control">
            </div>
            <div class="col-md-4 mb-2">
                <label for="end-date">Tanggal Akhir:</label>
                <input type="date" id="end-date" class="form-control">
            </div>
            <div class="col-md-4 mb-2">
                <button onclick="getFilteredData()" class="btn btn-primary btn-block">Filter</button>
            </div>
        </div>
        <!-- Content Row -->
        <div class="row">

            <div class="box">
                Total Aktifitas
                <p id="activity-count">0</p>
            </div>

            <div class="box">
                Activities Complete
                <p id="complete-count">0</p>
            </div>

            <div class="box">
                Activities On Progress
                <p id="progress-count">0</p>
            </div>

            <div class="box">
                Container Complete
                <p id="container-count-complete">0</p>
            </div>

            <div class="box">
                Container On Progress
                <p id="container-count-progress">0</p>
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

<?= $this->endSection(); ?>