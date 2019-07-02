<?php

namespace Web\FrontController\Models;


use Web\FrontController\Core\DB;
use Web\FrontController\Core\Repository;
//этот класс будет отвечать за пользователей в базе
class UserRepository implements Repository
{
    private $db;
    public function __construct()
    {
        $this->db=DB::getDB();
    }

    public function getAll()
    {

    }

    public function getById(int $id)
    {

    }

    public function save($params)
    {
        $sql='INSERT INTO User (email, `name`,hash, phone, role) VALUES (:email, :username, :hash, :phone, :role)';
        return $this->db->insertInfoTable($sql,$params);
    }

    public function isAuth($post){
        $sql='SELECT * FROM User WHERE email=:email';
        $params=[
            'email'=>$post['email']
        ];
        $result=$this->db->paramsGetOne($sql,$params);
        //если по email запись не будет найдена то запрос выше вернет false
        if (!$result) return false;

        //если запись нашлась, то надо проверить совпадает ли пароль
        if (!password_verify($post['password'],$result['hash'])){
            return false;
        }
        session_start();
        $_SESSION['name']=$result['name'];
        $_SESSION['role']=$result['role'];
        $_SESSION['id']=$result['id'];
        return true;
    }
}