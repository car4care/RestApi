<?php
require_once("SimpleRest.php");
require_once("Mobile.php");

include_once "conf/dbSettings.php";
include_once 'class/MySQL.php';
include_once 'class/MailClient.php';

class GarageLogin extends SimpleRest 
{
	function signUp($signUpObj)
	{
		if(!$signUpObj)
		{
			echo "Incorrect Parameter";
			return;
		}
		
		$m = new MySQL();
		$resultSignUpObj = new stdClass();
		$resultSignUpObj -> status = 0;
		
		$query = "select count(id) isExists, id from tbl_users where android_id = '{$signUpObj -> android_id}' and device_id = '{$signUpObj -> device_id}'";
		$row = $m -> executeQuery($query,'select');
		//$row = mysql_fetch_object($res);
		if($row -> isExists > 0)
		{
			$resultSignUpObj -> status = "1";
			$resultSignUpObj -> user_id = $row -> id;
			$resultSignUpObj -> message = "Sign Up Success";
		}
		else
		{
			$query = "insert into tbl_users (android_id, device_id, created_date) value ('{$signUpObj -> android_id}','{$signUpObj -> device_id}', '".date('Y-m-d')."')";
			$inserted_id = $m -> executeQuery($query,'insert');
			
			$resultSignUpObj -> status = "1";
			$resultSignUpObj -> user_id = $inserted_id;
			$resultSignUpObj -> message = "Sign Up Success";
		}
		$this -> output($resultSignUpObj);
	}
}
?>