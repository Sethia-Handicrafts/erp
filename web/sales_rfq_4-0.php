<?php 
//-- check notification send or not 
// $designer_id=$view[0]['designer'];
// if($designer_id=='0')
// {
//     $date=date('Y-m-d h:i:s');
//     $rand_eng = $admin->getone_user_rand_bytype('12');
//     //--update a new enginner and send notification to check and update price
//     $admin->save_alerts($_SESSION['uid'],"Request For Quotation #RFQ$_GET[id] Has Been Received For Pricing on $date",$rand_eng[0]['id']);
//     //--update designer uid
//     $sales->update_designer($_GET['id'],$rand_eng[0]['id']);
//     echo "<div class='alert alert-secondary'>Notification has been send to $rand_eng[0][username] for pricing.</div>";
// }
// else
// {
//     $eng_details = $admin->getone_user($designer_id);
//     if($view[0]['designer_pass']=='2')    
//     {echo "<div class='alert alert-info'>Notification has been send to <b>". $eng_details[0]['person_name']."</b> for pricing.</div>";}
//     if($view[0]['designer_pass']=='1')    
//     {echo "<div class='alert alert-success'>MD approved pricing, Your can process for next step.</div>";}
//     if($view[0]['designer_pass']=='3')    
//     {echo "<div class='alert alert-danger'>MD reject the pricing.</div>";}
//     if($view[0]['designer_pass']=='4')    
//     {echo "<div class='alert alert-danger'>Notification has been send to <b>". $eng_details[0]['person_name']."</b> for re-calculation from MD.</div>";}
// }
// if($view[0]['designer_pass']=='0')
// {
//     echo "<div class='alert alert-secondary'>Price Changes Is On Process</div>";
// }
?>

<h6 class="text-secondary">Step 4.0</h6>
<h3 class="text-primary">Assign Item(s) To Designer</h3>
<hr>

<form name="step08_edit" id="step08_edit" action="<?php echo $base_url.'index.php?action=sales&query=rfq_step20_assign_designer';?>" method="post" enctype="multipart/form-data">
    
<input type="hidden" name="sid" value="<?php echo $_GET['id'];?>">          
<?php 
$items=$sales->sales_rfq_items($_GET['id']);
if($items){
   
        $item_count = count($items);
        $counter=1;
        foreach($items as $row=>$v){?>
    <div class="col-md-12">
        <div class="row">
                
                
                <div class="col-sm-6">
                    <input type="hidden" name="itemid[]" value="<?php echo $items[$row]['id'];?>"/>
                    <h5>
                    <?php echo $counter++.')';  
                    $itemtype=$items[$row]['item_type'];
                        $sku=$product->getone($items[$row]['pid']);
                        echo $sku[0]['sku'].'<br>';
                        echo '<h5 class="text-secondary">'.$sku[0]['productname'].'</h5>';
                    
                    ?>
                    </h5>
                    <h6 class="text-danger">( 
               <?php if($items[$row]['item_type']=='1'){?>Standard Product<?php }?>
               <?php if($items[$row]['item_type']=='2'){?>Standard Product With Customization (eg: wood / fitting /finish)<?php }?>
               <!-- <?php if($items[$row]['item_type']=='3'){?>Standard Product With Size & Design Customization<?php }?> -->
               <?php if($items[$row]['item_type']=='4'){?>Product To Be Prototype (Client's Design)<?php }?>
               <?php if($items[$row]['item_type']=='5'){?>Product To Be Designed & Prototyped As Per Client's Intent<?php }?>
               <?php if($items[$row]['item_type']=='6'){?>Product To Be Ordered As Per Client Design<?php }?>
            )</h6>

            <?php if($itemtype =='4' || $itemtype =='5' || $itemtype =='6' || $itemtype =='2'){?>
                <table class="table table-bordered" style="font-size:12px;">
                <tr><th colspan="4">Add Capabilities</th></tr>
                <tr>
                    <th class="bg-danger" width="30%">Capability</th>
                    <th class="bg-primary" width="60%">Remark</th>
                </tr>
                <?php

                $material_list = $sales->get_temp_item_material($_GET['id'],$items[$row]['pid']);
                foreach($material_list as $r=>$v)
                    {
                    $service = $product->get_capability_byid($material_list[$r]['capability']);
                    
                    echo "<tr id='".$material_list[$r]['id']."'>";
                    echo "<td>".$service[0]['capability']."</td>";
                    echo "<td>".$material_list[$r]['remark']."</td>";
                    echo "</tr>";
                    } 
                    ?>
                </table>
                <?php
                }?>
                </div>
                
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="sku"  class="text-info">Client Attachment</label><br>
                        <?php
                         $file=$items[$row]['file'];
                         if(!empty($file))
                         {
                            $ext = pathinfo($file, PATHINFO_EXTENSION);
                            //-- image
                            if($ext=='jpg' || $ext=='avi' || $ext=='jpeg' || $ext=='png' || $ext=='gif'|| $ext=='webp' )
                            { echo "<img src='".$base_url."images/".$file."' width='auto' height='100px'>";}
                            else
                            {
                                echo "<a target='_blank' href='".$base_url."images/".$file."' class='btn btn-secondary btn-sm'>View</a>";
                            }
                         }
                         else{echo "<span class='text-danger'>No Attachment(s)</span>";}
                         ?>

<hr>
                         <label class="text-warning">Similar Item(s) Image(s)</label>
                         <hr>
                         <?php 
                         if($items[$row]['sfile'] != '0' && $items[$row]['sfile'] != '' )
                         { $imgs=explode(",",$items[$row]['sfile']);
                        foreach($imgs as $img){
                        ?>
                        <a href="#" data-toggle="modal" data-target="#exampleModal" onclick="show_page_model('View Client Design','<?php echo $base_url.'index.php?action=leads&query=fileviewer&file='.$img;?>')">
                        <img src="<?php echo $base_url.'images/'.$img; ?>" height="120" width="auto" style="border:1px #080808 solid; border-radius:2px; display:inline; margin:2px;"> 
                        </a>
                        <?php } }else{echo "<br>No images found";}?>
                    </div>    
                </div>
              


                <div class="col-sm-2">
                
                    <div class="form-group">
                        <label for="price">MRP</label>
                        <input type="text" class="form-control" id="mrp" name="mrp[]" value="<?php echo $items[$row]['mrp'];?>" placeholder="Enter price" readonly="readonly">
                        <input type="hidden" class="form-control" id="price" name="price[]" value="<?php echo $items[$row]['price'];?>" readonly="readonly">

                        <label for="price">Discounted Price</label>
                        <input type="text" class="form-control" id="discountedprice" name="discountedprice[]" value="<?php echo $items[$row]['discountedprice'];?>" placeholder="Enter Discounted Price" readonly="readonly">
                        

                        <label for="bom">Source</label>
                        <input type="text" class="form-control" id="bom" name="source[]" value="<?php echo $items[$row]['source'];?>"  placeholder="Enter Source" readonly="readonly">
                        <input type="hidden" class="form-control" id="bom" name="bom[]" value="<?php echo $items[$row]['bom'];?>">
                    </div> 
               
                    
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="sitems">Similar Items Price </label>
                        <input type="text" class="form-control" id="sprice" name="sprice[]" value="<?php echo $items[$row]['sprice'];?>"  placeholder="Enter Price" readonly="readonly">

                        <label for="bom">Similar Items Image</label>
                        <input type="hidden" class="form-control" id="sfile_old" name="sfile_old[]" value="<?php echo $items[$row]['sfile'];?>">
                        <input type="file" class="form-control" id="sfile" name="sfile[]" accept="image/png, image/jpeg, image/gif, image/tiff, image/avi" readonly="readonly">

                        <?php if($itemtype!='1' && $itemtype!='2'){?>
                        <label for="bom">Select Designer</label>
                        <select name="designer[]" class="form-control" required="required">
                            <option disabled="disabled" selected="selected">-Select-</option>
                            <?php $designers=$admin->getonetype_user('11'); foreach($designers as $r=>$v){?>
                            <option value="<?php echo $designers[$r]['id'];?>" <?php if($designers[$r]['id'] == $items[$row]['designer']){echo "selected='selected'";}?>><?php echo $designers[$r]['person_name'];?></option>
                            <?php }?>
                        </select>
                        <?php } else {?>
                            <input type="hidden" name="designer[]" value="0"/>
                        <?php }?>    
                    </div> 
                    <?php if($items[$row]['designer'] != '0' || $items[$row]['designer'] != '2'){echo "<span class='text-danger'>Notification Has Been Sent To Desinger</span>";}?>
                </div>


                <!-- <div class="col-sm-2">
                    <?php if($items[$row]['sfile'] != '0' && $items[$row]['sfile'] != '' ){?>
                        <img src="<?php echo $base_url.'images/'.$items[$row]['sfile']; ?>" height="150" width="auto">
                    <?php }?>
                </div> -->

        </div>
        <hr>
    </div>
<?php } } ?>
<div class="col-sm-12">

    <div class="col-sm-3">
        <input type="submit" name="step08_submit" value="Update and Process" class="btn btn-warning">
    </div>
</div>
</form>