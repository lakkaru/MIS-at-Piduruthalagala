<?php

Session::init();

class Login extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('login/js/default.js');
    }

    function index() {
        $this->view->title = 'Login';
        $this->view->render('login/index'); //sending paramiters to View() at lib/view.php
    }

    function run() {
        $this->model->run();//check login parameters
    }

    function logout() {
        Session::destroy();
        header('location:../index');
        exit;
    }

}
