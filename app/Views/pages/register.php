<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <script src="https://kit.fontawesome.com/e589d529a5.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<style>
    .bg-custom {
        background-color: #E5D758;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg bg-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="/assets/images/logo.png" alt="Logo" width="25%" height="25%" class="d-inline-block align-text-top">
            </a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="d-flex justify-content-center align-items-center m-3">
            <div class="card mb-3 p-md-3" style="width: 36rem;">
                <div class="card-body">
                    <h3 class="card-title text-center ">REGISTER <br> STUFFING RECORD <br>PT. MUSI KALIJAYA</h3>
                    <form id="registration_form" method="post" action="#" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password">
                        </div>
                        <!-- <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> -->
                        <div class="d-flex justify-content-center align-items-center">
                            <button type="button" id="register" class="btn bg-custom" name="register">Register</button>
                        </div>
                    </form>
                    <!-- <p id="error-message"></p> -->
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <footer>
        <div class="fixed-bottom text-center p-1 bg-custom">
            © 2023 PT Musi Kalijaya
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <!-- <script type="module" src="<?= base_url('/assets/js/fireConfig.js'); ?>"></script>

    <script type="module" src="<?= base_url('/assets/js/register.js'); ?>"></script> -->

    <script type="module">
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
        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries

        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
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
        //----- End
    </script>


</body>

</html>