<?php
    include "connection.php";
    session_start();
    if(isset($_GET['pname']))
    {
        $str="select * from info_product where p_name='".$_GET['pname']."'";
        $qry=mysqli_query($conn,$str);
        $res=mysqli_fetch_assoc($qry);

        $str2="select * from info_sub_cat where sc_id=".$res['sc_id'];
        $qry2=mysqli_query($conn,$str2);
        $res2=mysqli_fetch_assoc($qry2);
        
        echo $res2['cat_id'];
    }
   
?>