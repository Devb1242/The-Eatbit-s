<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <title>The Eatbit's-Feedback Reply</title>
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
                        <a href="feedback.php"><img src="images/icons/feedback2.png" />FEEDBACK</a>
                        <b>&nbsp/&nbsp</b>
                        <a href="reply.php" style="color:gray;">REPLY TO FEEDBACK</a>
                    </div>
                </div>
                <div class="main">
                    <?php
                    include "connection.php";
                    $str="select * from feedback where f_id=".$_SESSION['f_id'];
                    $qry=mysqli_query($conn,$str);
                    $res=mysqli_fetch_assoc($qry);
                    if(isset($_POST['reply']))
                    {
                        $to=$res['u_email'];
                        $subject="Thank you for your Feedback";
                        $txt=$_POST['f_msg'];
                        $header="From: eabitsfoods@gmail.com";
                        mail($to,$subject,$txt,$header);
                        
                            echo "<script>window.location.href=reply.php;</script>";
                    }
                ?>
                    <form method="POST" enctype="multipart/form-data">

                        <div class="form">

                            <table>
                                <tr>
                                    <th class="form_head">
                                        <h2>Feedback Reply</h2>
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <label>User Name</label>
                                    </th>
                                    <td>
                                        <input type="text" value="<?php echo $res['u_name'];?>" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <label>User Email</label>
                                    </th>
                                    <td>
                                        <input type="text" value="<?php echo $res['u_email'];?>" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <label>Message</label>
                                    </th>
                                    <td>
                                        <textarea><?php echo $res['msg'];?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <label>Reply</label>
                                    </th>
                                    <td>
                                        <textarea name="f_msg" cols="30" rows="10"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <input type="submit" value="Send" name="reply">
                                    </th>
                                </tr>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

</html>