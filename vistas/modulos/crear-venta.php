<?php

if($_SESSION["perfil"] == "Especial"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Registrar venta
    
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

                <!--=====================================
                ENTRADA DEL VENDEDOR
                ======================================-->
            
                <div class="form-group">
                <p>&nbsp;Nombre Vendedor</p>
                  <div class="input-group">

                    <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                    <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"]; ?>">

                  </div>

                </div> 

                <!--=====================================
                ENTRADA DEL CÓDIGO
                ======================================--> 

                <div class="form-group">
                  <p>&nbsp;Codigo de Referencia</p>
                  <div class="input-group">

                    <?php

                    $item = null;
                    $valor = null;

                    $ventas = ControladorVentas::ctrMostrarVentas($item, $valor);

                    if(!$ventas){

                      echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="10001" readonly>';
                  

                    }else{

                      foreach ($ventas as $key => $value) {
                        
                        
                      
                      }

                      $codigo = $value["codigo"] + 1;



                      echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="'.$codigo.'" readonly>';
                  

                    }

                    ?>
                    
                    
                  </div>
                
                </div>

                <!--=====================================
                ENTRADA DEL CLIENTE
                ======================================--> 

                <div class="form-group">
                  
                  <div class="input-group">
                    <p class="field ">&nbsp; Cliente
                    <select class="form-control " id="seleccionarCliente" name="seleccionarCliente" data-rule-required="true"
                                    data-msg-required="Es obligatorio seleccionar una opcion">

                    <option value="">Seleccionar cliente</option>

                    <?php

                      $item = null;
                      $valor = null;

                      $categorias = ControladorClientes::ctrMostrarClientes($item, $valor);

                       foreach ($categorias as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["nombre_cliente"].'</option>';

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

                

                </div>

                <input type="hidden" id="listaProductos" name="listaProductos">

                <!--=====================================
                BOTÓN PARA AGREGAR PRODUCTO
                ======================================-->

                <button type="button" class="btn btn-default hidden-lg btnAgregarProducto">Agregar producto</button>

<hr>
                <div class="row">

                  <!--=====================================
                  ENTRADA IMPUESTOS Y TOTAL
                  ======================================-->
                  
                  <div class="col-xs-8 pull-center" style="position:relative; left:16%; "   >
                    
                    <table class="table">

                      <thead>

                        <tr >
                          
                          <th style=" text-align: center; font-size: 16px;">Total</th>      
                        </tr>

                      </thead>

                      <tbody>
                      
                        <tr>
                          
                        

                           <td style="width: 30%" >
                            
                            <div class="input-group" style="position:relative; left:22%" >
                           
                              <span class="input-group-addon">&nbsp;$&nbsp;</span>

                              <input type="text"  class="form-control " style="width:50%;" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" placeholder="00000" readonly >

                              <input type="hidden" name="totalVenta" id="totalVenta">
                              
                        
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
                      <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" data-rule-required="true"
                                    data-msg-required="Es obligatorio seleccionar una opcion">
                        <option value="">Seleccione método de pago</option>
                        <option value="Efectivo">Efectivo</option>
                        <option value="TC">Tarjeta Crédito</option>
                        <option value="TD">Tarjeta Débito</option>                
                      </select>    
                     
                    </div>

                  </div>

                  <div class="cajasMetodoPago"></div>
                  

                  <input type="hidden" id="listaMetodoPago" name="listaMetodoPago">

                </div>
                                 <div class="col-xs-6"> 

                    <div class="input-group"> 

                    <span class="input-group-addon">&nbsp;$&nbsp;</span> 

                    <input type="text" class="form-control" name="nuevoValorEfectivo" id="nuevoValorEfectivo"  required>

                    </div>

                  </div>
                  
                   <div class="col-xs-6" id="capturarCambioEfectivo" style="padding-left:0px">

			<div class="input-group">

			 		<span class="input-group-addon">&nbsp;$&nbsp;</span> 

			 		<input type="text" class="form-control" id="nuevoSaldoEfectivo" name="nuevoSaldoEfectivo"  readonly required>

			 	</div>

			</div><br><br><br>
                <div class="form-group">
                    
                     <div class="input-group field"> 
                       <p>&nbsp;Estado de la Venta</p>
                      <select class="form-control" id="listaEstado" name="listaEstado" >
                        <option value="">Seleccione el Estado de la Venta</option>
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

            <button type="submit" class="btn btn-primary pull-right">Guardar venta</button>

          </div>

        </form>

        <?php

          $guardarVenta = new ControladorVentas();
          $guardarVenta -> ctrCrearVenta();
          
        ?>

        </div>
            
      </div>

      <!--=====================================
      LA TABLA DE PRODUCTOS
      ======================================-->

      <div class="col-lg-7 hidden-md hidden-sm hidden-xs" style="position:relative; top:-06px;">
        
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
                  <th></th>
                </tr>

              </thead>

            </table>
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
          <button type="reset" class="btn btn-default" >Reset</button>
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
