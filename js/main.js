$(document).one("ready", function() {

	// Interceptamos el evento submit
	$('#formAsesoria').submit(function() {
		// Enviamos el formulario usando AJAX
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			// Mostramos un mensaje con la respuesta de PHP
			success: function(data) {
				$('#formAsesoria').fadeOut('fast');
				// $('#result').html(data);
				//  	$('#result').fadeIn('slow');
				$('#resultAsesoria').html(data).fadeIn('slow');
			}
		})        
	return false;
	});
});
