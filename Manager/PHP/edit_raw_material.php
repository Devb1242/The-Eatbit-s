<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Edit Raw Material</title>
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
                <div class="edit_text">
                    <a href="raw.php"><img src="images/icons/raw materials2.png" />RAW MATERIALS</a>
                    <b>&nbsp/&nbsp</b>
                    <a href="edit_raw_material.php" style="color:white;">EDIT RAW MATERIAL</a>
                </div>
            </div>
            <div class="main">
                <?php
                    if(isset($_POST['raw_updt']))
                    {
                        include "connection.php";
                        $str9="select * from raw_materials where raw_name='".$_POST['raw_name']."' and raw_cat_id=".$_POST['raw_slct'];
                        $qry9=mysqli_query($conn,$str9);
                        if(mysqli_num_rows($qry9)>0)
                        {
                            echo "<script>alert('Raw Material Name Already Exists');</script>";
                        }
                        else
                        {
                            $str3="update raw_materials set raw_name='".$_POST['raw_name']."', raw_cat_id='".$_POST['raw_slct']."' where raw_id=".$_SESSION['raw_id'];
                            $qry3=mysqli_query($conn,$str3);
                        }
                    }
                ?>
                <div class="c_design">
                    <form method="POST">
                        <div class="c_form">
                            <div class="form">

                                <table>
                                    <tr>
                                        <th class="form_head">
                                            <h2>Edit Raw Material</h2>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td><select name="raw_slct">
                                                <option value="">------</option>
                                                <?php
                                                    $str2="select * from raw_materials where raw_id=".$_SESSION['raw_id'];
                                                    $qry2=mysqli_query($conn,$str2);
                                                    $res2=mysqli_fetch_assoc($qry2);

                                                    $str1="select * from raw_cat_materials";
                                                    $qry1=mysqli_query($conn,$str1);
                                                    while($res1=mysqli_fetch_assoc($qry1))
                                                    {
                                                        if($res1['raw_cat_id']==$res2['raw_cat_id'])
                                                        {
                                                             echo "<option value='".$res1['raw_cat_id']."' selected >".$res1['raw_cat_name']."</option>";
                                                        }
                                                       else
                                                       {
                                                             echo "<option value='".$res1['raw_cat_id']."' >".$res1['raw_cat_name']."</option>";
                                                       }

                                                    }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="raw_name" value="<?php echo $res2['raw_name']?>"
                                                required />
                                        </td>

                                    </tr>
                                    <tr>
                                        <th><input type="submit" name="raw_updt" value="UPDATE" /></th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>