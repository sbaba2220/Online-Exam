<?php
if(isset($_POST['logoutsubmit']))
{session_start();
session_destroy();
	echo "<script>document.location='index.php'</script>";

}
?>
