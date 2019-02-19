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
				<li> <a class="li-secciones btn-contacto" href="estudio.php"><span>estudio</span></a></li>
				<li> <a class="li-secciones btn-contacto active" href="contacto.php"><span>contacto</span></a></li>
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
<div  class="contenedor-seccion" id="contacto">
    <!--<img class="contacto" src="img/contacto-top.svg" title="contacto" alt="contacto" /> -->
    <div class="caja-contacto">
        <div class="contacto-texto">
            <span class="hola">Hola!</span>

            <div class="caja-info top">
                <span class="title">ARQ. MARTIN PIOMBO</span>
                <span>221 541 8929</span>
            </div>
            <div class="caja-info">
                <span class="title">ARQ. RAMIRO PIOMBO</span>
                <span>221 476 6157</span>
            </div>
            <div class="caja-info">
                <span class="title">EMAIL</span>
                <span>ESTUDIOARRAIGO@GMAIL.COM</span>
            </div>
        </div>
    </div>

</div>

<?php include 'footer.php';?>
</body>

</html>
