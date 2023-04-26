<!-- admin-login-php -->
<?php
session_start();
include('./includes/config.php');
if(isset($_POST['admin-login-submit']))
{
$username=$_POST['admin-login-username'];
$password=$_POST['admin-login-password'];
$sql ="SELECT username,password FROM admin WHERE username=:username and password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['admin-login-username'];
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{
  
  echo "<script>alert('Invalid Details');</script>";

}

}

?>

<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
    <link rel="stylesheet" href="css/style1.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <a href="../main.php" class="faith-button">Faith<span>.</span></a>
  <div class="container" style="height: 55%;">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="tamirlan-maratov-6FoluBMESZE-unsplash.jpg" alt="">
        <div class="text">
          <span class="text-1">Every new friend is a <br> new adventure</span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="./assets/img/Images/backImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Admin Login</div>
          <form method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter your username" required name="admin-login-username">
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" required name="admin-login-password">
              </div>
              <!-- <div class="text"><a href="#">Forgot password?</a></div> -->
              <div class="button input-box">
              <!-- <button  name="admin-login-submit" type="submit">LOGIN</button> -->
                <input type="submit" value="Sumbit" name="admin-login-submit">
              </div>
              <!-- <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label></div> -->
            </div>
        </form>
      </div>

    </div>
    </div>
  </div>
</body>
</html>
