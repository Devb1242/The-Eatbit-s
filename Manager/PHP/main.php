 <form method="POST" onsubmit="return v1()">
     <div class="c_form">
         <div class="form">

             <table>
                 <tr>
                     <th class="form_head">
                         <h2>Edit Raw Material</h2>
                     </th>
                 </tr>
                 <tr>
                     <td><select name="raw_slct" required>
                             <option value="">------</option>
                             <?php
                                        $str1="select * from raw_materials where raw_cat_id=".$raw_cat_id;
                                        $qry1=mysqli_query($conn,$str1);
                                        while($res1=mysqli_fetch_assoc($qry1))
                                        {
                                            echo "<option value='".$res1['raw_id']."'>".$res1['raw_name']."</option>";
                                        }
                                    ?>
                         </select>
                     </td>
                 </tr>
                 <tr>
                     <td><input type="text" name="raw_name" placeholder="Update Name" required />
                     </td>

                 </tr>
                 <tr>
                     <th><input type="submit" name="raw_edit" value="UPDATE" /></th>
                 </tr>
             </table>
         </div>
     </div>
 </form>