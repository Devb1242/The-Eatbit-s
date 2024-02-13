 <form name="form1" action="" method="post">
     <table>
         <tr>
             <td>
                 <select id="countrydd" onChange="change_country()">
                     <option>Select Category</option>
                     <?php
                            include "connection.php";
                            $str9="select * from info_category";
                            $qry9=mysqli_query($conn,$str9);
                            while($res9=mysqli_fetch_array($qry9))
                            {
                                echo "<option value='".$res9['cat_id']."'>".$res9['c_name']."</option>";
                            }
                    ?>
                 </select>
             </td>
         </tr>
         <tr>
             <td>
                 <div id="state">
                     <select>
                         <option>Select Sub-Category</option>
                     </select>
                 </div>
             </td>
         </tr>
         <tr>
             <td>
                 <div id="city">
                     <select>
                         <option>Select Product</option>
                     </select>
                 </div>
             </td>
         </tr>
     </table>
 </form>
 <script type="text/javascript">
function change_country() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "ajax10.php?country=" + document.getElementById("countrydd").value, false);
    xmlhttp.send(null);
    document.getElementById("state").innerHTML = xmlhttp.responseText;
}

function change_state() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "ajax10.php?state=" + document.getElementById("statedd").value, false);
    xmlhttp.send(null);
    document.getElementById("city").innerHTML = xmlhttp.responseText;
}
 </script>