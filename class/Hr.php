<?php 
require_once ("DBController.php");



class Hr
{
    private $db_handle;

    function __construct()
    {
        $this->db_handle = new DBController();
    }

    

    function edit_emp_experience($company,$from,$to,$designation,$uid)
    {
        $query = "insert into hr_emp_experience(company,from_date,to_date,designation,uid)VALUES(?,?,?,?,?)";
        $paramType = "ssssi";
        $paramValue = array($company,$from,$to,$designation,$uid);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;     
    }

    function get_emp_profile($id)
    {
        $query="select * from hr_profile where uid='$id' ";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }
    

}