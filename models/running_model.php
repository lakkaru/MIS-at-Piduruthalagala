<?php

class Running_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function ruRunningLast() {
        return $this->db->select('SELECT hours  FROM rurunning ORDER BY  date DESC  LIMIT 1', array());
    }

    public function eyeRunningLast() {
        return $this->db->select('SELECT hours  FROM eyerunning ORDER BY  date DESC  LIMIT 1', array());
    }

    public function genRunningLast() {
        return $this->db->select('SELECT hours, minutes  FROM genrunning ORDER BY  date DESC  LIMIT 1', array());
    }

    public function ruRunningList() {
        return $this->db->select('SELECT *  FROM rurunning ORDER BY  date DESC  LIMIT 25', array());
    }

    public function eyeRunningList() {
        return $this->db->select('SELECT *  FROM eyerunning ORDER BY  date DESC LIMIT 25', array());
    }

    public function genRunningList() {
        return $this->db->select('SELECT *  FROM genrunning ORDER BY  date DESC LIMIT 25', array());
    }

    public function runningSingleList($runningId, $table) {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {//checking for admin
            $result = $this->db->select('SELECT * FROM ' . $table . ' WHERE runningId = :runningId', array('runningId' => $runningId));
        } else {//non admin users
            $result = $this->db->select('SELECT * FROM ' . $table . ' WHERE serviceNumber = :serviceNumber AND runningId = :runningId', array('serviceNumber' => $_SESSION['serviceNumber'], 'runningId' => $runningId));
        }
        if (count($result) > 0) {
            return $result;
        } else {//for warning alert
            $message = array('noAccess' => "true");
            return $message;
        }
    }

    public function create($data) {
        if ($data['equipment'] == 'genrunning') {//for generator minutes
            $message = $this->db->insert($data['equipment'], array(
                'date' => $data['date'],
                'serviceNumber' => $_SESSION['serviceNumber'],
                'hours' => $data['hours'],
                'minutes' => $data['minutes']
            ));
        } else {
            $message = $this->db->insert($data['equipment'], array(
                'date' => $data['date'],
                'serviceNumber' => $_SESSION['serviceNumber'],
                'hours' => $data['hours']
            ));
        }
        return $message;
    }

    public function editSave($data) {
        $table = $data['table'];
        if ($table == 'genrunning') {//for generator minutes
            $postData = array(
                'date' => $data['date'],
                'hours' => $data['hours'],
                'minutes' => $data['minutes'],
            );
            $message = $this->db->update($table, $postData, "runningId={$data['runningId']} AND serviceNumber='{$_SESSION['serviceNumber']}'");
        } else {
            $postData = array(
                'date' => $data['date'],
                'hours' => $data['hours'],
            );
            $message = $this->db->update($table, $postData, "runningId={$data['runningId']} AND serviceNumber='{$_SESSION['serviceNumber']}'");
        }
        return $message;
    }

    public function delete($runningId, $table) {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {//checking for admin
            $message = $this->db->delete($table, "runningId=$runningId");
        } else {//non admin users
            $message = $this->db->delete($table, "runningId=$runningId AND serviceNumber='{$_SESSION['serviceNumber']}'");
        }
        return $message;
    }

}