<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <title>The Eatbit's-View Admin</title>
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
                        <a href="admin.php"><img src="images/icons/admin1.png" />ADMIN</a>
                    </div>
                    <div class="btn">
                        <a href="add_admin.php"><img src="images/icons/plus.png" />Admin</a>
                    </div>
                </div>
                <div class="main">
                    <div class="tbl_head">
                        <h3>Manage Admin</h3>

                    </div>

                    <div class="tbl">
                        <table>
                            <tr>
                                <th>Sr No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                            <?php
							include "connection.php";
                            if(isset($_POST['dlt']))
							{
								$dlt_str="DELETE FROM info_admin WHERE a_id=".$_POST['dlt'];
								$dlt_qry=mysqli_query($conn,$dlt_str);
                                echo "<script>window.location.href='admin.php'</script>";
							}
							$str="select * from info_admin";
							$qry=mysqli_query($conn,$str);
							$i=1;
							while($res=mysqli_fetch_assoc($qry))
							{
								echo "<tr>" ;
								echo "<td>".$i."</td>";
								echo "<td>".$res['a_name']."</td>";
								echo "<td>".$res['a_email']."</td>";
								echo "<td>".$res['a_pwd']."</td>";
								if($res['a_status']==1)
								{
									echo "<td><div class='online'>Online</div></td>";
								}
								else
								{
									echo "<td><div class='offline'>Offline</div></td>";
								}
								echo "<td><form method='POST'><button name='dlt' value='".$res['a_id']."' class='dlt_btn' ><img src='images/icons/dlt_btn.png' />Delete</button></form></td>";
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