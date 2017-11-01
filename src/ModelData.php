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
    use Model;
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
     * @param array $column
     * @return $this
     * @internal param $table
     */
    public function select($column = []){

        if (!empty($column)){

            $column = $this->column($column);

            $this->statement = 'SELECT ' . $column . ' FROM ' . $this->table . ' ' . $this->statement;

        } else {

            $this->statement = 'SELECT * FROM ' . $this->table . ' ' . $this->statement;

        }

        return $this->dataBase->queryAll($this->statement);
    }


    /**
     * @param array $column
     * @return mixed
     */
    public function count($column = []){

        if (!empty($column)){

            $column = $this->column($column);

            $this->statement = 'SELECT COUNT(' . $column . ') FROM ' . $this->table . ' ' . $this->statement;

        } else {

            $this->statement = 'SELECT COUNT(*) FROM ' . $this->table . ' ' . $this->statement;

        }

        return $this->dataBase->query($this->statement)[0];
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
            throw new ExceptionDataBase('You value is not array');
        }

        $this->statement = 'INSERT INTO ' . $this->table . ' (' . $this->inserte . ', creat_at) VALUES (' . $this->value . ', NOW())';

        return $this->dataBase->prepare($this->statement, $insert);

    }


    /**
     * @param array $update
     * @return mixed|void
     * @throws ExceptionDataBase
     */
    public function update(array $update){

        if (empty($update) OR !is_array($update)){
            throw new ExceptionDataBase('You value is not array');
        }

        $req = '';

        foreach ($update as $key => $value) {
            $req = $req . $key . ' = :' . $key . ',';
        }

        $this->statement = 'UPDATE ' . $this->table . ' SET ' . rtrim($req, ',') . ' ' . $this->statement . ' ';

        return $this->dataBase->prepare($this->statement, $update);
    }

    /**
     * @param $column
     * @param $operator
     * @param $value
     * @return $this
     */
    public function where($column, $operator, $value){

        $this->statement = $this->statement . ' WHERE ' . $column . ' ' . $operator . ' ' . $value;

        return $this;
    }





}