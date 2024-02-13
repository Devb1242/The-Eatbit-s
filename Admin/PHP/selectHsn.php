<?php
    include "connection.php";
    session_start();
    if(isset($_GET['pname']))
    {
        $str="select * from info_product where p_name='".$_GET['pname']."'";
        $qry=mysqli_query($conn,$str);
        $res=mysqli_fetch_assoc($qry);
        
        echo $res['HSN'];
    }
   
?>