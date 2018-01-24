<?php
class Login_Model extends Model {
    public function __construct() {
        parent::__construct();
    }
    /*
     * checking user service number and password for login
     */
    public function run() {
        $serviceNumber = $_POST['serviceNumber'];
        $password = Hash::create('md5', $_POST['password'], HASH_PASSWORD_KEY);
        $result = $this->db->select('SELECT  serviceNumber, name, role FROM user '
                . 'where serviceNumber = :serviceNumber AND password = :password', 
                array(':serviceNumber' => $serviceNumber, ':password' => $password));
        $count = count($result);
        if ($count > 0) {//if loged in
            Session::init();
            Session::set('role', $result[0]['role']);
            Session::set('loggedIn', TRUE);
            Session::set('serviceNumber', $result[0]['serviceNumber']);
            Session::set('userName', $result[0]['name']);
            header('Location: '.$_SERVER['PHP_SELF']);
        } else {//if not logged in
        Session::init();
            Session::set('loggedIn', FALSE);
            header('location: ../login');
        }
    }
}
