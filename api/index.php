<?php
include('../class/DBController.php');
include('../class/Inventory.php');

$db_handle=new DBController();
$product = new Inventory();
//-- json header
header('Content-Type: application/json; charset=utf-8');

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

//login confirmation
$json = json_decode(file_get_contents('php://input'), true);
//--- action variable
$action = "";
if (!empty($json["action"])) 
	{
    	$action = $json["action"];
	}


switch ($action) {
				
case "api":
        if($json['action']=='api')
        {
            if($json['page']=='product')
            {
                $product_search=$product->wordpress_product($json['search_key']);
            }
            if($json['page']=='product_tags')
            {
                $product_search=$product->wordpress_product_taglist();
            }

        }
 		else
 		{}
break;
}
