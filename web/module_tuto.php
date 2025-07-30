<div class="content-wrapper">
	  <div class="container-full">


	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Module Step(s)</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page"><?php echo strtoupper($_GET['module']);?></li>
								<li class="breadcrumb-item active" aria-current="page">Module Steps</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
			<?php include('alert.php');?>
			<div class="row">
			<!--- form -->
			<div class="col-md-12">

            <div class="box box-default">
				<div class="box-header with-border">
				<h4 class="box-title">Create Step for <?php echo strtoupper($_GET['module']);?></h4>
				
				</div>
				<!-- /.box-header -->
                    <div class="box-body wizard-content">
                        <form name="">
                            <input type="hidden" name="module" value="<?php echo $_GET['module'];?>">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Step</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <label>What</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <label>Who</label>
                                    <select name="who" class="form-control">
                                    <option>-- Select --</option>
                                                <?php $user = $admin->get_metaname_byvalue('user_type'); 

                                                //	$user = array_unique($user0);
                                                foreach($user as $k=>$value)
                                                {
                                                if($user[$k]['meta_value2']=='1'){continue;}
                                                echo "<option value='".$user[$k]['value2']."'>".$user[$k]['value1']."</option>";
                                                }
                                                ?>
                                    </select>
                                        
                                </div>
                                <div class="col-sm-3">
                                    <label>How</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <label>Cycle Time</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <label>Total Time</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <label>Checklist</label>
                                    <textarea class="form-control"></textarea>
                                    <span class="text-danger">Use comma(,) to separate</span>
                                </div>
                                <div class="col-sm-3">
                                    <label>Accountable</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <label>Consult</label>
                                    <select name="who" class="form-control">
                                    <option>-- Select --</option>
                                                <?php $user = $admin->get_metaname_byvalue('user_type'); 

                                                //	$user = array_unique($user0);
                                                foreach($user as $k=>$value)
                                                {
                                                if($user[$k]['meta_value2']=='1'){continue;}
                                                echo "<option value='".$user[$k]['value2']."'>".$user[$k]['value1']."</option>";
                                                }
                                                ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label>Information</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <label>Training Material</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <br><input type="submit" name="save" value="Save" class="btn btn-md btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>	
					</div>
				</div>
			
				<!--- list--->
				<div class="col-sm-12">
				<div class="box box-default">
					<div class="box-header with-border">
					<h4 class="box-title">Details</h4>
									
					</div>
					<!-- /.box-header -->
					<div class="box-body wizard-content">
					
                    <div class="table-responsive"></div>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>Step</th>
                        <th>What</th>
                        <th>Who</th>
                        <th>How</th>
                        <th>Cycle Time</th>
                        <th>Total Time</th>
                        <th>Checklist</th>
                        <th>Accountable</th>
                        <th>Consult</th>
                        <th>Information</th>
                        <th>Training Material</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $step = $admin->get_steps_by_module($_GET['module']); 
                        foreach($step as $r=>$v){?>
                        <tr>
                            <td><?php echo $step[$r]['step'];?></td>
                            <td><?php echo $step[$r]['what'];?></td>
                            <td><?php echo $step[$r]['who'];?></td>
                            <td><?php echo $step[$r]['how'];?></td>
                            <td><?php echo $step[$r]['cycle_time'];?></td>
                            <td><?php echo $step[$r]['total_time'];?></td>
                            <td><?php echo $step[$r]['checklist'];?></td>
                            <td><?php echo $step[$r]['accountable'];?></td>
                            <td><?php echo $step[$r]['consult'];?></td>
                            <td><?php echo $step[$r]['information'];?></td>
                            <td><?php echo $step[$r]['training_material'];?></td>
                        </tr>
                        <?php }?>
                        </tbody>
                    </table>
					</div>
					</div>
					</div>
				</div>

			<!-- /.box-body -->
		  </div>

</div>

</section>

</div>
</div>