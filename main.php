<?php
require_once 'vendor/autoload.php';

// Configure database connectivity
$config = parse_ini_file("conf/config.ini");

$db = new \Illuminate\Database\Capsule\Manager();
$db->addConnection($config);
$db->bootEloquent();
$db->setAsGlobal();

$router = new \iutnc\mf\router\Router();
