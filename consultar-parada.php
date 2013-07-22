<?php

require_once "classes/Parada.class.php";

$parada = new Parada();

$paradas = $parada->getStop($_GET['id'], $_GET['calle'], $_GET['entrecalle']);

$xml_paradas = simplexml_load_string($paradas->ObtenerParadasResult->any);


?>

El C&oacute;digo de parada es: 

<?php foreach ($xml_paradas->Paradas->Table1 as $value): ?>

	<?php echo $value->idParada; ?><br><br>
				
<?php endforeach; ?> 		      
