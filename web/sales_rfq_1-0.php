<style>
    .form-control{width:90%;}
    table{width:100%; vertical-align:top;}
    td{border-bottom:0px dashed; padding:0px;}
    th{ padding:0px;}
    .padding1{padding:2px;}
</style>
<h6 class="text-secondary">Step 1.0</h6>
<h3 class="text-primary">RFQ Customization Required</h3>
<hr>

<form name="step0_edit" id="step00_edit" action="<?php echo $base_url.'index.php?action=sales&query=rfq_step05_edit'?>" method="post">
<input type="hidden" name="sid" value="<?php echo $_GET['id'];?>">          

    <?php $items=$sales->sales_rfq_items($_GET['id']);
    if($items){
        
    
        $item_count = count($items);
        $counter=1;
        foreach($items as $row=>$v){
            //-- loop start
        ?>

<table class="table table-bordered" id="<?php echo $items[$row]['id'];?>">
    <!----- product name ---------->
<tr>
    <td>
        <?php
         
            $sku=$product->getone($items[$row]['pid']);
            $cat=$product->get_category_one($sku[0]['cat']);
            $gallery=$product->getone_gallery($sku[0]['id']);
            $itemtype=$items[$row]['item_type'];


            if(file_exists('images/'.$gallery[0]['pic']))
            {echo '<img src="'.$base_url.'images/'.$gallery[0]['pic'].'" height="auto" width="80"/>';}
        
        ?>
    </td>
    <th colspan="3"> 
        (<?php echo $counter++;?>) 
            <?php 
                echo $sku[0]['sku'].'<br>';
                echo '<b class="text-success">'.$sku[0]['productname'].'</b><br>';
                echo '<b class="text-secondary">'.$cat[0]['cat'].'</b>';
            ?>
            <br>
            <small class="text-danger">( 
               <?php if($items[$row]['item_type']=='1'){?>Standard Product<?php }?>
               <?php if($items[$row]['item_type']=='2'){?>Standard Product With Customization (eg: wood / fitting /finish)<?php }?>
               <!-- <?php if($items[$row]['item_type']=='3'){?>Standard Product With Size & Design Customization<?php }?> -->
               <?php if($items[$row]['item_type']=='4'){?>Product To Be Prototype (Client's Design)<?php }?>
               <?php if($items[$row]['item_type']=='5'){?>Product To Be Designed & Prototyped As Per Client's Intent<?php }?>
               <?php if($items[$row]['item_type']=='6'){?>Product To Be Ordered As Per Client Design<?php }?>
            )</small>
    </th>
    <td><input type="button" name="delete" value="Remove" class="btn btn-sm btn-danger"></td>
</tr>
<!----- product details ---------->
    <tr>
        <th height="80">Length (MM)</th>
        <th>Width (MM)</th>
        <th>Height (MM)</th>
        <th>Branding</th>
        <!-- <th>Packing</th>   -->
        
        <!----- partlist---------->
        <td rowspan="2" width="30%">
            <!--- material List------->
            
            <?php if($itemtype =='4' || $itemtype =='5' || $itemtype =='6' || $itemtype =='2'){?>
                <table class="table table-bordered" style="font-size:12px;">
                <tr><th colspan="4">Add Capabilities</th></tr>
                <tr>
                    <th class="bg-danger" width="30%">Capability</th>
                    <th class="bg-primary" width="60%">Remark</th>
                    <td width="10%"></td>
                </tr><?php

                $material_list = $sales->get_temp_item_material($_GET['id'],$items[$row]['pid']);
                foreach($material_list as $r=>$v)
                    {
                    $service = $product->get_capability_byid($material_list[$r]['capability']);
                    
                    echo "<tr id='".$material_list[$r]['id']."'>";
                    echo "<td>".$service[0]['capability']."</td>";
                    echo "<td>".$material_list[$r]['remark']."</td>";
                    ?><td><i class="fa fa-trash" onclick="deleteme('sales','delete_material_cutom','<?php echo $material_list[$r]['id'];?>')"></td><?php
                    echo "</tr>";
                    } 
                    ?>
                <tr>
                    <td colspan="4"> <input type="button" class="btn btn-xs btn-warning" name="btn" value="Add Customization" data-toggle="modal" data-target="#exampleModal" onclick="show_page_model('Admin Customization Details','<?php echo $base_url.'index.php?action=dashboard&nocss=sales_rfq_0-8_material_form&sid='.$_GET['id'].'&pid='.$items[$row]['pid'];?>')" /></td>
                </tr>
                
                </table>
                <?php
                }
                /*if($itemtype =='1' ){
                //-- show part list
                $partlist=$product->get_partlist($items[$row]['pid']);
                if($partlist)
                {
                foreach($partlist as $p=>$v)
                {
                    echo "<tr>";
                        echo "<td>".$partlist[$p]['partname']."</td>";
                        echo "<td>".$partlist[$p]['wood']."</td>";
                        echo "<td></td>";
                    echo "<tr>";
                }
                
                }
                else{echo "<b>No Part List Available</b>";}
            }*/
            
                ?>

                
        </td>
        
    </tr>
    <?php //-- check item details from product table
         if($itemtype=='2' || $itemtype=='1'){
        
        $dcm = $sku[0]['dcm'];
        $hcm = $sku[0]['hcm'];
        $wcm = $sku[0]['wcm'];

        
        //---
        if($items[$row]['length']=='0.0'){$length=$dcm;}else{$length=$items[$row]['length'];}
        if($items[$row]['width']=='0.0'){$width=$wcm;}else{$width=$items[$row]['width'];}
        if($items[$row]['height']=='0.0'){$height=$hcm;}else{$height=$items[$row]['height'];}
        }
        
        else
        {
            $length = $items[$row]['length'];
            $width = $items[$row]['width'];
            $height = $items[$row]['height'];
        }

        if($itemtype=='1'){$disbale="readonly='readonly'";}else{$disbale='';}
    ?>
    <tr>
        <td>
             <input type="hidden" name="itemid[]" value="<?php echo $items[$row]['id'];?>">
             <input type="hidden" name="mtype[]" value="">
            <input type="number" name="length[]"  class="form-control" value="<?php echo $length;?>" <?php echo $disbale;?> required="required">
        </td>
        <td><input type="number" name="width[]"  class="form-control" value="<?php echo $width;?>" <?php echo $disbale;?> required="required"></td>
        <td><input type="number" name="height[]"  class="form-control" value="<?php echo $height;?>" <?php echo $disbale;?> required="required"></td>
        <td>
            <?php 
            if($itemtype=='1'){$readonly_branding='readonly="readonly"';}else{$readonly_branding='';}
            ?>
            <input name="packing[]" type="hidden" value="">
            <select name="branding[]" class="form-control" <?php echo $readonly_branding;?>>
                <option>-Select-</option>
                <option <?php  if($items[$row]['branding']=='Yes'){echo $selected="selected='selected'";}?>>Yes</option>
                <option <?php  if($items[$row]['branding']=='No'){echo $selected="selected='selected'";}?>>No</option>
            </select> 
        </td>
        <!-- <td>
                    <select name="packing[]"  class="form-control" <?php echo $readonly_branding;?>>
                        <option disabled="disabled" selected="selected">-Select-</option>
                        <?php 
                                $packing=$product->get_packing();
                                foreach($packing as $w=>$v){
                                    if($items[$row]['packing']==$packing[$w]['id'])
                                    {$selected="selected='selected'";}
                                    else
                                    {$selected="";}
                            ?>
                            <option <?php echo $selected; ?> value="<?php echo $packing[$w]['id'];?>"><?php echo $packing[$w]['packing_name'];?></option>
                            <?php }?>
                    </select>
                   </td> -->
                   
                   


    </tr>
    
</table>

<hr>

<?php } }?>
    <tr>
        <td colspan="9"></td>
        <td colspan="2"><input type="submit" value="Update"  name="step00_submit" class="btn btn-warning"></td>
    </tr>
</table>
        </form>

       


