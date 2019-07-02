<?php
namespace Web\FrontController\Core;

use Web\FrontController\Core\Repository;

// родительский класс для всех классов - репозиториев
class MainRepository implements Repository
{
    // методы (общие для всех репозиториев) на
    // добавление записи в таблицу
    // получение записи по первичному ключу и таблицы
    // получение всех записей из таблицы
    // удаление записи из таблице
    // обновление записи в таблице
    // Остальные методы будут индивидуальны для каждого класса - репозитория, например, поиск по названию, дате, join запросы и тд


    protected $db;
    private $class;

    public function __construct($class)
    {
        $this->db = DB::getDB(); // объект класса DB для работы с базой данных
        $this->class = $class; // имя класса - сущности, с которым работает рапозиторий (имя должно соответствовать таблицу в бд)
    }

    public function getAll()
    {
        // Например, имя класса ($this->class) Web\FrontController\Models\Picture, значит, мы работаем с таблицей Picture
        // формируем строку запроса. basename вернет Picture из полного имени класса
        $sql = 'SELECT * FROM ' . basename(str_replace('\\', '/', $this->class));
        // вызываем метод getAll() у объекта класса DB, передаем строку запроса и имя класса (см. метод getAll в классе DB)
        // и возвращаем полученный результат
        return $this->db->getAll($sql, $this->class);
    }

    public function getById(int $id)
    {
        // вызываем метод getAll() у объекта класса DB, передаем строку запроса, массив с параметрами и имя класса (см. метод paramsGetOne в классе DB)
        // и возвращаем полученный результат
        $sql = 'SELECT * FROM ' . basename(str_replace('\\', '/', $this->class)) . ' WHERE id=:id';
        return $this->db->paramsGetOne($sql, ['id'=>$id], $this->class);

//        public_html -> css -> Front.css
//        public_html -> js -> Admin.js
    }
}