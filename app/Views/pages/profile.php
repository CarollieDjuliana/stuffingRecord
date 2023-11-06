<?= $this->extend('/layout/template'); ?>

<?= $this->section('content'); ?>

<body>
    <div class="container mt-3 mb-3">
        <div class="card mx-auto" style="max-width: 500px;">
            <div class="card-header text-center">
                <img src="your-profile-image.jpg" alt="User Image" class="rounded-circle" width="100">
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group mt-2">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter your name">
                    </div>
                    <div class="form-group mt-2">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email">
                    </div>
                    <div class="form-group mt-2">
                        <label for="position">Position</label>
                        <input type="text" class="form-control" id="position" placeholder="Enter your position">
                    </div>
                    <div class="form-group mt-2">
                        <label for="telepon">Phone Number</label>
                        <input type="tel" class="form-control" id="telepon" placeholder="Enter your phone number">
                    </div>
                    <div class="form-group mt-2">
                        <label for="unit-bisnis">Business Unit</label>
                        <input type="text" class="form-control" id="unit-bisnis" placeholder="Enter your business unit">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2" id="update-button">Update</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<script type="module" src="<?= '/assets/js/fireconfig.js'; ?>"></script>
<script type="module">
import {
    getAuth,
    signOut,
    onAuthStateChanged
} from "https://www.gstatic.com/firebasejs/9.10.0/firebase-auth.js";
import {
    getDatabase,
    ref,
    get,
    set
} from "https://www.gstatic.com/firebasejs/9.10.0/firebase-database.js";

document.addEventListener("DOMContentLoaded", function() {
    const auth = getAuth();

    // Replace 'your-profile-image.jpg' with the appropriate profile image URL
    const profileImage = document.querySelector(".card-header img");
    profileImage.src = "your-profile-image.jpg";

    // Get form elements
    const nameInput = document.getElementById("name");
    const emailInput = document.getElementById("email");
    const positionInput = document.getElementById("position");
    const teleponInput = document.getElementById("telepon");
    const unitBisnisInput = document.getElementById("unit-bisnis");
    const updateButton = document.getElementById("update-button");

    onAuthStateChanged(auth, async (user) => {
        if (user) {
            var uid = user.uid;
            console.log(user.uid);

            // Get user data from Firebase Database
            const db = getDatabase();
            const userRef = ref(db, `users/${uid}`);

            updateButton.addEventListener("click", async () => {
                const db = getDatabase();
                const userRef = ref(db, `users/${uid}`);
                const snapshot = await get(userRef);

                if (snapshot.exists()) {
                    const userData = snapshot.val();

                    // Update user data based on the input
                    userData.name = nameInput.value;
                    userData.email = emailInput.value;
                    userData.position = positionInput.value;
                    userData.telepon = teleponInput.value;
                    userData.unit_bisnis = unitBisnisInput.value;

                    // Save the entire updated user data to Firebase Database
                    await set(userRef, userData);

                    alert("Data has been updated.");
                }
            });

            const snapshot = await get(userRef);
            if (snapshot.exists()) {
                const userData = snapshot.val();

                // Fill the form values with data from Firebase
                nameInput.value = userData.name || "";
                emailInput.value = userData.email || "";
                positionInput.value = userData.position || "";
                teleponInput.value = userData.telepon || "";
                unitBisnisInput.value = userData.unit_bisnis || "";
            }
        } else {
            // User is not logged in
        }
    });
});
</script>

<?= $this->endSection(); ?>