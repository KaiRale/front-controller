<?php


namespace Web\FrontController\Models;


use Web\FrontController\Core\DB;
use Web\FrontController\Core\Repository;

class CartRepository implements Repository
{
    private $db;
    public function __construct()
    {
        $this->db=DB::getDB();
    }

    public function getAll()
    {
        $sql='SELECT * FROM Basket ';
        return $this->db->getAll($sql);
    }

    public function getById(int $id)
    {
        $sql ='SELECT * FROM Basket WHERE user_id=:user_id';
        $params=['user_id'=>$id];
        return $this->db->paramsGetOne($sql,$params);
    }

    public function save($id)
    {
        $params=['user_id'=>$id];
        $sql = 'INSERT INTO Basket (user_id) VALUES (:user_id)';
        return $this->db->nonSelectQuery($sql, $params);
    }


}