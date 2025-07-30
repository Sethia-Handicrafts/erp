<h6 class="text-secondary">Step 3.0</h6>
<h3 class="text-secondary">Review & Approval For Processing</h3>
<hr>
<?php 
if($view[0]['approval_status']=='2')
{echo "<div class='alert alert-secondary'>Approval has Been Send... You can process when approval receive.</div>";
echo "<b>Remark</b><br>".$view[0]['remark_approval'];    
echo "<script>$('#next_step').hide();</script>";
}

if($view[0]['approval_status']=='0')
{echo "<div class='alert alert-primary'>RFQ need to be review.</div>";
echo "<script>$('#next_step').hide();</script>";
}
//--- reject
if($view[0]['approval_status']=='3')
{echo "<div class='alert alert-danger'>RFQ has Been Rejected...</div>";
echo "<b>Remark</b><br>".$view[0]['remark_approval'];    
echo "<script>$('#next_step').hide();</script>";
}

//--- approved
if($view[0]['approval_status']=='1')
{echo "<div class='alert alert-success'>Approval has Been Approved. Your can process to next step..</div>";}

?>
<hr>
<span id="msgstep40_edit"></span>
<form name="step40_edit" id="step40_edit" action="<?php echo $base_url.'index.php?action=sales&query=rfq_step40_edit'?>" method="post">
<input type="hidden" name="sid" value="<?php echo $_GET['id'];?>">          
<input type="hidden" name="approval_status" value="2">
<table class="table table-bordered">
    <tr>
        <th>Send For Approval To MD</th>
        <td>
            <select name="approval_sendto" class="form-control">
                <option disabled="disabled" selected="selected">-Select-</option>
            <?php 
            $mds=$admin->getonetype_user('9');
            $selected='';
            foreach($mds as $r=>$v)
            {
                if($mds[$r]['id']==$view[0]['approval_sendto']){$selected="selected='selected'";}
            ?>
                <option value="<?php echo $mds[$r]['id'];?>" <?php echo $selected;?>><?php echo $mds[$r]['person_name'];?></option>
            <?php }?>
            </select>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <input type="button" name="submit" onclick="form_submit('step40_edit')" class="btn btn-success" value="Send For Approval">
        </td>
    </tr>
</table>

</form>