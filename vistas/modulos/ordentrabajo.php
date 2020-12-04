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
      
      Ordenes de Trabajo
    
    </h1>


  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
      <a href="crear-ordentrabajo">

<button class="btn btn-primary">
  
  Agregar Orden &nbsp; <i class="fa fa-plus-circle"></i>

</button>

</a>

         <button type="button" class="btn btn-default pull-right" id="dtrn-btn">
           
            <span>
              <i class="fa fa-calendar"></i> 

              <?php

                if(isset($_GET["fechaIni"])){

                  echo $_GET["fechaIni"]." - ".$_GET["fechaFin"];
                
                }else{
                 
                  echo 'Rango de fecha';

                }

              ?>
            </span>

            <i class="fa fa-caret-down"></i>

         </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Código</th>
           <th>Usuario</th>
           <th>Producto (Pijama)</th>
           <th>Cantidad Solicitada</th>
           <th>Cantidad Entregada</th>
           <th>Fecha de entrega</th> 
           <th>Fecha</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          if(isset($_GET["fechaIni"])){

            $fechaIni = $_GET["fechaIni"];
            $fechaFin = $_GET["fechaFin"];

          }else{

            $fechaIni = null;
            $fechaFin = null;

          }

          $respuesta = ControladorOrdentrabajo::ctrRangoFechasOrdentrabajo($fechaIni, $fechaFin);

          foreach ($respuesta as $key => $value) {
           
           echo '<tr>

                  <td>'.($key+1).'</td>

                  <td>'.$value["codigo"].'</td>';

                  $itemUsuario = "id";
                  $valorUsuario = $value["id_usuario"];

                  $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

                  echo '<td>'.$respuestaUsuario["nombre"].'</td>';

                  echo '<td>'.$value["producto"].'</td>';

                  echo '<td>'.$value["cantidad_solicitada"].'</td>';

                  echo '<td>'.$value["cantidad_entregada"].'</td>

                  <td>  '.$value["fecha_entrega"].'</td>

                  <td>'.$value["fecha"].'</td>

                  <td>

                    <div class="btn-group">

                        
                      <button class="btn btn-info btnDetalle" idOrdentrabajo="'.$value["id"].'">

                        <i class="fa fa-eye"></i>

                      </button>';

                      if($_SESSION["perfil"] == "Administrador"){

                      echo '<button class="btn btn-warning btnEditarOrdentrabajo" idOrdentrabajo="'.$value["id"].'"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarOrdentrabajo" idOrdentrabajo="'.$value["id"].'"><i class="fa fa-trash"></i></button>';

                    }

                    echo '</div>  

                  </td>

                </tr>';
            }

        ?>
               
        </tbody>

       </table>

    </div>




<?php

$eliminarOrdentrabajo = new ControladorOrdentrabajo();
$eliminarOrdentrabajo -> ctrEliminarOrdentrabajo();

?>

    </div>

  </section>

</div>




