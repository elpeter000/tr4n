<?php

require_once "classes/Calle.class.php";

$calle = new Calle();

$linea = explode(",", $_GET['id']);

$calles = $calle->getStreets($linea[0]);

$xml_calles = simplexml_load_string($calles->ObtenerCallesResult->any);


?>

<option value="">Elige una opci&oacute;n</option>
	
<?php foreach ($xml_calles->Calles->Table1 as $value): ?>

	<option value="<?php echo urlencode($value->Calle); ?>"><?php echo $value->Calle; ?></option>
				
<?php endforeach; ?> 		      
