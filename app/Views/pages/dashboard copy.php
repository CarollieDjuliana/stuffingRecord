<?= $this->extend('/layout/template'); ?>

<?= $this->section('content'); ?>

<body>
    <div class="container-fluid p-3">
        <!-- add activity button -->
        <div class=" text-md p-5">
            <button type="button" id="add_activity" class="btn btn-warning fw-bold float-end p-3" onclick="window.location.href = '/addActivity'">ADD ACTIVITY</button>
        </div>
        <!-- search bar -->
        <div class="input-group p-3">
            <div class="form-outline">
                <input id="search-focus" type="search" id="form1" class="form-control" />
            </div>
            <button type="button" name="searchButton" class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>
        </div>
        <!-- record tabel -->
        <table class="table container-fluid table-responsive" style="max-width: 100%; width: 100%;">
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

            </tbody>
        </table>
    </div>

</body>
<script type="module" src="<?= base_url('/assets/js/dashboard.js'); ?>"></script>

<?= $this->endSection(); ?>