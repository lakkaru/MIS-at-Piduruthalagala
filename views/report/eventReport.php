<div class="row well noPrint">
    <legend class="lead col-lg-12">Equipment Event Report</legend>
    <form method="post" id="timelyReport" class="form-horizontal" action=" <?php echo URL; ?>report/selectedEventReport">
        <div class="form-group">
            <div class=" col-lg-1">
                <label for="equipment" class="control-label" style="float: right"><span class="badge">Equipment</span></label>
            </div>
            <div class=" col-lg-1" style="padding: 0">
                <select name="equipment" id="equipment" class="form-control" required>
                    <option disabled selected value="">-- Select --</option>
                    <option value="All-equipments">All</option>
                    <option value="STL">STL</option>
                    <option value="PCN1620">PCN1620SSPH/1</option>
                    <option value="NM7200V">NM7200V</option>
                    <option value="Co-Axial">Co-Axial</option>
                    <option value="Antenna">Antenna</option>
                    <option value="UPS">UPS</option>
                    <option value="Generator">Generator</option>
                    <option value="Other">Other</option>                           
                </select>
            </div>
            <div class=" col-lg-1">
                <label for="event" class="control-label" style="float: right"><span class="badge">Event</span></label>
            </div>
            <div class=" col-lg-1" style="padding: 0">
                <select name="event" id="event" class="form-control" required>
                    <option disabled selected value="" >-- Select --</option>
                    <option value="All-events">All</option>
                    <option value="Maintenance">Maintenance</option>
                    <option value="Fault">Fault</option>
                    <option value="Repair">Repair</option>
                    <option value="Expansion">Expansion</option>
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
                <input type="text" id="to" class="form-control" name="to"  required>
            </div>
            <div class=" col-lg-2 btn-group">
                <button type="submit" id="viewButton" class="btn btn-info">View&nbsp;<span class="glyphicon glyphicon-eye-open"></span></button>
                <button type="button" id="printButton" <?php echo($this->print) ?> class="btn btn-toolbar">Print&nbsp;<span class="glyphicon glyphicon-print"></span></button>
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
        if (!($this->eventList) == '') {
            echo '<div class="print">
            <caption><h3>' . ($this->equipment) . ' ' . ($this->event) . ' from ' . ($this->startDay) . ' to ' . ($this->lastDay) . '</h3></caption>
            </div>
            <table class="table table-striped table-bordered" cellspacing="0" width="100%" role="grid">
            <thead>
            <tr role="row">
            <th   rowspan="1" colspan="1" >Date</th>
            <th class="no-sort"  rowspan="1" colspan="1" >Description</th>
            </tr>
            </thead>
            <tbody>';
            foreach ($this->eventList as $key => $value) {
                echo '<tr>';
                echo '<td>' . $value['date'] . '</td>';
                echo '<td>' . $value['description'] . '</td>';
                echo '</tr>';
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
