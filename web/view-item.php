<div class="content-wrapper">
	  <div class="container-full">
    	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title"><?php if(isset($_GET['edit'])){ echo "Edit";}else{echo "Add";}?> Store Item</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item">Store</li>
								<li class="breadcrumb-item" >Item</li>
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

					
				
                    <form name="product" action="" method="post">
                   	
                       <!-- row 1-->
                         <div class="form-group row">
                           
                           <div class="col-sm-3">
                           <label class="col-form-label">Item Name <span class="mendetory">*</span></label>
                             <input type="text" value="" class="form-control form-control-sm" name="product_name"  >
                           </div>
                           
                           <div class="col-sm-3">
                           <label class="col-form-label">HSN Code <span class="mendetory">*</span></label>
                             <input type="text" value="" class="form-control form-control-sm" name="hsn_code"  >
                           </div>
  
                           <div class="col-sm-3">
                           <label class="col-form-label">Category <span class="mendetory">*</span></label>
                             <select class="form-control form-control-sm" name="cat" onchange="get_subcat('subcat',this.value,'store')"  >
                              <option disabled='disabled' selected='selected'>-Select-</option>
                              <?php 
                              $cat=$store->get_cat();
                              foreach($cat as $k=>$value)
                              {
                                echo "<option value='".$cat[$k]['id']."'>".$cat[$k]['cat']."</option>";
                              }
                              ?>  
                            
                            </select>
                           </div>
  
                           <div class="col-sm-3">
                           <label class="col-form-label">Sub Category <span class="mendetory">*</span></label>
                           <select class="form-control form-control-sm" id="subcat" name="subcat" >
                              
                            </select>
                           </div>
  
                      
  
                           <div class="col-sm-2"><br>                           
                           <a href="#" onclick="$(this).closest('form').submit();" class="btn btn-danger">Submit</a>
                           </div>
                        </div>
                             
                    </form>
                </div>



                <div class="col-sm-12">
                <span id="delete_msg"></span>

<?php 
  if(isset($_POST['cat']))
  {
    $linksArray = array_filter($_POST);
    $sql0=array();
    foreach($linksArray as $k => $value)
    {
      $sql0[]= $k." = '".$linksArray[$k]."'";
    }
    $sql1=implode(" AND ",$sql0);
    $store_search = $store->search_item($sql1);
    
    echo "<table class='table table-bordered'>";
        echo "<tr>";
          echo "<th>S.No.</th>";
          echo "<th>Image</th>";
          echo "<th>Name</th>";
          echo "<th>HSN Code</th>";
          echo "<th>Category</th>";
          echo "<th>Sub Category</th>";
          echo "<th>Utility</th>";
        echo "<tr>";

    if(COUNT($store_search)>0)
    {
      $search=$store_search;
      $counter=1;
      
      foreach($search as $k => $value)
      {
        //-cat
        $cat=$store->get_cat_single($search[$k]['cat']);
        //-cat
        $subcat=$store->get_subcat_single($search[$k]['subcat']);
        echo "<tr id='".$search[$k]['id']."'>";
          echo "<th>".$counter++."</th>";
          echo "<td><img src='".$base_url.'images/'.$search[$k]['image']."' height='40' width='auto'></td>";
          echo "<td>".$search[$k]['product_name']."</td>";
          echo "<td>".$search[$k]['hsn_code']."</td>";
          echo "<td>".$cat[0]['cat']."</td>";
          echo "<td>".$subcat[0]['subcat']."</td>";
          ?><td>
            <input type="button" value="Edit" class='btn btn-warning' data-toggle="modal" data-target="#exampleModal" onclick="show_page_model('Edit <?php echo $search[$k]['product_name'];?>','<?php echo $base_url.'index.php?action=dashboard&nocss=edit-store-item&id='.$search[$k]['id'];?>')">
            
            <input type="button" value="Delete" class='btn btn-danger btn-xs' onclick="deleteme('store','delete_item','<?php echo $search[$k]['id'];?>');"></td>
          <?php
        echo "<tr>";
      }
      
    }
    else
    {
      echo "<tr><td colspan='5'>No Data Found</td></tr>";
    }
    echo "</table>";
  }
?>
                </div>
        </div>

   


</div>
</div>
</div>
</div>