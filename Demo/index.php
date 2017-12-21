<?php

require_once "../vendor/autoload.php";

use ToolDataBase\DB;

$db_access = [
    'db_name' => 'test',//
    'db_pass' => '',
    'db_host' => 'localhost',
    'db_user' => 'root'
];


/*
 * Initialisation de la class ToolDataBase
 * Qui est class principal de connexion a la base de donner
 * Qui prent un tableau en paramètre qui contient les informations de la base de donnée
 * db_name
 * db_pass
 * db_host
 * db_user
 */
$db = new ToolDataBase\ToolDataBase($db_access);


/*
 * Initialisation du model user.
 * Tous les tables importante de la base de donnée doit être representer par une class.
 * Exemple de la class user.
 */
$user = new Demo\User($db);


/*
 * Ce code permet de retourner tous les users de la base de donnée
 * Il execute la requeste sql
 * SELECT * FROM users
 * $user->select()->get() donne le meme résultat
 */
$users = $user->getAll();

DB::debug($users);