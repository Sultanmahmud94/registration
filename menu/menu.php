<?php 
   require '../db.php';
   require '../includes/header.php';

   $select = "SELECT * FROM menus";
   $select_menu_res = mysqli_query($db_connect, $select); 

?>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3>Menu List</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                         <th>SL</th>
                         <th>Menu</th>
                         <th>Link</th>
                         <th>Action</th>
                     </tr>
                     <?php foreach($select_menu_res as $index=>$menu){  ?>
                     <tr>
                         <td><?=$index+1?></td>
                         <td><?=$menu['menu_name']?></td>
                         <td><?=$menu['link']?></td>
                         <td>
                            <a href="delete.php?id=<?=$menu['id']?>" class="btn btn-danger">Delete</a>
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
                <h3 class="text-white">Add New Menu</h3>
             </div>
             <div class="card-body">
               <form action="menu_post.php" method="POST">
                   <div class="mb-3">
                      <label class="form-label">Menu Name</label>
                      <input type="text" name="menu_name" class="form-control">
                   </div>
                   <div class="mb-3">
                      <label class="form-label">Link</label>
                      <input type="text" name="link" class="form-control">
                   </div>
                   <div class="mb-3">
                     <button type="submit" class="btn btn-primary">Add Menu</button>
                   </div>
               </form>
             </div>
         </div>
    </div>
</div>

<?php require '../includes/footer.php' ?> 