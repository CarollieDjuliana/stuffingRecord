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

const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);
const auth = getAuth();
console.log(app);
const database = getDatabase();



//----- New Registration code start	  
document.getElementById("register").addEventListener("click", function() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    //For new registration
    createUserWithEmailAndPassword(auth, email, password)
        .then((userCredential) => {
            // Signed in 
            const user = userCredential.user;

            const database = getDatabase();
            const userRef = ref(database, 'users/' + user.uid);

            // Menyimpan data pendaftaran ke Realtime Database
            const newUserData = {
                email: email,
                password: password
            };
            set(userRef, newUserData);

            console.log(user);
            alert("Registration successfully!!");

            window.location.href = '/login';
        })
        .catch((error) => {
            const errorCode = error.code;
            const errorMessage = error.message;

            console.log(errorMessage);
            alert(error);
        });
});