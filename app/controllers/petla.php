<?php


class Petla extends Controller {

    public function index($name = 'MIKE')
    {
        $user = $this->model('User');
        $user->name = $name;

        $food = ['Apple', 'Banana', 'Rye Bread'];

        $this->view('petla/index', [
            'name' => $user->name,
            'food' => $food]);


    }

}