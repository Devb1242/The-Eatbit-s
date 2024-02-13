<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <title>The Eatbit's-Edit Category</title>
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
                        <a href="edit_category.php" style="color:gray;">EDIT CATEGORY</a>
                    </div>
                </div>
                <div class="main">
                    <?php
                    if(isset($_POST['c_edit']))
                    {
                        include "connection.php";
                        $str9="select * from info_category where c_name='".$_POST['c_name']."'";
                        $qry9=mysqli_query($conn,$str9);
                        if(mysqli_num_rows($qry9)>0)
                        {
                            echo "<script>alert('Category Already Exists');</script>";
                        }
                        else
                        {
                            $str3="update info_category set c_name='".$_POST['c_name']."' where cat_id=".$_SESSION['cat_id'];
                            $qry3=mysqli_query($conn,$str3);
                        }
                    }
                     if(isset($_POST['edt_sub']))
                    {
                        $txt="txt".$_POST['edt_sub'];
                        $str4="select * from info_sub_cat where sc_name='".$_POST[$txt]."' and cat_id=".$_SESSION['cat_id'];
                        $qry4=mysqli_query($conn,$str4);
                        if(mysqli_num_rows($qry4)>0)
                        {
                            echo "<script>alert('Sub-Category Already Exists');</script>";
                        }
                        else
                        {
                            $txt="txt".$_POST['edt_sub'];
                            $str5="update info_sub_cat set sc_name='".$_POST[$txt]."' where sc_id=".$_POST['edt_sub'];
                            $qry5=mysqli_query($conn,$str5);
                        }
                    }
                    if(isset($_POST['sc_status']))
                    {
                        $str6="select * from info_sub_cat where sc_id=".$_POST['sc_status'];
                        $qry6=mysqli_query($conn,$str6);
                        $res6=mysqli_fetch_assoc($qry6);
                        $str11="select * from info_product where sc_id=".$_POST['sc_status'];
                        $qry11=mysqli_query($conn,$str11);
                        if($res6['sc_status']==1)
                        {

                            $str7="update info_sub_cat set sc_status=0 where sc_id=".$_POST['sc_status'];
                            while($res11=mysqli_fetch_assoc($qry11))
                            {
                                $str10="update info_product set p_status=0 where sc_id=".$_POST['sc_status'];
                                $qry10=mysqli_query($conn,$str10);
                            }
                        }
                        else
                        {
                            $str7="update info_sub_cat set sc_status=1 where sc_id=".$_POST['sc_status'];
                            while($res11=mysqli_fetch_assoc($qry11))
                            {
                                $str10="update info_product set p_status=1 where sc_id=".$_POST['sc_status'];
                                $qry10=mysqli_query($conn,$str10);
                            }
                        }
                        $qry7=mysqli_query($conn,$str7);
                        
                    }
                    if(isset($_POST['dlt_sub']))
                    {
                        $str13="select * from info_product where sc_id=".$_POST['dlt_sub'];
                        $qry13=mysqli_query($conn,$str13);
                        if($res13=mysqli_num_rows($qry13)>=1)
                        {
                            echo "<script>alert('Product Exist ');</script>";
                        }
                        else
                        {
                            $str8="delete from info_sub_cat where sc_id=".$_POST['dlt_sub'];
                            $qry8=mysqli_query($conn,$str8);
                        }
                    } 
                 ?>
                    <?php
                    include "connection.php";
                    $cat_id=$_SESSION['cat_id'];

                    $str="select * from info_category where cat_id=".$cat_id;
                    $qry=mysqli_query($conn,$str);
                    $res=mysqli_fetch_assoc($qry);
                    ?>

                    <div class="c_design">
                        <form method="POST">
                            <div class="c_form">
                                <div class="form">

                                    <table>
                                        <tr>
                                            <th class="form_head">
                                                <h2>EDIT CATEGORY</h2>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Category Name</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="c_name" value="<?php echo $res['c_name'] ?>"
                                                    required />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <input type="submit" name="c_edit" value="Done" />
                                            </th>
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
                                                <h2>EDIT SUB-CATEGORY</h2>
                                            </th>
                                        </tr>
                                        <?php
                                    $str2="select * from info_sub_cat where cat_id=".$cat_id;
                                    $qry2=mysqli_query($conn,$str2);
                                    $i=1;
                                    $str12="select * from info_category where cat_id=".$cat_id;
                                    $qry12=mysqli_query($conn,$str12);
                                     $res12=mysqli_fetch_assoc($qry12);
                                    while($res2=mysqli_fetch_assoc($qry2))
                                    {
                                        echo "<tr><td><label>Sub-Category ".$i."</label></td></tr>";
                                        echo " <tr>
                                                    <td><input type='text' name='txt".$res2['sc_id']."' value='".$res2['sc_name']."' required
                                />
                                </td>
                                </tr>";
                                echo "<tr>
                                        <th>
                                            <div class='btns'>
                                                <button  name='edt_sub' class='edit' value='".$res2['sc_id']."'><img src='images/icons/edt_btn.png' /></button>";
                                                if($res12['c_status']==1)
                                                {
                                                    if($res2['sc_status']==1)
                                                    {
                                                        echo "<button class='active' name='sc_status' value='".$res2['sc_id']."'>Active</button>";
                                                    }
                                                    else
                                                    {
                                                        echo "<button class='deactive' name='sc_status' value='".$res2['sc_id']."'>Deactive</button>";
                                                    }
                                                }
                                                else
                                                {  
                                                    echo "<button class='deactive' name='sc_status' value='".$res2['sc_id']."' disabled >Deactive</button>";
                                                }
                                                
                                                echo "<button  name='dlt_sub' class='delete' value='".$res2['sc_id']."'><img src='images/icons/dlt_btn.png' /></button>
                                            </div>
                                        </th> 
                                    </tr>";
                                $i++;
                                }
                                ?>
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