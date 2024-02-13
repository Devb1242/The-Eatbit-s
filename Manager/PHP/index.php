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
        <link rel="stylesheet" type="text/css" href="../CSS/managerstyle.css" />
        <link rel="stylesheet" type="text/css" href="../CSS/dashboard.css" />
        <script src="../JS/ajaxLink.js"></script>
        <script src="../JS/jqueryLink.js"></script>
    </head>

    <body onload="hello()">

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
                        <a href="index.php"><img src="images/icons/dashboard2.png" />DASHBOARD</a>
                    </div>
                </div>
                <div class="main">
                    <div class="row">
                        <div class="d">
                            <div class="flash">
                                <label>Raw Categories</label>
                                <img src="images/icons/category3.png">
                            </div>
                            <?php
                            $str1="select * from raw_cat_materials";
                            $qry1=mysqli_query($conn,$str1);
                            $res1=mysqli_num_rows($qry1);
						?>
                            <h3>
                                <?php echo "$res1"?>
                            </h3>

                        </div>
                        <div class="d">
                            <div class="flash">
                                <label>Raw Materials</label>
                                <img src="images/icons/raw materials3.png">
                            </div>
                            <?php
								$str4="select * from raw_materials";
								$qry4=mysqli_query($conn,$str4);
								$res4=mysqli_num_rows($qry4);
							?>
                            <h3><?php echo "$res4"?></h3>
                        </div>
                        <div class="d">
                            <div class="flash">
                                <label>Total Purchases</label>
                                <img src="images/icons/purchase3.png">
                            </div>
                            <?php
								$str5="select sum(pur_amt) as total from raw_purchase";
								$qry5=mysqli_query($conn,$str5);
								$res5=mysqli_fetch_assoc($qry5);
							?>
                            <h3>₹<?php echo "".$res5['total'].""?></h3>
                        </div>
                        <div class="d">
                            <div class="flash">
                                <label>Total Orders</label>
                                <img src="images/icons/order3.png">
                            </div>
                            <?php
                            $str6="select * from info_sale";
                            $qry6=mysqli_query($conn,$str6);
                            $res6=mysqli_num_rows($qry6);
                        ?>
                            <h3><?php echo "$res6"?></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d2">
                            <label>Current Year Production</label>
                            <?php
								$str11="SELECT pd_date as mname, SUM(pd_qty) as total from product_production GROUP BY MONTH(pd_date)";
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
                            <style>

                            </style>
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
                                    fill: #6d4b0a;
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
                                        $mon=date('M',strtotime($key));
										$y=$max_height-($value*$one_unit);
										$element.= "<polyline points='0,$num2 $max_width,$num2' style='stroke:#eee;' />";
										
										$element.= "<text x='$num' y='20' style='fill:#6d4b0a;'>$mon</text>";
										
										
										$points.=" $num,$y ";
										echo "<polyline points='$points' style='animation:move ".$s."s ease;stroke:#6d4b0a;' />";
										$points=" $num,$y ";
										
										$element.= "<circle r='5' cx='$num' cy='$y' style='animation:move ".$s."s ease;stroke:#6d4b0a;' />";
										$element.= "<text x='$num' y='".($y - 10)."' class='amt' style='fill:#6d4b0a;'>$value Boxes</text>'";
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
                        <div class="d">
                            <label class="flash2">Payment Stats</label>
                            <?php
							$str7="select sum(s_amt) as total from info_sale where ord_status<>0";
							$qry7=mysqli_query($conn,$str7);
							$res7=mysqli_fetch_assoc($qry7);
							
							$str8="select sum(s_amt) as payed from info_sale where ord_status<>0 and payment=1";
							$qry8=mysqli_query($conn,$str8);
							$res8=mysqli_fetch_assoc($qry8);
						?>
                            <svg width="100%" height="200" style="background-color:#fff;" class="dChart">

                                <?php
                                $per=0;
                                if($res7['total']!=0)
                                {
								$per=round(($res8['payed']*100)/$res7['total']);
                                }

                            ?>

                                <text x="50%" y="50%" style="fill:#6d4b0a;" dominant-baseline="middle"
                                    text-anchor="middle"><?=$per?>% / 100%</text>



                                <circle cx="50%" cy="50%" r="80" fill="none" stroke="#eee" style="stroke-width:5%;">
                                </circle>


                                <?php
                                $pending=0;
                                if($res7['total']!=0)
                                {
								$pending=($res8['payed']*502.64)/$res7['total'];
                                }
                                $payed=502.64-$pending;
							?>

                                <style>
                                .dChart {
                                    margin: 30px 0 0 0;
                                }

                                .dChart .payed {
                                    animation: pro 3s ease;
                                    transform: rotate(-90deg);
                                    transform-origin: 50% 50%;
                                }

                                @keyframes pro {
                                    0% {
                                        stroke-dashoffset: 502.64px;
                                    }

                                    100% {
                                        stroke-dashoffset: <?=$payed?>px;
                                    }
                                }
                                </style>

                                <!-- r=1  stroke-dasharray=6.283px -->
                                <circle cx="50%" cy="50%" r="80" fill="none" class="payed" stroke="#6d4b0a"
                                    style="stroke-dashoffset:<?=$payed?>px; stroke-dasharray:502.64px; stroke-width:5%;">
                                </circle>
                            </svg>
                            <?php
                            $rem=0;
                            if($res7['total']!=0)
                            {
							    $rem=100-$per;
                            } 
                        ?>
                            <div class="into">
                                <div class="into2">
                                    <div class="box">
                                    </div>
                                    <div class="word">
                                        Payment Received
                                    </div>
                                    <div class="percantage">
                                        <span><?php echo "$per%";?></span>
                                    </div>
                                </div>
                                <div class="into2">
                                    <div class="box2">
                                    </div>
                                    <div class="word">
                                        Payment Pending
                                    </div>
                                    <div class="percantage2">
                                        <span><?php echo "$rem%";?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d">
                            <label class="flash2">Top Selling Products</label>
                            <div class="sell">
                                <table>
                                    <?php
                                $str9="select sum(p_qty) as qty,p_id from info_sale_qty group by p_id order by p_qty DESC LIMIT 5";
                                $qry9=mysqli_query($conn,$str9);
								
                                while($res9=mysqli_fetch_assoc($qry9))
                                {
                                    $str13="select * from info_product where p_id=".$res9['p_id'];
                                    $qry13=mysqli_query($conn,$str13);
                                    $res13=mysqli_fetch_assoc($qry13);
									
                                    echo "<tr>";
                                    echo "<td><div class='imp'>".$res13['p_name']."<br><label>Product Name</label></div></td>";
									echo "<td>₹".$res13['p_price']."<br><label>Price</label></td>";
									echo "<td>".$res9['qty']." Box<br><label>Quantity</label></td>";
									echo "</tr>";
								}
                        ?>
                                </table>
                            </div>
                        </div>
                        <div class="d">
                            <label class="flash2">Recent Orders</label>
                            <div class="sell">
                                <table>
                                    <?php
                                $str14="select * from info_sale order by s_date DESC LIMIT 5";
                                $qry14=mysqli_query($conn,$str14);
								
                                while($res14=mysqli_fetch_assoc($qry14))
                                {
                                    $str16="select * from info_sale_qty where sale_id=".$res14['sale_id'];
                                    $qry16=mysqli_query($conn,$str16);
                                    $res16=mysqli_fetch_assoc($qry16);
                                    $str15="select * from info_product where p_id=".$res16['p_id'];
                                    $qry15=mysqli_query($conn,$str15);
                                    $res15=mysqli_fetch_assoc($qry15);
                                    $str17="select * from info_distributor where d_id=".$res14['d_id'];
                                    $qry17=mysqli_query($conn,$str17);
                                    $res17=mysqli_fetch_assoc($qry17);
                                    $str18="select p_id from info_sale_qty where sale_id=".$res14['sale_id']." order by p_id";
                                    $qry18=mysqli_query($conn,$str18);
                                    $res18=mysqli_num_rows($qry18);
									$date=date('d-M',strtotime($res14['s_date']));

                                    echo "<tr>";
                                    echo "<td><div class='imp2'>$date<br><label>Date</label></div></td>";
                                    echo "<td><div class='imp3'>".$res17['d_name']."<br><label>Distributor</label></div></td>";
                                    echo "<td>".$res18."<br><label>Products</label></td>";
									echo "<td>₹".$res14['s_amt']."<br><label>Amount</label></td>";
									echo "</tr>";
								}
                        ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>

</html>