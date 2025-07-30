<span id="msgstep0"></span>
<form name="step0" id="step0" action="<?php echo $base_url.'index.php?action=sales&query=rfq_additem'?>" method="post">
<!--- client details ------>
<div class="row">

  <div class="col-md-3">
    <div class="form-group">
      <label for="prospect_client_name">Prospect / Client Name:</label>
      <select class="form-control" name="prospect">
        <option disabled="disabled" selected="selected">-Select-</option>
        <?php $viewall=$sales->view_all_beneficiery(0);
        foreach($viewall as $r=>$v){?>
        <option value="<?php echo $viewall[$r]['id'];?>"><?php echo $viewall[$r]['fname'].' '.$viewall[$r]['lname'].' ('.$viewall[$r]['cname'].')';?></option>
        <?php }?>
      </select>
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group">
      <label for="rfq_number">RFQ Number (Client):</label>
      <input type="text" class="form-control" id="rfq_number" name="rfq_number" required>
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group">
      <label for="date_of_rfq">Date Of RFQ (Client):</label>
      <input type="date" class="form-control" id="date_of_rfq" name="date_of_rfq" value="<?php echo date('Y-m-d');?>" required>
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group">
      <label for="created_by">Client Target Date:</label>
      <input type="date" class="form-control" id="created_date" name="created_date" required>
    </div>
  </div>


</div>
<!--- product details ------>
<!-- <div class="row">
  
  <div class="col-md-3">  
      <div class="form-group">
            <label>Item Type 1</label>
            <select name="item_type[]" class="form-control">
              <option disabled="disabled" selected="selected">-Select</option>
              <option value="1">Standard Product</option>
              <option value="2">Standard Product With Customization (eg: wood / fitting /finish)</option>
              <option value="3">Standard Product With Size & Design Customization</option>
          </select>
      </div>
  </div>

  <div class="col-md-2">
      
      <div class="form-group">
          <label for="sku_item_code">SKU 1:</label>
          
          <select class="form-control select2" name="sku[]" id="sku" onchange="get_details('sku','<?php echo $base_url.'index.php?action=product&query=get_details';?>','product_details')">
            <option disabled="disabled" selected="selected">-Select-</option>
            <?php 
            $sku=$product->getall();
            foreach($sku as $s=>$v){
            ?>
            <option value="<?php echo $sku[$s]['id'];?>"><?php echo $sku[$s]['sku'];?></option>
            <?php }?>
          </select>
        </div>
    </div>

  <div class="col-md-6">
    <div class="form-group">
      <label for="product_name">Product Details 1:</label>
      <span id="product_details"></span>
    </div>
  </div>
  


</div> -->

<div id="addmore"></div>

<input type="button" name="btn"  class="btn btn-xs btn-secondary" value="Add Item From SHPL Catalogue" id="btn">

<!-- <input type="button" name="btn"  class="btn btn-xs btn-primary" value="Client Design" id="btn"  data-toggle="modal" data-target="#modal-fill" onclick="show_page_model_fill('Add Client Design','<?php echo $base_url.'index.php?action=dashboard&nocss=sales_add_client_item';?>')"> -->

<input type="submit" name="submit" value="Save & Process" class="btn btn-success" id="submit_btn">


</form>





<?php 

?>

<script type="text/javascript">

$(document).ready(function() {

var max_fields      = 50; //maximum input boxes allowed
var wrapper         =  $("#addmore"); //Fields wrapper
var add_button      =  $("#btn"); //Add button ID
var remove_button   =  $(".remove"); //Add button ID
var x = 0; //initlal text box count



$(add_button).click(function(e)
{ //on add input button click
    e.preventDefault();
    if(x < max_fields){ 
        x++; 
       
    $(wrapper).append('<div id="addmore'+x+'" class="row"><div class="col-md-3"><div class="form-group"><label>Item Type '+x+' </label><select name="item_type[]" class="form-control"><option disabled="disabled" selected="selected">-Select</option><option value="1">Standard Product</option><option value="2">Standard Product With Customization (eg: wood / fitting /finish)</option></select></div></div><div class="col-md-2"><div class="form-group"><label for="sku_item_code">Product Code '+x+':</label><select class="form-control select2 sku_details" name="sku[]" id="sku'+x+'"><option disabled="disabled" selected="selected">-Select-</option><?php echo $skus;?></select></div></div><div class="col-md-4"><div class="form-group"><label for="product_name">Product Details '+x+':</label><br><span id="product_details'+x+'"></span></div></div><div><br><i onclick="removeme('+x+')" class="btn btn-danger btn-sm ti ti-trash remove"></i></div></div>'); 

    if(x<1)
      {$("#submit_btn").hide();}
    else
      {$("#submit_btn").show();}

      $('.select2').select2();

      populate_dropdown('sku'+x+'','<?php echo $base_url.'index.php?action=product&query=get_sku_dropdown';?>');

}
      
    
    else
    {alert("Sorry, you can add only 50 Items in this segment");}

});



});
</script>	 
<script>

function removeme(x)
{
  $('#addmore'+x).remove();
  x--;
}  
</script>	    


<script type="text/javascript">
$(document).on('change', '.sku_details',function(){
  var id = $(this).attr('id');
  alert('called');
  var pid = id.slice(3);
  $('#product_details'+pid).html('Loading.... Please Wait !!!');
  get_details(id,'<?php echo $base_url.'index.php?action=product&query=get_details';?>','product_details'+pid);  
 });
</script>