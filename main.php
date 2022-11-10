<?php

use iutnc\mediaphotoapp\model\Gallery;

require_once 'vendor/autoload.php';

// Configure database connectivity
$config = parse_ini_file("conf/config.ini");

$db = new \Illuminate\Database\Capsule\Manager();

$db->addConnection($config);
$db->bootEloquent();
$db->setAsGlobal();

$router = new \iutnc\mf\router\Router();

$router->addRoute('home',        'list_galeriePub',  '\iutnc\mediaphotoapp\control\HomeController', iutnc\mediaphotoapp\auth\mediaphotoAuthentification::ACCESS_LEVEL_NONE);
// $router->addRoute('connecte',    'list_galeriePriv', '\iutnc\mediaphotoapp\control\#', iutnc\mediaphotoapp\auth\mediaphotoAuthentification::ACCESS_LEVEL_NONE);
// $router->addRoute('connexion',   'view_connexion',   '\iutnc\mediaphotoapp\control\#', iutnc\mediaphotoapp\auth\mediaphotoAuthentification::ACCESS_LEVEL_NONE);
// $router->addRoute('inscription', 'view_inscription', '\iutnc\mediaphotoapp\control\#', iutnc\mediaphotoapp\auth\mediaphotoAuthentification::ACCESS_LEVEL_NONE);
// $router->addRoute('user',        'view_userProfil',  '\iutnc\mediaphotoapp\control\#', iutnc\mediaphotoapp\auth\mediaphotoAuthentification::ACCESS_LEVEL_NONE);
// $router->addRoute('image',       'view_img',         '\iutnc\mediaphotoapp\control\#', iutnc\mediaphotoapp\auth\mediaphotoAuthentification::ACCESS_LEVEL_NONE);

$router->setDefaultRoute('list_galeriePub');

\iutnc\mf\view\AbstractView::AddStyleSheet("./html/css/style.css");

$router->run();

// $u = Gallery::select();
// $lignes = $u->get();  
// foreach ($lignes as $v) {   
//     $creator = $v->user()->first();
//        echo "Identifiant = $v->gallery_id, Nom  = $v->name, description =$v->description, propriétaire= $creator->fullname \n <br>" ;
//     }  