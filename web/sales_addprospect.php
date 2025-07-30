
<div class="content-wrapper">
	  <div class="container-full">
    	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Prospect Registration</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item">Sales</li>
								<li class="breadcrumb-item" >Registration</li>
                                <li class="breadcrumb-item active" aria-current="page">Prospect</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

		<!-- Main content -->
		<div class="col-12">
		<?php include('alert.php'); ?>	  
		<div class="box box-default">
				
				<!-- /.box-header -->
				<div class="box-body">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs justify-content-center" role="tablist">
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home12" role="tab" ><span><i class="ion-home"></i></span> <span class="hidden-xs-down ml-15">Basic Details</span></a> </li>
						<?php if(isset($_GET['id'])){?>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile12" role="tab"><span><i class="ion-person"></i></span> <span class="hidden-xs-down ml-15">More Details</span></a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages12" role="tab" aria-selected="false"><span><i class="ion-email"></i></span> <span class="hidden-xs-down ml-15">Terms & Conditions</span></a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#setting12" role="tab" aria-selected="false"><span><i class="ion-settings"></i></span> <span class="hidden-xs-down ml-15">Approval</span></a> </li>
						<?php }?>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content tabcontent-border">
						<div class="tab-pane active" id="home12" role="tabpanel">
										<div class="p-15">
										<h4 id="steps-uid-0-h-0" tabindex="-1" class="title current">Client Information</h4>

										<section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0" class="body current" aria-hidden="false">
										<?php 
										if(isset($_GET['id']))
										{include('sales_prospect1_edit.php');}
										else
										{include('sales_prospect1.php');}
										?>	
										</section>
									


							</div>
						</div>
						<!----- more details  ----------->
						<div class="tab-pane" id="profile12" role="tabpanel">
							<div class="p-15">
							<h3>More Details</h3>
								  <form name="prospect2" action="<?php echo $base_url.'index.php?action=sales&query=prospect2';?>" method="post">
									<input type="hidden" name="bid" value="<?php echo $_GET['id'];?>"/>
							       <div id="addmore"></div>
                                  <input type="button" name="btn"  class="btn btn-xs btn-info" value="Add More Details" id="btn">
								  <input type="submit" name="submit"  class="btn btn-xs btn-primary" value="Save" style="display:none;" id="sbtn">
						           </form>

								   <?php 
								 	//-- get details 
									$details = $sales->get_beneficiery_detail($_GET['id']);  
									if($details)
									{
										$counter=1;
										echo "<table class='table'>
												<tr>
													<th>S.No.</th>
													<th>Type</th>
													<th>Details</th>
													<th>Delete</th>
												</tr>";
										foreach($details as $r=>$v)
										{
											?>
											<tr id="<?php echo $details[$r]['id']; ?>">
												<th><?php echo $counter++;?></th>
												<td><?php echo $details[$r]['value1']; ?></td>
												<td><?php echo $details[$r]['value2']; ?></td>
												<td><i class="fa fa-trash btn btn-danger tbn-sm" onclick="deleteme('sales','delete_moredetails_prospect','<?php echo $details[$r]['id']; ?>')"></i></td>
											</tr>
											
								   <?php } echo "</table>";}else{echo "<h5>No details found</h5>";}?>
							</div>
						</div>
						<!-- t&c---->
						<div class="tab-pane" id="messages12" role="tabpanel">
							<div class="p-15">
								<?php include('sales_terms-and-conditons.php');?>
							</div>
						</div>
						<div class="tab-pane" id="setting12" role="tabpanel">
							<div class="p-15">
								<table class="table">
									<tr>
										<th>Client Approval</th>
										<td>
											<!-- <i class="ti ti-close text-danger"></i> -->
										</td>
									</tr>
									<tr>
										<th>Managment Approval</th>
										<td>
										<!-- <i class="ti ti-check text-success"></i> -->
										</td>
									</tr>
								</table>
							</div>
						</div>
						
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
			</div>
</div>




<script type="text/javascript">
$(document).ready(function() {
var max_fields      = 50; //maximum input boxes allowed
var wrapper         =  $("#addmore"); //Fields wrapper
var add_button      =  $("#btn"); //Add button ID
var x = 0; //initlal text box count



$(add_button).click(function(e)
{ //on add input button click
    e.preventDefault();
    if(x < max_fields){ 
        x++; 
    $(wrapper).append('<div id="addmore'+x+'"  class="row"><div class="col-sm-1">Type '+x+'</div><div class="col-sm-3"><label>Type</label><input type="text" class="form-control" name="value1[]"></div><div class="col-sm-5"><label>Detail(s)</label><input type="text" class="form-control" name="value2[]"></div><div class="col-sm-2"><input type="button" onclick=removeme("addmore'+x+'") class="btn btn-xs btn-danger" value="X"></div></div>'); 

        }
      
    
    else
    {alert("Sorry, you can add only 50 Items in this segment");}

	if(x>0)
{$('#sbtn').show();}
else
{$('#sbtn').hide();}
});



});

function removeme(x)
{
  $('#addmore'+x).remove();   
}  
</script>	