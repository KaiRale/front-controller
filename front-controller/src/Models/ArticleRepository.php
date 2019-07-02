<?php
namespace Web\FrontController\Models;
use Web\FrontController\Core\DB;
use Web\FrontController\Core\Repository;
use Web\FrontController\Models\Article;
class ArticleRepository implements Repository
{
    private $db;
    public function __construct()
    {
        $this->db=DB::getDB();
    }
    public function getAll()
    {
        $sql='SELECT * FROM Article ';
        return $this->db->getAll($sql);
    }
    public function getById(int $id)
    {
        $sql ='SELECT * FROM Article WHERE idarticle=:id';
        $params=['id'=>$id];
        return $this->db->paramsGetOne($sql,$params);
    }
    public function save($params)
    {
        $sql = 'INSERT INTO Article
                (title, text, yearCreated)
                VALUES (:title, :text,:yearCreated)';
        return $this->db->nonSelectQuery($sql, $params);
    }
}