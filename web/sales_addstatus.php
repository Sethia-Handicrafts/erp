<div class="content-wrapper">
	  <div class="container-full">


	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Create Sales Folloup Status</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Leads</li>
								<li class="breadcrumb-item active" aria-current="page">Create Sales Folloup Status</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
		<?php include('alert.php');?>
			<div class="row">
				


                <div class="col-lg-4 col-12">
					  <div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">Sales Folloup Status</h4>
						</div>
						<!-- /.box-header -->
						<form class="form" method="post" action="<?php echo $base_url.'index.php?action=sales&query=add-meta'?>" name="leads_new">
                            <input type="hidden" name="metaname" value="sales_status_type">
                            <input type="hidden" name="pagename" value="sales_addstatus">
							<div class="box-body">
								<div class="form-group">
									<label>Stage / Staus Type</label>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ti-user"></i></span>
										</div>
										<input type="text" class="form-control" placeholder="Status Type" name="value1">
									</div>
								</div>

                                <div class="form-group">
									<label>Parent Status</label>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class=" ti-link"></i></span>
										</div>
                                        <select name="parent_meta" class="form-control">
                                            <option disabled="disabled" selected="selected">--Select--</option>
                                            <?php 
                                            //get meta_name 
                                            $stages=$admin->get_metaname_byvalue('sales_stages_type');
                                            foreach($stages as $k=>$v){
                                            ?>
                                            <option value="<?php echo $stages[$k]['id'];?>"><?php echo $stages[$k]['value1'];?></option>
                                            <?php }?>
                                        </select>
										
									</div>
								</div>

								<div class="form-group">
									<label>Follow Up Step(s)</label><br>
                                
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class=" ti-announcement "></i></span>
										</div>
										<input type="number" class="form-control" placeholder="Status In Number" name="value2">
									</div>
								</div>

								<div class="form-group">
									<div class="input-group mb-3">
										<label class="form-label">Mark As Final Step</label>
										<div class="c-inputs-stacked">
											<input name="final_step" type="radio" id="radio_123" value="1" >
											<label for="radio_123" class="mr-30">Yes</label>
											<input name="final_step" type="radio" id="radio_456" value="0" checked='checked'>
											<label for="radio_456" class="mr-30">No</label>
										</div>
									</div>
								</div>

								
							</div>
							<!-- /.box-body -->
							<div class="box-footer">
								<button type="reset" class="btn btn-rounded btn-warning btn-outline mr-1">
								  <i class="ti-trash"></i> Cancel
								</button>
								<input type="submit" class="btn btn-rounded btn-primary btn-outline" value="Save">
								
							</div>  
						</form>
					  </div>
					  <!-- /.box -->			
				</div>



                <div class="col-lg-8 col-12  margin-top-10">
					  <div class="box">
					  <div class="box-body">
					<div class="table-responsive">
                    <table id="example" class="table table-bordered table-hover display wrap margin-top-10 w-p100">
						<thead>
							<tr>
								<th>#</th>
								<th>Stage / Status Type</th>
								<th>Steps To Follow Up(s)</th>
                                <th>Parent</th>
								<th>Utility</th>
							</tr>
						</thead>
						<tbody>
							<?php 
                                $group=$admin->get_metaname_byvalue('sales_status_type');
								$counter=1;
							    foreach ($group as $doc=>$value) 
                                {								
                                    //--get meta by id
                                    $parent=$admin->get_metaname_byid($group[$doc]['parent_meta']);
                                   
                                    echo "<tr>";
                                    echo "<th>".$counter++."</th>";
                                    // echo "<td>".$group[$doc]["metaname"]."</td>";
                                    echo "<td>".$group[$doc]['value1']."</td>";								
                                    echo "<td>".$group[$doc]["value2"];
										if($group[$doc]['final_step']=='1')
										{echo " <span class='badge badge-secondary badge-xs'>Final Step</span>";}	
									echo "</td>";
                                    echo "<td>".$parent[0]['value1']."</td>";		
                                    echo "<td>";
                                        echo "<i class='btn btn-xs btn-info fa fa-pencil'></i> ";
                                        echo "<i class='btn btn-xs btn-success fa fa-eye'></i> ";
                                        echo "<i class='btn btn-xs btn-danger fa fa-trash'></i>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
							?>
							
						</tbody>
					</table>

					</div>
					</div>

					</div>
						</div>	

</section>

</div>
</div>