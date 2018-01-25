<?php

class Mtce_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function mtceList() {
        return $this->db->select('SELECT * FROM mtce ');
    }

    public function mtceSingleList($mtceId) {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {//checking for admin
            $result = $this->db->select('SELECT * FROM mtce WHERE mtceId = :mtceId', array('mtceId' => $mtceId));
        } else {//non admin users
            $result = $this->db->select('SELECT * FROM mtce WHERE serviceNumber = :serviceNumber AND mtceId = :mtceId', array('serviceNumber' => $_SESSION['serviceNumber'], 'mtceId' => $mtceId));
        }
        if (count($result) > 0) {
            $_SESSION['equipment'] = $result[0]['equipment'];
            return $result;
        } else {//for warning alert noAccess
            $message = array('noAccess' => "true");
            return $message;
        }
    }

    public function create($data) {
        $message = $this->db->insert('mtce', array(
            'description' => $data['description'],
            'serviceNumber' => $data['serviceNumber'],
            'nextDate' => $data['nextDate'],
            'equipment' => $data['equipment']
        ));
        return $message;
    }

    public function editSave($data) {
        $postData = array(
            'serviceNumber' => $data['serviceNumber'],
            'nextDate' => $data['nextDate'],
            'description' => $data['description'],
        );
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
            $message = $this->db->update('mtce', $postData, "mtceId={$data['mtceId']}");
        } else {
            $message = $this->db->update('mtce', $postData, "mtceId={$data['mtceId']} AND serviceNumber='{$_SESSION['serviceNumber']}'");
        }
        return $message;
    }

    public function delete($mtceId) {
        $this->db->delete('mtce', "mtceId=$mtceId AND serviceNumber='{$_SESSION['serviceNumber']}'");
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {//checking for admin
            $result = $this->db->delete('mtce', "mtceId=$mtceId");
        } else {//non admin users
            $result = $this->db->delete('mtce', "mtceId=$mtceId AND serviceNumber='{$_SESSION['serviceNumber']}'");
        }
        if ($result) {
            $message = array('success' => "true");
        } else {
            $message = array('noAccess' => "true");
        }
        return $message;
    }

}
