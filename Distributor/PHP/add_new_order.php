<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>The Eatbit's-Place New Order</title>
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
	?>


    <?php
		include "connection.php";
		
		$str12="select * from info_sale where ord_status=1 and d_id=".$_SESSION['dis_id'];
		$qry12=mysqli_query($conn,$str12);
		$res12=mysqli_fetch_assoc($qry12);
		
		$sale_id=0;
		
		if(mysqli_num_rows($qry12)>0)
		{
			$sale_id=$res12['sale_id'];
		}
		
		mysqli_close($conn);
		
		if(isset($_POST['cnfrm']))
		{
			include "connection.php";
			
			if(mysqli_num_rows($qry12)<1)
			{
				$str11="insert into info_sale (d_id,ord_status) values(".$_SESSION['dis_id'].",1)";
				$qry11=mysqli_query($conn,$str11);
			}
			
			$str10="select * from info_sale where ord_status=1 and d_id=".$_SESSION['dis_id'];
			$qry10=mysqli_query($conn,$str10);
			$res10=mysqli_fetch_assoc($qry10);
			
			$str6="select * from info_category where c_status";
			$qry6=mysqli_query($conn,$str6);
			while($res6=mysqli_fetch_assoc($qry6))
			{
				$str7="select * from info_sub_cat where sc_status=1 and cat_id=".$res6['cat_id'];
				$qry7=mysqli_query($conn,$str7);
				
				if(mysqli_num_rows($qry7)>0)
				{
					while($res7=mysqli_fetch_assoc($qry7))
					{
						$str8="select DISTINCT p_name,p_img from info_product where sc_id=".$res7['sc_id'];
						$qry8=mysqli_query($conn,$str8);
						
						if(mysqli_num_rows($qry8)>0)
						{
							while($res8=mysqli_fetch_assoc($qry8))
							{
								$str9="select * from info_product where p_status=1 and p_name='".$res8['p_name']."'";
								$qry9=mysqli_query($conn,$str9);
								while($res9=mysqli_fetch_assoc($qry9))
								{
									if($_POST['qtyBx'.$res9['p_id']]!=0)
									{
										$str14="select * from info_sale_qty where sale_id=".$res10['sale_id']." and p_id=".$res9['p_id'];
										$qry14=mysqli_query($conn,$str14);
										
										if(mysqli_num_rows($qry14)>0)
										{
											$str11="update info_sale_qty set p_qty=".$_POST['qtyBx'.$res9['p_id']]." where p_id=".$res9['p_id']." and sale_id=".$res10['sale_id'];
											$qry11=mysqli_query($conn,$str11);
										}
										else
										{
											$str11="insert into info_sale_qty (p_id,p_qty,sale_id,s_prc) values(".$res9['p_id'].",".$_POST['qtyBx'.$res9['p_id']].",".$res10['sale_id'].",".$res9['sale_price'].")";
											$qry11=mysqli_query($conn,$str11);
										}
										
										
									
									}
								}
							}
						}
					}
				}
			}
			
			mysqli_close($conn);
			echo "<script>window.location.href='confirm.php';</script>";
		}
	?>



    <div class="banner">
        <img src="images\product brochures\banner.png" />
        <h1>Products</h1>
    </div>

    <div class="cont11">
        <form method="POST">
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
                        <div class="ss_cont">

                            <?php
										$str5="select * from info_product where p_status=1 and p_name='".$res['p_name']."'";
										$qry5=mysqli_query($conn,$str5);
										while($res5=mysqli_fetch_assoc($qry5))
										{
											$str13="select * from info_sale_qty where sale_id=".$sale_id." and p_id=".$res5['p_id'];
											$qry13=mysqli_query($conn,$str13);
											$res13=mysqli_fetch_assoc($qry13);
											$qty=0;
											if(mysqli_num_rows($qry13)>0)
											{
												$qty=$res13['p_qty'];
											}
											
										?>
                            <div class="ss_bd fade">
                                <label>₹<?=$res5['p_price']?></label>
                                <div class="qty">
                                    <span onclick='preNum<?=$res5['p_id']?>()'>-</span>
                                    <input type="text" id="box<?=$res5['p_id']?>" name="qtyBx<?=$res5['p_id']?>"
                                        onkeypress='isNum(event)' value="<?=$qty?>" />
                                    <span onclick='nxtNum<?=$res5['p_id']?>()'>+</span>
                                </div>
                            </div>
                            <?php
										
										echo "<script>
							
										var Bx".$res5['p_id']."=document.getElementById('box".$res5['p_id']."');
															
										function nxtNum".$res5['p_id']."(){
										var num=parseInt(Bx".$res5['p_id'].".value);
										if(num<100)
										{
											num=num+1;
											Bx".$res5['p_id'].".value=num;
										}
																
										}
															
															
										function preNum".$res5['p_id']."(){
																
											var num=parseInt(Bx".$res5['p_id'].".value);
											if(num>0)
											{
												num=num-1;
												Bx".$res5['p_id'].".value=num;
											}
																
										}	
		
									</script>";
										
										}
									?>
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
            <button name="cnfrm" class="cnfrm">Show Totals</button>
        </form>
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
    <script>
    function isNum(e) {
        var ch = String.fromCharCode(e.which);
        if (!(/[0-9]/.test(ch))) {
            e.preventDefault();
        }
    }
    </script>
</body>

</html>