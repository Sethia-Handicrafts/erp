<?php
include_once('class/DBController.php');
include_once('class/Admin.php');
include_once('class/Leads.php');
include_once('class/Sales.php');
include_once('class/Hr.php');
include_once('class/Inventory.php');
include_once('class/Store.php');

$db_handle = new DBController();

$admin = new Admin();
$leads = new Leads();
$sales = new Sales();
$hr = new Hr();
$product = new Inventory();
$store = new Store();

$conn = new DBController();
$con = $conn->connectDB();

$action = "";
if (!empty($_GET["action"])) 
	{
    	$action = $_GET["action"];
	}
	else { ?>
	<script type="text/javascript">
                window.location = "logout.php";
                </script>
				
				<?php }

    
	
?>