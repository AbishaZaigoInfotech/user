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
               <form method="POST" action="<?= base_url('users/store') ?>"  id="form" enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
			   <?= csrf_field(); ?>
    			<?php $validation = \Config\Services::validation(); ?>
				  <div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="name" class="control-label">Name<small class="text-danger required">*</small></label> 
							<input name="name" type="text" id="name" class="form-control" value="<?=set_value('name')?>">			
							<?php if($validation->getError('name')) {?>
								<p class='text-danger'>
									<?= $error = $validation->getError('name'); ?>
								</p>
							<?php }?>			
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="email" class="control-label">Email<small class="text-danger required">*</small></label> 
							<input name="email" type="email" id="email" class="form-control" value="<?=set_value('email')?>">		
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
							<input name="phone" type="number" id="phone" class="form-control" value="<?=set_value('phone')?>">		
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
							<input name="age" type="number" id="age" class="form-control" value="<?=set_value('age')?>">		
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
								<input type="radio" class="form-check-input" id="male" name="gender" value="male" <?php echo set_radio('gender', 'male'); ?>checked><br>Male
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
					<div class="col-md-4">
						<div class="form-group">
							<label for="address" class="control-label">Address<small class="text-danger required">*</small></label><br>
							<textarea name="address" id="address" class="form-control" row="5"><?=set_value('address')?></textarea>	
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
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="password" class="control-label">Password<small class="text-danger required">*</small></label> 
							<input name="password" type="password" id="password" class="form-control">		
							<?php if($validation->getError('password')) {?>
								<p class='text-danger'>
									<?= $error = $validation->getError('password'); ?>
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