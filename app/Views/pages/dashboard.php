<?= $this->extend('/layout/template'); ?>

<?= $this->section('content'); ?>

<body>
    <div class="container-fluid p-3">
        <div class="col-12 mb-3">
            <div class="d-flex justify-content-between">
                <!-- search bar -->
                <div class="input-group p-3">
                    <div class="form-outline" style="flex: 1; margin-right: 10px;">
                        <input id="search-focus" type="search" id="form1" class="form-control" placeholder="Search">
                    </div>
                    <button type="button" name="searchButton" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>

            <!-- add activity button -->
            <div class="me-auto">
                <button type="button" id="add_activity" class="btn btn-warning fw-bold float-end text-sm"
                    onclick="window.location.href = '/addActivity'">ADD ACTIVITY</button>
            </div>
        </div>
    </div>
    <!-- record tabel -->
    <div class="table-responsive mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">DATE
                        <button id="sort-date-button" class="btn btn-link">
                            <i class="fas fa-sort" style="color: #000000;"></i>
                        </button>
                    </th>
                    <th scope="col">SHIPPER</th>
                    <th scope="col">NO.BOOKING</th>
                    <th scope="col">LOCATION</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">UPDATE DATA</th>
                    <th scope="col">SHOW DATA</th>
                </tr>
            </thead>
            <tbody id="data-table-body">
                <!-- Isi tabel -->
            </tbody>
        </table>
    </div>
    </div>
</body>
<script type="module" src="<?= '/assets/js/dashboard.js'; ?>"></script>

<?= $this->endSection(); ?>