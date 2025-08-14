<style>
    .custom_width{width:60px;}
</style>
<?php


$material='';
$mtype=$product->get_material_unique();

    foreach($mtype as $w=>$v)
    {
        $material.= '<option>'.strtoupper($mtype[$w]['material_type']).'</option>';
    }    
    
?>
<!--- form starts--->
                    <span id="msgform<?php echo $_GET['pid'];?>"></span>

                    <form name="form<?php echo $_GET['pid'];?>" id="form<?php echo $_GET['pid'];?>" action="<?php echo $base_url.'index.php?action=sales&query=rfq_step05_edit_material';?>" method="post">

                    <input type="hidden"  name="pid" value="<?php echo $_GET['pid']; ?>"/>
                    <input type="hidden"  name="sid" value="<?php echo $_GET['sid'];?>"/>

                    <table class="table table-bordered" id="table<?php echo $_GET['pid'];?>">
                        <tr>
                            <th>Services</th>
                            <!-- <th>Material</th>
                            <th>Material Type</th>
                            <th>Finish</th>
                            <th>Length</th>
                            <th>Width</th> -->
                            <th>Remark</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>
                                <select class="form-control" name="capability[]">
                                    <option>-Select-</option>
                                    <?php 
                                        $cap=$product->get_capability();
                                        foreach($cap as $r=>$v){?>  
                                        <option value="<?php echo $cap[$r]['id'];?>" ><?php echo $cap[$r]['capability'];?></option>
                                        <?php }?>
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="remark[]" value="">
                            </td>
                            
                        </tr>

                        
                        <!-- check list id available-->
                         
                    </table> 
<hr>
                    <input type="button" class="btn btn-xs btn-warning" name="btn" value="Add More" class="add_btn" id="addmore_btn<?php echo $_GET['pid'];?>" />
                    <input type="button" onclick="form_submit('form<?php echo $_GET['pid'];?>')" class="btn btn-xs btn-info" value="Save">
                    </form>
                    <!-- form ends--->

      
                    <?php 
                    $caps='';
                    $cap=$product->get_capability();
                    foreach($cap as $r=>$v){
                        $caps .= '<option value="'.$cap[$r]['id'].'">'.$cap[$r]['capability'].'</option>';
                    }?>
<script type="text/javascript">

$(document).ready(function() {
    
var max_fields      = 50; //maximum input boxes allowed
var wrapper         =  $("#table<?php echo $_GET['pid'];?>"); //Fields wrapper
var add_button      =  $("#addmore_btn<?php echo $_GET['pid'];?>"); //Add button ID
var x = 1; //initlal text box count
    

$(add_button).click(function(e)
{ //on add input button click
    e.preventDefault();
    if(x < max_fields){ 
        x++; 
        $(wrapper).append('<tr id="addmore_services'+x+'"><td><select class="form-control" name="capability[]"><option>-Select-</option></option><?php echo $caps;?></select></td><td><input type="text" class="form-control" name="remark[]" value=""></td><td><i class="fa fa-trash" onclick="removeme('+x+')"></td></tr>'); 
        }
    else
    {alert("Sorry, you can add only 50 Items in this segment");}

});



});


function removeme(x)
{
  //alert(x);
  $('#addmore_services'+x).remove();
    //get_subtotal(x);
}  
</script>