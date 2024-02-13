<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>The Eatbit's-Distributor Form</title>
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

    <?php
		if(isset($_POST['send']))
		{
			$str2="select * from info_distributor where d_email='".$_POST['email']."' ";
			$qry2=mysqli_query($conn,$str2);
			if(mysqli_num_rows($qry2)>0)
			{
				echo "<script>alert('Please try another email !')</script>";
			}
			else
			{
				$str="insert into info_distributor (d_name,d_email,d_gender,d_phone,d_state,d_city,d_address,d_agency,ag_state,ag_city,d_ag_add,d_status) 
				values('".$_POST['name']."','".$_POST['email']."','".$_POST['gender']."','".$_POST['number']."',".$_POST['state'].",".$_POST['city'].",'".$_POST['address']."','".$_POST['ag_name']."',".$_POST['ag_state'].",".$_POST['ag_city'].",'".$_POST['ag_address']."',0)";
				$qry=mysqli_query($conn,$str);
			}
		}
	?>

    <?php
		
		$str1="select * from state";/*For Distributor Personal Info*/
		$qry1=mysqli_query($conn,$str1);
		
		$str3="select * from state";/*For Distributor Agency Info*/
		$qry3=mysqli_query($conn,$str3);
		
	?>

    <div class="banner">
        <img src="images\product brochures\banner.png" />
        <h1>Registration for Distributorship</h1>
    </div>

    <form method="POST" enctype="multipart/form-data">
        <div class="cont22">
            <div class="contact_form">
                <h2>Personal Details</h2>
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <select name="gender" id="gender" required>
                    <option value="">Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Not prefer to say</option>
                </select>
                <input type="number" name="number" placeholder="Contact" pattern="[0-9]{10}" onkeypress='isNum(event)'
                    required>
                <select name="state" id="state" onchange="change_state(value)" required>
                    <option value="">State</option>
                    <?php
						while($res1=mysqli_fetch_assoc($qry1))
						{
					?>
                    <option value="<?=$res1['state_id']?>"><?=$res1['state_name']?></option>
                    <?php
						}
					?>
                </select>
                <select name="city" id="city" required>
                    <option value="">City</option>
                </select>
                <textarea name="address" placeholder="Address" required></textarea>
                <h2>Agency Details</h2>
                <input type="text" name="ag_name" placeholder="Agency Name" required>
                <select name="ag_state" id="ag_state" onchange="change_ag_state(value)" required>
                    <option value="">State</option>
                    <?php
							while($res3=mysqli_fetch_assoc($qry3))
							{
						?>
                    <option value="<?=$res3['state_id']?>"><?=$res3['state_name']?></option>
                    <?php
							}
						?>
                </select>
                <select name="ag_city" id="ag_city" required>
                    <option value="">City</option>
                </select>
                <textarea name="ag_address" placeholder="Agency Address" required></textarea>
                <textarea name="reason" placeholder="Why do want to be distributor of Eatbit's ?" required></textarea>
                <button name="send">SEND</button></br>
            </div>
        </div>
    </form>


    <?php
		include "footer.php";
	?>

    <script>
    function isNum(e) {
        var ch = String.fromCharCode(e.which);
        if (!(/[0-9]/.test(ch))) {
            e.preventDefault();
        }
    }
    </script>

    <script>
    function change_state(v) {
        state = v;
        $.ajax({
            url: "AJAX/state and city.php",
            method: "POST",
            data: {
                state: state
            },
            success: function(data) {
                $('#city').html(data);
            }
        });
    }
    </script>


    <script>
    function change_ag_state(w) {
        ag_state = w;
        $.ajax({
            url: "AJAX/state and city.php",
            method: "POST",
            data: {
                ag_state: ag_state
            },
            success: function(data) {
                $('#ag_city').html(data);
            }
        });
    }
    </script>

    <script>
    var thumb = document.getElementById('prfl_thumb');

    function thumb_ch(event) {
        thumb.src = URL.createObjectURL(event.target.files[0]);
    }
    </script>

</body>

</html>