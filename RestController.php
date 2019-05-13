<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once("class/GarageRestHandler.php");
require_once("class/GarageLogin.php");

$GarageRestHandler = new GarageRestHandler();
$GarageLogin = new GarageLogin();
		
$view = "";
if(isset($_GET["view"]))
	$view = $_GET["view"];
	
$requestObj = json_decode(file_get_contents("php://input"));

switch($view){

	case "" :
		//404 - not found;
		break;

	case "getBrands":
		$GarageRestHandler = new GarageRestHandler();
		$GarageRestHandler -> getBrands();
	break;
	
	case "getService":
		$GarageRestHandler = new GarageRestHandler();
		$GarageRestHandler -> getServiceList();
	break;
	
	case "getRepairList":
		$GarageRestHandler = new GarageRestHandler();
		$GarageRestHandler -> getRepairList();
	break; 
	
	case "SIGN":
		$GarageRestHandler = new GarageRestHandler();
		$GarageRestHandler -> signIn($requestObj);
	break;
	
	case "addRepairPhotos":
		$GarageRestHandler = new GarageRestHandler();
		$GarageRestHandler -> addRepairPhotos($requestObj);
	break;
	
	case "getRepairPhotos":
		$GarageRestHandler = new GarageRestHandler();
		$GarageRestHandler -> getRepairPhotos($requestObj);
	break;

	case "addCustomerDetails":
		$GarageRestHandler = new GarageRestHandler();
		$GarageRestHandler -> addCustomerDetails($requestObj);
	break;
	
	case "addCustomerSignature":
		$GarageRestHandler = new GarageRestHandler();
		$GarageRestHandler -> addCustomerSignature($requestObj);
	break;
	
	case "getInventoryList":
		$GarageRestHandler = new GarageRestHandler();
		$GarageRestHandler -> getInventoryList();
	break;
	case "setInventoryList":
		$GarageRestHandler = new GarageRestHandler();
		$GarageRestHandler -> setInventoryList();
	break;

	
}
?>
