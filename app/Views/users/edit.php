<?= $this->extend('templates/admin_template') ?>
<?= $this->section('content') ?>	
<div class="row">
   <div class="col-xl-12">
      <div class="card shadow mb-4">
         <div class="card-body">
            <div class="card-body">
               <a href="<?= site_url('/users/index')?>" title="Back to User List" class="btn btn-danger btn-sm"><i aria-hidden="true" class="fa fa-arrow-left"></i> Back to User List
               </a> 
               <br> <br> 
               <form method="POST" action="<?= base_url('users/update/'.$user['id']) ?>"  id="form" enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
			   <?= csrf_field(); ?>
    			<?php $validation = \Config\Services::validation(); ?>
				  <div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="name" class="control-label">Name<small class="text-danger required">*</small></label> 
							<input name="name" type="text" value="<?= $user['name']?>" id="name" class="form-control">			
							<?php if($validation->getError('name')) {?>
								<p class='text-danger'>
									<?= $error = $validation->getError('name'); ?>
								</p>
							<?php }?>			
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="email" class="control-label">Email<small class="text-danger required">*</small></label> 
							<input name="email" type="email" value="<?= $user['email']?>" id="email" class="form-control">		
							<?php if($validation->getError('email')) {?>
								<p class='text-danger'>
									<?= $error = $validation->getError('email'); ?>
								</p>
							<?php }?>				
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="phone" class="control-label">Phone Number<small class="text-danger required">*</small></label> 
							<input name="phone" type="number" id="phone" value="<?= $user['phone']?>" class="form-control">		
							<?php if($validation->getError('phone')) {?>
								<p class='text-danger'>
									<?= $error = $validation->getError('phone'); ?>
								</p>
							<?php }?>				
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="age" class="control-label">Age<small class="text-danger required">*</small></label> 
							<input name="age" type="number" id="age" value="<?= $user['age']?>" class="form-control">		
							<?php if($validation->getError('age')) {?>
								<p class='text-danger'>
									<?= $error = $validation->getError('age'); ?>
								</p>
							<?php }?>				
						</div>
					</div>
					<div class="col-md-4">
					<label for="gender" class="control-label">Gender<small class="text-danger required">*</small></label> 
						<div class="form-check">
							<label class="form-check-label" for="male">
								<input type="radio" class="form-check-input" id="male" name="gender" value="male" <?= $user['gender'] == 'male' ? 'checked' : '' ?>><br>Male
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label" for="female">
								<input type="radio" class="form-check-input" id="female" name="gender" value="female" <?= $user['gender'] == 'female' ? 'checked' : '' ?>><br>Female
							</label>
						</div>
							<?php if($validation->getError('gender')) {?>
								<p class='text-danger'>
									<?= $error = $validation->getError('gender'); ?>
								</p>
							<?php }?>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="address" class="control-label">Address<small class="text-danger required">*</small></label><br>
							<textarea name="address" id="address" class="form-control" row="5"><?= $user['address']?></textarea>	
							<?php if($validation->getError('address')) {?>
								<p class='text-danger'>
									<?= $error = $validation->getError('address'); ?>
								</p>
							<?php }?>					
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="designation" class="control-label">Designation<small class="text-danger required">*</small></label><br>
							<select name="designation" id="designation" class="form-control" >
								<option name="designation" value="developer" <?= $user['designation'] == 'developer' ? 'selected' : '' ?>>Software Developer</option>
								<option name="designation" value="designer" <?= $user['designation'] == 'designer' ? 'selected' : '' ?>>Software Designer</option>
								<option name="designation" value="testing" <?= $user['designation'] == 'testing' ? 'selected' : '' ?>>Software Tester</option>
								<option name="designation" value="writer" <?= $user['designation'] == 'writer' ? 'selected' : '' ?>>Content Writer</option>
							</select>
							<?php if($validation->getError('designation')) {?>
								<p class='text-danger'>
									<?= $error = $validation->getError('designation'); ?>
								</p>
							<?php }?>					
						</div>
					</div>
					<div class="col-md-4">
					</div>
					<div class="col-md-4 no-label">
						<div class="form-group">
							<input type="submit" value="Save" class="btn btn-primary">
						</div>
					</div>
				  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<?= $this->endSection() ?>