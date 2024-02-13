<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Raw Used</title>
    <link rel="icon" href="images/icons/favicon.ico" type="image/icon type">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="index,follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../CSS/managerstyle.css" />
	<script src="../JS/ajaxLink.js"></script>
    <script src="../JS/jqueryLink.js"></script>
    <script>
    function validate() {
        var pro = document.getElementById('pro').value;
        var raw = document.getElementById('raw').value;
        var date = document.getElementById('date').value;

        if (pro == "" && raw == "" && date == "") {
            alert("Please insert atleast one input 'Product' or 'Raw Material' or 'Date'");
            return false;
        }
        return true;
    }
    </script>
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
                <div class="raw_text">
                    <a href="raw.php"><img src="images/icons/raw materials2.png" />RAW MATERIALS</a>
                    <b>&nbsp/&nbsp</b>
                    <a href="raw_use.php">MATERIAL USED</a>
                    <b>&nbsp/&nbsp</b>
                    <a href="raw_use_info.php" style="color:white;">MATERIAL USED INFO</a>
                </div>
            </div>
            <div class="main">
                <div class="tbl_head">
                    <div class="header">
                        <h3>Raw Material Used</h3>
                    </div>
                </div>
                <div class="tbl">
                    <table>
                        <tr>
                            <th>Sr No.</th>
                            <th>Raw Material Name</th>
                            <th>Raw Material Quantity</th>
                        </tr>
                        <?php
						
							$str="select * from use_history where p_num=".$_SESSION['p_num'];
							$qry=mysqli_query($conn,$str);
							$i=1;
							while($res=mysqli_fetch_assoc($qry))
							{
								$str2="select * from raw_materials where raw_id=".$res['raw_id'];
								$qry2=mysqli_query($conn,$str2);
								$res2=mysqli_fetch_assoc($qry2);
								echo "<tr>";
								echo "<td>".$i."</td>";
								echo "<td>".$res2['raw_name']."</td>";
								echo "<td>".$res['raw_qty']."</td>";

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