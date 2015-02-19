<?php

class Cheval extends Controller
{
    public function index($user = null)
    {
        $chevalModel = $this->model('Cheval');
        //$user->name = $name;


        $user = $chevalModel->get();


        // var_dump($user);
        //die();

        $this->view('templates/header');
        $this->view('Cheval/index', [
            'cheval' => $user
        ]);
        $this->view('templates/footer');

    }
}