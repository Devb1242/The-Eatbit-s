<?php
	session_start();
	include "connection.php";
	$str="update info_manager set m_status=0 where m_id=".$_SESSION['m_id'];
	$qry=mysqli_query($conn,$str);
	session_unset();
	session_destroy();
	header("location: login.php");
?>