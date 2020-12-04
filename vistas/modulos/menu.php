<style>
.foto{
	width: 100px;
	border-radius: 50%;
}

.nombre{
	color:white;
	font-size:19px;
}

</style>

<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

		<?php

		if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Costurero" || $_SESSION["perfil"] == "Vendedor") {
			if($_SESSION["foto"] != ""){

				echo '<br><center><img src=" '.$_SESSION["foto"].'" class="foto"></center><br>
				        <center><span class="nombre">'.$_SESSION["nombre"].'</span></center><br><br>';

			}else{


				echo '<center><img src="vistas/img/usuarios/default/anonymous.png" class="user-image"></center><br>';
			}
		}

		if($_SESSION["perfil"] == "Administrador"){

			echo '<li class="active">

			<a >

				

			</a>

		</li>
			
			<li >

				<a href="inicio">

					<i class="fa fa-home"></i>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Inicio

				</a>

			</li>
			<li class="active">

			<a >

				

			</a>

		</li>

			<li>

				<a href="usuarios">

					<i class="fa fa-user"></i>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Usuarios

				</a>

			</li>';

		}

		if($_SESSION["perfil"] == "Vendedor" || $_SESSION["perfil"] == "Costurero"){

			echo '<li class="active">

			<a >

				

			</a>

		</li>
			
			<li >

				<a href="inicio">

					<i class="fa fa-home"></i>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Inicio

				</a>

			</li>
			<li class="active">

			<a >

				

			</a>

		</li>';

		}
		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

			echo '<li>

				<a href="clientes">

					<i class="fa fa-users"></i>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Clientes

				</a>

			</li>';

		}	

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Costurero"){

			echo '<li>

				<a href="categorias">

					<i class="fa fa-tags"></i>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Categorias

				</a>

			</li>

			<li>

				<a href="productos">

					<i class="fa fa-product-hunt"></i>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Productos

				</a>

			</li>
			
			<li>

				<a href="tipomaterial">

					<i class="fa fa-th"></i>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tipo de Materiales

				</a>

			</li>
			<li>

				<a href="material">

					<i class="fa fa-cut" style="font-size:18px;"></i>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Material

				</a>

			</li>
			<li>

				<a href="ordentrabajo">

					<i class="fa fa-cut" style="font-size:18px;"></i>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Orden de trabajo

				</a>

			</li>';

		}

	
		if($_SESSION["perfil"] == "Vendedor" ){

			echo '

			<li>

				<a href="productos">

					<i class="fa fa-product-hunt"></i>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Productos

				</a>

			</li>
			';

		}
	

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

			echo '<li>

				<a href="ventas">

					<i class="fa fa-shopping-cart"></i>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ventas

				</a>

			</li>';

					if($_SESSION["perfil"] == "Administrador"){

					echo '<li>

						

					</li>';

					}

				

				echo '</ul>

			</li>';

		} 

		?>

		</ul>

	 </section>

</aside>