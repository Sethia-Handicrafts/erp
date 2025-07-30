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

<h6 class="text-secondary">Step 2</h6>
<h3 class="text-primary">Similar Item(s) & Price Comparison</h3>
<hr>
<span id="msgstep08_edit"></span>
<form name="step08_edit" id="step08_edit" action="<?php echo $base_url.'index.php?action=sales&query=rfq_step20_edit';?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="sid" value="<?php echo $_GET['id'];?>">   
<input type="hidden" name="created_by" value="<?php echo $view[0]['created_by'];?>">
<?php 

   
        $item_count = count($items);
        $counter=1;
     ?>
    <div class="col-md-12">
        <div class="row">               
                
                <div class="col-sm-6">
                    <input type="hidden" name="itemid" value="<?php echo $items[0]['id'];?>"/>
                    <h5>
                    <?php echo $counter++.')';  
                    $itemtype=$items[0]['item_type'];
                     
                        $sku=$product->getone($items[0]['pid']);
                        echo $sku[0]['sku'].'<br>';
                        echo '<small class="text-secondary">'.$sku[0]['product_name'].'</small>';
                   
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

            <?php if($itemtype =='4' || $itemtype =='5' || $itemtype =='6' || $itemtype =='2'){?>
                <table class="table table-bordered" style="font-size:12px;">
                <tr><th colspan="4">Add Capabilities</th></tr>
                <tr>
                    <th class="bg-danger" width="30%">Capability</th>
                    <th class="bg-primary" width="60%">Remark</th>
                </tr>
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
                <?php
                }?>
                </div>
                
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="sku">Client Attachment</label><br>
                        <?php
                         $file=$items[0]['file'];
                         if(!empty($file))
                         {
                            $ext = pathinfo($file, PATHINFO_EXTENSION);
                            //-- image
                            if($ext=='jpg' || $ext=='avi' || $ext=='jpeg' || $ext=='png' || $ext=='gif' )
                            { echo "<img src='".$base_url."images/".$file."' width='100px' height='auto'>";}
                            else
                            {
                                echo "<a target='_blank' href='".$base_url."images/".$file."' class='btn btn-secondary btn-sm'>View</a>";
                            }
                         }
                         else{echo "<span class='text-danger'>No Attachment(s)</span>";}
                         ?>
                    <hr>
                         <label>Similar Item(s) Image(s)</label>
                         <?php if($items[0]['sfile'] != '0' && $items[0]['sfile'] != '' ){ $imgs=explode(",",$items[0]['sfile']);
                        foreach($imgs as $img){
                        ?>
                        <img src="<?php echo $base_url.'images/'.$img; ?>" height="150" width="auto">
                    <?php } }?>
                </div>  
                      
                </div>
               
                <div class="col-sm-2">
                <?php 
                if($itemtype=='1'){$readonly_branding='readonly="readonly"';}else{$readonly_branding='';}
                ?>
                    <div class="form-group">
                        <label for="price">MRP</label><br>
                        <input type="text" name="mrp" value="<?php echo $items[0]['mrp'];?>" class="form-control">
                        <hr>
                        <label for="price">Discounted Price</label><br>
                        <input type="text" name="discountedprice" value="<?php echo $items[0]['discountedprice'];?>" class="form-control">
                        <hr>

                        <label for="bom">Source</label><br>
                        <input type="text" name="source" value="<?php echo $items[0]['source'];?>" class="form-control">
                       
                    </div> 
               
                    
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="sitems">Similar Items Price </label><br>
                        <input type="text" name="sprice" value="<?php echo $items[0]['sprice'];?>" class="form-control">
                        <hr>
                    </div> 

                    <div class="form-group">
                        <label for="sitems">Similar Items image </label><br>
                        <input type="file" name="sfile[]" class="form-control" multiple="mulitple">
                        <input type="hidden" name="sfile_old" value="<?php echo $items[0]['sfile'];?>">
                        <hr>
                    </div> 
                    
                    <label>Sent For Apprval</label>
                    <select name="designer_pass" class="form-control" >
                        <option diabsled="disabled">-Select-</option>
                        <option value="2" <?php if($items[0]['designer_pass']=='2'){echo "selected='selected'";}?>>Sent For Approval (BDM)</option>
                    </select>

                    

                    
<hr>
       
                </div>



        </div>
        <hr>
    </div>


<div class="row">

<div class="col-sm-1">
    <a href="<?php echo $base_url.'index.php?action=dashboard&page=sales_rfq_2-0_engineer_list';?>" class="btn btn-secondary">Back</a>
</div>
<div class="col-sm-1">
<input type="submit" name="submit" value="Update" class="btn btn-success"/>
</div>
   
</div>
</form>

</div>
				</div>
					
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
			</div>
</div>

