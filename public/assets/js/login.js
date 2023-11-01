// Import the functions need from the SDKs you need
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

// ----- Login code start
// const user_ = userCredential.user;
// console.log(user_);
document.getElementById("login").addEventListener("click", function() {
    var email = document.getElementById("login_email").value;
    var password = document.getElementById("login_password").value;

    signInWithEmailAndPassword(auth, email, password)
        .then((userCredential) => {
            // Signed in
            const user = userCredential.user;
            console.log(user);
            // alert(user.email + " Login successfully!!!");
            // Dapatkan token otentikasi
            return user.getIdToken();
        })
        .then((idToken) => {
            // Kirim token ke server
            fetch('/save-token', {
                method: 'POST',
                body: JSON.stringify({ token: idToken }),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if (response.ok) {
                    // Token terkirim ke server, redirect ke halaman dashboard
                    window.location.href = '/dashboard';
                } else {
                    // Tangani kesalahan jika perlu
                    console.error('Gagal mengirim token ke server');
                }
            });
        })
        .catch((error) => {
            const errorCode = error.code;
            const errorMessage = error.message;
            console.log(errorMessage);
            alert(errorMessage);
        });
});

// Fungsi untuk mengatur visibilitas password
function togglePasswordVisibility() {
    var passwordField = document.getElementById("login_password");
    var eyeIcon = document.getElementById("eyeIcon");

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

// Panggil fungsi togglePasswordVisibility saat dokumen dimuat
document.addEventListener("DOMContentLoaded", function() {
    var togglePasswordButton = document.getElementById("togglePassword");
    togglePasswordButton.addEventListener("click", togglePasswordVisibility);
});

