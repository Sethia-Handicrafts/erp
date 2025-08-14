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
			<div class="row">
            <div class="box">
					<div class="box-header">
						<h4 class="box-title"><?php echo $query[0]['phone'].' / '.$query[0]['email'];?></h4>
					</div>
					<div class="box-body">

					</div>
					<div class="box-body">

						<div class="timeline timeline-line-dotted">
							
						
							<!--- loop-->
							<?php $list=$leads->get_feedback_list($_GET['id']);
							if($list)
							{
								$counter=1;
								foreach($list as $row=>$value)
									{
								?>


							<span class="timeline-label">
								<span class="badge badge-pill badge-primary badge-lg"><?php echo date('d-m-Y h:i:s',strtotime($list[$row]['date_time'])); ?></span>
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
										<p class="text-right text-info">Next Feedback <?php echo date('d-m-Y',strtotime($list[$row]['next_feedback_date'])); ?></p>
										<?php }?>
										<p class="text-right text-danger">Feedback Status : <?php echo $list[$row]['feedback_type']; ?></p>
										</small>
									</div>
									
								</div>
							</div>

							<?php }	?>
							<span class="timeline-label">
								<a href="#" class="btn btn-info btn-rounded" title="More...">
									Current Status : <?php $status=$admin->get_metaname_byvalue2('lead_status',$query[0]['status']); echo $status[0]['value1'];?>
								</a>
							</span>
							<?php }
									else
									{echo "<div class='alert alert-warning'>No Feedback Found</div>";}	
									?>
						</div>
					</div>                
				</div>
            </div>

        </section>

</div>
</div>