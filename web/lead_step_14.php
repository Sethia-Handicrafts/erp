<div class="box box-default">
    <div class="row">
        <div class="col-md-12">
            <div class="box-body">
                <form name="likedin" action="<?php echo $base_url.'index.php?action=leads&query=step_14_update';?>" method="post">
                    <input type="hidden" name="lid" value="<?php echo $_GET['id'];?>"/>
            <table class="table table-bordered" id="addmore">
                    <tr>
                        <th>Contact Person Name</th>
                        <th>Contact Number</th>
                        <th>Decision Maker</th>
                        <th>Linkedin Profile</th>
                    </tr>
                    <?php 
                        $get_details_comp = $leads->get_company_more_details('12',$_GET['id']);
                        foreach ($get_details_comp as $key => $value) {
                    ?>
                    <tr>
                        <td><?php echo $get_details_comp[$key]['value1'];?></td>
                        <td><?php echo $get_details_comp[$key]['value2'];?></td>
                        <th>
                            <input type="hidden" name="id[]" value="<?php echo $get_details_comp[$key]['id'];?>"/>
                            <select name="value3[]" class="form-control">
                            <option value="1" <?php if($get_details_comp[$key]['value3']=='1'){echo "selected='selected'"; }?>>Yes</option>
                            <option value="0" <?php if($get_details_comp[$key]['value3']=='0'){echo "selected='selected'"; }?>>No</option>
                            </select>
                        </th>
                        <th><input type="text" name="value4[]" value="<?php echo $get_details_comp[$key]['value4'];?>" class="form-control" ></th>
                        <td><i class="fa fa-pencil btn btn-warning btn-xs"></i> <i class="fa fa-trash btn btn-danger btn-xs"></i></td>
                    </tr>
                    <?PHP }?>
                   <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Save Details" class="btn btn-info btn-md">
                    </td>
                   </tr>
                </table>
                </form>

                <table class="table table-bordered">
                <tr>
                    
                        <td colspan="2">
                        <form name="step14" action="<?php echo $base_url.'index.php?action=leads&query=step_14';?>" method="post">
                            <input type="hidden" name="lid" value="<?php echo $_GET['id'];?>">
                            
                            <input type="submit" name="submit" value="Process to Next Step 15" class="btn btn-warning btn-md">
                        </form>
                    </td>
                </tr>
                        </table>
            </div>
        </div>
    </div>
</div>        

