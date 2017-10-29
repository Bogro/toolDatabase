<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 29/10/2017
 * Time: 21:59
 */

namespace ToolDataBase;


interface InterfaceToolDataBase
{
    public function query();

    public function queryAll();

    public function prepare();

    public function insert();

    public function update();

    public function delete();
}