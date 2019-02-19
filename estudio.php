<!DOCTYPE html>
<html>

    <?php include 'head.php';?>

<body >
<!-- Nav -->
<nav class="main-nav">
	<div class="contenedor">
		<div class="logo">
            <a class="navbar-logo" href="index.php" ><img class="svg logo-svg" src="img/logo.svg" alt="Arraigo"></a>
            <h1 style="display:none;">Estudio Arraigo</h1>
        </div>

		<div class="nav-collapse">
			<ul class="navbar-menu">
				<li> <a class="li-secciones btn-contacto" href="arquitectura.php"><span>arquitectura</span></a></li>
				<li> <a class="li-secciones btn-contacto active" href="estudio.php"><span>estudio</span></a></li>
				<li> <a class="li-secciones btn-contacto" href="contacto.php"><span>contacto</span></a></li>
			</ul>
		</div>

		<div class="nav-redes">
			<a class="btn-instagram" href="https://www.instagram.com/estudioarraigo/" target="_blank"><span class="btn-redes">instagram</span></a>
			<span style="padding: 0px 10px;">/</span>
			<a class="btn-facebook" href="https://www.facebook.com/estudioarraigo/" target="_blank"><span class="btn-redes" >facebook</span></a>
		</div>


        <a class="btn-nav-responsive" href="javascript:void(0)" style="display:none;"><img src="img/icon-bar.svg"></a>
        <a class="btn-icon-close" href="javascript:void(0)" style="display:none;"><img src="img/icon-close.svg"></a>

	</div>
</nav>

<!-- Nav Responsive -->
<div class="nav-responsive" style="display:none;">
    <div class="logo">
        <a class="navbar-logo" href="index.php" ><img class="svg logo-svg" src="img/logo.svg" alt="Arraigo"></a>
        <h1 style="display:none;">Estudio Arraigo</h1>
    </div>
    <a class="btn-icon-bar" href="javascript:void(0)"><img src="img/icon-bar.svg"></a>
</div>

<!-- Estudio -->
<div  class="contenedor-seccion" id="estudio">

    <div class="caja-estudio">
        <div class="estudio-texto">
            <div class="caja">
                <h2 class="titulo">NUESTRO ESTUDIO</h2>
                <p class="descripcion">Somos arraigo, un estudio de arquitectura en donde desarrollamos diferentes proyectos y obras desde el año 2011.</br> Elegimos el nombre Arraigo ya que nos sentimos identificados con su significado, nos une nuestro apellido y la pasión por la profesión.
                </br><span>“Arraigo es el acto y la consecuencia de arraigar: afincarse de modo permanente, afianzarse, ganar firmeza o echar raíces.”</span></p>

                <h2 class="titulo segundo">PRESTACIONES</h2>
                <p class="descripcion">Realizamos un desarrollo integral, abarcando las diferentes instancias de proyectos, dirección y ejecución de obras de arquitectura, principalmente en desarrollos de viviendas de diferentes escalas y complejidades.</br> Nuestras propuestas se caracterizan por la calidad espacial, su funcionalidad, materialidad e innovación, desarrollando un lenguaje propio.</p>
            </div>
        </div>

        <img class="estudio" src="img/estudio.jpg" title="estudio" alt="estudio" />
    </div>

</div>

<?php include 'footer.php';?>
</body>

</html>
