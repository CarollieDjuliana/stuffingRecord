<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Tampilan Spreadsheet</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Contoh Spreadsheet</h1>
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSk5YOzJdMXHiBGQhxZmrj287qllRwmqSDSJMrOl7e4wRMzaVlb09gfD_vBoP6LSSgGTJbI1qeFRX97/pubhtml"></iframe>
        </div>
        <a class="btn btn-primary mt-3" href="https://docs.google.com/spreadsheets/d/e/2PACX-1vSk5YOzJdMXHiBGQhxZmrj287qllRwmqSDSJMrOl7e4wRMzaVlb09gfD_vBoP6LSSgGTJbI1qeFRX97/pub?output=xlsx" download="nama_file_yang_diinginkan.xlsx">Unduh Spreadsheet</a>
    </div>
</body>

</html> -->

<!DOCTYPE html>
<html>

<head>
    <style>
        /* CSS untuk mengatur tampilan tabel */
        .table-container {
            max-width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1>Data Aktivitas</h1>
    <div class="table-container">
        <table id="activity-table">
            <thead>
                <tr>
                    <th>Container Number</th>
                    <th>OOLU 013660-6</th>
                    <th>OOLHTL 7142</th>
                    <th>FTAU 157914-0</th>
                    <th>Seal Number</th>
                    <th>OOLHTL 7143</th>
                    <th>Stuffing Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Item</td>
                    <td>Judgement</td>
                    <td>NO</td>
                    <td>YES</td>
                    <td>Action</td>
                    <td>NO</td>
                    <td>YES</td>
                    <td>Action</td>
                </tr>
                <!-- Baris data aktivitas akan ditambahkan di sini -->
            </tbody>
        </table>
    </div>
    <button id="add-column">Tambah Kolom</button>

    <script>
        // JavaScript untuk menambahkan kolom dan isi kolom
        document.getElementById("add-column").addEventListener("click", function() {
            var table = document.getElementById('activity-table');
            var headerRow = table.getElementsByTagName('thead')[0].getElementsByTagName('tr')[0];
            var newRow = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr')[0];

            // Tambahkan kolom baru
            var newHeaderCell = document.createElement('th');
            newHeaderCell.textContent = 'New Column';
            headerRow.appendChild(newHeaderCell);

            // Tambahkan isi kolom baru
            var newCell = document.createElement('td');
            newCell.innerHTML = 'X';
            newRow.appendChild(newCell);
        });
    </script>
</body>

</html>