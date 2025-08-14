
<?php 
$view=$sales->get_rfq_one($_GET['id']);
?>

<div class="content-wrapper">
	  <div class="container-full">
    	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Request For Quotation</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item">Sales</li>
								<li class="breadcrumb-item" >Request For</li>
                                <li class="breadcrumb-item active" aria-current="page">Quotation</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

        <div class="col-sm-12">
        <?php include('alert.php');?>
			  <div class="box box-default">
				
				<!-- /.box-header -->
				<div class="box-body">

                <h6 class="text-secondary">Step 7.0 (Approval)</h6>
                <h2>Engineer & Estimator</h2>

                <?php 
                // $items=$sales->sales_rfq_items($_GET['id']);
                //         $item_count = count($items);
                //         $counter=1;
                    
                        ?>
                <span id="msgrfq_step60_edit"></span>
                <form name="rfq_step60_edit" id="rfq_step60_edit" action="<?php echo $base_url.'index.php?action=sales&query=rfq_step70_approval'?>" method="post">
                <input type="hidden" name="sid" value="<?php echo $_GET['id'];?>">    
                <input type="hidden" name="created_by" value="<?php echo $_GET['created_by'];?>">

                <table class="table table-bordered border-dark">
                    
                <tr>
                    <th>#</th>
                    <th>Product Image</th>
                    <th>Items</th>    
                    <th>Engineer</th>
                    <th>Design Update(s)</th>
                    <th>Estimator</th> 
                    <th>Price Update(s)</th>
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
                            if($itemtype=='1' OR $itemtype=='2')
                            { 
                                $sku=$product->getone($items[$row]['pid']);
                                if(file_exists('images/'.$sku[0]['picture']))
                                {echo '<img src="'.$base_url.'images/'.$sku[0]['picture'].'" height="auto" width="80"/>';}
                            }else{
                                $sku=$product->getone_temp($items[$row]['pid']);
                                if(file_exists('images/'.$sku[0]['file']))
                                {echo '<img src="'.$base_url.'images/'.$sku[0]['file'].'" height="auto" width="80"/>';}
                            }
                            ?>
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
                            <select name="engineer[]" class="form-control" readonly="readonly">
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
                                    <a href="#"  data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-secondary" onclick="show_page_model('View Designer Files','<?php echo $base_url.'index.php?action=leads&query=fileviewer&file='.$img;?>')"><img src="<?php echo $base_url.'images/'.$img; ?>" height="80" width="auto" style="display:inline; margin:1px;"></a>
                                <?php } }
                            }
                            ?>
                            </td>
                            <td>
                            <?php if($itemtype=='5'){?>
                                <label>Status</label>
                                <select name="status_engineer[]" class="form-control" required="required">
                                    <option disbaled="disabled">-Select-</option>
                                    <option value="1" <?php if($items[$row]['status_engineer']=='1'){echo "selected='selected'";}?>>Approved</option>
                                    <option value="2" <?php if($items[$row]['status_engineer']=='2'){echo "selected='selected'";}?>>Reject</option>
                                </select>
                                <label>Remark</label>
                                <textarea col="2" row="2" name="remark_engineer[]" class="form-control"><?php echo $items[$row]['remark_engineer'];?></textarea>
                            <?php } else {?>
                                <input type="hidden" name="status_engineer[]" value="0">
                                <input type="hidden" name="remark_engineer[]" value="0">
                            <?php }?>    
                            </td>

                            <td>
                            <?php if($itemtype != 1){?>
                            <select name="estimator[]" class="form-control" readonly="readonly">
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

                            <td>
                            <?php if($itemtype!='1'){?>
                                <label>Status</label>
                                <select name="status_estimator[]" class="form-control" required="required">
                                    <option disbaled="disabled">-Select-</option>
                                    <option value="1" <?php if($items[$row]['status_estimator']=='1'){echo "selected='selected'";}?>>Approved</option>
                                    <option value="2" <?php if($items[$row]['status_estimator']=='2'){echo "selected='selected'";}?>>Reject</option>
                                </select>

                                <label>Remark</label>
                                <textarea col="2" row="2" name="remark_estimator[]" class="form-control"><?php echo $items[$row]['remark_estimator'];?></textarea>   
                            <?php } else {?>
                                <input type="hidden" name="status_estimator[]" value="0">
                                <input type="hidden" name="remark_estimator[]" value="0">
                            <?php }?>
                            </td>
                        </tr>
                        <?php $counter++; } }?>
                        <tr>
                            <td colspan="3">
                                <label>Change RFQ Status</label>
                                <select name="final_approval_status" class="form-control" required="required">
                                    <option disbaled="disabled">-Select-</option>
                                    <option value="0" <?php if($view[0]['final_approval_status']=='0'){echo "selected='selected'";}?>>Pending</option>
                                    <option value="1" <?php if($view[0]['final_approval_status']=='1'){echo "selected='selected'";}?>>Approved</option>
                                    <option value="2" <?php if($view[0]['final_approval_status']=='2'){echo "selected='selected'";}?>>Reject</option>
                                </select>
                            </td>
                            <td colspan="6">
                                <input type="submit" name="submit" value="Update" class="btn btn-warning">
                            </td>
                        </tr>
                </table>
                </form>
        </div>
        </div>
        
        </div>

