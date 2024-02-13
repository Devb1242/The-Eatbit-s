<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>The Eatbit's-Contact Us</title>
    <link rel="icon" href="images/icons/favicon.ico" type="image/icon type">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="index,follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../CSS/main.css" />
</head>

<body>
    <?php
		include "header.php";
		include "connection.php";
		if(isset($_POST['sbt']))
		{
			$str="insert into feedback (u_name,u_email,msg) values('".$_POST['u_name']."','".$_POST['u_email']."','".$_POST['u_msg']."')";
			$qry=mysqli_query($conn,$str);
		}
	?>
    <form action="" method="POST">
        <div class="banner">
            <img src="images\product brochures\banner.png" />
            <h1>Contact</h1>
        </div>

        <div class="cont18">
            <div class="c18sub">
                <div class="c18b">
                    <img src="images\icons\p_phone.png" />
                    <label>+91 98987 00000</label>
                </div>
            </div>
            <div class="c18sub">
                <div class="c18b">
                    <img src="images\icons\p_address.png" />
                    <label>Vesu Bharthaha Surat-390001 Gujarat</label>
                </div>
            </div>
            <div class="c18sub">
                <div class="c18b">
                    <img src="images\icons\p_email.png" />
                    <label>eabitfoods@gmail.com</label>
                </div>
            </div>
        </div>
        <div class="cont19">
            <div class="gglMap">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3692.4403265426845!2d70.6969669149461!3d22.261304149934844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959cc6ec7659029%3A0x5976a7ae988183fc!2sBalaji%20Wafers%20Pvt%20Ltd!5e0!3m2!1sen!2sin!4v1648220123569!5m2!1sen!2sin"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="contact_form">
                <input type="text" name="u_name" placeholder="Full Name" required>
                <input type="email" name="u_email" placeholder="Email" required>
                <textarea placeholder="Message" name="u_msg" required></textarea>
                <button name="sbt">SUBMIT</button>

            </div>
        </div>
    </form>
    <?php
		include "footer.php";
	?>
</body>

</html>