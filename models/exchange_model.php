<?php

class Exchange_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function userList() {
        return $this->db->select('SELECT name, serviceNumber FROM user');
    }

    public function exchangeList() {
        return $this->db->select('SELECT * FROM exchange AS E LEFT JOIN user AS U1 ON U1.serviceNumber=E.applicant1 LEFT JOIN user AS U2 ON U2.serviceNumber=E.applicant2 LEFT JOIN user AS U3 ON U3.serviceNumber=E.serviceNumber', array());
    }

    public function exchangeSingleList($exchangeId) {
        return $this->db->select('SELECT * FROM exchange AS E LEFT JOIN user AS U1 ON U1.serviceNumber=E.applicant1 LEFT JOIN user AS U2 ON U2.serviceNumber=E.applicant2 LEFT JOIN user AS U3 ON U3.serviceNumber=E.serviceNumber WHERE  E.exchangeId = :exchangeId ', array('exchangeId' => $exchangeId));
    }

    public function checkVehicle($date) {
        $result = $this->db->select("SELECT date FROM amendedroster WHERE 12_20_1=:12_20_1 AND date=:date", array(':12_20_1' => 'Q', ':date' => $date));
        if (count($result) > 0) {
            echo json_encode('0');
        } else {
            echo json_encode('1');
        }
    }

    public function codeLetter($serviceNumber) {//getiing code letter to service number
        $result = $this->db->select('SELECT code FROM user WHERE  serviceNumber = :serviceNumber ', array('serviceNumber' => $serviceNumber));
        foreach ($result as $value) {
            $code = $value['code'];
        }
        return $code;
    }

    public function oneDayAmend($data) {
        $app1Code = $this->codeLetter($data['applicant1']);
        $app2Code = $this->codeLetter($data['applicant2']);
        $date11 = $data['lDate11'];
        $this->amendRoster($app1Code, $app2Code, $date11);
        $date21 = $data['lDate21'];
        $this->amendRoster($app2Code, $app1Code, $date21);
    }

    public function twoDaysAmend($data) {
        $app1Code = $this->codeLetter($data['applicant1']);
        $app2Code = $this->codeLetter($data['applicant2']);
        $date11 = $data['lDate11'];
        $this->amendRoster($app1Code, $app2Code, $date11);
        $date21 = $data['lDate21'];
        $this->amendRoster($app2Code, $app1Code, $date21);
        $date12 = $data['lDate12'];
        $this->amendRoster($app1Code, $app2Code, $date12);
        $date22 = $data['lDate22'];
        $this->amendRoster($app2Code, $app1Code, $date22);
    }

    public function threeDaysAmend($data) {
        $app1Code = $this->codeLetter($data['applicant1']);
        $app2Code = $this->codeLetter($data['applicant2']);
        $date11 = $data['lDate11'];
        $this->amendRoster($app1Code, $app2Code, $date11);
        $date21 = $data['lDate21'];
        $this->amendRoster($app2Code, $app1Code, $date21);
        $date13 = $data['lDate13'];
        $this->amendRoster($app1Code, $app2Code, $date13);
        $date23 = $data['lDate23'];
        $this->amendRoster($app2Code, $app1Code, $date23);
    }

    public function oneDayExchange($data) {
        $message = $this->db->insert('exchange', array(
            'date' => $data['date'],
            'applicant1' => $data['applicant1'],
            'exDate11' => $data['exDate11'],
            'exDate11From' => $data['exDate11From'],
            'exDate11To' => $data['exDate11To'],
            'applicant2' => $data['applicant2'],
            'exDate21' => $data['exDate21'],
            'exDate21From' => $data['exDate21From'],
            'exDate21To' => $data['exDate21To'],
            'exNumber' => $data['exNumber'],
            'serviceNumber' => $data['serviceNumber']
        ));
        return $message;
    }

    public function twoDaysExchange($data) {
        $message = $this->db->insert('exchange', array(
            'date' => $data['date'],
            'applicant1' => $data['applicant1'],
            'exDate11' => $data['exDate11'],
            'exDate11From' => $data['exDate11From'],
            'exDate11To' => $data['exDate11To'],
            'exDate12' => $data['exDate12'],
            'exDate12From' => $data['exDate12From'],
            'exDate12To' => $data['exDate12To'],
            'applicant2' => $data['applicant2'],
            'exDate21' => $data['exDate21'],
            'exDate21From' => $data['exDate21From'],
            'exDate21To' => $data['exDate21To'],
            'exDate22' => $data['exDate22'],
            'exDate22From' => $data['exDate22From'],
            'exDate22To' => $data['exDate22To'],
            'exNumber' => $data['exNumber'],
            'serviceNumber' => $data['serviceNumber']
        ));
        return $message;
    }

    public function threeDaysExchange($data) {
        $message = $this->db->insert('exchange', array(
            'date' => $data['date'],
            'applicant1' => $data['applicant1'],
            'exDate11' => $data['exDate11'],
            'exDate11From' => $data['exDate11From'],
            'exDate11To' => $data['exDate11To'],
            'exDate12' => $data['exDate12'],
            'exDate12From' => $data['exDate12From'],
            'exDate12To' => $data['exDate12To'],
            'exDate13' => $data['exDate13'],
            'exDate13From' => $data['exDate13From'],
            'exDate13To' => $data['exDate13To'],
            'applicant2' => $data['applicant2'],
            'exDate21' => $data['exDate21'],
            'exDate21From' => $data['exDate21From'],
            'exDate21To' => $data['exDate21To'],
            'exDate22' => $data['exDate22'],
            'exDate22From' => $data['exDate22From'],
            'exDate22To' => $data['exDate22To'],
            'exDate23' => $data['exDate23'],
            'exDate23From' => $data['exDate23From'],
            'exDate23To' => $data['exDate23To'],
            'exNumber' => $data['exNumber'],
            'serviceNumber' => $data['serviceNumber']
        ));
        return $message;
    }

    public function create($data) {
        $noOfDays = $data['noOfDays']; //getting number of leave applied
        switch ($noOfDays) {
            case 1:
                $message = $this->oneDayExchange($data);
                return $message;
                break;
            case 2:
                $message = $this->twoDaysExchange($data);
                return $message;
                break;
            case 3:
                $message = $this->threeDaysExchange($data);
                return $message;
                break;
        }
    }

    public function dutyTurn($from) {//getting changing turn
        switch ($from) {
            case 00:
                $dutyTurn = '04_12';
                break;
            case 04:
                $dutyTurn = '04_12';
                break;
            case 8:
                $dutyTurn = '04_12';
                break;
            case 12:
                $dutyTurn = '12_20';
                break;
            case 16:
                $dutyTurn = '12_20';
                break;
            case 20:
                $dutyTurn = '12_20';
                break;
        }
        return $dutyTurn;
    }

    public function amendRoster($app1Code, $app2Code, $date) {
        switch ($app1Code) {//selecting applicant column
            case 'A':
            case 'C':
            case 'E':
                $dutyTurn = '12_20_1';
                break;
            case 'B':
            case 'D':
            case 'F':
                $dutyTurn = '12_20_2';
                break;
        }
        $postData = array(//replasing appcode with cov code
            $dutyTurn => $app2Code,
        );
        $this->db->update('amendedroster', $postData, "date='$date'");
    }

    public function delete($exchangeId) {
        if (Session::get('role') == 'admin') {//getting delete permission to admin and initiated user
            $message = $this->db->delete('exchange', "exchangeId=$exchangeId ");
        } else {
            $message = $this->db->delete('exchange', "exchangeId=$exchangeId AND serviceNumber='{$_SESSION['serviceNumber']}'");
        }
        return $message;
    }

}
