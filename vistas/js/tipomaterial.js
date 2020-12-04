/*=============================================
EDITAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEditarTipomaterial", function(){

	var idTipomaterial = $(this).attr("idTipomaterial");

	var datos = new FormData();
	datos.append("idTipomaterial", idTipomaterial);

	$.ajax({
		url: "ajax/tipomaterial.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarTipomaterial").val(respuesta["tipomaterial"]);
     		$("#idTipomaterial").val(respuesta["id"]);

     	}

	})


})

/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEliminarTipomaterial", function(){

	 var idTipomaterial = $(this).attr("idTipomaterial");

	 swal({
	 	title: '¿Está seguro de borrar el tipo de material?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar tipo de material!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=tipomaterial&idTipomaterial="+idTipomaterial;

	 	}

	 })

})