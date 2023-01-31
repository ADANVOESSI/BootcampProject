<?php



spl_autoload_register(function ($class) {
  $root = dirname(__DIR__); // get the parent directory
  $file = $root . "/" . str_replace("\\", "/", $class) . ".php";

  if (is_readable($file)) {
    require $root . "/" . str_replace("\\", "/", $class) . ".php";
  }
});

/**
 * Routing
 */
require "../core/Router.php";
$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Users', 'action' => 'accueil']);
$router->add('login', ['controller' => 'Users', 'action' => 'login']);
$router->add('admin', ['controller' => 'Users', 'action' => 'login']);
$router->add('about', ['controller' => 'Users', 'action' => 'about']);
$router->add('contact', ['controller' => 'Users', 'action' => 'contact']);
$router->add('site', ['controller' => 'Users', 'action' => 'site']);
$router->add('{controller}/{action}');
$router->add("{controller}/{id:\d+}/{action}");
$router->add("admin/{controller}/{action}", ["namespace" => "Admin"]);

$url = $_SERVER['QUERY_STRING'];

$router->dispatch($_SERVER["QUERY_STRING"]);
