<?php
	include "connection.php";
	if(isset($_GET['raw_cat']))
	{
		$str="select * from raw_materials where raw_cat_id=".$_GET['raw_cat'];
		$qry=mysqli_query($conn,$str);
		echo "<select name='r_id'>";
		echo "<option value=''>Select Raw Material</option>";
		while($res=mysqli_fetch_assoc($qry))
		{
			echo "<option value='".$res['raw_id']."'>".$res['raw_name']."</option>";
		}
		echo "</select>";
	}
?>