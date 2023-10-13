<?= $this->extend('/layout/template'); ?>

<?= $this->section('content'); ?>
<link href="<?= base_url('/assets/css/stylePdf.css'); ?>" rel="stylesheet" type="text/css">

<style>
    /* Style untuk setiap tabel */
    .table {
        width: 48%;
        /* Lebar masing-masing tabel */
        border-collapse: collapse;
        margin-bottom: 20px;
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ddd;
    }

    table th,
    table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    table th {
        background-color: transparent;
        font-weight: bold;
        color: #333;
    }

    /* style-cetak.css */

    .cetak-hilang {
        display: none;
    }

    /* Gaya tambahan untuk tampilan cetakan, seperti menghilangkan padding, margin, dll. */
    @media print {
        button {
            display: none;
        }

        .sidebar,
        .navbar,
        .ruler {
            display: none;
        }

        .ruler {
            display: none;
        }

        body {
            text-align: center;
            margin: 4px auto;

        }
    }
</style>

<!-- Tabel Bootstrap untuk Menampilkan Data -->

<body>

    <!-- Tombol "Download PDF" -->
    <!-- <a href="<?= base_url('downloadPdf') ?>" class="btn btn-primary">Download PDF</a> -->
    <button onclick="printCustomView()">Unduh PDF</button>

    <!-- Header/Kop -->
    <div class="header">
        <img src="/assets/images/logoWithText.png">
        <h3>STUFFING INSPECTION RECORD <br> PT. MUSI KALIJAYA PALEMBANG
        </h3>
    </div>

    <!-- Garis Pemisah -->
    <hr>

    <div class="content">
        <div class="section">
            <div class="two-tables table-responsive">
                <table class="table">
                    <tr>
                        <th>SHIPPER</th>
                        <td>:</td>
                        <td id="shipper"></td>
                    </tr>
                    <tr>
                        <th>CONTRACT NO</th>
                        <td>:</td>
                        <td id="no_booking"></td>
                    </tr>
                    <tr>
                        <th>TERM</th>
                        <td>:</td>
                        <td id="term"></td>
                    </tr>
                </table>

                <table class="table">
                    <tr>
                        <th>COMMODITY</th>
                        <td>:</td>
                        <td id="comodity"></td>
                    </tr>
                    <tr>
                        <th>QUANTITY</th>
                        <td>:</td>
                        <td id="quantity"></td>
                    </tr>
                    <tr>
                        <th>GRADE</th>
                        <td>:</td>
                        <td id="grade"></td>
                    </tr>
                </table>

                <table class="table">
                    <tr>
                        <th>SHIPPING LINE</th>
                        <td>:</td>
                        <td id="shipping_line"></td>
                    </tr>
                    <tr>
                        <th>VASSEL NAME</th>
                        <td>:</td>
                        <td id="vassel_name"></td>
                    </tr>
                    <tr>
                        <th>VOYAGE</th>
                        <td>:</td>
                        <td id="voyage"></td>
                    </tr>
                </table>
            </div>
        </div>


        <div class="section">
            <div class="two-tables table-responsive">
                <table class="table">
                    <tr>
                        <th>PORT OF LOADING</th>
                        <td>:</td>
                        <td id="port_of_loading"></td>
                    </tr>
                    <tr>
                        <th>DESTINATION</th>
                        <td>:</td>
                        <td id="destination"></td>
                    </tr>
                    <tr>
                        <th>E.T.D</th>
                        <td>:</td>
                        <td id="etd"></td>
                    </tr>
                </table>
                <table class="table">
                    <tr>
                        <th>STUFFING PLACE</th>
                        <td>:</td>
                        <th id="stuffing_place"></th>
                    </tr>
                    <tr>
                        <th>STUFFING BY</th>
                        <td>:</td>
                        <th id="stuffing_by"></th>
                    </tr>
                    <tr>
                        <th>LOCATION</th>
                        <td>:</td>
                        <th id="location"></th>
                    </tr>
                </table>

                <table class="table">
                    <tr>
                        <th>WEATHER</th>
                        <td>:</td>
                        <th id="weather"></th>
                    </tr>

                </table>
            </div>
        </div>

        <div class="section">
            <h4 style="text-align: center;">RUBBER CONDITION AT RECEIVING</h4>
            <div class="two-tables table-responsive">
                <table class="table">
                    <tr>
                        <th>RUBBER DELIVERED TO STUFFING PLACE BY TRUCKS / BARGES</th>
                        <td>SHIPPER</td>
                    </tr>
                    <tr>
                        <th>FOREIGN MATTERS CONTAMINATION</th>
                        <td>NO</td>
                    </tr>
                    <tr>
                        <th>WET/DAMAGE</th>
                        <td>NO</td>
                    </tr>
                    <tr>
                        <th>BALE DEFORMATION / PALLETS DAMAGE</th>
                        <td>NO</td>
                    </tr>
                </table>
                <table class="table">
                    <tr>
                        <th>PALLETS WITH BORES</th>
                        <td>NO</td>
                    </tr>
                    <tr>
                        <th>IS THE SHIPPER / PRODUCER INFORM OF THE PROBLEM </th>
                        <td>NO</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="section">
            <div class="two-tables table-responsive">
                <table class="table">
                    <tr>
                        <th>STUFFING PLACE</th>
                        <td>:</td>
                        <td>STUFFING PLACE</td>
                    </tr>
                    <tr>
                        <th>STUFFING BY</th>
                        <td>:</td>
                        <td>STUFFING BY</td>
                    </tr>
                    <tr>
                        <th>LOCATION</th>
                        <td>:</td>
                        <td>LOCATION</td>
                    </tr>
                </table>

                <table class="table">
                    <tr>
                        <th>WEATHER</th>
                        <td>:</td>
                        <td>WEATHER</td>
                    </tr>

                </table>
            </div>
        </div>

        <div class="section">
            <div class="two-tables table-responsive">
                <table class="table">
                    <tr>
                        <th colspan="2">CONTAINER NUMBER</th>
                    </tr>
                    <tr>
                        <th colspan="2">SEAL NUMBER</th>
                    </tr>
                    <tr>
                        <th colspan="2">STUFFING DATE</th>
                    </tr>
                    <tr>
                        <th>ITEM</th>
                        <th>JUDGEMENT</th>
                    </tr>
                    <tr>
                        <td rowspan="2">CEILING</td>
                        <td>HOLES</td>
                    </tr>
                    <tr>
                        <td>RUSTY / CORROSION</td>
                    </tr>
                    <tr>
                        <td rowspan="2">WALLS</td>
                        <td>HOLES</td>
                    </tr>
                    <tr>
                        <td>RUSTY / CORROSION</td>
                    </tr>
                    <tr>
                        <td rowspan="3">RIGHT SIDE</td>
                        <td>HOLES / CRACK / DAMAGE</td>
                    </tr>
                    <tr>
                        <td>LOSEN SCREW / BOLT</td>
                    </tr>
                    <tr>
                        <td>RUSTY / CORROSION</td>
                    </tr>
                    <tr>
                        <td rowspan="3">LEFT SIDE</td>
                        <td>HOLES / CRACK / DAMAGE</td>
                    </tr>
                    <tr>
                        <td>LOSEN SCREW / BOLT</td>
                    </tr>
                    <tr>
                        <td>RUSTY / CORROSION</td>
                    </tr>
                    <tr>
                        <td rowspan="3">FLOOR</td>
                        <td>HOLES / CRACK / DAMAGE</td>
                    </tr>
                    <tr>
                        <td>LOSEN SCREW / BOLT</td>
                    </tr>
                    <tr>
                        <td>RUSTY / CORROSION</td>
                    </tr>
                    <tr>
                        <td rowspan="2">DOOR</td>
                        <td>RUBBER SEAL BROKEN</td>
                    </tr>
                    <tr>
                        <td>RUSTY / CORROSION</td>
                    </tr>
                    <tr>
                        <td rowspan="3">CLEANLINESS</td>
                        <td>WOODEN CHIPS / SPLINTER</td>
                    </tr>
                    <tr>
                        <td>PLASTIC RESIN, ETC</td>
                    </tr>
                    <tr>
                        <td>WET, OIL STAINS</td>
                    </tr>
                </table>


                <div id="containerDataContainer" class=" two-tables table-responsive"></div>

            </div>


        </div>

    </div>
    </div>

    <div class="section">
        <div class="documentation">
            <div class="container mt-4">
                <h1>Dokumentasi</h1>
                <p>Berikut merupakan dokumentasi dari prosess stuffing yang telah berjalan </p>
                <div class="row" id="photoGallery">
                    <!-- Gambar akan ditampilkan di sini -->
                </div>
            </div>
        </div>
    </div>

    </div>

</body>


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

<script type="module" src="<?= base_url('/assets/js/showData.js'); ?>"></script>

<?= $this->endSection(); ?>