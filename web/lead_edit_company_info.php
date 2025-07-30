<?php
$id=$admin->get_metaname_byid($_GET['id']);
?>
<span id="msgupdate_company_info"></span>
<form name="update_company_info" action="<?php echo $base_url;?>index.php?action=leads&query=lead_edit_company_info_update&id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data" id="update_company_info">
<table class="table table-bordered">
    <tr>
        <th colspan="2">Title</th>
        <th>Sub Title</th>
        <th>Input Type</th>
    </tr>
    <tr>
        <td rowspan="5" colspan="2"><input type="text" value="<?php echo $id[0]['value1']; ?>" name="value1" class="form-control"></td>
        <td>
            <input type="hidden" value="<?php echo $id[0]['id']; ?>" name="id" class="form-control">    
            <input type="text" value="<?php echo $id[0]['value2']; ?>" name="value2" class="form-control">
        </td>
        <td>
            <select name="value2_input" class="form-control">
                <option disabled="disabled" selected="selected">-Select-</option>
                <option value="radio" <?php if($id[0]['value2_input']=='radio') echo "selected='selected'"; ?>>Unique</option>
                <option value="checkbox" <?php if($id[0]['value2_input']=='checkbox') echo "selected='selected'"; ?>>CheckBox</option>
                <option value="textarea" <?php if($id[0]['value2_input']=='textarea') echo "selected='selected'"; ?>>Description</option>
            </select>    
        </td>
    </tr>
    <tr>
        <th>Category</th>
        <th>Input Type</th>
    </tr>
    <tr>
        <td><input type="text" value="<?php echo $id[0]['value3']; ?>" name="value3" class="form-control"></td>
        <td>
            <select name="value3_input" class="form-control">
                <option disabled="disabled" selected="selected">-Select-</option>
                <option value="radio" <?php if($id[0]['value3_input']=='radio') echo "selected='selected'"; ?>>Unique</option>
                <option value="checkbox" <?php if($id[0]['value3_input']=='checkbox') echo "selected='selected'"; ?>>CheckBox</option>
                <option value="textarea" <?php if($id[0]['value3_input']=='textarea') echo "selected='selected'"; ?>>Description</option>
            </select>
        </td>
    </tr>
    <tr>
        <th>SubCategory</th>
        <th>Input Type</th>
    </tr>
    <tr>
        <td>
        <?php echo $value4 = $id[0]['value4']; 
        if($value4 != ''){
        $value4 = unserialize($id[0]['value4']); ?>
            <input type="text" value="<?php echo implode(",",$value4); ?>" name="value4" class="form-control">
        <?php } else {echo "do";}?>
        </td>
        <td>
            <select name="value4_input" class="form-control">
                <option disabled="disabled" selected="selected">-Select-</option>
                <option value="radio" <?php if($id[0]['value4_input']=='radio') echo "selected='selected'"; ?>>Unique</option>
                <option value="checkbox" <?php if($id[0]['value4_input']=='checkbox') echo "selected='selected'"; ?>>CheckBox</option>
                <option value="textarea" <?php if($id[0]['value4_input']=='textarea') echo "selected='selected'"; ?>>Description</option>
                <option value="text2" <?php if($id[0]['value4_input']=='text2') echo "selected='selected'"; ?>>Description 2 (Compare)</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>
            <input type="button" name="save" value="Save" onclick="form_submit('update_company_info')" class="btn btn-primary btn-md" id="save">
        </td>
    </tr>
</table>
        </form>