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


            <div>
                <div id="war">
                    <div class="label" id="lbl">
                        <label>Incorrect Email or Password</label>
                    </div>
                    <img src="images/icons/close.png" class="climg" onclick="rmv()" />
                </div>
                <div class="txt" id="">
                    <label>EMAIL</label></br>
                    <input type="email" name="m_email" class="" id="" /></br>

                </div>

                <div class="txt" id="">
                    <label>PASSWORD</label></br>
                    <input type="password" name="m_pwd" class="" id="" /></br></br>
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
			$str="select * from info_manager where m_email='".$_POST['m_email']."' and m_pwd='".$_POST['m_pwd']."'";
			$qry=mysqli_query($conn,$str);
			            
			if(mysqli_num_rows($qry)>0)
            {   
                $res=mysqli_fetch_assoc($qry);
                if($res['m_status']==1)
                {
                    echo "<script>alert('You are already Login');</script>";
                }
                else
                {    
                    session_start();
                    $_SESSION['m_id']=$res['m_id'];
                    $str1="update info_manager set m_status=1 where m_id=".$_SESSION['m_id'];
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