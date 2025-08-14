<h4>Step 8) Polish</h4>
<?php 
$items=$sales->sales_rfq_items_item($_GET['id']);
$view=$sales->get_rfq_one($items[0]['sid']);
?>
                                <table class="table table-bordered" width="100%">
                                    <tr>
                                        <th width="10%">Assembly</th>
                                        <td colspan="2" width="45%"><span class='badge badge-danger'>System Auto Generated</span></td>
                                        <td colspan="2" width="45%"><span class='badge badge-info'>Finish & Custom Sizes</span></td>
                                    </tr>
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

                                    $assembly_details = json_decode($items[0]['assembly']);
                                    $subassembly_details =json_decode($items[0]['part'], true);
                                    
                                    $finish_details0=array();
                                    $finish_details = json_decode($items[0]['finish'],true);
                                  
                                     
                                    if($assembly_details !='')
                                    {
                                        $final_labour_cost_sum=0;
                                        $grand_sqft=0;
                                        $grand_csqft =0;
                                        foreach($assembly_details as $r=>$f)
                                        {
                                           //-- search in sub assembly
                                           $svalue = arraySearch($f->assembly,$subassembly_details);
                                           $total_sqft=0; 
                                           $control_sqft=0;

                                           //-- tr start
                                            
                                            echo "<tr>";
                                                        echo "<td  class='align-top'>".$f->assembly."</td>";

                                                        //-- system generated details
                                                        echo "<td colspan='2'  class='align-top'>";
                                                                //-- table starts of system generated details
                                                                echo "<table width='100%' class='b-1 border-info'>";
                                                                echo "<tr class='bg-info'>";
                                                                echo "<th>Sub Assembly</th>";
                                                                echo "<th>Length [MM]</th>";
                                                                echo "<th>Width [MM]</th>";
                                                                echo "<th>Height [MM]</th>";
                                                                echo "<th>Qty</th>";                                               
                                                                echo "</tr>";

                                                                //-- loop starts
                                                                foreach($svalue as $skey){
                                                                echo "<tr>";
                                                                
                                                                //-- control sql fr
                                                                $control_qft_fn=$sales->control_sqft($subassembly_details[$skey]['length'],$subassembly_details[$skey]['width'],$subassembly_details[$skey]['height'],$subassembly_details[$skey]['qty']);

                                                                $control_sqft +=$control_qft_fn['control_sqft'];
                                                                $total_sqft += $control_qft_fn['sqft'];

                                                                    echo "<td>".$subassembly_details[$skey]['part_name']."</td>";
                                                                    echo "<td>".$subassembly_details[$skey]['length']."</td>";
                                                                    echo "<td>".$subassembly_details[$skey]['width']."</td>";
                                                                    echo "<td>".$subassembly_details[$skey]['height']."</td>";
                                                                    echo "<td>".$subassembly_details[$skey]['qty']."</td>";
                                                                echo "</tr>";
                                                                }   
                                                                //-- loop ends
                                                                echo "<tr><th class='text-secondary' colspan='2'>Total Sq Ft:- $total_sqft</th><th class='text-primary' colspan='3'>Total Control Sq Ft:-  $control_sqft</th></tr>";
                                                                echo "</table>";
                                                                //-- table ends
                                                                $grand_sqft += $total_sqft;  
                                                                $grand_csqft += $control_sqft;                      
                                                        echo "</td>";

                                                        //-- finish details for assembly column 3
                                                       


                                                        //-- custom dimensions col 4
                                                        echo "<td  class='align-top' colspan='2'>";
                                                        echo "<form name='custom_polish$r' id='custom_polish$r'  action='".$base_url."index.php?action=sales&query=step7-estimator' method='post'>";
                                                                echo "<span id='msgcustom_polish$r'></span>";
                                                                //-- hidden assembly and id of rfq
                                                                echo "<input type='hidden' name='assembly' value='$f->assembly'>";
                                                                echo "<input type='hidden' name='id' value='$_GET[id]'>";
                                                                echo "<label>Finish Type</label><select class='form-control' name='finish[]'><option disabled='disabled' selected='selected'>Select</option>";
                                                                $finish = $product->get_finish();
                                                                foreach ($finish as $key => $fv) {
                                                                if($fv['id']==$finish_details[$r]['finish']){$selected1="selected='selected'";}else{$selected1="";}
                                                                echo '<option value="'.$fv['id'].'" '.$selected1.'>'.$fv['finish_name'].'('.$fv['coating_system'].')</option>';
                                                                }
                                                                echo "</select><hr>";

                                                                //-- table starts
                                                                echo "<table width='100%' class='border-success' id='custom_table$r'>";
                                                                echo "<thead>";
                                                                echo "<tr class='bg-secondary'>";
                                                                echo "<th>Sub-Assembly <small>Name</small></th>";
                                                                echo "<th>Length <small>[MM]</small></th>";
                                                                echo "<th>Width <small>[MM]</small></th>";
                                                                echo "<th>Height <small>[MM]</small></th>";
                                                                echo "<th>Qty</th>";
                                                                echo "<th>Delete</th>";
                                                                echo "</tr>";
                                                                echo "</thead>";
                                                                echo "<tbody id='custom_polish$r'>";
                                                                //-- call data feeded on basis of assembly in custom
                                                                $custom_value = arraySearch($f->assembly,$finish_details);
                                                                $control_qft_subassembly=0;
                                                                foreach($custom_value as $ckey=>$ck)
                                                                {
                                                                    echo "<tr id='$ck'>";
                                                                        echo "<td>";
                                                                            echo "<input type='text' name='custom_name[]' class='form-control' value='".$finish_details[$ck]['subassembly']."'/>";
                                                                            echo "<input type='hidden' name='key[]' value='$ck' />";
                                                                    echo "</td>";
                                                                        echo "</td>";
                                                                        echo "<td><input type='text' name='custom_length[]' class='form-control' value='".$finish_details[$ck]['length']."' /></td>";
                                                                        echo "<td><input type='text' name='custom_name[]' class='form-control' value='".$finish_details[$ck]['width']."'/></td>";
                                                                        echo "<td><input type='text' name='custom_name[]' class='form-control' value='".$finish_details[$ck]['height']."' /></td>";
                                                                        echo "<td><input type='text' name='custom_name[]' class='form-control' value='".$finish_details[$ck]['qty']."' /></td>";
                                                                        ?>
                                                                        <td><i class='fa fa-trash text-danger' onclick="deleteme('sales','deletepolish_step7-estimator','<?php echo $id=$ck.'&sid='.$_GET['id'];  ?>')"></i></td>
                                                                        <?php
                                                                    echo "</tr>";

                                                                    //-- add sqft into array
                                                                    $control_qft_fn_array=$sales->control_sqft($finish_details[$ck]['length'],$finish_details[$ck]['width'],$finish_details[$ck]['height'],$finish_details[$ck]['qty']);
                                                                    $control_qft_subassembly+=$control_qft_fn_array['control_sqft'];
                                                                }
                                                                echo "</tbody>";
                                                                echo "<tfoot>";
                                                                //--  get single finish labour cost 
                                                                $single_finish = $product->get_finish_byid($finish_details[0]['finish']);
                                                                $single_finish_labour_cost=$single_finish[0]['labour_inr'];
                                                                $single_finish_cost=$control_qft_subassembly*$single_finish_labour_cost;
                                                                
                                                                echo "<tr><th class='small'>Finish Cost : </th><td>".$single_finish_labour_cost."</td>";
                                                                echo "<th class='small'>Total Control Sq Ft : </th><td colspan='1'>$control_qft_subassembly</td>";
                                                                echo "<th class='small'>Total</th><td>$single_finish_cost</td></tr>";
                                                                echo "</tfoot>";
                                                                echo "</table>";
                                                                //-- table ends

                                                                ?>
                                                                <input type='button' name='addmore_custom_btn' class='btn btn-xs btn-secondary' value='Add More Custom Dimension' id='addmore_custom_btn<?php echo $r;?>' onclick="addmore_custom('<?php echo $r;?>')">

                                                                <input type='button' name='addmore_custom_submit' class='btn btn-xs btn-primary' value='Save' onclick="form_submit_refresh('custom_polish<?php echo $r;?>','step7-estimator_div','<?php  echo $base_url.'index.php?action=dashboard&nocss=sales_rfq_step7_estimator_polish&id='.$_GET['id'];?>')">
                                                        <?php
                                                        // total polish costing 
                                                        $single_finish_cost_grand+=$single_finish_cost;
                                                        $control_qft_subassembly_grand += $control_qft_subassembly;    

                                                         echo "</form>";
                                                        echo "</td>";

                                            //-- form ends
                                           
                                            echo "</tr>";
                                            
                                            //-- tr ends
                                           
                                        }
                                    }
                                    //-- into foot
                                    $grand_sqft_inft = round($grand_sqft,3);
                                    $control_sqft_inft = round($grand_csqft,3);
                                        echo "<tr>";
                                        echo "<td></td>";
                                        //echo "<th class='text-end bg-secondary'>Total SqFt. :- ".$grand_sqft_inft."</th>";
                                        echo "<th></th>";
                                        echo "<th class='text-end bg-primary'>Control SqFt. :- ".$control_sqft_inft."</th>";
                                        echo "<th class='text-end bg-success'>Polish Sqft.:- ".$control_qft_subassembly_grand."</th>";
                                        echo "<th class='text-end bg-danger'>Total Polish Cost :- ".$single_finish_cost_grand."</th>";
                                        echo "</tr>";
                                    ?>

                                </table>