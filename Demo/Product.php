<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 30/10/2017
 * Time: 15:44
 */

use ToolDataBase\ModelData;

class Product extends ModelData
{
    protected $statement;

    protected $table = "users";

    protected $inserte = 'name, age';

    protected $value = ' ? , ? ';


}