<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 01/11/2017
 * Time: 12:47
 */

namespace ToolDataBase;


trait Model
{
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
     * @param $value
     * @param $order
     * @return $this
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
}