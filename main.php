<?php
session_start();

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






$router->addRoute('user',              'view_userProfil',       '\iutnc\mediaphotoapp\control\userController',                mediaphotoAuthentification::ACCESS_LEVEL_AUTHENTIFICATE_USER);
$router->addRoute('createGallery',     'view_create',           '\iutnc\mediaphotoapp\control\createGalleryController',       mediaphotoAuthentification::ACCESS_LEVEL_AUTHENTIFICATE_USER);
$router->addRoute('home',              'list_galeriePub',       '\iutnc\mediaphotoapp\control\HomeController',                mediaphotoAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('galleryDetails',    'view_gallery',          '\iutnc\mediaphotoapp\control\GalleryController',             mediaphotoAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('connexion',         'view_connexion',        '\iutnc\mediaphotoapp\control\ConnexionController',           mediaphotoAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('deconnexion',       'view_deconnexion',      '\iutnc\mediaphotoapp\control\DeconnexionController',         mediaphotoAuthentification::ACCESS_LEVEL_AUTHENTIFICATE_USER);
$router->addRoute('inscription',       'view_inscription',      '\iutnc\mediaphotoapp\control\InscriptionController',         mediaphotoAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('updateGallery',     'update_gallery',        '\iutnc\mediaphotoapp\control\UpdateGalleryController',       mediaphotoAuthentification::ACCESS_LEVEL_AUTHENTIFICATE_USER);
$router->addRoute('addPicture',        'add_picture_to_gallery','\iutnc\mediaphotoapp\control\AddPictureToGalleryController', mediaphotoAuthentification::ACCESS_LEVEL_AUTHENTIFICATE_USER);
$router->addRoute('updateTags',        'update_tags',           '\iutnc\mediaphotoapp\control\UpdateTagsController',          mediaphotoAuthentification::ACCESS_LEVEL_AUTHENTIFICATE_USER);
$router->addRoute('authentificateHome','list_galerie',          '\iutnc\mediaphotoapp\control\PrivateGalleriesController',    mediaphotoAuthentification::ACCESS_LEVEL_AUTHENTIFICATE_USER);
$router->addRoute('otherUser',              'view_otherUserProfil',       '\iutnc\mediaphotoapp\control\OtherUserController',                mediaphotoAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('userGalleryDetails',              'view_user_gallery',       '\iutnc\mediaphotoapp\control\UserGalleryController',                mediaphotoAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('deleteGallery',              'delete_gallery',       '\iutnc\mediaphotoapp\control\DeleteGalleryController',                mediaphotoAuthentification::ACCESS_LEVEL_AUTHENTIFICATE_USER);
$router->addRoute('pictureDetails',     'view_picture',           '\iutnc\mediaphotoapp\control\PictureController',             mediaphotoAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('updatePicture',      'update_picture',         '\iutnc\mediaphotoapp\control\UpdatePictureController',       mediaphotoAuthentification::ACCESS_LEVEL_NONE);
$router->addRoute('deletePicture',      'delete_picture',         '\iutnc\mediaphotoapp\control\DeletePictureController',       mediaphotoAuthentification::ACCESS_LEVEL_NONE);



\iutnc\mf\view\AbstractView::AddStyleSheet("./html/css/style.css");
$router->setDefaultRoute('list_galeriePub');
$router->run();
