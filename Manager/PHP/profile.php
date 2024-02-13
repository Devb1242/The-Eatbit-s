<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Manager Profile</title>
    <link rel="icon" href="images/icons/favicon.ico" type="image/icon type">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="index,follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../CSS/managerStyle.css" />
    <script src="../JS/validation.js"></script>
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
                    <a href="profile.php">MY PROFILE</a>
                </div>
            </div>
            <div class="main">
                <?php 
                include "connection.php";
                if(isset($_POST['p_updt']))
                 {
                    $img=$_FILES['upld_img'];
                    $img_name=$img['name'];
                    $img_ext=explode('.',$img_name);
                    $temp=$img['tmp_name'];
                    
                    $check=strtolower(end($img_ext));
                    
                    $ext=array('png','jpg','jpeg');
                    
                    if(in_array($check,$ext))
                    {
                        $dest='images/manager image/'.$img_name;
                        move_uploaded_file($temp,$dest);
                    }
                    if($img_name=="")
                    {
                     $str1="update info_manager set m_name='".$_POST['p_name']."', m_phone='".$_POST['p_phone']."', m_address='".$_POST['p_address']."', m_city=".$_POST['sc_id']." where m_id=".$_SESSION['m_id'];
                     }
                    else
                    {
                       $str1="update info_manager set m_name='".$_POST['p_name']."', m_img='".$img_name."' where m_id=".$_SESSION['m_id'];
                    }
                       $qry1=mysqli_query($conn,$str1);
                       echo "<script>window.location.href='profile.php';</script>";
                 }
                 if(isset($_POST['updt_pwd']))
                 {
                    $str2="select * from info_manager where m_id=".$_SESSION['m_id'];
                    $qry2=mysqli_query($conn,$str2);
                    $res2=mysqli_fetch_assoc($qry2);
                    if($_POST['p_pas']==$res2['m_pwd'])
                    {
                        if($_POST['p_pas']==$_POST['p_npas'])
                        {
                            echo "<script>alert('Old Password Cannot be same as New Password')</script>";
                        }
                        else
                        {
                            $str3="update info_manager set m_pwd='".$_POST['p_npas']."' where m_id=".$_SESSION['m_id'];
                            $qry3=mysqli_query($conn,$str3);
                        }
                    }
                    else
                    {
                    echo "<script>alert('Old password not matched');</script>";
                    }						 
                 }
                 $str="select * from info_manager where m_id=".$_SESSION['m_id'];
                 $qry=mysqli_query($conn,$str);
                 $res=mysqli_fetch_assoc($qry); 
             ?>
                <form method="POST" enctype="multipart/form-data">
                    <div class="profile">
                        <div class="pwd_admin">
                            <div class="p_admin">
                                <h2>Profile Information</h2>
                                <div class="p_info">
                                    <label>Name</label></br>
                                    <img src="images/icons/p_name.png" />
                                    <input type="text" name="p_name" value="<?php echo $res['m_name'];?>" /></br>

                                    <label>Designation</label></br>
                                    <img src="images/icons/p_designation.png" />
                                    <input type="text" name="p_designation" readonly value="Manager" /></br>

                                    <label>Email</label></br>
                                    <img src="images/icons/p_email.png" />
                                    <input type="text" name="p_email" readonly
                                        value="<?php echo $res['m_email']; ?>" /></br>

                                    <label>Phone No.</label></br>
                                    <img src="images/icons/p_phone.png" />
                                    <input type="text" name="p_phone" value="<?php echo $res['m_phone']; ?>" /></br>

                                    <label>Address</label></br>
                                    <img src="images/icons/p_address.png" />
                                    <input type="text" name="p_address" value="<?php echo $res['m_address']; ?>" /></br>

                                    <select id="state" onChange="change_state()">
                                        <option>Select State</option>
                                        <?php
                                            $str4="select * from state";
                                            $qry4=mysqli_query($conn,$str4);
                                            $str5="select * from city where city_id=".$res['m_city'];
                                            $qry5=mysqli_query($conn,$str5);
                                            $res5=mysqli_fetch_assoc($qry5);
                                            while($res4=mysqli_fetch_assoc($qry4))
                                            {
                                                if($res4['state_id']==$res5['state_id'])
                                                {
                                                    echo "<option value='".$res4['state_id']."' selected >".$res4['state_name']."</option>";
                                                }
                                                else
                                                {
                                                    echo "<option value='".$res4['state_id']."'>".$res4['state_name']."</option>";
                                                }
                                                
                                            }
                                        ?>
                                    </select>

                                    <select name="sc_id" id="city">
                                        <option>Select City</option>
                                        <?php
                                            $str6="select * from city where state_id=".$res5['state_id'];
                                            $qry6=mysqli_query($conn,$str6);
                                            while($res6=mysqli_fetch_assoc($qry6))
                                            {
                                                if($res6['city_id']==$res5['city_id'])
                                                {
                                                    echo "<option value='".$res6['city_id']."' selected >".$res6['city_name']."</option>";
                                                }
                                                else
                                                {
                                                    echo "<option value='".$res6['city_id']."'>".$res6['city_name']."</option>";        
                                                }
                                                                                        
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="p_img">
                                    <label>Profile Picture</label>
                                    <div class="upld_img">
                                        <img src="images/manager image/<?php echo $res['m_img']?>"
                                            onclick="triggerClick()" id="placeholderimg" />
                                        <input type="file" name="upld_img" id="profileimg"
                                            onchange="displayimg(this)" />
                                    </div>
                                </div>
                                <div class="p_btn">
                                    <button name="p_updt"> UPDATE<img src="images/icons/save.png" /></button>
                                </div>
                            </div>
                        </div>
                </form>
                <form method="POST" enctype="multipart/form-data">
                    <div class="pwd_admin">
                        <div class="p_admin">
                            <h2>Change Password</h2>
                            <div class="p_info">
                                <label>Old Password</label></br>
                                <img src="images/icons/p_pwd.png" />
                                <input type="password" name="p_pas" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                    title="Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                    required /></br>

                                <label>New Password</label></br>
                                <img src="images/icons/p_pwd.png" />
                                <input type="password" name="p_npas" id="pas"
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                    title="Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                    onchange="check()" required /></br>

                                <label>Confirm Password</label></br>
                                <img src="images/icons/p_pwd.png" />
                                <input type="password" name="p_cnpas" id="cnpas" onkeyup="check()" required /></br>
                            </div>
                            <div class="p_btn">
                                <button name="updt_pwd"> CHANGE PASSWORD<img src="images/icons/save.png" /></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script type="text/javascript">
    function change_state() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "profile_ajax.php?stateid=" + document.getElementById("state").value, false);
        xmlhttp.send(null);
        document.getElementById("city").innerHTML = xmlhttp.responseText;
    }
    </script>
</body>

</html>