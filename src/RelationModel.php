<?php


namespace ToolDataBase;


trait RelationModel
{

    /**
     * @param Table $table
     */
    public function relationOneAsMany(Table $table){
        echo '<pre>' . print_r($table, true) . '</pre>';
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