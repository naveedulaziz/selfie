<?php
session_start();
if (!isset($_SESSION['nID']))
    header("Location: login.php");
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h4>Welcome <?php echo $_SESSION['username'] ?> </h4>
<a href="logut.php">Log Out</a>
</body>
</html>
