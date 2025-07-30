<?php 
require_once ("DBController.php");
// for email
require ('composer/vendor/phpmailer/src/PHPMailer.php');
require ('composer/vendor/phpmailer/src/SMTP.php');
require ('composer/vendor/phpmailer/src/Exception.php');



class Admin 
{
    private $db_handle;

    function __construct()
    {
        $this->db_handle = new DBController();
        $this->email = new PHPMailer\PHPMailer\PHPMailer(true);
    }

//=========users


function create_user($uname,$upass,$utype,$email,$contact,$person_name)
{
    
    $query = "insert into tbluser(uname,upass,utype,uemail,ucontact,person_name)VALUES(?,?,?,?,?,?)";
    $paramType = "ssssss";
    $paramValue = array($uname,$upass,$utype,$email,$contact,$person_name);
    $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    return $insertId;    
}

function get_maxid()
{
    $query="select MAX(id) as id from tbluser";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function edit_user($uname,$upass,$utype,$email,$contact,$person_name,$id)
{
    
        
     $query = "Update tbluser SET uname='$uname',upass='$upass',utype='$utype',uemail='$email',ucontact='$contact',person_name='$person_name' where id='$id' ";
    $result = $this->db_handle->update($query);
    return $result;	
}

function delete_user($id)
{
    $query="delete from tbluser where id='$id' ";
    $result = $this->db_handle->runSingleQuery($query);
    return $result;	
}

function get_alluser()
{
    $query="select * from tbluser";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function get_alluser_ofc()
{
    $query="select * from tbluser where utype != '3' ";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}


function getone_user($id)
{
    $query="select * from tbluser where id = $id";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function getone_user_rand_bytype($type)
{
    $query="select * from tbluser where utype='$type' ORDER by rand() LIMIT 1";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function getonetype_user($utype)
{
    $query="select * from tbluser where utype = $utype Order by uname DESC";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;	
}


    //========== company
function get_company()
{
    $query = "select * from company_details where id='1'";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}
	
//======== country state city (ALL)
function get_country()
{
    $query = "select * from countries Order by name ASC";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}
function get_states($country_id)
{
    $query = "select * from states where country_id='$country_id' Order by name ASC";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}
function get_cities($state_id)
{
    $query = "select * from cities where state_id='$state_id' Order by name ASC";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

//======== country state city (single)
function get_country_one($id)
{
    $query = "select * from countries where id='$id'";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}
function get_states_one($id)
{
    $query = "select * from states where id='$id'";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}
function get_cities_one($id)
{
    $query = "select * from cities where  id='$id'";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}



//================META DATA
	
function get_metaname()
{
    $query = "select * from meta_data GROUP BY meta_name DESC";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function get_metaname_byvalue($meta_name)
{
    $query = "select * from meta_data where meta_name='$meta_name'";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function get_metaname_byvalue_group($meta_name)
{
    $query = "select * from meta_data where meta_name='$meta_name' GROUP BY value1 ORDER by id ASC";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function get_metaname_byvalue1($meta_name,$value1)
{
     $query = "select * from meta_data where meta_name='$meta_name' AND value1='$value1' ";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function get_metaname_byvalue2($meta_name,$value2)
{
     $query = "select * from meta_data where meta_name='$meta_name' AND value2='$value2' ";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function get_metaname_byvalue3($meta_name,$value3)
{
     $query = "select * from meta_data where meta_name='$meta_name' AND value3='$value3' ";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}


function get_metaname_byid($id)
{
    $query = "select * from meta_data where id='$id'";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function create_meta($metaname,$value1,$value2,$editable)
{
    $query = "insert into meta_data(meta_name,value1,value2,editable)VALUES(?,?,?,?)";
    $paramType = "sssi";
    $paramValue = array($metaname,$value1,$value2,$editable);
    $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    return $insertId;
}

function create_meta_withparent($metaname,$value1,$value2,$editable,$parent,$final_step)
{
    $query = "insert into meta_data(meta_name,value1,value2,editable,parent_meta,final_step)VALUES(?,?,?,?,?,?)";
    $paramType = "sssiii";
    $paramValue = array($metaname,$value1,$value2,$editable,$parent,$final_step);
    $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    return $insertId;
}

function get_metaname_byparent($id)
{
    $query = "select * from meta_data where parent_meta='$id'";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function get_metaname_byparent_value2($id,$value2)
{
    $query = "select * from meta_data where parent_meta='$id' AND value2='$value2'";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function edit_meta($metaname,$value1,$value2,$editable,$id)
{
    $query = "update meta_data SET meta_name='$metaname',value1='$value1',value2='$value2',editable='$editable' where id='$id' ";
    $result = $this->db_handle->update($query);
    return $result;
}

function viewall_meta()
{
    $query = "select * from meta_data ORDER BY id DESC";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function delete_meta($id)
{
   echo $query = "delete from meta_data where id='".$id."' ";   
    $result = $this->db_handle->update($query);
    return $result;
}

function get_metaname_byvalue_multi_group($metaname,$value_name,$value_column,$groupby)
{
    $query = "select * from meta_data where $value_column='$value_name' GROUP BY $groupby";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

//========== send email
function send_email()
{
header("Access-Control-Allow-Origin: *");
header('Access-control-Allow-Headers: Authorization,Content-Type ,X-Auth-Token , Origin');

   $username='dme@sethiahandicrafts.com';
   $password='Dme@sethia';
   $to='dme@sethiahandicrafts.com';
   $subject='admin function checking';
   $body='this is the body for email checking used in admin function';

  
   

   // Instantiation and passing `true` enables exceptions
   $mail = $this->email;

   try {
    //Server settings
    $mail->SMTPDebug = 1;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
   // $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP    server    to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP      authentication
    $mail->Username   = $username;                     // SMTP username
    $mail->Password   = $password;                               // SMTP password
    $mail->Host = "tls://smtp.gmail.com";
    $mail->Port = 587;       // Enable TLS encryption; `  PHPMailer::ENCRYPTION_SMTPS` encouraged
   // $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

//Recipients
   $mail->setFrom($username,$username);
   $mail->addAddress($to);     // Add a recipient


   // Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

   // Content
   $mail->isHTML(true);                                  // Set email format to HTML
   $mail->Subject = $subject;
   $mail->Body    = $body;
   //$mail->AltBody =;

   $mail->send();

   echo "<script>";
   echo "window.alert('Email was sent')";
   echo "</script>";


  } catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}

//========= notification
function save_alerts($from,$msg,$to)
{
    $query = "insert into notification(from_uid,msg,to_uid)VALUES(?,?,?)";
    $paramType = "isi";
    $paramValue = array($from,$msg,$to);
    $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    return $insertId;
}

function my_alerts($uid)
{}

function latest_alerts($uid)
{
    $query = "select * from notification where to_uid='$uid' AND status='0' ORDER BY id DESC";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function read_alerts($uid)
{
    $query = "select * from notification where to_uid='$uid' AND status='1' ORDER BY id DESC";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function alert_bystatus($uid,$status)
{}

function alert_update_status($id)
{}



function upload_file($pic)
	{
        $a=$pic;
		$filename = $a['name'];
		$tempname = $a["tmp_name"];
		$folder = "./images/" . $filename;

        $temp = explode(".", $filename);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $folder = "./images/". $newfilename;

		if (move_uploaded_file($tempname, $folder)) {
			return $newfilename;
		} else {
			return 0;
		}
	}


    function upload_file_multi($name,$temp)
	{
        $filename = $name;
		$tempname = $temp;
		
        $rand = rand(1111111,9999999999);
        //-- rename file
        $temp = explode(".", $filename);
        $newfilename = $rand. '.' . end($temp);
        $folder = "./images/". $newfilename;
    
		if (move_uploaded_file($tempname, $folder)) {
			return $newfilename;
		} else {
			return 0;
		}
	}

    //=========global
    function check_table_column($table)
    {
        $query = "SHOW COLUMNS FROM $table";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_steps_by_module($module)
    {   
        $query = "select * from module_info where module_type='$module'";
        $result = $this->db_handle->runBaseQuery($query);
        return $result; 
    }

    function get_module_step($module,$step)
    {   
        $query = "select * from module_info where module_type='$module' AND step='$step'";
        $result = $this->db_handle->runBaseQuery($query);
        return $result; 
    }   

    //====== supprt tickets
    function add_ticket($subject,$description,$img,$uid)
    {
        if(isset($img))
        {
            $img0=$this->upload_file($img);
        }
        else
        {$img0='';}

        $query = "insert into tickets(subject,file,uid)VALUES(?,?,?)";
        $paramType = "ssi";
        $paramValue = array($subject,$img0,$uid);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        
        //-- get latest id from ticketsmsg

        $maxid="select MAX(id) from tickets";
        $result = $this->db_handle->runBaseQuery($maxid);
        $id=$result[0]['MAX(id)'];
        
        //--- insert into ticketsmsg

        $query = "insert into tickets_msgs(msg,tid)VALUES(?,?)";
        $paramType = "si";
        $paramValue = array($description,$id);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);

        return $insertId;
    }

    function get_alltickets()
    {
        $query = "select * from tickets ORDER BY id DESC";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }
    function get_tickets($uid)
    {
        $query = "select * from tickets where uid='$uid' ORDER BY id DESC";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function getone_ticket($id)
    {
        $query = "select * from tickets where id='$id'";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function getone_ticket_details($id)
    {
        $query = "select * from tickets_msgs where tid='$id'";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function add_ticket2($description,$tid)
    {
        $query = "insert into tickets_msgs(msg,tid)VALUES(?,?)";
        $paramType = "si";
        $paramValue = array($description,$tid);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);

        return $insertId;
    }

    function ticket_close($id)
    {
       echo $query = "update tickets set status='1' where id='$id'";
        $result = $this->db_handle->update($query);
        return $result; 
    }
}
