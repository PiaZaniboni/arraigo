<?php
define("DEFAULT_CONTROLLER", "project");
define("APP_NAME", "ARRAIGO");
define("TITLE_TEXT", "Administrador");
define("GO_TO_SITE_TEXT", "Ir al sitio");
define("CLOSE_SESSION_TEXT", "Cerrar sesi&oacute;n");
define("CONFIRMATION_TEXT", "¿Desea continuar?");
define("YES_TEXT", "Si");
define("NO_TEXT", "No");
define("REQUIRED_FIELDS_TEXT", "Los campos con * son obligatorios.");
if($_SERVER["HTTP_HOST"] === "localhost"){
	define("WEB_PATH", "http://localhost/arraigo");
	define("APP_PATH", "http://localhost/arraigo/ar-admin");
	define("DB_NAME", "arraigo-db");
	define("DB_USER", "root");
	define("DB_PASSWORD", "");
	define("ACTIVATE_URL_FRIENDLY", false);
} else {
	define("WEB_PATH", "http://www.estudioarraigo.com.ar");
	define("APP_PATH", "http://www.estudioarraigo.com.ar/ar-admin");

	define("DB_NAME", "c1490668_arraigo");
	define("DB_USER", "c1490668_arraigo");
	define("DB_PASSWORD", "TItomana77");

	define("ACTIVATE_URL_FRIENDLY", false);
}
?>
