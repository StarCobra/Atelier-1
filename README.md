# Atelier n°1 (Media photo)
## JOMAA Akrem, POIROT Damien, SIX Léo, ZIDANE Waïl

Du 7 au 14 novembre 2022

## Spécifications techniques

Version requise de node : 16.17.1 ou plus

```
node -v
```

Version requise de PHP sur le serveur : 8.0 ou plus

```
php -v
```

## Récupérer le projet 

```
git clone git@github.com:StarCobra/Atelier-1.git
cd Atelier-1
composer update //ou composer install
```

## Installation

Dans phpMyAdmin, créer une base de données `media_photo` et importer le fichier `media_photo.sql` qui se situe dans le dossier `conf/`.

Créer le fichier `config.ini` dans le dossier `conf/` avec le contenu suivant : 

```
driver    = 'mysql'
host      = 'localhost:3306'
database  = 'media_photo'
username  = 'votreUsername'
password  = 'votreMotDePasse'
charset   = 'utf8'
collation = 'utf8_unicode_ci'
prefix    = ''
```
## Tester le site

http://localhost/Atelier-1/main.php

Selon votre configuration, l'URL peut changer.
