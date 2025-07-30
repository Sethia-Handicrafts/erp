<div class="content-wrapper">
	  <div class="container-full">
    	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Category Registration</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item">Inventory</li>
								<li class="breadcrumb-item" >Request For</li>
                                <li class="breadcrumb-item active" aria-current="page">Category</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

		<!-- Main content -->
		<div class="col-12">
			  <div class="box box-default">
				<?PHP include('alert.php');?>
				<!-- /.box-header -->
				<div class="box-body">
					<!-- Nav tabs -->
			    	<h3 id="steps-uid-0-h-0" tabindex="-1" class="title current">Add New Category</h3>


                        <form action="<?php echo $base_url.'index.php?action=product&query=add_category';?>" method="post" name="add_category">
                            <div class="row g-3">
                                <!-- First Row -->
                                <div class="col-md-3">
                                    <label class="form-label">Category Name</label>
                                    <input type="text" class="form-control" name="cat_name">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Category Code</label>
                                    <input type="text" class="form-control" name="cat_code">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Description / Remark</label>
                                    <input type="text" class="form-control" name="desc">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Room</label>
                                    <input type="text" class="form-control" name="room">
                                </div>
                                <div class="col-md-3"><br>
                                    <input type="submit" name="submit" value="Submit" class="btn btn-success btn-sm">
                                </div>
                            </div>    
                    </form>

                </div>
         </div>
        </div>


<!-- Main content -->
<div class="col-12">
			  <div class="box box-default">
				
				<!-- /.box-header -->
				<div class="box-body">
					<!-- Nav tabs -->
			    	<h3 id="steps-uid-0-h-0" tabindex="-1" class="title current">View All Group</h3>
                </div>

                <div class="table-responsive">
					  <table id="example" class="table table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Category Name</th>
								<th>Code</th>
								<th>Remark / Description</th>
                                <th>Room</th>
								<th>Utility</th>
							</tr>
						</thead>
						<tbody>
                            <?php 
                            $counter=1;
                            $all = $product->get_products_cat();
                            foreach($all as $r=>$v)
                            {
                            ?>  
                                <tr>
                                    <th><?php echo $counter++;?></th>
                                    <td><?php echo $all[$r]['cat'];?></td>
                                    <td><?php echo $all[$r]['cat_code'];?></td>
                                    <td><?php echo $all[$r]['remark'];?></td>
                                    <td><?php echo $all[$r]['room'];?></td>
                                    <td>
                                        <i class='fa fa-eye btn btn-xs btn-info'></i>
                                        <i class='fa fa-pencil btn btn-xs btn-warning'></i>
                                        <i class='fa fa-trash btn btn-xs btn-danger'></i>
                                    </td>
                                </tr>
                            <?php }?>
                        </tbody>
                        </table> 
                    </div>
</div>
</div>              


</div>
</div>
</div>
</div>