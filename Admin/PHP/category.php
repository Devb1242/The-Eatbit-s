<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <title>The Eatbit's-Manage Category</title>
        <link rel="icon" href="images/icons/favicon.ico" type="image/icon type">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="robots" content="index,follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="../CSS/adminStyle.css" />
        <script src="../JS/validation.js"></script>
        <script src="../JS/sweetalert.js"></script>
        <script src="../JS/ajaxLink.js"></script>
        <script src="../JS/jqueryLink.js"></script>
    </head>

    <body>
        <?php
        if(isset($_POST['c_dlt']))
        {
            include "connection.php";
			$str5="select * from info_sub_cat where cat_id=".$_POST['c_dlt'];
			$qry5=mysqli_query($conn,$str5);
			$check=0;
			if(mysqli_num_rows($qry5)<=0)
			{
				$check=1;		
			}
			else
			{
				while($res5=mysqli_fetch_assoc($qry5))
				{
					$str6="select * from info_product where sc_id=".$res5['sc_id'];
					$qry6=mysqli_query($conn,$str6);
					if(mysqli_num_rows($qry6)>0)
					{
						echo "<script>swal('Unsuccessfull','Product exist in this category','error');</script>";
						$check=0;
						break;
					}
					else
					{
						$check=1;
					}
				}
			}
			
			
			if($check==1)
			{
				$str2="delete from info_category where cat_id=".$_POST['c_dlt'];
				$qry2=mysqli_query($conn,$str2);
				$str7="delete from info_sub_cat where cat_id=".$_POST['c_dlt'];
				$qry7=mysqli_query($conn,$str7);
				mysqli_close($conn); 
				echo "<script>swal('Successfull','Category deleted','success');</script>";
					
			}
             
        }
        if(isset($_POST['c_status']))
        {
            include "connection.php";   
            $str3="select * from info_category where cat_id=".$_POST['c_status'];
            $qry3=mysqli_query($conn,$str3);
            $res3=mysqli_fetch_assoc($qry3);
            if($res3['c_status']==1)
            {
                $str4="update info_category set c_status=0 where cat_id=".$_POST['c_status'];
            }
            else
            {
                $str4="update info_category set c_status=1 where cat_id=".$_POST['c_status'];
             
            }
            $qry4=mysqli_query($conn,$str4);   
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
                    </div>
                    <div class="btn">
                        <a href="add_category.php"><img src="images/icons/plus.png" />CATEGORY</a>
                    </div>
                </div>
                <div class="main">
                    <?php
                     if(isset($_POST['c_edit']))
                    {
                        $_SESSION['cat_id']=$_POST['c_edit'];
                        echo "<script>window.location.href='edit_category.php';</script>";
                    }
                ?>
                    <form method="POST">
                        <div class="c_data">
                            <?php 
                    include "connection.php";
                    $str="select * from info_category";
                    $qry=mysqli_query($conn,$str);
                    while($res=mysqli_fetch_assoc($qry))
                    {
                        $str1="select * from info_sub_cat where cat_id=".$res['cat_id'];
                        $qry1=mysqli_query($conn,$str1);

                        echo "<div class='cat'>
                                <div class='card'>
                                    <div class='card2'>
                                        <h2>".$res['c_name']."</h2>
                                        <table>
                                            <tr>
                                             <th>Sub-Category</th>
                                             <th>Products</th>
                                             </tr>
                                            ";
                                            while($res1=mysqli_fetch_assoc($qry1))
                                            {
                                                $str8="select * from info_product where sc_id=".$res1['sc_id'];
                                                $qry8=mysqli_query($conn,$str8);
                                                $res8=mysqli_num_rows($qry8);
                                                echo "<tr>";
                                                echo "<td>".$res1['sc_name']."</td>";
                                                echo "<td>".$res8."</td>";
                                                echo "</tr>";
                                            }
                                            echo "
                                        </table>
                                        
                                        <div class='action_btn'>
                                            <button name='c_edit' value='".$res['cat_id']."' class='edit'><img src='images/icons/edit.png'/>Edit</button>";
                                            if($res['c_status']==1)
                                            {
                                                echo "<div class='active_btn'>
                                                        <label class='switch'>
                                                            <input type='checkbox' id='DMcheck' checked onclick='statusBtn(".$res['cat_id'].")' />
                                                            <span class='slider'></span>
                                                        </label>
                                                    </div>";
                                            }
                                            else
                                            {
                                                echo "<div class='active_btn'>
                                                        <label class='switch'>
                                                            <input type='checkbox' id='DMcheck' onclick='statusBtn(".$res['cat_id'].")' />
                                                            <span class='slider'></span>
                                                        </label>
                                                    </div>";
                                            }
                                          echo "<button class='delete' name='c_dlt' value='".$res['cat_id']."'><img src='images/icons/dlt_btn.png'/> Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>";
                    }
                ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script>
        function statusBtn(id) {
            var id = id;
            $.ajax({
                url: "AJAX/toggle.php",
                type: "post",
                data: {
                    cat_id: id
                }
            });
        }
        </script>
    </body>


</html>