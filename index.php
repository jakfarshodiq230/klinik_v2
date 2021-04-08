<!DOCTYPE html>
<html lang="en"> 

<!-- BEGIN HEAD -->
<head>
     <meta charset="UTF-8" />
    <title>Guthul SIRS | Login Page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap"
      rel="stylesheet"
    />
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
<body >
<?php
error_reporting(0);
session_start();
include_once("library/koneksi.php");

if(@$_POST["login"]){ //jika tombol Login diklik
	$user=$_POST["user"];
	$pass=md5($_POST["pass"]);
	
	if($user!="" && $pass!=""){
		include_once("library/koneksi.php");
		$em = mysqli_query($koneksi,"select * from login where password = '$pass' AND username = '$user'");
		$data = mysqli_fetch_assoc($em);
		
		if($data["username"] == $user && $data["password"] == $pass){
			echo "<div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					Data Telah Ditemukan!!.
                  </div>";
			$_SESSION["user"]=$data["username"];
			$_SESSION["pass"]=$data["password"];
			header("Location:admin?menu=dasbort");
		}else{
			echo "<center><div class='alert alert-warning alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Data Tidak Ditemukan!!</b>
                  </div><center>";
		}
	}

}
?>
<img class="wave" src="img/bg.jpg" />
    <div class="container">
      <div class="img"></div>
      <div class="login-content">
        <form action="" method="post" class="form-signin">
            <img src="img/send-user.png" />
            <h2 class="title">SIR-Dokter</h2>
            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div class="div">
                    <h5>Username</h5>
                    <input type="text" required name="user" class="input" />
                </div>
            </div>
            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5>Password</h5>
                    <input type="password" required name="pass" class="input" />
                </div>
            </div>
            <a href="#">Forgot Password?</a>
            <input type="submit" class="btn" name="login" value="Login" />
        </form>
      </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</div>
	      
      <!-- PAGE LEVEL SCRIPTS -->
      <script src="js/jquery-2.0.3.min.js"></script>
      <script src="js/bootstrap.js"></script>
      <!--END PAGE LEVEL SCRIPTS -->

</body>
    <!-- END BODY -->
</html>
