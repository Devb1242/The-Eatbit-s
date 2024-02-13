<?php
    include "connection.php";
    if(isset($_GET['country']))
    {
        $country=$_GET['country'];
    

        if($country!="")
        {
            $str="select * from info_sub_cat where cat_id=".$country;
            $qry=mysqli_query($conn,$str);
            echo "<select id='statedd' onchange='change_state()' name='sc_id'>";
            echo "<option value=''>Select Sub-Category</option>";
            while($res=mysqli_fetch_array($qry))
            {
                echo "<option value='".$res['sc_id']."'>".$res['sc_name']."</option>";
            }
            echo "</select>";
        }
    }

     if(isset($_GET['state']))
    {
        
        $state=$_GET['state'];
        if($state!="")
        {
            $str1="select distinct p_name from info_product where sc_id=".$state;
            $qry1=mysqli_query($conn,$str1);
            echo "<select name='p_id'>";
            echo "<option value=''>Select Product</option>";
            while($res1=mysqli_fetch_array($qry1))
            {
                echo "<option value='".$res1['p_name']."'>".$res1['p_name']."</option>";
            }
            echo "</select>";
        }
    }
?>