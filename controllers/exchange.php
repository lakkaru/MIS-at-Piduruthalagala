<?php

class Exchange extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('exchange/js/default.js');
        $this->view->css = array('exchange/css/default.css');
    }

    public function index() {
            $this->view->title = 'Duty Exchange';
            $this->view->userList = $this->model->userList();
            $this->view->exchangeList = $this->model->exchangeList();
            $this->view->render('exchange/index'); //sending paramiters to View() at lib/view.php
    }

    public function view($exchangeId) {
        $this->view->title = 'Duty Exchange view';
        $this->view->userList = $this->model->userList();
        $this->view->exchange = $this->model->exchangeSingleList($exchangeId);
        $this->view->render('exchange/view'); //sending paramiters to View() at lib/view.php
    }

    public function checkVehicle($date) {
        $this->model->checkVehicle($_POST[$date]);
    }

    public function create() {
        $data = array(
            'date' => $_POST['date'],
            'applicant1' => $_POST['applicant1'],
            'exDate11' => $_POST['exDate11'],
            'exDate11From' => $_POST['exDate11From'],
            'exDate11To' => $_POST['exDate11To'],
            'exDate12' => $_POST['exDate12'],
            'exDate12From' => $_POST['exDate12From'],
            'exDate12To' => $_POST['exDate12To'],
            'exDate13' => $_POST['exDate13'],
            'exDate13From' => $_POST['exDate13From'],
            'exDate13To' => $_POST['exDate13To'],
            'applicant2' => $_POST['applicant2'],
            'exDate21' => $_POST['exDate21'],
            'exDate21From' => $_POST['exDate21From'],
            'exDate21To' => $_POST['exDate21To'],
            'exDate22' => $_POST['exDate22'],
            'exDate22From' => $_POST['exDate22From'],
            'exDate22To' => $_POST['exDate22To'],
            'exDate23' => $_POST['exDate23'],
            'exDate23From' => $_POST['exDate23From'],
            'exDate23To' => $_POST['exDate23To'],
            'exNumber' => $_POST['exNumber'],
            'serviceNumber' => $_SESSION['serviceNumber'],
            'noOfDays' => $_POST['noOfDays']);
        $message = $this->model->create($data);
        if (isset($message['success']) && $message['success']) {
            header('location: ' . URL . 'exchange?success');
        } else {
            header('location: ' . URL . 'exchange?error');
        }
    }

    public function delete($exchangeId) {
        $message = $this->model->delete($exchangeId);
        if (isset($message['success']) && $message['success']) {
            header('location: ' . URL . 'exchange?success');
        }
        if (isset($message['error']) && $message['error']) {
            header('location: ' . URL . 'exchange?noAccess');
        }
    }

}
