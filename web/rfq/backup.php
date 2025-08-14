if($_GET['query']=='sent_approval_eng')
				{
					$sid=$_POST['sid'];
					$eng_pass=$_POST['engineer_pass'];
					$save=$sales->rfq_step_09_sent_approval_eng($sid,$eng_pass);
					//-- get rfq details
					$view=$sales->get_rfq_one($sid);

					if($eng_pass=='2')    
					{
						$mds=$admin->getonetype_user('9');
						foreach($mds as $r=>$v)
						{$admin->save_alerts($_SESSION['uid'],"RFQ #RFQ$_POST[sid] Has Been Send For Price Reveiew",$mds[$r]['id']);}
						echo "Price Status Changed & Send For Approval";
					}
					if($eng_pass=='1')    
					{
						$admin->save_alerts($_SESSION['uid'],"RFQ #RFQ$_POST[sid] Price(s) Has Been Approved ",$view[0]['engineer']);
						$admin->save_alerts($_SESSION['uid'],"RFQ #RFQ$_POST[sid] Price(s) Has Been Approved ",$view[0]['created_by']);
						echo "Price Status Changed & Send To BDM and Engineer";
					}
					if($eng_pass=='3')    
					{
						$admin->save_alerts($_SESSION['uid'],"RFQ #RFQ$_POST[sid] Has Been Rejected From MD",$view[0]['engineer']);
						$admin->save_alerts($_SESSION['uid'],"RFQ #RFQ$_POST[sid] Has Been Rejected From MD",$view[0]['created_by']);
						echo "Price Status Changed & Send For BDM & Engineer";
					}
					if($eng_pass=='0')    
					{
						$admin->save_alerts($_SESSION['uid'],"RFQ #RFQ$_POST[sid] Has Been Sent For Recalculation",$view[0]['engineer']);
						$admin->save_alerts($_SESSION['uid'],"RFQ #RFQ$_POST[sid] Has Been Sent For Recalculation",$view[0]['created_by']);
						echo "Price Status Changed & Send To Engineer For Recalculation";
					}


					//-- send notification to MD 
					
				}

				if($_GET['query']=='rfq_step1_edit')
				{
					$sid=$_POST['sid'];
					$save=$sales->rfq_step1_edit($sid);
					echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=sales_rfq_edit&status=1&id=".$sid."';</script>";
					
				}

					
				
				if($_GET['query']=='rfq_step3_edit')
				{
					$sid=$_POST['sid'];
					$save=$sales->rfq_step3_edit($sid);

				//-- send notification to MD 
				$mds=$admin->getonetype_user('9');
				foreach($mds as $r=>$v)
				{$admin->save_alerts($_SESSION['uid'],"RFQ #SHL-RFQ-$_POST[id] Has Been Send For Reveiew",$mds[$r]['id']);}

					echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=sales_rfq_edit&status=1&id=".$sid."';</script>";
				}

				if($_GET['query']=='rfq_step4_edit_discount')
				{
					$sid=$_POST['sid'];
					$itemid=$_POST['itemid'];
					$discount=$_POST['discount'];
					$discount_amt=$_POST['discount_amt'];
					
					foreach($itemid as $key=>$value) 
						{ 
							$itemid_single = mysqli_real_escape_string($con,$itemid[$key]);
							$discount_single = mysqli_real_escape_string($con,$discount[$key]);
							$discount_amt_single = mysqli_real_escape_string($con,$discount_amt[$key]);
							
							//=== update
							$save = $sales->rfq_step4_discount($itemid_single,$discount_single,$discount_amt_single,$sid); 
							
						}

						echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=sales_rfq_edit&status=3&id=".$sid."';</script>";
				}

				if($_GET['query']=='rfq_step4_edit')
				{
					$sid=$_POST['sid'];
					$save=$sales->rfq_step4_edit($sid);
						echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=sales_rfq_edit&status=1&id=".$sid."';</script>";
				}

				if($_GET['query']=='rfq_step6_edit')
				{
					$sid=$_POST['sid'];
					$save=$sales->rfq_step5_edit($sid);
					//-- send notification to MD 
					$mds=$admin->getonetype_user('9');
					foreach($mds as $r=>$v)
					{$admin->save_alerts($_SESSION['uid'],"RFQ #SHL-RFQ-$_POST[id] Has Been Send Submitted to Client",$mds[$r]['id']);}

					echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=sales_rfq_edit&status=1&id=".$sid."';</script>";
				}




				
function rfq_step1_edit($sid)
{
    //--update step id 0
    $update0="update sales_rfq SET step='2.0' where id='$sid' ";
    $update0 = $this->db_handle->update($update0);
    return $update;
}



function rfq_step3_edit($sid)
{
    //--update step id 0
    $update0="update sales_rfq SET step='4.0' where id='$sid' ";
    $update0 = $this->db_handle->update($update0);
    return $update;

    
}

function rfq_step4_discount($itemid_single,$discount_single,$discount_amt_single)
{
    $update="update sales_rfq_items SET discount_per='$discount_single',discount_amt='$discount_amt_single' where id='$itemid_single' ";
    $update = $this->db_handle->update($update);
    return $update;
}

function rfq_step4_edit($sid)
{
    //--update step id 0
    $update0="update sales_rfq SET step='5.0' where id='$sid' ";
    $update0 = $this->db_handle->update($update0);
    return $update;
    
}

function rfq_step5_edit($sid)
{
    //--update step id 0
    $update0="update sales_rfq SET step='6.0' where id='$sid' ";
    $update0 = $this->db_handle->update($update0);
    return $update;
    
}