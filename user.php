<?php
if(!session_id()){
	session_start();
}

if (!isset($_SESSION['username'])){
	header("location: login.php");
}

$db=mysqli_connect("localhost","root", "", "selfie");
if (isset($_POST['submit'])) {
	$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
		
	move_uploaded_file($_FILES["image"]["tmp_name"],"photos/" . $_FILES["image"]["name"]);
	
	$image="photos/" . $_FILES["image"]["name"];
	$caption=$_POST['caption'];
	$username = $_SESSION['username'];
	$save=mysqli_query($db,"INSERT INTO images (username, image, caption) VALUES ('$username', '$image','$caption')");
	header("Location: feed.php");
	exit();					
}

?>

<!DOCTYPE html>
<html>
<head>
<style type="text/css">
body{
	padding:0;
	margin:0 auto;
	background-color:#E0FFFF;
}
#header{
	width:100%;
	height: 30px;
	color:grey;
}
.ed{
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
margin-bottom: 4px;
}
.button1{
text-align:center;
font-family:Arial, Helvetica, sans-serif;
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
background-color:#00CCFF;
height: 34px;
}
#imagelist{
border: thin solid silver;
width:470px;
height: 61 0px;
padding:5px;
margin: 10px;
background-color:#E0EEE0;
}
p{
margin:0;
padding:0;
text-align: center;
font-style: italic;
font-size: smaller;
text-indent: 0;
}
#caption{
margin-top: 5px;
}
img{
	width:460px;
height: 580px;
}
</style>
</head>
<body>

<?php
$hostname = "localhost";
$user = "root";
$password = "";
$database = "selfie";
$prefix = "";
$bd = mysqli_connect($hostname, $user, $password, $database);
$result = mysqli_query($db,"SELECT * FROM images where image=="photos/" . $_FILES["image"]["name"])";
while($row = mysqli_fetch_array($result))
{
	echo '<center>';
echo '<div id="imagelist">';
echo '<p><img src="'.$row['image'].'"></p>';
echo '<p id="caption">'.$row['caption'].' </p>';
echo '</div>';
echo '</center>';
}
?>
<div id="header">
<button type="submit" name="submit" value="Upload" class="button1"/><a href="logout.php">Log out</a></button>
</div>
</body>