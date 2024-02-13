<?php
    include "connection.php";
    $categoryid=$_GET['categoryid'];
    if($categoryid!="")
    {
        $str1="select * from raw_materials where raw_cat_id=".$categoryid;
        $qry1=mysqli_query($conn,$str1);
        echo "<select>";
        echo "<option>Choose Raw Material</option>";
         while($res1=mysqli_fetch_array($qry1))
         {
             echo "<option value='".$res1['raw_id']."'>".$res1['raw_name']."</option>";
        }
        echo "</select>";
    }
?>