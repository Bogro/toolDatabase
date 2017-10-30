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

    protected $statement;

    protected $table;

    protected $inserte;

    protected $value;

    protected $data;

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
    public function select($table = ""){

        if (!empty($table)){
            $this->table = $table;
        }

        if (empty($this->table) OR !is_string($this->table)){
            throw new ExceptionDataBase('You value is not string');
        }

        $this->statement = 'SELECT * FROM ' . $this->table;

        return $this;
    }

    /**
     * @param array $insert
     * @return $this
     * @throws ExceptionDataBase
     * @internal param $table
     */
    public function creat($insert  = []){

        if (!empty($table)){
            $this->table = $table;
        }

        if (empty($insert) OR !is_array($insert)){
            throw new ExceptionDataBase('You value is not string');
        }

        $this->statement = 'INSERT INTO ' . $this->table . ' (' . $this->inserte . ') VALUES (' . $this->value . ')';
        //var_dump( $this->statement); die();
        return $this->dataBase->insert($this->statement, $insert);

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