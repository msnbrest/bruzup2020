<?php

$datemax=1606295303;

include("../prive/mdp.php");

if( $_POST["password_postsql"]==$mdp_postsql && date("U")<$datemax ){

	ini_set('display_errors', 'on');
	error_reporting(E_ALL);

	require "../prive_sql/sql_controller.php";

	try {
		$request = array_merge($_GET, $_POST);
		$controller = new sql_app\Controller();

		/*if (isset($request['action']) && $request['action'] != ""){
			// si form action
			$action = $request['action'];
			$controller->$action($request);
		} else {*/
			// sinon default
			// $myquery="";
					//drop table lfpf_nouvelleltltlt
					//SELECT TABLE_NAME FROM information_schema.tables
					// SELECT TABLE_NAME FROM information_schema.tables where TABLE_NAME = lfpf_noleltltlt
					//SELECT%20TABLE_NAME%20FROM%20information_schema.tables
			//echo"myquery = ".$myquery;
		$controller->super_admin($request);
		//}

	}catch(Exception $e){
		echo $e;
	}

}else{

	echo"Eteint depuis ".(date("U")-$datemax);

}

?>