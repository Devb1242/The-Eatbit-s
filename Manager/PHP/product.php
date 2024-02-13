<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>View Product</title>
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
                    <a href="product.php"><img src="images/icons/manage product2.png" />PRODUCTS</a>
                </div>
            </div>
            <div class="main">
                <div class="tbl_head">
                    <form action="" method="post">
                        <div class="header">
                            <h3>View Products</h3>
                        </div>
                        <div class="filter">
                            <div class="filter2" onclick="show()"> <img src="images/icons/filter.png">
                                <h4>Filters</h4>
                            </div>
                            <div class="filter3" id="filter3">
                                <select id="countrydd" onChange="change_country()" name="c_id">
                                    <option value="">Select Category</option>
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
                                <div id="state" class="sub-cat">
                                    <select id="sub" name="sc_id">
                                        <option value="">Select Sub-Category</option>
                                        <?php
											if($_POST['c_id']!='')
											{
												$str11="select * from info_sub_cat where cat_id=".$_POST['c_id'];
												$qry11=mysqli_query($conn,$str11);
												while($res11=mysqli_fetch_assoc($qry11))
												{
												?>
                                        <option value="<?=$res11['sc_id']?>"><?=$res11['sc_name']?></option>
                                        <?php
												}
											}
										?>
                                    </select>
                                </div>
                                <div id="city" class="pro-cat">
                                    <select name="p_id" id="pro">
                                        <option value="">Select Product</option>
                                        <?php
											if($_POST['sc_id']!='')
											{
												$str12="select distinct p_name from info_product where sc_id=".$_POST['sc_id'];
												$qry12=mysqli_query($conn,$str12);
												while($res12=mysqli_fetch_assoc($qry12))
												{
												?>
                                        <option value="<?=$res12['p_name']?>"><?=$res12['p_name']?></option>
                                        <?php
												}
											}
										?>
                                    </select>
                                </div>
                                <input type="submit" class="fltrBtn" value="Filter" name="sbt" id="sbt">
                                <input type="submit" class="fltrBtn" value="Clear" name="sbt2">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="tbl">
                    <form method="POST">
                        <table>
                            <tr>
                                <th>Sr No.</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Ctg Name</th>
                                <th>Sub-Ctgy Name</th>
                                <th>MRP</th>
                                <th>Selling Price</th>
                                <th>Qty</th>
                            </tr>

                            <?php
                                include "connection.php";
                                
								if(isset($_POST['sbt2']))
								{
									echo "<script>window.location.href='product.php';</script>";
								}
								if(!isset($_POST['sbt']))
								{
									$str="select * from info_product";
									$qry=mysqli_query($conn,$str);
									$i=1;
									
									while($res=mysqli_fetch_assoc($qry))
									{
										$str3="select * from info_sub_cat where sc_id=".$res['sc_id'];
										$qry3=mysqli_query($conn,$str3);
										$res3=mysqli_fetch_assoc($qry3);
										$str4="select * from info_category where cat_id=".$res3['cat_id'];
										$qry4=mysqli_query($conn,$str4);
										$res4=mysqli_fetch_assoc($qry4);
										echo "<tr>" ;
										echo "<td>".$i."</td>";
										echo "<td class='img2'> <img src='../../Admin/PHP/images/product image/".$res['p_img']."'/></td>";
										echo "<td>".$res['p_name']."</td>";
										echo "<td>".$res4['c_name']."</td>";
										echo "<td>".$res3['sc_name']."</td>";
										echo "<td>₹".$res['p_price']."</td>";
										echo "<td>₹".$res['sale_price']."</td>";
										echo "<td>".$res['p_qty']."</td>";
										echo "</tr>";
										$i=$i+1;
									}
								}
								else
								{	
									if($_POST['c_id']=='')
									{
										$str="select * from info_product where p_price=".$_POST['p_p'];
										$qry=mysqli_query($conn,$str);
										$i=1;
										
										while($res=mysqli_fetch_assoc($qry))
										{
											$str3="select * from info_sub_cat where sc_id=".$res['sc_id'];
											$qry3=mysqli_query($conn,$str3);
											$res3=mysqli_fetch_assoc($qry3);
											$str4="select * from info_category where cat_id=".$res3['cat_id'];
											$qry4=mysqli_query($conn,$str4);
											$res4=mysqli_fetch_assoc($qry4);
											echo "<tr>" ;
											echo "<td>".$i."</td>";
											echo "<td class='img2'> <img src='../../Admin/PHP/images/product image/".$res['p_img']."'/></td>";
											echo "<td>".$res['p_name']."</td>";
											echo "<td>".$res4['c_name']."</td>";
											echo "<td>".$res3['sc_name']."</td>";
											echo "<td>₹".$res['p_price']."</td>";
											echo "<td>₹".$res['sale_price']."</td>";
											echo "<td>".$res['p_qty']."</td>";
											echo "</tr>";
											$i=$i+1;
										}
										echo "<script>";
										echo "var priceSelect=document.getElementById('priceSelect');";
										echo "for(var i,j=0;i=priceSelect.options[j];j++){
												if(i.value=='".$_POST['p_p']."'){
													priceSelect.selectedIndex=j;
													break;
												}
											}";
										echo "</script>";

										
									}
									
									
									if($_POST['c_id']!='')
									{
										if($_POST['sc_id']!='')
										{
											if($_POST['p_id']!='')
											{
												$str="select * from info_product where p_name='".$_POST['p_id']."'";
												echo "<script>";
												echo "var prSelect=document.getElementById('pro');";
												echo "for(var i,j=0;i=prSelect.options[j];j++){
														if(i.value=='".$_POST['p_id']."'){
															prSelect.selectedIndex=j;
															break;
														}
													}";
												echo "</script>";
											}
											else
											{
												$str="select * from info_product where sc_id=".$_POST['sc_id'];
											}
											$qry=mysqli_query($conn,$str);
											$i=1;
											
											while($res=mysqli_fetch_assoc($qry))
											{
												$str3="select * from info_sub_cat where sc_id=".$res['sc_id'];
												$qry3=mysqli_query($conn,$str3);
												$res3=mysqli_fetch_assoc($qry3);
												$str4="select * from info_category where cat_id=".$res3['cat_id'];
												$qry4=mysqli_query($conn,$str4);
												$res4=mysqli_fetch_assoc($qry4);
												echo "<tr>" ;
												echo "<td>".$i."</td>";
												echo "<td class='img2'> <img src='../../Admin/PHP/images/product image/".$res['p_img']."'/></td>";
												echo "<td>".$res['p_name']."</td>";
												echo "<td>".$res4['c_name']."</td>";
												echo "<td>".$res3['sc_name']."</td>";
												echo "<td>₹".$res['p_price']."</td>";
												echo "<td>₹".$res['sale_price']."</td>";
												echo "<td>".$res['p_qty']."</td>";
												echo "</tr>";
												$i=$i+1;
											}	
											echo "<script>";
											echo "var scSelect=document.getElementById('sub');";
											echo "for(var i,j=0;i=scSelect.options[j];j++){
													if(i.value=='".$_POST['sc_id']."'){
														scSelect.selectedIndex=j;
														break;
													}
												}";
											echo "</script>";
										}
										else
										{
											$str10="select * from info_sub_cat where cat_id=".$_POST['c_id'];
											$qry10=mysqli_query($conn,$str10);
											while($res10=mysqli_fetch_assoc($qry10))
											{
												$str="select * from info_product where sc_id=".$res10['sc_id'];
												$qry=mysqli_query($conn,$str);
												$i=1;
												
												while($res=mysqli_fetch_assoc($qry))
												{
													$str3="select * from info_sub_cat where sc_id=".$res['sc_id'];
													$qry3=mysqli_query($conn,$str3);
													$res3=mysqli_fetch_assoc($qry3);
													$str4="select * from info_category where cat_id=".$res3['cat_id'];
													$qry4=mysqli_query($conn,$str4);
													$res4=mysqli_fetch_assoc($qry4);
													echo "<tr>" ;
													echo "<td>".$i."</td>";
													echo "<td class='img2'> <img src='../../Admin/PHP/images/product image/".$res['p_img']."'/></td>";
													echo "<td>".$res['p_name']."</td>";
													echo "<td>".$res4['c_name']."</td>";
													echo "<td>".$res3['sc_name']."</td>";
													echo "<td>₹".$res['p_price']."</td>";
													echo "<td>₹".$res['sale_price']."</td>";
													echo "<td>".$res['p_qty']."</td>";
													echo "</tr>";
													$i=$i+1;
												}
											}
										}
										echo "<script>";
										echo "var catSelect=document.getElementById('countrydd');";
										echo "for(var i,j=0;i=catSelect.options[j];j++){
												if(i.value=='".$_POST['c_id']."'){
													catSelect.selectedIndex=j;
													break;
												}
											}";
										echo "</script>";
									}
								}
								
                                
                                
                                			
						    ?>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        function change_country() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "filter_ajax2.php?country=" + document.getElementById("countrydd").value, false);
            xmlhttp.send(null);
            document.getElementById("state").innerHTML = xmlhttp.responseText;
        }

        function change_state() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "filter_ajax2.php?state=" + document.getElementById("statedd").value, false);
            xmlhttp.send(null);
            document.getElementById("city").innerHTML = xmlhttp.responseText;
        }
        </script>
</body>

</html>