<div id="pagesBackgorund">
    <div class="row well noPrint">
        <legend class="lead col-lg-12">Staff Notice Report</legend>
        <form method="post" id="timelyReport" class="form-horizontal" action=" <?php echo URL; ?>report/selectedNoticeReport">
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
                    <button type="button" id="printButton" <?php echo($this->print) ?> class="btn btn-toolbar" >Print&nbsp;<span class="glyphicon glyphicon-print"></span></button>
                </div>
            </div>
        </form>
    </div>

    <div id="print">
        <div id="pagesBackgorund" class="col-lg-12">
            <div class="yesPrint">
                <legend id="printHead">Piduruthalagala Transmitter station</legend>
            </div>
            <?php
            if (!$this->noticeList == '') {
                echo '  <div class="Print">
                            <caption><h3>Staff Notices report from ' . ($this->startDay) . ' to ' . ($this->lastDay) . '</h3></caption>
                        </div>
                    <table class="table table-striped table-bordered" cellspacing="0" width="100%" role="grid">        
                <thead>
                <tr role="row">
                <th   rowspan="1" colspan="1" >Date</th>
                <th class="no-sort"  rowspan="1" colspan="1" >Description</th>
                <th class="no-sort"  rowspan="1" colspan="1" style="width: 170px;">Added By</th>
                </tr>
                </thead>
                <tbody>';
                foreach ($this->noticeList as $key => $value) {
                    echo '<tr>';
                    echo '<td>' . $value['date'] . '</td>';
                    echo '<td>' . $value['description'] . '</td>';
                    echo '<td>' . $value['name'] . '</td>';
//                        echo '<td style="text-align: center;"><a href=" ' . URL . 'notice/edit/' . $value['noticeId'] . ' "><span class="glyphicon glyphicon-edit" style="color:blue; text-align: center"></span>';
//                        echo '<td style="text-align: center;"><a href=" ' . URL . 'notice/Delete/' . $value['noticeId'] . ' " class="deleteButton"><span class="glyphicon glyphicon-trash" style="color:red"></td>';
                    echo '</tr>';
                }
                echo '</tbody>';
            }
            
            echo '</table>';
            ?>
            <div class="yesPrint">
                <caption><h3>Generated on <?php echo (date('Y-m-d')); ?>.</h3></caption>
            </div>
        </div>
    </div>
</div>
