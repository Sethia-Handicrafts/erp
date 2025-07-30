<div class="content-wrapper">
	  <div class="container-full">
    	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Request For Quotation (Approved / Denied)</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item">Sales</li>
								<li class="breadcrumb-item" >Request For Quotation</li>
                                <li class="breadcrumb-item active" aria-current="page">Apprval</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

        <div class="col-sm-12">
        <?php include('alert.php');?>
        <div class="box-body">

        <?php 
        $view=$sales->get_rfq_one($_GET['id']);
        $items=$sales->sales_rfq_items($_GET['id']);
        $item_count = count($items);
        $counter=1;
       
        //-- beneficiery details
        $bene=$sales->get_baneficiery($view[0]['prospect']);
        ?>

<script>
    $( document ).ready(function() {
        $('#status').change(function() {
            var dval = $('#status').val();
            if(dval!='1')
            {$("#remark").show();}
            else
            {$("#remark").hide();}
        });
    });
</script>
<span id="msgstep40_edit2"></span>
<form name="step40_edit" id="step40_edit2" action="<?php echo $base_url.'index.php?action=sales&query=rfq_step40_edit_approval'?>" method="post">
<input type="hidden" name="sid" value="<?php echo $view[0]['id'];?>"> 
<input type="hidden" name="created_by" value="<?php echo $view[0]['created_by'];?>">          
<table class="table table-bordered">
    <tr>
        <th>Change Approval Status</th>
        <td>
            <select name="approval" id="status" class="form-control">
                <option disabled="disabled" selected="selected">-Select-</option>
                        <option value="0" <?php if($view[0]['approval_status']=='0'){echo "selected='selected'";}?>>Send For Re-Check</option>
                        <option value="1" <?php if($view[0]['approval_status']=='1'){echo "selected='selected'";}?>>Approve</option>
                        <option value="3" <?php if($view[0]['approval_status']=='3'){echo "selected='selected'";}?>>Reject</option>
            </select>
        </td>
    </tr>
    <tr>
        <td id="remark" <?php if($view[0]['approval_status'] == 1 ){?>style="display:none;"<?php }?>>
            <label>Remark</label>
            <textarea col="3" row="3" name="remark_approval" class="form-control"><?php echo $view[0]['remark_approval'];?></textarea>
        </td>
        
        <td>
        <a href="<?php echo $base_url.'index.php?action=dashboard&page=sales_rfq_4-0_approval_list';?>" class="btn btn-secondary">Back</a>    
        <input type="button" name="submit" onclick="form_submit('step40_edit2')" class="btn btn-success" value="Send For Approval">
        </td>
    </tr>
</table>

</form>

<table class="table table-bordered border-dark">
    <tr>
        <th colspan="7">
        <?php
        $path = $base_url.'/images/'.$_SESSION['logo'];
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        ?>
        <img src="<?php echo $base64?>" width="auto" height="90"/> 
        
       
        <br>
        <small><?php echo $_SESSION['address'];?></small>
        </th>
        <td colspan="7">
<br>
        <?php
        $path = $base_url.'images/addlogo1.jpeg';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        ?>
        <img src="<?php echo $base64?>" width="auto" height="60"/> 

        <?php
        $path = $base_url.'images/addlogo2.jpeg';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        ?>
        <img src="<?php echo $base64?>" width="auto" height="60"/> 

        <?php
        $path = $base_url.'images/addlogo3.jpeg';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        ?>
        <img src="<?php echo $base64?>" width="auto" height="60"/> 

        </td>        
    </tr>
    <tr>
        <th colspan="14" class="text-center bg-secondary">Review Of Quotation</th>
    </tr>
    <tr>
        <th colspan="7">Invoice Address</th>
        <th colspan="7">Delivery / Ship To Address</th>
    </tr>
    <tr>
        <td colspan="7"><?php echo $bene[0]['address'];?></td>
        <td colspan="7"></td>
    </tr>
    <tr>
        <th colspan="3">Your Enquiry Ref#</th>
        <td colspan="4"><?php echo $view[0]['rfq_number'];?></td>
        <th colspan="3">SHPL Reference Ref#</th>
        <td colspan="4"><?php echo 'SHPL-RFQ-'.$view[0]['id'];?></td>
</tr>
<tr>    
        <th colspan="3">Your Enuiry Date</th>
        <td colspan="4"><?php echo date('d-m-Y', strtotime($view[0]['date_of_rfq'])); ?></td>
        <th colspan="3">SHPL Ref Date</th>
        <td colspan="4"><?php echo date('d-m-Y', strtotime($view[0]['created_date'])); ?></td>
</tr>
<tr>  
        <th colspan="3">Your Contact person</th>
        <td colspan="4"><?php echo $bene[0]['fname'].' '.$bene[0]['lname'];?></td>
        <th colspan="3">SHPL Contact</th>
        <td colspan="4"><?php ?></td>
</tr>
<tr>
        <th colspan="3">Phone / Email</th>
        <td colspan="4"><?php echo $bene[0]['email'].' / '.$bene[0]['phone'];?></td>
        <th colspan="3">SHPL Contact / Email</th>
        <td colspan="4"></td>
    </tr>

<tr>
    <th>Product Image</th>
    <th>SKU</th>
    <th>Product Name</th>
    <th>Dimension</th>
   
    <th>Material</th>
    <th>Finish</th>
    <th>Cutomization<br><small>(If Any)</small></th>
    <th>CBM</th>
    <th>MOQ<br><small>Per Order</small></th>
    <th>Target Price</th>
    <th>Repeats / PA</th>
    <th>Price <small class="text-danger"><?php $currency=$sales->get_prospect_tandc($view[0]['prospect']); echo $current_curreny=$currency[0]['currency']?></small></th>
    <th>Order Amount</th>
    <!-- <th>Discount</th> -->
    <!-- <th>Final Price</th> -->
    
    <th>PA Business Estimate</th>
</tr>    
<?php 
$final_price=0;
$final_repeat=0;
$total=0;
$discount =0;

//-- get current currency price
$current_rate = $admin->get_metaname_byvalue1('currency',$current_curreny);


$items=$sales->sales_rfq_items($_GET['id']);
        $item_count = count($items);
        $counter=1;
        foreach($items as $row=>$v){

            $itemtype=$items[$row]['item_type'];
            
        ?>
        <tr>
            <td>
                <?php
                 
                    $sku=$product->getone($items[$row]['pid']);

                    $gallery=$product->getone_gallery($items[$row]['pid']);
                    if(file_exists('images/'.$gallery[0]['pic']))
                    {echo '<img src="'.$base_url.'images/'.$gallery[0]['pic'].'" height="auto" width="100"/>';}

                ?>
            </td>
            <td><?php 
                echo $sku[0]['sku'];
                $pname=$sku[0]['productname'];
            ?></td>
            <td><?php echo $pname;?></td>
            <td><?php echo $items[$row]['length'].' x '.$items[$row]['width'].' x '.$items[$row]['height'];?></td>
           
            <td><?php echo $sku[0]['material_all'];?></td>
            <td><?php echo $sku[0]['finish_all'];?></td>
            <td>
                <?php 
                    if($itemtype!='1')
                    { 
                        $material_list = $sales->get_temp_item_material($_GET['id'],$items[$row]['pid']);
                        if($material_list){
                        ?>
                <table style="font-size:12px;">
                    <tr>
                        <th class="bg-danger" width="30%">Capability</th>
                        <th class="bg-primary" width="60%">Remark</th>
                    </tr>
               

    <?php
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
                    <?php } else {echo "No Customization Added";} } 
                ?>
            </td>
            <td><?php echo $sku[0]['cbm'];?></td>
            <td><?php echo $items[$row]['moq'];?></td>
            <td><?php echo $items[$row]['target_price'];?></td>
            <td><?php echo $items[$row]['repeat_pa'];?></td>
            <td><?php //echo $final_price; 
            if($items[$row]['price']=='0.00')
            {echo $items[$row]['price'];}
            else
            {
                $discounted_price0=$items[$row]['price']-$items[$row]['discount_amt'];
             //-- change inr to requested currency
                 $discounted_price = $discounted_price0 / $current_rate[0]['value2'];
                 echo $discounted_price = number_format((float)$discounted_price, 2, '.', '');
            }
            ?></td>
            <td><?php echo $price = $items[$row]['moq'] * $discounted_price; $final_price+=$price;?></td>

            <!-- <td><?php echo $dis=$items[$row]['discount_amt']; $discount += $dis;?></td> -->

            <!-- <td><?php echo $final_total=$discounted_price-$items[$row]['discount_amt']; $total+=$final_total;?></td> -->
            <td><?php echo $repeat_pa = $discounted_price * $items[$row]['repeat_pa']; $final_repeat+=$repeat_pa;?></td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="9"></td>
            
            <!-- <td class="bg-primary"><?php echo $discount;?></td> -->
            <td></td>
            <th class="bg-secondary"><?php echo $final_price;?></th>
            <!-- <th class="bg-success"><?php echo $total;?></th>-->
            <td colspan="3"></td>
        </tr>
        <tr>
            <th colspan="14">Terms & Conditions (Updated As Per Pre-Approved)</th>
        </tr>
        <tr>
            <td colspan="14">
                <?php include('sales_rfq_tandc.php'); ?>
            </td>
        </tr>
        
</table>
</div>

        </div>

        </div>
        </div>

        </div>