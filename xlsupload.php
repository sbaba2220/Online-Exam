
<!DOCTYPE html>
<?php 
 include 'dbconn.php';
session_start();
if(!$_SESSION["username"]){
header("location: index.php");
}
require 'dbconn.php';
if(isset($_POST["import_excel"])){

echo $filename=$_FILES["file"]["tmp_name"];

if($_FILES["file"]["size"] > 0)
{

$file = fopen($filename, "r");
while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
{

//It wiil insert a row to our subject table from our csv file`
$sql = "INSERT into s1questions(question,first,second,third,fourth,answer)
values('$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]')";
//we are using mysql_query function. it returns a resource on true else False on error
$result = mysql_query( $sql );
if(! $result )
{
echo "<script type=\"text/javascript\">
alert(\"Invalid File:Please Upload CSV File.\");
window.location = \"index.php\"
</script>";
}
}
fclose($file);
//throws a message if data successfully imported to mysql database from excel file
echo "<script type=\"text/javascript\">
alert(\"CSV File has been successfully Imported.\");
window.location = \"index.php\"
</script>";
//close of connection
mysql_close($conn); 
}
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

<html>
	<head>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<nav class="navbar navbar-inverse">
 <div class="container-fluid">
   <div class="collapse navbar-collapse" id="myNavbar">
     <ul class="nav navbar-nav">
       <li><a href="adminafterlogin.php">Home</a></li>       
      
      
       <li><a href="adminafterlogin.php">Admin Dashboard</a></li>
        <li><a href="xlsupload.php">Upload an excel file</a></li>
       </ul>
              	<form action="adminlogout.php" method="post">
     <ul class="nav navbar-nav navbar-right">
       <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["username"]?></a></li>

       <li><input class="btn btn-success" type="submit" name="logoutsubmit" value="logout"><span class="glyphicon glyphicon-log-in"></span></a></li>
     </ul>
   </div>
 </div>
</form> 
 
</nav>
	</head>
  <meta charset="utf-8">
  <title>Import Excel To Mysql Database Using PHP </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="title" content="Hemant Vishwakarma">
  <meta name="description" content="Import Questions File To this subject">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 </head>
 <body>    
    <br><br>
        <div class="container">
            <div class="row">    <br>
                <div class="col-md-3 hidden-phone"></div>
                <div class="col-md-6" id="form-login">
                    <form class="well" action="" method="post" name="upload_excel" enctype="multipart/form-data">
                        <fieldset>
                            <legend>Import CSV/Excel file</legend>
                            <div class="control-group">
                                <div class="control-label">
                                    <label>CSV/Excel File:</label>
                                </div>
                                <div class="controls form-group">
                                    <input type="file" name="file" id="file" class="input-large form-control">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <div class="controls">
                                <button type="submit" id="submit" name="import_excel" class="btn btn-success btn-flat btn-lg pull-right button-loading" data-loading-text="Loading...">Upload</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="col-md-3 hidden-phone"></div>
            </div>
            
    
        <!--    <table class="table table-bordered">
                <thead>
                        <tr>
                            <th>ID</th>
                            <th>Subject</th>
                            <th>Description</th>
                            <th>Unit</th>
                            <th>Semester</th>
                            
                     
                        </tr> 
                      </thead>
                <?php
                    $SQLSELECT = "SELECT * FROM s1questions where answer!=0 ";
                    $result_set =  mysql_query($SQLSELECT);
                    while($row = mysql_fetch_array($result_set))
                    {
                    ?>
                        <tr>
                            <td><?php echo $row['ques_id']; ?></td>
                            <td><?php echo $row['SUBJ_CODE']; ?></td>
                            <td><?php echo $row['SUBJ_DESCRIPTION']; ?></td>
                            <td><?php echo $row['UNIT']; ?></td>
                            <td><?php echo $row['SEMESTER']; ?></td>
                        </tr>
                    <?php
                    }
                ?>
            </table>-->
        </div>
 </body>
</html>