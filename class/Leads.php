<?php 
require_once ("DBController.php");

class Leads 
{
    
    function __construct()
    {
        $this->db_handle = new DBController();
    }

    function create_new($company,$company_type,$groupid,$group_remak,$userid,$attachment,$target_date,$step)
    {           
        $query = "insert into leads(company,company_type,group_id,group_remark,handledby,attachment,targetted_date,step)VALUES(?,?,?,?,?,?,?,?)";
        $paramType = "ssisissi";
        $paramValue = array($company,$company_type,$groupid,$group_remak,$userid,$attachment,$target_date,$step);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    	
         //-- get max id from beneficiery table
            $max="select MAX(id) AS max_id from leads";
            $result = $this->db_handle->runBaseQuery($max);
            $id=$result[0]['max_id'];

            return $id;       

    }

    function edit_lead($name,$phone,$email,$city,$state,$country,$designation,$req,$lp_url,$form_id,$company,$status,$id)
    {
        $update="update leads SET name='$name',phone='$phone',email='$email',city='$city',state='$state',country='$country',designation='$designation',req='$req',lp_url='$lp_url',form_id='$form_id',company='$company', status='$status' where id='$id' ";
        $up = $this->db_handle->update($update);
        return $up;

        // $query = "Update leads SET name=?,phone=?,email=?,city=?,state=?,country=?,designation=?,req=?,lp_url=?,form_id=?,company=? where id=? ";
        // $paramType = "sisiiisssisi";
        // $paramValue = array($name,$phone,$email,$city,$state,$country,$designation,$req,$lp_url,$form_id,$company,$id);
        // $insertId = $this->db_handle->update($query, $paramType, $paramValue);
        // return $insertId;
    }

    function view_all()
    {
        $query="select * from leads ORDER BY date_time DESC ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function view_all_byuser($uid)
    {
        $query="select * from leads where handledby='$uid' ORDER BY id DESC";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_lead_one($id)
    {
         $query="select * from leads where id='$id'";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_lead_last_feedback($id)
    {
        $query="select * from lead_feedback where lid='$id' ORDER BY id DESC";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_group()
    {
        $query="select * from lead_group where parent_group='0' ORDER BY id DESC";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_sub_group($id)
    {
        $query="select * from lead_group where parent_group='$id' ORDER BY id DESC";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

function get_group_one($id)
    {
        $query="select * from lead_group where id='$id'  ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function create_group($gname,$parent_group,$lead_confirm_time,$per_day_lead,$color)
    {        
        $query = "insert into lead_group(gname,parent_group,lead_confirm_time,per_day_lead,color)VALUES(?,?,?,?,?)";
        $paramType = "siiis";
        $paramValue = array($gname,$parent_group,$lead_confirm_time,$per_day_lead,$color);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    	return $insertId;    
        
    }

    function get_group_record($groupid)
    {
        $query="select * from leads where group_id='$groupid'";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_leads_bystatus($status)
    { 
        $query="select * from leads where status='$status'";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_leads_bystatus_byuser($status,$uid)
    { 
        $query="select * from leads where status='$status' AND handledby='$uid' ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_leads_qualified($qa)
    {
        $query="select * from leads where lead_qualified='$qa'";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    //-- feedback
    function save_feedback($id,$feedback,$status,$next_feedback_date,$qualified,$feedback_type)
    {
        $query = "insert into lead_feedback(lid,feedback,next_feedback_date,feedback_type)VALUES(?,?,?,?)";
        $paramType = "isss";
        $paramValue = array($id,$feedback,$next_feedback_date,$feedback_type);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    	  

        //-- update lead status to pending 
        $query="select * from leads where id='$id'";
		$result = $this->db_handle->runBaseQuery($query);


        $updated=date('Y-m-d h:i:s');
            if($result[0]['status'] != $status)
            { $query0 = "Update leads SET status='$status', lead_qualified='$qualified', last_updated='$updated' where id='$id' ";}
            else{ $query0 = "Update leads SET last_updated='$updated',lead_qualified='$qualified' where id='$id' ";}
        $insertId0 = $this->db_handle->update($query0);    
        return $insertId0;
       
    }

    function get_feedback_limit_5($id)
    {
        $query="select * from lead_feedback where lid='$id'ORDER by id LIMIT 5 ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result; 
    }

    function get_feedback_list($id)
    {
        $query="select * from lead_feedback where lid='$id' AND feedback_type != '' ORDER by id  ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result; 
    }

    function get_feedback_list_sales($id)
    {
        $query="select * from lead_feedback where lid='$id' AND feedback_type = '' ORDER by id  ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result; 
    }

    function lead_feedback_viewall()
    {
        $query="select * from lead_feedback GROUP BY lid ORDER by id DESC  LIMIT 20";
		$result = $this->db_handle->runBaseQuery($query);
        return $result; 
    }

    function save_csv_records($header,$bodyrow)
    {
        $header=preg_replace('/[\x00-\x1F\x7F-\xFF]/', '', $header);
        $bodyrow=implode("','",$bodyrow);
        //-- query
        $insert="insert into leads($header)Values('$bodyrow')";
        $result = $this->db_handle->insert_id($insert);
        //-- max id return
        $max= $this->db_handle->get_max_id('leads');
        return $max['MAX'];
    }

    function save_csv_records2($header,$max_id,$type)
    {
        
        //-- col loop
        $col=array();      
        $d=1;
        
        foreach($header as $r)
        {
            array_push($col,'col'.$d);
            $d++;
        }  
        $col_name = implode(",",$col);    


        $header = implode("','", array_map(function ($entry) {            
            return $entry['column_data'];
          }, $header));

        $header=preg_replace('/[\x00-\x1F\x7F-\xFF]/', '', $header);


        //-- query
         $insert="insert into leads2($col_name,lid,type)Values('$header','$max_id','$type')";
        $result = $this->db_handle->insert_id($insert);
        //return $result;
    }

    function upload_csv_details($file,$nu_record,$userid,$groupid)
    {
       
        $query = "insert into leads_upload_history(filename,uploadedby,nu_of_records,uploadedto,groupid)VALUES(?,?,?,?,?)";
        $paramType = "siiii";
        $paramValue = array($file,$_SESSION['uid'],$nu_record,$userid,$groupid);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    }

    function get_my_uploads_dashboard($uid)
    {
        $query="select * from leads_upload_history where uploadedto='$uid' ORDER by id DESC LIMIT 5 ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result; 
    }


    function get_my_uploads($uid)
    {
        $query="select * from leads_upload_history where uploadedto='$uid' ORDER by id DESC";
		$result = $this->db_handle->runBaseQuery($query);
        return $result; 
    }

    function get_all_uploads()
    {
        $query="select * from leads_upload_history  ORDER by id DESC";
		$result = $this->db_handle->runBaseQuery($query);
        return $result; 
    }


    function get_my_next_follow_dashboard($uid)
    {
        $date=date('Y-m-d');
        $query="SELECT * FROM leads where handledby = '$uid' AND targetted_date < '$date' AND step != '0' LIMIT 5";
		$result = $this->db_handle->runBaseQuery($query);
        return $result; 
    }

    function get_my_next_follow_dashboard_bdm($uid)
    {
        $date=date('Y-m-d');
        $query="SELECT * FROM leads where audit_by = '$uid' AND targetted_date < '$date' LIMIT 5";
		$result = $this->db_handle->runBaseQuery($query);
        return $result; 
    }

    function get_my_next_follow_old_dashboard($uid)
    {
        $date=date('Y-m-d');
        $query="SELECT * FROM leads where handledby = '$uid' AND  audit_by != '0' AND step != '0' LIMIT 5";
		$result = $this->db_handle->runBaseQuery($query);
        return $result; 
    }

    function get_my_next_follow_old_dashboard_bdm($uid)
    {
        $date=date('Y-m-d');
        $query="SELECT * FROM leads where  audit_by = $uid LIMIT 5";
		$result = $this->db_handle->runBaseQuery($query);
        return $result; 
    }

    function get_leadbystatus_dashboard_month($uid,$month)
    {
        $query="SELECT COUNT('id') AS count,status FROM leads where handledby = '$uid' AND last_updated LIKE '$month%' GROUP BY status ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result; 
    }

    function get_leadbystatus_dashboard_overall($uid)
    {
        $query="SELECT COUNT('id') AS count,status FROM leads where handledby = '$uid' GROUP BY status ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result; 
    }

    function get_group_allotedto_data($uid)
    {
        $query="SELECT * FROM leads_upload_history where uploadedto = '$uid' ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result; 
    }

    //--- reports function 
    function get_leads_handled_bt_dates($start,$end)
    {
        $query="SELECT * FROM lead_feedback where date_time BETWEEN '$start' AND '$end' ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result; 
    }

    function leads_save_company_details($lid,$details,$value1,$value2,$value3,$value4)
    {
        if(is_array($value2))
        {$value2=serialize($value2);}
        $query = "insert into lead_compnay_details(lid,details,value1,value2,value3,value4) VALUES('$lid','$details','$value1','$value2','$value3','$value4')";
        $insertId = $this->db_handle->update($query);
        return $insertId;
    }

    function get_leads_company_details($lid)
    {
        $query="SELECT * FROM lead_compnay_details  where lid='$lid' ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;   
    }

    function get_leads_company_details_bydetails($lid,$details)
    {
        $query="SELECT * FROM lead_compnay_details  where lid='$lid' AND details='$details' ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;   
    }

    function get_leads2_header($id)
    {
        $query="SELECT * FROM leads2  where id='$id' AND type='header'";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;   
    }

    function get_leads2_data($id)
    {
        $query="SELECT * FROM leads2  where lid='$id' AND type='data'";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;   
    }

    function meta_lead_company_details($metaname,$value1,$value2,$value3,$value4,$value1_input,$value2_input,$value3_input,$value4_input)
    {
        $query = "insert into meta_data(meta_name,value1,value2,value3,value4,value1_input,value2_input,value3_input,value4_input)VALUES('$metaname','$value1','$value2','$value3','$value4','$value1_input','$value2_input','$value3_input','$value4_input')";
       
        $insertId = $this->db_handle->update($query);
        return $insertId;
    } 

    function update_meta_company($value1,$value2,$value3,$value4,$value2_input,$value3_input,$value4_input,$id)
    {
        
        $update="update meta_data SET value1='$value1', value2='$value2',value3='$value3',value4='$value4',value2_input='$value2_input',value3_input='$value3_input',value4_input='$value4_input' where id='$id' ";
        $insertId = $this->db_handle->update($update);
        return $insertId;
    }

    function check_company_research($company,$lid)
    {
        $query="SELECT * FROM leads where company='$company' ";
		$result = $this->db_handle->runBaseQuery($query);
        $ids=array();
        if(count($result)>0)
        {
           foreach($result as $r)
           {
               array_push($ids,$r['id']) ;
           }

           $compny_c = count($ids); 

        if($compny_c>1)
        {
            //-- check between data that any comapny research found or not
            $ids=implode("','",$ids);
            $query="SELECT * FROM lead_compnay_details  where lid IN ('$ids') ";
            $result = $this->db_handle->runBaseQuery($query);
            if($result)
            {return $result[0]['id'];}
            
        }
        else
        {return '0';}  
        }
        
    }

    function company_research_progress($id)
    {
        //-- get total fileds from meta where metaname = lead_company_info
        $query="SELECT * FROM meta_data where meta_name='lead_company_info' ";
        $result = $this->db_handle->runBaseQuery($query);
         $count=count($result);

        $query1="SELECT * FROM lead_compnay_details  where lid='$id' ";
        $result1 = $this->db_handle->runBaseQuery($query1);
        if($result1)
        {$count1=count($result1);}
        else
        {$count1=0;}

        //-- calculate progress
        $progress=($count1/$count)*100; 
        
        
        return round($progress);
    }


    //--change lead qualified status
    function update_lead_qualified($id,$qualified_status)
    {
        $update="update leads SET lead_qualified='$qualified_status' where id='$id' ";
        $insertId = $this->db_handle->update($update);
        return $insertId;
    } 
    
    function update_lead_audit($id,$qualified_status,$audit_by)
    {
        $update="update leads SET comp_audit='$qualified_status',audit_by='$audit_by' where id='$id' ";
        $insertId = $this->db_handle->update($update);
        return $insertId;
    }
    
    function update_lead_audit_md($id,$qualified_status)
    {
        $update="update leads SET comp_audit='$qualified_status' where id='$id' ";
        $insertId = $this->db_handle->update($update);
        return $insertId;
    }

    function view_all_by_qualify($column,$qualify)
    {
        $query="SELECT * FROM leads where $column='$qualify' ";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function step_change($id,$step)
    {
        $query="update leads SET step='$step' where id='$id' ";
        $result = $this->db_handle->update($query);
        return $result;
    }

    function save_comp_profile($lid,$firstname,$lastname,$gender,$company_now,$designation_now,$phone,$country,$state,$city,$zipcode,$timezone,$dob,$family_linkage,$religion,$goal,$point,$motivation,$channel,$current_since)
    {
        $query = "insert into lead_comp_profile (lid,firstname,lastname,gender,company_now,designation_now,phone,country,state,city,zipcode,timezone,dob,family_linkage,religion,goal,point,motivation,channel,current_since)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $paramType = "ssssssssssssssssssss";
        $paramValue = array($lid,$firstname,$lastname,$gender,$company_now,$designation_now,$phone,$country,$state,$city,$zipcode,$timezone,$dob,$family_linkage,$religion,$goal,$point,$motivation,$channel,$current_since);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId; 
       
    }

    function edit_comp_experience($company,$from,$to,$designation,$lid)
    {
        $query = "insert into lead_comp_experience(company,from_date,to_date,designation,lid)VALUES(?,?,?,?,?)";
        $paramType = "ssssi";
        $paramValue = array($company,$from,$to,$designation,$lid); 
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;     
    }

    function get_company_profile($id)
    {
         $query="select * from lead_comp_profile where lid='$id' ";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_company_profile_details($id)
    {
        $query="select * from lead_comp_experience where lid='$id' ";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function view_all_leads_approval()
    {
        $query="select * from leads where step IN (10,31,33,34,35,36,37) ";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function view_all_leads_approval_graphic()
    {
        $query="select * from leads where step IN (32) ";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function leads_company_more_details ($lid,$step,$value1,$value2)
    {
        $query = "insert into leads_company_more_details(lid,step,value1,value2)VALUES(?,?,?,?)";
        $paramType = "ssss";
        $paramValue = array($lid,$step,$value1,$value2);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;   
    }

    function leads_company_more_details_update ($id,$query0)
    {
         $query="update leads_company_more_details SET $query0 where id='$id' ";
        $result = $this->db_handle->update($query);
        return $result;
    }

    function leads_company_more_details_update2 ($id,$value5,$value6)
    {
        $query="update leads_company_more_details SET value5='$value5', value6='$value6' where id='$id' ";
        $result = $this->db_handle->update($query);
        return $result;
    }

    function leads_company_more_details_update3 ($id,$value7,$value8,$value9,$value10)
    {
        $query="update leads_company_more_details SET value7='$value7', value8='$value8',value9='$value9',value10='$value10' where id='$id' ";
        $result = $this->db_handle->update($query);
        return $result;
    }

    function get_company_more_details($step,$id)
    {
        $query="select * from leads_company_more_details where step ='$step' AND lid='$id' ";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    //-- save gd
    function save_leads_gd($lid,$gd)
    {}
}

