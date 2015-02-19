<?php

class Controller {

    protected $db;

    public function getDb()
    {
        return new PDO('mysql:host=localhost;dbname=cheval_site', 'root', '');
    }

    protected function model($model)
    {
        require_once '../app/models/' . $model . '.php';

        return new $model($this->getDb());
    }

    protected function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }
}