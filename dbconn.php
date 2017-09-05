<?php
$db_host = "localhost";
$db_username = "fiveamig_saibaba";
$db_pass = "baba2220";
$db_name = "fiveamig_saibaba";
// Create connection
@mysql_connect("$db_host", "$db_username", "$db_pass", "$db_name") or die("connection is fail.");
@mysql_select_db("$db_name") or die("database does not exist.");
?>

