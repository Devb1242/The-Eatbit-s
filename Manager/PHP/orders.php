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
                    <a href="orders.php"><img src="images/icons/orders2.png" />ORDERS</a>
                </div>
            </div>
            <div class="main">
                <?php
                     if(isset($_POST['c_edit']))
                    {
                        $_SESSION['cat_id']=$_POST['c_edit'];
                        header("location: edit_category.php");
                    }
                ?>
                <form method="POST" action="orderShow.php">
                    <div class="c_data">
                        <?php 
							include "connection.php";
							$str="select * from info_distributor";
							$qry=mysqli_query($conn,$str);
							while($res=mysqli_fetch_assoc($qry))
							{
								$str1="select * from city where city_id=".$res['d_city'];
								$qry1=mysqli_query($conn,$str1);
								$res1=mysqli_fetch_assoc($qry1);
								
								$str2="select * from info_sale where noti=0 and ord_status=2 and d_id=".$res['d_id'];
								$qry2=mysqli_query($conn,$str2);
								$noti=mysqli_num_rows($qry2);
								echo "<div class='cat'>
										<div class='card'>";
										if($noti!=0)
										{
											echo "<span class='noti'>".$noti."</span>";
										}
											
										echo "<div class='card2'>
												<h3>".$res['d_agency']."</h3>
												<h5>".$res1['city_name']."</h5>
												<h5>".$res['d_phone']."</h5>
											</div>
											<div class='action_btn'>
													<button name='d_pass' value='".$res['d_id']."' class='edit'>View</button>
											</div>
										</div>
									</div>";
							}
						?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>