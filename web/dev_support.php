<div class="content-wrapper">
	  <div class="container-full">

      <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Support Ticket(s)</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Support</li>
								<li class="breadcrumb-item active" aria-current="page">Ticket(s)</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
        <?php include('alert.php'); ?>

		<div class="row">

            <div class="col-sm-12">
                <!------- view all --->
                <div class="box">
                    <div class="box-header with-border">
                        <h5 class="mt-0 font-weight-700 text-primary"><i class='fa fa-ticket'></i> All Ticket(s)</h5>
                    </div>
                    <div class="box-body" style="max-height: 600px;overflow-y: scroll;">
                        <div class="table table-bordered table-responsive">
                            <table class="table no-border">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Subject</th>
                                        <th>Image / File</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                        <th>View Chat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $counter=1;
                                    $tickets=$admin->get_alltickets();
                                    if($tickets)
                                    {
                                        foreach($tickets as $k=>$v)
                                        {
                                        ?>
                                        <tr <?php if($tickets[$k]['status']=='1'){echo 'class="bg-danger"';}?>>
                                            <td><?php echo 'SHT'.$tickets[$k]['id'];?></td>
                                            <td><?php echo $tickets[$k]['subject'];?></td>
                                            <td><?php if($tickets[$k]['file'] != ''){?><img src="<?php echo $base_url.'images/'.$tickets[$k]['file'];?>" height="60" width="auto"><?php }?></td>
                                            <td><?php echo $tickets[$k]['date_time'];?></td>
                                            <td><?php if($tickets[$k]['status']=='0'){echo 'Open';} else {echo 'Closed';}?></td>
                                            <td>
                                            <?php if($tickets[$k]['status']=='0'){?>
                                                <a href="<?php echo $base_url.'index.php?action=dashboard&page=view_ticket_dev&id='.$tickets[$k]['id'];?>"><i class='fa fa-comment btn btn-primary btn-xs'></i></a></td>
                                            <?php } ?>
                                        </tr>
                                        <?php } } else {echo "<tr><td colspan='5'>No Ticket(s) Found</td></tr>";}?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

</div>
</section>

</div>
</div>

