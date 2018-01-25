<?php

class Repeater extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('repeater/js/default.js');
        $this->view->css = array('repeater/css/default.css');
    }

    public function index() {   
            $this->view->title = 'Repeater';
            $this->view->repeaterList = $this->model->repeaterList();
            $this->view->txLocations = $this->model->txLocations();
            if (isset($txLocation)) {
                $this->view->avgLevel = $this->model->avgLevel($txLocation);
            }
            $this->view->render('repeater/index'); //sending paramiters to View() at lib/view.php
        
    }

    public function create() {
        $data = array(
            'serviceNumber' => $_SESSION['serviceNumber'],
            'date' => $_POST['date'],
            'txLocation' => htmlspecialchars(ucwords($_POST['txLocation'])),
            'rxLocation' => htmlspecialchars(ucwords($_POST['rxLocation'])),
            'rxFrequency' => $_POST['rxFrequency'],
            'maxLevel' => $_POST['maxLevel'],
            'minLevel' => $_POST['minLevel'],
            'remarks' => htmlspecialchars($_POST['remarks']));
        $message = $this->model->create($data);
        if (isset($message['success']) && $message['success']) {
            header('location: ' . URL . 'repeater?success');
        } else {
            header('location: ' . URL . 'repeater?error');
        }
    }

    public function edit($repeaterId) {
        $this->view->title = 'Edit Microwave Repeating';
        $message = $this->model->repeaterSingleList($repeaterId);
        if (isset($message['noAccess']) && $message['noAccess']) {
            header('location: ' . URL . 'repeater?noAccess');
        } else {
            $this->view->repeaterList = $this->model->repeaterList();
            $this->view->repeater = $this->model->repeaterSingleList($repeaterId);
            $this->view->render('repeater/edit');
        }
    }

    public function ajaxAvgLevel() {
        if (isset($_POST['txLocation'])) {
            $txLocation = htmlspecialchars($_POST['txLocation']);
            $this->model->ajaxAvgLevel($txLocation);
        } else {
            return FALSE;
        }
    }

    public function editSave($repeaterId) {
        $data = array(
            'repeaterId' => $repeaterId,
            'serviceNumber' => $_SESSION['serviceNumber'],
            'date' => $_POST['date'],
            'txLocation' => htmlspecialchars($_POST['txLocation']),
            'rxLocation' => htmlspecialchars($_POST['rxLocation']),
            'rxFrequency' => $_POST['rxFrequency'],
            'maxLevel' => $_POST['maxLevel'],
            'minLevel' => $_POST['minLevel'],
            'remarks' => htmlspecialchars($_POST['remarks']));
        $message = $this->model->editSave($data);
        if (isset($message['success']) && $message['success']) {
            header('location: ' . URL . 'repeater?success');
        }
        if (isset($message['error']) && $message['error']) {
            header('location: ' . URL . 'repeater?error');
        }
    }

    public function delete($repeaterId) {
        $message = $this->model->delete($repeaterId);
        if (isset($message['success']) && $message['success']) {
            header('location: ' . URL . 'repeater?success');
        }
        if (isset($message['noAccess']) && $message['noAccess']) {
            header('location: ' . URL . 'repeater?noAccess');
        }
        if (isset($message['error']) && $message['error']) {
            header('location: ' . URL . 'repeater?noAccess');
        }
    }

}

