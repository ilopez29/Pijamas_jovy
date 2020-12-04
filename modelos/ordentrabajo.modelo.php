<?php

require_once "conexion.php";

class ModeloOrdentrabajo{

	/*=============================================
	MOSTRAR ORDEN DE TRABAJO
	=============================================*/

	static public function mdlMostrarOrdentrabajo($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id ASC");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");

			$stmt -> execute();

			return $stmt -> fetchAll(); 

		}
		
		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	REGISTRO DE ORDEN DE TRABAJO
	=============================================*/

	static public function mdlIngresarOrdentrabajo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo, id_usuario, producto, cantidad_solicitada, cantidad_entregada, fecha_entrega, material) VALUES (:codigo, :id_usuario, :producto, :cantidad_solicitada, :cantidad_entregada, :fecha_entrega, :material)");

		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
		$stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
		$stmt->bindParam(":producto", $datos["producto"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad_solicitada", $datos["cantidad_solicitada"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad_entregada", $datos["cantidad_entregada"], PDO::PARAM_STR);
	
		$stmt->bindParam(":fecha_entrega", $datos["fecha_entrega"], PDO::PARAM_STR);
		$stmt->bindParam(":material", $datos["material"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	EDITAR VENTA
	=============================================*/

	static public function mdlEditarOrdentrabajo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  id_usuario = :id_usuario, producto = :producto, cantidad_solicitada = :cantidad_solicitada, cantidad_entregada = :cantidad_entregada,  fecha_entrega= :fecha_entrega, material = :material WHERE codigo = :codigo");

		$stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
		$stmt->bindParam(":producto", $datos["producto"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad_solicitada", $datos["cantidad_solicitada"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad_entregada", $datos["cantidad_entregada"], PDO::PARAM_STR);

		$stmt->bindParam(":fecha_entrega", $datos["fecha_entrega"], PDO::PARAM_STR);
		$stmt->bindParam(":material", $datos["material"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR ORDEN TRABAJO
	=============================================*/

	static public function mdlEliminarOrdentrabajo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	RANGO FECHAS
	=============================================*/	

	static public function mdlRangoFechasOrdentrabajo($tabla, $fechaIni, $fechaFin){

		if($fechaIni == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");

			$stmt -> execute();

			return $stmt -> fetchAll();	 


		}else if($fechaIni == $fechaFin){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '%$fechaFin%'");

			$stmt -> bindParam(":fecha", $fechaFin, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$fechaAct = new DateTime();
			$fechaAct ->add(new DateInterval("P1D"));
			$fechaActMasUno = $fechaAct->format("Y-m-d");

			$fechaFin2 = new DateTime($fechaFin);
			$fechaFin2 ->add(new DateInterval("P1D"));
			$fechaFinMasUno = $fechaFin2->format("Y-m-d");

			if($fechaFinMasUno == $fechaActMasUno){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaIni' AND '$fechaFinMasUno'");

			}else{


				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaIni' AND '$fechaFin'");

			}
		
			$stmt -> execute();

			return $stmt -> fetchAll();

		}

	}
	
}