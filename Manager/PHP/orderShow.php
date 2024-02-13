<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Order</title>
    <link rel="icon" href="images/icons/favicon.ico" type="image/icon type">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="index,follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../CSS/managerstyle.css" />
    <script src="../JS/ajaxLink.js"></script>
    <script src="../JS/jqueryLink.js"></script>

    <script>
    function validate() {
        var stts = document.getElementById('pro').value;
        var dt = document.getElementById('date').value;

        if (stts == "" && dt == "") {
            alert("Please insert atleast one input 'Payment status' Or 'Date' ");
            return false;
        }
        return true;
    }
    </script>

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
            <?php
				if(isset($_POST['cnclBtn']))
				{
					$str4="update info_sale set ord_status=0 where sale_id=".$_POST['cnclBtn'];
					$qry4=mysqli_query($conn,$str4);
					echo "<script>window.location.href='orderShow.php'</script>";
				}
			?>
            <?php
				if(isset($_POST['cnfrmBtn']))
				{
					$str11="select * from info_sale_qty where sale_id=".$_POST['cnfrmBtn'];
					$qry11=mysqli_query($conn,$str11);
					while($res11=mysqli_fetch_assoc($qry11))
					{
						$str12="update info_product set p_qty=p_qty-".$res11['p_qty']." where p_id=".$res11['p_id'];
						$qry12=mysqli_query($conn,$str12);	
					}
					
					$str6="update info_sale set ord_status=3 where sale_id=".$_POST['cnfrmBtn'];
					$qry6=mysqli_query($conn,$str6);
					echo "<script>window.location.href='orderShow.php'</script>";
				}
			?>
            <?php
				if(isset($_POST['dsptchBtn']))
				{
					$str7="update info_sale set ord_status=4 where sale_id=".$_POST['dsptchBtn'];
					$qry7=mysqli_query($conn,$str7);
					echo "<script>window.location.href='orderShow.php'</script>";
				}
			?>
            <?php
				if(isset($_POST['dlvrdBtn']))
				{
					$str8="update info_sale set ord_status=5 where sale_id=".$_POST['dlvrdBtn'];
					$qry8=mysqli_query($conn,$str8);
					echo "<script>window.location.href='orderShow.php'</script>";
				}
			?>
            <?php
				if(isset($_POST['payedBtn']))
				{
					$str9="update info_sale set payment=0 where sale_id=".$_POST['payedBtn'];
					$qry9=mysqli_query($conn,$str9);
					echo "<script>window.location.href='orderShow.php'</script>";
				}
			?>
            <?php
				if(isset($_POST['pendingBtn']))
				{
					$str10="update info_sale set payment=1 where sale_id=".$_POST['pendingBtn'];
					$qry10=mysqli_query($conn,$str10);
					echo "<script>window.location.href='orderShow.php'</script>";
				}
			?>
            <?php
				if(isset($_POST['d_pass']))
				{
					$_SESSION['did']=$_POST['d_pass'];
				}
					$str5="select * from info_distributor where d_id=".$_SESSION['did'];
					$qry5=mysqli_query($conn,$str5);
					$res5=mysqli_fetch_assoc($qry5);
					
					$str2="update info_sale set noti=1 where d_id=".$_SESSION['did'];
					$qry2=mysqli_query($conn,$str2);
				
			?>

            <div class="orderPopup" id="showOrder">

            </div>

            <div class="path">
                <div class="text">
                    <a href="orders.php"><img src="images/icons/orders2.png" />ORDERS</a>
                    <b>&nbsp/&nbsp</b>
                    <a href="orderShow.php" style="color:white;">SINGLE PARTY ORDERS</a>
                </div>
            </div>
            <div class="main">
                <div class="tbl_head">
                    <form action="" method="post" onsubmit="return validate()">
                        <div class="header">
                            <h3>Manage Production</h3>
                        </div>
                        <div class="filter">
                            <div class="filter2" onclick="show()"> <img src="images/icons/filter.png">
                                <h4>Filters</h4>
                            </div>
                            <div class="filter3">
                                <select name="pay" id="pro">
                                    <option value="">Select Payment Status</option>
                                    <option value="1">Payed</option>
                                    <option value="0">Pending</option>
                                </select>
                                <input type="date" name="date" id="date" />
                                <label>To</label>
                                <input type="date" name="date2" id="date2" />
                                <input type="submit" class="fltrBtn" value="Filter" name="sbt" id="sbt">
                                <input type="submit" class="fltrBtn" value="Clear" name="sbt2">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tbl">
                    <table>
                        <tr>
                            <th>Date</th>
                            <th>Order no</th>
                            <th>Amount</th>
                            <th>Payment</th>
                            <th>Status</th>
                        </tr>
                        <?php
                                include "connection.php";
								if(isset($_POST['sbt2']))
								{
									echo "<script>window.location.href='orderShow.php';</script>";
								}
                                if(!isset($_POST['sbt']))
								{
									$str="select * from info_sale where (ord_status>=2 or ord_status=0) and d_id=".$res5['d_id']." ORDER BY sale_id DESC";
									$qry=mysqli_query($conn,$str);
									$i=1;
									$amt=0;
									$pay=0;
									while($res=mysqli_fetch_assoc($qry))
									{
										if($res['ord_status']!=0)
										{
											$amt=$amt+$res['s_amt'];
											if($res['payment']==0)
											{
												$pay=$pay-$res['s_amt'];
											}
										}
										
										$os=$res['ord_status'];
										echo "<tr class='trHover' onclick='show(".$res['sale_id'].")' >";
										echo "<td>".$res['s_date']."</td>";
										echo "<td>".$res['sale_id']."</td>";
										echo "<td>₹ ".$res['s_amt']."/-</td>";
										echo "<td>";
										if($res['ord_status']==0)
										{
											echo "<span class='canceled'>Canceled</span>";
										}
										else
										{
											if($res['payment']==0)
											{
												echo "<span class='pending'>Pending</span>";
											}
											else
											{
												echo "<span class='payed'>Payed</span>";
											}
										}
										echo "</td>";
										if($os==0)
										{
											$stts="Order Canceled";
										}
										elseif($os==2)
										{
											$stts="Order Placed";
										}
										elseif($os==3)
										{
											$stts="Order Confirmed";
										}
										elseif($os==4)
										{
											$stts="Order Dispatched";
										}
										elseif($os==5)
										{
											$stts="Order Delivered";
										}
										echo "<td title='".$stts."'>";
										echo "<div class='OrdStatus'>";
										if($os==0)
										{
											echo "<div class='track1'><input type='checkbox' disabled checked><span class='road1'></span></div>";
										}
										else
										{
											echo "<div class='track1'><input type='checkbox' disabled ><span class='road1'></span></div>";
										}
										
										if($os>=3)
										{
											echo "<div class='track3'><input type='checkbox' disabled checked><span class='road3'></span></div>";
										}
										else
										{
											echo "<div class='track3'><input type='checkbox' disabled ><span class='road3'></span></div>";
										}
										
										if($os>=4)
										{
											echo "<div class='track4'><input type='checkbox' disabled checked><span class='road4'></span></div>";
										}
										else
										{
											echo "<div class='track4'><input type='checkbox' disabled ><span class='road4'></span></div>";
										}
										
										if($os>=5)
										{
											echo "<div class='track5'><input type='checkbox' disabled  checked></span></div>";
										}
										else
										{
											echo "<div class='track5'><input type='checkbox' disabled ></span></div>";
										}
										
										echo "</div>";
										echo "</td>";

										$i=$i+1;
									}
								}
								else
								{
									if($_POST['pay']!='')
									{
										$str="select * from info_sale where ord_status<>0 and payment=".$_POST['pay']." and d_id=".$_SESSION['did'];
										if($_POST['date']!='')
										{
											$str="select * from info_sale where (ord_status>=3 or ord_status=0) and d_id=".$_SESSION['did']." and s_date='".$_POST['date']."' and payment=".$_POST['pay']." and ord_status<>0 ORDER BY sale_id DESC";
											
											if($_POST['date2']!='')
											{
												$str="select * from info_sale where (ord_status>=3 or ord_status=0) and d_id=".$_SESSION['did']." and s_date between '".$_POST['date']."' and '".$_POST['date2']."' and payment=".$_POST['pay']." and ord_status<>0 ORDER BY sale_id DESC";
											}
										}
									}
									else
									{
										if($_POST['date']!='')
										{
											$str="select * from info_sale where (ord_status>=3 or ord_status=0) and d_id=".$_SESSION['did']." and s_date='".$_POST['date']."' ORDER BY sale_id DESC";
											
											if($_POST['date2']!='')
											{
												$str="select * from info_sale where (ord_status>=3 or ord_status=0) and d_id=".$_SESSION['did']." and s_date between '".$_POST['date']."' and '".$_POST['date2']."' ORDER BY sale_id DESC";
											}
										}
									}
									
									$qry=mysqli_query($conn,$str);
									$i=1;
									$amt=0;
									$pay=0;
									while($res=mysqli_fetch_assoc($qry))
									{
										if($res['ord_status']!=0)
										{
											$amt=$amt+$res['s_amt'];
											
											if($res['payment']==1)
											{
												$pay=$pay+$res['s_amt'];
											}
											else
											{
												$pay=$pay-$res['s_amt'];
											}
										}
										$os=$res['ord_status'];
										echo "<tr class='trHover' onclick='show(".$res['sale_id'].")' >";
										echo "<td>".$res['s_date']."</td>";
										echo "<td>".$res['sale_id']."</td>";
										echo "<td>₹ ".$res['s_amt']."/-</td>";
										echo "<td>";
										if($res['ord_status']==0)
										{
											echo "<span class='canceled'>Canceled</span>";
										}
										else
										{
											if($res['payment']==0)
											{
												echo "<span class='pending'>Pending</span>";
											}
											else
											{
												echo "<span class='payed'>Payed</span>";
											}
										}
										echo "</td>";
										if($os==0)
										{
											$stts="Order Canceled";
										}
										elseif($os==3)
										{
											$stts="Order Placed";
										}
										elseif($os==4)
										{
											$stts="Order Confirmed";
										}
										elseif($os==5)
										{
											$stts="Order Dispatched";
										}
										elseif($os==6)
										{
											$stts="Order Delivered";
										}
										echo "<td title='".$stts."'>";
										echo "<div class='OrdStatus'>";
										if($os==0)
										{
											echo "<div class='track1'><input type='checkbox' disabled checked><span class='road1'></span></div>";
										}
										else
										{
											echo "<div class='track1'><input type='checkbox' disabled ><span class='road1'></span></div>";
										}
										
										if($os>=4)
										{
											echo "<div class='track3'><input type='checkbox' disabled checked><span class='road3'></span></div>";
										}
										else
										{
											echo "<div class='track3'><input type='checkbox' disabled ><span class='road3'></span></div>";
										}
										
										if($os>=5)
										{
											echo "<div class='track4'><input type='checkbox' disabled checked><span class='road4'></span></div>";
										}
										else
										{
											echo "<div class='track4'><input type='checkbox' disabled ><span class='road4'></span></div>";
										}
										
										if($os>=6)
										{
											echo "<div class='track5'><input type='checkbox' disabled  checked></span></div>";
										}
										else
										{
											echo "<div class='track5'><input type='checkbox' disabled ></span></div>";
										}
										
										echo "</div>";
										echo "</td>";

										$i=$i+1;
									}
									echo "<script>";
									echo "var prSelect=document.getElementById('pro');";
									echo "for(var i,j=0;i=prSelect.options[j];j++){
											if(i.value=='".$_POST['pay']."'){
												prSelect.selectedIndex=j;
												break;
											}
										}";
									echo "</script>";
									
									echo "<script>";
									echo "var dtSelect=document.getElementById('date');";
									echo "dtSelect.value='".$_POST['date']."'";
									echo "</script>";
									
									echo "<script>";
									echo "var dt2Select=document.getElementById('date2');";
									echo "dt2Select.value='".$_POST['date2']."'";
									echo "</script>";
								}
						    ?>
                        <tr>
                            <th>Grand Totals</th>
                            <th><?=mysqli_num_rows($qry)?></th>
                            <th>₹ <?=$amt?> /-</th>
                            <th>₹ <?=$pay?> /-</th>
                            <th></th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
    var showOrder = document.getElementById('showOrder');

    function show(e) {
        oid = e;
        showOrder.style.visibility = 'visible';
        showOrder.style.opacity = '1';
        $.ajax({

            url: "AJAX/OrderShowPopup.php",
            method: "POST",
            data: {
                oid: oid
            },
            success: function(data) {
                $('#showOrder').html(data);
            }
        });
    }


    function popdown() {
        showOrder.style.visibility = 'hidden';
        showOrder.style.opacity = '0';
    }
    </script>

</body>

</html>