<?php

require_once "classes/Calcular.class.php";

$calcular = new Calcular();

//$resultado = $calcular->calculate( "9ffc3302-ebaa-4d28-55f5-952dd852c808", "+ufZ1l23u4WMl8PNrYgnYJR2YwI9VsguKZkZxuny", $_GET['lineas'],  $_GET['paradas'] );

$linea = explode(",", $_GET['lineas']);

$resultado = $calcular->calculate( "9ffc3302-ebaa-4d28-55f5-952dd852c808", "+ufZ1l23u4WMl8PNrYgnYJR2YwI9VsguKZkZxuny", $linea[1],  $_GET['parada'] );

	
//$xml_calles = simplexml_load_string($resultado);

	
//echo 'El colectivo pasa en: ';

echo $resultado->CalcularResult;

//print_r($resultado);

//echo $reultado;

//echo $xml_calles->CalcularResult;
	
//$screen = simplexml_load_string($resultado);

//echo $screen;


?>