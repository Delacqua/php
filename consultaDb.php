<?php

	header("Content-Type: application/json");

	include_once("Db.php");

	$dataDB = new Db();

	//$tabella = $_SERVER['tabella'];
	$tabella = 'produtos';

    $outp = $dataDB->prendeTabella($tabella);

    echo json_encode($outp);