<h6 class="text-secondary">Step 10</h6>
<h3 class="text-secondary">Get Client Approval</h3>
<hr>
<?php 
echo "<script>$('#next_step').hide();</script>";

//--- reject
if($view[0]['send_status']=='2')
{echo "<div class='alert alert-danger'>RFQ has been rejected..</div>";}

//-- send and waiting
if($view[0]['send_status']=='3')
{echo "<div class='alert alert-danger'>RFQ Has been send and waiting for review..</div>";}


//-- not send
if($view[0]['send_status']=='0')
{echo "<div class='alert alert-secondary'>RFQ not sent yet..</div>";}

//--- approved
if($view[0]['send_status']=='1')
{echo "<div class='alert alert-success'>RFQ has Been Sent For Approval To Client / Prospect.</div>";}

echo "<label>Remark :</label><br>";
echo $view[0]['remark_send'];
?>
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
<span id="msgrfq_step10-0_edit"></span>
<form name="rfq_step10-0_edit" id="rfq_step10-0_edit" action="<?php echo $base_url.'index.php?action=sales&query=rfq_step10-0_edit'?>" method="post">
<input type="hidden" name="sid" value="<?php echo $_GET['id'];?>">          

<table class="table table-bordered">
    <tr>
        <th>Send For Approval To Client</th>
        <td>
            <select name="send_status" id="status" class="form-control">
                <option disabled="disabled" selected="selected">-Select-</option>
                <option value="0" <?php if($view[0]['send_status']=='0'){echo "selected='selected'";}?>>Not Send Yet</option>
                <option value="1" <?php if($view[0]['send_status']=='1'){echo "selected='selected'";}?>>Accepted</option>
                <option value="2" <?php if($view[0]['send_status']=='2'){echo "selected='selected'";}?>>Rejected</option>
                <option value="3" <?php if($view[0]['send_status']=='3'){echo "selected='selected'";}?>>Send & Waiting for Approval</option>
            </select>
        </td>
    </tr>
    <tr>
            <td id="remark" <?php if($view[0]['send_status'] == 1 ){?>style="display:none;"<?php }?>>
            <label>Remark</label>
            <textarea col="3" row="3" name="remark_send" class="form-control"><?php echo $view[0]['remark_prospect'];?></textarea>
        </td>
        <td colspan="2">
            <input type="button" name="submit" onclick="form_submit('rfq_step10-0_edit')" class="btn btn-primary" value="Send For Approval">
        </td>
    </tr>
</table>

</form>