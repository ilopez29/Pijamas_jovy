<?php

require_once "../controladores/material.controlador.php";
require_once "../modelos/material.modelo.php";

require_once "../controladores/tipomaterial.controlador.php";
require_once "../modelos/tipomaterial.modelo.php";


class TablaMaterial{

 	/*=============================================
 	 MOSTRAR LA TABLA DE PRODUCTOS
  	=============================================*/ 

	public function mostrarTablaMaterial(){

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
 	 		TRAEMOS LA CATEGORÍA
  			=============================================*/ 

		  	$item = "id";
		  	$valor = $material[$i]["id_tipomaterial"];

		  	$tipomaterial = ControladorTipomaterial::ctrMostrarTipomaterial($item, $valor);

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

  			if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Especial"){

  				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarMaterial' idMaterial='".$material[$i]["id"]."' data-toggle='modal' data-target='#modalEditarMaterial'><i class='fa fa-pencil'></i></button></div>"; 

  			}else{

  				 $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarMaterial' idMaterial='".$material[$i]["id"]."' data-toggle='modal' data-target='#modalEditarMaterial'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarMaterial' idMaterial='".$material[$i]["id"]."' codigo='".$material[$i]["codigo_material"]."' imagen='".$material[$i]["imagen"]."'><i class='fa fa-times'></i></button></div>"; 

  			}

		 
		  	$datosJson .='[
			      "'.($i+1).'",
			      "'.$imagen.'",
			      "'.$material[$i]["codigo_material"].'",
			      "'.$material[$i]["nombre_material"].'",
			      "'.$tipomaterial["tipomaterial"].'",
			      "'.$stock.'",
			      "'.$material[$i]["fecha"].'",
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
$activarMaterial = new TablaMaterial();
$activarMaterial -> mostrarTablaMaterial();

