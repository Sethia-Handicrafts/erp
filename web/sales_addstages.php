<div class="content-wrapper">
	  <div class="container-full">


	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Create Sales Folloup Steps / Stages</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Leads</li>
								<li class="breadcrumb-item active" aria-current="page">Create Sales Folloup Steps / Stages</li>
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
						  <h4 class="box-title">Sales Folloup Steps / Stages</h4>
						</div>
						<!-- /.box-header -->
						<form class="form" method="post" action="<?php echo $base_url.'index.php?action=sales&query=add-meta'?>" name="leads_new">
                            <input type="hidden" name="metaname" value="sales_stages_type">
                            <input type="hidden" name="pagename" value="sales_addstages">
							<div class="box-body">
								<div class="form-group">
									<label>Stage / Staus Type</label>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ti-user"></i></span>
										</div>
										<input type="text" class="form-control" placeholder="Customer Type" name="value1">
									</div>
								</div>

								<div class="form-group">
									<label>Outcomes</label><br>
                                    <small>Seperate By Comma(s)</small><br>
                                    <small class='text-danger'>From Start to End</small>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ti-user"></i></span>
										</div>
										<textarea class="form-control" placeholder="Customer Followup Steps" name="value2"></textarea>
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
								<th>Utility</th>
							</tr>
						</thead>
						<tbody>
							<?php 
                                $group=$admin->get_metaname_byvalue('sales_stages_type');
								$counter=1;
							    foreach ($group as $doc=>$value) 
                                {								
                                    $steps=explode(',',$group[$doc]["value2"]);
                                    echo "<tr>";
                                    echo "<th>".$counter++."</th>";
                                    // echo "<td>".$group[$doc]["metaname"]."</td>";
                                    echo "<td>".$group[$doc]['value1']."</td>";								
                                    echo "<td>" ;
										echo '<ol>';
										foreach ($steps as $step) {
											echo '<li>'.$step.'</li>';
										}
										echo '</ol>';
									echo "</td>";
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