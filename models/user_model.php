<?php

class User_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function checkUser($code) {
        $result = $this->db->select('SELECT  name FROM user WHERE code=:code', array(':code' => $code));
        echo json_encode($result);
    }

    public function userList() {
        return $this->db->select('SELECT * FROM user');
    }

    public function userSingleList($serviceNumber) {
        $result = $this->db->select('SELECT * FROM user WHERE serviceNumber=:serviceNumber', array(':serviceNumber' => $serviceNumber));
        if (count($result) > 0) {
            return $result;
        } else {//for warning alert noAccess
            $message = array('noAccess' => "true");
            return $message;
        }
    }

    public function create($data) {//creating new user on database table "user"
        $this->updateCode($data['code']); //setting used code lettter to Inac
        $message = $this->db->insert('user', array(
            'name' => $data['name'],
            'serviceNumber' => $data['serviceNumber'],
            'password' => Hash::create('md5', $data['password'], HASH_PASSWORD_KEY),
            'code' => $data['code'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'role' => $data['role']
        ));
        return $message;
    }

    public function updateCode($code) {
        $postData = array(
            'code' => 'Inac');
        $this->db->update('user', $postData, "code='$code'");
    }

    public function editSave($data) {
        $this->updateCode($data['code']); //setting used code lettter to Inac
        $postData = array(
            'name' => $data['name'],
            'serviceNumber' => $data['serviceNumber'],
            'password' => Hash::create('md5', $data['password'], HASH_PASSWORD_KEY),
            'code' => $data['code'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'role' => $data['role']);

        $message = $this->db->update('user', $postData, "serviceNumber={$data['serviceNumber']}");
        return $message;
    }

    public function resetPassword($serviceNumber) {
        $postData = array(
            'serviceNumber' => $serviceNumber,
            'password' => Hash::create('md5', $serviceNumber, HASH_PASSWORD_KEY));
        $message = $this->db->update('user', $postData, "serviceNumber={$serviceNumber}");
        return $message;
    }

    public function accountEditSave($data) {
        $postData = array(
            'password' => Hash::create('md5', $data['password'], HASH_PASSWORD_KEY),
            'email' => $data['email'],
            'mobile' => $data['mobile']);
        $message = $this->db->update('user', $postData, "serviceNumber={$data['serviceNumber']}");
        return $message;
    }

    public function delete($serviceNumber) {
        $message = $this->db->delete('user', "serviceNumber='$serviceNumber'");
        return $message;
    }

}
