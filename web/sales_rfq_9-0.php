<h6 class="text-secondary">Step 9.0</h6>
<h2>Review and Download</h2>


<?php $items=$sales->sales_rfq_items($_GET['id']);
        $item_count = count($items);
        $counter=1;
       
        //-- beneficiery details
        $bene=$sales->get_baneficiery($view[0]['prospect']);
        ?>

<a href="#" type="button" class='btn btn-info' name="pdf"  type="button" onclick="htmlget('pdfdown','<?php echo 'SHPL-RFQ-'.$_GET['id'];?>')" value="get html" style="display:inline"><i class="fa fa-file-pdf"></i> Download PDF</a>




<div id="editor"></div>
<hr>

<div id="pdfdown">
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
        $path = $base_url.'/images/addlogo1.jpeg';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        ?>
        <img src="<?php echo $base64?>" width="auto" height="60"/> 

        <?php
        $path = $base_url.'/images/addlogo2.jpeg';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        ?>
        <img src="<?php echo $base64?>" width="auto" height="60"/> 

        <?php
        $path = $base_url.'/images/addlogo3.jpeg';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        ?>
        <img src="<?php echo $base64?>" width="auto" height="60"/> 

        </td>        
    </tr>
    <tr>
        <th colspan="13" class="text-center bg-secondary">Quotation</th>
    </tr>
    <tr>
        <th colspan="6">Invoice Address</th>
        <th colspan="7">Delivery / Ship To Address</th>
    </tr>
    <tr>
        <td colspan="6"><?php echo $bene[0]['address'];?></td>
        <td colspan="7"></td>
    </tr>
    <tr>
        <th colspan="3">Your Enquiry Ref#</th>
        <td colspan="3"><?php echo $view[0]['rfq_number'];?></td>
        <th colspan="3">SHPL Reference Ref#</th>
        <td colspan="4"><?php echo 'SHPL-RFQ-'.$view[0]['id'];?></td>
</tr>
<tr>    
        <th colspan="3">Your Enuiry Date</th>
        <td colspan="3"><?php echo date('d-m-Y', strtotime($view[0]['date_of_rfq'])); ?></td>
        <th colspan="3">SHPL Ref Date</th>
        <td colspan="4"><?php echo date('d-m-Y', strtotime($view[0]['created_date'])); ?></td>
</tr>
<tr>  
        <th colspan="3">Your Contact person</th>
        <td colspan="3"><?php echo $bene[0]['fname'].' '.$bene[0]['lname'];?></td>
        <th colspan="3">SHPL Contact</th>
        <td colspan="4"><?php ?></td>
</tr>
<tr>
        <th colspan="3">Phone / Email</th>
        <td colspan="3"><?php echo $bene[0]['email'].' / '.$bene[0]['phone'];?></td>
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
    <th>CBM</th>
    <th>MOQ<br><small>Per Order</small></th>
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
            <td></td>
            <td><?php 
            if($itemtype=='2' || $itemtype=='3' || $itemtype=='1')
            { 
                $sku=$product->getone($items[$row]['pid']);
                echo $sku[0]['sku'];
                
            }else{
                $sku=$product->getone_temp($items[$row]['pid']);
                echo $sku[0]['sku'];
                
            }
            ?></td>
            <td><?php echo $sku[0]['productname'];?></td>
            <td><?php echo $items[$row]['length'].' x '.$items[$row]['width'].' x '.$items[$row]['height'];?></td>
           
            <td><?php echo $sku[0]['material_all'];?></td>
            <td><?php echo $sku[0]['finish_all'];?></td>
            <td><?php echo $sku[0]['cbm'];?></td>
            <td><?php echo $items[$row]['moq'];?></td>
            <td><?php echo $items[$row]['repeat_pa'];?></td>
            <td><?php //echo $final_price; 
             $discounted_price0=$items[$row]['price']-$items[$row]['discount_amt'];
             //-- change inr to requested currency
                 $discounted_price = $discounted_price0 / $current_rate[0]['value2'];
                 echo $discounted_price = number_format((float)$discounted_price, 2, '.', '');
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
            <td></td>
        </tr>
        <tr>
            <th colspan="14">Terms & Conditions</th>
        </tr>
        <?php 
                //-- get tandc
                $tandc=$sales->get_prospect_tandc($view[0]['prospect']);
                ?>
        <tr>
            <td coslpan="4">Incoterms </td><td colspan="12"> <em><?php echo $tandc[0]['incoterms'];?></td></tr>
        <tr>    
            <td colspan="2">Shipping-Quantum</td>
            <td colspan="12"><em><?php echo $tandc[0]['shipping'];?></em> 
                        <ul> <li>-Shipping - Basis = <em><?php echo $tandc[0]['shipping_basis'];?></em></li></ul>
        </tr>
        <tr>                
                
                    <td colspan="2">Transaction Currency</td><td colspan="12"><em><?php echo $tandc[0]['currency'];?></em></td>
        </tr>
        <tr>
                    <td colspan="2">Product Liability Insurance</td><td colspan="12"><em><?php echo $tandc[0]['liability'];?></em></td>
        </tr>
        <tr>                    
                    <td colspan="2">Payment Terms - Confirmation</td><td colspan="12"><em><?php echo $tandc[0]['liability_per'];?></em>
                        <ul>
                            <li>- Progress Payment = <em><?php echo $tandc[0]['no_advance'];?></em>
                            <li>- Balance Payment = <em><?php echo $tandc[0]['balance'];?></em>
                            <li>- Retention = <em><?php echo $tandc[0]['retention_period'];?></em>
                            <li>- Documentation (non-LC) = <em><?php echo $tandc[0]['progress_payment'];?></em>
                        </ul>
        </td>
        </tr>
        <tr><td colspan="2">Price Validity Considered</td><td colspan="12"><em><?php echo $tandc[0]['price_validity'];?></em></td></tr>
        <tr>            <td colspan="2">Social Compliance Audit Requirement</td><td colspan="12"><em><?php echo $tandc[0]['audit1'];?></em></td></tr>
        <tr>        <td colspan="2">CTPAT Audit Requirement</td><td colspan="12"><em><?php echo $tandc[0]['ctpat'];?></em></td></tr>
        <tr>        <td colspan="2">Late Shipment Penalty</td><td colspan="12"><em><?php echo $tandc[0]['lateshipment_per'];?></em></td></tr>
        <tr>        <td colspan="2">Defective Product Chargeback</td><td colspan="12"><em><?php echo $tandc[0]['repair_labour_rate'];?></em></td></tr>
        <tr>        <td colspan="2">Commissionable= <em><?php echo $tandc[0]['repair_labour_rate_limit'];?></em></td></tr>
        <tr>        <td colspan="2">Development Sample</td><td colspan="12"><em><?php echo $tandc[0]['sample'];?></em></td></tr>
        <tr>        <td colspan="2">Photography Sample</td><td colspan="12"><em><?php echo $tandc[0]['photography'];?></em></td></tr>
        <tr>        <td colspan="2">General Packing Standard</td><td colspan="12"><em><?php echo $tandc[0]['packing'];?></em></td></tr>
        <tr>        <td colspan="2">Product Testing</td><td colspan="12"> <em><?php echo $tandc[0]['product_testing'];?></em></td></tr>
        <tr>        <td colspan="2">Packing Testing</td><td colspan="12"> <em><?php echo $tandc[0]['packing_testing'];?></em></td></tr>
        <tr>        <td colspan="2">FSC Options Required</td><td colspan="12"><em><?php echo $tandc[0]['fsc'];?></em></td></tr>
        <tr>        <td colspan="2">Client requires own Branding on Product</td><td colspan="12"> <em><?php echo $tandc[0]['branding'];?></em></td></tr>
            
        <tr>
            <th colspan="7">
                Your Sincerly,<br>
                <?php echo $_SESSION['cname'];?><br><br><br><br><br>
                Managing Director
            </th>
            <th colspan="7"></th>
        </tr>
</table>
</div>