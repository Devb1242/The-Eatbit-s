<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <title>The Eatbit's-Add Manager</title>
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
				$dest='../../Manager/PHP/images/manager image/'.$img_name;
				move_uploaded_file($temp,$dest);
			}

			include "connection.php";
			$str3="select * from info_manager where m_email='".$_POST['m_email']."'";
			$qry3=mysqli_query($conn,$str3);
			if(mysqli_num_rows($qry3)>0)
			{
				echo "<script>swal('Manager Already Exist', '', 'error');</script>";
			}
			else
			{
                $str4="select * from info_manager where m_phone='".$_POST['m_phone']."'";
                $qry4=mysqli_query($conn,$str4);
                if(mysqli_num_rows($qry4)>0)
                {
                    echo "<script>swal('Phone Number Already Exist', '', 'error');</script>";
                }
                else
                {
                    $str1="INSERT INTO info_manager (m_img,m_name,m_email,m_pwd,m_gender,m_phone,m_address,m_city,m_status) values('".$img_name."','".$_POST['m_name']."','".$_POST['m_email']."','".$_POST['pwd']."','".$_POST['m_gender']."','".$_POST['m_phone']."','".$_POST['m_address']."',".$_POST['m_city'].",0)";
                    $qry1=mysqli_query($conn,$str1);
                    if($qry1)
                    {
                        echo "<script>swal('New Manager Inserted', '', 'success');</script>";
                    }
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
                        <a href="manager.php"><img src="images/icons/manager2.png" />MANAGER</a>
                        <b>&nbsp/&nbsp</b>
                        <a href="add_manager.php" style="color:gray;">ADD NEW MANAGER</a>
                    </div>
                </div>
                <div class="main">
                    <form method="POST" enctype="multipart/form-data">

                        <div class="form">

                            <table>
                                <tr>
                                    <th class="form_head">
                                        <h2>Add New Manager</h2>
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
                                    <td><input type="text" name="m_name" placeholder="Enter name" required />
                                        <input type="email" name="m_email" placeholder="Enter email" required />
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="password" name="pwd" id="pas" onchange="check()"
                                            placeholder="Enter password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                            title="Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                            required />
                                        <input type="password" name="c_pwd" id="cnpas" onkeyup="check()"
                                            placeholder="Confirm password" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="m_gender" required>
                                            <option value="">Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <input type="text" name="m_phone" placeholder="Enter Contact Number"
                                            pattern="[0-9]{10}" required />
                                    </td>
                                </tr>
                                <tr>
                                    <td><textarea name="m_address" placeholder="Enter Address" required></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td><select id="state" onchange="change_state()" required>
                                            <option value="">Select State</option>
                                            <?php
                                            $str2="select * from state";
                                            $qry2=mysqli_query($conn,$str2);
                                            while($res2=mysqli_fetch_assoc($qry2))
                                            {
                                                echo "<option value='".$res2['state_id']."' >".$res2['state_name']."</option>";
                                            }
                                        ?>
                                        </select>
                                        <select name="m_city" id="city" required>
                                            <option value="">Select City</option>
                                        </select>
                                    </td>
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
        <script type="text/javascript">
        function change_state() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "state-city_ajax.php?stateid=" + document.getElementById("state").value, false);
            xmlhttp.send(null);
            document.getElementById("city").innerHTML = xmlhttp.responseText;
        }
        </script>
    </body>

</html>