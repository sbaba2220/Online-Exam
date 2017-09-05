<?php
if(isset($_POST['logoutsubmit']))
{session_start();
session_destroy();
	echo "<script>alert('Logged out');document.location='index.php'</script>";

}
?>
