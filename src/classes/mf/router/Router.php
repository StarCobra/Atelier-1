<?php

namespace iutnc\mf\router;

use iutnc\mf\router\AbstractRouter;
use iutnc\tweeterapp\auth\TweeterAuthentification;
use iutnc\mediaphotoapp\auth\mediaphotoAuthentification;

class Router extends AbstractRouter
{

  static array $routes = [];
  static array $aliases = [];


  function addRoute(string $name, string $action, string $ctrl, int $accesLevel): void
  {
    /* 
     * Méthode addRoute : ajoute une route a la liste des routes 
     *
     * Paramètres :
     * 
     * - $name  : un nom pour la route
     * - $action: la valeur du prametre action du query string
     * - $ctrl  : le nom de la classe du Contrôleur 
     * 
     * Algorithme :
     *
     * - Ajouter $ctrl au tableau self::$routes sous la clé $action
     * - Ajouter $action au tableau self::$aliases sous la clé $name
     *
     */

    self::$routes["${action}"] = [$ctrl, $accesLevel];
    self::$aliases["$name"] = $action;
    // array_push(self::$routes[$action],$ctrl);
    // array_push(self::$aliases[$name],$action);
  }


  function setDefaultRoute(string $action): void
  {

    /*
     * Méthode setDefaultRoute : fixe la route par défault
     * 
     * Paramètres :
     * 
     * - $action : la valeur du prametre action du query string
     *             pour la route par default 
     *
     * Algorthme:
     *  
     * - ajoute $action au tableau self::$aliases sous la clé 'default'
     *
     */
    self::$aliases['default'] = $action;
  }

  /**
   */
  function run(): void
  {
    /*
     * Méthode run : exécuter une route en fonction de la requête 
     *    (l'action est récupérée depuis l'attribut $this->request)
     *
     * Algorithme :
     * 
     * - si le query string ne contient pas le paramètre action
     *    - exécuter la route par défaut
     * - sinon
     *    - Récupérer la valeur de action
     *    - si une route existe dans $self::routes sous cette cette clé.
     *        - exécuter cette route
     *    - sinon exécuter la route par defaut
     * 
     * Note : exécuter une route revient a instancier le contrôleur
     *        de la route et exécuter sa méthode execute
     */
    $defaut_action = self::$aliases['default'];
   if($this->request->get['action'] !== null){
    $action = $this->request->get['action'];
   } else{
    $action = $defaut_action;
   }
 
    
      if ((mediaphotoAuthentification::checkAccessRight(self::$routes["$action"][1]))) {

    if (!isset($this->request->get['action'])) {
      $ctrl = self::$routes["$defaut_action"];
      $home = new $ctrl[0];
      $home->execute();
    } else {
      if (isset(self::$routes["$action"])) {
        $home1 = new self::$routes["$action"][0];
        $home1->execute();
      } else {
        $ctrl2 = self::$routes["$defaut_action"][0];
        $home2 = new $ctrl2;
        $home2->execute();
      }
    }
    }
    else {
      $ctrl3 = self::$routes["$defaut_action"];
      $home3 = new $ctrl3[0];
      $home3->execute();
    }
  }
  public static function executeRoute(string $routeAlias): void
  {
    $ctrl = self::$routes[$routeAlias];
   
    $home = new $ctrl[0];
    $home->execute();
  }


  /**
   *
   * @param string $name
   * @param array $params
   *
   * @return string
   */

  /**
   */

  /**
   *
   * @param string $name
   * @param array $params
   *
   * @return string
   */
  function urlFor(string $name, array $params = array()): string
  {
    /*
     * Méthode urlFor : retourne l'URL d'une route depuis son alias
     * cette méthode est utile pour écrire les lien HTML et les action
     * des formulaire. Elle permet de générer la valeur href ppour les
     * balise <a href="...">lien</a> 
     * 
     * Paramètres :
     * 
     * - $name : alias de la route (clé du tableau self::$aliases) 
     * - $params (optionnel) : la liste des paramètres si l'URL
     *      prend des paramètres dans le querry string. Chaque paramètre
     *      est représenté sous la forme d'un tableau avec 2 entrées :
     *      le nom du paramètre et sa valeur  
     *
     * Algorthme:
     *
     * - Déduire l'action de la route demandée (dans self::$aliases)
     * - Construire depuis le nom du script et l'action 
     *   l'URL relatif (ex: "/le/chemin/../main.php?action=...")
     * - Si $params est fournit
     *      - Ajouter les paramètres du query string à l'URL complète
     *         (ex: "/le/chemin/../main.php?action=...&...=...&...=...")
     * - retourner l'URL
     *
     */
    $action = self::$aliases["$name"];
    $url = $this->request->script_name . "?action=" . $action;
    if (count($params) > 0) {
      foreach ($params as $value) {
        $url .= "&amp;$value[0]=$value[1]";
      }
    }

    return "$url";
  }
}
