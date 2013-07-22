<?php

class ApiKeyMaker {

	public function obtenerMd5($text,$key)
	{
		return base64_encode(hash_hmac('md5',mb_convert_encoding($text, "UTF8", "ASCII"),mb_convert_encoding($key, "UTF8", "ASCII"),true));
	}

	public function getHashWithKey($key,$linea,$parada,$fecha)
	{
		$text = $linea.$parada.$fecha;
		return $this->obtenerMd5($text,$key);
	}
		
}
?>