<html>

<head>
    <title>Admin Login</title>
    <link rel="icon" href="images/icons/favicon.ico" type="image/icon type">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="index,follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../CSS/loginstyle.css" />
    <script src="../JS/validation.js"></script>
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

            <div class="txt" id="">
                <label>NEW PASSWORD</label></br>
                <input type="password" name="n_pwd" class="" id="pas" onchange="check()"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                    title="Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" />
            </div>
            <div class="txt" id="">
                <label>CONFIRM PASSWORD</label></br>
                <input type="password" name="c_n_pwd" class="" id="cnpas" onkeyup="check()" />
            </div>


            <div class="foot">
                <input type="submit" name="chn" value="CHANGE" />
            </div>
        </div>
    </form>
    <?php 
		
		if(isset($_POST['chn']))
		{
			include "connection.php";
			session_start();
			$str="update info_admin set a_pwd='".$_POST['n_pwd']."' where a_id=".$_SESSION['a_id'];
			$qry=mysqli_query($conn,$str);

			$str1="select a_id,a_email,a_pwd from info_admin where a_id=".$_SESSION['a_id'];
			$qry1=mysqli_query($conn,$str1);
			$res=mysqli_fetch_assoc($qry1);
			$to=$res['a_email'];
			$subject="Password Change Alert";
			$txt="Your Password has been Changed";
			$header="From: eabitsfoods@gmail.com";
			mail($to,$subject,$txt,$header);
			session_unset();
			session_destroy();
			header("location: login.php");
		}
	?>
</body>

</html>