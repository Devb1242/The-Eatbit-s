<?php
	include "../connection.php";
	$str="update feedback set noti=1 where f_id=".$_POST['id'];
	$qry=mysqli_query($conn,$str);
?>