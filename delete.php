<?php
if(!session_id()){
	session_start();
}

if (!isset($_SESSION['adminname'])){
	header("location: adminlogin.php");
}

 $db=mysqli_connect("localhost","root", "", "selfie");
     $query = "DELETE FROM loginsignup WHERE id = " . $_GET["id"];
    $result = mysqli_query($db, $query);
	header("location: users.php");
 ?>