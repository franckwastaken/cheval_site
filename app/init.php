<?php

require_once 'core/App.php';
require_once 'core/Controller.php';
require_once 'models/DB.php';

define('ASSET_ROOT', 'http://' . $_SERVER['HTTP_HOST'] .
    str_replace(
        $_SERVER['DOCUMENT_ROOT'],
        '',
        str_replace('\\', '/', dirname(__DIR__) . '/public')
    )
);


require_once 'classes/Validate.php';


