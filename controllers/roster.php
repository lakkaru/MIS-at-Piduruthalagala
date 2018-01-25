<?php

class Roster extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->css = array('roster/css/default.css');
        $this->view->js = array('roster/js/default.js');
    }

    public function index() {
            $this->view->title = 'Roster';
            $this->view->userList = $this->model->userList();
            $this->view->render('roster/index'); //sending paramiters to View() at lib/view.php
    }

}
