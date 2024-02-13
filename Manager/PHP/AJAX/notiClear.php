<?php
	include "../connection.php";
	$str="update info_sale set noti=1 where sale_id=".$_POST['id'];
	$qry=mysqli_query($conn,$str);
?>