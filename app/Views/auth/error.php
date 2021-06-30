<?= $this->extend('templates/admin_template') ?>
<?= $this->section('content') ?>	
    <div class="container-fluid">
        <div class="text-center">
            <div class="error mx-auto" data-text="401">401</div>
            <p class="lead text-gray-800 mb-5">Unauthorized User</p>
            <p class="text-gray-500 mb-0">It looks like you will not be able to access this page</p>
            <a href="<?= site_url('users/index')?>">← Back to Dashboard</a>
        </div>
    </div>
<?= $this->endSection() ?>