<style>
  @media (max-width: 600px) {
    .for{
        position:relative;
        left: 0%;
        width: 100%;
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
      
      Registrar orden de trabajo
    
    </h1>


  </section>

  <section class="content">

    <div class="row">

          <!--=====================================
      LA TABLA DE PRODUCTOS
      ======================================-->

      <div class="col-lg-12 hidden-md hidden-sm hidden-xs" style="position:ralative; top:0px;">
        
        <div class="" style="background:white;" >

          <div class="box-header "></div>

          <div class="box-body" >
            <div class="div1">
            <table class="table table-bordered table-striped dt-responsive tablaOrden" >
              
               <thead >

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
      
      <div class="col-lg-6 col-xs-10 for" >
        
        <div class="box " style="box-shadow: 0 0 9px 0 rgb(57, 152, 255);">
          
          <div class="box-header with-border"></div>

          <form role="form" method="post" class="formularioMaterial">

            <div class="box-body">
  
              <div class="box">

                <!--=====================================
                ENTRADA DEL CÓDIGO
                ======================================--> 

                <div class="form-group">
                  <p>Codigo de Referencia</p>
                  <div class="input-group">

                    <?php

                    $item = null;
                    $valor = null;

                    $ordentrabajo = ControladorOrdentrabajo::ctrMostrarOrdentrabajo($item, $valor);

                    if(!$ordentrabajo ){

                      echo '<input type="text" class="form-control" id="nuevaOrdentrabajo" name="nuevaOrdentrabajo" value="10001" readonly>';
                  

                    }else{

                      foreach ($ordentrabajo as $key => $value) {
                        
                        
                      
                      }

                      $codigo = $value["codigo"] + 1;



                      echo '<input type="text" class="form-control" id="nuevaOrdentrabajo" name="nuevaOrdentrabajo" value="'.$codigo.'" readonly>';
                  

                    }

                    ?>
                    
                    
                  </div>
                
                </div>

                <!--=====================================
                ENTRADA DEL VENDEDOR
                ======================================-->
            
                <div class="form-group">
                <p>Usuario</p>
                  <div class="input-group">

                    <input type="text" class="form-control" id="nuevoUsuario" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                    <input type="hidden" name="idUsuario" value="<?php echo $_SESSION["id"]; ?>">

                  </div>

                </div> 

                <!-- ENTRADA PARA LA Nombre -->

                <div class="form-group">
              <p>Producto</p>
              <div class="input-group">

                <input type="text" class="form-control " name="nuevaProducto" min="0" placeholder="Ingresar Nombre de la Pijama" required>

              </div>

            </div>

                <!-- ENTRADA PARA LA Nombre -->

                         <div class="form-group">
              <p>Cantidad Solicitada</p>
              <div class="input-group">

                <input type="number" class="form-control " name="nuevaCantidadsolicitada" min="0" placeholder="Ingresar Cantidad Solicitada" required>

              </div>

            </div>

             <!-- ENTRADA PARA STOCK -->

             <div class="form-group">
              <p>Cantidad Entregada</p>
              <div class="input-group">

                <input type="number" class="form-control" name="nuevaCantidadentregada" min="0" placeholder="Ingresar Cantidad Entregada" required>

              </div>

            </div>
             

                <!-- ENTRADA PARA PRECIO VENTA -->

                <div class="form-group">
                <p>Fecha de Entrega</p>

                      <div class="input-group">

                    <input type="date" class="form-control"  name="nuevaFechaentrega" required>

                </div>

            </div>



                <!--=====================================
                ENTRADA PARA AGREGAR PRODUCTO
                ======================================--> 

                <div class="form-group row nuevoMaterial">

                

                </div>

                <input type="hidden" id="listaMaterial" name="listaMaterial">

                <!--=====================================
                BOTÓN PARA AGREGAR PRODUCTO
                ======================================-->

                <button type="button" class="btn btn-default hidden-lg btnAgregarProduct">Agregar Material</button>

                </div>


          </div>

          <div class="box-footer">
          
          <button type="reset" class="btn btn-default" >Reset</button>
            <button type="submit" class="btn btn-primary pull-right">Guardar Orden</button>

          </div>

        </form>

        <?php

          $guardarOrdentrabajo = new ControladorOrdentrabajo();
          $guardarOrdentrabajo-> ctrCrearOrdentrabajo();
          
        ?>

        </div>
            
      </div>



    </div>  <br><br><br>
   
  </section>

</div>


