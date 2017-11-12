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

//require_once "Users.php";

$prod = new Demo\Users($db);

$test = $prod->where('id', '=', '1')->update(['name' => 'Rome BOGRO']);

DB::debug($test);