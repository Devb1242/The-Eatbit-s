<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>The Eatbit's-</title>
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
	?>

    <div class="banner">
        <img src="images\product brochures\banner.png" />
        <h1>Show Totals</h1>
    </div>

    <?php
		include "connection.php";
					
		$str="select * from info_sale where ord_status=1 and d_id=".$_SESSION['dis_id'];
		$qry=mysqli_query($conn,$str);
		$res=mysqli_fetch_assoc($qry);
		
		if(isset($_POST['cnfrm']))
		{
			$str4="update info_sale set ord_status=2 where sale_id=".$res['sale_id'];
			$qry4=mysqli_query($conn,$str4);
			echo "<script>window.location.href='index.php';</script>";
		}
	?>

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
					
					$str5="select * from discount";
					$qry5=mysqli_query($conn,$str5);
					$res5=mysqli_fetch_assoc($qry5);
					
					$dis_rate=$res5['discount'];
					
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
					
					$str3="update info_sale set s_date='".date("Y-m-d")."', s_amt='".$gr_amt."', discount=".$dis_rate." where sale_id=".$res['sale_id'];
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
    <form method="POST"><button name="cnfrm" style="margin-bottom:20px;" class="cnfrm">Confirm Order</button></form>
    <?php
		include "footer.php";
	?>
</body>

</html>