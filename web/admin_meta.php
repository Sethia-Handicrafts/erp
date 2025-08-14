<div class="content-wrapper">
	  <div class="container-full">


	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Add / Update Meta Data</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Admin</li>
								<li class="breadcrumb-item active" aria-current="page">Add / Update Meta</li>
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
			<div class="col-md-4">

            <div class="box box-default">
				<div class="box-header with-border">
				<h4 class="box-title">Add / Update Meta Data</h4>
				</div>
				<!-- /.box-header -->
				<div class="box-body wizard-content">
					
<form action="<?php echo $base_url.'index.php?action=admin&query=add-meta'?>" name="add-meta" method="post" >
                    
                    <!----- 1st row------>
                       <div class="form-group row">
                            <div class="col-lg-6">
                            <label class="form-label">Meta Name</label>
                            <input list="meta_name" name="metaname" id="metaname" class="form-control" required>

                                <datalist id="meta_name">
                                    <?php $metaname=$admin->get_metaname();
                                    foreach($metaname as $k => $value){?>
                                <option value="<?php echo $metaname[$k]['meta_name']; ?>">
                                <?php }?>
                                </datalist>
                            
                            </div>

                            <div class="col-lg-6">
                                
                                <label class="form-label">Value 1</label>
                                <input class="form-control" type="text" name="value1" required>
                                
                            </div>

                        </div>                
                        <div class="form-group row">

                            <div class="col-lg-6">
                                
                                <label class="form-label">Value 2</label>
                                <input class="form-control" type="text" name="value2">
                                
                            </div>

                            <div class="col-lg-6">
                                
                                <label class="form-label">Editable</label>
                                    <div class="c-inputs-stacked">
										<input name="editable" type="radio" id="radio_123" value="0" checked='checked'>
										<label for="radio_123" class="mr-30">Yes</label>
										<input name="editable" type="radio" id="radio_456" value="1">
										<label for="radio_456" class="mr-30">No</label>
									</div>
                            
                            </div>
                    
                                    </div>

                                    <div class="form-group row">

                   <div class="col-lg-1">
                     <br> 
                       <input class="btn btn-primary" type="submit" name="submit" value="Save">
                     
                   </div>
                   
                         
                       </div>
                     
                     
                        
                     
                    </form>
					</div>
				</div>
			</div>

				<!--- list--->
				<div class="col-sm-8">
				<div class="box box-default">
					<div class="box-header with-border">
					<h4 class="box-title">Previous Uploaded Data & Details</h4>
				
					</div>
					<!-- /.box-header -->
					<div class="box-body wizard-content">

                    <table id="example" class="table table-bordered table-responsive table-hover display wrap ">
            <thead>
                <tr>
                  <th>S.No.</th>
                  <th>Meta Type</th>
                  <th>Value 1</th>
                  <th>Value 2</th>
                  <th>Parent Meta</th>
                  <th>Editable</th>
                  <th>Utility</th>
                </tr>
            </thead>
            <tbody>
              <?php $metaname=$admin->viewall_meta();
              $counter=1;
              foreach ($metaname as $key => $value) {
              
              ?>
              <tr>
                <td><?php echo $counter++;?></td>
                <td><?php echo $metaname[$key]['meta_name'];?></td>
                <td width="45%" style="white-space: normal !important; word-wrap: break-word;  "><?php echo $metaname[$key]['value1'];?></td>
                <td><?php echo $metaname[$key]['value2'];?></td>
                <td><?php if($metaname[$key]['parent_meta']==0){echo "No";}else{ $pname = $admin->get_metaname_byid($metaname[$key]['parent_meta']); echo $pname[0]['value1'];}?></td>
                <td><?php if($metaname[$key]['editable']==0){echo "Yes";}else{echo "No";}?></td>
                <td>
                    <i class="fa fa-pencil" data-toggle="modal" data-target="#modal-right" onclick="show_page_model('Admin Meta Data Edit','<?php echo $base_url.'index.php?action=dashboard&nocss=admin_meta_edit&id='.$metaname[$key]['id'];?>')"></i>
                    <a onclick="return confirm('Please click on OK to continue.');" href="<?php echo $base_url.'cwp/index.php?action=admin&query=delete-meta&id='.$metaname[$key]['id']; ?>"><i class="fa fa-trash"></i>
                </td>
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