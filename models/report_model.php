<?php

class Report_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function selctedNoticeList($data) {
        if (isset($data['from']) && isset($data['to'])) {
            return $this->db->select("SELECT * FROM notice AS A JOIN user AS U ON U.serviceNumber=A.serviceNumber WHERE date>=:from AND date<=:to ORDER BY date", array(':from' => $data['from'], ':to' => $data['to']));
        } else {
            return $this->db->select("SELECT * FROM notice AS A JOIN user AS U ON U.serviceNumber=A.serviceNumber ORDER BY date", array());
        }
    }

    public function selectedDieselList($data) {
        if (isset($data['from']) && isset($data['to'])) {
            return $this->db->select("SELECT * FROM diesel AS A JOIN user AS U ON U.serviceNumber=A.serviceNumber WHERE date>=:from AND date<=:to AND amount<>:amount ORDER BY date", array(':from' => $data['from'], ':to' => $data['to'], ':amount' => 0));
        } else {
            return $this->db->select("SELECT * FROM diesel AS A JOIN user AS U ON U.serviceNumber=A.serviceNumber ORDER BY date", array());
        }
    }

    public function dieselConsumption($data) {
        $start = $data['start'];
        $next = $data['next'];
        $first = $this->db->select("SELECT stock FROM diesel WHERE date=:month", array(':month' => "$start"));
        $end = $this->db->select("SELECT stock FROM diesel WHERE date=:month", array(':month' => "$next"));
        $supply = $this->db->select("SELECT amount FROM diesel WHERE date >:start AND date <:next", array(':start' => "$start", ':next' => "$next"));
        if (!($first == null)) {
            $startStock = $first[0]['stock'];
        } else {
            $startStock = 0;
        }
        if (!($end == null)) {
            $endStock = $end[0]['stock'];
        } else {
            $endStock = 0;
        }
        if (!($supply == null)) {
            $supplyAmount = $supply[0]['amount'];
        } else {
            $supplyAmount = 0;
        }
        $result = $startStock - $endStock + $supplyAmount;
        return $result;
    }

    public function genRunning($data) {
        $start = $data['start'];
        $next = $data['next'];
        $first = $this->db->select("SELECT hours,minutes FROM genrunning WHERE date=:month", array(':month' => "$start"));
        $end = $this->db->select("SELECT hours,minutes FROM genrunning WHERE date=:month", array(':month' => "$next"));
        if (!($first == null)) {
            $startMinutes = (($first[0]['hours']) * 60) + ($first[0]['minutes']);
        } else {
            $startMinutes = 0;
        }
        if (!($end == null)) {
            $endMinutes = (($end[0]['hours']) * 60) + ($end[0]['minutes']);
        } else {
            $endMinutes = 0;
        }
        $result = $endMinutes - $startMinutes;
        return $result;
    }

    public function selectedSingleRunninglList($data) {
        if (isset($data['from']) && isset($data['to'])) {
            return $this->db->select("SELECT SUM(ru) As rHours, SUM(ey) As eHours, (SUM(gem)/60) As gHours FROM runninghours WHERE date>=:from AND date<=:to ", array(':from' => $data['from'], ':to' => $data['to']));
        }
    }

    public function selectedMtceList($data) {
        if (isset($data['from']) && isset($data['to'])) {
//            echo$data['equipment'];die;
            $equipment=$data['equipment'];
            return $this->db->select("SELECT * FROM mtce WHERE equipment=:equipment AND nextDate>=:from AND nextDate<=:to ORDER BY nextDate", array('equipment'=>$data['equipment'], ':from' => $data['from'], ':to' => $data['to']));
        } else {
            return $this->db->select("SELECT * FROM mtce ORDER BY date", array());
        }
    }

    public function selectedEventList($data) {
        $equipment = $data['equipment'];
        $event = $data['event'];
        if (isset($data['from']) && isset($data['to'])) {
            if ($equipment == 'All-equipments' && $event == 'All-events') {
                return $this->db->select("SELECT * FROM event WHERE date>=:from AND date<=:to ORDER BY date", array(':from' => $data['from'], ':to' => $data['to']));
            }
            if ($equipment == 'All-equipments' && $event <> 'All-events') {
                return $this->db->select("SELECT * FROM event WHERE event=:event AND date>=:from AND date<=:to ORDER BY date", array(':event' => $event, ':from' => $data['from'], ':to' => $data['to']));
            }
            if ($equipment <> 'All-equipments' && $event == 'All-events') {
                return $this->db->select("SELECT * FROM event WHERE equipment=:equipment AND date>=:from AND date<=:to ORDER BY date", array(':equipment' => $equipment, ':from' => $data['from'], ':to' => $data['to']));
            }
            if ($equipment <> 'All-equipments' && $event <> 'All-events') {
                return $this->db->select("SELECT * FROM event WHERE equipment=:equipment AND event=:event AND date>=:from AND date<=:to ORDER BY date", array(':equipment' => $equipment, ':event' => $event, ':from' => $data['from'], ':to' => $data['to']));
            }
        } else {
            return $this->db->select("SELECT * FROM event ORDER BY date", array());
        }
    }

    public function txLocations() {
        return $this->db->select('SELECT  txLocation, repeaterId FROM repeater GROUP BY txLocation', array());
    }

    public function selectedRepeaterList($data) {
        $txLocation = $data['txLocation'];
        if (isset($data['from']) && isset($data['to'])) {
            if ($txLocation == 'All') {
                return $this->db->select("SELECT * FROM repeater WHERE date>=:from AND date<=:to ORDER BY date", array(':from' => $data['from'], ':to' => $data['to']));
            } else {
                return $this->db->select("SELECT * FROM repeater WHERE txLocation=:txLocation AND date>=:from AND date<=:to ORDER BY date", array(':txLocation' => $txLocation, ':from' => $data['from'], ':to' => $data['to']));
            }
        } else {
            return $this->db->select("SELECT * FROM repeater ORDER BY date", array());
        }
    }

    public function userList() {
        return $this->db->select('SELECT  name, serviceNumber FROM user', array());
    }

    public function selectedLeaveList($data) {
        $from = "'" . $data['from'] . "'";
        $to = "'" . $data['to'] . "'";
        $applicant = $data['applicant'];
        if (isset($data['from']) && isset($data['to'])) {
            if ($applicant == 'Any') {
                return $this->db->select("SELECT  name, lType, SUM(noOfLeave) FROM leavesummery WHERE lDate BETWEEN $from AND $to GROUP BY  name,lType", array());
            } else {
                return $this->db->select("SELECT  name, lType, SUM(noOfLeave) FROM leavesummery WHERE serviceNumber=:applicant AND lDate BETWEEN $from AND $to GROUP BY lType", array(':applicant' => $applicant));
            }
        } else {
            return $this->db->select("SELECT * FROM appliedleave ORDER BY date", array());
        }
    }

}

