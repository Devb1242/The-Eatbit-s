<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Eatbit's</title>
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
	?>
	
	<div class="banner">
		<img src="images\product brochures\banner.png" />
		<h1>Distributor</h1>
	</div>
	
	<div class="warning" id="email_war">
		<label>Wrong Email</label>
	</div>
	<div class="warning" id="pass_war">
		<label>Wrong Password</label>
	</div>
	
	<form method="POST">
		<div class="cont20">
			<div class="contact_form">
				<input type="email" id="emailBx" name="email" placeholder="Email" >
				<input type="password" name="pwd" placeholder="Password" >
				<button name="lgn">LOGIN</button></br>
				<a href="distributor_form" >Want to be a distributor? Click Here!</a>
			</div>
		</div>
	</form>
	<?php
		include "connection.php";
		if(isset($_POST['lgn']))
		{
			$str="select * from info_distributor where d_email='".$_POST['email']."'";
			$qry=mysqli_query($conn,$str);
			if(mysqli_num_rows($qry)>0)
			{
				$res=mysqli_fetch_assoc($qry);
				if($_POST['pwd']==$res['d_pwd'])
				{
					session_start();
					$_SESSION['dis_id']=$res['d_id'];
					echo "<script>window.location.href='../../distributor2/PHP/index.php'</script>";
				}
				else
				{
					echo "<script>
							document.getElementById('pass_war').style.display='flex';
							document.getElementById('emailBx').value='".$_POST['email']."';
						  </script>";
				}
			}
			else
			{
				
				echo "<script>
							document.getElementById('email_war').style.display='flex';
							document.getElementById('emailBx').value='".$_POST['email']."';
					  </script>";
			}
		}
	?>
	
	<?php
		include "footer.php";
	?>
</body>
</html>
