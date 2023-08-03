<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = $_POST['user_type'];

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = '<div class="alert alert-primary alert-dismissible fade show" role="alert">
      User already exist!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
   }else{
      if($pass != $cpass){
         $message[] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
         Confirm password is not matched!
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';
      }else{
         mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
         $message[] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
         Registered successfully!
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/register.css">
     <!-- Bootstrap 5  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>


</head>
<body>



<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
      </div>
      ';
   }
}
?>
   
<!-- <div class="form-container"> -->
<!--  -->
   <!-- <form action="" method="post"> -->
      <!-- <h3>register now</h3> -->
      <!-- <input type="text" name="name" placeholder="enter your name" required class="box"> -->
      <!-- <input type="email" name="email" placeholder="enter your email" required class="box"> -->
      <!-- <input type="password" name="password" placeholder="enter your password" required class="box"> -->
      <!-- <input type="password" name="cpassword" placeholder="confirm your password" required class="box"> -->
      <!-- <select name="user_type" class="box"> -->
         <!-- <option value="user">user</option> -->
         <!-- <option value="admin">admin</option> -->
      <!-- </select> -->
      <!-- <input type="submit" name="submit" value="register now" class="btn"> -->
      <!-- <p>already have an account? <a href="login.php">login now</a></p> -->
   <!-- </form> -->
<!--  -->
<!-- </div> -->
<section class="register">
		<div class="register_box">
			<div class="left">
				<div class="contact">
					<form action="" method="post" class="formA">
                        <h3>REGISTER NOW</h3>
                        <input type="text" name="name" placeholder="Enter your name" required class="box">
                        <input type="email" name="email" placeholder="Enter your email" required class="box">
                        <input type="password" name="password" placeholder="Enter your password" required 
class="box">
                        <input type="password" name="cpassword" placeholder="Confirm your password" required 
class="box">
                        <select name="user_type" class="boxA" style="background-color: #7390e2; color:  white;
                         height: 35px; width: 100px; border-radius: 7px; box-shadow: 2px 2px 2">
                           <option value="user" style="border-radius: 7px;">User</option>
                           <option value="admin" style="border-radius: 7px;">Admin</option>
                        </select>
                        <button class="submit"  name="submit" type="submit">Register now</button>
                        <p>Already have an account? <a href="login.php">login now</a></p>
					</form>
				</div>
			</div>
			<div class="right">
				<div class="right-text">
					<h2>BOOKS FOR YOU</h2>
					<h5>Free books for you to download/read</h5>
				</div>
				<div class="right-inductor"><img src="https://lh3.googleusercontent.com/fife/
ABSRlIoGiXn2r0SBm7bjFHea6iCUOyY0N2SrvhNUT-orJfyGNRSMO2vfqar3R-xs5Z4xbeqYwrEMq2FXKGXm-l_H6QAlwCBk9uceKBfG-Fjac
fftM0WM_aoUC_oxRSXXYspQE3tCMHGvMBlb2K1NAdU6qWv3VAQAPdCo8VwTgdnyWv08CmeZ8hX_6Ty8FzetXYKnfXb0CTEFQOVF4p3R58LksV
Ud73FU6564OsrJt918LPEwqIPAPQ4dMgiH73sgLXnDndUDCdLSDHMSirr4uUaqbiWQq-X1SNdkh-3jzjhW4keeNt1TgQHSrzW3maYO3ryueQz
YoMEhts8MP8HH5gs2NkCar9cr_guunglU7Zqaede4cLFhsCZWBLVHY4cKHgk8SzfH_0Rn3St2AQen9MaiT38L5QXsaq6zFMuGiT8M2Md50eS0
JdRTdlWLJApbgAUqI3zltUXce-MaCrDtp_UiI6x3IR4fEZiCo0XDyoAesFjXZg9cIuSsLTiKkSAGzzledJU3crgSHjAIycQN2PH2_dBIa3ibA
JLphqq6zLh0qiQn_dHh83ru2y7MgxRU85ithgjdIk3PgplREbW9_PLv5j9juYc1WXFNW9ML80UlTaC9D2rP3i80zESJJY56faKsA5GVCIFiUt
c3EewSM_C0bkJSMiobIWiXFz7pMcadgZlweUdjBcjvaepHBe8wou0ZtDM9TKom0hs_nx_AKy0dnXGNWI1qftTjAg=w1920-h979-ft" 
alt=""></div>
			</div>
		</div>
	</section>

</body>
</html>
