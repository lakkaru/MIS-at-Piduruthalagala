<?php

class Event_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function eventList() {
        return $this->db->select('SELECT * FROM event ');
    }

    public function eventSingleList($eventId) {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {//checking for admin
            $result = $this->db->select('SELECT * FROM event WHERE eventId = :eventId', array('eventId' => $eventId));
        } else {//non admin users
            $result = $this->db->select('SELECT * FROM event WHERE serviceNumber = :serviceNumber AND eventId = :eventId', array('serviceNumber' => $_SESSION['serviceNumber'], 'eventId' => $eventId));
        }
        if (count($result) > 0) {
            $_SESSION['equipment'] = $result[0]['equipment']; //for equipment name display
            return $result;
        } else {//for warning alert
            $message = array('noAccess' => "true");
            return $message;
        }
    }

    public function create($data) {
        $message = $this->db->insert('event', array(
            'date' => $data['date'],
            'description' => $data['description'],
            'serviceNumber' => $data['serviceNumber'],
            'event' => $data['event'],
            'equipment' => $data['equipment']
        ));
        return $message;
    }

    public function editSave($data) {
        $postData = array(
            'eventId' => $data['eventId'],
            'date' => $data['date'],
            'description' => $data['description'],
        );
        $message = $this->db->update('event', $postData, "eventId={$data['eventId']}");
        return $message;
    }

    public function delete($eventId) {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {//checking for admin
            $message = $this->db->delete('event', "eventId=$eventId ");
        } else {//non admin users
            $message = $this->db->delete('event', "eventId=$eventId AND serviceNumber='{$_SESSION['serviceNumber']}'");
        }
        return $message;
    }

}
