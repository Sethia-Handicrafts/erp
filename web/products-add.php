<div class="content-wrapper">
	  <div class="container-full">
    	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Product Registration</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item">Inventory</li>
								<li class="breadcrumb-item" >Request For</li>
                                <li class="breadcrumb-item active" aria-current="page">Product</li>
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
					<ul class="nav nav-tabs justify-content-center" role="tablist">
						<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home12" role="tab" aria-selected="true"><span><i class="ion-home"></i></span> <span class="hidden-xs-down ml-15">Product</span></a> </li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content tabcontent-border">
						<div class="tab-pane active" id="home12" role="tabpanel">
                            <div class="p-15">
								<h3 id="steps-uid-0-h-0" tabindex="-1" class="title current">Add New Product</h3>

        <form name="products-add" action="<?php echo $base_url.'index.php?action=product&query=products-add';?>" method="post">
            <div class="row g-3">
                <!-- First Row -->
                <div class="col-md-3">
                    <label class="form-label">Group Name</label>
                    <select class="form-control" name="group_name" required>
                        <option disabled="disabled" selected="selected">-Select-</option>
                        <?php 
                        $gname = $product->getall_group();
                        foreach ($gname as $key => $value) {
                            echo '<option value="'.$value['id'].'">'.$value['group_name'].'</option>';
                        }
                        ?>
                    </select> 
                </div>
                <div class="col-md-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="productname">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Product Code</label>
                    <input type="text" class="form-control" name="sku">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Design Number</label>
                    <input type="text" class="form-control" name="design_nu">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Category</label>
                    <select class="form-control" name="cat" required>
                        <option disabled="disabled" selected="selected">-Select-</option>
                        <?php 
                        $cat = $product->get_products_cat();
                        foreach ($cat as $key => $cv) {
                            echo '<option value="'.$cv['id'].'">'.$cv['cat'].'</option>';
                        }
                        ?>
                    </select> 
                </div>
                
                <!-- Second Row -->
                
                
                <div class="col-md-3">
                    <label class="form-label">Width (CM)</label>
                    <input type="text" class="form-control" name="wcm">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Depth (CM)</label>
                    <input type="text" class="form-control" name="dcm">
                </div>
                
                <!-- Third Row -->
                <div class="col-md-3">
                    <label class="form-label">Height (CM)</label>
                    <input type="text" class="form-control" name="hcm">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Width (Inch)</label>
                    <input type="text" class="form-control" name="winch">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Depth (Inch)</label>
                    <input type="text" class="form-control" name="dinch">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Height (Inch)</label>
                    <input type="text" class="form-control" name="hinch">
                </div>
                
                
                <div class="col-md-3">
                    <label class="form-label">Logistics</label>
                    <input type="text" class="form-control" name="logistics">
                </div>
                
                <!-- More Rows -->
                <div class="col-md-3">
                    <label class="form-label">CBM</label>
                    <input type="text" class="form-control" name="cbm">
                </div>
               
                <div class="col-md-3">
                    <label class="form-label">Description</label>
                    <input type="text" class="form-control" name="desc">
                </div>
                
                <!-- second Last Rows -->
                <div class="col-md-3">
                    <label class="form-label">Material</label>
                    <select class="form-control" name="material_all" required>
                        <option disabled="disabled" selected="selected">-Select-</option>
                        <?php 
                        $mat = $product->get_material();
                        foreach ($mat as $key => $mv) {
                            echo '<option value="'.$mv['id'].'">'.$mv['material_name'].'</option>';
                            //-- get subcat
                            $subcat = $product->get_material_sub($mv['id']);
                            foreach ($subcat as $key => $msv) {
                                echo '<option value="'.$msv['id'].'" style="background:#c96;"> -> '.$msv['material_name'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Finish</label>
                    <select class="form-control" name="finish_all" required>
                        <option disabled="disabled" selected="selected">-Select-</option>
                        <?php 
                        $finish = $product->get_finish();
                        foreach ($finish as $key => $fv) {
                            echo '<option value="'.$fv['id'].'">'.$fv['finish_name'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">USD</label>
                    <input type="text" class="form-control" name="usd">
                </div>
                
                <div class="col-md-6">
                    <label class="form-label">Tags (For catalog development)</label>
                    <input type="text" class="form-control" name="tags" value="">
                </div>

                 <!-- Last Rows -->
                 <div class="col-md-1"><br>
                    <input type="reset" name="reset" value="Reset" class="btn btn-warning btn-md">
                </div>
                <div class="col-md-1"><br>
                    <input type="submit" name="submit" value="Submit" class="btn btn-success btn-md">
                </div>

            </div>
        </form>
   
</div>
</div>
</div>


</div>
</div>
</div>