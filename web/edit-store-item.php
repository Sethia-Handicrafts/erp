<span id="msgitem_edit"></span>

<?php $item_edit=$store->get_item_one($_GET['id']);?>
<form name="product" action="index.php?action=store&query=edit-item" method="post" enctype="multipart/form-data" id="item_edit">
                   	
<input type="hidden" name="id" value="<?php echo $item_edit[0]['id'];?>">
                     <!-- row 1-->
                       <div class="form-group row">
                         
                         <div class="col-sm-3">
                         <label class="col-form-label">Item Name <span class="mendetory">*</span></label>
                           <input type="text" value="<?php echo $item_edit[0]['product_name'];?>" class="form-control form-control-sm" name="product_name"  required>
                         </div>
                         
                         <div class="col-sm-3">
                         <label class="col-form-label">HSN Code <span class="mendetory">*</span></label>
                           <input type="text" value="<?php echo $item_edit[0]['hsn_code'];?>" class="form-control form-control-sm" name="hsn_code"  required>
                         </div>

                         <div class="col-sm-3">
                         <label class="col-form-label">Category <span class="mendetory">*</span></label>
                           <select class="form-control form-control-sm" name="cat" onchange="get_subcat('subcat0',this.value,'store')"  required>
                            <option disabled='disabled' selected='selected'>-Select-</option>
                            <?php 
                            $cat=$store->get_cat();
                            foreach($cat as $k=>$value)
                            {
                              echo "<option value='".$cat[$k]['id']."'";
                              if($cat[$k]['id']==$item_edit[0]['cat'])
                              {echo "selected='selected'";}
                               echo ">".$cat[$k]['cat']."</option>";
                            }
                            ?>  
                          
                          </select>
                         </div>

                         <div class="col-sm-3">
                         <label class="col-form-label">Sub Category <span class="mendetory">*</span></label>
                         <select class="form-control form-control-sm" id="subcat0" name="subcat"  required>
                            <?php
                            $subcat=$store->get_subcat_bycat($item_edit[0]['cat']);
                            foreach($subcat as $k=>$value)
                            {
                            ?>
                            <option value="<?php echo $subcat[$k]['id'];?>" <?php if($subcat[$k]['id']==$item_edit[0]['subcat']){echo "selected='selected'";}?> ><?php echo $subcat[$k]['subcat'];?></option>
                            <?php }?>
                           </select>
                         </div>

                         <div class="col-sm-3">
                         <label class="col-form-label">Unit <span class="mendetory">*</span></label>
                         <select class="form-control form-control-sm" name="unit"   required>
                            <option disabled='disabled' selected='selected'>-Select-</option>
                            <?php 
                            $unit=$store->get_unit();
                            foreach($unit as $k=>$value)
                            {
                               if($item_edit[0]['unit']==$unit[$k]['id'])
                               {$selected="selected='selected'";}
                               else{$selected='';} 
                              echo "<option value='".$unit[$k]['id']."' $selected>".$unit[$k]['unit']."</option>";
                            }
                            ?>  
                          
                          </select>
                         </div>
                         
                         <div class="col-sm-3">
                         <label class="col-form-label">Image <span class="mendetory">*</span></label>
                           <input type="file" class="form-control form-control-sm" name="pic"  accept=".jpg, .jpeg, .png" >
                            <input type="hidden" name="pic0" value="<?php echo $item_edit[0]['image'];?>">
                           <?php if($item_edit[0]['image'] != ''){?>
                                <img src="<?php echo $base_url.'theme/assets/images/'.$item_edit[0]['image'];?>" width="auto" height="50">
                            <?php }?>
                         </div>

                         <div class="col-sm-2"><br>
                         
                         <input type="submit" name="submit" class="btn btn-success" value="Submit"/>
                         </div>
                         <div class="col-sm-8"></div>
         </div>
                           
                  </form>  
