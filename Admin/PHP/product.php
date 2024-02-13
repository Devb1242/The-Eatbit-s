<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <title>The Eatbit's-Manage Product</title>
        <link rel="icon" href="images/icons/favicon.ico" type="image/icon type">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="robots" content="index,follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="../CSS/adminStyle.css" />
        <script src="../JS/ajaxLink.js"></script>
        <script src="../JS/jqueryLink.js"></script>
    </head>

    <body>
        <?php
        if(isset($_POST['sts_btn']))
        {
            include "connection.php";
            $str2="select * from info_product where p_id=".$_POST['sts_btn'];
            $qry2=mysqli_query($conn,$str2);
            $res2=mysqli_fetch_assoc($qry2);
            if($res2['p_status']==1)
            {
                $str1="update info_product set p_status=0 where p_id=".$_POST['sts_btn'];
            }
            else
            {
                $str1="update info_product set p_status=1 where p_id=".$_POST['sts_btn'];
            }
            $qry1=mysqli_query($conn,$str1);
            mysqli_close($conn);
        }
        if(isset($_POST['dlt']))
		{
            include "connection.php";
			$dlt_str="DELETE FROM info_product WHERE p_id=".$_POST['dlt'];
            $dlt_qry=mysqli_query($conn,$dlt_str);
			header("location: product.php");
            mysqli_close($conn);
		}
    ?>
        <div class="content" id="">
            <div class="left_side">
                <?php
				include "header.php";
			?>
            </div>
            <div class="right_side" id="">
                <?php
				include "header2.php";
			?>
                <div class="path">
                    <div class="text">
                        <a href="product.php"><img src="images/icons/product2.png" />PRODUCTS</a>
                    </div>
                    <div class="btn">
                        <a href="add_product.php"><img src="images/icons/plus.png" />PRODUCT</a>
                    </div>
                </div>
                <div class="main">
                    <?php
                    if(isset($_POST['edit']))
                    {
                        $_SESSION['p_id']=$_POST['edit'];
                        echo "<script>window.location.href='edit_product.php';</script>";
                    }
                ?>

                    <div class="tbl_head">
                        <form action="" method="post">
                            <div class="header">
                                <h3>Manage Products</h3>
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
                                    <select name="p_p" id="priceSelect">
                                        <option value="">Select Price</option>
                                        <?php
                                        include "connection.php";
                                        $str17="select distinct p_price from info_product ORDER BY p_price";
                                        $qry17=mysqli_query($conn,$str17);
                                        while($res17=mysqli_fetch_array($qry17))
                                        {
                                            echo "<option value='".$res17['p_price']."'>₹".$res17['p_price']."</option>";
                                        }
                                    ?>
                                    </select>
                                    <input type="submit" value="Filter" name="sbt" id="sbt">
                                    <input type="submit" value="Clear" name="sbt2">
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
                                    <th>Cost Price</th>
                                    <th>MRP</th>
                                    <th>Selling Price/Box</th>
                                    <th>Qty</th>
                                    <th>Status</th>
                                    <th>Action</th>
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
										echo "<td class='img2'> <img src='images/product image/".$res['p_img']."'/></td>";
										echo "<td>".$res['p_name']."</td>";
										echo "<td>".$res4['c_name']."</td>";
										echo "<td>".$res3['sc_name']."</td>";
										echo "<td>₹".$res['cost_price']."</td>";
										echo "<td>₹".$res['p_price']."</td>";
										echo "<td>₹".$res['sale_price']."</td>";
										echo "<td>".$res['p_qty']."</td>";


										if($res4['c_status']==0 || $res3['sc_status']==0)
										{
											echo "<td><button class='deactive' value='".$res['p_id']."' name='sts_btn' disabled >Deactive</button></td>";

										}
										else
										{
											if($res['p_status']==1)
											{
												echo "<td><button class='active' value='".$res['p_id']."' name='sts_btn'>Active</button></td>";
											}
											else
											{
												echo "<td><button class='deactive' value='".$res['p_id']."' name='sts_btn'>Deactive</button></td>";
											}
										}
										echo "<td class='action'><form method='POST'><button name='edit' value='".$res['p_id']."' class='edit_btn2'><img src='images/icons/edit.png'/></button> <button name='dlt' value='".$res['p_id']."' class='dlt_btn2' ><img src='images/icons/dlt_btn.png' /></button></form></td>";
										echo "</tr>";
										$i=$i+1;
									}
								}
								else
								{	
									if($_POST['p_p']!='' && $_POST['c_id']=='')
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
											echo "<td class='img2'> <img src='images/product image/".$res['p_img']."'/></td>";
											echo "<td>".$res['p_name']."</td>";
											echo "<td>".$res4['c_name']."</td>";
											echo "<td>".$res3['sc_name']."</td>";
											echo "<td>₹".$res['cost_price']."</td>";
											echo "<td>₹".$res['p_price']."</td>";
											echo "<td>₹".$res['sale_price']."</td>";
											echo "<td>".$res['p_qty']."</td>";


											if($res4['c_status']==0 || $res3['sc_status']==0)
											{
												echo "<td><button class='deactive' value='".$res['p_id']."' name='sts_btn' disabled >Deactive</button></td>";

											}
											else
											{
												if($res['p_status']==1)
												{
													echo "<td><button class='active' value='".$res['p_id']."' name='sts_btn'>Active</button></td>";
												}
												else
												{
													echo "<td><button class='deactive' value='".$res['p_id']."' name='sts_btn'>Deactive</button></td>";
												}
											}
											echo "<td class='action'><form method='POST'><button name='edit' value='".$res['p_id']."' class='edit_btn2'><img src='images/icons/edit.png'/></button> <button name='dlt' value='".$res['p_id']."' class='dlt_btn2' ><img src='images/icons/dlt_btn.png' /></button></form></td>";
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
												
												if($_POST['p_p']!='')
												{
													$str="select * from info_product where p_name='".$_POST['p_id']."' and p_price=".$_POST['p_p'];
												}
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
												
												if($_POST['p_p']!='')
												{
													$str="select * from info_product where sc_id=".$_POST['sc_id']." and p_price=".$_POST['p_p'];
												}
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
												echo "<td class='img2'> <img src='images/product image/".$res['p_img']."'/></td>";
												echo "<td>".$res['p_name']."</td>";
												echo "<td>".$res4['c_name']."</td>";
												echo "<td>".$res3['sc_name']."</td>";
												echo "<td>₹".$res['cost_price']."</td>";
												echo "<td>₹".$res['p_price']."</td>";
												echo "<td>₹".$res['sale_price']."</td>";
												echo "<td>".$res['p_qty']."</td>";


												if($res4['c_status']==0 || $res3['sc_status']==0)
												{
													echo "<td><button class='deactive' value='".$res['p_id']."' name='sts_btn' disabled >Deactive</button></td>";

												}
												else
												{
													if($res['p_status']==1)
													{
														echo "<td><button class='active' value='".$res['p_id']."' name='sts_btn'>Active</button></td>";
													}
													else
													{
														echo "<td><button class='deactive' value='".$res['p_id']."' name='sts_btn'>Deactive</button></td>";
													}
												}
												echo "<td class='action'><form method='POST'><button name='edit' value='".$res['p_id']."' class='edit_btn2'><img src='images/icons/edit.png'/></button> <button name='dlt' value='".$res['p_id']."' class='dlt_btn2' ><img src='images/icons/dlt_btn.png' /></button></form></td>";
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
												
												if($_POST['p_p']!='')
												{
													$str="select * from info_product where sc_id=".$res10['sc_id']." and p_price=".$_POST['p_p'];
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
													echo "<td class='img2'> <img src='images/product image/".$res['p_img']."'/></td>";
													echo "<td>".$res['p_name']."</td>";
													echo "<td>".$res4['c_name']."</td>";
													echo "<td>".$res3['sc_name']."</td>";
													echo "<td>₹".$res['cost_price']."</td>";
													echo "<td>₹".$res['p_price']."</td>";
													echo "<td>₹".$res['sale_price']."</td>";
													echo "<td>".$res['p_qty']."</td>";

													if($res4['c_status']==0 || $res3['sc_status']==0)
													{
														echo "<td><button class='deactive' value='".$res['p_id']."' name='sts_btn' disabled >Deactive</button></td>";

													}
													else
													{
														if($res['p_status']==1)
														{
															echo "<td><button class='active' value='".$res['p_id']."' name='sts_btn'>Active</button></td>";
														}
														else
														{
															echo "<td><button class='deactive' value='".$res['p_id']."' name='sts_btn'>Deactive</button></td>";
														}
													}
													echo "<td class='action'><form method='POST'><button name='edit' value='".$res['p_id']."' class='edit_btn2'><img src='images/icons/edit.png'/></button> <button name='dlt' value='".$res['p_id']."' class='dlt_btn2' ><img src='images/icons/dlt_btn.png' /></button></form></td>";
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
                xmlhttp.open("GET", "filter_ajax.php?country=" + document.getElementById("countrydd").value, false);
                xmlhttp.send(null);
                document.getElementById("state").innerHTML = xmlhttp.responseText;
            }

            function change_state() {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("GET", "filter_ajax.php?state=" + document.getElementById("statedd").value, false);
                xmlhttp.send(null);
                document.getElementById("city").innerHTML = xmlhttp.responseText;
            }
            </script>
    </body>

</html>