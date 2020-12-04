<style>
  @media (max-width: 600px) {
    .forv{
        position:relative;
        left: 0%;
    }
  }
  @media (min-width: 1200px) {
    .forv{
        position:relative;
        box-shadow: 0 0 9px 0 rgb(57, 152, 255);
        left: 30%;
    }
  }
  .volver{
      position:relative;
      top: -10px;
  }
</style>
<div class="content-wrapper">

<section class="content-header">
  
  <h1>
    
    Detalle venta
  
  </h1>


</section>

<section class="content">

  <div class="row">

    <!--=====================================
    EL FORMULARIO
    ======================================-->
    
    <div class="col-lg-5 col-xs-10 forv" >
      
      <div class="box ">
        
        <div class="box-header with-border"></div>

        <form role="form" method="post" class="formularioVenta">

          <div class="box-body">

              <?php

                  $item = "codigo";
                  $valor = $_GET["codigoVenta"];

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

              <label > Nombre del Usuario</label>
              
                <div class="input-group">

                  <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $vendedor["nombre"]; ?>" readonly>

                  <input type="hidden" name="idVendedor" value="<?php echo $vendedor["id"]; ?>">

                </div>

              </div> 

              <!--=====================================
              ENTRADA DEL CÓDIGO
              ======================================--> 

              <div class="form-group">

              <label >Codigo de la Venta</label>
                
                <div class="input-group">

                 <input type="text" class="form-control" id="nuevaVenta" name="editarVenta" value="<?php echo $venta["codigo"]; ?>" readonly>
             
                </div>
              
              </div>

              <!--=====================================
              ENTRADA DEL CLIENTE
              ======================================--> 

              <div class="form-group">

              <label>Nombre del Cliente</label>
                
                <div class="input-group">
                  
                  <input type="text" class="form-control" id="nuevaVenta" name="editarVenta" value="<?php echo $cliente["nombre_cliente"]; ?>" readonly>

                
                </div>
              
              </div>

              <!--=====================================
              ENTRADA PARA  PRODUCTO
              ======================================--> 

              <div class="form-group row nuevoProducto">
              <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Productos de la Venta</label>

              <?php

              $listaProducto = json_decode($venta["productos"], true);

              foreach ($listaProducto as $key => $value) {

                $item = "id";
                $valor = $value["id"];
                $orden = "codigo";

                $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

                $stockAntiguo = $respuesta["stock"] + $value["cantidad"];
                
                echo '<div class="row" style="padding:5px 15px">
               
          
                      <div class="col-xs-6" style="padding-right:0px">
                       
                        
          
                        <div class="input-group">

                          <input type="text" class="form-control nuevaDescripcionProducto" idProducto="'.$value["id"].'" name="agregarProducto" value="'.$value["nombre_producto"].'" readonly required>

                        </div>

                      </div>

                      <div class="col-xs-3">
                      <div class="input-group">
            
                        <input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="'.$value["cantidad"].'" stock="'.$stockAntiguo.'" nuevoStock="'.$value["stock"].'" readonly>

                      </div>
                      </div>

                      <div class="col-xs-3 ingresoPrecio" style="padding-left:0px">

                        <div class="input-group">
                 
                          <input type="text" class="form-control nuevoPrecioProducto"  precioReal="'.$respuesta["precio_venta"].'" name="nuevoPrecioProducto" value="$'.$value["total"].'" readonly required>
 
                        </div>
             
                      </div>

                    </div>';
              }


              ?>

              </div>

              <input type="hidden" id="listaProductos" name="listaProductos">


                <!--=====================================
                ENTRADA TOTAL
                ======================================-->
                
                <div class="form-group">

                <label>&nbsp;&nbsp;&nbsp;&nbsp;Total de la Venta</label>
                
                <div class="input-group">

                 <input type="text" class="form-control" id="total" name="editarVenta" value="$<?php echo $venta["total"]; ?>" readonly>
             
                </div>
              
              </div>

              <!--=====================================
              ENTRADA MÉTODO DE PAGO
              ======================================-->

              <div class="form-group">

              <label>&nbsp;&nbsp;&nbsp;&nbsp;Metodo de Pago</label>
                
                <div class="input-group">

                 <input type="text" class="form-control" id="nuevaVenta" name="editarVenta" value="<?php echo $venta["metodo_pago"]; ?>" readonly>
             
                </div>
              
              </div>
              <div class="form-group">

              <label>&nbsp;&nbsp;&nbsp;&nbsp;Abono</label>
                
                <div class="input-group">

                 <input type="text" class="form-control" id="" name="editarVenta" value="$<?php echo $venta["pagado"]; ?>" readonly>
             
                </div>
              
              </div>
              <div class="form-group">

              <label>&nbsp;&nbsp;&nbsp;&nbsp;Saldo</label>
                
                <div class="input-group">

                 <input type="text" class="form-control" id="" name="editarVenta" value="$<?php echo $venta["saldo"]; ?>" readonly>
             
                </div>
              
              </div>
              <div class="form-group">

              <label>&nbsp;&nbsp;&nbsp;&nbsp;Estado de la Venta</label>
                
                <div class="input-group">

                 <input type="text" class="form-control" id="nuevaVenta" name="editarVenta" value="<?php echo $venta["estado_venta"]; ?>" readonly>
             
                </div>
              
              </div>


        </div>

        <div class="box-footer">
                 
            

        </div>

      </form>
      <center><a href="ventas"><button class="btn btn-danger volver">Volver</button></a></center>
          
    </div>

  </div>

</div>

</div>
