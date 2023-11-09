<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form id="myForm">
        <label for="quantity">Masukkan jumlah: </label>
        <input type="text" id="quantity" name="quantity" placeholder="Angka">
        <input type="text" id="pattern" name="pattern" placeholder="D20 atau D60">
        <input type="submit" value="Submit">
    </form>

</body>
<script>
    document.getElementById('myForm').addEventListener('submit', function(e) {
        e.preventDefault();

        // Dapatkan nilai dari kedua input
        const quantityValue = document.getElementById('quantity').value;
        const patternValue = document.getElementById('pattern').value;

        // Gabungkan nilai dari kedua input
        const combinedValue = quantityValue + patternValue;

        // Lakukan sesuatu dengan nilai yang telah digabung
        console.log('Nilai gabungan:', combinedValue);

        // Atau kirim nilai gabungan ke server
        // Misalnya, Anda dapat menggunakan JavaScript atau AJAX untuk mengirimnya ke server.
    });
</script>

</html>