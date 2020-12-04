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
      
       Materiales 
    
    </h1>


  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarMaterial">
          
          Agregar Material

        </button>

      </div>
      <div class="well well-sm text-right" style="position:absolute; top: 0px; left:35%;">
					            <a class=" btn btn-dark" href="vistas/reportes/material.php" target="_blank"> Generar reporte </a>
					            <a class=" btn btn-info" href="vistas/reportes/material.php" download="reporteus">Descargar reporte </a>
				            </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablaMaterial" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Imagen</th>
           <th>Código</th>
           <th>Nombre del material</th>
           <th>Tipo material</th>
           <th>Cantidad</th>
           <th>Agregado</th>
           <th>Acciones</th>
           
         </tr> 

        </thead>      

       </table>

       <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilOculto">

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR PRODUCTO
======================================-->

<div id="modalAgregarMaterial" class="modal fade" role="dialog">
  
  <div class="modal-dialog"  style="width: 450px;">

    <div class="modal-content smart-forms">

      <form role="form" method="post" id="smart-form" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" >

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Material</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
             <label for="file2" class="subir">
             <i class="fas fa-cloud-upload-alt"></i> Subir archivo
           </label>
              <input type="file" id="file2" onchange='cambiar3()' class="nuevaImagen" name="nuevaImagen" style="display: none;">

              <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="200px" style="position:relative; left:-1%; top:-15px;">

            </div>

          </div>


            <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

            <div class="form-group">
            
              <div class="input-group">
              <p class="field select">Tipo de Material  
                <select class="form-control " id="nuevoTipomaterial" name="nuevoTipomaterial" data-rule-required="true"
                                    data-msg-required="Es obligatorio seleccionar una opcion" >
                  
                  <option value="">Selecionar Tipo de material</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $tipomaterial = ControladorTipomaterial::ctrMostrarTipomaterial($item, $valor);

                  foreach ($tipomaterial as $key => $value) {
                    
                    echo '<option value="'.$value["id"].'">'.$value["tipomaterial"].'</option>';
                  }

                  ?>
  
                </select>
                <i class="arrow "></i>
                </p>
              </div>

            </div>

            <!-- ENTRADA PARA EL CÓDIGO -->
            
            <div class="form-group">
            
              <div class="input-group">
              <p class="field">Codigo de Referencia  
                <input type="text" class="form-control gui-input" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar código"  data-rule-required="true" data-msg-required="Este campo es obligatorio">
                </p>
              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCIÓN -->

             <div class="form-group">
            
              <div class="input-group">
              <p class="field">Nombre del Material 
                <input type="text" class="form-control gui-input" name="nuevoNombre" placeholder="Ingresar nombre"  data-rule-required="true" data-msg-required="Este campo es obligatorio">
                </p>
              </div>

            </div>

             <!-- ENTRADA PARA STOCK -->

             <div class="form-group">
             
              <div class="input-group">
              <p class="field">Cantidad 
                <input type="number" class="form-control gui-input" name="nuevoStock" min="0" placeholder="Cantidad"  data-rule-required="true" data-msg-required="Este campo es obligatorio">
                </p>
              </div>

            </div>


        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="reset" class="btn btn-default" >Reset</button>
          <button type="submit" class="btn btn-primary">Guardar producto</button>

        </div>

      </form>

        <?php

          $crearMaterial = new ControladorMaterial();
          $crearMaterial -> ctrCrearMaterial();

        ?>  

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR PRODUCTO
======================================-->

<div id="modalEditarMaterial" class="modal fade" role="dialog">
  
  <div class="modal-dialog" style="width: 450px;">

    <div class="modal-content smart-forms">

      <form role="form" method="post" id="smart-form" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar producto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
            
            <!-- ENTRADA PARA SUBIR FOTO -->

            <div class="form-group">
            <label for="fileedim" class="subir">
             <i class="fas fa-cloud-upload-alt"></i> Subir archivo
           </label>
              <input type="file" id="fileedim" onchange='cambiar4()' class="nuevaImagen" name="editarImagen" style="display: none; ">

              <img src="vistas/img/material/default/anonymous.png" class="img-thumbnail previsualizar" width="200px" style="position:relative; left:-1%; top:-10px;">

              <input type="hidden" name="imagenActual" id="imagenActual">

            </div>

          </div>


            <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

            <div class="form-group">
              
              <div class="input-group">
              <p class="field select">Tipo de Material 
                <select class="form-control "  name="editarTipomaterial" readonly required>
                  
                  <option id="editarTipomaterial"></option>
                  
                  <?php

                  $item = null;
                  $valor = null;

                  $tipomaterial = ControladorTipomaterial::ctrMostrarTipomaterial($item, $valor);

                  foreach ($tipomaterial as $key => $value) {
                    
                    echo '<option value="'.$value["id"].'">'.$value["tipomaterial"].'</option>';
                  }

                  ?>

                </select>
                <i class="arrow "></i>
                </p>
              </div>

            </div>

            <!-- ENTRADA PARA EL CÓDIGO -->
            
            <div class="form-group">
              
              <div class="input-group">
              <p class="field">Codigo de Referencia 
                <input type="text" class="form-control gui-input" id="editarCodigo" name="editarCodigo"  required>
                </p>
              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCIÓN -->

             <div class="form-group">
              
              <div class="input-group"> 
              <p class="field">Nombre del Material
                <input type="text" class="form-control gui-input" id="editarNombre" name="editarNombre" required>
                </p>
              </div>

            </div>

             <!-- ENTRADA PARA STOCK -->

             <div class="form-group">
              
              <div class="input-group">
              <p class="field">Cantidad 
                <input type="number" class="form-control gui-input" id="editarStock" name="editarStock" min="0" required>
                </p>
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

          $editarMaterial = new ControladorMaterial();
          $editarMaterial -> ctrEditarMaterial();

        ?>      

    </div>

  </div>

</div>

<?php

  $eliminarMaterial = new ControladorMaterial();
  $eliminarMaterial -> ctrEliminarMaterial();

?>    

<script>
function cambiar3(){
    var regmat = document.getElementById('file2').files[0].name;
    document.getElementById('info').innerHTML = regmat;
}
function cambiar4(){
    var edimat = document.getElementById('fileedim').files[0].name;
    document.getElementById('info').innerHTML = edimat;
}
</script>  



