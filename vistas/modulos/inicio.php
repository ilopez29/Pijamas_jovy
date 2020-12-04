<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Inicio
    
    </h1>

  </section>

  <section class="content">

    <div class="row">
  
      
    <?php

    if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Costurero" || $_SESSION["perfil"] == "Vendedor"){

      include "inicio/productos-recientes.php";

    }

    ?>

    </div> <br><br>


          <?php

          if($_SESSION["perfil"] =="Administrador"){
          
             include "inicio/cajas-superiores.php";

         }

          ?>

         

         <div class="col-lg-12">
           


         </div>

     </div>

  </section>
 
</div>
