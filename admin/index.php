<?php
error_reporting(0);
session_start();
include("../library/variabel.php");
date_default_timezone_set('Asia/Jakarta');
if($_SESSION["user"]!="" && $_SESSION["pass"]!=""){
?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD-->
<head>
    <meta charset="UTF-8" />
    <title>SIRDI Admin | G-Developer</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/theme.css" />
    <link rel="stylesheet" href="../css/MoneAdmin.css" />
    <link rel="stylesheet" href="../css/font-awesome.css" />
	<link rel="stylesheet" href="../css/datepicker.css" />
    <link rel="stylesheet" href="../css/loding.css" />
    <!--END GLOBAL STYLES -->
</head>
<body class="padTop53">
<!-- <body onload="myFunction()" style="margin:0;" class="padTop53">
    <div id="loader"></div>
    <div style="display:none;" id="myDiv" class="animate-bottom"> -->
	<div id="wrap">
		<!-- HEADER SECTION -->
		 <?php include_once("menu_atas.php");?>
        <!-- END HEADER SECTION -->
		
		 <!-- MENU SECTION -->
		 <?php include_once("menu_admin.php");?>
         <!-- end menu -->
        <!-- FOOTER -->
		 <?php include_once("footer.php");?>
        <!--END FOOTER -->
	</div>
     <!-- GLOBAL SCRIPTS -->
    <script src="../js/jquery-2.0.3.min.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

<script>
    var myVar;
    function myFunction() {
        myVar = setTimeout(showPage, 2000);
    }
    function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("myDiv").style.display = "block";
    }
</script>
</body>

<?php
}else{
	header("Location:../index.php");
}
?>