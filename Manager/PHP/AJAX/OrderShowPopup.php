<?php
	include "../connection.php";
	if(isset($_POST['oid']))
	{
		echo "<div class='cnclBtn'><button class='cnclBtn' onclick='popdown()'>X</button></div>";
		
		echo "<div class='ttlTbl'>";
		
		$str2="select * from info_sale where sale_id=".$_POST['oid'];
		$qry2=mysqli_query($conn,$str2);
		$res2=mysqli_fetch_assoc($qry2);
		if($res2['ord_status']!=6 && $res2['ord_status']!=0)
		{
			echo "<div class='cnclBtn'><form method='POST' action='orderShow.php' ><button class='cnclBtn' name='cnclBtn' value='".$res2['sale_id']."'>Cancel Order</button></form></div>";
		}
		
		echo "<h3 style='margin-bottom:10px;'>Order No.:".$res2['sale_id']."</h3>";
		echo "<h3 style='margin-bottom:10px;'>Date:".$res2['s_date']."</h3>";
		
		echo "<form method='POST' action='orderShow.php'>";
		if($res2['ord_status']==0)
		{
			echo "<span class='canceled'>Cancled</span>";
		}
		else
		{
			if($res2['payment']==0)
			{
				echo "<button name='pendingBtn' value='".$res2['sale_id']."' class='pending' style='border:none; cursor:pointer;'>Pending</button>";
			}
			else
			{
				echo "<button name='payedBtn' value='".$res2['sale_id']."' class='payed' style='border:none; cursor:pointer;'>Payed</button>";
			}
		}
		echo "</form>";
		
		echo "<form method='POST' action='orderShow.php'>";
		if($res2['ord_status']!=0)
		{
			$os=$res2['ord_status'];
			echo "<div class='status_changer'>";
			if($os>=3)
			{
				echo "<button class='st_true' name='cnfrmBtn' value='".$res2['sale_id']."'>Confirm</button>";
			}
			else
			{
				echo "<button name='cnfrmBtn' value='".$res2['sale_id']."'>Confirm</button>";
			}
			
			if($os>=4)
			{
				echo "<button class='st_true' name='dsptchBtn' value='".$res2['sale_id']."'>Dispatch</button>";
			}
			else
			{
				echo "<button name='dsptchBtn' value='".$res2['sale_id']."'>Dispatch</button>";
			}
			
			if($os>=5)
			{
				echo "<button class='st_true' name='dlvrdBtn' value='".$res2['sale_id']."'>Delivered</button>";
			}
			else
			{
				echo "<button name='dlvrdBtn' value='".$res2['sale_id']."'>Delivered</button>";
			}
			echo "</div>";
		}
		echo "</form>";
		
			$i=1;
			$tamt=0;//Taxable amount per product
			$amt=0;//Amount per product
			$sub_amt=0;//Sub total
			$cgst=0;//cgst per product
			$sgst=0;//sgst per product
			
			
			
			$dis_rate=$res2['discount'];
			
			$gr_amt=0;
			$ttl_sgst=0;//total sgst
			$ttl_cgst=0;//tota cgst
		
			$str1="select * from info_sale_qty where sale_id=".$_POST['oid'];
			$qry1=mysqli_query($conn,$str1);
			
			echo " <div class='tbl' style='margin:30px;'>";
			echo "<table>";
			echo "<tr>";
			echo "<th>Item</th>";
			echo "<th>Quantity</th>";
			echo "<th>Price</th>";
			echo "<th>Taxable Amount</th>";
			echo "<th>SGST</th>";
			echo "<th>CGST</th>";
			echo "<th>Amount</th>";
			echo "</tr>";
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
				
				echo "<tr>";
				echo "<td>".$i.". ".$res2['p_name']."</td>";
				echo "<td>".$res1['p_qty']." Box</td>";
				echo "<td>₹ ".$res1['s_prc']."</td>";
				echo "<td>₹ ".$tamt."</td>";
				echo "<td>₹ ".$cgst."<small>(".$cgst_rate."%)</small></td>";
				echo "<td>₹ ".$sgst."<small>(".$sgst_rate."%)</small></td>";
				echo "<td>₹ ".$amt."</td>";
				echo "</tr>";
				$i++;
				$sub_amt=$sub_amt+$tamt;
				
				$ttl_cgst=$ttl_cgst+$cgst;
				$ttl_sgst=$ttl_sgst+$sgst;
			}
		echo "</table>";
		echo "</div>";
		
		echo "<div class='invc_ft'>
			<table>
				<tr>
					<td>Sub Total</td>
					<td style='text-align:right'>₹ ".$sub_amt."</td>
				</tr>";
				
				$gr_amt=$sub_amt+$ttl_cgst+$ttl_sgst;
				$dis=round(($gr_amt*$dis_rate)/100);
				$gr_amt=$gr_amt-$dis;
				
		echo "<tr>
					<td>CGST</td>
					<td style='text-align:right'>₹ ".$ttl_cgst."</td>
				</tr>
				<tr>
					<td>SGST</td>
					<td style='text-align:right'>₹ ".$ttl_sgst."</td>
				</tr>
				<tr style='color:#39bb01'>
					<td>Discount(".$dis_rate."%)</td>
					<td style='text-align:right'>-₹ ".$dis."</td>
				</tr>
				<tr>
					<th>Total</th>
					<th style='text-align:right'>₹ ".$gr_amt."</th>
				</tr>
			</table>
		</div>";
		echo "</div>";
	}
?>
