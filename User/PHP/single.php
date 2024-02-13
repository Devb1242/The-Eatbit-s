<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>The Eatbit's-Product</title>
    <link rel="icon" href="images/icons/favicon.ico" type="image/icon type">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="index,follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../CSS/main.css" />
</head>

<body>
    <?php
		include "header.php";
	?>
    <?php
		include "connection.php";
		if(isset($_POST['view']))
		{
			$str="select * from info_product where p_name='".$_POST['view']."'";
			$qry=mysqli_query($conn,$str);
			$res=mysqli_fetch_assoc($qry);
			
			$p_str="select * from info_product where p_name='".$_POST['view']."'";
			$p_qry=mysqli_query($conn,$p_str);
			
			$str1="select * from info_sub_cat where sc_id='".$res['sc_id']."'";
			$qry1=mysqli_query($conn,$str1);
			$res1=mysqli_fetch_assoc($qry1);
			
			$str2="select * from info_category where cat_id='".$res1['cat_id']."'";
			$qry2=mysqli_query($conn,$str2);
			$res2=mysqli_fetch_assoc($qry2);
		}
		else
		{
			echo "<script>window.location.href='product.php'</script>";
		}
	?>

    <div class="cont17">
        <h1><?=$res['p_name']?></h1>
        <div class="c17body">
            <div class="">
                <img src="../../Admin/PHP/images/product image/<?=$res['p_img']?>" />
            </div>
            <div class="">
                <label><a href="product.php"><?=$res2['c_name']?></a> > <?=$res1['sc_name']?></label>
                <p><?=$res['p_info']?> </br></br></br> Available in :</p>
                <?php while($price=mysqli_fetch_assoc($p_qry)){ echo "<label>Rs. ".$price['p_price']."</label>&nbsp"; } ?>
            </div>
        </div>
    </div>

    <?php
		include "footer.php";
	?>
</body>

</html>