<?php

$datemax=1606383169;

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
		$controller->super_admin($request);
		//}

	}catch(Exception $e){
		echo $e;
	}

}else{

	echo"Eteint depuis ".(date("U")-$datemax)." donc go ".(date("U")+120)." ou ".(date("U")+1200);

}

?>