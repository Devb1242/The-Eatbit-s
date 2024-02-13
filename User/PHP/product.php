<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>The Eatbit's-Products</title>
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
    <div class="banner">
        <img src="images\product brochures\banner.png" />
        <h1>Products</h1>
    </div>

    <div class="cont11">
        <?php
			include "connection.php";
			
			$str3="select * from info_category where c_status";
			$qry3=mysqli_query($conn,$str3);
			while($res3=mysqli_fetch_assoc($qry3))
			{
				?>
        <h2><?=$res3['c_name']?></h2>
        <?php
				$str2="select * from info_sub_cat where sc_status=1 and cat_id=".$res3['cat_id'];
				$qry2=mysqli_query($conn,$str2);
				
				if(mysqli_num_rows($qry2)>0)
				{
					while($res2=mysqli_fetch_assoc($qry2))
					{
						?>
        <h3><?=$res2['sc_name']?></h3>
        <?php
						?>
        <div class="orderBoard">
            <?php
						$str="select DISTINCT p_name,p_img from info_product where p_status=1 and sc_id=".$res2['sc_id'];
						$qry=mysqli_query($conn,$str);
						
						if(mysqli_num_rows($qry)>0)
						{
							while($res=mysqli_fetch_assoc($qry))
							{
							?>
            <div class="card">
                <div class="imgBx">
                    <img src="../../Admin/PHP/images/product image/<?=$res['p_img']?>" />
                </div>
                <div class="content">
                    <div class="prName">
                        <h3><?=$res['p_name']?></h3>
                    </div>
                    <div class="addBtn">
                        <form method="POST" action="single.php">
                            <button name="view" value="<?=$res['p_name']?>">View &#x2192;</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php	
							}
						}
						?>
        </div>
        <?php
					}
				}
			}
			
			mysqli_close($conn);
		?>
    </div>

    <div class="cont12">
        <img src="images/product brochures/muffin.png" />
    </div>

    <div class="cont13">
        <div class="c13left">
            <h1>Eatbit's Little Story</h1>
            <p>Dev Patel and Abrar Patel 20-21 year old founders and directors of Eatbit's snacks PVT LTD, Started
                making potato wafers in 1982 with a minuscule investment of Rs 10,000 at a shed erected in the street.
                They then went on to build a company that has reaped Rs 500 crore as turnover in 2017.</p>
        </div>
        <div class="c13right">
            <img src="images\product brochures\br1.png" />
        </div>
    </div>

    <div class="cont14">
        <div class="c14sub">
            <h1>12</h1>
            <label>Years Experience</label>
        </div>
        <div class="c14sub">
            <h1>21+</h1>
            <label>State Reach</label>
        </div>
        <div class="c14sub">
            <h1>200+</h1>
            <label>Distributors</label>
        </div>
        <div class="c14sub">
            <h1>83k</h1>
            <label>Retailers</label>
        </div>
    </div>

    <div class="cont15">
        <h1>What do they say about Eatbit?</h1>
        <div class="c15body">
            <div class="c15b">
                <table>
                    <tr>
                        <td rowspan=2><img src="images\persons\alish ss.png" /></td>
                        <td>This is very tasty products like saletd chips is awesome and I also like all cakes and also
                            namkeens, I love namkeen</td>
                    </tr>
                    <tr>
                        <td>Alish Mevawala-Artist</td>
                    </tr>
                </table>
            </div>
            <div class="c15b">
                <table>
                    <tr>
                        <td rowspan=2><img src="images\persons\aumshiv ss.jpg" /></td>
                        <td>This is very tasty products like saletd chips is awesome and I also like all cakes and also
                            namkeens, I love namkeen</td>
                    </tr>
                    <tr>
                        <td>Aumshiv Patel-Designer</td>
                    </tr>
                </table>
            </div>
            <div class="c15b">
                <table>
                    <tr>
                        <td rowspan=2><img src="images\persons\vrushabh ss.png" /></td>
                        <td>This is very tasty products like saletd chips is awesome and I also like all chips is
                            awesome and I also like all cakes and also namkeens, I love namkeen</td>
                    </tr>
                    <tr>
                        <td>Vrushabh Rana-Travel</td>
                    </tr>
                </table>
            </div>
            <div class="c15b">
                <table>
                    <tr>
                        <td rowspan=2><img src="images\persons\ayush2.jpeg" /></td>
                        <td>This is very tasty products like saletd chips This is very tasty products like saletd chips
                            is awesome and I also like all cakes and also namkeens, I love namkeen</td>
                    </tr>
                    <tr>
                        <td>Ayush Patel-Artist</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="cont16">
        <h1>Try the taste and ready to snack</br>Right Now!</h1>
        </br>
        </br>
        </br>
        <a href="contact.php">Contact Us</a>
        <div class="c16img">
            <img src="images/product brochures/peri peri chips png.png" />
            <img src="images/product brochures/tomato png.png" class="img2" />
        </div>
    </div>

    <?php
		include "footer.php";
	?>
</body>

</html>