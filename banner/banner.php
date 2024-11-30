<?php 
   require '../db.php';
   require '../includes/header.php';

   $select_banner = "SELECT * FROM banners";
   $select_banner_res = mysqli_query($db_connect, $select_banner);
   $after_assoc_banner = mysqli_fetch_assoc($select_banner_res);
?>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
           <div class="card-header bg-primary">
               <h3 class="text-white">Update Banner Info</h3>
           </div>
           <div class="card-body">
               <?php if(isset($_SESSION['success'])){ ?>
                  <div class="alert alert-success"><?=$_SESSION['success']?></div>
               <?php }unset($_SESSION['success']) ?>
               <form action="banner_update.php" method="POST">
                   <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="<?=$after_assoc_banner['title']?>">
                   </div>
                   <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="<?=$after_assoc_banner['name']?>">
                   </div>
                   <div class="mb-3">
                        <label class="form-label">Watermark</label>
                        <input type="text" name="watermark" class="form-control" value="<?=$after_assoc_banner['watermark']?>">
                   </div>
                   <div class="mb-3">
                        <label class="form-label">Short Description</label>
                        <textarea name="short_desp" class="form-control" rows="5"><?=$after_assoc_banner['short_desp']?></textarea>
                   </div>
                   <div class="mb-3">
                       <button type="submit" class="btn btn-primary">Update</button>
                   </div>
               </form>
           </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Change Banner Image</h3>
            </div>
            <div class="card-body">
               <?php if(isset($_SESSION['image_update'])){ ?>
                    <div class="alert alert-success"><?=$_SESSION['image_update']?></div>
               <?php  } unset($_SESSION['image_update']) ?>
            <form action="banner_image_update.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Upload Banner Image</label>
                        <input type="file" name="image" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                    <div class="my-2">
                        <img width="200" id="blah" src="../uploads/banner/<?=$after_assoc_banner['image']?>" alt="">
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