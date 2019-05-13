<?php
require_once("SimpleRest.php");
require_once("Mobile.php");

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
require_once("{$base_dir}conf{$ds}dbSettings.php");

include_once 'MySQL5.php';
include_once 'Util.php';
include_once 'MailClient.php';
class SmartCallRestHandler extends SimpleRest 
{


	function getServiceList()
	{
		$arr = json_decode(file_get_contents("CountryCodes.json"));
		$this -> output($arr);
	}
		
	
}

?>