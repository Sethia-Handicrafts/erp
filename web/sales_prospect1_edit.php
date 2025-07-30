<?php 
$pro1= $sales->get_baneficiery($_GET['id']);
?>

<form name="prospect1" id="prospect1" action="<?php echo $base_url.'index.php?action=sales&query=prospect1';?>" method="post">
										<div class="row">
										<div class="col-md-4">
											<div class="form-group">
											<label for="lastName1">Company Name<span class="text-danger">*</span> :</label>
											<input type="text" class="form-control" name="cname" required="required" value="<?php echo $pro1[0]['cname'];?>"> </div>
											</div>
											<div class="col-md-4">
											<div class="form-group">
											<label for="lastName1">Company Type :</label>
											<input type="text" class="form-control" name="ctype" value="<?php echo $pro1[0]['ctype'];?>"> </div>
											</div>
											<div class="col-md-4">
											<div class="form-group">
											<label for="emailAddress1">Designation<span class="text-danger">*</span> :</label>
												<select name="designation" class="form-control">
													<option disabled="disabled" selected="selected">-Select-</option>
													<option>Employee</option>
													<option>Owner</option>
													<option>CEO</option>
													<option>Director</option>
													<option>CMO</option>
												</select>
											</div>
											</div>

											
											
										</div>
										<div class="row">

											<div class="col-md-3">
											<div class="form-group">
											<label for="regtype">Registration Type :</label>
											<input type="text" class="form-control" name="regtype" value="<?php echo $pro1[0]['regtype'];?>"> </div>
											</div>
											
											<div class="col-md-3">
											<div class="form-group">
											<label for="regnu">Registration Number :</label>
											<input type="text" class="form-control" name="regnu" value="<?php echo $pro1[0]['regnu'];?>">
											</div>
											</div>

										<div class="col-md-3">
											<div class="form-group">
											<label for="firstName5">First Name<span class="text-danger">*</span> :</label>
											<input type="text" class="form-control" name="fname" required="required" value="<?php echo $pro1[0]['fname'];?>"> </div>
											</div>
											<div class="col-md-3">
											<div class="form-group">
											<label for="lastName1">Last Name :</label>
											<input type="text" class="form-control" name="lname" value="<?php echo $pro1[0]['lname'];?>"> </div>
											</div>

											
										</div>

										<div class="row">
											<div class="col-md-3">
											<div class="form-group">
											<label for="addressline1">Address<span class="text-danger">*</span> :</label>
											<input type="text" class="form-control" name="address"  required="required" value="<?php echo $pro1[0]['address'];?>"> </div>
											</div>

                                            <div class="col-md-3">	
											<div class="form-group">
								  <label>Country</label>
								  <select class="form-control" name="country" id="country" onchange="get_details('country','state','<?php echo $base_url.'index.php?action=leads&query=get_details&type=state&id=';?>')">
									<option disabled="disabled" selected="selected" >-- Select --</option>
									<?php $country=$admin->get_country();
									foreach($country as $r => $v)
									{
										echo "<option value='".$country[$r]['id']."' ";
                                        if($country[$r]['id']==$pro1[0]['country']){echo "selected='selected'";}
                                        echo ">".$country[$r]['name']."</option>";
									}?>
								  </select>
								</div>
								</div>

								  <div class="col-md-3">
									<div class="form-group">
									  <label>State</label>
									 
									  <select class="form-control" name="state" id="state" onchange="get_details('state','city','<?php echo $base_url.'index.php?action=leads&query=get_details&type=city&id=';?>')">
                                        <?php 
                                            $state=$admin->get_states($pro1[0]['country']);
                                            foreach($state as $r=>$v)
                                            {
                                                echo "<option value='".$state[$r]['id']."' ";
                                                if($state[$r]['id']==$pro1[0]['state']){echo "selected='selected'";}
                                                echo ">".$state[$r]['name']."</option>";
                                            }
                                        ?>
                                      </select>
									  <span id="msgstate"></span> 
									</div>
								  </div>

								  <div class="col-md-3">
									<div class="form-group">
									  <label>City</label>
									  <select class="form-control" name="city" id="city">
                                      <?php 
                                            $city=$admin->get_cities($pro1[0]['state']);
                                            foreach($city as $r=>$v)
                                            {
                                                echo "<option value='".$city[$r]['id']."' ";
                                                if($city[$r]['id']==$pro1[0]['city']){echo "selected='selected'";}
                                                echo ">".$city[$r]['name']."</option>";
                                            }
                                        ?>
                                      </select>
									  <span id="msgcity"></span> 
									</div>
								  </div>

										</div>
										
										<div class="row">
											<div class="col-md-3">
												<div class="form-group">
												<label for="zipcode">ZipCode :</label>
												<input type="number" class="form-control" name="zipcode" id="zipcode" value="<?php echo $pro1[0]['zipcode'];?>"> 
												</div>
											</div>
											<div class="col-md-3">
											<div class="form-group">
											<label for="emailAddress1">Email Address<span class="text-danger">*</span> :</label>
											<input type="text" name="email" class="form-control" name="email"  required="required" value="<?php echo $pro1[0]['email'];?>"> </div>
											</div>
											
											<div class="col-md-3">
											<div class="form-group">
											<label for="phoneNumber1">Phone Number<span class="text-danger">*</span> :</label>
											<input type="number" class="form-control" name="phone"  required="required" value="<?php echo $pro1[0]['phone'];?>"> </div>
											</div>

											<div class="col-md-2">
											<div class="form-group">
												<br>
												<input class="btn btn-primary" type="submit" value="Update">
											</div>
											</div>
										</div>	
										</form>