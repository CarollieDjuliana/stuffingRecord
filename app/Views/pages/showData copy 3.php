<?= $this->extend('/layout/template'); ?>

<?= $this->section('content'); ?>
<link href="<?= '/assets/css/stylePdf.css'; ?>" rel="stylesheet" type="text/css">

<style>
    .table {
        table-layout: fixed;
        border-collapse: collapse;
        border-collapse: collapse;
        border: 1px solid #ddd;
        font-size: 10px;
    }

    .table-container {
        display: flex;
        justify-content: space-between;

    }

    table th,
    table td {
        background-color: white;
        border: 1px solid #ddd;
        text-align: left;
        word-wrap: break-word;
        white-space: nowrap;
        width: 50px;
        text-overflow: ellipsis;
        /* Set a fixed width for cells */
    }

    table th {
        font-weight: bold;
        color: #333;
        padding: 0px;
    }

    table.tg td,
    table.tg th {
        text-align: left;
        white-space: nowrap;
        word-wrap: break-word;
        /* Tetapkan nowrap untuk mencegah pemutaran otomatis */
        font-size: 10px;
        padding: 4px;
    }

    table.claim td,
    table.claim th {
        text-align: left;
        white-space: nowrap;
        word-wrap: break-word;
        font-size: 45%;
        padding: 4px;
        width: 5%;
        /* Adjust the width as needed */
    }



    p {
        font-size: 10px;
        padding: 4px;
        margin: 5px;
    }

    table.tg {
        margin: 0 auto;
    }

    table.bottom td,
    table.bottom th {
        font-size: 10px;
        padding: 3px;
        background-color: transparent;
        border: none;
    }

    table.bottom {
        background-color: transparent;
        border: none;
    }

    .section_ {
        padding: 0px;
    }

    /* Gaya tambahan untuk tampilan cetakan */
    @media print {
        title {
            display: none;
        }

        @page {
            size: A4 landscape;
        }

        @page :first {
            @top-center {
                content: "Your Header Content Here";
                font-size: 12px;
                /* Adjust font size as needed */
            }
        }

        @page {
            @top-center {
                content: "Your Header Content Here";
                font-size: 12px;
                /* Adjust font size as needed */
            }
        }

        .section {
            margin-top: 100px;
            /* Add margin for sections on new pages */
        }

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
            margin: auto;
            /* font-size: 10px; */

        }

        @top-left {
            content: none;
        }

        .teks-halaman {
            display: block;
            position: fixed;
            top: 10px;
            left: 10px;
            margin: 50px;
        }


        /* table.tg td,
        table.tg th {
            text-align: left;
            white-space: nowrap;
            word-wrap: break-word;
            font-size: 10px;
            padding: 4px;
        } */

        table.claim th,
        table.claim td {
            font-size: 45%;
            /* Adjust font size for print mode */
            word-wrap: break-word;
            /* Ensure word-wrap in print mode */
            width: 5%;
            /* Adjust the width as needed */
        }

        p {
            text-align: center;
        }

        table th,
        table td {
            font-size: inherit;
            /* Inherit font size from the body */
        }

        p {
            font-size: inherit;
            /* Inherit font size from the body */
        }

        .documentation {
            page-break-before: always;
        }

    }
</style>

<!-- Tabel Bootstrap untuk Menampilkan Data -->

<head>
    <title>Contoh Halaman Cetak</title>
</head>

<body>

    <!-- Tombol "Download PDF" -->
    <!-- <a href="<?= 'downloadPdf' ?>" class="btn btn-primary">Download PDF</a> -->
    <button onclick="printCustomView()">Print PDF</button>
    <button id="edit-button">Edit Data</button>

    <!-- Header/Kop -->
    <div class="header">
        <img style="width: 28%" src="/assets/images/logoWithText.png">
        <p style="font-size: 12px;">STUFFING INSPECTION RECORD <br> PT. MUSI KALIJAYA PALEMBANG
        </p>
    </div>

    <!-- Garis Pemisah -->
    <hr>


    <div class="section_">
        <div class="table-container  table-responsive">
            <table class="tg">
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
                <tr>
                    <th>COMMODITY</th>
                    <td>:</td>
                    <td id="commodity"></td>
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
            <table class="tg">
                <tr>
                    <th>SHIPPING LINE</th>
                    <td>:</td>
                    <td id="shipping_line"></td>
                </tr>
                <tr>
                    <th>VESSEL NAME</th>
                    <td>:</td>
                    <td id="vessel_name"></td>
                </tr>
                <tr>
                    <th>VOYAGE</th>
                    <td>:</td>
                    <td id="voyage"></td>
                </tr>
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
            <table class="tg">
                <tr>
                    <th>STUFFING PLACE</th>
                    <td>:</td>
                    <td id="stuffing_place"></td>
                </tr>
                <tr>
                    <th>STUFFING BY</th>
                    <td>:</td>
                    <td id="stuffing_by"></td>
                </tr>
                <tr>
                    <th>LOCATION</th>
                    <td>:</td>
                    <td id="location"></td>
                </tr>
                <tr>
                    <th>WEATHER</th>
                    <td>:</td>
                    <td id="weather"></td>
                </tr>
            </table>
        </div>
    </div>


    <div class="section_">
        <h6 style="text-align: center;font-size: 10px;">RUBBER CONDITION AT RECEIVING</h6>
        <div class="table-container  table-responsive">
            <table class="tg">
                <tr>
                    <th>RUBBER DELIVERED TO STUFFING PLACE BY TRUCKS / BARGES</th>
                    <td>:</td>
                    <td id="shipper2"></td>
                </tr>
                <tr>
                    <th>FOREIGN MATTERS CONTAMINATION</th>
                    <td>:</td>
                    <td>NO</td>
                </tr>
                <tr>
                    <th>WET/DAMAGE</th>
                    <td>:</td>
                    <td>NO</td>
                </tr>
                <tr>
                    <th>BALE DEFORMATION / PALLETS DAMAGE</th>
                    <td>:</td>
                    <td>NO</td>
                </tr>
            </table>
            <table class="tg">
                <tr>
                    <th>PALLETS WITH BORES</th>
                    <td>:</td>
                    <td colspan="2">NO</td>
                </tr>
                <tr>
                    <th>IS THE SHIPPER / PRODUCER INFORM OF THE PROBLEM </th>
                    <td>:</td>
                    <td colspan="2">NO/YES</td>
                </tr>
                <tr>
                    <th>IF YES: </th>
                    <td>DATE :</td>
                    <td>TIME :</td>
                    <td>HOURS :</td>
                </tr>
                <tr>
                    <th colspan="4">BY PHONE / FAX / INREASON / OTHERS</th>
                </tr>
            </table>
        </div>
    </div>

    <div class="section_">
        <div class=" table-container table-responsive">
            <table class="claim">
                <thead>
                    <tr>
                        <th rowspan="3">CONTAINER <br> NUMBER</th>
                        <th rowspan="3">SEAL <br> NUMBER</th>
                        <th rowspan="3">STUFFING <br> DATE</th>
                        <th colspan="18">ITEM</th>
                    </tr>
                    <tr>
                        <th colspan="2">CEILING</th>
                        <th colspan="2">WALLS</th>
                        <th colspan="3">RIGHT SIDE</th>
                        <th colspan="3">LEFT SIDE</th>
                        <th colspan="3">FLOOR</th>
                        <th colspan="2">DOOR</th>
                        <th colspan="3">CLEANLINESS</th>
                    </tr>
                    <tr>
                        <th>HOLES</th>
                        <th>RUSTY /<br> CORROSION</th>
                        <th>HOLES</th>
                        <th>RUSTY /<br> CORROSION</th>
                        <th>HOLES /<br> CRACK /<br> DAMAGE</th>
                        <th>LOSEN <br> SCREW /<br> BOLT</th>
                        <th>RUSTY /<br> CORROSION</th>
                        <th>HOLES /<br> CRACK /<br> DAMAGE</th>
                        <th>LOSEN <br> SCREW /<br> BOLT</th>
                        <th>RUSTY /<br> CORROSION</th>
                        <th>HOLES /<br> CRACK /<br> DAMAGE</th>
                        <th>LOSEN SCREW /<br> BOLT</th>
                        <th>RUSTY /<br> CORROSION</th>
                        <th>RUBBER <br>SEAL BROKEN</th>
                        <th>RUSTY /<br> CORROSION</th>
                        <th>WOODEN <br> CHIPS /<br> SPLINTER</th>
                        <th>PLASTIC <br>RESIN,<br> ETC</th>
                        <th>WET,<br> OIL <br> STAINS</th>
                    </tr>
                </thead>
                <tbody id="containerDataContainer">
                    <!-- <div id="containerDataContainer"> -->
                </tbody>
            </table>
        </div>
        <p style="text-align: left;">JUDGEMENT CAN BE : YES/NO/ACTION</p>
    </div>
    <div class="section_">
        <div class="table-container  table-responsive">
            <table class="bottom">
                <tr>
                    <th>INSPECTED BY : </th>
                    <td id="inspected_by"></td>
                </tr>
                <tr>
                    <th>SIGNATURE : </th>
                    <td></td>
                </tr>
            </table>
            <table class="bottom">
                <tr>
                    <th>DATE : </th>
                    <td></td>
                </tr>
                <tr>
                    <th></th>
                    <td></td>
                </tr>
            </table>
            <table class="bottom">
                <tr>
                    <th>REMARKS : </th>
                    <td></td>
                <tr>
                    <th></th>
                    <td></td>
                </tr>
                </tr>
            </table>
            <table class="bottom">
                <tr>
                    <th>ACKNOWLEDGED BY : </th>
                    <td id="shipper3"></td>
                </tr>
                <tr>
                    <th>NAME : </th>
                    <td id="stuffing_by"></td>
                </tr>
            </table>
        </div>
    </div>


    <div class="section_">
        <div class="documentation">
            <div class="container">
                <h5>Dokumentasi</h5>
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
    function cetakHalaman() {
        window.print();
    }
    // Fungsi untuk mencetak tampilan khusus ke PDF
    function printCustomView() {
        var teksHalaman = document.createElement('div');
        teksHalaman.className = 'teks-halaman';
        teksHalaman.textContent = 'Stuffing Record PT Musi Kalijaya';

        var semuaHalaman = document.querySelectorAll('.teks-halaman');
        for (var i = 0; i < semuaHalaman.length; i++) {
            semuaHalaman[i].remove();
        }

        document.body.appendChild(teksHalaman);

        // Mencetak halaman
        window.print();
    }
</script>


<script type="module" src="<?= '/assets/js/showData.js'; ?>"></script>

<?= $this->endSection(); ?>