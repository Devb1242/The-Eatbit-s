<?php
	$conn=mysqli_connect('localhost','root','','theeatbit');
	
	if(!$conn)
	{
		echo "Oops Database not Connected";
	}
?>