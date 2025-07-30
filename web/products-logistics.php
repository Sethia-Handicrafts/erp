<div class="content-wrapper">
	  <div class="container-full">
    	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Logistics Registration</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item">Inventory</li>
								<li class="breadcrumb-item" >Request For</li>
                                <li class="breadcrumb-item active" aria-current="page">Logistics</li>
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
			    	<h3 id="steps-uid-0-h-0" tabindex="-1" class="title current">Add New Logistics</h3>


					<form method="post" action="<?php echo $base_url.'index.php?action=product&query=add_logistics';?>" name="addfinish" >
                       
                   
                            <div class="row g-3">
                                <!-- First Row -->
                                <div class="col-md-3">
                                    <label class="form-label">Logistics Name</label>
                                    <input type="text" class="form-control" name="logistics_name">
                                </div>
								<div class="col-md-3">
                                    <label class="form-label">Assembly</label>
                                    <select class="form-control" name="assembly_req">
										<option value="0">-Select-</option>
										<option value="1">Yes</option>
										<option value="2">No</option>
									</select>
                                </div>
								<div class="col-md-3">
                                    <label class="form-label">Nu Of Case</label>
                                    <input type="number" class="form-control" name="no_of_case">
                                </div>
								<div class="col-md-3">
                                    <label class="form-label">Nu Of Items</label>
                                    <input type="number" class="form-control" name="no_of_item">
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
			    	<h3 id="steps-uid-0-h-0" tabindex="-1" class="title current">View All Logistics</h3>
                </div>

                <div class="table-responsive">
					  <table id="example" class="table table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Logistics Name</th>
								<th>Assembly Required?</th>
								<th>Nu of Case</th>
								<th>Nu of Item</th>
								<th>Utility</th>
							</tr>
						</thead>
						<tbody>
                            <?php 
                            $counter=1;
                            $all = $product->get_logistics();
                            foreach($all as $r=>$v)
                            {
                            ?>  
                                <tr>
                                    <th><?php echo $counter++;?></th>
                                    <td><?php echo $all[$r]['logistics_name'];?></td>
									<td><?php if($all[$r]['assembly_req']=='1'){echo "Yes";}
									elseif($all[$r]['assembly_req']=='2'){echo "No";}else{echo "N/A";}?></td>
									<td><?php echo $all[$r]['no_of_case'];?></td>
									<td><?php echo $all[$r]['no_of_item'];?></td>
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