<?= $this->extend('/layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Tabel Bootstrap untuk Menampilkan Data -->
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Term</th>
                <th>Comodity</th>
                <th>Quantity</th>
                <th>Grade</th>
                <th>Shipping Line</th>
                <th>Vessel Name</th>
                <th>Voyage</th>
                <th>Port of Loading</th>
                <th>Destination</th>
                <th>E.T.D</th>
                <th>Stuffing Place</th>
                <th>Stuffing By</th>
                <th>Location</th>
                <th>Weather</th>
                <!-- ... (kolom lainnya) ... -->
            </tr>
        </thead>
        <tbody id="data-table-body">
            <!-- Data akan ditampilkan di sini -->
        </tbody>
    </table>
</div>

<script type="module" src="<?= base_url('/assets/js/showData.js'); ?>"></script>
<?= $this->endSection(); ?>