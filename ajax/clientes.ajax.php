<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxClientes{

	/*=============================================
	EDITAR CLIENTE
	=============================================*/	

	public $idCliente;

	public function ajaxEditarCliente(){

		$item = "id";
		$valor = $this->idCliente;

		$respuesta = ControladorClientes::ctrMostrarClientes($item, $valor);

		echo json_encode($respuesta);


	}

	
	/*=============================================
	VALIDAR NO REPETIR USUARIO
	=============================================*/	

	public $validarCliente;

	public function ajaxValidarCliente(){

		$item = "nombre_cliente";
		$valor = $this->validarCliente;

		$respuesta = ControladorClientes::ctrMostrarClientes($item, $valor);

		echo json_encode($respuesta);

	}

		/*=============================================
	VALIDAR NO REPETIR DOCUMENTO
	=============================================*/	

	public $validarDocumento;

	public function ajaxValidarDocumento(){

		$item = "documento_cliente";
		$valor = $this->validarDocumento;

		$respuesta = ControladorClientes::ctrMostrarClientes($item, $valor);

		echo json_encode($respuesta);

	}
}



/*=============================================
EDITAR CLIENTE
=============================================*/	

if(isset($_POST["idCliente"])){

	$cliente = new AjaxClientes();
	$cliente -> idCliente = $_POST["idCliente"];
	$cliente -> ajaxEditarCliente();

}

/*=============================================
VALIDAR NO REPETIR USUARIO
=============================================*/

if(isset( $_POST["validarCliente"])){

	$valCliente = new AjaxClientes();
	$valCliente -> validarCliente = $_POST["validarCliente"];
	$valCliente -> ajaxValidarCliente();

}

/*=============================================
VALIDAR NO REPETIR DOCUMENTO
=============================================*/

if(isset( $_POST["validarDocumento"])){

	$valDocumento = new AjaxClientes();
	$valDocumento -> validarDocumento = $_POST["validarDocumento"];
	$valDocumento -> ajaxValidarDocumento();

}