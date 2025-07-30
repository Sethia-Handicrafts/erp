
<div class="content-wrapper">
	  <div class="container-full">
    	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Sample Development</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item">Production</li>
								<li class="breadcrumb-item">Request For</li>
                <li class="breadcrumb-item active" aria-current="page">Sample</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

		<!-- Main content -->
		<div class="col-12">
			  <div class="box box-default">
				
				<!-- /.box-header -->
				<div class="box-body">
                    <!-- Step 1 -->
 <div id="accordion">

  <div class="card">
    <div class="card-header bg-danger ">
      <a class="card-link text-white" data-toggle="collapse" href="#collapseOne">
        <b>Step</b> #1
      </a>
    </div>
    <div id="collapseOne" class="collapse" data-parent="#accordion">
      <div class="card-body">
        <?php include('add_sampling_step1.php');?>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header bg-info ">
      <a class="collapsed card-link text-white" data-toggle="collapse" href="#collapseTwo">
        <b>Step</b> #2
      </a>
    </div>
    <div id="collapseTwo" class="collapse" data-parent="#accordion">
      <div class="card-body">
        <?php include('add_sampling_step2.php');?>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header bg-success ">
      <a class="collapsed card-link text-white" data-toggle="collapse" href="#collapseThree">
        <b>Step</b> #3
      </a>
    </div>
    <div id="collapseThree" class="collapse" data-parent="#accordion">
      <div class="card-body">
        <?php include('add_sampling_step3.php');?>
      </div>
    </div>
  </div>

</div> 
                </div>

             </div>
             
        </div>
        <!-- /.content -->
</div>
      <!-- /.content-wrapper -->

