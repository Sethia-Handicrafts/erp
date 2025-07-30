

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xl-4 col-lg-6 col-12">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">Welcome, <span class="font-weight-500"><?php echo $_SESSION['uname'];?></span> </h3>
						</div>
						<div class="box-body text-center">
							<h1 class="mt-0 font-weight-700 text-primary">Good Luck!</h1>
							<img src="<?php echo $base_url;?>/images/developer_user.jpg" class="my-01" alt="" >
							<!-- <p>From its medieval origins to the digital era.</p> -->
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-12">
					<div class="box">
						<div class="box-header no-border">
							<h4 class="box-title">Revenue This Year</h4>
						</div>
						<div class="box-body text-center">
							<div id="progressbar1" class="mx-auto w-200 my-20 pb-5 position-relative"></div>
							<div class="d-flex align-items-center justify-content-center pt-1">
								<div class="mx-5">
									<i class="fa fa-caret-up text-primary mr-5"></i> <span class="text-black-50">1024k</span>
								</div>
								<div class="mx-5">
									<i class="fa fa-caret-down text-danger mr-5"></i> <span class="text-black-50">890k</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-5 col-12">
					<div class="box">
						<div class="box-header no-border">
							<h4 class="box-title">Visits By Month</h4>
							<div class="box-controls pull-right">
							    <div class="btn-group">
								  <button class="btn dropdown-toggle p-0 text-primary no-shadow btn-xs" type="button" data-toggle="dropdown">LAST WEEKS</button>
								  <div class="dropdown-menu">
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#">Something else here</a>
								  </div>
								</div>
							</div>
						</div>
						<div class="box-body">
							<div id="visits-chart" class="chart"></div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-12">
					<div class="box">
						<div class="box-header no-border">
							<h4 class="box-title">Revenue Growth</h4>
							<div class="box-controls pull-right">
							    <p class="mb-0">$25,980</p>
							</div>
						</div>						
						<div class="box-body pb-0">
							<canvas id="customer" class="dash-chart"></canvas>
						</div>
					</div>					
				</div>
				<div class="col-xl-3 col-lg-6 col-12">
					<div class="box">
						<div class="box-body">
							<div class="text-center py-30">
								<div class="icon mb-15">
									<i class="fa fa-shopping-cart bg-danger-light mr-0"></i>
								</div>
								<div>
									<h1 class="font-weight-400">$ 29.200</h1>
									<p class="text-fade mb-0">Total Earnings</p>						
								</div>
							</div>
						</div>
					</div>					
				</div>
				<div class="col-xl-3 col-lg-6 col-12">
					<div class="box">
						<div class="box-body">
							<div class="text-center py-30">
								<div class="icon mb-15">
									<i class="fa fa-bullhorn bg-success-light mr-0"></i>
								</div>
								<div>
									<h1 class="font-weight-400">200</h1>
									<p class="text-fade mb-0">Pending Orders</p>						
								</div>
							</div>
						</div>
					</div>					
				</div>
				<div class="col-xl-9 col-12">
				  <div class="box">
					<div class="row">
					  <div class="col-lg-8 col-12 order-summary border-right pr-md-0">
						<div class="box no-shadow mb-0">
							<div class="box-header no-border">
								<h4 class="box-title">Order Summary</h4>
							</div>
						    <div class="box-body">
							   <div class="chart">
							   	  <div id="myChart"></div>
							   </div>
							</div>
						</div>
					  </div>
					  <div class="col-lg-4 col-12">
						<div class="box no-shadow mb-0">
						    <div class="box-header">
								<h4 class="box-title">Sales Overview</h4>
						    </div>
							<div class="box-body">
							  <div class="d-flex justify-content-between align-items-center mb-10">
								<div>
								  <h5 class="mb-0">iPod</h5>
								  <small class="text-muted">25 min ago</small>
								</div>
								<div>
								  <h6 class="mb-0"><span class="text-success">+</span> $250</h6>
								</div>
							  </div>
							  <div class="d-flex justify-content-between align-items-center mb-10">
								<div>
								  <h5 class="mb-0">Mi Phone</h5>
								  <small class="text-muted">5 hour ago</small>
								</div>
								<div>
								  <h6 class="mb-0"><span class="text-danger">-</span> $589</h6>
								</div>
							  </div>
							  <div class="d-flex justify-content-between align-items-center">
								<div>
								  <h5 class="mb-0">Mi TV</h5>
								  <small class="text-muted">3 day ago</small>
								</div>
								<div>
								  <h6 class="mb-0"><span class="text-success">+</span> $1292</h6>
								</div>
							  </div>
							</div>
							<div class="box-footer">
							  <h4 class="mb-0">Total Sales</h4>
							  <p class="text-primary font-size-18 font-weight-700">$8,459k</p>
							  <div class="progress">
								<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
								  <span class="sr-only">40% Complete (primary)</span>
								</div>
							  </div>
							</div>
						</div>
					  </div>
					</div>
				  </div>
				</div>
				<div class="col-xl-3 col-12">
					<div class="box">
						<div class="box-header with-border">
							<h4 class="box-title">Last Comments</h4>
						</div>
						<div class="box-body p-15">
						  <div class="media-list media-list-divided">
							<div class="media">
							  <div class="media-body">
								<p>
								  <a class="hover-primary" href="#"><strong>Mike nilson</strong></a>
								  <span class="float-right">2h</span>
								</p>
								<p>Like this one! Keep going!</p>
							  </div>
							</div>
							<div class="media">
							  <div class="media-body">
								<p>
								  <a class="hover-primary" href="#"><strong>Blake Arthurs</strong></a>
								  <span class="float-right">3h</span>
								</p>
								<p>WOW! Awesome!</p>
							  </div>
							</div>
							<div class="media">
							  <div class="media-body">
								<p>
								  <a class="hover-primary" href="#"><strong>David</strong></a>
								  <span class="float-right">3h</span>
								</p>
								<p>@Alexander Protikhin Than-</p>
							  </div>
							</div>
						  </div>
						</div>
						<div class="box-footer text-center">
							<a href="javascript:void(0)" class="text-uppercase font-weight-700">all Comments</a>
						</div>
					</div>
				</div>				
				<div class="col-xl-8 col-12">
					<div class="box">
						<div class="box-header no-border">
							<h4 class="box-title">
								Yearly Comparison
							</h4>
						</div>
						<div class="box-body pt-0">
							<div id="yearly-comparison"></div>
						</div>
					</div>										
				</div>
				<div class="col-xl-4 col-12">
					<div class="box">
						<div class="box-header">
							<h4 class="box-title">Earning</h4>
						</div>
						<div class="box-body">
							<div class="table-responsive">
								<table class="table no-border mb-0">
									<tbody>
									  <tr>
										<td>
										  <div class="media align-items-center p-0">
											<a class="media-left mx-0" href="#">
											  <img src="https/lotus-admin-templatesmultipurposethemescom/images/product/product-1_3080199.png" alt="avatar" class="rounded-circle avatar-lg">
											</a>
											<div class="media-body">
											  <h6 class="media-heading mb-0">Top</h6>
											  <span>$110</span>
											</div>
										  </div>
										</td>
										<td class="px-0 w-25">
										  <div class="progress progress-sm active">
											<div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
											</div>
										  </div>
										</td>
										<td class="text-center"><span class="badge bg-info-light badge-lg">Total $480</span></td>
									  </tr>
									  <tr>
										<td>
										  <div class="media align-items-center p-0">
											<a class="media-left mx-0" href="#">
											  <img src="https/lotus-admin-templatesmultipurposethemescom/images/product/product-11_3014711.png" alt="avatar" class="rounded-circle avatar-lg">
											</a>
											<div class="media-body">
											  <h6 class="media-heading mb-0">T-Shirt</h6>
											  <span>$199</span>
											</div>
										  </div>
										</td>
										<td class="px-0 w-25">
										  <div class="progress progress-sm active">
											<div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
											</div>
										  </div>
										</td>
										<td class="text-center"><span class="badge bg-danger-light badge-lg">Total $789</span></td>
									  </tr>
									  <tr>
										<td>
										  <div class="media align-items-center p-0">
											<a class="media-left mx-0" href="#">
											  <img src="https/lotus-admin-templatesmultipurposethemescom/images/product/product-12_2949175.png" alt="avatar" class="rounded-circle avatar-lg">
											</a>
											<div class="media-body">
											  <h6 class="media-heading mb-0">Shorts</h6>
											  <span>$125</span>
											</div>
										  </div>
										</td>
										<td class="px-0 w-25">
										  <div class="progress progress-sm active">
											<div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
											</div>
										  </div>
										</td>
										<td class="text-center"><span class="badge bg-primary-light badge-lg">Total $787</span></td>
									  </tr>
									  <tr>
										<td>
										  <div class="media align-items-center p-0">
											<a class="media-left mx-0" href="#">
											  <img src="https/lotus-admin-templatesmultipurposethemescom/images/product/product-2_3080196.png" alt="avatar" class="rounded-circle avatar-lg">
											</a>
											<div class="media-body">
											  <h6 class="media-heading mb-0">Cap</h6>
											  <span>$58</span>
											</div>
										  </div>
										</td>
										<td class="px-0 w-25">
										  <div class="progress progress-sm active">
											<div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
											</div>
										  </div>
										</td>
										<td class="text-center"><span class="badge bg-warning-light badge-lg">Total $80</span></td>
									  </tr>
									</tbody>
								  </table>
							</div>
						</div>
					</div>					
				</div>
				<div class="col-12">
					<div class="box bg-primary">						
						<div class="box-body">
							<div class="row">
								<div class="col-xl-6 col-12">
									<h4 class="text-white mb-50">Revenue Overview </h4>
									<div class="d-flex justify-content-between">
										<div class="d-flex">
											<div class="icon">
												<i class="fa fa-trophy"></i>
											</div>
											<div>
												<h3 class="font-weight-600 text-white mb-0 mt-0">34040</h3>
												<p class="text-white-50">Revenue</p>
												<h5 class="text-white">+34040 <span class="ml-40"><i class="fa fa-angle-down mr-10"></i><span class="text-white-50">0.036%</span></span> </h5>
											</div>
										</div>
										<div>
											<div id="apexChart2" class="mx-30 mx-lg-50"></div>
										</div>
									</div>
								</div>
								<div class="col-xl-6 col-12 mt-50 mt-md-0">
									<h4 class="text-white mb-50">Sales Overview </h4>
									<div class="d-flex justify-content-between">
										<div class="d-flex">
											<div class="icon">
												<i class="fa fa-trophy"></i>
											</div>
											<div>
												<h3 class="font-weight-600 text-white mb-0 mt-0">$9,867k</h3>
												<p class="text-white-50">Sales</p>
												<h5 class="text-white">-6.20967  <span class="ml-40"><i class="fa fa-angle-down mr-10"></i><span class="text-white-50">2.036%</span></span> </h5>
											</div>										
										</div>
										<div>
											<div id="apexChart3" class="mx-30 mx-lg-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
		  <li class="nav-item">
			<a class="nav-link" href="javascript:void(0)">FAQ</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="#">Purchase Now</a>
		  </li>
		</ul>
    </div>
	  &copy; 2020 <a href="https://www.multipurposethemes.com/">Multipurpose Themes</a>. All Rights Reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar">
	  
	<div class="rpanel-title"><span class="pull-right btn btn-circle btn-danger"><i class="ion ion-close text-white" data-toggle="control-sidebar"></i></span> </div>  <!-- Create the tabs -->
    <ul class="nav nav-tabs control-sidebar-tabs">
      <li class="nav-item"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="mdi mdi-message-text"></i></a></li>
      <li class="nav-item"><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="mdi mdi-playlist-check"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
          <div class="flexbox">
			<a href="javascript:void(0)" class="text-grey">
				<i class="ti-more"></i>
			</a>	
			<p>Users</p>
			<a href="javascript:void(0)" class="text-right text-grey"><i class="ti-plus"></i></a>
		  </div>
		  <div class="lookup lookup-sm lookup-right d-none d-lg-block">
			<input type="text" name="s" placeholder="Search" class="w-p100">
		  </div>
          <div class="media-list media-list-hover mt-20">
			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-success" href="#">
				<img src="https/lotus-admin-templatesmultipurposethemescom/images/avatar/1_4587606.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Tyler</strong></a>
				</p>
				<p>Praesent tristique diam...</p>
				  <span>Just now</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-danger" href="#">
				<img src="https/lotus-admin-templatesmultipurposethemescom/images/avatar/2_4522070.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Luke</strong></a>
				</p>
				<p>Cras tempor diam ...</p>
				  <span>33 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-warning" href="#">
				<img src="https/lotus-admin-templatesmultipurposethemescom/images/avatar/3_4456534.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-primary" href="#">
				<img src="https/lotus-admin-templatesmultipurposethemescom/images/avatar/4_4390998.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>			
			
			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-success" href="#">
				<img src="https/lotus-admin-templatesmultipurposethemescom/images/avatar/1_4587606.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Tyler</strong></a>
				</p>
				<p>Praesent tristique diam...</p>
				  <span>Just now</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-danger" href="#">
				<img src="https/lotus-admin-templatesmultipurposethemescom/images/avatar/2_4522070.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Luke</strong></a>
				</p>
				<p>Cras tempor diam ...</p>
				  <span>33 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-warning" href="#">
				<img src="https/lotus-admin-templatesmultipurposethemescom/images/avatar/3_4456534.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-primary" href="#">
				<img src="https/lotus-admin-templatesmultipurposethemescom/images/avatar/4_4390998.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>
			  
		  </div>

      </div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
          <div class="flexbox">
			<a href="javascript:void(0)" class="text-grey">
				<i class="ti-more"></i>
			</a>	
			<p>Todo List</p>
			<a href="javascript:void(0)" class="text-right text-grey"><i class="ti-plus"></i></a>
		  </div>
        <ul class="todo-list mt-20">
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_1" class="filled-in">
			  <label for="basic_checkbox_1" class="mb-0 h-15"></label>
			  <!-- todo text -->
			  <span class="text-line">Nulla vitae purus</span>
			  <!-- Emphasis label -->
			  <small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
			  <!-- General tools such as edit or delete-->
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_2" class="filled-in">
			  <label for="basic_checkbox_2" class="mb-0 h-15"></label>
			  <span class="text-line">Phasellus interdum</span>
			  <small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_3" class="filled-in">
			  <label for="basic_checkbox_3" class="mb-0 h-15"></label>
			  <span class="text-line">Quisque sodales</span>
			  <small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_4" class="filled-in">
			  <label for="basic_checkbox_4" class="mb-0 h-15"></label>
			  <span class="text-line">Proin nec mi porta</span>
			  <small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_5" class="filled-in">
			  <label for="basic_checkbox_5" class="mb-0 h-15"></label>
			  <span class="text-line">Maecenas scelerisque</span>
			  <small class="badge bg-primary"><i class="fa fa-clock-o"></i> 1 week</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_6" class="filled-in">
			  <label for="basic_checkbox_6" class="mb-0 h-15"></label>
			  <span class="text-line">Vivamus nec orci</span>
			  <small class="badge bg-info"><i class="fa fa-clock-o"></i> 1 month</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_7" class="filled-in">
			  <label for="basic_checkbox_7" class="mb-0 h-15"></label>
			  <!-- todo text -->
			  <span class="text-line">Nulla vitae purus</span>
			  <!-- Emphasis label -->
			  <small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
			  <!-- General tools such as edit or delete-->
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_8" class="filled-in">
			  <label for="basic_checkbox_8" class="mb-0 h-15"></label>
			  <span class="text-line">Phasellus interdum</span>
			  <small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_9" class="filled-in">
			  <label for="basic_checkbox_9" class="mb-0 h-15"></label>
			  <span class="text-line">Quisque sodales</span>
			  <small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_10" class="filled-in">
			  <label for="basic_checkbox_10" class="mb-0 h-15"></label>
			  <span class="text-line">Proin nec mi porta</span>
			  <small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
		  </ul>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  