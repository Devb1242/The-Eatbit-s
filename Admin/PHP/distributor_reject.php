<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <title>The Eatbit's-Manage Distributor</title>
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
                        <a href="distributor.php"><img src="images/icons/distributor2.png" />DISTRIBUTOR</a>
                        <b>&nbsp/&nbsp</b>
                        <a href="distributor_request.php" style="color:gray;">REQUESTS</a>
                    </div>
                </div>
                <div class="main">
                    <div class="tbl_head">
                        <h3>Manage Distributor</h3>
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
                                <th>Action</th>
                            </tr>

                            <?php
                            include "connection.php";
                            if(isset($_POST['dlt']))
                            {
                                $dlt_str="DELETE FROM info_distributor WHERE d_id=".$_POST['dlt'];
                                $dlt_qry=mysqli_query($conn,$dlt_str);
                                echo "<script>window.location.href='distributor.php';</script>";
                            }
                            if(isset($_POST['info']))
                            {
                                $_SESSION['d_id']=$_POST['info'];
                                echo "<script>window.location.href='req_distributor_info.php';</script>";
                            }
                            $str="select * from info_distributor where d_status=0";
                            $qry=mysqli_query($conn,$str);
                            $i=1;
                            while($res=mysqli_fetch_assoc($qry))
                            {
                                echo "<tr>" ;
                                echo "<td>".$i."</td>";
                                echo "<td>".$res['d_name']."</td>";
                                echo "<td>".$res['d_email']."</td>";
                                echo "<td>".$res['d_pwd']."</td>";
                                echo "<td>".$res['d_gender']."</td>";
                                echo "<td>".$res['d_phone']."</td>";
                                echo "<td class='action'><form method='POST'><button class='info' name='info' value='".$res['d_id']."'>i</button> <button name='dlt' value='".$res['d_id']."' class='dlt_btn3' ><img src='images/icons/dlt_btn.png' /></button></form></td>";
                                echo "</tr>";
                                $i=$i+1;
                            }	
						    ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>