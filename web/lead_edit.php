<?php $query=$leads->get_lead_one($_GET['id']);?>

			<!--- form -->
			<div class="col-md-12">
						<!-- /.box-header -->
                         <span id="msgedit_lead"></span>
                         <form class="form" method="post" action="<?php echo $base_url.'index.php?action=leads&query=edit_lead';?>" name="leads_new" id="edit_lead">
                            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
							<div class="box-body">
								<div class="row">
								  <div class="col-md-4">
									<div class="form-group">
									  <label>Name</label>
									  <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $query[0]['name'];?>" required>
									</div>
								  </div>
								  <div class="col-md-4">
									<div class="form-group">
									  <label>Phone</label>
									  <input type="number" class="form-control" placeholder="Phone" name="phone" value="<?php echo $query[0]['phone'];?>">
									</div>
								  </div>
                                  
                                  </div>

								<div class="row">
                                  <div class="col-md-4">
									<div class="form-group">
									  <label>E-mail</label>
									  <input type="email" class="form-control" placeholder="E-mail" name="email" value="<?php echo $query[0]['email'];?>">
									</div>
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
                                        if($country[$r]['id']==$query[0]['country']){echo "selected='selected'";}
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
                                            $state=$admin->get_states($query[0]['country']);
                                            foreach($state as $r=>$v)
                                            {
                                                echo "<option value='".$state[$r]['id']."' ";
                                                if($state[$r]['id']==$query[0]['state']){echo "selected='selected'";}
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
									  <select class="form-control" name="city" id="city" value="<?php echo $query[0]['city'];?>">
                                      <?php 
                                            $city=$admin->get_cities($query[0]['state']);
                                            foreach($city as $r=>$v)
                                            {
                                                echo "<option value='".$city[$r]['id']."' ";
                                                if($city[$r]['id']==$query[0]['city']){echo "selected='selected'";}
                                                echo ">".$city[$r]['name']."</option>";
                                            }
                                        ?>
                                      </select>
									  <span id="msgcity"></span> 
									</div>
								  </div>

                                <div class="col-md-3">
								<div class="form-group">
								  <label>Designation</label>
								  <input type="text" class="form-control" placeholder="Designation" name="designation" value="<?php echo $query[0]['designation'];?>">
								</div>
								</div>

                            </div>
                                

                            <div class="row">
							<div class="col-md-3">
								<div class="form-group">
								  <label>Company</label>
								  <input type="text" class="form-control" placeholder="Company" name="company" value="<?php echo $query[0]['company'];?>">
								</div>
								</div>

								  <div class="col-md-3">
									<div class="form-group">
									  <label>Requirment</label>
									  <input type="text" class="form-control" placeholder="Requirment" name="req" value="<?php echo $query[0]['req'];?>">
									</div>
								  </div>

                                <div class="col-md-3">
								<div class="form-group">
								  <label>LP Url</label>
								  <input type="text" class="form-control" placeholder="Lp Url" name="lp_url" value="<?php echo $query[0]['lp_url'];?>">
								</div>
								</div>

                                <div class="col-md-3">
								<div class="form-group">
								  <label>Form Id</label>
								  <input type="number" class="form-control" placeholder="Form Id" name="form_id" value="<?php echo $query[0]['form_id'];?>">
								</div>
								</div>

                            </div>

							<div class="row">
							<div class="col-md-3">
							<label>Status</label>
								<select class='form-control' name='status'>
										<?php 
                                            $status=$admin->get_metaname_byvalue('lead_status');
                                            foreach($status as $r=>$v)
                                            {
                                                echo "<option value='".$status[$r]['value2']."' ";
                                                if($status[$r]['value2']==$query[0]['status']){echo "selected='selected'";}
                                                echo ">".$status[$r]['value1']."</option>";
                                            }
                                        ?>
								</select>
							</div>
							</div>

							
							</div>
							<!-- /.box-body -->
							<div class="box-footer">
								<button type="reset" class="btn btn-rounded btn-warning btn-outline mr-1">
								  <i class="ti-trash"></i> Cancel
								</button>
								<input type="button" onclick="form_submit('edit_lead')" class="btn btn-rounded btn-primary btn-outline" value="Save">
								  
							</div>  
						</form>

</div>
