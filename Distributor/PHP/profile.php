<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>The Eatbit's-profile</title>
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
		if(isset($_POST['updt']))
		{
			$img=$_FILES['prfl_img'];
			$img_name=$img['name'];
			$img_ext=explode('.',$img_name);
			$temp=$img['tmp_name'];
			
			$check=strtolower(end($img_ext));
			
			$ext=array('png','jpg','jpeg');
			
			if(in_array($check,$ext))
			{
				$dest='images/distributor image/'.$img_name;
				move_uploaded_file($temp,$dest);
			}
			if($img_name!="")
			{
				$str6="update info_distributor set d_img='".$img_name."' where d_id=".$_SESSION['dis_id'];
				$qry6=mysqli_query($conn,$str6);
			}
			
			$str5="update info_distributor set d_name='".$_POST['name']."', d_gender='".$_POST['gender']."', d_phone='".$_POST['number']."', d_state=".$_POST['state'].", d_city=".$_POST['city'].", d_address='".$_POST['address']."', d_agency='".$_POST['ag_name']."', d_dob='".$_POST['dob']."', ag_state=".$_POST['ag_state'].", ag_city=".$_POST['ag_city'].", d_ag_add='".$_POST['ag_address']."' where d_id=".$_SESSION['dis_id'];
			$qry5=mysqli_query($conn,$str5);
		}
	?>

    <?php
		$str="select * from info_distributor where d_id=".$_SESSION['dis_id'];
		$qry=mysqli_query($conn,$str);
		$res=mysqli_fetch_assoc($qry);
		
		$str1="select * from state";/*For Distributor Personal Info*/
		$qry1=mysqli_query($conn,$str1);
		
		$str3="select * from state";/*For Distributor Agency Info*/
		$qry3=mysqli_query($conn,$str3);
		
		$str2="select * from city where state_id=".$res['d_state'];/*For Distributor Personal Info*/
		$qry2=mysqli_query($conn,$str2);
		
		$str4="select * from city where state_id=".$res['ag_state'];/*For Distributor Agency Info*/
		$qry4=mysqli_query($conn,$str4);
		
	?>
    <div class="banner">
        <img src="images\product brochures\banner.png" />
        <h1>Profile</h1>
    </div>

    <form method="POST" enctype="multipart/form-data">

        <div class="prfl_img">
            <div class="prfl_imgBx">
                <img src="images/distributor image/<?=$res['d_img']?>" id="prfl_thumb" />
                <input type="file" title="Click To Change Photo" name="prfl_img" onchange="thumb_ch(event);" />
            </div>
        </div>
        <div class="cont22">
            <div class="contact_form">
                <h2>Personal Details</h2>
                <input type="text" name="name" value="<?=$res['d_name']?>" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" value="<?=$res['d_email']?>" disabled>
                <select name="gender" id="gender" required>
                    <option value="">Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Not prefer to say</option>
                </select>
                <input type="text" name="number" value="<?=$res['d_phone']?>" placeholder="Contact" required>
                <select name="state" id="state" onchange="change_state(value)">
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
                <select name="city" id="city">
                    <option value="">City</option>
                    <?php
						while($res2=mysqli_fetch_assoc($qry2))
						{
					?>
                    <option value="<?=$res2['city_id']?>"><?=$res2['city_name']?></option>
                    <?php
						}
					?>
                </select>
                <textarea name="address" placeholder="Address"><?=$res['d_address']?></textarea>
                <input type="date" name="dob" value="<?=$res['d_dob']?>" placeholder="Contact" required>
                <h2>Agency Details</h2>
                <input type="text" name="ag_name" placeholder="Agency Name" value="<?=$res['d_agency']?>" required>
                <select name="ag_state" id="ag_state" onchange="change_ag_state(value)">
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
                <select name="ag_city" id="ag_city">
                    <option value="">City</option>
                    <?php
						while($res4=mysqli_fetch_assoc($qry4))
						{
					?>
                    <option value="<?=$res4['city_id']?>"><?=$res4['city_name']?></option>
                    <?php
						}
					?>
                </select>
                <textarea name="ag_address" placeholder="Agency Address"><?=$res['d_ag_add']?></textarea>
                <button name="updt">UPDATE</button></br>
                <a href="change_pwd.php">Click Here to Change Password</a>
            </div>
        </div>
    </form>


    <?php
		include "footer.php";
	?>

    <script>
    var prSelect = document.getElementById('gender');
    for (var i, j = 0; i = prSelect.options[j]; j++) {
        if (i.value == "<?=$res['d_gender']?>") {
            prSelect.selectedIndex = j;
            break;
        }
    }
    </script>

    <script>
    var prSelect = document.getElementById('state');
    for (var i, j = 0; i = prSelect.options[j]; j++) {
        if (i.value == "<?=$res['d_state']?>") {
            prSelect.selectedIndex = j;
            break;
        }
    }
    </script>

    <script>
    var prSelect = document.getElementById('ag_state');
    for (var i, j = 0; i = prSelect.options[j]; j++) {
        if (i.value == "<?=$res['ag_state']?>") {
            prSelect.selectedIndex = j;
            break;
        }
    }
    </script>

    <script>
    var prSelect = document.getElementById('city');
    for (var i, j = 0; i = prSelect.options[j]; j++) {
        if (i.value == "<?=$res['d_city']?>") {
            prSelect.selectedIndex = j;
            break;
        }
    }
    </script>

    <script>
    var prSelect = document.getElementById('ag_city');
    for (var i, j = 0; i = prSelect.options[j]; j++) {
        if (i.value == "<?=$res['ag_city']?>") {
            prSelect.selectedIndex = j;
            break;
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