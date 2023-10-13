<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style-cetak.css"> <!-- Tambahkan ini -->
    <title>Template PDF</title>
</head>

<body>
    <!-- Elemen-elemen yang ingin Anda cetak -->
    <div class="header">
        <h1>Kop / Judul Anda</h1>
    </div>
    <hr>
    <div class="content">
        <!-- Isi data Anda di sini -->
        <p>helooo kamu carolline</p>
    </div>

    <!-- Tombol untuk mencetak tampilan khusus -->
    <button onclick="printCustomView()">Unduh PDF</button>

    <script>
        // Fungsi untuk mencetak tampilan khusus ke PDF
        function printCustomView() {
            // Menghilangkan kelas cetak-hilang agar elemen-elemen tertentu tidak tersembunyi
            var cetakElems = document.querySelectorAll('.cetak-hilang');
            for (var i = 0; i < cetakElems.length; i++) {
                cetakElems[i].classList.remove('cetak-hilang');
            }

            // Mencetak tampilan dengan format CSS cetakan khusus
            window.print();

            // Mengembalikan kelas cetak-hilang setelah mencetak
            for (var i = 0; i < cetakElems.length; i++) {
                cetakElems[i].classList.add('cetak-hilang');
            }
        }
    </script>
</body>

</html>