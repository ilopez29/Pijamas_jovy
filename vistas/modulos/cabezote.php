 <header class="main-header">
 	
	<!--=====================================
	LOGOTIPO
	======================================-->
    <a href="escritorio.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span><img style="width:75px; position:relative; right:8px;" src="vistas/img/plantilla/1.png" ></span>	
    </a>

	<!--=====================================
	BARRA DE NAVEGACIÓN
	======================================-->
	<nav class="navbar navbar-static-top" role="navigation">
		
		<!-- Botón de navegación -->

	 	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        	
        	<span class="sr-only">Toggle navigation</span>
      	
      	</a>

		<!-- perfil de usuario -->

		<div class="navbar-custom-menu">
				
			<ul class="nav navbar-nav" >
				
				<li class="dropdown user user-menu">
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">

					<?php

					if($_SESSION["foto"] != ""){

						echo '<img src=" '.$_SESSION["foto"].'" class="user-image">';

					}else{


						echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';

					}


					?>
						
						<span class="hidden-xs">Hola, <?php  echo $_SESSION["nombre"]; ?></span>

					</a>

					<!-- Dropdown-toggle -->

					<ul class="dropdown-menu">

            <li class="user-body">
							
							<div class="pull-right perfil">
								<a class="btn falso btnEditarPerfil" style="position:relative; left:-70px;" <?php echo 'idUsuario="'.$_SESSION["id"].'" data-toggle="modal" data-target="#modalEditarPerfil"' ?> >Mi Cuenta</a>
                <span class="glyphicon glyphicon-user form-control-feedback" style="position:absolute; top:12px; left:45%"></span>
							</div>

						</li>
						
						<li class="user-body">
							
							<div class="pull-right">
								
								<a href="salir" class="btn falso" style="position:relative; left:-50px;">Cerrar Sesión</a>
                <span class="glyphicon glyphicon-log-out form-control-feedback" style="position:absolute; top:68px; left:54%"></span>
                

							</div>

						</li>

						

					</ul>

				</li>

			</ul>

		</div>

	</nav>

 </header>

 <!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarPerfil" class="modal fade" role="dialog">
  
  <div class="modal-dialog" style="width: 950px; ">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="width: 950px; height:85px; text-align:center;  color: #fff; " >

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title" style="font-size:40px;">Perfil del Usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
            
            <!-- ENTRADA PARA SUBIR FOTO -->

            <div class="form-group">
            <label for="file-upload" class="subirp">
             <i class="fas fa-cloud-upload-alt"></i> Subir archivo
           </label>

              <input type="file" class="nuevaFoto" id="file-upload" onchange='cambiar()' name="perfilFoto" style="display: none;">

              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizarPerfil previsualizar" width="200px" style=" width:45%; height: 79%; position:absolute; left:3%; top:30px;">

              <input type="hidden" name="fotoActualP" id="fotoActualP">

            </div>

          </div>

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group" style="position:relative; top:-50px;" >

              <label style="width:50%; position:relative; left:50%;">Nombre</label>
              
              <div class="input-group">

                <input type="text" style="width:50%; position:relative; left:50%; " class="form-control" id="perfilNombre" name="perfilNombre" value="" required>

              </div>

            </div>
            

            <!-- ENTRADA PARA EL USUARIO -->

             <div class="form-group" style="position:relative; top:-50px;">

             <label style="width:50%; position:relative; left:50%;">Usuario</label>
              
              <div class="input-group ">

                <input type="text" style="width:50%; position:relative; left:50%; " class="form-control " id="perfilUsuario" name="perfilUsuario" value="" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA EL CORREO -->

            <div class="form-group" style="position:relative; top:-50px;">

            <label style="width:50%; position:relative; left:50%;">Correo Electronico</label>
              
              <div class="input-group">

                <input type="email" style="width:50%; position:relative; left:50%;" class="form-control " id="perfilCorreo" name="perfilCorreo" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="form-group" style="position:relative; top:-50px;">

            <label style="width:50%; position:relative; left:50%;">Perfil de Usuario</label>
              
              <div class="input-group">

                <select style="width:50%; position:relative; left:50%;" class="form-control " name="perfilPerfil">
                  
                  <option value="" id="perfilPerfil"></option>

                </select>

              </div>

            </div>
			<!-- ENTRADA PARA LA CONTRASEÑA -->

			<div class="form-group" style="position:relative; top:-50px;">

      <label style="width:50%; position:relative; left:50%;">Contraseña</label>
        
                <div class="input-group">

                <input style="width:50%; position:relative; left:50%;" type="password" class="form-control " name="editarPassword" placeholder="**************">

                <input type="hidden" id="passwordActual" name="passwordActual">

              </div>

            </div>

            <div class="form-group" style="position:relative; top:-50px;">

      <label style="width:50%; position:relative; left:50%;">Repetir Contraseña</label>
        
                <div class="input-group">

                <input style="width:50%; position:relative; left:50%;" type="password" class="form-control " name="" placeholder="Repetir contraseña">


              </div>

            </div>


        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer" style=" height: 15px; position:relative; top:-50px;  ">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Actualizar Datos</button>

        </div>
		
		<?php

$editarPerfil= new ControladorUsuarios();
$editarPerfil -> ctrEditarPerfil();

?> 

      </form>

    </div>

  </div>

</div>

<script>
function cambiar(){
    var pdrs = document.getElementById('file-upload').files[0].name;
    document.getElementById('info').innerHTML = pdrs;
}
</script>