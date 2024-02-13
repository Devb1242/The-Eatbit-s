<div id="loader12"></div>

<?php
	session_start();
	if(!isset($_SESSION['dis_id']))
	{
		echo "<script>window.location.href='../../User/PHP/distributor.php'</script>";
	}
?>



<div class="nav">
    <div class="logo">
        <a href="index.php"><img src="images/icons/Eatbit's 1.png" /></a>
    </div>
    <div class="links">
        <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="product.php">PRODUCTS</a></li>
            <li><a href="order.php">ORDERS</a></li>
            <li><a href="add_new_order.php">PLACE NEW ORDER</a></li>
            <li><a href="contact.php">CONTACT US</a></li>
            <li><a href="profile.php">PROFILE</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
        </ul>
    </div>
</div>