<!DOCTYPE html>
<html lang="en-US">
<head>
<link rel="icon" type="images/jpg" href="images/icon/selfielogo.png">
   <title>Users</title>
<style>
body {
	padding:0;
	margin:0 auto;
    font-family: "Lato", sans-serif;
}
.img{
	width:30px;
	height:30px;
}
.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover, .offcanvas a:focus{
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

#main {
    transition: margin-left .5s;
    padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>

</head>
<body>
<div class="container-fluid">
<?php include('control.php'); ?>
        <h1 class="page-header">
            <center>Users List Page!</center>
        </h1>
        <div class="container-fluid">
                        
           <table class="table table-hover">
              <thead>
                 <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                  </tr>
                  </thead>
             <tbody>
                 <tr>
				 
<?php

 $db=mysqli_connect("localhost","root", "", "selfie");
$sql = "SELECT * FROM loginsignup";
$result = mysqli_query($db, $sql);
if( mysqli_num_rows( $result )==0 ){
        echo '<tr><td colspan="4">No Rows Returned</td></tr>';
      }
	  else{
		  $count=0;
        while( $row = mysqli_fetch_assoc($result) ){
			echo "<tr><td>". $row['id']. "</td><td>". $row['name']. "</td><td>" .$row["username"]. "</td><td>" .$row["email"]."</td><td>" .$row["password"]."</td><td><td><a href='delete.php?id=" . $row['id'] . "'>Delete</a></td></tr>";
			
			}
}
?>  
             </tbody>
      </table>
     </div>
    </div>
 <!-- /.row -->
     </body>
	 </html>