<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Add Production</title>
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
            /*---------------Raw Material Production---------------------*/
            $str15="select * from raw_use";
            $qry15=mysqli_query($conn,$str15);
            $res15=mysqli_fetch_assoc($qry15);
            if($res15['p_id']==$_POST['p_id'])
            {
                $str14="select max(p_num) as num from use_history";
                $qry14=mysqli_query($conn,$str14);
                $res14=mysqli_fetch_assoc($qry14);
                $num=$res14['num']+1;
                $str10="select * from raw_use where p_id=".$_POST['p_id'];
                $qry10=mysqli_query($conn,$str10);
                $stock=0;
                while($res10=mysqli_fetch_assoc($qry10))
                {
                    $str5="select * from raw_materials where raw_id='".$res10['raw_id']."'";
                    $qry5=mysqli_query($conn,$str5);
                    $res5=mysqli_fetch_assoc($qry5);
                    $qty=$_POST['pd_qty']*$res10['use_qty'];
                    
                    if($res5['raw_qty']<$qty)
                    {
                        $stock=0;
                    }
                    else
                    {
                        $stock=1;
                    }
                }
                
                $str4="select * from info_product where p_id=".$_POST['p_id'];
                $qry4=mysqli_query($conn,$str4);
                $res4=mysqli_fetch_assoc($qry4);
                
                $str6="select * from info_sub_cat where sc_id=".$res4['sc_id'];
                $qry6=mysqli_query($conn,$str6);
                $res6=mysqli_fetch_assoc($qry6);
                
                
                if($stock==1)
                {
                    $str11="select * from raw_use where p_id=".$_POST['p_id'];
                    $qry11=mysqli_query($conn,$str11);
                    $str3="insert into product_production (p_id,pd_qty,pd_date) values(".$_POST['p_id'].",'".$_POST['pd_qty']."','".$_POST['pd_date']."')";
                    $qry3=mysqli_query($conn,$str3);
                    while($res11=mysqli_fetch_assoc($qry11))
                    {	
                        $qty=$_POST['pd_qty']*$res11['use_qty'];
                        
                        $str6="update raw_materials set raw_qty=raw_qty-".$qty." where raw_id='".$res11['raw_id']."'";
                        $qry6=mysqli_query($conn,$str6);

                        $str7="insert into use_history (p_id,p_num,p_qty,raw_id,raw_qty,h_date) values('".$_POST['p_id']."',$num,".$_POST['pd_qty'].",'".$res11['raw_id']."',".$qty.",'".$_POST['pd_date']."')";
                        $qry7=mysqli_query($conn,$str7);

                        $str2="update info_product set p_qty=p_qty+".$_POST['pd_qty']." where p_id='".$_POST['p_id']."'";
                        $qry2=mysqli_query($conn,$str2);
                    }
                }
                else
                {
                    echo "<script>alert('Raw Material is Out of Stock');</script>";
                }
            }
            else
            {
                echo "<script>alert('Product Ingridients are not mentioned');</script>";
                 $str4="select * from info_product where p_id=".$_POST['p_id'];
                $qry4=mysqli_query($conn,$str4);
                $res4=mysqli_fetch_assoc($qry4);
                
                $str6="select * from info_sub_cat where sc_id=".$res4['sc_id'];
                $qry6=mysqli_query($conn,$str6);
                $res6=mysqli_fetch_assoc($qry6);
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
                <div class="text">
                    <a href="production.php"><img src="images/icons/manage production2.png" />PRODUCTION</a>
                    <b>&nbsp/&nbsp</b>
                    <a href="add_production.php" style="color:white;">ADD NEW PRODUCTION</a>
                </div>
            </div>
            <div class="main">
                <form method="POST" enctype="multipart/form-data" onsubmit="return validate()">
                    <div class="form">
                        <table>
                            <tr>
                                <th class="form_head">
                                    <h2>Add New Production</h2>
                                </th>
                            </tr>
                            <tr>
                                <td style="justify-content:center" ;>
                                    <input type="date" name="pd_date" required value="<?php echo date("Y-m-d"); ?>" />
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <select id="countrydd" onChange="change_country()" required>
                                        <option value="">Select Product Category</option>
                                        <?php
                                            $str9="select * from info_category";
                                            $qry9=mysqli_query($conn,$str9);
                                            while($res9=mysqli_fetch_array($qry9))
                                            {
                                                echo "<option value='".$res9['cat_id']."'>".$res9['c_name']."</option>";
                                            }
                                        ?>
                                    </select>
                                    <div id="state">
                                        <select id="sub_cat" required>
                                            <option value="">Select Product Sub-Category</option>
                                            <?php
											if(isset($_POST['pd_add']))
											{
												$str12="select * from info_sub_cat where cat_id=".$res6['cat_id'];
												$qry12=mysqli_query($conn,$str12);
												while($res12=mysqli_fetch_array($qry12))
												{
													echo "<option value='".$res12['sc_id']."'>".$res12['sc_name']."</option>";
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
                                        <select name="p_id" id="pro" required>
                                            <option value="">Select Product</option>
                                            <?php
											if(isset($_POST['pd_add']))
											{
												$str13="select * from info_product where sc_id=".$res4['sc_id']." ORDER BY p_name";
												$qry13=mysqli_query($conn,$str13);
												while($res13=mysqli_fetch_array($qry13))
												{
													echo "<option value='".$res13['p_id']."'>".$res13['p_name']." ₹".$res13['p_price']."</option>";
												}
											}
											?>
                                        </select>
                                    </div>
                                    <input type="number" name="pd_qty" placeholder="Enter Quantity" required />
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
		echo "var prSelect=document.getElementById('pro');";
		echo "for(var i,j=0;i=prSelect.options[j];j++){
				if(i.value=='".$_POST['p_id']."'){
					prSelect.selectedIndex=j;
					break;	
				}
			}";
		echo "</script>";
		
		echo "<script>";
		echo "var scSelect=document.getElementById('sub_cat');";
		echo "for(var i,j=0;i=scSelect.options[j];j++){
				if(i.value=='".$res4['sc_id']."'){
					scSelect.selectedIndex=j;
					break;
				}
			}";
		echo "</script>";
		
		echo "<script>";
		echo "var cSelect=document.getElementById('countrydd');";
		echo "for(var i,j=0;i=cSelect.options[j];j++){
				if(i.value=='".$res6['cat_id']."'){
					cSelect.selectedIndex=j;
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
</body>

</html>