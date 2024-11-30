<?php 
   require '../db.php';
   require '../includes/header.php';


   $select_logo = "SELECT * FROM logos";
   $select_logo_res = mysqli_query($db_connect, $select_logo);
   $after_assoc = mysqli_fetch_assoc($select_logo_res);

   
 ?>
  <form action="logo_update.php" method="POST" enctype="multipart/form-data">
     <div class="row">
       <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Change Header Logo</h3>
            </div>
            <div class="card-body">
               <?php if(isset($_SESSION['logo_header'])){  ?>
                     <div class="alert alert-success"><?=$_SESSION['logo_header']?></div>
               <?php  }unset($_SESSION['logo_header']) ?>
                    <div class="mb-3">
                        <label class="form-label">Upload Header Logo</label>
                        <input type="file" name="header_logo" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <?php  if(isset($_SESSION['exten'])){?>
                            <strong class="text-danger"><?=$_SESSION['exten']?></strong>
                        <?php }unset($_SESSION['exten'])?>
                    </div>
                    <div class="my-2">
                        <img width="200" id="blah" src="../uploads/logo/<?=$after_assoc['header_logo']?>" alt="">
                    </div>
                    <div class="mb-3">
                         <button name="logo" value="1" type="submit" class="btn btn-primary">Change Logo</button>
                    </div>
            </div>
        </div>
     </div>
     <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Change Footer Logo</h3>
            </div>
            <div class="card-body">
               <?php if(isset($_SESSION['logo_footer'])){  ?>
                     <div class="alert alert-success"><?=$_SESSION['logo_footer']?></div>
               <?php  }unset($_SESSION['logo_footer']) ?>
                    <div class="mb-3">
                        <label class="form-label">Upload Footer Logo</label>
                        <input type="file" name="footer_logo" class="form-control" onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0])">
                        <?php  if(isset($_SESSION['extent'])){?>
                            <strong class="text-danger"><?=$_SESSION['extent']?></strong>
                        <?php }unset($_SESSION['extent'])?>
                    </div>
                    <div class="my-2">
                        <img width="200" id="blah2" src="../uploads/logo/<?=$after_assoc['footer_logo']?>" alt="">
                    </div>
                    <div class="mb-3">
                         <button  name="logo" value="2" type="submit" class="btn btn-primary">Change Logo</button>
                    </div>
            </div>
        </div>
     </div>
    </div>
  </form>
<?php require '../includes/footer.php' ?> 