<?php $query=$leads->get_lead_one($_GET['id']);?>

<div class="content-wrapper">
	  <div class="container-full">


	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Lead : <?php echo $query[0]['company'].' / '.$query[0]['name'];?></h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Leads</li>
								<li class="breadcrumb-item active" aria-current="page">Details</li>
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

								<div class="col-sm-6">
											<div class="box">
													<div class="box-header">
														<h4 class="box-title"><?php echo $query[0]['phone'].' / '.$query[0]['email'];?></h4>
													</div>
													
													<div class="box-body">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs nav-fill" role="tablist">
						<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home11" role="tab" aria-selected="true"><span><i class="ion-home"></i></span> <span class="hidden-xs-down ml-15">Lead </span></a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile11" role="tab" aria-selected="false"><span><i class="ion-person"></i></span> <span class="hidden-xs-down ml-15">Sales</span></a> </li>
						
					</ul>
					<!-- Tab panes -->
					<div class="tab-content tabcontent-border">
						<div class="tab-pane active" id="home11" role="tabpanel">
							<div class="p-15">
														<div class="timeline timeline-line-dotted" style="max-height:600px; overflow-x:scroll;">
															
														
															<!--- lead-->
															<?php $list=$leads->get_feedback_list($_GET['id']);
															if($list)
															{
																$counter=1;
																foreach($list as $row=>$value)
																	{
																?>
															<span class="timeline-label">
																<span class="badge badge-pill badge-primary badge-xs"><?php echo date('d-m-Y h:i:s',strtotime($list[$row]['date_time'])); ?></span>
															</span>
															<div class="timeline-item">
																<div class="timeline-point timeline-point-success">
																	<i class="fa fa-money"></i>
																</div>
																<div class="timeline-event">
																	<div class="timeline-heading">
																		<h6 class="timeline-title">Response <?php echo $counter++;?></h6>
																	</div>
																	<div class="timeline-body">
																		<p><?php echo $list[$row]['feedback']; ?></p>
																	</div>
																	
																	<div class="timeline-footer">
																		<small>
																		<?php if($list[$row]['next_feedback_date'] != '0000-00-00'){?>
																		<p class="text-right text-info"><b>Next Feedback</b> : <?php echo date('d-m-Y',strtotime($list[$row]['next_feedback_date'])); ?></p>
																		<?php }?>
																		<p class="text-right text-danger"><b>Feedback Status</b> : <?php echo $list[$row]['feedback_type']; ?></p>
																		</small>
																	</div>
																	
																</div>
															</div>

															<?php }	?>
															<span class="timeline-label">
																<a href="#" class="btn btn-info btn-rounded btn-xs" title="More...">
																	Current Lead Status : <?php $status=$admin->get_metaname_byvalue2('lead_status',$query[0]['status']); echo $status[0]['value1'];?>
																</a>
															</span>
															<?php }
																	else
																	{echo "<div class='alert alert-warning'>No Feedback Found</div>";}	
																	?>
														</div>							


							</div>
						</div>
						<div class="tab-pane" id="profile11" role="tabpanel">
							<div class="p-15">
													<div class="timeline timeline-line-dotted" style="max-height:600px; overflow-x:scroll;">
														<!-- sales feedback -->
														<?php $list0=$leads->get_feedback_list_sales($_GET['id']);
															if($list0)
															{
																$counter=1;
																foreach($list0 as $row=>$value)
																	{
																?>
															<span class="timeline-label">
																<span class="badge badge-pill badge-danger badge-xs"><?php echo date('d-m-Y h:i:s',strtotime($list0[$row]['date_time'])); ?></span>
															</span>
															<div class="timeline-item">
																<div class="timeline-point timeline-point-success">
																	<i class="fa fa-money"></i>
																</div>
																<div class="timeline-event">
																	<div class="timeline-heading">
																		<h6 class="timeline-title">Response <?php echo $counter++;?></h6>
																	</div>
																	<div class="timeline-body">
																		<p><?php echo $list0[$row]['feedback']; ?></p>
																	</div>
																	
																	<div class="timeline-footer">
																		<small>
																		<?php if($list0[$row]['next_feedback_date'] != '0000-00-00'){?>
																		<p class="text-right text-info"><b>Next Feedback</b> : <?php echo date('d-m-Y',strtotime($list0[$row]['next_feedback_date'])); ?></p>
																		<?php }?>
																		<p class="text-right text-danger"><b>Outcome</b> : <?php echo $list0[$row]['sales_outcome']; ?></p>
																		</small>
																	</div>
																	
																</div>
															</div>

															<?php 
															//-- last updates / status
															$last_stage=$list0[$row]['sales_stage']; 
																	 $last_outcome=$list0[$row]['sales_outcome']; 
																		 $last_status=$list0[$row]['sales_status']; 
														
															}?>
															<span class="timeline-label">
																<a href="#" class="btn btn-warning btn-rounded btn-xs" title="More...">
																	Current Sales Status : <?php $status=$admin->get_metaname_byparent_value2($last_stage,$last_status); echo $status[0]['value1'];?>
																</a>
															</span>
															<?php }
																	else
																	{echo "<div class='alert alert-warning'>No Feedback Found</div>";}	
																	?>
															<!-- sales feedback end -->	
												</div>
							</div>
						</div>
						
					</div>
				</div>    	   
											</div>
								</div>	

								<div class="col-sm-6">
									<div class="box">
													<div class="box-header">
														<h4 class="box-title">Feedback Form</h4>
													</div>
													<div class="box-body">
													<form class="form" method="post" action="<?php echo $base_url.'index.php?action=sales&query=sales_feedback_save'?>" name="leads_new">
														<input type="hidden" name="sales_lid" value="<?php echo $_GET['id'];?>">
														<input type="hidden" name="handledby" value="<?php echo $_SESSION['uid'];?>">
														
														
															<div class="form-group">
																<label>Stage</label>
																<div class="input-group mb-3">
																	<div class="input-group-prepend">
																		<span class="input-group-text"><i class="mdi mdi-plus"></i></span>
																	</div>
																	<select name="stage" class="form-control" id="stage" onchange="javascript:get_details('stage','outcome','<?php echo $base_url.'index.php?action=sales&query=get_outcome&stage='?>');get_details('stage','status','<?php echo $base_url.'index.php?action=sales&query=get_status&stage='?>');" required>
																		<option disabled="disabled" selected="selected" >-- Select --</option>
																		<?php $stage=$admin->get_metaname_byvalue('sales_stages_type');
																		foreach($stage as $k=>$v)
																		{
																			echo "<option value='".$stage[$k]['id']."' ";
																			if ($last_stage==$stage[$k]['id'])
																			{echo "selected='selected'";}
																			echo ">".$stage[$k]['value1']."</option>";
																		}
																		?>
																	</select>

																		
																</div>
															</div>

															<div class="form-group">
																<label>Outcome(s)</label>
																<div class="input-group mb-3">
																	<div class="input-group-prepend">
																		<span class="input-group-text"><i class="mdi mdi-key-plus"></i></span>
																	</div>
																	<select name="outcome" class="form-control" id="outcome" required>
																		<option disabled="disabled" selected="selected">-- Select --</option>
																		<?php 
																		if(!empty($last_stage))
																		{
																			$outcome=$admin->get_metaname_byid($last_stage);
																			$outcome=explode(',',$outcome[0]['value2']);
																			foreach($outcome as $r)
																			{
																				echo "<option value='".$r."'";
																					if($last_outcome==$r){echo "selected='selected'";}
																				echo ">";
																				echo $r."</option>";
																			}
																		}	
																		?>
																	</select>
																</div>
															</div>

															<div class="form-group">
																<label>Status</label>
																<div class="input-group mb-3">
																	<div class="input-group-prepend">
																		<span class="input-group-text"><i class="mdi mdi-account-check"></i></span>
																	</div>
																	<select name="status" class="form-control" id="status" required>
																		<option disabled="disabled" selected="selected">-- Select --</option>
																		<?php 
																		if(!empty($last_stage))
																		{
																			$status=$admin->get_metaname_byparent($last_stage);
																			
																			foreach($status as $r=>$v)
																				{
																					$final = $status[$r]['final_step'];
																						echo "<option value='".$status[$r]['value2']."'";
																							if($last_status==$status[$r]['value2']){echo "selected='selected'";}
																						echo ">";
																							if($final=='1'){$final='<i class="badge badge-primary">(Final)</i>';}else{$final='';}
																					echo $status[$r]['value1'].$final.'</option>';
																				}
																		}	
																		?>
																	</select>
																</div>
															</div>

															<div class="form-group">
																<label>Remark</label>
																<div class="input-group mb-3">
																	<textarea col="5" row="5" name="feedback" class="form-control" required></textarea>
																</div>
															</div>

															<div class="form-group">
																<label>Next Feedback Date</label>
																<div class="input-group mb-3">
																	<input type="date" name="next_feedback_date" value="" class="form-control">
																</div>
															</div>

															<div class="form-group">
																<label>Email Attachment</label>
																<div class="input-group mb-3">
																	<input type="file" name="file_email"  class="form-control">
																</div>
															</div>


														</div>
														<div class="box-footer">
															<input type="reset" class="btn btn-rounded btn-warning btn-outline" value="Reset">
															<input type="submit" name="submit" class="btn btn-rounded btn-primary btn-outline" value="Save">
															<input type="submit" name="send_email" class="btn btn-rounded btn-danger btn-outline" value="Send Email & Save">

														</div> 		
													</form>		
													</div>
									</div>
								</div>




            </div>

        </section>

</div>
</div>