<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 29/10/2017
 * Time: 21:11
 */

namespace ToolDataBase;

use \PDO;
use ToolDataBase\InterfaceToolDataBase;


class ToolDataBase implements InterfaceToolDataBase
{
    private  $db_name;
    private  $db_user;
    private  $db_pass;
    private  $db_host;
    private $pdo;

    /**
     * DataBase constructor.
     * @param $db_name
     * @param string $db_pass
     * @param string $db_host
     * @param string $db_user
     */
    public function __construct($db_name, $db_pass = '', $db_host = 'localhost', $db_user = 'root')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    /**
     * @return PDO
     */
    private function getPDO()
    {
        if ($this->pdo === NULL){
            $bdd = new PDO('mysql:host=' . $this->db_host . ';dbname=' . $this->db_name . '', $this->db_user, $this->db_pass);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $bdd;
        }

        return $this->pdo;
    }

    /**
     * @param $statement
     * @return mixed
     */
    public function query($statement){
        $req = $this->getPDO()->query($statement)->fetch();
        return $req;
    }

    /**
     * @param $statement
     * @return array
     */
    public function queryAll($statement){
        $req = $this->getPDO()->query($statement)->fetchAll();
        return $req;
    }

    /**
     * @param $statement
     * @param $attributes
     * @param bool $one
     * @return array|mixed
     */
    public function prepare($statement, $attributes, $one = true){

        $req = $this->getPDO()->prepare($statement);

        $req->execute($attributes);

        if($one){
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }

        return $datas;
    }

    /**
     * @param $statement
     * @param $attributes
     * @return mixed|void
     */
    public function insert($statement, $attributes){
        $req = $this->getPDO()->prepare($statement);
        $req->execute($attributes);
    }

    /**
     * @param $statement
     * @param $attributes
     * @return mixed|void
     */
    public function update($statement, $attributes){
        $req = $this->getPDO()->prepare($statement);
        $req->execute($attributes);
    }


    /**
     * @param $statement
     * @param $attributes
     * @return mixed|void
     */
    public function delete($statement, $attributes){

        $req = $this->getPDO()->prepare($statement);
        $req->execute($attributes);
    }
}