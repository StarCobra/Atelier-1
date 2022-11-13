<?php

namespace iutnc\mf\auth;

use Exception;
use iutnc\main;
use \iutnc\mf\exceptions as E;
use iutnc\mf\exceptions\AuthentificationException;

abstract class AbstractAuthentification
{

    /* une constante pour le niveau le plus bas */
    const ACCESS_LEVEL_NONE = -9999;

    /* la taill minimum des mot de pass */
    const MIN_PASSWORD_LENGTH = 6;

    protected static function loadProfile(int $id, int $level): void
    {


        /* 
         * La méthode loadProfile : 
         *
         * Méthode pour enregistrer le profile de utilisateur en session 
         *
         * ATTENTION : cette méthode est appelée uniquement quand la connexion 
         *             réussie par la méthode login (cf. plus bas)
         *
         * Paramètre :
         *    $id : id de l'utilisateur
         *    $level : son niveau d'accès
         * 
         */

        $_SESSION['user_profile']['id'] = $id;
        $_SESSION['user_profile']['access_level'] = $level;
        // echo $_SESSION['user_profile']['id'];
        // echo $_SESSION['user_profile']['access_level'];
    }



    public static function logout(): void
    {

        /* 
         * la méthode logout :
         * 
         * Méthode pour effectuer la déconnexion, (effacement du 
         * profile de la session) 
         *
         */

        unset($_SESSION['user_profile']);
    }


    public static function connectedUser(): ?int
    {

        /* 
         * la méthode connectedUser :
         * 
         * Méthode pour rtourner l'ID de l'utilisateur connecté
         *
         */

        if (isset($_SESSION['user_profile']['id']))
            return $_SESSION['user_profile']['id'];
        return null;
    }


    public static function checkAccessRight(int $requested): bool
    {

        /* 
         * La méthode checkAccessRight:
         * 
         * Méthode pour verifier le niveau d'accès de l'utilisateur.
         * Elle est à utiliser avant chaque accès à une fonctionnalité
         *
         * Paramètres:
         *
         *    $requested, le niveau requis pour la fonctionnalité
         *
         * Retourne
         *    vrai si le niveaux requis est inférieur ou égale à la 
         *    valeur du niveau de l'utilisateur (stocké en profil)
         * 
         * Algorithme :
         * 
         * S'il y a un profile en session
         *     Si $requested > le niveau du profil  
         *         Retourner faux
         *     Sinon 
         *         Retourner vrai
         * Sinon 
         *     Si $requested > self::ACCESS_LEVEL_NONE
         *         Retourner faux
         *     Sinon 
         *         Retourner vrai
         */
        if (isset($_SESSION['user_profile'])) {

            if ($requested > $_SESSION['user_profile']['access_level']) {
                return false;
            } else {
                return true;
            }
        } else {
            if ($requested > self::ACCESS_LEVEL_NONE) {
                return false;
            } else {
                return true;
            }
        }
    }


    protected static function makePassword(string $password): string
    {

        /* 
         * La méthode makePassword:
         * 
         * Méthode qui vérifie que le $password respecte la politque
         * de mots de pass. (une taille minimal au moins) 
         *
         * Paramètres : 
         * 
         *   $password : le mot de passe choisi par l'utilisateur
         *
         * Retourne : 
         *   le haché du mot de passe (a stoquer en BD)
         *
         * Algorithme :
         *    
         *   Si le mot de passe ne corespond pas la politiqe 
         *       Soulever une exception
         *   sinon le hacher et retourner son empreinte
         */

        if ($password < self::MIN_PASSWORD_LENGTH) {
            return new AuthentificationException();
        } else {
            $hach = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
            return $hach;
        }
    }


    protected static function checkPassword(
        string $given_pass,
        string $db_hash,
        int $id,
        int $level
    ): void {


        /* 
         * La méthode checkPassword:
         * 
         * Méthode qui réalise la connexion d'un utilisateur.
         *
         * Paramètres : 
         * 
         *   $given_pass : le mot de passe fourni par l'utilisateur 
         *   $db_hash : le haché du mot de passe stocké en BD
         *   $id : l'identifiant de l'utilisateur
         *   $level : son niveau d'accès
         * 
         * Algorithme :
         *    
         *   Si le mot de passe ne corespond pas au haché 
         *       Soulever une exception
         *   Sinon
         *       charger le profile 
         */

        if (!(password_verify($given_pass, $db_hash))) {
            throw new AuthentificationException("invalid Password !");
        } else {
            self::loadProfile ($id,$level);
        }
    }
}
