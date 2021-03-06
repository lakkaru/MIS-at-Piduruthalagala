<?php
session_start();
class Index extends Controller {
    function __construct() {
        parent::__construct();
        $this->view->js = array('index/js/default.js');
        $this->view->css = array('index/css/default.css');
 }

    function index() {//sending paramiters to View() at lib/view.php
       $this->view->title = 'Home';
        $this->view->fiveNotice = $this->model->fiveNotice();
        $this->view->fiveMtce = $this->model->fiveMtce();
        $this->view->pastMtce = $this->model->pastMtce();
        $this->view->endStock = $this->model->endStock();
        $this->view->approxStock = $this->model->approxStock();
        $this->view->dieselMsg = $this->model->dieselMsg;
        $this->view->render('index/index'); //sending paramiters to View() at lib/view.php
    }

}
