<div class="content-wrapper">
	  <div class="container-full">


	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Add New Cold Lead</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Leads</li>
								<li class="breadcrumb-item active" aria-current="page">Add New</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
			<div class="row">
			<!--- form -->
			<div class="col-md-12">
			<?php include('alert.php');?>	
            <div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">Add Lead</h4>
						</div>
						<!-- /.box-header -->
						<form class="form" method="post" action="<?php echo $base_url.'index.php?action=leads&query=create_new'?>" name="leads_new" enctype='multipart/form-data'>
							<!-- sent directly to step 6 for company check -->
							 <input type="hidden" name="step" value="6">
							<div class="box-body">
								<h4 class="box-title text-info"><i class="ti-user mr-15"></i> Cold Lead Info / Input</h4>
								<br><small class="text-danger">* Are Medetory Filed(s)</small>
								<hr class="my-15">
								

                            <div class="row">
								<div class="col-md-3">
								<div class="form-group">
								  <label>Company Name<span class="text-danger">*</span></label>
								  <input type="text" class="form-control" placeholder="Company" name="company" required>
								  <!-- hidden filed to alloted to --->
								   <?php $rand_lead_manager = $admin->getone_user_rand_bytype('6');?>
								  <input type="hidden" class="form-control" name="userid" value="<?php echo $rand_lead_manager[0]['id'];?>">
								  <!-- <input type="hidden" class="form-control" name="userid" value="<?php echo $_SESSION['uid'];?>"> -->
								</div>
								</div>

								<div class="col-md-3">
								<div class="form-group">
								  <label>Lead Type <span class="text-danger">*</span></label>

								  <select class="form-control" name="company_type" id="company_type" required>
									<option disabled="disabled" selected="selected" >-- Select --</option>
									<?php $company_type=$admin->get_metaname_byvalue('lead_customer_type');
									foreach($company_type as $r => $v)
									{
										echo "<option value='".$company_type[$r]['value1']."'>".$company_type[$r]['value1']."</option>";
									}?>
								  </select>
								</div>
								</div>

							
								<div class="col-md-3">
									<div class="form-group">
										<label for="lastName1">Lead Source <span class="text-danger">*</span> :</label>
										<select class="custom-select form-control" id="group" name="groupid" required>
										<option disabled="disabled" selected="selected" >-- Select --</option>
										<?php
										$group = $leads->get_group();
										foreach($group as $k=>$v){
											echo "<option value='".$group[$k]['id']."'>".$group[$k]['gname']."</option>";
											//-- get sub group
											$sgroup=$leads->get_sub_group($group[$k]['id']);
											foreach($sgroup as $k=>$v)
												{
													echo "<option value='".$sgroup[$k]['id']."'>- ".$sgroup[$k]['gname']."</option>";

												}
										}
										?>
										</select>
									</div>
								</div>

								<div class="col-md-3">
										<div class="form-group">
											<label for="lastName1">Lead Source Description :</label>
											<input type="text" name="group_remak" class="form-control">
										</div>
									</div>	

								

                            </div>


							<div class="row">
								<div class="col-md-3">
										<div class="form-group">
											<label for="lastName1">Expected Qualification Date :</label>
											<input type="date" name="targetted_date" class="form-control">
										</div>
									</div>	

								<!-- <div class="col-md-3">
								<div class="form-group">
								  <label>Targetted Outcome Number(s) <span class="text-danger">*</span>:</label>
								  <select class="form-control" name="targetted_outcome_with"  required>
									<option disabled="disabled" selected="selected" >-- Select --</option>
									<?php $company_type=$admin->get_metaname_byvalue('targetted_outcome_with');
									foreach($company_type as $r => $v)
									{
										echo "<option value='".$company_type[$r]['value1']."'>".$company_type[$r]['value1']."</option>";
									}?>
								  </select>
								</div>
								</div>

								<div class="col-md-3">
								<div class="form-group">
								  <label>Targetted Outcome Detail(s) :</label>
								  <input type="text" name="targetted_outcome_with_details" class="form-control" >
								</div>
								</div> -->
							

							<!-- <div class="col-md-3">
									<div class="form-group">
										<label for="firstName5">Alloted To <span class="text-danger">*</span> :</label>
										<select class="custom-select form-control" id="userid" name="userid" required>
										<option disabled="disabled" selected="selected" >-- Select --</option>
										<?php
										if($_SESSION['uid']=='1')
										{
											$users=$admin->get_alluser();
											foreach($users as $k=>$v){
												echo "<option value='".$users[$k]['id']."'>".$users[$k]['person_name']."</option>";
											}
										}
										else
										{echo "<option value='".$_SESSION['uid']."'>".$_SESSION['person_name']."</option>";}	
										?>
										</select>
									</div>
								</div> -->

							

							


							<div class="col-md-3">
								<div class="form-group">
								  <label>Attachment(s) <span class="text-danger">*</span>:</label>
								  <input type="file" class="form-control" placeholder="Attachment" name="attachment[]" multiple>
								</div>
								</div>


							
							</div>
							<!-- /.box-body -->
							<div class="box-footer">
								<input type="reset" class="btn btn-rounded btn-warning btn-outline mr-1" value="Reset"/>
								<input type="submit" class="btn btn-rounded btn-primary btn-outline" value="Save">
								  
							</div>  
						</form>
					  </div>

				

			<!-- /.box-body -->
		  </div>

</div>

</section>

</div>
</div>