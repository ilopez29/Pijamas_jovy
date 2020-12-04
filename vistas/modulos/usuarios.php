<?php

if($_SESSION["perfil"] == "Especial" || $_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Usuarios
    
    </h1>


  </section>

  <section class="content">

    <div class="box">

      <div class="box-header ">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
          
          Agregar usuario &nbsp; <i class="fa fa-plus-circle"></i>

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Foto</th>
           <th>Nombre</th>
           <th>Usuario</th>
           <th>Correo Electronico</th>
           <th>Perfil</th>
           <th>Estado</th>
           <th>Último login</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

        $item = null;
        $valor = null;

        $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

       foreach ($usuarios as $key => $value){
         
          echo ' <tr>
                  <td>'.($key+1).'</td>';

                  if($value["foto"] != ""){

                    echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="70px"></td>';

                  }else{

                    echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';

                  }

                  echo '<td>'.$value["nombre"].'</td>
                  <td>'.$value["usuario"].'</td>
                  <td>'.$value["correo"].'</td>';

                  echo '<td>'.$value["perfil"].'</td>';

                  if($value["estado"] != 0){

                    echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';

                  }else{

                    echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';

                  }             

                  echo '<td>'.$value["ultimo_login"].'</td>
                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fa fa-trash"></i></button>

                    </div>  

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
MODAL AGREGAR USUARIO
======================================-->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog" style="width: 450px;">

    <div class="modal-content smart-forms">

      <form role="form" method="post" id="smart-form" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" >

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title" >Agregar usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
            
            <!-- ENTRADA PARA SUBIR FOTO -->

            <div class="form-group">
            <label for="file" class="subir">
             <i class="fas fa-cloud-upload-alt"></i> Subir archivo
           </label>

              <input type="file" id="file" onchange='cambiar()' class=" nuevaFoto" name="nuevaFoto" style="display: none;">

              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="200px" style="position:relative; left:-1%; top:-15px;">

            </div>

          </div> 

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
               
              
              <div class="  input-group">
              <p class="field">Nombre
                <input type="text" class="form-control gui-input" name="nuevoNombre" placeholder="Ingresar nombre" data-rule-required="true" data-msg-required="Este campo es obligatorio">
                </p>
              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

             <div class="form-group">
             
              <div class="  input-group">
              <p class="field">Usuario 
                <input type="text" class="form-control gui-input" name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" data-rule-required="true" data-msg-required="Este campo es obligatorio">
                </p>
              </div>

            </div>

            <!-- ENTRADA PARA EL CORREO -->

            <div class="form-group">
            
              <div class="input-group">
              <p class="field">Correo Electronico
                <input type="text" class="form-control gui-input" name="nuevoCorreo" placeholder="Ingresar correo electronico" id="nuevoCorreo" data-rule-required="true" data-rule-email="true" data-msg-required="Este campo es obligatorio" data-msg-email="Este correo electronico no es valido">
                </p> 
              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
             <p>Contraseña</p> 
              <div class="input-group">

              <?php

$item = null;
$valor = null;

$usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

if(!$usuarios){

  echo '<input type="password" class="form-control" id="nuevoPassword"   readonly>';


}else{

  foreach ($usuarios as $key => $value) {
    
    
  
  }

  $password = 32659321 + 481 ;



  echo '<input type="password" class="form-control" id="nuevoPassword" name="nuevoPassword" value="'.$password.'" readonly>';


}

?>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="form-group">
             
              <div class="input-group"> 
              <p class="field select" >Perfil de Usuario
                <select class="form-control"  name="nuevoPerfil" data-rule-required="true"
                                    data-msg-required="Es obligatorio seleccionar una opcion" >
                  
                  <option value="">Selecionar perfil</option>

                  <option value="Administrador">Administrador</option>

                  <option value="Costurero">Costurero</option>

                  <option value="Vendedor">Vendedor</option>

                </select>
                <i class="arrow "></i>
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
          <button type="submit" class="btn btn-primary">Guardar usuario</button>

        </div>

        <?php

          $crearUsuario = new ControladorUsuarios();
          $crearUsuario -> ctrCrearUsuario();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog" style="width: 450px;">

    <div class="modal-content smart-forms">

      <form role="form" method="post" id="smart-form" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" >

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
            
            <!-- ENTRADA PARA SUBIR FOTO -->

            <div class="form-group">
            <label for="fileediu" class="subir">
             <i class="fas fa-cloud-upload-alt"></i> Subir archivo
           </label>
              <input type="file" id="fileediu" onchange='cambiar2()' class="nuevaFoto" name="editarFoto" style="display: none; ">
              
              <img src="vistas/img/usuarios/default/anonymous.png"  class="img-thumbnail previsualizar previsualizarEditar" width="200px" style="position:relative; left:-1%; top:-10px;">

              <input type="hidden" name="fotoActual" id="fotoActual">

            </div>

          </div>

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
            
              <div class="input-group">
              <p class="field">Nombre
                <input type="text" class="form-control gui-input" id="editarNombre" name="editarNombre" value="" data-rule-required="true" data-msg-required="Este campo es obligatorio">
                </p> 
              </div>

            </div>
            

            <!-- ENTRADA PARA EL USUARIO -->

             <div class="form-group">
             
              <div class="input-group">
              <p class="field">Usuario
                <input type="text" class="form-control gui-input" id="editarUsuario" name="editarUsuario" value="" data-rule-required="true" data-msg-required="Este campo es obligatorio">
                </p> 
              </div>

            </div>

            <!-- ENTRADA PARA EL CORREO -->

            <div class="form-group">
            
              <div class="input-group">
              <p class="field">Correo Electronico 
                <input type="email" class="form-control gui-input" id="editarCorreo" name="editarCorreo" value="" data-rule-required="true" data-rule-email="true" data-msg-required="Este campo es obligatorio" data-msg-email="Este correo electronico no es valido">
                </p>
              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="form-group">
            
              <div class="input-group">
              <p class="field select">Perfil de Usuario
                <select class="form-control " name="editarPerfil"data-rule-required="true"
                                    data-msg-required="Es obligatorio seleccionar una opcion">
                  
                  <option value="" id="editarPerfil"></option>

                  <option value="Administrador">Administrador</option>

                  <option value="Costurero">Costurero</option>

                  <option value="Vendedor">Vendedor</option>

                </select>
                <i class="arrow "></i>
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
          <button type="submit" class="btn btn-primary">Modificar usuario</button>

        </div>

     <?php

          $editarUsuario = new ControladorUsuarios();
          $editarUsuario -> ctrEditarUsuario();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();

?> 

<script>
function cambiar(){
    var pdrs = document.getElementById('file').files[0].name;
    document.getElementById('info').innerHTML = pdrs;
}
function cambiar2(){
    var ediusu = document.getElementById('fileediu').files[0].name;
    document.getElementById('info').innerHTML = ediusu;
}
</script>
