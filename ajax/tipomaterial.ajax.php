<?php

require_once "../controladores/tipomaterial.controlador.php";
require_once "../modelos/tipomaterial.modelo.php";

class AjaxTipomaterial{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idTipomaterial;

	public function ajaxEditarTipomaterial(){

		$item = "id";
		$valor = $this->idTipomaterial;

		$respuesta = ControladorTipomaterial::ctrMostrarTipomaterial($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idTipomaterial"])){

	$tipomaterial = new AjaxTipomaterial();
	$tipomaterial -> idTipomaterial = $_POST["idTipomaterial"];
	$tipomaterial -> ajaxEditarTipomaterial();
}
