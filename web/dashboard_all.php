

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
				
								
				</div>
				
			</div>
		</section>
		<!-- /.content -->
	  </div>
  </div>
  

  