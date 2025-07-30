<div class="content-wrapper">
	  <div class="container-full">
    	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Product Viewall</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item">Inventory</li>
								<li class="breadcrumb-item" >Product(s)</li>
                                <li class="breadcrumb-item active" aria-current="page">Viewall</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

        <div class="col-12">
			  <div class="box box-default">
				
				<!-- /.box-header -->
				<div class="box-body">

					<div class="table-responsive">
					  <table id="example" class="table table-bordered table-responsive table-hover display wrap ">
						<thead>
							<tr>
								<th>#</th>
								<th>Sku</th>
								<th>Product Name</th>
								<th>Group</th>
								<th>Dimension (CM) (WxDxH)</th>
								
								<th>Price</th>
								<th>Material</th>
								<th>Finish</th>
								<th>Utility</th>
							</tr>
						</thead>
						<tbody>
                            <?php 
                            $counter=1;
                            $all = $product->getall();
                            foreach($all as $r=>$v)
                            {
								//-- get material
								$material = $product->get_material_byid($all[$r]['material_all']);
								$finish = $product->get_finish_byid($all[$r]['finish_all']);
                            ?>  
                                <tr>
                                    <th><?php echo $counter++;?></th>
                                    <td><?php echo $all[$r]['sku'];?></td>
                                    <td><?php echo $all[$r]['productname'];?></td>
                                    <td><?php echo $all[$r]['group_name'];?></td>
                                    <td><?php echo $all[$r]['wcm'].' x '.$all[$r]['dcm'].' x '.$all[$r]['hcm'];?></td>
                                    <td><?php echo $all[$r]['usd'];?></td>
                                    <td><?php echo $material[0]['material_name'];?></td>
                                    <td><?php echo $finish[0]['finish_name'];?></td>
                                    <td>
                                        <i class='fa fa-eye btn btn-xs btn-info'></i>
                                        
										<a href="<?php echo $base_url.'index.php?action=dashboard&page=products-update&id='.$all[$r]['id'];?>"><i class='fa fa-pencil btn btn-xs btn-warning'></i></a>

                                        <i class='fa fa-trash btn btn-xs btn-danger' onclick="deleteme()"></i>
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