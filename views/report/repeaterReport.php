<div class="row well noPrint">
    <legend class="lead col-lg-12">Microwave Repeating Report</legend>
    <form method="post" id="timelyReport" class="form-horizontal" action=" <?php echo URL; ?>report/selectedRepeaterReport">
        <div class="form-group">
            <div class=" col-lg-2">
                <label for="txLocation" class="control-label" style="float: right"><span class="badge">Transmitting Location</span></label>
            </div>
            <div class=" col-lg-2" style="padding: 0">
                <select name="txLocation" id="txLocation" class="form-control" required>
                    <option value="" disabled selected>- Tx Location -</option> 
                    <option value="All">- All -</option> 
                    <?php
                    //getting employe names from user table
                    foreach ($this->txLocations as $key => $value) {
                        echo '<option value=' . $value['txLocation'] . '>' . $value['txLocation'] . '</option>';
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
    <div id="pagesBackgorund" class="col-lg-9">
        <div class="yesPrint">
            <legend id="printHead">Piduruthalagala Transmitter station</legend>
        </div>
        <?php if(!$this->repeaterList==''){
        echo '<div class="print">
            <caption><h3>Microwave repeating from '. ($this->startDay).' to '.($this->lastDay).' -Tx Location :- '.($this->txLocation).'</h3></caption>
        </div>
        <table class="table table-striped table-bordered" cellspacing="0" width="100%" role="grid">       
            <thead>
                <tr role="row">
                    <th   rowspan="1" colspan="1" >Date</th>
                    <th class="no-sort"  rowspan="1" colspan="1" >Tx-Location</th>
                    <th class="no-sort"  rowspan="1" colspan="1" >Rx-Location</th>
                    <th class="no-sort"  rowspan="1" colspan="1" >Rx-Frequency</th>
                    <th class="no-sort"  rowspan="1" colspan="1" >Max Level</th>
                    <th class="no-sort"  rowspan="1" colspan="1" >Min-Level</th>
                    <th class="no-sort"  rowspan="1" colspan="1" >Remarks</th>
                    </tr>
            </thead>
            <tbody>';
                foreach ($this->repeaterList as $key => $value) {
                    echo '<tr>';
                    echo '<td>' . $value['date'] . '</td>';
                    echo '<td>' . $value['txLocation'] . '</td>';
                    echo '<td>' . $value['rxLocation'] . '</td>';
                    echo '<td>' . $value['rxFrequency'] . '</td>';
                    echo '<td>' . $value['maxLevel'] . '</td>';
                    echo '<td>' . $value['minLevel'] . '</td>';
                    echo '<td>' . $value['remarks'] . '</td>';
                    echo '</tr>';
                }
                
            echo '</tbody>
        </table>';
    }?>
        <div class="yesPrint">
            <caption><h3>Generated on <?php echo (date('Y-m-d')); ?>.</h3></caption>
        </div>
    </div>
</div>
