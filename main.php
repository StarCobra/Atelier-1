<?php

require_once 'vendor/autoload.php';

// Configure database connectivity
$config = parse_ini_file("conf/config.ini");

$db = new \Illuminate\Database\Capsule\Manager();

$db->addConnection($config);
$db->bootEloquent();
$db->setAsGlobal();

$router = new \iutnc\mf\router\Router();

$router->addRoute('home',        'list_galeriePub',  '\iutnc\mediaphotoapp\control\#', iutnc\mediaphotoapp\auth\mediaphotoAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('connecte',    'list_galeriePriv', '\iutnc\mediaphotoapp\control\#', iutnc\mediaphotoapp\auth\mediaphotoAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('connexion',   'view_connexion',   '\iutnc\mediaphotoapp\control\#', iutnc\mediaphotoapp\auth\mediaphotoAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('inscription', 'view_inscription', '\iutnc\mediaphotoapp\control\#', iutnc\mediaphotoapp\auth\mediaphotoAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('user',        'view_userProfil',  '\iutnc\mediaphotoapp\control\#', iutnc\mediaphotoapp\auth\mediaphotoAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('image',       'view_img',         '\iutnc\mediaphotoapp\control\#', iutnc\mediaphotoapp\auth\mediaphotoAuthentification::ACCESS_LEVEL_NONE);

$router->setDefaultRoute('list_galeriePub');

$router->run();