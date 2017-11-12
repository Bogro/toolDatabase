<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 11/11/2017
 * Time: 19:07
 */

namespace Demo;


use ToolDataBase\ModelData;

class Animal extends ModelData
{
    protected $statement;

    protected $table = "animal";

    /*Les champs ou les actions peuvent se produit*/
    protected $inserte = ['espece', 'sexe', 'date_naissance', 'nom', 'commentaires'];

    protected $value = ' ? , ?, ?, ?, ? ';

}