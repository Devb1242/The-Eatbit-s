<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Manage Purchases</title>
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
        var cat = document.getElementById('r_cat').value;
        var dt = document.getElementById('date').value;

        if (cat == "" && dt == "") {
            alert("Please insert atleast one input 'Category' Or 'Date' ");
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
                <div class="text">
                    <a href="purchase.php"><img src="images/icons/manage purchase2.png" />PURCHASES</a>
                </div>
                <div class="btn">
                    <a href="add_purchases.php"><img src="images/icons/plus.png" />PURCHASE</a>
                </div>
            </div>
            <div class="main">
                <div class="tbl_head">
                    <form action="" method="post" onsubmit="return validate()">
                        <div class="header">
                            <h3>Raw Material Purchase History</h3>
                        </div>
                        <div class="filter">
                            <div class="filter2" onclick="show()"> <img src="images/icons/filter.png">
                                <h4>Filters</h4>
                            </div>
                            <div class="filter3">
                                <select name="rc_id" onChange="change_raw()" id="r_cat">
                                    <option value="">Select Category</option>
                                    <?php
											$str12="select * from raw_cat_materials";
											$qry12=mysqli_query($conn,$str12);
											while($res12=mysqli_fetch_assoc($qry12))
											{
											?>
                                    <option value="<?=$res12['raw_cat_id']?>"><?=$res12['raw_cat_name']?></option>
                                    <?php
											}
										?>
                                </select>
                                <div id="raw_div">
                                    <select name="r_id" id="raw">
                                        <option value="">Select Raw Material</option>
                                        <?php
										if(isset($_POST['sbt']))
										{
											if($_POST['rc_id']!='')
											{
												$str13="select * from raw_materials where raw_cat_id=".$_POST['rc_id'];
												$qry13=mysqli_query($conn,$str13);
												while($res13=mysqli_fetch_assoc($qry13))
												{
										?>
                                        <option value="<?=$res13['raw_id']?>"><?=$res13['raw_name']?></option>
                                        <?php
												}
											}
										}
										?>
                                    </select>
                                </div>
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
                            <th>Raw Material</th>
                            <th>Raw Category</th>
                            <th>Raw Quantity [kg/lt]</th>
                            <th>DOP</th>
                        </tr>
                        <?php
							include "connection.php";
							if(isset($_POST['sbt2']))
							{
								echo "<script>window.location.href='purchase.php';</script>";
							}
							if(!isset($_POST['sbt']))
							{
                                $str="select * from raw_purchase";
                                $qry=mysqli_query($conn,$str);
                                $i=1;
                          
                                while($res=mysqli_fetch_assoc($qry))
                                {

                                    $str3="select * from raw_materials where raw_id=".$res['raw_id'];
                                    $qry3=mysqli_query($conn,$str3);
                                    $res3=mysqli_fetch_assoc($qry3);
                                    $str4="select * from raw_cat_materials where raw_cat_id=".$res3['raw_cat_id'];
                                    $qry4=mysqli_query($conn,$str4);
                                    $res4=mysqli_fetch_assoc($qry4);
                                    echo "<tr>" ;
                                    echo "<td>".$i."</td>";
                                    echo "<td>".$res3['raw_name']."</td>";
                                    echo "<td>".$res4['raw_cat_name']."</td>";
                                    echo "<td>".$res['pur_qty']."</td>";
                                    echo "<td>".$res['pur_date']." </td>";

                                    $i=$i+1;
                                }			
						    }
							else
							{
								if($_POST['rc_id']!='' && $_POST['r_id']=='')
								{
									$str2="select * from raw_materials where raw_cat_id=".$_POST['rc_id'];
									$qry2=mysqli_query($conn,$str2);
									while($res2=mysqli_fetch_assoc($qry2))
									{
										$str="select * from raw_purchase where raw_id=".$res2['raw_id'];
										
										if($_POST['date']!='')
										{
											$str="select * from raw_purchase where pur_date='".$_POST['date']."' and raw_id=".$res2['raw_id'];
											
											if($_POST['date2']!='')
											{
												$str="select * from raw_purchase where raw_id=".$res2['raw_id']." and pur_date between '".$_POST['date']."' and '".$_POST['date2']."'";
											}
										}
										
										$qry=mysqli_query($conn,$str);
										$i=1;
								  
										while($res=mysqli_fetch_assoc($qry))
										{

											$str3="select * from raw_materials where raw_id=".$res['raw_id'];
											$qry3=mysqli_query($conn,$str3);
											$res3=mysqli_fetch_assoc($qry3);
											$str4="select * from raw_cat_materials where raw_cat_id=".$res3['raw_cat_id'];
											$qry4=mysqli_query($conn,$str4);
											$res4=mysqli_fetch_assoc($qry4);
											echo "<tr>" ;
											echo "<td>".$i."</td>";
											echo "<td>".$res3['raw_name']."</td>";
											echo "<td>".$res4['raw_cat_name']."</td>";
											echo "<td>".$res['pur_qty']."</td>";
											echo "<td>".$res['pur_date']." </td>";

											$i=$i+1;
										}	
									}
								}
								
								if($_POST['r_id']!='')
								{
									$str="select * from raw_purchase where raw_id=".$_POST['r_id'];
									
									if($_POST['date']!='')
									{
										$str="select * from raw_purchase where pur_date='".$_POST['date']."' and raw_id=".$_POST['r_id'];
										
										if($_POST['date2']!='')
										{
											$str="select * from raw_purchase where raw_id=".$_POST['r_id']." and pur_date between '".$_POST['date']."' and '".$_POST['date2']."'";
										}
									}
									
									$qry=mysqli_query($conn,$str);
									$i=1;
									
									while($res=mysqli_fetch_assoc($qry))
									{

										$str3="select * from raw_materials where raw_id=".$res['raw_id'];
										$qry3=mysqli_query($conn,$str3);
										$res3=mysqli_fetch_assoc($qry3);
										$str4="select * from raw_cat_materials where raw_cat_id=".$res3['raw_cat_id'];
										$qry4=mysqli_query($conn,$str4);
										$res4=mysqli_fetch_assoc($qry4);
										echo "<tr>" ;
										echo "<td>".$i."</td>";
										echo "<td>".$res3['raw_name']."</td>";
										echo "<td>".$res4['raw_cat_name']."</td>";
										echo "<td>".$res['pur_qty']."</td>";
										echo "<td>".$res['pur_date']." </td>";

										$i=$i+1;
									}
								}
								
								if($_POST['date']!='' && $_POST['rc_id']=='')
								{
									$str="select * from raw_purchase where pur_date='".$_POST['date']."'";
									
									if($_POST['date2']!='')
									{
										$str="select * from raw_purchase where pur_date between '".$_POST['date']."' and '".$_POST['date2']."'";
									}
									
									
									$qry=mysqli_query($conn,$str);
									$i=1;
									
									while($res=mysqli_fetch_assoc($qry))
									{

										$str3="select * from raw_materials where raw_id=".$res['raw_id'];
										$qry3=mysqli_query($conn,$str3);
										$res3=mysqli_fetch_assoc($qry3);
										$str4="select * from raw_cat_materials where raw_cat_id=".$res3['raw_cat_id'];
										$qry4=mysqli_query($conn,$str4);
										$res4=mysqli_fetch_assoc($qry4);
										echo "<tr>" ;
										echo "<td>".$i."</td>";
										echo "<td>".$res3['raw_name']."</td>";
										echo "<td>".$res4['raw_cat_name']."</td>";
										echo "<td>".$res['pur_qty']."</td>";
										echo "<td>".$res['pur_date']." </td>";

										$i=$i+1;
									}
								}
								echo "<script>";
								echo "var rcSelect=document.getElementById('r_cat');";
								echo "for(var i,j=0;i=rcSelect.options[j];j++){
										if(i.value=='".$_POST['rc_id']."'){
											rcSelect.selectedIndex=j;
											break;
										}
									}";
								echo "</script>";
								
								echo "<script>";
								echo "var rSelect=document.getElementById('raw');";
								echo "for(var i,j=0;i=rSelect.options[j];j++){
										if(i.value=='".$_POST['r_id']."'){
											rSelect.selectedIndex=j;
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

    <script>
    function change_raw() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "filter_ajax.php?raw_cat=" + document.getElementById("r_cat").value, false);
        xmlhttp.send(null);
        document.getElementById("raw_div").innerHTML = xmlhttp.responseText;
    }
    </script>

</body>

</html>