<?php 
require_once ("DBController.php");

class Sales 
{
    
    function __construct()
    {
        $this->db_handle = new DBController();
    }

//-- dashboard function 

function lead_bystatus($status)
{
    $query="select * from leads where status='$status' ORDER BY id DESC";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function view_all_leads()
{
    $query="select * from leads where status != '0' ORDER BY id DESC";
    $result = $this->db_handle->runBaseQuery($query);
    return $result; 
}

function save_sales_feedback($id,$feedback,$status,$stage,$outcome,$handledby,$next_feedback_date)
{
    $updated=date('Y-m-d h:i:s');
    $query0 = "Update leads SET last_updated='$updated', sales_handledby='$handledby', sales_status='$status', sales_stage='$stage',sales_outcome='$outcome' where id='$id' ";
    $insertId0 = $this->db_handle->update($query0);    
    

    //-- insert into feedback responses
        $query = "insert into lead_feedback(lid,feedback,next_feedback_date,sales_status,sales_stage,sales_outcome)VALUES(?,?,?,?,?,?)";
        $paramType = "issiis";
        $paramValue = array($id,$feedback,$next_feedback_date,$status,$stage,$outcome);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);

        return $insertId0;
}

function create_beneficiery($fname,$lname,$phone,$email,$cname,$ctype,$designation,$address,$country,$state,$city,$zipcode,$regtype,$regnu,$btype)
{
    $query = "insert into beneficiery(fname,lname,phone,email,cname,ctype,designation,address,country,state,city,zipcode,regtype,regnu,btype)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $paramType = "ssisssssiiiissi";
    $paramValue = array($fname,$lname,$phone,$email,$cname,$ctype,$designation,$address,$country,$state,$city,$zipcode,$regtype,$regnu,$btype);
    $insertId = $this->db_handle->insert($query, $paramType, $paramValue);

    //-- get max id from beneficiery table
    $max="select MAX(id) AS max_id from beneficiery";
    $result = $this->db_handle->runBaseQuery($max);
    $id=$result[0]['max_id'];

    return $id;
}
function beneficiery_details($bid,$value1,$value2)
{
    $query = "insert into beneficiery_details(bid,value1,value2)VALUES(?,?,?)";
    $paramType = "iss";
    $paramValue = array($bid,$value1,$value2);
    $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    return $insertId;
}
function get_baneficiery($id)
{
    $query="select * from beneficiery where id = '$id' ";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;  
}

function view_all_beneficiery($btype)
{
    $query="select * from beneficiery where btype = '$btype' ORDER BY id DESC ";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;  
}

function get_beneficiery_detail($id)
{
    $query="select * from beneficiery_details where bid = '$id' ";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;  
}

function sales_prospect_type($id,$type)
{
   echo $update="update beneficiery SET export='$type' where id='$id' ";
    $update = $this->db_handle->update($update);
    return $update;  

}
function get_prospect_tandc($id)
{
    $query="select * from prospect_tandc where pid = '$id' ";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}
function sales_prospect_tandc($pid,$incoterms,$incoterms_port,$incoterms_destination,$shipping,$shipping_basis,$currency,$liability,$liability_per,$payment_terms,$advance_payment_per,$lc_advance,$tandc_lc,$progress_payment,$progress_paymentstage1,$progress_paymentstage2,$progress_paymentstage3,$progress_paymentstage4,$balance,$credit_period,$retention,$retention_period,$process_payment,$document,$document2,$price_validity,$price_validity_year,$social_audit,$SA8000,$audit1,$audit2,$audit3,$audit4,$ctpat,$shipment_penelty,$late_shipment_per,$late_shipment_max_per,$chargeback,$chargeback_labour_rate,$chargeback_labour_rate_after,$chargeback_labour_limit,$commissionable,$commission_to,$commission_name,$commission_per,$sample,$sample_qty0,$sample_qty,$photography,$sample_paid_client,$photography1,$photography_qty,$photography_qty_req,$packing,$packing_notes,$product_testing,$product_testing_frequency,$product_testing_paid,$packing_testing,$packing_testing_frequency,$packing_testing_paid,$fsc,$fsc_years,$fsc_current,$fsc_target1,$fsc_target2,$fsc_target3,$fsc_target_no,$branding,$branding_req,$added_by)
{
    $query = "insert into prospect_tandc(pid,incoterms,incoterms_port,incoterms_destination,shipping,shipping_basis,currency,liability,liability_per,payment_terms,advance_payment_per,lc_advance,tandc_lc,progress_payment,progress_paymentstage1,progress_paymentstage2,progress_paymentstage3,progress_paymentstage4,balance,credit_period,retention,retention_period,process_payment,document,document2,price_validity,price_validity_year,social_audit,SA8000,audit1,audit2,audit3,audit4,ctpat,shipment_penelty,late_shipment_per,late_shipment_max_per,chargeback,chargeback_labour_rate,chargeback_labour_rate_after,chargeback_labour_limit,commissionable,commission_to,commission_name,commission_per,sample,sample_qty0,sample_qty,photography,sample_paid_client,photography1,photography_qty,photography_qty_req,packing,packing_notes,product_testing,product_testing_frequency,product_testing_paid,packing_testing,packing_testing_frequency,packing_testing_paid,fsc,fsc_years,fsc_current,fsc_target1,fsc_target2,fsc_target3,fsc_target_no,branding,branding_req,added_by)VALUES('$pid','$incoterms','$incoterms_port','$incoterms_destination','$shipping','$shipping_basis','$currency','$liability','$liability_per','$payment_terms','$advance_payment_per','$lc_advance','$tandc_lc','$progress_payment','$progress_paymentstage1','$progress_paymentstage2','$progress_paymentstage3','$progress_paymentstage4','$balance','$credit_period','$retention','$retention_period','$process_payment','$document','$document2','$price_validity','$price_validity_year','$social_audit','$SA8000','$audit1','$audit2','$audit3','$audit4','$ctpat','$shipment_penelty','$late_shipment_per','$late_shipment_max_per','$chargeback','$chargeback_labour_rate','$chargeback_labour_rate_after','$chargeback_labour_limit','$commissionable','$commission_to','$commission_name','$commission_per','$sample','$sample_qty0','$sample_qty','$photography','$sample_paid_client','$photography1','$photography_qty','$photography_qty_req','$packing','$packing_notes','$product_testing','$product_testing_frequency','$product_testing_paid','$packing_testing','$packing_testing_frequency','$packing_testing_paid','$fsc','$fsc_years','$fsc_current','$fsc_target1','$fsc_target2','$fsc_target3','$fsc_target_no','$branding','$branding_req','$added_by')";
    $insertId = $this->db_handle->update($query);
    return $insertId;
}

function sales_prospect_tandc_update($pid,$incoterms,$incoterms_port,$incoterms_destination,$shipping,$shipping_basis,$currency,$liability,$liability_per,$payment_terms,$advance_payment_per,$lc_advance,$tandc_lc,$progress_payment,$progress_paymentstage1,$progress_paymentstage2,$progress_paymentstage3,$progress_paymentstage4,$balance,$credit_period,$retention,$retention_period,$process_payment,$document,$document2,$price_validity,$price_validity_year,$social_audit,$SA8000,$audit1,$audit2,$audit3,$audit4,$ctpat,$shipment_penelty,$late_shipment_per,$late_shipment_max_per,$chargeback,$chargeback_labour_rate,$chargeback_labour_rate_after,$chargeback_labour_limit,$commissionable,$commission_to,$commission_name,$commission_per,$sample,$sample_qty0,$sample_qty,$photography,$sample_paid_client,$photography1,$photography_qty,$photography_qty_req,$packing,$packing_notes,$product_testing,$product_testing_frequency,$product_testing_paid,$packing_testing,$packing_testing_frequency,$packing_testing_paid,$fsc,$fsc_years,$fsc_current,$fsc_target1,$fsc_target2,$fsc_target3,$fsc_target_no,$branding,$branding_req,$added_by,$id)
{
      $query = "update prospect_tandc SET  incoterms='$incoterms',incoterms_port='$incoterms_port',incoterms_destination='$incoterms_destination',shipping='$shipping',shipping_basis='$shipping_basis',currency='$currency',liability='$liability',liability_per='$liability_per',payment_terms='$payment_terms',advance_payment_per='$advance_payment_per',lc_advance='$lc_advance',tandc_lc='$tandc_lc',progress_payment='$progress_payment',progress_paymentstage1='$progress_paymentstage1',progress_paymentstage2='$progress_paymentstage2',progress_paymentstage3='$progress_paymentstage3',progress_paymentstage4='$progress_paymentstage4',balance='$balance',credit_period='$credit_period',retention='$retention',retention_period='$retention_period',process_payment='$process_payment',document='$document',document2='$document2',price_validity='$price_validity',price_validity_year='$price_validity_year',social_audit='$social_audit',SA8000='$SA8000',audit1='$audit1',audit2='$audit2',audit3='$audit3',audit4='$audit4',ctpat='$ctpat',shipment_penelty='$shipment_penelty',late_shipment_per='$late_shipment_per',late_shipment_max_per='$late_shipment_max_per',chargeback='$chargeback',chargeback_labour_rate='$chargeback_labour_rate',chargeback_labour_rate_after='$chargeback_labour_rate_after',chargeback_labour_limit='$chargeback_labour_limit',commissionable='$commissionable',commission_to='$commission_to',commission_name='$commission_name',commission_per='$commission_per',sample='$sample',sample_qty0='$sample_qty0',sample_qty='$sample_qty',photography='$photography',sample_paid_client='$sample_paid_client',photography1='$photography1',photography_qty='$photography_qty',photography_qty_req='$photography_qty_req',packing='$packing',packing_notes='$packing_notes',product_testing='$product_testing',product_testing_frequency='$product_testing_frequency',product_testing_paid='$product_testing_paid',packing_testing='$packing_testing',packing_testing_frequency='$packing_testing_frequency',packing_testing_paid='$packing_testing_paid',fsc='$fsc',fsc_years='$fsc_years',fsc_current='$fsc_current',fsc_target1='$fsc_target1',fsc_target2='$fsc_target2',fsc_target3='$fsc_target3',fsc_target_no='$fsc_target_no',branding='$branding',branding_req='$branding_req' where id='$id'";
    $insertId = $this->db_handle->update($query);
    return $insertId;
}

//=============rfq
function rfq_step0($prospect,$rfq_number,$date_of_rfq,$created_date,$created_by)
{
    $query = "insert into sales_rfq(prospect,rfq_number,date_of_rfq,created_date,created_by,step)VALUES(?,?,?,?,?,?)";
    $paramType = "isssis";
    $paramValue = array($prospect,$rfq_number,$date_of_rfq,$created_date,$created_by,'0.5');
    $insertId = $this->db_handle->insert($query, $paramType, $paramValue);

    $max="select MAX(id) AS max_id from sales_rfq";
    $result = $this->db_handle->runBaseQuery($max);
    $id=$result[0]['max_id'];

    return $id;
}

function rfq_items($sku,$item_type,$sid)
{
    $query = "insert into sales_rfq_items(pid,item_type,sid)VALUES(?,?,?)";
    $paramType = "iii";
    $paramValue = array($sku,$item_type,$sid);
    $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    return $insertId;
}

function view_all_rfq()
{
    $query="select * from sales_rfq  ORDER BY id DESC ";
    $result = $this->db_handle->runBaseQuery($query);
    return $result; 
}

function get_rfq_one($id)
{
    $query="select * from sales_rfq where id = '$id' ";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function sales_rfq_items($sid)
{
    $query="select * from sales_rfq_items where sid = '$sid' ";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function sales_rfq_items_item($id)
{
    $query="select * from sales_rfq_items where id = '$id' ";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function rfq_step0_edit($prospect,$rfq_number,$date_of_rfq,$created_date,$id)
{
    $update="update sales_rfq SET prospect='$prospect',rfq_number='$rfq_number',date_of_rfq='$date_of_rfq',created_date='$created_date' where id='$id' ";
    $update = $this->db_handle->update($update);
    return $update;
}

function rfq_items_edit($sku,$item_type,$itemid)
{
    $update="update sales_rfq_items SET pid='$sku',item_type='$item_type' where id='$itemid' ";
    $update = $this->db_handle->update($update);
    return $update;
}

function rfq_items_2($sku,$item_type,$sid,$file)
{
    $query = "insert into sales_rfq_items(pid,item_type,sid,file)VALUES(?,?,?,?)";
    $paramType = "iiis";
    $paramValue = array($sku,$item_type,$sid,$file);
    $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    return $insertId;
}

function delete_rfq_item($id)
{
    $update="delete from sales_rfq_items where id='$id' ";
    $update = $this->db_handle->update($update);
    return $update;
}

function rfq_step0_5_update($itemid_single,$length_single,$width_single,$height_single,$moq_single,$sid,$wood_single,$mtype_single,$fitting_single,$finish_single,$packing_single,$branding_single)
{
    $update="update sales_rfq_items SET length='$length_single',width='$width_single',height='$height_single',moq='$moq_single',wood='$wood_single',mtype='$mtype_single',fitting='$fitting_single',finish='$finish_single',packing='$packing_single',branding='$branding_single' where id='$itemid_single' ";
    $update = $this->db_handle->update($update);

    //--update step id 0
    // $update0="update sales_rfq SET step='0.9' where id='$sid' ";
    // $update0 = $this->db_handle->update($update0);


    return $update;
}

function rfq_step0_5_material($sid,$pid,$capability,$remark)
{
    $query = "insert into sales_rfq_items_material(sid,pid,capability,remark)VALUES(?,?,?,?)";
    $paramType = "iiis";
    $paramValue = array($sid,$pid,$capability,$remark);
    $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    return $insertId;
}

function get_temp_item_material($sid,$pid)
{
    $query="select * from  sales_rfq_items_material where sid = '$sid' AND pid='$pid' ";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function delete_material_cutom($id)
{
    $delete="delete from sales_rfq_items_material where id='$id' ";
    $delete = $this->db_handle->update($delete);
    return $delete;
}

//------------- edit steps open
function rfq_step20_update($itemid,$sprice,$filename,$source,$discountedprice,$mrp,$designer_pass,$sid)
{
    if($designer_pass=='2')
    {$submitted_date = date('Y-m-d h:i:s');}
    else
    {$submitted_date = '';}

    $update="update sales_rfq_items SET sprice='$sprice',sfile='$filename',source='$source',discountedprice='$discountedprice',mrp='$mrp',designer_pass='$designer_pass', submitted_date='$submitted_date' where id='$itemid' ";
    $update = $this->db_handle->update($update);
    return $update;
}

function rfq_step20_assign_designer($sid,$itemid_single,$designer_single)
{
   echo $update="update sales_rfq_items SET designer='$designer_single' where id='$itemid_single' ";
    $update = $this->db_handle->update($update);
    return $update;
}

function rfq_step30_update($itemid_single,$remark_single,$moq_single,$target_price,$repeat_pa_single,$plc_single,$sid)
{
    $update="update sales_rfq_items SET remark='$remark_single',moq='$moq_single',target_price='$target_price',repeat_pa='$repeat_pa_single',plc='$plc_single' where id='$itemid_single' ";
    $update = $this->db_handle->update($update);

    //--update step id 0
    //  $update0="update sales_rfq SET step='3.0' where id='$sid' ";
    // $update0 = $this->db_handle->update($update0);

    return $update;
}

function rfq_step40_update($id,$approval_sendto,$approval_status)
{
    $update="update sales_rfq SET approval_sendto='$approval_sendto', approval_status='$approval_status' where id='$id' ";
    $update = $this->db_handle->update($update);
    return $update;
}

function rfq_step40_update2($id,$approval,$remark_approval)
{
    $update="update sales_rfq SET approval_status='$approval',remark_approval='$remark_approval' where id='$id' ";
    $update = $this->db_handle->update($update);
    return $update;
}

function rfq_step50_update($id,$prospect_status,$remark_prospect)
{
    $update="update sales_rfq SET prospect_status='$prospect_status',remark_prospect='$remark_prospect' where id='$id' ";
    $update = $this->db_handle->update($update);
    return $update;
}

function rfq_step60_update($id,$engineer,$estimator)
{
    $update="update sales_rfq_items SET engineer='$engineer',estimator='$estimator' where id='$id' ";
    $update = $this->db_handle->update($update);
    return $update;
}

function rfq_step61_update($itemid,$engineer_files,$engineer_pass)
{
    $update="update sales_rfq_items SET engineer_files='$engineer_files',engineer_pass='$engineer_pass' where id='$itemid' ";
    $update = $this->db_handle->update($update);
    return $update;
}

function rfq_step62_update($itemid,$estimator_pass,$price)
{
    $update="update sales_rfq_items SET estimator_pass='$estimator_pass',price='$price' where id='$itemid' ";
    $update = $this->db_handle->update($update);
    return $update;
}

function rfq_step70_update($id,$final_approval)
{
    $update="update sales_rfq SET final_approval='$final_approval' where id='$id' ";
    $update = $this->db_handle->update($update);
    return $update;
}

function rfq_step70_approval($itemid_single,$status_engineer_single,$remark_engneer_single,$status_estimator_single,$remark_estimator_single)
{
    $update="update sales_rfq_items SET status_engineer='$status_engineer_single',remark_engineer='$remark_engneer_single',status_estimator='$status_estimator_single',remark_estimator='$remark_estimator_single' where id='$itemid_single' ";
    $update = $this->db_handle->update($update);
    return $update;
}

function rfq_step70_approval_status($sid,$final_approval_status)
{
    echo $update="update sales_rfq SET final_approval_status='$final_approval_status' where id='$sid' ";
    $update = $this->db_handle->update($update);
    return $update;
}

function rfq_step80_discount($itemid_single,$discount_single,$discount_amt_single,$discount_remark_single)
{
    $update="update sales_rfq_items SET discount_per='$discount_single',discount_amt='$discount_amt_single',discount_remark='$discount_remark_single' where id='$itemid_single' ";
    $update = $this->db_handle->update($update);
    return $update;
}

function rfq_step10_update($id,$send_status,$remark_send)
{
    echo $update="update sales_rfq SET send_status='$send_status',remark_send='$remark_send' where id='$id' ";
    $update = $this->db_handle->update($update);
    return $update;
}
//------------- edit steps closed

function get_rfq_approval($id)
{
    $select="select * from sales_rfq where approval_sendto='$id' ";
    $select = $this->db_handle->runBaseQuery($select);
    return $select; 
}

function delete_moredetails_prospect($id)
{
    $delete="delete from beneficiery_details where id='$id' ";
    $delete = $this->db_handle->update($delete);
    return $delete;
}

function sales_rfq_edit_step_update($sid,$step)
{
    $update0="update sales_rfq SET step='$step' where id='$sid' ";
    $update0 = $this->db_handle->update($update0);
    return $update;
}

function update_engineer($id,$eid)
{
    $update0="update sales_rfq SET engineer='$eid' where id='$id' ";
    $update0 = $this->db_handle->update($update0);
    return $update;
}

function get_price_request_list($id)
{
    $query="select * from  sales_rfq_items where designer = '$id' AND designer_pass='0' ";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function get_price_request_drawing($id,$column)
{
    $query="select * from  sales_rfq_items where $column = '$id' ";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function get_price_request_list_bystatus($status)
{
    $query="select * from  sales_rfq where engineer_pass = '$status' ORDER by id DESC ";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}


function get_price_request_list_all($id)
{
    $query="select * from  sales_rfq_items where designer = '$id' ORDER by id DESC ";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function get_price_request_list_all_noeng()
{
    $query="select * from  sales_rfq ORDER by id DESC ";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}


function rfq_step_09_sent_approval_eng($sid,$pass)
{
    $update0="update sales_rfq SET engineer_pass='$pass' where id='$sid' ";
    $update0 = $this->db_handle->update($update0);
    return $update0;
}


//==================estimator functions
function save_mtype_estimator($mtype,$mtype_remark,$id)
{
    $update0="update  sales_rfq_items_material SET mtype='$mtype',mtype_remark='$mtype_remark' where id='$id' ";
    $update0 = $this->db_handle->update($update0); 
    return $update0;
}
function save_assembly_estimator($part,$id)
{
    $update0="update  sales_rfq_items SET assembly='$part' where id='$id' ";
    $update0 = $this->db_handle->update($update0); 
    return $update0;
}

function save_part_estimator($part,$id)
{
    $update0="update  sales_rfq_items SET part='$part' where id='$id' ";
    $update0 = $this->db_handle->update($update0); 
    return $update0;
}

function save_cane_estimator($part_details,$id)
{
    $update0="update  sales_rfq_items SET cane='$part_details' where id='$id' ";
    $update0 = $this->db_handle->update($update0); 
    return $update0;
}

function save_up_estimator($part_details,$id)
{
    $update0="update  sales_rfq_items SET upholestry='$part_details' where id='$id' ";
    $update0 = $this->db_handle->update($update0); 
    return $update0;
}

function save_finish_estimator($part_details,$id)
{
    //-- check of some of the data is present or not 
    $select="select * from sales_rfq_items where id='$id' ";
    $select = $this->db_handle->runBaseQuery($select);
    if($select[0]['finish']!='')
    {
        $finish = json_decode($select[0]['finish'],true);
        //--- change part details to php array and merge 
        $part_details = json_decode($part_details,true);
        $finish = array_merge($finish,$part_details);
        $finish = json_encode($finish);
        $update0="update  sales_rfq_items SET finish='$finish' where id='$id' ";
        $update0 = $this->db_handle->update($update0);

    }
    else
    {
        $update0="update  sales_rfq_items SET finish='$part_details' where id='$id' ";
        $update0 = $this->db_handle->update($update0); 
    }



    
}

function save_packing_estimator($part_details,$id)
{
    $update0="update  sales_rfq_items SET packing='$part_details' where id='$id' ";
    $update0 = $this->db_handle->update($update0); 
    return $update0;
}

function save_packing2_estimator($part_details,$id)
{
    $update0="update  sales_rfq_items SET packing2='$part_details' where id='$id' ";
    $update0 = $this->db_handle->update($update0); 
    return $update0;
}

function save_logistics_estimator($part_details,$id)
{
    $update0="update  sales_rfq_items SET logistics='$part_details' where id='$id' ";
    $update0 = $this->db_handle->update($update0); 
    return $update0;
}

function save_hardware_estimator($part_details,$id)
{
    $update0="update  sales_rfq_items SET hardware='$part_details' where id='$id' ";
    $update0 = $this->db_handle->update($update0); 
    return $update0;
}

function step8_estimator1_logistics($part_details,$id)
{
    $update0="update  sales_rfq_items SET logistics='$part_details' where id='$id' ";
    $update0 = $this->db_handle->update($update0); 
    return $update0;
}

function packing_cost_function($case,$box_type,$length,$width,$height,$kg,$product_nature,$scratch_protect,$delivery_method)
{
    //-- weight class
    if($kg<13.6){$weight_class='1';}
    elseif($kg>90*0.9){$weight_class='6';}
    elseif($kg>27.2*0.9){$weight_class='6';}
    elseif($kg>45.4*0.9){$weight_class='6';}
    elseif($kg>68.18*0.9){$weight_class='6';}
    else{$weight_class='5';}

    //-- packing_standard
    if($delivery_method=='ISTA'){$packing_standard='275 LBS/Sq In';}
    elseif($delivery_method=='Non-ISTA Parcel'){$packing_standard='220 LBS/Sq In';}
    elseif($delivery_method=='Ftl?Fct Worthy'){$packing_standard='180 LBS/Sq In';}
    else{$packing_standard='N/A';}

    //-- cartoon_spec ply
    if($weight_class<3){$cartoon_spec='5 Ply';}
    else{$cartoon_spec='7 Ply';}//- harware box to check to do
    
    //-- edge protector
    if($edge_protector<3){$edge_protector='19';}
    else{$edge_protector=($weight_class-2)*6.35+19;}

    //-- wrap thickness
    if($scratch_protect=='Low'){$wrap_thickness='1';}
    elseif($scratch_protect=='Medium'){$wrap_thickness='2';}
    elseif($scratch_protect=='Medium'){$wrap_thickness='2';}
    else{$wrap_thickness='3';}
    
    //--cartoon sq mtr
    if($box_type=='Regular Cartoon')
    {$cartoon_sq_mtr=($length+$width)+50 * ($width+$height) * 2 / 1000000;}
    elseif($box_type=='Double Flap Carton')
    {$cartoon_sq_mtr=($length+$width)+50 * ($width+$height) * 2 / 1000000;}
    else
    {$cartoon_sq_mtr=($length+$width) * ($width+$height)  / 1000000;}

    //-- add mm
    if($cartoon_spec='5 Ply')
    {$addmm =6+$edge_protector+$wrap_thickness;}
    else
    {$addmm =9+$edge_protector+$wrap_thickness;}
    
    //-- cartoon lmm
    if($addmm==''){$cartoonlmm='';}
    else{$cartoonlmm=$addmm*$length;}

    //-- cartoon wmm
    if($addmm==''){$cartoonwmm='';}
    else{$cartoonwmm=$addmm*$width;}

    //-- cartoon hmm
    if($addmm==''){$cartoonhmm='';}
    else{$cartoonhmm=$addmm*$height;}

    //--min of lwh
    $string = $length.','.$width.','.$height;
    $workArray = explode(',', $string);
    $minlwh = min($workArray);
    
    //--edge length
    if($length==''){$edgelength='';}
    else{
        $edgelength=$length+$edge_protector+$wrap_thickness;
        $edgelength=$edgelength*4;
    }

    //-- area
    if($length==''){$area='';}
    else{
        $area=($length*$width)+($width*$height)+($height*$length) * 2;
        $area=$area/1000000;
    }

    //-- corner protector 4
    if($minlwh < 100)
    {$corner_protector4=4;}
    else
    {$corner_protector4=0;}//- harware box to check to do

    //-- corner protector 3
    if($minlwh < 100)
    {$corner_protector3=8;}
    else
    {$corner_protector3=0;}//- harware box to check to do

    //-- edge protector wall3
    if($minlwh < 100)
    {
        $edge_protector_wall3=$edgelength/800;
        $edge_protector_wall2=round($edge_protector_wall2);
        $edge_protector_wall2=$edge_protector_wall2-4;
    }
    else
    {$edge_protector_wall3=0;}//- harware box to check to do

    //-- edge protector wall2
    if($minlwh < 100)
    {
        $edge_protector_wall2=$edgelength*3*8/75;
        $edge_protector_wall2=round($edge_protector_wall2);
        $edge_protector_wall2=$edge_protector_wall2/450;
    }
    else
    {$edge_protector_wall2=0;}//- harware box to check to do



    $result=array();
    $result['case']=$case;
    $result['weight_class']=$weight_class;
    $result['cartoon_spec']=$cartoon_spec;
    $result['packing_standard']=$packing_standard;
    $result['edge_protector']=$edge_protector;
    $result['wrap_thickness']=$wrap_thickness;
    $result['cartoon_sq_mtr']=$cartoon_sq_mtr;
    $result['addmm']=$addmm;
    $result['cartoonlmm']=$cartoonlmm;
    $result['cartoonwmm']=$cartoonwmm;
    $result['cartoonhmm']=$cartoonhmm;
    $result['minlwh']=$minlwh;
    $result['edgelength']=$edgelength;
    $result['area']=$area;
    $result['corner_protector4']=$corner_protector4;
    $result['corner_protector3']=$corner_protector3;
    $result['edge_protector_wall3']=$edge_protector_wall3;
    $result['edge_protector_wall2']=$edge_protector_wall2;
    // $result['edgelength']=$edgelength;
    // $result['edgelength']=$edgelength;
    return $result;
}

function control_sqft($length,$width,$height,$qty)
{
$control_sqft0 = ($length*$width*2)/92900;
$control_sqft1 = ($length*$height*2)/92900;
$control_sqft2 = ($height*$width*2)/92900;

//- sq ft only
$control_sqft21=$control_sqft0+$control_sqft1+$control_sqft2;
$control_sqft3=round($control_sqft21,3);

//-- control sql ft final
$control_sqft4 = round($control_sqft3,3)*$qty;

$val=array ("sqft"=>$control_sqft3,"control_sqft"=>$control_sqft4);
return $val;
}

function deletepolish_step7_estimator($key,$id)
{
    echo $select = "select * from sales_rfq_items where id='$id'";
    $select = $this->db_handle->runBaseQuery($select);
    $finish = json_decode($select[0]['finish'],true);
    unset($finish[$key]);
    $finish = json_encode($finish);
    $update0="update  sales_rfq_items SET finish='$finish' where id='$id' ";
    $update0 = $this->db_handle->update($update0);
}

function step_final_submit($part,$id)
{
    $update0="update  sales_rfq_items SET final_submit='$part' where id='$id' ";
    $update0 = $this->db_handle->update($update0);
}

function step_11_loadability($part,$id)
{
    $update0="update  sales_rfq_items SET loadability='$part' where id='$id' ";
    $update0 = $this->db_handle->update($update0);
}

function calculateCartonFit($cartonLength, $cartonWidth, $cartonHeight, $containerType) {
    // Container dimensions in mm
    $containers = [
        '20ft' => ['length' => 5898, 'width' => 2352, 'height' => 2393],
        '40ft' => ['length' => 12032, 'width' => 2352, 'height' => 2393],
        '40ftHQ' => ['length' => 12032, 'width' => 2352, 'height' => 2698],
    ];

    if (!isset($containers[$containerType])) {
        return ['error' => 'Invalid container type.'];
    }

    $container = $containers[$containerType];

    // Fit calculation
    $fitLength = floor($container['length'] / $cartonLength);
    $fitWidth  = floor($container['width']  / $cartonWidth);
    $fitHeight = floor($container['height'] / $cartonHeight);

    $totalCartons = $fitLength * $fitWidth * $fitHeight;
    $result = array('fit_lengthwise' => $fitLength,
        'fit_widthwise'  => $fitWidth,
        'fit_heightwise' => $fitHeight,
        'total_fit'      => $totalCartons);
    return $result;
}
//=========== end 
}?>