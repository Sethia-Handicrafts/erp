<div class="content-wrapper">
	  <div class="container-full">


	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Create Company Research Flow</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Master</li>
                                <li class="breadcrumb-item" aria-current="page">Leads</li>
                                <li class="breadcrumb-item active" aria-current="page">Company Research Flow</li>
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
				


                <div class="col-lg-5 col-12">
					  <div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">Create Company Research Flow</h4>
						</div>
                        <div class="box-body">
						<!-- /.box-header -->
                                <form action="<?php echo $base_url.'index.php?action=leads&query=company_research'?>" name="add-meta" method="post" >

                                <!----- 1st row------>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <!--- meta name --->
                                        <input type="hidden" name="meta_name" value="lead_company_info">
                                        <!----- value 1 ------>
                                        <label class="form-label">Title <span class="text-danger">*</span></label>
                                        <input type="text" name="value1" class="form-control" required>
                                    </div>

									<div class="col-lg-6">
										<label>Title Input Type</label>
										<select name="input_type_value1" class="form-control">
											<option disabled="disabled" selected="selected">-Select-</option>
											<option value="radio">Unique</option>
											<option value="checkbox">CheckBox</option>
											<option value="textarea">Description</option>
										</select>
									</div>

                                    <div class="col-lg-6">
                                         <!----- value 2 ------>
                                        <label class="form-label">Sub Title</label>
                                        <input class="form-control" type="text" name="value2">
                                        <span class="text-danger">Leave blank if it has no subcategories or descriptive</span>
                                    </div>

									<div class="col-lg-6">
										<label>Sub Title Input Type</label>
										<select name="input_type_value2" class="form-control">
											<option disabled="disabled" selected="selected">-Select-</option>
											<option value="radio">Unique</option>
											<option value="checkbox">CheckBox</option>
											<option value="textarea">Description</option>
											<option value="text2">Description 2 (Compare)</option>
										</select>
									</div>
                                </div>    



                                
                                <div id="addmore">
                                    
                                </div>

                               

                                <div class="form-group row">
                                            <div class="col-lg-3">
                                            <input class="btn btn-sm btn-warning" type="button" id="addmore_btn" name="add more" value="Add More Category">
                                            </div>
                                
                                            <div class="col-lg-1">
                                            <input class="btn btn-md btn-primary" type="submit" name="submit" value="Save">
                                            </div>
                                </div>




                                </form>
                        </div>     
					  </div>
					  <!-- /.box -->			
				</div>



                <div class="col-lg-7 col-12  margin-top-10">
					  <div class="box">
					  <div class="box-body">
					<div class="table-responsive">
                    <table id="example" class="table table-bordered table-hover display wrap margin-top-10 w-p100">
						<thead>
							<tr>
								<!-- <th>#</th> -->
								<th>Title</th>
								<th>Input Type</th>
								<th>Sub Title</th>
								<th>Input Type</th>
								<th>Category</th>
								<th>Input Type</th>
								<th>Sub Category</th>
								<th>Input Type</th>
								<th>Utility</th>
							</tr>
						</thead>
						
						<tbody>
							<?php $metaname=$admin->get_metaname_byvalue('lead_company_info');
							$counter=1;
							foreach ($metaname as $key => $value) {

							?>
							<tr id='<?php echo $metaname[$key]['id'];?>'>
								<!-- <td><?php echo $counter++;?></td> -->
								<td><?php echo $metaname[$key]['value1'];?></td>
								<td><?php echo $metaname[$key]['value1_input'];?></td>
								<td><?php echo $metaname[$key]['value2'];?></td>
								<td><?php echo $metaname[$key]['value2_input'];?></td>
								<td><?php echo $metaname[$key]['value3'];?></td>
								<td><?php echo $metaname[$key]['value3_input'];?></td>
								<td><?php $value4 = unserialize($metaname[$key]['value4']);

										echo "<ol>";
										foreach($value4 as $v4)
										{
											echo "<li>".$v4."</li>";
										}
										echo "</ol>";
								?></td>
								<td><?php echo $metaname[$key]['value4_input'];?></td>
								
								<td>
									<i class="fa fa-pencil btn btn-warning btn-xs" data-toggle="modal" data-target="#exampleModal" onclick="show_page_model('Edit Compnay Research info','<?php echo $base_url.'index.php?action=dashboard&nocss=lead_edit_company_info&id='.$metaname[$key]['id'];?>')"></i>

									<i class="fa fa-trash btn btn-danger btn-xs" onclick="deleteme('leads','delete_company_info','<?php echo $metaname[$key]['id'];?>')"></i>
								</td>
							</tr>
							<?php }?>
						</tbody>
					</table>

					</div>
					</div>

					</div>
						</div>	

</section>

</div>
</div>




<script type="text/javascript">

$(document).ready(function() {

var max_fields      = 50; //maximum input boxes allowed
var wrapper         =  $("#addmore"); //Fields wrapper
var add_button      =  $("#addmore_btn"); //Add button ID
var x = 0; //initlal text box count

        

$(add_button).click(function(e)
{ //on add input button click
    e.preventDefault();
    if(x < max_fields){ 
        x++;
             $(wrapper).append('<div id="addmore_subtitle'+x+'"  class="form-group row" ><div class="col-sm-3"><label>Category '+x+'</label><input type="text" name="value3[]" class="form-control" /></div><div class="col-sm-3"><label>Type '+x+'</label><select name="input_type_value3[]" class="form-control"><option disabled="disabled" selected="selected">-Select-</option><option value="radio">Unique</option><option value="checkbox">CheckBox</option><option value="textarea">Description</option></select></div><div class="col-sm-3"><label>Sub Category '+x+'</label><input type="text" name="value4[]" class="form-control" /><span class="text-danger">Use (,) for multiple values</span></div><div class="col-sm-3"><label>Sub Input Type '+x+'</label><select name="input_type_value4[]" class="form-control"><option disabled="disabled" selected="selected">-Select-</option><option value="radio">Unique</option><option value="checkbox">CheckBox</option><option value="textarea">Description</option></select></div><div class="col-sm-1"><input type="button" onclick=removeme("addmore_subtitle'+x+'") class="btn btn-xs btn-danger" value="X"></div></div></div>');         
        }
    else
    {alert("Sorry, you can add only 50 Items in this segment");}

});



});

function removeme(x)
{
    $('#'+x).remove();
}

</script>
