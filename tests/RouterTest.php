<?php

require_once 'vendor/autoload.php';

use \iutnc\mf\router\Router;

class DummyCtrl
{
  public function execute()
  {
    echo "it's me dummy !";
  }
}

class RouterTest extends \PHPUnit\Framework\TestCase
{

  public function __construct()
  {
    parent::__construct();
    $this->makeFakeData();
  }


  private function makeFakeData()
  {
    // constructs a fake SERVER variable.
    // URL = http://localhost/tweeter/test.php/stuff/morestuff/?id=15

    $_SERVER['SCRIPT_NAME'] = '/tweeter/test.php';
    $_SERVER['REQUEST_METHOD'] = 'GET';
    $_GET['id'] = '15';
    $_POST['text'] = 'Un texte.';
  }

  public function testSubclass()
  {
    $this->assertTrue(
      is_subclass_of('\iutnc\mf\router\Router', '\iutnc\mf\router\AbstractRouter'),
      "FEEDBACK : La class Router doit concrétiser AbstractRouter"
    );
  }

  private function getPrivateProperty($className, $propertyName)
  {
    $reflector = new ReflectionClass($className);
    $property = $reflector->getProperty($propertyName);
    $property->setAccessible(true);

    return $property;
  }

  public function testAddRoute()
  {
    $name   = "dummy_name";
    $action = "dummy_action";
    $ctrl   = "\dummy\app\control\Controller";
    $levl   = 5;

    $r = new Router();
    $r->addRoute($name, $action, $ctrl, $levl);

    $routes = $this->getPrivateProperty('\iutnc\mf\router\Router', 'routes')->getValue($r);
    $aliases = $this->getPrivateProperty('\iutnc\mf\router\Router', 'aliases')->getValue($r);

    $this->assertTrue(
      array_key_exists($action, $routes),
      "FEEDBACK : le tableau self::\$routes doit avoir les URL comme clé"
    );

    $this->assertTrue(
      $routes[$action][0] === $ctrl,
      "FEEDBACK : les valeurs de self::\$routes doivent etre des tableau a 2 cases. La première contien le nom des class controlleur et la seconde le niveau d'accès. La premiere est mal renseignée"
    );

    $this->assertTrue(
      $routes[$action][1] === $levl,
      "FEEDBACK : les valeurs de self::\$routes doivent etre des tableau a 2 cases. La première contien le nom des class controlleur et la seconde le niveau d'accès. La second est mal renseignée"
    );

    $this->assertTrue(
      array_key_exists($name, $aliases),
      "FEEDBACK : le tableau self::\$alises doit avoir les noms des routes comme clé"
    );

    $this->assertTrue(
      $aliases[$name] === $action,
      "FEEDBACK : le tableau self::\$alises doit associer les nom a l'action."
    );
  }

  public function testSetDefaultRoute()
  {
    $name   = "dummy_name";
    $action = "dummy_path";
    $ctrl   = "\dummy\app\control\Controller";
    $levl   = 5;

    $r = new Router();
    $r->addRoute($name, $action, $ctrl, $levl);

    $r->setDefaultRoute($action);

    $aliases = $this->getPrivateProperty('\iutnc\mf\router\Router', 'aliases')->getValue($r);
    $this->assertTrue(
      array_key_exists('default', $aliases),
      "FEEDBACK : la route par défaut doit être enregistrée sous la clé 'default' dans tableau self::\$aliases"
    );
    $this->assertTrue(
      $aliases['default'] === $action,
      "FEEDBACK : le tableau self::\$alises doit associer la clé 'default' à l'action de la route par défaut"
    );
  }


  public function testRun()
  {

    $name   = "dummy_name";
    $action = "dummy_path";
    $ctrl   = "DummyCtrl";
    $levl   = 5;

    $r = new Router();
    $r->addRoute($name, $action, $ctrl, $levl);

    $expected = "it's me dummy !";
    $_GET['action'] = $action;

    $r->run();

    $this->expectOutputString($expected, "FEEDBACK : la méthode run doit exécuter le méthode du contrôleur de la route demandée dans le parametre action.\nE.g. : si url = \"http://localhost/Tweeter/main.php?action=list_tweets/\",  run doit exécuter la methode execute sur une instance de HomeController.");
  }


  public function testExecuteRoute()
  {

    $name   = "dummy_name";
    $action = "dummy_path";
    $ctrl   = "DummyCtrl";
    $levl   = 5;

    $r = new Router();
    $r->addRoute($name, $action, $ctrl);

    $expected = "it's me dummy !";

    Router::executeRoute('dummy_name');

    $this->expectOutputString($expected, "FEEDBACK : la méthode executeRoute doit exécuter la route depuis son nom. \nE.g. : Router::executeRoute('user') doit exécuté la methode execute sur une instance de UserController.");
  }

  public function testUrlFor()
  {

    $name   = "dummy_name";
    $action = "dummy_path";
    $ctrl   = "\dummy\app\control\Controller";
    $levl   = 5;

    $r = new Router();
    $r->addRoute($name, $action, $ctrl);

    $expected = $_SERVER['SCRIPT_NAME'] . "?action=" . $action;

    $this->assertEquals(
      $r->urlFor($name),
      $expected,
      "FEEDBACK : La méthode urlFor doit retourner l'url complète de la route nommée.\nE.g. : urlFor('home') retourne \"/Tweeter/main.php?action=list_tweets\""
    );


    $expected .= "&amp;id=12&amp;user=john";

    $this->assertEquals(
      $r->urlFor($name, [['id',  12], ['user', 'john']]),
      $expected,
      "FEEDBACK : La méthode urlFor doit retourner l'url complète de la route nommée.\nE.g. : urlFor('view', [ ['id', 12] ]) retourne \"/Tweeter/main.php?action=view_tweet&amp;id=12\""
    );
  }
}
