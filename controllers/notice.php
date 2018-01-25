<?php

class Notice extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('notice/js/default.js');
        $this->view->css = array('notice/css/default.css');
    }

    public function index() {
        $this->view->title = 'Staff Notice';
        $this->view->noticeList = $this->model->noticeList();
        $this->view->render('notice/index'); //sending paramiters to View() at lib/view.php
    }

    public function create() {
        $data = array(
            'serviceNumber' => $_SESSION['serviceNumber'],
            'description' => htmlspecialchars($_POST['description']),
            'date' => $_POST['date']);
        $message = $this->model->create($data);
        if (isset($message['success']) && $message['success']) {
            header('location: ' . URL . 'notice?success');
        } else {
            header('location: ' . URL . 'notice?error');
        }
    }

    public function edit($noticeId) {
        $this->view->title = 'Edit Notice';
        $message = $this->model->noticeSingleList($noticeId);
        if (isset($message['noAccess']) && $message['noAccess']) {
            header('location: ' . URL . 'notice?noAccess');
        } else {
            $this->view->noticeList = $this->model->noticeList();
            $this->view->notice = $this->model->noticeSingleList($noticeId);
            $this->view->render('notice/edit');
        }
    }

    public function editSave($noticeId) {
        $data = array(
            'date' => $_POST['date'],
            'description' => htmlspecialchars($_POST['description']),
            'noticeId' => $noticeId,);
        $message = $this->model->editSave($data);
        if (isset($message['success']) && $message['success']) {
            header('location: ' . URL . 'notice?success');
        } if (isset($message['error']) && $message['error']) {
            header('location: ' . URL . 'notice?error');
        }
    }

    public function delete($noticeId) {
        $message = $this->model->delete($noticeId);
        if (isset($message['success']) && $message['success']) {
            header('location: ' . URL . 'notice?success');
        }
        if (isset($message['noaccess']) && $message['noaccess']) {
            header('location: ' . URL . 'notice?noAccess');
        }
        if (isset($message['error']) && $message['error']) {
            header('location: ' . URL . 'notice?noAccess');
        }
    }

}
