<?php 
   require '../db.php';
   require '../includes/header.php';

   $select = "SELECT * FROM portfolios";
   $select_res = mysqli_query($db_connect, $select);

?>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3>Portfolio List</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                     <tr>
                         <th>SL</th>
                         <th>Title</th>
                         <th>Category</th>
                         <th>Image</th>
                         <th>Action</th>
                     </tr>
                     <?php foreach($select_res as $index=>$portfolio){  ?>
                     <tr>
                         <td><?=$index+1?></td>
                         <td><?=$portfolio['title']?></td>
                         <td><?=$portfolio['category']?></td>
                         <td>
                            <img src="../uploads/portfolio/<?=$portfolio['image']?>" alt="">
                         </td>
                         <td>
                            <a href="edit.php?id=<?=$portfolio['id']?>"class="btn btn-info">Edit</a>
                            <a href="delete.php?id=<?=$portfolio['id']?>"class="btn btn-danger">Delete</a>
                         </td>
                     </tr>
                     <?php }  ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
         <div class="card">
             <div class="card-header bg-primary">
                <h3 class="text-white">Add New Portfolio</h3>
             </div>
             <div class="card-body">
                <?php if(isset($_SESSION['success'])){  ?>
                    <div class="alert alert-success"><?=$_SESSION['success']?></div>
                <?php  } unset($_SESSION['success'])?>
               <form action="portfolio_post.php" method="POST" enctype="multipart/form-data">
                   <div class="mb-3">
                      <label class="form-label">Title</label>
                      <input type="text" name="title" class="form-control">
                   </div>
                   <div class="mb-3">
                      <label class="form-label">Category</label>
                      <input type="text" name="category" class="form-control">
                   </div>
                   <div class="mb-3">
                      <label class="form-label">Image</label>
                      <input type="file" name="image" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                      <div class="my-1">
                         <img src="" id="blah" width="200" alt="">
                      </div>
                   </div>
                   <div class="mb-3">
                     <button type="submit" class="btn btn-primary">Add Portfolio</button>
                   </div>
               </form>
             </div>
         </div>
    </div>
</div>

<?php require '../includes/footer.php' ?> 