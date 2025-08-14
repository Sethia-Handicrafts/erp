<?php $query=$leads->get_lead_one($_GET['id']);
$query2=$leads->get_lead_last_feedback($_GET['id']);
//-- get feedback type from custoomer_type meta
$feedback_type=$admin->get_metaname_byvalue1('lead_customer_type',$query[0]['company_type']);
//-- get step acknoledge
$step=$admin->get_module_step('lead',$query[0]['step']);
$step_now=$step[0]['step'];
?>

<div class="content-wrapper">
	<div class="container-full">


	<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Single Lead</h3>
					<h4>SHL<?php echo $query[0]['id'];?> IN <span class="text-warning">{In Step : <?php echo $query[0]['step'];?>}</span> <span class="text-danger">{Cycle Time : <?php echo $step[0]['cycle_time'];?>}</span></h4>
					<h5 class="text-muted"><?php echo $step[0]['what'];?></h5>
					<hr>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Leads</li>
								<li class="breadcrumb-item active" aria-current="page">Manage Single Lead</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
			<div class="row">

				<!--- form -->
							
					<div class="col-md-4">
						<div class="box">
							<div class="box-header with-border">
								<h4 class="box-title">Lead Details</h4>
							</div>
							<div class="box-body">
								<table class=" table-bordered" width="100%">
									<tr>
										<th>Compnay</th>
										<td><?php echo $query[0]['company'];?></td>
									</tr>
									<tr>
										<th>Type</th>
										<td><?php echo $query[0]['company_type'];?></td>
									</tr>
									<tr>
										<th>Source</th>
										<td><?php $group=$leads->get_group_one($query[0]['group_id']);  echo $group[0]['gname']; ?></td>
									</tr>
									
									<tr>
										<th>Alloted To :</th>
										<td><?php $uname=$admin->getone_user($query[0]['handledby']); echo $uname[0]['uname']; ?></td>
									</tr>

									<tr>
										<th>Targetted Date:</th>
										<td><?php echo date('d-m-Y', strtotime($query[0]['targetted_date'])); ?></td>
									</tr>

									<tr>
										<th>Requirment</th>
										<td>
											<!-- <textarea class="form-control"></textarea> -->
										</td>
									</tr>
								</table>
							</div>
						</div>	
					</div>
					
					<div class="col-md-5">
						
						<div class="box">
							<div class="box-header with-border">
								<h4 class="box-title">Targetted Details</h4>
							</div>
							<div class="box-body">
								<table class="table-bordered wrap" width="100%">
								<?php 
									//-- get data for table of sinle row
									$data=$leads->get_leads2_data($_GET['id']);
									//-- get header for table of sinle row
									$header=$leads->get_leads2_header($data[0]['id']);
									$hcol=10;

								
									$col=10;
									for($i=1; $i<=$col;$i++)
									{					
										if($data[0]['col'.$i] == ''){continue;}
										echo "<tr>";
											echo "<th>".str_replace("_"," ",$header[0]['col'.$i])."</th>";
											echo "<td>".$data[0]['col'.$i]."</td>";
											$i++;
											echo "<th>".str_replace("_"," ",$header[0]['col'.$i])."</th>";
											echo "<td>".$data[0]['col'.$i]."</td>";
										echo "</tr>";
									}
									?>
								</table>
							</div>
						</div>
					</div>	
					
					
					
					<div class="col-md-3">
						<div class="row">
							<?php if(empty($query[0]['attachment'])){?>
								<div class="alert alert-warning">No Attachment Found</div>	
							<?php } else { $counter=1; $files=explode(",",$query[0]['attachment']); echo '<h6 class="text-danger col-sm-12">Click to view !!!</h6>'; foreach($files as $r){?>
								<div class="col-sm-2 text-center">
									
									<?php $info = pathinfo($r);
										if ($info["extension"] == "jpg" || $info["extension"] == "png" || $info["extension"] == "webp" || $info["extension"] == "avi" || $info["extension"] == "tiff" || $info["extension"] == "jpeg" ) 
										{ $type="image/".$info["extension"]; $icon='image-area'; $title='Image';}
										elseif ($info["extension"] == "csv")  	
										{ $type="image/".$info["extension"]; $icon='file-delimited'; $title='CSV';}
										elseif ($info["extension"] == "pdf")  	
										{ $type="image/".$info["extension"]; $icon='file-pdf-box'; $title='PDF';}
										elseif ($info["extension"] == "docx")  	
										{ $type="image/".$info["extension"]; $icon='file-pdf-box'; $title='PDF';}
										elseif ($info["extension"] == "excel")  
										{ $type="image/".$info["extension"]; $icon='microsoft-excel'; $title='Excel';}
										elseif ($info["extension"] == "html")  
										{ $type="image/".$info["extension"]; $icon='code-block-tags'; $title='Html';}
										else
										{ $type="image/".$info["extension"]; $icon='file-cloud-outline'; $title='Others';}
									?>

									<span class="display-4 mdi mdi-<?php echo $icon;?>" data-toggle="modal" data-target="#exampleModal" onclick="show_page_model('File Viewer','<?php echo $base_url.'index.php?action=leads&query=fileviewer&type='.$type.'&file='.$r;?>')" ></span><br><?php echo $counter++.') '.$title;?>
								</div>
							<?php } }?>	

							<form name="attachment" action="post" action="">
								<label>Add Attachment</label>
								<input type="file" name="attachment" class="form-control">
							</form>
							<!--   -->

							</div>	
					</div>



				</div>	
			</div>
		</section>


<!-- feedback content -->
<section class="content">

	<div class="row">
				
	


			<div class="col-sm-12">
								

					<ul class="nav nav-tabs nav-fill" role="tablist">
						<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home11" role="tab" aria-selected="true"><span><i class="fa fa-info"></i></span> <span class="hidden-xs-down ml-15"><?php echo 'Step : '.$step_now.' ('.$step[0]['what'].')';?></span></a> </li>
						
						<?php if( $query[0]['lead_qualified']=='1'){?>
							<li class="nav-item "> <a class="nav-link" data-toggle="tab" href="#profile11" role="tab" aria-selected="false"><span><i class="fa fa-user"></i></span> <span class="hidden-xs-down ml-15">Company Research Info</span></a> </li>
							<!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#msg" role="tab" aria-selected="false"><span><i class="fa fa-comment"></i></span> <span class="hidden-xs-down ml-15">Followup History</span></a> </li> -->
						<?php }?>
					</ul>


						<div class="tab-content">
						<div class="tab-pane active" id="home11" role="tabpanel">
							<?php include('lead_step_'.$step_now.'.php');?>
						</div>
						<?php if( $query[0]['lead_qualified']=='1'){?>
						<div class="tab-pane" id="profile11" role="tabpanel">
							<?php include('leads_followup.php');?>
						</div>
						<!-- <div class="tab-pane" id="msg" role="tabpanel">
							<?php include('followup_history.php');?>
						</div> -->
						<?php }?>
						</div>
	</div>
</section>							



</div>
</div>




