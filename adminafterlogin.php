<?php
session_start();
if($_SESSION["userid"]){
header("location: studentafterlogin.php");
}
if(!$_SESSION["username"]){
header("location: index.php");
}
?>
<html>
	<head>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<form action="adminlogout.php" method="post">
<nav class="navbar navbar-inverse">
 <div class="container-fluid">
   <div class="collapse navbar-collapse" id="myNavbar">
     <ul class="nav navbar-nav">
       <li><a href="home.php">Home</a></li>
       </ul>
     <ul class="nav navbar-nav navbar-right">
       <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["username"]?></a></li>
       <li><input class="btn btn-success" type="submit" name="logoutsubmit" value="logout"><span class="glyphicon glyphicon-log-in"></span></a></li>
     </ul>
   </div>
 </div>
</nav>
</form>
	</head>
	<body>
		<link rel = "stylesheet"
   type = "text/css"
   href = "style.css" />
<h1>
	<br>
<center>Admin Dashboard</center></h1>
<br><br>
<style>
.button {
    background-color: #4A4341;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>

	<center>
<h2>Select Subjects</h2><br>
<a href="subject1.php" ><input type="button" class="button" value="C programming AND Databases"></a>
<a href="subject2.php" ><input type="button" class="button" value="Subject2"></a>
<a href="subject3.php" ><input type="button" class="button" value="Subject3"></a>
<a href="subject4.php" ><input type="button" class="button" value="Subject4"></a>
</center>
</body>

</html>
