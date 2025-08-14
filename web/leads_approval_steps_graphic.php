<div class="content-wrapper">
	  <div class="container-full">

<?php 
$leadviewall=$leads->view_all_leads_approval_graphic();
?>
	    <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">View All Leads For Approval & Process</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Leads</li>
								<li class="breadcrumb-item active" aria-current="page">View All Approval & Process</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

		
		<!--------- table -->
			<div class="content">


<div class="box">
				
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example" class="table table-bordered table-responsive table-hover display wrap ">
						<thead>
							<tr>
								<th>#</th>
                                <th>Status</th>
								<th>Lead #</th>
								
								<th>Alloted To</th>
								<th>Date & Time</th>
								<th>Name</th>
								<th>Contact</th>
								<th>Company</th>
								<th>Status</th>
                                <th>Qualify</th>
                                <th>Last updated</th>
								<th>Utility</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$prefix_lead=$admin->get_metaname_byvalue('lead_nu');
							$counter=1;
							foreach ($leadviewall as $doc) 
							{
								
								$group=$leads->get_group_record($doc["group_id"]);
									$gname = $group[0]['gname'];
									if($gname==''){$gname= 'Uncategorised';}
								$uname=$admin->getone_user($doc["handledby"]);

                                if($doc['lead_qualified']=='1'){$qualify='Qualified';}
                                if($doc['lead_qualified']=='2'){$qualify='Dis-Qualified';}
                                if($doc['lead_qualified']=='0'){$qualify='Not Handled Yet';}

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
									echo "<td>".$qualify."</td>";
									echo "<td>".date('d-m-Y H:i:s', strtotime($doc['last_updated']))."</td>";
									
									?>
									<td>
                                        <a href="<?php echo $base_url.'index.php?action=dashboard&page=leads_feedback&id='.$doc['id'];?>"><i class='fa fa-comment btn btn-primary btn-xs'></i>
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