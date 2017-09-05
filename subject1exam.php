<?php
session_start();
if(!$_SESSION["userid"]){
header("location: index.php");
}
?>
<html>
<style>
#contain{
top:40%;
left:50%;
}
</style>
<head>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<form action="studentlogout.php" method="post">
<nav class="navbar navbar-inverse">
 <div class="container-fluid">
   <div class="collapse navbar-collapse" id="myNavbar">
     <ul class="nav navbar-nav">
       <li><a href="studentafterlogin.php">Home</a></li>
       </ul>
     <ul class="nav navbar-nav navbar-right">
       <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["userfirstname"]?></a></li>
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
   <br>
   <center><h1><b>Welcome to Subject1 Examination.</b></h1>
   <?php 
   session_start();
   if($_SESSION["subject1"]!="completed")
   {
   ?>
   <br><br><b><h2>Do you want to start the exam then click start button</b></h2>
   <br>
   <p><h3><b>Instructions:</b></h3><br>
   <font size=5>1. Please <b>SUBMIT</b> before the time ends.<br>
   2. Please dont refresh the page, it will end the exam.<br><br>
   </font>
   <a href="subject1examstart.php"><input class="btn btn-success"  type="submit" name="examstart" value="Start Exam">
   <?php
   }
   else
   {
   require 'dbconn.php';
   $query=mysql_query("select subject1marks from registers where user_id='".$_SESSION['userid']."';");
$row = mysql_fetch_row($query);
   echo "<h3><b>Your score is " .$row[0]." Marks</b></h3><br> </center>";
   $result=mysql_query("select * from s1questions where answer!=0");
   
   $i=1;
   echo "<div id='contain'><p>";
   while($row = mysql_fetch_row($result))
{
   // echo "<div align='center' id='contain'>";
    echo "<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Q </b>".$i.") $row[1]<br><br>";
    echo "<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Options : </b>";
    echo "1) $row[2]";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2) $row[3]";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3) $row[4]";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4) $row[5]";
	echo "<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Answer : </b><td>$row[6]</td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	
	//echo "<div style='border:1px solid black;'>";
	/*echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$i) 1.<input type='radio' value='1' name='$count'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.<input type='radio' name='$count' value='2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.<input type='radio' value='3' name='$count'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.<input type='radio' value='4' name='$count'>";
    */
    echo "<br><br>\n";
    $i++;
}
echo "</div></p></body>";
  }
   ?>
   </a>
   
   <br><br>
</body>
</html>
