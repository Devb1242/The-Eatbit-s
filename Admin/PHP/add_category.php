<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <title>The Eatbit's-Add Product Category</title>
        <link rel="icon" href="images/icons/favicon.ico" type="image/icon type">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="robots" content="index,follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="../CSS/adminStyle.css" />
        <script src="../JS/ajaxLink.js"></script>
        <script src="../JS/jqueryLink.js"></script>
    </head>

    <body>
        <?php 
        include "connection.php";
        if(isset($_POST['c_add']))
        {
            $str="select * from info_category where c_name='".$_POST['c_name']."'";
			$qry=mysqli_query($conn,$str);
			if(mysqli_num_rows($qry)>0)
			{
				echo "<script>alert('Category Already Exists');</script>";
			}
            else
            {
                $str1="insert into info_category (c_name,c_status) values('".$_POST['c_name']."',1)";
                $qry1=mysqli_query($conn,$str1);
            }
        }
        if(isset($_POST['sc_add']))
        {
            $str2="select * from info_sub_cat where sc_name='".$_POST['sc_name']."'  and cat_id=".$_POST['c_slct'];
			$qry2=mysqli_query($conn,$str2);
			if(mysqli_num_rows($qry2)>0)
			{
				echo "<script>alert('Sub-Category Already Exists');</script>";
			}
            else
            {
                $str3="insert into info_sub_cat (sc_name,sc_status,cat_id) values('".$_POST['sc_name']."',1,".$_POST['c_slct'].")";
                $qry3=mysqli_query($conn,$str3);
            }
        }
    ?>
        <div class="content" id="">
            <div class="left_side">
                <?php
				include "header.php";
			?>
            </div>
            <div class="right_side" id="">
                <?php
				include "header2.php";
			?>

                <div class="path">
                    <div class="text">
                        <a href="category.php"><img src="images/icons/category2.png" />CATEGORY</a>
                        <b>&nbsp/&nbsp</b>
                        <a href="add_category.php" style="color:gray;">ADD NEW CATEGORY</a>
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
                                                <h2>Add New Category</h2>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="c_name" placeholder="Enter a Category"
                                                    required />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><input type="submit" name="c_add" value="Add" /></th>
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
                                                <h2>Add New Sub-Categories</h2>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td><select name="c_slct">
                                                    <option value="">------</option>
                                                    <?php
                                        $str1="select * from info_category where c_status=1";
                                        $qry1=mysqli_query($conn,$str1);
                                        while($res=mysqli_fetch_assoc($qry1))
                                        {
                                            echo "<option value='".$res['cat_id']."'>".$res['c_name']."</option>";
                                        }
                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="sc_name" placeholder="Enter a Sub-Category"
                                                    required />
                                            </td>

                                        </tr>
                                        <tr>
                                            <th><input type="submit" name="sc_add" value="Add" /></th>
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