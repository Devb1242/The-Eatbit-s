<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <title>The Eatbit's-Add Admin</title>
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
				$dest='images/user image/Admin/'.$img_name;
				move_uploaded_file($temp,$dest);
			}

			include "connection.php";
			$str3="select * from info_admin where a_email='".$_POST['a_email']."'";
			$qry3=mysqli_query($conn,$str3);
			if(mysqli_num_rows($qry3)>0)
			{
				echo "<script>swal('Admin Already Exist', '', 'error');</script>";
			}
			else
			{
				$str1="INSERT INTO info_admin (a_name,a_email,a_pwd,a_status,a_img) values('".$_POST['a_name']."','".$_POST['a_email']."','".$_POST['pwd']."',0,'".$img_name."')";
				$qry1=mysqli_query($conn,$str1);
				if($qry1)
				{
					echo "<script>swal('New Admin Inserted', '', 'success');</script>";
				}
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
                        <a href="admin.php"><img src="images/icons/admin1.png" />ADMIN</a>
                        <b>&nbsp/&nbsp</b>
                        <a href="add_admin.php" style="color:gray;">ADD NEW ADMIN</a>
                    </div>
                </div>
                <div class="main">
                    <form method="POST" enctype="multipart/form-data">

                        <div class="form">

                            <table>
                                <tr>
                                    <th class="form_head">
                                        <h2>Add New Admin</h2>
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <div class="u_img">
                                            <div class="u_icon">
                                                <img src="images/icons/user.png" onclick="triggerClick()"
                                                    id="placeholderimg" />
                                                <input type="file" name="img" id="profileimg"
                                                    onchange="displayimg(this)" />
                                            </div>
                                        </div>

                                    </th>
                                </tr>
                                <tr>
                                    <td><input type="text" name="a_name" placeholder="Enter name" required /></td>
                                </tr>
                                <tr>
                                    <td><input type="email" name="a_email" placeholder="Enter email" required /></td>
                                </tr>
                                <tr>
                                    <td><input type="password" name="pwd" id="pas" onchange="check()"
                                            placeholder="Enter password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                            title="Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                            required /></td>
                                </tr>
                                <tr>
                                    <td><input type="password" name="c_pwd" id="cnpas" onkeyup="check()"
                                            placeholder="Confirm password" required /></td>
                                </tr>
                                <tr>
                                    <th><input type="submit" name="sbt" value="Add" /></th>
                                </tr>
                            </table>

                        </div>
                    </form>
                </div>
            </div>
        </div>




    </body>

</html>