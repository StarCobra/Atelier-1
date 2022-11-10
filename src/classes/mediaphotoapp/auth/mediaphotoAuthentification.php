<?php
namespace iutnc\mediaphotoapp\auth;

use iutnc\mf\auth\AbstractAuthentification;
use iutnc\mf\exceptions\AuthentificationException;

class mediaphotoAuthentification extends AbstractAuthentification
{  
    const ACCESS_LEVEL_USER = 1;
    const ACCESS_LEVEL_AUTHENTIFICATE_USER = 5;
 
    public static function register(string $username,
                                 string $password,
                                 string $fullname,
                                 $level=self::ACCESS_LEVEL_USER): void {
 
 
         $user = User::where('username','=',$username)->first();  
 
         if ($user !== null) {
             throw new AuthentificationException("user already exists !");
             
         }
         else {
             $empreinte = self::makePassword($password);
             $u = new User();
             $u->fullname =$fullname ;
             $u->username =$username;
             $u->password =$empreinte;
             $u->mail_address =  $level;
             $u->save();
         }
 
 }
 
 public static function login(string $username, string $password): void {
     // session_start();
     /* La méthode login
      *
      *     Permet de connecter un utilisateur qui a fourni son nom d'utilisateur
      *     et son mot de passe (depuis un formulaire de connexion)
      *
      * Paramètres :
      *
      *    $username : le nom d'utilisateur
      *    $password : le mot de passe tapé sur le formulaire
      *
      * Algorithme :
      *
      *    - Récupérer l'utilisateur avec l'identifiant $username depuis la BD
      *    - Si aucun de trouvé
      *         - soulever une exception
      *    - Sinon
      *         - réaliser l'authentification et le chargement du profil
      *            ATTENTION : utiliser self::checkPassword (cf. ``AbstractAuthentification``)
      *
      */
     $user = User::where('username','=',$username)->first();  
     
     if ($user === null) {
         throw new AuthentificationException("user not found !");
         
     }
     else {
         $psw = $user->password;
         $id = $user->id;
         $level = $user->level;
         self::checkPassword($password,$psw, $id, $level);
         self::loadProfile ($id,$level);
 
 }
 }
}