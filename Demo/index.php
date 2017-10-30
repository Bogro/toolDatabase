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

$prod = $db->queryAll('SELECT * FROM product');

DB::debug($prod);