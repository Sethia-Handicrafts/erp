<div class="content-wrapper">
	  <div class="container-full">


	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Leads Bulk Upload</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Leads</li>
								<li class="breadcrumb-item active" aria-current="page">Bulk Upload</li>
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
			<!--- form -->
			<div class="col-md-6">

            <div class="box box-default">
				<div class="box-header with-border">
				<h4 class="box-title">Cold Upload Leads</h4>
				
				</div>
				<!-- /.box-header -->
				<div class="box-body wizard-content">
					<form action="<?php echo $base_url.'index.php?action=leads&query=upload_csv'; ?>" method="post" name="upload_csv" enctype='multipart/form-data'>
						<!-- Step 1 -->
						<section>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="firstName5">Upload File <sapn class='text-danger'>*</span>:</label>
										<input type="file" class="form-control" id="file" name="file" accept=".csv" required> 
								
										<!-- hidden filed to alloted to --->
									<?php $rand_lead_manager = $admin->getone_user_rand_bytype('6');?>
								  <input type="hidden" class="form-control" name="userid" value="<?php echo $rand_lead_manager[0]['id'];?>">

									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="lastName1">Lead Soruce <sapn class='text-danger'>*</span>:</label>
										<select class="form-control" id="group" name="group" required>
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

								<div class="col-md-4">
										<div class="form-group">
											<label for="lastName1">Lead Source Description <span class="text-danger">*</span>:</label>
											<input type="text" name="group_remak" class="form-control" required>
										</div>
									</div>	


							</div>
							<div class="row">
								
								<!-- <div class="col-md-4">
									<div class="form-group">
										<label for="firstName5">Alloted To <sapn class='text-danger'>*</span>:</label>
										<select class="form-control" id="userid" name="userid" required>
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
								</div>			 -->

								<!-- <div class="col-md-6">
									<div class="form-group">
										<label for="firstName5">Company Type <sapn class='text-danger'>*</span>:</label>
										<select class="form-control" name="company_type" id="company_type" required>
										<option disabled="disabled" selected="selected" >-- Select --</option>
										<?php $company_type=$admin->get_metaname_byvalue('lead_customer_type');
										foreach($company_type as $r => $v)
										{
											echo "<option value='".$company_type[$r]['value1']."'>".$company_type[$r]['value1']."</option>";
										}?>
									</select>
								</div> -->

								<div class="col-md-4">
									<div class="form-group">
										<label for="lastName1">Expected Closure Date  <span class="text-danger">*</span>:</label>
										<input type="date" name="targetted_date" class="form-control" required>
									</div>
								</div>	

								<div class="col-md-4">
								<div class="form-group">
								  <label>Attachment(s) <span class="text-danger">*</span>:</label>
								  <input type="file" class="form-control" placeholder="Attachment" name="attachment[]" multiple>
								</div>
								</div>

							</div>
						</section>	
						
						<!-- Step 4 -->
						<h6>Remark <sapn class='text-danger'>*</span></h6>
						<section>
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<textarea name="remark" id="decisions1" rows="4" class="form-control" required></textarea>
									</div>
									
								</div>
							</div>
						</section>
						<section>
							<div class="row">
								<div class="col-sm-9"><a class="btn btn-info btn-xs" href="<?php echo $base_url.'images/lead_file_sample.csv';?>">Downlaod Sample File</a></div>	
								<div class="col-sm-1"><input type="reset" name="reset" value="Reset" class="btn btn-xs btn-warning"></div>
								<div class="col-sm-1"><input type="submit" name="submit" value="Upload" class="btn btn-xs btn-success"></div>
							</div>
						</section>	
					</form>
					</div>
				</div>
			</div>

				<!--- list--->
				<div class="col-sm-6">
				<div class="box box-default">
					<div class="box-header with-border">
					<h4 class="box-title">Previous Uploaded Data & Details</h4>
									
					</div>
					<!-- /.box-header -->
					<div class="box-body wizard-content">
					<table class="table-bordered wrap" cellpadding="2" cellspacing="5">
								<tr>
									<th>#</th>
									<th>File Name</th>
									<th>Uploaded By</th>
									<th>Alloted To</th>
									<th>Date & Time</th>
									<th>Per Week Lead Target</th>
									<th>Per Lead Time Limit</th>
									<th>Number Of Records</th>
								</tr>
								<?php $hc=1; 
								if($_SESSION['utype']=='1')
								{$history=$leads->get_all_uploads();}
								else
								{$history=$leads->get_my_uploads($_SESSION['uid']);}

									if(!empty($history))
									{
									foreach($history as $r=>$v)
									{
										//-- get group  details
										$gname = $leads->get_group_one($history[$r]['groupid']);
									?>
									<tr>
										<th><?php echo $hc++;?></th>
										<td><?php echo $history[$r]['filename'];?></td>
										<td><?php $up=$admin->getone_user($history[$r]['uploadedby']); echo $up[0]['person_name'];?></td>
										<td><?php $up=$admin->getone_user($history[$r]['uploadedto']); echo $up[0]['person_name'];?></td>
										<td><?php echo date("d-m-Y H:i:s", strtotime($history[$r]['date_time']));?></td>
										<td><?php echo $gname[0]['per_day_lead'];?></td>
										<td><?php echo $gname[0]['lead_confirm_time'];?></td>
										<td><?php echo $history[$r]['nu_of_records'];?></td>
									</tr>
									<?php } }else{?>
									<tr><td colspan="6">No Upload(s) Found</td></tr>	
								<?php }?>


							</table>
					</div>
					</div>
					</div>
				</div>

			<!-- /.box-body -->
		  </div>

</div>

</section>

</div>
</div>