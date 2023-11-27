function downloadPDF() {
    // Membuat instance dari jsPDF
    const doc = new jsPDF();

    // Mengambil elemen div yang ingin dikonversi
    const content = document.getElementById('nama-div');

    // Mengambil lebar konten pada div
    const width = content.offsetWidth;

    // Mengkonversi konten menjadi PDF dengan lebar yang sesuai
    doc.html(content, {
        callback: function (doc) {
            doc.save('file.pdf');
        },
        x: 0,
        y: 0,
        html2canvas: {
            width: width
        }
    });
}