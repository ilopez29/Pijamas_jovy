<?php

use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;


class ControladorOrdentrabajo{

	/*=============================================
	MOSTRAR ORDEN DE TRABAJO
	=============================================*/

	static public function ctrMostrarOrdentrabajo($item, $valor){

		$tabla = "ordentrabajo";

		$respuesta = ModeloOrdentrabajo::mdlMostrarOrdentrabajo($tabla, $item, $valor);
 
		return $respuesta;

	}

	/*=============================================
	CREAR VENTA
	=============================================*/

	static public function ctrCrearOrdentrabajo(){

		if(isset($_POST["nuevaOrdentrabajo"])){

			/*=============================================
			ACTUALIZAR LAS COMPRAS DEL CLIENTE Y REDUCIR EL STOCK Y AUMENTAR LAS VENTAS DE LOS PRODUCTOS
			=============================================*/

			if($_POST["listaMaterial"] == ""){

					echo'<script>

				swal({
					  type: "error",
					  title: "La orden no se ha ejecuta si no hay materiales",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "ordentrabajo";

								}
							})

				</script>';

				return;
			}


			$listaMaterial = json_decode($_POST["listaMaterial"], true);

			$totalMaterialUsado = array();

			foreach ($listaMaterial as $key => $value) {

			   array_push($totalMaterialUsado, $value["cantidad"]);
				
			   $tablaMaterial = "material";

			    $item = "id";
			    $valor = $value["id"];
			    $orden = "id";

			    $traerMaterial = ModeloMaterial::mdlMostrarMaterial($tablaMaterial, $item, $valor, $orden);

				$item1a = "ordentrabajo";
				$valor1a = $value["cantidad"] + $traerMaterial["ordentrabajo"];

			    $nuevasOrdenes = ModeloMaterial::mdlActualizarMaterial($tablaMaterial, $item1a, $valor1a, $valor);

				$item1b = "stock_material";
				$valor1b = $value["stock_material"];

				$nuevoStock = ModeloMaterial::mdlActualizarMaterial($tablaMaterial, $item1b, $valor1b, $valor);

			}

			/*=============================================
			GUARDAR LA COMPRA
			=============================================*/	

			$tabla = "ordentrabajo";

			$datos = array("id_usuario"=>$_POST["idUsuario"],
						   "codigo"=>$_POST["nuevaOrdentrabajo"],
						   "producto"=>$_POST["nuevaProducto"],
						   "cantidad_solicitada"=>$_POST["nuevaCantidadsolicitada"],
						   "material"=>$_POST["listaMaterial"],
						   "cantidad_entregada"=>$_POST["nuevaCantidadentregada"],
						   "fecha_entrega"=>$_POST["nuevaFechaentrega"]);

			$respuesta = ModeloOrdentrabajo::mdlIngresarOrdentrabajo($tabla, $datos);



			if($respuesta == "ok"){

				
				echo'<script>

				localStorage.removeItem("rango");

				swal({
					  type: "success",
					  title: "La orden ha sido guardada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "ordentrabajo";

								}
							})

				</script>';

			}

		}

	}

	/*=============================================
	EDITAR VENTA
	=============================================*/

	static public function ctrEditarOrdentrabajo(){

		if(isset($_POST["editarOrdentrabajo"])){

			/*=============================================
			FORMATEAR TABLA DE PRODUCTOS Y LA DE CLIENTES
			=============================================*/
			$tabla = "ordentrabajo";

			$item = "codigo";
			$valor = $_POST["editarOrdentrabajo"];

			$traerOrdentrabajo = ModeloOrdentrabajo::mdlMostrarOrdentrabajo($tabla, $item, $valor);

			/*=============================================
			REVISAR SI VIENE PRODUCTOS EDITADOS
			=============================================*/

			if($_POST["listaMaterial"] == ""){

				$listaMaterial = $traerOrdentrabajo["material"];
				$cambioMaterial = false;


			}else{

				$listaMaterial = $_POST["listaMaterial"];
				$cambioMaterial = true;
			}

			if($cambioMaterial){

				$material =  json_decode($traerOrdentrabajo["material"], true);

				$totalMaterialUsado = array();

				foreach ($material as $key => $value) {

					array_push($totalMaterialUsado, $value["cantidad"]);
					
					$tablaMaterial = "material";

					$item = "id";
					$valor = $value["id"];
					$orden = "id";

					$traerMaterial = ModeloMaterial::mdlMostrarMaterial($tablaMaterial, $item, $valor, $orden);

					$item1a = "ordentrabajo";
					$valor1a = $traerMaterial["ordentrabajo"] - $value["cantidad"];

					$nuevasOrdenes = ModeloMaterial::mdlActualizarMaterial($tablaMaterial, $item1a, $valor1a, $valor);

					$item1b = "stock_material";
					$valor1b = $value["cantidad"] + $traerMaterial["stock_material"];

					$nuevoStock = ModeloMaterial::mdlActualizarMaterial($tablaMaterial, $item1b, $valor1b, $valor);

				}

				/*=============================================
				ACTUALIZAR LAS COMPRAS DEL CLIENTE Y REDUCIR EL STOCK Y AUMENTAR LAS VENTAS DE LOS PRODUCTOS
				=============================================*/

				$listaMaterial_2 = json_decode($listaMaterial, true);

				$totalMaterialUsado_2 = array();

				foreach ($listaMaterial_2 as $key => $value) {

					array_push($totalMaterialUsado_2, $value["cantidad"]);
					
					$tablaMaterial_2 = "material";

					$item_2 = "id";
					$valor_2 = $value["id"];
					$orden = "id";

					$traerMaterial_2 = ModeloMaterial::mdlMostrarMaterial($tablaMaterial_2, $item_2, $valor_2, $orden);

					$item1a_2 = "ordentrabajo";
					$valor1a_2 = $value["cantidad"] + $traerMaterial_2["ordentrabajo"];

					$nuevasOrdenes_2 = ModeloMaterial::mdlActualizarMaterial($tablaMaterial_2, $item1a_2, $valor1a_2, $valor_2);

					$item1b_2 = "stock_material";
					$valor1b_2 = $value["stock_material"];

					$nuevoStock_2 = ModeloMaterial::mdlActualizarMaterial($tablaMaterial_2, $item1b_2, $valor1b_2, $valor_2);

				}

			}

			/*=============================================
			GUARDAR CAMBIOS DE LA COMPRA
			=============================================*/	

			$datos = array("id_usuario"=>$_POST["idUsuario"],
						   "codigo"=>$_POST["editarOrdentrabajo"],
						   "material"=>$listaMaterial,
						   
						   "producto"=>$_POST["editarProducto"],
						   "cantidad_solicitada"=>$_POST["editarCantidadsolicitada"],
						   "cantidad_entregada"=>$_POST["editarCantidadentregada"],
						   "fecha_entrega"=>$_POST["editarFechaentrega"]);


			$respuesta = ModeloOrdentrabajo::mdlEditarOrdentrabajo($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				localStorage.removeItem("rango");

				swal({
					  type: "success",
					  title: "La orden ha sido editada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then((result) => {
								if (result.value) {

								window.location = "ordentrabajo";

								}
							})

				</script>';

			}

		}

	}


	/*=============================================
	ELIMINAR VENTA
	=============================================*/

	static public function ctrEliminarOrdentrabajo(){

		if(isset($_GET["idOrdentrabajo"])){

			$tabla = "ordentrabajo";

			$item = "id";
			$valor = $_GET["idOrdentrabajo"];

			$traerOrdentrabajo = ModeloOrdentrabajo::mdlMostrarOrdentrabajo($tabla, $item, $valor);


			/*=============================================
			FORMATEAR TABLA DE PRODUCTOS Y LA DE CLIENTES
			=============================================*/

			$material =  json_decode($traerOrdentrabajo["material"], true);

			$totalMaterialUsado = array();

			foreach ($material as $key => $value) {

				array_push($totalMaterialUsado, $value["cantidad"]);
				
				$tablaMaterial = "material";

				$item = "id";
				$valor = $value["id"];
				$orden = "id";

				$traerMaterial = ModeloMaterial::mdlMostrarMaterial($tablaMaterial, $item, $valor, $orden);

				$item1a = "ordentrabajo";
				$valor1a = $traerMaterial["ordentrabajo"] - $value["cantidad"];

				$nuevasOrdenes = ModeloMaterial::mdlActualizarMaterial($tablaMaterial, $item1a, $valor1a, $valor);

				$item1b = "stock_material";
				$valor1b = $value["cantidad"] + $traerMaterial["stock_material"];

				$nuevoStock = ModeloMaterial::mdlActualizarMaterial($tablaMaterial, $item1b, $valor1b, $valor);

			}

			/*=============================================
			ELIMINAR VENTA
			=============================================*/

			$respuesta = ModeloOrdentrabajo::mdlEliminarOrdentrabajo($tabla, $_GET["idOrdentrabajo"]);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La orden ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "ordentrabajo";

								}
							})

				</script>';

			}		
		}

	}

	/*=============================================
	RANGO FECHAS
	=============================================*/	

	static public function ctrRangoFechasOrdentrabajo($fechaIni, $fechaFin){

		$tabla = "ordentrabajo";

		$respuesta = ModeloOrdentrabajo::mdlRangoFechasOrdentrabajo($tabla, $fechaIni, $fechaFin);

		return $respuesta;
		
	}




}