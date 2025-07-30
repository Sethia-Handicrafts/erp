
<form method="POST" action="<?php echo $base_url.'index.php?action=sales&query=prospect3_1'?>" id="form" name="form">
    <input type="hidden" value="<?php echo $pro1[0]['id'];?>" name="pid">
    <input type="hidden" value="<?php echo $_SESSION['uid'];?>" name="added_by">
<table class="table table-bordered table-reponsive">
    <?php 
    if($pro1[0]['export'] !='0'){
    ?>
    <tbody>
        <tr>
            <th colspan="2">TERMS CONDITIONS <span class="text-success">(Insert)</span></th>
        </tr>
        <!-- <tr>
             <td></td>
            <td>
                 FOR EXPORTS 
            </td>
            <td  >
                 NON-EXPORTS 
            </td>
             
        </tr> -->
        <tr>
            <td>
                1. Incoterms
            </td>
            <td>
            
            
                    <div class="demo-radio-button row export">
                        <div class="col-sm-2">
                            <input name="incoterms" type="radio" id="radio_in1" value="fob" onchange="show_txtbox('fob');">
                            <label for="radio_in1">FOB</label>
                        </div>

                        <div class="col-sm-2">
                            <input name="incoterms" type="radio" id="radio_in2" value="cif" onchange="show_txtbox('fob');">
                            <label for="radio_in2">CIF</label>
                        </div>

                        <div id="fob" style="display:none;">
                            <label for="fob">Name Of Port</label>
                            <select name="incoterms_port" class="form-control">
                                <option disbaled="disabled" VALUE="" >-Select-</option>
                                <option>Mundra</option>
                                <option>Pipava</option>
                                <option>Nhava Sheva</option>
                            </select> 
                            
                            <label>Destination</label>
                            <input type="text" name="incoterms_destination" class="form-control">
                        </div>

                       
                    </div>
            </td>
            
             
            <td>
                <select name="incoterms" class="domestic form-control">
                <option disbaled="disabled" VALUE="" >-Select-</option>
                    <option>Ex Works</option>
                    <option>DPU</option>
                </select>     
            </td>
           
        </tr>


        <tr>
            <td>
                2. Shipping - Quantum
            </td>
            <td>
                <select  name="shipping" class="export form-control">
                <option disbaled="disabled" VALUE="" >-Select-</option>
                    <option>FCL</option>
                    <option>FCL/LCL</option>
                    <option>LCL</option>
                </select>
                  
            </td>
            
            <td>
             <select  name="shipping" class="domestic form-control">
                <option disbaled="disabled" VALUE="" >-Select-</option>
                    
                    <option>FTL</option>
                    <option>LTL</option>
                </select>
                
            </td>             
        </tr>


        <tr>
            <td>
            Shipping - Basis
            </td>
            <td>
            <select  name="shipping_basis" class="domestic form-control">
                <option disbaled="disabled" VALUE="" >-Select-</option>
                    <option>Shipper PDA</option>
                    <option>Liner PDA</option>
                    
                </select>
                 
            </td>
            <td>
               
            </td>
        </tr>
        
        
        <tr>
            <td>
                3. Transaction Currency
            </td>
            <td>
            <select  name="currency" class="export form-control">
                <option disbaled="disabled" VALUE="" >-Select-</option>
                    <option>USD</option>
                    <option>Euro</option>
                    <option>GBP (Pound)</option>
                </select>
            </td>
            <td>
                <select  name="currency" class="domestic form-control">
                    <option>INR</option>                    
                </select>
            </td>
        </tr>
        
        <tr>
            <td>
                4. Product Liability Insurance
            </td>
            <td>
            <!-- <select id="export" name="liability" class="form-control" onchange="show_txtbox('Required_Costs')">
                <option disbaled="disabled" VALUE="" >-Select-</option>
                    <option>No Stated Requirement </option>    
                    <option>Required Costs %</option>                
                </select>
                 <div class="allhide" id="Required_Costs">
                    <hr>
                    <label>Required Costs Value (%)</label>
                     <input type="text" name="liability_per" class="form-control-sm">
                 </div> -->

                <div class="demo-radio-button row">
                        <div class="col-sm-4">
                            <input name="liability" type="radio" id="radio_li2" value="No State Requirment" onchange="hide_txtbox('liability');">
                            <label for="radio_li2">No State Requirment</label>
                        </div>
                        <div class="col-sm-4">
                            <input name="liability" type="radio" id="radio_li1" value="Required Costs %" onchange="show_txtbox('liability');">
                            <label for="radio_li1">Required Costs %</label>
                        </div>

                        <div id="liability" class="col-sm-3" style="display:none;">
                            <label>Required Costs Value (%)</label>
                            <input type="text" name="liability_per" class="form-control-sm">
                        </div>
                </div>


            </td>
            <td>
                
            </td>
        </tr>

        <tr>
            <td>
                5. Payment Terms - Confirmation
            </td>
            <td colspan="2">

                <div class="demo-radio-button row">
                        
                        <div class="col-sm-2">
                            <input name="payment_terms" type="radio" id="radio_pt0" value="No Advance Payment" onchange="show_txtbox('document_lc'); hide_txtbox('advance'); hide_txtbox('lc')">
                            <label for="radio_pt0">No Advance Payment</label>
                        </div>        
                        
                        <div class="col-sm-2">
                            <input name="payment_terms" type="radio" id="radio_pt1" value="Advance Payment" onchange=" show_txtbox('document_lc'); show_txtbox('advance'); hide_txtbox('lc')">
                            <label for="radio_pt1">Advance Payment</label>
                        </div>

                        <div class="col-sm-2">
                            <input name="payment_terms" type="radio" id="radio_pt2" value="LC" onchange="hide_txtbox('advance'); show_txtbox('lc'); hide_txtbox('document_lc')">
                            <label for="radio_pt2">LC</label>
                        </div>
                </div>
                <hr>
                <div class="row">

                        <div id="advance" class="col-sm-10 row demo-radio-button" style="display:none;">
                            <div class="col-sm-4" id="advance1">
                                
                                                <div class="demo-radio-button row">
                                                        
                                                        <!-- <div class="col-sm-6" style="display:none;">
                                                            <input name="advance_tandc" type="radio" id="radio_adv1" value="advance_payment">
                                                            <label for="radio_adv1">Advance Payment</label>
                                                        
                                                            <input name="advance_tandc" type="radio" id="radio_adv2" value="credit">
                                                            <label for="radio_adv2">Credit</label>

                                                            <input name="advance_tandc" type="radio" id="radio_adv3" value="balance">
                                                            <label for="radio_adv3">Balance</label>
                                                        </div> -->
                                                        
                                                        <div class="col-sm-6">
                                                            <label>Advance %</label>
                                                            <input type="text" name="advance_payment_per" class="form-control-sm">
                                                        </div>
                                                        
                                                </div>
                            </div>
                            <!-- <div class="col-sm-4" id="advance2" style="display:none;">
                                <label>No Advance T&C</label>
                                <select name="advance_tandc" class="form-control">
                                    <option disbaled="disabled" VALUE="" >-Select-</option>
                                    <option>Credit</option>
                                    <option>Cash</option>
                                </select>
                            </div> -->
                        </div>

                        <div id="lc" class="col-sm-10 row demo-radio-button" style="display:none; ">
                                <div class="col-sm-4">    
                                    <input type="radio" name="lc_advance" id="radio_lc1" value="LC @ Sight" class="form-control">
                                    <label for="radio_lc1">LC @ Sight</label>    
                                </div>
                                <div class="col-sm-4">  
                                    <input type="radio" name="lc_advance" id="radio_lc2" value="LC Usance" class="form-control">
                                    <label for="radio_lc2">LC Usance</label>                            
                                </div>
                                <div class="col-sm-4" id="tandc_lc">
                                    <label>Terms and Condition(s)</label>
                                    <input type="text" name="tandc_lc" class="form-control-sm">
                                </div>
                        </div>

                </div>        

                <!-- <select name="advance" class="form-control" onchange="show_txtbox('Advance_30')">
                <option disbaled="disabled" VALUE="" >-Select-</option>
                    <option>Without Advance</option>    
                    <option>Advance (30%)</option>    
                    <option>LC at Sight</option>    
                    <option>LC Usance</option>                
                    <option>100% After ____ days of BC / FCR</option>
                </select> -->

                <!-- <div class="allhide" id="Advance_30">
                    <hr>
                    <label>Required Costs Value (%)</label>
                     <input type="text" name="advance_per" class="form-control-sm">
                 </div> -->
                
            </td>
        </tr>
        
        <tr  id="domestic">
            <td>
                - Progress Payment
            </td>
            
            <td colspan="2">
                <!-- <select id="domestic" name="advance_process" class="form-control">
                <option disbaled="disabled" VALUE="" >-Select-</option>
                    <option></option>    
                    <option>Progress Stage</option>   
                    <option>Further Advance %</option>    
                    <option>Only in case of domestic</option>              
                </select> -->
            
                
                    <div class="demo-radio-button row">
                        <div class="col-sm-2">
                            <input name="progress_payment" type="radio" id="radio_pp1" value="Yes" onchange="show_txtbox('progress_payment')">
                            <label for="radio_pp1">Yes</label>
                        </div>

                        <div class="col-sm-2">
                            <input name="progress_payment" type="radio" id="radio_pp2" value="No" onchange="hide_txtbox('progress_payment')">
                            <label for="radio_pp2">No</label>
                        </div>

                        <div id="progress_payment" class="col-sm-8 row" style="display:none;">

                            <div class="col-sm-3">
                                <label for="progress_paymentstage1">Stage 1</label>
                                <input type="text" name="stage1" class="form-control-sm">
                            </div>
                            <div class="col-sm-3">
                                <label for="progress_paymentstage2">Stage 2</label>
                                <input type="text" name="stage2" class="form-control-sm">
                            </div>
                            <div class="col-sm-3">
                                <label for="progress_paymentstage3">Stage 3</label>
                                <input type="text" name="stage3" class="form-control-sm">
                            </div>
                            <div class="col-sm-3">
                                <label for="progress_paymentstage4">Stage 4</label>
                                <input type="text" name="stage4" class="form-control-sm">
                            </div>

                        </div>        
					</div>
                
            </td>
            
        </tr>


        <tr>
            <td>
                - Balance Payment
            </td>
            <td>
                <label>Credit Basis</label>
                <select name="balance" class="form-control">
                <option disbaled="disabled" VALUE="" >-Select-</option>
                    <option>Handover</option>  
                    <option>Incoterm</option>     
                </select>  
                
            </td>
            <td>
                 <label>Credit Period (Days)</label>
                 <input type="number" name="credit_period" class="form-control">
            </td>
        </tr>
        
        
        <tr class="domestic">
            <td>
                - Retention 
            </td>
            
            <td colspan="2">

                <div class="demo-radio-button row">
                        <div class="col-sm-2">
                            <input name="retention" type="radio" id="radio_rt1" value="Yes" onchange="show_txtbox('retention')">
                            <label for="radio_rt1">Yes</label>
                        </div>

                        <div class="col-sm-2">
                            <input name="retention" type="radio" id="radio_rt2" value="No" onchange="hide_txtbox('retention')">
                            <label for="radio_rt2">No</label>
                        </div>

                        <div id="retention" class="col-sm-8 row" style="display:none;">
                             
                            <div class="col-sm-6">
                                <label>Retention Period</label>    
                                <input type="number" name="retention_period" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label>Process Payment</label>
                                <input type="number" name="process_payment" class="form-control">
                            </div>
                        </div>    

                </div>
            </td>   
        </tr>


        <tr id="document_lc">
            <td>
            - Documentation (non-LC)
            </td>
            <td>
                <select  name="document" class="form-control">
                    <option disbaled="disabled" VALUE="" >-Select-</option>
                    <option>FCR</option>    
                    <option>Bill of Lading</option>
                   
                </select>    
            </td>

            <td>    
                <select name="document2" class="form-control">
                <option disbaled="disabled" VALUE="" >-Select-</option>
                <option>TT</option>    
                <option>Document Against Payment</option>
                </select>   
                            
            </td>
        </tr>


       
        <tr>
            <td>
                6. Price Validity Considered
            </td>
            <td>

                <div class="demo-radio-button row">
                        <div class="col-sm-2">
                            <input name="price_validity" type="radio" id="radio_pv1" value="Not Required" onchange="hide_txtbox('Price_Validity')">
                            <label for="radio_pv1">Not Required</label>
                        </div>

                        <div class="col-sm-2">
                            <input name="price_validity" type="radio" id="radio_pv2" value="Required" onchange="show_txtbox('Price_Validity')">
                            <label for="radio_pv2">Required</label>
                        </div>

                        <div id="Price_Validity" class="col-sm-8" style="display:none;">
                                <select name="price_validity_year" class="form-control">
                                    <option disbaled="disabled" VALUE="" >-Select-</option>
                                    <option>No Agreement</option>    
                                    <option>Committed 1 Year</option>
                                </select> 
                                <!-- <label>Number of Days</label>
                                <input type="number" name="price_validity_year" class="form-control"> -->
                        </div>
                </div>        
                 
            </td>
            <td>
                
            </td>
        </tr>


        <tr>
            <td>
                7. Social Compliance Audit Requirement
            </td>
            <td colspan="2">
                    <div class="demo-radio-button row">
                        <div class="col-sm-2">
                            <input name="social_audit" type="radio" id="radio_r1" value="Not Required" onchange="hide_txtbox('compliance')">
                            <label for="radio_r1">Not Required</label>
                        </div>

                        <div class="col-sm-2">
                            <input name="social_audit" type="radio" id="radio_r11" value="Required" onchange="show_txtbox('compliance')">
                            <label for="radio_r11">Required</label>
                        </div>

                        <div id="compliance" class="col-sm-8" style="display:none;">
                        <div class="col-sm-4">
                            <input name="SA8000" type="checkbox" id="radio_r2" value="SA8000">
                            <label for="radio_r2">SA8000</label>                            
                        </div>
                        <div class="col-sm-8">    

                          
                        <input name="audit1" type="checkbox" id="radio_r3" value="Existing not acceptable" onclick="show_bycheck('radio_r3','Existing_not_acceptable_val')"> 
                        <label for="radio_r3">Additional Requirment</label>      
                            <div id="Existing_not_acceptable_val" style="display:none;">
                                <label>Option 1</label>    
                                <input type="text" name="audit2" class="form-control-sm"> <br>
                                <label>Option 2</label>    
                                <input type="text" name="audit3" class="form-control-sm"><br>
                                <label>Option 3</label>    
                                <input type="text" name="audit4" class="form-control-sm">   
                            </div>
                            

                        </div>    
                        </div>
					</div>

                 
            </td>
            
        </tr>


        <tr  class="export"> 
            <td>
                8. CTPAT Audit Requirement
            </td>
            <td colspan="2">
                <!-- <select name="ctpat" class="form-control">
                    <option disbaled="disabled" VALUE="" >-Select-</option>
                    <option>Not Required</option>    
                    <option>Required</option>
                </select>  -->

                <div class="demo-radio-button row">
                        <div class="col-sm-2">
                            <input name="ctpat" type="radio" id="ctpat_r1" value="Not Required" >
                            <label for="ctpat_r1">Not Required</label>
                        </div>

                        <div class="col-sm-2">
                            <input name="ctpat" type="radio" id="ctpat_r11" value="Required" >
                            <label for="ctpat_r11">Required</label>
                        </div>
                </div>


            </td>
          
        </tr>


        <tr>
            <td>
                9. Late Shipment Penalty
            </td>
            <td colspan="2">
                     <div class="demo-radio-button row">

                        <div class="col-sm-2">
                            <input name="shipment_penelty" type="radio" id="radio_sh1" value="Not Discussed" onchange="hide_txtbox('shipment')">
                            <label for="radio_sh1">Not Discussed</label>
                        </div>

                        <div class="col-sm-2">
                            <input name="shipment_penelty" type="radio" id="radio_sh2" value="Discussed" onchange="show_txtbox('shipment')">
                            <label for="radio_sh2">Discussed</label>
                        </div>

                        <div class="col-sm-8 row" id="shipment" style="display:none;">

                            <div class="col-sm-4">
                                <label>%</label>
                                <input name="late_shipment_per" type="number" value="" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <label>Duration</label> 
                                <select name="late_shipment_duration" class="form-control">
                                    <option disbaled="disabled" VALUE="" >-Select-</option>
                                    <option>Per Day</option>
                                    <option>Per Week</option>
                                    <option>Per Month</option>
                                </select>                                                     
                            </div>
                            <div class="col-sm-4">    
                                <label>Max %</label>
                                <input name="late_shipment_max_per" type="number" value="" class="form-control">
                            </div>    

                        </div>    


					</div>
                
            </td>
           
        </tr>


        <tr>
            <td>
                10. Defective Product Chargeback
            </td>
            <td colspan="2">
                    <div class="demo-radio-button row">

                    <div class="col-sm-2">
                            <input name="chargeback" type="radio" id="radio_ch1" value="Not Discussed" onchange="hide_txtbox('Chargeback')">
                            <label for="radio_ch1">Not Discussed</label>
                        </div>

                        <div class="col-sm-2">
                            <input name="chargeback" type="radio" id="radio_ch2" value="Discussed" onchange="show_txtbox('Chargeback')">
                            <label for="radio_ch2">Discussed</label>
                        </div>

                        <div class="col-sm-8 row" id="Chargeback" style="display:none;">

                            <div class="col-sm-4">
                                <label>Repair Labour Rate per hour</label>
                                <input name="chargeback_labour_rate" type="number" value="" class="form-control">
                            </div>

                            <div class="col-sm-4">
                                <label>Limitation Period After Supply</label>   
                                <select name="chargeback_labour_rate_after" class="form-control">
                                    <option disbaled="disabled" VALUE="" >-Select-</option>
                                    <option>6 Month</option>
                                    <option>1 Year</option>
                                    <option>No Such Thing</option>
                                </select>                                                     
                            </div>

                            <div class="col-sm-4">    
                                <label>Rate Limitation</label>   
                                <select name="chargeback_labour_limit" class="form-control">
                                    <option disbaled="disabled" VALUE="" >-Select-</option>
                                    <option>Repair</option>
                                    <option>Replacement of part or full replacement</option>
                                    <option>No Such Thing</option>
                                </select>  
                            </div>    

                        </div>    

					</div>
                 
            </td>
            
        </tr>


        <tr>
            <td>
                11. Commissionable
            </td>
            <td colspan="2">
                     <div class="demo-radio-button row">

                     <div class="col-sm-2">
                            <input name="commissionable" type="radio" id="radio_co1" value="Not Discussed" onchange="hide_txtbox('Commissionable')">
                            <label for="radio_co1">Not Discussed</label>
                        </div>

                        <div class="col-sm-2">
                            <input name="commissionable" type="radio" id="radio_co2" value="Discussed" onchange="show_txtbox('Commissionable')">
                            <label for="radio_co2">Discussed</label>
                        </div>

                        <div class="col-sm-8 row" id="Commissionable" style="display:none;">

                                    <div class="col-sm-4">
                                        <label>Commision To</label>   
                                        <select name="commission_to" class="form-control">
                                            <option disbaled="disabled" VALUE="" >-Select-</option>
                                            <option>Buying Agent</option>
                                            <option>Sales Representative</option>
                                            <option>Third Party</option>
                                            <option>Other(s)</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Name</label>   
                                        <input name="commission_name" type="text" value="" class="form-control">                                                     
                                    </div>
                                    <div class="col-sm-4">    
                                        <label>Commission %</label>   
                                        <input name="commission_per" type="number" value="" class="form-control">      
                                    </div>    
                        </div>


                        </div>  
					</div>

                </td>
        </tr>
       
        <tr>
            <th colspan="3">
                 COMMERCIAL CONSIDERATIONS REGARDING PRODUCTS 
            </th>
            
        </tr>
        <tr>
            <td>
                12. Development Sample
            </td>
            <td colspan="2">
                    <div class="demo-radio-button row">
                        <div class="col-sm-2">
                            <input name="sample" type="radio" id="radio_c1" value="Sample & Freight Paid by client">
                            <label for="radio_c1">Sample & Freight Paid by client</label>
                        </div>
                        <div class="col-sm-3">
                            <input name="sample" type="radio" id="radio_c2" value="Sample Foc Freight paid by client">
                            <label for="radio_c2">Sample Foc Freight paid by client</label>                       
                        </div>
                        <div class="col-sm-2">    
                            <input name="sample" type="radio" id="radio_c3" value="Sample Freight Foc">
                            <label for="radio_c3">Sample Freight Foc</label>
                        </div>
                        <div class="col-sm-3">    
                            <input name="sample_qty0" type="checkbox" id="radio_c4" value="sample_paid_client" value="1" onclick="show_bycheck('radio_c4','sample_paid_foc_qty')">
                            <label for="radio_c4">Quantity Required</label>
                            <input name="sample_qty" id="sample_paid_foc_qty" type="number" value="" class="form-control" style="display:none;">      
                        </div>
                       
					</div>

                
            </td>
        </tr>
        <tr>
            <td>
                13. Photography Sample
            </td>
            <td colspan="2">

            <div class="demo-radio-button row">
                        <div class="col-sm-2">
                            <input name="photography" type="radio" id="radio_po1" value="Not Required" onchange="hide_txtbox('photography')">
                            <label for="radio_po1">Not Required</label>
                        </div>

                        <div class="col-sm-2">
                            <input name="photography" type="radio" id="radio_po2" value="Required" onchange="show_txtbox('photography')">
                            <label for="radio_po2">Required</label>
                        </div>

                     <div class="col-sm-8 row" id="photography" style="display:none;">
                        <div class="col-sm-4">
                            <input name="photography1" type="radio" id="radio_p1" value="Sample & Freight Paid by client" onclick="hide_txtbox('photography_qty')">
                            <label for="radio_p1">Sample & Freight Paid by client</label>
                        </div>
                        <div class="col-sm-4">
                            <input name="photography1" type="radio" id="radio_p2" value="Sample Foc Freight paid by client" onclick="hide_txtbox('photography_qty')">
                            <label for="radio_p2">Sample Foc Freight paid by client</label>                       
                        </div>
                        <div class="col-sm-4">    
                            <input name="photography1" type="radio" id="radio_p3" value="Sample Freight Foc" onclick="hide_txtbox('photography_qty')">
                            <label for="radio_p3">Sample Freight Foc</label>
                        </div>
                        <div class="col-sm-4">    
                            <input name="photography_qty" type="checkbox" id="radio_p4" value="quanity_required" onclick="show_bycheck('radio_p4','photography_qty')">
                            <label for="radio_p4">Quantity Required</label>
                            <input name="photography_qty" id="photography_qty" type="number" value="" class="form-control" style="display:none;">      
                        </div>  
                        
					</div>
               
            </td>
           
        </tr>
        
        <tr>
            <td>
                14. General Packing Standard
            </td>
            <td>
                <label>Type</label>
                <select name="packing" class="form-control" onchange="show_txtbox('special_notes');">
                    <option disbaled="disbaled" VALUE="" >-Select-</option>
                    <option>Nothing specified</option>
                    <option>Container Worthy</option>
                    <option>ISTA 2</option>
                    <option>ISTA 3</option>
                    <option>ISTA 6</option>
                </select>
            </td>
            <td>
                <label>Special Notes</label>
                <textarea name="packing_notes" id="special_notes"  class="form-control"></textarea>
            </td>
        </tr>

        <tr>
            <td>
                15. Product Testing
            </td>
            <td>
                    <div class="demo-radio-button row">
                        <div class="col-sm-4">
                            <input name="product_testing" type="radio" id="radio_pt01" value="Internal Testing Required" onclick="hide_txtbox('product_testing');">
                            <label for="radio_pt01">Internal Testing Required</label>
                        </div>
                        <div class="col-sm-4">
                            <input name="product_testing" type="radio" id="radio_pt02" value="Laboratory Testing Required" onclick="show_bycheck('radio_pt02','product_testing');">
                            <label for="radio_pt02">Laboratory Testing Required</label>                       
                        </div>
                        <div class="col-sm-4" id="product_testing" style="display:none;">    
                            <label for="radio_pt3">Testing Frequency</label>
                            <select class="form-control" name="product_testing_frequency" id="product_testing_frequency">
                            <option disbaled="disbaled" VALUE="" >-Select-</option>
                            <option>One Time</option>
                            <option>Annual</option>
                            <option>Bi-Annual</option>
                        </select>  
                        </div> 
					</div>
            </td>
            <td>
                <label>Paid by Customer</label>
                <select name="product_testing_paid" class="form-control">
                    <option disbaled="disbaled" VALUE="" >-Select-</option>
                    <option>- Yes</option>
                    <option>- No</option>
                </select>
            </td>
        </tr>


        <tr>
            <td>
                16. Packing Testing
            </td>
            <td>
                <div class="demo-radio-button row">
                    <div class="col-sm-4">
                        <input name="packing_testing" type="radio" id="radio_pc1" value="Only Internal Testing Required" onclick="hide_txtbox('packing_testing_frequency');">
                        <label for="radio_pc1">Only Internal Testing Required</label>
                    </div>
                    <div class="col-sm-4">
                        <input name="packing_testing" type="radio" id="radio_pc2" value="Laboratory Testing Required" onclick="show_bycheck('radio_pc2','packing_testing_frequency');">
                        <label for="radio_pc2">Laboratory Testing Required</label>                       
                    </div>
                    <div class="col-sm-4" id="packing_testing_frequency" style="display:none;">    
                        <label for="radio_pc3">Testing Frequency</label>
                        <select class="form-control" name="packing_testing_frequency" id="packing_testing_frequency">
                            <option disbaled="disbaled" VALUE="" >-Select-</option>
                            <option>One Time</option>
                            <option>Annual</option>
                            <option>Bi-Annual</option>
                        </select>    
                    </div> 
                </div>
            </td>
            <td>
                <label>Paid by Customer</label>
                <select name="packing_testing_paid" class="form-control">
                    <option disbaled="disbaled" VALUE="" >-Select-</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </td>
        </tr>



        <tr>
            <td>
                17. FSC Options Required
            </td>
            <td colspan="2">

                    <div class="demo-radio-button row">
                        
                        <div class="col-sm-2">    
                            <input name="fsc" type="radio" id="radio_f2" value="No" onclick="hide_txtbox('fsc_yes1'); hide_txtbox('fsc_yes0'); hide_txtbox('fsc_yes'); show_txtbox('fsc_yes2');">
                            <label for="radio_f2">No</label>

                        </div>
                        <div class="col-sm-2">
                            <input name="fsc" type="radio" id="radio_f1" value="Yes" onclick="show_txtbox('fsc_yes'); show_txtbox('fsc_yes0'); show_txtbox('fsc_yes1'); hide_txtbox('fsc_yes2');">
                            <label for="radio_f1">Yes</label>
                        </div>

                        <div class="col-sm-2" id="fsc_yes" style="display:none;">    
                            <label>Year(s)</label>
                            <select name="fsc_years" class="form-control">
                                <option disbaled="disbaled" VALUE="" >-Select-</option>
                                <option>1 Year</option>
                                <option>2 Year</option>
                                <option>3 Year</option>
                            </select>
                        </div>
                        
                        <div class="col-sm-2" id="fsc_yes1" style="display:none;">    
                            <label>FSC Current</label>
                            <input type="text" name="fsc_current" class="form-control"  >
                        </div>

                        <div clas="col-sm-2" id="fsc_yes0" style="display:none;">    
                            <label for="fsc_yes0">FSC % Target in 1 Years</label>   
                            <input name="fsc_target1" type="number" value="" class="form-control"> 
                            <label for="fsc_yes02">FSC % Target in 2 Years</label>   
                            <input name="fsc_target2" type="number" value="" class="form-control"> 
                            <label for="fsc_yes03">FSC % Target in 3 Years</label>   
                            <input name="fsc_target3" type="number" value="" class="form-control"> 
                        </div>
                        

                        <div class="col-sm-2 demo-radio-button" id="fsc_yes2" style="display:none;">    
                            <input name="fsc_target_no" type="checkbox" id="fsc_yes20" value="1" class="form-control">
                            <label for="fsc_yes20">No Target</label>
                        </div>
    
					</div>
                
            </td>
          
        </tr>
        <tr>        
            <td>
                18. Client requires own Branding on Product
            </td>
            <td>
                <div class="demo-radio-button row">
                    <div class="col-sm-6 row">
                        <div class="col-sm-6">    
                            <input name="branding" type="radio" value="No" id="radio_b2" onclick="hide_txtbox('branding_yes')">
                            <label for="radio_b2">No</label>
                        </div>

                        <div class="col-sm-6">
                            <input name="branding" type="radio" value="Yes" id="radio_b1" onclick="show_txtbox('branding_yes')">
                            <label for="radio_b1">Yes</label>
                        </div>    
                            

                    </div>
                    <div class="col-sm-6" id="branding_yes" style="display:none;">    
                        <label>Provided By</label>
                        <select name="branding_req" class="form-control" >
                            <option disbaled="disbaled" VALUE="" >-Select-</option>
                            <option>Provided By Client</option>
                            <option>Factory Procurement</option>                    
                        </select>
                    </div>    
                </div>
            </td>
            <td>
                
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><input type="submit" name="submit" value="Update and Send For Approval" class="btn btn-secondary"></td>
        </tr>
    </tbody>
    <?php }?>
</table>
    </form>