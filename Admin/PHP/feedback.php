<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <title>The Eatbit's-Feedback</title>
        <link rel="icon" href="images/icons/favicon.ico" type="image/icon type">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="robots" content="index,follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="../CSS/adminstyle.css" />
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
                        <a href="feedback.php"><img src="images/icons/feedback2.png" />FEEDBACK</a>
                    </div>
                </div>
                <div class="main">
                    <?php
                    include "connection.php";
                    if(isset($_POST['rply']))
                    {
                        $_SESSION['f_id']=$_POST['rply'];
                        echo "<script>window.location.href='reply.php';</script>";
                    }
                ?>
                    <div class="tbl_head">
                        <div class="head">
                            <h3>Feedbacks</h3>
                        </div>
                        <div class="tbl">
                            <table>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>User Name</th>
                                    <th>User E-mail</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>

                                <?php
                            include "connection.php";
									$str="select * from feedback where u_email!='' ORDER BY f_id DESC";
									$qry=mysqli_query($conn,$str);
									$i=1;

                                    $str3="update feedback set noti=1 where noti=0 and u_email<>''";
									$qry3=mysqli_query($conn,$str3);
                                    
									while($res=mysqli_fetch_assoc($qry))
									{
										echo "<tr>" ;
										echo "<td>".$i."</td>";
										echo "<td>".$res['u_name']."</td>";
                                        echo "<td>".$res['u_email']."</td>";
										echo "<td>".$res['msg']."</td>";
                                        echo "<td><form method='POST'><button name='rply' value='".$res['f_id']."'><img src='images/icons/reply.png'/></button></form></td>";
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