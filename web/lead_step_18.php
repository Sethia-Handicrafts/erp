<div class="box box-default">
    <div class="row">
        <div class="col-md-12">
            <div class="box-body">
                <form name="likedin" action="<?php echo $base_url.'index.php?action=leads&query=step_16to20_update';?>" method="post">
                    <input type="hidden" name="next_step" value="19">
                    <input type="hidden" name="lid" value="<?php echo $_GET['id'];?>"/>
            <table class="table table-bordered" id="addmore">
                    <tr>
                        <th>Contact Person Name</th>
                        <th>Contact Number</th>
                        <th>Decision Maker</th>
                        <th>Linkedin Profile</th>
                        <th>Request Send</th>
                        <th>Accepted</th>
                        <th>EMail Send</th>
                        <th>Follow-up on Email</th>

                    </tr>
                    <?php 
                        $get_details_comp = $leads->get_company_more_details('12',$_GET['id']);
                        foreach ($get_details_comp as $key => $value) {
                    ?>
                    <tr>
                        <td>
                            <input type="hidden" name="id[]" value="<?php echo $get_details_comp[$key]['id'];?>"/>
                            <?php echo $get_details_comp[$key]['value1'];?>
                        </td>
                        <td><?php echo $get_details_comp[$key]['value2'];?></td>
                        <td>
                        <select name="value3[]" class="form-control" readonly='readonly'> 
                            <option value="">Select</option>
                                <option value="1" <?php if($get_details_comp[$key]['value3']=='1'){echo "selected='selected'"; }?>>Yes</option>
                                <option value="0" <?php if($get_details_comp[$key]['value3']=='0'){echo "selected='selected'"; }?>>No</option>
                            </select> 
                        </td>
                        <td><?php echo $get_details_comp[$key]['value4'];?></td>
                        <td>
                        <?php 
                            $req='';
                            if($get_details_comp[$key]['value5']=='1'){$req= "Yes";}
                            if($get_details_comp[$key]['value5']=='0'){$req= "No";}
                            echo $req;
                        
                            if($req=='Yes')
                            {echo ' ('.date('d-m-Y h:i:s',strtotime($get_details_comp[$key]['value6'])).')';}
                        ?>
                        </td>
                        <td>
                            <select name="value7[]" class="form-control">
                            <option value="">Select</option>
                                <option value="1" <?php if($get_details_comp[$key]['value7']=='1'){echo "selected='selected'"; }?>>Yes</option>
                                <option value="0" <?php if($get_details_comp[$key]['value7']=='0'){echo "selected='selected'"; }?>>No</option>
                            </select>   
                            <input type="hidden" name="value8[]" value="<?php echo $get_details_comp[$key]['value8'];?>">
                            <?php 
                            if($get_details_comp[$key]['value7']=='1') { echo '<br>'.date("d-m-Y h:i:s", strtotime($get_details_comp[$key]['value8']));}
                            ?>

                        </td>
                        
                        <td>
                            <select name="value9[]" class="form-control">
                            <option value="1" <?php if($get_details_comp[$key]['value9']=='1'){echo "selected='selected'"; }?>>Yes</option>
                            <option value="0" <?php if($get_details_comp[$key]['value9']=='0'){echo "selected='selected'"; }?>>No</option>
                            </select>   
                        </td>
                        
                        <td>
                        <select name="value10[]" class="form-control">
                            <option value="1" <?php if($get_details_comp[$key]['value10']=='1'){echo "selected='selected'"; }?>>Yes</option>
                            <option value="0" <?php if($get_details_comp[$key]['value10']=='0'){echo "selected='selected'"; }?>>No</option>
                            </select>  
                            <input type="hidden" name="value11[]" value="" class="form-control"/>
                        </td>
                    </tr>
                    <?PHP }?>
                   <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Update" class="btn btn-info btn-md">
                    </td>
                   </tr>
                </table>
                </form>

                <table class="table table-bordered">
                <tr>
                    
                        <td colspan="2">
                        <form name="step16" action="<?php echo $base_url.'index.php?action=leads&query=step_16to20';?>" method="post">
                            <input type="hidden" name="lid" value="<?php echo $_GET['id'];?>">
                            <input type="hidden" name="step" value="19">
                            <input type="submit" name="submit" value="Process to Next Step 19" class="btn btn-warning btn-md">
                        </form>
                    </td>
                </tr>
                        </table>
            </div>
        </div>
    </div>
</div>        

