<?php
require 'dbconn.php';
session_start();
if(!$_SESSION["userid"]){
header("location: index.php");
}
if($_SESSION['subject1'])
{
echo "<script>alert('You are completed the exam Thank you. ');document.location='subject1exam.php'</script>";
}
?>
<html>

	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style>
	.container {
    width: 600px;
}
.left {
    max-width: 100%;
    //background:red;
    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
    -ms-text-overflow:ellipsis;
    float: left;
}
.right {
    //background:yellow;
    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
    -ms-text-overflow:ellipsis;
    text-align: right;
}
#contain
{
top:40%;
left:50%;
}
	</style>
	<head>
	
	</head>


<body>
	<p id="status"></p>
	<link rel = "stylesheet"
   type = "text/css"
   href = "style.css" />
  <center><font><h3><b>Timer: </b></h3></font><div id="demo">
   </div>
   <br>
   <h2>Mark your answers below</h2></center>
   <br><br>
 	
   <div class="container">
	   <div col="col-sm-6">
   <?php
   require 'dbconn.php';
$result=mysql_query("select * from s1questions where answer!=0");
$i=1;
$count=0;
//echo "<center>";
echo "<div id='contain'>";
echo "<form action='' id='exam_submit' name='exam_submit' method='post'>";
while($row = mysql_fetch_row($result))
{
	$count++;
    echo "<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Q </b>".$i.". $row[1]<br><br>";
    echo "<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Options : </b>";
    echo "1) $row[2]";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2) $row[3]";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3) $row[4]";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4) $row[5]<br><br>";
//	echo "<br><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Answer : </b><td>$row[6]</td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	
	echo "<div style='border:1px solid black;'>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$i) 1.<input type='radio' value='1' name='$count'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.<input type='radio' name='$count' value='2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.<input type='radio' value='3' name='$count'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.<input type='radio' value='4' name='$count'>";
    echo "</div></body><br><br>\n";
    $i++;
}
echo "</div>";
echo "</center>";
if(isset($_POST['exam_submit']))
{
	$s=1;
	$finalresult=0;
	//echo $count;
	$result=mysql_query("select * from s1questions where answer!=0");
//while($row = mysql_fetch_row($result))
	while($row = mysql_fetch_row($result))
	{
		//echo $_POST[(string)$s];
		$ans=$_POST[(string)$s];
		$s=$s+1;
		$ansnum=(int)$ans;
		if($ansnum==$row[6])
		$finalresult+=1;
	}
	//echo $finalresult;
	//echo "The time is " . date("h:i:sa");
	$_SESSION["subject1"]="completed";
	$_SESSION["subject1marks"]=$finalresult;
	//echo $_SESSION['userid'];
	$query="update registers set subject1marks='$finalresult' where user_id='".$_SESSION['userid']."'";
	$sql=mysql_query($query) or die(mysql_error());
	echo "<script>alert('Your exam is ended. Your score is $finalresult');document.location=('subject1exam.php')</script>";
	//echo "<script>alert('$result');document.location='index.php'</script>";
}
?>

   
	   </div>
   <center><input class="btn btn-success" type="submit" id="exam_submit" name="exam_submit"></center><br><br>
   </form>
</body>
<script>
// Set the date we're counting down to
var date1=new Date();
var countDownDate = new Date(date1);
countDownDate.setMinutes(date1.getMinutes()+40);

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
 //   var days = Math.floor(distance / (1000 * 60 * 60 * 24));
   // var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
    <?php 
    $_SESSION["subject1"]="completed";
    $_SESSION["subject1marks"]=$finalresult;
    $query="update registers set subject1marks='$finalresult' where user_id='".$_SESSION['userid']."'";
	$sql=mysql_query($query) or die(mysql_error());
	
    ?>
		alert("Your alloted time is completed ");
		document.forms["exam_submit"].submit();
		document.location='subject1exam.php'; 
		
        clearInterval(x);
		//document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);
</script>
</html>
