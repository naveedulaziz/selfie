<?php
if(!session_id()){
	session_start();
}

if (isset($_SESSION['adminname'])){
	header("location: dashboard.php");
}
 $db=mysqli_connect("localhost","root", "", "selfie");

 if(isset($_POST['go'])){
	 $admin=$_POST['adminname'];
	 $password=$_POST['password'];
	 
		 $sql="SELECT * FROM admin where adminname='".$admin."' AND password='".$password."'";
		 $res=mysqli_query($db, $sql);
		 if(mysqli_num_rows($res)==1){
		 session_start();
		 $_SESSION['massage']="YOU ARE LOGGED IN";
		 $_SESSION['adminname']=$admin;
		 header("location: dashboard.php");
	 }
	 else{
		 $_SESSION['massage']="ADMIN NAME AND PASSWORD DO NOT MATCH";
	 }
 }

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Selfie</title>
<link rel="icon"
	type="images/jpg"
	href="images/icon/selfielogo.png">
 	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Naveed ul Aziz" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="Css/custom.css" />
		<link rel="stylesheet" href="Css/styles.css">

</head>
<body>
<div class="sl-slide-inner">
<div class="container1">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Admin Login</h1>
    <form method="post" action="adminlogin.php">
      <div class="input-container1">
        <input type="text" name="adminname" id="#{label}" required="required"/>
        <label for="#{label}">Adminname</label>
        <div class="bar"></div>
      </div>
      <div class="input-container1">
        <input type="password" name="password" id="#{label}" required="required"/>
        <label for="#{label}">Admin Password</label>
	<?php if(isset($_SESSION['massage'])){
		echo "<h4 style='font-size:120%; color:red;'>".$_SESSION['massage']."</h4>";
}
?>
        <div class="bar"></div>
      </div>
      <div class="button-container1">
        <button type="submit" name="go"><span>Go</span></button>
      </div>
    </form>
  </div>
</body>
</html>