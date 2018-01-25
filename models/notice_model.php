<?php

class Notice_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function noticeList() {
        return $this->db->select('SELECT * FROM notice AS A LEFT JOIN user AS U ON U.serviceNumber=A.serviceNumber', array());
    }

    public function noticeSingleList($noticeId) {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {//checking for admin
            $result = $this->db->select('SELECT * FROM notice WHERE noticeId = :noticeId', array('noticeId' => $noticeId));
        } else {//non admin users
            $result = $this->db->select('SELECT * FROM notice WHERE serviceNumber = :serviceNumber AND noticeId = :noticeId', array('serviceNumber' => $_SESSION['serviceNumber'], 'noticeId' => $noticeId));
        }
        if (count($result) > 0) {
            return $result;
        } else {//for warning alert noAccess
            $message = array('noAccess' => "true");
            return $message;
        }
    }

    public function create($data) {
        $message = $this->db->insert('notice', array(
            'date' => $data['date'],
            'description' => $data['description'],
            'serviceNumber' => $data['serviceNumber']
        ));
        return $message;
    }

    public function editSave($data) {
        $postData = array(
            'noticeId' => $data['noticeId'],
            'date' => $data['date'],
            'description' => $data['description'],
        );
        $message = $this->db->update('notice', $postData, "noticeId={$data['noticeId']}");
        return $message;
    }

    public function delete($noticeId) {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {//checking for admin
            $message = $this->db->delete('notice', "noticeId=$noticeId");
        } else {//non admin users
            $message = $this->db->delete('notice', "noticeId=$noticeId AND serviceNumber={$_SESSION['serviceNumber']}");
        }
        return $message;
    }

}