<div class="content-wrapper">
	  <div class="container-full">

<?php 
$viewall=$sales->view_all_beneficiery(0);

?>
	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">View All Prospect(s)</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item">Sales</li>
                                <li class="breadcrumb-item">Prospect</li>
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


<div class="box">
				
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example" class="table table-bordered table-hover display wrap">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Company Name & Type</th>
								<th>Contact</th>
								<th>Location</th>
                                <th>Approval</th>
								<th>Utility</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$counter=1;
							foreach ($viewall as $doc) 
							{
								//-- get country data
								$country	=$admin->get_country_one($doc["country"]);
								$state		=$admin->get_states_one($doc["state"]);
								$city		=$admin->get_cities_one($doc["city"]);
								
								echo "<tr>";
									echo "<th>".$counter++."</th>";
									echo "<td>".$doc["fname"]."</td>";
									echo "<td>".$doc["cname"]."<br><small>".$doc["ctype"]."</small></td>";
                                    echo "<td>".$doc["phone"]."<br>".$doc["email"]."</td>";
                                    echo "<td>".$doc["address"]."<br><small>".$city[0]['name']."<br>".$state[0]['name']."<br>".$country[0]['name']."<br></td>";
                                    
                                    ?>
                                    <td>
                                    <select name="md_prspect_pass" class="form-control" onchange="form_submit_alert('md_prspect_pass<?php echo $counter;?>')" disabled='disbaled'>
                                        <option diabsled="disabled">-Select-</option>
                                        <option value="1" <?php if($doc['approved']=='1'){echo "selected='selected'";}?>>Approved</option>
                                        <option value="2" <?php if($doc['engineer_pass']=='3'){echo "selected='selected'";}?>>Rejected</option>
                                    </select>
                                    </td>
									<td>
                                        <a href="<?php echo $base_url.'index.php?action=dashboard&page=sales_addprospect&id='.$doc['id'].'&md=1';?>"><i class='fa fa-pencil btn btn-primary btn-xs'></i></a>

                                        <!-- <i class="fa fa-trash btn btn-danger btn-sm"></i> -->
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