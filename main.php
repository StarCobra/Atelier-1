<?php

require_once 'vendor/autoload.php';

use iutnc\mediaphotoapp\auth\mediaphotoAuthentification;

// Configure database connectivity
$config = parse_ini_file("conf/config.ini");

$db = new \Illuminate\Database\Capsule\Manager();

$db->addConnection($config);
$db->bootEloquent();
$db->setAsGlobal();

$router = new \iutnc\mf\router\Router();

//$router->addRoute('home',        'list_galeriePub',  '\iutnc\mediaphotoapp\control\#', mediaphotoAuthentification::ACCESS_LEVEL_NONE);
//$router->addRoute('connecte',    'list_galeriePriv', '\iutnc\mediaphotoapp\control\#', mediaphotoAuthentification::ACCESS_LEVEL_NONE);
//$router->addRoute('connexion',   'view_connexion',   '\iutnc\mediaphotoapp\control\#', mediaphotoAuthentification::ACCESS_LEVEL_NONE);
//$router->addRoute('inscription', 'view_inscription', '\iutnc\mediaphotoapp\control\#', mediaphotoAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('user',        'view_userProfil',  '\iutnc\mediaphotoapp\control\userController', mediaphotoAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('createGallery', 'view_create', '\iutnc\mediaphotoapp\control\createGalleryController', mediaphotoAuthentification::ACCESS_LEVEL_NONE);

$router->setDefaultRoute('view_userProfil');

$router->run();