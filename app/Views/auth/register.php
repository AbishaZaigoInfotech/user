<?= $this->extend('templates/auth_template') ?>
<?= $this->section('content') ?>

    <div class="col-lg-6">
    <div class="mt-5">
    <h2 align="center">Register</h2>
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
    <form action="<?= base_url('auth/store') ?>" method="POST">
    <?= csrf_field(); ?>
    <?php $validation = \Config\Services::validation(); ?>
        <div class="card2 card border-0 px-4 py-5">
            <div class="row px-3"> <label class="mb-1">
                <h6 class="mb-0 text-sm">Name</h6></label> 
                <input class="mb-4" type="text" name="name" placeholder="Enter name" value="<?=set_value('name')?>"> 
                <?php if($validation->getError('name')) {?>
                    <p class='text-danger'> 
                        <?= $error = $validation->getError('name'); ?>
                    </p>
                <?php }?>
            </div>
            <div class="row px-3"> <label class="mb-1">
                <h6 class="mb-0 text-sm">Email Address</h6></label> 
                <input class="mb-4" type="text" name="email" placeholder="Enter a valid email address" value="<?=set_value('email')?>"> 
                <?php if($validation->getError('email')) {?>
                    <p class='text-danger'>
                        <?= $error = $validation->getError('email'); ?>
                    </p>
                <?php }?>
            </div>
            <div class="row px-3"> <label class="mb-1">
                <h6 class="mb-0 text-sm">Phone number</h6></label> 
                <input class="mb-4" type="number" name="phone" placeholder="Enter phone number" value="<?=set_value('phone')?>"> 
                <?php if($validation->getError('phone')) {?>
                    <p class='text-danger'>
                        <?= $error = $validation->getError('phone'); ?>
                    </p>
                <?php }?>
            </div>
            <div class="row px-3"> <label class="mb-1">
                <h6 class="mb-0 text-sm">Age</h6></label> 
                <input class="mb-4" type="number" name="age" placeholder="Enter age" value="<?=set_value('age')?>"> 
                <?php if($validation->getError('age')) {?>
                    <p class='text-danger'>
                        <?= $error = $validation->getError('age'); ?>
                    </p>
                <?php }?>
            </div>
            <div class="row px-3"> <label class="mb-1">
                <h6 class="mb-0 text-sm">Gender</h6></label> 
                <div class="form-check">
                    <label class="form-check-label" for="male">
                        <input type="radio" class="form-check-input" id="male" name="gender" value="male" <?php echo set_radio('gender', 'male'); ?> checked><br>Male
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label" for="female">
                        <input type="radio" class="form-check-input" id="female" name="gender" value="female" <?php echo set_radio('gender', 'female'); ?>><br>Female
                    </label>
                </div>
                <?php if($validation->getError('gender')) {?>
                    <p class='text-danger'>
                        <?= $error = $validation->getError('gender'); ?>
                    </p>
                <?php }?>
            </div>
            <div class="row px-3"> <label class="mb-1">
                <h6 class="mb-0 text-sm">Address</h6></label> 
                <textarea class="mb-4" name="address" placeholder="Enter address"  row="5"><?=set_value('address')?></textarea>
                <?php if($validation->getError('address')) {?>
                    <p class='text-danger'>
                        <?= $error = $validation->getError('address'); ?>
                    </p>
                <?php }?>
            </div>
            <div class="row px-3"> <label class="mb-1">
                <h6 class="mb-0 text-sm">Designation</h6></label> 
                <select class="form-control" id="designation" name="designation">
                    <option name="designation" value="developer" <?php echo set_select('designation', 'developer'); ?>>Software Developer</option>
                    <option name="designation" value="designer" <?php echo set_select('designation', 'designer'); ?>>Software Designer</option>
                    <option name="designation" value="testing" <?php echo set_select('designation', 'testing'); ?>>Software Tester</option>
                    <option name="designation" value="writer" <?php echo set_select('designation', 'writer'); ?>>Content Writer</option>
                </select>
                <?php if($validation->getError('designation')) {?>
                    <p class='text-danger'>
                        <?= $error = $validation->getError('designation'); ?>
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
            <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center">Sign Up</button> </div>
            <div class="row mb-4 px-3"> <small class="font-weight-bold">Already have an account? <a href="<?= site_url('/')?>" class="text-danger ">Login</a></small> </div>
        </div>
        </form>
    </div>

<?= $this->endSection() ?>