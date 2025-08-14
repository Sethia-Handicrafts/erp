<div class="box box-default">
    <div class="row">
        <div class="col-md-12">
            <div class="box-body">
                
                <?php include('alert.php');
                if($_SESSION['uid']==$query[0]['audit_by'] || $_SESSION['utype']=='9')
                {    
                ?>
                
                <form name="likedin" action="<?php echo $base_url.'index.php?action=leads&query=step_30to38_update';?>" method="post">
                    
                    <input type="hidden" name="lid" value="<?php echo $_GET['id'];?>"/>
            <table class="table table-bordered" id="addmore">
                    <tr>
                        <th>Contact Person Name</th>
                        <th>Contact Number</th>
                        <th>Decision Maker</th>
                        <th>Linkedin Profile</th>
                        <th>Meeting Date</th>
                        <th>Meeting Location</th>
                        <th>Meeting Requirment(s)</th>
                    </tr>
                    <?php 
                    $linkedin_con=array();
                        $get_details_comp = $leads->get_company_more_details('12',$_GET['id']);
                        foreach ($get_details_comp as $key => $value) {
                    ?>
                    <tr>
                        <td>
                            <input type="hidden" name="id[]" value="<?php echo $get_details_comp[$key]['id'];?>"/>
                            <?php echo $get_details_comp[$key]['value1'];?>
                        </td>
                        <td><?php echo $get_details_comp[$key]['value2'];?></td>
                        <td><?php echo $get_details_comp[$key]['value3'];?></td>
                        <td><?php echo $get_details_comp[$key]['value4'];?></td>
                        <td><input type="date" value="<?php echo $get_details_comp[$key]['meeting_date'];?>" class="form-control" value="<?php echo $get_details_comp[$key]['meeting_date'];?>" name="meeting_date[]"></td>
                        <td>
                            <select class="form-control" name="meeting_location[]">
                                <option value="" disabled="disabled" selected="selected">Select</option>
                                <?php $location=$admin->get_metaname_byvalue('meeting_location');
                                foreach ($location as $key1 => $value1) 
                                {
                                    $selected = '';
                                    if($get_details_comp[$key]['meeting_location']==$value1['value1'])
                                    {$selected = 'selected'; array_push($linkedin_con,'1');}

                                    echo '<option value="'.$value1['value1'].'" '.$selected.'>'.$value1['value1'].'</option>';
                                }
                                ?>
                        </td>
                        <td><textarea class="form-control" name="meeting_req[]"><?php echo $get_details_comp[$key]['meeting_req'];?></textarea>
                    
                                <!-- blank inputs-->
                                <input type="hidden" name="meeting_images[]" value="">
                                <input type="hidden" name="meeting_present[]" value="">
                                <input type="hidden" name="meeting_status[]" value="">
                                <input type="hidden" name="meeting_updates[]" value="">
                                <input type="hidden" name="meeting_call[]" value="">
                                <input type="hidden" name="meeting_updates2[]" value="">
                                <input type="hidden" name="meeting_intouch[]" value="">
                                <input type="hidden" name="meeting_drip[]" value="">
                        </td>
                    </tr>
                    <?php }?>
                   <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Update" class="btn btn-info btn-md">
                    </td>
                   </tr>
                </table>
                </form>

                <?php if(count($linkedin_con)>0){?>
                <table class="table table-bordered">
                    <tr>                    
                        <td colspan="2">
                            <span id="msgstep32"></span>
                            <form name="step32" id="step32" action="<?php echo $base_url.'index.php?action=leads&query=step_30to38';?>" method="post">
                                <input type="hidden" name="lid" value="<?php echo $_GET['id'];?>">
                                <input type="hidden" name="step" value="32">
                                <input type="hidden" name="msg" value="<?php echo 'SHL'.$_GET['id'];?>Inquiry Has Been Send To You For Graphc Requirment"/>
                                <label>Refer to Designer</label>
                                <select name="msgto" class="form-control"  style="width:20%" required>
                                    <option value="" disabled="disabled" selected="selected">Select</option>
                                    <?php 
                                    $gp=$admin->getonetype_user('11');
                                    foreach($gp as $k=>$v)
                                    {
                                        echo "<option value='".$gp[$k]['id']."'>".$gp[$k]['person_name']."</select>";
                                    }
                                    ?>
                                </select><br>
                                <input type="submit"  name="submit" value="Schedule A Meeting First Meeting" class="btn btn-warning btn-md">
                            </form>
                        </td>
                    </tr>
                </table>
                <?php } } else {echo "<div class='alert alert-secondary'>Leads has been handled by BDM and MD after this step.</div>";}?>           
            </div>
        </div>
    </div>
</div>        

