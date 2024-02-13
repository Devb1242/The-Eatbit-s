<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Feedback</title>
    <link rel="icon" href="images/icons/favicon.ico" type="image/icon type">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="index,follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../CSS/managerstyle.css" />
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
			<?php
				if(isset($_POST['set']))
				{
					$str1="update discount set discount=".$_POST['dis'];
					$qry1=mysqli_query($conn,$str1);
					
				}
			?>
            <div class="path">
                <div class="text">
                    <a href="setting.php"><img src="images/icons/setting2.png" />SETTING</a>
                </div>
            </div>
            <div class="main">
				<h1 style="font-family:verdana; color:gray; padding:20px;">Distributor Side Modifications</h1>
				<form method="POST">
				<div class="discount">
					<h3>Discount</h3>
					<?php
						$str="select * from discount";
						$qry=mysqli_query($conn,$str);
						$res=mysqli_fetch_assoc($qry);
					?>
					<input type="number" name="dis" value="<?=$res['discount']?>" /><b style="margin:0 10px;">%</b>
					<button name="set">Set</button>
				</div>
				</form>
            </div>
        </div>
</body>

</html>