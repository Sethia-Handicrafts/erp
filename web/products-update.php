<?php 
$detail = $product->getone($_GET['id']);
$gallery = $product->getone_gallery($_GET['id']);
// $component = $product->getone_component($_GET['id']);
// $partlist = $product->getone_partlist($_GET['id']);
?>

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
            <?php include('alert.php');?>
			  <div class="box box-default">
				
				<!-- /.box-header -->
				<div class="box-body">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs justify-content-center" role="tablist">
						<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home12" role="tab" aria-selected="true"><span><i class="fa fa-home"></i></span> <span class="hidden-xs-down ml-15">Product</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#gallery" role="tab" aria-selected="true"><span><i class="fa  fa-camera-retro"></i></span> <span class="hidden-xs-down ml-15">Gallery</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#partlist" role="tab" aria-selected="true"><span><i class="fa fa-scissors"></i></span> <span class="hidden-xs-down ml-15">Part list</span></a> </li>

					</ul>
					<!-- Tab panes -->
					<div class="tab-content tabcontent-border">
						<div class="tab-pane active" id="home12" role="tabpanel">
                            <div class="p-15">
								<h3 id="steps-uid-0-h-0" tabindex="-1" class="title current">Add New Product</h3>

        <form name="products-add" action="<?php echo $base_url.'index.php?action=product&query=products-update';?>" method="post">
            <div class="row g-3">
                <!-- First Row -->
                <div class="col-md-3">
                    <input type="hidden" name="pid" value="<?php echo $_GET['id'];?>">
                    <label class="form-label">Group Name</label>
                    <select class="form-control" name="group_name" required>
                        <option disabled="disabled" selected="selected">-Select-</option>
                        <?php 
                        $gname = $product->getall_group();
                        foreach ($gname as $key => $value) {
                            if($value['id']==$detail[0]['group_name'])
                            {$selected="selected='selected'";}
                            else
                            {$selected='';}
                            echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['group_name'].'</option>';
                        }
                        ?>
                    </select> 
                </div>
                <div class="col-md-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="productname" value="<?php echo $detail[0]['productname'];?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Product Code</label>
                    <input type="text" class="form-control" name="sku" value="<?php echo $detail[0]['sku'];?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Design Number</label>
                    <input type="text" class="form-control" name="design_nu" value="<?php echo $detail[0]['design_nu'];?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Category</label>
                    <select class="form-control" name="cat" required>
                        <option disabled="disabled" selected="selected">-Select-</option>
                        <?php 
                        $cat = $product->get_products_cat();
                        foreach ($cat as $key => $cv) {
                            if($cv['id']==$detail[0]['cat'])
                            {$selected0="selected='selected'";}
                            else
                            {$selected0='';}
                            echo '<option value="'.$cv['id'].'" '.$selected0.'>'.$cv['cat'].'</option>';
                        }
                        ?>
                    </select> 
                </div>
                
                <!-- Second Row -->
                
                
                <div class="col-md-3">
                    <label class="form-label">Width (CM)</label>
                    <input type="text" class="form-control" name="wcm" value="<?php echo $detail[0]['wcm'];?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Depth (CM)</label>
                    <input type="text" class="form-control" name="dcm" value="<?php echo $detail[0]['dcm'];?>">
                </div>
                
                <!-- Third Row -->
                <div class="col-md-3">
                    <label class="form-label">Height (CM)</label>
                    <input type="text" class="form-control" name="hcm" value="<?php echo $detail[0]['hcm'];?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Width (Inch)</label>
                    <input type="text" class="form-control" name="winch" value="<?php echo $detail[0]['winch'];?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Depth (Inch)</label>
                    <input type="text" class="form-control" name="dinch" value="<?php echo $detail[0]['dinch'];?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Height (Inch)</label>
                    <input type="text" class="form-control" name="hinch" value="<?php echo $detail[0]['hinch'];?>">
                </div>
                
                
                <div class="col-md-3">
                    <label class="form-label">Logistics</label>
                    <input type="text" class="form-control" name="logistics" value="<?php echo $detail[0]['logistics'];?>">
                </div>
                
                <!-- More Rows -->
                <div class="col-md-3">
                    <label class="form-label">CBM</label>
                    <input type="text" class="form-control" name="cbm" value="<?php echo $detail[0]['cbm'];?>">
                </div>
               
                <div class="col-md-3">
                    <label class="form-label">Description</label>
                    <input type="text" class="form-control" name="desc" value="<?php echo $detail[0]['descs'];?>">
                </div>
                
                <!-- second Last Rows -->
                <div class="col-md-3">
                    <label class="form-label">Material</label>
                    <select class="form-control" name="material_all" required>
                        <option disabled="disabled" selected="selected">-Select-</option>
                        <?php 
                        $mat = $product->get_material();
                        foreach ($mat as $key => $mv) {
                                if($mv['id']==$detail[0]['material_all'])
                                {$selected1="selected='selected'";}
                                else
                                {$selected1='';}

                            echo '<option value="'.$mv['id'].'" '.$selected1.'>'.$mv['material_name'].'</option>';
                            //-- get subcat
                            $subcat = $product->get_material_sub($mv['id']);
                            foreach ($subcat as $key => $msv) {
                                if($msv['id']==$detail[0]['material_all'])
                                {$selected2="selected='selected'";}
                                else
                                {$selected2='';}

                                echo '<option value="'.$msv['id'].'" style="background:#c96;" '.$selected2.'> -> '.$msv['material_name'].'</option>';
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

                                if($fv['id']==$detail[0]['finish_all'])
                                {$selected3="selected='selected'";}
                                else
                                {$selected3='';}

                            echo '<option value="'.$fv['id'].'" '.$selected3.'>'.$fv['finish_name'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">USD</label>
                    <input type="text" class="form-control" name="usd" value="<?php echo $detail[0]['usd'];?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tags (For catalog development)</label>
                    <input type="text" class="form-control" name="tags" value="<?php echo $detail[0]['tags'];?>">
                </div>
                

                 <!-- Last Rows -->
                 <div class="col-md-1"><br>
                    <input type="reset" name="reset" value="Reset" class="btn btn-warning btn-md">
                </div>
                <div class="col-md-1"><br>
                    <input type="submit" name="submit" value="Update" class="btn btn-secondary btn-md">
                </div>

            </div>
        </form>
   
</div>
</div>



<div class="tab-pane" id="gallery" role="tabpanel">
    <!--- gallery image-->
    <form name="gallery" action="<?php echo $base_url.'index.php?action=product&query=gallery';?>" method="post" enctype="multipart/form-data">
    <div class="row g-3">
        <div class="col-md-3">
            <input type="hidden" name="pid" value="<?php echo $_GET['id'];?>">
            <input type="hidden" name="oldpic" value="<?php echo $gallery[0]['pic'];?>">
            <input type="hidden" name="oldgallery" value="<?php echo $gallery[0]['gallery_img'];?>">

            <label class="form-label">Featured Image</label>
            <input type="file" class="form-control" name="img" >
        </div>
        <div class="col-md-3">
            <label class="form-label">Gallery Image</label>
            <input type="file" class="form-control" name="gallery_img[]" multiple="mulitple">
        </div>    
        <div class="col-md-3">
            <br><input type="submit" name="submit" value="Submit" class="btn btn-success btn-md">
        </div>
    </div>
    </form>
<hr>
    <table class="table table-bordered">
        <tr>
            <th>Image</th>
            <th>Gallery Image</th>
            <th></th>
        </tr>    
        <tr>
            <td>
                <?php if($gallery[0]['pic'] != ''){?> 
                <img src='<?php echo $base_url.'images/'.$gallery[0]['pic'];?>' width='180' height='auto'> 
                <?php } ?>
            </td>
            <td><?php $gallery = explode("," ,$gallery[0]['gallery_img']); 
                foreach($gallery as $gal)
                {
                ?>
                <img src='<?php echo $base_url.'images/'.$gal;?>' width='180' height='auto'> 
                <?php    
                }
            ?></td>
            <td></td>
        </tr>
    </table>   

</div>


<div class="tab-pane" id="partlist" role="tabpanel">

<form name="component" action="<?php echo $base_url.'index.php?action=product&query=component';?>" method="post">

<div class="row g-3" style="padding:5px;">
<div class="col-sm-2">
    <label>Part Name 1</label><input type="text" class="form-control" name="partname[]">
</div>
<div class="col-sm-2">
    <label>Material 1</label>
    <select class="form-control " multiple="" data-placeholder="Select a Material" style="width: 100%;" tabindex="-1" aria-hidden="true" name="material[]" required>
        <option disabled="disabled">-Select-</option>
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
<div class="col-sm-2">
    <label>Finish 1</label>
    <select class="form-control " multiple="" data-placeholder="Select a Finish" style="width: 100%;" tabindex="-1" aria-hidden="true" name="finish[]" required>
        <option disabled="disabled">-Select-</option>
        <?php 
        $finish = $product->get_finish();
        foreach ($finish as $key => $fv) {
            echo '<option value="'.$fv['id'].'">'.$fv['finish_name'].'</option>';
        }
        ?>
    </select>
</div>
<div class="col-sm-2">
    <label>Services 1</label>
    <input type="text" class="form-control" name="sevices[]">
</div>

</div>

<div id="addmore" style="padding:5px;"></div>
<input type="button" name="addmore" class="btn btn-info btn-xs" value="Add More Component(s)" id="btn">
<input type="submit" name="submit" class="btn btn-success btn-xs" value="Save" id="btn">
</form>
</div>


</div>


</div>
</div>
</div>

<?php 
$material_all='';
$finish_all='';

        $mat0 = $product->get_material();
        foreach ($mat0 as $key0 => $mv0) {
                $material_all.= '<option value="'.$mv0['id'].'">'.$mv0['material_name'].'</option>';
            //-- get subcat
            $subcat0 = $product->get_material_sub($mv0['id']);
            if($subcat0)
            {
                foreach ($subcat0 as $key00 => $msv0) {
                $material_all.= '<option value="'.$msv0['id'].'" style="background:#c96;"> -> '.$msv0['material_name'].'</option>';
                }
            }    
        }

        $finish0= $product->get_finish();
        foreach ($finish0 as $key1 => $fv0) {
            $finish_all.= '<option value="'.$fv0['id'].'">'.$fv0['finish_name'].'</option>';
        }
?>
        
<script type="text/javascript">
$(document).ready(function() {
var max_fields      = 50; //maximum input boxes allowed
var wrapper         =  $("#addmore"); //Fields wrapper
var add_button      =  $("#btn"); //Add button ID
var x = 1; //initlal text box count



$(add_button).click(function(e)
{ //on add input button click
    e.preventDefault();
    if(x < max_fields){ 
        x++; 
    $(wrapper).append('<div id="addmore'+x+'"  class="row g-3"><div class="col-sm-2"><label>Part Name 1</label><input type="text" class="form-control" name="partname[]"></div><div class="col-sm-2"><label>Material 1</label><select class="form-control" multiple="" data-placeholder="Select a Material" style="width: 100%;" tabindex="-1" aria-hidden="true" name="material[]" required><option disabled="disabled">-Select-</option><?php echo $material_all;?></select></div><div class="col-sm-2"><label>Finish 1</label><select class="form-control" multiple="" data-placeholder="Select a Finish" style="width: 100%;" tabindex="-1" aria-hidden="true" name="finish[]" required><option disabled="disabled">-Select-</option><?php echo $finish_all?></select></div><div class="col-sm-2"><label>Services 1</label><input type="text" class="form-control" name="sevices[]"></div><div class="col-sm-2"><input type="button" onclick=removeme("addmore'+x+'") class="btn btn-xs btn-danger" value="X"></div></div>');}
      
    
    else
    {alert("Sorry, you can add only 50 Items in this segment");}

	if(x>0)
{$('#sbtn').show();}
else
{$('#sbtn').hide();}
});



});

function removeme(x)
{
  $('#'+x).remove();   
}  
</script>