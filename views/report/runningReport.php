<div class="row well noPrint">
    <legend class="lead col-lg-12">Running Hours Report</legend>
    <form method="post" id="timelyReport" class="form-horizontal" action=" <?php echo URL; ?>report/selectedRunningReport">
        <div class="form-group">
           <div class=" col-lg-1">
                <label for="from" class="control-label"><span class="badge">From</span></label>
            </div>
            <div class=" col-lg-2">
                <input type="text" id="from" class="form-control" name="from" required>
            </div>
            <div class=" col-lg-1">
                <label for="to" class="control-label" ><span class="badge">To</span></label>
            </div>
            <div class=" col-lg-2">
                <input type="text" id="to" class="form-control" name="to" required>
            </div>
            <div class=" col-lg-2 btn-group">
                <button type="submit" id="viewButton" class="btn btn-info">View&nbsp;<span class="glyphicon glyphicon-eye-open"></span></button>
                <button type="button" id="printButton" <?php echo($this->print) ?> class="btn btn-toolbar" onclick="PrintMe('print');">Print&nbsp;<span class="glyphicon glyphicon-print"></span></button>
            </div>
        </div>
    </form>
</div>

<div id="print" >
    <div id="pagesBackgorund" class="col-lg-6">
        <div class="yesPrint">
            <legend id="printHead">Piduruthalagala Transmitter station</legend>
        </div>
        <?php
        if (!($this->runningSingleList)=='') {
            echo '<div class="print">
            <caption><h3>Running Hours from '. ($this->startDay).' to '. ($this->lastDay).'</h3></caption>
        </div>
        <table class="table table-striped table-bordered" cellspacing="0" width="100%" role="grid">
            <tbody>';
            foreach ($this->runningSingleList as $key => $value) {
                if ($value['rHours'] == '') {
                    $rHours = 0;
                } else {
                    $rHours = $value['rHours'];
                }
                if ($value['eHours'] == '') {
                    $eHours = 0;
                } else {
                    $eHours = $value['eHours'];
                }
                echo '<tr><th>Rupavahini hours</th><td>' . $rHours . ' hours</td></tr>';
                echo '<tr><th>Channel Eye hours</th><td>' . $eHours . ' hours</td></tr>';
                echo '<tr><th>Generator hours/minutes</th><td>' . floor($value['gHours']) . ' hours and ' . round(($value['gHours'] - floor($value['gHours'])) * 60) . ' minutes</td></tr>';
            }
            echo '</tbody>
        </table>';
        }
        ?>
    </div>
    <div class="yesPrint">
        <caption><h3>Generated on <?php echo (date('Y-m-d')); ?>.</h3></caption>
    </div>
</div>

