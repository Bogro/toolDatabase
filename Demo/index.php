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

$prod = new ModelData($db);

$test = $prod->select('product')->column('*');

DB::debug($test);