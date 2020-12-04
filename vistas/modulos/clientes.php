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
      
      Clientes
    
    </h1>


  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
          
          Agregar cliente &nbsp; <i class="fa fa-plus-circle"></i>

        </button>

      </div>

      <div class="box-body">
        
       <table class="table dt-responsive table-bordered table-striped tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>Documento ID</th>
           <th>Correo Electronico</th>
           <th>Teléfono</th>
           <th>Dirección</th> 
           <th>Total compras</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

          foreach ($clientes as $key => $value) {
            

            echo '<tr>

                    <td>'.($key+1).'</td>

                    <td>'.$value["nombre_cliente"].'</td>

                    <td>'.$value["documento_cliente"].'</td>

                    <td>'.$value["correo_cliente"].'</td>

                    <td>'.$value["telefono_cliente"].'</td>

                    <td>'.$value["direccion_cliente"].'</td>           

                    <td>'.$value["compras"].'</td>


                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" idCliente="'.$value["id"].'"><i class="fa fa-pencil"></i></button>';

                      if($_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-danger btnEliminarCliente" idCliente="'.$value["id"].'"><i class="fa fa-trash"></i></button>';

                      }

                      echo '</div>  

                    </td>

                  </tr>';
          
            }

        ?>
   
        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog" style="width: 450px;">

    <div class="modal-content smart-forms">

      <form role="form" method="post" id="smart-form">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header">

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
              <p class="field">Nombre 
                <input type="text" class="form-control gui-input" name="nuevoCliente" placeholder="Ingresar nombre"  id="nuevoCliente" data-rule-required="true" data-msg-required="Este campo es obligatorio">
                </p>
              </div>

            </div>

            <!-- ENTRADA PARA EL DOCUMENTO ID -->
            
            <div class="form-group">
            
              <div class="input-group">
              <p class="field">Documento de Identificación 
                <input type="number" min="0" class="form-control gui-input"  name="nuevoDocumentoId" placeholder="Ingresar documento" id="nuevoDocumentoId" data-rule-required="true" data-msg-required="Este campo es obligatorio">
                </p>
              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->
            
            <div class="form-group">
            
              <div class="input-group">
              <p class="field">Correo Electronico
                <input type="email" class="form-control gui-input" name="nuevoEmail" placeholder="Ingresar correo electronico" data-rule-required="true" data-msg-required="Este campo es obligatorio">
                </p>
              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->
            
            <div class="form-group">
            
              <div class="input-group">
              <p class="field">Teléfono
                <input type="text" class="form-control gui-input" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'999 999-9999'" data-mask data-rule-required="true" data-msg-required="Este campo es obligatorio">
                </p> 
              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->
            
            <div class="form-group">
            
              <div class="input-group">
              <p class="field">Dirección 
                <input type="text" class="form-control gui-input" name="nuevaDireccion" placeholder="Ingresar dirección" data-rule-required="true" data-msg-required="Este campo es obligatorio">
                </p>
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

<!--=====================================
MODAL EDITAR CLIENTE
======================================-->

<div id="modalEditarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog" style="width: 450px;">

  <div class="modal-content smart-forms">

    <form role="form" method="post" id="smart-form">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
            
              <div class="input-group">
              <p class="field">Nombre
                <input type="text" class="form-control gui-input" name="editarCliente" id="editarCliente"  data-rule-required="true" data-msg-required="Este campo es obligatorio">
                <input type="hidden" id="idCliente" name="idCliente">
                </p> 
              </div>

            </div>

            <!-- ENTRADA PARA EL DOCUMENTO ID -->
            
            <div class="form-group">
            
              <div class="input-group">
              <p class="field">Documento de Identificación
                <input type="number" min="0" class="form-control gui-input" name="editarDocumentoId" id="editarDocumentoId"  data-rule-required="true" data-msg-required="Este campo es obligatorio">
                </p>
              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->
            
            <div class="form-group">
            
              <div class="input-group"> 
              <p class="field">Correo Electronico
                <input type="email" class="form-control gui-input" name="editarEmail" id="editarEmail"  data-rule-required="true" data-msg-required="Este campo es obligatorio">
                </p> 
              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->
            
            <div class="form-group">
            
              <div class="input-group">
              <p class="field">teléfono
                <input type="text" class="form-control gui-input" name="editarTelefono" id="editarTelefono" data-inputmask="'mask':'999 999-9999'" data-mask  data-rule-required="true" data-msg-required="Este campo es obligatorio">
                </p> 
              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->
            
            <div class="form-group">
            
              <div class="input-group">
              <p class="field">Dirección 
                <input type="text" class="form-control gui-input " name="editarDireccion" id="editarDireccion"  data-rule-required="true" data-msg-required="Este campo es obligatorio">
                </p>
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
          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>

      <?php

        $editarCliente = new ControladorClientes();
        $editarCliente -> ctrEditarCliente();

      ?>

    

    </div>

  </div>

</div>

<?php

  $eliminarCliente = new ControladorClientes();
  $eliminarCliente -> ctrEliminarCliente();

?>


