<?php
if(!session_id()){
	session_start();
}
if (isset($_SESSION['username'])){
	header("location: feed.php");
}

 $db=mysqli_connect("localhost","root", "", "selfie");
 if(isset($_POST['register_btn'])){
	$user=$_POST['username'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$password2=$_POST['password2'];	 
	if($password===$password2){
		//$password=md5($password); //hash before storing the password for security
		if(preg_match("/\s/", $user)){
			$_SESSION['spacemessage']="USERNAME MUST NOT CONTAIN A SPACE";
 		}
		else{
			$sql="SELECT * FROM loginsignup where username='".$user."'";
			$res=mysqli_query($db, $sql);
			if(mysqli_num_rows($res)==1){
				$_SESSION['userexist']="USERNAME EXISTS! PLEASE CHOOSE A DIFFERENT USERNAME";
			}
			else{
				$sql="SELECT * FROM loginsignup where email='".$email."'";
				$res=mysqli_query($db, $sql);
				if(mysqli_num_rows($res)==1){
				$_SESSION['email']="ACCOUNT EXIST ON THIS EMAIL! PLEASE TRY A DIFFERENT EMAIL";
				}
				else{
					$sql="INSERT INTO loginsignup(name, username, email, password) VALUES('".$name."', '".$user."', '".$email."', '".$password."')";
					mysqli_query($db, $sql);
					$_SESSION['massage']="YOU ARE SIGNED UP";
					$_SESSION['username']=$user;
					header("location: feed.php");
				}
			}
		}
	}
 else{
	$_SESSION['massage']="PASSWORDS DO NOT MATCH";
	}
 }
 
  if(isset($_POST['go'])){
	 $user=$_POST['user'];
	 $password=$_POST['pass'];
	 
		 //$password=md5($password); //hash before storing the password for security
		 $sql="SELECT * FROM loginsignup where username='".$user."' AND password='".$password."'";
		 $res=mysqli_query($db, $sql);
		 if(mysqli_num_rows($res)==1){
			 session_start();
		 $_SESSION['msg']="YOU ARE LOGGED IN";
		 $_SESSION['username']=$user;
		 header("location: feed.php");
	 }
	 else{
		 $_SESSION['msg']="USERNAME AND PASSWORD DO NOT MATCH";
	 }
 }

?>
<script>
var pass = function() {
	var x=document.getElementsByName('password')[0].value;
	var y=document.getElementsByName('password2')[0].value;
  if ( x==y) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'MATCH';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'NOT MATCH';
  }
}

var user = function() {
	var x=document.getElementsByName('username')[0].value;
	document.onkeyup = function (e) {
    if (e.keyCode == 32) {
    document.getElementById('umessage').style.color = 'red';
    document.getElementById('umessage').innerHTML = 'MUST NOT CONTAIN A SPACE';       
    }
 else {
    document.getElementById('umessage').style.color = 'green';
    document.getElementById('umessage').innerHTML = 'FINE';
  }
	}}
</script>



<!DOCTYPE html>
<html >
<head>
<link rel="icon" type="images/jpg" href="images/icon/selfielogo.png">
  <meta charset="UTF-8">
  <title>Login</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="Css/styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<br>
<body>
<div class="container1">
  <div class="card"></div>
  <div class="card">
  
   <h1 class="title">Login</h1>
   <?php if(isset($_SESSION['massage'])||isset ($_SESSION['spacemessage'])||isset ($_SESSION['userexist'])||isset ($_SESSION['email'])){
	echo "<h4 style='color:red; font-size:140%; text-align:center;'>SIGNUP ERROR! PLEASE SIGNUP AGAIN</h4>";
}
?>
    <form method="post" action="login.php">
      <div class="input-container1">
        <input type="text" id="#{label}" name="user" required="required"/>
        <label for="#{label}">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container1">
        <input type="password" id="#{label}" name="pass" required="required"/>
        <label for="#{label}">Password</label>
			<?php if(isset($_SESSION['msg'])){
	echo "<h4 style='color:red; font-size:120%'>".$_SESSION['msg']."</h4>";
	unset($_SESSION['msg']);
}
?>
        <div class="bar"></div>
      </div>
      <div class="button-container1">
        <button type="submit" name="go"><span>Go</span></button>
      </div>
      <div class="footer"><a href="#">Forgot your password?</a></div>
    </form>
  </div>
  <div class="card alt">
    <div class="toggle"></div>
    <h1 class="title">Register
      <div class="close"></div>
    </h1>
    <form action="login.php" method="post">
      <div class="input-container1">
        <input type="text" name="name" id="#{label}" required="required"/>
        <label for="#{label}">Name</label>
        <div class="bar"></div>
      </div>
	        <div class="input-container1">
        <input type="text" name="username" id="#{label}" onkeyup="user();" required="required"/>
        <label for="#{label}">Username</label>
		<p id="umessage"></p>
        <div class="bar"></div>
					<?php if(isset($_SESSION['spacemessage'])){
					echo "<h4 style='color:red; font-size:120%'>".$_SESSION['spacemessage']."</h4>";
					unset($_SESSION['spacemessage']);}
					if(isset($_SESSION['userexist'])){
						echo "<h4 style='color:red; font-size:120%'>".$_SESSION['userexist']."</h4>";
						unset($_SESSION['userexist']);
					}
?>
   </div>

	        <div class="input-container1">
        <input type="email"  name="email" id="#{label}" required="required"/>
        <label for="#{label}">Email</label>
		<?php if(isset($_SESSION['email'])){
	echo "<h4 style='color:red; font-size:120%'>".$_SESSION['email']."</h4>";
	unset($_SESSION['email']);
}
?>
        <div class="bar"></div>
		</div>
      <div class="input-container1">
        <input type="password"  name="password" onkeyup="pass();" id="#{label}" required="required"/>
        <label for="#{label}">Password</label>
        <div class="bar"></div>
		
      </div>
      <div class="input-container1">
        <input type="password" name="password2" onkeyup="pass();" id="#{label}" required="required"/>
        <label for="#{label}">Repeat Password</label>
		<p id="message"></p>
		<?php if(isset($_SESSION['massage'])){
		echo "<h4 style='color:red; font-size:120%'>".$_SESSION['massage']."</h4>";
		unset($_SESSION['massage']);
}
?>
        <div class="bar"></div>

	
      </div>
      <div class="button-container1">
        <button type="submit" name="register_btn" ><span>Next</span></button>
      </div>
    </form>
  </div>
</div>
   <script src="Js/index.js"></script>

</body>
</html>
