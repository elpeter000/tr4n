<?php

require_once "classes/Calle.class.php";

$entreCalle = new Calle();

$entrecalles = $entreCalle->getBetweenStreets($_GET['id'], $_GET['calle']);

$xml_entrecalles = simplexml_load_string($entrecalles->ObtenerEntreCallesResult->any);


?>

<option value="">Elige una opci&oacute;n</option>

<?php foreach ($xml_entrecalles->EntreCalles->Table1 as $value): ?>

	<option value="<?php echo urlencode($value->EntreCalle); ?>"><?php echo $value->EntreCalle; ?></option>
				
<?php endforeach; ?> 		      
