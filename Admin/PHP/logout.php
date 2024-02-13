<?php
	session_start();
	include "connection.php";
	$str="update info_admin set a_status=0 where a_id=".$_SESSION['a_id'];
	$qry=mysqli_query($conn,$str);
	session_unset();
	session_destroy();
	header("location: login.php");
?>