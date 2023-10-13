<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template PDF</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .header {
        text-align: center;
        margin-top: 20px;
    }

    .content {
        margin: 20px;
    }

    hr {
        border: none;
        border-top: 1px solid #000;
        margin: 20px;
    }
</style>

<body>
    <script>
        // Definisikan variabel untuk menyimpan teks
        var textContent = `<h2>hhhh</h2>`;


        // Definisikan fungsi generatePDF
        function generatePDF() {
            // Buat dokumen PDF
            var docDefinition = {
                content: [{
                        text: 'Kop / Judul Anda',
                        style: 'header'
                    },
                    ' ',
                    // Tambahkan teks dari variabel
                    {
                        text: textContent,
                        style: 'textContent'
                    }
                ],
                styles: {
                    header: {
                        fontSize: 18,
                        bold: true,
                        alignment: 'center'
                    },
                    textContent: {
                        margin: [0, 5, 0, 15]
                    }
                }
            };

            pdfMake.createPdf(docDefinition).open();
        }
    </script>

    <script>
        document.body.innerHTML = textContent;
    </script>
    <!-- Tambahkan tombol untuk mencetak teks ke dalam PDF -->
    <button onclick="generatePDF()">Unduh PDF</button>
</body>

</html>