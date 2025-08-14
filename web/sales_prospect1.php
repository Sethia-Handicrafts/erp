<form name="prospect1" id="prospect1" action="<?php echo $base_url.'index.php?action=sales&query=prospect1';?>" method="post">
										<div class="row">

											<div class="col-md-3">
											<div class="form-group">
											<label for="lastName1">Prospect's Company Name<span class="text-danger">*</span> :</label>
											<input type="text" class="form-control" name="cname" required="required"> 
											</div>
											</div>											

											<div class="col-md-3">
											<div class="form-group">
											<label for="lastName1">Prospect's Type :</label>
											<!-- <input type="text" class="form-control" name="ctype">  -->
											 <select class="form-control" name="ctype">
												<option>-select-</option>
												<option>Agent</option>
												<option>Buyer</option>
											</select>
											</div>
											</div>

											<div class="col-md-3">
											<div class="form-group">
											<label for="regtype">Registration Type :</label>
											<input type="text" class="form-control" name="regtype"> </div>
											</div>
											
											<div class="col-md-3">
											<div class="form-group">
											<label for="regnu">Registration Number :</label>
											<input type="text" class="form-control" name="regnu">
											</div>
											</div>

										</div>
										<div class="row">
											<div class="col-md-4">
											<div class="form-group">
											<label for="firstName5">First Name<span class="text-danger">*</span> :</label>
											<input type="text" class="form-control" name="fname" required="required"> </div>
											</div>

											<div class="col-md-4">
											<div class="form-group">
											<label for="lastName1">Last Name :</label>
											<input type="text" class="form-control" name="lname"> </div>
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
											<label for="addressline1">Address<span class="text-danger">*</span> :</label>
											<input type="text" class="form-control" name="address"  required="required"> </div>
											</div>
											
											<div class="col-md-3">
								<div class="form-group">
								  <label>Country</label>
								  <select class="form-control" name="country" id="country" onchange="get_details2('country','state','<?php echo $base_url.'index.php?action=leads&query=get_details&type=state&id=';?>')">
									<option disabled="disabled" selected="selected" >-- Select --</option>
									<?php $country=$admin->get_country();
									foreach($country as $r => $v)
									{
										echo "<option value='".$country[$r]['id']."' ";
                                        
                                        echo ">".$country[$r]['name']."</option>";
									}?>
								  </select>
								</div>
								</div>

								  <div class="col-md-3">
									<div class="form-group">
									  <label>State</label>
									 
									  <select class="form-control" name="state" id="state" onchange="get_details2('state','city','<?php echo $base_url.'index.php?action=leads&query=get_details&type=city&id=';?>')">
                                        
                                      </select>
									  <span id="msgstate"></span> 
									</div>
								  </div>

								  <div class="col-md-3">
									<div class="form-group">
									  <label>City</label>
									  <select class="form-control" name="city" id="city" value="<?php echo $query[0]['city'];?>">
                                      
                                      </select>
									  <span id="msgcity"></span> 
									</div>
								  </div>

										</div>
										
										<div class="row">
											<div class="col-md-3">
												<div class="form-group">
												<label for="zipcode">ZipCode :</label>
												<input type="number" class="form-control" name="zipcode" id="zipcode"> 
												</div>
											</div>
											<div class="col-md-3">
											<div class="form-group">
											<label for="emailAddress1">Email Address<span class="text-danger">*</span> :</label>
											<input type="text" name="email" class="form-control" name="email"  required="required"> </div>
											</div>
											
											<div class="col-md-3">
											<div class="form-group">
											<label for="phoneNumber1">Phone Number :</label>
											<input type="number" class="form-control" name="phone"> </div>
											</div>

											<div class="col-md-2">
											<div class="form-group">
												<br>
												<input class="btn btn-primary" type="submit" value="Save & Process">
											</div>
											</div>
										</div>	
										</form>