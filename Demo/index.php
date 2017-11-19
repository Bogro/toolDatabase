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

$users = $user->replace('bogro', 'Christ', 'name');

DB::debug($users);