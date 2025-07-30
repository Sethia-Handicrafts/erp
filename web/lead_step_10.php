<div class="box box-default">
<div class="row">
     <div class="col-md-12">
        <div class="box-body">
            <?php 
            if($query[0]['comp_audit']=='0' && $_SESSION['utype']=='6')
            {echo "<div class='alert alert-secondary'>Company audit has been pending from Business Development Manager. Your will be notify after approval !!!</div>";}
            else if($query[0]['comp_audit']=='1')
            {
                echo "<div class='alert alert-secondary'>Audit has been approved by Business Development Manager !!!</div>";
                ?>
                <span id="msgstep10"></span>
                <form name="step8" id="step10" action="<?php echo $base_url.'index.php?action=leads&query=step_change';?>" method="post">
                    <input type="hidden" name="lid" value="<?php echo $_GET['id'];?>">
                    <input type="hidden" name="step" value="11">
                </form>
                <script>
                    $(document).ready(function(){
                            setTimeout(function () {
                                form_submit_alert('step10');}, 4500);
                            });s
                </script>
            <?php 
            }
            elseif($query[0]['comp_audit']=='2')
            {
                echo "<div class='alert alert-danger'>Company audit has declined by Business Development Manager, You can process this lead to next step !!!</div>";
            }
            elseif($query[0]['comp_audit']=='0' && $_SESSION['utype']=='8')
            {
                echo "<div class='alert alert-warning'>Check the company details and submit to Managing Director for approval !!.</div>";

                $company_profile = $leads->get_company_profile($_GET['id']);?>

                        <h4>Company Research Info</h4>
                        <table class="table table-bordered">
                                                <thead>
                                                <tr>
													<th>#</th>
													<th>Title</th>
													<th>Sub Title</th>
													<th>Category</th>
                                                    <th>Sub Category</th>
												</tr>
                                                </thead>				
												<?php
												$counter=1;
												$company_details_leads=$leads->get_leads_company_details($_GET['id']);
                                                if(!$company_details_leads)
                                                {
                                                    echo "<tr><td colspan='4'><div class='alert alert-info'>No Data Found</div></td></tr>";
                                                }
                                                else{
												foreach($company_details_leads as $r =>$v)
												{   
                                                    $value12=array();
                                                    if(!unserialize($company_details_leads[$r]['value2']) == true)
                                                    {$value2=$company_details_leads[$r]['value2'];}
                                                    else
                                                    {                                                        
                                                        $value21=unserialize($company_details_leads[$r]['value2']);
                                                        foreach($value21 as $o => $v)
                                                        {
                                                        $value12[]=$v."<br>"; 
                                                        }
                                                        $value2 = implode("<br>",$value12);
                                                    } 
													echo "<tr>";
														echo "<th>".$counter++."</th>";
														echo "<td>".$company_details_leads[$r]['details']."</td>";
														echo "<td>".$company_details_leads[$r]['value1']."</td>";
														echo "<td>".$value2."</td>";
                                                        echo "<td>";

                                                        $value3=$company_details_leads[$r]['value3'];
                                                        if(is_array($value3))
                                                        {
                                                            print_r($value3);
                                                        }
                                                        echo "</td>";
													echo "</tr>";
												}}
												?>
											</table>

                                            <hr>
                                            <h4>Company Profile</h4>
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
                            <form name="qualified_form" id="qualified" action="<?php echo $base_url.'index.php?action=leads&query=comp_qulified_lead';?>" method="post">
                            <fieldset class="border p-2">
                            <legend  class="float-none w-auto p-2">Company Detail(s) Approve ???</legend>

                            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                            <input type="hidden" name="audit_by" value="<?php echo $_SESSION['uid'];?>">
                            <div class="row">
                            <div class="col-sm-8">
                            <select name="qualified" class="form-control" required>
                            <option disabled="disabled" selected="selected">-Select-</option>
                            <option value="1" <?php if($query[0]['comp_audit']=='1'){echo "selected='selected'";}?>>Approve</option>
                            <option value="2" <?php if($query[0]['comp_audit']=='2'){echo "selected='selected'";}?>>Dis-Approve</option>
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
                
            <?php }?>
        </div>
      </div>
     
    </div>
  </div>
