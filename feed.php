<?php 
if(isset($_POST['upload'])){
	$target="photos/".basename($_FILES['image']['name']); //path of folder
	
<!DOCTYPE html>
<html>
<head>
<title>Selfie Feed</title>
</head>

<body>
<form method="post" action="feed.php" enctype="multipart/form-data>
<input type="hidden" name="size" value="1000000">
<input type="file" name="image">
<textarea name="text" cols="80" rows="4" placeholder="Description"></textarea>
<input type="submit" name="upload" value="upload image">


</body>
</html>