<div class="content-wrapper">

<div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
				<h3 class="page-title text-primary">Welcome <?php echo $_SESSION['person_name'];?></h3>	
				<h4 class="page-title text-info">Dashbaord (Leads)</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Dashbaord</li>
								<li class="breadcrumb-item active" aria-current="page">Leads</li>
							</ol>
						</nav>
					</div>
				</div>
				<div class="right-title">
					<div class="d-flex mt-10 justify-content-end">
						<div class="d-lg-flex mr-20 ml-10 d-none">
							<div class="chart-text mr-10">
								<h6 class="mb-0"><small>THIS MONTH</small></h6>
								<h4 class="mt-0 text-primary">$12,125</h4>
							</div>
							<div class="spark-chart">
								<div id="thismonth"><canvas style="display: inline-block; width: 60px; height: 35px; vertical-align: top;" width="60" height="35"></canvas></div>
							</div>
						</div>
						<div class="d-lg-flex mr-20 ml-10 d-none">
							<div class="chart-text mr-10">
								<h6 class="mb-0"><small>LAST YEAR</small></h6>
								<h4 class="mt-0 text-danger">$22,754</h4>
							</div>
							<div class="spark-chart">
								<div id="lastyear"><canvas style="display: inline-block; width: 60px; height: 35px; vertical-align: top;" width="60" height="35"></canvas></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
			
		
		<!-- 1st row-->
		  <div class="row">
				  <div class="col-lg-3 col-6">
					  <a class="box box-link-shadow text-center" href="<?php echo $base_url.'index.php?action=dashboard&page=lead_viewall';?>">
						<div class="box-body">
							<div class="font-size-24">+<?php $leadviewall=$leads->view_all_byuser($_SESSION['uid']); if($leadviewall){echo count($leadviewall);}else{echo "0";}?></div>
							<span>Total Lead(s)</span>
						</div>
						<div class="box-body bg-info">
							<p>
								<span class="mdi mdi-ticket-confirmation font-size-30"></span>
							</p>
						</div>
					  </a>
				  </div>
				  <div class="col-lg-3 col-6">
					  <a class="box box-link-shadow text-center" href="<?php echo $base_url.'index.php?action=dashboard&page=lead_viewall&status=0';?>">
						<div class="box-body">
							<div class="font-size-24"><?php $unhandled=$leads->get_leads_bystatus_byuser(0,$_SESSION['uid']); if($unhandled){echo count($unhandled);}else{echo "0";};?></div>
							<span>Not Responded</span>
						</div>
						<div class="box-body bg-warning">
							<p>
								<span class="mdi mdi-message-reply-text font-size-30"></span>
							</p>
						</div>
					  </a>
				  </div>
				  <div class="col-lg-3 col-6">
					  <a class="box box-link-shadow text-center" href="<?php echo $base_url.'index.php?action=dashboard&page=lead_viewall&status=1';?>">
						<div class="box-body">
							<div class="font-size-24"><?php $unhandled=$leads->get_leads_bystatus_byuser(1,$_SESSION['uid']); if($unhandled){echo count($unhandled);}else{echo "0";};?></div>
							<span>Success</span>
						</div>
						<div class="box-body bg-success">
							<p>
								<span class="mdi mdi-thumb-up-outline font-size-30"></span>
							</p>
						</div>
					  </a>
				  </div>
				  <div class="col-lg-3 col-6">
					  <a class="box box-link-shadow text-center" href="<?php echo $base_url.'index.php?action=dashboard&page=lead_viewall&status=2';?>">
						<div class="box-body">
							<div class="font-size-24"><?php $unhandled=$leads->get_leads_bystatus_byuser(2,$_SESSION['uid']); if($unhandled){echo count($unhandled);}else{echo "0";};?></div>
							<span>Open</span>
						</div>
						<div class="box-body bg-danger">
							<p>
								<span class="mdi mdi-ticket font-size-30"></span>
							</p>
						</div>
					  </a>
				  </div>
			</div>
		  

		  <!-- 2nd row-->
			<div class="row">

			<div class="col-xl-4 col-lg-6 col-12">
				<div class="box">
						<div class="box-header with-border">						
							
							<h4 class="box-title">Follow Up Reminder (Tail)</h4>
							<h6 class="box-subtitle">Old Lead Reminder</h6>
						</div>
						<div class="box-body p-15">						
							<div class="table-responsive">
					  
							<table class="table">
								<tr>
									<th>#</th>
									<th>Company</th>
									<th>In Step</th>
									<th>Targetted Date</th>
								</tr>
								<?php $pc=1;
								$pend=$leads->get_my_next_follow_dashboard($_SESSION['uid']);
								if(!empty($pend))
								{
									foreach($pend as $k=>$v)
									{
										//-- check step is applicable to view or not 
										$step=$admin->get_module_step('lead',$pend[$k]['step']);
										if($step[0]['who']==$_SESSION['utype']){
									?>
									<tr>
										<th><?php echo 'SHL'.$pend[$k]['id'];?></th>
										<td><?php echo $pend[$k]['company'];?></td>
										<td><?php echo $pend[$k]['step'];?></td>
										<td><?php echo date("d-m-Y", strtotime($pend[$k]['targetted_date']));  ?></td>
									</tr>
									<?php }}?>
									<!-- <tr>
										<td colspan='6'><h4><A href="<?php echo $base_url.'index.php?action=dashboard&page=lead_viewall&lead_status=2';?>">View More</a></h4></td>
									</tr> -->
								<?php }else{?>
								<tr><td colspan="6">No Pendencies For Today</td></tr>
								<?php }?>
							</table>
							</div>
					  	</div>
				</div>
				
			</div>

			<div class="col-xl-4 col-lg-6 col-12">
				<div class="box">
						<div class="box-header with-border">						
						<h4 class="box-title">Open Task</h4>
						<h6 class="box-subtitle">Reminder for follow back</h6>
						</div>
						<div class="box-body p-15">						
							<div class="table-responsive">
					  
							<table class="table">
								<tr>
									<th>#</th>
									<th>Company</th>
									<th>In Step</th>
									<th>Audit & Sales By</th>
									<th>Targetted Date</th>
								</tr>
								<?php $pc=1;
								$pend=$leads->get_my_next_follow_old_dashboard($_SESSION['uid']);
								if(!empty($pend))
								{
									foreach($pend as $k=>$v)
									{
										//-- check step is applicable to view or not 
										$step=$admin->get_module_step('lead',$pend[$k]['step']);
										if($step[0]['who']==$_SESSION['utype']){
									?>
									<tr>
										<th><?php echo 'SHL'.$pend[$k]['id'];?></th>
										<td><?php echo $pend[$k]['company'];?></td>
										<td><?php echo $pend[$k]['step'];?></td>
										<td><?php $up=$admin->getone_user($pend[$k]['audit_by']); echo $up[0]['person_name'];;?></td>
										<td><?php echo date("d-m-Y", strtotime($pend[$k]['targetted_date']));  ?></td>
									</tr>
									<?php }}?>
									<!-- <tr>
										<td colspan='6'><h4><A href="<?php echo $base_url.'index.php?action=dashboard&page=lead_viewall&lead_status=2';?>">View More</a></h4></td>
									</tr> -->
								<?php }else{?>
								<tr><td colspan="6">No Pendencies For Today</td></tr>
								<?php }?>
							</table>
							</div>
					  	</div>
				</div>
				
			</div>

			<div class="col-xl-4 col-lg-6 col-12">
				<div class="box">
						<div class="box-header with-border">						
							<h4 class="box-title">Latest Data Upload(s)</h4>
							<h6 class="box-subtitle">New Leads</h6>
						</div>
						<div class="box-body p-15">						
							<div class="table-responsive">
					  
							<table class="table">
								<tr>
									<th>#</th>
									<th>File Name</th>
									<th>Uploaded By</th>
									<th>Date & Time</th>
									<th>Number Of Records</th>
								</tr>
								<?php $hc=1; $history=$leads->get_my_uploads_dashboard($_SESSION['uid']); 
								if(!empty($history))
								{
									foreach($history as $r=>$v)
									{?>
									<tr>
										<th><?php echo $hc++;?></th>
										<td><?php echo $history[$r]['filename'];?></td>
										<td><?php $up=$admin->getone_user($history[$r]['uploadedby']); echo $up[0]['person_name'];?></td>
										<td><?php echo date("d-m-Y H:i:s", strtotime($history[$r]['date_time']));?></td>
										<td><?php echo $history[$r]['nu_of_records'];?></td>
										
									</tr>
									<?php }?>
									<!-- <tr>
										<td colspan='6'><h4><a href="<?php echo $base_url.'index.php?action=dashboard&page=leads_upload_history';?>">View More</a></h4></td>
									</tr> -->
									<?php }else{?>
									<tr><td colspan="6">No Upload(s) Found</td></tr>	
									<?php }?>


							</table>
							</div>
					  	</div>
			</div>


		</div>	  

								</div>

		<!-- 3rd row-->									
		<div class="row">

		<div class="col-xl-4 col-12">
					<div class="box">
						<div class="box-body">
							<h4 class="box-title">Monthly Chart</h4>
							<div><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
								<canvas id="bar-chart1" height="477" style="display: block; width: 658px; height: 438px;" width="717"></canvas>
							</div>
							<?php 
							//-- get data by month
							$graph_status = $leads->get_leadbystatus_dashboard_month($_SESSION['uid'],date('Y-m'));
							$status=array();
							$count=array();
							foreach($graph_status as $gs=>$v)
							{
								//-- get status name 
								$status0=$admin->get_metaname_byvalue2('lead_status',$graph_status[$gs]['status']);
								$status[]='Handled';
								$count[]=$graph_status[$gs]['count'];
							}

							$label1 =$status;
							$label1=json_encode($label1);

							$data1 =$count;
							$data1=json_encode($data1);

							$color1 =array();
							for($i=1;$i<=count($status);$i++)
							{
								$color='#'.str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
								array_push($color1,$color);
							}
							$color1=json_encode($color1);
							?>
							<input type="hidden" name="bar_label" id="bar_label1" value='<?php echo $label1; ?>'/>
							<input type="hidden" name="bar_color" id="bar_color1" value='<?php echo $color1; ?>'/>
							<input type="hidden" name="bar_data" id="bar_data1" value='<?php echo $data1; ?>'/>
							<input type="hidden" name="bar_title" id="bar_title1" value='Status Report of <?php echo date('m-Y');?>'/>
						</div>
					</div>
				</div>
				
				
				<!-- graph 2 -->
				<!-- <div class="col-xl-4 col-12">
					<div class="box">
						<div class="box-body">
							<h4 class="box-title">Overall Chart</h4>
							<div><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
								<canvas id="bar-chart2" height="477" style="display: block; width: 658px; height: 438px;" width="717"></canvas>
							</div>
							<?php 
							//-- get data by month
							$graph_overall = $leads->get_leadbystatus_dashboard_overall($_SESSION['uid'],date('Y-m'));
							$status1=array();
							$count1=array();
							foreach($graph_overall as $gs=>$v)
							{
								//-- get status name 
								$status0=$admin->get_metaname_byvalue2('lead_status',$graph_overall[$gs]['status']);
								$status1[]=$status0[0]['value1'];
								$count1[]=$graph_overall[$gs]['count'];
							}

							$label2 =$status1;
							$label2=json_encode($label2);

							$data2 =$count1;
							$data2=json_encode($data2);

							$color2 =array();
							for($i=1;$i<=count($status1);$i++)
							{
								$color='#'.str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
								array_push($color2,$color);
							}
							$color2=json_encode($color2);
							?>
							<input type="hidden" name="bar_label2" id="bar_label2" value='<?php echo $label2; ?>'/>
							<input type="hidden" name="bar_color2" id="bar_color2" value='<?php echo $color2; ?>'/>
							<input type="hidden" name="bar_data2" id="bar_data2" value='<?php echo $data2; ?>'/>
							<input type="hidden" name="bar_title2" id="bar_title2" value='Overall Report Till <?php echo date('d-m-Y');?>'/>
						</div>
					</div>
				</div> -->

				<!-- graph 3 -->
				<div class="col-xl-4 col-12">
					<div class="box">
						<div class="box-body">
							<h4 class="box-title">Data Alloted To You</h4>
							<!-- label, datacount and color-->
							 <?php 
							 $donut_label0=array();
							 $donut_data0=array();
							 $donut_color0=array();
							 $donut_color1=array();
							 $donut_label = $leads->get_group_allotedto_data($_SESSION['uid']);
							 foreach($donut_label as $dl=>$v)
							 {
								//-- get group name
								$group=$leads->get_group_one($donut_label[$dl]["groupid"]);
								$gname0=strtoupper($group[0]['gname']);
								array_push($donut_label0, $gname0);
								array_push($donut_data0, $donut_label[$dl]["nu_of_records"]);
								
								//-- color
								$color='#'.str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
								array_push($donut_color0,$color);

								//-- color2
								$color2='#'.str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
								array_push($donut_color1,$color2);
							 }
							 ?>
							<input type="hidden" name="group_label" id="donut_label" value='<?php echo json_encode($donut_label0); ?>'/>
							<input type="hidden" name="group_color" id="donut_color" value='<?php echo json_encode($donut_color0); ?>'/>
							<input type="hidden" name="group_color1" id="donut_color1" value='<?php echo json_encode($donut_color1); ?>'/>
							<input type="hidden" name="group_data" id="donut_data" value='<?php echo json_encode($donut_data0); ?>'/>
							
							<div><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
								<canvas id="doughnut-chart" height="492" style="display: block; width: 738px; height: 492px;" width="738"></canvas>
							</div>
						</div>
					</div>
				</div>
			
			</div>
		</section>
		<!-- /.content -->
	  </div>

	  </div>