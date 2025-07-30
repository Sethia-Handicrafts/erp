<div class="content-wrapper">
	  <div class="container-full">
    	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title"><?php if(isset($_GET['edit'])){ echo "Edit";}else{echo "Add";}?> Store Item Category</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item">Store</li>
								<li class="breadcrumb-item" >Category</li>
                                <li class="breadcrumb-item active" aria-current="page">Add New</li>
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
					<!-- Nav tabs -->
			    	

					<?php include('alert.php');?>

					<div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">

					<?php if(isset($_GET['edit'])){  $edit=$store->get_cat_single($_GET['edit']);?>
					<form name="product" action="<?php echo $base_url;?>index.php?action=store&query=edit_store_cat" method="post">
						<input type="hidden" name="id" value="<?php echo $edit[0]['id'];?>"/>
					<?php }else{?>
						<form name="product" action="<?php echo $base_url;?>index.php?action=store&query=add_store_cat" method="post">
					<?php }?>  


					<div class="form-group row">
                         
						 <div class="col-sm-2">
						 <label class="col-form-label">Item Name <span class="mendetory">*</span></label>
						 </div>
						 
						   <div class="col-sm-4">
						   <?php if(isset($_GET['edit'])){?>
							 <input type="text" value="<?php echo $edit[0]['cat'];?>" class="form-control " name="cat"  required>
							 <?php }else{?>
							  <input type="text" value="" class="form-control " name="cat"  required>
							 <?php }?> 
						   </div>                         
						   
						   
						   
						   <div class="col-sm-2">
						   <input type="submit" name="submit" class="btn btn-success btn-icon-split" value="Submit">
							   
						   </div>
  
						   <div class="col-sm-2">
						   <input type="reset" name="reset" class="btn btn-warning" value="Reset">
						   </div>
  
						   <div class="col-sm-8"></div>
							 </form>
		   </div>

                </div>
         </div>
        </div>


<!-- Main content -->
<div class="col-12">
			  <div class="box box-default">
				
				<!-- /.box-header -->
				<div class="box-body">
					<!-- Nav tabs -->
			    	<h3>View All Category</h3>
                </div>

                <div class="table-responsive">
                <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Category</th>
                                <th>Utility</th>
                            </tr>  
                            </thead>
                            <tbody>
                            <?php 
                            $counter=1;
                            $viewall=$store->get_cat();
                            foreach($viewall as $row => $value){?>
                            <tr id="<?php echo $viewall[$row]['id'];?>">
                                <th><?php echo $counter++;?></th>
                                <th><?php echo $viewall[$row]['cat'];?></th>
                                <th>
                                <a href="<?php echo $base_url.'index.php?action=dashboard&page=add-store-category&edit='.$viewall[$row]['id'];?>">  <i class="btn btn-warning btn-xs fa fa-pencil"></i> </a> 
                                <i class="btn btn-danger btn-xs fa fa-trash" onclick="deleteme('store','delete_cat','<?php echo $viewall[$row]['id'];?>')"></i>
                            </th>
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