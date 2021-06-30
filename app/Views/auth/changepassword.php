<?= $this->extend('templates/auth_template') ?>
<?= $this->section('content') ?>
    <div class="col-lg-6">
    <div class="mt-5">
    <h2 align="center">Change Password</h2>
    </div>
                    <?php
                    if(session()->getFlashData('fail')):?>
                    <div class="alert alert-danger">
                        <?php echo session()->getFlashData('fail'); ?>
                    </div>
                    <?php endif ?>
        <form action="<?= base_url('auth/update') ?>" method="POST">
        <?= csrf_field(); ?>
        <?php $validation = \Config\Services::validation(); ?>
        <div class="card2 card border-0 px-4 py-5">
            <div class="row px-3"> <label class="mb-1">
                <h6 class="mb-0 text-sm">Old Password</h6></label> 
                <input type="password" name="old_password" placeholder="Enter old password"> 
                <?php if($validation->getError('old_password')) {?>
                    <p class='text-danger'>
                        <?= $error = $validation->getError('old_password'); ?>
                    </p>
                <?php }?>
            </div>
            <div class="row px-3"> <label class="mb-1">
                <h6 class="mb-0 text-sm">New Password</h6></label> 
                <input type="password" name="new_password" placeholder="Enter new password"> 
                <?php if($validation->getError('new_password')) {?>
                    <p class='text-danger'>
                        <?= $error = $validation->getError('new_password'); ?>
                    </p>
                <?php }?>
            </div>
            <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center">Update</button> </div>
        </div>
        </form>
    </div>

<?= $this->endSection() ?>