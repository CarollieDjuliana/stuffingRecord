<!DOCTYPE html>
<html>

<head>
    <!-- Include Firebase SDK script -->
    <script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-app-compat.js"></script>
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

        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);

        // Function to save data from the first page
        function saveData() {
            const shipper = document.getElementById('shipper').value;
            const noBooking = document.getElementById('no_booking').value;
            const quantity = document.getElementById('quantity').value;
            const date = document.getElementById('date').value;

            if (
                shipper &&
                noBooking &&
                date &&
                quantity
            ) {
                const dataForm1 = {
                    shipper: shipper,
                    noBooking: noBooking,
                    date: date,
                    quantity: quantity
                };
                localStorage.setItem('dataForm1', JSON.stringify(dataForm1));
                window.location.href = '/test2';
            } else {
                alert('Please fill in all fields before proceeding to the next form.');
            }
        }

        // Function to cancel the process and go back to the previous page
        function cancel() {
            localStorage.removeItem('dataForm1');
            window.location.href = '/dashboard'; // Replace with your main page
        }

        // Function to load saved data when the page loads
        function loadSavedData() {
            const savedData = localStorage.getItem('dataForm1');
            if (savedData) {
                const {
                    shipper,
                    noBooking,
                    date,
                    quantity
                } = JSON.parse(savedData);
                document.getElementById('shipper').value = shipper;
                document.getElementById('no_booking').value = noBooking;
                document.getElementById('quantity').value = quantity;
                document.getElementById('date').value = date;
            }
        }

        // Load saved data when the page loads
        window.onload = loadSavedData;
    </script>
</head>

<body>
    <h1>First Page</h1>
    <form id="form1" action="/test2" method="post">
        <input id="shipper" type="text" placeholder="Shipper" required>
        <input id="no_booking" type="text" placeholder="No. Booking" required>
        <input id="date" type="date" placeholder="Date" required>
        <input id="quantity" type="text" placeholder="quantity" required>
        <!-- Add other input fields for additional data -->
        <button type="button" onclick="saveData()">Next to Form 2</button>
    </form>

    <!-- Button to cancel and go back to the previous page -->
    <button onclick="cancel()">Cancel</button>
</body>

</html>