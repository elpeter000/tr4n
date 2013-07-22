<?php
require_once "classes/Main.class.php";
require_once 'classes/ApiKeyMaker.class.php';


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
		return $result;

	}

}