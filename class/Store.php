<?php 
require_once ("DBController.php");

class Store {
    private $db_handle;
   
    function __construct() {
        $this->db_handle = new DBController();
    }

    //-------------- create
    function create_cat($cat)
	{
		$query = "insert into store_item_cat(cat)VALUES(?)";
        $paramType = "s";
        $paramValue = array($cat);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    	return $insertId;    
    }
    function create_subcat($cat,$subcat)
	{
		$query = "insert into store_item_cat(cat,subcat)VALUES(?,?)";
        $paramType = "is";
        $paramValue = array($cat,$subcat);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    	return $insertId;   
        
    }
    function create_unit($unit)
	{
		$query = "insert into store_unit(unit)VALUES(?)";
        $paramType = "s";
        $paramValue = array($unit);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    	return $insertId;    
    }
    function create_store_item($product_name,$hsn_code,$cat,$subcat,$pic,$unit,$material_group,$capability,$labour_inr)
    {
        $query = "insert into store_item(product_name,hsn_code,cat,subcat,image,unit,material_group,capability,labour_inr)VALUES(?,?,?,?,?,?,?,?,?)";
        $paramType = "ssiisssss";
        $paramValue = array($product_name,$hsn_code,$cat,$subcat,$pic,$unit,$material_group,$capability,$labour_inr);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    	return $insertId;    
    }
    function create_store_po($inv_nu,$supplier_name,$po_date)
    {
        $added_by=$_SESSION['uid'];
        $query = "insert into store_po(inv_nu,supplier_name,po_date,added_by)VALUES(?,?,?,?)";
        $paramType = "sssi";
        $paramValue = array($inv_nu,$supplier_name,$po_date,$added_by);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    	return $insertId;
    }
    function add_item_po_qty($sku,$qty,$poid)
    {
        $query = "insert into store_po_details(sku,qty,poid)VALUES(?,?,?)";
        $paramType = "iii";
        $paramValue = array($sku,$qty,$poid);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    	return $insertId;
    }

    function receive_po_item($id,$qty_received)
    {
        $query = "update orders_po_details SET received = received+$qty_received where id='$id' ";
        $insertId = $this->db_handle->runSingleQuery($query);
    	return $insertId;
    }

//------------ edit
    function edit_cat($cat,$id)
	{
         $query = "update store_item_cat SET cat = '$cat' where id='$id' ";
        $insertId = $this->db_handle->update($query);
    	return $insertId;    
    }
    function edit_subcat($cat,$subcat,$id)
	{
         $query = "update store_item_cat SET cat = '$cat', subcat='$subcat' where id='$id' ";
        $insertId = $this->db_handle->update($query);
    	return $insertId;    
    }

    function edit_store_item($product_name,$hsn_code,$cat,$subcat,$pic,$unit,$id)
    {
        $query = "update store_item SET product_name='$product_name',hsn_code='$hsn_code',cat='$cat',subcat='$subcat',unit='$unit',image='$pic' where id='$id' ";
        $insertId = $this->db_handle->update($query);
    	return $insertId;    
    }
    function update_item_qty($sku,$qty)
    {
        $query = "update store_item SET stock = stock+$qty where id='$sku' ";
        $insertId = $this->db_handle->update($query);
    }

    function update_item_qty_debit($sku,$qty)
    {
        $query = "update store_item SET stock = stock-$qty where id='$sku' ";
        $insertId = $this->db_handle->update($query);
    }

    function update_stock_history($qty,$pid,$tra_type,$remark)
    {
        $query = "insert into store_item_history(qty,pid,tra_type,remark)VALUES(?,?,?,?)";
        $paramType = "iiss";
        $paramValue = array($qty,$pid,$tra_type,$remark);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    	return $insertId;
    }


    function update_product_qty($pid,$qty,$type)
    {
        if($type='Cr')
        {$query = "update products SET stock = stock+$qty where id='$pid' ";}
        else
        {$query = "update products SET stock = stock-$qty where id='$pid' ";}
        $this->db_handle->update($query);
        
    }
    function update_product_history($qty,$pid,$tra_type,$remark)
    {
        $query = "insert into product_history(qty,pid,tra_type,remark)VALUES(?,?,?,?)";
        $paramType = "iiss";
        $paramValue = array($qty,$pid,$tra_type,$remark);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);

        //--update stock
        $this->update_product_qty($pid,$qty,$tra_type);
    	return $insertId;
    }

    function update_unit($unit,$id)
    {
        $query = "update store_unit SET unit = '$unit' where id='$id' ";
        $insertId = $this->db_handle->update($query);
        return $insertId;
    }
   
//---------- view
    function get_cat()
    {
        $sql = "SELECT * FROM store_item_cat WHERE cat  NOT REGEXP '^[0-9]+$'";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;   
    }

    function maxid($tablename)
    {
        $sql = "SELECT * FROM $tablename ORDER BY id DESC LIMIT 0, 1";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result[0]['id'];
    }

    function get_subcat()
    {
        $sql = "SELECT * FROM store_item_cat where subcat != ''";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;   
    }

    function get_unit()
    {
        $sql = "SELECT * FROM store_unit ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;   
    }
    
    function get_unit_one($id)
    {
        $sql = "SELECT * FROM store_unit where id='$id' ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;   
    }

    function get_po_one($id)
    {
        $sql = "SELECT * FROM store_po where id='$id' ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result; 
    }

    function get_items()
    {
        $sql = "SELECT * FROM store_item ORDER BY product_name ASC ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result; 
    }

    function get_item_one($id)
    {
        $sql = "SELECT * FROM store_item where id='$id' ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result; 
    }

    function get_stock_po_item($id)
    {
        $sql = "SELECT * FROM store_po_details where poid='$id' ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function view_store_po()
    {
        $sql = "SELECT * FROM store_po ORDER BY id DESC ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function get_item_stock_history($id)
    {
        $sql = "SELECT * FROM store_item_history ORDER BY id DESC ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
//---------- get single
    function get_cat_single($id)
    {
       $sql = "SELECT * FROM store_item_cat where id='$id' ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;   
    }

    function get_subcat_single($id)
    {
        $sql = "SELECT * FROM store_item_cat where id='$id' ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;   
    }

    function get_subcat_bycat($id)
    {
        $sql = "SELECT * FROM store_item_cat where cat='$id' ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;   
    }

   
//------- search
function search_item($sql0)
{
	$sql="select * from store_item where $sql0";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;   
}


//-- dashbaord
function total_item()
{
    $sql="select * from store_item";
    $result = $this->db_handle->runBaseQuery($sql);
    if($result)
    {echo count($result);}
    else
    {echo "0";}
}

function total_item_low_stock()
{
    $sql="select * from store_item where stock < 2";
    $result = $this->db_handle->runBaseQuery($sql);
    if($result)
    {echo count($result);}
    else
    {echo "0";}
}

function total_store_vendor()
{
    $sql="select DISTINCT(supplier_name) from store_po ";
    $result = $this->db_handle->runBaseQuery($sql);
    if($result)
    {echo count($result);}
    else
    {echo "0";}
}
function total_po()
{
    $sql="select * from store_po";
    $result = $this->db_handle->runBaseQuery($sql);
    if($result)
    {echo count($result);}
    else
    {echo "0";}
}

function po_dashboard()
{
    $sql="select * from store_po ORDER by id DESC LIMIT 5";
    $result = $this->db_handle->runBaseQuery($sql);
    return $resutl;
}

function cat_count()
{
    $sql="SELECT DISTINCT(cat),COUNT(*) AS count FROM `store_item` GROUP BY cat";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
}

function get_store_po()
{
    $sql="select * from store_po ORDER by id DESC";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
}

function delete_po($id)
{
    $sql="delete from store_po where id='$id'";
    $result = $this->db_handle->runBaseQuery($sql);

    //-- clear po details and remove items from stock
    $sql0="select * from store_po_details where poid='$id'";
    $result = $this->db_handle->runBaseQuery($sql);
    foreach($result as $row => $value)
    {
        //update stock 
        $this->update_item_qty_debit($result[$row]['sku'],$result[$row]['qty']);
        //-- get pid
        $pid="select * from products where sku_code='$result[$row]['sku']'";
        $pid = $this->db_handle->runBaseQuery($pid);
        $pid=$pid[0]['id'];
        //update history
        $this->update_stock_history($result[$row]['qty'],$pid,'Dr','Po Deleted');
        //-delete detail records
        $sql1="delete from store_po_details where poid='$id'";
        $result1 = $this->db_handle->runBaseQuery($sql1);
    }

    return $result; 
}

function get_material($type)
{
    $select="select * from store_item where product_name LIKE '%$type%' ";
    $material = $this->db_handle->runBaseQuery($select);
    return $material;
}

function get_item_bycat($cat)
{
    $select="select * from store_item where cat='$cat' ";
    $material = $this->db_handle->runBaseQuery($select);
    return $material;
}

function get_item_bysubcat($subcat)
{
    $select="select * from store_item where subcat='$subcat' ";
    $material = $this->db_handle->runBaseQuery($select);
    return $material;
}

function delete_item($id)
{
    $sql="delete from store_item where id='$id'";
    $result = $this->db_handle->runSingleQuery($sql);
    return $result; 
}

function delete_subcat($id)
{
    $sql="delete from store_item_cat where id='$id'";
    $result = $this->db_handle->runSingleQuery($sql);
    return $result;
}

function delete_unit($id)
{
    $sql="delete from store_unit where id='$id'";
    $result = $this->db_handle->runSingleQuery($sql);
    return $result;
}


//- end class


}
