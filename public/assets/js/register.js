import {createUserWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/10.3.1/firebase-auth.js";
import { auth } from "./firebase-config";
document.getElementById("register-form").addEventListener("submit", function (e) {
    e.preventDefault();
  
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
        createUserWithEmailAndPassword(auth, email, password)
            .then((userCredential) => {
                // Signed in 
                const user = userCredential.user;
                // ... user.uid
                alert('user created succesfully');
            })
            .catch((error) => {
                const errorCode = error.code;
                const errorMessage = error.message;
                // ..
                alert(errorMessage);
            });
});