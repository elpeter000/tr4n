<?php
require_once 'Main.class.php';


class Parada extends Main {
	
	public function getStop($lineaId, $nombreCalle, $nombreEntreCalle)
	{		
		$remoteMethod = "ObtenerParadas";
		
		$wsParams = array(
						'linea'				=> $lineaId,	
						'nombreCalle'		=> $nombreCalle,
						'nombreEntreCalle'	=> $nombreEntreCalle
			);
		
		$main = new Main();
		$result = $main->getWsBasic($wsParams, $remoteMethod);
		
		return $result;
		//print_r($result);
		
	}

}