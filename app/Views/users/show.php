<?= $this->extend('templates/admin_template') ?>
<?= $this->section('content') ?>					  
<div class="row">
   <div class="col-xl-12">
      <div class="card shadow mb-4">
         <div class="card-body">
            <div class="card-body">
                  <div class="col-md-2 pad-0">
                  </div>
                  <div class="table-responsive">
                     <table class="table mb-10">
                        <tr class="title"><td class="white">PROFILE DETAILS</td><td></td></tr>
                        <tr><td>Name</td><td><?= ucfirst($user['name']) ?></td></tr>
                        <tr><td>Email Address</td><td><?= $user['email'] ?></td></tr>
                        <tr><td>Phone Number</td><td><?= $user['phone'] ?></td></tr>
                        <tr><td>Age</td><td><?= $user['age'] ?></td></tr>
                        <tr><td>Gender</td><td><?= $user['gender'] ?></td></tr>
                        <tr><td>Address</td><td><?= $user['address'] ?></td></tr>
                     </table>
                  </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?= $this->endSection() ?>