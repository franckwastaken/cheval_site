<?php

class Home extends Controller
{
    public function index()
    {

       $this->view('templates/header');
        $this->view('home/index');
       $this->view('templates/footer');

    }

    public function test()
    {
        $db = $this->model();
        $cheval = $db->get('cheval', array('nom', '=', 'chev' ));
       //var_dump($user);
       //die();

       // var_dump($user->results());
       // die();

        $chevalList  = array();
        $chevalList = $cheval->results();

        if(!$cheval->count())
        {
            echo 'no user';
        }
        else {

            foreach($cheval->results() as $chev)
            {
                echo "Controller HOME/test() cheval nom:  " . $chev->nom, '<br>' . " cheval ID : " .
                $chev->id_cheval . " end of controller";
            }

        }

        $this->view('templates/header');
        $this->view('home/test', [
            'chevalList' => $chevalList
        ]);
        $this->view('templates/footer');





    }
}


