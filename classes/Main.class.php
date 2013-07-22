<?php

class Main {
	
	public function getWsBasic($wsParams, $remoteMethod)
	{
		
		$soapClient = new SoapClient("http://ws_geosolution.geosolution.com.ar/ws_GeoArribos/WS.asmx?wsdl");
		
		$error = 0;
		try {
		
			$info = $soapClient->__soapCall($remoteMethod, array($wsParams));
		
		} catch (SoapFault $fault) {
		
			$error = 1;
			print("ERROR: ".$fault->faultcode." +-+ ".$fault->faultstring."");
		
		}
		
		if ($error == 0) {
			return $info;
		}
		
	}
}