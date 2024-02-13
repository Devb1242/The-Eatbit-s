<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <title>The Eatbit's-Setting</title>
        <link rel="icon" href="images/icons/favicon.ico" type="image/icon type">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="robots" content="index,follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="../CSS/adminStyle.css" />
        <link rel="stylesheet" type="text/css" href="../CSS/dashboard.css" />
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
			
				if(isset($_POST['pr_slct1']))
				{
					$str1="update pr_fav set p_id=".$_POST['pr_slct1']." where fav_id=1";
					$qry1=mysqli_query($conn,$str1);
				}
				
				if(isset($_POST['pr_slct2']))
				{
					$str2="update pr_fav set p_id=".$_POST['pr_slct2']." where fav_id=2";
					$qry2=mysqli_query($conn,$str2);
				}
				
				if(isset($_POST['fav_edt']))
				{
					$fav_dtl=$_POST['fav_dtl'];
					$fav_bg_clr=$_POST['fav_bg_clr'];
					
					$str14="update pr_fav set details='".$fav_dtl."', bg_color='".$fav_bg_clr."' where fav_id=".$_POST['fav_edt'];
					$qry14=mysqli_query($conn,$str14);
				}
			?>

                <div class="pr_popup" id="pr_popup1">
                    <button style="margin-left:95%;" onclick="popCl()">X</button>
                    <h2>Select product for fav-1</h2>
                    <table>
                        <?php
					$str="select DISTINCT p_name,p_img,p_id from info_product";
					$qry=mysqli_query($conn,$str);
					while($res=mysqli_fetch_assoc($qry))
					{
						echo "<tr>";
						echo "<td>";
						echo "<img src='images/product image/".$res['p_img']."' />";
						echo "</td>";
						echo "<td>";
						echo $res['p_name'];
						echo "</td>";
						echo "<td>";
						echo "<form method='POST'><button name='pr_slct1' value='".$res['p_id']."'>Select</button></form>";
						echo "</td>";
						echo "</tr>";
					}
				?>
                    </table>
                </div>

                <div class="pr_popup" id="pr_popup2">
                    <button style="margin-left:95%;" onclick="popCl()">X</button>
                    <h2>Select product for fav-2</h2>
                    <table>
                        <?php
					$str="select DISTINCT p_name,p_img,p_id from info_product";
					$qry=mysqli_query($conn,$str);
					while($res=mysqli_fetch_assoc($qry))
					{
						echo "<tr>";
						echo "<td>";
						echo "<img src='images/product image/".$res['p_img']."' />";
						echo "</td>";
						echo "<td>";
						echo $res['p_name'];
						echo "</td>";
						echo "<td>";
						echo "<form method='POST'><button name='pr_slct2' value='".$res['p_id']."'>Select</button></form>";
						echo "</td>";
						echo "</tr>";
					}
				?>
                    </table>
                </div>

                <div class="path">
                    <div class="text">
                        <a href="setting.php"><img src="images/icons/setting2.png" />SETTING</a>
                    </div>
                </div>
                <div class="main">
                    <div class="container">



                        <h1 style="font-family:verdana; color:gray; padding:20px;">User Side Modifications</h1>


                        <div class="row">
                            <?php
							$str12="select * from pr_fav";
							$qry12=mysqli_query($conn,$str12);
							$f=1;
							while($res12=mysqli_fetch_assoc($qry12))
							{
								$str13="select * from info_product where p_id=".$res12['p_id'];
								$qry13=mysqli_query($conn,$str13);
								$res13=mysqli_fetch_assoc($qry13);
						?>
                            <form method="POST">
                                <div class="d2">
                                    <label class="flash2">Favorite product <?=$f?></label></br>
                                    <table>
                                        <tr onclick="popUp<?=$f?>()" style="cursor:pointer">
                                            <td rowspan=3 style="padding:20px;box-sizing:border-box;"><img
                                                    src="images/product image/<?=$res13['p_img']?>"
                                                    style="width:60%;" />
                                            </td>
                                            <th style="text-align:left">
                                                Name: <?=$res13['p_name']?>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>Details: <textarea class="fav_dtl" name="fav_dtl" cols="30"
                                                    rows="6"><?=$res12['details']?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td>background-color: <input type="color" value="<?=$res12['bg_color']?>"
                                                    name="fav_bg_clr" /></td>
                                        </tr>
                                    </table>
                                    <button class="fav_edt_btn" value="<?=$res12['fav_id']?>"
                                        name="fav_edt">Update</button>
                                </div>
                            </form>
                            <?php
							$f++;
							}
						?>
                        </div>

                        <div class="row">
                            <div class="d">
                                <table style="width:100%;">
                                    <tr style="text-align:left;">
                                        <th>Sr no</th>
                                        <th>Mart Logo</th>
                                        <th>Description</th>
                                        <th>BG Image</th>
                                        <th>BG Color</th>
                                        <th>Edit</th>
                                    </tr>
                                    <?php
								$str3="select * from pr_mart";
								$qry3=mysqli_query($conn,$str3);
								$m=1;
								while($res3=mysqli_fetch_assoc($qry3))
								{
									$str4="select * from info_product where p_id=".$res3['p_id'];
									$qry4=mysqli_query($conn,$str4);
									$res4=mysqli_fetch_assoc($qry4);
							?>
                                    <tr>
                                        <td><?=$m?></td>
                                        <td><img src="../../User/PHP/images/icons/<?=$res3['mart_img']?>" width="50%" />
                                        </td>
                                        <td><?=$res3['details']?></td>
                                        <td><img src="images/product image/<?=$res4['p_img']?>" width="50%" /></td>
                                        <td><input type="color" value="<?=$res3['bg_color']?>" name="" disabled /></td>
                                        <td>
                                            <form method="POST" action="edit_mart.php"><button class="fav_edt_btn"
                                                    value="<?=$res3['mart_id']?>" name="edt_mart">Edit</button></form>
                                        </td>
                                    </tr>
                                    <?php	
								$m++;
								}
							?>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <script>
        var pop1 = document.getElementById('pr_popup1');
        var pop2 = document.getElementById('pr_popup2');

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

        function popUp2() {
            pop2.style.visibility = "visible";
            pop2.style.opacity = "1";
        }
        </script>
    </body>

</html>