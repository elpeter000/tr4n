<?php
require_once "Main.class.php";
require_once 'ApiKeyMaker.class.php';

date_default_timezone_set("America/Argentina/Mendoza");

class Calcular extends Main {
	
	public function calculate($idUsuario, $key, $lineaId, $parada)
	{
		$remoteMethod = "Calcular";

		$paramFecha = date("c", time());
		$hashFecha = date("YmdHs", time());

		$apiKeyMaker = new ApiKeyMaker();
		$hash = $apiKeyMaker->getHashWithKey($key, $lineaId, $parada, $hashFecha);
		
		$wsParams = array(
						'fecha'		=> $paramFecha,
						'id'		=> $idUsuario,
						'hash'		=> $hash,
						'linea'		=> $lineaId,
						'parada'	=> $parada
				);

		$main = new Main();
		$result = $main->getWsBasic($wsParams, $remoteMethod);

		//print_r($result);
		return($result);

	}

}