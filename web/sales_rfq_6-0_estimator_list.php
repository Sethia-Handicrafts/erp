<?php 

$items=$sales->sales_rfq_items_item($_GET['id']);
$view=$sales->get_rfq_one($items[0]['sid']);
$itemtype=$items[0]['item_type'];
?>

<div class="content-wrapper">
	  <div class="container-full">
    	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Request For Quotation [Price Request]</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item">Sales</li>
								<li class="breadcrumb-item">Request For Quotation</li>
                                <li class="breadcrumb-item active" aria-current="page">Price Request</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

		<!-- Main content -->
		<div class="col-sm-12">
        <?php include('alert.php');?>
			  <div class="box box-default">
				
				<!-- /.box-header -->
				<div class="box-body">
					
					

				<div class="row">
					<div class="col-sm-12">

<h6 class="text-secondary">Step 6</h6>
<h3 class="text-primary">Similar Item(s) & Price Comparison</h3>
<hr>
<span id="msgstep08_edit"></span>
<form name="step08_edit" id="step08_edit" action="<?php echo $base_url.'index.php?action=sales&query=rfq_step62_edit';?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="sid" value="<?php echo $_GET['id'];?>">   
<input type="hidden" name="created_by" value="<?php echo $view[0]['created_by'];?>">
<?php 

   
        $item_count = count($items);
        $counter=1;
     ?>
    <div class="col-md-12">
        <div class="row">               
                
                <div class="col-sm-3">
                    <input type="hidden" name="itemid" value="<?php echo $items[0]['id'];?>"/>
                    <h5>
                    <?php echo $counter++.')';  
                    $itemtype=$items[0]['item_type'];
                        $sku=$product->getone($items[0]['pid']);
                        echo $sku[0]['sku'].'<br>';
                        echo '<small class="text-secondary">'.$sku[0]['productname'].'</small><br>';
                    
                    ?>
                    </h5>
            <h6 class="text-danger">( 
               <?php if($items[0]['item_type']=='1'){?>Standard Product<?php }?>
               <?php if($items[0]['item_type']=='2'){?>Standard Product With Customization (eg: wood / fitting /finish)<?php }?>
               <!-- <?php if($items[0]['item_type']=='3'){?>Standard Product With Size & Design Customization<?php }?> -->
               <?php if($items[0]['item_type']=='4'){?>Product To Be Prototype (Client's Design)<?php }?>
               <?php if($items[0]['item_type']=='5'){?>Product To Be Designed & Prototyped As Per Client's Intent<?php }?>
               <?php if($items[0]['item_type']=='6'){?>Product To Be Ordered As Per Client Design<?php }?>
            )</h6>

                        <label for="sku">Client Attachment</label><br>
                        <?php
                         $file=$items[0]['file'];
                         if(!empty($file))
                         {
                            $ext = pathinfo($file, PATHINFO_EXTENSION);
                            //-- image
                            if($ext=='jpg' || $ext=='avi' || $ext=='jpeg' || $ext=='png' || $ext=='gif' )
                            { echo "<img src='".$base_url."images/".$file."' width='150px' height='auto'>";}
                            else
                            {
                                echo "<a target='_blank' href='".$base_url."images/".$file."' class='btn btn-secondary btn-sm'>View</a>";
                            }
                         }
                         else{echo "<span class='text-danger'>No Attachment(s)</span>";}
                         ?>
                   
                </div>
                
                <div class="col-sm-3">
                        <label>Similar Item(s) Image(s)</label><br>
                        <?php if($items[0]['sfile'] != '0' && $items[0]['sfile'] != '' ){ $imgs=explode(",",$items[0]['sfile']);
                        foreach($imgs as $img){
                        ?>
                        <img src="<?php echo $base_url.'images/'.$img; ?>" height="80" width="auto" style="display:inline; margin:1px;">
                        <?php } }?>
                </div>
               

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="price">MRP</label><br>
                        <input type="text" name="mrp" value="<?php echo $items[0]['mrp'];?>" class="form-control" readonly="readonly">
                        <hr>
                        <label for="price">Discounted Price</label><br>
                        <input type="text" name="discountedprice" value="<?php echo $items[0]['discountedprice'];?>" class="form-control"  readonly="readonly">
                        <hr>

                        <label for="bom">Source</label><br>
                        <a href="<?php echo $items[0]['source'];?>" class="btn btn-info btn-sm">View</a>
                       
                    </div> 
               
                    
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="sitems">Similar Items Price </label><br>
                        <input type="text" name="sprice" value="<?php echo $items[0]['sprice'];?>" class="form-control"  readonly="readonly">
                        <hr>
                    
                        <label for="sitems">Price (INR)</label><br>
                        <input type="text" name="price" value="<?php echo $items[0]['price'];?>" class="form-control">
                        <hr>
                    
                    <label>Sent For Approval</label>
                    <select name="estimator_pass" class="form-control" >
                        <option diabsled="disabled">-Select-</option>
                        <option value="2" <?php if($items[0]['estimator_pass']=='2'){echo "selected='selected'";}?>>Sent For Approval (MD)</option>
                    </select>
                <hr>
            </div>  
            
            <div class="row">

<div class="col-sm-3">
    <a href="<?php echo $base_url.'index.php?action=dashboard&page=sales_rfq_6-0_engineer_list_all';?>" class="btn btn-secondary">Back</a>
</div>
<div class="col-sm-3">
<input type="submit" name="submit" value="Update" class="btn btn-success"/>
</div>
   
</div>
</form>


        </div>



        </div>
        <hr>
    </div>


    <div class="col-sm-12">
        <!---------- tabs------------>
        <div class="box-body vtabs">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs tabs-vertical" role="tablist">
						<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home11" role="tab"><span><i class="ion-home"></i></span> <span class="hidden-xs-down ml-15">Services</span></a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile11" role="tab"><span><i class="fa fa-pie-chart"></i></span> <span class="hidden-xs-down ml-15">Specification Of Material</span></a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#assembly" role="tab"><span><i class="fa fa-connectdevelop"></i></span> <span class="hidden-xs-down ml-15">Assembly</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages11" role="tab"><span><i class="fa fa-link"></i></span> <span class="hidden-xs-down ml-15">Sub Assembly</span></a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#setting11" role="tab"><span><i class="ion-settings"></i></span> <span class="hidden-xs-down ml-15">Wood Work</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#hardware" role="tab"><span><i class="fa fa-wrench"></i></span> <span class="hidden-xs-down ml-15">Hardware</span></a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#about11" role="tab"><span><i class="fa fa-th""></i></span> <span class="hidden-xs-down ml-15">Canework</span></a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#upholestry" role="tab"><span><i class="fa fa-square"></i></span> <span class="hidden-xs-down ml-15">Upholestry</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#contact11" role="tab"><span><i class="fa fa-paint-brush"></i></span> <span class="hidden-xs-down ml-15">Polish</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#packing" role="tab"><span><i class="fa fa-th-large"></i></span> <span class="hidden-xs-down ml-15">Cartoon</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#logistics" role="tab"><span><i class="fa fa-truck"></i></span> <span class="hidden-xs-down ml-15">Logistics</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#Summary" role="tab"><span><i class="fa fa-list"></i></span> <span class="hidden-xs-down ml-15">Summary</span></a> </li>
                        <li class="nav-item" onclick="load_div('<?php echo $base_url.'index.php?action=dashboard&nocss=sales_final_result&id='.$_GET['id'];?>','final_result')"> <a class="nav-link" data-toggle="tab" href="#final_result" role="tab"><span><i class="fa fa-file-pdf-o"></i></span> <span class="hidden-xs-down ml-15" >Final Result</span></a> </li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content tabcontent-border">
                        <!----- service offered ---->
						<div class="tab-pane active" id="home11" role="tabpanel">
							<div class="p-15">
								<h4>Step 1) Services</h4>
								<table class="table table-bordered">
                                    <?php
                                    $material_list = $sales->get_temp_item_material($items[0]['sid'],$items[0]['pid']);
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
							</div>
						</div>
						<div class="tab-pane" id="profile11" role="tabpanel">
							<div class="p-15">
                                <span id="msgstep2-estimator"></span>
                            <h4>Step 2) Specification of Materials</h4>
                            <form name="step2-estimator" id="step2-estimator" action="<?php echo $base_url.'index.php?action=sales&query=step2-estimator';?>" method="post">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Service</th>
                                        <th>Remark(s)</th>
                                        <th>Material Type</th>
                                        <th>Special Remark</th>
                                    </tr>
                                </thead>
                                <?php

                                $material='';
                                $mtype=$product->get_material_unique();

                                foreach($mtype as $w=>$v)
                                {
                                    $material.= '<option>'.$mtype[$w]['material_type'].'</option>';
                                }    
    

                                $counter=1;
                                    $material_list = $sales->get_temp_item_material($items[0]['sid'],$items[0]['pid']);
                                    foreach($material_list as $r=>$v)
                                    {
                                    $service = $product->get_capability_byid($material_list[$r]['capability']);
                                    
                                    echo "<tr id='".$r."'>";
                                    echo "<td>".$counter++."</td>";
                                    echo "<td>".$service[0]['capability']."</td>";
                                    echo "<td>".$material_list[$r]['remark']."</td>";
                                    //-- get material by offered capability 
                                    $material1 = $product->get_material_bycapability($material_list[$r]['capability']);
                                    ?>
                                    <td>
                                        <input type="hidden" name="part_id[]" value="<?php echo $material_list[$r]['id'];?>">
                                        <select name="mtype<?php echo $r;?>[]" id="mtype[]" class="form-control " style="width:90%" multiple="multiple">
                                            <option>-Select-</option>
                                            <?php foreach($material1 as $w=>$v)
                                            {
                                                $mtype_selection = explode("," ,$material_list[$r]['mtype']);
                                                if(in_array($material1[$w]['col1'], $mtype_selection)){$selected='selected="selected"';}else{$selected='';}

                                                echo '<option value="'.$material1[$w]['col1'].'" '.$selected.'>'.$material1[$w]['col2'].'</option>';

                                                //-- get child material 
                                                $material2 = $product->get_material_bycapability_child($material_list[$r]['capability'],$material1[$w]['col1']);
                                                foreach($material2 as $w=>$v)
                                                {
                                                    if(in_array($material2[$w]['id'], $mtype_selection)){$selected='selected="selected"';}else{$selected='';}

                                                    echo '<option value="'.$material2[$w]['id'].'" '.$selected.'> - '.$material2[$w]['material_name'].'</option>';
                                                }
                                            }
                                            ?>
                                        
                                        </select>                                   
                                    </td>
                                    <td>
                                    <input type="text" name="mtype_remark[]" class="form-control" value="<?php echo $material_list[$r]['mtype_remark'];?>">
                                    </td>
                                    
                                    <?php
                                    echo "</tr>";
                                    } 
                                    ?>
                                    <tr>
                                        <td><input type="button" onclick="form_submit('step2-estimator')" class="btn btn-md btn-warning" value="Save"></td>
                                        <td></td>
                                    </tr>
                                </table>
                                </form>
							</div>
						</div>

                        <div class="tab-pane" id="assembly" role="tabpanel">
							<div class="p-15">
                                <h4>Step 3.1) Assembly</h4>

                                <span id="msgstep3-1-estimator"></span>
                                <form name="step3-1-estimator" id="step3-1-estimator" action="<?php echo $base_url.'index.php?action=sales&query=step3-1-estimator';?>" method="post">
                                <table class="table table-bordered" id="assemblytablepart">
                                    <tr>
                                        <th>Assembly Part Name</th>
                                        <th>Qty</th>
                                    </tr>
                                    <?php
                                    $assembly_details = json_decode($items[0]['assembly']);                                    
                                    if($assembly_details !='')
                                    {
                                    foreach($assembly_details as $a=>$v)
                                        {
                                            echo "<tr id='".$a."'>";
                                            echo "<td><input type='text' name='assembly[]' class='form-control' value='".$v->assembly."'></td>";
                                            echo "<td><input type='number' name='assembly_qty[]' class='form-control' value='".$v->assembly_qty."'></td>";
                                            ?>
                                            <td><i class="fa fa-trash" onclick="deleteme('sales','delete_mtype_step3-1-estimator','<?php echo $r.'&sid='.$items[0]['id'];?>')"></i></td>
                                            <?php
                                            echo "</tr>";
                                        }
                                    }
                                    ?>

                                </table>
                                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" id="id">
                                <input type="button" name="addmore" class="btn btn-md btn-secondary" value="Add More Assembly Part" id="assemblyaddmore_part">
                                <input type="button" onclick="form_submit('step3-1-estimator')" class="btn btn-md btn-warning" value="Save">
                                </form>
                                </div>
                        </div>
                        
                        
						<div class="tab-pane" id="messages11" role="tabpanel">
							<div class="p-15">
                                <h4>Step 3.2) Sub Assembly</h4>
                                <span id="msgstep3-estimator"></span>
                                <form name="step3-estimator" id="step3-estimator" action="<?php echo $base_url.'index.php?action=sales&query=step3-estimator';?>" method="post">
                                <table class="table table-bordered" id="tablepart">
                                    <tr>
                                        <th>Assembly</th>
                                        <th>Sub Assembly</th>
                                        <th>Qty</th>
                                    </tr>
                                    <?php
                                    $part_details = json_decode($items[0]['part']);
                                    
                                    if($part_details !='')
                                    {
                                    foreach($part_details as $r=>$v)
                                        {
                                            echo "<tr id='".$r.'&sid='.$items[0]['id']."'>";
                                            echo "<td>";
                                            //-- dimensions and material 
                                            echo "<input type='hidden' name='length[]' value='".$v->length."'>";
                                            echo "<input type='hidden' name='width[]' value='".$v->width."'>";
                                            echo "<input type='hidden' name='height[]' value='".$v->height."'>";
                                            echo "<input type='hidden' name='wood[]' value='".$v->wood."'>";
                                            echo "<input type='hidden' name='total[]' value='".$v->total."'>";

                                                echo "<select name='assembly[]' class='form-control'>";
                                                echo "<option value=''>-Select-</option>";
                                                foreach ($assembly_details as $as=>$av) {
                                                    if($av->assembly == $v->assembly){$selected='selected="selected"';}else{$selected='';}
                                                    echo '<option value="'.$av->assembly.'" '.$selected.'>'.$av->assembly.'</option>';
                                                }
                                                echo "<select/>";
                                            echo "</td>";
                                            echo "<td><input type='text' name='part_name[]' class='form-control' value='".$v->part_name."'></td>";
                                            echo "<td><input type='number' name='qty[]' class='form-control' value='".$v->qty."'></td>";
                                            ?>
                                            <td><i class="fa fa-trash" onclick="deleteme('sales','delete_mtype_step3-estimator','<?php echo $r.'&sid='.$items[0]['id'];?>')"></i></td>
                                            <?php
                                            echo "</tr>";
                                        }
                                    }
                                    ?>

                                </table>
                                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" id="id">
                                <input type="button" name="addmore" class="btn btn-md btn-secondary" value="Add More Sub Assembly Part" id="addmore_part">
                                <input type="button" onclick="form_submit('step3-estimator')" class="btn btn-md btn-warning" value="Save">
                                </form>
							</div>
						</div>
						<div class="tab-pane" id="setting11" role="tabpanel">
							<div class="p-15">
                                <h4>Step 4) Wood Work</h4>
                                <table class="table table-bordered">
                                <span id="msgstep4-estimator"></span>
                                <!---------- form action will be same due to a single column handled in this ----------->
                                    <form name="step4-estimator" id="step4-estimator" action="<?php echo $base_url.'index.php?action=sales&query=step3-estimator';?>" method="post">
                                        <tr>
                                            <th>Part Name</th>
                                            <th>Qty</th>
                                            <th>Material</th>
                                            <th>Length (MM)</th>
                                            <th>Width (MM)</th>
                                            <th>Height (MM)</th>
                                            <th>Total (CFT)</th>
                                        </tr>
                                        <?php
                                        if($part_details !='')
                                        {
                                        foreach($part_details as $r=>$v)
                                            {
                                                echo "<tr>";?>
                                                    <td>    
                                                    <input type='hidden' name='assembly[]' class='form-control' value='<?php echo $v->assembly;?>'>    
                                                    <input type='hidden' name='part_name[]' class='form-control' value='<?php echo $v->part_name;?>'>
                                                    <?php echo $v->part_name;?></td>
                                                    <td>
                                                    <!-- qty -->
                                                    <input type='hidden' name='qty[]' class='form-control' id="qty<?php echo 'mm'.$r;?>" value='<?php echo $v->qty;?>'><?php echo $v->qty;?></td>
                                                    <!-- material type -->
                                                     <td>
                                                        <select name="wood[]" class="form-control">
                                                            <option value="0">Select Material</option>
                                                            <?php
                                                            $wood = $product->get_material_bycapability('1');
                                                            foreach($wood as $w=>$v1)
                                                            {
                                                                if($wood[$w]['col1']==$v->wood){$selected='selected="selected"';}else{$selected='';}
                                                                echo "<option value='".$wood[$w]['col1']."' ".$selected.">".$wood[$w]['col2']."</option>";
                                                                //-- get child material 
                                                                $wood2 = $product->get_material_bycapability_child('1',$wood[$w]['col1']);
                                                                foreach($wood2 as $w2=>$v2)
                                                                {
                                                                    if($wood2[$w2]['id']==$v->wood){$selected='selected="selected"';}else{$selected='';}
                                                                    echo '<option value="'.$wood2[$w2]['id'].'" '.$selected.'> - '.$wood2[$w2]['material_name'].'</option>';
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                     </td>
                                                    <td><input type='number' name='length[]' id="length<?php echo 'mm'.$r;?>" class='form-control' value='<?php echo $v->length;?>' onkeypress="mm_to_foot('<?php echo 'mm'.$r;?>','<?php echo 'cft'.$r;?>')"></td>
                                                    <td><input type='number' name='width[]' id="width<?php echo 'mm'.$r;?>" class='form-control' value='<?php echo $v->width;?>' onkeypress="mm_to_foot('<?php echo 'mm'.$r;?>','<?php echo 'cft'.$r;?>')"></td>
                                                    <td><input type='number' name='height[]' id="height<?php echo 'mm'.$r;?>" class='form-control' value='<?php echo $v->height;?>' onkeypress="mm_to_foot('<?php echo 'mm'.$r;?>','<?php echo 'cft'.$r;?>')"></td>
                                                    <td><input type='number' name='total[]' class='form-control' id='<?php echo 'cft'.$r;?>' value='<?php echo $v->total;?>'></td>
                                                <?php echo "</tr>";
                                            }
                                        }
                                        ?>
                                        <tr>
                                            <td>
                                                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" id="id">    
                                                <input type="button" class="btn btn-md btn-secondary" onclick="form_submit('step4-estimator')"  value="Save">
                                            </td>
                                            <td></td>
                                        </tr>
                                    </form>
                                </table>
							</div>
						</div>
                        <div class="tab-pane" id="hardware" role="tabpanel">
							<div class="p-15">
                                <h4>Step 5) Hardware</h4>
                                <span id="msgstep-hardware-estimator"></span>
                                <form name="step-hardware-estimator" id="step-hardware-estimator" action="<?php echo $base_url.'index.php?action=sales&query=step-hardware-estimator';?>" method="post">
                                <table class="table table-bordered" id="table_hardware">                                
                                <!---------- form action will be same due to a single column handled in this ----------->
                                        <tr>
                                            <th>#</th>
                                            <th>Hardware</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                            <th>Delete</th>
                                        </tr>
                                        <?php 
                                        $hardware_details=json_decode($items[0]['hardware']);
                                        $hcount=1;
                                        if($hardware_details !='')
                                        {
                                        
                                        foreach($hardware_details as $h1=>$h)
                                            {
                                                echo "<tr>";
                                                    echo "<td>".$hcount."</td>";
                                                    echo "<td>";
                                                        echo '<select class="select2 form-control" name="hardware_id[]"><option disabled="disabled" selected="selected">Select</option>';
                                                            $hlist = $store->get_items();
                                                            foreach($hlist as $k=>$c1){
                                                                 $subcat=$store->get_cat_single($hlist[$k]['subcat']);
                                                                if($hlist[$k]['id']==$h->hardware){$selected="selected='selected'";}else{$selected="";}
                                                                echo '<option value="'.$hlist[$k]['id'].'" '.$selected.'>'.$subcat[0]['subcat'].' - '.$hlist[$k]['product_name'].'</option>';
                                                            }
                                                        echo '</select>';
                                                    echo "</td>";
                                                    echo "<td><input type='number' name='price[]' class='form-control' value='".$h->price."'></td>";
                                                    echo "<td><input type='number' name='qty[]' class='form-control' value='".$h->qty."'></td>";
                                                    echo "<td><input type='number' name='total[]' class='form-control' value='".$h->total."'></td>";
                                                    echo "<td>";
                                                    ?><i class='fa fa-trash' onclick="deleteme('sales','delete_hardware','<?php echo $h1.'&sid='.$items[0]['id'];?>')"><?php echo "</td>";   
                                                echo "</tr>";
                                                $hcount++;
                                                
                                            }
                                        }
                                        ?>
                                        </table>
                                        <input type="button" class="btn btn-md btn-secondary" id="addmore_hardware" value="Add Hardware">
                                        <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" id="id">
                                        <input type="button" class="btn btn-md btn-primary" onclick="form_submit('step-hardware-estimator')"  value="Save">
                                    </form>

                            </div>
                        </div>    
						<div class="tab-pane" id="about11" role="tabpanel">
							<div class="p-15">
                                <h4>Step 6) Canework</h4>
                                <span id="msgstep5-estimator"></span>
                                <form name="step5-estimator" id="step5-estimator" action="<?php echo $base_url.'index.php?action=sales&query=step5-estimator';?>" method="post">
                                <table class="table table-bordered" id="table_cane">
                                    <tr>
                                        <th>Part Name</th>
                                        <th>Qty</th>
                                        <th>Type</th>
                                        <th>Labour Cost</th>
                                        <th>Length (MM)</th>
                                        <th>Width (MM)</th>
                                        <th>Total</th>
                                    </tr>
                                   <?php 
                                   $cane_details = json_decode($items[0]['cane']);
                                   if($cane_details !='')
                                   {
                                   foreach($cane_details as $r=>$c)
                                       {
                                           echo "<tr>";
                                               echo "<td><input type='text' name='part_name[]' class='form-control' value='".$c->part_name."'></td>";
                                               echo "<td><input type='text' name='qty[]' class='form-control' value='".$c->qty."'></td>";
                                               echo "<td>";?>
                                               <select class="form-control" name="cane_type[]" onchange="get_details2('cane_type<?php echo $c;?>','cane_labour<?php echo $c;?>','<?php echo $base_url.'index.php?action=store&query=get_labour_cost&material_id=';?>')">
                                                <option disabled="disabled" selected="selected">Select</option>
                                               <?php 
                                                    $canework = $product->get_material_bycapability_child('8','91');
                                                    foreach($canework as $k=>$c1){
                                                        if($canework[$k]['id']==$c->type){$selected="selected='selected'";}else{$selected="";}
                                                        echo '<option value="'.$canework[$k]['id'].'" '.$selected.'>'.$canework[$k]['material_name'].'</option>';
                                                    }
                                                echo '</select>';
                                               echo "</td>";
                                               echo "<td><input type='number' name='labour_cost[]' value='cane_labour$c' class='form-control' value='".$c->labour_cost."'></td>";
                                               echo "<td><input type='number' name='length[]' class='form-control' value='".$c->length."'></td>";
                                               echo "<td><input type='number' name='width[]' class='form-control' value='".$c->width."'></td>";
                                               echo "<td><input type='number' name='total[]' class='form-control' value='".$c->total."'></td>";
                                           echo "</tr>";
                                       }
                                   }
                                   ?>
                                    
                                </table>
                                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" id="id">
                                <input type="button" name="addmore_cane" class="btn btn-md btn-info" value="Add More Cane Part" id="addmore_cane">
                                <input type="button" onclick="form_submit('step5-estimator')" class="btn btn-md btn-success" value="Save">
                                </form>
							</div>
						</div>
						<div class="tab-pane" id="upholestry" role="tabpanel">
							<div class="p-15">
                                 <h4>Step 7) Upholestry</h4>
                                 <span id="msgstep6-estimator"></span>
                                <form name="step6-estimator" id="step6-estimator" action="<?php echo $base_url.'index.php?action=sales&query=step6-estimator';?>" method="post">
                                <table class="table table-bordered" id="table_up">
                                    <tr>
                                        <th>Part Name</th>
                                        <th>Qty</th>
                                        <th>Type</th>
                                        <th>Length (MM)</th>
                                        <th>Width (MM)</th>
                                        <th>Labour Cost</th>
                                        <th>Total</th>
                                    </tr>
                                   <?php 
                                   $up_details = json_decode($items[0]['upholestry']);
                                   if($up_details !='')
                                   {
                                   foreach($up_details as $r=>$u)
                                       {
                                           echo "<tr>";
                                               echo "<td><input type='text' name='part_name[]' class='form-control' value='".$u->part_name."'></td>";
                                               echo "<td><input type='text' name='qty[]' class='form-control' value='".$u->qty."'></td>";
                                               echo "<td>";
                                                echo '<select class="form-control" name="up_type[]"><option disabled="disabled" selected="selected">Select</option>';
                                                    $upholestry = $product->get_material_bycapability('3');
                                                    foreach($upholestry as $k=>$u1){
                                                        if($upholestry[$k]['col1']==$u->type){$selected0="selected='selected'";}else{$selected0="";}
                                                        echo '<option value="'.$upholestry[$k]['col1'].'" '.$selected0.'>'.$upholestry[$k]['col2'].'</option>';
                                                    }
                                                echo '</select>';
                                               echo "</td>";
                                               echo "<td><input type='number' name='length[]' class='form-control' value='".$u->length."'></td>";
                                               echo "<td><input type='number' name='width[]' class='form-control' value='".$u->width."'></td>";
                                               echo "<td><input type='number' name='labour_cost[]' class='form-control' value='".$u->labour_cost."'></td>";
                                               echo "<td><input type='number' name='total[]' class='form-control' value='".$u->total."'></td>";
                                           echo "</tr>";
                                       }
                                   }
                                   ?>
                                    
                                </table>
                                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" id="id">
                                <input type="button" name="addmore_up" class="btn btn-md btn-info" value="Add More Cane Part" id="addmore_up">
                                <input type="button" onclick="form_submit('step6-estimator')" class="btn btn-md btn-success" value="Save">
                                </form>
                                
							</div>
						</div>

                        <!-------- 8. polish ------------->
                        <div class="tab-pane" id="contact11" role="tabpanel">
							<div class="p-15" id="step7-estimator_div">
                                  <?php include('sales_rfq_step7_estimator_polish.php');?>
							</div>
						</div>

                        <!-------- 9. cartoon ------------->
                        <div class="tab-pane" id="packing" role="tabpanel">
							<div class="p-15">
                                 <h4>Step 9) Cartoon(s)</h4>
                                 <span id="msgstep8-estimator"></span>
                                 <form name="step8-estimator" id="step8-estimator" action="<?php echo $base_url.'index.php?action=sales&query=step8-estimator';?>" method="post">
                                <table class="table table-bordered">
                                    <tr>
                                        <th colspan="4">Master Cartoon Dimension</th>
                                        <th rowsapn="2">Labour Cost</th>
                                        <th>Total INR</th>
                                    </tr>
                                    <tr>
                                        <td>Length (MM)</td>
                                        <td>Width (MM)</td>
                                        <td>Height (MM)</td>
                                        <td>Total CBM</td>
                                    </tr>
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
                                        <td>
                                            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" id="id">
                                            <input type="hidden" name="qty" value="1" id="qtypacking">
                                            <input type="number" name="length" id="lengthpacking" onkeypress="mm_to_foot('packing','cftpacking')" value="<?php echo $pval['length'];?>"  class="form-control">
                                        </td>
                                        <td><input type="number" name="width" id="widthpacking" onkeypress="mm_to_foot('packing','cftpacking')" value="<?php echo $pval['width'];?>" class="form-control"></td>
                                        <td><input type="number" name="height" id="heightpacking" value="<?php echo $pval['height'];?>" class="form-control" onkeypress="mm_to_foot('packing','cftpacking')"></td>

                                        <td><input type="number" name="cbm" id="cftpacking" value="<?php echo $pval['cbm'];?>" class="form-control" ></td>
                                        <td><input type="number" name="labour_cost"  id="labourpacking" value="<?php echo $pval['labour_cost'];?>" class="form-control"></td>
                                        <td><input type="number" name="total" id="totalpacking" value="<?php echo $pval['total'];?>" class="total_inr  form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="button" class="btn btn-md btn-dark" value="Save" onclick="form_submit('step8-estimator')"></td>
                                        <td></td>
                                    </tr>
                                </table>
                                </form>


                                <hr>
                                <span id="msgstep8-estimator1"></span>
                                <form name="step8-estimator1" id="step8-estimator1" action="<?php echo $base_url.'index.php?action=sales&query=step8-estimator1';?>" method="post">
                                <table class="table table-bordered" id="table_packing">
                                    <tr>
                                        <th rowspan="2">Number Of Case</th>
                                        <th colspan="3">Dimension</th>
                                    </tr>
                                    <tr>
                                        <td>Length (MM)</td>
                                        <td>Width (MM)</td>
                                        <td>Height (MM)</td>
                                    </tr>
                                    <?php 
                                    $packing_details = json_decode($items[0]['packing2']);
                                    if($packing_details !='')
                                    {
                                    foreach($packing_details as $r=>$p2)
                                        {
                                            echo "<tr>";?>
                                                <td><input type='text' name='case[]' class='form-control' readonly='readonly' value='<?php echo $p2->case;?>'></td>
                                                <td><input type='text' name='length[]'  class='form-control' value='<?php echo $p2->length;?>'></td>
                                                <td><input type='number' name='width[]' class='form-control' value='<?php echo $p2->width;?>'></td>
                                                <td><input type='number' name='height[]' class='form-control' id="cft_cartoon" value='<?php echo $p2->height;?>'></td>
                                                <td>
                                                    <i class="fa fa-trash"></i>
                                                </td>
                                            <?php echo "</tr>";
                                        }
                                    }
                                    ?>
                                </table>
                                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" id="id">
                                <input type="button" name="addmore_up" class="btn btn-md btn-warning" value="Add More Case" id="addmore_packing">
                                <input type="button" onclick="form_submit('step8-estimator1')" class="btn btn-md btn-success" value="Save">
                                </form>

                                
							</div>
						</div>
                        <div class="tab-pane" id="logistics" role="tabpanel">
							<div class="p-15">
                                 <h4>Step 10) Logistics With Packing Material</h4>
                                <span id="msgstep8-estimator1_logistics"></span>
                                <form name="step8-estimator1_logistics" id="step8-estimator1_logistics" action="<?php echo $base_url.'index.php?action=sales&query=step8-estimator1_logistics';?>" method="post">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Case</th>
                                        <th>Parts Name</th>
                                        <th>Kg</th>
                                        <th>Box Type</th>
                                        <th>Product Nature</th>
                                        <th>Scratch Protect</th>
                                        <th>Delivery Method</th>
                                        <th>BOM Update Stage</th>
                                    </tr>
                                    <?php
                                    $case_nu = json_decode($items[0]['packing2']);
                                   
                                    $logitics = json_decode($items[0]['logistics']);
                                    $logitics0=array();
                                    //print_r($logistics);
                                    foreach($logitics as $l=>$f0)
                                        {
                                            $val = array (
                                                "case"=>$f0->case,
                                                "kg"=>$f0->kg,
                                                "box_type"=>$f0->box_type,
                                                "product_nature"=>$f0->product_nature,
                                                "delivery_method"=>$f0->delivery_method,
                                                "scratch_protect"=>$f0->scratch_protect,
                                                "bom_update_stage"=>$f0->bom_update_stage
                                                );
                    
                                            array_push($logitics0,$val);
                                        }
                                        //print_r($logitics0);

                                    if($items[0]['packing2'] !='')
                                    {
                                  

                                        foreach($case_nu as $r1=>$v1)
                                        {
                                            //-- change parts into array from comma delimit / used assembly on place of part
                                            $parts=explode(',',$logitics0[$r1]['assembly']);
                                            echo "<tr>";
                                                echo "<td>".$v1->case."</td>";
                                                echo "<td>";
                                                    echo "<input type='hidden' name='case[]' value='".$v1->case."'>";
                                                    echo "<select class='form-control' name='assembly".$v1->case."[]' multiple='multiple'>";
                                                        echo "<option disabled='disabled' selected='selected'>Select</option>";
                                                        foreach($assembly_details as $r=>$v)
                                                        {
                                                            $selected='';
                                                            if (in_array($v->assembly, $parts))
                                                                    {
                                                                    $selected='selected="selected"';
                                                                    }                       
                                                            echo "<option value='".$v->assembly."' $selected>".$v->assembly."</option>";
                                                        }
                                                    echo "</select>";
                                                echo "</td>";
                                                echo "<td>";
                                                     echo "<input type='number' name='kg[]' class='form-control' value='".$logitics0[$r1]['kg']."'>";   
                                                echo "</td>";
                                                ?>
                                                <td>
                                                    <select name="box_type[]" class="form-control">
                                                        <option disaled="disabled" selected="selected">Select</option>
                                                        <?php 
                                                        $cartoon=$store->get_item_bysubcat('30');
                                                        foreach($cartoon as $c=>$v){
                                                            $selected0='';
                                                            if($cartoon[$c]['product_name']==$logitics0[$r1]['box_type'])
                                                            {
                                                                $selected0='selected="selected"';
                                                            }
                                                        ?>
                                                        <option <?php echo $selected0;?>><?php echo $cartoon[$c]['product_name'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="product_nature[]" class="form-control">
                                                        <option disaled="disabled" selected="selected">Select</option>
                                                        <?php 
                                                        $product_nature=$admin->get_metaname_byvalue1('logistics_meta','product_nature');
                                                        foreach($product_nature as $c=>$v){
                                                            $selected='';
                                                            if($logitics0[$r1]['product_nature']==$product_nature[$c]['value2'])
                                                            {
                                                                $selected='selected="selected"';
                                                            }
                                                        ?>
                                                        <option <?php echo $selected;?>><?php echo $product_nature[$c]['value2'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="delivery_method[]" class="form-control">
                                                        <option disaled="disabled" selected="selected">Select</option>
                                                        <?php 
                                                        $delivery_method=$admin->get_metaname_byvalue1('logistics_meta','delivery_method');
                                                        foreach($delivery_method as $c=>$v){
                                                            $selected='';
                                                            if($logitics0[$r1]['delivery_method']==$delivery_method[$c]['value2'])
                                                            {
                                                                $selected='selected="selected"';
                                                            }
                                                        ?>
                                                        <option <?php echo $selected;?>><?php echo $delivery_method[$c]['value2'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="scratch_protect[]" class="form-control">
                                                        <option disaled="disabled" selected="selected">Select</option>
                                                        <?php 
                                                        $scratch_protect=$admin->get_metaname_byvalue1('logistics_meta','scratch_protect');
                                                        foreach($scratch_protect as $c=>$v){
                                                            $selected='';
                                                            if($logitics0[$r1]['scratch_protect']==$scratch_protect[$c]['value2'])
                                                            {
                                                                $selected='selected="selected"';
                                                            }
                                                        ?>
                                                        <option <?php echo $selected;?>><?php echo $scratch_protect[$c]['value2'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="bom_update_stage[]" class="form-control">
                                                        <option disaled="disabled" selected="selected">Select</option>
                                                        <?php 
                                                        $bom_update_stage=$admin->get_metaname_byvalue1('logistics_meta','bom_update_stage');
                                                        foreach($bom_update_stage as $c=>$v){
                                                            $selected='';
                                                            if($logitics0[$r1]['scratch_protect']==$scratch_protect[$c]['value2'])
                                                            {
                                                                $selected='selected="selected"';
                                                            }
                                                        ?>
                                                        <option <?php echo $selected;?>><?php echo $bom_update_stage[$c]['value2'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>

                                                <?php 
                                            echo "</tr>";


                                        }


                                    }
                                    ?>
                                  
                                    <tr>
                                        <td>
                                            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" id="id">
                                            <input type="button" class="btn btn-md btn-primary" value="Update" onclick="form_submit('step8-estimator1_logistics')">
                                        </td>
                                        <td></td>
                                    </tr>
                                </table>
                                </form>

                                <hr>
                                <h4>Loadability</h4>
                                 <form name="container_unit" id="container_unit" action="<?php echo $base_url.'index.php?action=sales&query=container_unit';?>" method="post">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th width="30%">
                                            <label>Select Container Type</label>
                                            <input type="hidden" name="length" value="<?php echo $pval['length'];?>">
                                            <input type="hidden" name="width" value="<?php echo $pval['width'];?>">
                                            <input type="hidden" name="height" value="<?php echo $pval['height'];?>">
                                            <select name="container_type" class="form-control" onchange="form_submit_result('container_unit')">
                                                <option disaled="disabled" selected="selected">Select</option>
                                                <option value="20ft">20ft</option>
                                                <option value="40ft">40ft</option>
                                                <option value="40ftHQ">40ftHQ</option>
                                            </select>    
                                        </th>
                                        <td colspan="3" id="msgcontainer_unit"></td>
                                    </tr>
                                </table>    
                                </form>

                                <?php $loadability = json_decode($items[0]['loadability'],true); ?>
                                <span id="msgstep_11_loadability"></span>
                                <form name="loadability" id="step_11_loadability" action="<?php echo $base_url.'index.php?action=sales&query=step_11_loadability';?>" method="post">
                                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/>
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th>Number Of Boxes (Length)</th>
                                        <th>Number Of Boxes (Width)</th>
                                        <th>Number Of Boxes (Height)</th>
                                        <th>Total</th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="value1[]" class="form-control" value="<?php echo $loadability[0]['value1'];?>"></td></td>
                                        <td><input type="text" name="value2[]" class="form-control" value="<?php echo $loadability[0]['value2'];?>"></td></td>
                                        <td><input type="text" name="value3[]" class="form-control" value="<?php echo $loadability[0]['value3'];?>"></td></td>
                                        <td><input readonly="readonly" type="text" name="value4[]" class="form-control" value="<?php echo $loadability[0]['value4'];?>"></td></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="value1[]" class="form-control" value="<?php echo $loadability[1]['value1'];?>"></td></td>
                                        <td><input type="text" name="value2[]" class="form-control" value="<?php echo $loadability[1]['value2'];?>"></td></td>
                                        <td><input type="text" name="value3[]" class="form-control" value="<?php echo $loadability[1]['value3'];?>"></td></td>
                                        <td><input readonly="readonly" type="text" name="value4[]" class="form-control" value="<?php echo $loadability[1]['value4'];?>"></td></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="value1[]" class="form-control" value="<?php echo $loadability[2]['value1'];?>"></td></td>
                                        <td><input type="text" name="value2[]" class="form-control" value="<?php echo $loadability[2]['value2'];?>"></td></td>
                                        <td><input type="text" name="value3[]" class="form-control" value="<?php echo $loadability[2]['value3'];?>"></td></td>
                                        <td><input readonly="readonly" type="text" name="value4[]" class="form-control" value="<?php echo $loadability[2]['value4'];?>"></td></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="value1[]" class="form-control" value="<?php echo $loadability[3]['value1'];?>"></td></td>
                                        <td><input type="text" name="value2[]" class="form-control" value="<?php echo $loadability[3]['value2'];?>"></td></td>
                                        <td><input type="text" name="value3[]" class="form-control" value="<?php echo $loadability[3]['value3'];?>"></td></td>
                                        <td><input readonly="readonly" type="text" name="value4[]" class="form-control" value="<?php echo $loadability[3]['value4'];?>"></td></td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Total</th>
                                        <th colspan="2"></th>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td><input type="button" name="submit_load" value="Update" class="btn btn-warning" onclick="form_submit('step_11_loadability')"></td>
                                    </tr>
                                </table>
                                </form>
							</div>
						</div>

                        

                        <!-------- final result --------->
                        <div class="tab-pane" id="final_result" role="tabpanel"></div>


                        <div class="tab-pane" id="Summary" role="tabpanel">
							<div class="p-15">
                                
                                <div class="row" style="overflow-x: scroll">
                                    <style>
                                        #costsheet{width:100%; border:1px solid; color:#000; margin:5px 0px;}   
                                        #costsheet tr th{
                                            font-size:12px; background-color:#000; color:#FFF; padding:2px;
                                        }
                                        #costsheet tr td{
                                            font-size:10px; padding:2px;
                                        }
                                        #costsheet th{min-width:40px; border:1px solid;}
                                        #costsheet td{min-width:40px; border:1px solid;}

                                        #packingsheet{width:100%; border:1px solid; color:#080808; margin:5px 0px;}   
                                        #packingsheet tr th{
                                            font-size:12px; background-color:#000; color:#c96; padding:2px;
                                        }
                                        #packingsheet tr td{
                                            font-size:10px; padding:2px;
                                        }
                                        #packingsheet th{min-width:40px; border:1px solid;}
                                        #packingsheet td{min-width:40px; border:1px solid;}

                                        #summaryhr{margin:8px 0px; border:0.5px solid #000; width:100%;}
                                    </style>
                                   
                                    <h4>Cost Sheet</h4>  
                                    <table id="costsheet">
                                        <tr>
                                            <th>Part Name</th>
                                            <th>Wood / Board</th>
                                            <th>L mm</th>
                                            <th>W mm</th>
                                            <th>T mm</th>
                                            <th>Qty / Unit</th>
                                            <th>Raw Material Selection</th>
                                            <th>RM Qty (pcs) / Unit</th>
                                            <th>Comp CFT/SFT / Unit</th>
                                            <th>Rm Rate</th>
                                            <th>Rm Cost / Unit</th>
                                            <th>Rm Yield%</th>
                                            <th>% of Comp for Wood or Board</th>
                                            <th>length Cuts</th>
                                            <th>Wood pcs per part width</th>
                                            <th>Wood pcs per part thickness</th>
                                            <th>Part Sq. Ft. (one side)</th>
                                            <th>Unit Kg</th>
                                            <th>Rough Est Kg.</th>
                                            <th>Average Thickness</th>
                                        </tr> 
                                        
                                        <?php
                                        //-- items dimension for percentage into the product change into inches and then divide by 1728
                                            $item_cft = $product->get_cft($items[0]['length'],$items[0]['width'],$items[0]['height']);
                                            

                                            //--- pdf array
                                            $wood_pdf = array();
                                            $rm_rate_total=0;
                                            $comp_cft_total=0;
                                            $rm_cost_total=0;
                                            $rm_yield_total=0;
                                            //-- counter 
                                            $wcounter=0;
                                            $wcounter_array = array();
                                        
                                        foreach($part_details as $cs=>$cv)
                                        {   
                                            if(!empty(($cv->wood)))
                                            {
                                            //-- get wood type
                                            $wood_type = $product->get_material_byid($cv->wood);
                                            //-- cft of current part
                                            $cft_current = $product->get_cft($cv->length,$cv->width,$cv->height);
                                            $cft_total_part = $cft_current*$cv->qty;

                                            //$wood_pillar = $product->get_nearby_pillar($cft_current,$cv->wood);

                                            //-- get l,w,h of pillar from materal_yield table on the basis of type and wood
                                            $wood_yield_l = $product->get_wood_yield($cv->wood,'L',$cv->length); 
                                            $wood_yield_w = $product->get_wood_yield($cv->wood,'W',$cv->width); 
                                            $wood_yield_h = $product->get_wood_yield($cv->wood,'H',$cv->height); 

                                            //-- mm to feet and inches of wood pillar
                                            // $l=$wood_pillar[0]['lmm']/304.8;
                                            // $l = number_format((float)$l, 2, '.', '');
                                            // $w=$wood_pillar[0]['wmm']/25.4;
                                            // $w = number_format((float)$w, 2, '.', '');
                                            // $h=$wood_pillar[0]['hmm']/25.4;
                                            // $h = number_format((float)$h, 2, '.', '');

                                            //-- sizes has been float as per the db entries
                                            $pillar_l = number_format((float)$wood_yield_l[0]['thickness'], 1, '.', '');
                                            $pillar_w = number_format((float)$wood_yield_w[0]['thickness'], 0, '.', '');
                                            $pillar_h = number_format((float)$wood_yield_h[0]['thickness'], 2, '.', '');
                                            $pillar_size_converted=$pillar_l."ft x ".$pillar_w."in x ".$pillar_h."in";
                                            
                                            //-rm qty
                                            $rm_qty = $cv->qty*$wood_yield_l[0]['thickness_stack']*$wood_yield_w[0]['thickness_stack']*$wood_yield_h[0]['thickness_stack'];
                                            $rm_qty_total += $rm_qty;

                                            //-- rm cft
                                            $rm_group=$product->get_rm_group($cv->wood,$wood_yield_l[0]['thickness'],$wood_yield_w[0]['thickness'],$wood_yield_h[0]['thickness']);
                                            $rm_cft = $rm_group[0]['paycft'];
                                            //-- comp cft 
                                            $comp_cft = $rm_qty*$rm_cft ;
                                            $comp_cft=number_format((float)$comp_cft, 2, '.', '');
                                            array_push($wcounter_array,$comp_cft);

                                            $comp_cft_total += $comp_cft;
                                                    //-- check if board / wood
                                                    if (str_contains($wood_yield_h[0]['wood_type'], 'Board')) { 
                                                            $board_cft += $comp_cft;
                                                        }
                                                    else
                                                        {
                                                            $wood_cft += $comp_cft;
                                                        }

                                            //-- rm rate 
                                            $rm_rate = $product->get_rm_rate($wood_type[0]['material_name'],$rm_group[0]['rate_group']);
                                            $rm_rate_total += $rm_rate;
                                            //-- rm cost
                                            $rm_cost = $rm_rate*$comp_cft;
                                            $rm_cost_total += $rm_cost;
                                            //--yield
                                            $yield=$product->get_yield($wood_type[0]['material_name'],$cv->length,$cv->width,$cv->height,$comp_cft,$cv->qty);
                                            $rm_yield_total += $yield;
                                            

                                            //-- part_sq_ft
                                            $part_sq_feet = (($cv->length*$cv->width)/1000000)*10.764;
                                            $part_sq_feet_total += $part_sq_feet;
                                            //-- unit weight  kg
                                            $unit_kg=$product->get_unit_kg_wood($wood_type[0]['material_name'],$pillar_size_converted);


                                            echo "<tr>";
                                                echo "<td>".$cv->part_name."</td>";
                                                echo "<td>".$wood_type[0]['material_name']."</td>";
                                                echo "<td>".$cv->length."</td>";
                                                echo "<td>".$cv->width."</td>";
                                                echo "<td>".$cv->height."</td>";
                                                echo "<td>".$cv->qty."</td>";
                                                echo "<td>".$wood_yield_h[0]['wood_type'].' '.$pillar_size_converted."</td>";
                                                echo "<td>".$rm_qty."</td>";
                                                echo "<td>".$comp_cft."</td>";
                                                echo "<td>".$rm_rate."</td>";
                                                echo "<td>".$rm_cost."</td>";
                                                echo "<td>".$yield."</td>";
                                                echo "<td id='per_wood$wcounter'></td>";
                                                echo "<td>".$wood_yield_l[0]['thickness_stack']."</td>";
                                                echo "<td>".$wood_yield_w[0]['thickness_stack']."</td>";
                                                echo "<td>".$wood_yield_h[0]['thickness_stack']."</td>";
                                                echo "<td>".$part_sq_feet."</td>";
                                                echo "<td>".$unit_kg[0]['weight']."</td>";
                                                echo "<td></td>";
                                                echo "<td></td>";
                                            echo "</tr>";
                                            $wcounter++;
                                        }}
                                        echo "<tr>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<th>".$rm_qty_total."</th>";
                                            echo "<th>".$comp_cft_total."</th>";
                                            echo "<th><small>";
                                                    echo "Board:-".$board_cft;
                                                    echo "<br>";
                                                    echo "Wood:-".$wood_cft;
                                            echo "</small></th>";
                                            echo "<th></th>";
                                            echo "<th></th>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<th>".$part_sq_feet_total."</th>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                        echo "</tr>";

                                        //-- js function to add % comp for each wood
                                        $w2counter=0;
                                        foreach($part_details as $cs=>$cv)
                                        {
                                            $cft_value = $wcounter_array[$w2counter];
                                            //$cft_final = $cft_value/$comp_cft_total;
                                            echo "<script>$('#per_wood$w2counter').html('".$cft_value."%');</script>";
                                            $w2counter++;
                                        }
                                        ?>
                                        </table>

                                       
                                        <?php 
                                        if($items[0]['packing2'] !='')
                                        {
                                            $packing_details_byfn=array();
                                            $packing_details21=array();
                                            $packing_details2 = json_decode($items[0]['packing2']);
                                            foreach($packing_details2 as $r=>$v)
                                            {
                                                $val = array (
                                                    "case"=>$v->case,
                                                    "length"=>$v->length,
                                                    "width"=>$v->width,
                                                    "height"=>$v->height
                                                    );
                        
                                                array_push($packing_details21,$val);
                                            }
                                            
                                            ?>
                                            <hr id="summaryhr">  
                                            <h4>Packing Sheet</h4> 
                                            <table id="packingsheet">
                                                <tr>
                                                    <th>BOX#</TH>
                                                    <TH>PART DESCRIPTION</TH>
                                                    <TH>Box Type</TH>
                                                    <TH>Inner L mm</TH>
                                                    <TH>Inner W mm</TH>
                                                    <TH>Inner H mm (Flute Direction non-opening side)</TH>
                                                    <TH>Net Weight Kg</TH>
                                                    <TH>PRODUCT/BOX</TH>
                                                    <TH>PRODUCT NATURE</TH>
                                                    <TH>SCRATCH PROTECT</TH>
                                                    <TH>DELIVERY METHOD</TH>
                                                    <TH>Carton L mm</TH>
                                                    <TH>Carton W mm</TH>
                                                    <TH>Carton H mm</th>
                                                </tr>
                                            <?php 
                                                foreach($case_nu as $r1=>$v1)
                                                {
                                                    //--call packing function and get all values in an array 
                                                    $packingfr=$sales->packing_cost_function($v1->case,$logitics0[$r1]['box_type'],$packing_details21[$r1]['length'],$packing_details21[$r1]['width'],$packing_details21[$r1]['height'],$logitics0[$r1]['kg'],$logitics0[$r1]['product_nature'],$logitics0[$r1]['scratch_protect'],$logitics0[$r1]['delivery_method']);
                                                    //-- put all into the array
                                                    array_push($packing_details_byfn,$packingfr);

                                                    echo "<tr>";
                                                        echo "<th>".$v1->case."</th>";
                                                        echo "<td>".$logitics0[$r1]['assembly']."</td>";
                                                        echo "<td>".$logitics0[$r1]['box_type']."</td>";
                                                        echo "<td>".$packing_details21[$r1]['length']."</td>";
                                                        echo "<td>".$packing_details21[$r1]['width']."</td>";
                                                        echo "<td>".$packing_details21[$r1]['height']."</td>";
                                                        echo "<td>".$logitics0[$r1]['kg']."</td>";
                                                        echo "<td></td>";
                                                        echo "<td>".$logitics0[$r1]['product_nature']."</td>";
                                                        echo "<td>".$logitics0[$r1]['scratch_protect']."</td>";
                                                        echo "<td>".$logitics0[$r1]['delivery_method']."</td>";
                                                        echo "<td>".$packing_details_byfn[$r1]['cartoonlmm']."</td>";
                                                        echo "<td>".$packing_details_byfn[$r1]['cartoonwmm']."</td>";
                                                        echo "<td>".$packing_details_byfn[$r1]['cartoonhmm']."</td>";
                                                    echo "</tr>";
                                                }
                                        ?>
                                        </table>

                                        <table id="packingsheet">
                                                <tr>
                                                        <th></th>
                                                    	<th>CARTON SPECS BF	CARTON SPECS PLY</TH>
                                                        <TH>CARTON SQ MTR</TH>
                                                        <TH>CUSHIONING THICKNESS MM</TH>
                                                        <TH>CORNER PROTECTOR 4 WALL</TH>
                                                        <TH>CORNER PROTECTOR 3 WALL</TH>
                                                        <TH>EDGE PROTECTOR 3 WALL</TH>
                                                        <TH>EDGE PROTECTOR 2 WALL</TH>
                                                        <TH>CUSHIONING PADS</TH>
                                                        <TH>WRAP THICKNESS MM</TH>
                                                        <TH>WRAP SQ. MTR.</TH>
                                                        <TH>CBM</TH>
                                                        <TH>DESSICANT grams</th>
                                                </tr>
                                                <?php 
                                                foreach($case_nu as $r1=>$v1)
                                                {
                                                    echo "<tr>";
                                                        echo "<th>".$v1->case."</th>";
                                                        echo "<td>".$packing_details_byfn[$r1]['cartoon_spec']."</td>";
                                                        echo "<td>".$packing_details_byfn[$r1]['cartoon_sq_mtr']."</td>";
                                                        echo "<td></td>";
                                                        echo "<td>".$packing_details_byfn[$r1]['corner_protector_wall4']."</td>";
                                                        echo "<td>".$packing_details_byfn[$r1]['corner_protector_wall3']."</td>";
                                                        echo "<td>".$packing_details_byfn[$r1]['edge_protector_wall3']."</td>";
                                                        echo "<td>".$packing_details_byfn[$r1]['edge_protector_wall2']."</td>";
                                                        echo "<td></td>";
                                                        echo "<td></td>";
                                                        echo "<td></td>";
                                                        echo "<td></td>";
                                                        echo "<td></td>";
                                                    echo "</tr>";
                                                }
                                        ?>
                                        </table>

                                        <table id="packingsheet">
                                            <tr>
                                                <th></th>
                                                <th>APPLICABLE RATES</TH>
                                                <TH>CARTON</TH>
                                                <TH>CORNER PROTECTOR 4 WALL</TH>
                                                <TH>CORNER PROTECTOR 3 WALL</TH>
                                                <TH>EDGE PROTECTOR 3 WALL</TH>
                                                <TH>EDGE PROTECTOR 2 WALL</TH>
                                                <TH>CUSHIONING PADS</TH>
                                                <TH>WRAP</TH>
                                                <TH>LABOUR</th>
                                            </tr>
                                             <?php 
                                                foreach($case_nu as $r1=>$v1)
                                                {
                                                    echo "<tr>";
                                                        echo "<th>".$v1->case."</th>";
                                                        
                                                    echo "</tr>";
                                                }
                                             ?>
                                            </table>

                                            <table id="packingsheet">
                                                <tr>
                                                    <th>PACKING COST</TH>
                                                    <TH>OTHER MATERIALS</TH>
                                                    <TH>CONTINGENCY</TH>
                                                    <TH>CARTON</TH>
                                                    <TH>CORNER PROTECTOR 4 WALL</TH>
                                                    <TH>CORNER PROTECTOR 3 WALL</TH>
                                                    <TH>EDGE PROTECTOR 3 WALL</TH>
                                                    <TH>EDGE PROTECTOR 2 WALL</TH>
                                                    <TH>CUSHIONING PADS</TH>
                                                    <TH>WRAP</TH>
                                                    <TH>LABOUR</TH>
                                                    <TH>TOTAL</th>
                                                </tr>
                                                <?php 
                                                foreach($case_nu as $r1=>$v1)
                                                {
                                                    echo "<tr>";
                                                        echo "<th>".$v1->case."</th>";
                                                        
                                                    echo "</tr>";
                                                }
                                             ?>
                                            </table>    
                                        <?php }?>
                                        
                                </div>
                            <div>
                        </div>
                            
                        
                        
                        

                        
					</div>
				</div>
    </div>




</div>
				</div>
					
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
			</div>
</div>



<!--------- add more script ---------->
<?php 
//-- cane work list
$canew='';
$canework = $product->get_material_bycapability_child('8','91');
foreach($canework as $k=>$v){
    $canew .= '<option value="'.$canework[$k]['id'].'">'.$canework[$k]['material_name'].'</option>';
}

//-- upholesry list
$upw='';
$upwork = $product->get_material_bycapability('3');
foreach($upwork as $k=>$v){
    $upw .= '<option value="'.$upwork[$k]['col1'].'">'.$upwork[$k]['col2'].'</option>';
    //-- get child material
    $upchild = $product->get_material_bycapability_child('3',$upwork[$k]['col1']);
    if($upchild)
    {
        foreach($upchild as $k1=>$v1){
            $upw .= '<option value="'.$upchild[$k1]['id'].'"> - '.$upchild[$k1]['material_name'].'</option>';
        }
    }    
}

//---  hardware list
$hard='';
$hardware = $store->get_items();
foreach($hardware as $h=>$v){
    //-- get sub category
    $subcat=$store->get_cat_single($hardware[$h]['subcat']);
    $hard .= '<option value="'.$hardware[$h]['id'].'">'.$subcat[0]['subcat'].' - '.$hardware[$h]['product_name'].'</option>';
}

//--packing material
$packing_material='';
$pmaterial = $store->get_item_bycat('28');
foreach($pmaterial as $pp=>$v){
    //-- get sub category
    $subcat = $store->get_subcat_single($pmaterial[$pp]['subcat']);
    $packing_material .= '<option value="'.$pmaterial[$pp]['id'].'">'.$pmaterial[$pp]['product_name'].'-'.$subcat[0]['subcat'].'</option>';
}

//-- assembly dropdown
if(!empty($assembly_details))
{
foreach ($assembly_details as $as=>$av) {
    $assembly .= '<option value="'.$av->assembly.'">'.$av->assembly.'</option>';
}
}
else
{
    $assembly .= '<option value="" disabled="disabled">-No Assembly Found-</option>';
}
?>
<script type="text/javascript">

//-- assembly
$(document).ready(function() {
    
var max_fields      = 50; //maximum input boxes allowed
var wrapper         =  $("#assemblytablepart"); //Fields wrapper
var add_button      =  $("#assemblyaddmore_part"); //Add button ID
var x = 1; //initlal text box count
    

$(add_button).click(function(e)
{ //on add input button click
    e.preventDefault();
    if(x < max_fields){ 
        x++; 
        $(wrapper).append('<tr id="assemblyaddmore_part'+x+'"><td><input class="form-control" name="assembly[]"></td><td><input type="number" class="form-control" name="assembly_qty[]" value="0"></td><td><i class="fa fa-trash" onclick="removeme(assemblyaddmore_part'+x+')"></td></tr>'); 
        }
    else
    {alert("Sorry, you can add only 50 Items in this segment");}

});



});

//------- parts

$(document).ready(function() {
    
var max_fields      = 50; //maximum input boxes allowed
var wrapper         =  $("#tablepart"); //Fields wrapper
var add_button      =  $("#addmore_part"); //Add button ID
var x = 1; //initlal text box count
    

$(add_button).click(function(e)
{ //on add input button click
    e.preventDefault();
    if(x < max_fields){ 
        x++; 
        $(wrapper).append('<tr id="addmore_part'+x+'"><td><select name="assembly[]" class="form-control"><option disabled="disabled" selected="selected">Select</option><?php echo $assembly;?></select></td><td><input class="form-control" name="part_name[]"></td><td><input type="number" class="form-control" name="qty[]" value="0"></td><td><i class="fa fa-trash" onclick="removeme(addmore_part'+x+')"></td></tr>'); 
        }
    else
    {alert("Sorry, you can add only 50 Items in this segment");}

});



});


//----------- cane work

$(document).ready(function() {
    
    var max_fields      = 50; //maximum input boxes allowed
    var wrapper         =  $("#table_cane"); //Fields wrapper
    var add_button      =  $("#addmore_cane"); //Add button ID
    var x = 1; //initlal text box count
        
    
    $(add_button).click(function(e)
    { //on add input button click
        e.preventDefault();
        if(x < max_fields){ 

            var casefn="get_details3('cane_type"+x+"','cane_labour"+x+"','<?php echo $base_url.'index.php?action=product&query=get_material_details&material_id=';?>')";
            
            $(wrapper).append('<tr id="addmore_cane'+x+'"><td><input class="form-control" name="part_name[]"></td><td><input type="number" class="form-control" name="qty[]" value="0"></td><td><select class="form-control" id="cane_type'+x+'" onchange="'+casefn+'" name="cane_type[]"><option disabled="disabled" selected="selected">Select</option><?php echo $canew; ?></select></td><td><input type="number" class="form-control" name="length[]" value="0"></td><td><input type="number" class="form-control" name="width[]" value="0"></td><td><input type="number" class="form-control" id="cane_labour'+x+'" name="labour_cost[]" value="0"></td><td><input type="number" class="form-control" name="total[]" value="0"></td><td><i class="fa fa-trash" onclick="removeme(addmore_cane'+x+')"></td></tr>'); 

            x++; 
            }
        else
        {alert("Sorry, you can add only 50 Items in this segment");}
    
    });
    
    
    
    });

    //----------- upholestry work

$(document).ready(function() {
    
    var max_fields      = 50; //maximum input boxes allowed
    var wrapper         =  $("#table_up"); //Fields wrapper
    var add_button      =  $("#addmore_up"); //Add button ID
    var x = 1; //initlal text box count
        
    
    $(add_button).click(function(e)
    { //on add input button click
        e.preventDefault();
        if(x < max_fields){ 
            
            
            var labourfn="get_details3('uphol_type"+x+"','uphol_labour"+x+"','<?php echo $base_url.'index.php?action=product&query=get_material_details&material_id=';?>')";

            $(wrapper).append('<tr id="addmore_up'+x+'"><td><input class="form-control" name="part_name[]"></td><td><input type="number" class="form-control" name="qty[]" value="0"></td><td><select id="uphol_type'+x+'" onchange="'+labourfn+'" class="form-control" name="uphol_type[]"><option disabled="disabled" selected="selected">Select</option><?php echo $upw; ?></select></td><td><input type="number" class="form-control" name="length[]" value="0"></td><td><input type="number" class="form-control" name="width[]" value="0"></td><td><span id="msguphol_labour'+x+'"></span><input type="number" class="form-control" id="uphol_labour'+x+'" name="labour_cost[]" value="0" ></td><td><input type="number" class="form-control" name="total[]" value="0"></td><td><i class="fa fa-trash" onclick="removeme(addmore_up'+x+')"></td></tr>'); 

            x++;
            }
        else
        {alert("Sorry, you can add only 50 Items in this segment");}
    
    });
    
    
    
    });

    //----------- packing case

    $(document).ready(function() {
    
    var max_fields      = 5; //maximum input boxes allowed
    var wrapper         =  $("#table_packing"); //Fields wrapper
    var add_button      =  $("#addmore_packing"); //Add button ID
    var x = <?php  if($packing_details != ''){echo count($packing_details);}else{echo "0";}?>; //initlal text box count
        
    
    $(add_button).click(function(e)
    { //on add input button click
        e.preventDefault();
        if(x < max_fields){ 
            x++; 
            $(wrapper).append('<tr id="addmore_packing'+x+'"><td><input type="number" name="case[]" class="form-control" value="'+x+'" readonly="readonly"></td><td><input type="number" value="0" name="length[]" class="form-control"></td><td><input type="number" value="0" name="width[]" class="form-control"></td><td><input type="number" name="height[]" value="0" class="form-control"></td></tr>'); 
            }
        else
        {alert("Sorry, you can add only 5 Items in this segment");}
    
    });
    
    
    
    });

    //----------- hardware

    $(document).ready(function() {
    
    var max_fields      = 20; //maximum input boxes allowed
    var wrapper         =  $("#table_hardware"); //Fields wrapper
    var add_button      =  $("#addmore_hardware"); //Add button ID
    var x = <?php  if($hardware_details != ''){echo count($hardware_details);}else{echo "0";}?>; //initlal text box count
        
    
    $(add_button).click(function(e)
    { //on add input button click
        e.preventDefault();
        if(x < max_fields){ 
            x++; 
            $(wrapper).append('<tr id="addmore_handware'+x+'"><td>'+x+'</td><td><select name="hardware_id[]" class="hardware form-control"><option disabled="disabled" selected="selected">Select</option><?php echo $hard;?></select></td><td><input type="number" name="price[]" class="form-control"></td><td><input type="number" value="0" name="qty[]" class="form-control"></td><td><input type="number" name="total[]" value="0" class="form-control"></td><td><i class="fa fa-trash" onclick="removeme(addmore_handware'+x+')"></td></tr>'); 
            }
        else
        {alert("Sorry, you can add only 5 Items in this segment");}
    
        $('.hardware').select2();
    });
    
    
    
    });

    //----------- packing material

    $(document).ready(function() {
    
    var max_fields      = 20; //maximum input boxes allowed
    var wrapper         =  $("#add_p_materialdiv"); //Fields wrapper
    var add_button      =  $("#add_p_material"); //Add button ID
    var x = 0; //initlal text box count
        
    
    $(add_button).click(function(e)
    { //on add input button click
        e.preventDefault();
        if(x < max_fields){ 
            x++; 
            $(wrapper).append('<tr id="add_p_materialrow'+x+'"><td>'+x+'</td><td><select name="packing_material[]" class="form-control"><option disabled="disabled" selected="selected">Select</option><?php echo $packing_material;?></select></td><td><input type="number" value="0" name="qty[]" class="form-control"></td><td><i class="fa fa-trash" onclick="removeme(add_p_materialrow'+x+')"></td></tr>'); 
            }
        else
        {alert("Sorry, you can add only 5 Items in this segment");}
    
        $('.hardware').select2();
    });
    
    
    
    });
    
function removeme(x)
{
  //alert(x);
  $(x).remove();
    //get_subtotal(x);
}  

function addmore_custom(id)
{
    $('#custom_table'+id).append('<tr id="add_p_materialrow"><td><input type="text" name="custom_name[]" class="form-control" value=""></td><td><input type="number" step=".01" name="custom_length[]" class="form-control" value="0"></td><td><input type="number" step=".01" name="custom_width[]" class="form-control" value="0"></td><td><input type="number" step=".01" name="custom_height[]" class="form-control" value="0"></td><td><input type="number" step=".01" class="form-control" name="custom_qty[]" value="0"></td><td><i class="fa fa-trash" onclick="removetr($(this))"></td></tr>');             
}

function removetr(row)
{
     row.closest('tr').remove();
}
</script>