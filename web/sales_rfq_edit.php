<?php 
$view=$sales->get_rfq_one($_GET['id']);
?>

<div class="content-wrapper">
	  <div class="container-full">
    	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Request For Quotation</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item">Sales</li>
								<li class="breadcrumb-item" >Request For</li>
                                <li class="breadcrumb-item active" aria-current="page">Quotation</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

		<!-- Main content -->
		<div class="col-sm-12">
        <?php include('alert.php');?>
			  <div class="box box-default">
				
				<!-- /.box-header -->
				<div class="box-body">
					
					<?php 
					$current_step=$view[0]['step'];
					
					
					if($current_step=='0.0')
					{$previous_step='0'; $next_step="0.5"; }

					elseif($current_step=='0.5')
					{$previous_step='0.0';  $next_step="1.0"; }
					
					elseif($current_step=='1.0')
					{$previous_step='0.5';  $next_step="2.0"; }

					else
					{$previous_step=$current_step-floatval(1.0); $next_step=$current_step+floatval(1.0);}

					 $current_step_page=str_replace('.','-',$current_step);
					?>

					<div class="row">
						<div class="col-sm-2">
							<?php if($previous_step !='0') {?>
							<form name ="previous_step" action="<?php echo $base_url.'index.php?action=sales&query=sales_rfq_edit_step_update';?>" method="post">
								<input type="hidden" name="sid" value="<?php echo $_GET['id'];?>">
								<input type="hidden" name="pstep" value="<?php echo $previous_step;?>">
								<input type="submit" class="btn btn-danger" id="previousstep" value="Previous Step (<?php echo $previous_step;?>)"/>
							</form>
							<?php }?>
						</div>
						<div class="col-sm-8"></div>
						<div class="col-sm-2 text-right">
						<?php 
						//if($view[0]['engineer_pass'] != '0') {?>
							<form name="next_step" id="next_step" action="<?php echo $base_url.'index.php?action=sales&query=sales_rfq_edit_step_update';?>" method="post">
								<input type="hidden" name="sid" value="<?php echo $_GET['id'];?>">
								<input type="hidden" name="pstep" value="<?php echo $next_step;?>">
								<input type="submit" class="btn btn-secondary" id="nextstep" value="Next Step (<?php echo $next_step;?>)"/>
							</form>
						
						<?php //}else{echo "<span class='text-danger'>Next Step Will Be Available After Price Approval";}?>
						</div>
					</div>	
				
				<hr>
				<div class="row">
					<div class="col-sm-12">
					<?php 
						include('sales_rfq_'.$current_step_page.'.php');
					?>
					</div>
				</div>
					
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
			</div>
</div>

