<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>The Eatbit's-Show Order</title>
    <link rel="icon" href="images/icons/favicon.ico" type="image/icon type">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="index,follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../CSS/main.css" />
</head>

<body onload="loaderOff()">
    <?php
		include "header.php";
		include "connection.php";
	?>

    <?php
		$str="select * from info_sale where sale_id=".$_SESSION['oid'];
		$qry=mysqli_query($conn,$str);
		$res=mysqli_fetch_assoc($qry);
		
		if(isset($_POST['cnfrm']))
		{
			$str4="update info_sale set ord_status=2 where sale_id=".$res['sale_id'];
			$qry4=mysqli_query($conn,$str4);
			echo "<script>window.location.href='index.php';</script>";
		}
	?>

    <div class="banner">
        <img src="images\product brochures\banner.png" />
        <h1>Show Single Order</h1>
    </div>

    <div class="invc">
        <div class="invc_hd">
            <table>
                <tr>
                    <td>Invoice No.</td>
                    <td><b><?=$res['sale_id']?></b></td>
                </tr>
                <tr>
                    <td>Invoice Date</td>
                    <td><b><?=date("M d, Y")?></b></td>
                </tr>
                <tr>
                    <td>Payment</td>
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
                </tr>
                <tr>
                    <td>Status</td>
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
            </table>
        </div>
        <div class="invc_bd">
            <table>
                <tr>
                    <th>Item</th>
                    <th>HSN</th>
                    <th>Qty.</th>
                    <th>Price</th>
                    <th>Taxable Amount</th>
                    <th>SGST</th>
                    <th>CGST</th>
                    <th>Amount</th>
                </tr>
                <?php
					$str1="select * from info_sale_qty where sale_id=".$res['sale_id'];
					$qry1=mysqli_query($conn,$str1);
					$i=1;
					
					$tamt=0;//Taxable amount per product
					$amt=0;//Amount per product
					$sub_amt=0;//Sub total
					$cgst=0;//cgst per product
					$sgst=0;//sgst per product
					
					
					
					$dis_rate=$res['discount'];
					
					$gr_amt=0;
					$ttl_sgst=0;//total sgst
					$ttl_cgst=0;//tota cgst
					
					while($res1=mysqli_fetch_assoc($qry1))
					{
						$tamt=$res1['s_prc']*$res1['p_qty'];
						
						$str2="select * from info_product where p_id=".$res1['p_id'];
						$qry2=mysqli_query($conn,$str2);
						$res2=mysqli_fetch_assoc($qry2);
						
						$cgst_rate=$res2['GST']/2;
						$sgst_rate=$res2['GST']/2;
						
						$cgst=round(($tamt*$cgst_rate)/100);
						$sgst=round(($tamt*$sgst_rate)/100);
						
						$amt=$tamt+$cgst+$sgst;
				?>
                <tr>
                    <td><?=$i?>. <?=$res2['p_name']?></td>
                    <td><?=$res2['HSN']?></td>
                    <td><?=$res1['p_qty']?> Box</td>
                    <td>₹ <?=$res1['s_prc']?></td>
                    <td>₹ <?=$tamt?></td>
                    <td>₹ <?=$cgst?><small>(<?=$cgst_rate?>%)</small></td>
                    <td>₹ <?=$sgst?><small>(<?=$sgst_rate?>%)</small></td>
                    <td>₹ <?=$amt?></td>
                </tr>
                <?php
				
					$i++;
					$sub_amt=$sub_amt+$tamt;
					
					$ttl_cgst=$ttl_cgst+$cgst;
					$ttl_sgst=$ttl_sgst+$sgst;
					
					}
					
				?>
            </table>
        </div>
        <div class="invc_ft">
            <table>
                <tr>
                    <td>Sub Total</td>
                    <td style="text-align:right">₹ <?=$sub_amt?></td>
                </tr>
                <?php
					
					$gr_amt=$sub_amt+$ttl_cgst+$ttl_sgst;
					$dis=round(($gr_amt*$dis_rate)/100);
					$gr_amt=$gr_amt-$dis;
					
					$str3="update info_sale set s_date='".date("Y-m-d")."', s_amt='".$gr_amt."' where sale_id=".$res['sale_id'];
					$qry3=mysqli_query($conn,$str3);
					
				?>
                <tr>
                    <td>CGST</td>
                    <td style="text-align:right">₹ <?=$ttl_cgst?></td>
                </tr>
                <tr>
                    <td>SGST</td>
                    <td style="text-align:right">₹ <?=$ttl_sgst?></td>
                </tr>
                <tr style="color:#39bb01">
                    <td>Discount(<?=$dis_rate?>%)</td>
                    <td style="text-align:right">-₹ <?=$dis?></td>
                </tr>
                <tr>
                    <th>Total</th>
                    <th style="text-align:right">₹ <?=$gr_amt?></th>
                </tr>
            </table>
        </div>
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


</body>

</html>