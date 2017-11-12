<?php

namespace ToolDataBase;


interface InterfaceToolDataBase
{
    /**
     * @param $statement
     * @return mixed
     */
    public function query($statement);

    /**
     * @param $statement
     * @return mixed
     */
    public function queryAll($statement);

    /**
     * @param $statement
     * @param $attributes
     * @param bool $one
     * @return mixed
     */
    public function insert($statement, $attributes, $one = true);

    /**
     * @param $statement
     * @param $attributes
     * @return mixed
     */
    public function prepare($statement, $attributes);

}