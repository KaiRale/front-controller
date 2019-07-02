<?php
/**
 * Created by PhpStorm.
 * User: Kairale
 * Date: 02.07.2019
 * Time: 17:10
 */

namespace Web\FrontController\Models;


class Article
{
    private $id;
    private $title;
    private $text;
    private $paths = [];
    public function __construct($id, $title, $text, $paths)
    {
        $this->id = $id;
        $this->title = $title;
        $this->text = $text;
        $this->paths = $paths;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getDescription()
    {
        return $this->text;
    }
    public function getPaths()
    {
        return $this->paths;
    }
}