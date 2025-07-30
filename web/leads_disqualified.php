<!-- to do 
 remoe default sorting so that it short as per function 

-->

<div class="content-wrapper">
	  <div class="container-full">

<?php 
if(isset($_GET['qualify']))
{$leadviewall=$leads->view_all_by_qualify('lead_qualified',$_GET['qualify']);}
if(isset($_GET['approve']))
{$leadviewall=$leads->view_all_by_qualify('comp_audit',$_GET['approve']);}
?>
	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">View All Leads <?php if(isset($_GET['status'])){$status0=$admin->get_metaname_byvalue2('lead_status',$_GET["status"]);} echo '<b class="text-primary">['.$status0[0]['value1'].']</b>';?></h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Leads</li>
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
			<div class="col-xl-3 col-md-6 col-12 ">
				<div class="box box-inverse box-success">
				  <div class="box-body">
					<div class="flexbox">
					  <h5>Data</h5>
					  <div class="dropdown">
						<span class="dropdown-toggle no-caret" data-toggle="dropdown"><i class="ion-android-more-vertical rotate-90"></i></span>
						<div class="dropdown-menu dropdown-menu-right">
						  <a class="dropdown-item" href="#"><i class="ion-android-list"></i> Details</a>
						  <a class="dropdown-item" href="#"><i class="ion-android-add"></i> Add new</a>
						  <a class="dropdown-item" href="#"><i class="ion-android-refresh"></i> Refresh</a>
						</div>
					  </div>
					</div>

					<div class="text-center my-2">
					  <div class="font-size-60"><?php if($leadviewall){echo count($leadviewall);}else{echo "0";}?></div>
					  <span>Total Data</span>
					</div>
				  </div>
				</div>
			</div>
			<!-- /.col -->
			<div class="col-xl-3 col-md-6 col-12 ">
				<div class="box box-inverse box-primary">
				  <div class="box-body">
					<div class="flexbox">
					  <h5>Uncategorized Data</h5>
					  <div class="dropdown">
						<span class="dropdown-toggle no-caret" data-toggle="dropdown"><i class="ion-android-more-vertical rotate-90"></i></span>
						<div class="dropdown-menu dropdown-menu-right">
						  <a class="dropdown-item" href="#"><i class="ion-android-list"></i> Details</a>
						  <a class="dropdown-item" href="#"><i class="ion-android-add"></i> Add new</a>
						  <a class="dropdown-item" href="#"><i class="ion-android-refresh"></i> Refresh</a>
						</div>
					  </div>
					</div>

					<div class="text-center my-2">
					<div class="font-size-60"><?php $group0=$leads->get_leads_bystatus_byuser(0,$_SESSION['uid']); if($group0){echo count($group0);}else{echo "0";};?></div>
					  <span>Uncategorized Data</span>
					</div>
				  </div>				
				</div>
			</div>
			<!-- /.col -->

			<div class="col-xl-3 col-md-6 col-12">
				<div class="box box-inverse box-danger">
				  <div class="box-body">
					<div class="flexbox">
					  <h5>Unhandled Queries</h5>
					  <div class="dropdown">
						<span class="dropdown-toggle no-caret" data-toggle="dropdown"><i class="ion-android-more-vertical rotate-90"></i></span>
						<div class="dropdown-menu dropdown-menu-right">
						  <a class="dropdown-item" href="#"><i class="ion-android-list"></i> Details</a>
						  <a class="dropdown-item" href="#"><i class="ion-android-add"></i> Add new</a>
						  <a class="dropdown-item" href="#"><i class="ion-android-refresh"></i> Refresh</a>
						</div>
					  </div>
					</div>

					<div class="text-center my-2">
					  <div class="font-size-60"><?php $unhandled=$leads->get_leads_bystatus_byuser(0,$_SESSION['uid']); if($unhandled){echo count($unhandled);}else{echo "0";};?></div>
					  <span>Un-Handled Queries</span>
					</div>
				  </div>

				</div>
			</div>
			<!-- /.col -->
			<div class="col-xl-3 col-md-6 col-12">
				<div class="box box-inverse box-warning">
				  <div class="box-body">
					<div class="flexbox">
					  <h5>Qualified Leads</h5>
					  <div class="dropdown">
						<span class="dropdown-toggle no-caret" data-toggle="dropdown"><i class="ion-android-more-vertical rotate-90"></i></span>
						<div class="dropdown-menu dropdown-menu-right">
						  <a class="dropdown-item" href="#"><i class="ion-android-list"></i> Details</a>
						  <a class="dropdown-item" href="#"><i class="ion-android-add"></i> Add new</a>
						  <a class="dropdown-item" href="#"><i class="ion-android-refresh"></i> Refresh</a>
						</div>
					  </div>
					</div>

					<div class="text-center my-2">
					  <div class="font-size-60"><?php $qualified=$leads->get_leads_bystatus_byuser(1,$_SESSION['uid']); if($qualified){echo count($qualified);}else{echo "0";};?></div>
					  <span>Qualified Leads</span>
					</div>
				  </div>
				</div>
			</div>
			<!-- /.col -->

		  </div>	







		<!--------- table -->
			<div class="row">


<div class="box">
				
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example" class="table table-bordered table-responsive table-hover display wrap ">
						<thead>
							<tr>
								<th>Date & Time</th>
								<th>Lead #</th>
								<th>Source</th>
								<th>Alloted To</th>
								
								<th>Target date</th>
								<th>Company</th>
								<th>Qualified Lead ?</th>
								<th>Last Updated</th>								
								<th>Status</th>
								<th>Utility</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$prefix_lead=$admin->get_metaname_byvalue('lead_nu');
							$counter=1;
							foreach ($leadviewall as $doc) 
							{
								
								$status		=$admin->get_metaname_byvalue2('lead_status',$doc["status"]);
									$group=$leads->get_group_one($doc["group_id"]);
									$gname = $group[0]['gname'];
									if($gname==''){$gname= 'Uncategorised';}
								$uname=$admin->getone_user($doc["handledby"]);

								echo "<tr>";
								echo "<td>".date('d-m-Y H:i:s', strtotime($doc['date_time']))."</td>";	
								echo "<td>".$prefix_lead[0]['value1'].$doc['id']."</td>";
									echo "<td>".$gname."</td>";
									echo "<td>".$uname[0]['uname']."</td>";
									
									echo "<td>";
										if(!empty($doc['targetted_date'])){echo date('d-m-Y H:i:s', strtotime($doc['targetted_date']));}
									echo "</td>";
									echo "<td>".$doc["company"]."</td>";
									echo "<td>";
                                        if($doc["lead_qualified"]=='1'){echo "Qualified";}
                                        if($doc["lead_qualified"]=='2'){echo "Dis-Qualified";}
                                        if($doc["lead_qualified"]=='0'){echo "Not Handled";}
                                    echo  "</td>";
									echo "<td>".date('d-m-Y H:i:s', strtotime($doc['last_updated']))."</td>";									
									echo "<td>".$status[0]["value1"]."</td>";
									?>
									<td>
										<a href="<?php echo $base_url.'index.php?action=dashboard&page=leads_feedback&id='.$doc['id'];?>"><i class='fa fa-comment btn btn-primary btn-xs'></i></a>
										<i class='fa fa-pencil btn btn-warning btn-xs'  data-toggle="modal" data-target=".bs-example-modal-lg" onclick="show_page_model_big('Edit Inquiry','<?php echo $base_url.'index.php?action=dashboard&nocss=lead_edit&id='.$doc['id'];?>')"></i>
										<!-- <i class='fa fa-eye btn btn-success btn-xs'></i>
										<i class='fa fa-trash btn btn-danger btn-xs'></i> -->
									</td>
									<?php
								echo "</tr>";
							}
							?>
						</tbody>
					</table>

</div>
</div>

</div>

</section>

</div>
</div>




<!----- group question --->
<script type="text/javascript">

$(document).ready(function() {

var max_fields      = 50; //maximum input boxes allowed
var wrapper         =  $("#addmore_group"); //Fields wrapper
var add_button      =  $("#group_btn"); //Add button ID
var x = 0; //initlal text box count

       alert('x') ;
        

$(add_button).click(function(e)
{ //on add input button click
    e.preventDefault();
    if(x < max_fields){ 
        x++; 
    $(wrapper).append('<div id="addmore_group'+x+'" class="row"><div class="row"><div class="col-md-4"><div class="form-group"><label>Detail 1</label><select name="stage" class="form-control" id="details1" onchange="javascript:get_details('details1','details2','<?php echo $base_url.'index.php?action=leads&query=get_company_info&meta_name=lead_company_info&detail2='?>');" required><option disabled="disabled" selected="selected" >-- Select --</option><?php $stage=$admin->get_metaname_byvalue_group('lead_company_info');foreach($stage as $k=>$v){echo "<option value='".$stage[$k]['value1']."' ";echo ">".$stage[$k]['value1']."</option>";}?></select></div></div><div class="col-md-4"><div class="form-group"><label>Detail 2</label><select name="details2" class="form-control" id="details2"  required><option disabled="disabled" selected="selected" >-- Select --</option></select></div></div><div class="col-md-4"><div class="form-group"><label>Detail 3</label><input type="text" name="detail3" class="form-control"></div></div></div></div>'); 

        }
        
        }
      
    
    else
    {alert("Sorry, you can add only 50 Items in this segment");}

});




</script>

