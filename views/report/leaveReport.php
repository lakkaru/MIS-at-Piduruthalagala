<div class="row well noPrint">
    <legend class="lead col-lg-12">Applied Leave Report</legend>
    <form method="post" id="timelyReport" class="form-horizontal" action=" <?php echo URL; ?>report/selectedLeaveReport">
        <div class="form-group">
            <div class=" col-lg-2">
                <label for="applicant" class="control-label" style="float: right"><span class="badge">Applicant</span></label>
            </div>
            <div class=" col-lg-2" style="padding: 0">
                <select name="applicant" id="applicant" class="form-control" required>
                    <option value="" disabled selected>- Applicant Name -</option> 
                    <option value="Any">- Any -</option> 
                    <?php
                    //getting employe names from user table
                    foreach ($this->userList as $key => $value) {
                        echo '<option value=' . $value['serviceNumber'] . '>' . $value['name'] . '</option>';
                    }
                    ?>                         
                </select>
            </div>
            <div class=" col-lg-1">
                <label for="from" class="control-label" style="float: right"><span class="badge">From</span></label>
            </div>
            <div class=" col-lg-1" style="padding: 0">
                <input type="text" id="from" class="form-control" name="from" required>
            </div>

            <div class=" col-lg-1">
                <label for="to" class="control-label" style="float: right"><span class="badge">To</span></label>
            </div>
            <div class=" col-lg-1" style="padding: 0">
                <input type="text" id="to" class="form-control" name="to" required>
            </div>
            <div class=" col-lg-2 btn-group">
                <button type="submit" id="viewButton" class="btn btn-info">View&nbsp;<span class="glyphicon glyphicon-eye-open"></span></button>
                <button type="button" id="printButton" <?php echo($this->print) ?> class="btn btn-toolbar">Print&nbsp;<span class="glyphicon glyphicon-print"></span></button>
            </div>
        </div>
    </form>
</div>

<div id="print" >
    <div id="pagesBackgorund" class="col-lg-10">
        <div class="yesPrint">
            <legend id="printHead">Piduruthalagala Transmitter station</legend>
        </div>
        <?php
        if (!($this->selectedLeaveList == null)) {//stop showing null list
            echo '<div class="print">
            <caption><h3>Applied leave summery from ' . ($this->startDay) . ' to ' . ($this->lastDay) . '</h3></caption>
        </div>
        <table class="table table-striped table-bordered" cellspacing="0" width="100%" role="grid">       
            <thead>
                <tr role="row">
                    <!--<th   rowspan="1" colspan="1" >Date</th>-->
                    <!--<th class="no-sort"  rowspan="1" colspan="1" >Dates</th>-->
                    <th class="no-sort"  rowspan="1" colspan="1" >Applicant</th>
                    <!--<th class="no-sort"  rowspan="1" colspan="1" >Covering</th>-->
                    <!--<th class="no-sort"  rowspan="1" colspan="1" >Leave Type</th>-->
                    <th class="no-sort"  rowspan="1" colspan="1" >Casual Leave</th>
                    <th class="no-sort"  rowspan="1" colspan="1" >Duty Leave</th>
                    <th class="no-sort"  rowspan="1" colspan="1" >Lieu Leave</th>
                    <th class="no-sort"  rowspan="1" colspan="1" >Medical Leave</th>
                    <!--<th class="no-sort"  rowspan="1" colspan="1" > Leave</th>-->
                    <th class="no-sort"  rowspan="1" colspan="1" >Nopay Leave</th>
                    <th class="no-sort"  rowspan="1" colspan="1" >Vacation Leave</th>
                    <th class="no-sort" style="text-align: center;"  rowspan="1" colspan="1" >Total Leave</th>
                </tr>
            </thead>
            <tbody>';
            $usedName = '';
            foreach ($this->selectedLeaveList as $key => $value) {//getting single applicant
                $casual = 0;
                $vacation = 0;
                $medical = 0;
                $duty = 0;
                $lieu = 0;
                $nopay = 0;
                $name = $value['name']; //assigning name of applicant
                if ($usedName <> $name) {
                    foreach ($this->selectedLeaveList as $key => $value) {
                        if ($name == $value['name']) {
                            switch ($value['lType']) {
                                case 'Casual Leave':
                                    $casual = $value['SUM(noOfLeave)'];
                                    break;
                                case 'Duty Leave':
                                    $duty = $value['SUM(noOfLeave)'];
                                    break;
                                case 'Lieu Leave':
                                    $lieu = $value['SUM(noOfLeave)'];
                                    break;
                                case 'Medical Leave':
                                    $medical = $value['SUM(noOfLeave)'];
                                    break;
                                case 'Nopay Leave':
                                    $nopay = $value['SUM(noOfLeave)'];
                                    break;
                                case 'Vacation Leave':
                                    $vacation = $value['SUM(noOfLeave)'];
                                    break;
                                default:
                                    break;
                            }
                        }
                    }
                    $totalLeave = $casual + $duty + $lieu + $medical + $nopay + $vacation;
                    echo '<tr>';
                    echo '<td>' . $name . '</td>';
                    echo '<td>' . $casual . '</td>';
                    echo '<td>' . $duty . '</td>';
                    echo '<td>' . $lieu . '</td>';
                    echo '<td>' . $medical . '</td>';
                    echo '<td>' . $nopay . '</td>';
                    echo '<td>' . $vacation . '</td>';
                    echo '<td style="text-align: center;"><b>' . $totalLeave . '</b></td>';
                    echo '</tr>';
                }
                $usedName = $name;
            }
            echo '</tbody>
        </table>';
        }
        ?>
        <div class="yesPrint">
            <caption><h3>Generated on <?php echo (date('Y-m-d')); ?>.</h3></caption>
        </div>
    </div>
</div>
