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

					<form name="product" action="index.php?action=store&query=add_store_subcat" method="post">
                   	
                     <!-- row 1-->
                       <div class="form-group row">
                         
                       <div class="col-sm-3">
                         <label class="col-form-label">Category <span class="mendetory">*</span></label>
                           <select name="cat" class="form-control">
                            <option disabled='disabled' selected='selected'>- Select -</option>
                            <?php 
                            $cat=$store->get_cat();
                            foreach($cat as $row=>$value)
                            {
                              echo "<option value='".$cat[$row]['id']."'>".$cat[$row]['cat']."</option>";
                            }
                            ?>
                           </select>
                         </div>

                         <div class="col-sm-3">
                         <label class="col-form-label">Item Sub Category <span class="mendetory">*</span></label>
                           <input type="text" value="" class="form-control form-control-sm" name="subcat"  required>
                         </div>                         
                         
                         
                         <div class="col-sm-2"><br>
                         <!--<input type="submit" name="submit" value="Submit">-->
                            <input type="submit" name="submit" class="btn btn-success" value="Submit">  
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
			    	<h3>View All Sub Category</h3>
                </div>

                
                <table class="table table-bordered" id="example">
            <thead>
              <tr>
                <th>S.No.</th>
                <th>Category</th>
                <th>Sub Category</th>
                <th>Utility</th>
              </tr>  
            </thead>
            <tbody>
              <?php 
              $counter=1;
              $viewall=$store->get_subcat();
              foreach($viewall as $row => $value){?>
              <tr id="<?php echo $viewall[$row]['id'];?>">
                <th><?php echo $counter++;?></th>
                <th><?php $cat=$store->get_cat_single($viewall[$row]['cat']); 
                echo $cat[0]['cat'];
                ?></th>
                <th><?php echo $viewall[$row]['subcat'];?></th>
                <th>
                <input type="button" value="Edit" class='btn btn-warning' data-toggle="modal" data-target="#exampleModal" onclick="show_page_model('Edit <?php echo $viewall[$k]['subcat'];?>','<?php echo $base_url.'index.php?action=dashboard&nocss=edit-store-subcat&id='.$viewall[$row]['id'];?>')">
                      
                <input type="button" value="Delete" class='btn btn-danger btn-xs' onclick="deleteme('store','delete_subcat','<?php echo $viewall[$row]['id'];?>');">
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