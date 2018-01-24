<?php
session_start();
class Index extends Controller {
    function __construct() {
        parent::__construct();
        $this->view->js = array('index/js/default.js');
        $this->view->css = array('index/css/default.css');
 }

    function index() {//sending paramiters to View() at lib/view.php
        $this->view->title = 'Home';//title at header.php
        $this->view->render('index/index'); 
    }

}
