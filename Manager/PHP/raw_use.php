<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Raw Used</title>
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
        var pro = document.getElementById('pro').value;
        var date = document.getElementById('date').value;

        if (pro == "" && date == "") {
            alert("Please insert atleast one input 'Product' or 'Date'");
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
                <div class="raw_text">
                    <a href="raw.php"><img src="images/icons/raw materials2.png" />RAW MATERIALS</a>
                    <b>&nbsp/&nbsp</b>
                    <a href="raw_use.php" style="color:white;">MATERIAL USED</a>
                </div>
            </div>
            <div class="main">
                <div class="tbl_head">
                    <form action="" method="post" onsubmit="return validate()">
                        <div class="header">
                            <h3>Material Used In Production</h3>
                        </div>
                        <div class="filter">
                            <div class="filter2" onclick="show()"> <img src="images/icons/filter.png">
                                <h4>Filters</h4>
                            </div>
                            <div class="filter3" id="filter3">
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

                                </select>
                                <input type="date" name="date" id="date" />
                                <label>To</label>
                                <input type="date" name="date2" id="date2" />
                                <input type="submit" value="Filter" class="fltrBtn" name="sbt" id="sbt">
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
                            <th>Product Quantity [Boxes]</th>
                            <th>Date of Use</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        if(isset($_POST['sbt2']))
                        {
                            echo "<script>window.location.href='raw_use.php';</script>";
                        }
						if(!isset($_POST['sbt']))
						{
							if(isset($_POST['dlt']))
                            {
                                $dlt_str="delete from use_history where p_num=".$_POST['dlt'];
                                $dlt_qry=mysqli_query($conn,$dlt_str);
                                echo "<script>window.location.href='raw_use.php';</script>";
                            }
                            if(isset($_POST['info']))
                            {
                                $_SESSION['p_num']=$_POST['info'];
                                echo "<script>window.location.href='raw_use_info.php';</script>";
                            }
							$str="select DISTINCT p_id,p_num,p_qty,h_date from use_history";
							$qry=mysqli_query($conn,$str);
							$i=1;
							while($res=mysqli_fetch_assoc($qry))
							{
								$str1="select * from info_product where p_id=".$res['p_id'];
								$qry1=mysqli_query($conn,$str1);
								$res1=mysqli_fetch_assoc($qry1);

								echo "<tr>";
								echo "<td>".$i."</td>";
								echo "<td>".$res1['p_name']." ₹".$res1['p_price']."</td>";
								echo "<td>".$res['p_qty']."</td>";
								echo "<td>".$res['h_date']."</td>";
                                echo "<td class='action'><form method='POST'><button class='info' name='info' value='".$res['p_num']."'>i</i></button> <button name='dlt' value='".$res['p_num']."' class='dlt_btn3' ><img src='images/icons/dlt_btn.png' /></button></form></td>";
								echo "</tr>";
								$i=$i+1;
							}
						}
						else
						{
							if($_POST['date']!='')
							{
								$str="select DISTINCT p_id,p_num,p_qty,h_date from use_history where h_date='".$_POST['date']."'";
								if($_POST['date2']!='')
								{
									$str="select DISTINCT p_id,p_num,p_qty,h_date from use_history where h_date between '".$_POST['date']."' and '".$_POST['date2']."'";	
								}									
							}
								
							if($_POST['p_id']!='')
							{
								$str="select DISTINCT p_id,p_num,p_qty,h_date from use_history where p_id=".$_POST['p_id'];
								if($_POST['date']!='')
								{
									$str="select DISTINCT p_id,p_num,p_qty,h_date from use_history where h_date='".$_POST['date']."' and p_id=".$_POST['p_id'];
									if($_POST['date2']!='')
									{
										$str="select DISTINCT p_id,p_num,p_qty,h_date from use_history where (h_date between '".$_POST['date']."' and '".$_POST['date2']."') and p_id=".$_POST['p_id'];	
									}									
								}
							}
							
							
							$qry=mysqli_query($conn,$str);
							$i=1;
							while($res=mysqli_fetch_assoc($qry))
							{
								$str1="select * from info_product where p_id=".$res['p_id'];
								$qry1=mysqli_query($conn,$str1);
								$res1=mysqli_fetch_assoc($qry1);

								echo "<tr>";
								echo "<td>".$i."</td>";
								echo "<td>".$res1['p_name']." ₹".$res1['p_price']."</td>";
								echo "<td>".$res['p_qty']."</td>";
								echo "<td>".$res['h_date']."</td>";
								echo "<td class='action'><form method='POST'><button class='info' name='info' value='".$res['p_num']."'>i</i></button> <button name='dlt' value='".$res['p_num']."' class='dlt_btn3' ><img src='images/icons/dlt_btn.png' /></button></form></td>";

								echo "</tr>";

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