$(function () {
	$('#imagen').change(function (e) {
		addImage(e);
	});

	function addImage(e) {
		var file = e.target.files[0],
			imageType = /image.*/;

		if (!file.type.match(imageType))
			return;

		var reader = new FileReader();
		reader.onload = fileOnload;
		reader.readAsDataURL(file);
	}
 
	function fileOnload(e) {
		var result = e.target.result;
		$('#vistaImagen').attr("src", result);
	}
});

$(document).on('change', 'input[type="file"]', function () {

	var fileName = this.files[0].name;
	var fileSize = this.files[0].size;

	if (fileSize > 3000000) {
		$('#errores').html("El archivo supera el límite de peso permitido. Escoja una imagen menor a los 3MB");
		$('#errores').css({
			'background': 'red',
			'color': '#eee'
		});
		$('#vistaImagen').css({
			'display': 'none'
		});		
		this.value = '';
		this.files[0].name = '';
	} else {
		// recuperamos la extensión del archivo
		var ext = fileName.split('.').pop();
		switch (ext) {
			case 'jpg':
			case 'jpeg':
			case 'png':
			case 'gif':
				$('#vistaImagen').css({
					'display': 'block',
					'max-width':'200px',
					'max-heigth':'200px'
				});
				$('#errores').html("IMAGEN VALIDA!");
				$('#errores').css({ 
					'background': 'green',
					'color': '#eee'
				})
				break;
			default:
				$('#vistaImagen').css({
					'display': 'none'
				});
				$('#errores').html("Formato no soportado. Use (.jpg, .jpeg, .png & .gif)");
				$('#errores').css({
					'background': 'red',
					'color': '#eee'
				})
				this.value = ''; // reset del valor
				this.files[0].name = '';
		}
	}
});
