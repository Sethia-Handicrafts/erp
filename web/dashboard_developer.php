<div class="content-wrapper">

<div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
				<h3 class="page-title text-primary">Welcome <?php echo $_SESSION['person_name'];?></h3>	
				<h4 class="page-title text-info">Dashbaord (Leads)</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Dashbaord</li>
								<li class="breadcrumb-item active" aria-current="page">Leads</li>
							</ol>
						</nav>
					</div>
                </div>
            </div>

            <div class="right-title">
					<div class="d-flex mt-10 justify-content-end">
						<div class="d-lg-flex mr-20 ml-10 d-none">
							<div class="chart-text mr-10">
								<h6 class="mb-0"><small>THIS MONTH</small></h6>
								<h4 class="mt-0 text-primary">$12,125</h4>
							</div>
							<div class="spark-chart">
								<div id="thismonth"><canvas style="display: inline-block; width: 60px; height: 35px; vertical-align: top;" width="60" height="35"></canvas></div>
							</div>
						</div>
						<div class="d-lg-flex mr-20 ml-10 d-none">
							<div class="chart-text mr-10">
								<h6 class="mb-0"><small>LAST YEAR</small></h6>
								<h4 class="mt-0 text-danger">$22,754</h4>
							</div>
							<div class="spark-chart">
								<div id="lastyear"><canvas style="display: inline-block; width: 60px; height: 35px; vertical-align: top;" width="60" height="35"></canvas></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



        <!-- row 2 -->
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

                <!---- last logged in by users-------->
                <div class="col-xl-4 col-lg-6 col-12">
                    <div class="box">
                            <div class="box-header with-border">
                            <h5 class="mt-0 font-weight-700 text-primary"><i class='fa fa-user'></i> User Last Logged In</h5>
                            </div>
                            <div class="box-body text-center" style="height: 340px; overflow-y: scroll;"> 
                                <table class="table table-bordered">			
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>UID</th>
                                    <th>Username</th>
                                    <th>Last Logged In</th>
                                </tr>
                                <?php 
                                $counter=1;
                                $alluser=$admin->get_alluser();
                                foreach($alluser as $k=>$v)
                                {
                                ?>
                                <tr>
                                    <td><?php echo $counter++;?></td>
                                    <td><?php echo $alluser[$k]['person_name'];?></td>
                                    <td><?php echo $alluser[$k]['id'];?></td>
                                    <td><?php echo $alluser[$k]['username'];?></td>
                                    <td></td>
                                </tr>
                                <?php }?>
                                </table>
                            </div>
                        </div>    
                    </div>    

                 <!------- help tickets------>
                 <div class="col-xl-4 col-lg-6 col-12">
                    <div class="box">
                            <div class="box-header with-border">
                            <h5 class="mt-0 font-weight-700 text-secondary"><i class='fa fa-bell'></i> Help Ticket(s)</h5>
                            </div>
                            <div class="box-body text-center" style="height: 340px; overflow-y: scroll;"> 
                                <table class="table table-bordered">			
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>UID</th>
                                    <th>Received At</th>
                                    <th>Status</th>
                                </tr>
                                <?php 
                                $counter=1;
                                $tickets=$admin->get_alltickets_bystatus(0);
                                foreach($tickets as $k=>$v)
                                {
                                ?>
                                <tr>
                                    <td><?php echo $counter++;?></td>
                                    <td><?php echo $tickets[$k]['person_name'];?></td>
                                    <td><?php echo $tickets[$k]['id'];?></td>
                                    <td><?php echo $tickets[$k]['date_time'];?></td>
                                    <td></td>
                                </tr>
                                <?php }?>
                                </table>
                            </div>
                        </div>    
                    </div>   
        </div>
</section>

        
</div>

</div>

</div>