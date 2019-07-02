<?php


namespace Web\FrontController\Models;


use Web\FrontController\Core\DB;
use Web\FrontController\Core\Repository;

class OrderRepository implements Repository
{
    private $db;
    private $cartRepository;
    public function __construct()
    {
        $this->db=DB::getDB();
        $this->cartRepository=new CartRepository();
    }

    public function getAll()
    {

    }

    public function getById(int $id)
    {
        $idCart=$this->cartRepository->getById($id)['idbasket'];
        $params=['idCart'=>$idCart];
        $sql='SELECT * FROM Picture WHERE idpicture 
            IN (SELECT picture_idpicture FROM `Order` WHERE basket_idbasket=:idCart)';
        return $this->db->paramsGetAll($sql,$params);
    }

    public function save($params)
    {
        $sql = 'INSERT INTO  `Order` (basket_idbasket,picture_idpicture,status) 
        VALUES (:basket_idbasket, :picture_idpicture, :status)';
        return $this->db->nonSelectQuery($sql, $params);
    }

}