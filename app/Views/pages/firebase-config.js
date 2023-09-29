// import {
//     initializeApp
// } from "https://www.gstatic.com/firebasejs/10.3.1/firebase-app.js";
// import {
//     getAuth,
// } from "https://www.gstatic.com/firebasejs/10.3.1/firebase-auth.js";
import firebase from 'firebase/app';
import 'firebase/auth';

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
const app = firebase.initializeApp(firebaseConfig);
// const analytics = getAnalytics(app);
const auth = app.auth();

export { auth };
console.log(app);