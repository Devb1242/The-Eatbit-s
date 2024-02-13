<?php
    include "connection.php";
    $categoryid=$_GET['categoryid'];
    if($categoryid!="")
    {
        $str1="select * from info_sub_cat where cat_id=".$categoryid." and sc_status=1";
        $qry1=mysqli_query($conn,$str1);
        echo "<select id='sub_cat'>";
        echo "<option value=''>Choose Sub-Category</option>";
         while($res1=mysqli_fetch_array($qry1))
         {
             echo "<option value='".$res1['sc_id']."'>".$res1['sc_name']."</option>";
        }
        echo "</select>";
    }
?>