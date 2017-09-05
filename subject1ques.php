<?php
session_start();
if(!$_SESSION["username"]){
header("location: index.php");
}
require 'dbconn.php';
if(isset($_POST['qes_modify_submit']))
{
	mysql_query("update s1questions set question='".$_POST['question']."',first='".$_POST['first']."', second='".$_POST['second']."' 
	, third='".$_POST['third']."' , fourth='".$_POST['fourth']."' , answer='".$_POST['answer']."' where ques_id='".$_POST['id']."';")
	or die(mysql_error());
	
echo "<script>alert('question modified successfully');</script>";
}
if(isset($_POST['qes_add_submit']))
{
	mysql_query("insert into s1questions(question,first,second,third,fourth,answer) 
values
  ('".$_POST['question']."','".$_POST['first']."','".$_POST['second']."','".$_POST['third']."','".$_POST['fourth']."','".$_POST['answer']."');")
or die(mysql_error());
echo "<script>alert('question added successfully')</script>";
}
if(isset($_POST['qes_delete_submit']))
{
	mysql_query("delete from s1questions where ques_id='".$_POST['id']."';")
	or die(mysql_error());
	
echo "<script>alert('question deleted successfully')</script>";
}
?>
<html>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<style>
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
	</style>
<body>

      <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         <center> <h4 class="modal-title">Modify Questions</h4></center>
        </div>
        <div class="modal-body">
         
         <center>
   <form action="subject1.php" method="post">
	   <br>
	   <b>Enter the question id :</b><input type='text' name='id' required><br><br>
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
<input type="submit" class="button" name="qes_modify_submit" value="Submit">
   </form>
   </center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </div>
  </div>
      
      
      
       <div class="modal fade" id="myModaladd" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         <center> <h4 class="modal-title">Add Questions</h4></center>
        </div>
        <div class="modal-body">
         
         <center>
   <form action="subject1.php" method="post">
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
<input type="submit" class="button" name="qes_add_submit" value="Submit">
<BR>		<br>

   </form>
   </center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </div>
  </div>
      
      
      
       
       <div class="modal fade" id="myModaldelete" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         <center> <h4 class="modal-title">Delete Questions</h4></center>
        </div>
        <div class="modal-body">
         
         <center>
   <form action="subject1.php" method="post">
	    <b>Enter the question id to be deleted :</b><input type='text' name='id' required><br><br>
   
<br>
<input type="submit" class="button" name="qes_delete_submit" value="Submit">
<BR>		
   </form>
   </center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </div>
  </div>
 


</body>
<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<form action="adminlogout.php" method="post">
<nav class="navbar navbar-inverse">
 <div class="container-fluid">
   <div class="collapse navbar-collapse" id="myNavbar">
     <ul class="nav navbar-nav">
       <li><a href="adminafterlogin.php">Home</a></li>
        <li><a href="" data-toggle="modal" data-target="#myModal">Modify</a></li>
       <li><a href="" data-toggle="modal" data-target="#myModaladd">Add</a></li>
       <li><a href="" data-toggle="modal" data-target="#myModaldelete">Delete</a></li>
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
	</head>
	<?php
if(!$_SESSION["username"]){
header("location: index.php");
}
require 'dbconn.php';
$result=mysql_query("select * from s1questions where answer!=0");
$i=1;
	echo "<table class='table table-bordered'><br><br><body><link rel = 'stylesheet'
   type = 'text/css'
   href = 'style.css' />";
   echo "<th>Question No.<td>Question Id</td><td>Question</td><td>A</td><td>B</td><td>C</td><td>D</td><td>Answer</td></th>";

while($row = mysql_fetch_row($result))
{
	echo "<tr>";
    echo "<td>.$i.</td>";
	echo "<td>$row[0]</td>";
    echo "<td>$row[1]</td>";
    echo "<td>$row[2]</td>";
	echo "<td>$row[3]</td>";
	echo "<td>$row[4]</td>";
	echo "<td>$row[5]</td>";
	echo "<td>$row[6]</td>";
    echo "</tr></body>\n";
    $i++;
}
echo "</table>";
?>
<body>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="subject1.php" ><input type="submit" class="button" value="Back to Subject1 dashboard"></a>
</body>
</html>
