<?php

class Event extends Controller {

    public function __construct() {
        //echo 'note func _construct';
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('event/js/default.js');
        $this->view->css = array('event/css/default.css');
    }

    /**
     * getting all past events from database
     */
    public function index() {
        
            $this->view->title = 'Event';
            $this->view->eventList = $this->model->eventList();
            $this->view->render('event/index'); //sending paramiters to View() at lib/view.php
        
    }

    public function create($event) {
        $data = array(
            'equipment' => $_SESSION['equipment'],
            'event' => $event,
            'serviceNumber' => $_SESSION['serviceNumber'],
            'date' => $_POST['date'],
            'description' => htmlspecialchars($_POST['description']));
        //@TODO; Do your error checking
        $message = $this->model->create($data);
        //print_r($message);
        //die;
        if (isset($message['success']) && $message['success']) {
            if ($event == 'Maintenance') {
                header('location: ' . URL . 'mtce?success');
            } else {
                header('location: ' . URL . 'event?success');
            }
        } else {
            header('location: ' . URL . 'event?error');
        }
    }

    public function edit($eventId) {
        $this->view->title = 'Edit Event';
        $message = $this->model->eventSingleList($eventId);
        if (isset($message['noAccess']) && $message['noAccess']) {
            header('location: ' . URL . 'event?noAccess');
        } else {
            $this->view->eventList = $this->model->eventList();
            $this->view->event = $this->model->eventSingleList($eventId);
            $this->view->render('event/edit');
        }
    }

    public function editSave($eventId) {
        $data = array(
            'eventId' => $eventId,
            'date' => $_POST['date'],
            'description' => htmlspecialchars($_POST['description']));
        $message = $this->model->editSave($data);
        if (isset($message['success']) && $message['success']) {
            header('location: ' . URL . 'event?success');
        }
        if (isset($message['error']) && $message['error']) {
            header('location: ' . URL . 'event?error');
        }
        if (isset($message['error']) && $message['error']) {
            header('location: ' . URL . 'diesel?noAccess');
        }
    }

    public function delete($eventId) {
        $message = $this->model->delete($eventId);
        if (isset($message['success']) && $message['success']) {
            header('location: ' . URL . 'event?success');
        }
        if (isset($message['noAccess']) && $message['noAccess']) {
            header('location: ' . URL . 'event?noAccess');
        }
        if (isset($message['error']) && $message['error']) {
            header('location: ' . URL . 'diesel?noAccess');
        }
    }

    /**
     * setting equipment from url request
     */
    public function stl() {
        $_SESSION['equipment'] = 'STL';
        header('location: ' . URL . 'event');
    }

    /**
     * setting equipment from url request
     */
    public function pcn() {
        $_SESSION['equipment'] = 'PCN1620';
        header('location: ' . URL . 'event');
    }

    /**
     * setting equipment from url request
     */
    public function nm() {
        $_SESSION['equipment'] = 'NM7200V';
        header('location: ' . URL . 'event');
    }

    /**
     * setting equipment from url request
     */
    public function coax() {
        $_SESSION['equipment'] = 'Co-Axial';
        header('location: ' . URL . 'event');
    }

    /**
     * setting equipment from url request
     */
    public function ant() {
        $_SESSION['equipment'] = 'Antenna';
        header('location: ' . URL . 'event');
    }

    /**
     * setting equipment from url request
     */
    public function ups() {
        $_SESSION['equipment'] = 'UPS';
        header('location: ' . URL . 'event');
    }

    /**
     * setting equipment from url request
     */
    public function gen() {
        $_SESSION['equipment'] = 'Generator';
        header('location: ' . URL . 'event');
    }

    /**
     * setting equipment from url request
     */
    public function oth() {
        $_SESSION['equipment'] = 'Other';
        header('location: ' . URL . 'event');
    }

    /**
     * setting event to Maintenance
     */
    public function mtce() {
        $event = 'Maintenance';
//        echo $_SESSION['equipment'];
//        die;
        $this->create($event);
    }

    /**
     * setting event to fault
     */
    public function fault() {
        $event = 'Fault';
        $this->create($event);
    }

    /**
     * setting event to repair
     */
    public function repair() {
        $event = 'Repair';
        $this->create($event);
    }

    /**
     * setting event to expantion
     */
    public function expan() {
        $event = 'Expanssion';
        $this->create($event);
    }

}
