<h6 class="text-secondary">Step 2.0</h6>
<h3 class="text-secondary">RFQ - SKU Wise Qty Projection</h3>
<hr>
<style>
    .form-control-sm{width:90%;}
</style>
<form name="step0_edit" id="step00_edit" action="<?php echo $base_url.'index.php?action=sales&query=rfq_step30_edit'?>" method="post">
<input type="hidden" name="sid" value="<?php echo $_GET['id'];?>">          

<table class="table table-bordered">
    <tr>
        <th>Image</th>
        <th>SKU & Type</th>
        <th class="bg-primary">MOQ</th>
        <th class="bg-secondary">Target Price (INR)</th>
        <th class="bg-warning">Repeat PA</th>
        <th class="bg-success">PLC Year</th>
        <th class="bg-danger">Remark</th>
        
    </tr>
    
    <?php $items=$sales->sales_rfq_items($_GET['id']);
    if($items){
        $item_count = count($items);
        $counter=1;
        foreach($items as $row=>$v){
        ?>
        
<tr id="<?php echo $items[$row]['id'];?>">
  
  <td>
    <?php 
    $itemtype=$items[$row]['item_type'];
             
                $gallery=$product->getone_gallery($items[$row]['pid']);
                if(file_exists('images/'.$gallery[0]['pic']))
                {echo '<img src="'.$base_url.'images/'.$gallery[0]['pic'].'" height="auto" width="100"/>';}
            
            
    ?>
  </td>
  <td>
  
  <input type="hidden" name="itemid[]" value="<?php echo $items[$row]['id'];?>">
                  
          
          <?php 
            $sku=$product->getone($items[$row]['pid']);
                echo $sku[0]['sku'].'<br>';
                echo '<small class="text-secondary">'.$sku[0]['productname'].'</small>';
           
            ?>
            <br>
            <small class="text-danger">( 
               <?php if($items[$row]['item_type']=='1'){?>Standard Product<?php }?>
               <?php if($items[$row]['item_type']=='2'){?>Standard Product With Customization (eg: wood / fitting /finish)<?php }?>
               <?php if($items[$row]['item_type']=='3'){?>Standard Product With Size & Design Customization<?php }?>
               <?php if($items[$row]['item_type']=='4'){?>Product To Be Prototype (Client's Design)<?php }?>
               <?php if($items[$row]['item_type']=='5'){?>Product To Be Designed & Prototyped As Per Client's Intent<?php }?>
               <?php if($items[$row]['item_type']=='6'){?>Product To Be Ordered As Per Client Design<?php }?>
            )</small>
    </td>

      <td><input type="number" name="moq[]"  class="form-control" value="<?php echo $items[$row]['moq'];?>" required="required"></td>
      <td><input type="number" name="target_price[]"  class="form-control" value="<?php echo $items[$row]['target_price'];?>" required="required"></td>
      <td><input type="number" name="repeat_pa[]"  class="form-control" value="<?php echo $items[$row]['repeat_pa'];?>" required="required"></td>
      <td><input type="number" name="plc[]"  class="form-control" value="<?php echo $items[$row]['plc'];?>" required="required"></td>
      <td><textarea col="4" rows="4" name="remark[]"  class="form-control" required="required"><?php echo $items[$row]['remark'];?></textarea></td>

      

    </tr>
<?php } }?>
    <tr>
        <td colspan="5"></td>
        <td><input type="submit" value="Update and Process"  name="step30_submit" class="btn btn-warning"></td>
    </tr>
</table>
        </form>