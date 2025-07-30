<?php $pro1= $sales->get_baneficiery($_GET['id']);
if($pro1[0]['export'] =='1'){?>
<script>
    $(document).ready(function(){
    $(".domestic").remove();
});
</script>
<?php
}if($pro1[0]['export'] =='2'){?>
    <script>
    $(document).ready(function(){
    $(".export").remove();
});
</script>
<?php }?>
<style>.allhide{display:none;}</style>

<table class="table table-bordered table-reponsive">
    <thead>
        <tr>
            <th width="40%">
            <form method="POST" action="<?php echo $base_url.'index.php?action=sales&query=prospect3'?>" id="form" name="form">
                <label>Type Of Client</label>
                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/>
                <select name="type_of_client" id="type_of_client" class="form-control">
                    <option value="">Select</option>
                    <option value="1" <?php if($pro1[0]['export']=='1'){echo 'selected="selected"';}?>>Export</option>
                    <option value="2" <?php if($pro1[0]['export']=='2'){echo 'selected="selected"';}?>>Domestic</option>
                </select>    <br>
                <input type="submit" name="save" value="Update" class="btn btn-success btn-sm">
            </form>
            </th>
            <td>
            <span class="text-danger">Update client type to view terms and conditions form</span>
            </td>
        </tr>
    </thead>
</table>

<!-------- form for term and conditions ---------->
<?php 
if(!empty($pro1[0]['export'])){
    $tandc=$sales->get_prospect_tandc($pro1[0]['id']);
    if($tandc)
    {include('sales_terms-and-conditions_update.php');}
    else
    {include('sales_terms-and-conditions_insert.php');}
}
?>