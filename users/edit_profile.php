<?php 
   require '../db.php';
   require '../includes/header.php'
 ?>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-primary">
                  <h3 class="text-white" >Edit Profile Photo</h3>
            </div>
            <div class="card-body">
                  <?php if(isset($_SESSION['extension'])){?>
                    <div class="alert alert-danger"><?=$_SESSION['extension']?></div>
                  <?php } unset($_SESSION['extension'])?>

                  <?php if(isset($_SESSION['success'])){?>
                    <div class="alert alert-success "><?=$_SESSION['success']?></div>
                  <?php } unset($_SESSION['success'])?>

                  <form action="update_profile.php" method="POST" enctype="multipart/form-data">
                      <div class="mb-3">
                          <label class="form-label">Name</label>
                          <input type="text" name="name" class="form-control" value="<?=$logged_info['name']?>">
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Photo</label>
                          <input type="file" name="photo" class="form-control">
                      </div>
                      <div class="mb-3">
                           <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                  </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-primary">
                  <h3 class="text-white" > Password Change </h3>
            </div>
            <div class="card-body">
                          <?php if(isset($_SESSION['pass'])){ ?>
                                <div class="alert alert-success"><?=$_SESSION['pass']?></div>
                          <?php } unset($_SESSION['pass']) ?>

                  <form action="pass_update.php" method="POST">
                      <div class="mb-3">
                          <label class="form-label">Current Password</label>
                          <input type="password" name="current_password" class="form-control">
                          <?php if(isset($_SESSION['current_pass'])){ ?>
                                <strong class="text-danger"><?=$_SESSION['current_pass']?></strong>
                          <?php } unset($_SESSION['current_pass']) ?>
                      </div>
                      <div class="mb-3">
                          <label class="form-label">New Password</label>
                          <input type="password" name="new_password" class="form-control">
                          <?php if(isset($_SESSION['new_pass'])){ ?>
                                <strong class="text-danger"><?=$_SESSION['new_pass']?></strong>
                          <?php } unset($_SESSION['new_pass']) ?>
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Confirm Password</label>
                          <input type="password" name="confirm_password" class="form-control">
                          <?php if(isset($_SESSION['con_pass'])){ ?>
                                <strong class="text-danger"><?=$_SESSION['con_pass']?></strong>
                          <?php } unset($_SESSION['con_pass']) ?>
                      </div>
                      <div class="mb-3">
                           <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                  </form>
            </div>
        </div>
    </div>
</div>
<?php require '../includes/footer.php' ?> 