<?php
// document_root: /home/lafetepa/www/extww2fetezfr

require "../prive_sql/sql_controller.php";
//page_public_index
try {
	$request = array_merge($_GET, $_POST);
	$controller = new sql_app\Controller();
	$controller->setRequest($request);
	$request["page_precise"]="page_public_index";

	//if (isset($request['action']) && $request['action'] != ""){
		// si from action
		//$action = $request['action'];
		//$controller->$action($request);
		//$controller->include_page(str_replace('..','',$action),$request);
	//} else {
		// sinon default
		$controller->index($request);
	//}
} catch (Exception $e) {
	echo $e;
}

?>