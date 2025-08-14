<?php 
switch ($action) {
case "sampling":
	if($_GET['query']=='add_sample')
	{
        echo "called";
        print_r($_POST);
    }
break;
}
?>