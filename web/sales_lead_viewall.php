<div class="content-wrapper">
	  <div class="container-full">

<?php 
if(!isset($_GET['status']))
{$leadviewall=$sales->view_all_leads();}
else
{$leadviewall=$sales->lead_bystatus($_GET['status']);}

?>
	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">View All Leads <?php if(isset($_GET['status'])){$status0=$admin->get_metaname_byvalue2('lead_status',$_GET["status"]);} echo '<b class="text-primary">'.$status0[0]['value1'].'</b>';?></h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Leads</li>
								<li class="breadcrumb-item active" aria-current="page">View All</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

		<!-- Main content -->
		<section class="content">

		<div class="row">
			<div class="col-xl-3 col-md-6 col-12 ">
				<div class="box box-inverse box-success">
				  <div class="box-body">
					<div class="flexbox">
					  <h5>Data</h5>
					  <div class="dropdown">
						<span class="dropdown-toggle no-caret" data-toggle="dropdown"><i class="ion-android-more-vertical rotate-90"></i></span>
						<div class="dropdown-menu dropdown-menu-right">
						  <a class="dropdown-item" href="#"><i class="ion-android-list"></i> Details</a>
						  <a class="dropdown-item" href="#"><i class="ion-android-add"></i> Add new</a>
						  <a class="dropdown-item" href="#"><i class="ion-android-refresh"></i> Refresh</a>
						</div>
					  </div>
					</div>

					<div class="text-center my-2">
					  <div class="font-size-60"><?php if($leadviewall){echo count($leadviewall);}else{echo "0";}?></div>
					  <span>Total Data</span>
					</div>
				  </div>
				</div>
			</div>
			<!-- /.col -->
			<div class="col-xl-3 col-md-6 col-12 ">
				<div class="box box-inverse box-primary">
				  <div class="box-body">
					<div class="flexbox">
					  <h5>Uncategorized Data</h5>
					  <div class="dropdown">
						<span class="dropdown-toggle no-caret" data-toggle="dropdown"><i class="ion-android-more-vertical rotate-90"></i></span>
						<div class="dropdown-menu dropdown-menu-right">
						  <a class="dropdown-item" href="#"><i class="ion-android-list"></i> Details</a>
						  <a class="dropdown-item" href="#"><i class="ion-android-add"></i> Add new</a>
						  <a class="dropdown-item" href="#"><i class="ion-android-refresh"></i> Refresh</a>
						</div>
					  </div>
					</div>

					<div class="text-center my-2">
					<div class="font-size-60"><?php $group0=$leads->get_leads_bystatus_byuser(0,$_SESSION['uid']); if($group0){echo count($group0);}else{echo "0";};?></div>
					  <span>Uncategorized Data</span>
					</div>
				  </div>				
				</div>
			</div>
			<!-- /.col -->

			<div class="col-xl-3 col-md-6 col-12">
				<div class="box box-inverse box-danger">
				  <div class="box-body">
					<div class="flexbox">
					  <h5>Unhandled Queries</h5>
					  <div class="dropdown">
						<span class="dropdown-toggle no-caret" data-toggle="dropdown"><i class="ion-android-more-vertical rotate-90"></i></span>
						<div class="dropdown-menu dropdown-menu-right">
						  <a class="dropdown-item" href="#"><i class="ion-android-list"></i> Details</a>
						  <a class="dropdown-item" href="#"><i class="ion-android-add"></i> Add new</a>
						  <a class="dropdown-item" href="#"><i class="ion-android-refresh"></i> Refresh</a>
						</div>
					  </div>
					</div>

					<div class="text-center my-2">
					  <div class="font-size-60"><?php $unhandled=$leads->get_leads_bystatus_byuser(0,$_SESSION['uid']); if($unhandled){echo count($unhandled);}else{echo "0";};?></div>
					  <span>Un-Handled Queries</span>
					</div>
				  </div>

				</div>
			</div>
			<!-- /.col -->
			<div class="col-xl-3 col-md-6 col-12">
				<div class="box box-inverse box-warning">
				  <div class="box-body">
					<div class="flexbox">
					  <h5>Qualified Leads</h5>
					  <div class="dropdown">
						<span class="dropdown-toggle no-caret" data-toggle="dropdown"><i class="ion-android-more-vertical rotate-90"></i></span>
						<div class="dropdown-menu dropdown-menu-right">
						  <a class="dropdown-item" href="#"><i class="ion-android-list"></i> Details</a>
						  <a class="dropdown-item" href="#"><i class="ion-android-add"></i> Add new</a>
						  <a class="dropdown-item" href="#"><i class="ion-android-refresh"></i> Refresh</a>
						</div>
					  </div>
					</div>

					<div class="text-center my-2">
					  <div class="font-size-60"><?php $qualified=$leads->get_leads_bystatus_byuser(1,$_SESSION['uid']); if($qualified){echo count($qualified);}else{echo "0";};?></div>
					  <span>Qualified Leads</span>
					</div>
				  </div>
				</div>
			</div>
			<!-- /.col -->

		  </div>	







		<!--------- table -->
			<div class="row">


<div class="box">
				
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example" class="table table-bordered table-responsive table-hover display wrap ">
						<thead>
							<tr>
								<th>#</th>
								<th>Lead #</th>
								<th>Group</th>
								<th>Alloted To</th>
								<th>Date & Time</th>
								<th>Name</th>
								<th>Contact</th>
								<th>Company</th>
								<th>Location</th>
								<th>Lead</th>
								<th>Last Updated</th>
								<th>Lead</th>
								<th>Utility</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$prefix_lead=$admin->get_metaname_byvalue('lead_nu');
							$counter=1;
							foreach ($leadviewall as $doc) 
							{
								//-- get country data
								$country	=$admin->get_country_one($doc["country"]);
								$state		=$admin->get_states_one($doc["state"]);
								$city		=$admin->get_cities_one($doc["city"]);
								$qualify	=$admin->get_metaname_byvalue2('lead_qualify',$doc["lead_qualified"]);
								$status		=$admin->get_metaname_byvalue2('lead_status',$doc["status"]);
								$group=$leads->get_group_record($doc["group_id"]);
									$gname = $group[0]['gname'];
									if($gname==''){$gname= 'Uncategorised';}
								$uname=$admin->getone_user($doc["handledby"]);

								echo "<tr>";
									echo "<th>".$counter++."</th>";
									echo "<td>".$gname."</td>";
									echo "<td>".$prefix_lead[0]['value1'].$doc['id']."</td>";
									echo "<td>".$uname[0]['uname']."</td>";
									echo "<td>".$doc["date_time"]."</td>";
									echo "<td>".$doc["name"]."</td>";
									echo "<td>".$doc["email"].'<br><small>'.$doc["phone"]."</small></td>";
									echo "<td>".$doc["company"]."</td>";
									echo "<td>".$city[0]['name'].'<br><small>'.$state[0]['name'].'</small><br><small>'.$country[0]['name']."</small></td>";
									echo "<td>".$qualify[0]['value1']."</td>";
									echo "<td>".date('d-m-Y H:i:s', strtotime($doc['last_updated']))."</td>";
									echo "<td>".$status[0]["value1"]."</td>";
									?>
									<td>
                                        <i class='fa fa-comment btn btn-primary btn-xs' data-toggle="modal" data-target="#exampleModal" onclick="show_page_model('Feedback List','<?php echo $base_url.'index.php?action=dashboard&nocss=leads_feedback&id='.$doc['id'];?>&from=sales')"></i>
									</td>
									<?php
								echo "</tr>";
							}
							?>
						</tbody>
					</table>

</div>
</div>

</div>

</section>

</div>
</div>