<?php

require_once "classes/Linea.class.php";

$linea = new Linea();

$lineas = $linea->getLines(11, 17);

$xml_lineas = simplexml_load_string($lineas->ObtenerLineasResult->any);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Cuando llega v.Beta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="assets/ico/favicon.png">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Cuando llega v.Beta</a>
          <div class="nav-collapse collapse">

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h2>Cuando llega? </h2>
        <p><?php echo count($xml_lineas->lineas->Table1); ?> Recorridos</p>
        <br>
        
        <form class="form-horizontal" action="consultar.php" id="calcular" >
          <div class="control-group">
		    <label class="control-label" for="inputLinea">Recorrido</label>
		    <div class="controls">
		      <select name="lineas" id="lineas" required>
		      	
		      	  <option value="">Elige un recorrido</option>

		      <?php foreach ($xml_lineas->lineas->Table1 as $value): ?>

			      <option value="<?php echo $value->LineaID; ?>,<?php echo substr($value->Linea,0,6); ?>"><?php echo $value->Linea; ?></option>
				
			  <?php endforeach; ?> 		      
		      </select>
		     
		    </div>
		  </div>
		  
		  
		  <div id="consultarcalle" style="display:none">

			  <div class="control-group">
			    <label class="control-label" for="inputLinea">Calle</label>
			    <div class="controls">
			      <select name="calles" id="calles">
		      
			      </select>
			    </div>
			  </div>
	
			  <div class="control-group">
			    <label class="control-label" for="inputLinea">Entre Calle</label>
			    <div class="controls">
			      <select name="entrecalles" id="entrecalles">
		      
			      </select>
			    </div>
			  </div>
		  </div>
		  
		  <div id="paradas"></div>
		  
		  <div class="control-group">
		    <label class="control-label" for="inputLinea">C&oacute;digo de Parada</label>
		    <div class="controls">
			    <input type="text" name="parada" placeholder="" required>
		    </div>
		    <small><a href="#" id="mostrarCalles">Consultar Numero de parada</a></small>

		  </div>
		  
		  <div class="control-group">
		    <label class="control-label" for=""></label>
		    <div class="controls">
		    	<button type="submit" class="btn btn-success">Cuando llega?</button>
		    </div>
		  </div>
	        
        </form>
        
        <div id="resultCalcular"></div>
        
      </div>



      <hr>

      <footer>
        <p>&copy; Company 2013</p>
      </footer>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>
    
    <script>
		$(function() {
		
			$('#mostrarCalles').click(function() {
			
				$('#consultarcalle').show("fast");
							
			});
		
		    $('#lineas').change(function() {
            	var id = $("#lineas").find(':selected').val();
            	
            	$('#paradas').hide();

            	$("#calles").load('consultar-calle.php?id='+id); 
            	$("#entrecalles").load('blank.php');            	
          	
		    });
		    
		    $('#calles').change(function() {
            	var lineaId = $("#lineas").find(':selected').val();
            	var calle = $("#calles").find(':selected').val();
            	
            	$('#paradas').hide();

            	$("#entrecalles").load('consultar-entrecalle.php?id='+lineaId+'&calle='+calle);            	
		    });
		    
		    $('#entrecalles').change(function() {
            	var lineaId = $("#lineas").find(':selected').val();
            	var calle = $("#calles").find(':selected').val();
            	var entrecalles = $("#entrecalles").find(':selected').val();
            	
            	
            	$("#paradas").load('consultar-parada.php?id='+lineaId+'&calle='+calle+'&entrecalle='+entrecalles); 
            	$('#paradas').show('fast');
           	
		    });
		    
			$('#calcular').submit(function() {
			
				//alert('submit');
			
				// Enviamos el formulario usando AJAX
				$.ajax({
					type: 'GET',
					url: $(this).attr('action'),
					data: $(this).serialize(),
					// Mostramos un mensaje con la respuesta de PHP
					success: function(data) {
						$('#resultCalcular').html(data).fadeIn('slow');
					}
				})        
			return false;
			}); 
		    	    
		});
    </script>
    

  </body>
</html>
