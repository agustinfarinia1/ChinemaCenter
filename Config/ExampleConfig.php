<?php namespace Config;

define("ROOT", dirname(__DIR__) . "/");

//Path to your project's root folder
//Si su url es 'http://localhost/proyectos/chinemacenter/',
//FRONT_ROOT debe ser '/proyectos/chinemacenter/'
define("FRONT_ROOT", "/chinemacenter/");  
define("VIEWS_PATH", "Views/");
define("CSS_PATH", FRONT_ROOT.VIEWS_PATH . "layout/styles/");
define("JS_PATH", FRONT_ROOT.VIEWS_PATH . "js/");
define("IMG_PATH", FRONT_ROOT.VIEWS_PATH . "img/");

//Api's config
define("API_KEY", "");

//DB's config
define("DB_HOST", "localhost");
define("DB_NAME", "");
define("DB_USER", "");
define("DB_PASS", "");

// Config Mail (gmail)

define("USERNAME_MAIL","");
define("PASSWORD_MAIL", "");

?>




