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
    <link rel="stylesheet" type="text/css" href="../CSS/managerStyle.css" />
	<script src="../JS/ajaxLink.js"></script>
    <script src="../JS/jqueryLink.js"></script>
</head>

<body>
    <div class="content" id="">
        <div class="left_side">
            <?php
				include "manager_header.php";
			?>
        </div>
        <div class="right_side" id="">
            <?php
				include "manager_header2.php";
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
                                                <label onclick="raw()">The Raw Materials Page</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label onclick="purchase()">The Purchases Page</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label onclick="distributor()">The Production Page</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label onclick="category()">The Order Page</label>
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
                                                To accress the login page,go to <a href="login.php"
                                                    target="_blank">Login In</a>.<br>
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
                                            <label>Manage Raw Materials</label>
                                        </div>
                                        <div class="show1" id="show2">
                                            <div class="topic">
                                                1.Open Raw materials Page
                                            </div>
                                            <p>
                                                To accress the raw material page, go to <a href="raw.php"
                                                    target="_blank">Raw Materials</a>.<br>
                                                There you can shown raw materials details.

                                            </p>
                                            <div class="topic">
                                                2.Edit Raw Materials
                                            </div>
                                            <p>
                                                On Clicking edit button we can edit particular raw materials.
                                            </p>
                                            <div class="topic">
                                                3.Delete Raw materials
                                            </div>
                                            <p>
                                                On Clicking delete button particular raw material will be deleted.
                                            </p>
                                        </div>
                                        <div class="head2" onclick="s3()" id="l3">
                                            <img src="images/icons/down.png" id="ig3" />
                                            <label>View Raw Category</label>
                                        </div>
                                        <div class="show1" id="show3">
                                            <div class="topic">
                                                1.Open View Raw Category Page
                                            </div>
                                            <p>
                                                To accress view raw category page, go to <a href="view_category.php"
                                                    target="_blank">View Raw Category</a>.<br>
                                                There we can shown all raw category details.</br>
                                            </p>
                                            <div class="topic">
                                                2.Edit Raw Category
                                            </div>
                                            <p>
                                                On Clicking edit button we can edit particular raw category.
                                            </p>
                                            <div class="topic">
                                                3.Delete Raw Category
                                            </div>
                                            <p>
                                                On Clicking delete button particular raw category will be deleted.
                                            </p>
                                        </div>
                                        <div class="head2" onclick="s4()" id="l4">
                                            <img src="images/icons/down.png" id="ig4" />
                                            <label>Raw Material Used History</label>
                                        </div>
                                        <div class="show1" id="show4">
                                            <div class="topic">
                                                1.Open Raw Material Use Histroy Page
                                            </div>
                                            <p>
                                                To accress the raw material used history page, go to <a
                                                    href="raw_use.php" target="_blank">Raw Used History</a>.<br>
                                                There will be shown all raw material used history.
                                            </p>
                                        </div>
                                        <div class="head2" onclick="s5()" id="l5">
                                            <img src="images/icons/down.png" id="ig5" />
                                            <label>Add new Raw Category and Raw Material</label>
                                        </div>
                                        <div class="show1" id="show5">
                                            <div class="topic">
                                                1.Open Add Raw Materials Page
                                            </div>
                                            <p>
                                                To accress the add category page, go to <a href="add_raw.php"
                                                    target="_blank">Add
                                                    Raw Category and Raw Materials</a>.<br>
                                                There will be shown two forms one for raw category and other for
                                                raw materials.

                                            </p>
                                            <div class="topic">
                                                2.Fill the Raw Category Form
                                            </div>
                                            <p>
                                                It is compulsory to fill all details.<br>
                                                Raw category name should be unique string.<br>
                                            </p>
                                            <div class="topic">
                                                3.Click Add Button(Raw Category)
                                            </div>
                                            <p>
                                                Once you click on add button new raw category will be inserted.</br>
                                            </p>
                                            <div class="topic">
                                                4.Fill the Raw Material Form
                                            </div>
                                            <p>
                                                It is compulsory to fill all details.<br>
                                                Raw Material name should be unique string.<br>
                                            </p>
                                            <div class="topic">
                                                3.Click Add Button(Raw Material)
                                            </div>
                                            <p>
                                                Once you click on add button new raw material will be inserted in that
                                                particular raw category we have selected.</br>
                                            </p>
                                        </div>
                                        <div class="head2" onclick="s6()" id="l6">
                                            <img src="images/icons/down.png" id="ig6" />
                                            <label>Raw Material Purchase History</label>
                                        </div>
                                        <div class="show1" id="show6">
                                            <div class="topic">
                                                1.Open Purchases Page
                                            </div>
                                            <p>
                                                To accress purchases page, go to <a href="purchases.php"
                                                    target="_blank">Raw Purchase Histroy</a>.<br>
                                                There will be shown all raw material purchases histroy.</br>
                                            </p>
                                        </div>
                                        <div class="head2" onclick="s7()" id="l7">
                                            <img src="images/icons/down.png" id="ig7" />
                                            <label>Add Purchases</label>
                                        </div>
                                        <div class="show1" id="show7">
                                            <div class="topic">
                                                1.Open Add Purchases Page
                                            </div>
                                            <p>
                                                To accress add purchase page, go to <a href="add_purchases.php"
                                                    target="_blank">Add Purchases</a>.<br>
                                                There will be shown add purchase from.</br>
                                            </p>
                                            <div class="topic">
                                                2.Fill Add Purchase Form
                                            </div>
                                            <p>
                                                It is compulsory to fill all details.
                                            </p>
                                            <div class="topic">
                                                3.Add Button
                                            </div>
                                            <p>
                                                Once you click on add button new raw material purchase will be inserted
                                                and raw material will be increased of that particular raw material
                                                selected.</br>
                                            </p>
                                        </div>
                                        <div class="head2" onclick="s8()" id="l8">
                                            <img src="images/icons/down.png" id="ig8" />
                                            <label>Production Details</label>
                                        </div>
                                        <div class="show1" id="show8">
                                            <div class="topic">
                                                1.Open Production Page
                                            </div>
                                            <p>
                                                To accress production detials page, go to <a href="production.php"
                                                    target="_blank">Production Details</a>.<br>
                                                There will be shown all product production details.
                                            </p>
                                        </div>
                                        <div class="head2" onclick="s9()" id="l9">
                                            <img src="images/icons/down.png" id="ig9" />
                                            <label>Product Ingredients</label>
                                        </div>
                                        <div class="show1" id="show9">
                                            <div class="topic">
                                                1.Open Product Ingredients Page
                                            </div>
                                            <p>
                                                To accress product ingredients page, go to <a
                                                    href="product_ingredients.php" target="_blank">Product
                                                    Ingredients</a>.<br>
                                                There will be shown amount of raw materials used to create a
                                                particular product.</br>
                                            </p>
                                            <div class="topic">
                                                2.Add Product Ingredient
                                            </div>
                                            <p>
                                                Once you click on <a href="add_product_ingredients.php"
                                                    target="_blank">Add Product Ingredient</a>.<br>
                                                There will be shown add product ingredient form.
                                            </p>
                                            <div class="topic">
                                                3.Add Product Ingredient Form
                                            </div>
                                            <p>
                                                It is compulsory to fill all details.
                                            </p>
                                            <div class="topic">
                                                4.Add Button
                                            </div>
                                            <p>
                                                On clicking add button the product ingredient will be added to product
                                                ingredient page.
                                            </p>
                                        </div>
                                        <div class="head2" onclick="s10()" id="l10">
                                            <img src="images/icons/down.png" id="ig10" />
                                            <label>Add New Production</label>
                                        </div>
                                        <div class="show1" id="show10">
                                            <div class="topic">
                                                1.Open Add Production Page
                                            </div>
                                            <p>
                                                To accress add production page, go to <a href="add_production.php"
                                                    target="_blank">Add Production</a>.<br>
                                                There will be shown add production form

                                            </p>
                                            <div class="topic">
                                                2.Fill the add product Form
                                            </div>
                                            <p>
                                                It is compulsory to fill all details.
                                            </p>
                                            <div class="topic">
                                                3.Click Add Button
                                            </div>
                                            <p>
                                                Once you click on add button selected product production will be added
                                                to production page.</br>
                                                when production is inserted raw materials will be decreased as per
                                                product ingredients and product quantity will be increased.
                                            </p>
                                        </div>
                                        <div class="head2" onclick="s11()" id="l11">
                                            <img src="images/icons/down.png" id="ig11" />
                                            <label>Manage Orders</label>
                                        </div>
                                        <div class="show1" id="show11">
                                            <div class="topic">
                                                1.Open Order Page
                                            </div>
                                            <p>
                                                To accress order page, go to <a href="order.php"
                                                    target="_blank">Order</a>.<br>
                                                There will be shown all Distributor who had ordered in past.
                                            </p>
                                            <div class="topic">
                                                2.Orders
                                            </div>
                                            <p>
                                                When distributor places an order then the notification will appears at
                                                particular distributor card who had ordered.
                                            </p>
                                            <div class="topic">
                                                3.View Orders
                                            </div>
                                            <p>
                                                When we click on view button of an particualar distributor all orders of
                                                that particular distributor has been displayed.
                                            </p>
                                        </div>
                                        <div class="head2" onclick="s13()" id="l13">
                                            <img src="images/icons/down.png" id="ig13" />
                                            <label>View Feedback</label>
                                        </div>
                                        <div class="show1" id="show13">
                                            <div class="topic">
                                                1.Open Feedback Page
                                            </div>
                                            <p>
                                                To accress feedback page, go to <a href="#" target="_blank">View
                                                    Feedback</a>.<br>
                                                There will be shown all feebacks received from distributor.
                                            </p>
                                        </div>
                                        <div class="head2" onclick="s12()" id="l12">
                                            <img src="images/icons/down.png" id="ig12" />
                                            <label>Give Feedback</label>
                                        </div>
                                        <div class="show1" id="show12">
                                            <div class="topic">
                                                1.Open Give Feedback Page
                                            </div>
                                            <p>
                                                To accress give feedback page, go to <a href="#" target="_blank">Give
                                                    Feedback</a>.<br>
                                                There we can send feedbacks.
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
    var ig12 = document.getElementById("ig12");
    var ig13 = document.getElementById("ig13");
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
    var l12 = document.getElementById("l12");
    var l13 = document.getElementById("l13");
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
    var show12 = document.getElementById("show12");
    var show13 = document.getElementById("show13");

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
            l12.style.display = "none";
            l13.style.display = "none";
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
            show12.style.display = "none";
            show13.style.display = "none";

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
            l12.style.display = "none";
            l13.style.display = "none";
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
            show12.style.display = "none";
            show13.style.display = "none";

            return au1 = 0;
            return l = 1;
        }
    }

    /*----------------------Raw Materials-----------------------------*/
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

    var b2;

    function raw() {
        if (b2 == 1) {
            /*----------Image-------------*/
            ig2.src = "images/icons/up.png";
            ig3.src = "images/icons/up.png";
            ig4.src = "images/icons/up.png";
            ig5.src = "images/icons/up.png";
            /*--------Title-------- */
            l1.style.display = "none";
            l2.style.display = "flex";
            l3.style.display = "flex";
            l4.style.display = "flex";
            l5.style.display = "flex";
            l6.style.display = "none";
            l7.style.display = "none";
            l8.style.display = "none";
            l9.style.display = "none";
            l10.style.display = "none";
            l11.style.display = "none";
            l12.style.display = "none";
            l13.style.display = "none";
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
            show12.style.display = "none";
            show13.style.display = "none";

            return au2 = 1;
            return au3 = 1;
            return au4 = 1;
            returnau5 = 1;
            return b2 = 0;
        } else {
            /*-----------Image----------- */
            ig2.src = "images/icons/down.png";
            ig3.src = "images/icons/down.png";
            ig4.src = "images/icons/down.png";
            ig5.src = "images/icons/down.png";
            /*--------Title-------- */
            l1.style.display = "none";
            l2.style.display = "flex";
            l3.style.display = "flex";
            l4.style.display = "flex";
            l5.style.display = "flex";
            l6.style.display = "none";
            l7.style.display = "none";
            l8.style.display = "none";
            l9.style.display = "none";
            l10.style.display = "none";
            l11.style.display = "none";
            l12.style.display = "none";
            l13.style.display = "none";
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
            show12.style.display = "none";
            show13.style.display = "none";

            return [au2 = 0, au3 = 0, au4 = 0, au5 = 0];
            return b2 = 1;
        }
    }

    /*-----------------------Purchases------------------------------*/

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

    var b3;

    function purchase() {
        if (b3 == 1) {
            /*----------Image-------------*/
            ig6.src = "images/icons/up.png";
            ig7.src = "images/icons/up.png";
            /*--------Title-------- */
            l1.style.display = "none";
            l2.style.display = "none";
            l3.style.display = "none";
            l4.style.display = "none";
            l5.style.display = "none";
            l6.style.display = "flex";
            l7.style.display = "flex";
            l8.style.display = "none";
            l9.style.display = "none";
            l10.style.display = "none";
            l11.style.display = "none";
            l12.style.display = "none";
            l13.style.display = "none";
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
            show12.style.display = "none";
            show13.style.display = "none";

            return au6 = 1;
            return au7 = 1;
            return b3 = 0;
        } else {
            /*-----------Image----------- */
            ig6.src = "images/icons/down.png";
            ig7.src = "images/icons/down.png";
            /*--------Title-------- */
            l1.style.display = "none";
            l2.style.display = "none";
            l3.style.display = "none";
            l4.style.display = "none";
            l5.style.display = "none";
            l6.style.display = "flex";
            l7.style.display = "flex";
            l8.style.display = "none";
            l9.style.display = "none";
            l10.style.display = "none";
            l11.style.display = "none";
            l12.style.display = "none";
            l13.style.display = "none";
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
            show12.style.display = "none";
            show13.style.display = "none";

            return [au6 = 0, au7 = 0];
            return b3 = 1;
        }
    }

    /*-----------------------Production------------------------------*/

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

    var b4;

    function distributor() {
        if (b4 == 1) {
            /*----------Image-------------*/
            ig8.src = "images/icons/up.png";
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
            l8.style.display = "flex";
            l9.style.display = "flex";
            l10.style.display = "flex";
            l11.style.display = "none";
            l12.style.display = "none";
            l13.style.display = "none";
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
            show12.style.display = "none";
            show13.style.display = "none";

            return au8 = 1;
            return au9 = 1;
            return au10 = 1;
            return b4 = 0;
        } else {
            /*-----------Image----------- */
            ig8.src = "images/icons/down.png";
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
            l8.style.display = "flex";
            l9.style.display = "flex";
            l10.style.display = "flex";
            l11.style.display = "none";
            l12.style.display = "none";
            l13.style.display = "none";
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
            show12.style.display = "none";
            show13.style.display = "none";

            return [au8 = 0, au9 = 0, au10 = 0];
            return b4 = 1;
        }
    }

    /*-----------------------Order------------------------------*/

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

    var b5;

    function category() {
        if (b5 == 1) {
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
            l12.style.display = "none";
            l13.style.display = "none";
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
            show12.style.display = "none";
            show13.style.display = "none";

            return au11 = 1;
            return b5 = 0;
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
            l12.style.display = "none";
            l13.style.display = "none";
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
            show12.style.display = "none";
            show13.style.display = "none";

            return au11 = 0;
            return b5 = 1;
        }
    }

    /*----------------------Feedback----------------------------*/

    var au12;

    function s12() {
        if (au12 == 1) {
            show12.style.display = "none";
            ig12.src = "images/icons/down.png";
            return au12 = 0;
        } else {
            show12.style.display = "block";
            ig12.src = "images/icons/up.png";
            return au12 = 1;
        }
    }

    var au13;

    function s13() {
        if (au13 == 1) {
            show13.style.display = "none";
            ig13.src = "images/icons/down.png";
            return au13 = 0;
        } else {
            show13.style.display = "block";
            ig13.src = "images/icons/up.png";
            return au13 = 1;
        }
    }

    var b6;

    function feedback() {
        if (b6 == 1) {
            /*----------Image-------------*/
            ig12.src = "images/icons/up.png";
            ig13.src = "images/icons/up.png";
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
            l11.style.display = "none";
            l12.style.display = "flex";
            l13.style.display = "flex";
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
            show12.style.display = "none";
            show13.style.display = "none";

            return au12 = 1;
            return au13 = 1;
            return b6 = 0;
        } else {
            /*-----------Image----------- */
            ig12.src = "images/icons/down.png";
            ig13.src = "images/icons/down.png";
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
            l11.style.display = "none";
            l12.style.display = "flex";
            l13.style.display = "flex";
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
            show12.style.display = "none";
            show13.style.display = "none";

            return [au12 = 0, au13 = 0];
            return b6 = 1;
        }
    }
    </script>
</body>

</html>