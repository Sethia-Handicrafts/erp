<?php
$subcat=$store->get_subcat_single($_GET['id']);
?>
<form name="product" action="index.php?action=store&query=edit_store_subcat" method="post">
                   	<input type="hidden" name="id" value="<?php echo $subcat[0]['id'];?>"/>
                     <!-- row 1-->
                       <div class="form-group row">
                         
                       <div class="col-sm-3">
                         <label class="col-form-label">Category <span class="mendetory">*</span></label>
                           <select name="cat" class="form-control">
                            <option disabled='disabled'>- Select -</option>
                            <?php 
                            $cat=$store->get_cat();
                            foreach($cat as $row=>$value)
                            {
                                if($cat[$row]['id']==$subcat[0]['cat'])
                                {$selection= "selected='selected'";}
                                else {
                                    $selection='';
                                }
                                echo "<option value='".$cat[$row]['id']."'  $selection>".$cat[$row]['cat']."</option>";
                            }
                            ?>
                           </select>
                         </div>

                         <div class="col-sm-3">
                         <label class="col-form-label">Item Sub Category <span class="mendetory">*</span></label>
                           <input type="text" value="<?php echo $subcat[0]['subcat'];?>" class="form-control form-control-sm" name="subcat"   required>
                         </div>                         
                         
                         
                         <div class="col-sm-2"><br>
                         <!--<input type="submit" name="submit" value="Submit">-->
                         <input type="submit" name="submit" class="btn btn-success btn-xs btn-icon-split" value="Submit"/>
                         </div>
                         <div class="col-sm-8"></div>
         </div>
                           
                  </form>