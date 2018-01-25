<?php

class Vehicle extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handleLogin(); //checking logged in
        Auth::handleAdmin(); //checking admin
        $this->view->js = array('vehicle/js/default.js');
        $this->view->css = array('vehicle/css/default.css');
    }

    public function index() {
        $this->view->title = 'Vehicle';
        $this->view->checkDutyChanges = $this->model->checkDutyChanges();
        $this->view->reservedList = $this->model->reservedList();
        $this->view->render('vehicle/index'); //sending paramiters to View() at lib/view.php 
    }

    public function create() {
//        echo 'Vehical Create'; die;
        $data = array(
            'reuqestedDate' => $_POST['reserve']);
        $this->model->create($data);
        header('location: ' . URL . 'vehicle');
    }

    public function cancel($amendedId) {
        $this->model->cancel($amendedId);
        header('location: ' . URL . 'vehicle');
    }

    public function checkDutyChanges() {
        $this->model->checkDutyChanges();
        header('location: ' . URL . 'vehicle');
    }

}

