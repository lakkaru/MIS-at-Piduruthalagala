<div class="row well noPrint">
    <legend class="lead col-lg-12">Diesel Supply Report</legend>
    <form method="post" id="timelyReport" class="form-horizontal" action=" <?php echo URL; ?>report/selectedDieselReport">
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
                <button type="button" id="printButton" <?php echo($this->print) ?> class="btn btn-toolbar">Print&nbsp;<span class="glyphicon glyphicon-print"></span></button>
            </div>
        </div>
    </form>
</div>

<div id="print">
    <div id="pagesBackgorund" class="col-lg-6">
        <div class="yesPrint">
            <legend id="printHead">Piduruthalagala Transmitter station</legend>
        </div>
        <?php
        if (!$this->dieselList == '') {
            echo '<div class="print">
            <caption><h3>Diesel Supplying report from ' . ($this->startDay) . ' to ' . ($this->lastDay) . '</h3></caption>
        </div>
        <table class="table table-striped table-bordered" cellspacing="0" width="100%" role="grid">     
                <thead
                <tr role="row">
                <th   rowspan="1" colspan="1" >Date</th>
                <th class="no-sort"  rowspan="1" colspan="1" >Supplied Amount</th>
                </tr>
                </thead>
                <tbody>';
            $total = 0;
            foreach ($this->dieselList as $key => $value) {
                echo '<tr>';
                echo '<td>' . $value['date'] . '</td>';
                echo '<td>' . $value['amount'] . ' Litres</td>';
                echo '</tr>';
                $total +=$value['amount'];
            }

            echo '<tr><th style=text-align:center>Total</th>
                <th>' . $total . ' Litres</th></tr>
                </tbody>
        </table>';
        }
        ?>
        <div class="yesPrint">
            <caption><h3>Generated on <?php echo (date('Y-m-d')); ?>.</h3></caption>
        </div>
    </div>
</div>
