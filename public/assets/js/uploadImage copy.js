// Tambahkan kode JavaScript Anda di sini
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
        video.dataset.index = button.getAttribute('data-index'); // Set indeks form yang aktif

        const canvas = document.createElement('canvas');
        const context = canvas.getContext('2d');

        const constraints = {
            video: {
                facingMode: 'environment' // 'environment' digunakan untuk kamera belakang
            }
        };

        navigator.mediaDevices.getUserMedia(constraints)
        .then((stream) => {
            video.srcObject = stream;
            video.play();

            $('#cameraModal').modal('show'); // Tampilkan modal
        })
        .catch((error) => {
            console.error('Error accessing webcam: ', error);
        });
    });
});


function stopCamera() {
    const video = document.getElementById('cameraView');
    const stream = video.srcObject;

    if (stream) {
        const tracks = stream.getTracks();

        tracks.forEach((track) => {
            track.stop();
        });

        video.srcObject = null;
    }
}


// Event listener untuk tombol Capture Image
document.getElementById('captureButton').addEventListener('click', () => {
    const index = document.getElementById('cameraView').getAttribute('data-index'); // Ambil indeks form yang aktif
    const video = document.getElementById('cameraView');
    captureImage(index, video);

    
    $('#cameraModal').modal('hide'); // Tutup modal ketika capture
    stopCamera(); // Hentikan stream media saat modal ditutup
});


document.getElementById('closeButton').addEventListener('click', () => {
    stopCamera();
});

document.getElementById('closeButton_x').addEventListener('click', () => {
    stopCamera();
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

        const shipper = new URLSearchParams(window.location.search).get("shipper");
        const no_booking = new URLSearchParams(window.location.search).get("no_booking");
        const container = new URLSearchParams(window.location.search).get("container");
// Event listener untuk tombol Upload Gambar
document.querySelectorAll('[id^="uploadButton"]').forEach((uploadButton, index) => {
    uploadButton.addEventListener('click', () => {
        const fileInput = document.getElementById('fileInput' + index);
        const selectedFile = fileInput.files[0];
        const capturedImage = document.getElementById('capturedImage' + index);
        const selectedImage = document.getElementById('selectedImage' + index);
        const uploadedImage = document.getElementById('uploadedImage' + index);
        const uploadedText = document.getElementById('uploadedText' + index);

        let fileToUpload;
       
        // Memilih file yang akan di-upload (selectedFile atau yang di-capture)
        if (selectedFile) {
            fileToUpload = selectedFile;
        } else {
            const dataURL = capturedImage.src;
            const blob = dataURItoBlob(dataURL);
            fileToUpload = new File([blob], 'captured-image.jpg');
        }

        if (fileToUpload) {
            const imageName = uploadButton.name + ' - ' + shipper + ' - ' + no_booking + '.jpg';
            console.log(imageName);
            // Definisikan path penyimpanan di Firebase Storage
            const storageRef = ref(storage, 'images/'+ shipper +'/'+ no_booking +'/'+ container+ '/'+ imageName);

            // Lakukan upload gambar
            const uploadTask = uploadBytes(storageRef, fileToUpload, {
                contentType: 'image/jpeg'
            });

            // Setelah berhasil mengunggah gambar
            uploadTask.then((snapshot) => {
                console.log('Gambar berhasil diupload untuk form ' + index);

                // Reset gambar yang ditampilkan
                capturedImage.style.display = 'none';
                selectedImage.style.display = 'none';
                uploadedImage.style.display = 'none'; // Tampilkan gambar yang diunggah
                uploadedText.style.display = 'block'; // Tampilkan teks "Uploaded"
                fileInput.type = 'text'; // Reset input file
                fileInput.type = 'file'; // Kembalikan tipe ke file

                // Ubah ukuran gambar yang diunggah (misalnya, lebarnya menjadi 100 piksel)
                uploadedImage.style.maxWidth = '250px'; // Sesuaikan ukuran sesuai kebutuhan

                // Ambil URL gambar dari Firebase Storage
                getDownloadURL(ref(storage, 'images/'+ shipper +'/'+ no_booking +'/'+ container+ '/'+ imageName))
                    .then((url) => {
                        // Tampilkan gambar yang diupload di tempat preview
                        uploadedImage.src = url;
                        const photoList = document.getElementById('photoList' + index);
                        displayPhotos(photoList, index);
                    })
                    .catch((error) => {
                        console.error('Error saat mengambil URL gambar:', error);
                    });

             
                // Kode lainnya untuk menutup modal, menghentikan akses webcam, dll. (lengkapi)
               
            }).catch((error) => {
                console.error('Error saat mengupload gambar:', error);
            });
        } else {
            console.log('Pilih file gambar terlebih dahulu.');
        }
    });
});


      // Tambahkan variabel global untuk melacak jumlah total foto dan jumlah foto yang sudah diunggah
      let totalPhotos = 6; // Ubah sesuai jumlah foto yang diharapkan
      let successfullyFetchedPhotos = 0;

        // Fungsi untuk menambahkan jumlah foto yang berhasil diambil
        function onImageFetchSuccess() {
            successfullyFetchedPhotos += 1;
            console.log(`Foto yang berhasil diambil: ${successfullyFetchedPhotos}`);
            updateDisplayRatio();
        }

        // Fungsi untuk memperbarui tampilan rasio
        function updateDisplayRatio() {
            const ratioText = `${successfullyFetchedPhotos}/${totalPhotos}`;
            console.log(`Rasio URL yang berhasil diambil: ${ratioText}`);
            // Tampilkan rasio di elemen HTML (gantilah dengan elemen yang sesuai)
            document.getElementById('photoDisplayRatio').textContent = ratioText;
        }
        // Panggil displayPhotos untuk masing-masing jenis foto
        displayPhotos(document.getElementById('photoList0'), 0);
        displayPhotos(document.getElementById('photoList1'), 1);
        displayPhotos(document.getElementById('photoList2'), 2);
        displayPhotos(document.getElementById('photoList3'), 3);
        displayPhotos(document.getElementById('photoList4'), 4);
        displayPhotos(document.getElementById('photoList5'), 5);

    // Fungsi untuk menampilkan daftar foto dari Firebase Storage
function displayPhotos(photoList, index) {
    const uploadButton = document.getElementById('uploadButton' + index);
    const uploadedText = document.getElementById('uploadedText' + index);
    // Referensi ke direktori penyimpanan gambar di Firebase Storage
    const imageName = uploadButton.name + ' - ' + shipper + ' - ' + no_booking + '.jpg';
    console.log(imageName);
      // Kosongkan daftar foto sebelum memuat data baru
      photoList.innerHTML = '';

    // Ambil URL gambar dari Firebase Storage
    getDownloadURL(ref(storage, 'images/'+ shipper +'/'+ no_booking +'/'+ container+ '/'+ imageName))
        .then((url) => {
            // Tampilkan gambar di daftar foto
            const img = document.createElement('img');
            img.src = url;
            photoList.appendChild(img);

             // Mengatur ukuran gambar yang ditampilkan
             img.style.width = '250px'; 
             uploadedText.style.display = 'block';
             
           // Memanggil fungsi onImageFetchSuccess
           onImageFetchSuccess();
             
        })
        .catch((error) => {
            if (error.code === 'storage/object-not-found') {
                // Jika gambar tidak ditemukan di Firebase Storage, tidak perlu menampilkan pesan error.
                // Anda dapat menggantinya dengan pesan kosong atau mengabaikannya.
                console.log('Gambar tidak ditemukan di Firebase Storage.');
            } else {
                // Handle error lainnya
                console.error('Error saat mengambil URL gambar:', error);
            }
        });
}


    // Lanjutkan dengan memanggil displayPhotos untuk jenis-jenis foto lainnya
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
