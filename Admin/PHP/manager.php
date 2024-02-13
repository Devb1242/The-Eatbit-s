<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <title>The Eatbit's-Manage Manager</title>
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
                        <a href="manager.php"><img src="images/icons/manager2.png" />MANAGERS</a>
                    </div>
                    <div class="btn">
                        <a href="add_manager.php"><img src="images/icons/plus.png" />Manager</a>
                    </div>
                </div>
                <div class="main">
                    <div class="tbl_head">
                        <h3>Manage Manager</h3>

                    </div>

                    <div class="tbl">
                        <table>
                            <tr>
                                <th>Sr No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Gender</th>
                                <th>Phone No.</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                            <?php
							include "connection.php";
                            if(isset($_POST['dlt']))
							{
								$dlt_str="DELETE FROM info_manager WHERE m_id=".$_POST['dlt'];
								$dlt_qry=mysqli_query($conn,$dlt_str);
                                echo "<script>window.location.href='manager.php';</script>";
							}
							$str="select * from info_manager";
							$qry=mysqli_query($conn,$str);
							$i=1;
							while($res=mysqli_fetch_assoc($qry))
							{
                                $str2="select * from city where city_id=".$res['m_city'];
                                $qry2=mysqli_query($conn,$str2);
                                $res2=mysqli_fetch_assoc($qry2);
                                $str3="select * from state where state_id=".$res2['state_id'];
                                $qry3=mysqli_query($conn,$str3);
                                $res3=mysqli_fetch_assoc($qry3);
								echo "<tr>" ;
								echo "<td>".$i."</td>";
								echo "<td>".$res['m_name']."</td>";
								echo "<td>".$res['m_email']."</td>";
								echo "<td>".$res['m_pwd']."</td>";
                                echo "<td>".$res['m_gender']."</td>";
                                echo "<td>".$res['m_phone']."</td>";
                                echo "<td>".$res['m_address']."</td>";
                                echo "<td>".$res2['city_name']."</td>";
                                echo "<td>".$res3['state_name']."</td>";
								if($res['m_status']==1)
								{
									echo "<td><div class='online'>Online</div></td>";
								}
								else
								{
									echo "<td><div class='offline'>Offline</div></td>";
								}
								echo "<td><form method='POST'><button name='dlt' value='".$res['m_id']."' class='dlt_btn' ><img src='images/icons/dlt_btn.png' />Delete</button></form></td>";
								echo "</tr>";
								$i=$i+1;
							}	
						?>

                        </table>
                    </div>
                </div>
                <!--------------Right Section End-------------->
            </div>
        </div>
    </body>

</html>