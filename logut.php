<?php
 session_start();
  session_destroy();
  unset($_SESSION['username']);
  $_SESSION['massage']="You Are Logged Out";
	header("location: login.php");

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
</body>
</html>
