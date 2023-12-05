<?= $this->extend('/layout/template'); ?>

<?= $this->section('content'); ?>
<!-- <link href="<?= '/assets/css/stylePdf.css'; ?>" rel="stylesheet" type="text/css"> -->
<!-- shipper3 menandakan dia adalah shipper yg ke3 dipanggil -->
<style>
    /* body {
        font-family: Arial, sans-serif;
        font-size: 12px;
    } */

    .header {
        text-align: center;
        margin-top: 20px;

    }

    .header img {
        width: 300px;
        height: auto;
        margin-left: 20px;
    }

    table {
        width: 100%;
        max-width: 100%;
        border-collapse: collapse;
        background-color: white;
        word-wrap: break-word;
        white-space: nowrap;
    }

    th,
    td {
        text-align: left;
        white-space: nowrap;
        border: 1px solid black;
        word-wrap: break-word;
    }

    .tg td,
    .tg th {
        text-align: left;
        padding: 5px;
    }

    .bottom {
        background-color: transparent;
    }

    .bottom th,
    .bottom td {
        border: none;
    }

    .documentation {
        margin-top: 50px;
        text-align: center;
        border-top: 1px solid #ccc;
        padding-top: 20px;
    }

    .documentation img {
        max-height: 100mm;
    }

    @media (max-width: 768px) {
        table {
            font-size: 0.8rem;
        }
    }

    /* Gaya tambahan untuk tampilan cetakan */
    @media print {
        body {
            text-align: center;
            margin: auto;
            overflow-x: hidden;
        }

        .page-break {
            page-break-before: always;
            page-break-inside: avoid;
            break-after: always;
            margin-top: 20px;
        }



        .documentation img {
            width: auto;
            max-height: 100mm;
            page-break-inside: avoid;
        }

        img {
            page-break-inside: avoid;

        }

        .header {
            margin-bottom: 10px;
        }

        td {
            text-align: left;
            white-space: nowrap;
            border: 1px solid black;
            word-wrap: break-word;
        }


        .tg td,
        .tg th {
            text-align: left;
            padding-left: 20px;
        }

        table {
            width: 100%;
        }

        .tg table {
            text-align: left;
            margin: 3px;
        }


        title {
            display: none;
        }

        @page {
            size: A4 landscape;
            margin: 20px;
            transform: scale(0.6);
            transform-origin: top left;
            margin-top: 20px;
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


    }
</style>

<body>

    <!-- Tombol "Download PDF" -->
    <!-- <a href="<?= 'downloadPdf' ?>" class="btn btn-primary">Download PDF</a> -->
    <button onclick="printCustomView()">Print PDF</button>
    <button id="edit-button">Edit Data</button>

    <!-- Header/Kop -->
    <div class="header">
        <img style="width: 28%" src="/assets/images/logoWithText.png">
        <h6>STUFFING INSPECTION RECORD <br> PT. MUSI KALIJAYA PALEMBANG
        </h6>
    </div>

    <!-- Garis Pemisah -->
    <hr>

    <div class="table-container  table-responsive" style="display: flex; margin-bottom: 20px;">
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

    <h6 style="text-align: center;">RUBBER CONDITION AT RECEIVING</h6>
    <div class="table-container  table-responsive" style="display: flex; margin-bottom: 20px;">
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

    <div class="div-scale table-container table-responsive " style="margin-bottom: 20px;">
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
    <div class="table-container table-responsive" style="display: flex;">
        <table class="bottom">
            <tr>
                <th style="display:flex;">INSPECTED BY : <div style="margin-left: 10px;" id="inspected_by"></div>
            </tr>
            <tr>
                <th style="display:flex;">SIGNATURE : </th>
            </tr>
        </table>
        <table class="bottom">
            <tr>
                <th style="display:flex;">DATE : <div style="margin-left: 10px;" id="date"></div>
                </th>
            </tr>
        </table>
        <table class="bottom">
            <tr>
                <th style="display:flex;">REMARKS : </th>
            </tr>
        </table>
        <table class="bottom">
            <tr>
                <th style="display:flex;">ACKNOWLEDGED BY : <div style="margin-left: 10px;" id="shipper3"></div>
                </th>
            </tr>
            <tr>
                <th style="display:flex;">NAME : <div style="margin-left: 10px;" id="stuffing_by"></div>
                </th>
            </tr>
        </table>
    </div>

    <div class="documentation ">
        <div class="row" id="photoGallery">

            <!-- Gambar akan ditampilkan di sini -->
        </div>
    </div>


</body>



<script>
    function cetakHalaman() {
        var fileName = 'nama_file_yang_diinginkan.pdf'; // Ganti dengan nama file yang diinginkan
        var header = document.querySelector('title');
        header.innerHTML = '<meta http-equiv="content-disposition" content="attachment; filename=' + fileName + '">';
        window.print();
    }
    // Fungsi untuk mencetak tampilan khusus ke PDF
    function printCustomView() {
        var fileName = 'nama_file_yang_diinginkan.pdf';

        // Membuat elemen style untuk menyembunyikan elemen yang tidak ingin dicetak
        var style = document.createElement('style');
        style.textContent = '.no-print { display: none; }';
        document.head.appendChild(style);

        // Menyembunyikan elemen yang tidak ingin dicetak
        var noPrintElements = document.querySelectorAll('.no-print');
        for (var i = 0; i < noPrintElements.length; i++) {
            noPrintElements[i].style.display = 'none';
        }
        // Mencetak halaman
        window.print();
        location.reload();

        // Menghapus elemen style setelah mencetak
        document.head.removeChild(style);
    }
</script>

<script>
</script>


<script type="module" src="<?= '/assets/js/showData.js'; ?>"></script>

<?= $this->endSection(); ?>