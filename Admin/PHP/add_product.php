<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>The Eatbit's-Add Product</title>
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
                    <a href="product.php"><img src="images/icons/PRODUCT2.png" />PRODUCTS</a>
                    <b>&nbsp/&nbsp</b>
                    <a href="add_product.php" style="color:gray;">ADD NEW PRODUCT</a>
                </div>
            </div>
            <?php
                if(isset($_POST['sbt']))
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
                    $str3="select * from info_product where p_img='".$img_name."'";
			        $qry3=mysqli_query($conn,$str3);
			        
                    $str4="select * from info_product where p_name='".$_POST['p_name']."' and p_img='".$img_name."' and sc_id=".$_POST['sc_id']." and p_price=".$_POST['p_price'];
                    $qry4=mysqli_query($conn,$str4);
                    if(mysqli_num_rows($qry4)>0)
                    {
                        echo "<script>alert('Product Already Exists');</script>";
		            }
                    else
                    {
                        $str5="select * from info_product where p_name='".$_POST['p_name']."'";
                        $qry5=mysqli_query($conn,$str5);
                        $res5=mysqli_fetch_assoc($qry5);

                        if(mysqli_num_rows($qry5)>0)
                        {
                            $img_name=$res5['p_img'];
                        }

                        $str2="insert into info_product (p_img,p_name,sc_id,cost_price,sale_price,p_price,GST,HSN,p_info) values('".$img_name."','".$_POST['p_name']."',".$_POST['sc_id'].",".$_POST['p_cp'].",".$_POST['p_sp'].",".$_POST['p_price'].",".$_POST['p_gst'].",'".$_POST['p_hsn']."','".$_POST['p_info']."')";
                        $qry2=mysqli_query($conn,$str2);
                    }
                    
                }
            ?>
            <div class="main">
                <form method="POST" enctype="multipart/form-data">

                    <div class="form">

                        <table>
                            <tr>
                                <th class="form_head">
                                    <h2>Add New Product</h2>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="u_img">
                                        <div class="p_icon">
                                            <img src="images/icons/add_product.png" onclick="triggerClick()"
                                                id="placeholderimg" />
                                            <input type="file" name="img" id="profileimg" onchange="displayimg(this)"
                                             />
                                        </div>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="p_name" placeholder="Enter product name" required
                                        id="product" autocomplete="off" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div id="productList"></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select id="category" onChange="change_category()" required>
                                        <option value="">Choose Category</option>
                                        <?php
                                            $str="select * from info_category where c_status=1";
                                            $qry=mysqli_query($conn,$str);
                                            while($res=mysqli_fetch_assoc($qry))
                                            {
                                                echo "<option value='".$res['cat_id']."'>".$res['c_name']."</option>";
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select name="sc_id" id="sub_cat" required>
                                        <option value="">Choose Sub-Category</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="number" step="0.01" name="p_cp" placeholder="₹ Cost Price" min="1"
                                        max="100" required />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="number" name="p_sp" step="0.01" placeholder="₹ Selling Price [Boxes]"
                                        min="100" required />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="number" name="p_price" placeholder="₹ MRP" min="5" max="100"
                                        required />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="number" name="p_gst" id="gst" placeholder="Enter GST %" required />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="number" name="p_hsn" id="hsn" placeholder="Enter Product HSN Code" required />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <textarea name="p_info" placeholder="Enter Product Information" id="dtl" required></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th><input type="submit" name="sbt" value="Add" /></th>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    function change_category() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "ajax.php?categoryid=" + document.getElementById("category").value, false);
        xmlhttp.send(null);
        document.getElementById("sub_cat").innerHTML = xmlhttp.responseText;
    }
    </script>

    <script type="text/javascript">

    var c_id=0;    
    var sc_id=0;
    var gst=0;
    var hsn=0;
    var dtl='';
    var img='';

    function select_c() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "selectcat.php?pname=" + document.getElementById("product").value, false);
        xmlhttp.send(null);
        c_id= xmlhttp.responseText;
    }

    function select_sc() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "selectSubCat.php?pname=" + document.getElementById("product").value, false);
        xmlhttp.send(null);
        sc_id= xmlhttp.responseText;
    }

    function select_gst() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "selectGst.php?pname=" + document.getElementById("product").value, false);
        xmlhttp.send(null);
        gst= xmlhttp.responseText;
    }
    
    function select_hsn() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "selectHsn.php?pname=" + document.getElementById("product").value, false);
        xmlhttp.send(null);
        hsn= xmlhttp.responseText;
    }

    function select_dtl() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "selectDtl.php?pname=" + document.getElementById("product").value, false);
        xmlhttp.send(null);
        dtl= xmlhttp.responseText;
    }

    function select_img() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "selectImg.php?pname=" + document.getElementById("product").value, false);
        xmlhttp.send(null);
        img= xmlhttp.responseText;
    }

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
                
                select_c();
                select_sc();
                select_gst();
                select_hsn();
                select_dtl();  
                select_img();
                
                var category=document.getElementById('category');
                for(var i,j=0;i=category.options[j];j++){
                        if(i.value==c_id){
                            category.selectedIndex=j;
                            break;
                        }
                    }

                change_category();   
                var sub_cat=document.getElementById('sub_cat');
                for(var k,l=0;k=sub_cat.options[l];l++){
                        if(k.value==sc_id){
                            sub_cat.selectedIndex=l;
                            break;
                        }
                    }

                document.getElementById('gst').value=gst;    
                document.getElementById('hsn').value=hsn;    
                document.getElementById('dtl').value=dtl;
                document.getElementById('placeholderimg').src='images/product image/'+img;
                    
                $('#productList').fadeOut();
            }

        });
    });
    </script>

   
</body>

</html>