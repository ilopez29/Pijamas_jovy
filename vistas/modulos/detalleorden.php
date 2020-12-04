<style>
  @media (max-width: 600px) {
    .fore{
        position:relative;
        left: 0%;
    }
  }
  @media (min-width: 1200px) {
    .for{
        position:relative;
        box-shadow: 0 0 9px 0 rgb(57, 152, 255);
        left: 30%;
    }
  }
  .volver{
      position:relative;
      top: -65px;
  }
</style>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Detalle Orden de Trabajo
    
    </h1>


  </section>

  <section class="content">

    <div class="row">

      <!--=====================================
      EL FORMULARIO
      ======================================-->
      
      <div class="col-lg-5 col-xs-10 for">
        
        <div class="box ">
          
          <div class="box-header with-border"></div>

          <form role="form" method="post" class="formularioMaterial">

            <div class="box-body">
  

                <?php

                    $item = "id";
                    $valor = $_GET["idOrdentrabajo"];

                    $ordentrabajo = ControladorOrdentrabajo::ctrMostrarOrdentrabajo($item, $valor);

                    $itemUsuario = "id";
                    $valorUsuario = $ordentrabajo["id_usuario"];

                    $usuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

          


                ?>
                
                <!--=====================================
                ENTRADA DEL CÓDIGO
                ======================================--> 

                <div class="form-group">

                <label>Codigo Orden de Trabajo</label>
                  
                  <div class="input-group">

                   <input type="text" class="form-control" id="nuevaOrdentrabajo" name="editarOrdentrabajo" value="<?php echo $ordentrabajo["codigo"]; ?>" readonly>
               
                  </div>
                
                </div>

                <!--=====================================
                ENTRADA DEL VENDEDOR
                ======================================-->
            
                <div class="form-group">

                <label>Nombre del Usuario</label>
                
                  <div class="input-group"> 

                    <input type="text" class="form-control" id="nuevoUsuario" value="<?php echo $usuario["nombre"]; ?>" readonly>

                    <input type="hidden" name="idUsuario" value="<?php echo $usuario["id"]; ?>">

                  </div>

                </div> 

                <div class="form-group">

                <label>Nombre del Producto</label>
                  
                  <div class="input-group">

                   <input type="text" class="form-control" id="editarProducto" name="editarProducto" value="<?php echo $ordentrabajo["producto"]; ?>" readonly>
               
                  </div>
                
                </div>

                <div class="form-group">

                <label>Cantidad Solicitada</label>
                  
                  <div class="input-group">

                   <input type="text" class="form-control" id="editarCantidadsolicitada" name="editarCantidadsolicitada" value="<?php echo $ordentrabajo["cantidad_solicitada"]; ?>" readonly>
               
                  </div>
                
                </div>

                <div class="form-group">

                <label>Cantidad Entregada</label>
                  
                  <div class="input-group">

                   <input type="text" class="form-control" id="editarCantidadentregada" name="editarCantidadentregada" value="<?php echo $ordentrabajo["cantidad_entregada"]; ?>"  readonly>
               
                  </div>
                
                </div>

                <div class="form-group">
                
                <label>Fecha de Entrega</label>
                  
                  <div class="input-group">

                   <input type="text" class="form-control" id="editarFechaentrega" name="editarFechaentrega" value="<?php echo $ordentrabajo["fecha_entrega"]; ?>"  readonly>
               
                  </div>
                
                </div>



                <!--=====================================
                ENTRADA PARA AGREGAR PRODUCTO
                ======================================--> 

                <div class="form-group row nuevoMaterial">
                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Materiales de la Orden</label>

                <?php

                $listaMaterial = json_decode($ordentrabajo["material"], true);

                foreach ($listaMaterial as $key => $value) {

                  $item = "id";
                  $valor = $value["id"];
                  $orden = "id";

                  $respuesta = ControladorMaterial::ctrMostrarMaterial($item, $valor, $orden);

                  $stockAntiguo =  $respuesta["stock_material"] + $value["cantidad"];
                  
                  echo '<div class="row" style="padding:5px 15px">
            
                        <div class="col-xs-8" style="padding-right:0px">
            
                          <div class="input-group">
            
                         <input type="text" class="form-control nuevaNombreMaterial" idMaterial="'.$value["id"].'" name="agregarMaterial" value="'.$value["nombre_material"].'" readonly >

                          </div>

                        </div>

                        <div class="col-xs-4">
              
                          <input type="number" class="form-control nuevaCantidadMaterial" name="nuevaCantidadMaterial" min="1" value="'.$value["cantidad"].'" stock_material="'.$stockAntiguo.'" nuevoStock="'.$value["stock_material"].'" readonly >

                        </div>

                      </div>';
                }


                ?>
</div>
                <input type="hidden" id="listaMaterial" name="listaMaterial">


                </div> 

          <div class="box-footer">

            

          </div>

        </form>

        <center><a href="ordentrabajo"><button class="btn btn-danger volver" style="top:-30px;">Volver</button></a></center>

        </div>

</div>

</div>

</div>