<?php

require_once "../vendor/autoload.php";

use ToolDataBase\DB;
use ToolDataBase\ModelData;

$db_access = [
    'db_name' => 'test',
    'db_pass' => '',
    'db_host' => 'localhost',
    'db_user' => 'root'
];

$db = new ToolDataBase\ToolDataBase($db_access);

require_once "Users.php";

$prod = new Users($db);

$test = $prod->creat(['bogro lobognon', '26']);

DB::debug($test);