<!DOCTYPE html>
<html>

    <?php include 'head.php';?>

<body >
<!-- Nav -->
<nav class="main-nav">
	<div class="contenedor">
		<div class="logo">
            <a class="navbar-logo" href="index.php" ><img src="img/logo.svg" alt="Arraigo"></a>
            <h1 style="display:none;">Estudio Arraigo</h1>
        </div>

		<div class="nav-collapse">
			<ul class="navbar-menu">
				<li> <a class="li-secciones btn-contacto active" href="arquitectura.php"><span>arquitectura</span></a></li>
				<li> <a class="li-secciones btn-contacto" href="estudio.php"><span>estudio</span></a></li>
				<li> <a class="li-secciones btn-contacto" href="contacto.php"><span>contacto</span></a></li>
			</ul>
		</div>

		<div class="nav-redes">
			<a class="btn-instagram" href="https://www.instagram.com" target="_blank"><span class="btn-redes">instagram</span></a>
			<span style="padding: 0px 10px;">/</span>
			<a class="btn-facebook" href="https://www.facebook.com" target="_blank"><span class="btn-redes" >facebook</span></a>
		</div>


        <a class="btn-nav-responsive" href="javascript:void(0)" style="display:none;"><img src="img/icon-bar.svg"></a>
        <a class="btn-icon-close" href="javascript:void(0)" style="display:none;"><img src="img/icon-close.svg"></a>

	</div>
</nav>

<!-- Nav Responsive -->
<div class="nav-responsive" style="display:none;">
    <div class="logo">
        <a class="navbar-logo" href="index.php" ><img src="img/logo.svg" alt="Arraigo"></a>
        <h1 style="display:none;">Estudio Arraigo</h1>
    </div>
    <a class="btn-icon-bar" href="javascript:void(0)"><img src="img/icon-bar.svg"></a>
</div>

<!-- Arquitectura -->
<div  class="contenedor-seccion">



    <!-- Proyecto -->
    <div class="proyecto">
        <h2 class="titulo">CASA A9</h2>
        <h2 class="anip">2018</h2>
        <p class="descripcion"> Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
Fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut. </p>
        <img src="img/proyecto.jpg" title="proyecto" alt="proyecto" />
    </div>

</div>

<?php include 'footer.php';?>
</body>

</html>
