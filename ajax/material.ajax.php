<?php

require_once "../controladores/material.controlador.php";
require_once "../modelos/material.modelo.php";

require_once "../controladores/tipomaterial.controlador.php";
require_once "../modelos/tipomaterial.modelo.php";

class AjaxMaterial{

  /*=============================================
  GENERAR CÓDIGO A PARTIR DE ID TIPO MATERIAL
  =============================================*/
  public $idTipomaterial;

  public function ajaxCrearCodigoMaterial(){

  	$item = "id_tipomaterial";
  	$valor = $this->idTipomaterial;
    $orden = "id";

  	$respuesta = ControladorMaterial::ctrMostrarMaterial($item, $valor, $orden);

  	echo json_encode($respuesta);

  }


  /*=============================================
  EDITAR PRODUCTO
  =============================================*/ 

  public $idMaterial;
  public $traerMaterial;
  public $nombreMaterial;

  public function ajaxEditarMaterial(){

    if($this->traerMaterial == "ok"){

      $item = null;
      $valor = null;
      $orden = "id";

      $respuesta = ControladorMaterial::ctrMostrarMaterial($item, $valor,
        $orden);

      echo json_encode($respuesta);


    }else if($this->nombreMaterial != ""){

      $item = "nombre_material";
      $valor = $this->nombreMaterial;
      $orden = "id";

      $respuesta = ControladorMaterial::ctrMostrarMaterial($item, $valor,
        $orden);

      echo json_encode($respuesta);

    }else{

      $item = "id";
      $valor = $this->idMaterial;
      $orden = "id";

      $respuesta = ControladorMaterial::ctrMostrarMaterial($item, $valor,
        $orden);

      echo json_encode($respuesta);

    }

  }

}


/*=============================================
GENERAR CÓDIGO A PARTIR DE ID TIPO MATERIAL
=============================================*/	

if(isset($_POST["idTipomaterial"])){

	$codigoMaterial = new AjaxMaterial();
	$codigoMaterial -> idTipomaterial = $_POST["idTipomaterial"];
	$codigoMaterial -> ajaxCrearCodigoMaterial();

}
/*=============================================
EDITAR MATERIAL
=============================================*/ 

if(isset($_POST["idMaterial"])){

  $editarMaterial = new AjaxMaterial();
  $editarMaterial -> idMaterial = $_POST["idMaterial"];
  $editarMaterial -> ajaxEditarMaterial();

}

/*=============================================
TRAER MATERIAL
=============================================*/ 

if(isset($_POST["traerMaterial"])){

  $traerMaterial = new AjaxMaterial();
  $traerMaterial -> traerMaterial = $_POST["traerMaterial"];
  $traerMaterial -> ajaxEditarMaterial();

}

/*=============================================
TRAER MATERIAL
=============================================*/ 

if(isset($_POST["nombreMaterial"])){

  $traerMaterial = new AjaxMaterial();
  $traerMaterial -> nombreMaterial = $_POST["nombreMaterial"];
  $traerMaterial -> ajaxEditarMaterial();

}






