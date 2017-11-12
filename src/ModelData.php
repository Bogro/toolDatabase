<?php


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

        return $this;
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
     * @param bool $date
     * @return $this
     * @throws ExceptionDataBase
     * @internal param $table
     */
    public function creat($insert  = [], $date = TRUE){

        if (!empty($table)){
            $this->table = $table;
        }

        if (empty($insert) OR !is_array($insert)){
            throw new ExceptionDataBase('You value is not array');
        }

        if ($date){
            $this->statement = 'INSERT INTO ' . $this->table . ' (' . $this->column($this->inserte) . ', creat_at) VALUES (' . $this->value . ', NOW())';
        } else {
            $this->statement = 'INSERT INTO ' . $this->table . ' (' . $this->column($this->inserte) . ') VALUES (' . $this->value . ')';
        }


        return $this->dataBase->prepare($this->statement, $insert);

    }


    /**
     * @param array $update
     * @param bool $date
     * @return mixed|void
     * @throws ExceptionDataBase
     */
    public function update(array $update, $date = TRUE){

        if (empty($update) OR !is_array($update)){
            throw new ExceptionDataBase('You value is not array');
        }

        if (!is_bool($date)){
            throw new ExceptionDataBase('You value is not bool');
        }

        $req = '';

        foreach ($update as $key => $value) {
            $req = $req . $key . ' = :' . $key . ',';
        }

        if ($date){

            $this->statement = 'UPDATE ' . $this->table . ' SET ' . rtrim($req, ',') . ', update_at = :update_at ' . $this->statement . ' ';

            $update = array_merge($update, ['update_at' => date("Y-m-d H:i:s")]);


        } else {
            $this->statement = 'UPDATE ' . $this->table . ' SET ' . rtrim($req, ',') . ' ' . $this->statement . ' ';
        }



        return $this->dataBase->prepare($this->statement, $update);
    }

    public function delete(){

        $this->statement = 'DELETE FROM ' . $this->table . ' ' . $this->statement;

        return $this->dataBase->prepare($this->statement);
    }



}