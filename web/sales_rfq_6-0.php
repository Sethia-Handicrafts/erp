<h6 class="text-secondary">Step 6.0</h6>
<h2>Engineer & Estimator</h2>

<?php 
// $items=$sales->sales_rfq_items($_GET['id']);
//         $item_count = count($items);
//         $counter=1;
       
        ?>
<span id="msgrfq_step60_edit"></span>
<form name="rfq_step60_edit" id="rfq_step60_edit" action="<?php echo $base_url.'index.php?action=sales&query=rfq_step60_edit'?>" method="post">
<input type="hidden" name="sid" value="<?php echo $_GET['id'];?>">    

<table class="table table-bordered border-dark">
    
<tr>
    <th>#</th>
    <th>Product Image</th>
    <th>Items</th>    
    <th>Select Engineer</th>
    <th>Select Estimator</th>    
</tr>    
<?php 
$final_price=0;
$final_repeat=0;
$counter=1;
$dis_total=0;
$items=$sales->sales_rfq_items($_GET['id']);
if($items){
        $item_count = count($items);
        $counter=1;
        foreach($items as $row=>$v){

            $itemtype=$items[$row]['item_type'];
            
        ?>
        <tr>
            <td><?php echo $counter;?></td>
            <td>
            <?php 
            $itemtype=$items[$row]['item_type'];
            
                $sku=$product->getone($items[$row]['pid']);
                $gallery=$product->getone_gallery($items[$row]['pid']);
                if(file_exists('images/'.$gallery[0]['pic']))
                {echo '<img src="'.$base_url.'images/'.$gallery[0]['pic'].'" height="auto" width="100"/>';}
            
            ?>
            </td>
            <td><?php 
             
                echo $sku[0]['sku'].'<br>';
                echo $sku[0]['productname'].'<br>';
            ?>
            <small><?php echo $sku[0]['product_name'];?></small>
            <small class="text-danger">( 
               <?php if($items[$row]['item_type']=='1'){?>Standard Product<?php }?>
               <?php if($items[$row]['item_type']=='2'){?>Standard Product With Customization (eg: wood / fitting /finish)<?php }?>
               <!-- <?php if($items[$row]['item_type']=='3'){?>Standard Product With Size & Design Customization<?php }?> -->
               <?php if($items[$row]['item_type']=='4'){?>Product To Be Prototype (Client's Design)<?php }?>
               <?php if($items[$row]['item_type']=='5'){?>Product To Be Designed & Prototyped As Per Client's Intent<?php }?>
               <?php if($items[$row]['item_type']=='6'){?>Product To Be Ordered As Per Client Design<?php }?>
            )</small>
            </td>
            
            <td>
            <input type="hidden" name="itemid[]" value="<?php echo $items[$row]['id'];?>"/>

            <?php if($itemtype=='5'){?>
            <select name="engineer[]" class="form-control">
                <option disabled="disabled" selected="selected">-Select Engineer-</option>
                <?php 
                $engineer=$admin->getonetype_user('12');
                $selected='';
                foreach($engineer as $r=>$v)
                {
                    if($engineer[$r]['id']==$items[$row]['engineer']){$selected="selected='selected'";}
                ?>
                    <option value="<?php echo $engineer[$r]['id'];?>" <?php echo $selected;?>><?php echo $engineer[$r]['person_name'];?></option>
                <?php }?>
            </select>
            <?php } else {?>
                <input type="hidden" name="engineer[]" value="0">
            <?php }?>

            <!-------  check file received or not-->
            <?php 
            if($items[$row]['engineer_files'] != '')
            {
                echo '<br>';
                if($items[$row]['engineer_files'] != '' ){ 
                    $imgs=explode(",",$items[$row]['engineer_files']);
                    foreach($imgs as $img){
                    ?>
                    <img src="<?php echo $base_url.'images/'.$img; ?>" height="80" width="auto" style="display:inline; margin:1px;">
                 <?php } }
            }
            ?>
            </td>

            <td>
            <?php if($itemtype!='1'){?>
            <select name="estimator[]" class="form-control">
                <option disabled="disabled" selected="selected">-Select Estimator-</option>
                <?php 
                $estimator=$admin->getonetype_user('13');
                $selected='';
                foreach($estimator as $r=>$v)
                {
                    if($estimator[$r]['id']==$items[$row]['estimator']){$selected="selected='selected'";}
                ?>
                    <option value="<?php echo $estimator[$r]['id'];?>" <?php echo $selected;?>><?php echo $estimator[$r]['person_name'];?></option>
                <?php }?>
            </select>
            <?php } else {?>
                <input type="hidden" name="estimator[]" value="0">
            <?php }?>

            <?php 
            if($items[$row]['price'] != '0.0')
            {
                echo '<span class="text-danger">Price Received : '.$items[$row]['price'].'</span>';
                
            }
            ?>
            </td>
        </tr>
        <?php $counter++; } }?>
        <tr>
            <td colspan="6">
                <input type="submit" name="submit" value="Allot Products To Designer and Estimator" class="btn btn-warning">
            </td>
        </tr>
</table>
</form>
