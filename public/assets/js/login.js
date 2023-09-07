// login.js
document.getElementById("login-form").addEventListener("submit", function (e) {
    e.preventDefault();

    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var errorMessage = document.getElementById("error-message");

    firebase.auth().signInWithEmailAndPassword(email, password)
        .then(function () {
            // Login berhasil, Anda dapat mengarahkan pengguna ke halaman lain atau melakukan tindakan yang sesuai.
            console.log("Login berhasil");
        })
        .catch(function (error) {
            // Login gagal, tampilkan pesan kesalahan
            var errorCode = error.code;
            var errorMessage = error.message;
            console.error("Error code: " + errorCode);
            console.error("Error message: " + errorMessage);
            errorMessage.textContent = errorMessage;
        });
});
