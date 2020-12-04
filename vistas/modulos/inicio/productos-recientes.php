<?php

$item = null;
$valor = null;
$orden = "id";

$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

 ?>

<style>
h2 {
	color: #000;
	font-size: 38px;
	font-weight: 300;
	text-align: center;
	text-transform: uppercase;
	position: relative;
	margin: 30px 0 80px;
}

img{
  width: 100% ;
  
}
h2 b {
	color: rgb(92, 187, 250); 
}
h2::after {
	content: "";
	width: 100px;
	position: absolute;
	margin: 0 auto;
	height: 4px;
	background: rgba(0, 0, 0, 0.2);
	left: 0;
	right: 0;
	bottom: -20px;
}
.carousel {
	margin: 50px auto;
	padding: 0 70px;
}
.carousel .carousel-item {
	min-height: 330px;
	text-align: center;
	overflow: hidden;
}
.carousel .carousel-item .img-box {
	height: 322px;
	width: 100%;
	position: relative;
	box-shadow: 0 0 9px 0 rgb(57, 152, 255);
}
.carousel .carousel-item img {	
  max-width: 320px;  
  height: 320px;
	display: inline-block;
	bottom: 0;
	margin: 0 auto;
	left: 0;
	right: 0;
	
}
.carousel .carousel-item h4 {
	font-size: 18px;
	margin: 10px 0;
}
.carousel .carousel-item .btn {
	color: #333;
	border-radius: 0;
	font-size: 11px;
	text-transform: uppercase;
	font-weight: bold;
	background: none;
	border: 1px solid #ccc;
	padding: 5px 10px;
	margin-top: 5px;
	line-height: 16px;
}
.carousel .carousel-item .btn:hover, .carousel .carousel-item .btn:focus {
	color: #fff;
	background: #000;
	border-color: #000;
	box-shadow: none;
}
.carousel .carousel-item .btn i {
	font-size: 14px;
	font-weight: bold;
	margin-left: 5px;
}
.carousel .thumb-wrapper {
	text-align: center;
}
.carousel .thumb-content {
	padding: 15px;
}
.carousel-control-prev, .carousel-control-next {
	height: 100px;
	width: 40px;
	background: none;
	margin: auto 0;
	background: rgba(0, 0, 0, 0.2);
}
.carousel-control-prev i, .carousel-control-next i {
	font-size: 30px;
	position: absolute;
	top: 50%;
	display: inline-block;
	margin: -16px 0 0 0;
	z-index: 5;
	left: 0;
	right: 0;
	color: rgba(0, 0, 0, 0.8);
	text-shadow: none;
	font-weight: bold;
}
.carousel-control-prev i {
	margin-left: -3px;
}
.carousel-control-next i {
	margin-right: -3px;
}
.carousel .item-price {
	font-size: 13px;
	padding: 2px 0;
}
.carousel .item-price strike {
	color: #999;
	margin-right: 5px;
}
.carousel .item-price span {
	color: #222d32;
	font-size: 110%;
}	
.carousel .carousel-indicators {
	bottom: -50px;
}
.carousel-indicators li, .carousel-indicators li.active {
	width: 10px;
	height: 10px;
	margin: 4px;
	border-radius: 50%;
	border-color: transparent;
	border: none;
}
.carousel-indicators li {	
	background: rgba(0, 0, 0, 0.2);
}
.carousel-indicators li.active {	
	background: rgba(0, 0, 0, 0.6);
}
.star-rating li {
	padding: 0;
}
.star-rating i {
	font-size: 14px;
	color: #ffc000;
}
</style>

			<h2>Ultima <b>Producción</b></h2>
			<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">


			<div class="carousel-inner">
				<div class="carousel-item active">
					<div class="row">
<?php  for($i = 0; $i < 4; $i++){  ?>
						<div class="col-sm-3">
							<div class="thumb-wrapper">
								<div class="img-box">
                <?php echo '<img src="'.$productos[$i]["imagen"].'"  alt="Product Image">' ?>
								</div>
								<div class="thumb-content">
									<?php echo '<h4>'.$productos[$i]["nombre_producto"].'</h4>' ?>
									<?php echo '<p class="item-price"><span>$'.$productos[$i]["precio_venta"].'</span></p>' ?>
								</div>						
							</div>
            </div>
<?php }?>
					</div>


  <div class="box-footer text-center">

    <a href="productos" class="uppercase">Ver todos los productos</a>
  
  </div>

</div>




