<p class="text-danger">Design and estimate will require approval from managment</p>
<?php $tempnu=rand(1000,9999);?>
<form name="step0_edit_items_client"  action="<?php echo $base_url.'index.php?action=sales&query=step0_edit_items_client'?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="sid" value="<?php echo $_GET['id'];?>">
<div class="row">
  
  <div class="col-md-3">  
      <div class="form-group">
            <label>Item Type 1</label>
            <select name="item_type[]" class="form-control">
              <option disabled="disabled" selected="selected">-Select</option>
              <option value="4">Product To Be Prototype (Client's Design)</option>
              <option value="5">Product To Be Designed & Prototyped As Per Client's Intent</option>
              <option value="6">Product To Be Ordered As Per Client Design</option>
          </select>
      </div>
  </div>

  <div class="col-md-4">
      <div class="form-group">
          <label for="sku_item_code">Temp. SKU 1:</label>
          <input type="text" class="form-control" value="<?php echo "Temp-SKU-".$tempnu;?>" name="tempsku[]" readonly="readonly">
        </div>
    </div>

  <div class="col-md-3">
    <div class="form-group">
      <label for="product_name">Attachment(s)</label>
      <input type="file" name="file[]" class="form-control">
    </div>
  </div>


</div>


<div id="addmore0"></div>

  <input type="button" name="btn"  class="btn btn-xs btn-secondary" value="Add More Items" id="btn0">
  <input type="submit" name="btn"  class="btn btn-md btn-primary" value="Update">
</form>

  

<script type="text/javascript">

$(document).ready(function() {

var max_fields      = 50; //maximum input boxes allowed
var wrapper         =  $("#addmore0"); //Fields wrapper
var add_button      =  $("#btn0"); //Add button ID
var x = 1; //initlal text box count
var temp = <?php echo $tempnu;?>;



$(add_button).click(function(e)
{ //on add input button click
    e.preventDefault();
    if(x < max_fields){ 
        x++; 
        temp++;

    $(wrapper).append('<div id="addmore0'+x+'" class="row"><div class="col-md-3"><div class="form-group"><label>Item Type '+x+' </label><select name="item_type[]" class="form-control"><option disabled="disabled" selected="selected">-Select</option> <option value="4">Product To Be Prototype (Client Design)</option><option value="5">Product To Be Designed & Prototyped As Per Client Intent</option><option value="6">Product To Be Ordered As Per Client Design</option></select></div></div><div class="col-md-4"><div class="form-group"><label for="sku_item_code">Temp SKU '+x+':</label> <input type="text" class="form-control" name="tempsku[]" value="Temp-SKU-'+temp+'" readonly="readonly"></div></div><div class="col-md-4"><div class="form-group"><label for="product_name">Attachment '+x+':</label> <input type="file" name="file[]" class="form-control"></div></div><div><br><i onclick="removeme('+x+')" class="btn btn-danger btn-sm ti ti-trash"></i></div></div>'); 

    

}
      
    
    else
    {alert("Sorry, you can add only 50 Items in this segment");}

});



});
</script>	 
<script>

function removeme(x)
{
  $('#addmore0'+x).remove();
  x--;
}  
</script>	    