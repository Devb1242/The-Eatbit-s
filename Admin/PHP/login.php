<html>

<head>
    <title>The Eatbit's-Admin Login</title>
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


            <div>
                <div id="war">
                    <div class="label" id="lbl">
                        <label>Incorrect Email or Password</label>
                    </div>
                    <img src="images/icons/close.png" class="climg" onclick="rmv()" />
                </div>
                <div class="txt" id="">
                    <label>EMAIL</label></br>
                    <input type="email" name="a_email" class="" id="" /></br>

                </div>

                <div class="txt" id="">
                    <label>PASSWORD</label></br>
                    <input type="password" name="a_pwd" class="" id="" /></br></br>
                    <a href="forget_pwd.php">FORGET PASSWORD?</a>
                </div>

                <div class="foot">
                    <input type="submit" name="login" value="LOGIN" />
                </div>
            </div>
    </form>

    <?php
		if(isset($_POST['login']))
		{
			include "connection.php";
			$str="select * from info_admin where a_email='".$_POST['a_email']."' and a_pwd='".$_POST['a_pwd']."'";
			$qry=mysqli_query($conn,$str);
			            
			if(mysqli_num_rows($qry)>0)
            {   
                $res=mysqli_fetch_assoc($qry);
                if($res['a_status']==1)
                {
                    echo "<script>alert('You are already Login');</script>";
                }
                else
                {    
                    session_start();
                    $_SESSION['a_id']=$res['a_id'];
                    $str1="update info_admin set a_status=1 where a_id=".$_SESSION['a_id'];
                    $qry1=mysqli_query($conn,$str1);
                    header("location: index.php");
                }
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