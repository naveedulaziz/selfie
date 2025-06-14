<?php if(!session_id()){
	session_start();
}

if (!isset($_SESSION['adminname'])){
	header("location: adminlogin.php");
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
</head>
<body>
<i class="icon-class" style=";color:sky-blue;"></i>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      
      <h4 style="color:grey">Admin: <?php if(!session_id()){
	session_start();
}echo $_SESSION['adminname'] ?></h4>
    </div>
    
      
   <ul class="nav navbar-nav navbar-right">
      <li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
    </ul>
      </div>
</nav>
<section>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="dashboard.php">Dashboard</a>
  <a href="users.php">Users</a>
  <a href="#">Uploads</a>
  <a href="#">Photos</a>
  <a href="#">Comments</a>
</div>
<div id="main">
  <span id="opn" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
</div>
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
	document.getElementById("opn").innerHTML="";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
	document.getElementById("opn").innerHTML="&#9776; open";
}

</script>
</section>

<div id="page-wrapper" style="background: -webkit-linear-gradient(135deg, lightgreen, lightyellow, lightgreen);">

<section>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <center>Dashboard!</center>
        </h1>
 
<div class="container-fluid">
     <ul class="breadcrumb">
            <li class="active">
                  <a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li class="">
                <a href="users.php"><i class="fa fa-user"></i> Users</a>
            </li>
            <li class="">
                <a href="#"><i class="fa fa-arrow-up"></i> Uploads</a>
            </li>
            <li class="">
                <a href="#"><i class="fa fa-photo"></i> Photos</a>
            </li>
            <li class="">
                <a href="#"><i class="fa fa-edit"></i> Comments</a>
            </li>
        </ul>
</div>

</section>

<section>
<div class="container">
<div class="row">
         <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-users fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">26</div>
                                <div>New Views</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">Total Views</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-photo fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php

 $db=mysqli_connect("localhost","root", "", "selfie");
$sql = "SELECT * FROM images";
$result = mysqli_query($db, $sql);
$count=( mysqli_num_rows($result));
	echo $count;
?></div>
                                <div>Photos</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">Total Photos In Gallery</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php

 $db=mysqli_connect("localhost","root", "", "selfie");
$sql = "SELECT * FROM loginsignup";
$result = mysqli_query($db, $sql);
$count=( mysqli_num_rows($result));
	echo $count;
?>  </div>
                                <div>Users</div>
                            </div>
                        </div>
                    </div>
                    <a href="users.php">
                        <div class="panel-footer">
                            <span class="pull-left">Total Users</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-support fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">6</div>
                                <div>Comments</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">Total Comments</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
	</div>
	</div>
	</div>
	</div>
	</body>