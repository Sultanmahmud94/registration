<?php session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
  </head>
  <body>
   
       <div class="row">
           <div class="col-lg-6 m-auto">
              <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-white"> Register Form</h3>
                </div>
                <div class="card-body">
                        <?php if(isset($_SESSION['success'])){ ?>
                              <div class="alert alert-success"><?=$_SESSION['success']?></div>
                         <?php } unset($_SESSION['success'])?>

                    <form action="register_post.php" method="POST">
                       <div class= " mb-3">
                         <label class="form-lebel">Name</label>
                         <input type="text" class="form-control" name="name" value="<?=(isset($_SESSION['nam_value'])?$_SESSION['nam_value']:'')?>">
                         <?php if(isset($_SESSION['nam_err'])){ ?>
                              <strong class="text-danger"><?=$_SESSION['nam_err']?></strong>
                         <?php } unset($_SESSION['nam_err'])?>
                       </div>
                       <div class="mb-3">
                       <label class="form-lebel">Email</label>
                         <input type="text" class="form-control" name="email" value="<?=(isset($_SESSION['email_value'])?$_SESSION['email_value']:'')?>">
                         <?php if(isset($_SESSION['email_err'])){ ?>
                              <strong class="text-danger"><?=$_SESSION['email_err']?></strong>
                         <?php } unset($_SESSION['email_err'])?>
                       </div>
                       <div class="mb-3">
                          <div class= "pass position-relative">
                              <label class="form-lebel">Password</label>
                              <input id="pass" type="password" class="form-control" name="password">
                              <?php if(isset($_SESSION['pass_err'])){ ?>
                              <strong class="text-danger"><?=$_SESSION['pass_err']?></strong>
                              <?php } unset($_SESSION['pass_err'])?>
                              <i  class="abc fa-solid fa-face-rolling-eyes fa-face-grin-stars fa-fw position-absolute end-0 rounded-end" style="top: 23px; width:40px; height:40px; background:blue; line-height:40px; color:#fff"></i>
                          </div>
                       </div>
                          <div class="mb-3">
                           <label class="form-lebel">Confirm Password</label>
                              <input  type="password" class="form-control" name="confirm_password">
                              <?php if(isset($_SESSION['conpass_err'])){ ?>
                              <strong class="text-danger"><?=$_SESSION['conpass_err']?></strong>
                              <?php } unset($_SESSION['conpass_err'])?>
                          </div>
                           <div class="mb-3">
                              <?php  
                                if(isset($_SESSION['gen_value'])){
                                  $gender = $_SESSION['gen_value'];
                                }
                                else{
                                  $gender ='';
                                }
                              ?>
                           <div class="form-check">
                              <input <?=($gender == 'male'?'checked':'')?> value="male"  class="form-check-input" type="radio" name="gender" id="male">
                              <label class="form-check-label" for="male">
                                 Male
                             </label>
                          </div>
                           <div class="form-check">
                             <input <?=($gender == 'female'?'checked':'')?>  value="female"  class="form-check-input" type="radio" name="gender" id="female">
                             <label class="form-check-label" for="female">
                                 Female
                             </label>
                           </div>
                       </div>
                              <?php if(isset($_SESSION['gender_err'])){ ?>
                                    <strong class="text-danger"><?=$_SESSION['gender_err']?></strong>
                              <?php } unset($_SESSION['gender_err'])?>

                         <div class="mb-3">
                             <label class="form-label">DOB</label>
                             <input type="date" class="form-control" name="dob">
                         </div> 
                              <?php if(isset($_SESSION['dob_err'])){ ?>
                                    <strong class="text-danger"><?=$_SESSION['dob_err']?></strong>
                              <?php } unset($_SESSION['dob_err'])?>

                       <div class= "mb-3 mt-3">
                         <button type="submit" class="btn btn-primary"> Register</button>
                       </div>
                    </form>
                </div>
              </div>
           </div>
       </div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
      $('.abc').click(function(){
        let password = document.getElementById('pass');
        if(password.type == 'password'){
          password.type = 'text';
          $(this).removeClass('fa-face-rolling-eyes')
        }
        else{
          password.type ='password';
          $(this).addClass('fa-face-rolling-eyes')
        }
      })
  </script>

  </body>
</html>     