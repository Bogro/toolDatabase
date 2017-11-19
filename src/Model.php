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

        $this->statement .= ' WHERE ' . $column . ' ' . $operator . ' ' . $value;

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
        $this->statement .= ' ORDER BY ' . $column . ' ' . $order . ' ';
        return $this;
    }

    /**
     * @param $start
     * @param $end
     * @return $this
     */
    public function limit($start, $end){
        $this->statement .= ' LIMIT ' . $start . ', ' . $end . ' ';
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

        $this->statement .= 'INNER JOIN ' . $join . ' ON ' . $this->table . '.' . $value1 . ' ' . $operator . ' ' . $join . '.' . $value2 . ' ';

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
        $this->statement .= 'LEFT JOIN ' . $join . ' ON ' . $this->table . '.' . $value1 . ' ' . $operator . ' ' . $join . '.' . $value2 . ' ';

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
        $this->statement .= 'RIGHT JOIN ' . $join . ' ON ' . $this->table . '.' . $value1 . ' ' . $operator . ' ' . $join . '.' . $value2 . ' ';

        return $this;
    }


    /**
     * @param $colonne
     * @param $value
     * @return mixed
     */
    public function find($colonne, $value){

        $this->statement .= 'WHERE ' . $colonne . ' LIKE \'' . $value . '\'';

        if (empty($this->getAll())){
            return false;
        }

        return $this->getAll();
    }

    /**
     * @param $value
     * @return mixed
     */
    public function findId($value){

        if (!is_integer($value)){
            throw new ExceptionDataBase('You value is not integer');
        }

        $this->statement .= 'WHERE id LIKE \'' . $value . '\'';

        if (empty($this->getAll())){
            return false;
        }

        return $this->getAll();
    }


    /**
     * @param $colonne
     * @return mixed
     */
    public function isNull($colonne){

        $this->statement .= 'WHERE ' . $colonne . ' IS NULL ';

        return $this->getAll();
    }


    /**
     * @param $colonne
     * @return mixed
     */
    public function isNotNull($colonne){

        $this->statement .= 'WHERE ' . $colonne . ' IS NOT NULL ';

        return $this->getAll();
    }


    public function replace($value, $replace, $colonne){
        //var_dump($this->select()->find($colonne, $value)); die();
        if (!$this->select()->find($colonne, $value)){
            throw new ExceptionDataBase('You value is not exist');
        }

        $this->statement = 'UPDATE ' . $this->table . ' SET ' . $colonne . ' = REPLACE(' . $colonne . ', \'' . $value . '\', \'' . $replace . '\') WHERE ' . $colonne . ' LIKE \'%' . $value . '%\' ';
        #return $this->statement;
        return $this->dataBase->prepare($this->statement);
    }


}