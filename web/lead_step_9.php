
		<!-- Main content -->
		<section class="content">
			<hr>
			<!--- form -->
			<div class="box">
                
						<div class="box-header with-border">
						  <h4 class="box-title">Company Profile</h4>
                          
						</div>

                        <?php 
                          //-- check if company profile is completed
                          $comp = $leads->get_company_profile($_GET['id']);
                        //   if($comp)
                        //   {
                        //       include('lead_step_9_edit.php');
                        //   } 
                        //   else
                        //   {
                        //       include('lead_step_9.php');
                        //   }
                          ?>

						<div class="box-body">
                           
                            <form name="emp_profile" method="post" action="<?php echo $base_url."index.php?action=leads&query=save_step_9";?>">

                                <input type="hidden" name="lid" value="<?php echo $_GET['id'];?>">
                              
                            <table class="table table-bordered">
                                <tr>
                                    <th>First Name <input type="text" class="form-control" name="firstname" value=""></th>
                                    <th>Last Name
                                    <input type="text" class="form-control" name="lastname" value=""></th>
                                    <th>Gender</th>
                                    <td>
                                        <select name="gender" class="form-control" required>
                                            <option disabled="disbaled" selected="selected">--Select--</option>
                                            <option value="Male">Male</option>
                                            <option value="FeMale">FeMale</option>
                                        </select>
                                    </td>
                                </tr>    
                                
                                <tr>
                                    <th>Company</th>
                                    <td><input type="text" class="form-control" name="companyname"></td>
                                    <th>Designation</th>
                                    <td><input type="text" name="designation_now" class="form-control"></td>
                                </tr>

                                <tr>
                                    <th>Phone No.</th>
                                    <td><input type="text" class="form-control" name="phone" value="<?php echo $emp[0]['ucontact'];?>"></td>
                                    <th>Location</th>
                                    <td><select class="form-control" name="country" id="country" onchange="get_details('country','<?php echo $base_url.'index.php?action=leads&query=get_details&type=state&id=';?>','state')">
									<option disabled="disabled" selected="selected" >-- Select --</option>
									<?php $country=$admin->get_country();
									foreach($country as $r => $v)
									{
										echo "<option value='".$country[$r]['id']."'>".$country[$r]['name']."</option>";
									}?>
								  </select></td>
                                </tr>

                                <tr>
                                    <th>State
                                        <select class="form-control" name="state" id="state" onchange="get_details('state','<?php echo $base_url.'index.php?action=leads&query=get_details&type=city&id=';?>','city')"></select>
                                        <span id="msgstate"></span> 
                                    </th>
                                    <th>City
                                        <select class="form-control" name="city" id="city">
                                        </select>
                                    </th>
                                    <th>Zipcode
                                        <input type="number" class="form-control" name="zipcode" value="">
                                    </th>
                                    <th>Time Zone
                                        <input type="text" class="form-control" name="timezone" value="">
                                    </th>
                                </tr>      
                                
                                <tr>
                                    <th>Date of Birth</th>
                                    <td><input type="date" class="form-control" name="dob" value=""></td>
                                    <th>Family Linkage</th>
                                    <td><input type="text" class="form-control" name="family_linkage" value=""></td>
                                </tr>

                                <tr>
                                    <th>Religon</th>
                                    <td>
                                            <select name="religion" class="form-control">
                                            <option>-- Select --</option>
                                            <?php $religion = $admin->get_metaname_byvalue('religion'); 

                                            //	$user = array_unique($user0);
                                            foreach($religion as $k=>$value)
                                            {
                                                if($religion[$k]['meta_value2']=='1'){continue;}
                                                echo "<option value='".$religion[$k]['value1']."'>".$religion[$k]['value1']."</option>";
                                            }
                                            ?>
                                            </select>
                                    </td>
                                    <th>Goals</th>
                                    <td><input type="text" class="form-control" name="goal" value=""></td>
                                </tr>
                                <tr>
                                    <th>Pain Point / Challanges</th>
                                    <td colspan="3"><input type="text" class="form-control" name="point" value=""></td>
                                </tr>
                                <tr>
                                    <th>Buying Motivations</th>
                                    <td colspan="3"><input type="text" class="form-control" name="motivation" value=""></td>
                                </tr>
                                <tr>
                                    <th>Prefered Channel Of Communication</th>
                                    <td colspan="3"><input type="text" class="form-control" name="channel" value=""></td>
                                </tr>
                                <tr>
                                    <th>With Current Comapny Since</th>
                                    <td colspan="3"><input type="text" class="form-control" name="current_since" value=""></td>
                                </tr>
                                <tr>
                                    <th colspan="4">History Of Previous Jobs</th>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <table  id="addmore" class="table">
                                            <tr>
                                                <th>Company</th>
                                                <th>Designation</th>
                                                <th>From</th>
                                                <th>To</th>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" name="company[]"></td>
                                                <td><input type="text" class="form-control" name="designation[]"></td>
                                                <td><input type="date" class="form-control" name="from[]"></td>
                                                <td><input type="date" class="form-control" name="to[]"></td>
                                            </tr>
                                            
                                        </table>
                                        <input type="button" name="addmore" id="addmore_btn" class="btn btn-info btn-xs" value="Add More Previous Jobs">
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="submit" name="submit" value="Save Profile" class="btn btn-md btn-success"></input></td>
                                </tr>
                            </table>
</form>
                        </div>            

            </div>    
        
        </section>     
        
    



<script type="text/javascript">

$(document).ready(function() {

var max_fields      = 50; //maximum input boxes allowed
var wrapper         =  $("#addmore"); //Fields wrapper
var add_button      =  $("#addmore_btn"); //Add button ID
var x = 1; //initlal text box count
        

$(add_button).click(function(e)
{ //on add input button click
    e.preventDefault();
    if(x < max_fields){ 
        x++; 
		
    $(wrapper).append('<tr id="addmore_tr'+x+'"><td><input type="text" class="form-control" name="company[]"></td><td><input type="text" class="form-control" name="designation[]"></td><td><input type="date" class="form-control" name="from[]"></td><td><input type="date" class="form-control" name="to[]"></td></tr>'); 

        
        }
      
    
    else
    {alert("Sorry, you can add only 50 Items in this segment");}

});



});


function removeme(x)
{
  //alert(x);
  $('#addmore_tr'+x).remove();
    //get_subtotal(x);
}  
</script>