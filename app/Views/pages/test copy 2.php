<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webcam Capture and Upload</title>
    <!-- Sertakan Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <!-- Tombol untuk Membuka Popup Kamera -->
    <button id="openCameraButton" class="btn btn-primary">Open Camera</button>

    <!-- Modal untuk Menampilkan Kamera -->
    <div class="modal fade" id="cameraModal" tabindex="-1" role="dialog" aria-labelledby="cameraModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cameraModalLabel">Camera View</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <video id="cameraView" autoplay></video>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="captureButton" class="btn btn-primary">Capture Image</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Tampilkan Gambar yang Diambil -->
    <img id="capturedImage" style="display: none;" alt="Captured Image">

    <!-- Tombol untuk Upload Gambar -->
    <input type="file" id="fileInput" accept="image/*">
    <button id="uploadButton" class="btn btn-success">Upload Image</button>

    <!-- Sertakan Bootstrap JS (wajib) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Sertakan Firebase Konfigurasi dan Kode -->
    <script type="module">
        import {
            initializeApp
        } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-app.js";
        import {
            getStorage,
            ref,
            uploadBytes
        } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-storage.js";

        // Inisialisasi Firebase
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
        const storage = getStorage(app);
        let capturedImageData = null;
        let stream = null; // Untuk menyimpan referensi stream webcam

        // Fungsi untuk mengambil gambar dari webcam
        function captureImage() {
            const video = document.getElementById('cameraView');
            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');
            const capturedImage = document.getElementById('capturedImage');

            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            context.drawImage(video, 0, 0, canvas.width, canvas.height);

            // Menampilkan gambar yang diambil di elemen <img>
            capturedImage.src = canvas.toDataURL('image/jpeg');
            capturedImage.style.display = 'block';

            // Simpan data gambar yang diambil untuk mengunggahnya nanti
            capturedImageData = canvas.toDataURL('image/jpeg');
        }

        // Event listener untuk tombol Open Camera
        document.getElementById('openCameraButton').addEventListener('click', () => {
            const video = document.getElementById('cameraView');
            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');

            navigator.mediaDevices.getUserMedia({
                    video: true
                })
                .then((streamData) => {
                    stream = streamData;
                    video.srcObject = stream;
                    video.play();
                })
                .catch((error) => {
                    console.error('Error accessing webcam: ', error);
                });

            $('#cameraModal').modal('show'); // Tampilkan modal
        });

        // Event listener untuk tombol Capture Image
        document.getElementById('captureButton').addEventListener('click', () => {
            captureImage();
            $('#cameraModal').modal('hide'); // Tutup modal ketika capture
        });

        // Event listener untuk tombol Upload Gambar
        document.getElementById('uploadButton').addEventListener('click', () => {
            const fileInput = document.getElementById('fileInput');
            const selectedFile = fileInput.files[0];

            if (selectedFile || capturedImageData) {
                const imageToUpload = selectedFile ? selectedFile : dataURItoBlob(capturedImageData);

                // Definisikan path penyimpanan di Firebase Storage
                const storageRef = ref(storage, 'images/' + (selectedFile ? selectedFile.name : 'captured-image-' + Date.now() + '.jpg'));

                // Lakukan upload gambar
                const uploadTask = uploadBytes(storageRef, imageToUpload, {
                    contentType: 'image/jpeg'
                });

                uploadTask.then((snapshot) => {
                    console.log('Gambar berhasil diupload.');
                    // Reset gambar yang ditampilkan
                    document.getElementById('capturedImage').style.display = 'none';
                    fileInput.value = '';

                    // Tutup modal
                    $('#cameraModal').modal('hide');

                    // Hentikan akses webcam
                    if (stream) {
                        stream.getTracks().forEach((track) => {
                            track.stop();
                        });
                    }
                }).catch((error) => {
                    console.error('Error saat mengupload gambar:', error);
                });
            } else {
                console.log('Pilih file gambar atau ambil gambar terlebih dahulu.');
            }
        });

        // Konversi data URI ke Blob
        function dataURItoBlob(dataURI) {
            const byteString = atob(dataURI.split(',')[1]);
            const mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];
            const ab = new ArrayBuffer(byteString.length);
            const ia = new Uint8Array(ab);
            for (let i = 0; i < byteString.length; i++) {
                ia[i] = byteString.charCodeAt(i);
            }
            return new Blob([ab], {
                type: mimeString
            });
        }
    </script>
</body>

</html>