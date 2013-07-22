<?php

require_once 'Main.class.php';


class Linea extends Main {

	public function getLines($localidadId, $clienteId)
	{
		$remoteMethod = "ObtenerLineas";

		/* Secretaria de Transporte de Mendoza
		 * LocalidadID = 11
		 * idCliente = 17
		 */
		$wsParams = array(
				'LocalidadID'	=> $localidadId,
				'idCliente'		=> $clienteId
			);

		$main = new Main();
		$result = $main->getWsBasic($wsParams, $remoteMethod);

		return $result;
		//print_r($result);

	}

}
?>