<div class="content-wrapper">
	  <div class="container-full">
    	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Catalogue Development</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item">Inventory</li>
								<li class="breadcrumb-item" >Request For</li>
                                <li class="breadcrumb-item active" aria-current="page">Catalogue</li>
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
			    	<h3 id="steps-uid-0-h-0" tabindex="-1" class="title current">Add New Catalogue</h3>


                        <form action="" name="catalog" method="post">
                            <div class="row g-3">
                                <!-- First Row -->
                                <div class="col-md-3">
                                    <label class="form-label">Catalogue Tags</label>
                                    <input type="text" class="form-control" name="tags">
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
<div class="col-12" >
			  <div class="box box-default">
				
				<!-- /.box-header -->
				<div class="box-body">
					<!-- Nav tabs -->
			    	<h3 id="steps-uid-0-h-0" tabindex="-1" class="title current">Search Result</h3>
                </div>


                
                <div class="table-responsive" style="padding:5px;">
                <a href="#" type="button" class='btn btn-info' name="pdf"  type="button" onclick="htmlget('pdfdown','<?php echo 'SHPL-RFQ-'.$_GET['id'];?>')" value="get html"><i class="fa fa-file-pdf"></i> Download PDF</a>
                <div id="editor"></div>

                <hr>
                <?php  if(isset($_POST['submit']))
                            {?>
                <div id="pdfdown">
					  <table class="table table-bordered" style="width:100%">
						<thead>
                            <tr>
                                <td colspan="3">
                                <?php
                                    $path = $base_url.'/images/'.$_SESSION['logo'];
                                    $type = pathinfo($path, PATHINFO_EXTENSION);
                                    $data = file_get_contents($path);
                                    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                                    ?>
                                    <img src="<?php echo $base64?>" width="auto" height="90"/> 
                                </td>
                                <td colspan="2">
                                    <h3 style="text-align:center;">Catalogue : <?php echo $_POST['tags'];?></h3>    
                                    <h4 style="text-align:center;">Created By : <?php echo $_SESSION['person_name'];?></h4>
                                    <p style="text-align:center;">Created On: <?php echo date('d-m-Y');?></p>
                                </td>
                            </tr>
							<tr>
								<th>#</th>
								<th>Product Name</th>
								<th>Material</th>
                                <th>Finish</th>
								<th>Dimension</th>
							</tr>
						</thead>
						<tbody>
                            <?php 
                           
                                $counter=1;
                                $catalogue = $product->get_catalogue($_POST['tags']);
                                foreach($catalogue as $r=>$v)
                                {
                                ?>  
                                    <tr>
                                        <td><?php echo $counter++;?></td>
                                        <td><?php echo $catalogue[$r]['productname'];?></td>
                                        <td><?php echo $catalogue[$r]['material_all'];?></td>
                                        <td><?php echo $catalogue[$r]['finish_all'];?></td>
                                        <td><?php echo $catalogue[$r]['dcm'].' x '.$catalogue[$r]['wcm'].' x '.$catalogue[$r]['hcm'] ;?></td>
                                    </tr>
                                <?php }
                            } else {?>
                                <tr><td colspan="5">Click Submit To Create Catalogue</td></tr>
                               
                        </tbody>
                        </table> 
                        </div>
                        <?php }?> 
                    </div>
</div>
</div>              


</div>
</div>
</div>
</div>