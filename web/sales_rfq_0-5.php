<?php 
//$view=$sales->get_rfq_one($_GET['id']);
?>
<h6 class="text-secondary">Step 0.5</h6>
<h3 class="text-dark">Add / Remove Item(s)</h3>
<hr>
<span id="msgstep0_edit"></span>
<form name="step0_edit" id="step0_edit" action="<?php echo $base_url.'index.php?action=sales&query=rfq_item_edit'?>" method="post">
  <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
<!--- client details ------>
<div class="row">

  <div class="col-md-3">
    <div class="form-group">
      <label for="prospect_client_name">Prospect / Client Name:</label>
      <select class="form-control" name="prospect">
        <option disabled="disabled" selected="selected">-Select-</option>
        <?php $viewall=$sales->view_all_beneficiery(0);
        foreach($viewall as $r=>$v){
            if($view[0]['prospect']==$viewall[$r]['id'])
            {$selection = "selected='selected'";}
            else
            {$selection = "";}
            ?>
        <option value="<?php echo $viewall[$r]['id'];?>" <?php echo $selection;?>><?php echo $viewall[$r]['fname'].' '.$viewall[$r]['lname'].' ('.$viewall[$r]['cname'].')';?></option>
        <?php }?>
      </select>
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group">
      <label for="rfq_number">RFQ Number (Client):</label>
      <input type="text" class="form-control" id="rfq_number" name="rfq_number" value="<?php echo $view[0]['rfq_number'];?>">
    </div>
  </div>

  <div class="col-md-2">
    <div class="form-group">
      <label for="date_of_rfq">Date Of RFQ:</label>
      <input type="date" class="form-control" id="date_of_rfq" name="date_of_rfq" value="<?php echo $view[0]['date_of_rfq'];?>" readonly="readonly">
    </div>
  </div>

  <div class="col-md-2">
    <div class="form-group">
      <label for="created_by">Client Target Date:</label>
      <input type="date" class="form-control" id="created_date" value="<?php echo $view[0]['created_date'];?>" name="created_date">
    </div>
  </div>

  <div class="col-md-2">
    <div class="form-group">
      <label for="created_by">Currency:</label>
      <?php $currency=$sales->get_prospect_tandc($view[0]['prospect']);?>
      <input type="text" class="form-control" value="<?php echo $currency[0]['currency'];?>" name="currency" readonly="readonly">
    </div>
  </div>


</div>
<!--- product details ------>
<?php $items=$sales->sales_rfq_items($_GET['id']);
if($items){
$item_count = count($items);
$counter=1;
foreach($items as $row=>$v){
?>
<div class="row" id="<?php echo $items[$row]['id'];?>">
  
  <div class="col-md-3">  
      <div class="form-group">
            <label>Item Type <?php echo $counter;?></label>
            <input type="hidden" name="itemid[]" value="<?php echo $items[$row]['id'];?>">
            <select name="item_type[]" class="form-control">
              <option disabled="disabled" selected="selected">-Select</option>
              <option value="1" <?php if($items[$row]['item_type']=='1'){echo "selected='selected'";}?>>Standard Product</option>
              <option value="2" <?php if($items[$row]['item_type']=='2'){echo "selected='selected'";}?>>Standard Product With Customization (eg: wood / fitting /finish)</option>
              <!-- <option value="3" <?php if($items[$row]['item_type']=='3'){echo "selected='selected'";}?>>Standard Product With Size & Design Customization</option> -->
              <option value="4" <?php if($items[$row]['item_type']=='4'){echo "selected='selected'";}?>>Product To Be Prototype (Client's Design)</option>
              <option value="5" <?php if($items[$row]['item_type']=='5'){echo "selected='selected'";}?>>Product To Be Designed & Prototyped As Per Client's Intent</option>
              <option value="6" <?php if($items[$row]['item_type']=='6'){echo "selected='selected'";}?>>Product To Be Ordered As Per Client Design</option>
          </select>
      </div>
  </div>

  <div class="col-md-2">
      
      <div class="form-group">
          <label for="sku_item_code">SKU <?php echo $counter;?>:</label>
          
          <?php 
          $itemtype=$items[$row]['item_type'];
          ?>
          <select class="form-control select2" name="sku[]" id="sku" onchange="get_details('sku','<?php echo $base_url.'index.php?action=product&query=get_details';?>','product_details')">
            <option disabled="disabled" selected="selected">-Select-</option>
            <?php 
            $sku=$product->getall();
            foreach($sku as $s=>$v){
            
                if($items[$row]['pid']==$sku[$s]['id'])
                {$selection = "selected='selected'";}
                else
                {$selection = "";}
            ?>
            <option value="<?php echo $sku[$s]['id'];?>" <?php echo $selection;?>><?php echo $sku[$s]['sku'].' / '.$sku[$s]['productname'];?></option>
            <?php }?>
          </select>
          
          
        </div>
    </div>

  <div class="col-md-5">
    <div class="form-group">
      <label for="product_name">Product Details <?php echo $counter;?>:</label><br>
      <!--- shpl items ---->
      <?php if($items[$row]['item_type']=='1' || $items[$row]['item_type']=='2'){
        $details = $product->getone($items[$row]['pid']);
          echo "<table border='1' style='font-size:11px;'><tr><th>Name</th><td>".$details[0]['productname']."</td></tr>";					
					echo "<tr><th>Dimension</th><td>".$details[0]['wcm'].' x '.$details[0]['dcm'].' x '.$details[0]['hcm'].' (CM) <br>';
					echo $details[0]['winch'].' x '.$details[0]['dinch'].' x '.$details[0]['hinch'].' (INCH)</td></tr>';
					echo "<tr><th>Finish</th><td>".$details[0]['finish_all']."</td></tr><tr><th>Material</th><td>".$details[0]['material_all']."</td></tr>";
				  echo "</table>";
      }
      ?>
      <!---- custom details ---->
      <?php if($items[$row]['item_type']=='4' || $items[$row]['item_type']=='5' || $items[$row]['item_type']=='6'){
        if($items[$row]['file']){
        ?>
        <a href="#"  data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-secondary" onclick="show_page_model('View Client Design','<?php echo $base_url.'index.php?action=leads&query=fileviewer&file='.$items[$row]['file'];?>')">Attachment</a>
      <?php }else{echo "<b>No Attachment(s)</b>";} }else{?>  
      <span id="product_details"></span>
      <?php }?>
    </div>
  </div>

  <div class="col-md-2"><br>
    <i class="btn btn-danger btn-sm fa fa-trash" onclick="deleteme('sales','delete_rfq_item','<?php echo $items[$row]['id'];?>')"></i>
  </div>  
  


</div>
<?php $counter++; } } else {echo "<div class='alert alert-danger'>No Items Found</div>"; }?>

<div id="addmore"></div>

  <input type="button" name="btn"  class="btn btn-xs btn-secondary" value="Add Item From SHPL Catalogue" id="btn">

  <input type="button" name="btn"  class="btn btn-xs btn-warning" value="Client Design" id="btn"  data-toggle="modal" data-target="#exampleModal" onclick="show_page_model('Add Client Design','<?php echo $base_url.'index.php?action=dashboard&nocss=sales_rfq_0-5_item-custom&sid='.$_GET['id'];?>')">

  <input type="button" onclick="form_submit('step0_edit')" name="Update" value="Update" class="btn btn-primary" id="submit_btn">

</form>





<?php $sku0=$product->getall();  ?>

<script type="text/javascript">

$(document).ready(function() {

var max_fields      = 50; //maximum input boxes allowed
var wrapper         =  $("#addmore"); //Fields wrapper
var add_button      =  $("#btn"); //Add button ID
var x = <?php echo $item_count;?>; //initlal text box count



$(add_button).click(function(e)
{ //on add input button click
    e.preventDefault();
    if(x < max_fields){ 
        x++; 
        $(wrapper).append('<div id="addmore'+x+'" class="row"><div class="col-md-3"><div class="form-group"><label>Item Type '+x+' </label><select name="item_type[]" class="form-control"><option disabled="disabled" selected="selected">-Select</option><option value="1">Standard Product</option><option value="2">Standard Product With Customization (eg: wood / fitting /finish)</option></select></div></div><div class="col-md-2"><div class="form-group"><label for="sku_item_code">Product Code '+x+':</label><select class="form-control select2 sku_details" name="sku[]" id="sku'+x+'"><option disabled="disabled" selected="selected">-Select-</option><?php foreach($sku0 as $s0=>$v){?><option value="<?php echo $sku0[$s0]['id'];?>"><?php echo $sku0[$s0]['sku'].' / '.$sku0[$s0]['productname'];?></option><?php }?></select></div></div><div class="col-md-4"><div class="form-group"><label for="product_name">Product Details '+x+':</label><br><span id="product_details'+x+'"></span></div></div><div><br><i onclick="removeme('+x+')" class="btn btn-danger btn-sm ti ti-trash remove"></i></div></div>');  

    if(x<2)
      {$("#submit_btn").hide();}
      else
      {$("#submit_btn").show();}

      $('.select2').select2();

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
  var pid = id.slice(3);
  $('#product_details'+pid).html('Loading.... Please Wait !!!');
  get_details(id,'<?php echo $base_url.'index.php?action=product&query=get_details';?>','product_details'+pid);  
 });
</script>