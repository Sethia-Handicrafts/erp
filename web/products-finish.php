<div class="content-wrapper">
	  <div class="container-full">
    	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Finish Registration</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item">Inventory</li>
								<li class="breadcrumb-item" >Request For</li>
                                <li class="breadcrumb-item active" aria-current="page">Finish</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

		<!-- Main content -->
		<div class="col-12">
        <?php include('alert.php');?>
			  <div class="box box-default">
				
				<!-- /.box-header -->
				<div class="box-body">
					<!-- Nav tabs -->
			    	<h3 id="steps-uid-0-h-0" tabindex="-1" class="title current">Add New Finish</h3>


                    <form method="post" action="<?php echo $base_url.'index.php?action=product&query=add_finish';?>" name="addfinish" enctype="multipart/form-data">
                       
                            <div class="row g-3">
                                <!-- First Row -->
                                <div class="col-md-3">
                                    <label class="form-label">Finish Name</label>
                                    <input type="text" class="form-control" name="finish_name">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Coating System</label>
                                    <input type="text" class="form-control" name="coating_system">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Substract Material</label>
                                    <select class="form-control" name="finish_material">
                                    <option value="" disbaled="disabled">Select Material</option>
                                        <?php 
                                        $mlist=$product->get_parent_material();
                                        foreach($mlist as $r=>$v){?>
                                        <option value="<?php echo $mlist[$r]['id'];?>" ><?php echo $mlist[$r]['material_name'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Distressing</label>
                                    <input type="text" class="form-control" name="distressing">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">In House / Outsource</label>
                                    <select name="inhouse" class="form-control">
                                        <option value="">-Select-</option>
                                        <option value="In House">In House</option>
                                        <option value="Out Source">Out Source</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Labour Cost (INR)</label>
                                    <input type="text" class="form-control" name="labour_inr">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Reference Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Lead Free ?</label>
                                    <select name="lead_free" class="form-control">
                                        <option value="0">-Select-</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Low Voc</label>
                                    <input type="text" name="low_voc" class="form-control">
                                </div>
                                <div class="col-md-3"><br>
                                    <input type="submit" name="submit" value="Submit" class="btn btn-success btn-sm">
                                </div>
                            </div>    
                    </form>

                </div>
         </div>
        </div>


<!-- Main content -->
<div class="col-12">
			  <div class="box box-default">
				
				<!-- /.box-header -->
				<div class="box-body">
					<!-- Nav tabs -->
			    	<h3 id="steps-uid-0-h-0" tabindex="-1" class="title current">View All Finish</h3>
                </div>

                <div class="table-responsive">
					  <table id="example" class="table table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>#</th>
                                <th>Image</th>
								<th>Finish Name</th>
								<th>Material</th>
                                <th>Labour Cost</th>
                                <th>Distressting</th>
                                <th>Inhouse ?</th>
                                <th>Rate Per SQ FT</th>
                                <th>Laid Free</th>
                                <th>Low Voc</th>
								<th>Utility</th>
							</tr>
						</thead>
						<tbody>
                            <?php 
                            $counter=1;
                            $all = $product->get_finish();
                            foreach($all as $r=>$v)
                            {
                            ?>  
                                <tr>
                                    <th><?php echo $counter++;?></th>
                                    <td><?php echo $all[$r]['image'];?></td>
                                    <td><?php echo $all[$r]['finish_name'];?></td>
                                    <td><?php $material = $product->get_material_byid($all[$r]['finish_material']); 
                                    echo $material[0]['material_name'];?></td>
                                    <td><?php echo $all[$r]['labour_inr'];?></td>
                                    <td><?php echo $all[$r]['distressing'];?></td>
                                    <td><?php echo $all[$r]['inhouse'];?></td>
                                    <td><?php echo $all[$r]['labour_inr'];?></td>
                                    <td><?php echo $all[$r]['lead_free'];?></td>
                                    <td><?php echo $all[$r]['low_voc'];?></td>
                                    <td>
                                        <i class='fa fa-eye btn btn-xs btn-info'></i>
                                        <i class='fa fa-pencil btn btn-xs btn-warning'></i>
                                        <i class='fa fa-trash btn btn-xs btn-danger'></i>
                                    </td>
                                </tr>
                            <?php }?>
                        </tbody>
                        </table> 
                    </div>
</div>
</div>              


</div>
</div>
</div>
</div>