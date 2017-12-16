<?php

require_once "../vendor/autoload.php";

use ToolDataBase\DB;

$db_access = [
    'db_name' => 'test',
    'db_pass' => '',
    'db_host' => 'localhost',
    'db_user' => 'root'
];

$db = new ToolDataBase\ToolDataBase($db_access);

$user = new Demo\User($db);

$users = $user->relationOneAsMany('animal', ['users.name', 'animal.nom'])->where('users.id', '=', '5')->get();

DB::debug($users);