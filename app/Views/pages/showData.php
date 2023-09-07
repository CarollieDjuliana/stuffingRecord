<?= $this->extend('/layout/template'); ?>

<?= $this->section('content'); ?>

<body>

    <ul class="nav nav-pills justify-content-end mt-3">
        <li class="nav-item ">
            <button type="button" class="btn btn-primary btn-lg ps-5 px-5 "> Print <i class="fa-solid fa-print"></i> </button>
        </li>
        <li class="nav-item">
            <button type="button" class="btn btn-outline-warning btn-lg mx-5">Edit </button>
        </li>
    </ul>


</body>

<?= $this->endSection(); ?>