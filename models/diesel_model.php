<?php

class Diesel_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function dieselList() {
        return $this->db->select('SELECT * FROM diesel ', array());
    }

    public function dieselSingleList($dieselId) {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {//checking for admin
            $result = $this->db->select('SELECT * FROM diesel WHERE dieselId = :dieselId', array('dieselId' => $dieselId));
        } else {//non admin users
            $result = $this->db->select('SELECT * FROM diesel WHERE serviceNumber = :serviceNumber AND dieselId = :dieselId', array('serviceNumber' => $_SESSION['serviceNumber'], 'dieselId' => $dieselId));
        }
        if (count($result) > 0) {
            return $result;
        } else {//for warning alert
            $message = array('noAccess' => "true");
            return $message;
        }
    }

    public function dieselStock() {
        $dieselStock = '0';
        $diesel = $this->db->select('SELECT stock, amount FROM diesel ORDER BY date DESC LIMIT 1', array());
        foreach ($diesel as $key => $value) {
            $stock = $value['stock'];
            $amount = $value['amount'];
            $dieselStock = $stock + $amount;
        }
        return $dieselStock;
    }

    public function create($data) {
        $message = $this->db->insert('diesel', array(
            'amount' => $data['amount'],
            'serviceNumber' => $data['serviceNumber'],
            'stock' => $data['stock'],
            'date' => $data['date']
        ));
            return $message;
          }

    public function editSave($data) {
       $postData = array(
            'date' => $data['date'],
            'amount' => $data['amount'],
            'stock' => $data['stock'],
            'serviceNumber' => $data['serviceNumber'],
        );
        $message = $this->db->update('diesel', $postData, "dieselId={$data['dieselId']}");
        return $message;
       }

    public function delete($dieselId) {
      if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {//checking for admin
            $message = $this->db->delete('diesel', "dieselId=$dieselId");
        } else {//non admin users
            $message = $this->db->delete('diesel', "dieselId=$dieselId AND serviceNumber='{$_SESSION['serviceNumber']}'");
        }
            return $message;
    }

}
