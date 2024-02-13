<?php
    include "connection.php";
    $stateid=$_GET['stateid'];
    if($stateid!="")
    {
        $str1="select * from city where state_id=".$stateid ;
        $qry1=mysqli_query($conn,$str1);
        echo "<select>";
        echo "<option>Select City</option>";
         while($res1=mysqli_fetch_array($qry1))
         {
             echo "<option value='".$res1['city_id']."'>".$res1['city_name']."</option>";
        }
        echo "</select>";
    }
?>