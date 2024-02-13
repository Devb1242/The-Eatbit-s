<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>The Eatbit's-Update Password</title>
    <link rel="icon" href="images/icons/favicon.ico" type="image/icon type">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="index,follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../CSS/main.css" />
    <script src="../JS/ajaxLink.js"></script>
    <script src="../JS/jqueryLink.js"></script>
</head>

<body onload="loaderOff()">
    <?php
		include "header.php";
		
		include "connection.php";
	?>

    <div class="banner">
        <img src="images\product brochures\banner.png" />
        <h1>Change Password</h1>
    </div>

    <div class="success" id="pass_suc">
        <label>Password Changed Successfully</label>
    </div>

    <div class="warning" id="pass_war">
        <label>Old Password Wrong</label>
    </div>

    <?php
		if(isset($_POST['updt']))
		{
			$str="select * from info_distributor where d_id=".$_SESSION['dis_id'];
			$qry=mysqli_query($conn,$str);
			$res=mysqli_fetch_assoc($qry);
			
			
			if($res['d_pwd']==$_POST['old'])
			{
				$str5="update info_distributor set d_pwd='".$_POST['new']."' where d_id=".$_SESSION['dis_id'];
				$qry5=mysqli_query($conn,$str5);
				
				echo "<script>
						document.getElementById('pass_suc').style.display='flex';
					  </script>";
			}
			else
			{
				echo "<script>
						document.getElementById('pass_war').style.display='flex';
					  </script>";
			}
		}
	?>

    <form method="POST" enctype="multipart/form-data">
        <div class="cont22">
            <div class="contact_form">
                <input type="password" name="old" required placeholder="Old password" />

                <input type="password" name="new" onchange="check()" id="pas"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                    title="Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                    required placeholder="New password" />

                <input type="password" name="cnfrm" id="cnpas" required placeholder="Confirm password"
                    onkeyup="check()" />

                <button name="updt">Change</button></br>

            </div>
        </div>
    </form>


    <?php
		include "footer.php";
	?>

    <script>
    function check() {

        var pas = document.getElementById('pas').value;
        var cnpas = document.getElementById('cnpas').value;

        if (pas != cnpas) {
            document.getElementById('cnpas').setCustomValidity("Password Does Not Matched");
        } else {
            document.getElementById('cnpas').setCustomValidity("");
        }
    }
    </script>
</body>

</html>