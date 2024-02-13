<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>The Eatbit's-Edit Product</title>
    <link rel="icon" href="images/icons/favicon.ico" type="image/icon type">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="index,follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../CSS/adminStyle.css" />
    <script src="../JS/validation.js"></script>
    <script src="../JS/ajaxLink.js"></script>
    <script src="../JS/jqueryLink.js"></script>

    <style>
    .prSrch {
        background-color: white;
        cursor: pointer;
        z-index: 1000;
        margin: -20px 20px;
        font-size: 1em;
        border: solid 1px gray;
    }

    .prSrch li {
        list-style: none;
        width: 420px;
        text-align: center;
        color: gray;
        font-family: verdana;
    }

    .prSrch li:hover {
        background-color: #ccc;
    }
    </style>

</head>

<body>

    <div class="content" id="">
        <div class="left_side">
            <?php
				include "header.php";
			?>
        </div>
        <div class="right_side" id="">
            <?php
				include "header2.php";
			?>

            <div class="path">
                <div class="text">
                    <a href="product.php"><img src="images/icons/product2.png" />PRODUCTS</a>
                    <b>&nbsp/&nbsp</b>
                    <a href="edit_product.php" style="color:gray;">EDIT PRODUCT</a>
                </div>
            </div>
            <div class="main">
                <?php
                    if(isset($_POST['updt']))
                    {
                       
                            $img=$_FILES['img'];
                            $img_name=$img['name'];
                            $img_ext=explode('.',$img_name);
                            $temp=$img['tmp_name'];
                            
                            $check=strtolower(end($img_ext));
                            
                            $ext=array('png','jpg','jpeg');
                            
                            if(in_array($check,$ext))
                            {
                                $dest='images/product image/'.$img_name;
                                move_uploaded_file($temp,$dest);
                            }
                           
                           if($img_name!="")
                           {
                                $str8="update info_product set p_img='".$img_name."' where p_id=".$_SESSION['p_id'];
                                $qry8=mysqli_query($conn,$str8);
                           }

                        $str="select * from info_product where p_img='".$img_name."' and p_name='".$_POST['p_name']."' and sc_id=".$_POST['sc_id']." and p_id<>".$_SESSION['p_id']." and p_price=".$_POST['p_price'];
                        $qry=mysqli_query($conn,$str);
                        if(mysqli_num_rows($qry)>0)
                        {
                            echo "<script>alert('Product Already Exists');</script>";
                        }
                        else
                        {
							$str7="select * from info_product where p_id=".$_SESSION['p_id'];
							$qry7=mysqli_query($conn,$str7);
							$res7=mysqli_fetch_assoc($qry7);
							
                            $str4="update info_product set p_name='".$_POST['p_name']."', sc_id=".$_POST['sc_id'].", sale_price=".$_POST['p_sp'].", p_price=".$_POST['p_price'].", cost_price='".$_POST['cost_price']."', GST=".$_POST['p_gst'].", HSN='".$_POST['p_hsn']."', p_info='".$_POST['p_info']."' where p_id=".$_SESSION['p_id'];
                            $qry4=mysqli_query($conn,$str4);	
                            
                            $str6="update info_product set p_name='".$_POST['p_name']."' where p_name='".$res7['p_name']."'";
                            $qry6=mysqli_query($conn,$str6);
                        }
                    }
                ?>
                <?php
                    $str="select * from info_product where p_id=".$_SESSION['p_id'];
                    $qry=mysqli_query($conn,$str);
                    $res=mysqli_fetch_assoc($qry);
                ?>
                <form method="POST" enctype="multipart/form-data">

                    <div class="form">

                        <table>
                            <tr>
                                <th class="form_head">
                                    <h2>Edit Product</h2>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="u_img">
                                        <div class="p_icon">
                                            <img src="images/product image/<?php echo $res['p_img'];?>"
                                                onclick="triggerClick()" id="placeholderimg" />
                                            <input type="file" name="img" id="profileimg" onchange="displayimg(this)" />
                                        </div>
                                    </div>

                                </th>
                            </tr>
                            <tr>
                                <td><input type="text" name="p_name" value="<?php echo $res['p_name']?>" id="product"
                                        autocomplete="off" /></td>
                            </tr>
                            <tr>
                                <td>
                                    <div id="productList"></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select id="category" id="category" onChange="change_category()">
                                        <option>Choose Category</option>
                                        <?php
                                            $str1="select * from info_category";
                                            $qry1=mysqli_query($conn,$str1);
                                            $str3="select * from info_sub_cat where sc_id=".$res['sc_id'];
                                            $qry3=mysqli_query($conn,$str3);
                                            $res3=mysqli_fetch_assoc($qry3);
                                            while($res1=mysqli_fetch_assoc($qry1))
                                            {
                                                if($res1['cat_id']==$res3['cat_id'])
                                                {
                                                    echo "<option value='".$res1['cat_id']."' selected >".$res1['c_name']."</option>";
                                                }
                                                else
                                                {
                                                    echo "<option value='".$res1['cat_id']."'>".$res1['c_name']."</option>";
                                                }
                                                
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select name="sc_id" id="sub_cat">
                                        <option>Choose Sub-Category</option>
                                        <?php
                                            $str2="select * from info_sub_cat where cat_id=".$res3['cat_id'];
                                            $qry2=mysqli_query($conn,$str2);
                                            while($res2=mysqli_fetch_assoc($qry2))
                                            {
                                                if($res2['sc_id']==$res['sc_id'])
                                                {
                                                    echo "<option value='".$res2['sc_id']."' selected >".$res2['sc_name']."</option>";
                                                }
                                                else
                                                {
                                                    echo "<option value='".$res2['sc_id']."'>".$res2['sc_name']."</option>";        
                                                }
                                                                                        
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="" style="color:gray">Cost price</label></td>
                            </tr>
                            <tr>
                                <td>

                                    <input type="number" step="0.01" name="cost_price"
                                        value="<?php echo $res['cost_price'];?>" />
                                </td>
                            </tr>
                            <tr>
                                <td><label for="" style="color:gray">Sale price</label></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="number" step="0.01" name="p_sp"
                                        value="<?php echo $res['sale_price'];?>" />
                                </td>
                            </tr>
                            <tr>
                                <td><label for="" style="color:gray">Price</label></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="number" min="1" max="100" name="p_price"
                                        value="<?php echo $res['p_price'];?>" />
                                </td>
                            </tr>
                            <tr>
                                <td><label for="" style="color:gray">GST%</label></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="number" name="p_gst" value="<?php echo $res['GST'];?>" />
                                </td>
                            </tr>
                            <tr>
                                <td><label for="" style="color:gray">HSN</label></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="number" name="p_hsn" value="<?php echo $res['HSN'];?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <textarea name="p_info"><?php echo $res['p_info'];?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th><input type="submit" name="updt" value="Update" /></th>
                            </tr>
                        </table>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#product').keyup(function() {
            var query = $(this).val();
            if (query != '') {
                $.ajax({
                    url: "AJAX/productList.php",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#productList').fadeIn();
                        $('#productList').html(data);
                    }
                });
            } else {
                $('#productList').fadeOut();
                $('#productList').html("");
            }
        });
        $(document).on('click', 'li', function() {
            if ($(this).text() != 'Product Not Found') {
                $('#product').val($(this).text());
                $('#productList').fadeOut();
            }

        });
    });
    </script>

    <script type="text/javascript">
    function change_category() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "ajax.php?categoryid=" + document.getElementById("category").value, false);
        xmlhttp.send(null);
        document.getElementById("sub_cat").innerHTML = xmlhttp.responseText;
    }
    </script>
</body>

</html>