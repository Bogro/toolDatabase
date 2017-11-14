<?php

namespace ToolDataBase;


trait Model
{

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

    /**
     * @param $column
     * @return $this
     * @throws ExceptionDataBase
     */
    public function column(array $column){

        if (!is_array($column)){
            throw new ExceptionDataBase('You value is not define');
        }

        $list='';

        $b = 0;

        while ($b < sizeof($column)){
            $list = $list . '' . $column[$b] . ',';
            $b++;
        }

        return rtrim($list, ',');
    }

    /**
     * @param $column
     * @param $order
     * @return $this
     * @internal param $value
     */
    public function order($column , $order){
        $this->statement = $this->statement . ' ORDER BY ' . $column . ' ' . $order . ' ';
        return $this;
    }

    /**
     * @param $start
     * @param $end
     * @return $this
     */
    public function limit($start, $end){
        $this->statement = $this->statement . ' LIMIT ' . $start . ', ' . $end . ' ';
        return $this;
    }


    /**
     * @param $join
     * @param $value1
     * @param $operator
     * @param $value2
     * @return $this
     */
    public function join($join, $value1, $operator, $value2){

        $this->statement = $this->statement . 'INNER JOIN ' . $join . ' ON ' . $this->table . '.' . $value1 . ' ' . $operator . ' ' . $join . '.' . $value2 . ' ';

        return $this;
    }

    /**
     * @param $join
     * @param $value1
     * @param $operator
     * @param $value2
     * @return $this
     */
    public function leftJoin($join, $value1, $operator, $value2){
        $this->statement = $this->statement . 'LEFT JOIN ' . $join . ' ON ' . $this->table . '.' . $value1 . ' ' . $operator . ' ' . $join . '.' . $value2 . ' ';

        return $this;
    }

    /**
     * @param $join
     * @param $value1
     * @param $operator
     * @param $value2
     * @return $this
     */
    public function rightJoin($join, $value1, $operator, $value2){
        $this->statement = $this->statement . 'RIGHT JOIN ' . $join . ' ON ' . $this->table . '.' . $value1 . ' ' . $operator . ' ' . $join . '.' . $value2 . ' ';

        return $this;
    }


    public function find($value){
        
    }

    /**
     * @return mixed
     */
    public function get(){

        return $this->dataBase->query($this->statement);

    }

    /**
     * @return mixed
     */
    public function getAll(){

        return $this->dataBase->queryAll($this->statement);

    }
}