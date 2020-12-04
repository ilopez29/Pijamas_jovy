<div class="fondo">
  <img class="fondo" src="vistas/img/plantilla/fondo.jpg" >
</div> 
    <div class="fond-pink">
    </div>
    <div class="fond-blue">
    </div>

  <br><br>  <!-- LOGIN -->
<div class="container">
 <div class="container-flex">

                <!-- CAJA 1 -->
                <div class="caja1">
                  <div class="checked-flex">
                 </div>
                  <div class="caja1-titulo">
                  <img style="width:280px; position:relative; top:40px; right:8px;" src="vistas/img/plantilla/1.png" >
                  </div>
                  <div class="selectForm">
                  <div class="select-i">
                      <i class="fa fa-chevron-right"></i>
                 </div>
            </div>
  </div>
  <div class="caja2">
    <form method="post">
       
<div class="form-flex has-feedback ">
  
        <h2 style="position:absolute; top:-60px; left:13%; font-family: 'Dosis', sans-serif;">Inicio de Sesión</h2>
        <label>Usuario</label>
        <input type="text"  placeholder="Ingresar Usuario" name="ingUsuario" required>
        <span class="glyphicon glyphicon-user form-control-feedback" style="position:absolute; top:38px;left:85%"></span>

      </div>


      <div class="form-flex has-feedback">
        <label >Contraseña</label>
        <input type="password" class="form-control" placeholder="Ingresar Contraseña" name="ingPassword" required>
        <span class="glyphicon glyphicon-eye-open form-control-feedback" style="position:absolute; top:38px; left:85%"></span>
      </div>


      <div class="row">
       
        <div class="col-xs-12">

          <button type="submit" class="btn btn-primary  iniciar" >Ingresar</button>
        
        </div>

      </div>

      <?php

        $login = new ControladorUsuarios();
        $login -> ctrIngresoUsuario();
        
      ?>
</div>
<p style="position:absolute; top:380px; left:50%;">¿Olvidaste tu Contraseña?<a  href="vistas/modulos/recuperacion.php " >Restablecer contraseña</a></p>
      </div>
</div>
  