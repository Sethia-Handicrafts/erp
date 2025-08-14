<div class="content-wrapper">
	  <div class="container-full">

      <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h4 class="page-title">Support Ticket(s)</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Support</li>
								<li class="breadcrumb-item active" aria-current="page">Ticket</li>
                                <li class="breadcrumb-item active" aria-current="page">Reply(s)</li>
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


            <div class="col-sm-4">
                    <!------- form --->
                    <div class="box">
                        <div class="box-header with-border">
                            <h5 class="mt-0 font-weight-700 text-primary"><i class='fa fa-ticket'></i> Reply(s) On Support Ticket # SHT<?php echo $_GET['id']; ?></h5>

                            
                        </div>
                        
                        <div class="box-body"> 
                        <?php 
                        $tickets=$admin->getone_ticket($_GET['id']);
                        $ticket_details=$admin->getone_ticket_details($_GET['id']);
                        ?>
                        
                            <div class="form-group">
                                <h4>Subject</h4>    
                                <input type="hidden" name="tid" value="<?php echo $_GET['id']; ?>">
                                <p><?php echo $tickets[0]['subject']; ?></p>
                            </div>    
                            <div class="form-group">
                                <h4>Description</h4>    
                               <?php echo $ticket_details[0]['msg']; ?>
                            </div>    
                            <div class="form-group">
                                <?php if($tickets[0]['file'] != ''){?><img src="<?php echo $base_url.'images/'.$tickets[0]['file'];?>" height="100" width="auto"><?php }?>
                            </div>
                            <div class="form-group">
                            <h4>Status</h4>
                            <?php if($tickets[0]['status']=='0'){echo 'Open';} else {echo 'Closed';}?>
                            </div>    

                            <div class="form-group">
                                <hr>
                                <form name="ticket_more" action="<?php echo $base_url.'index.php?action=admin&query=add_ticket_dev'?>" method="post">
                                    <label>Add Revert(s)</label>
                                    <textarea col="5" row="5" name="description" class="form-control"></textarea>
                                    <input type="hidden" name="from_to" value="<?php echo $_SESSION['uid']; ?>">
                                    <input type="hidden" name="tid" value="<?php echo $_GET['id']; ?>"><br>
                                    <input type="submit" name="update" value="Update" class="btn btn-secondary">
                                </form>
                            </div>
                        
                    </div>    
                    </div>    

            </div>

            <div class="col-sm-8">
                <!------- view all --->
                <div class="box">
                    <div class="box-header with-border text-left">
                        <h5 class="mt-0 font-weight-700 text-primary"><i class='fa fa-ticket'></i> Revert Regarding Ticket</h5>
                        <div class="text-right">
                            <span id="msgticket_more"></span>
                                 <form name="ticket_more" id="ticket_more" action="<?php echo $base_url.'index.php?action=admin&query=ticket_close'?>" method="post">
                                    <label>Add Revert(s)</label>
                                    <input type="button" name="close" value="Close The Ticket" class="btn btn-xs btn-warning" onclick="form_submit_alert('ticket_more')">
                                    <input type="hidden" name="tid" value="<?php echo $_GET['id']; ?>" >
                                </form>
                               
                            </div>
                    </div>
                    <div class="box-body" style="max-height: 600px;overflow-y: scroll;">
                        <div class="table table-bordered table-responsive">
                            <table class="table no-border">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date & Time</th>
                                        <th>Messege</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $counter=1;
                                    if($ticket_details)
                                    {
                                        foreach($ticket_details as $k=>$v)
                                        {
                                        ?>
                                        <tr <?php if($ticket_details[$k]['from_to']==0){?>class="bg-primary"<?php }else{?>class="bg-secondary"<?php }?>>
                                            <td><?php echo $counter++;?></td>
                                            <td><?php echo date("d-m-Y h:i A", strtotime($ticket_details[$k]['date_time']));?></td>
                                            <th><?php echo $ticket_details[$k]['msg'];?></td></th>
                                           
                                        </tr>
                                        <?php } } else {echo "<tr><td colspan='5'>No Revert(s) Found</td></tr>";}?>
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

