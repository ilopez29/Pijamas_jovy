<?php

require_once "conexion.php";

class ModeloMaterial{

	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function mdlMostrarMaterial($tabla, $item, $valor, $orden){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	REGISTRO DE PRODUCTO
	=============================================*/
	static public function mdlIngresarMaterial($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_tipomaterial, codigo_material, nombre_material, imagen, stock_material) VALUES (:id_tipomaterial, :codigo_material, :nombre_material, :imagen, :stock_material)");

		$stmt->bindParam(":id_tipomaterial", $datos["id_tipomaterial"], PDO::PARAM_INT);
		$stmt->bindParam(":codigo_material", $datos["codigo_material"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_material", $datos["nombre_material"], PDO::PARAM_STR);
		$stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
		$stmt->bindParam(":stock_material", $datos["stock_material"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	EDITAR PRODUCTO
	=============================================*/
	static public function mdlEditarMaterial($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_tipomaterial = :id_tipomaterial, nombre_material = :nombre_material, imagen = :imagen, stock_material = :stock_material WHERE codigo_material = :codigo_material");

		$stmt->bindParam(":id_tipomaterial", $datos["id_tipomaterial"], PDO::PARAM_INT);
		$stmt->bindParam(":codigo_material", $datos["codigo_material"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_material", $datos["nombre_material"], PDO::PARAM_STR);
		$stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
		$stmt->bindParam(":stock_material", $datos["stock_material"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR PRODUCTO
	=============================================*/

	static public function mdlEliminarMaterial($tabla, $datos){

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
	ACTUALIZAR PRODUCTO
	=============================================*/

	static public function mdlActualizarMaterial($tabla, $item1, $valor1, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $valor, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


}