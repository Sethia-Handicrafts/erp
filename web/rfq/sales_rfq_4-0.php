<h6 class="text-secondary">Step 4.0</h6>
<h2>Review Line Sheet</h2>

<?php 
// $items=$sales->sales_rfq_items($_GET['id']);
//         $item_count = count($items);
//         $counter=1;
       
        ?>

<table class="table table-bordered border-dark">
    
<tr>
    <th>#</th>
    <th>Product Image</th>
    <th>Items</th>
    
    <th>Repeats / PA</th>
    <th>PLC Year</th>
    <th>PA Business Estimate<br>
    <small class="text-secondary">MOQ * Price * Repeat per Annum</small>
    </th>
    <th>Discount %</th>
    <th>Discount Amount</th>

    <th>Price USS</th>
    <th>Final Price <br><small class="text-info">Price - Discount</small></th>
    <th>MOQ<br><small>Per Order</small></th>
    <th>Order Amount<br>
        <small class="text-info">MOQ * Price</small>
    </th>
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
            <td></td>
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
            
            
            <td><?php echo $items[$row]['repeat_pa'];?></td>
            <td><?php echo $items[$row]['plc'];?></td>
            <td><?php echo $repeat_pa = $price * $items[$row]['repeat_pa']; $final_repeat+=$repeat_pa;?></td>
            <td><?php echo $items[$row]['discount_per'];?></td>
            <td><?php echo $dis=$items[$row]['discount_amt']; $dis_total+=$dis;?></td>
            <td><?php echo $items[$row]['price'];?></td>
            <td><?php echo $discounted_price=$items[$row]['price']-$dis;?></td>
            <td><?php echo $items[$row]['moq'];?></td>
            <td><?php echo $price = $items[$row]['moq'] * $discounted_price; $final_price+=$price;?></td>
        </tr>
        <?php $counter++; } }?>
        <tr>
            <td colspan="5"></td>            
            <td></td>
            <td></td>
            <th></th>
            <td></td>
            <td></td>
            <td></td>
            <th><?php echo $final_price;?></th>
        </tr>

</table>


<table class="table table-bordered border-dark"></table>
        <tr>
            <th colspan="6">
                <form name="step0_edit" id="step00_edit" action="<?php echo $base_url.'index.php?action=sales&query=rfq_step6_edit'?>" method="post">
                    <input type="hidden" name="sid" value="<?php echo $_GET['id'];?>">     
                    <input type="submit" name="step6" value="Submit to Step 5" class="btn btn-warning btn-md">     
                </form>
            </th>
            <th colspan="6"></th>
        </tr>
</table>