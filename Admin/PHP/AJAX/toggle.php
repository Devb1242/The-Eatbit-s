<?php
	include "../connection.php";
	$cat_id=$_POST['cat_id'];
	$str="select * from info_category where cat_id=".$cat_id;
	$qry=mysqli_query($conn,$str);
	$res=mysqli_fetch_assoc($qry);
	
	$str3="select * from info_sub_cat where cat_id=".$cat_id;
	$qry3=mysqli_query($conn,$str3);
	
	
	if($res['c_status']==1)
	{
		$str1="update info_category set c_status=0 where cat_id=".$cat_id;
		$str2="update info_sub_cat set sc_status=0 where cat_id=".$cat_id;
		while($res3=mysqli_fetch_assoc($qry3))
		{
			$str4="update info_product set p_status=0 where sc_id=".$res3['sc_id'];
			$qry4=mysqli_query($conn,$str4);			
		}
		
	}
	else
	{
		$str1="update info_category set c_status=1 where cat_id=".$cat_id;
		$str2="update info_sub_cat set sc_status=1 where cat_id=".$cat_id;
		while($res3=mysqli_fetch_assoc($qry3))
		{
			$str4="update info_product set p_status=1 where sc_id=".$res3['sc_id'];
			$qry4=mysqli_query($conn,$str4);			
		}
	}
	$qry1=mysqli_query($conn,$str1);
	$qry2=mysqli_query($conn,$str2);
?>