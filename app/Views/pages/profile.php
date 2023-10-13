<?= $this->extend('/layout/template'); ?>

<?= $this->section('content'); ?>
<style>
    body {}

    .profile-container {
        text-align: center;
    }

    .profile-header {
        margin-bottom: 20px;
    }

    .profile-picture {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
    }

    .user-name {
        margin: 10px 0;
        font-size: 1.5em;
    }

    .user-email {
        color: #555;
        margin-bottom: 20px;
    }

    .additional-info {
        color: #777;
    }
</style>

<body>
    <div class="profile-container">
        <div class="profile-header">
            <span><i class="fa-solid fa-user fa-5x"></i></span>
        </div>
        <div class="profile-info">
            <h2 class="user-name">John Doe</h2>
            <p class="user-email">john.doe@example.com</p>
            <p class="additional-info">Additional Information</p>
        </div>
    </div>
</body>

</html>



<?= $this->endSection(); ?>