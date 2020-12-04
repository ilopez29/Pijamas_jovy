<?php

$item = null;
$valor = null;
$orden = "id";

$ventas = ControladorVentas::ctrSumaTotalVentas();

$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
$totalCategorias = count($categorias);

$clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
$totalClientes = count($clientes);

$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
$totalProductos = count($productos);

$tipomaterial = ControladorTipomaterial::ctrMostrarTipomaterial($item, $valor);
$totalTipomaterial = count($tipomaterial);

$material = ControladorMaterial::ctrMostrarMaterial($item, $valor, $orden);
$totalMaterial = count($material);
?>



<div class=" col-xs-4" >

  <div class="small-box" style="background: rgb(92, 187, 250); color:#fff; text-align: center;" >
    
    <div class="inner" style=" height: 250px;">
      
      <br><br>  <h3>Ventas</h3>

      <h3>$<?php echo number_format($ventas["total"],2); ?></h3>
    
    </div>
    
    <div class="icon">
      
      <i class="ion ion-social-usd"></i>
    
    </div>
    
    <a href="ventas" class="small-box-footer" >
      
      Más info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>


<div class=" col-xs-4 style="padding-top: 1px;">

  <div class="small-box  " style="background: #222d32; color:#fff; text-align: center; ">
    
    <div class="inner" style=" height: 250px; text-align: center; ">
    
      <br><br><h3>Clientes</h3>

      <h3><?php echo number_format($totalClientes); ?></h3>
  
    </div>
    
    <div class="icon">
    
      <i class="ion ion-person-add"></i>
    
    </div>
    
    <a href="clientes" class="small-box-footer" >

      Más info <i class="fa fa-arrow-circle-right"></i>

    </a>

  </div>

</div>

<div class=" col-xs-4" style="padding-top: 1px;">

  <div class="small-box " style="background: rgb(92, 187, 250); color:#fff; ">
  
    <div class="inner" style=" height: 250px; text-align: center; ">
    
      <br><br><h3>Productos</h3>

      <h3><?php echo number_format($totalProductos); ?></h3>
    
    </div>
    
    <div class="icon">
      
      <i class="ion ion-ios-cart"></i>
    
    </div>
    
    <a href="productos" class="small-box-footer">
      
      Más info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>


