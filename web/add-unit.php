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
                                <li class="breadcrumb-item active" aria-current="page">Add Unit</li>
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

				

          <?php if(isset($_GET['edit'])){?>
          <form name="product" action="index.php?action=store&query=update_unit" method="post">
          <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>">
          <?php }else{?>
          <form name="product" action="index.php?action=store&query=add_unit" method="post">
          <?php }?>
                     <!-- row 1-->
                       <div class="form-group row">
                         
                         <div class="col-sm-5">
                         <label class="col-form-label">Item Quantity Unit <span class="mendetory">*</span></label>
                           <input type="text" <?php if(isset($_GET['edit'])){?>value="<?php echo $unit[0]['unit'];?>"<?php }?> class="form-control form-control-sm" name="unit"  required>
                         </div>                         
                         
                         
                         <div class="col-sm-2"><br>
                            <input type="submit" name="submit" class="btn btn-success btn-xs btn-icon-split" value="Submit" />
                         </div>
                         <div class="col-sm-8"></div>
         </div>
                           
                  </form> 

                </div>
         </div>
        </div>


<!-- Main content -->
<div class="col-12">
			  <div class="box">
				
				<!-- /.box-header -->
				<div class="box-body">
					<!-- Nav tabs -->
			    	<h3>View All Unit</h3>
                </div>

                
                <table class="table table-bordered" id="example">
            <thead>
              <tr>
                <th>S.No.</th>
                <th>Unit</th>
                <th>Utility</th>
              </tr>  
            </thead>
            <tbody>
              <?php 
              $counter=1;
              $viewall=$store->get_unit();
              foreach($viewall as $row => $value){?>
              <tr id="<?php echo $viewall[$row]['id'];?>">
                <th><?php echo $counter++;?></th>
                <th><?php echo $viewall[$row]['unit'];?></th>
                <th>
                <a href="<?php echo $base_url.'index.php?action=dashboard&page=add-unit&edit='.$viewall[$row]['id'];?>">  <i class="btn btn-warning btn-xs fa fa-pencil"></i> </a> 
                <i onclick="deleteme('store','delete-unit','<?php echo $viewall[$row]['id'];?>')" class="btn btn-danger btn-xs fa fa-trash"></i> </a> 
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