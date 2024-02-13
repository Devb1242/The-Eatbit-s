<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>View Category</title>
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
                <div class="text">
                    <a href="raw.php"><img src="images/icons/raw materials2.png" />RAW MATERIALS</a>
                    <b>&nbsp/&nbsp</b>
                    <a href="view_category.php" style="color:white;">VIEW RAW CATEGORY</a>
                </div>
            </div>
            <div class="main">
                <?php
                    if(isset($_POST['raw_cat_edit']))
                    {
                        $_SESSION['raw_cat_id']=$_POST['raw_cat_edit'];
                        echo "<script>window.location.href='edit_raw_category.php';</script>";
                    }
                    if(isset($_POST['raw_cat_dlt']))
                    {
                        $str1="select * from raw_materials where raw_cat_id=".$_POST['raw_cat_dlt'];
                        $qry1=mysqli_query($conn,$str1);
                        if(mysqli_num_rows($qry1)>0)
                        {
                            echo "<script>alert('Raw Material Exists in this Category');</script>";
                }
                else
                {
                $str2="delete from raw_cat_materials where raw_cat_id=".$_POST['raw_cat_dlt'];
                $qry2=mysqli_query($conn,$str2);
                }
                }
                ?>
                <form method="post">
                    <div class="tbl_head">
                        <h3>Raw Material Category</h3>
                    </div>
                    <div class="tbl">
                        <table>
                            <tr>
                                <th>Sr No.</th>
                                <th>Raw Category Name</th>
                                <th>Raw Materials</th>
                                <th>Action</th>
                            </tr>

                            <?php
                                include "connection.php";
                                $str="select * from raw_cat_materials";
                                $qry=mysqli_query($conn,$str);
                                $i=1;
                          
                                while($res=mysqli_fetch_assoc($qry))
                                {
                                    $str3="select raw_id from raw_materials where raw_cat_id=".$res['raw_cat_id']." order by raw_id";
                                    $qry3=mysqli_query($conn,$str3);
                                    $res3=mysqli_num_rows($qry3);
                                    echo "<tr>" ;
                                    echo "<td>".$i."</td>";
                                    echo "<td>".$res['raw_cat_name']."</td>";
                                    echo "<td>".$res3."</td>";
                                    echo "<td class='action'><button name='raw_cat_edit' value=".$res['raw_cat_id']." class='edit_btn2'><img src='images/icons/edit.png'/></button> <button name='raw_cat_dlt' value='".$res['raw_cat_id']."' class='dlt_btn2' ><img src='images/icons/dlt_btn.png' /></button></td>";

                                    echo "</tr>";
                                    $i=$i+1;
                                }			
						    ?>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>