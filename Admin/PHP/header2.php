<div class="srch_box">
    <div class="search-input">
        <input type="text" id="myInput" placeholder="Search" onkeyup="search()" />

        <div class="autocom-box" id="auto">
            <?php
                    $a=array("add_admin.php","add_category.php","add_category.php","add_manager.php","add_product.php","admin.php","category.php","distributor.php","feedback.php","help.php","index.php","manager.php","product.php","profile.php","setting.php","distributor_request.php");                                                                                             
                    $b=array("Add Admin","Add Category","Add Sub-Category","Add Manager","Add Product","View Admin","Manage Category","Manage Distributor","View Feedback","Help","Dashboard","Manage Manager","Manage Product","My Profile","Setting","Distributor Requests");
                ?>
            <ul id="myUL">
                <?php
                        for($i=0; $i<sizeof($a); $i++){
                            echo "<li><a href='".$a[$i]."'>".$b[$i]."</a></li>";
                        }    
                    ?>
            </ul>

        </div>
        <div class="icon"><img src="images/icons/search grey.png" />
        </div>
    </div>

    <div class="account" style="cursor:pointer" onclick="menuToggle()">
        <?php
			include "connection.php";
			session_start();
			if($_SESSION['a_id']=="")
            {
              header("location: login.php");
            }
			$str="select * from info_admin where a_id=".$_SESSION['a_id'];
			$qry=mysqli_query($conn,$str);
			$res=mysqli_fetch_assoc($qry);
			
			echo "<div class='usrimg'><img src='images/user image/Admin/".$res['a_img']."' /></div><b> ".$res['a_name']."</b>";
		?>

    </div>
    <div class="menu" id="menu">
        <ul>
            <li><a href="profile.php">My Profile</a></li>
            <div class="divider"></div>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <?php
		
        $n_str="select * from info_distributor where d_status=0";
		$n_qry=mysqli_query($conn,$n_str);
		$n_count=mysqli_num_rows($n_qry);    

		$f_str="select * from feedback where noti=0 and u_email<>''";
		$f_qry=mysqli_query($conn,$f_str);
		$f_count=mysqli_num_rows($f_qry);
	?>
    <div class="notifications" onclick="menuToggle2()">
        <?php
			if($n_count>0 || $f_count>0)
			{
		?>
        <label class="noti_alert" id="point"></label>
        <?php
			}
		?>
        <img src="images\icons\notification.png" /> <label>Notifications</label>
    </div>

    <div class="menu2" id="menu2">
        <ul>
            <?php
					while($n_res=mysqli_fetch_assoc($n_qry))
					{
						
			?>
            <li id="<?=$n_res['d_id']?>">
                <a href="distributor_request.php"><?=$n_res['d_name']?> want to be a distributor</a>
            </li>

            <?php
					}
					while($f_res=mysqli_fetch_assoc($f_qry))
					{
					
			?>
            <li id="<?=$f_res['f_id']?>">
                <a href="feedback.php"><?=$f_res['u_name']?> want to say something</a>
                <button onclick="clearNoti2(<?=$f_res['f_id']?>)"><img src="images/icons/close.png" /></button>
            </li>
            <?php
					}
			?>
            <li style="color:#eee">
                ______________________
            </li>
        </ul>
    </div>

</div>

<script>
function clearNoti(e) {

    id = e;

    $.ajax({
        url: "AJAX/notiClear.php",
        method: "POST",
        data: {
            id: id
        }
    });

    const noti = document.getElementById(id.toString());
    noti.remove();

}

function clearNoti2(f) {

    id = f;

    $.ajax({
        url: "AJAX/notiClear2.php",
        method: "POST",
        data: {
            id: id
        }
    });

    const noti = document.getElementById(id.toString());
    noti.remove();

}
</script>


<script>
var i = 1;
var j = 1;

let menu = document.getElementById('menu');
let menu2 = document.getElementById('menu2');

function menuToggle() {
    if (i == 1) {
        menu.style.visibility = 'visible';
        menu.style.opacity = 1;
        i = 0;

        menu2.style.visibility = 'hidden';
        menu2.style.opacity = 0;
        j = 1;
    } else {
        menu.style.visibility = 'hidden';
        menu.style.opacity = 0;
        i = 1;
    }
}

function menuToggle2() {
    if (j == 1) {
        menu2.style.visibility = 'visible';
        menu2.style.opacity = 1;
        j = 0;

        document.getElementById("point").remove();

        menu.style.visibility = 'hidden';
        menu.style.opacity = 0;
        i = 1;
    } else {
        menu2.style.visibility = 'hidden';
        menu2.style.opacity = 0;
        j = 1;
    }
}
</script>

<script>
function search() {
    let filter = document.getElementById('myInput').value.toUpperCase();

    let auto = document.getElementById('auto');

    let not = document.getElementById('not');

    let ul = document.getElementById('myUL');

    let li = ul.getElementsByTagName('li');
    if (filter == '') {

        auto.style.display = 'none';
        auto.style.opacity = 0;
    } else {
        auto.style.display = 'block';
        auto.style.opacity = 1;
    }
    for (var i = 0; i < li.length; i++) {

        let a = li[i].getElementsByTagName('a')[0];

        let textValue = a.textContent;

        if (textValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = '';

        } else {
            li[i].style.display = 'none';
        }
    }
}
</script>