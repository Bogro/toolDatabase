<?php


namespace ToolDataBase;


trait RelationModel
{


    /**
     * @param $table
     * @param array $column
     * @return $this
     * @throws ExceptionDataBase
     */
    public function relationOneAsMany($table, $column = []){

        if (is_array($this->relation)) {

            if (!in_array($table, $this->relation)){
                throw new ExceptionDataBase('Value is not exist');
            }

            if (empty($column)){
                $this->statement .= 'SELECT * FROM ' . $this->table . ' , ' . $table;
                return $this;
            }
            else {
                $column = $this->column($column);
                $this->statement .= 'SELECT ' . $column . ' FROM ' . $this->table . ' , ' . $table;
                return $this;
            }

        }

        if ($this->relation === $table){

            if (empty($column)){
                $this->statement .= 'SELECT * FROM ' . $this->table . ' , ' . $table;
                return $this;
            }
            else {

                $column = $this->column($column);
                $this->statement .= 'SELECT ' . $column . ' FROM ' . $this->table . ' , ' . $table;
                return $this;

            }
        }

        throw new ExceptionDataBase('Errors 20012: violation');

    }

    /**
     * @param Table $table
     */
    public function relationManyAsOne(Table $table){

    }

    /**
     * @param Table $table
     * @param Table $tablePoint
     */
    public function relationManyToMany(Table $table, Table $tablePoint){

    }

}