<?php

class Home extends Controller
{
    public function index($user = null)
    {
       $userModel = $this->model('User');
       //$user->name = $name;


            $user = $userModel->get($user);

       // var_dump($user);
        //die();

       $this->view('templates/header');
       $this->view('home/index', [
           'user' => $user
       ]);
       $this->view('templates/footer');

    }

    public function cheval($user = null)
    {
        $userModel = $this->model('User');


        $user = $userModel->getCheval();


        $this->view('templates/header');
        $this->view('home/cheval', [
            'user' => $user
        ]);
        $this->view('templates/footer');

    }
}


