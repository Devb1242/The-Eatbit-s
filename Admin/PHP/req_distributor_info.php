<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <title>The Eatbit's-Distributor Info</title>
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
                <?php
                if(isset($_POST['accept']))
                {
                    $str6="update info_distributor set d_status=1 where d_id=".$_POST['accept'];
                    $qry6=mysqli_query($conn,$str6);

                    $to=$res['u_email'];
                    $subject="Congratulations Your Application has been Accepted for distributorship of Eatbit's";
                    $txt="Congratulation </br> Your request has been accepted for distributor ship of Eatbit's </br>Thanks for your request. </br>We will contact you very soon, </br>For any query please contact our manager Ayush Patel : 9898195857 ";
                    $header="From: eabitsfoods@gmail.com";
                    mail($to,$subject,$txt,$header);

                    echo "<script>window.location.href='distributor_request.php';</script>";
                }

                if(isset($_POST['reject']))
                {
                    $str6="update info_distributor set d_status=2 where d_id=".$_POST['reject'];
                    $qry6=mysqli_query($conn,$str6);

                    $to=$res['u_email'];
                    $subject="Sorry your application is rejected for distributorship of Eatbit's cause of some reason";
                    $txt="Sorry </br> Your request has been rejected for distributor ship of Eatbit's </br>Thanks for your request. </br>We will contact you very soon, </br>For any query please contact our manager Ayush Patel : 9898195857 ";
                    $header="From: eabitsfoods@gmail.com";
                    mail($to,$subject,$txt,$header);

                    echo "<script>window.location.href='distributor_request.php';</script>";
                }
            ?>
                <div class="path">
                    <div class="text">
                        <a href="distributor.php"><img src="images/icons/distributor2.png" />DISTRIBUTOR</a>
                        <b>&nbsp/&nbsp</b>
                        <a href="distributor_request.php" style="color:gray;">REQUESTS</a>
                    </div>
                </div>
                <div class="main">
                    <?php
                    include "connection.php";
                    $str="select * from info_distributor where d_id=".$_SESSION['d_id'];
                    $qry=mysqli_query($conn,$str);
                    $res=mysqli_fetch_assoc($qry); 

                    $str2="select * from city where city_id=".$res['d_city']; 
                    $qry2=mysqli_query($conn,$str2);
                    $res2=mysqli_fetch_assoc($qry2);

                    $str3="select * from state where state_id=".$res2['state_id'];
                    $qry3=mysqli_query($conn,$str3);
                    $res3=mysqli_fetch_assoc($qry3);

                    $str4="select * from city where city_id=".$res['ag_city'];
                    $qry4=mysqli_query($conn,$str4);
                    $res4=mysqli_fetch_assoc($qry4);

                    $str5="select * from state where state_id=".$res4['state_id'];
                    $qry5=mysqli_query($conn,$str5);
                    $res5=mysqli_fetch_assoc($qry5);

                ?>
                    <div class="d_info">
                        <div class="d_info2">
                            <div class="d_info3">
                                <h2>Profile Information</h2>
                                <div class="d_info4">
                                    <table>
                                        <tr>
                                            <td>
                                                <label>Name</label></br>
                                                <img src="images/icons/p_name.png" />
                                                <input type="text" value="<?php echo $res['d_name'];?>" readonly />
                                            </td>
                                            <td>
                                                <label>Email</label></br>
                                                <img src="images/icons/p_email.png" />
                                                <input type="text" readonly value="<?php echo $res['d_email']; ?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="location4">
                                                    <label>Password</label></br>
                                                    <img src="images/icons/p_pwd.png" />
                                                    <input type="text" readonly value="<?php echo $res['d_pwd']?>" />
                                                </div>
                                            </td>
                                            <td>
                                                <label>Gender</label></br>
                                                <img src="images/icons/p_gender.png" />
                                                <input type="text" readonly value="<?php echo $res['d_gender']; ?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Date of Birth</label></br>
                                                <img src="images/icons/p_email.png" />
                                                <input type="text" readonly value="<?php echo $res['d_dob']; ?>" />
                                            </td>
                                            <td>
                                                <div class="location4">
                                                    <label>Phone No.</label></br>
                                                    <img src="images/icons/p_phone.png" />
                                                    <input type="text" readonly value="<?php echo $res['d_phone']?>" />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Address</label></br>
                                                <img src="images/icons/p_address.png" />
                                                <input type="text" readonly value="<?php echo $res['d_address']?>" />
                                            </td>
                                            <td>
                                                <div class="location">
                                                    <div class="location2">
                                                        <label>City</label><br>
                                                        <input type="text" readonly
                                                            value="<?php echo $res2['city_name'];?>" />
                                                    </div>
                                                    <div class="location3">
                                                        <label>State</label><br>
                                                        <input type="text" readonly
                                                            value="<?php echo $res3['state_name'];?>" />
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table><br><br>

                                    <h2>Agency Information</h2>
                                    <div class="d_info5">
                                        <table>
                                            <tr>
                                                <td>
                                                    <label>Name</label></br>
                                                    <img src="images/icons/p_agency.png" />
                                                    <input type="text" value="<?php echo $res['d_agency'];?>"
                                                        readonly />
                                                </td>
                                                <td>
                                                    <div class="location6">
                                                        <label>Address</label></br>
                                                        <img src="images/icons/p_address.png" />
                                                        <input type="text" readonly
                                                            value="<?php echo $res['d_ag_add']; ?>" />
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="location">
                                                        <div class="location2">
                                                            <label>City</label><br>
                                                            <input type="text" readonly
                                                                value="<?php echo $res4['city_name'];?>" />
                                                        </div>
                                                        <div class="location3">
                                                            <label>State</label><br>
                                                            <input type="text" readonly
                                                                value="<?php echo $res5['state_name'];?>" />
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>


                                </div>
                                <form method="post">
                                    <div class="request_btns">
                                        <button class='online' name="accept" value="<?=$res['d_id']?>">Accept
                                            Application</button>
                                        <button class='offline' name="reject" value="<?=$res['d_id']?>">Reject
                                            Application</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    </body>

</html>