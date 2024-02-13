<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Manage Raw Materials</title>
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

        if (cat == "") {
            alert("Please insert atleast one input 'Category' or 'Raw Material'");
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
                </div>
                <div class="raw_view">
                    <a href="view_category.php"><img src="images/icons/view.png" />View Raw Category</a>
                </div>
                <div class="raw_used">
                    <a href="raw_use.php"><img src="images/icons/history.png" />Material Used</a>
                </div>
                <div class="raw_btn">
                    <a href="add_raw.php"><img src="images/icons/plus.png" />Raw Materials</a>
                </div>

            </div>
            <div class="main">
                <?php
                    if(isset($_POST['raw_edit']))
                    {
                        $_SESSION['raw_id']=$_POST['raw_edit'];
                        echo "<script>window.location.href='edit_raw_material.php';</script>";
                    }
					
                    if(isset($_POST['raw_dlt']))
                    {
                        $str2="delete from raw_materials where raw_id=".$_POST['raw_dlt'];
                        $qry2=mysqli_query($conn,$str2);
                    }
                ?>
                <div class="tbl_head">
                    <form action="" method="post" onsubmit="return validate()">
                        <div class="header">
                            <h3>Raw Materials</h3>
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
											if($_POST['rc_id']!="")
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
                            <th>Raw Material Name</th>
                            <th>Category Name</th>
                            <th>Quantity [kg/lt]</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                        <?php
                            include "connection.php";
								if(isset($_POST['sbt2']))
								{
									echo "<script>window.location.href='raw.php';</script>";
								}
								if(!isset($_POST['sbt']))
								{
									$str="select * from raw_materials";
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
										echo "<td>".$res['raw_name']."</td>";
										echo "<td>".$res4['raw_cat_name']."</td>";
										echo "<td>".$res['raw_qty']."</td>";
										echo "";

										if($res['raw_qty']>=$res['min_qty'])
										{
											echo "<td><div class='online'>In Stock</div></td>";
										}
										else
										{
											if($res['raw_qty']<$res['min_qty'] && $res['raw_qty']>0)
											{
												echo "<td><div class='low'>Low Stock</div></td>";
											}
											elseif($res['raw_qty']<1)
											{
												echo "<td><div class='offline'>Out of Stock</div></td>";
											}
										}
										echo "<td class='action'><form method='POST'><button name='raw_edit' value='".$res['raw_id']."' class='edit_btn2'><img src='images/icons/edit.png'/></button> <button name='raw_dlt' value='".$res['raw_id']."' class='dlt_btn2' ><img src='images/icons/dlt_btn.png' /></button></form></td>";
										echo "</tr>";
										$i=$i+1;
									}
								}
								else
								{
									if($_POST['rc_id']!='')
									{
										$str="select * from raw_materials where raw_cat_id=".$_POST['rc_id'];
										if($_POST['r_id']!='')
										{
											$str="select * from raw_materials where raw_id=".$_POST['r_id'];
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
										echo "<td>".$res['raw_name']."</td>";
										echo "<td>".$res4['raw_cat_name']."</td>";
										echo "<td>".$res['raw_qty']."</td>";
										echo "";

										if($res['raw_qty']>=$res['min_qty'])
										{
											echo "<td><div class='online'>In Stock</div></td>";
										}
										else
										{
											if($res['raw_qty']<$res['min_qty'] && $res['raw_qty']>0)
											{
												echo "<td><div class='low'>Low Stock</div></td>";
											}
											elseif($res['raw_qty']<1)
											{
												echo "<td><div class='offline'>Out of Stock</div></td>";
											}
										}
										echo "<td class='action'><form method='POST'><button name='raw_edit' value='".$res['raw_id']."' class='edit_btn2'><img src='images/icons/edit.png'/></button> <button name='raw_dlt' value='".$res['raw_id']."' class='dlt_btn2' ><img src='images/icons/dlt_btn.png' /></button></form></td>";
										echo "</tr>";
										$i=$i+1;
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