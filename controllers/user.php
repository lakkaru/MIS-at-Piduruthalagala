<?php

$dbResult = NULL;

class User extends Controller {

    public function __construct() {
        parent::__construct();
        $this->view->css = array('user/css/default.css');
        $this->view->js = array('user/js/default.js');
    }

    public function index() {
        Auth::handleAdmin();
        $this->view->title = 'Users';
        $this->view->userList = $this->model->userList();
        $this->view->render('user/index'); //sending paramiters to View() at lib/view.php
    }

    public function checkCode() {
        Auth::handleAdmin();
        $this->model->checkUser($_POST['code']); //for serching code letter assignment
    }

    public function create() {//creating new user
        Auth::handleAdmin();
        $data = array();
        $data['name'] = trim($_POST['name']);
        $data['serviceNumber'] = $_POST['serviceNumber'];
        $data['password'] = $_POST['serviceNumber'];
        $data['code'] = $_POST['code'];
        $data['email'] = htmlspecialchars($_POST['email']);
        $data['mobile'] = $_POST['mobile'];
        $data['role'] = $_POST['role'];
        $message = $this->model->create($data);
        if (isset($message['success']) && $message['success']) {
            header('location: ' . URL . 'user?success');
        }
    }

    public function edit($serviceNumber) {//editing users
        Auth::handleAdmin();
        $this->view->title = 'Edit User';
        $message = $this->view->user = $this->model->userSingleList($serviceNumber);
        if (isset($message['noAccess']) && $message['noAccess']) {
            header('location: ' . URL . 'user?noAccess');
        } else {
            $this->view->userList = $this->model->userList();
            $this->view->user = $this->model->userSingleList($serviceNumber);
            $this->view->render('user/edit');
        }
    }

    public function reset($serviceNumber) {//resetting password to service numer
        Auth::handleAdmin();
        $message = $this->model->resetPassword($serviceNumber);
        if (isset($message['success']) && $message['success']) {
            header('location: ' . URL . 'user?success');
        } else {
            header('location: ' . URL . 'user');
        }
    }

    public function accountEdit($serviceNumber) {//editing current user
        Auth::handleLogin();
        $this->view->title = 'Edit User Account';
        $message = $this->view->user = $this->model->userSingleList($serviceNumber);
        if (isset($message['noAccess']) && $message['noAccess']) {
            header('location: ' . URL . 'user?noAccess');
        } else {
            $this->view->user = $this->model->userSingleList($serviceNumber);
            $this->view->render('user/accountEdit');
        }
    }

    public function editSave($serviceNumber) {//saving edited user
        Auth::handleAdmin();
        $data = array();
        $data['name'] = htmlspecialchars($_POST['name']);
        $data['serviceNumber'] = $serviceNumber;
        $data['password'] = $serviceNumber;
        $data['code'] = $_POST['code'];
        $data['email'] = htmlspecialchars($_POST['email']);
        $data['mobile'] = $_POST['mobile'];
        $data['role'] = $_POST['role'];
        $message = $this->model->editSave($data);
        if (isset($message['success']) && $message['success']) {
            header('location: ' . URL . 'user?success');
        } else {
            header('location: ' . URL . 'user');
        }
    }

    public function accountEditSave($serviceNumber) {//saving edites current user
        Auth::handleLogin();
        $data = array();
        $data['serviceNumber'] = $serviceNumber;
        $data['password'] = ($_POST['newPassword']);
        $data['email'] = htmlspecialchars($_POST['email']);
        $data['mobile'] = $_POST['mobile'];
        $message = $this->model->accountEditSave($data);
        if (isset($message['success']) && $message['success']) {
            header('location: ' . URL . 'index?success');
        }
    }

    public function delete($serviceNumber) {//deleting a user
        Auth::handleAdmin();
        $message = $this->model->delete($serviceNumber);
        if (isset($message['success']) && $message['success']) {
            header('location: ' . URL . 'user?success');
        }
        if (isset($message['noAccess']) && $message['noAccess']) {
            header('location: ' . URL . 'user?noAccess');
        }
    }

}
