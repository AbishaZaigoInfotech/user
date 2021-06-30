<?= $this->extend('templates/auth_template') ?>
<?= $this->section('content') ?>
<div class="col-lg-6">
<div class="mt-5">
    <h2 align="center">Login</h2>
    </div>
                    <?php
                    if(session()->getFlashData('status')):?>
                    <div class="alert alert-success">
                        <?php echo session()->getFlashData('status'); ?>
                    </div>
                    <?php endif ?>
                    <?php
                    if(session()->getFlashData('fail')):?>
                    <div class="alert alert-danger">
                        <?php echo session()->getFlashData('fail'); ?>
                    </div>
                    <?php endif ?>
    <form action="<?= base_url('auth/check') ?>" method="POST">
    <?= csrf_field(); ?>
    <?php $validation = \Config\Services::validation(); ?>
                <div class="card2 card border-0 px-4 py-5">
                    <div class="row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm">Email Address</h6>
                        </label> 
                        <input class="mb-4" type="text" name="email" placeholder="Enter a valid email address" value="<?=set_value('email')?>"> 
                        <?php if($validation->getError('email')) {?>
                    <p class='text-danger'>
                        <?= $error = $validation->getError('email'); ?>
                    </p>
                <?php }?>
                        </div>
                    <div class="row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm">Password</h6></label> 
                            <input type="password" name="password" placeholder="Enter password"> 
                            <?php if($validation->getError('password')) {?>
                    <p class='text-danger'>
                        <?= $error = $validation->getError('password'); ?>
                    </p>
                <?php }?>
                            </div>
                    <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center">Login</button> </div>
                    <div class="row mb-4 px-3"> <small class="font-weight-bold">Don't have an account? <a href="<?= site_url('/register')?>" class="text-danger ">Register</a></small> </div>
                </div>
                </form>
            </div>
<?= $this->endSection() ?>