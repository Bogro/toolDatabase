<?php

namespace Demo;

use ToolDataBase\Table;
use ToolDataBase\ModelData;
use ToolDataBase\RelationModel;

class User extends ModelData implements Table
{
    use RelationModel;

    protected $statement;

    protected $table = "users";

    /*Les champs ou les actions peuvent se produit*/
    protected $inserte = ['name', 'age'];

    protected $value = ' ? , ? ';

    protected $relation = 'Animal';


}