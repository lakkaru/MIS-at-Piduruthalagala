<?php

class Report extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handleAdmin(); //check login status
        $this->view->js = array('report/js/default.js');
        $this->view->css = array('report/css/default.css');
    }

    public function index() {
        $this->view->title = 'Reports';
        $this->view->render('report/index'); //sending paramiters to View() at lib/view.php
    }

    public function noticeReport() {
        $this->view->title = 'Reports';
        $record = $this->view->noticeList = array();
        $startDay = reset($record);
        $lastDay = end($record);
        $this->view->startDay = $startDay['date'];
        $this->view->lastDay = $lastDay['date'];
        $this->view->print = 'disabled';
        $this->view->render('report/noticeReport'); //sending paramiters to View() at lib/view.php
    }

    public function selectedNoticeReport() {
        $data = array(
            'from' => $_POST['from'],
            'to' => $_POST['to']
        );
        $this->view->title = 'Reports';
        $record = $this->view->noticeList = $this->model->selctedNoticeList($data);
        $startDay = $_POST['from'];
        $lastDay = $_POST['to'];
        $this->view->startDay = $startDay;
        $this->view->lastDay = $lastDay;
        $this->view->print = '';
        $this->view->render('report/noticeReport');
    }

    
    public function dieselReport() {
        $this->view->title = 'Reports';
        $record = $this->view->dieselList = array();
        $startDay = reset($record); //getting date of first record
        $lastDay = end($record); //getting date of last record
        $this->view->startDay = $startDay['date'];
        $this->view->lastDay = $lastDay['date'];
        $this->view->print = 'disabled';
        $this->view->render('report/dieselReport'); //sending paramiters to View() at lib/view.php
    }

    public function selectedDieselReport() {
        $data = array(
            'from' => $_POST['from'],
            'to' => $_POST['to']
        );
        $this->view->title = 'Reports';
        $record = $this->view->dieselList = $this->model->selectedDieselList($data);
        $startDay = $_POST['from']; //getting date of first record
        $lastDay = $_POST['to']; //getting date of last record
        $this->view->startDay = $startDay;
        $this->view->lastDay = $lastDay;
        $this->view->print = '';
        $this->view->render('report/dieselReport');
    }
public function dieselConsumReport() {
        $this->view->title = 'Reports';
        $record = $this->view->consumption = array();
        $this->view->print = 'disabled';
        $this->view->render('report/dieselConsumReport'); //sending paramiters to View() at lib/view.php
    }

    public function selectedConsumReport() {
        $data = array(
            'start' => $_POST['start'],
            'next' => $_POST['next'],
        );
        $this->view->title = 'Reports';
        $this->view->consumption = $this->model->dieselConsumption($data);
        $this->view->genRunning = $this->model->genRunning($data);
        $this->view->month = $_POST['monthDis'];
        $this->view->print = '';
        $this->view->render('report/dieselConsumReport');
    }
    public function runningReport() {
        $this->view->title = 'Reports';
        $record = $this->view->runningSingleList = array();
        $startDay = reset($record); //getting date of first record
        $lastDay = end($record); //getting date of last record
        $this->view->startDay = $startDay['date'];
        $this->view->lastDay = $lastDay['date'];
        $this->view->print = 'disabled';
        $this->view->render('report/runningReport'); //sending paramiters to View() at lib/view.php
    }

    public function selectedRunningReport() {
        $data = array(
            'from' => $_POST['from'],
            'to' => $_POST['to']
        );
        $this->view->title = 'Reports';
        $record = $this->view->runningSingleList = $this->model->selectedSingleRunninglList($data);
        $startDay = $_POST['from']; //getting date of first record
        $lastDay = $_POST['to']; //getting date of last record
        $this->view->startDay = $startDay;
        $this->view->lastDay = $lastDay;
        $this->view->print = '';
        $this->view->render('report/runningReport');
    }
    public function mtceReport() {
        $this->view->title = 'Reports';
        $record = $this->view->mtceList = array();
        $startDay = reset($record); //getting date of first record
        $lastDay = end($record); //getting date of last record
        $this->view->startDay = $startDay['date'];
        $this->view->lastDay = $lastDay['date'];
        $this->view->print = 'disabled';
        $this->view->render('report/mtceReport'); //sending paramiters to View() at lib/view.php
    }

    public function selectedMtceReport() {
        $data = array(
            'equipment'=>$_POST['equipment'],
            'from' => $_POST['from'],
            'to' => $_POST['to']
        );
//        print_r($data);die;
        $this->view->title = 'Reports';
        $record = $this->view->mtceList = $this->model->selectedMtceList($data);
//        print_r($record);die;
        $startDay = $_POST['from']; //getting start date
        $lastDay = $_POST['to']; //getting end date
        $this->view->startDay = $startDay;
        $this->view->lastDay = $lastDay;
        $this->view->print = '';
        $this->view->render('report/mtceReport');
    }
    public function eventReport() {
        $this->view->title = 'Reports';
        $record = $this->view->eventList = array();
        $startDay = reset($record); //getting date of first record
        $lastDay = end($record); //getting date of last record
        $this->view->startDay = $startDay;
        $this->view->lastDay = $lastDay;
        $this->view->print = 'disabled';
        $this->view->render('report/eventReport'); //sending paramiters to View() at lib/view.php
    }

    public function selectedEventReport() {
        $data = array(
            'equipment' => $_POST['equipment'],
            'event' => $_POST['event'],
            'from' => $_POST['from'],
            'to' => $_POST['to']
        );
        $this->view->title = 'Reports';
        $record = $this->view->eventList = $this->model->selectedEventList($data);
        $startDay = $_POST['from']; //getting start date
        $this->view->equipment = $_POST['equipment']; //getting equipment
        $this->view->event = $_POST['event']; //getting event
        $lastDay = $_POST['to']; //getting end date
        $this->view->startDay = $startDay;
        $this->view->lastDay = $lastDay;
        $this->view->print = '';
        $this->view->render('report/eventReport');
    }
    public function repeaterReport() {
        $this->view->title = 'Reports';
        $this->view->txLocations = $this->model->txLocations();
        $record = $this->view->repeaterList = array();
        $startDay = reset($record); //getting date of first record
        $lastDay = end($record); //getting date of last record
        $this->view->startDay = $startDay['date'];
        $this->view->lastDay = $lastDay['date'];
        $this->view->print = 'disabled';
        $this->view->render('report/repeaterReport'); //sending paramiters to View() at lib/view.php
    }

    public function selectedRepeaterReport() {
        $data = array(
            'txLocation' => $_POST['txLocation'],
            'from' => $_POST['from'],
            'to' => $_POST['to']
        );
        $this->view->title = 'Reports';
        $this->view->txLocations = $this->model->txLocations();
        $this->view->repeaterList = $this->model->selectedRepeaterList($data);
        $startDay = $_POST['from']; //getting start date
        $lastDay = $_POST['to']; //getting end date
        $txLocation = $_POST['txLocation']; //getting end date
        $this->view->startDay = $startDay;
        $this->view->lastDay = $lastDay;
        $this->view->txLocation = $txLocation;
        $this->view->print = '';
        $this->view->render('report/repeaterReport');
    }
    public function leaveReport() {
        $this->view->title = 'Reports';
        $this->view->userList = $this->model->userList();
        $this->view->selectedLeaveList = array();
        $this->view->print = 'disabled';
        $this->view->render('report/leaveReport'); //sending paramiters to View() at lib/view.php
    }

    public function selectedLeaveReport() {
        $data = array(
            'applicant' => $_POST['applicant'],
            'from' => $_POST['from'],
            'to' => $_POST['to']
        );
        $this->view->title = 'Reports';
        $this->view->userList = $this->model->userList();
        $result=$this->view->selectedLeaveList = $this->model->selectedLeaveList($data);
//        echo'<pre>';
//        print_r($result);die;
//        echo'</pre>';
        $startDay = $_POST['from']; //getting start date
        $lastDay = $_POST['to']; //getting end date
        $this->view->startDay = $startDay;
        $this->view->lastDay = $lastDay;
        $this->view->print = '';
        $this->view->render('report/leaveReport');
    }

}
