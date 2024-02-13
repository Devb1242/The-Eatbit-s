<?php
	include "../connection.php";
	if(isset($_POST['query']))
	{
		$output='';
		$str="select DISTINCT p_name from info_product where p_name LIKE '%".$_POST['query']."%'";
		$qry=mysqli_query($conn,$str);
		$output='<ul class="prSrch">';
		if(mysqli_num_rows($qry) > 0)
		{
			while($res=mysqli_fetch_assoc($qry))
			{
				$output.='<li>'.$res['p_name'].'</li>';
			}
		}
		else
		{
			$output.='<li>Product Not Found</li>';
		}
		$output.='</ul>';
		echo $output;
	}
?>