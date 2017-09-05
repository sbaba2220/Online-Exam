<?php
session_start();
if($_SESSION["userid"]){
header("location: studentafterlogin.php");
}
if($_SESSION["username"]){
header("location: adminafterlogin.php");
}
?>
<html>
<head>

	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<nav class="navbar navbar-inverse">
 <div class="container-fluid">
   <div class="collapse navbar-collapse" id="myNavbar">
     <ul class="nav navbar-nav">
       <li><a href="index.php">Home</a></li>
       </ul>
     <ul class="nav navbar-nav navbar-right">
      <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> SignUp</a></li>-->
    <!--   <li><a href="../logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>-->
     </ul>
   </div>
 </div>
</nav>
</head>
<body>
	<link rel = "stylesheet"
   type = "text/css"
   href = "style.css" />
  <center><form action="" method="post">
	  <br><br>
  <b><h2>Student Forget Password:</h2></b><br>
   Enter your email: <input type="text" placeholder="Enter email" name='email'><br>
   <br>
   <input type="submit" class="btn btn-success" name='submit' value="get your password">
   </form>
   </center>
   </body>
   </html>
   