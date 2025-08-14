<span id="msgfinal_submit_form"></span>
<form id="final_submit_form" name="final_submit_form" action="<?php echo $base_url.'index.php?action=sales&query=final_submit_form';?>" method="post">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
<?php 
function arraySearch($foo, $array){ 
                                        $mykeys = array();
                                            foreach($array as $key => $val){
                                                    if($val['assembly']=== $foo){
                                                    array_push($mykeys,$key);
                                                    }
                                                }
                                            return $mykeys;
                                            }
$part2=array();
$items=$sales->sales_rfq_items_item($_GET['id']);
$view=$sales->get_rfq_one($items[0]['sid']);
$itemtype=$items[0]['item_type'];
$part_details = json_decode($items[0]['part']);
$final_submit = json_decode($items[0]['final_submit'],true);
$rm_cost_total=0;
$hardware_total=0;
$rm_qty_total=0;
$board_cft = 0;
$rm_qty_mdf_total=0;
$rm_cost_mdf = 0;
$wood_cft = 0;
$rm_qty_wood_total = 0;
$rm_cost_wood = 0;
$compound_polish=0;

//-- lodability
$loadability_amt=0;
$loadability = json_decode($items[0]['loadability'],true); 
foreach($loadability as $load){
    $loadability_amt += $load['value4'];
}
?>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th colspan="8"></th>
        </tr>
        <tr>
                <th></th>
                <th colspan="3">Size (LxWxH)</th>
                <th>Qty</th>
                <th>Rate</th>
                <th>Amount</th>
                <th>Total</th>
        </tr>
    </thead>
    <tbody>
            <tr>
            <th colspan="8" class="text-info">Wood</th>
            </tr>
            
            
            <?php
            if($part_details !='')
            {
            foreach($part_details as $r=>$v)
                {
                    array_push($part2,$v->assembly);

                     $wood_type = $product->get_material_byid($v->wood);
                    //-- get l,w,h of pillar from materal_yield table on the basis of type and wood
                                            $wood_yield_l = $product->get_wood_yield($v->wood,'L',$v->length); 
                                            $wood_yield_w = $product->get_wood_yield($v->wood,'W',$v->width); 
                                            $wood_yield_h = $product->get_wood_yield($v->wood,'H',$v->height); 
                                            //-- sizes has been float as per the db entries
                                            $pillar_l = number_format((float)$wood_yield_l[0]['thickness'], 1, '.', '');
                                            $pillar_w = number_format((float)$wood_yield_w[0]['thickness'], 0, '.', '');
                                            $pillar_h = number_format((float)$wood_yield_h[0]['thickness'], 2, '.', '');
                                            $pillar_size_converted=$pillar_l."ft x ".$pillar_w."in x ".$pillar_h."in";
                                            //-rm qty
                                            $rm_qty = $v->qty*$wood_yield_l[0]['thickness_stack']*$wood_yield_w[0]['thickness_stack']*$wood_yield_h[0]['thickness_stack'];
                                            $rm_qty_total += $rm_qty;
                                            
                                            //-- rm cft
                                            $rm_group=$product->get_rm_group($v->wood,$wood_yield_l[0]['thickness'],$wood_yield_w[0]['thickness'],$wood_yield_h[0]['thickness']);
                                            $rm_cft = $rm_group[0]['paycft'];
                                            //-- rm rate 
                                            $rm_rate = $product->get_rm_rate($wood_type[0]['material_name'],$rm_group[0]['rate_group']);
                                            $rm_rate_total += $rm_rate;
                                            //-- comp cft 
                                            $comp_cft = $rm_qty*$rm_cft ;
                                            $comp_cft=number_format((float)$comp_cft, 2, '.', '');
                                            //-- rm cost
                                            $rm_cost = $rm_rate*$comp_cft;
                                            //-- check if board / wood
                                                    
                                                    if(preg_match('(Board|MDF)', $wood_yield_h[0]['wood_type']) === 1)
                                                    { 
                                                            $board_cft += $comp_cft;
                                                            $rm_qty_mdf_total += $rm_qty;
                                                            $rm_cost_mdf += $rm_cost;
                                                        }
                                                    else
                                                        {
                                                            $wood_cft += $comp_cft;
                                                            $rm_qty_wood_total += $rm_qty;
                                                            $rm_cost_wood += $rm_cost;
                                                        }
                                            
                                            $rm_cost_total += $rm_cost;
            ?>
            <tr>
                <th><?php echo $wood_type[0]['material_name'].' - '.$pillar_size_converted;?></th>
                <td><?php echo $v->length;?></td>
                <td><?php echo $v->width;?></td>
                <td><?php echo $v->height;?></td>
                <td><?php echo $rm_qty;?></td>
                <td><?php echo $rm_rate;?></td>
                <td><?php echo $rm_cost;?></td>
                
            </tr>
            <?php }
            // echo "<tr>";
            // echo "<td></td>";
            // echo "<td></td>";
            // echo "<td></td>";
            // echo "<td></td>";
            // echo "<td>".$rm_qty_total."</td>";
            // echo "<td></td>";
            // echo "<td>".$rm_cost_total."</td>";
            // echo "<td></td>";
            // echo "</tr>";


            echo "<tr>";
            echo "<td colspan='3'></td>";
            echo "<th>Wood</th>";
            echo "<td>".$rm_qty_wood_total."</td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<th>".$rm_cost_wood."</th>";
            echo "<tr>";

            echo "<tr>";
            echo "<td colspan='3'></td>";
            echo "<th>MDF / Board</th>";
            echo "<td>".$rm_qty_mdf_total."</td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<th>".$rm_cost_mdf."</th>";
            echo "<tr>";
            }else{ echo '<tr><td colspan="8">No Record Found</td></tr>';}?>

            <?php 
            //--------- polish rates
                        $polish = json_decode($items[0]['finish'],true);
                        $part3=array_unique($part2);
                        foreach($part3 as $key=>$c)
                        {
                            $search=arraySearch($c,$polish);
                            echo "<tr style='display:none;'>";
                                echo "<td>".$c."</td>";
                                echo "<td>".$polish[$key]['length'].' x '.$polish[$key]['width'].' x '.$polish[$key]['height']."</td>";
                                echo "<td>";
                                //-- if found in search array
                               $dimension =($polish[$key]['length']/25.4*$polish[$key]['width']/25.4*2)/144;
                               +($polish[$key]['length']/25.4*$polish[$key]['height']/25.4*2)/144+($polish[$key]['width']/25.4*$polish[$key]['height']/25.4*2)/144;
                               echo $dimension = round($dimension,2);
                                echo "</td>";
                                echo "<td>";
                                    echo $compound = $dimension*$polish[$key]['qty'];
                                echo "</td>";
                            echo "</tr>";

                            $compound_polish += $compound;
                            
                        }                
                    ?>

            <tr><th colspan="8" class="text-warning">Hardware & Indirect Material</th></tr>
            <?php $hardware_details=json_decode($items[0]['hardware']);
                        $hcount=1;
                        if($hardware_details !='')
                        {
                            foreach($hardware_details as $h1=>$h)
                                            {
                                                $item = $store->get_item_one($h->hardware);
                                                $cat = $store->get_cat_single($item[0]['cat']);
                        echo "<tr>";
                        echo "<td>".$cat[0]['cat'].' - '.$item[0]['product_name']."</td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td>".$h->qty."</td>";
                        echo "<td>".$h->price."</td>";                        
                        echo "<td>".$h->total."</td>";
                        $hardware_total += $h->total;
                    echo "</tr>";
                    $hcount++;

                    }
                echo "<tr>";
                echo "<td colspan='6'></td>";
                echo "<th>Total : </th>";
                echo "<td>".$hardware_total."</td>";
                echo "<tr>";
                    }else{echo "<tr><td colspan='8'>No Record Found</td></tr>";}
                ?>

                <tr><th colspan="8" class="text-secondary">Iron Structure</th></tr>
                <?php $iron_details=json_decode($items[0]['iron']);
                        $hcount=1;
                        if($iron_details !='')
                        {
                            foreach($iron_details as $h1=>$h)
                                            {
                        echo "<tr>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td>".$h->qty."</td>";
                        echo "<td>".$h->price."</td>";                        
                        echo "<td>".$h->total."</td>";
                        echo "<td>";
                    echo "</tr>";
                    $hcount++;

                    }
                echo "<tr>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<th>Total : </th>";
                echo "<td></td>";
                echo "<tr>";
                    }else{echo "<tr><td colspan='8'>No Record Found</td></tr>";}
                ?>

                 <tr><th colspan="8" class="text-primary">Labour Charges</th></tr>
                 <tr>
                    <th>Carpentry</th>
                    <td colspan="5"></td>
                    <td><?php echo $carpentry=($rm_qty_wood_total*200)+($rm_qty_mdf_total*10);?></td>
                    <td></td>
                 </tr>
                 <tr>
                    <th>Turning</th>
                    <td colspan="3"></td>
                    <td><input type='number' class='form-control' name='turning_qty' id='turning_qty' value="<?php echo $final_submit['turning_qty'];?>"></td>
                    <td><input type='number' class='form-control' name='turning_rate' id='turning_rate' value="<?php echo $final_submit['turning_rate'];?>"></td>
                    <td><input type='number' readonly="readonly" class='form-control' name='turning_amount' id='turning_amount' value="<?php echo $turning=$final_submit['turning_qty']*$final_submit['turning_rate'];?>"></td>
                    <td></td>
                 </tr>
                 <tr>
                    <th>Fitting</th>
                    <td colspan="5"></td>
                    <td><input type='number' class='form-control' name='fitting_amount' id='fitting_amount' value="<?php echo $fitting = $final_submit['fitting_amount'];?>"></td>
                    <td></td>
                 </tr>
                 <tr class="bg-secondary"><th colspan="6">Cost Of Structure</th><td colspan="2"><?php echo $cost_structure = $carpentry+$turning+$fitting;?></td></tr>




                 <tr></tr>
                 <tr>
                    <th>Polish Material</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?php echo $compound_polish;?></td>
                    <td><input type="text" class="form-control" name="polish_material_rate"  value="<?php echo $final_submit['fitting_amount'];?>"></td>
                    <td><?php echo $polish_rate = $compound_polish*$final_submit['fitting_amount'];?></td>
                    <td></td>
                 </tr>
                 <tr>
                    <td>Contigencies @ 10%</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?php echo $polish_rate2 = $polish_rate*0.10;?></td>
                    <td><?php  $polish_total = $polish_rate+$polish_rate2;?></td>
                 </tr>
                <tr><th colspan="8" class="text-secodnary">Labour Charges</th></tr>
                <tr>
                    <td>Powder Coating</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input type="text" class="form-control" name="powder_rate" value="<?php echo $powder_rate=$final_submit['powder_rate'];?>"></td>
                    <td></td>
                    <td></td>
                 </tr>
                 <tr>
                    <td>Polish Labour</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?php echo $polish_rate;?></td>
                    <td><input type="text" step=".01" class="form-control" name="polish_rate" value="<?php echo $polish_rate3=$final_submit['polish_rate'];?>"></td>
                    <td><?php echo $polish_labour_rate=$polish_rate*$polish_rate3;?></td>
                    <td></td>
                 </tr>
                 <tr  class="bg-success"><th colspan="6" >Cost Of Polish</th><td colspan="2"><?php echo $cost_polish = $polish_labour_rate+$polish_total;?></td></tr>



                 <tr><th colspan="8">Packing Material</th></tr>
                  <?php 
                                        $pval=array();
                                        $packing_details = json_decode($items[0]['packing']);
                                        
                                            $pval = array (
                                                "length"=>$packing_details->length,
                                                "width"=>$packing_details->width,
                                                "height"=>$packing_details->height,
                                                "cbm"=>$packing_details->cbm,
                                                "labour_cost"=>$packing_details->labour_cost,
                                                "total"=>$packing_details->total
                                                );
                                       
                                    ?>
                 <tr>
                    <td>Cartoon</td>
                    <td><?php echo $pval['length'];?> (MM)</td> 
                    <td><?php echo $pval['width'];?> (MM)</td> 
                    <td><?php echo $pval['height'];?> (MM)</td> 
                    <td><input type='number' class='form-control' name='cartoon_qty' id='cartoon_qty' value="<?php echo $final_submit['cartoon_qty'];?>"></td>
                    <td><input type='number' class='form-control' name='packing_rate' id='packing_rate' value="<?php echo $final_submit['packing_rate'];?>"></td>
                    <td><?php echo $cartoon_rate = $final_submit['cartoon_qty']*$final_submit['packing_rate']; ?></td>
                    <td></td>
                 </tr>
                 <tr>
                    <td>Packing Material</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <?php  
                        $clength=$pval['length']*0.0393701;
                        $cwidth=$pval['width']*0.0393701;
                        $cheight=$pval['height']*0.0393701;
                        $packing_cost = $clength*$cwidth*$cheight;
                        $packing_cost=$packing_cost/61000;  
                        echo $packing_cost=round($packing_cost,3)?>
                    </td>
                    <td><input type='number' class='form-control' name='cartoon_rate' id='cartoon_rate' value="<?php echo $final_submit['cartoon_rate'];?>"></td>
                    <td><input type='number' readonly="readonly" class='form-control' name='cartoon_amt' id='cartoon_amt' value="<?php echo $packing_material_amt = $final_submit['cartoon_amt']*$packing_cost;?>"></td>
                    <td></td>
                    
                 </tr>
                 <tr>
                    <td>Mislleneous Items</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input type='number' class='form-control' name='mislleneous_amt' id='mislleneous_amt' value="<?php echo $mis_amt= $final_submit['mislleneous_amt'];?>"></td>
                    <td></td>
                 </tr>
                <tr><th colspan="8">Labour Charges</th></tr>
                <tr>
                    <td>Packing Labour</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?php  echo $packing_cost; ?></td>
                    <td><input type='number' class='form-control' name='packing_labour_rate' id='packing_labour_rate' value="<?php echo  $final_submit['packing_labour_rate'];?>"></td>
                     <td><?php echo $packing_labour = $final_submit['packing_labour_rate']*$packing_cost;?></td>
                    <td></td>
                 </tr>
                 <tr>
                    <td>Loading Items</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?php  echo $packing_cost; ?></td>
                    <td><input type='number' class='form-control' name='packing_laoding_rate' id='packing_laoding_rate' value="<?php echo $final_submit['packing_laoding_rate'];?>"></td>
                    <td><?php echo $loading_amt = $final_submit['packing_laoding_rate']*$packing_cost;?></td>
                    <td></td>
                 </tr>

                 <tr class="bg-warning"><th colspan="6">Cost Of Packing and Loading</th><td colspan="2"><?php $cost_packing = $cartoon_rate+$packing_material_amt+$mis_amt+$packing_labour+$loading_amt; 
                 echo $cost_packing=round($cost_packing,2);?></td></tr>
                 <tr class="bg-secondary">
                    <th>FOB Charges</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?php echo $fob =  round(1/$loadability_amt,4);?> <input type="hidden" name="fob" value="<?php echo $fob;?>"></td>
                    <td><input type='number' class='form-control' name='fob_rate' id='fob_rate' value="<?php echo $final_submit['fob_rate'];?>"></td>
                    <td><input type='number' readonly="readonly" class='form-control' name='fob_amt' id='fob_amt' value="<?php echo $final_submit['fob_amt'];?>"></td>
                    <td></td>
                </tr>
                 <tr class="bg-info"><th colspan="6">Cost (INR)</th><td colspan="2"><?php echo $cost_inr = $cost_structure+$cost_polish+$cost_packing+$final_submit['fob_amt'];?></td></tr>
                 <tr class="bg-primary"><th colspan="6">Cost In USD</th><td colspan="2"><?php echo $cost_usd = round($cost_inr/84,2);?></td></tr>
                 <tr class="bg-primary"><th colspan="6">Price In USD</th><td colspan="2"><?php echo $price_usd = round($cost_usd/0.6,2);?></td></tr>
                 <tr class="bg-primary"><th colspan="6">Price In USD After 10% Discount</th><td colspan="2"><?php  $price_10 = $price_usd*0.9; echo round($price_10,2);?></td></tr>
                 <tr class="bg-primary"><th colspan="6">Cost In USD After 20% Discount</th><td colspan="2"><?php  $price_20 = $price_usd*0.8; echo round($price_20,2);?></td></tr>
                 <tr class="bg-primary"><th colspan="6">Cost In USD After 25% Discount</th><td colspan="2"><?php  $price_25 = $price_usd*0.75; echo round($price_25,2);?></td></tr>
                 <tr class="bg-danger"><th colspan="6">Loadability</th><td colspan="2"><?php echo $loadability_amt;?></td></tr>
                
                <tr>
                    <td colspan="7"></td>
                    <td>
                        <input type="button" class="btn btn-primary" onclick="form_submit('final_submit_form')" value="Save & Calculate"/>
                    </td>
                </tr>
    
                    
    </tbody>
</table>
</form>