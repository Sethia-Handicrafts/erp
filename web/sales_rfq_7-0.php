<h6 class="text-secondary">Step 7.0</h6>
<h3 class="text-secondary">Review Drwaing and Pricing</h3>
<hr>
<?php 
if($view[0]['final_approval_status']=='0')
{echo "<div class='alert alert-primary'>RFQ need to be review.</div>";
echo "<script>$('#next_step').hide();</script>";
}
//--- reject
if($view[0]['final_approval_status']=='2')
{echo "<div class='alert alert-danger'>Approval has Been Rejected. Go to step 6 and check the remark.</div>"; echo "<script>$('#next_step').hide();</script>";}

if($view[0]['final_approval_status']=='1')
{echo "<div class='alert alert-success'>Approval has Been Accepted.</div>"; }
?>
<hr>
<span id="msgstep70_edit"></span>

<form name="step70_edit" id="step70_edit" action="<?php echo $base_url.'index.php?action=sales&query=rfq_step70_edit';?>" method="post">
<input type="hidden" name="sid" value="<?php echo $_GET['id'];?>">          

<table class="table table-bordered">
    <tr>
        <th>Send For Approval To MD</th>
        <td>
            <select name="final_approval" class="form-control">
                <option disabled="disabled" selected="selected">-Select-</option>
            <?php 
            $mds=$admin->getonetype_user('9');
            $selected='';
            foreach($mds as $r=>$v)
            {
                if($mds[$r]['id']==$view[0]['final_approval']){$selected="selected='selected'";}
            ?>
                <option value="<?php echo $mds[$r]['id'];?>" <?php echo $selected;?>><?php echo $mds[$r]['person_name'];?></option>
            <?php }?>
            </select>
        </td>
    </tr>
    <tr>
        <td>
            <input type="button" name="submit" onclick="form_submit('step70_edit')" class="btn btn-success" value="Send For Approval">
        </td>
    </tr>
</table>

</form>