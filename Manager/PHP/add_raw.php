<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Add Raw</title>
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
    <?php 
        include "connection.php";
        if(isset($_POST['raw_cat_add']))
        {
            $str="select * from raw_cat_materials where raw_cat_name='".$_POST['raw_cat_name']."'";
			$qry=mysqli_query($conn,$str);
			if(mysqli_num_rows($qry)>0)
			{
				echo "<script>alert('Raw Material Category Already Exists');</script>";
			}
            else
            {
                $str1="insert into raw_cat_materials (raw_cat_name) values('".$_POST['raw_cat_name']."')";
                $qry1=mysqli_query($conn,$str1);
            }
        }
        if(isset($_POST['raw_add']))
        {
            $str2="select * from raw_materials where raw_name='".$_POST['raw_name']."'";
			$qry2=mysqli_query($conn,$str2);
			if(mysqli_num_rows($qry2)>0)
			{
				echo "<script>alert('Raw Material Already Exists');</script>";
			}
            else
            {
                $str3="insert into raw_materials (raw_name,raw_cat_id,min_qty) values('".$_POST['raw_name']."',".$_POST['c_slct'].",".$_POST['min_qty'].")";
                $qry3=mysqli_query($conn,$str3);
            }
        }
    ?>
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
                    <a href="raw.php"><img src="images/icons/raw materials2.png" />RAW MATERIALS</a>
                    <b>&nbsp/&nbsp</b>
                    <a href="add_raw.php" style="color:white;">ADD NEW RAW MATERIALS</a>
                </div>
            </div>
            <div class="main">
                <div class="c_design">
                    <form method="POST">
                        <div class="c_form">
                            <div class="form">

                                <table>
                                    <tr>
                                        <th class="form_head">
                                            <h2>Add New Raw Category</h2>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="raw_cat_name"
                                                placeholder="Enter New Raw Category Name" required />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><input type="submit" name="raw_cat_add" value="Add" /></th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </form>
                    <form method="POST">
                        <div class="c_form">
                            <div class="form">

                                <table>
                                    <tr>
                                        <th class="form_head">
                                            <h2>Add New Raw Material</h2>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td><select name="c_slct" id="raw_cat" required>
                                                <option value="">Select Raw Category</option>
                                                <?php
													$str1="select * from raw_cat_materials";
													$qry1=mysqli_query($conn,$str1);
													while($res=mysqli_fetch_assoc($qry1))
													{
														echo "<option value='".$res['raw_cat_id']."'>".$res['raw_cat_name']."</option>";
													}
												?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="raw_name" placeholder="Enter New Raw Material Name"
                                                required />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="number" name="min_qty"
                                                placeholder="Enter Minimum Raw Quantity " required />
                                        </td>

                                    </tr>
                                    <tr>
                                        <th><input type="submit" name="raw_add" value="Add" /></th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
		echo "<script>";
		echo "var rcSelect=document.getElementById('raw_cat');";
		echo "for(var i,j=0;i=rcSelect.options[j];j++){
				if(i.value=='".$_POST['c_slct']."'){
					rcSelect.selectedIndex=j;
					break;
				}
			}";
		echo "</script>";
	?>
</body>

</html>