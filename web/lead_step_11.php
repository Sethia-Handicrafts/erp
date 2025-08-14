<div class="box box-default">
    
    <div class="row">
        <div class="col-md-12">
            <div class="box-body">
            <?php 
            if($query[0]['comp_audit']=='1' && $_SESSION['utype']=='6' || $_SESSION['utype']=='8')
            {echo "<div class='alert alert-secondary'>Company audit has been pending from Managing Director. Your will be notify after approval !!!</div>";}
            else if($query[0]['comp_audit']=='2')
            {echo "<div class='alert alert-danger'>Company audit has been declined from Business Development Manager. !!!</div>";}
            else if($query[0]['comp_audit']=='4')
            {echo "<div class='alert alert-danger'>Company audit has been declined from Business Development Manager. !!!</div>";}
            //-- if same user is login which is lead manager
            else if($_SESSION['utype']=='9')
            {
                echo "<div class='alert alert-success'>Company audit has been accepted from Business Development Manager. !!!</div>";   
                
                    $company_profile = $leads->get_company_profile($_GET['id']);?>

                    <table class="table table-bordered">
                    <tr>
                        <th>Company Name</th>
                        <td><?php echo $company_profile[0]['company_now'];?></td>
                        <th>Email</th>
                        <td><?php echo $company_profile[0]['email'];?></td>
                        <th>Phone</th>
                        <td><?php echo $company_profile[0]['phone'];?></td>
                        <th>Contact Name</th>
                        <td><?php echo $company_profile[0]['firstname'].' '.$company_profile[0]['lastname'];?></td>
                    </tr>
                    <tr>
                        <th>City</th>   
                        <td><?php $city=$admin->get_cities_one($company_profile[0]['city']); echo $city[0]['name'];?></td>
                        <th>State</th>                        
                        <td><?php 
                        $state = $admin->get_states_one($company_profile[0]['state']);
                        echo $state[0]['name'];?></td>
                        <th>Country</th>
                        <td><?php $country=$admin->get_country_one($company_profile[0]['country']); echo $country[0]['name'];?></td>
                        <th>Zipcode</th>
                        <td><?php echo $company_profile[0]['zipcode'];?></td>
                    </tr>
                    <tr>
                        <th>Dob</th>
                        <td><?php echo $company_profile[0]['dob'];?></td>
                        <th>Family Linkage</th>
                        <td><?php echo $company_profile[0]['family_linkage'];?></td>
                        <th>Goal</th>
                        <td><?php echo $company_profile[0]['goal'];?></td>
                        <th>Gender</th>
                        <td><?php echo $company_profile[0]['gender'];?></td>
                    </tr>
                    <tr>
                        <th>Point</th>
                        <td><?php echo $company_profile[0]['point'];?></td>
                        <th>Religion</th>
                        <td><?php echo $company_profile[0]['religion'];?></td>
                        <th>Motivation</th>
                        <td><?php echo $company_profile[0]['motivation'];?></td>
                        <th>Channel</th>
                        <td><?php echo $company_profile[0]['channel'];?></td>
                    </tr>
                    <tr>
                        <th>Current Since</th>
                        <td><?php echo $company_profile[0]['current_since'];?></td>
                        <th>Designation</th>
                        <td><?php echo $company_profile[0]['designation_now'];?></td>
                        <th>Timezone</th>
                        <td colspan="3"><?php echo $company_profile[0]['Timezone'];?></td>   
                    </tr>
                    <tr>
                        <th colspan="8">Previous Jobs</th>
                    </tr>        
                    <tr>
                        <td colspan="8">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Company</th>
                                    <th>Designation</th>
                                    <th>From</th>
                                    <th>To</th>
                                </tr>
                                <?php 
                                $company_profile_details=$leads->get_company_profile_details($_GET['id']);
                                foreach($company_profile_details as $cp=>$v){?>
                                    <tr>
                                        <td><?php echo $company_profile_details[$cp]['company'];?></td>
                                        <td><?php echo $company_profile_details[$cp]['designation'];?></td>
                                        <td><?php echo date("d-m-Y",strtotime($company_profile_details[$cp]['from_date']));?></td>
                                        <td><?php echo date("d-m-Y",strtotime($company_profile_details[$cp]['to_date']));?></td>
                                    </tr>
                                <?php }?>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <form name="qualified_form" id="qualified" action="<?php echo $base_url.'index.php?action=leads&query=comp_qulified_lead_md';?>" method="post">
                            <fieldset class="border p-2">
                            <legend  class="float-none w-auto p-2">Company Detail(s) Approve ???</legend>

                            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                            <input type="hidden" name="audit_by" value="<?php echo $_SESSION['uid'];?>">
                            <div class="row">
                            <div class="col-sm-8">
                            <select name="qualified" class="form-control" required>
                            <option disabled="disabled" selected="selected">-Select-</option>
                            <option value="3" <?php if($query[0]['comp_audit']=='3'){echo "selected='selected'";}?>>Approve</option>
                            <option value="4" <?php if($query[0]['comp_audit']=='4'){echo "selected='selected'";}?>>Dis-Approve</option>
                            </select>
                            </div>
                            <div class="col-sm-4">
                            <input class="btn btn-success btn-sm" name="qualified_btn" type="submit" value="Save">
                            </div>
                            </div>
                            </fieldset>
                            </form>
                        </td>
                    </tr>
                    </table>
                
                <?php
            }
            ?>
            </div>
        </div>
    </div>
</div>