<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <title>The Eatbit's</title>
        <link rel="icon" href="images/icons/favicon.ico" type="image/icon type">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="robots" content="index,follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="../CSS/adminStyle.css" />
        <link rel="stylesheet" type="text/css" href="../CSS/dashboard.css" />
        <script src="../JS/ajaxLink.js"></script>
        <script src="../JS/jqueryLink.js"></script>
    </head>

    <body>


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
                        <a href="index.php"><img src="images/icons/dashboard2.png" />DASHBOARD</a>
                    </div>
                </div>
                <div class="main">
                    <div class="container">
                        <div class="row">
                            <div class="d">
                                <div class="flash">
                                    <label>Categories</label>
                                    <img src="images/icons/category3.png">
                                </div>
                                <?php
								$str1="select * from info_category";
								$qry1=mysqli_query($conn,$str1);
								$res1=mysqli_num_rows($qry1);
							?>
                                <h3><?php echo "$res1"?></h3>
                                <div class="flash">
                                    <?php
								$str2="select * from info_category where c_status=1 ";
								$qry2=mysqli_query($conn,$str2);
								$res2=mysqli_num_rows($qry2);
							?>
                                    <h4>Active-<?php echo "$res2"?></h4>
                                    <?php
								$str3="select * from info_category where c_status=0 ";
								$qry3=mysqli_query($conn,$str3);
								$res3=mysqli_num_rows($qry3);
							?>
                                    <h4>Deactive-<?php echo "$res3"?></h4>
                                </div>

                            </div>
                            <div class="d">
                                <div class="flash">
                                    <label>Sub-Categories</label>
                                    <img src="images/icons/sub-category.png">
                                </div>
                                <?php
								$str4="select * from info_sub_cat";
								$qry4=mysqli_query($conn,$str4);
								$res4=mysqli_num_rows($qry4);
							?>
                                <h3><?php echo "$res4"?></h3>
                                <div class="flash">
                                    <?php
								$str5="select * from info_sub_cat where sc_status=1 ";
								$qry5=mysqli_query($conn,$str5);
								$res5=mysqli_num_rows($qry5);
							?>
                                    <h4>Active-<?php echo "$res5"?></h4>
                                    <?php
								$str6="select * from info_sub_cat where sc_status=0 ";
								$qry6=mysqli_query($conn,$str6);
								$res6=mysqli_num_rows($qry6);
							?>
                                    <h4>Deactive-<?php echo "$res6"?></h4>
                                </div>
                            </div>
                            <div class="d">
                                <div class="flash">
                                    <label>Products</label>
                                    <img src="images/icons/product3.png">
                                </div>
                                <?php
								$str7="select * from info_product";
								$qry7=mysqli_query($conn,$str7);
								$res7=mysqli_num_rows($qry7);
							?>
                                <h3><?php echo "$res7"?></h3>
                                <div class="flash">
                                    <?php
										$str8="select * from info_product where p_status=1 ";
										$qry8=mysqli_query($conn,$str8);
										$res8=mysqli_num_rows($qry8);
									?>
                                    <h4>Active-<?php echo "$res8"?></h4>
                                    <?php
										$str9="select * from info_product where p_status=0 ";
										$qry9=mysqli_query($conn,$str9);
										$res9=mysqli_num_rows($qry9);
									?>
                                    <h4>Deactive-<?php echo "$res9"?></h4>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="d2">
                                <label>Monthly Sales</label>
                                <?php
								$str11="SELECT MONTHNAME(s_date) as mname, SUM(s_amt) as total from info_sale where ord_status=5 GROUP BY MONTH(s_date)";
								$qry11=mysqli_query($conn,$str11);
						
								if(mysqli_num_rows($qry11)>0)
								{
									while($res11=mysqli_fetch_assoc($qry11))
									{
										$amts[$res11['mname']]=$res11['total'];
									}
									
									$max_data=max($amts)*1.2;
									
									$max_width=800;
									$max_height=500;
									
									$xgap=$max_width/(count($amts)+1);
									$ygap=$max_height/(count($amts)+1);
									
									$one_unit=$max_height/$max_data;
								
								
							?>
                                <!--viewbox="0 0 <?php /*echo $max_width." ".$max_height; */?>"-->

                                <svg width="<?=$max_width?>" height="<?=$max_height?>" class="grph"
                                    style="background-color:#fff;">
                                    <style>
                                    .grph {
                                        margin: 30px 0 0 0;
                                    }

                                    @keyframes move {
                                        0% {
                                            transform: scale(10);
                                            opacity: 0;
                                        }

                                        100% {
                                            transform: scale(100);
                                            opacity: 1;
                                        }
                                    }

                                    .grph circle {
                                        fill: #fff;
                                        cursor: pointer;
                                    }

                                    .grph circle:hover {
                                        fill: green;
                                    }

                                    .grph .amt {
                                        opacity: 0;
                                    }

                                    .grph circle:hover+.amt {
                                        opacity: 1;
                                    }
                                    </style>

                                    <?php
									
									$num=$xgap;
									$num2=$ygap;
									$element="";
									$points="";
									$s=1;
									
									foreach($amts as $key => $value)
									{
										$y=$max_height-($value*$one_unit);
										$element.= "<polyline points='0,$num2 $max_width,$num2' style='stroke:rgba(0,0,0,0.1);' />";
										
										$element.= "<text x='$num' y='20' style='fill:yellowgreen;'>$key</text>'";
										
										
										$points.=" $num,$y ";
										echo "<polyline points='$points' style='animation:move ".$s."s ease;stroke:yellowgreen;' />";
										$points=" $num,$y ";
										
										$element.= "<circle r='5' cx='$num' cy='$y' style='animation:move ".$s."s ease;stroke:yellowgreen;' />";
										$element.= "<text x='$num' y='".($y - 10)."' class='amt' style='fill:yellowgreen;'>₹$value</text>'";
										$num+=$xgap;
										$num2+=$ygap;
										
										$s=$s+0.09;
									
									}
									
									echo $element;
								?>
                                </svg>
                                <?php
                            	}
							?>

                            </div>
                            <div class="d3">
                                <div class="d4">
                                    <div class="flash">
                                        <label>Total Revenue</label>
                                        <img src="images/icons/revenue.png">
                                    </div>
                                    <h3>₹50,45,987</h3>
                                </div>
                                <div class="d4">
                                    <div class="flash">
                                        <label>Visitors</label>
                                        <img src="images/icons/visitor.png">
                                    </div>
                                    <h3>6,578</h3>
                                </div>
                                <div class="d4">
                                    <div class="flash">
                                        <label>Facebook Follower</label>
                                        <img src="images/icons/facebook.png">
                                    </div>
                                    <h3>1,169</h3>
                                </div>
                                <div class="d4">
                                    <div class="flash">
                                        <label>Instagram Follower</label>
                                        <img src="images/icons/instagram.png">
                                    </div>
                                    <h3>2,178</h3>
                                </div>
                                <div class="d4">
                                    <div class="flash">
                                        <label>Twitter Follower</label>
                                        <img src="images/icons/twitter.png">
                                    </div>
                                    <h3>1,592</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="d">
                                <label class="flash2">Manager</label>
                                <div class="sales2">
                                    <table>
                                        <tr>
                                            <th>Image</th>
                                            <th>Manager Name</th>
                                            <th>Status</th>
                                        </tr>
                                        <?php
									include "connection.php";
									$str="select * from info_manager";
									$qry=mysqli_query($conn,$str);
									while($res=mysqli_fetch_assoc($qry))
									{
										echo "<tr>";
										echo "<td><img src='../../Manager/PHP/images/manager image/".$res['m_img']."' class='primg' /></td>";
										echo "<td>".$res['m_name']."</td>";
										if($res['m_status']==1)
										{
											echo "<td><input type='checkbox' class='sttsG' checked disabled /></td>";
										}
										else
										{
											echo "<td><input type='checkbox' class='sttsG' disabled /></td>";
										}
										echo "</tr>";
									}
								?>
                                    </table>
                                </div>
                            </div>
                            <div class="d">
                                <label class="flash2">Distributor</label>
                                <div class="sales2">
                                    <table>
                                        <tr>
                                            <th>Image</th>
                                            <th>Distributor Name</th>
                                            <th>Agency Name</th>
                                        </tr>
                                        <?php
									include "connection.php";
									$str10="select * from info_distributor";
									$qry10=mysqli_query($conn,$str10);
									while($res10=mysqli_fetch_assoc($qry10))
									{
										echo "<tr>";
										echo "<td><img src='../../Distributor/PHP/images/distributor image/".$res10['d_img']."' class='primg' /></td>";
										echo "<td>".$res10['d_name']."</td>";
										echo "<td>".$res10['d_agency']."</td>";
										echo "</tr>";   
									}
								?>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </body>

</html>