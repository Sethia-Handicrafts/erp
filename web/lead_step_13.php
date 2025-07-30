<div class="box box-default">
    <div class="row">
        <div class="col-md-12">
            <div class="box-body">
            <form name="contact" action="<?php echo $base_url.'index.php?action=leads&query=step_12_update';?>" method="post">
            <input type="hidden" name="lid" value="<?php echo $_GET['id'];?>">
                <table class="table table-bordered" >
                    <tr>
                        <th>Contact Person Name</th>
                        <th>Contact Number</th>
                        <th>Decision Maker ??</th>
                    </tr>
                    <?php 
                        $get_details_comp = $leads->get_company_more_details('12',$_GET['id']);
                        foreach ($get_details_comp as $key => $value) {
                    ?>
                    <tr>
                        <td><?php echo $get_details_comp[$key]['value1'];?></td>
                        <td><?php echo $get_details_comp[$key]['value2'];?></td>
                        <td>
                        <input type="hidden" name="id[]" value="<?php echo $get_details_comp[$key]['id'];?>">
                            
                        <select name="value3[]" class="form-control">
                        <option value="">Select</option>
                                <option value="1" <?php if($get_details_comp[$key]['value3']=='1'){echo "selected='selected'"; }?>>Yes</option>
                                <option value="0" <?php if($get_details_comp[$key]['value3']=='0'){echo "selected='selected'"; }?>>No</option>
                            </select>  
                        </td>    
                    </tr>

                    <?PHP }?>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Update" class='btn btn-primary btn-md'>
                        </td>
                    </tr>
                </table>
            </form>



            <form name="contact" action="<?php echo $base_url.'index.php?action=leads&query=step_12';?>" method="post">
                <input type="hidden" name="lid" value="<?php echo $_GET['id'];?>">
                    <table class="table table-bordered" id="addmore"></table>
                 <table class="table" >
                    <tr>
                        <td>
                        <input type="button" name="add_more" value="Add More" class="btn btn-warning btn-md" id="addmore_btn">
                        <input type="submit" name="submit" value="Save Details" class="btn btn-success btn-md">
                        </td>
                    </tr>
                 </table>
            </form>


            <table class="table">
            <tr>
                    <td>
                        <form name="step14" action="<?php echo $base_url.'index.php?action=leads&query=step_14';?>" method="post">
                            <input type="hidden" name="lid" value="<?php echo $_GET['id'];?>">                            
                            <input type="submit" name="submit" value="Go to step 14" class="btn btn-info btn-md">
                        </form>
                    </td>
                </tr>
            </table>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

$(document).ready(function() {

var max_fields      = 50; //maximum input boxes allowed
var wrapper         =  $("#addmore"); //Fields wrapper
var add_button      =  $("#addmore_btn"); //Add button ID
var x = 1; //initlal text box count
        

$(add_button).click(function(e)
{ //on add input button click
    e.preventDefault();
    if(x < max_fields){ 
        x++; 
		
    $(wrapper).append('<tr id="addmore_tr'+x+'"><td><input type="text" class="form-control" name="contact_person[]"></td><td><input type="number" class="form-control" name="contact[]"></td><td><i class="fa fa-trash btn btn-danger btn-xs" onclick="removeme('+x+')"></i></td></tr>'); 

        
        }
      
    
    else
    {alert("Sorry, you can add only 50 Items in this segment");}

});



});


function removeme(x)
{
  //alert(x);
  $('#addmore_tr'+x).remove();
    //get_subtotal(x);
}  
</script>