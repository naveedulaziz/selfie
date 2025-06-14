<?php
 session_start();
 $db=mysqli_connect("localhost","root", "", "test");
 if(isset($_POST['register_btn'])){
	 $user=$_POST['username'];
	 $email=$_POST['email'];
	 $password=$_POST['password'];
	 $password2=$_POST['password2'];	 
	 if($password===$password2){
		 $password=md5($password); //hash before storing the password for security
		if(preg_match("/\s/", $user)){
			$_SESSION['spacemessage']="Your username must not contain any whitespace";}
			else{
		 $sql="INSERT INTO users(username, email, password) VALUES('".$user."', '".$email."', '".$password."')";
		 mysqli_query($db, $sql);
		 $_SESSION['massage']="YOU ARE SIGNED UP";
		 $_SESSION['username']=$user;
			header("location: home.php");}
	 }
	 else{
		 $_SESSION['massage']="PASSWORDS DO NOT MATCH";
	 }
 }
?>
<script>
var check = function() {
	var x=document.getElementsByName('password')[0].value;
	var y=document.getElementsByName('password2')[0].value;
  if ( x==y) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Match';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Not Match';
  }
}
</script>

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
<form method="post" action="regestration.php">
	<input type="text" name="username" placeholder="Username">
	<input type="email" name="email" placeholder="Email">
	<?php if(isset($_SESSION['spacemessage'])){
	echo $_SESSION['spacemessage'];
	unset($_SESSION['spacemessage']);
}
?>
	<input type="password" name="password" onkeyup="check();" placeholder="Password">
	<input type="password" name="password2" onkeyup="check();" placeholder="Conform Password">
	<span id='message'></span>
	<input type="submit" name="register_btn" value="Register" >
</form>
</body>
</html>
