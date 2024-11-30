<?php 
   require '../db.php';
   require '../includes/header.php';

   $id = $_GET['id'];
   $select = "SELECT * FROM portfolios WHERE id=$id";
   $select_res = mysqli_query($db_connect, $select);
   $after_assoc = mysqli_fetch_assoc($select_res);
?>

<div class="row">
<div class="col-lg-6 m-auto">
         <div class="card">
             <div class="card-header bg-primary">
                <h3 class="text-white">Edit Portfolio</h3>
             </div>
             <div class="card-body">
               <form action="update.php" method="POST" enctype="multipart/form-data">
               <input type="hidden" name="id" value="<?=$id?>">
                   <div class="mb-3">
                      <label class="form-label">Title</label>
                      <input type="text" name="title" class="form-control" value="<?=$after_assoc['title']?>">
                   </div>
                   <div class="mb-3">
                      <label class="form-label">Category</label>
                      <input type="text" name="category" class="form-control" value="<?=$after_assoc['category']?>">
                   </div>
                   <div class="mb-3">
                      <label class="form-label">Image</label>
                      <input type="file" name="image" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                      <div class="my-1">
                         <img src="../uploads/portfolio/<?=$after_assoc['image']?>" id="blah" width="200" alt="">
                      </div>
                   </div>
                   <div class="mb-3">
                     <button type="submit" class="btn btn-primary">Update Portfolio</button>
                   </div>
               </form>
             </div>
         </div>
    </div>
</div>

<?php require '../includes/footer.php' ?> 