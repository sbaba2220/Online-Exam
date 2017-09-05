<?php
session_start();
if($_SESSION["userid"]){
header("location: studentafterlogin.php");
}
if($_SESSION["username"]){
header("location: adminafterlogin.php");
}
   include_once('loginfunctions.php');  
       
    $funObj = new dbFunction();  
   if(isset($_POST['login'])){  
        $emailid = $_POST['user'];  
        $password = $_POST['pass']; 
        //echo $emailid;
        //echo md5($password); 
        $user = $funObj->Login($emailid, $password);  
        if ($user) {  
            echo "<script>alert('Login Success');document.location='studentafterlogin.php'</script>";  
        } else {  
            echo "<script>alert('Emailid / Password Not Match')</script>";  
        }  
    }
    if(isset($_POST['register_submit'])){  
     $emailid = $_POST['email'];  
 	if (!filter_var($emailid, FILTER_VALIDATE_EMAIL)) {
      echo "<script>alert('Invalid email format')</script>";
      } 
 // $emailErr = "Invalid email format"; 
 else
 {
        $firstname = $_POST['firstname']; 
        $lastname = $_POST['lastname'];  
        $emailid = $_POST['email'];  
        $phone=$_POST['phone'];
        $password = $_POST['password'];  
        $confirmPassword = $_POST['confirmpassword'];  
        if($password == $confirmPassword){  
            $check = $funObj->isUserExist($emailid);  
            if(!$check){  
                $register = $funObj->UserRegister($firstname,$lastname, $emailid,$phone, $password);  
                if($register){  
                     echo "<script>alert('Registration Successful')</script>";  
                }else{  
                    echo "<script>alert('Registration Not Successful')</script>";  
                }  
            } else {  
                echo "<script>alert('Email Already Exist')</script>";  
            }  
        } else {  
            echo "<script>alert('Password Not Match')</script>";  
          
        }
        }  
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
  <center>
	  <br><br>
  <b><h2>Student Registration</h2></b>
  <form action='' method='post'>
	<table class='table table-bordered'>
  <tr><td><b>Firstname:</b></td><td><input type='text' name='firstname' required></td></tr>
  <tr><td><b>Lastname:</b></td><td><input type='text' name='lastname' required></td></tr>
  <tr><td><b>Email:</b></td><td><input type='text' name='email' required></td></tr>
  <tr><td><b>PhoneNumber:</b></td><td><input type='text' name='phone' required></td></tr>
  <tr><td><b>Password:</b></td><td><input type='password' name='password' required></td></tr>
  <tr><td><b>Confirm Password:</b></td><td><input type='password' name='confirmpassword' required></td></tr>
  </table>
  <br>
  <br>
  <input class="btn btn-success" type='submit' name='register_submit' value='Register'>
  </form>
  </center>
  
   </body>
   

</html>
