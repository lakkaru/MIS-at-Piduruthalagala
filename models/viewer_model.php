<?php

class Viewer_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function viewerList() {
        return $this->db->select('SELECT *  FROM viewer');
    }

    public function viewerSingleList($viewerId) {
        return $this->db->select('SELECT * FROM viewer WHERE viewerId = :viewerId', array('viewerId' => $viewerId));
    }

    public function create($data) {
        $message = $this->db->insert('viewer', array(
            'date' => $data['date'],
            'name' => $data['name'],
            'city' => $data['city'],
            'address' => $data['address'],
            'resTel' => $data['resTel'],
            'mobTel' => $data['mobTel'],
            'email' => $data['email'],
            'related' => $data['related'],
            'description' => $data['description'],
            'serviceNumber' => $_SESSION['serviceNumber'],
        ));

        return $message;
    }

    public function editSave($data) {
        $postData = array(
            'viewerId' => $data['viewerId'],
            'date' => $data['date'],
            'name' => $data['name'],
            'city' => $data['city'],
            'address' => $data['address'],
            'resTel' => $data['resTel'],
            'mobTel' => $data['mobTel'],
            'email' => $data['email'],
            'related' => $data['related'],
            'description' => $data['description'],
            'serviceNumber' => $_SESSION['serviceNumber'],
        );
        $message = $this->db->update('viewer', $postData, "viewerId={$data['viewerId']}");
        return $message;
    }

    public function delete($viewerId) {
        $message = $this->db->delete('viewer', "viewerId=$viewerId AND serviceNumber='{$_SESSION['serviceNumber']}'");
        return $message;
    }

}
