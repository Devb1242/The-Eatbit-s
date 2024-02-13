<html>

<head>
    <title>Manager Login</title>
    <link rel="icon" href="images/icons/favicon.ico" type="image/icon type">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="index,follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../CSS/loginstyle.css" />
	<script src="../JS/ajaxLink.js"></script>
    <script src="../JS/jqueryLink.js"></script>
</head>

<body>
    <form method="POST">
        <div class="content" id="">
            <div class="logo" id="">
                <img src="images\icons\logo text.png" />
            </div>

            <div class="head">
                <label>MANAGER PANEL</label>
            </div>
            <div id="war">
                <div class="label" id="lbl">
                    <label>Incorrect Email</label>
                </div>
                <img src="images/icons/close.png" class="climg" onclick="rmv()" />
            </div>

            <div class="txt" id="">
                <label>EMAIL</label></br>
                <input type="email" name="m_email1" class="" id="" />
            </div>


            <div class="foot">
                <input type="submit" name="s_otp" value="SEND OTP" />
            </div>
        </div>
    </form>
    <?php
		if(isset($_POST['s_otp']))
		{
			include "connection.php";
			$str="select m_id,m_email,m_pwd from info_manager where m_email='".$_POST['m_email1']."'";
			$qry=mysqli_query($conn,$str);
			
			if(mysqli_num_rows($qry)>0)
			{
				 $res=mysqli_fetch_assoc($qry);
				session_start();
				$_SESSION['m_id']=$res['m_id'];
				
				include "connection.php";
				$str="select m_id,m_email,m_pwd from info_manager where m_id=".$_SESSION['m_id'];
				$qry=mysqli_query($conn,$str);
				$res=mysqli_fetch_assoc($qry);
				$_SESSION['otp']=rand(000000,999999);
				$to=$res['m_email'];
				$subject="Sending otp";
				$txt="Your OTP is ".$_SESSION['otp'];
				$header="From: eabitsfoods@gmail.com";
				mail($to,$subject,$txt,$header);
				
					header("location: otp.php");
			}
			else
			{
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