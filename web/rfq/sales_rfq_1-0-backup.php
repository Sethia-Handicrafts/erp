<?php $items=$sales->sales_rfq_items($_GET['id']);
if($items){
        $item_count = count($items);
        $counter=1;
       
        ?>
<form name="step0_edit" id="step00_edit" action="<?php echo $base_url.'index.php?action=sales&query=rfq_step1_edit'?>" method="post">
<input type="hidden" name="sid" value="<?php echo $_GET['id'];?>">     
<input type="submit" name="step1" value="Submit to Step 2" class="btn btn-warning btn-md">     
</form>
<hr>

<table class="table table-bordered border-dark">
    <tr>
        <th colspan="6">
        <img src="<?php echo $base_url.'/images/'.$_SESSION['logo'];?>"width="165" height="auto"><br>
        <small><?php echo $_SESSION['address'];?></small>
        </th>
        <td colspan="6"></td>
        
    </tr>
    <tr>
        <th colspan="12" class="text-center bg-secondary">Quotation</th>
    </tr>
    <tr>
        <th colspan="6">Invoice Address</th>
        <th colspan="6">Delivery / Ship To Address</th>
    </tr>
    <tr>
        <th colspan="6"></th>
        <th colspan="6"></th>
    </tr>
    <tr>
        <th colspan="3">Your Enquiry Ref#</th>
        <td colspan="3"></td>
        <th colspan="3">SHPL Reference Ref#</th>
        <td colspan="3"></td>
</tr>
<tr>    
        <th colspan="3">Your Enuiry Date</th>
        <td colspan="3"></td>
        <td colspan="3">SHPL Ref Date</td>
        <td colspan="3"></td>
</tr>
<tr>  
        <th colspan="3">Your Contact person</th>
        <td colspan="3"></td>
        <td colspan="3">SHPL Contact</td>
        <td colspan="3"></td>
</tr>
<tr>
        <td colspan="3">Phone / Email</td>
        <td colspan="3"></td>
        <th colspan="3">SHPL Contac / Email</th>
        <td colspan="3"></td>
    </tr>

<tr>
    <th>Product Image</th>
    <th>items</th>
    <th>Product Name</th>
    <th>Dimension</th>
    <th>Price USS</th>
    <th>Materials</th>
    <th>Finishes</th>
    <th>CBM</th>
    <th>MOQ<br><small>Per Order</small></th>
    <th>Order Amount</th>
    <th>Repeats / PA</th>
    <th>PA Business Estimate</th>
</tr>    
<?php 
$final_price=0;
$final_repeat=0;

$items=$sales->sales_rfq_items($_GET['id']);
        $item_count = count($items);
        $counter=1;
        foreach($items as $row=>$v){

            $itemtype=$items[$row]['item_type'];
            
        ?>
        <tr>
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
            ?></td>
            <td><?php echo $sku[0]['product_name'];?></td>
            <td><?php echo $items[$row]['length'].' x '.$items[$row]['width'].' x '.$items[$row]['height'];?></td>
            <td><?php echo $items[$row]['sprice'];?></td>
            <td><?php echo $items[$row]['material'];?></td>
            <td><?php echo $items[$row]['finish'];?></td>
            <td></td>
            <td><?php echo $items[$row]['moq'];?></td>
            <td><?php //echo $price = $items[$row]['moq']*$items[$row]['sprice'];  $final_price+=$price;?></td>
            <td><?php echo $items[$row]['repeat_pa'];?></td>
            <td><?php echo $repeat_pa = $price * $items[$row]['repeat_pa']; $final_repeat+=$repeat_pa;?></td>
        </tr>
        <?php } } ?>
        <tr>
            <td colspan="9"></td>
            <th><?php echo $final_price;?></th>
            <td></td>
            <th><?php echo $repeat_pa;?></th>
        </tr>
        <tr>
            <th colspan="12">Terms & Conditions</th>
        </tr>
        <tr>
            <td colspan="12"></td>
        </tr>
        <tr>
            <th colspan="6">
                Your Sincerly,<br>
                <?php echo $_SESSION['cname'];?><br><br><br><br><br>
                Managing Director
            </th>
            <th colspan="6"></th>
        </tr>
</table>
