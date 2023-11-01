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
import {
    getDatabase,
    ref,
    set
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

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);
const auth = getAuth();
console.log(app);
const database = getDatabase();

document.getElementById("register").addEventListener("click", function() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var name = document.getElementById("name").value;
    var position = document.getElementById("position").value;
    var confirm_password = document.getElementById("confirm_password").value;
    var password_error = document.getElementById("password_error");


    // Periksa apakah password dan konfirmasi password cocok
    if (password !== confirm_password) {
        password_error.innerText = "Password dan konfirmasi password tidak cocok.";
        return; // Berhenti jika tidak cocok
    } else {
        password_error.innerText = ""; // Hapus pesan kesalahan jika cocok
    }

    // For new registration
    createUserWithEmailAndPassword(auth, email, password)
        .then((userCredential) => {
            const user = userCredential.user;

            const database = getDatabase();
            const userRef = ref(database, 'users/' + user.uid);

            // Simpan data pendaftaran ke Realtime Database
            const newUserData = {
                email: email,
                name: name,
                position: position,
            };
            set(userRef, newUserData)
                .then(() => {
                    alert("Registrasi berhasil!");

                    window.location.href = '/login';

                    // window.location.href = "/addActivityContainer?quantityV=" + quantityV;

                })
                .catch((error) => {
                    console.error("Error saving data: ", error);
                });


            set(userRef, newUserData);

            console.log(user);
            alert("Registrasi berhasil!");

            // Redirect ke halaman login setelah registrasi
        })
        .catch((error) => {
            const errorCode = error.code;
            const errorMessage = error.message;

            console.log(errorMessage);
            alert(error);
        });
});

document.getElementById("togglePassword").addEventListener("click", function() {
    togglePasswordVisibility("password");
});

document.getElementById("toggleConfirmPassword").addEventListener("click", function() {
    togglePasswordVisibility("confirm_password");
});

function togglePasswordVisibility(fieldId) {
    var passwordField = document.getElementById(fieldId);
    var eyeIcon = document.getElementById(fieldId === "password" ? "eyeIcon" : "confirmEyeIcon");

    if (passwordField.type === "password") {
        passwordField.type = "text";
        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");
    } else {
        passwordField.type = "password";
        eyeIcon.classList.remove("fa-eye-slash");
        eyeIcon.classList.add("fa-eye");
    }
}