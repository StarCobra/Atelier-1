<?php
namespace iutnc\mediaphotoapp\auth;

use iutnc\mediaphotoapp\model\User;
use iutnc\mf\auth\AbstractAuthentification;
use iutnc\mf\exceptions\AuthentificationException;
use iutnc\mediaphotoapp\view\ConnexionView;
use iutnc\mediaphotoapp\view\InscriptionView;

class mediaphotoAuthentification extends AbstractAuthentification
{  
    const ACCESS_LEVEL_USER = 1;
    const ACCESS_LEVEL_AUTHENTIFICATE_USER = 5;
 
    public static function register(string $username,
                                 string $password,
                                 string $fullname,
                                 string $mail,

                                 $level=self::ACCESS_LEVEL_AUTHENTIFICATE_USER): void {

 
 
         $user = User::where('username','=',$username)->first();  
 
         if ($user !== null) {
            $v = new InscriptionView();
            $v->makePage();
             
         }
         else {
             $empreinte = self::makePassword($password);
             $u = new User();
             $u->fullname = $fullname ;
             $u->username = $username;
             $u->password = $empreinte;
             $u->mail_address = $mail;
             $u->level = $level;
             $u->save();
         }
 
 }
 
 public static function login(string $username, string $password): void {
    
     $user = User::where('username','=',$username)->first();  
     
     if ($user === null) {
        $v = new ConnexionView();
        $v->makePage();
         
     }
     else {
         $psw = $user->password;
         $id = $user->user_id;
         $level = $user->level;
         self::checkPassword($password,$psw, $id, $level);
        
 
 }
 }
}