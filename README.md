Tools Database
==============

Un outil PHP léger, simple, et orienté objet.

A propos
--------

"Tools database" est un outil développé pour apporter une aide aux développeurs.
Il est léger, simple, facile à comprendre, et orienté objet. Cet outil permette de connecter votre application `PHP` et votre base de données `MySQL`.
Avec ses differents méthodes vous n'êtes plus forcé d'écrire du code `MySQL` pour vos requêtes, `Tools Database` le ferra pour vous.


Caracteristique
---------------

- Supporte l'injection
- Utilise PDO
- Structure MVC
- Gestion complète des actions pour interagir avec la base de données

Prérequis / Exigences
---------------------

- PHP 5.3 minimun

Installation
------------
Pour installer exécuter dans votre CMD ou Terminal

`composer require bogro/tools-database`

Demo
----

La démo est dans le dossier `Demo/` . Dans l'optique de vous faire comprendre le fonctionnement de l'outil,
le dossier Demo/ a été créer.

Dans ce dossier il existe 4 fichiers.

- .htaccess
- Animal.php
- User.php
- Index.php

_.htaccess_

Permet de rédiriger toutes le url vers le fichier d'entrer qui est `index.php`

- Animal.php
- User.php

Ce sont des fichiers php qui contien une class conrrespond à une table dans la base de donnée.

Parcouront le fichier User.php.

```php
<?php

    namespace Demo;
    
    use ToolDataBase\Table; //Faire appel à la class table
    use ToolDataBase\ModelData; //Faire appel à la class MadelData
    /** 
    * Cette class herite de la class ModelData et implemente l'interface Table pour pouvoir avoir une flexibilité pour 
    * l'appel dans d'autre class.
    */
    class User extends ModelData implements Table
    {
    
        protected $statement; // Elle est indispancable pour le bon fonctionnement de la class
    
        protected $table = "users"; //Cette variable doit contenire le nom de la table conrespondante dans la base de donnée
    
        /*
        * Les champs ou les actions peuvent se produit
        * C'est a dire les champ ou il peut avoir insertion, lecture, modification
        */
        protected $inserte = ['name', 'age'];
    
        /*
        * Les valeur de c'est champs 
        * Il est important que les valeur par defaut soit des "?"
        */
        protected $value = ' ? , ? ';
        
        /**
        * Est la variable qui prend les table qui sont liée.
        * Elle peut être de type array.
        * S'il a plusieurs ou string si il l'en a une 
        **/
        protected $relation = 'animal'; 
    

}
```



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
Si le paramètre de `select()` n'est pas définir ou est null alors c'est toutes les colonnes qui sérrons selectionnées `*`.

Pour l'instant cet outil utilise `MySQL`
La prochaine version prandra en charge `MangoDB`.
