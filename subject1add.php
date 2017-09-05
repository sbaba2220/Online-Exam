<?php
session_start();
if(!$_SESSION["username"]){
header("location: index.php");
}
?>
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
<?php
require 'dbconn.php';
if(isset($_POST['qes_submit']))
{
	mysql_query("insert into s1questions(question,first,second,third,fourth,answer) 
values
  ('".$_POST['question']."','".$_POST['first']."','".$_POST['second']."','".$_POST['third']."','".$_POST['fourth']."','".$_POST['answer']."');")
or die(mysql_error());
echo "<script>alert('question added successfully')</script>";
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
        <li><a href="subject1modify.php">Modify</a></li>
       <li><a href="subject1add.php">Add</a></li>
       <li><a href="subject1delete.php">Delete</a></li>
       <li><a href="subject1.php">Dashboard</a></li>
       
       </ul>
     <ul class="nav navbar-nav navbar-right">
       <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["username"]?></a></li>
       <li><input class="btn btn-success" type="submit" name="logoutsubmit" value="logout"><span class="glyphicon glyphicon-log-in"></span></a></li>
     </ul>
   </div>
 </div>
</nav>
</form>
	</head><body>
	<link rel = "stylesheet"
   type = "text/css"
   href = "style.css" /><br><br>
<br>


<b><center><font size=5">Enter the questions to be added:
</font></b><br>
<br>
<form action="" method="post">
<b>Question:</b><textarea name="question" rows="4" cols="50" required>
</textarea>

<table>
<tr><td><b>First Option: </b></td> <td><textarea name="first" rows="1" cols="30" required></textarea></td>	</tr>
<br><tr><td><b>Second Option: </b></td><td><textarea name="second" rows="1" cols="30" required></textarea></td>	</tr>
<br><tr><td><b>Third Option: </b></td><td><textarea name="third" rows="1" cols="30" required></textarea></td>	</tr>
<br><tr><td><b>Fourth Option: </b></td><td><textarea name="fourth" rows="1" cols="30" required></textarea></td>	</tr>
</table>
<br>
Correct Option:
<select name="answer" id="correct">
<option value="1">01</option>
<option value="2">02</option>
<option value="3">03</option>
<option value="4">04</option>
</select>
<br><br>
<input type="submit" class="button" name="qes_submit" value="Submit">
<BR>		<br>
</form>
<center><a href="subject1.php" ><input type="submit" class="button" value="Back to Subject1 Dashboard"></a><br><br><br>
</center>
</body>
</html>

