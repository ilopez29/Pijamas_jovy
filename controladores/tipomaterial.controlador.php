<?php

class ControladorTipomaterial{

	/*=============================================
	CREAR CATEGORIAS
	=============================================*/

	static public function ctrCrearTipomaterial(){

		if(isset($_POST["nuevoTipomaterial"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoTipomaterial"])){

				$tabla = "tipomaterial";

				$datos = $_POST["nuevoTipomaterial"];

				$respuesta = ModeloTipomaterial::mdlIngresarTipomaterial($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tipomaterial";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "tipomaterial";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrMostrarTipomaterial($item, $valor){

		$tabla = "tipomaterial";

		$respuesta = ModeloTipomaterial::mdlMostrarTipomaterial($tabla, $item, $valor);

		return $respuesta;
	
	}
	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function ctrEditarTipomaterial(){

		if(isset($_POST["editarTipomaterial"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTipomaterial"])){

				$tabla = "tipomaterial";

				$datos = array("tipomaterial"=>$_POST["editarTipomaterial"],
							   "id"=>$_POST["idTipomaterial"]);

				$respuesta = ModeloTipomaterial::mdlEditarTipomaterial($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tipomaterial";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "tipomaterial";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function ctrBorrarTipomaterial(){

		if(isset($_GET["idTipomaterial"])){

			$tabla ="tipomaterial";
			$datos = $_GET["idTipomaterial"];

			$respuesta = ModeloTipomaterial::mdlBorrarTipomaterial($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tipomaterial";

									}
								})

					</script>';
			}
		}
		
	}
}