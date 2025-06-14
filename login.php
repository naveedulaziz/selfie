<?php
 $db=mysqli_connect("localhost","root", "", "test");
 if(isset($_POST['login_btn'])){
	 $user=$_POST['username'];
	 $password=$_POST['password'];
	 
		 $password=md5($password); //hash before storing the password for security
		 $sql="SELECT * FROM users where username='".$user."' AND password='".$password."'";
		 $res=mysqli_query($db, $sql);
		 if(mysqli_num_rows($res)==1){
			 session_start();
		 $_SESSION['massage']="YOU ARE LOGGED IN";
		 $_SESSION['username']=$user;
		$_SESSION['nID'] = 1;
		 header("location: home.php");
	 }
	 else{
		 $_SESSION['massage']="PASSWORDS DO NOT MATCH";
	 }
 }

?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php if(isset($_SESSION['massage'])){
	echo $_SESSION['massage'];
	unset($_SESSION['massage']);
}
?>
<form method="post" action="login.php">
	<input type="text" name="username" placeholder="Username">
	<input type="password" name="password" placeholder="Password">
	<input type="submit" name="login_btn" value="Register" >
</form>
</body>
</html>
