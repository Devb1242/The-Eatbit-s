<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Add Product Ingredients</title>
    <link rel="icon" href="images/icons/favicon.ico" type="image/icon type">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="index,follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../CSS/managerstyle.css" />
    <script src="../JS/ajaxLink.js"></script>
    <script src="../JS/jqueryLink.js"></script>
</head>

<body>
    <?php 
        include "connection.php";
        if(isset($_POST['pd_add']))
        {
			$str2="select * from info_product where p_id=".$_POST['p_id'];
			$qry2=mysqli_query($conn,$str2);
			$res2=mysqli_fetch_assoc($qry2);
			
			$str3="select * from info_sub_cat where sc_id=".$res2['sc_id'];
			$qry3=mysqli_query($conn,$str3);
			$res3=mysqli_fetch_assoc($qry3);
		   
			$str6="select * from raw_materials where raw_id=".$_POST['raw_id'];
			$qry6=mysqli_query($conn,$str6);
			$res6=mysqli_fetch_assoc($qry6);

            $str10="select * from raw_use where p_id=".$_POST['p_id'];
            $qry10=mysqli_query($conn,$str10);
            $res10=mysqli_fetch_assoc($qry10);

            $str11="select max(p_num) from raw_use";
            $qry11=mysqli_query($conn,$str11);
            $res11=mysqli_fetch_array($qry11);
            $p_num=$res11[0]+1;

            if(mysqli_num_rows($qry10)>0)
            {
                if($res10['raw_id']!=$_POST['raw_id'])
                {
                    $str1="insert into raw_use (p_id,raw_id,use_qty,p_num) values(".$_POST['p_id'].",".$_POST['raw_id'].",'".$_POST['raw_qty']."',".$p_num.")";
                    $qry1=mysqli_query($conn,$str1);  
                }
                else
                {
                    echo "<script>alert('Raw Material Already Used');</script>";
                }
            }
            else
            {
                $str1="insert into raw_use (p_id,raw_id,use_qty,p_num) values(".$_POST['p_id'].",".$_POST['raw_id'].",'".$_POST['raw_qty']."',".$p_num.")";
                $qry1=mysqli_query($conn,$str1);  
            }
		}
    ?>
    <div class="content" id="">
        <div class="left_side">
            <?php
				include "manager_header.php";
			?>
        </div>
        <div class="right_side" id="">
            <?php
				include "manager_header2.php";
			?>

            <div class="path">
                <div class="edit_text">
                    <a href="production.php"><img src="images/icons/manage production2.png" />PRODUCTION</a>
                    <b>&nbsp/&nbsp</b>
                    <a href="product_ingredients.php">PRODUCT INGREDIENTS</a>
                    <b>&nbsp/&nbsp</b>
                    <a href="add_product_ingredients.php" style="color:white;">ADD PRODUCT INGREDIENTS</a>
                </div>
            </div>
            <div class="main">
                <form method="POST" enctype="multipart/form-data" onsubmit="return validate()">
                    <div class="form">
                        <table>
                            <tr>
                                <th class="form_head">
                                    <h2>Add New Product Ingredient</h2>
                                </th>
                            </tr>
                            <tr>
                                <th class="form_head2">
                                    <h3>Enter Product Details</h3>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <select id="countrydd" onChange="change_country()" required>
                                        <option value="choose">Select Product Category</option>
                                        <?php
                                            include "connection.php";
                                            $str9="select * from info_category";
                                            $qry9=mysqli_query($conn,$str9);
                                            while($res9=mysqli_fetch_array($qry9))
                                            {
                                                echo "<option value='".$res9['cat_id']."'>".$res9['c_name']."</option>";
                                            }
                                        ?>
                                    </select>
                                    <div id="state">
                                        <select id="sub" required>
                                            <option value="">Select Product Sub-Category</option>
                                            <?php
											if(isset($_POST['pd_add']))
											{
												$str4="select * from info_sub_cat where cat_id=".$res3['cat_id'];
												$qry4=mysqli_query($conn,$str4);
												while($res4=mysqli_fetch_assoc($qry4))
												{
													echo "<option value='".$res4['sc_id']."'>".$res4['sc_name']."</option>";
												}
											}
											?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div id="city">
                                        <select name="p_id" id="prdct" required>
                                            <option value="">Select Product</option>
                                            <?php
											if(isset($_POST['pd_add']))
											{
												$str5="select * from info_product where sc_id=".$res2['sc_id']." ORDER BY p_name";
												$qry5=mysqli_query($conn,$str5);
												while($res5=mysqli_fetch_assoc($qry5))
												{
													echo "<option value='".$res5['p_id']."'>".$res5['p_name']." ₹".$res5['p_price']."</option>";
												}
											}
											?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="form_head3">
                                    <h3>Enter Raw Material Details</h3>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <select id="category" onChange="change_category()" required>
                                        <option value="choose">Choose Raw Material Category</option>
                                        <?php
                                            $str="select * from raw_cat_materials";
                                            $qry=mysqli_query($conn,$str);
                                            while($res=mysqli_fetch_assoc($qry))
                                            {
                                                echo "<option value='".$res['raw_cat_id']."'>".$res['raw_cat_name']."</option>";
                                            }
                                        ?>
                                    </select>
                                    <select name="raw_id" id="sub_cat" required>
                                        <option value="">Choose Raw Material</option>
                                        <?php
										if(isset($_POST['pd_add']))
										{
											$str7="select * from raw_materials where raw_cat_id=".$res6['raw_cat_id'];
											$qry7=mysqli_query($conn,$str7);
											while($res7=mysqli_fetch_assoc($qry7))
											{
												echo "<option value='".$res7['raw_id']."'>".$res7['raw_name']."</option>";
											}
										}
										?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="number" name="raw_qty"
                                        placeholder="Enter Raw Quantity per Product in kg/lt" min="1" required />
                                </td>
                            </tr>
                            <tr>
                                <th><input type="submit" name="pd_add" value="Add" /></th>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
	
		echo "<script>";
		echo "var cSelect=document.getElementById('countrydd');";
		echo "for(var i,j=0;i=cSelect.options[j];j++){
				if(i.value=='".$res3['cat_id']."'){
					cSelect.selectedIndex=j;
					break;
				}
			}";
		echo "</script>";
		
		echo "<script>";
		echo "var scSelect=document.getElementById('sub');";
		echo "for(var i,j=0;i=scSelect.options[j];j++){
				if(i.value=='".$res2['sc_id']."'){
					scSelect.selectedIndex=j;
					break;
				}
			}";
		echo "</script>";
		
		echo "<script>";
		echo "var prSelect=document.getElementById('prdct');";
		echo "for(var i,j=0;i=prSelect.options[j];j++){
				if(i.value=='".$_POST['p_id']."'){
					prSelect.selectedIndex=j;
					break;
				}
			}";
		echo "</script>";
		
		echo "<script>";
		echo "var rcSelect=document.getElementById('category');";
		echo "for(var i,j=0;i=rcSelect.options[j];j++){
				if(i.value=='".$res6['raw_cat_id']."'){
					rcSelect.selectedIndex=j;
					break;
				}
			}";
		echo "</script>";
		
		echo "<script>";
		echo "var rSelect=document.getElementById('sub_cat');";
		echo "for(var i,j=0;i=rSelect.options[j];j++){
				if(i.value=='".$_POST['raw_id']."'){
					rSelect.selectedIndex=j;
					break;
				}
			}";
		echo "</script>";
	?>


    <script type="text/javascript">
    function change_country() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "add_production_ajax.php?country=" + document.getElementById("countrydd").value, false);
        xmlhttp.send(null);
        document.getElementById("state").innerHTML = xmlhttp.responseText;
    }

    function change_state() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "add_production_ajax.php?state=" + document.getElementById("statedd").value, false);
        xmlhttp.send(null);
        document.getElementById("city").innerHTML = xmlhttp.responseText;
    }

    function validate() {
        var c1 = document.getElementById('countrydd').value;
        if (c1 == "choose") {
            alert("Select Product Category");
            return false;
        } else {
            return true;
        }
    }
    </script>

    <script type="text/javascript">
    function change_category() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "add_purchases_ajax.php?categoryid=" + document.getElementById("category").value, false);
        xmlhttp.send(null);
        document.getElementById("sub_cat").innerHTML = xmlhttp.responseText;
    }

    function validate() {
        var c1 = document.getElementById('category').value;
        if (c1 == "choose") {
            alert("Select Raw Material Category");
            return false;
        } else {
            return true;
        }
    }
    </script>
</body>

</html>