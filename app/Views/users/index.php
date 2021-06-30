<?= $this->extend('templates/admin_template') ?>
<?= $this->section('content') ?>					  
<div class="row">
   <div class="col-xl-12">
      <div class="card shadow mb-4">
         <div class="card-body">
            <div class="card-body">
                  <div class="col-md-2 pad-0">
                     <?php if($logged_user==1): ?>
                        <a href="<?= site_url('/users/create')?>" title="Add New User" class="btn btn-primary btn-sm"><i aria-hidden="true" class="fa fa-plus"></i> Add New User
                        </a>
                     <?php endif ?>
                  </div>
                  <br>
                  <form>
                     <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <input type="text" name="search" placeholder="Search..." class="form-control" data-toggle="tooltip" data-placement="top" title="" >
                           </div>
                        </div>
                        <div class="col-4">
                           <div class="dropdown">
                              <div class="form-group">
                                 <select class="form-control" name="designation" id="designation">
                                       <option value="">Select</option>
                                       <option value="developer">Software Developer</option>
                                       <option value="designer">Software Designer</option>
                                       <option value="testing">Software Tester</option>
                                       <option value="writer">Content Writer</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <button class="btn btn-primary float-right" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                     </div>
                  </form>
                  <br> <br> 
                  <?php
                    if(session()->getFlashData('status')):?>
                    <div class="alert alert-success">
                        <?php echo session()->getFlashData('status'); ?>
                    </div>
                    <?php endif ?>
                  <div class="table-responsive">
                     <table class="table">
                        <thead>
                           <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>E-Mail</th>
                              <th>Phone Number</th>
                              <th>Age</th>
                              <th>Gender</th>
                              <th>Address</th>
                              <th>Designation</th>
                              <?php if($logged_user==1): ?>
                              <th>Actions</th>
                              <?php endif ?>
                           </tr>
                        </thead>
                        <tbody>
                        <?php foreach($users as $user): ?>
                            <tr>
                              <td><?= $user['id'] ?></td>
                              <td><?= $user['name'] ?></td>
                              <td><?= $user['email'] ?></td>
                              <td><?= $user['phone'] ?></td>
                              <td><?= $user['age'] ?></td>
                              <td><?= $user['gender'] ?></td>
                              <td><?= $user['address'] ?></td>
                              <td>
                                 <?php if($user['designation']=="developer"):?>Software Developer<?php endif;?>
                                 <?php if($user['designation']=="designer"):?>Software Designer<?php endif;?>
                                 <?php if($user['designation']=="testing"):?>Software Tester<?php endif;?>
                                 <?php if($user['designation']=="writer"):?>Content Writer<?php endif;?>
                              </td>
                              <?php if($logged_user==1): ?>
                              <td>   
                                 <a href="<?= site_url('/users/edit/'.$user['id'])?>" title="Edit User"><button class="btn btn-primary btn-sm" type="button"><i aria-hidden="true" class="fa fa-edit"></i></button></a>
                                 <a href="<?= site_url('/users/destroy/'.$user['id'])?>" title="Delete User"><button class="btn btn-danger btn-sm" type="button"><i aria-hidden="true" class="fa fa-trash"></i></button></a>
                              </td>
                              <?php endif ?>
                           </tr>
                        <?php endforeach; ?>
                        </tbody>
                     </table>
                  </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?= $this->endSection() ?>