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
<link rel="icon" type="images/jpg" href="images/icon/selfielogo.png">
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet">

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
.btn{
text-align:center;
font-family:Arial, Helvetica, sans-serif;
border-style:solid;
border-width:thin;
border-color:#00CCFF;
background-color:#00CCFF;
}
#imagelist{
border: thin solid silver;
align:left;
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
.user{
margin-top: 5px;
margin-left: 5px;
}
p.user{
	content: '\f007';
	font-style:normal;
	font-size:200%;
	text-align:left;
}
img{
	width:450px;
height: 550px;
}
</style>
</head>
<body>
<div class="container-fluid">
<i class="icon-class" style=";color:sky-blue;"></i>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      
      <h4 style="color:grey">User: <?php if(!session_id()){
	session_start();
}echo $_SESSION['username'] ?></h4>
    </div>
    
      
   <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
    </ul>
      </div>
</nav>
</div>
<center>
<form action="feed.php" method="post" enctype="multipart/form-data" name="addroom">
<textarea name="caption" rows="4" cols="65"class="ed" id="brnu" placeholder="ENTER DESCRIPTION"></textarea><br/>

  <label for="files" class="btn">SELECT IMAGE</label>
 <input id="files" type="file" style="visibility:hidden;" name="image" class="ed" required>
 <input type="submit" name="submit" value="Upload" class="btn"	/>
</form>
</center>
<br />

<?php
$result = mysqli_query($db,"SELECT * FROM images");
while($row = mysqli_fetch_array($result))
{
echo '<center>';	
echo '<div id="imagelist">';
echo '<p class="user">'.$row['username'].'</p>';
echo '<p><img src="'.$row['image'].'"></p>';
echo '<p id="caption">'.$row['caption'].' </p>';
echo '</div>';
echo '</center>';
}
?>
</body>