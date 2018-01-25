<?php

class Roster_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function userList() {
         return $this->db->select('SELECT name, code FROM user ORDER BY code');
    }

}
