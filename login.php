<!-- login php -->
<?php
session_start();
include('./includes/config.php');
if(isset($_POST['login-submit']))
{
$status='1';
$email=$_POST['login-email'];
$password=$_POST['login-password'];
$sql ="SELECT * FROM users WHERE email=:email and password=:password and status=(:status)";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> bindParam(':status', $status, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['login-email'];
// $_SESSION['aid']=$results['id'];
// header("location:profile.php");
echo "<script type='text/javascript'> document.location = './main.php'; </script>";
} else{
  
  echo "<script>alert('Invalid Details Or Account Not Confirmed');</script>";

}

}
// signup php
if(isset($_POST['signup-submit']))
{
$file = $_FILES['image']['name'];
$file_loc = $_FILES['image']['tmp_name'];
$folder="images/"; 
$new_file_name = strtolower($file);
$final_file=str_replace(' ','-',$new_file_name);

$name=$_POST['signup-name'];
$email=$_POST['signup-email'];
$password=$_POST['signup-password'];

if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		$image=$final_file;
    }

$notitype='Create Account';
$reciver='Admin';
$sender=$email;

$sqlnoti="insert into notification (notiuser,notireciver,notitype) values (:notiuser,:notireciver,:notitype)";
$querynoti = $dbh->prepare($sqlnoti);
$querynoti-> bindParam(':notiuser', $sender, PDO::PARAM_STR);
$querynoti-> bindParam(':notireciver',$reciver, PDO::PARAM_STR);
$querynoti-> bindParam(':notitype', $notitype, PDO::PARAM_STR);
$querynoti->execute();    
    
$sql ="INSERT INTO users(name,email, password,image,status) VALUES(:name, :email, :password,:image, 1)";
$query= $dbh -> prepare($sql);
$query-> bindParam(':name', $name, PDO::PARAM_STR);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':image', $image, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script type='text/javascript'>alert('Registration Sucessfull!');</script>";
echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
}
else 
{
$error="Something went wrong. Please try again";
}

}
?>

<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript">

function validate()
      {
          var extensions = new Array("jpg","jpeg","png");
          var image_file = document.regform.image.value;
          var image_length = document.regform.image.value.length;
          var pos = image_file.lastIndexOf('.') + 1;
          var ext = image_file.substring(pos, image_length);
          var final_ext = ext.toLowerCase();
          for (i = 0; i < extensions.length; i++)
          {
              if(extensions[i] == final_ext)
              {
              return true;
              
              }
          }
          alert("Image Extension Not Valid (Use Jpg,jpeg,Png)");
          return false;
      }
      
</script>
</head>
<body>
  <a href="main.php" class="faith-button">Faith<span>.</span></a>
  <div class="container" style="height: 80%;width:75%;">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="./assets/img/Images/tamirlan-maratov-6FoluBMESZE-unsplash.jpg" alt="">
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
            <div class="title">Login</div>
          <form method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter your email" required name="login-email">
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" required name="login-password">
              </div>
              <!-- <div class="text"><a href="#">Forgot password?</a></div> -->
              <div class="button input-box">
              <!-- <button  name="login-submit" type="submit">LOGIN</button> -->
                <input type="submit" value="Sumbit" name="login-submit">
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label></div>
            </div>
        </form>
      </div>
        <div class="signup-form">
          <div class="title">Signup</div>
        <form method="post" class="form-horizontal" enctype="multipart/form-data" name="regform" onSubmit="return validate();">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter your email" required name="signup-email">
              </div>
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Enter your name" required name="signup-name">
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" required name="signup-password">
              </div>
              <div class="input-box">
                <i class="fas fa-image"></i>
                <input type="file" name="image" class="form-control">
              </div>
              <div class="button input-box">
              <input type = "submit" value="Submit" name="signup-submit">
              </a>
              
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
      </form>
    </div>
    </div>
    </div>
  </div>
</body>
</html>
