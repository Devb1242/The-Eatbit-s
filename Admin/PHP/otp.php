<html>

<head>
    <title>The Eatbit's-OTP</title>
    <link rel="icon" href="images/icons/favicon.ico" type="image/icon type">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="index,follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../CSS/loginstyle.css" />
</head>

<body>
    <form method="POST">
        <div class="content" id="">
            <div class="logo" id="">
                <img src="images\icons\logo text.png" />
            </div>

            <div class="head">
                <label>ADMIN PANEL</label>
            </div>
            <div id="war">
                <div class="label" id="lbl">
                    <label>Incorrect OTP</label>
                </div>
                <img src="images/icons/close.png" class="climg" onclick="rmv()" />
            </div>
            <div class="txt" id="">
                <label>OTP</label></br>
                <input type="text" name="txt_otp" class="" id="" />

            </div>
            <div class="otp_foot">
                <input type="submit" name="r_send" value="RESEND OTP" />
                <input type="submit" name="v_otp" value="VERIFY" class="v_otp" />
            </div>
        </div>
    </form>
    <?php 
		if(isset($_POST['v_otp']))
		{
			session_start();
			if($_POST['txt_otp']==$_SESSION['otp'])
			{
				header("location: set_new_pwd.php");
			}
			else{
					echo "<script>
							document.getElementById('war').classList.add('war');
							document.getElementById('lbl').style.opacity=1;
					  </script>";
				
			}
		}
	?>
    <script>
    function rmv() {
        document.getElementById('war').classList.remove('war');
        document.getElementById('lbl').style.opacity = 0;
    }
    </script>
</body>

</html>