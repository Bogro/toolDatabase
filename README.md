Tools Database
==============

Un outil PHP léger, simple, et orienté objet.

A propos
--------

"Tools database" est un outil développé pour apporter un aide aux développeurs.
Il est léger, simple, facile à comprendre, et orienté objet. Cet outil permette de connecter votre application php et votre base de donnée MySql.


Caracteristique
---------------

- Suporte injection
- Utilise PDO
- Structure MVC
- Gestion complet des actions pour interagie avec la base de donnée

Prérequis / Exigences
---------------------

- PHP 5.3 minimun

Installation
------------

Demo
----

La demo est dans le dossier `Demo/` . Dans l'optique de vous faire comprendre le fonctionnement de l'outile,
le dossier Demo/ a été créer.

Dans se dossier il existe 4 fichiers.

- .htaccess
- Animal.php
- User.php
- Index.php

_.htaccess_

Permet de rédiriger toutes le url vers le fichier d'entrer qui est `index.php`

_Animal.php / User.php_

C'est un fichier php qui conrrespond à une table dans la base de donnée.

_index.php_

C'est le fichier d'entrer de l'application demo.

Utilisation
-------------

Pour commencer, il faut faire appel au namaspace `ToolDataBase\`

Initialise la class `ToolDataBase\ToolDataBase`

```php
    $db = new ToolDataBase\ToolDataBase(['db_name' => 'nom', 'db_pass' => 'mot de passe', 'db_host' => 'adress', 'db_user' => 'utilisateur'];);
```

On injecte cette instance de base de donnée dans la class qui correspond à une table dans la base de donnée

```php
    $user = new User($db);
```

On peut maintenent faire des opérations SQL sur la class `User` avec des méthodes. 
```php
    $user->getAll();
```
Est equivaut à 
```php
    $user->select()->get();
```

Tous deux renvois le même resultat. il execute la requette 
```mysql
   SELECT * FROM users
```

La méthode `select()` prent en paramètre un `array` qui contient les colonnes sible
Si le paramètre de `select()` n'est pas définir ou est null est equale à un `*` c'est à dire toutes les colonnes sont selectionnées.
