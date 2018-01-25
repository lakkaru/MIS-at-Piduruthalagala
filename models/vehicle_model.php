<?php

class Vehicle_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function reservedList() {//reserved by admin
        return $this->db->select("SELECT amendedId,date FROM amendedroster WHERE 12_20_1='Q'", array());
    }

    public function checkAdmin() {//checking user role
        if (isset($_SESSION['role'])) {
            if (Session::get('role') == 'admin') {
                return TRUE;
            }
        }
    }

    public function create($data) {
//echo 'Vehical Create'; die;
        if ($this->checkAdmin()) {
            $date = $data['reuqestedDate'];
            $postData = array(
                '20_04_1' => 'O',
                '20_04_2' => 'P',
                '04_12_1' => 'O',
                '04_12_2' => 'P',
                '12_20_1' => 'Q',
                '12_20_2' => 'R'
            );
//            echo 'Vehical Create'; die;
            $message=$this->db->update('amendedroster', $postData, "date='$date'");
//            var_dump($message); die;
        }
    }

    public function cancel($amendedId) {
        if ($this->checkAdmin()) {

            $postData = array(
                '20_04_1' => 'O',
                '20_04_2' => 'P',
                '04_12_1' => 'O',
                '04_12_2' => 'P',
                '12_20_1' => 'O',
                '12_20_2' => 'P'
            );
            $this->db->update('amendedroster', $postData, "amendedId=$amendedId");
        }
    }

    public function checkDutyChanges() {
        $toDay = date('Y/m/d'); //getting today for deleting past date
        $this->db->delete('amendedroster', "date<'$toDay'", 30);
        for ($i = 90; $i <= 91; $i++) {//creating ammended roster table
            $datetime1 = new DateTime("2014-11-30");
            $datetime2 = new DateTime("now");
          
            $datetime2->modify("+$i day");
            $interval = $datetime1->diff($datetime2);
//            var_dump($interval) ;die;
            $nofDays = $interval->format('%R%a');
//            echo $nofDays;die;
            $modDays = $nofDays % 6;
//            echo $modDays;die;
            $date = $datetime2->format('Y/m/d'); //converting date object to string
//            echo $date;die;
            switch ($modDays) {
                case 0:
                    $_20_04_1 = 'E';
                    $_20_04_2 = 'F';
                    $_04_12_1 = 'E';
                    $_04_12_2 = 'F';
                    $_12_20_1 = 'A';
                    $_12_20_2 = 'B';
                    break;
                case 1:
                    $_20_04_1 = 'A';
                    $_20_04_2 = 'B';
                    $_04_12_1 = 'A';
                    $_04_12_2 = 'B';
                    $_12_20_1 = 'A';
                    $_12_20_2 = 'B';
                    break;
                case 2:
                    $_20_04_1 = 'A';
                    $_20_04_2 = 'B';
                    $_04_12_1 = 'A';
                    $_04_12_2 = 'B';
                    $_12_20_1 = 'C';
                    $_12_20_2 = 'D';
                    break;
                case 3:
                    $_20_04_1 = 'C';
                    $_20_04_2 = 'D';
                    $_04_12_1 = 'C';
                    $_04_12_2 = 'D';
                    $_12_20_1 = 'C';
                    $_12_20_2 = 'D';
                    break;
                case 4:
                    $_20_04_1 = 'C';
                    $_20_04_2 = 'D';
                    $_04_12_1 = 'C';
                    $_04_12_2 = 'D';
                    $_12_20_1 = 'E';
                    $_12_20_2 = 'F';
                    break;
                case 5:
                    $_20_04_1 = 'E';
                    $_20_04_2 = 'F';
                    $_04_12_1 = 'E';
                    $_04_12_2 = 'F';
                    $_12_20_1 = 'E';
                    $_12_20_2 = 'F';
                    break;
            }
//            echo $date; die;
            $this->db->insert('amendedroster', array(
                'date' => $date,
                '20_04_1' => $_20_04_1,
                '20_04_2' => $_20_04_2,
                '04_12_1' => $_04_12_1,
                '04_12_2' => $_04_12_2,
                '12_20_1' => $_12_20_1,
                '12_20_2' => $_12_20_2
            ));
        }
//getting dates with duty changes
        $changingDates = $this->db->select('SELECT date FROM amendedroster WHERE 04_12_1<>12_20_1 OR `04_12_2`<>`12_20_2`  ', array());
        $unavailableDates = array();
        foreach ($changingDates as $item) {
            foreach ($item as $value) {
                $unavailableDates [].= $value;
            }
        }
        return json_encode($unavailableDates);
    }

}
