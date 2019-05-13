<?php
require_once("SimpleRest.php");
require_once("Mobile.php");

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
require_once("{$base_dir}conf{$ds}dbSettings.php");

include_once 'MySQL5.php';
include_once 'Util.php';
include_once 'MailClient.php';
class GarageRestHandler extends SimpleRest 
{

	function getAllBrands()
	{

		$m = new MySQL5();
		$query = "select brand_name,logo_file from tbl_brands where isActive=1";

		$resObj = new stdClass();

		$brands = $m -> executeQuery($query,'select');
		$resObj['status']=1;
		$resObj['brand_name']=$brands -> brand_name;
		$resObj['logo_url']=$brands -> logo_file;
		$this -> output($resObj);
	}


	function getBrands()
	{

		$m = new MySQL5();
		$query = "select brand_name,logo_file from tbl_brands where isActive=1 LIMIT 10";

		$resObj = new stdClass();

		$brands = $m -> executeQuery($query,'select');
		$resObj['status']=1;
		$resObj['brand_name']=$brands -> brand_name;
		$resObj['logo_url']=$brands -> logo_file;
		$this -> output($resObj);
	}

	function getServiceList()
	{
		$arr = json_decode(file_get_contents("CountryCodes.json"));
		$this -> output($arr);
	}
	
	function getRepairList()
	{
		$arr = json_decode(file_get_contents("CountryCodes.json"));
		$this -> output($arr);
	}


	function getRepairPhotos()
	{
		$arr = json_decode(file_get_contents("CountryCodes.json"));
		$this -> output($arr);
	}
	function getInventoryList()
	{
		$arr = json_decode(file_get_contents("CountryCodes.json"));
		$this -> output($arr);
	}		


	function addRepairPhotos($userObject)
	{
		$resObj = new stdClass();
		$util  = new Util();

		if(!$userObject)
		{
			$resObj = $util -> missingParam();	
			$this -> output($resObj);			
			return;
		}		
		$arr = json_decode(file_get_contents("CountryCodes.json"));
		$this -> output($arr);
	}	

	function addCustomerDetails($userObject)
	{
		$resObj = new stdClass();
		$util  = new Util();

		if(!$userObject)
		{
			$resObj = $util -> missingParam();	
			$this -> output($resObj);			
			return;
		}			
		$arr = json_decode(file_get_contents("CountryCodes.json"));
		$this -> output($arr);
	}		

	function setInventoryList($userObject)
	{
		$resObj = new stdClass();
		$util  = new Util();

		if(!$userObject)
		{
			$resObj = $util -> missingParam();	
			$this -> output($resObj);			
			return;
		}			
		$arr = json_decode(file_get_contents("CountryCodes.json"));
		$this -> output($arr);
	}		

	function addCustomerSignature($userObject)
	{
		$resObj = new stdClass();
		$util  = new Util();

		if(!$userObject)
		{
			$resObj = $util -> missingParam();	
			$this -> output($resObj);			
			return;
		}			
		$arr = json_decode(file_get_contents("CountryCodes.json"));
		$this -> output($arr);
	}	 
}

?>