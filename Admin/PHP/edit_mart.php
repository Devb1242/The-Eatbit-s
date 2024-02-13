<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <title>The Eatbit's-Edit Mart</title>
        <link rel="icon" href="images/icons/favicon.ico" type="image/icon type">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="robots" content="index,follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="../CSS/dashboard.css" />
        <link rel="stylesheet" type="text/css" href="../CSS/adminStyle.css" />
        <script src="../JS/validation.js"></script>
        <script src="../JS/sweetalert.js"></script>
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

                <?php
				
				if(isset($_POST['sbt']))
				{
						$img=$_FILES['img'];
						$img_name=$img['name'];
						$img_ext=explode('.',$img_name);
						$temp=$img['tmp_name'];
						
						$check=strtolower(end($img_ext));
						
						$ext=array('png','jpg','jpeg');
						
						if(in_array($check,$ext))
						{
							$dest='../../User/PHP/images/icons/'.$img_name;
							move_uploaded_file($temp,$dest);
						}

                        if($img_name!="")
                        {
                            $str5="update pr_mart set mart_img='".$img_name."' where mart_id=".$_SESSION['mart_id'];
                            $qry5=mysqli_query($conn,$str5);
                        }
					
					
					$str4="update pr_mart set bg_color='".$_POST['bg_color']."' , details='".$_POST['dtls']."' where mart_id=".$_SESSION['mart_id'];
					$qry4=mysqli_query($conn,$str4);
				}
				
				if(isset($_POST['pr_slct1']))
				{
					$str1="update pr_mart set p_id=".$_POST['pr_slct1']." where mart_id=".$_SESSION['mart_id'];
					$qry1=mysqli_query($conn,$str1);
				}
				
				if(isset($_POST['edt_mart']))
				{
					$_SESSION['mart_id']=$_POST['edt_mart'];
				}
				
				$str="select * from pr_mart where mart_id=".$_SESSION['mart_id'];
				$qry=mysqli_query($conn,$str);
				$res=mysqli_fetch_assoc($qry);
				
				$str2="select * from info_product where p_id=".$res['p_id'];
				$qry2=mysqli_query($conn,$str2);
				$res2=mysqli_fetch_assoc($qry2);
			?>

                <div class="pr_popup" id="pr_popup1">
                    <button style="margin-left:95%;" onclick="popCl()">X</button>
                    <h2>Select product for fav-1</h2>
                    <table>
                        <?php
					$str3="select DISTINCT p_name,p_img,p_id from info_product";
					$qry3=mysqli_query($conn,$str3);
					while($res3=mysqli_fetch_assoc($qry3))
					{
						echo "<tr>";
						echo "<td>";
						echo "<img src='images/product image/".$res3['p_img']."' />";
						echo "</td>";
						echo "<td>";
						echo $res3['p_name'];
						echo "</td>";
						echo "<td>";
						echo "<form method='POST'><button name='pr_slct1' value='".$res3['p_id']."'>Select</button></form>";
						echo "</td>";
						echo "</tr>";
					}
				?>
                    </table>
                </div>

                <div class="path">
                    <div class="text">
                        <a href="setting.php"><img src="images/icons/setting2.png" />SETTING</a>
                        <b>&nbsp/&nbsp</b>
                        <a href="edit_mart.php" style="color:gray;">EDIT MART</a>
                    </div>
                </div>
                <div class="main">
                    <form method="POST" enctype="multipart/form-data">

                        <div class="form">

                            <table>
                                <tr>
                                    <th class="form_head">
                                        <h2>Edit Mart</h2>
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <div class="u_img">
                                            <div class="m_icon">
                                                <img src="../../User/PHP/images/icons/<?=$res['mart_img']?>"
                                                    onclick="triggerClick()" id="placeholderimg" />
                                                <input type="file" name="img" id="profileimg"
                                                    onchange="displayimg(this)" />
                                            </div>
                                        </div>

                                    </th>
                                </tr>
                                <tr>
                                    <td><img src="images/product image/<?=$res2['p_img']?>"
                                            style="width:150px;margin-left:50%;transform:translate(-50%,0%);"
                                            onclick="popUp1()"></td>
                                </tr>
                                <tr>
                                    <td><input type="color" name="bg_color" placeholder="Enter name"
                                            title="Background Color" value="<?=$res['bg_color']?>" required /></td>
                                </tr>
                                <tr>
                                    <td><textarea placeholder="Enter details"
                                            name="dtls"><?=$res['details']?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th><input type="submit" name="sbt" value="Update" /></th>
                                </tr>
                            </table>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
        var pop1 = document.getElementById('pr_popup1');

        function popCl() {
            pop1.style.visibility = "hidden";
            pop1.style.opacity = "0";

            pop2.style.visibility = "hidden";
            pop2.style.opacity = "0";
        }

        function popUp1() {
            pop1.style.visibility = "visible";
            pop1.style.opacity = "1";
        }
        </script>


    </body>

</html>