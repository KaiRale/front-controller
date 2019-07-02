<?php
namespace Web\FrontController\Models;

class Picture
{
    private $id;
    private $title;
    private $description;
    private $paths = [];


    public function __construct($id, $title, $description, $paths)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
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
        return $this->description;
    }


    public function getPaths()
    {
        return $this->paths;
    }
}