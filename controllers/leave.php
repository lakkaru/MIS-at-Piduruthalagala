<?php

class Leave extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('leave/js/default.js');
        $this->view->css = array('leave/css/default.css');
    }

    public function index() {
//         echo 'Leave index'; die;
        $this->view->title = 'Leave';
        $this->view->userList = $this->model->userList();
        $this->view->leaveList = $this->model->leaveList();
        $this->view->render('leave/index'); //sending paramiters to View() at lib/view.php
    }

    public function create() {
        $data = array(
            'date' => $_POST['date'],
            'lNumber' => $_POST['lNumber'],
            'lType' => $_POST['lType'],
            'noOfLeaveDays' => $_POST['noOfLeaveDays'],
            'serviceNumber' => $_SESSION['serviceNumber'],
            'applicant' => $_POST['applicant'],
            'covering' => $_POST['covering'],
            'lDate1' => $_POST['lDate1'],
            'from1' => $_POST['from1'],
            'to1' => $_POST['to1'],
            'lDate2' => $_POST['lDate2'],
            'from2' => $_POST['from2'],
            'to2' => $_POST['to2'],
            'lDate3' => $_POST['lDate3'],
            'from3' => $_POST['from3'],
            'to3' => $_POST['to3'],
            'noOfDays' => $_POST['noOfDays']);
        $message = $this->model->create($data);
        if (isset($message['success']) && $message['success']) {
            header('location: ' . URL . 'leave?success');
        } else {
            header('location: ' . URL . 'leave?error');
        }
    }

    public function view($leaveId, $applicant) {
        $this->view->title = 'Leave';
        $this->view->leaveList = $this->model->leaveList();
        $this->view->leave = $this->model->leaveSingleList($leaveId);
        $this->view->noOfLeaveTypes = $this->model->noOfLeaveTypes($applicant);
        $this->view->render('leave/view');
    }

    public function checkVehicle($date) {
        $this->model->checkVehicle($_POST[$date]);
    }

    public function delete($leaveId) {
        $message = $this->model->delete($leaveId);
        if (isset($message['success']) && $message['success']) {
            header('location: ' . URL . 'leave?success');
        }
        if (isset($message['error']) && $message['error']) {
            header('location: ' . URL . 'leave?noAccess');
        }
    }

}
