<?php

class Running extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('running/js/default.js');
        $this->view->css = array('running/css/default.css');
    }

    public function index() {
            $this->view->title = 'Running Hours';
            $this->view->ruRunningLast = $this->model->ruRunningLast();
            $this->view->eyeRunningLast = $this->model->eyeRunningLast();
            $this->view->genRunningLast = $this->model->genRunningLast();
            $this->view->ruRunningList = $this->model->ruRunningList();
            $this->view->eyeRunningList = $this->model->eyeRunningList();
            $this->view->genRunningList = $this->model->genRunningList();
            $this->view->render('running/index');
    }

    public function create($equip) {
        $data = array(
            'serviceNumber' => $_SESSION['serviceNumber'],
            'equipment' => $equip,
            'date' => $_POST['date'],
            'hours' => $_POST['hours'],
            'minutes' => $_POST['minutes']);
        $message = $this->model->create($data);
        if (isset($message['success']) && $message['success']) {
            header('location: ' . URL . 'running?success');
        } else {
            header('location: ' . URL . 'running?error');
        }
    }

    public function edit($runningId, $table) {
        $this->view->title = 'Edit Running hours';
        $this->view->table = $table;
        $message = $this->model->runningSingleList($runningId, $table);
        if (isset($message['noAccess']) && $message['noAccess']) {
            header('location: ' . URL . 'running?noAccess');
        } else {
            $this->view->ruRunningList = $this->model->ruRunningList();
            $this->view->eyeRunningList = $this->model->eyeRunningList();
            $this->view->genRunningList = $this->model->genRunningList();
            $this->view->running = $this->model->runningSingleList($runningId, $table);
            $this->view->render('running/edit');
        }
    }

    public function editSave($runningId, $table) {
        $data = array(
            'runningId' => $runningId,
            'table' => $table,
            'date' => $_POST['date'],
            'hours' => $_POST['hours'],
            'minutes' => $_POST['minutes']);
        $message = $this->model->editSave($data);
        if (isset($message['success']) && $message['success']) {
            header('location: ' . URL . 'running?success');
        }if (isset($message['error']) && $message['error']) {
            header('location: ' . URL . 'diesel?error');
        }
    }

    public function delete($runningId, $table) {
        $message = $this->model->delete($runningId, $table);
        if (isset($message['success']) && $message['success']) {
            header('location: ' . URL . 'running?success');
        }
        if (isset($message['noAccess']) && $message['noAccess']) {
            header('location: ' . URL . 'running?noAccess');
        }
        if (isset($message['error']) && $message['error']) {
            header('location: ' . URL . 'running?error');
        }
    }

    /**
     * setting to rupavahini running hours
     */
    public function ruRunning() {
        $equip = 'rurunning';
        $this->create($equip);
    }

    /**
     * setting to channel eye running hours
     */
    public function eyeRunning() {
        $equip = 'eyerunning';
        $this->create($equip);
    }

    /**
     * setting to generator running hours
     */
    public function genRunning() {
        $equip = 'genrunning';
        $this->create($equip);
    }

}
