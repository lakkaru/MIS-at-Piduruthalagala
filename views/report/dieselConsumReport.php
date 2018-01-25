<div class="row well noPrint">
    <legend class="lead col-lg-12">Diesel Consumption Report</legend>
    <form method="post" id="timelyReport" class="form-horizontal" action=" <?php echo URL; ?>report/selectedConsumReport">
        <div class="form-group">
            <div class=" col-lg-1">
                <label for="monthDis" class="control-label"><span class="badge">For the </span></label>
            </div>
            <div class=" col-lg-2">
                <input type="text" id="monthDis" class="form-control" readonly name="monthDis" required>
            </div>
            <div class=" col-lg-2" hidden>
                <input type="text" id="start" class="form-control"  name="start">
            </div>
            <div class=" col-lg-2" hidden>
                <input type="text" id="next" class="form-control"  name="next">
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
        <?php if((!$this->consumption==null)){
        echo '<div class="print">
            <caption><h3>Diesel Consumption report for '.($this->month).'</h3></caption>
        </div>
        <table class="table table-striped table-bordered" cellspacing="0" width="100%" role="grid">
            <tbody>';
                $consumption=$this->consumption;
                $gHours=$this->genRunning/60;
                $gMinutes=($gHours-floor($gHours))*60;
                if(!$gHours==0){
                $rate=$consumption/$gHours;
                }else{
                    $rate=0;
                }
                    echo '<tr><th>Diesel Consumption</th><td>' . $consumption . ' litres</td></tr>';
                    echo '<tr><th>Generator Running Hours</th><td>' .floor($gHours) . ' hours '.  round($gMinutes).' minutes</td></tr>';
                    echo '<tr><th>Diesel Consumption rate of generator</th><td>' . round($rate) . ' litres per hour</td></tr>';

//                        echo '<td>' . $value['name'] . '</td>';
//                        echo '<td style="text-align: center;"><a href=" ' . URL . 'notice/edit/' . $value['noticeId'] . ' "><span class="glyphicon glyphicon-edit" style="color:blue; text-align: center"></span>';
//                        echo '<td style="text-align: center;"><a href=" ' . URL . 'notice/Delete/' . $value['noticeId'] . ' " class="deleteButton"><span class="glyphicon glyphicon-trash" style="color:red"></td>';
                    echo '</tr>';
//                    $total = $total + $value['amount'];
//                }
//                echo '<tr><th style=text-align:center>Total</th>';
//                echo '<th>' . $total . ' Litres</th></tr>';
                

            echo '</tbody>
        </table>';
    }?>
        <div class="yesPrint">
            <caption><h3>Generated on <?php echo (date('Y-m-d')); ?>.</h3></caption>
        </div>
    </div>
</div>
