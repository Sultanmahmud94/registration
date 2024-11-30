<?php 
   require '../db.php';
   require '../includes/header.php';

   $id = $_GET['id'];

   $select = "SELECT * FROM services WHERE id=$id";
   $select_status_res = mysqli_query($db_connect, $select);
   $after_assoc = mysqli_fetch_assoc($select_status_res);

?>
<div class="row">
<div class="col-lg-4 m-auto">
        <div class="card">
           <div class="card-header bg-primary">
             <h3 class="text-white">Edit Service</h3>
           </div>
           <div class="card-body">
                <form action="update.php" method="POST">
                       <input type="hidden" name="id" class="form-control" value="<?=$id?>">
                   <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="<?=$after_assoc['title']?>">
                   </div>
                   <div class="mb-3">
                        <label class="form-label">Short Description</label>
                        <input type="text" name="short_desp" class="form-control" value="<?=$after_assoc['short_desp']?>">
                   </div>
                   <div class="mb-3">
                       <button type="submit" class="btn btn-primary">Update Service</button>
                   </div>
              </form>
           </div>
        </div>
    </div>
</div>

<?php require '../includes/footer.php' ?> 