<?php

class Viewer extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('viewer/js/default.js');
        $this->view->css = array('viewer/css/default.css');
    }

    public function index() {
        $this->view->title = 'Viewer';
        $this->view->viewerList = $this->model->viewerList();
        $this->view->render('viewer/index');
    }

    public function create() {
        $data = array(
            'date' => $_POST['date'],
            'name' => htmlspecialchars($_POST['name']),
            'city' => htmlspecialchars(ucwords($_POST['city'])),
            'related' => $_POST['related'],
            'address' => htmlspecialchars(ucwords($_POST['address'])),
            'resTel' => $_POST['resTel'],
            'mobTel' => $_POST['mobTel'],
            'email' => htmlspecialchars($_POST['email']),
            'description' => htmlspecialchars($_POST['description']));
        $message = $this->model->create($data);
        if (isset($message['success']) && $message['success']) {
            header('location: ' . URL . 'viewer?success');
        } else {
            header('location: ' . URL . 'viewer?error');
        }
    }

    public function edit($viewerid) {
        $this->view->title = 'Edit Viewer';
        $this->view->viewerList = $this->model->viewerList();
        $this->view->viewer = $this->model->viewerSingleList($viewerid);
        $this->view->render('viewer/edit');
    }

    public function view($viewerid) {
        $this->view->title = 'Viewer';
        $this->view->viewerList = $this->model->viewerList();
        $this->view->viewer = $this->model->viewerSingleList($viewerid);
        $this->view->render('viewer/view');
    }

    public function editSave($viewerId) {
        $data = array(
            'viewerId' => $viewerId,
            'date' => $_POST['date'],
            'name' => htmlspecialchars($_POST['name']),
            'city' => htmlspecialchars(ucwords($_POST['city'])),
            'address' => htmlspecialchars(ucwords($_POST['address'])),
            'resTel' => $_POST['resTel'],
            'mobTel' => $_POST['mobTel'],
            'email' => htmlspecialchars($_POST['email']),
            'related' => $_POST['related'],
            'description' => htmlspecialchars($_POST['description']));
        $message = $this->model->editSave($data);
        if (isset($message['success']) && $message['success']) {
            header('location: ' . URL . 'viewer?success');
        }
        if (isset($message['error']) && $message['error']) {
            header('location: ' . URL . 'viewer?error');
        }
    }

    public function delete($viewerid) {
        $message = $this->model->delete($viewerid);
        if (isset($message['success']) && $message['success']) {
            header('location: ' . URL . 'viewer?success');
        }
        if (isset($message['error']) && $message['error']) {
            header('location: ' . URL . 'viewer?noAccess');
        }
    }

}
