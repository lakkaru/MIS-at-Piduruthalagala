<?php

class Index_Model extends Model {
   
    public function __construct() {
        parent::__construct();
    }

    public $dieselMsg; //for information loss in diesel stock message

    public function fiveNotice() {

        return $this->db->select('SELECT * FROM notice ORDER BY date DESC LIMIT 5', array());
    }

    public function fiveMtce() {//for display
        $today = date('Y/m/d');
        return $this->db->select('SELECT * FROM mtce WHERE nextDate>=:date ORDER BY nextDate LIMIT 5', array('date' => $today));
    }

    public function pastMtce() {
        $today = date('Y/m/d');
        $result = $this->db->select('SELECT * FROM mtce WHERE nextDate<=:date ORDER BY nextDate LIMIT 5', array('date' => $today));
        if ($result) {//checking if dates available for modal loading
            return $result;
        } else {
            return FALSE;
        }
    }

    public function doneMtce($mtceId) {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
            $this->db->delete('mtce', "mtceId=$mtceId ");
        }
    }

    public function dieselStock() {//last added diesel stock
        $diesel = $this->db->select('SELECT * FROM diesel ORDER BY date DESC LIMIT 1', array());
        if (count($diesel) > 0) {
            foreach ($diesel as $key => $value) {
                $stock = $value['stock'];
                $amount = $value['amount'];
                $stockDate = $value['date'];
                $totalStock = $stock + $amount;
                $dieselStock = array(
                    'totalStock' => $totalStock,
                    'stockDate' => $stockDate);
            }
        } else {
            $dieselStock = 0;
        }
        return $dieselStock;
    }

    public function updatedHours() {//getting genrunning on last updated diesel stock date
        $dieselStock = $this->dieselStock();
        $stockDate = $dieselStock['stockDate'];
        $updatedRunning = $this->db->select('SELECT hours FROM genrunning WHERE date=:date LIMIT 1', array('date' => $stockDate));
        if ($updatedRunning) {
            $updatedHours = $updatedRunning[0]['hours'];
            return $updatedHours;
        } else {
            $this->dieselMsg = 'Check generator running hours on ' . $stockDate . ' for correct diesel stock value.';
            return $this->endHours();
        }
    }

    public function preFirstDay() {
//for first day of last month
        $firstDayLastMonth = new DateTime();
        $firstDayLastMonth->modify("first day of previous month");
        return $firstDayLastMonth->format("Y/m/d");
    }

    public function thisFirstDay() {
//for first day of this month
        $firstDayThisMonth = new DateTime();
        $firstDayThisMonth->modify("first day of this month");
        return $firstDayThisMonth->format("Y/m/d");
    }

    public function stratHours() {
        $firstRunning = $this->db->select('SELECT hours FROM genrunning WHERE date=:date LIMIT 1', array('date' => $this->preFirstDay()));
        if (count($firstRunning) == 0) {
            $this->dieselMsg = 'No generator running hour infromation on first day of last month for approximate diesel stock.';
            $startHours = 0;
        } else {
            $startHours = $firstRunning[0]['hours'];
        }
        return $startHours;
    }

    public function startStock() {
//start diesel stock of last month
        $firstStock = $this->db->select('SELECT stock, amount FROM diesel WHERE date=:date LIMIT 1', array('date' => $this->preFirstDay()));
        if (count($firstStock) == 0) {
            $this->dieselMsg = 'No diesel stock infromation on first day of the last month for approximate diesel stock.';
            $stratStock = 0;
        } else {
            $stratStock = $firstStock[0]['amount'] + $firstStock[0]['stock'];
        }
        return $stratStock;
    }

    public function endHours() {
//start running hours of this month
        $lastRunning = $this->db->select('SELECT hours FROM genrunning WHERE date=:date LIMIT 1', array('date' => $this->thisFirstDay()));
        if (count($lastRunning) == 0) {
            $this->dieselMsg = 'No generator running hour infromation on first day of this month for approximate diesel stock.';
            $endHours = 0;
        } else {
            $endHours = $lastRunning[0]['hours'];
        }

        return $endHours;
    }

    public function endStock() {
//start diesel stock of this month
        $lastStock = $this->db->select('SELECT stock, amount FROM diesel WHERE date=:date LIMIT 1', array('date' => $this->thisFirstDay()));
        if (count($lastStock) == 0) {
            $this->dieselMsg = 'No diesel stock infromation on first day of this month for approximate diesel stock.';
            $endStock = 0;
        } else {
            $endStock = $lastStock[0]['amount'] + $lastStock[0]['stock'];
        }
        return $endStock;
    }

    public function monthHours() {
//running hours of this month up to today
        $running = $this->db->select('SELECT hours FROM genrunning ORDER BY date DESC LIMIT 1', array());
        if (count($running) == 0) {
            $this->dieselMsg = 'No generator running hour infromation for approximate diesel stock.';
            $monthRunning = 0;
        } else {

            $monthRunning = $running[0]['hours'] - $this->updatedHours();
        }
        if ($monthRunning >= 0) {
            return $monthRunning;
        } else {
            return 0;
        }
    }

    public function monthConsumption() {
        $lastMonthConsum = $this->startStock() - $this->endStock(); //last month diesel consumption
        return $lastMonthConsum;
    }

    public function approxConsum() {
        $lastMonthTotalHours = $this->endHours() - $this->stratHours(); //last month total running hours
        if ($lastMonthTotalHours <= 0) {
            $aproxConsumRate = 25;
        } else {
            $aproxConsumRate = $this->monthConsumption() / $lastMonthTotalHours; //last month approximate consumption rate
        }
        $approxConsum = ($aproxConsumRate) * ($this->monthHours());
        return $approxConsum;
    }

    public function approxStock() {
        $today = date('Y/m/d');
        $result = $this->db->select('SELECT stock, amount FROM diesel WHERE date=:date', array('date' => $today));
        if (count($result) > 0) {
            foreach ($result as $key => $value) {
                $stock = $value['stock'];
                $amount = $value['amount'];
            }
            $approxStock = $stock + $amount;
        } else {
            $dieselStock = $this->dieselStock();
            $totalStock = $dieselStock['totalStock'];
            $approxStock = $totalStock - $this->approxConsum();
        }
        if ($approxStock <= 0) {
            $approxStock = 0;
            $this->dieselMsg = 'No required infromation for approximate diesel stock.';
        }
        return $approxStock;
    }

}

