<?php

if($_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Tipos de material
    
    </h1>


  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTipomaterial">
          
          Agregar Tipo de material &nbsp; <i class="fa fa-plus-circle"></i>

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Tipo de Material</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $tipomaterial = ControladorTipomaterial::ctrMostrarTipomaterial($item, $valor);

          foreach ($tipomaterial as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["tipomaterial"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarTipomaterial" idTipomaterial="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarTipomaterial"><i class="fa fa-pencil"></i></button>';

                        if($_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-danger btnEliminarTipomaterial" idTipomaterial="'.$value["id"].'"><i class="fa fa-trash"></i></button>';

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
MODAL AGREGAR CATEGORÍA
======================================-->

<div id="modalAgregarTipomaterial" class="modal fade" role="dialog" style="position:absolute; top:60px;">
  
  <div class="modal-dialog" style="width: 450px;">

    <div class="modal-content smart-forms">

      <form role="form" id="smart-form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" >

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Tipo de Material</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              <p class="field">Nombre Tipo de Material
                <input type="text" class="form-control gui-input  " name="nuevoTipomaterial" placeholder="Ingresar categoría" data-rule-required="true" data-msg-required="Este campo es obligatorio">
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

          <button type="submit" class="btn btn-primary">Guardar Tipo de material</button>

        </div>

        <?php

          $crearTipomaterial = new ControladorTipomaterial();
          $crearTipomaterial -> ctrCrearTipomaterial();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->

<div id="modalEditarTipomaterial" class="modal fade" role="dialog" style="position:absolute; top:60px;">
  
<div class="modal-dialog" style="width: 450px;">

<div class="modal-content smart-forms">

  <form role="form" id="smart-form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" >

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Tipo de Material</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
              <p class="field">Nombre Tipo de Material

                <input type="text" class="form-control gui-input " name="editarTipomaterial" id="editarTipomaterial" required>

                 <input type="hidden"  name="idTipomaterial" id="idTipomaterial" required>
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

      <?php

          $editarTipomaterial = new ControladorTipomaterial();
          $editarTipomaterial -> ctrEditarTipomaterial();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarTipomaterial = new ControladorTipomaterial();
  $borrarTipomaterial -> ctrBorrarTipomaterial();

?>


