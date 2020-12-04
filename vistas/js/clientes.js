/*=============================================
EDITAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEditarCliente", function(){

	var idCliente = $(this).attr("idCliente");

	var datos = new FormData();
    datos.append("idCliente", idCliente);

    $.ajax({

      url:"ajax/clientes.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
      	   $("#idCliente").val(respuesta["id"]);
	       $("#editarCliente").val(respuesta["nombre_cliente"]);
	       $("#editarDocumentoId").val(respuesta["documento_cliente"]);
	       $("#editarEmail").val(respuesta["correo_cliente"]);
	       $("#editarTelefono").val(respuesta["telefono_cliente"]);
	       $("#editarDireccion").val(respuesta["direccion_cliente"]);
	  }

  	})

})

/*=============================================
REVISAR SI EL NOMBRE YA ESTÁ REGISTRADO
=============================================*/

$("#nuevoCliente").change(function(){

	$(".alert").remove();

	var nombre = $(this).val();

	var datos = new FormData();
	datos.append("validarCliente", nombre);

	 $.ajax({
	    url:"ajax/clientes.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	if(respuesta){

	    		$("#nuevoCliente").parent().after('<div class="alert alert-warning">Este Cliente ya existe en el sistema, por favor intente con otro </div>');

	    		$("#nuevoCliente").val("");

	    	}

	    }

	})
})

/*=============================================
REVISAR SI EL DOCUMENTO YA ESTÁ REGISTRADO
=============================================*/

$("#nuevoDocumentoId").change(function(){

	$(".alert").remove();

	var documento = $(this).val();

	var datos = new FormData();
	datos.append("validarDocumento", documento);

	 $.ajax({
	    url:"ajax/clientes.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	if(respuesta){

	    		$("#nuevoDocumentoId").parent().after('<div class="alert alert-warning">Este documento ya existe, por favor intente con otro </div>');

	    		$("#nuevoDocumentoId").val("");

	    	}

	    }

	})
})

/*=============================================
ELIMINAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEliminarCliente", function(){

	var idCliente = $(this).attr("idCliente");
	
	swal({
        title: '¿Está seguro de borrar el cliente?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar cliente!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=clientes&idCliente="+idCliente;
        }

  })

})