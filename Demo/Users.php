<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 30/10/2017
 * Time: 15:44
 */
namespace Demo;

use ToolDataBase\ModelData;
use ToolDataBase\RelationModel;

class Users extends ModelData
{
    use RelationModel;

    protected $statement;

    protected $table = "users";

    /*Les champs ou les actions peuvent se produit*/
    protected $inserte = ['name', 'age'];

    protected $value = ' ? , ? ';


}