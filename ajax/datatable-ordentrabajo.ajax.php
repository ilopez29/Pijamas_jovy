<?php

require_once "../controladores/material.controlador.php";
require_once "../modelos/material.modelo.php";


class TablaMaterialOrden{

 	/*=============================================
 	 MOSTRAR LA TABLA DE PRODUCTOS
  	=============================================*/ 

	public function mostrarTablaMaterialOrden(){

		$item = null;
    	$valor = null;
    	$orden = "id";

  		$material = ControladorMaterial::ctrMostrarMaterial($item, $valor, $orden);
 		
  		if(count($material) == 0){

  			echo '{"data": []}';

		  	return;
  		}	
		
  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($material); $i++){

		  	/*=============================================
 	 		TRAEMOS LA IMAGEN
  			=============================================*/ 

		  	$imagen = "<img src='".$material[$i]["imagen"]."' width='150px' height='150px'>";

		  	/*=============================================
 	 		STOCK
  			=============================================*/ 

  			if($material[$i]["stock_material"] <= 10){

  				$stock = "<button class='btn btn-danger'>".$material[$i]["stock_material"]."</button>";

  			}else if($material[$i]["stock_material"] > 11 && $material[$i]["stock_material"] <= 15){

  				$stock = "<button class='btn btn-warning'>".$material[$i]["stock_material"]."</button>";

  			}else{

  				$stock = "<button class='btn btn-success'>".$material[$i]["stock_material"]."</button>";

  			}

		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/ 

		  	$botones =  "<div class='btn-group'><button class='btn btn-primary agregarMaterial recuperarBoton' idMaterial='".$material[$i]["id"]."'>Agregar &nbsp;<i class='fa fa-plus-circle'></i></button></div>"; 

		  	$datosJson .='[
			      "'.($i+1).'",
			      "'.$imagen.'",
			      "'.$material[$i]["codigo_material"].'",
			      "'.$material[$i]["nombre_material"].'",
			      "'.$stock.'",
			      "'.$botones.'"
			    ],';

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 

		 }';
		
		echo $datosJson;


	}


}

/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/ 
$activarMaterialorden = new TablaMaterialOrden();
$activarMaterialorden -> mostrarTablaMaterialOrden();

