<?php

use iutnc\mediaphotoapp\model\Gallery;

require_once 'vendor/autoload.php';

use iutnc\mediaphotoapp\auth\mediaphotoAuthentification;

// Configure database connectivity
$config = parse_ini_file("conf/config.ini");

$db = new \Illuminate\Database\Capsule\Manager();

$db->addConnection($config);
$db->bootEloquent();
$db->setAsGlobal();

$router = new \iutnc\mf\router\Router();


$router->addRoute('user',           'view_userProfil',  '\iutnc\mediaphotoapp\control\userController',           mediaphotoAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('createGallery',  'view_create',      '\iutnc\mediaphotoapp\control\createGalleryController',  mediaphotoAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('home',           'list_galeriePub',  '\iutnc\mediaphotoapp\control\HomeController',           mediaphotoAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('galleryDetails', 'view_gallery',     '\iutnc\mediaphotoapp\control\GalleryController',        mediaphotoAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('connexion',      'view_connexion',   '\iutnc\mediaphotoapp\control\ConnexionController',      mediaphotoAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('deconnexion',    'view_deconnexion', '\iutnc\mediaphotoapp\control\DeconnexionController',    mediaphotoAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('inscription',    'view_inscription', '\iutnc\mediaphotoapp\control\InscriptionController',    mediaphotoAuthentification::ACCESS_LEVEL_NONE);

$router->setDefaultRoute('list_galeriePub');


$router->run();

// $u = Gallery::select();
// $lignes = $u->get();  
// foreach ($lignes as $v) {   
//     $creator = $v->user()->first();
//        echo "Identifiant = $v->gallery_id, Nom  = $v->name, description =$v->description, propriétaire= $creator->fullname \n <br>" ;
//     }  