<?php

require_once 'Main.class.php';


class Calle extends Main {
	
	public function getStreets($lineaId)
	{
		$remoteMethod = "ObtenerCalles";
		
		$wsParams = array(
				'linea'	=> $lineaId
			);
		
		$main = new Main();
		$result = $main->getWsBasic($wsParams, $remoteMethod);
		
		print_r($result);

	}
	
	public function getBetweenStreets($lineaId, $nombreCalle)
	{
		$remoteMethod = "ObtenerEntreCalles";
		
		$wsParams = array(
				'linea'			=> $lineaId,
				'nombreCalle'	=> $nombreCalle
			);
		
		$main = new Main();
		$result = $main->getWsBasic($wsParams, $remoteMethod);
		
		print_r($result);

	}

}

?>