<?php 
if($view[0]['prospect_status']=='3')
{echo "<div class='alert alert-secondary'>Approval request has Been Send... You can process when approval receive.</div>";
echo "<script>$('#next_step').hide();</script>";
}

if($view[0]['prospect_status']=='0'){
echo "<script>$('#next_step').hide();</script>";
}

//--- reject
if($view[0]['prospect_status']=='2')
{echo "<div class='alert alert-danger'>RFQ has Been Rejected...</div>";
echo "<script>$('#next_step').hide();</script>";
}

//--- approved
if($view[0]['prospect_status']=='1')
{echo "<div class='alert alert-success'>RFQ has Been Approved. Your can process to next step..</div>";}

?>
<h6 class="text-secondary">Step 5.0</h6>
<h3 class="text-secondary">Get Client Approval</h3>
<hr>
<script>
    $( document ).ready(function() {
        $('#status').change(function() {
            var dval = $('#status').val();
            if(dval!='1')
            {$("#remark").show();}
            else
            {$("#remark").hide();}
        });
    });
</script>
<span id="msgrfq_step50_edit"></span>
<form name="rfq_step50_edit" id="rfq_step50_edit" action="<?php echo $base_url.'index.php?action=sales&query=rfq_step50_edit'?>" method="post">
<input type="hidden" name="sid" value="<?php echo $_GET['id'];?>">          

<table class="table table-bordered">
    <tr>
        <th>Send For Approval To Client</th>
        <td>
            <select name="prospect_status" id="status" class="form-control">
                <option disabled="disabled" selected="selected">-Select-</option>
                <option value="1" <?php if($view[0]['prospect_status']=='1'){echo "selected='selected'";}?>>Accepted</option>
                <option value="2" <?php if($view[0]['prospect_status']=='2'){echo "selected='selected'";}?>>Rejected</option>
                <option value="3" <?php if($view[0]['prospect_status']=='3'){echo "selected='selected'";}?>>Send & Waiting for Approval</option>
            </select>
        </td>
    </tr>
    <tr>
            <td id="remark" <?php if($view[0]['prospect_status'] == 1 ){?>style="display:none;"<?php }?>>
            <label>Remark</label>
            <textarea col="3" row="3" name="remark_prospect" class="form-control"><?php echo $view[0]['remark_prospect'];?></textarea>
        </td>
        <td colspan="2">
            <input type="button" name="submit" onclick="form_submit('rfq_step50_edit')" class="btn btn-primary" value="Send For Approval">
        </td>
    </tr>
</table>

</form>