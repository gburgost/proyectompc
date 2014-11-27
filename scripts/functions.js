$(document).ready(function(){

	/*$('.nav li:first').on('click', function(e){
		e.preventDefault();

		$(this).addClass('active').next('li').removeClass('active');
		$('section article').hide();
		$('section article:first').show();

		$('#titleContent').text('Registrar Persona');
	})

	$('.nav li:last').on('click', function(e){
		e.preventDefault();

		$(this).addClass('active').prev('li').removeClass('active');
		$('section article').hide();
		$('section article:last').show();

		$('#titleContent').text('Buscar Persona');

	})*/


	var table = $('table').dataTable({
			"bJQueryUI" : true,
			"bRetrive"  : true,
			"sPaginationType" : "full_numbers"
		})
	$('table tr').on('click', function(){
		$('#aSearch .container-fluid').show();
	})

	/*var serial = "1234567890123";

	$('#registerBarcode').barcode(serial, "ean13", {barWidth:1, barHeight:50, output: "canvas" }

		);*/



	$(document).on('submit','form', function(){

	});

})
