<div class="box-body wizard-content">
<?php $edit=$admin->get_metaname_byid($_GET['id']);?>					
<form action="<?php echo $base_url.'index.php?action=admin&query=edit-meta'?>" name="add-meta" method="post" >
  <input type="hidden" name="id" value="<?php echo $edit[0]['id'];?>">                  
                    <!----- 1st row------>
                       <div class="form-group row">
                       <div class="col-lg-12">
                       <label class="form-label">Meta Name</label>
                       <input list="meta_name" name="metaname" id="metaname" class="form-control" Value="<?php echo $edit[0]['meta_name'];?>" required>

                           <datalist id="meta_name">
                               <?php $metaname=$admin->get_metaname();
                               foreach($metaname as $k => $value){?>
                           <option value="<?php echo $metaname[$k]['meta_name']; ?>" >
                           <?php }?>
                           </datalist>
                     
                   </div>

                   <div class="col-lg-12">
                     
                       <label class="form-label">Value 1</label>
                       <input class="form-control" type="text" name="value1" value="<?php echo $edit[0]['value1'];?>" required>
                     
                   </div>


                   <div class="col-lg-12">
                     
                       <label class="form-label">Value 2</label>
                       <input class="form-control" type="text" name="value2" value="<?php echo $edit[0]['value2'];?>">
                     
                   </div>

                   <div class="col-lg-12">
                                
                                <label class="form-label">Editable</label>
                                    <div class="c-inputs-stacked">
										<input name="editable" type="radio" id="radio_123" value="0" <?php if($edit[0]['editable']=='0'){echo "checked='checked'";}?>>
										<label for="radio_123" class="mr-30">Yes</label>
										<input name="editable" type="radio" id="radio_456" value="1"  <?php if($edit[0]['editable']=='1'){echo "checked='checked'";}?>>
										<label for="radio_456" class="mr-30">No</label>
									</div>
                            
                            </div>

                   <div class="col-lg-12">
                     <br>
                       <input class="btn btn-warning" type="submit" name="submit" value="Update">
                     
                   </div>
                   
                         
                       </div>
                     
                     
                        
                     
                    </form>
					</div>