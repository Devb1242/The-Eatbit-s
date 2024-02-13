<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>The Eatbit's-Order History</title>
    <link rel="icon" href="images/icons/favicon.ico" type="image/icon type">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="index,follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../CSS/main.css" />
    <script src="../JS/ajaxLink.js"></script>
    <script src="../JS/jqueryLink.js"></script>

</head>

<body onload="loaderOff()">
    <?php
		include "header.php";
		include "connection.php";
	?>
    <div class="banner">
        <img src="images\product brochures\banner.png" />
        <h1>Orders</h1>
    </div>

    <?php
		$str1="select SUM(s_amt) as ttl from info_sale where ord_status>1 and d_id=".$_SESSION['dis_id'];
		$qry1=mysqli_query($conn,$str1);
		$res1=mysqli_fetch_assoc($qry1);
		
		$str2="select * from info_sale where ord_status>1 and d_id=".$_SESSION['dis_id'];
		$qry2=mysqli_query($conn,$str2);
		
		$str3="select SUM(s_amt) as ttl from info_sale where ord_status<>0 and payment=0 and d_id=".$_SESSION['dis_id'];
		$qry3=mysqli_query($conn,$str3);
		$res3=mysqli_fetch_assoc($qry3);
		
		$ttl_amt=$res1['ttl'];
		
		$ttl_ord=mysqli_num_rows($qry2);
	
		$ttl_pen=$res3['ttl'];
	?>

    <div class="cont21">
        <div class="c21b">
            <h3>Total Amount</h3>
            <h2 class="num" data-val="<?=$ttl_amt?>">0</h2>
        </div>
        <div class="c21b">
            <h3>Total Orders</h3>
            <h2 class="smNum" data-val="<?=$ttl_ord?>">0</h2>
        </div>
        <div class="c21b">
            <h3>Pending Amount</h3>
            <h2 class="num" data-val="<?=$ttl_pen?>">0</h2>
        </div>
    </div>

    <div class="orders">
        <table>
            <tr>
                <th>Date</th>
                <th>Order No</th>
                <th>Amount</th>
                <th>Payment</th>
                <th>Status</th>
            </tr>
            <?php
					$str="select * from info_sale where (ord_status>1 or ord_status=0) and d_id=".$_SESSION['dis_id']." ORDER BY sale_id DESC";
					$qry=mysqli_query($conn,$str);
					while($res=mysqli_fetch_assoc($qry))
					{
				?>
            <tr onclick="showOrder(<?=$res['sale_id']?>)">
                <td><?=$res['s_date']?></td>
                <td><?=$res['sale_id']?></td>
                <td>₹ <?=number_format($res['s_amt'])?></td>
                <td>
                    <?php
							if($res['ord_status']!=0)
							{
								if($res['payment']==0)
								{
								?>
                    <label class="pending">Pending</label>
                    <?php							
								}
								else
								{
								?>
                    <label class="payed">Payed</label>
                    <?php							
								}
							}
							else
							{
							?>
                    <label class="cancelled2">Cancelled</label>
                    <?php
							}
						?>
                </td>
                <td>
                    <?php
							if($res['ord_status']==2)
							{
							?>
                    <label class="placed">Placed</label>
                    <?php		
							}
							elseif($res['ord_status']==3)
							{
							?>
                    <label class="confirmed">Confirmed</label>
                    <?php		
							}
							elseif($res['ord_status']==4)
							{
							?>
                    <label class="dispatched">Dispatched</label>
                    <?php		
							}
							elseif($res['ord_status']==5)
							{
							?>
                    <label class="delivered">Delivered</label>
                    <?php		
							}
							elseif($res['ord_status']==0)
							{
							?>
                    <label class="cancelled">Cancelled</label>
                    <?php		
							}
						?>
                </td>
            </tr>
            <?php
					}
				?>
        </table>
    </div>

    <div class="cont12">
        <img src="images/product brochures/muffin.png" />
    </div>

    <div class="cont13">
        <div class="c13left">
            <h1>Eatbit's Little Story</h1>
            <p>Dev Patel and Abrar Patel 20-21 year old founders and directors of Eatbit's snacks PVT LTD, Started
                making potato wafers in 1982 with a minuscule investment of Rs 10,000 at a shed erected in the street.
                They then went on to build a company that has reaped Rs 500 crore as turnover in 2017.</p>
        </div>
        <div class="c13right">
            <img src="images\product brochures\br1.png" />
        </div>
    </div>

    <div class="cont14">
        <div class="c14sub">
            <h1>12</h1>
            <label>Years Experience</label>
        </div>
        <div class="c14sub">
            <h1>21+</h1>
            <label>State Reach</label>
        </div>
        <div class="c14sub">
            <h1>200+</h1>
            <label>Distributors</label>
        </div>
        <div class="c14sub">
            <h1>83k</h1>
            <label>Retailers</label>
        </div>
    </div>

    <div class="cont15">
        <h1>What do they say about Eatbit?</h1>
        <div class="c15body">
            <div class="c15b">
                <table>
                    <tr>
                        <td rowspan=2><img src="images\persons\alish ss.png" /></td>
                        <td>This is very tasty products like saletd chips is awesome and I also like all cakes and also
                            namkeens, I love namkeen</td>
                    </tr>
                    <tr>
                        <td>Alish Mevawala-Artist</td>
                    </tr>
                </table>
            </div>
            <div class="c15b">
                <table>
                    <tr>
                        <td rowspan=2><img src="images\persons\aumshiv ss.jpg" /></td>
                        <td>This is very tasty products like saletd chips is awesome and I also like all cakes and also
                            namkeens, I love namkeen</td>
                    </tr>
                    <tr>
                        <td>Aumshiv Patel-Designer</td>
                    </tr>
                </table>
            </div>
            <div class="c15b">
                <table>
                    <tr>
                        <td rowspan=2><img src="images\persons\vrushabh ss.png" /></td>
                        <td>This is very tasty products like saletd chips is awesome and I also like all chips is
                            awesome and I also like all cakes and also namkeens, I love namkeen</td>
                    </tr>
                    <tr>
                        <td>Vrushabh Rana-Travel</td>
                    </tr>
                </table>
            </div>
            <div class="c15b">
                <table>
                    <tr>
                        <td rowspan=2><img src="images\persons\ayush2.jpeg" /></td>
                        <td>This is very tasty products like saletd chips This is very tasty products like saletd chips
                            is awesome and I also like all cakes and also namkeens, I love namkeen</td>
                    </tr>
                    <tr>
                        <td>Ayush Patel-Artist</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="cont16">
        <h1>Try the taste and ready to snack</br>Right Now!</h1>
        </br>
        </br>
        </br>
        <a href="product.php">Contact Us</a>
        <div class="c16img">
            <img src="images/product brochures/peri peri chips png.png" />
            <img src="images/product brochures/tomato png.png" class="img2" />
        </div>
    </div>

    <?php
		include "footer.php";
	?>

    <script>
    function showOrder(e) {

        oid = e;
        $.ajax({

            url: "AJAX/oidAjax.php",
            method: "POST",
            data: {
                oid: oid
            }

        });

        window.location.href = "OrderShow.php";

    }
    </script>


    <script src="../JS/main.js"></script>


</body>

</html>