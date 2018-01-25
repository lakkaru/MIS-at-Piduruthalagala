<?php

class Diesel extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('diesel/js/default.js');
        $this->view->css = array('diesel/css/default.css');
    }

    public function index() {
//        echo 'Diesel inndex';
        $this->view->title = 'Diesel Supply';
        $this->view->dieselList = $this->model->dieselList();
        $this->view->dieselStock = $this->model->dieselStock(); //for tating current stock from model to send view
        $this->view->render('diesel/index'); //sending paramiters to View() at lib/view.php
    }

    public function currentStock($date) {
        $data = array(
            'serviceNumber' => $_SESSION['serviceNumber'],
            'amount' => 0,
            'date' => $date,
            'stock' => htmlspecialchars($_POST['stock']));
        $this->model->create($data);
        header('location: ' . URL . 'index');
    }

    public function create() {
        $data = array(
            'serviceNumber' => $_SESSION['serviceNumber'],
            'amount' => htmlspecialchars($_POST['amount']),
            'date' => $_POST['date'],
            'stock' => htmlspecialchars($_POST['stock']));
        $message = $this->model->create($data);
        if (isset($message['success']) && $message['success']) {
            header('location: ' . URL . 'diesel?success');
        } else {
            header('location: ' . URL . 'diesel?error');
        }
    }

    public function edit($dieselId) {
//        echo 'Edit diesel'; die;
        $this->view->title = 'Edit Diesel Supply';
        $message = $this->model->dieselSingleList($dieselId);
        if (isset($message['noAccess']) && $message['noAccess']) {
            header('location: ' . URL . 'diesel?noAccess');
        } else {
            $this->view->dieselList = $this->model->dieselList();
            $this->view->diesel = $this->model->dieselSingleList($dieselId);
            $this->view->render('diesel/edit');
        }
    }

    public function editSave($dieselId) {
        $data = array(
            'dieselId' => $dieselId,
            'date' => $_POST['date'],
            'amount' => htmlspecialchars($_POST['amount']),
            'stock' => htmlspecialchars($_POST['stock']),
            'serviceNumber' => $_SESSION['serviceNumber']);
        $message = $this->model->editSave($data);
        if (isset($message['success']) && $message['success']) {
            header('location: ' . URL . 'diesel?success');
        }
        if (isset($message['error']) && $message['error']) {
            header('location: ' . URL . 'diesel?error');
        }
        if (isset($message['error']) && $message['error']) {
            header('location: ' . URL . 'diesel?noAccess');
        }
    }

    public function delete($dieselId) {
        $message = $this->model->delete($dieselId);
//        print_r($message); die;
        if (isset($message['success']) && $message['success']) {
            header('location: ' . URL . 'diesel?success');
        }
        if (isset($message['noAccess']) && $message['noAccess']) {
            header('location: ' . URL . 'diesel?noAccess');
        }
        if (isset($message['error']) && $message['error']) {
            header('location: ' . URL . 'diesel?error');
        }
    }

}
