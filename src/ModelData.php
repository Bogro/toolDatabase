<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 30/10/2017
 * Time: 12:02
 */

namespace ToolDataBase;


class ModelData
{
    /**
     * @var ToolDataBase
     */
    private $dataBase;

    private $statement;

    /**
     * ModelData constructor.
     * @param InterfaceToolDataBase|ToolDataBase $dataBase
     */
    public function __construct(InterfaceToolDataBase $dataBase)
    {
        $this->dataBase = $dataBase;
    }

    /**
     * @param $table
     * @return $this
     * @throws ExceptionDataBase
     */
    public function select($table){

        if (empty($table) OR !is_string($table)){
            throw new ExceptionDataBase('You value is not string');
        }

        $this->statement = 'SELECT * FROM ' . $table;

        return $this;
    }

    /**
     * @param $table
     * @return $this
     * @throws ExceptionDataBase
     */
    public function creat($table){

        if (empty($table) OR !is_string($table)){
            throw new ExceptionDataBase('You value is not string');
        }

        $this->statement = 'INSERT INTO ' . $table . ' (*) VALUES (-)';

        return $this;
    }

    /**
     * @param $column
     * @return $this
     * @throws ExceptionDataBase
     */
    public function column($column){

        if (empty($column) OR is_array($column)){
            throw new ExceptionDataBase('You value is not define');
        }

        $column = ' ' . $column . ' ';

        $this->statement = str_replace('*', $column, $this->statement);

        return $this->dataBase->queryAll($this->statement);
    }

    /**
     * @return array|mixed
     */
    public function execut(){

        return $this->dataBase->queryAll($this->statement);

    }

}