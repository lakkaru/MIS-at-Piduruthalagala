<?php

class Mtce extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('mtce/js/default.js');
        $this->view->css = array('mtce/css/default.css');
    }

    /**
     * getting all past mtces from database
     */
    public function index() {
        
            $this->view->title = 'Maintenance Schedule';
            $this->view->mtceList = $this->model->mtceList();
            $this->view->render('mtce/index'); //sending paramiters to View() at lib/view.php
    }

    public function create() {
        $data = array(
            'equipment' => $_SESSION['equipment'],
            'serviceNumber' => $_SESSION['serviceNumber'],
            'nextDate' => $_POST['nextDate'],
            'description' => htmlspecialchars($_POST['description']));
        $message = $this->model->create($data);
        if (isset($message['success']) && $message['success']) {
            header('location: ' . URL . 'event?success');
        } else {
            header('location: ' . URL . 'event?noAccess');
        }
    }

    public function edit($mtceId) {
        $this->view->title = 'Edit Next Maintenance';
        $message = $this->model->mtceSingleList($mtceId);
        if (isset($message['noAccess']) && $message['noAccess']) {
            header('location: ' . URL . 'mtce?noAccess');
        } else {
            $this->view->mtceList = $this->model->mtceList();
            $this->view->mtce = $this->model->mtceSingleList($mtceId);
            $this->view->render('mtce/edit');
        }
    }

    public function editSave($mtceId) {
        $data = array(
            'serviceNumber' => $_SESSION['serviceNumber'],
            'mtceId' => $mtceId,
            'nextDate' => $_POST['nextDate'],
            'description' => $_POST['description']);
        $message = $this->model->editSave($data);
        if (isset($message['success']) && $message['success']) {
            header('location: ' . URL . 'mtce?success');
        }
    }

    public function delete($mtceId) {
        $message = $this->model->delete($mtceId);
        if (isset($message['success']) && $message['success']) {
            header('location: ' . URL . 'mtce?success');
        }
        if (isset($message['noAccess']) && $message['noAccess']) {
            header('location: ' . URL . 'mtce?noAccess');
        }
    }

}