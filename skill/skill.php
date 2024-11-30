<?php 
   require '../db.php';
   require '../includes/header.php';


   $select = "SELECT * FROM skills";
   $select_res = mysqli_query($db_connect, $select);

?>
<div class="row">
    <div class="col-lg-8">
         <div class="card">
            <div class="card-header">
                <h3> Skill List</h3>
            </div>
            <div class="card-body">
                 <table class="table table-bordered">
                      <tr>
                          <th>SL</th>
                          <th>Skill name</th>
                          <th>Percentage</th>
                          <th>Status</th>
                          <th>Action</th>
                      </tr>
                      <?php foreach($select_res as $index=>$skill){ ?>
                      <tr>
                           <td><?=$index+1?></td>
                           <td><?=$skill['skill_name']?></td>
                           <td><?=$skill['percentage']?></td>
                           <td>
                               <a href="status_update.php?id=<?=$skill['id']?>" class="btn btn-<?=($skill['status'] == 0?'secondary':'primary')?>"><?=($skill['status'] == 0?'Deactive':'Active')?></a>
                           </td>
                           <td>
                                <a href="edit.php?id=<?=$skill['id']?>" class="btn btn-info"> Edit</a>
                                <a data-link="delete.php?id=<?=$skill['id']?>" class="btn btn-danger del"> Delete</a>
                           </td>
                      </tr>
                      <?php  } ?>
                 </table>
            </div>
         </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
           <div class="card-header bg-primary">
             <h3 class="text-white">Add New Skill</h3>
           </div>
           <div class="card-body">
                <form action="skill_post.php" method="POST">
                   <div class="mb-3">
                        <label class="form-label">Skill Name</label>
                        <input type="text" name="skill_name" class="form-control">
                   </div>
                   <div class="mb-3">
                        <label class="form-label">Skill Percentage</label>
                        <input type="number" name="percentage" class="form-control">
                   </div>
                   <div class="mb-3">
                       <button type="submit" class="btn btn-primary">Add Skill</button>
                   </div>
              </form>
           </div>
        </div>
    </div>
</div>

<?php require '../includes/footer.php' ?> 

<?php if(isset($_SESSION['success'])){ ?>
   <script>
        const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
         didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
          }
        });
        Toast.fire({
        icon: "success",
        title: '<?=$_SESSION['success']?>'
        });
   </script>
<?php  } unset($_SESSION['success']) ?>

<?php if(isset($_SESSION['active'])){ ?>
       <script>
           Swal.fire({
           icon: "error",
           title: "Oops...",
           text: "<?=$_SESSION['active']?>",
  
           });
       </script>
<?php  } unset($_SESSION['active'])?>

<script>
     $('.del').click(function(){
          Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
            }).then((result) => {
            if (result.isConfirmed) {
                let link = $(this).attr('data-link');
                window.location.href = link;
              }
          }); 
      })    
</script>
<?php if(isset($_SESSION['del'])){ ?>
       <script>
           Swal.fire({
           title: "Deleted!",
           text: "<?=$_SESSION['del']?>",
           icon: "success"
           });
       </script>
<?php  } unset($_SESSION['del'])?>