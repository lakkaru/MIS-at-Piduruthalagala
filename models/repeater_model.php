<?php

class Repeater_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function repeaterList() {
        return $this->db->select('SELECT * FROM repeater ', array());
    }

    public function repeaterSingleList($repeaterId) {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {//checking for admin
            $result = $this->db->select('SELECT * FROM repeater WHERE  repeaterId = :repeaterId', array('repeaterId' => $repeaterId));
        } else {//non admin users
            $result = $this->db->select('SELECT * FROM repeater WHERE serviceNumber = :serviceNumber AND repeaterId = :repeaterId', array('serviceNumber' => $_SESSION['serviceNumber'], 'repeaterId' => $repeaterId));
        }
        if (count($result) > 0) {
            return $result;
        } else {//for warning alert noAccess
            $message = array('noAccess' => "true");
            return $message;
        }
    }

    public function txLocations() {
        return $this->db->select('SELECT  txLocation, repeaterId FROM repeater GROUP BY txLocation', array());
    }

    public function ajaxAvgLevel($txLocation) {//getting average level
        $result = $this->db->select('SELECT  AVG(maxLevel) FROM repeater WHERE  txLocation = :txLocation', array('txLocation' => $txLocation));
        echo json_encode($result);
    }

    public function create($data) {
        $message = $this->db->insert('repeater', array(
            'serviceNumber' => $data['serviceNumber'],
            'date' => $data['date'],
            'txLocation' => $data['txLocation'],
            'rxLocation' => $data['rxLocation'],
            'rxFrequency' => $data['rxFrequency'],
            'maxLevel' => $data['maxLevel'],
            'minLevel' => $data['minLevel'],
            'remarks' => $data['remarks']
        ));
        return $message;
    }

    public function editSave($data) {
        $postData = array(
            'serviceNumber' => $data['serviceNumber'],
            'date' => $data['date'],
            'txLocation' => $data['txLocation'],
            'rxLocation' => $data['rxLocation'],
            'rxFrequency' => $data['rxFrequency'],
            'maxLevel' => $data['maxLevel'],
            'minLevel' => $data['minLevel'],
            'remarks' => $data['remarks']
        );
        $message = $this->db->update('repeater', $postData, "repeaterId={$data['repeaterId']}");
        return $message;
    }

    public function delete($repeaterId) {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {//checking for admin
            $message = $this->db->delete('repeater', "repeaterId=$repeaterId ");
        } else {//non admin users
            $message = $this->db->delete('repeater', "repeaterId=$repeaterId AND serviceNumber='{$_SESSION['serviceNumber']}'");
        }
        return $message;
    }

}

