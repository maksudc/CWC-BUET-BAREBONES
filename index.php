<?php

// Application base path
define('APPPATH', __DIR__);

// Include necessary path for class loading
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPPATH . '/lib'),
    realpath(APPPATH . '/lib/Sparrow'),
    realpath(APPPATH . '/includes'),
    realpath(APPPATH . '/controllers'),
    realpath(APPPATH . '/controllers/base'),
    realpath(APPPATH . '/models/base'),
    get_include_path(),
)));

// Load app engine
include_once 'App.php';

// Initiate engine and run!
App::init(APPPATH . '/config/app.ini');

// Initiate engine and run!
App::run();
//App::runMVC();
