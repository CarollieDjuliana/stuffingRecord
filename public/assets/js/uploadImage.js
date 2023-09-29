import { initializeApp } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-app.js";
import { getStorage, ref, uploadBytes, getDownloadURL } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-storage.js";

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

// Fungsi untuk mengambil gambar dari webcam
function captureImage(index, video) {
    const canvas = document.createElement('canvas');
    const context = canvas.getContext('2d');
    const capturedImage = document.getElementById('capturedImage' + index);
    const selectedImage = document.getElementById('selectedImage' + index);

    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    context.drawImage(video, 0, 0, canvas.width, canvas.height);

    // Menampilkan gambar yang diambil di elemen <img>
    capturedImage.src = canvas.toDataURL('image/jpeg');

    const maxWidth = 300; // Lebar maksimum yang diizinkan
    const maxHeight = 300; // Tinggi maksimum yang diizinkan

    // Periksa apakah perlu menyesuaikan ukuran gambar
    if (canvas.width > maxWidth || canvas.height > maxHeight) {
        const ratio = Math.min(maxWidth / canvas.width, maxHeight / canvas.height);
        capturedImage.width = canvas.width * ratio;
        capturedImage.height = canvas.height * ratio;
    } else {
        capturedImage.width = canvas.width;
        capturedImage.height = canvas.height;
    }

    capturedImage.style.display = 'block';

    // Sembunyikan gambar yang dipilih
    selectedImage.style.display = 'none';
}

// Event listener untuk tombol Open Camera
document.querySelectorAll('[id^="openCameraButton"]').forEach((button, index) => {
    button.addEventListener('click', () => {
        const video = document.getElementById('cameraView');
        const canvas = document.createElement('canvas');
        const context = canvas.getContext('2d');

        navigator.mediaDevices.getUserMedia({
            video: true
        })
        .then((stream) => {
            video.srcObject = stream;
            video.play();

            $('#cameraModal').modal('show'); // Tampilkan modal

            // Event listener untuk tombol Capture Image
            document.getElementById('captureButton').addEventListener('click', () => {
                captureImage(index, video);
                $('#cameraModal').modal('hide'); // Tutup modal ketika capture
            });
        })
        .catch((error) => {
            console.error('Error accessing webcam: ', error);
        });
    });
});

// Event listener untuk input file
document.querySelectorAll('[id^="fileInput"]').forEach((fileInput, index) => {
    fileInput.addEventListener('change', (event) => {
        const selectedImage = document.getElementById('selectedImage' + index);
        const capturedImage = document.getElementById('capturedImage' + index);
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = (e) => {
                const img = new Image();
                img.src = e.target.result;

                img.onload = () => {
                    const maxWidth = 300; // Lebar maksimum yang diizinkan
                    const maxHeight = 300; // Tinggi maksimum yang diizinkan

                    let width = img.width;
                    let height = img.height;

                    // Periksa apakah perlu menyesuaikan ukuran gambar
                    if (width > maxWidth || height > maxHeight) {
                        const ratio = Math.min(maxWidth / width, maxHeight / height);
                        width *= ratio;
                        height *= ratio;
                    }

                    selectedImage.width = width;
                    selectedImage.height = height;

                    selectedImage.src = e.target.result;
                    selectedImage.style.display = 'block';

                    // Sembunyikan gambar yang diambil
                    capturedImage.style.display = 'none';
                };
            };

            reader.readAsDataURL(file);
        } else {
            selectedImage.style.display = 'none';
        }
    });
});

// Event listener untuk tombol Upload Gambar
document.querySelectorAll('[id^="uploadButton"]').forEach((uploadButton, index) => {
    uploadButton.addEventListener('click', () => {
        const fileInput = document.getElementById('fileInput' + index);
        const selectedFile = fileInput.files[0];

        if (selectedFile) {
            const imageName = 'captured-image-' + Date.now() + '-' + index + '.jpg';

            // Definisikan path penyimpanan di Firebase Storage
            const storageRef = ref(storage, 'images/' + imageName);

            // Lakukan upload gambar
            const uploadTask = uploadBytes(storageRef, selectedFile, {
                contentType: 'image/jpeg'
            });

            // Setelah berhasil mengunggah gambar
            uploadTask.then((snapshot) => {
                console.log('Gambar berhasil diupload untuk form ' + index);

                // Reset gambar yang ditampilkan
                document.getElementById('capturedImage' + index).style.display = 'none';
                fileInput.type = 'text'; // Reset input file
                fileInput.type = 'file'; // Kembalikan tipe ke file

                // Ambil URL gambar dari Firebase Storage
                getDownloadURL(ref(storage, 'images/' + imageName))
                    .then((url) => {
                        // Tampilkan gambar yang diupload di tempat preview
                        const uploadedImage = document.getElementById('uploadedImage' + index);
                        uploadedImage.src = url;
                        uploadedImage.style.display = 'block';
                    })
                    .catch((error) => {
                        console.error('Error saat mengambil URL gambar:', error);
                    });

                // ...
                // Kode lainnya untuk menutup modal, menghentikan akses webcam, dll.
                // ...
            }).catch((error) => {
                console.error('Error saat mengupload gambar:', error);
            });
        } else {
            console.log('Pilih file gambar terlebih dahulu.');
        }
    });
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
