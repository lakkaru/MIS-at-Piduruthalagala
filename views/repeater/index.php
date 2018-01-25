<div id="pagesBackgorund" class="row">
    <div class=" well col-lg-4" >
        <div class="col-lg-12">
            <legend class="lead">Microwave Repeating </legend>
        </div>
        <form method="post" id="avgLevel" class="form-horizontal" action="<?php echo URL; ?>repeater/ajaxAvgLevel" >
            <div class="form-group">
                <div class="col-lg-4">
                    <label id="lblTxLoc" class="badge control-label">Average level form</label>
                </div>
                <div class="col-lg-5">
                    <select id="txLoc" name="txLocation" class="form-control" >
                        <option value="" disabled selected>- Tx Location -</option> 
                        <?php
                        //getting employe names from user table
                        foreach ($this->txLocations as $key => $value) {
                            echo '<option value=' . $value['txLocation'] . '>' . $value['txLocation'] . '</option>';
                        }
                        ?>                       
                    </select>
                </div>
                <div class="col-lg-02">
                    <label id="maxLevelShow" class="badge control-label"></label>
                </div>
            </div>
        </form>
        <form method="post" class="form-horizontal" action="<?php echo URL; ?>repeater/create" >
            <div class="form-group">
                <div class="col-lg-4">
                     <label for="date" class="control-label"><span class="badge">Date</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="text" id="date" class="form-control datepicker" name="date" required >
                </div>
            </div>
<!--            <div class="form-group">
                <div class=" col-lg-3">
                    <label for="rdate" class="control-label"><span class="badge">Date</span></label>
                </div>
                <div class="col-lg-4">
                    <input type="text" id="rdate" class="form-control datepicker" name="date" required/>
                </div>
            </div>-->
            <div class="form-group">
                <div class="col-lg-4">
                     <label for="txLocation" class="control-label "><span class="badge">Transmitter Location</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="text"id="txLocation"  class="form-control " name="txLocation"  required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-4">
                     <label for="rxLocation" class="control-label "><span class="badge">Receiver Location</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="text" id="rxLocation" class="form-control " name="rxLocation" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-4">
                     <label for="rxFrequency" class="control-label"><span class="badge">Receiving Frequency</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="number" id="rxFrequency" class="form-control " name="rxFrequency" min="0" max="7000" style="width: 110px" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-4">
                     <label for="maxLevel" class="control-label "><span class="badge">Max Received Level</span></label>
                </div>
                <div class="col-lg-5">
                    <input type="number" id="maxLevel" class="form-control " name="maxLevel" min="0" max="150" style="width: 110px" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-4">
                     <label for="minLevel" class="control-label"><span class="badge">Min Received Level</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="number" id="minLevel" class="form-control " name="minLevel" min="0" max="150" style="width: 110px" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-4">
                     <label for="remarks" class="control-label "><span class="badge">Remarks</span></label>
                </div>
                <div class="col-lg-8">
                    <textarea id="remarks" class="form-control" name="remarks"  ></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="text-right col-lg-6">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-success">Add&nbsp;<span class="glyphicon glyphicon-plus"></span></button>
                        <button type="reset"  class="btn btn-warning">Refresh&nbsp;<span class="glyphicon glyphicon-refresh"></span></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-8">
        <div class="row well">
            <div id="event_wrapper" class="container-fluid dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-lg-12">
                        <table id="event" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid">
                            <thead>
                                <tr role="row">
                                    <th   rowspan="1" colspan="1" >Date</th>
                                    <th    rowspan="1" colspan="1">Tx Location</th>
                                    <th    rowspan="1" colspan="1"  >Rx Location</th>
                                    <th    rowspan="1" colspan="1"  >Rx Frequency</th>
                                    <th    rowspan="1" colspan="1"  >Max Level</th>
                                    <th    rowspan="1" colspan="1"  >Min Level</th>
                                    <th class="no-sort"   rowspan="1" colspan="1"  >Remarks</th>
                                    <th class="no-sort"   rowspan="1" colspan="1"  >Edit</th>
                                    <th class="no-sort"   rowspan="1" colspan="1"  >Delete</th></tr>
                            </thead>
                            <tbody><?php
                                foreach ($this->repeaterList as $key => $value) {
                                    echo '<tr>';
                                    echo '<td>' . $value['date'] . '</td>';
                                    echo '<td>' . $value['txLocation'] . '</td>';
                                    echo '<td>' . $value['rxLocation'] . '</td>';
                                    echo '<td>' . $value['rxFrequency'] . '</td>';
                                    echo '<td>' . $value['maxLevel'] . '</td>';
                                    echo '<td>' . $value['minLevel'] . '</td>';
                                    // echo '<td>' . $value['expLevel'] . '</td>';
                                    echo '<td>' . $value['remarks'] . '</td>';
                                    echo '<td style="text-align: center;"><a href=" ' . URL . 'repeater/edit/' . $value['repeaterId'] . ' "><span class="glyphicon glyphicon-edit" style="color:blue; text-align: center"></span>';
                                    echo '<td style="text-align: center;"><a href=" ' . URL . 'repeater/Delete/' . $value['repeaterId'] . ' " class="deleteButton"><span class="glyphicon glyphicon-trash" style="color:red"></td>';
                                    echo '</tr>';
                                }
                                ?></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--<div class="col-lg-7">
    <div class="row well">
        <div id="event_wrapper" class="container-fluid dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-lg-12">
                    <table id="event" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid">
                        <thead>
                            <tr role="row">
                                <th   rowspan="1" colspan="1" >Date</th>
                                <th    rowspan="1" colspan="1">Tx Location</th>
                                <th    rowspan="1" colspan="1"  >Rx Location</th>
                                <th    rowspan="1" colspan="1"  >Rx Frequency</th>
                                <th    rowspan="1" colspan="1"  >Max Level</th>
                                <th    rowspan="1" colspan="1"  >Min Level</th>
                                <th class="no-sort"   rowspan="1" colspan="1"  >Remarks</th>
                                <th class="no-sort"   rowspan="1" colspan="1"  >Edit</th>
                                <th class="no-sort"   rowspan="1" colspan="1"  >Delete</th></tr>
                        </thead>
                        <tbody><?php
                            foreach ($this->repeaterList as $key => $value) {
                                echo '<tr>';
                                echo '<td>' . $value['date'] . '</td>';
                                echo '<td>' . $value['txLocation'] . '</td>';
                                echo '<td>' . $value['rxLocation'] . '</td>';
                                echo '<td>' . $value['rxFrequency'] . '</td>';
                                echo '<td>' . $value['maxLevel'] . '</td>';
                                echo '<td>' . $value['minLevel'] . '</td>';
                                // echo '<td>' . $value['expLevel'] . '</td>';
                                echo '<td>' . $value['remarks'] . '</td>';
                                echo '<td style="text-align: center;"><a href=" ' . URL . 'repeater/edit/' . $value['repeaterId'] . ' "><span class="glyphicon glyphicon-edit" style="color:blue; text-align: center"></span>';
                                echo '<td style="text-align: center;"><a href=" ' . URL . 'repeater/Delete/' . $value['repeaterId'] . ' " class="deleteButton"><span class="glyphicon glyphicon-trash" style="color:red"></td>';

                                echo '</tr>';
                            }
                            ?></tbody>
                    </table>
                </div>
            </div>-->
