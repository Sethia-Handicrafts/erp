<div class="content-wrapper">
	  <div class="container-full">


	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Notification : <?php echo $_SESSION['person_name'];?></h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Notification</li>
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


<div class="col-lg-6 connectedSortable ui-sortable">
			  <!-- Default box -->
			  <div class="box box-solid box-primary">
				<div class="box-header with-border ui-sortable-handle" style="cursor: move;">
				  <h4 class="box-title">Un-Read</h4>

				  <ul class="box-controls pull-right">
					<li><a class="box-btn-close" href="#"></a></li>
					<li><a class="box-btn-slide" href="#"></a></li>	
					<li><a class="box-btn-fullscreen" href="#"></a></li>
				  </ul>
				</div>
				<div class="box-body p-0">
				  <?php $latest_alert=$admin->latest_alerts($_SESSION['uid']);
                  if($latest_alert)
                  {?>

				  <ul class="todo-list ui-sortable">
					
                  <?php
                    foreach($latest_alert as $lr=>$v){
                  ?>
                  <li>
					  <!-- drag handle -->
					  	<!-- <span class="handle ui-sortable-handle">
							<i class="fa fa-ellipsis-v"></i>
							<i class="fa fa-ellipsis-v"></i>
						</span> -->
					  <!-- checkbox -->
					  <input type="checkbox" id="basic_checkbox_13" class="filled-in" onclick="form_submit_status('<?php echo $latest_alert[$lr]['id'];?>')">
					  <label for="basic_checkbox_13" class="mb-0 h-15 ml-15"></label>
					  <!-- todo text -->
					  <span class="text-line"><?php echo $latest_alert[$lr]['msg'];?></span><hr>
					  <!-- Emphasis label -->
					  <small class="badge bg-danger"><i class="fa fa-clock-o"></i> <?php echo date('d-m-Y H:i:s', strtotime($latest_alert[$lr]['date_time']));?></small><br>
                      <small>From : <?php $uname=$admin->getone_user($latest_alert[$lr]['from_uid']); echo $uname[0]['person_name'];?></small>
					  <!-- General tools such as edit or delete -->
					  <!-- <div class="tools">
						<i class="fa fa-edit"></i>
						<i class="fa fa-trash-o"></i>
					  </div> -->
					</li>
                    <?php }?>
				  </ul>
				  <?php } else {?>
					<div class='alert alert-success'>No New Notification</div>
                    <?php }?>

				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
			</div>





            <!-------------read--------------->
            <div class="col-lg-6 connectedSortable ui-sortable">
			  <!-- Default box -->
			  <div class="box box-solid box-success">
				<div class="box-header with-border ui-sortable-handle" style="cursor: move;">
				  <h4 class="box-title">Read</h4>

				  <ul class="box-controls pull-right">
					<li><a class="box-btn-close" href="#"></a></li>
					<li><a class="box-btn-slide" href="#"></a></li>	
					<li><a class="box-btn-fullscreen" href="#"></a></li>
				  </ul>
				</div>
				<div class="box-body p-0">
					<?php 
						$read_alerts=$admin->read_alerts($_SESSION['uid']);
						if($read_alerts)
						{
					?>
				  <ul class="todo-list ui-sortable">
					<?php 
                    foreach($read_alerts as $lr=>$v){
                  ?>
                  <li class="p-15">
					  <div class="box p-15 mb-0 d-block bb-2 border-danger done">
						 <!-- drag handle -->
						  <span class="handle ui-sortable-handle">
							<i class="fa fa-ellipsis-v"></i>
							<i class="fa fa-ellipsis-v"></i>
						  </span>
						  <!-- checkbox -->
						  <input type="checkbox" id="basic_checkbox_22" class="filled-in">
						  <label for="basic_checkbox_22" class="mb-0 h-15 ml-15"></label>
						  <span class="pull-right badge badge-danger">Urgent</span>
						  <span class="font-size-18 text-line"><a href="">Nulla vitae purus</a> </span>
						  <ul class="list-inline mb-0 mt-15 ml-30">
							<li>
								<a href="" data-toggle="tooltip" data-container="body" title="" data-original-title="Username">
									<img src="../images/avatar/1.jpg" alt="img" class="avatar avatar-sm">
								</a>
							</li>
							<li>
								<a href="" data-toggle="tooltip" data-container="body" title="" data-original-title="5 Tasks">
									<i class="mdi mdi-format-align-left"></i>
								</a>
							</li>
							<li>
								<a href="" data-toggle="tooltip" data-container="body" title="" data-original-title="3 Comments">
									<i class="mdi mdi-comment"></i>
								</a>
							</li>
						  </ul>
					  </div>
					</li>
					<?php } ?>
					

				  </ul>
				  <?php } else { echo "<div class='alert alert-info'>No Notification Found</div>";}?>		
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
			</div>


</div>
</section>
</div>
</div>