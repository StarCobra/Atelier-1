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

$router->addRoute('user','view_userProfil','\iutnc\mediaphotoapp\control\userController', mediaphotoAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('home','list_galeriePub','\iutnc\mediaphotoapp\control\HomeController', iutnc\mediaphotoapp\auth\mediaphotoAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('galleryDetails','view_gallery','\iutnc\mediaphotoapp\control\GalleryController', iutnc\mediaphotoapp\auth\mediaphotoAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('updateGallery','update_gallery','\iutnc\mediaphotoapp\control\UpdateGalleryController', mediaphotoAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('addPicture','add_picture_to_gallery','\iutnc\mediaphotoapp\control\AddPictureToGalleryController', mediaphotoAuthentification::ACCESS_LEVEL_NONE);


$router->setDefaultRoute('list_galeriePub');

$router->run();
