// // Fungsi untuk mengambil gambar dari webcam
// function captureImage() {
//     const video = document.getElementById('cameraView');
//     const canvas = document.createElement('canvas');
//     const context = canvas.getContext('2d');
//     const capturedImage = document.getElementById('capturedImage');

//     canvas.width = video.videoWidth;
//     canvas.height = video.videoHeight;
//     context.drawImage(video, 0, 0, canvas.width, canvas.height);

//     // Menampilkan gambar yang diambil di elemen <img>
//     capturedImage.src = canvas.toDataURL('image/jpeg');
//     capturedImage.style.display = 'block';

//     // Simpan data gambar yang diambil untuk mengunggahnya nanti
//     capturedImageData = canvas.toDataURL('image/jpeg');
// }

// // Event listener untuk tombol Open Camera
// document.getElementById('openCameraButton').addEventListener('click', () => {
//     const video = document.getElementById('cameraView');
//     const canvas = document.createElement('canvas');
//     const context = canvas.getContext('2d');

//     navigator.mediaDevices.getUserMedia({ video: true })
//         .then((streamData) => {
//             stream = streamData;
//             video.srcObject = stream;
//             video.play();
//         })
//         .catch((error) => {
//             console.error('Error accessing webcam: ', error);
//         });

//     $('#cameraModal').modal('show'); // Tampilkan modal
// });

// // Event listener untuk tombol Capture Image
// document.getElementById('captureButton').addEventListener('click', () => {
//     captureImage();
//     $('#cameraModal').modal('hide'); // Tutup modal ketika capture
// });
