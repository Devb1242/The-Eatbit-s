<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Add Purchases</title>
    <link rel="icon" href="images/icons/favicon.ico" type="image/icon type">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="index,follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../CSS/managerstyle.css" />
</head>

<body>
    <?php 
        include "connection.php";
        if(isset($_POST['pur_add']))
        {
            $str3="insert into raw_purchase (raw_id,pur_qty,pur_date) values('".$_POST['raw_id']."',".$_POST['pur_qty'].",'".$_POST['pur_date']."')";
            $qry3=mysqli_query($conn,$str3);

            $str4="select * from raw_materials where raw_id=".$_POST['raw_id'];
            $qry4=mysqli_query($conn,$str4);
			$res4=mysqli_fetch_assoc($qry4);
			
			$str2="update raw_materials set raw_qty=raw_qty+".$_POST['pur_qty']." where raw_id=".$_POST['raw_id'];
			$qry2=mysqli_query($conn,$str2);
            
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
                <div class="text">
                    <a href="purchase.php"><img src="images/icons/manage purchase2.png" />PURCHASES</a>
                    <b>&nbsp/&nbsp</b>
                    <a href="add_purchases.php" style="color:white;">ADD NEW PURCHASES</a>
                </div>
            </div>
            <div class="main">
                <form method="POST" enctype="multipart/form-data" onsubmit="return validate()">

                    <div class="form">

                        <table>
                            <tr>
                                <th class="form_head">
                                    <h2>Add New Purchases</h2>
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
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select name="raw_id" id="sub_cat" required>
                                        <option value="">Choose Raw Material</option>
										<?php
										if(isset($_POST['pur_add']))
										{
                                            $str5="select * from raw_materials where raw_cat_id=".$res4['raw_cat_id'];
                                            $qry5=mysqli_query($conn,$str5);
                                            while($res5=mysqli_fetch_array($qry5))
                                            {
                                                echo "<option value='".$res5['raw_id']."'>".$res5['raw_name']."</option>";
                                            }
										}
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="number" name="pur_qty" placeholder="Enter Raw Quantity in kg/lt"
                                        required />
                                </td>
                            </tr>
                            <tr>
                                <td><input type="date" name="pur_date" value="<?php echo date('Y-m-d');?>" /></td>
                            </tr>
                            <tr>
                                <th><input type="submit" name="pur_add" value="Add" /></th>
                            </tr>
                        </table>

                    </div>
                </form>
            </div>
        </div>
    </div>
	
	<?php
		echo "<script>";
		echo "var rcSelect=document.getElementById('category');";
		echo "for(var i,j=0;i=rcSelect.options[j];j++){
				if(i.value=='".$res4['raw_cat_id']."'){
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