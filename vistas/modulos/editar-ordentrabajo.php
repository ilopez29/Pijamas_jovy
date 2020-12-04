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
        left: 25%;
        top: 40px;
    }
  }
</style>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Editar venta
    
    </h1>



  </section>

  <section class="content">

    <div class="row">

          <!--=====================================
      LA TABLA DE PRODUCTOS
      ======================================-->

      <div class="col-lg-12 hidden-md hidden-sm hidden-xs" style="position:ralative; top:0px;">
        
        <div class="box ">

          <div class="box-header with-border"></div>

          <div class="box-body">
          <div class="div1">
            <table class="table table-bordered table-striped dt-responsive tablaOrden">
              
               <thead>

                 <tr>
                  <th style="width: 10px">#</th>
                  <th>Imagen</th>
                  <th>Código</th>
                  <th>Descripcion</th>
                  <th>Cantidad</th>
                  <th>Acciones</th>
                </tr>

              </thead>

            </table>

            </div>

          </div>

        </div>


      </div>

      <!--=====================================
      EL FORMULARIO
      ======================================-->
      
      <div class="col-lg-6 col-xs-12 for">
        
        <div class="box " style="box-shadow: 0 0 9px 0 rgb(57, 152, 255);">
          
          <div class="box-header with-border"></div>

          <form role="form" method="post" class="formularioMaterial">

            <div class="box-body">
  
              <div class="box">

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
                  <p>Codigo de Referencia</p>
                  <div class="input-group">
                    

                   <input type="text" class="form-control" id="nuevaOrdentrabajo" name="editarOrdentrabajo" value="<?php echo $ordentrabajo["codigo"]; ?>" readonly>
               
                  </div>
                
                </div>

                <!--=====================================
                ENTRADA DEL VENDEDOR
                ======================================-->
            
                <div class="form-group">
                <p>Usuario</p>
                  <div class="input-group">

                    <input type="text" class="form-control" id="nuevoUsuario" value="<?php echo $usuario["nombre"]; ?>" readonly>

                    <input type="hidden" name="idUsuario" value="<?php echo $usuario["id"]; ?>">

                  </div>

                </div> 

                <div class="form-group">
                  <p>Producto</p>
                  <div class="input-group">
                    

                   <input type="text" class="form-control" id="editarProducto" name="editarProducto" value="<?php echo $ordentrabajo["producto"]; ?>" required>
               
                  </div>
                
                </div>

                <div class="form-group">
                  <p>Cantidad Solicitada</p>
                  <div class="input-group">
                    

                   <input type="text" class="form-control" id="editarCantidadsolicitada" name="editarCantidadsolicitada" value="<?php echo $ordentrabajo["cantidad_solicitada"]; ?>" required>
               
                  </div>
                
                </div>

                <div class="form-group">
                  <p>Cantidad Entregada</p>
                  <div class="input-group">
                    

                   <input type="text" class="form-control" id="editarCantidadentregada" name="editarCantidadentregada" value="<?php echo $ordentrabajo["cantidad_entregada"]; ?>" required>
               
                  </div>
                
                </div>

                <div class="form-group">
                  <p>Fecha de Entrega</p>
                  <div class="input-group">
                    

                   <input type="text" class="form-control" id="editarFechaentrega" name="editarFechaentrega" value="<?php echo $ordentrabajo["fecha_entrega"]; ?>" required>
               
                  </div>
                
                </div>



                <!--=====================================
                ENTRADA PARA AGREGAR PRODUCTO
                ======================================--> 

                <div class="form-group row nuevoMaterial">

                <?php

                $listaMaterial = json_decode($ordentrabajo["material"], true);

                foreach ($listaMaterial as $key => $value) {

                  $item = "id";
                  $valor = $value["id"];
                  $orden = "id";

                  $respuesta = ControladorMaterial::ctrMostrarMaterial($item, $valor, $orden);

                  $stockAntiguo =  $respuesta["stock_material"] + $value["cantidad"];
                  
                  echo '<div class="row" style="padding:5px 25px">
            
                        <div class="col-xs-8" style="padding-right:0px">
            
                          <div class="input-group">
                
                            <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarMaterial" idMaterial="'.$value["id"].'"><i class="fa fa-times"></i></button></span>

                            <input type="text" class="form-control nuevaNombreMaterial" idMaterial="'.$value["id"].'" name="agregarMaterial" value="'.$value["nombre_material"].'" readonly required>

                          </div>

                        </div>

                        <div class="col-xs-4">
              
                          <input type="number" class="form-control nuevaCantidadMaterial" name="nuevaCantidadMaterial" min="1" value="'.$value["cantidad"].'" stock_material="'.$stockAntiguo.'" nuevoStock="'.$value["stock_material"].'" required>

                        </div>

                      </div>';
                }


                ?>

                </div>

                <input type="hidden" id="listaMaterial" name="listaMaterial">

                <!--=====================================
                BOTÓN PARA AGREGAR PRODUCTO
                ======================================-->

                <button type="button" class="btn btn-default hidden-lg btnAgregarProduct">Agregar producto</button>


          <div class="box-footer">
          <button type="reset" class="btn btn-default" >Reset</button>
            <button type="submit" class="btn btn-primary pull-right">Guardar cambios</button>

          </div>

        </form>

        <?php

          $editarOrdentrabajo= new ControladorOrdentrabajo();
          $editarOrdentrabajo -> ctrEditarOrdentrabajo();
          
        ?>
        </div>
            
            </div>
      
      
      
          </div><br><br><br>
         
        </section>
        
      </div>       
