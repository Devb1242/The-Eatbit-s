<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Edit Raw Category</title>
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
                    <a href="view_category.php">VIEW CATEGORY</a>
                    <b>&nbsp/&nbsp</b>
                    <a href="edit_raw_category.php" style="color:white;">EDIT CATEGORY</a>
                </div>
            </div>
            <div class="main">
                <?php
                    if(isset($_POST['raw_cat_edit']))
                    {
                        include "connection.php";
                        $str9="select * from raw_cat_materials where raw_cat_name='".$_POST['raw_cat_name']."'";
                        $qry9=mysqli_query($conn,$str9);
                        if(mysqli_num_rows($qry9)>0)
                        {
                            echo "<script>alert('Raw Category Name Already Exists');</script>";
                        }
                        else
                        {
                            $str3="update raw_cat_materials set raw_cat_name='".$_POST['raw_cat_name']."' where raw_cat_id=".$_SESSION['raw_cat_id'];
                            $qry3=mysqli_query($conn,$str3);
                        }
                    }
                    if(isset($_POST['raw_edit']))
                    {
                        $str4="select * from raw_materials where raw_name='".$_POST['raw_name']."' and raw_cat_id=".$_SESSION['raw_cat_id'];
                        $qry4=mysqli_query($conn,$str4);
                        if(mysqli_num_rows($qry4)>0)
                        {
                            echo "<script>alert('Raw Material Name Already Exists');</script>";
                        }
                        else
                        {
                            $str5="update raw_materials set raw_name='".$_POST['raw_name']."' where raw_id=".$_POST['raw_slct'];
                            $qry5=mysqli_query($conn,$str5);
                        }
                    }
                ?>
                <?php
                    include "connection.php";
                    $raw_cat_id=$_SESSION['raw_cat_id'];

                    $str="select * from raw_cat_materials where raw_cat_id=".$raw_cat_id;
                    $qry=mysqli_query($conn,$str);
                    $res=mysqli_fetch_assoc($qry);
                ?>
                <div class="c_design">
                    <form method="POST" onsubmit="return validate()">
                        <div class="c_form">
                            <div class="form">

                                <table>
                                    <tr>
                                        <th class="form_head">
                                            <h2>Edit Raw Material Category</h2>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="raw_cat_name"
                                                value="<?php echo $res['raw_cat_name']?>" id="check" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><input type="submit" name="raw_cat_edit" value="UPDATE" /></th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    function validate() {
        var c1 = document.getElementById('check').value;
        if (c1 == "<?php echo $res['raw_cat_name']?>") {
            alert("Raw Material Category Not Changed");
            return false;
        } else {
            return true;
        }
    }
    </script>
</body>

</html>