<?php
session_start();
if(isset($_POST['submit']))
{
	if($_POST['username']=="admin" && $_POST['password']=="12345")
	{
		echo "<script>alert('Login Successfull');document.location='adminafterlogin.php'</script>";
		$_SESSION["username"]=$_POST["username"];
	}
	else
	{
		echo "<script>alert('Invalid Credentials');document.location='index.php'</script>";
	}
}
?>
