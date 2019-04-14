<?php

define("ROOT_DIR", dirname(__DIR__));
define("ROOT_CONTROLLERS_NS", "App\Controllers\\");
define("ROOT_VIEWS_PATH", ROOT_DIR . "/App/Views/");
define("ROOT_MODELS_PATH", ROOT_DIR . "/App/Models/");
require ROOT_DIR . "/Config/urls.php";
require ROOT_DIR . "/vendor/autoload.php";
require ROOT_DIR . "/Core/Model.php";

require ROOT_DIR . "/App/Models/User.php";


/**
 * AutoLoader
 */
spl_autoload_register(function($className){
    $file = ROOT_DIR . "/" . str_replace('\\', '/', $className) . ".php";
    if(is_readable($file))
    require $file;
});


$router = new Core\Router();

foreach($urlpatterns as $url => $params){
    $router->add($url, $params);
}
session_start();

$url = $_SERVER["QUERY_STRING"];
/* if($router->match($url)){
    var_dump($router->getParams());
}
else echo "Not found"; */
$router->dispatch($url);

?>