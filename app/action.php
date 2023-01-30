<?php
session_start();
include 'servicio.php';
$invoice = new Servicio();
if($_POST['action'] == 'delete_Vigilancia' && $_POST['id']) {
	$invoice->deleteVigilancia($_POST['id']);	
	$jsonResponse = array(
		"status" => 1	
	);
	echo json_encode($jsonResponse);	
}
if($_GET['action'] == 'logout') {
session_unset();
session_destroy();
header("Location:index.php");
}