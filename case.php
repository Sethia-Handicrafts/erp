
<?php

switch ($action) {
				
case "dashboard":
 		if($_GET['action']=='dashboard')
 		{
 			
 			//-- no css modal popup
			if(isset($_GET['nocss']))
			{
				if(!file_exists("web/".$_GET['nocss'].".php"))
 						{require_once("web/404.php");}
 					else
 						{require_once("web/".$_GET['nocss'].".php");}
			}
			else if(isset($_GET['page']))
 				{
 					require_once("web/header.php");
					require_once("web/menu.php");
 					//============================================ OPEN ALL PAGES		
 					if(!file_exists("web/".$_GET['page'].".php"))
 						{require_once("web/404.php");}
 					else
 						{require_once("web/".$_GET['page'].".php");}
 					
 					require_once("web/footer.php");
 				}
 			else
 				{require_once("web/dashboard.php");}
 		}
 		break;
//--- dashboard closed

//--- leads open
case "leads":
	if($_GET['action']=='leads')
	{
		
		//-- from masters 
		if($_GET['query']=='add-customer-type')
				{
					
						$save = $admin->create_meta($_POST['metaname'],$_POST['value1'],$_POST['value2'],'0'); 
						if($save)
						{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=lead_customertype&status=1';</script>";}   
						else{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=lead_customertype&status=2';</script>";}
				}


		if($_GET['query']=='create_new')
		{
			$file=array();
			if(isset($_FILES['attachment']))
			{		
				foreach($_FILES['attachment']['name'] as $k=>$v)
				{
					$file[] = $admin->upload_file_multi($_FILES['attachment']['name'][$k],$_FILES['attachment']['tmp_name'][$k]);
				}
			}
			$attachment = implode(",",($file));
			
			//--get targeted date
			if(isset($_POST['targetted_date']))
			{ $target_date=$_POST['targetted_date'];}
			else
			{
			$target_date = $leads->get_group_one($_POST['groupid']);
			$target_date = $target_date[0]['lead_confirm_time'];
			$date_now=date('Y-m-d');
			$target_date = date('Y-m-d', strtotime($date_now. '+'.$target_date.' days')); 

			}
			
			$save=$leads->create_new($_POST['company'],$_POST['company_type'],$_POST['groupid'],$_POST['group_remak'],$_POST['userid'],$attachment,$target_date,$_POST['step']);
			if($save)
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=leads_feedback&status=1&id=$save';</script>";}
			else
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=lead_addnew&status=2';</script>";}


		}

		if($_GET['query']=='edit_lead')
		{
			
			
			$save=$leads->edit_lead($_POST['name'],$_POST['phone'],$_POST['email'],$_POST['city'],$_POST['state'],$_POST['country'],$_POST['designation'],$_POST['req'],$_POST['lp_url'],$_POST['form_id'],$_POST['company'],$_POST['status'],$_POST['id']);
			if($save)
			{echo "<div class='alert alert-success'>Lead Edited Successfully !!!</div>";}
			else
			{echo "<div class='alert alert-danger'>Something went wrong !!!</div>";}
		}

		
		if($_GET['query']=='create_group')
		{
			prinT_r($_POST);
			$save=$leads->create_group($_POST['gname'],$_POST['parent_group'],$_POST['lead_confirm_time'],$_POST['per_day_lead'],$_POST['color_code']);
			if($save)
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=lead_addgroup&status=1';</script>";}
			else
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=lead_addgroup&status=2';</script>";}
		}	

		if($_GET['query']=='get_details')
		{
			if($_GET['type']=='state')
			{
				$state=$admin->get_states($_GET['id']);
				echo "<option disabled='disbaled' selected='selected'>-Select States-</option>";
				foreach($state as $r=>$v)
				{
					echo "<option value='".$state[$r]['id']."'>".$state[$r]['name']."</option>";
				}
			}

			if($_GET['type']=='city')
			{
				$city=$admin->get_cities($_GET['id']);
				echo "<option disabled='disbaled' selected='selected'>-Select Cities-</option>";
				foreach($city as $r=>$v)
				{
					echo "<option value='".$city[$r]['id']."' >".$city[$r]['name']."</option>";
				}
			}
		}

		if($_GET['query']=='leads_feedback_save')
		{
			$save=$leads->save_feedback($_POST['id'],$_POST['feedback'],$_POST['status'],$_POST['next_feedback'],$_POST['qualified'],$_POST['feedback_type']);
			if($save)
			{
				echo "<div class='alert alert-success'>Feedback Saved Successfully !!!</div>";
			}
			else
			{	echo "<div class='alert alert-danger'>Something went wrong !!!</div>";}
		}

		if($_GET['query']=='upload_csv')
		{
			//header('Content-Type: application/json; charset=utf-8');

			$header=array();
			$bodyrow=array();
			$bodyrow2=array();
			$row = 1;
			$data='';
			$data0='';
			$column_names=array();
			$no_header=array();
			$yes_header=array();
			$no_column=array();
			$yes_column=array();
			//-- add columns in array
			$table_header=$admin->check_table_column('leads');
					foreach($table_header as $r=>$v)
					{
						array_push($column_names,$table_header[$r]['Field']);
					}


			if (($handle = fopen($_FILES['file']['tmp_name'], "r")) !== FALSE) {
				
				//--- set header
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
					$num = count($data);
					
					$row++;
					
					//-- add group id & handledby [ACTUAL]
					$x=array("column_nu"=>'x',"column_data"=>'group_id');	
					array_push($yes_header,$x);		
					$y=array("column_nu"=>'y',"column_data"=>'handledby');				
					array_push($yes_header,$y);	
					$z=array("column_nu"=>'z',"column_data"=>'targetted_date');					
					array_push($yes_header,$z);					

					

					//-- add header into array
					for ($c=0; $c < $num; $c++) {
					
						//-- check column exist or not
								
						if (in_array($data[$c],$column_names)) {							
						
							//multi dimension array for column nu chech
							$yes_header0=array("column_nu"=>$c,"column_data"=>$data[$c]);	
							array_push($yes_header,$yes_header0);	
							//echo "Yes! " . $data[$c] . " is present in the table!<br>";				
						}
						else
						{
							$no_header0=array("column_nu"=>$c,"column_data"=>$data[$c]);	
							array_push($no_header,$no_header0);	
							//array_push($no_header,$data[$c]);
						}						
						
					}
					
					//-- insert header in leads2
					$leads2_header=$leads->save_csv_records2($no_header,'000','header');

					if($row='1')
					{break;}

				}

				
				
				//----------  save row
				while (($data0 = fgetcsv($handle, 1000, ",")) !== FALSE) {
					$num = count($data0);
					//echo "<p> $num fields in line $row: <br /></p>\n";
					$row++;
					
					//-- add group id & handledby & company_type
					array_push($bodyrow,$_POST['group']);
					array_push($bodyrow,$_POST['userid']);
					array_push($bodyrow,$_POST['targetted_date']);

					//-- count nu of yes header
					$no_header_first = count($yes_header)-4; //becoz 3 (groupid, handledby and targetted day)
					
					//-- add yes header into array
					for ($c=0; $c < $num; $c++) {
						//echo $data0[$c] . "<br />\n";
						//-- replace special characters
						$data_str=str_replace( array( '\'', '"',',' , ';', '<', '>' ), ' ', $data0[$c]);
						
						
						array_push($bodyrow,$data_str);

						//--- todo (column count nu of no_header)
							
							if($no_header_first == $c)
							{$d=$c+1; break;} // $c+1 for correct record

						//-- save row as per the column 
						
					}
					
					$yes_header_col = implode(', ', array_map(function ($entry) {
						    return $entry['column_data'];
						  }, $yes_header));

					$max_id = $leads->save_csv_records($yes_header_col,$bodyrow);

					
					
					
					//-- insert other fileds in details 2 table	
					
					for ($e=$d; $e < $num; $e++) {
						$data_str=str_replace( array( '\'', '"',',' , ';', '<', '>' ), ' ', $data0[$e]);
						$data_str0=array("column_nu"=>$e, "column_data"=>$data_str);
						array_push($bodyrow2,$data_str0);
					}
					
					
					$details2 = $leads->save_csv_records2($bodyrow2,$max_id,'data');
					
					//-- empty the bodyrow
					$bodyrow = [];
					$bodyrow2 = [];
				}

				
				//- save hostiry
				$upload_details = $leads->upload_csv_details($_FILES['file']['name'],$row,$_POST['userid'],$_POST['group']);
				//- save alerts / notification
				$admin->save_alerts($_SESSION['uid'],'Lead Data Has Been Uploaded',$_POST['userid']);
				//-- close
				fclose($handle);

					

			}
			echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=lead_bulkupload&status=1';</script>";
		}

		// if($_GET['query']=='get_company_info')
		// 		{		
		// 			$details0=$admin->get_metaname_byvalue1($_GET['meta_name'],$_GET['detail2']);
		// 			foreach($details0 as $r=>$v)
		// 			{
		// 				echo "<option value='".$details0[$r]['value2']."'>".$details0[$r]['value2']."</option>";
		// 			}
		// 		}


		//-- getting value 3
		if($_GET['query']=='get_company_info')
		{		
			
			$details0=$admin->get_metaname_byvalue2($_GET['meta_name'],$_GET['id']);
			foreach($details0 as $k=>$v)
			{
				$type=$details0[$k]['value2_input'];
					if($type=='radio')
					{
						
						$details0=$admin->get_metaname_byvalue_multi_group($details0[$k]['meta_name'],$details0[$k]['value2'],'value2','value3');
						?>
						
						<select id="<?php echo $details0[0]['id'];?>" name="value2[]" class='form-control' onchange="get_details('<?php echo $details0[0]['id'];?>','<?php echo str_replace(' ','_',$details0[$k]['value2']);?>result2','<?php echo $base_url.'index.php?action=leads&query=get_company_info2&meta_name=lead_company_info&id=';?>')">
						<?php 
						echo "<option disabled='disabled' selected='selected'>-Select-</option>";
						$i=1;
						
							foreach($details0 as $k=>$v){
								echo "<option value='".$details0[$k]['value3']."'>".$details0[$k]['value3']."</option>";
							}
						echo "</select>";
						
						//-- becuase all select box repeating		
						break;
					}
					elseif($type=='checkbox')
					{?>
						<input id='<?php echo $details0[$k]['id'];?>text2' type='checkbox' name='value2[]' value='<?php echo $details0[$k]['value3'];?>' onclick="get_details('<?php echo $details0[$k]['id'];?>text2','<?php echo $details0[$k]['id'];?>result3','<?php echo $base_url.'index.php?action=leads&query=get_company_info2&meta_name=lead_company_info&id=';?>')">

						<label for='<?php echo $details0[$k]['id'];?>text2' ><?php echo $details0[$k]['value3'];?></label>
						<div id='<?php echo $details0[$k]['id'];?>result3'>
							 <!-- 	 -->
						</div>
						<hr>
					<?php }
					elseif($type=='textarea')
					{
						//-- label will be of 3 and input will be of 2
						echo "<label>".$details0[$k]['value3']."</label>";
						echo "<textarea col='5' row='4' name='value2[]' class='form-control'></textarea>";
						if($details0[$k]['value3']=='')
						{echo "<input type='hidden' name='value3[]'>";}
					}
					else
					{	
						if($details0[$k]['value2']=='Not Disclosed' || $details0[$k]['value2']=='Not Known'){}
						else {echo "<textarea col='5' row='4' name='value2' class='form-control'></textarea>";}
					}
			}
				
		}

		if($_GET['query']=='get_company_info2')
		{
			//-- check value 4 category
			//print_r($_GET);
			$details0=$admin->get_metaname_byvalue3($_GET['meta_name'],$_GET['id']);

			//-- get value 3
			//-- if value 3 is blank thats mean there is no multi  value4 availble stop here and cancel the loop
			$details1=$admin->get_metaname_byvalue_multi_group($details0[0]['meta_name'],$details0[0]['value2'],'value2','value3');
			if($details1[0]['value2']=='Not Known' || $details1[0]['value2']=='Not Disclosed')
			{}
			else if($details1[0]['value3']=='')
			{   
				//echo "<input type='text' name='value3[]' class='form-control'>";
			}

			//-- if value 3 is not blank    
			else
			{  
			   $value4_type=$details1[0]['value4_input'];
			   $value4=unserialize($details1[0]['value4']);
			   $value4=explode(",",$value4);
			   //-- change input type by for each
			   if($value4_type=='radio')
			   {
				echo "<select name='value3[]' class='form-control'>";
				echo "<option disbaled='disbaled' selected='selected'>-Select-</option>";
					foreach($value4 as $r)
					{
						echo "<option value='".$r."'>".$r."</option>";
					}
				echo "</select>";
			   }
			  
			}       
		}

		if($_GET['query']=='fileviewer')
				{
					echo '<object data="'.$base_url.'images/'.$_GET['file'].'" width="100%" height="auto"></object>';
				}	
				
		if($_GET['query']=='save_company_details')
		{
			//print_r($_POST);

					$lid = $_POST['lid'];
					$details = $_POST['details'];
					$value1 = $_POST['value1'];
					$value2 = $_POST['value2'];
					if(isset($_POST['value3'])){$value3 = $_POST['value3'];}else{$value3='';}
					if(isset($_POST['value4'])){$value4 = $_POST['value4'];}else{$value4='';}

					//-- if value 1 is array
					if(is_array($value1))
					{
						foreach($value1 as $key=>$value) 
									{ 
										$value1_single = mysqli_real_escape_string($con,$value1[$key]);
										$value2_single = mysqli_real_escape_string($con,$value2[$key]);
										if(is_array($value3))
										{$value3_single = mysqli_real_escape_string($con,$value3[$key]);}
										//=== save
										$save = $leads->leads_save_company_details($lid,$details,$value1_single,$value2_single,$value3_single,$value4); 
										
									}
									echo "<div class='alert alert-success'>Detail Saved !!!</div>"; 	
					}
					else
					{
						$save = $leads->leads_save_company_details($lid,$details,$value1,$value2,$value3,$value4); 
						if(!$save)
						{
							echo "<div class='alert alert-danger'>Something went wrong !!</div>";
						}
						else
						{
							echo "<div class='alert alert-success'>Detail Saved !!!</div>"; 	
						}
					}
			
						
		}
		if($_GET['query']=='company_research')		
		{
					$metaname = $_POST['meta_name'];
					$value1 = $_POST['value1'];
					$value1_input = $_POST['input_type_value1'];
					$value2 = $_POST['value2'];
					$value2_input = $_POST['input_type_value2'];
					$value3_array = $_POST['value3'];
					$value4_array = $_POST['value4'];
					$value3_input_array = $_POST['input_type_value3'];
					$value4_input_array = $_POST['input_type_value4'];
					
					
					if(isset($_POST['value3']))
					{
									foreach($value3_array as $key=>$value) 
									{ 
										$value3 = mysqli_real_escape_string($con,  $value3_array[$key]);
										$value4 = mysqli_real_escape_string($con,  $value4_array[$key]);
										$value3_input = mysqli_real_escape_string($con,  $value3_input_array[$key]);
										$value4_input = mysqli_real_escape_string($con,  $value4_input_array[$key]);

										$value4 = explode(",",$value4);
										
										$value4=serialize($value4);
										//=== save
										$save = $leads->meta_lead_company_details($metaname,$value1,$value2,$value3,$value4,$value1_input,$value2_input,$value3_input,$value4_input); 
									}
					}
					else
					{
						$save = $leads->meta_lead_company_details($metaname,$value1,$value2,'','',$value1_input,$value2_input,'',''); 
					}

					echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=lead_add_company_info&status=1';</script>"	;	
		}

		if($_GET['query']=='delete_company_info')		
		{ $delete = $admin->delete_meta($_GET['id']);}

		if($_GET['query']=='lead_edit_company_info_update')
		{	
			$value4=explode(",",$_POST['value4']);
			$value4=serialize($value4);
			$update=$leads->update_meta_company($_POST['value1'],$_POST['value2'],$_POST['value3'],$value4,$_POST['value2_input'],$_POST['value3_input'],$_POST['value4_input'],$_POST['id']);
			if($update)
			{echo "<div class='alert alert-success'>Updated Successfully !!!";}
			else{echo "<div class='alert alert-danger'>Something went wrong!!!";}
		}

		if($_GET['query']=='qulified_lead')
		{
			$update=$leads->update_lead_qualified($_POST['id'],$_POST['qualified']);
			
			//-- send notification to all MD if disqualified
										if($_POST["qualified"]=='1'){$qualified= "Qualified";}
										if($_POST["qualified"]=='2'){$qualified= "Dis-Qualified";}
										
			//-- lead gen to MD
			if($_SESION['utype']=='6')
				{
				$mds=$admin->getonetype_user('9');
				foreach($mds as $r=>$v)
				{$admin->save_alerts($_SESSION['uid'],"Lead #SHL$_POST[id] Has Been $qualified",$mds[$r]['id']);}
				exit();
				}

			//-- MD to lead gen
			if($_SESION['utype']=='9')
				{
					//--this time we need lead gen id
					$lead_genid=$lead->get_lead_one($_POST['id']);
					$admin->save_alerts($_SESSION['uid'],"Lead #SHL$_POST[id] Has Been $qualified",$lead_genid[0]['handledby']);
				}	

			//--- next step proceed
				
			if($update)
			{echo "<div class='alert alert-success'>Lead Qualified Status Changed Successfully !!!";}
			else{echo "<div class='alert alert-danger'>Something went wrong!!!";}
			
		}

		if($_GET['query']=='qulified_lead')
		{
			$update=$leads->update_lead_qualified($_POST['id'],$_POST['qualified']);
			
			//-- send notification to all MD if disqualified
										if($_POST["qualified"]=='1'){$qualified= "Qualified";}
										if($_POST["qualified"]=='2'){$qualified= "Dis-Qualified";}
										
			//-- lead gen to MD
			if($_SESION['utype']=='6')
				{
				$mds=$admin->getonetype_user('9');
				foreach($mds as $r=>$v)
				{$admin->save_alerts($_SESSION['uid'],"Lead #SHL$_POST[id] Has Been $qualified",$mds[$r]['id']);}
				
				}

			//-- MD to lead gen
			if($_SESION['utype']=='9')
				{
					//--this time we need lead gen id
					$lead_genid=$leads->get_lead_one($_POST['id']);
					$admin->save_alerts($_SESSION['uid'],"Lead #SHL$_POST[id] Has Been $qualified",$lead_genid[0]['handledby']);
				}	

			//--- next step proceed
				
			if($update)
			{echo "<div class='alert alert-success'>Lead Qualified Status Changed Successfully !!!";}
			else{echo "<div class='alert alert-danger'>Something went wrong!!!";}
			
		}

		//-- company audit by business development manager
		if($_GET['query']=='comp_qulified_lead')
		{
			$update=$leads->update_lead_audit($_POST['id'],$_POST['qualified'],$_POST['audit_by']);
			//-- send notification to all MD if disqualified
			if($_POST["qualified"]=='1'){$qualified= "Approved";}
			if($_POST["qualified"]=='2'){$qualified= "Dis-Approved";}
			//--send notification to lead manager
			$lead_genid=$leads->get_lead_one($_POST['id']);
					$admin->save_alerts($_SESSION['uid'],"Lead #SHL$_POST[id] Has Been $qualified by Business devlopment manager",$lead_genid[0]['handledby']);
			//-- send notification to MD 
				$mds=$admin->getonetype_user('9');
				foreach($mds as $r=>$v)
				{$admin->save_alerts($_SESSION['uid'],"Lead #SHL$_POST[id] Has Been $qualified",$mds[$r]['id']);}
			//--update the step to 11 and 
				$update=$leads->step_change($_POST['id'],'11');
				echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=leads_feedback&id=$_POST[id]&status=1';</script>";

		}

		//-- company audit by MD
		if($_GET['query']=='comp_qulified_lead_md')
		{
			$update=$leads->update_lead_audit_md($_POST['id'],$_POST['qualified']);
			//-- send notification to all MD if disqualified
			if($_POST["qualified"]=='3'){$qualified= "Approved";}
			if($_POST["qualified"]=='4'){$qualified= "Dis-Approved";}
			//--send notification to lead manager
			$lead_genid=$leads->get_lead_one($_POST['id']);
					$admin->save_alerts($_SESSION['uid'],"Lead #SHL$_POST[id] Has Been $qualified By MD",$lead_genid[0]['handledby']);
			//-- send notification to MD 
				$mds=$admin->getonetype_user('9');
				foreach($mds as $r=>$v)
				{$admin->save_alerts($_SESSION['uid'],"Lead #SHL$_POST[id] Has Been $qualified By MD",$mds[$r]['id']);}
			//--update the step to 11 
				$update=$leads->step_change($_POST['id'],'12');
				echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=leads_feedback&id=$_POST[id]&status=1';</script>";

		}

		//-- step changhes
		if($_GET['query']=='step_change')
			{				
				$update=$leads->step_change($_POST['lid'],$_POST['step']);
				$same_page=$_POST['step']-1;
				if($update)
				{
					echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=leads_feedback&id=$_POST[lid]&status=1';</script>";
				}
				else
				{
					echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=leads_feedback&id=$_POST[lid]&status=2';</script>";
				}
			}

			if($_GET['query']=='save_step_9')
			{
				//print_r($_POST);
				//-- save to profile
				$save0=$leads->save_comp_profile($_POST['lid'],$_POST['firstname'],$_POST['lastname'],$_POST['gender'],$_POST['companyname'],$_POST['designation_now'],$_POST['phone'],$_POST['country'],$_POST['state'],$_POST['city'],$_POST['zipcode'],$_POST['timezone'],$_POST['dob'],$_POST['family_linkage'],$_POST['religion'],$_POST['goal'],$_POST['point'],$_POST['motivation'],$_POST['channel'],$_POST['current_since']);
				//-- save to experience
						$designation_array = $_POST['designation'];
						$from_array = $_POST['from'];
						$to_array = $_POST['to'];
						$company_array = $_POST['company'];
						 for ($i = 0; $i < count($designation_array); $i++) 
									{
										$company = mysqli_real_escape_string($con, $company_array[$i]);
										$from = mysqli_real_escape_string($con, $from_array[$i]);
										$to = mysqli_real_escape_string($con, $to_array[$i]);
										$designation = mysqli_real_escape_string($con, $designation_array[$i]);
	
										$save1=$leads->edit_comp_experience($company,$from,$to,$designation,$_POST['lid']);
									}


				//-- send notification to all BDM
				$bdm=$admin->getonetype_user('9');
				foreach($bdm as $r=>$v)
				{$admin->save_alerts($_SESSION['uid'],"Lead #SHL$_POST[id] Has Been $qualified By MD",$bdm[$r]['audit_by']);}

				$admin->save_alerts($_SESSION['uid'],"Lead #SHL$_POST[lid] has been received for Company Profile Audit",$lead_genid[0]['audit_by']);
				//-- update next step
				$leads->step_change($_POST['lid'],'10');
				echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=leads_feedback&id=$_POST[lid]&status=1';</script>";
			}	

			if($_GET['query']=='step_12')
			{
					$lid = $_POST['lid'];
					$step= '12';
					$value1_array = $_POST['contact_person'];
					$value2_array = $_POST['contact'];
					
					foreach($value1_array as $key=>$value) 
					{ 
						$value1 = mysqli_real_escape_string($con,  $value1_array[$key]);
						$value2 = mysqli_real_escape_string($con,  $value2_array[$key]);
						//=== save
						$save = $leads->leads_company_more_details ($lid,$step,$value1,$value2); 
					}
					//-- update next step
					
				$leads->step_change($_POST['lid'],'13');
				echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=leads_feedback&id=$_POST[lid]&status=1';</script>";
			}

			//--- from step 13
			if($_GET['query']=='step_12_update')
			{
					$id_array = $_POST['id'];
					$value3_array = $_POST['value3'];
					
					foreach($value3_array as $key=>$value) 
					{ 
						$value3 = mysqli_real_escape_string($con,  $value3_array[$key]);
						$id = mysqli_real_escape_string($con,  $id_array[$key]);
						//=== save
						$query="value3=$value3";
						$save = $leads->leads_company_more_details_update ($id,$query); 
						
					}
					//-- update next step
					
				$leads->step_change($_POST['lid'],'13');
				echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=leads_feedback&id=$_POST[lid]&status=1';</script>";
			}

			

			//-- update only no step process
			if($_GET['query']=='step_14_update')
			{
				
					$lid = $_POST['lid'];
					$value3_array = $_POST['value3'];
					$value4_array = $_POST['value4'];
					$id_array = $_POST['id'];

					foreach($value3_array as $key=>$value) 
					{ 
						$value3 = mysqli_real_escape_string($con,  $value3_array[$key]);
						$value4 = mysqli_real_escape_string($con,  $value4_array[$key]);
						$id = mysqli_real_escape_string($con,  $id_array[$key]);
						//=== save
						$query="value3='$value3', value4='$value4'";
						$save = $leads->leads_company_more_details_update ($id,$query); 
					}

				
				echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=leads_feedback&id=$_POST[lid]&status=1';</script>";
			}
			if($_GET['query']=='step_14')
			{
				$leads->step_change($_POST['lid'],'15');
				echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=leads_feedback&id=$_POST[lid]&status=1';</script>";
			}


			//-- ste 15 update
			if($_GET['query']=='step_15_update')
			{
					$lid = $_POST['lid'];
					$value5_array = $_POST['value5'];
					$id_array = $_POST['id'];

					foreach($value5_array as $key=>$value) 
					{ 
						$value5 = mysqli_real_escape_string($con,  $value5_array[$key]);
						$value6 = date("Y-m-d h:i:s");
						$id = mysqli_real_escape_string($con,$id_array[$key]);
						//=== save
						$query="value5='$value5', value6='$value6'";
						$save = $leads->leads_company_more_details_update($id,$query); 
					}

				
				echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=leads_feedback&id=$_POST[lid]&status=1';</script>";
			}
			if($_GET['query']=='step_15')
			{
				$leads->step_change($_POST['lid'],'16');
				echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=leads_feedback&id=$_POST[lid]&status=1';</script>";
			}

			

			//-- for step 16 to 20
			if($_GET['query']=='step_16to20_update')
			{
					$lid = $_POST['lid'];
					$value3_array = $_POST['value3'];
					$value7_array = $_POST['value7'];
					$value8_array = $_POST['value8'];
					$value9_array = $_POST['value9'];
					$value10_array = $_POST['value10'];
					$value11_array = $_POST['value11'];
					$id_array = $_POST['id'];

					foreach($value7_array as $key=>$value) 
					{ 
						
						$value3 = mysqli_real_escape_string($con,  $value3_array[$key]);

						$value7 = mysqli_real_escape_string($con,  $value7_array[$key]);
						//-- yes or or record date of 7
						if($value7=='1'){$value8=date('Y-m-d h:i:s');}
						else {$value8 = mysqli_real_escape_string($con,  $value8_array[$key]);}

						$value9 = mysqli_real_escape_string($con,  $value9_array[$key]);
						$value10 = mysqli_real_escape_string($con,  $value10_array[$key]);
						$value11 = mysqli_real_escape_string($con,  $value11_array[$key]);
						
						$id = mysqli_real_escape_string($con,$id_array[$key]);
						//=== save
						$query="value3='$value3', value7='$value7', value8='$value8', value9='$value9', value10='$value10', value11='$value11'";
						$save = $leads->leads_company_more_details_update($id,$query); 
					}

				
				echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=leads_feedback&id=$_POST[lid]&status=1';</script>";
			}

			//-- upgrade the step only using by other pages too
			if($_GET['query']=='step_16to20')
			{
				$leads->step_change($_POST['lid'],$_POST['step']);
				echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=leads_feedback&id=$_POST[lid]&status=1';</script>";
			}

			if($_GET['query']=='step_30to38_update')
			{
				$id_array = $_POST['id'];
				$meeting_date_array = $_POST['meeting_date'];
				$meeting_location_array = $_POST['meeting_location'];
				$meeting_req_array = $_POST['meeting_req'];
				
				$meeting_images_array = $_POST['meeting_images'];
				$meeting_present_array = $_POST['meeting_present'];
				$meeting_status_array = $_POST['meeting_status'];
				$meeting_updates_array = $_POST['meeting_updates'];
				$meeting_call_array = $_POST['meeting_call'];
				$meeting_updates2_array = $_POST['meeting_updates2'];
				$meeting_intouch_array = $_POST['meeting_intouch'];
				$meeting_drip_array = $_POST['meeting_drip'];

				foreach($id_array as $key=>$value) 
				{ 
					$meeting_date = mysqli_real_escape_string($con,  $meeting_date_array[$key]);
					$meeting_location = mysqli_real_escape_string($con,  $meeting_location_array[$key]);
					$meeting_req = mysqli_real_escape_string($con,  $meeting_req_array[$key]);
					//--multi images
					$meeting_images = mysqli_real_escape_string($con,  $meeting_images_array[$key]);
					$file=array();
						if(isset($_FILES[$meeting_images]))
						{		
							foreach($_FILES[$meeting_images]['name'] as $k=>$v)
							{
								$file[] = $admin->upload_file_multi($_FILES[$meeting_images]['name'][$k],$_FILES[$meeting_images]['tmp_name'][$k]);
							}
						}
						$meeting_images = implode(",",($file));

					
					$meeting_present = mysqli_real_escape_string($con,  $meeting_present_array[$key]);
					$meeting_status = mysqli_real_escape_string($con,  $meeting_status_array[$key]);
					$meeting_updates = mysqli_real_escape_string($con,  $meeting_updates_array[$key]);
					$meeting_call = mysqli_real_escape_string($con,  $meeting_call_array[$key]);
					$meeting_updates2 = mysqli_real_escape_string($con,  $meeting_updates2_array[$key]);
					$meeting_intouch = mysqli_real_escape_string($con,  $meeting_intouch_array[$key]);
					$meeting_drip = mysqli_real_escape_string($con,  $meeting_drip_array[$key]);

					$id = mysqli_real_escape_string($con,$id_array[$key]);
			
					$query="meeting_date='$meeting_date', meeting_location='$meeting_location', meeting_req='$meeting_req', meeting_images='$meeting_images', meeting_present='$meeting_present', meeting_location='$meeting_location', meeting_status='$meeting_status', meeting_updates='$meeting_updates', meeting_call='$meeting_call', meeting_updates2='$meeting_updates2', meeting_intouch='$meeting_intouch',meeting_drip='$meeting_drip' ";
					
					$save = $leads->leads_company_more_details_update ($id,$query); 

					//-- send meeting notification to MD
					$lead_genid=$leads->get_lead_one($_POST['lid']);
					
					$mds=$admin->getonetype_user('9');
					foreach($mds as $r=>$v)
					{$admin->save_alerts($_SESSION['uid'],"Lead #SHL$_POST[lid] Has Been Schduled on $meeting_date at $meeting_location",$mds[$r]['id']);}
					//-- send notification to BDM
					$admin->save_alerts($_SESSION['uid'],"Lead #SHL$_POST[lid] Has Been Schduled on $meeting_date at $meeting_location",$lead_genid[0]['audit_by']);
				}

				echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=leads_feedback&id=$_POST[lid]&status=1';</script>";
			}

			//-- upgrade the step only using by other pages too
			if($_GET['query']=='step_30to38')
			{
				//-- send notification to BDM
				$admin->save_alerts($_SESSION['uid'],$_POST['msg'],$_POST['msgto']);
				$leads->step_change($_POST['lid'],$_POST['step']);
				echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=leads_feedback&id=$_POST[lid]&status=1';</script>";

				//-- save grapic designer in leads table if step = 32
				if($_POST['step']=='32')
				{
					$leads->save_leads_gd($_POST['lid'],$_POST['msgto']);
				}

			}
	}
	break;
//--- leads closed


//-- sales open
case "sales":
	if($_GET['action']=='sales')
	{
		
		if($_GET['query']=='add-meta')
				{
						if($_POST['parent_meta'])
						{$save = $admin->create_meta_withparent($_POST['metaname'],$_POST['value1'],$_POST['value2'],'0',$_POST['parent_meta'],$_POST['final_step']); }
						else
						{$save = $admin->create_meta($_POST['metaname'],$_POST['value1'],$_POST['value2'],'0'); }
						
						if($save)
						{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=".$_POST['pagename']."&status=1';</script>";}   
						else
						{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=".$_POST['pagename']."&status=2';</script>";}
				}
		if($_GET['query']=='get_outcome')
				{		
					$details=$admin->get_metaname_byid($_GET['stage']);
					$details0=explode(',',$details[0]['value2']);
					foreach($details0 as $r)
					{
						echo "<option value='".$r."'>".$r."</option>";
					}
				}
		if($_GET['query']=='get_status')
				{		
					$details=$admin->get_metaname_byparent($_GET['stage']);
					foreach($details as $r=>$v)
					{
						$final = $details[$r]['final_step'];
						echo "<option value='".$details[$r]['value2']."'>";
						if($final=='1'){$final='<i class="badge badge-primary">(Final)</i>';}else{$final='';}
						echo $details[$r]['value1'].$final.'</option>';
					}
				}
		if($_GET['query']=='sales_feedback_save')
				{
					$save=$sales->save_sales_feedback($_POST['sales_lid'],$_POST['feedback'],$_POST['status'],$_POST['stage'],$_POST['outcome'],$_POST['handledby'],$_POST['next_feedback_date']);
						if($save)
						{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=sales_feedback&status=1&id=".$_POST['sales_lid']."';</script>";}   
						else
						{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=sales_feedback&status=2&id=".$_POST['sales_lid']."';</script>";}
				}	


				//================= prospect starts
				if($_GET['query']=='prospect1')
				{		
					//--0 is btype (means its a prospect)
					$save=$sales->create_beneficiery($_POST['fname'],$_POST['lname'],$_POST['phone'],$_POST['email'],$_POST['cname'],$_POST['ctype'],$_POST['designation'],$_POST['address'],$_POST['country'],$_POST['state'],$_POST['city'],$_POST['zipcode'],$_POST['regtype'],$_POST['regnu'],'0');
					if($save)
						{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=sales_addprospect&status=1&id=".$save."';</script>";}   
						else
						{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=sales_addprospect&status=2&id=".$save."';</script>";}
				}
		
				if($_GET['query']=='prospect2')
				{
					$bid = $_POST['bid'];
					$value1 = $_POST['value1'];
					$value2 = $_POST['value2'];
					
					//-- if value 1 is array
					if(is_array($value1))
					{
						foreach($value1 as $key=>$value) 
									{ 
										$value1_single = mysqli_real_escape_string($con,$value1[$key]);
										$value2_single = mysqli_real_escape_string($con,$value2[$key]);
										//=== save
										$save = $sales->beneficiery_details($bid,$value1_single,$value2_single); 
										
									}
									
					}
					echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=sales_addprospect&status=1&id=".$bid."&tab=profile12';</script>";
				}
				
				
				
				
				if($_GET['query']=='prospect3')
				{
					$save=$sales->sales_prospect_type($_POST['id'],$_POST['type_of_client']);
					if($save)
						{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=sales_addprospect&status=1&id=".$_POST['id']."';</script>";}   
						else
						{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=sales_addprospect&status=2&id=".$_POST['id']."';</script>";}
				}

				if($_GET['query']=='prospect3_1')
				{
					$save=$sales->sales_prospect_tandc($_POST['pid'],$_POST['incoterms'],$_POST['incoterms_port'],$_POST['incoterms_destination'],$_POST['shipping'],$_POST['shipping_basis'],$_POST['currency'],$_POST['liability'],$_POST['liability_per'],$_POST['payment_terms'],$_POST['advance_payment_per'],$_POST['lc_advance'],$_POST['tandc_lc'],$_POST['progress_payment'],$_POST['progress_paymentstage1'],$_POST['progress_paymentstage2'],$_POST['progress_paymentstage3'],$_POST['progress_paymentstage4'],$_POST['balance'],$_POST['credit_period'],$_POST['retention'],$_POST['retention_period'],$_POST['process_payment'],$_POST['document'],$_POST['document2'],$_POST['price_validity'],$_POST['price_validity_year'],$_POST['social_audit'],$_POST['SA8000'],$_POST['audit1'],$_POST['audit2'],$_POST['audit3'],$_POST['audit4'],$_POST['ctpat'],$_POST['shipment_penelty'],$_POST['late_shipment_per'],$_POST['late_shipment_max_per'],$_POST['chargeback'],$_POST['chargeback_labour_rate'],$_POST['chargeback_labour_rate_after'],$_POST['chargeback_labour_limit'],$_POST['commissionable'],$_POST['commission_to'],$_POST['commission_name'],$_POST['commission_per'],$_POST['sample'],$_POST['sample_qty0'],$_POST['sample_qty'],$_POST['photography'],$_POST['sample_paid_client'],$_POST['photography1'],$_POST['photography_qty'],$_POST['photography_qty_req'],$_POST['packing'],$_POST['packing_notes'],$_POST['product_testing'],$_POST['product_testing_frequency'],$_POST['product_testing_paid'],$_POST['packing_testing'],$_POST['packing_testing_frequency'],$_POST['packing_testing_paid'],$_POST['fsc'],$_POST['fsc_years'],$_POST['fsc_current'],$_POST['fsc_target1'],$_POST['fsc_target2'],$_POST['fsc_target3'],$_POST['fsc_target_no'],$_POST['branding'],$_POST['branding_req'],$_POST['added_by']);
					if($save)
						{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=sales_addprospect&status=1&id=".$_POST['pid']."';</script>";}   
						else
						{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=sales_addprospect&status=2&id=".$_POST['pid']."';</script>";}


						//--send approval to admin
						$mds=$admin->getonetype_user('9');
						foreach($mds as $r=>$v)
						{$admin->save_alerts($_SESSION['uid'],"Prospect request Has Been Received For Approval",$mds[$r]['id']);}
				}

		
				if($_GET['query']=='prospect3_1_update')
				{
					$save=$sales->sales_prospect_tandc_update($_POST['pid'],$_POST['incoterms'],$_POST['incoterms_port'],$_POST['incoterms_destination'],$_POST['shipping'],$_POST['shipping_basis'],$_POST['currency'],$_POST['liability'],$_POST['liability_per'],$_POST['payment_terms'],$_POST['advance_payment_per'],$_POST['lc_advance'],$_POST['tandc_lc'],$_POST['progress_payment'],$_POST['progress_paymentstage1'],$_POST['progress_paymentstage2'],$_POST['progress_paymentstage3'],$_POST['progress_paymentstage4'],$_POST['balance'],$_POST['credit_period'],$_POST['retention'],$_POST['retention_period'],$_POST['process_payment'],$_POST['document'],$_POST['document2'],$_POST['price_validity'],$_POST['price_validity_year'],$_POST['social_audit'],$_POST['SA8000'],$_POST['audit1'],$_POST['audit2'],$_POST['audit3'],$_POST['audit4'],$_POST['ctpat'],$_POST['shipment_penelty'],$_POST['late_shipment_per'],$_POST['late_shipment_max_per'],$_POST['chargeback'],$_POST['chargeback_labour_rate'],$_POST['chargeback_labour_rate_after'],$_POST['chargeback_labour_limit'],$_POST['commissionable'],$_POST['commission_to'],$_POST['commission_name'],$_POST['commission_per'],$_POST['sample'],$_POST['sample_qty0'],$_POST['sample_qty'],$_POST['photography'],$_POST['sample_paid_client'],$_POST['photography1'],$_POST['photography_qty'],$_POST['photography_qty_req'],$_POST['packing'],$_POST['packing_notes'],$_POST['product_testing'],$_POST['product_testing_frequency'],$_POST['product_testing_paid'],$_POST['packing_testing'],$_POST['packing_testing_frequency'],$_POST['packing_testing_paid'],$_POST['fsc'],$_POST['fsc_years'],$_POST['fsc_current'],$_POST['fsc_target1'],$_POST['fsc_target2'],$_POST['fsc_target3'],$_POST['fsc_target_no'],$_POST['branding'],$_POST['branding_req'],$_POST['added_by'],$_POST['id']);
					if($save)
						{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=sales_addprospect&status=1&id=".$_POST['pid']."';</script>";}   
						else
						{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=sales_addprospect&status=2&id=".$_POST['pid']."';</script>";}


						//--send approval to admin
						$mds=$admin->getonetype_user('9');
						foreach($mds as $r=>$v)
						{$admin->save_alerts($_SESSION['uid'],"Prospect request Has Been Received For Approval",$mds[$r]['id']);}
				}

				if($_GET['query']=='delete_moredetails_prospect')
				{
					$sales->delete_moredetails_prospect($_GET['id']);
				}
				//================= prospect ends


				//----------------- rfq only
				if($_GET['query']=='rfq_additem')
				{
					$created_by = $_SESSION['uid'];
					$sid=$sales->rfq_step0($_POST['prospect'],$_POST['rfq_number'],$_POST['date_of_rfq'],$_POST['created_date'],$created_by);

					$sku=$_POST['sku'];
					$item_type=$_POST['item_type'];
					foreach($sku as $key=>$value) 
									{ 
										$sku_single = mysqli_real_escape_string($con,$sku[$key]);
										$item_type_single = mysqli_real_escape_string($con,$item_type[$key]);
										//=== save
										$save = $sales->rfq_items($sku_single,$item_type_single,$sid); 
										
									}

						echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=sales_rfq_edit&status=1&id=".$sid."';</script>";
				}

				

				if($_GET['query']=='delete_rfq_item')
				{
					$id=$_GET['id'];
					$save=$sales->delete_rfq_item($id);
				}
//--------- step editing open

				//========= step 0.0
				if($_GET['query']=='rfq_item_edit')
				{
					
					$sales->rfq_step0_edit($_POST['prospect'],$_POST['rfq_number'],$_POST['date_of_rfq'],$_POST['created_date'],$_POST['id']);
					$sid=$_POST['id'];
					$sku=$_POST['sku'];
					$item_type=$_POST['item_type'];
					$item_id=$_POST['itemid'];
					foreach($sku as $key=>$value) 
									{ 
										$sku_single = mysqli_real_escape_string($con,$sku[$key]);
										$item_type_single = mysqli_real_escape_string($con,$item_type[$key]);
										$item_id_single = mysqli_real_escape_string($con,$item_id[$key]);
										//=== save
										if(empty($item_id_single))
										{$save = $sales->rfq_items($sku_single,$item_type_single,$sid);}
										else{$save = $sales->rfq_items_edit($sku_single,$item_type_single,$item_id_single); }										
									}

									echo "<div class='alert alert-success'>RFQ Updated Successfully</div>";
				}
				//========= step 0.5 add client items
				if($_GET['query']=='step0_edit_items_client')
				{
				
					$sid=$_POST['sid'];
					$sku=$_POST['tempsku'];
					$item_type=$_POST['item_type'];
					$tempname=$_POST['tempname'];
					$cat=$_POST['category'];

					foreach($sku as $key=>$value) 
									{ 
										$sku_single = mysqli_real_escape_string($con,$sku[$key]);
										$item_type_single = mysqli_real_escape_string($con,$item_type[$key]);
										$tempname_single = mysqli_real_escape_string($con,$tempname[$key]);
										$cat_single = mysqli_real_escape_string($con,$cat[$key]);
										//--file upload
										$filename=$admin->upload_file_multi($_FILES['file']['name'][$key],$_FILES['file']['tmp_name'][$key]);
										//-- temp save
										$pid=$product->tempsave($sku_single,$filename,$tempname_single,$cat_single);
										//=== save
									$save = $sales->rfq_items_2($pid,$item_type_single,$sid,$filename); 
										
									}

						echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=sales_rfq_edit&status=1&id=".$sid."';</script>";

				}
				//========= step 0.5
				if($_GET['query']=='rfq_step05_edit')
				{
					$sid=$_POST['sid'];
					$itemid=$_POST['itemid'];
					$length=$_POST['length'];
					$width=$_POST['width'];
					$height=$_POST['height'];
					$moq=$_POST['moq'];
					//-- additional 
					$mtype=$_POST['mtype'];
					$wood=$_POST['wood'];
					$fitting=$_POST['fitting'];
					$finish=$_POST['finish'];
					$packing=$_POST['packing'];
					$branding=$_POST['branding'];

					

					foreach($itemid as $key=>$value) 
									{ 
										$itemid_single = mysqli_real_escape_string($con,$itemid[$key]);
										$length_single = mysqli_real_escape_string($con,$length[$key]);
										$width_single = mysqli_real_escape_string($con,$width[$key]);
										$height_single = mysqli_real_escape_string($con,$height[$key]);
										$moq_single = mysqli_real_escape_string($con,$moq[$key]);
										$wood_single = mysqli_real_escape_string($con,$wood[$key]);
										$mtype_single = mysqli_real_escape_string($con,$mtype[$key]);
										$fitting_single = mysqli_real_escape_string($con,$fitting[$key]);
										$finish_single = mysqli_real_escape_string($con,$finish[$key]);
										$packing_single = mysqli_real_escape_string($con,$packing[$key]);
										$branding_single = mysqli_real_escape_string($con,$branding[$key]);
										
										//=== update
										$save = $sales->rfq_step0_5_update($itemid_single,$length_single,$width_single,$height_single,$moq_single,$sid,$wood_single,$mtype_single,$fitting_single,$finish_single,$packing_single,$branding_single); 
										
									}

						echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=sales_rfq_edit&status=3&id=".$sid."';</script>";
				}
				//========= step 0.5 mterial add
				if($_GET['query']=='rfq_step05_edit_material')
				{
					$sid=$_POST['sid'];
					$itemid=$_POST['pid'];
					$capability=$_POST['capability'];
					$remark=$_POST['remark'];
					foreach($capability as $key=>$value) 
									{ 
										
										$capability_single = mysqli_real_escape_string($con,$capability[$key]);
										$remark_single = mysqli_real_escape_string($con,$remark[$key]);
										//=== update
										$save = $sales->rfq_step0_5_material($sid,$itemid,$capability_single,$remark_single); 
										
									}
									echo "<div class='alert alert-success'>Material Saved</div>";
				}
				//========= step 0.5 delete custom products
				if($_GET['query']=='delete_material_cutom')
				{
					$save = $sales->delete_material_cutom($_GET['id']); 
				}
				//========= step 2.0 designger edit
				if($_GET['query']=='rfq_step20_edit')
				{
					$sid=$_POST['sid'];
					$itemid=$_POST['itemid'];
					$mrp=$_POST['mrp'];
					$sprice=$_POST['sprice'];
					$sfile=$_FILES['sfile'];
					//-- new collumns
					$source=$_POST['source'];
					$discountedprice=$_POST['discountedprice'];
					$mrp=$_POST['mrp'];
					$designer_pass=$_POST['designer_pass'];
					
					$temp = rand(1000,9999);
					
										//--file upload
										
											if(isset($_FILES['sfile']))
												{		
													foreach($_FILES['sfile']['name'] as $k=>$v)
													{
														$file[] = $admin->upload_file_multi($_FILES['sfile']['name'][$k],$_FILES['sfile']['tmp_name'][$k]);
													}
													$filename = implode(",",($file));
												}
												
											
										else{$filename=$_POST['sfile_old'];}									
										
										//=== update
										$save = $sales->rfq_step20_update($itemid,$sprice,$filename,$source,$discountedprice,$mrp,$designer_pass,$sid); 

										//- save alerts / notification
										if($designer_pass=='2')
										{$admin->save_alerts($_SESSION['uid'],'Product Received From Designer With Market Research RFQ#$itemid',$_POST['created_by']);}
												
						
						if($save)
						{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=sales_rfq_2-0_engineer&status=1&id=".$sid."';</script>";}
						else									
						{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=sales_rfq_2-0_engineer&status=1&id=".$sid."';</script>";}
				}
				if($_GET['query']=='rfq_step20_assign_designer')
				{
					$sid=$_POST['sid'];
					$designer=$_POST['designer'];
					$itemid=$_POST['itemid'];
					foreach($itemid as $key=>$value) 
									{ 
										$itemid_single = mysqli_real_escape_string($con,$itemid[$key]);
										$designer_single = mysqli_real_escape_string($con,$designer[$key]);
										//=== update
										$save = $sales->rfq_step20_assign_designer($sid,$itemid_single,$designer_single);
										//== notification
										$admin->save_alerts($_SESSION['uid'],'Product Received From Designer With Market Research RFQ#$itemid',$designer[$key]);
									}
					
					

					echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=sales_rfq_edit&status=3&id=$sid';</script>";			
				}

					//===== step 3.0
					if($_GET['query']=='rfq_step30_edit')
				{
					$sid=$_POST['sid'];
					$itemid=$_POST['itemid'];
					$remark=$_POST['remark'];
					$moq=$_POST['moq'];
					$target_price=$_POST['target_price'];
					$repeat_pa=$_POST['repeat_pa'];
					$plc = $_POST['plc'];
					

					foreach($itemid as $key=>$value) 
									{ 
										$itemid_single = mysqli_real_escape_string($con,$itemid[$key]);
										$remark_single = mysqli_real_escape_string($con,$remark[$key]);
										$moq_single = mysqli_real_escape_string($con,$moq[$key]);
										$target_price_single = mysqli_real_escape_string($con,$target_price[$key]);
										$repeat_pa_single = mysqli_real_escape_string($con,$repeat_pa[$key]);
										$plc_single = mysqli_real_escape_string($con,$plc[$key]);
										
										
										//=== update
										$save = $sales->rfq_step30_update($itemid_single,$remark_single,$moq_single,$target_price_single,$repeat_pa_single,$plc_single,$sid); 
										
									}

						echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=sales_rfq_edit&status=3&id=".$sid."';</script>";
					}
					//=== step 4.0
					if($_GET['query']=='rfq_step40_edit')
					{
						$save = $sales->rfq_step40_update($_POST['sid'],$_POST['approval_sendto'],$_POST['approval_status']); 
						$admin->save_alerts($_SESSION['uid'],'RFQ#'.$_POST['sid'].' received for approval / declined',$_POST['approval_sendto']);
						if($save)
						{
							echo "<div class='alert alert-success'>Approval Send...</div>";
						}
					}

					if($_GET['query']=='rfq_step40_edit_approval')
					{
						$save = $sales->rfq_step40_update2($_POST['sid'],$_POST['approval'],$_POST['remark_approval']); 
						$admin->save_alerts($_SESSION['uid'],'RFQ#'.$_POST['sid'].' approval status received',$_POST['created_by']);
						if($save)
						{
							echo "<div class='alert alert-success'>Status Updated...</div>";
						}
					}
					//=== step 5.0 
					if($_GET['query']=='rfq_step50_edit')
					{
						$save = $sales->rfq_step50_update($_POST['sid'],$_POST['prospect_status'],$_POST['remark_prospect']); 
						if($save)
						{
							echo "<div class='alert alert-success'>Approval Request Send...</div>";
						}
					}
					//=== step 6.0
					if($_GET['query']=='rfq_step60_edit')
					{
					$sid=$_POST['sid'];
					$itemid=$_POST['itemid'];
					$engineer=$_POST['engineer'];
					$estimator=$_POST['estimator'];
					

					foreach($itemid as $key=>$value) 
									{ 
										$itemid_single = mysqli_real_escape_string($con,$itemid[$key]);
										$engineer_single = mysqli_real_escape_string($con,$engineer[$key]);
										$estimator_single = mysqli_real_escape_string($con,$estimator[$key]);
										//=== update
										$save = $sales->rfq_step60_update($itemid_single,$engineer_single,$estimator_single); 
										//-- notification to engineer
										$admin->save_alerts($_SESSION['uid'],'RFQ#'.$_POST['sid'].' Design request for development',$engineer_single);
										//-- notification to estimator
										$admin->save_alerts($_SESSION['uid'],'RFQ#'.$_POST['sid'].' Product received for estimate',$estimator_single);
									}

						echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=sales_rfq_edit&status=3&id=".$sid."';</script>";
					}

					if($_GET['query']=='rfq_step61_edit')
					{
						$sid=$_POST['sid'];
						$itemid=$_POST['itemid'];
						$engineer_files=$_FILES['engineer_files'];
						$created_by=$_POST['created_by'];
						$engineer_pass=$_POST['engineer_pass'];

						//--file upload
						if(isset($_FILES['engineer_files']))
						{		
							foreach($_FILES['engineer_files']['name'] as $k=>$v)
							{
								$file[] = $admin->upload_file_multi($_FILES['engineer_files']['name'][$k],$_FILES['engineer_files']['tmp_name'][$k]);
							}
							$filename = implode(",",($file));
						}
						else{$filename=$_POST['engineer_files_old'];}
						//=== update
						$save = $sales->rfq_step61_update($itemid,$filename,$engineer_pass);
						//-- notification to sales person
						$admin->save_alerts($_SESSION['uid'],'RFQ#'.$_POST['sid'].' Drawing received for approval',$created_by);
						echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=sales_rfq_6-0_engineer_list&status=3&id=".$sid."';</script>";
					}

					if($_GET['query']=='rfq_step62_edit')
					{
						$sid=$_POST['sid'];
						$itemid=$_POST['itemid'];
						$created_by=$_POST['created_by'];
						$estimator_pass=$_POST['estimator_pass'];
						$price=$_POST['price'];
						$save = $sales->rfq_step62_update($itemid,$estimator_pass,$price);
						//-- notification to sales person
						$admin->save_alerts($_SESSION['uid'],'RFQ#'.$_POST['sid'].' Price received for approval',$created_by);
						echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=sales_rfq_6-0_estimator_list&status=3&id=".$sid."';</script>";
					}

					//=== step 7.0
					if($_GET['query']=='rfq_step70_edit')
					{
						$save = $sales->rfq_step70_update($_POST['sid'],$_POST['final_approval']); 
						$admin->save_alerts($_SESSION['uid'],'RFQ#'.$_POST['sid'].' Final approval received for approval / declined',$_POST['final_approval']);
						if($save)
						{
							echo "<div class='alert alert-success'>Approval Send...</div>";
						}
					}
					if($_GET['query']=='rfq_step70_approval')
					{
						$sid=$_POST['sid'];
						$final_approval_status=$_POST['final_approval_status'];
						$created_by=$_POST['created_by'];
						$itemid=$_POST['itemid'];
						$engineer=$_POST['engineer'];
						$estimator=$_POST['estimator'];
						$status_engineer=$_POST['status_engineer'];
						$remark_engneer=$_POST['remark_engineer'];
						$status_estimator=$_POST['status_estimator'];
						$remark_estimator=$_POST['remark_estimator'];

					

					foreach($itemid as $key=>$value) 
									{ 
										$itemid_single = mysqli_real_escape_string($con,$itemid[$key]);
										$status_engineer_single = mysqli_real_escape_string($con,$status_engineer[$key]);
										$remark_engneer_single = mysqli_real_escape_string($con,$remark_engneer[$key]);
										$status_estimator_single = mysqli_real_escape_string($con,$status_estimator[$key]);
										$remark_estimator_single = mysqli_real_escape_string($con,$remark_estimator[$key]);
										$engineer_single = mysqli_real_escape_string($con,$engineer[$key]);
										$estimator_single = mysqli_real_escape_string($con,$estimator[$key]);

										//=== update
										$save = $sales->rfq_step70_approval($itemid_single,$status_engineer_single,$remark_engneer_single,$status_estimator_single,$remark_estimator_single); 
									
										//-- notification to engineer
										$admin->save_alerts($_SESSION['uid'],'RFQ#'.$_POST['sid'].' Design updates for development',$engineer_single);
										//-- notification to estimator
										$admin->save_alerts($_SESSION['uid'],'RFQ#'.$_POST['sid'].' Product updates for estimate',$estimator_single);
										//-- notification to created
										$admin->save_alerts($_SESSION['uid'],'RFQ#'.$_POST['sid'].' Product & design updates received',$created_by);
									}
						
									$status = $sales->rfq_step70_approval_status($sid,$final_approval_status);
									
						echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=sales_rfq_7-0_approval&status=3&id=".$sid."';</script>";
					}
					//-- step 8.0
					if($_GET['query']=='rfq_step80_edit_discount')
					{
						$sid=$_POST['sid'];
						$itemid=$_POST['itemid'];
						$discount=$_POST['discount'];
						$discount_amt=$_POST['discount_amt'];
						$discount_remark=$_POST['discount_remark'];
						
						foreach($itemid as $key=>$value) 
							{ 
								$itemid_single = mysqli_real_escape_string($con,$itemid[$key]);
								$discount_single = mysqli_real_escape_string($con,$discount[$key]);
								$discount_amt_single = mysqli_real_escape_string($con,$discount_amt[$key]);
								$discount_remark_single = mysqli_real_escape_string($con,$discount_remark[$key]);

								//=== update
								$save = $sales->rfq_step80_discount($itemid_single,$discount_single,$discount_amt_single,$discount_remark_single); 
								
							}

							echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=sales_rfq_edit&status=3&id=".$sid."';</script>";
					}

					//=== step 10
					if($_GET['query']=='rfq_step10-0_edit')
					{
						$save = $sales->rfq_step10_update($_POST['sid'],$_POST['send_status'],$_POST['remark_send']); 
						if($save)
						{
							echo "<div class='alert alert-success'>Approval Request Send...</div>";
						}
					}
				//--------- step editing closed 
				
				

				if($_GET['query']=='sales_rfq_edit_step_update')
				{
					$sid=$_POST['sid'];
					$step=$_POST['pstep'];
					$save=$sales->sales_rfq_edit_step_update($sid,$step);
					echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=sales_rfq_edit&status=3&id=".$sid."';</script>";
				}

				if($_GET['query']=='getmtype')
				{
					$mtype=$_GET['mtype'];
					$get=$product->get_material_bytype($mtype);
					// if($get)
					// {
						echo "<option disbaled='disabled'>-Select Material-</option>";
						foreach($get as $g=>$v)
						{
							echo "<option value='".$get[$g]['id']."'>".$get[$g]['material_name']."</option>";
						}
						//-- if hardware
						if($mtype=='hardware')
						{
							$hardware=$store->get_subcat_bycat('1');
							foreach($hardware as $g=>$v)
							{
								echo "<option value='".$hardware[$g]['id']."'>".$hardware[$g]['subcat']."</option>";
							}
						}
					
					// }
					// else
					// { echo "<option disabled='disabled' selected='selected' value='0'>No Data Found</option>";}	
				}

				if($_GET['query']=='getftype')
				{
					$mtype=$_GET['mtype'];
					$get=$product->get_finish_type($mtype);
					if($get)
					{
						echo "<option disbaled='disabled'>-Select Finish-</option>";
						foreach($get as $g=>$v)
						{
							echo "<option value='".$get[$g]['id']."'>".$get[$g]['finish_name']."</option>";
						}
					}		
					else
					{ echo "<option disabled='disabled' selected='selected' value='0'>No Data Found</option>";}	
				}



				//================estimator steps 
				if($_GET['query']=='step2-estimator')
				{
					//print_r($_POST);
					$partid=$_POST['part_id'];
					// $mtype=$_POST['mtype'];
					$mtype_remark=$_POST['mtype_remark'];
					for ($i = 0; $i < count($partid); $i++) 
							{
								 		$mtype=implode(","	,$_POST['mtype'.$i]);
										$mtypeid = mysqli_real_escape_string($con,$mtype);
										$remark = mysqli_real_escape_string($con, $mtype_remark[$i]);
										$id = mysqli_real_escape_string($con, $partid[$i]);
										$update=$sales->save_mtype_estimator($mtypeid,$remark,$id);
										
							}
							echo "<div class='alert alert-success'>Material Saved Successfully !!!</div>";
				}

				if($_GET['query']=='step3-1-estimator')
				{
					$finalval = array();
					$assembly = $_POST['assembly'];
					$assembly_qty = $_POST['assembly_qty'];										
					foreach($assembly as $key=>$v)
					{
						$val = array (
							"assembly"=>$assembly[$key],
							"assembly_qty"=>$assembly_qty[$key]
							);

						array_push($finalval,$val);
					}
					$part_details = json_encode($finalval);
					$get=$sales->save_assembly_estimator($part_details,$_POST['id']);
					echo "<div class='alert alert-success'>Assembly Part Saved Successfully !!!</div>";
				}

				if($_GET['query']=='step3-estimator')
				{
					$finalval = array();
					$assembly = $_POST['assembly'];
					$part = $_POST['part_name'];
					$qty = $_POST['qty'];
					$length0 = $_POST['length'];
					$width0 = $_POST['width'];
					$height0 = $_POST['height'];
					$total0 = $_POST['total'];
					$wood0 = $_POST['wood'];

					
					
					foreach($part as $key=>$v)
					{
						//-- if blank
						if(!empty($length0[$key])) {$length = $length0[$key];}else{$length=0;}
						if(!empty($width0[$key])) {$width = $width0[$key];}else{$width=0;}
						if(!empty($height0[$key])) {$height = $height0[$key];}else{$height=0;}
						if(!empty($total0[$key])) {$total = $total0[$key];}else{$total=0;}
						if(!empty($wood0[$key])) {$wood = $wood0[$key];}else{$wood=0;}

						$val = array (
							"assembly"=>$assembly[$key],
							"part_name"=>$part[$key],
							"qty"=>$qty[$key],
							"length"=>$length,
							"width"=>$width,
							"height"=>$height,
							"wood"=>$wood,
							"total"=>$total);

						array_push($finalval,$val);
					}
					$part_details = json_encode($finalval);
					$get=$sales->save_part_estimator($part_details,$_POST['id']);
					echo "<div class='alert alert-success'>Part Saved Successfully !!!</div>";
				}

				if($_GET['query']=='delete_mtype_step3-estimator')
				{
					$key = $_GET['id'];
					$items=$sales->sales_rfq_items_item($_GET['sid']);
					$part = json_decode($items[0]['part']);
					unset($part[$key]);
					//--- update unset array
					$part = json_encode($part);
					$get=$sales->save_part_estimator($part,$_GET['sid']);
				}

				if($_GET['query']=='step-hardware-estimator')
				{
					$finalval = array();
					$hardware = $_POST['hardware_id'];
					$price = $_POST['price'];
					$qty = $_POST['qty'];
					$total = $_POST['total'];

					foreach($hardware as $key=>$v)
					{
						$val = array (
							"hardware"=>$hardware[$key],
							"price"=>$price[$key],
							"qty"=>$qty[$key],
							"total"=>$total[$key]);

						array_push($finalval,$val);
					}
					$part_details = json_encode($finalval);
					$get=$sales->save_hardware_estimator($part_details,$_POST['id']);
					echo "<div class='alert alert-success'>Hardware Saved Successfully !!!</div>";		
				}


				if($_GET['query']=='step5-estimator')
				{
					$finalval = array();

					$part = $_POST['part_name'];
					$type = $_POST['cane_type'];
					$qty = $_POST['qty'];
					$labour_cost = $_POST['labour_cost'];
					$length = $_POST['length'];
					$width = $_POST['width'];
					$total = $_POST['total'];
					foreach($part as $key=>$v)
					{
						$val = array (
							"part_name"=>$part[$key],
							"type"=>$type[$key],
							"qty"=>$qty[$key],
							"length"=>$length[$key],
							"width"=>$width[$key],
							"total"=>$total[$key],
							"labour_cost"=>$labour_cost[$key]);

						array_push($finalval,$val);
					}
					$part_details = json_encode($finalval);
					$get=$sales->save_cane_estimator($part_details,$_POST['id']);
					echo "<div class='alert alert-secondary'>Part Saved Successfully !!!</div>";
				}

				if($_GET['query']=='step6-estimator')
				{
					$finalval = array();

					$part = $_POST['part_name'];
					$type = $_POST['up_type'];
					$qty = $_POST['qty'];
					$labour_cost = $_POST['labour_cost'];
					$length = $_POST['length'];
					$width = $_POST['width'];
					$total = $_POST['total'];
					foreach($part as $key=>$v)
					{
						$val = array (
							"part_name"=>$part[$key],
							"type"=>$type[$key],
							"qty"=>$qty[$key],
							"length"=>$length[$key],
							"width"=>$width[$key],
							"total"=>$total[$key],
							"labour_cost"=>$labour_cost[$key]);

						array_push($finalval,$val);
					}
					$part_details = json_encode($finalval);
					$get=$sales->save_up_estimator($part_details,$_POST['id']);
					echo "<div class='alert alert-secondary'>Part Saved Successfully !!!</div>";
				}

				if($_GET['query']=='step7-estimator')
				{
					$finalval = array();
					$id = $_POST['id'];
					$assembly = $_POST['assembly'];
					$subassembly = $_POST['custom_name'];
					$finish = $_POST['finish'];
					$length = $_POST['custom_length'];
					$width = $_POST['custom_width'];
					$height = $_POST['custom_height'];
					$qty = $_POST['custom_qty'];
					foreach($length as $key=>$v)
					{
						$val = array (
							"assembly"=>$assembly,
							"subassembly"=>$subassembly[$key],
							"length"=>$length[$key],
							"width"=>$width[$key],
							"height"=>$height[$key],
							"finish"=>$finish[$key],
							"qty"=>$qty[$key]
							);

						array_push($finalval,$val);
					}
					$part_details = json_encode($finalval);
					$get=$sales->save_finish_estimator($part_details,$id);
					echo "<div class='alert alert-secondary'>Finish Saved Successfully !!!</div>";
				}

				if($_GET['query']=='deletepolish_step7-estimator')
				{$sales->deletepolish_step7_estimator($_GET['id'],$_GET['sid']);}

				if($_GET['query']=='step8-estimator')
				{
					$finalval = array();
					$length = $_POST['length'];
					$width = $_POST['width'];
					$height = $_POST['height'];
					$cbm = $_POST['cbm'];
					$labour_cost = $_POST['labour_cost'];
					$total = $_POST['total'];
						$val = array (
							"length"=>$length,
							"width"=>$width,
							"height"=>$height,
							"cbm"=>$cbm,
							"labour_cost"=>$labour_cost,
							"total"=>$total
							);

						
					$part_details = json_encode($val);
					$get=$sales->save_packing_estimator($part_details,$_POST['id']);
					echo "<div class='alert alert-secondary'>Master Cartoon Added Successfully !!!</div>";
				}

				if($_GET['query']=='step8-estimator1')
				{
					$finalval = array();

					$case = $_POST['case'];
					$length = $_POST['length'];
					$width = $_POST['width'];
					$height = $_POST['height'];
					foreach($case as $key=>$v)
					{
						$val = array (
							"case"=>$case[$key],
							"length"=>$length[$key],
							"width"=>$width[$key],
							"height"=>$height[$key]
							);

						array_push($finalval,$val);
					}
					$part_details = json_encode($finalval);
					$get=$sales->save_packing2_estimator($part_details,$_POST['id']);
					echo "<div class='alert alert-secondary'>Case Saved Successfully !!!</div>";
				}

				if($_GET['query']=='step9-estimator')
				{
					$finalval = array();

					$case = $_POST['case'];
					$kg = $_POST['kg'];
					foreach($case as $key=>$v)
					{
						//-- if packing material 
						$packing_material=array();
						if(isset($_POST['packing_material'.[$key]]))
						{
							$material = $_POST['packing_material'.[$key]];
							$packing_qty= $_POST['qty'.[$key]];
							array_push($packing_material,array("material"=>$material,"qty"=>$packing_qty));
						}
						$packing_material0=implode(',',$packing_material);

						$parts =$_POST['part_name'.$case[$key]];
						$val = array (
							"case"=>$case[$key],
							"kg"=>$kg[$key],
							"part_name"=>implode(',',$parts),
							"packing_material"=>$packing_material0
							);

						array_push($finalval,$val);
					}
					$part_details = json_encode($finalval);
					$get=$sales->save_logistics_estimator($part_details,$_POST['id']);
					echo "<div class='alert alert-secondary'>Logistics Saved Successfully !!!</div>";
				}

				if($_GET['query']=='step8-estimator1_logistics')
				{
					
					$finalval = array();
					$val = array();
					$case = $_POST['case'];
					$kg = $_POST['kg'];
					$box_type = $_POST['box_type'];
					$product_nature = $_POST['product_nature'];
					$delivery_method = $_POST['delivery_method'];
					$scratch_protect = $_POST['scratch_protect'];
					$bom_update_stage = $_POST['bom_update_stage'];

					foreach($case as $key=>$v)
					{
						// print_r ($case[$key]);
						// print_r($_POST['assembly'.$case[$key]]);
						//echo $assembly = implode(",",$_POST['assembly'.$key]);
						$val = array (
							"case"=>$case[$key],
							"kg"=>$kg[$key],
							"assembly"=>$assembly,
							"box_type"=>$box_type[$key],
							"product_nature"=>$product_nature[$key],
							"delivery_method"=>$delivery_method[$key],
							"scratch_protect"=>$scratch_protect[$key],
							"bom_update_stage"=>$bom_update_stage[$key]							
						);

						array_push($finalval,$val);
						
					}
					$part_details = json_encode($finalval);
					$get=$sales->step8_estimator1_logistics($part_details,$_POST['id']);
					echo "<div class='alert alert-secondary'>Logistics Saved Successfully !!!</div>";
				}

				if($_GET['query']=='final_submit_form')
				{
					$fob_amt = round($_POST['fob_rate']*$_POST['fob'],3);
					$val = array (
							"turning_qty"=>$_POST['turning_qty'],
							"turning_rate"=>$_POST['turning_rate'],
							"turning_amount"=>$_POST['turning_amount'],
							"fitting_amount"=>$_POST['fitting_amount'],
							"polish_material_rate"=>$_POST['polish_material_rate'],
							"powder_rate"=>$_POST['powder_rate'],
							"polish_rate"=>$_POST['polish_rate'],
							"packing_rate"=>$_POST['packing_rate'],
							"cartoon_rate"=>$_POST['cartoon_rate'],
							"cartoon_amt"=>$_POST['cartoon_amt'],
							"mislleneous_amt"=>$_POST['mislleneous_amt'],
							"packing_labour_rate"=>$_POST['packing_labour_rate'],
							"packing_laoding_rate"=>$_POST['packing_laoding_rate'],
							"cartoon_qty"=>$_POST['cartoon_qty'],
							"final_rate"=>$_POST['final_rate'],
							"fob"=>$_POST['fob'],
							"fob_rate"=>$_POST['fob_rate'],
							"fob_amt"=>$fob_amt
						);
						$part_details = json_encode($val);
						$get=$sales->step_final_submit($part_details,$_POST['id']);
						echo "<div class='alert alert-secondary'>Saved Successfully !!!</div>";
				}

				if($_GET['query']=='step_11_loadability')
				{
					$finalval = array();
					$val = array();
					$value1 = $_POST['value1'];
					$value2 = $_POST['value2'];
					$value3 = $_POST['value3'];
					

					foreach($value1 as $key=>$v)
					{
						$value4 = intval($value1[$key])*intval($value2[$key])*intval($value3[$key]);
						$val = array (
							"value1"=>$value1[$key],
							"value2"=>$value2[$key],
							"value3"=>$value3[$key],
							"value4"=>$value4
						);
						array_push($finalval,$val);						
					}
					$part_details = json_encode($finalval);
					$get=$sales->step_11_loadability($part_details,$_POST['id']);
					echo "<div class='alert alert-secondary'>Loadability Saved Successfully !!!</div>";
				}

				if($_GET['query']=='container_unit')
				{
					$cartoon = array();
					$cartoon = $sales->calculateCartonFit($_POST['length'],$_POST['width'],$_POST['height'],$_POST['container_type']);
					
					echo 'Fit In Length :-'.$cartoon['fit_lengthwise'].'<br>';
					echo 'Fit In Width :-'.$cartoon['fit_widthwise'].'<br>';
					echo 'Fit In Height :-'.$cartoon['fit_heightwise'].'<br>';
					echo 'Total Cartoons :-'.$cartoon['total_fit'];
				}


				
	}
	break;
//-- sales close



//-- admin
case "admin":
		if($_GET['action']=='admin')
		{
			if (isset($_GET['query']))
			{
				//===== insert
				if($_GET['query']=='add-meta')
				{
					
						$save = $admin->create_meta($_POST['metaname'],$_POST['value1'],$_POST['value2'],$_POST['editable']); 
						if($save)
						{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=admin_meta&status=1';</script>";}   
						else{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=admin_meta&status=2';</script>";}
				}

				//======= edit 
				if($_GET['query']=='edit-meta')
				{
						$save = $admin->edit_meta($_POST['metaname'],$_POST['value1'],$_POST['value2'],$_POST['editable'],$_POST['id']); 
						if($save)
						{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=admin_meta&status=3';</script>";}   
						else{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=admin_meta&status=2';</script>";}
				}

				if($_GET['query']=='create_user')
				{
					$save=$admin->create_user($_POST['uname'],$_POST['upass'],$_POST['utype'],$_POST['email'],$_POST['contact'],$_POST['person_name']);
					if($save)
					{echo "<div class='alert alert-success'>User Created Successfully</div>";}
					else
					{echo "<div class='alert alert-danger'>Something went wrong !! Please try again later !!</div>";}
						
				}

				if($_GET['query']=='add_ticket')
				{
					$save=$admin->add_ticket($_POST['subject'],$_POST['description'],$_FILES['img'],$_POST['uid']);
					if($save)
					{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=support_tickets&status=1';</script>";}   
						else{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=support_tickets&status=2';</script>";}
				}

				if($_GET['query']=='add_ticket2')
				{
					$save=$admin->add_ticket2($_POST['description'],$_POST['tid']);
					if($save)
					{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=view_ticket&status=3&id=".$_POST['tid']."';</script>";}   
						else{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=view_ticket&status=2&id=".$_POST['tid']."';</script>";}
				}

				if($_GET['query']=='ticket_close')
				{
					$save=$admin->ticket_close($_POST['tid']);
					if($save)
					{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=support_tickets&status=8';</script>";}   
						else{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=support_tickets&status=2';</script>";}
				}
			}
		}	
		break;
//-- admin close	
	


//-- hr open
case "hr":
	if($_GET['action']=='hr')
	{
		
	}
	break;

//-- products open
case "product":
	if($_GET['action']=='product')
	{
		if($_GET['query']=='get_material_details')
		{
			$get=$product->get_material_byid($_GET['material_id']);
			echo str_replace(" ","",$get[0]['labour_inr']);
		}
		
		//-- populate drowpdown
		if($_GET['query']=='get_sku_dropdown')
		{
			$skus='';
			$sku0=$product->getall();  
			foreach($sku0 as $s0=>$v){
			$skus .= '<option value="'.$sku0[$s0]['id'].'">'.$sku0[$s0]['sku'].' / '.$sku0[$s0]['productname'].'</option>';
			}
			echo $skus;
		}
		//---------- product master
		if($_GET['query']=='add_group')
		{
			$get=$product->add_group($_POST['group_name'],$_POST['group_code'],$_POST['desc']);
			if($get)
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=products-add-group&status=1';</script>";}   
			else
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=products-add-group&status=2';</script>";}
		}
		if($_GET['query']=='products-add')
		{
			$get=$product->save($_POST['group_name'],$_POST['productname'],$_POST['sku'],$_POST['design_nu'],$_POST['cat'],$_POST['wcm'],$_POST['dcm'],$_POST['hcm'],$_POST['winch'],$_POST['dinch'],$_POST['hinch'],$_POST['logistics'],$_POST['cbm'],$_POST['desc'],$_POST['material_all'],$_POST['finish_all'],$_POST['usd'],$_POST['tags']);
			if($get)
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=products-update&status=1&id=$get';</script>";}   
			else
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=products-update&status=2&id=$get';</script>";}
		}

		if($_GET['query']=='gallery')
		{
			
			if($_FILES['img'])
			{$pic=$admin->upload_file($_FILES['img']);}
			else
			{$pic=$_POST['oldpic'];}

			$id=$_POST['pid'];
			$gallery_img=array();
			if($_FILES['gallery_img'])
			{
				$gallery = $_FILES['gallery_img'];
				foreach($_FILES['gallery_img']['name'] as $k=>$v)
				{
					 $picname1 = $admin->upload_file_multi($_FILES['gallery_img']['name'][$k],$_FILES['gallery_img']['tmp_name'][$k]);
					array_push($gallery_img,$picname1);
				}
				$galley_img0 = implode(",",$gallery_img);							
			}
			else
			{$galley_img0=$_POST['oldgallery'];}
				
			
			$get=$product->save_gallery($id,$pic,$galley_img0);
			if(!$get)
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=products-update&status=1&id=$id';</script>";}   
			else
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=products-update&status=2&id=$id';</script>";}

		}

		if($_GET['query']=='products-update')
		{
			$get=$product->update($_POST['group_name'],$_POST['productname'],$_POST['sku'],$_POST['design_nu'],$_POST['cat'],$_POST['wcm'],$_POST['dcm'],$_POST['hcm'],$_POST['winch'],$_POST['dinch'],$_POST['hinch'],$_POST['logistics'],$_POST['cbm'],$_POST['desc'],$_POST['material_all'],$_POST['finish_all'],$_POST['usd'],$_POST['tags'],$_POST['pid']);
			if($get)
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=products-update&status=3&id=$_POST[pid]';</script>";}   
			else
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=products-update&status=2&id=$_POST[pid]';</script>";}
		}
		//---------- material master
		if($_GET['query']=='add_material')
		{
			//---updalod file 
			if($_FILES['pic'])
			{$pic=$admin->upload_file($_FILES['pic']);}
			else
			{$pic='';}
			$get=$product->add_material($_POST['mname'],$_POST['mid'],$_POST['mtype'],$pic,$_POST['labour_inr'],$_POST['uom'],$_POST['capability'],$_POST['hsn']);
			if(!$get)
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=products-material&status=1';</script>";}   
			else
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=products-material&status=2';</script>";}
		}
		if($_GET['query']=='component')
		{
			$partname = $_POST['partname'];
			$material = $_POST['material'];
			$finish = $_POST['finish'];
			$sevices = $_POST['sevices'];
			$pid = $_POST['pid'];
							
							 for ($i = 0; $i < count($partname); $i++) 
							{
										$partname = mysqli_real_escape_string($con, $partname[$i]);
										$material = mysqli_real_escape_string($con, $material[$i]);
										echo $material0=implode(",", $material[$i]);
										$finish = mysqli_real_escape_string($con, $finish[$i]);
										$sevices = mysqli_real_escape_string($con, $sevices[$i]);
										
										$update=$product->component_add($partname,$material,$finish,$services,$pid);
										
							}

			//echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=products-update&status=1&id=$pid';</script>";
			
		}

		if($_GET['query']=='add_category')
		{
			$get=$product->add_category($_POST['cat_name'],$_POST['cat_code'],$_POST['desc'],$_POST['room']);
			if(!$get)
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=products-category&status=1';</script>";}   
			else
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=products-category&status=2';</script>";}
			
		}

		if($_GET['query']=='add_finish')
		{
			//---updalod file 
			if($_FILES['image'])
			{$pic=$admin->upload_file($_FILES['image']);}
			else
			{$pic='';}

			$get=$product->add_finish($_POST['finish_name'],$_POST['coating_system'],$_POST['finish_material'],$_POST['distressing'],$_POST['inhouse'],$_POST['labour_inr'],$pic,$_POST['lead_free'],$_POST['low_voc']);
			if(!$get)
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=products-finish&status=1';</script>";}   
			else
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=products-finish&status=2';</script>";}
			
		}

		if($_GET['query']=='add_packing')
		{
			//---updalod file 
			if($_FILES['image'])
			{$pic=$admin->upload_file($_FILES['image']);}
			else
			{$pic='';}

			$get=$product->add_packing($_POST['packing_name'],$_POST['weight_category'],$_POST['remark'],$pic,$_POST['labour_inr'],$_POST['uom']);
			if(!$get)
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=products-packing&status=1';</script>";}   
			else
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=products-packing&status=2';</script>";}
			
		}
		
		if($_GET['query']=='add_logistics')
		{
			$get=$product->add_logistics($_POST['logistics_name'],$_POST['assembly_req'],$_POST['no_of_case'],$_POST['no_of_item']);
			if(!$get)
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=products-logistics&status=1';</script>";}   
			else
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=products-logistics&status=2';</script>";}
		}

		//---------- finish master
		if($_GET['query']=='addfinish')
		{}
		if($_GET['query']=='updatefinish')
		{}
		if($_GET['query']=='deltefinish')
		{}

		if($_GET['query']=='get_details')
		{
			
			$id=$_GET['id'];
			$details=$product->getone($id);
			if($details)
			{
				echo "<table border='1' style='font-size:11px;'><tr><th>Name</th><td>".$details[0]['productname']."</td></tr>";					
				echo "<tr><th>Dimension</th><td>".$details[0]['wcm'].' x '.$details[0]['dcm'].' x '.$details[0]['hcm'].' (CM) <br>';
				echo $details[0]['winch'].' x '.$details[0]['dinch'].' x '.$details[0]['hinch'].' (INCH)</td></tr>';
				echo "<tr><th>Finish</th><td>".$details[0]['finish_all']."</td></tr><tr><th>Material</th><td>".$details[0]['material_all']."</td></tr>";
			  echo "</table>";
			}
			else
			{echo "No data found";}

		}	

		
		
	}
	break;




//------- store
case "store":
	if($_GET['action']=='store')
		{
			//=====insert
			if($_GET['query']=='add_store_cat')
			{
				$cat = $_POST['cat'];
				$get = $store->create_cat($cat);
				if($get)
				{	
					echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-store-category&status=1';</script>";
				
				}   
				else
				{
					echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-store-category&status=2';</script>";
				}
			}
	
	
			if($_GET['query']=='add_store_subcat')
			{
				$get = $store->create_subcat($_POST['cat'],$_POST['subcat']);
				if($get)
				{	
					echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-sub-category&status=1';</script>";
				
				}   
				else
				{
					echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-sub-category&status=2';</script>";
				}
			}
	
			if($_GET['query']=='add_unit')
			{
				$get = $store->create_unit($_POST['unit']);
				if($get)
				{	
					echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-unit&status=1';</script>";
				
				}   
				else
				{
					echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-unit&status=2';</script>";
				}
			}
	
			if($_GET['query']=='update_unit')
			{
				$get = $store->update_unit($_POST['unit'],$_POST['id']);
				if($get)
				{	
					echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-unit&status=3';</script>";
				
				}   
				else
				{
					echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-unit&status=2';</script>";
				}
			}
	
			if($_GET['query']=='delete-unit')
			{
				$store->delete_unit($_GET['id']);
			}
	
			if($_GET['query']=='add-item')
			{
				//---updalod file 
				$pic=$admin->upload_file($_FILES['pic']);
				$get=$store->create_store_item($_POST['product_name'],$_POST['hsn_code'],$_POST['cat'],$_POST['subcat'],$pic,$_POST['unit'],$_POST['mtype'],$_POST['capability'],$_POST['labour_inr']);
				if($get)
				{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-item&status=1';</script>";}   
				else
				{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-item&status=2';</script>";}
			}
			if($_GET['query']=='edit-item')
			{
				//---updalod file 
				
				if(!empty($_FILES['pic']['name']))
				{$pic=$admin->upload_file($_FILES['pic']);}
				else
				{$pic=$_POST['pic0'];}
				$get=$store->edit_store_item($_POST['product_name'],$_POST['hsn_code'],$_POST['cat'],$_POST['subcat'],$pic,$_POST['unit'],$_POST['id']);
	
				if($get)
				{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=view-item&status=1';</script>";}   
				else
				{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=view-item&status=2';</script>";}
			}
			if($_GET['query']=='add-store-po')
			{
				
				$get=$store->create_store_po($_POST['inv_nu'],$_POST['supplier_name'],$_POST['po_date']);
				if($get)
				{
					//-- get max id 
					$maxid=$store->maxid('store_po');
					echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=edit-item-stock&status=1&id=$maxid';</script>";
				}   
				else
				{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-item-stock&status=2';</script>";}
			}
			if($_GET['query']=='add-item-qty')
			{
							$sku_array = $_POST['sku'];
							$qty_array = $_POST['qty'];
							$poid = $_POST['poid'];
							
							 for ($i = 0; $i < count($sku_array); $i++) 
							{
										$sku = mysqli_real_escape_string($con, $sku_array[$i]);
										$qty = mysqli_real_escape_string($con, $qty_array[$i]);
										$poid = mysqli_real_escape_string($con, $poid);
										
										$update=$store->update_item_qty($sku,$qty);
										$save=$store->add_item_po_qty($sku,$qty,$poid);
							}
	
							echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=edit-item-stock&id=$poid&status=3';</script>";
			}
			//== search
			// if($_GET['query']=='view-item-search')
			// {
			// 	$linksArray = array_filter($_POST);
			// 	$sql0=array();
			// 	foreach($linksArray as $k => $value)
			// 	{
			// 		$sql0[]= $k." = '".$linksArray[$k]."'";
			// 	}
			// 	$sql1=implode(" AND ",$sql0);
			// 	$store_search = $store->search_item($sql1);
			// 	$_SESSION['search_data']=$store_search;
			// 	if($store_search )
			// 	{				
			// 		echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=view-item&status=5';</script>";}   
			// 	else
			// 	{
			// 		echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=view-item&status=7';</script>";}
			// }
			//=== edit
			if($_GET['query']=='edit_store_cat')
			{
				$get = $store->edit_cat($_POST['cat'],$_POST['id']);
				if($get)
				{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-store-category&status=1';</script>";}   
				else{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-store-category&status=2';</script>";}
			}
	
			if($_GET['query']=='edit_store_subcat')
			{
				$get = $store->edit_subcat($_POST['cat'],$_POST['subcat'],$_POST['id']);
				if($get)
				{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-sub-category&status=1';</script>";}   
				else{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-sub-category&status=2';</script>";}
			}
	
			//-- get details
			if($_GET['query']=='get_subcat')
			{
				$id=$_GET['id'];
				$subcat=$store->get_subcat_bycat($id);
				if(COUNT($subcat)>0)
				{
					echo "<option disabled='' selected='selected'>- Select -</option>";
					foreach($subcat as $k =>$value)
					{
						echo "<option value='".$subcat[$k]['id']."'>".$subcat[$k]['subcat']."</option>";
					}
				}
				else{	echo "<option disabled='' selected='selected'>No Sub Category Found</option>";}	
			}
			
			if($_GET['query']=='delete_po')
			{
				$store->delete_po($_GET['id']);
			}
	
			if($_GET['query']=='delete_item')
			{
				$store->delete_item($_GET['id']);
			}
	
			if($_GET['query']=='delete_subcat')
			{
				$store->delete_subcat($_GET['id']);
			}
	
			
		}
		break;
	
		
}


//-- other cases
include('case_production.php');
?>

