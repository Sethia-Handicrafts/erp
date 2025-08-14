<div class="box box-default">
    <div class="row">
        <div class="col-md-12">
            <div class="box-body">
                <form name="contact" action="<?php echo $base_url.'index.php?action=leads&query=step_12';?>" method="post">
                    <input type="hidden" name="lid" value="<?php echo $_GET['id'];?>">
            <table class="table table-bordered" id="addmore">
                <tr>
                    <th>Contact Person Name</th>
                    <th>Contact Number</th>
                    <th></th>
                </tr>
                <tr>
                    <td><input type="text" class="form-control" name="contact_person[]" required></td>
                    <td><input type="number" class="form-control" name="contact[]" required></td>
                    <td></td>
                </tr>
            </table>
            <hr>
            <input type="button" name="add_more" value="Add More" class="btn btn-warning btn-md" id="addmore_btn">
            <input type="submit" name="submit" value="Save Details and Process to Next Step" class="btn btn-success btn-md">
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