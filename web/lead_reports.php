<div class="content-wrapper">
	  <div class="container-full">

<?php 
if($_SESSION['utype']=='1')
{$leadviewall=$leads->view_all();}
elseif($_GET['status'])
{$leadviewall=$leads->get_leads_bystatus_byuser($_GET['status'],$_SESSION['uid']);}
else
{$leadviewall=$leads->view_all_byuser($_SESSION['uid']);}
?>
	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">View All Leads Report(s)</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Leads</li>
								<li class="breadcrumb-item active" aria-current="page">Report(s)</li>
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
			<div class="col-sm-4">
					
					<h4 class="box-title">Select Lead Manager</h4>
					<form name="lead_report" method="post" action="">
					<select name="handledby" class="form-control" onchange="javascript:form.submit()">
						<option disabled="disabled" selected="selected">--Select--</option>
						<?php 
							if($_SESSION['utype']=='1')
							{
								$lead_manager=$admin->getonetype_user('6'); 
								foreach($lead_manager as $r =>$v){
									if($_POST['handledby']==$lead_manager[$r]['id']){$selected="selected='selected'";}else{$selected='';}
									echo "<option value=".$lead_manager[$r]['id']." $selected>".$lead_manager[$r]['person_name']."</option>";
								}
							}
							else
							echo "<option value=".$_SESSION['uid'].">".$_SESSION['person_name']."</option>";
						?>
					</select>
					</form>
			</div>
			</div>

			<?php if(isset($_POST['handledby'])){?>
		<hr>	
			<div class="row">
				<!--- Graph -->
				<div class="col-md-4">
						<div class="box box-default">
								<div class="box-header with-border">
									<h4 class="box-title">Statics</h4>
								</div>
								<!-- /.box-header -->
								<div class="box-body wizard-content">
									
									<iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
									<canvas id="bubble-chart" height="492" style="display: block; width: 738px; height: 492px;" width="738"></canvas>
									
								</div>
						
					</div>	
				</div>

				<!--- list--->
				<div class="col-sm-8">
					<div class="box box-default">
						<div class="box-header with-border">
							<h4 class="box-title">Group And Upload(s) </h4>
						</div>
						<!-- /.box-header -->
						<div class="box-body wizard-content">
							<?php 
							//check the current day
							if(date('D')!='Mon')
							{    
								$staticstart = date('Y-m-d',strtotime('last Monday'));    

							}
							else{
								$staticstart = date('Y-m-d');   
							}

							//always next saturday

							if(date('D')!='Sat')
							{
								$staticfinish = date('Y-m-d',strtotime('next Saturday'));
							}else{

									$staticfinish = date('Y-m-d');
							}
						
							$history = $leads->get_my_uploads($_POST['handledby']); 
							
							?>
							<table class='table'>
								<tr>
									<th>#</th>
									<th>Uploaded By</th>
									<th>Date & Time</th>
									<th>Per Week Handled<br><small><?php echo date('d-m-Y',strtotime($staticstart)).' To '.date('d-m-Y',strtotime($staticfinish)); ?></small></th>
									<th>Day Spend / Lead</th>
									<th>Total</th>
									<th>Status</th>
									
								</tr>
								<?php 
								if($history){
								$hc=1; foreach($history as $r=>$v)
									{
										//-- get group  details
										$gname = $leads->get_group_one($history[$r]['groupid']);
										//-- calculate how many query has been handled in these 7 days
										$week_query=$leads->get_leads_handled_bt_dates($staticstart,$staticfinish);
										if($week_query){$count=count($week_query);}else{$count=0;}
									?>
									<tr>
										<th><?php echo $hc++;?></th>
										<td><?php $up=$admin->getone_user($history[$r]['uploadedby']); echo $up[0]['person_name'];?></td>
										<td><?php echo date("d-m-Y H:i:s", strtotime($history[$r]['date_time']));?></td>
										<td><?php echo $count.' / '.$gname[0]['per_day_lead'];?> <i class="mdi mdi-clock text-danger"></i></td>
										<td><?php echo $gname[0]['lead_confirm_time'];?> <i class="mdi mdi-clock text-info"></i></td>
										<td><?php echo $history[$r]['nu_of_records'];?></td>
										<td>
											<ul>
											<?php $status=$admin->get_metaname_byvalue('lead_status'); 
												foreach($status as $r=>$v)
												{
													echo "<li>".$status[$r]['value1']."</li>";
												}
											?>
											</ul>
										</td>
									</tr>
									<?php }}else{?>
										<tr><td colspan="6">No data found</td></tr>
									<?php }?>		
							</table>

						</div>
					</div>	
				</div>

			<!-- /.box-body -->
		  </div>
		  <?php }?>
		</section>

</div>
</div>