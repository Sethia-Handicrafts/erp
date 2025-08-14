<div class="content-wrapper">
	  <div class="container-full">

<?php 
$viewall=$sales->view_all_rfq();

?>
	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">View All RFQ(s)</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item">Sales</li>
                                <li class="breadcrumb-item">RFQ</li>
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
								<th>Prospect / Client</th>
								<th>Client RFQ #</th>
								<th>SHPL RFQ #</th>
								<th>Client Target Date</th>
                                <th>Date Of Creation</th>                                
								<th>Created By</th>
                                <th>Utility</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$counter=1;
							foreach ($viewall as $doc) 
							{
                                //--prospect details 
                                $prospect = $sales->get_baneficiery($doc["prospect"]);
								echo "<tr>";

									$uname=$admin->getone_user($doc["created_by"]);

									echo "<th>".$counter++."</th>";
									echo "<td>".$prospect[0]['fname']." - ".$prospect[0]['lname']."</td>";
									echo "<td>".$doc["rfq_number"]."</td>";
                                    echo "<td>SHPL-RFQ-".$doc["id"]."</td>";
                                    echo "<td>".$doc["date_of_rfq"]."</td>";
                                    echo "<td>".$doc["created_date"]."</td>";
                                    echo "<td>".$uname[0]['person_name']."</td>";
                                    ?>
									<td>
                                        <a href="<?php echo $base_url.'index.php?action=dashboard&page=sales_rfq_edit&id='.$doc['id'];?>"><i class='fa fa-pencil btn btn-primary btn-xs'></i></a>

                                        <i class="fa fa-trash btn btn-danger btn-sm"></i>
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