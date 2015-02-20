<?php

class Controller {

    protected $db;

    private function getDb()
    {
        return $this->db = DB::getInstance();

    }

    protected function model()
    {
        return $this->getDb();
    }

    protected function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }
}