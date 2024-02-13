<?php
	include "../connection.php";
	
	if(isset($_POST['state']))
	{
		$str="select * from city where state_id=".$_POST['state'];
		$qry=mysqli_query($conn,$str);
		
		while($res=mysqli_fetch_assoc($qry))
		{
			echo "<option value='".$res['city_id']."'>".$res['city_name']."</option>";
		}
		
	}
	
	if(isset($_POST['ag_state']))
	{
		$str="select * from city where state_id=".$_POST['ag_state'];
		$qry=mysqli_query($conn,$str);
		
		while($res=mysqli_fetch_assoc($qry))
		{
			echo "<option value='".$res['city_id']."'>".$res['city_name']."</option>";
		}
		
	}
?>