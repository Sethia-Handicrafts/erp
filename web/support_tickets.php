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


            <div class="col-sm-6">
                    <!------- form --->
                    <div class="box">
                        <div class="box-header with-border">
                            <h5 class="mt-0 font-weight-700 text-primary"><i class='fa fa-ticket'></i> Generate Support Ticket(s)</h5>
                        </div>
                        
                        <div class="box-body"> 
                        
                        <form name="support" action="<?php echo $base_url.'index.php?action=admin&query=add_ticket';?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="subject">Subject <span class="text-danger">*</span></label>    
                                <input type="hidden" name="uid" value="<?php echo $_SESSION['uid']; ?>">
                                <input type="text" name="subject" class="form-control" required>
                            </div>    
                            <div class="form-group">
                                <label for="description">Description <span class="text-danger">*</span></label>    
                                <textarea col="5" row="6" name="description" class="form-control" required></textarea>
                            </div>    
                            <div class="form-group">
                                <label>Screenshot / Refrence Image</label>
                                <input type="file" name="img" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                            </div>    
                        </form>
                    </div>    
                    </div>    

            </div>

            <div class="col-sm-6">
                <!------- view all --->
                <div class="box">
                    <div class="box-header with-border">
                        <h5 class="mt-0 font-weight-700 text-primary"><i class='fa fa-ticket'></i> My Ticket(s)</h5>
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
                                    $tickets=$admin->get_tickets($_SESSION['uid']);
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
                                                <a href="<?php echo $base_url.'index.php?action=dashboard&page=view_ticket&id='.$tickets[$k]['id'];?>"><i class='fa fa-comment btn btn-primary btn-xs'></i></a></td>
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

