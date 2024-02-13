<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <title>The Eatbit's-Help</title>
        <link rel="icon" href="images/icons/favicon.ico" type="image/icon type">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="robots" content="index,follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="../CSS/adminStyle.css" />
        <script src="../JS/ajaxLink.js"></script>
        <script src="../JS/jqueryLink.js"></script>
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
                        <a href="help.php"><img src="images/icons/help2.png" />HELP</a>
                    </div>
                </div>
                <div class="main">
                    <div class="help">
                        <div class="help2">
                            <div class="help3">
                                <div class="help4">
                                    <div class="topic">
                                        <table>
                                            <tr>
                                                <td>
                                                    <label onclick="login()">Authentication</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label onclick="admin()">The Admin Page</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label onclick="manager()">The Manager Page</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label onclick="distributor()">The Distributor Page</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label onclick="category()">The Category Page</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label onclick="product()">The Products Page</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label onclick="feedback()">The Feedback Page</label>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="information">
                                        <div class="information2">
                                            <div class="head" onclick="s1()" id="l1">
                                                <img src="images/icons/down.png" id="ig1" />
                                                <label>Login to conversation analytics system</label>
                                            </div>
                                            <div class="show1" id="show1">
                                                <div class="topic">
                                                    1.Open login Page
                                                </div>
                                                <p>
                                                    To accress the login page,go to <a href="login.php">Login
                                                        In</a>.<br>
                                                    There will be a login shown to you.

                                                </p>
                                                <div class="topic">
                                                    2.Fill the Email and Password
                                                </div>
                                                <p>
                                                    Make sure that you enter correct email and password.<br>
                                                    The email is an unique string and password at least 8 charaters.

                                                </p>
                                                <div class="topic">
                                                    3.Click Login Button
                                                </div>
                                                <p>
                                                    If the information is correct,you will be redirected to system
                                                    dashboard.
                                                </p>
                                            </div>
                                            <div class="head2" onclick="s2()" id="l2">
                                                <img src="images/icons/down.png" id="ig2" />
                                                <label>Register new admin</label>
                                            </div>
                                            <div class="show1" id="show2">
                                                <div class="topic">
                                                    1.Open Add Admin Page
                                                </div>
                                                <p>
                                                    To accress the add admin page, go to <a href="add_admin.php"
                                                        target="_blank">Add
                                                        admin</a>.<br>
                                                    There you can shown the add admin form.

                                                </p>
                                                <div class="topic">
                                                    2.Fill the Admin Form
                                                </div>
                                                <p>
                                                    It is compulsory to fill all details.<br>
                                                    Make sure that you enter correct email and password.<br>
                                                    The email is an unique string and password at least 8 charaters.
                                                </p>
                                                <div class="topic">
                                                    3.Click Add Button
                                                </div>
                                                <p>
                                                    Once you click on add button new admin will be inserted.</br>
                                                    If you enter unique email then admin inserted popup will apear else
                                                    admin already exists popup will appear.<br>
                                                </p>
                                            </div>
                                            <div class="head2" onclick="s3()" id="l3">
                                                <img src="images/icons/down.png" id="ig3" />
                                                <label>Manage admin</label>
                                            </div>
                                            <div class="show1" id="show3">
                                                <div class="topic">
                                                    1.Open Manage Admin Page
                                                </div>
                                                <p>
                                                    To accress manage admin page, go to <a href="admin.php"
                                                        target="_blank">Manage Admin</a>.<br>
                                                    There will be shown all available Admin and there details.</br>
                                                    The status of admin is also shown on admin page.
                                                </p>
                                                <div class="topic">
                                                    2.Delete Admin
                                                </div>
                                                <p>
                                                    You can also delete admin if required.<br>
                                                    just click on the delete button of a particular admin.
                                                </p>
                                            </div>
                                            <div class="head2" onclick="s4()" id="l4">
                                                <img src="images/icons/down.png" id="ig4" />
                                                <label>Register new Manager</label>
                                            </div>
                                            <div class="show1" id="show4">
                                                <div class="topic">
                                                    1.Open Add Manager Page
                                                </div>
                                                <p>
                                                    To accress the add manager page, go to <a href="add_manager.php"
                                                        target="_blank">Add
                                                        manager</a>.<br>
                                                    There will be shown add manager form.

                                                </p>
                                                <div class="topic">
                                                    2.Fill the Manager Form
                                                </div>
                                                <p>
                                                    It is compulsory to fill all details.<br>
                                                    Make sure that you enter correct email and password.<br>
                                                    The email is an unique string and password at least 8 charaters.<br>
                                                    Phone Number is an unique number.
                                                </p>
                                                <div class="topic">
                                                    3.Click Add Button
                                                </div>
                                                <p>
                                                    Once you click on add button new manager will be inserted.</br>
                                                    If you enter unique email then new manager inserted popup will apear
                                                    else
                                                    manager already exists popup will appear.<br>
                                                </p>
                                            </div>
                                            <div class="head2" onclick="s5()" id="l5">
                                                <img src="images/icons/down.png" id="ig5" />
                                                <label>Manage manager</label>
                                            </div>
                                            <div class="show1" id="show5">
                                                <div class="topic">
                                                    1.Open Manager Page
                                                </div>
                                                <p>
                                                    To accress manager page, go to <a href="manager.php"
                                                        target="_blank">Manage Manger</a>.<br>
                                                    There will be shown all available manager and there details.</br>
                                                    The status of manager is also shown on manager page.
                                                </p>
                                                <div class="topic">
                                                    2.Delete Manager
                                                </div>
                                                <p>
                                                    You can also delete manager if required.<br>
                                                    just click on the delete button of a particular manager.
                                                </p>
                                            </div>
                                            <div class="head2" onclick="s6()" id="l6">
                                                <img src="images/icons/down.png" id="ig6" />
                                                <label>Manage Distributor</label>
                                            </div>
                                            <div class="show1" id="show6">
                                                <div class="topic">
                                                    1.Open Distributor Page
                                                </div>
                                                <p>
                                                    To accress distributor page, go to <a href="distributor.php"
                                                        target="_blank">Manage Distrubutor</a>.<br>
                                                    There will be shown all available distributors.</br>
                                                    The status of distributor is also shown on distributor page.
                                                </p>
                                                <div class="topic">
                                                    2.I Button
                                                </div>
                                                <p>
                                                    On Clicking I button you can view all distributor details and there
                                                    Agency details<br>
                                                </p>
                                                <div class="topic">
                                                    3.Delete Distributor
                                                </div>
                                                <p>
                                                    You can also delete distributor if required.<br>
                                                    just click on the delete button of a particular distributor.
                                                </p>
                                            </div>
                                            <div class="head2" onclick="s7()" id="l7">
                                                <img src="images/icons/down.png" id="ig7" />
                                                <label>Manage Category</label>
                                            </div>
                                            <div class="show1" id="show7">
                                                <div class="topic">
                                                    1.Open Category Page
                                                </div>
                                                <p>
                                                    To accress category page, go to <a href="category.php"
                                                        target="_blank">Manage Category</a>.<br>
                                                    There will be shown all Product Category .</br>
                                                </p>
                                                <div class="topic">
                                                    2.Category Card
                                                </div>
                                                <p>
                                                    Every categories are displayed in different card.<br>
                                                    In Every card sub-category and products are shown.<br>
                                                    Every sub-category has shown number of products available.
                                                </p>
                                                <div class="topic">
                                                    3.Edit Button
                                                </div>
                                                <p>
                                                    In every category edit button is given.<br>
                                                    On clicking edit button we can change name of particular
                                                    category.<br>
                                                    We can also change name,status of sub-category avaiable in that
                                                    particular category and we can aslo delete sub-category if products
                                                    are
                                                    not available in that particular sub-category.
                                                </p>
                                                <div class="topic">
                                                    4.Status Button
                                                </div>
                                                <p>
                                                    In every category status button is given.<br>
                                                    On clicking status button we can change status to active or
                                                    deactive.<br>
                                                    If we change status to active all sub-categories and products
                                                    available
                                                    in that particular category will aslo actived.<br>
                                                    Same to deactive if we change satush to deactive all sub-categories
                                                    and
                                                    prodoucts will deactived.
                                                </p>
                                                <div class="topic">
                                                    4.Delete Button
                                                </div>
                                                <p>
                                                    In every category delete button is given.<br>
                                                    On clicking delete button the category will be deleted if
                                                    sub-categories
                                                    and products are availabe in that particular category.<br>
                                                </p>
                                            </div>
                                            <div class="head2" onclick="s8()" id="l8">
                                                <img src="images/icons/down.png" id="ig8" />
                                                <label>Add new Category and Sub-Category</label>
                                            </div>
                                            <div class="show1" id="show8">
                                                <div class="topic">
                                                    1.Open Add Category Page
                                                </div>
                                                <p>
                                                    To accress the add category page, go to <a href="add_category.php"
                                                        target="_blank">Add
                                                        Category and Sub-Category</a>.<br>
                                                    There will be shown two forms one for Category and other for
                                                    Sub-Category.

                                                </p>
                                                <div class="topic">
                                                    2.Fill the Category Form
                                                </div>
                                                <p>
                                                    It is compulsory to fill all details.<br>
                                                    Category name should be unique string.<br>
                                                </p>
                                                <div class="topic">
                                                    3.Click Add Button(Category)
                                                </div>
                                                <p>
                                                    Once you click on add button new category will be inserted.</br>
                                                </p>
                                                <div class="topic">
                                                    4.Fill the Sub-Category Form
                                                </div>
                                                <p>
                                                    It is compulsory to fill all details.<br>
                                                    Sub-Category name should be unique string.<br>
                                                </p>
                                                <div class="topic">
                                                    3.Click Add Button(Sub-Category)
                                                </div>
                                                <p>
                                                    Once you click on add button new sub-category will be inserted in
                                                    that
                                                    particular category we have selected.</br>
                                                </p>
                                            </div>
                                            <div class="head2" onclick="s9()" id="l9">
                                                <img src="images/icons/down.png" id="ig9" />
                                                <label>Manage Product</label>
                                            </div>
                                            <div class="show1" id="show9">
                                                <div class="topic">
                                                    1.Open Product Page
                                                </div>
                                                <p>
                                                    To accress product page, go to <a href="product.php"
                                                        target="_blank">Manage Product</a>.<br>
                                                    There will be shown all Products and there details.</br>
                                                </p>
                                                <div class="topic">
                                                    2.Status Button
                                                </div>
                                                <p>
                                                    In every products status button is given.<br>
                                                    On clicking status button we can change status to active or
                                                    deactive.<br>
                                                    If we change status to active the particular product will be actived
                                                    and
                                                    distributor can place order for that product.<br>
                                                    Same to deactive if we change status to deactive particular
                                                    products will deactived.
                                                </p>
                                                <div class="topic">
                                                    3.Edit Button
                                                </div>
                                                <p>
                                                    In every products edit button is given.<br>
                                                    On clicking edit button we can change
                                                    image,name,category,sub-category
                                                    and price of that particualar product.
                                                </p>

                                                <div class="topic">
                                                    4.Delete Button
                                                </div>
                                                <p>
                                                    In every products delete button is given.<br>
                                                    On clicking delete button the product will be deleted from
                                                    sub-category
                                                    of that particular product.<br>
                                                </p>
                                            </div>
                                            <div class="head2" onclick="s10()" id="l10">
                                                <img src="images/icons/down.png" id="ig10" />
                                                <label>Add New Product</label>
                                            </div>
                                            <div class="show1" id="show10">
                                                <div class="topic">
                                                    1.Open Add Product Page
                                                </div>
                                                <p>
                                                    To accress the add product page, go to <a href="add_product.php"
                                                        target="_blank">Add Product</a>.<br>
                                                    There will be shown add product form

                                                </p>
                                                <div class="topic">
                                                    2.Fill the add product Form
                                                </div>
                                                <p>
                                                    It is compulsory to fill all details.<br>
                                                    Product name should be unique string.<br>
                                                </p>
                                                <div class="topic">
                                                    3.Click Add Button(Category)
                                                </div>
                                                <p>
                                                    Once you click on add button new product will be inserted in that
                                                    particular sub-category we selected.</br>
                                                </p>
                                            </div>
                                            <div class="head2" onclick="s11()" id="l11">
                                                <img src="images/icons/down.png" id="ig11" />
                                                <label>View Feedback</label>
                                            </div>
                                            <div class="show1" id="show11">
                                                <div class="topic">
                                                    1.Open Feedback Page
                                                </div>
                                                <p>
                                                    To accress feedback page, go to <a href="#" target="_blank">View
                                                        Feedback</a>.<br>
                                                    There will be shown all feebacks received from visitor and manager
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!------------------------------------------Authentication--------------------->
        <script>
        /*-------------Image--------------------*/
        var ig1 = document.getElementById("ig1");
        var ig2 = document.getElementById("ig2");
        var ig3 = document.getElementById("ig3");
        var ig4 = document.getElementById("ig4");
        var ig5 = document.getElementById("ig5");
        var ig6 = document.getElementById("ig6");
        var ig7 = document.getElementById("ig7");
        var ig8 = document.getElementById("ig8");
        var ig9 = document.getElementById("ig9");
        var ig10 = document.getElementById("ig10");
        var ig11 = document.getElementById("ig11");
        /*---------------Title-------------- */
        var l1 = document.getElementById("l1");
        var l2 = document.getElementById("l2");
        var l3 = document.getElementById("l3");
        var l4 = document.getElementById("l4");
        var l5 = document.getElementById("l5");
        var l6 = document.getElementById("l6");
        var l7 = document.getElementById("l7");
        var l8 = document.getElementById("l8");
        var l9 = document.getElementById("l9");
        var l10 = document.getElementById("l10");
        var l11 = document.getElementById("l11");
        /*---------------Content-------------- */
        var show1 = document.getElementById("show1");
        var show2 = document.getElementById("show2");
        var show3 = document.getElementById("show3");
        var show4 = document.getElementById("show4");
        var show5 = document.getElementById("show5");
        var show6 = document.getElementById("show6");
        var show7 = document.getElementById("show7");
        var show8 = document.getElementById("show8");
        var show9 = document.getElementById("show9");
        var show10 = document.getElementById("show10");
        var show11 = document.getElementById("show11");

        var au1;

        function s1() {
            if (au1 == 1) {
                show1.style.display = "none";
                ig1.src = "images/icons/down.png";
                return au1 = 0;
            } else {
                show1.style.display = "block";
                ig1.src = "images/icons/up.png";
                return au1 = 1;
            }
        }
        var l;

        function login() {
            if (l == 1) {
                /*----------Image---------*/
                ig1.src = "images/icons/up.png";
                /*--------Title-------- */
                l1.style.display = "flex";
                l2.style.display = "none";
                l3.style.display = "none";
                l4.style.display = "none";
                l5.style.display = "none";
                l6.style.display = "none";
                l7.style.display = "none";
                l8.style.display = "none";
                l9.style.display = "none";
                l10.style.display = "none";
                l11.style.display = "none";
                /*--------Content-------- */
                show1.style.display = "none";
                show2.style.display = "none";
                show3.style.display = "none";
                show4.style.display = "none";
                show5.style.display = "none";
                show6.style.display = "none";
                show7.style.display = "none";
                show8.style.display = "none";
                show9.style.display = "none";
                show10.style.display = "none";
                show11.style.display = "none";

                return au1 = 1;
                return l = 0;
            } else {
                /*----------Image---------*/
                ig1.src = "images/icons/down.png";
                /*--------Title-------- */
                l1.style.display = "flex";
                l2.style.display = "none";
                l3.style.display = "none";
                l4.style.display = "none";
                l5.style.display = "none";
                l6.style.display = "none";
                l7.style.display = "none";
                l8.style.display = "none";
                l9.style.display = "none";
                l10.style.display = "none";
                l11.style.display = "none";
                /*--------Content-------- */
                show1.style.display = "none";
                show2.style.display = "none";
                show3.style.display = "none";
                show4.style.display = "none";
                show5.style.display = "none";
                show6.style.display = "none";
                show7.style.display = "none";
                show8.style.display = "none";
                show9.style.display = "none";
                show10.style.display = "none";
                show11.style.display = "none";

                return au1 = 0;
                return l = 1;
            }
        }

        /*----------------------Admin-----------------------------*/
        var au2;

        function s2() {
            if (au2 == 1) {
                show2.style.display = "none";
                ig2.src = "images/icons/down.png";
                return au2 = 0;
            } else {
                show2.style.display = "block";
                ig2.src = "images/icons/up.png";
                return au2 = 1;
            }
        }
        var au3;

        function s3() {
            if (au3 == 1) {
                show3.style.display = "none";
                ig3.src = "images/icons/down.png";
                return au3 = 0;
            } else {
                show3.style.display = "block";
                ig3.src = "images/icons/up.png";
                return au3 = 1;
            }
        }
        var b2;

        function admin() {
            if (b2 == 1) {
                /*----------Image-------------*/
                ig2.src = "images/icons/up.png";
                ig3.src = "images/icons/up.png";
                /*--------Title-------- */
                l1.style.display = "none";
                l2.style.display = "flex";
                l3.style.display = "flex";
                l4.style.display = "none";
                l5.style.display = "none";
                l6.style.display = "none";
                l7.style.display = "none";
                l8.style.display = "none";
                l9.style.display = "none";
                l10.style.display = "none";
                l11.style.display = "none";
                /*--------Content-------- */
                show1.style.display = "none";
                show2.style.display = "none";
                show3.style.display = "none";
                show4.style.display = "none";
                show5.style.display = "none";
                show6.style.display = "none";
                show7.style.display = "none";
                show8.style.display = "none";
                show9.style.display = "none";
                show10.style.display = "none";
                show11.style.display = "none";

                return au2 = 1;
                return au3 = 1;
                return b2 = 0;
            } else {
                /*-----------Image----------- */
                ig2.src = "images/icons/down.png";
                ig3.src = "images/icons/down.png";
                /*--------Title-------- */
                l1.style.display = "none";
                l2.style.display = "flex";
                l3.style.display = "flex";
                l4.style.display = "none";
                l5.style.display = "none";
                l6.style.display = "none";
                l7.style.display = "none";
                l8.style.display = "none";
                l9.style.display = "none";
                l10.style.display = "none";
                l11.style.display = "none";
                /*--------Content-------- */
                show1.style.display = "none";
                show2.style.display = "none";
                show3.style.display = "none";
                show4.style.display = "none";
                show5.style.display = "none";
                show6.style.display = "none";
                show7.style.display = "none";
                show8.style.display = "none";
                show9.style.display = "none";
                show10.style.display = "none";
                show11.style.display = "none";

                return [au3 = 0, au2 = 0];
                return b2 = 1;
            }
        }

        /*-----------------------Manager------------------------------*/
        var au4;

        function s4() {
            if (au4 == 1) {
                show4.style.display = "none";
                ig4.src = "images/icons/down.png";
                return au4 = 0;
            } else {
                show4.style.display = "block";
                ig4.src = "images/icons/up.png";
                return au4 = 1;
            }
        }
        var au5;

        function s5() {
            if (au5 == 1) {
                show5.style.display = "none";
                ig5.src = "images/icons/down.png";
                return au5 = 0;
            } else {
                show5.style.display = "block";
                ig5.src = "images/icons/up.png";
                return au5 = 1;
            }
        }
        var b3;

        function manager() {
            if (b3 == 1) {
                /*----------Image-------------*/
                ig4.src = "images/icons/up.png";
                ig5.src = "images/icons/up.png";
                /*--------Title-------- */
                l1.style.display = "none";
                l2.style.display = "none";
                l3.style.display = "none";
                l4.style.display = "flex";
                l5.style.display = "flex";
                l6.style.display = "none";
                l7.style.display = "none";
                l8.style.display = "none";
                l9.style.display = "none";
                l10.style.display = "none";
                l11.style.display = "none";
                /*--------Content-------- */
                show1.style.display = "none";
                show2.style.display = "none";
                show3.style.display = "none";
                show4.style.display = "none";
                show5.style.display = "none";
                show6.style.display = "none";
                show7.style.display = "none";
                show8.style.display = "none";
                show9.style.display = "none";
                show10.style.display = "none";
                show11.style.display = "none";

                return au4 = 1;
                return au5 = 1;
                return b3 = 0;
            } else {
                /*-----------Image----------- */
                ig4.src = "images/icons/down.png";
                ig5.src = "images/icons/down.png";
                /*--------Title-------- */
                l1.style.display = "none";
                l2.style.display = "none";
                l3.style.display = "none";
                l4.style.display = "flex";
                l5.style.display = "flex";
                l6.style.display = "none";
                l7.style.display = "none";
                l8.style.display = "none";
                l9.style.display = "none";
                l10.style.display = "none";
                l11.style.display = "none";
                /*--------Content-------- */
                show1.style.display = "none";
                show2.style.display = "none";
                show3.style.display = "none";
                show4.style.display = "none";
                show5.style.display = "none";
                show6.style.display = "none";
                show7.style.display = "none";
                show8.style.display = "none";
                show9.style.display = "none";
                show10.style.display = "none";
                show11.style.display = "none";

                return [au4 = 0, au5 = 0];
                return b3 = 1;
            }
        }

        /*-----------------------Distributor------------------------------*/
        var au6;

        function s6() {
            if (au6 == 1) {
                show6.style.display = "none";
                ig6.src = "images/icons/down.png";
                return au6 = 0;
            } else {
                show6.style.display = "block";
                ig6.src = "images/icons/up.png";
                return au6 = 1;
            }
        }

        var b4;

        function distributor() {
            if (b4 == 1) {
                /*----------Image-------------*/
                ig6.src = "images/icons/up.png";
                /*--------Title-------- */
                l1.style.display = "none";
                l2.style.display = "none";
                l3.style.display = "none";
                l4.style.display = "none";
                l5.style.display = "none";
                l6.style.display = "flex";
                l7.style.display = "none";
                l8.style.display = "none";
                l9.style.display = "none";
                l10.style.display = "none";
                l11.style.display = "none";
                /*--------Content-------- */
                show1.style.display = "none";
                show2.style.display = "none";
                show3.style.display = "none";
                show4.style.display = "none";
                show5.style.display = "none";
                show6.style.display = "none";
                show7.style.display = "none";
                show8.style.display = "none";
                show9.style.display = "none";
                show10.style.display = "none";
                show11.style.display = "none";

                return au6 = 1;
                return b4 = 0;
            } else {
                /*-----------Image----------- */
                ig6.src = "images/icons/down.png";
                /*--------Title-------- */
                l1.style.display = "none";
                l2.style.display = "none";
                l3.style.display = "none";
                l4.style.display = "none";
                l5.style.display = "none";
                l6.style.display = "flex";
                l7.style.display = "none";
                l8.style.display = "none";
                l9.style.display = "none";
                l10.style.display = "none";
                l11.style.display = "none";
                /*--------Content-------- */
                show1.style.display = "none";
                show2.style.display = "none";
                show3.style.display = "none";
                show4.style.display = "none";
                show5.style.display = "none";
                show6.style.display = "none";
                show7.style.display = "none";
                show8.style.display = "none";
                show9.style.display = "none";
                show10.style.display = "none";
                show11.style.display = "none";

                return au6 = 0;
                return b4 = 1;
            }
        }

        /*-----------------------Category------------------------------*/
        var au7;

        function s7() {
            if (au7 == 1) {
                show7.style.display = "none";
                ig7.src = "images/icons/down.png";
                return au7 = 0;
            } else {
                show7.style.display = "block";
                ig7.src = "images/icons/up.png";
                return au7 = 1;
            }
        }

        var au8;

        function s8() {
            if (au8 == 1) {
                show8.style.display = "none";
                ig8.src = "images/icons/down.png";
                return au8 = 0;
            } else {
                show8.style.display = "block";
                ig8.src = "images/icons/up.png";
                return au8 = 1;
            }
        }

        var b5;

        function category() {
            if (b5 == 1) {
                /*----------Image-------------*/
                ig7.src = "images/icons/up.png";
                ig8.src = "images/icons/up.png";
                /*--------Title-------- */
                l1.style.display = "none";
                l2.style.display = "none";
                l3.style.display = "none";
                l4.style.display = "none";
                l5.style.display = "none";
                l6.style.display = "none";
                l7.style.display = "flex";
                l8.style.display = "flex";
                l9.style.display = "none";
                l10.style.display = "none";
                l11.style.display = "none";
                /*--------Content-------- */
                show1.style.display = "none";
                show2.style.display = "none";
                show3.style.display = "none";
                show4.style.display = "none";
                show5.style.display = "none";
                show6.style.display = "none";
                show7.style.display = "none";
                show8.style.display = "none";
                show9.style.display = "none";
                show10.style.display = "none";
                show11.style.display = "none";

                return au7 = 1;
                return au8 = 1;
                return b5 = 0;
            } else {
                /*-----------Image----------- */
                ig7.src = "images/icons/down.png";
                ig8.src = "images/icons/down.png";
                /*--------Title-------- */
                l1.style.display = "none";
                l2.style.display = "none";
                l3.style.display = "none";
                l4.style.display = "none";
                l5.style.display = "none";
                l6.style.display = "none";
                l7.style.display = "flex";
                l8.style.display = "flex";
                l9.style.display = "none";
                l10.style.display = "none";
                l11.style.display = "none";
                /*--------Content-------- */
                show1.style.display = "none";
                show2.style.display = "none";
                show3.style.display = "none";
                show4.style.display = "none";
                show5.style.display = "none";
                show6.style.display = "none";
                show7.style.display = "none";
                show8.style.display = "none";
                show9.style.display = "none";
                show10.style.display = "none";
                show11.style.display = "none";

                return [au7 = 0, au8 = 0];
                return b5 = 1;
            }
        }

        /*-----------------------Product------------------------------*/

        var au9;

        function s9() {
            if (au9 == 1) {
                show9.style.display = "none";
                ig9.src = "images/icons/down.png";
                return au9 = 0;
            } else {
                show9.style.display = "block";
                ig9.src = "images/icons/up.png";
                return au9 = 1;
            }
        }

        var au10;

        function s10() {
            if (au10 == 1) {
                show10.style.display = "none";
                ig10.src = "images/icons/down.png";
                return au10 = 0;
            } else {
                show10.style.display = "block";
                ig10.src = "images/icons/up.png";
                return au10 = 1;
            }
        }

        var b6;

        function product() {
            if (b6 == 1) {
                /*----------Image-------------*/
                ig9.src = "images/icons/up.png";
                ig10.src = "images/icons/up.png";
                /*--------Title-------- */
                l1.style.display = "none";
                l2.style.display = "none";
                l3.style.display = "none";
                l4.style.display = "none";
                l5.style.display = "none";
                l6.style.display = "none";
                l7.style.display = "none";
                l8.style.display = "none";
                l9.style.display = "flex";
                l10.style.display = "flex";
                l11.style.display = "none";
                /*--------Content-------- */
                show1.style.display = "none";
                show2.style.display = "none";
                show3.style.display = "none";
                show4.style.display = "none";
                show5.style.display = "none";
                show6.style.display = "none";
                show7.style.display = "none";
                show8.style.display = "none";
                show9.style.display = "none";
                show10.style.display = "none";
                show11.style.display = "none";

                return au9 = 1;
                return au10 = 1;
                return b6 = 0;
            } else {
                /*-----------Image----------- */
                ig9.src = "images/icons/down.png";
                ig10.src = "images/icons/down.png";
                /*--------Title-------- */
                l1.style.display = "none";
                l2.style.display = "none";
                l3.style.display = "none";
                l4.style.display = "none";
                l5.style.display = "none";
                l6.style.display = "none";
                l7.style.display = "none";
                l8.style.display = "none";
                l9.style.display = "flex";
                l10.style.display = "flex";
                l11.style.display = "none";
                /*--------Content-------- */
                show1.style.display = "none";
                show2.style.display = "none";
                show3.style.display = "none";
                show4.style.display = "none";
                show5.style.display = "none";
                show6.style.display = "none";
                show7.style.display = "none";
                show8.style.display = "none";
                show9.style.display = "none";
                show10.style.display = "none";
                show11.style.display = "none";

                return [au9 = 0, au10 = 0];
                return b6 = 1;
            }
        }
        /*----------------------Feedback----------------------------*/
        var au11;

        function s11() {
            if (au11 == 1) {
                show11.style.display = "none";
                ig11.src = "images/icons/down.png";
                return au11 = 0;
            } else {
                show11.style.display = "block";
                ig11.src = "images/icons/up.png";
                return au11 = 1;
            }
        }

        var b7;

        function feedback() {
            if (b7 == 1) {
                /*----------Image-------------*/
                ig11.src = "images/icons/up.png";
                /*--------Title-------- */
                l1.style.display = "none";
                l2.style.display = "none";
                l3.style.display = "none";
                l4.style.display = "none";
                l5.style.display = "none";
                l6.style.display = "none";
                l7.style.display = "none";
                l8.style.display = "none";
                l9.style.display = "none";
                l10.style.display = "none";
                l11.style.display = "flex";
                /*--------Content-------- */
                show1.style.display = "none";
                show2.style.display = "none";
                show3.style.display = "none";
                show4.style.display = "none";
                show5.style.display = "none";
                show6.style.display = "none";
                show7.style.display = "none";
                show8.style.display = "none";
                show9.style.display = "none";
                show10.style.display = "none";
                show11.style.display = "none";

                return au11 = 1;
                return b7 = 0;
            } else {
                /*-----------Image----------- */
                ig11.src = "images/icons/down.png";
                /*--------Title-------- */
                l1.style.display = "none";
                l2.style.display = "none";
                l3.style.display = "none";
                l4.style.display = "none";
                l5.style.display = "none";
                l6.style.display = "none";
                l7.style.display = "none";
                l8.style.display = "none";
                l9.style.display = "none";
                l10.style.display = "none";
                l11.style.display = "flex";
                /*--------Content-------- */
                show1.style.display = "none";
                show2.style.display = "none";
                show3.style.display = "none";
                show4.style.display = "none";
                show5.style.display = "none";
                show6.style.display = "none";
                show7.style.display = "none";
                show8.style.display = "none";
                show9.style.display = "none";
                show10.style.display = "none";
                show11.style.display = "none";

                return au11 = 0;
                return b7 == 1;
            }
        }
        </script>
    </body>

</html>