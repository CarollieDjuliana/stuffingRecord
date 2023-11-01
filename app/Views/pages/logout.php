<script type="module">
    import {
        getAuth,
        signOut
    } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-auth.js";

    import {
        firebaseApp
    } from './assets/js/fireConfig.js';


    const auth = getAuth();
    console.log(firebaseApp);


    signOut(auth)
        .then(() => {
            window.location.href = '/login';
            console.log("logout sukses");
        })
        .catch((error) => {

            console.error("Logout error: ", error);
            // Redirect ke halaman login atau halaman lain yang sesuai
            window.location.href = '/login';
        });
</script>