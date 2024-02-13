 <!DOCTYPE html
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

 <head>
     <title>Manage Production</title>
     <link rel="icon" href="images/icons/favicon.ico" type="image/icon type">
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <meta name="description" content="" />
     <meta name="keywords" content="" />
     <meta name="robots" content="index,follow" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <link rel="stylesheet" type="text/css" href="../CSS/managerstyle.css" />
     <script src="../JS/validation.js"></script>
	<script src="../JS/ajaxLink.js"></script>
    <script src="../JS/jqueryLink.js"></script>
     <script>
     function validate() {
         var slct = document.getElementById('pro').value;
         var dt = document.getElementById('date').value;

         if (slct == "" && dt == "") {
             alert("Please insert atleast one input 'Product' Or 'Date'");
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

             <div class="path">
                 <div class="pro_text">
                     <a href="production.php"><img src="images/icons/manage production2.png" />PRODUCTION</a>
                 </div>
                 <div class="raw_view">
                     <a href="product_ingredients.php"><img src="images/icons/info.png" />PRODUCT INGREDIENTS</a>
                 </div>
                 <div class="btn">
                     <a href="add_production.php"><img src="images/icons/plus.png" />PRODUCTION</a>
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
                                 <select name="p_id" id="pro">
                                     <option value="">Select Product</option>
                                     <?php
											$str12="select * from info_product ORDER BY p_name";
											$qry12=mysqli_query($conn,$str12);
											while($res12=mysqli_fetch_assoc($qry12))
											{
											?>
                                     <option value="<?=$res12['p_id']?>"><?=$res12['p_name']?> ₹<?=$res12['p_price']?>
                                     </option>
                                     <?php
											}
										?>
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
                             <th>Sr No.</th>
                             <th>Product Name</th>
                             <th>Quantity [Boxes]</th>
                             <th>Date</th>
                         </tr>
                         <?php
								include "connection.php";
								if(isset($_POST['sbt2']))
								{
									echo "<script>window.location.href='production.php';</script>";
								}
								if(!isset($_POST['sbt']))
								{
									$str="select * from product_production ORDER BY pd_id DESC";
									$qry=mysqli_query($conn,$str);
									$i=1;
							  
									while($res=mysqli_fetch_assoc($qry))
									{

										$str3="select * from info_product where p_id=".$res['p_id'];
										$qry3=mysqli_query($conn,$str3);
										$res3=mysqli_fetch_assoc($qry3);
										echo "<tr>" ;
										echo "<td>".$i."</td>";
										echo "<td>".$res3['p_name']." ₹".$res3['p_price']."</td>";
										echo "<td>".$res['pd_qty']." Box</td>";
										echo "<td>".$res['pd_date']." </td>";

										$i=$i+1;
									}
								}
								else
								{
									
									if($_POST['date']!='')
									{
										$str="select * from product_production where pd_date='".$_POST['date']."' ORDER BY pd_id DESC";
										if($_POST['date2']!='')
										{
											$str="select * from product_production where pd_date between '".$_POST['date']."' and '".$_POST['date2']."' ORDER BY pd_id DESC";
										}
									}
									
									if($_POST['p_id']!='')
									{
										$str="select * from product_production where p_id=".$_POST['p_id']." ORDER BY pd_id DESC";
										
										if($_POST['date']!='' && $_POST['date2']!='')
										{
											$str="select * from product_production where p_id=".$_POST['p_id']." and pd_date between '".$_POST['date']."' and '".$_POST['date2']."' ORDER BY pd_id DESC";
										}
										elseif($_POST['date']!='')
										{
											$str="select * from product_production where pd_date='".$_POST['date']."' and p_id=".$_POST['p_id']." ORDER BY pd_id DESC";
										}
									}
										$qry=mysqli_query($conn,$str);
										$i=1;
										while($res=mysqli_fetch_assoc($qry))
										{

											$str3="select * from info_product where p_id=".$res['p_id'];
											$qry3=mysqli_query($conn,$str3);
											$res3=mysqli_fetch_assoc($qry3);
											echo "<tr>" ;
											echo "<td>".$i."</td>";
											echo "<td>".$res3['p_name']." ₹".$res3['p_price']."</td>";
											echo "<td>".$res['pd_qty']." Box</td>";
											echo "<td>".$res['pd_date']." </td>";

											$i=$i+1;
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
                     </table>
                 </div>
             </div>
         </div>
     </div>
 </body>

 </html>