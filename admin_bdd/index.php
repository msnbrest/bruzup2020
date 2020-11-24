<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL);

require "../prive_sql/sql_controller.php";

try {
	$request = array_merge($_GET, $_POST);
	$controller = new sql_app\Controller();
	$controller->setRequest($request);

	if (isset($request['action']) && $request['action'] != ""){
		// si form action
		$action = $request['action'];
		$controller->$action($request);
		//$controller->include_page(str_replace('..','',$action),$request);
	} else {
		// sinon default
		$controller->index($request);
	}
} catch (Exception $e) {
	echo $e;
}

?>