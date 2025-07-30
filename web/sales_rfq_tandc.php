<h2>Prospect Terms and Conditions</h2>
<?php 
                //-- get tandc
                $tandc=$sales->get_prospect_tandc($view[0]['prospect']);
                if($tandc){
                ?>
                <ol>
                    <li>Incoterms = <em><?php echo $tandc[0]['incoterms'];?></em> </li>
                    <li>Shipping-Quantum = <em><?php echo $tandc[0]['shipping'];?></em> 
                        <ul> <li>-Shipping - Basis = <em><?php echo $tandc[0]['shipping_basis'];?></em></li></ul>
                    </li>
                    <li>Transaction Currency = <em><?php echo $tandc[0]['currency'];?></em></li>
                    <li>Product Liability Insurance = <em><?php echo $tandc[0]['liability'];?></em></li>
                    <li>Payment Terms - Confirmation = <em><?php echo $tandc[0]['liability_per'];?></em>
                        <ul>
                            <li>- Progress Payment = <em><?php echo $tandc[0]['no_advance'];?></em>
                            <li>- Balance Payment = <em><?php echo $tandc[0]['balance'];?></em>
                            <li>- Retention = <em><?php echo $tandc[0]['retention_period'];?></em>
                            <li>- Documentation (non-LC) = <em><?php echo $tandc[0]['progress_payment'];?></em>
                        </ul>
                    
                    </li>
                    <li>Price Validity Considered = <em><?php echo $tandc[0]['price_validity'];?></em>
                    <li>Social Compliance Audit Requirement = <em><?php echo $tandc[0]['audit1'];?></em>
                    <li>CTPAT Audit Requirement = <em><?php echo $tandc[0]['ctpat'];?></em>
                    <li>Late Shipment Penalty = <em><?php echo $tandc[0]['lateshipment_per'];?></em>
                    <li>Defective Product Chargeback = <em><?php echo $tandc[0]['repair_labour_rate'];?></em>
                    <li>Commissionable= <em><?php echo $tandc[0]['repair_labour_rate_limit'];?></em>
                    <li>Development Sample = <em><?php echo $tandc[0]['sample'];?></em>
                    <li>Photography Sample = <em><?php echo $tandc[0]['photography'];?></em>
                    <li>General Packing Standard = <em><?php echo $tandc[0]['packing'];?></em>
                    <li>Product Testing= <em><?php echo $tandc[0]['product_testing'];?></em>
                    <li>Packing Testing= <em><?php echo $tandc[0]['packing_testing'];?></em>
                    <li>FSC Options Required = <em><?php echo $tandc[0]['fsc'];?></em>
                    <li>Client requires own Branding on Product= <em><?php echo $tandc[0]['branding'];?></em>
                </ol>
                <?php }else{echo "<h5 class='text-danger'>No Terms and Conditions Found</h5><h4>Go To Prospect >> Term(s) & Condition(s) and fill all the details !!!</h4>";}?>