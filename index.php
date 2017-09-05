<?php
session_start();
if($_SESSION["userid"]){
header("location: studentafterlogin.php");
}
session_start();
if($_SESSION["username"]){
header("location: adminafterlogin.php");
}

   include_once('loginfunctions.php');  
       
    $funObj = new dbFunction();  
   if(isset($_POST['login'])){  
        $emailid = $_POST['username'];  
        $password = $_POST['password']; 
        //echo $emailid;
        //echo md5($password); 
        $user = $funObj->Login($emailid, $password);  
        if ($user) {  
            echo "<script>document.location='studentafterlogin.php'</script>";  
        } else {  
            echo "<script>alert('Emailid / Password Not Match')</script>";  
        }  
    }

?>
<html>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>
#contain1 {
    position: fixed;
    width: 340px;
    height: 400px;
    top: 40%;
    left: 50%;
    margin-top: -140px;
    margin-left: -170px;
    background: #fff;
  //  border-radius: 3px;
  //  border: 1px solid #ccc;
    box-shadow: 0 1px 2px rgba(0, 0, 0, .1);
   // background-color: #87F9EE;
}
body{
    color:#000000;
    margin-left:0;
    margin-right:0;
    margin-top:0;
    margin-bottom:0;
    margin-width:0;
    margin-height:0;
  //  background-image: url("images/exam.jpg");    
    background-size: 1600px 1000px;
    background-repeat: no-repeat;
}
input[type=text] {
	border-radius: 8px;
	height:50px;
}
input[type=password] {
	border-radius: 8px;
	height:50px;
}
input[type=submit] {
    background-color: #4CAF50;
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
input {
padding:5px;
margin:5px
}
</style>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel='stylesheet' href='style.css' type='text/css'>
<nav class="navbar navbar-inverse">
 <div class="container-fluid">
   <div class="collapse navbar-collapse" id="myNavbar">
     <ul class="nav navbar-nav">
       <li><a href="index.php">Home</a></li>
       </ul>
     <ul class="nav navbar-nav navbar-right">
       <li><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Admin</button>
  </li>
  </ul>
   </div>
 </div>
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         <center> <h4 class="modal-title">Admin Login</h4></center>
        </div>
        <div class="modal-body">
          <!--<center><h2  style="font-family: bookman header;color:#170D0B">Admin Login</h2></center><br><br>-->
<form action="admin.php" method="post">
<center><br><br>
<input type="text" placeholder="Username" name="username" size=35 required> <br><br>
<input type="password" placeholder="Password" name="password" size=35 required> <br>
<input id="but" type="submit" value="Sign In" name="submit"><br>
</form>
</center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </div>
  </div>

</nav>
</head>
<body>
	<div class="col-sm-6" id="contain1">
<center><h2 style="font-family: bookman header;color:#170D0B">Student Login</h2><br><br>
<form action="" method="post">

<input type="text" placeholder="Email id" id="username" name="username" size=35 required><br><br>
<input type="password" placeholder="Password" id="password" name="password" size=35 required> <br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input id="but" type="submit" value="Sign In" name='login'><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<font size="4px">New User <a href="registration.php">Register here</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="forgetpassword.php" class="forgot">forgot password?</a></font>
</center>
</form>
</div>

</body>

</html>

