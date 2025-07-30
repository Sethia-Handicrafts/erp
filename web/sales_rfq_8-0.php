<h6 class="text-secondary">Step 8.0</h6>
<h2>Business Potencials</h2>

<?php 
// $items=$sales->sales_rfq_items($_GET['id']);
//         $item_count = count($items);
//         $counter=1;
       
        ?>

<form name="step3_edit" id="step03_edit" action="<?php echo $base_url.'index.php?action=sales&query=rfq_step80_edit_discount'?>" method="post">
<input type="hidden" name="sid" value="<?php echo $_GET['id'];?>">
<table class="table table-bordered border-dark">
    
<tr>
    <th>#</th>
    <th>Product Image</th>
    <th>Items</th>
    <th>Price USS</th>
    <th>MOQ<br><small>Per Order</small></th>
    <th>Order Amount<br>
        <small class="text-info">MOQ * Price</small>
    </th>
    <th>Repeats / PA</th>
    <th>PLC Year</th>
    <th>PA Business Estimate<br>
    <small class="text-secondary">MOQ * Price * Repeat per Annum</small>
    </th>
    <th>Discount %</th>
    <th>Discount Remark</th>
</tr>    
<?php 
$final_price=0;
$final_repeat=0;
$counter=1;
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
            <?php $itemtype=$items[$row]['item_type'];
            if($itemtype=='1' OR $itemtype=='2')
            { 
                $sku=$product->getone($items[$row]['pid']);
                if(file_exists('images/'.$sku[0]['picture']))
                {echo '<img src="'.$base_url.'images/'.$sku[0]['picture'].'" height="auto" width="80"/>';}
            }else{
                $sku=$product->getone_temp($items[$row]['pid']);
                if(file_exists('images/'.$sku[0]['file']))
                {echo '<img src="'.$base_url.'images/'.$sku[0]['file'].'" height="auto" width="80"/>';}
            }?>
            </td>
            <td><?php 
            if($itemtype=='2' || $itemtype=='3' || $itemtype=='1')
            { 
                $sku=$product->getone($items[$row]['pid']);
                echo $sku[0]['sku'].'<br>';
                
            }else{
                $sku=$product->getone_temp($items[$row]['pid']);
                echo $sku[0]['sku'].'<br>';
                
            }
            ?>
            <small><?php echo $sku[0]['product_name'];?></small>
            </td>
            
            <td><?php echo $items[$row]['price'];?></td>
            <td><?php echo $items[$row]['moq'];?></td>
            <td><?php echo $price = $items[$row]['moq'] * $items[$row]['price']; $final_price+=$price;?></td>
            <td><?php echo $items[$row]['repeat_pa'];?></td>
            <td><?php echo $items[$row]['plc'];?></td>
            <td><?php echo $repeat_pa = $price * $items[$row]['repeat_pa']; $final_repeat+=$repeat_pa;?></td>
            <td>
                <input type="hidden" name="amount[]" id="amount<?php echo $counter;?>" value="<?php echo $items[$row]['price'];?>">
                <input type="hidden" name="itemid[]" value="<?php echo $items[$row]['id'];?>">
                <?php if($itemtype=='1'){$readonly="readonly='readonly'";}else{$readonly='';} ?>
                <input type="number" name="discount[]" onkeyup="discount_calc('<?php echo $counter;?>')" value="<?php echo $items[$row]['discount_per'];?>" id="discount<?php echo $counter;?>" step=".01" class="form-control-sm" <?php echo $readonly;?>><br>
                <?php if($itemtype!='1'){?>
                Amount :- <span class="text-success" id="discount_amt_val<?php echo $counter;?>"><?php echo $items[$row]['discount_amt'];?></span>
                <?php }?>
                <input type="hidden" name="discount_amt[]" id="discount_amt<?php echo $counter;?>" value="<?php echo $items[$row]['discount_amt'];?>">
            </td>
            <td>
                <textarea col="2" row="2" name="discount_remark[]" class="form-control"><?php echo $items[$row]['discount_remark'];?></textarea>
            </td>
        </tr>
        <?php $counter++; } }?>
        <tr>
            <td colspan="6"></td>
            <th><?php echo $final_price;?></th>
            <td></td>
            <td></td>
            <th><?php echo $repeat_pa;?></th>
            <td><input type="submit" name="submit" value="Update" class="btn btn-secondary"></td>
        </tr>

</table>
</form>



<?php include('sales_rfq_tandc.php')?>