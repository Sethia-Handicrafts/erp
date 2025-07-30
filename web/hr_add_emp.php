<div class="content-wrapper">
	  <div class="container-full">


	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Add New Employee</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">HR</li>
								<li class="breadcrumb-item active" aria-current="page">Add New Employee</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
			
			<!--- form -->
			
			<?php include('alert.php');?>	
            <div class="box">
                
						<div class="box-header with-border">
						  <h4 class="box-title">Add New Employee</h4>
						</div>
                        
						<!-- /.box-header -->
                        <div class="box-body">
                            <span id="msguser"></span>
                            <form name="user" id="user" action="<?php echo $base_url.'index.php?action=admin&query=create_user';?>" method="post">
                                <div class="row">
                                         <div class="col-sm-2">
                                            <label>Employee Name</label>
                                            <input type="text" class="form-control" name="person_name" value="">	
                                        </div>
                                        <div class="col-sm-2">
                                            <label>User Id</label>
                                            <input type="text" class="form-control" name="uname" value="">
                                        </div>
                                        <div class="col-sm-2">
                                            <label>Password</label>
                                            <input type="text" class="form-control" name="upass" value="">
                                        </div>	
                                        <div class="col-sm-2">
                                            <label>User Type</label>
                                            <select name="utype" class="form-control">
                                            <option>-- Select --</option>
                                            <?php $user = $admin->get_metaname_byvalue('user_type'); 

                                            //	$user = array_unique($user0);
                                            foreach($user as $k=>$value)
                                            {
                                            if($user[$k]['meta_value2']=='1'){continue;}
                                            echo "<option value='".$user[$k]['value2']."'>".$user[$k]['value1']."</option>";
                                            }
                                            ?>
                                            </select>	
                                        </div>
                                        <div class="col-sm-2">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="email" value="">	
                                        </div>
                                        <div class="col-sm-2">
                                            <label>Contact</label>
                                            <input type="text" class="form-control" name="contact" value="">	
                                        </div>

                                        
                                    
                                        <div class="col-sm-2"><br>
                                            <input onclick="form_submit('user')" type="button" name="submit" value="Save" class="btn btn-success btn-md">
                                            <input type="reset" name="reset" value="reset" class="btn btn-warning btn-md">
                                        </div>	
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                
		<div class="col-sm-12">
			<table class="table" id="data-table">
				<thead>
					<tr>
						<th>S.No.</th>
						<th>Name</th>
						<th>Employee Code</th>
						<th>Password</th>
						<th>Type</th>
						<th>Contact</th>
						<th>Email</th>
                        <th>Profile</th>
						<th>Edit</th>
						<th>Utility</th>
					</tr>
				</thead>
				 <tbody>
					<?php $allbranch = $admin->get_alluser(); 
					$counter =1;
					foreach ($allbranch as $k => $value) {
					    
					              $utype=$admin->get_metaname_byvalue2('user_type',$allbranch[$k]['utype']);  
            			
						?>
						
					<tr id="<?php echo $allbranch[$k]['id'];?>">
						<td><?php echo $counter++;?></td>
						<td><?php echo $allbranch[$k]['uname'];?></td>
						<td><?php echo'SH/'.$allbranch[$k]['id'];?></td>
						<td><?php echo $allbranch[$k]['upass'];?></td>
						<td><?php echo $utype[0]['value1'];?></td>
						<td><?php echo $allbranch[$k]['ucontact'];?></td>
						<td><?php echo $allbranch[$k]['uemail'];?></td>
                        <th>
                            <a href="<?php echo $base_url.'index.php?action=dashboard&page=hr_emp_profile&id='.$allbranch[$k]['id'];?>" class="btn btn-info btn-xs">Report</a>
                        </th>
						<th>
							<input type="button" name="room" onclick="show_page_model('index.php?action=nocss_pages&page=admin_edit_user&id=<?php echo $allbranch[$k]['id'].'&type=admin';?>')" data-toggle="modal" data-target="#myModal"  class="btn btn-xs btn-warning" value="Edit">
						</th>
						<td><input type="button" onclick="deleteme('admin','delete_user','<?php echo $allbranch[$k]['id'];?>')" class="btn btn-xs btn-danger" value="Delete"></td>

					</tr>
				<?php }?>
				</tbody> 
			</table>
		</div>
	</div>
            </section>

        </div>
    </div>            