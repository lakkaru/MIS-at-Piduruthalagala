<?php
class Model {
    function __construct() {
//        creating new database object db
        $this->db= new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);//libs/Database.php->Database class
    }
}
