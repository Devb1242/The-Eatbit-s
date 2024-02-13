<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>The Eatbit's</title>
    <link rel="icon" href="images/icons/favicon.ico" type="image/icon type">
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
    <div class="cont1">
        <div class="dtl">
            <div>
                <h1>The Finest Potatoes Ever</br>Fried!</h1>
                <p>Potato chips available where you are working</p>
                </br>
                </br>
                </br>
                <a href="product.php">VISIT PRODUCTS <img src="images/icons/arrow.png" /></a>
            </div>
        </div>
        <div class="primg">
            <img src="images\product brochures\br1.png" />
        </div>
    </div>
    <div class="cont2">
        <h2>Cheering Your Good Food</h2>
        <div class="party_img">
            <div class="imgs">
                <img src="images\product brochures\nachos.png" />
                <label>Party with Friends</label>
            </div>
            <div class="imgs">
                <img src="images\product brochures\muffin.png" />
                <label>Celebtraing moments</label>
            </div>
            <div class="imgs">
                <img src="images\product brochures\cookies.png" />
                <label>A bit sweeter for you</label>
            </div>
            <div class="imgs">
                <img src="images\product brochures\chevdo.png" />
                <label>Enjoy with family</label>
            </div>
        </div>
    </div>
    <div class="cont3">
        <div class="left">
            <img src="images\product brochures\wheat flour.jpg" />
            <h2>Selection of our product's ingrediants</h2>
            <ul>
                <li>We have best quality of ingrediants</li>
                <li>We are using 'daisy gold' potato for our products which is top quality of potato</li>
                <li>We are using 'khapli wheat' flour for product manufacturings</li>
            </ul>
        </div>
        <div class="right">
            <img src="images\product brochures\potato.jpg" />
        </div>
    </div>
    <div class="cont4">
        <h2>Our Favorite Products</h2>
        <?php
			include "connection.php";
			$str2="select * from pr_fav";
			$qry2=mysqli_query($conn,$str2);
			while($res2=mysqli_fetch_assoc($qry2))
			{
				$str3="select * from info_product where p_id=".$res2['p_id'];
				$qry3=mysqli_query($conn,$str3);
				$res3=mysqli_fetch_assoc($qry3);
		?>
        <div class="left" style="background-color:<?=$res2['bg_color']?>">
            <div class="hd">
                <h3><?=$res3['p_name']?></h3>
                <a href="product.php">
                    Show >
                </a>
            </div>
            <div class="pr_dtls">
                <?=$res2['details']?>
            </div>
            <div class="pr_img">
                <img src="../../Admin/PHP/images/product image/<?=$res3['p_img']?>" />
            </div>
        </div>
        <?php
			}
			mysqli_close($conn);
		?>
    </div>

    <div class="cont5">
        <h2>Available in</br>Super Market</h2>
        <?php
			include "connection.php";
			$str="select * from pr_mart";
			$qry=mysqli_query($conn,$str);
			while($res=mysqli_fetch_assoc($qry))
			{
				$str1="select * from info_product where p_id=".$res['p_id'];
				$qry1=mysqli_query($conn,$str1);
				$res1=mysqli_fetch_assoc($qry1);
		?>
        <div class="c5_sub" style="background-color:<?=$res['bg_color']?>;">
            <div class="c5hd">
                <img src="images/icons/<?=$res['mart_img']?>" />
            </div>
            <div class="c5dtl">
                <?=$res['details']?>
            </div>
            <div class="c5img">
                <img src="../../Admin/PHP/images/product image/<?=$res1['p_img']?>" />
            </div>
        </div>
        <?php
			}
			mysqli_close($conn);
		?>
    </div>
    <div class="cont6">
        <div class="c6left">
            <h2>Made From High Quality</br>Ingrediants</h2>
            <label>We made best quality product with finest ingrediants. We made best quality product with finest
                ingrediants.</label>
            <ul>
                <li>100% Fresh</li>
                <li>Garlic</li>
                <li>Cow Milk</li>
                <li>Low Fat Sugar</li>
            </ul>
        </div>
        <div class="c6right">
            <div class="c6vid">
                <img src="images/product brochures/muffin.png" />
            </div>
        </div>
    </div>
    <div class="cont7">
        <h1>They have already tasted it, when have you been?</h1>
        <div class="slideshow-container">
            <div class="mySlides fade">
                <div class="contains" style="width:80%;margin:auto;">
                    <span>&#x201D;</span>
                    <p>They have already tasted it, when have you been?They have already tasted it, when have you
                        been?They have already tasted it, when have you been?They have already tasted it, when have you
                        been?They have already tasted it, when have you been?</p>
                </div>
            </div>
            <div class="mySlides fade">
                <div class="contains" style="width:100%">
                    <span>&#x201D;</span>
                    <p>We made best quality product with finest ingrediants. We made best quality product with finest
                        ingrediants.</p>
                </div>
            </div>
            <div class="mySlides fade">
                <div class="contains" style="width:100%">
                    <span>&#x201D;</span>
                    <p>This is salted chips. This is salted chips. This is salted chips. This is salted chips. This is
                        salted chips. This is salted chips. tasted it, when have you been?</p>
                </div>
            </div>
            <div class="mySlides fade">
                <div class="contains" style="width:100%">
                    <span>&#x201D;</span>
                    <p>They have already tasted it, when have you been?They have already tasted it, when have you
                        been?They have already tasted it, when have you been?They have already tasted it, when have you
                        been?They have already tasted it, when have you been?</p>
                </div>
            </div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
    </div>
    <div class="cont8">
        <h1>Try The Taste Right</br>Now!</h1>
        </br>
        </br>
        </br>
        <a href="product.php">VISIT PRODUCTS <img src="images/icons/arrow 2.png" /></a>
        <div class="c8img">
            <img src="images/product brochures/peri peri chips png.png" />
            <img src="images/product brochures/tomato png.png" class="img2" />
        </div>
    </div>
    <?php
		include "footer.php";
	?>
    <script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");

        if (n > slides.length) {
            slideIndex = 1;
        }

        if (n < 1) {
            slideIndex = slides.length;
        }

        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex - 1].style.display = "block";
    }
    </script>
</body>

</html>