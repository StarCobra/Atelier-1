<?php
namespace iutnc\mediaphotoapp\auth;

use iutnc\mediaphotoapp\model\User;
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
             $u->fullname = $fullname ;
             $u->username = $username;
             $u->password = $empreinte;
             $u->level = $level;
             $u->save();
         }
 
 }
 
 public static function login(string $username, string $password): void {
    
     $user = User::where('username','=',$username)->first();  
     
     if ($user === null) {
         throw new AuthentificationException("user not found !");
         
     }
     else {
         $psw = $user->password;
         $id = $user->user_id;
         $level = $user->level;
         self::checkPassword($password,$psw, $id, $level);
        
 
 }
 }
}