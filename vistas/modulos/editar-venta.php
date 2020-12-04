
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Editar venta
    
    </h1>

  

  </section>

  <section class="content">

    <div class="row">

      <!--=====================================
      EL FORMULARIO
      ======================================-->
      
      <div class="col-lg-5 col-xs-12" style="position:relative; top:0px;">
        
        <div class="box smart-forms" style="box-shadow: 0 0 9px 0 rgb(57, 152, 255);">

          <form role="form" method="post" id="smart-form" class="formularioVenta">

            <div class="box-body">
  
              <div class="box">

                <?php

                    $item = "id";
                    $valor = $_GET["idVenta"];

                    $venta = ControladorVentas::ctrMostrarVentas($item, $valor);

                    $itemUsuario = "id";
                    $valorUsuario = $venta["id_vendedor"];

                    $vendedor = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

                    $itemCliente = "id";
                    $valorCliente = $venta["id_cliente"];

                    $cliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

          


                ?>

                <!--=====================================
                ENTRADA DEL VENDEDOR
                ======================================-->
            
                <div class="form-group">

                <p>&nbsp;Nombre Vendedor</p>

                  <div class="input-group">

                    <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $vendedor["nombre"]; ?>" readonly>

                    <input type="hidden" name="idVendedor" value="<?php echo $vendedor["id"]; ?>">

                  </div>

                </div> 

                <!--=====================================
                ENTRADA DEL CÓDIGO
                ======================================--> 

                <div class="form-group">
                <p>&nbsp;Codigo de Referencia</p>
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                   <input type="text" class="form-control" id="nuevaVenta" name="editarVenta" value="<?php echo $venta["codigo"]; ?>" readonly>
               
                  </div>
                
                </div>

                <!--=====================================
                ENTRADA DEL CLIENTE
                ======================================--> 

                <div class="form-group">
                  
                  <div class="input-group">
                  <p class="field ">&nbsp; Cliente  
                    <select class="form-control" id="seleccionarCliente" name="seleccionarCliente" data-rule-required="true"
                                    data-msg-required="Es obligatorio seleccionar una opcion" >

                    <option value="<?php echo $cliente["id"]; ?>"><?php echo $cliente["nombre_cliente"]; ?></option>

                    <?php

                      $item = null;
                      $valor = null;

                      $categorias = ControladorClientes::ctrMostrarClientes($item, $valor);

                       foreach ($categorias as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                       }

                    ?>

                    </select>
                    <i class="arrow " style="top:0px"></i>
                    </p>
                    </div>
                    <span class="input-group-addon"><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar cliente</button></span>
                  
                  
                
                </div>

                <!--=====================================
                ENTRADA PARA AGREGAR PRODUCTO
                ======================================--> 

                <div class="form-group row nuevoProducto">

                <?php

                $listaProducto = json_decode($venta["productos"], true);

                foreach ($listaProducto as $key => $value) {

                  $item = "id";
                  $valor = $value["id"];
                  $orden = "id";

                  $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

                  $stockAntiguo = $respuesta["stock"] + $value["cantidad"];
                  
                  echo '<div class="row" style="padding:5px 15px">
            
                        <div class="col-xs-6" style="padding-right:0px">
            
                          <div class="input-group">
                
                            <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="'.$value["id"].'"><i class="fa fa-times"></i></button></span>

                            <input type="text" class="form-control nuevaDescripcionProducto" idProducto="'.$value["id"].'" name="agregarProducto" value="'.$value["nombre_producto"].'" readonly required>

                          </div>

                        </div>

                        <div class="col-xs-3">
              
                          <input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="'.$value["cantidad"].'" stock="'.$stockAntiguo.'" nuevoStock="'.$value["stock"].'" required>

                        </div>

                        <div class="col-xs-3 ingresoPrecio" style="padding-left:0px">

                          <div class="input-group">
                    
                            <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                   
                            <input type="text" class="form-control nuevoPrecioProducto" precioReal="'.$respuesta["precio_venta"].'" name="nuevoPrecioProducto" value="'.$value["total"].'" readonly required>
   
                          </div>
               
                        </div>

                      </div>';
                }


                ?>

                </div>

                <input type="hidden" id="listaProductos" name="listaProductos">

                <!--=====================================
                BOTÓN PARA AGREGAR PRODUCTO
                ======================================-->

                <button type="button" class="btn btn-default hidden-lg btnAgregarProducto">Agregar producto</button>

                <hr>

                <div class="row">

                  <!--=====================================
                  ENTRADA TOTAL
                  ======================================-->
                  
                  <div class="col-xs-8 pull-center"style="position:relative; left:15%; ">
                    
                    <table class="table">

                      <thead>

                        <tr>
                         
                          <th style=" text-align: center; font-size: 16px;">Total</th>      
                        </tr>

                      </thead>

                      <tbody>
                      
                        <tr>
                       
                          

                           <td style="width: 30%">
                            
                            <div class="input-group" style="position:relative; left:22%">
                           
                            <span class="input-group-addon">&nbsp;$&nbsp;</span>

                              <input type="text" class="form-control" style="width:50%;" id="nuevoTotalVenta" name="nuevoTotalVenta"  value="<?php echo $venta["total"]; ?>" readonly required>

                              <input type="hidden" name="totalVenta" value="<?php echo $venta["total"]; ?>" id="totalVenta">
                              
                        
                            </div>

                          </td>

                        </tr>

                      </tbody>

                    </table>

                  </div>

                </div>

                <!--=====================================
                ENTRADA MÉTODO DE PAGO
                ======================================-->

                <div class="form-group row">
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Metodo de Pago</p>
                  <div class="col-xs-11" style="padding-left:60px">
                    
                     <div class="input-group field"> 
                      <input type="text" class="form-control" id="listaMetodoPago" name="listaMetodoPago" value="<?php echo $venta["metodo_pago"]; ?>" readonly>

                    </div>

                  </div>

                </div>
                 <div class="col-xs-6"> 

                    <div class="input-group"> 

                    <span class="input-group-addon">&nbsp;$&nbsp;</span> 

                    <input type="text" class="form-control" name="nuevoValorEfectivo" id="nuevoValorEfectivo" value="<?php echo $venta["pagado"]; ?>" required>

                    </div>

                  </div>
                  
                   <div class="col-xs-6" id="capturarCambioEfectivo" style="padding-left:0px">

			<div class="input-group">

			 		<span class="input-group-addon">&nbsp;$&nbsp;</span> 

			 		<input type="text" class="form-control" id="nuevoSaldoEfectivo" name="nuevoSaldoEfectivo" value="<?php echo $venta["saldo"]; ?> " readonly required>

			 	</div>

			</div><br><br><br>
                <div class="form-group">
                    
                    <div class="input-group field"> 
                      <p>&nbsp;Estado de la Venta</p>
                     <select class="form-control" id="listaEstado" name="listaEstado" >
                       <option value="<?php echo $venta["estado_venta"]; ?>"><?php echo $venta["estado_venta"]; ?></option>
                       <option value="Finalizado">Finalizado</option>
                       <option value="En Preceso">En Proceso</option>
                       <option value="Cancelado">Cancelado</option>              
                     </select>    
                    
                   </div>

                 </div>
      
              </div>

          </div>

          <div class="box-footer">
          <button type="reset" class="btn btn-default" >Reset</button>
            <button type="submit" class="btn btn-primary pull-right">Guardar cambios</button>

          </div>

        </form>

        <?php

          $editarVenta = new ControladorVentas();
          $editarVenta -> ctrEditarVenta();
          
        ?>

        </div>
            
      </div>

      <!--=====================================
      LA TABLA DE PRODUCTOS
      ======================================-->

      <div class="col-lg-7 hidden-md hidden-sm hidden-xs" style="position:relative; top:-6px;">
        
        <div class="box ">

          <div class="box-body">
          <div class="div2">
            <table class="table table-bordered table-striped dt-responsive tablaVentas">
              
              <thead style="background:white; ">

                <tr>
                  <th></th>
                  <th style="width:50px;"></th>
                  
                  <th></th>
                  <th style="width:50px;"></th>
                  <th ></th>
                </tr>
              </thead>

            </table>
            </div>
          </div>

        </div>


      </div>

    </div>
   
  </section>

</div>

<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL DOCUMENTO ID -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingresar documento" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" required>

              </div>

            </div>

  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cliente</button>

        </div>

      </form>

      <?php

        $crearCliente = new ControladorClientes();
        $crearCliente -> ctrCrearCliente();

      ?>

    </div>

  </div>

</div>
