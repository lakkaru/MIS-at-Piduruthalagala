<?php

class Leave_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function userList() {
        return $this->db->select('SELECT name, serviceNumber FROM user');
    }

    public function leaveList() {
//getting names from user table for applicant, covering and serviceNumber by joing tables
        return $this->db->select('SELECT * FROM appliedleave AS A LEFT JOIN user AS U1 ON U1.serviceNumber=A.applicant LEFT JOIN user AS U2 ON U2.serviceNumber=A.covering LEFT JOIN user AS U3 ON U3.serviceNumber=A.serviceNumber', array());
    }

    public function leaveSingleList($leaveId) {//for editing
        $result = $this->db->select('SELECT * FROM appliedleave AS A LEFT JOIN user AS U1 ON U1.serviceNumber=A.applicant LEFT JOIN user AS U2 ON U2.serviceNumber=A.covering LEFT JOIN user AS U3 ON U3.serviceNumber=A.serviceNumber WHERE  A.leaveId = :leaveId ', array('leaveId' => $leaveId));
        if (count($result) > 0) {
            return $result;
        } else {
            return False;
        }
    }

    public function noOfLeaveTypes($applicant) {//getting number of leave for current year from leavesymmery view
        $year = date('Y');
        $casualresult = $this->db->select('SELECT  SUM(noOfLeave) FROM leavesummery WHERE serviceNumber=:applicant AND lType=:lType AND lDate LIKE :year ', array(':applicant' => $applicant, ':lType' => 'Casual Leave', ':year' => "$year%"));
        $vacationresult = $this->db->select('SELECT SUM(noOfLeave) FROM leavesummery WHERE serviceNumber=:applicant AND lType=:lType AND lDate LIKE :year', array(':applicant' => $applicant, ':lType' => 'Vacation Leave', ':year' => "$year%"));
        $Medicalresult = $this->db->select('SELECT SUM(noOfLeave) FROM leavesummery WHERE serviceNumber=:applicant AND lType=:lType AND lDate LIKE :year', array(':applicant' => $applicant, ':lType' => 'Medical Leave', ':year' => "$year%"));
        if ($casualresult[0]['SUM(noOfLeave)'] > 0) {//for gauge chart
            $casual = $casualresult[0]['SUM(noOfLeave)'];
        } else {
            $casual = 0;
        }
        if ($vacationresult[0]['SUM(noOfLeave)'] > 0) {
            $vaction = $vacationresult[0]['SUM(noOfLeave)'];
        } else {
            $vaction = 0;
        }
        if ($Medicalresult[0]['SUM(noOfLeave)'] > 0) {
            $medical = $Medicalresult[0]['SUM(noOfLeave)'];
        } else {
            $medical = 0;
        }
        $noOfLeave = array('casual' => $casual, 'vacation' => $vaction, 'medical' => $medical);
        return $noOfLeave;
    }

    public function codeLetter($serviceNumber) {//getiing code letter to service number
        $result = $this->db->select('SELECT code FROM user WHERE  serviceNumber = :serviceNumber ', array('serviceNumber' => $serviceNumber));
        foreach ($result as $value) {
            $code = $value['code'];
        }
        return $code;
    }

    public function oneDayAmend($data) {
        $appCode = $this->codeLetter($data['applicant']);
        $covCode = $this->codeLetter($data['covering']);
        $date1 = $data['lDate1'];
        $this->amendRoster($appCode, $covCode, $date1);
    }

    public function twoDaysAmend($data) {
        $appCode = $this->codeLetter($data['applicant']);
        $covCode = $this->codeLetter($data['covering']);
        $date1 = $data['lDate1'];
        $this->amendRoster($appCode, $covCode, $date1);
        $date2 = $data['lDate2'];
        $this->amendRoster($appCode, $covCode, $date2);
    }

    public function threeDaysAmend($data) {
        $appCode = $this->codeLetter($data['applicant']);
        $covCode = $this->codeLetter($data['covering']);
        $date1 = $data['lDate1'];
        $this->amendRoster($appCode, $covCode, $date1);
        $date3 = $data['lDate3'];
        $this->amendRoster($appCode, $covCode, $date3);
    }

    public function oneDayLeave($data) {
        $message = $this->db->insert('appliedleave', array(
            'applicant' => $data['applicant'],
            'covering' => $data['covering'],
            'lDate1' => $data['lDate1'],
            'from1' => $data['from1'],
            'to1' => $data['to1'],
            'serviceNumber' => $data['serviceNumber'],
            'date' => $data['date'],
            'lNumber' => $data['lNumber'],
            'noOfLeave' => $data['noOfLeaveDays'],
            'lType' => $data['lType'],
        ));
        $this->oneDayAmend($data);
        return $message;
    }

    public function twoDaysLeave($data) {
        $message = $this->db->insert('appliedleave', array(
            'applicant' => $data['applicant'],
            'covering' => $data['covering'],
            'lDate1' => $data['lDate1'],
            'from1' => $data['from1'],
            'to1' => $data['to1'],
            'lDate2' => $data['lDate2'],
            'from2' => $data['from2'],
            'to2' => $data['to2'],
            'serviceNumber' => $data['serviceNumber'],
            'date' => $data['date'],
            'lNumber' => $data['lNumber'],
            'noOfLeave' => $data['noOfLeaveDays'],
            'lType' => $data['lType']
        ));
        $this->twoDaysAmend($data);
        return $message;
    }

    public function threeDaysLeave($data) {
        $message = $this->db->insert('appliedleave', array(
            'applicant' => $data['applicant'],
            'covering' => $data['covering'],
            'lDate1' => $data['lDate1'],
            'from1' => $data['from1'],
            'to1' => $data['to1'],
            'lDate2' => $data['lDate2'],
            'from2' => $data['from2'],
            'to2' => $data['to2'],
            'lDate3' => $data['lDate3'],
            'from3' => $data['from3'],
            'to3' => $data['to3'],
            'serviceNumber' => $data['serviceNumber'],
            'date' => $data['date'],
            'lNumber' => $data['lNumber'],
            'noOfLeave' => $data['noOfLeaveDays'],
            'lType' => $data['lType']
        ));
        $this->threeDaysAmend($data);
        return $message;
    }

    public function checkVehicle($date) {
        $result = $this->db->select("SELECT date FROM amendedroster WHERE 12_20_1=:12_20_1 AND date=:date", array(':12_20_1' => 'Q', ':date' => $date));
        if (count($result) > 0) {
            echo json_encode('0');
        } else {
            echo json_encode('1');
        }
    }

    public function create($data) {
        $noOfDays = $data['noOfDays']; //getting number of leave applied
        switch ($noOfDays) {
            case 1:
                return $this->oneDayLeave($data);
                break;
            case 2:
                return $this->twoDaysLeave($data);
                break;
            case 3:
                return $this->threeDaysLeave($data);
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

    public function amendRoster($appCode, $covCode, $date) {
        switch ($appCode) {//selecting applicant column
            case 'A':
            case 'C':
            case 'E':
            case 'O':
                $dutyTurn = '12_20_1';
                break;
            case 'B':
            case 'D':
            case 'F':
                $dutyTurn = '12_20_2';
                break;
        }
        $postData = array(//replasing appcode with cov code
            $dutyTurn => $covCode,
        );
        $this->db->update('amendedroster', $postData, "date='$date'");
    }

    public function delete($leaveId) {
        if (Session::get('role') == 'admin') {//getting delete permission to admin and initiated user
            $message = $this->db->delete('appliedleave', "leaveId=$leaveId ");
        } else {
            $message = $this->db->delete('appliedleave', "leaveId=$leaveId AND serviceNumber='{$_SESSION['serviceNumber']}'");
            return $message;
        }
        return $message;
    }

}
