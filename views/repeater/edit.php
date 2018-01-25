<div id="pagesBackgorund" class="row">
    <div class=" well col-lg-4">
        <div class="col-lg-12">
            <legend class="lead">Edit Microwave Repeating </legend>
        </div>
        <form method="post" class="form-horizontal container-fluid" id="repeaterForm"action="<?php echo URL; ?>repeater/editSave/<?php echo $this->repeater[0]['repeaterId']; ?>" >
            <div class="form-group">
                <div class="col-lg-4">
                     <label for="date" class="control-label"><span class="badge">Date</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="text" id="date" class="form-control datepicker" autofocus name="date" style="width: 110px" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-4">
                     <label for="txLocation" class="control-label "><span class="badge">Transmitter Location</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="text" id="txLocation" class="form-control " id="txLocation" name="txLocation"  value="<?php echo $this->repeater[0]['txLocation']; ?>" required>
                </div>

            </div>
            <div class="form-group">
                <div class="col-lg-4">
                     <label for="rxLocation" class="control-label "><span class="badge">Receiver Location</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="text" id="rxLocation" class="form-control " name="rxLocation" value="<?php echo $this->repeater[0]['rxLocation']; ?>" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-4">
                     <label for="rxFrequency" class="control-label"><span class="badge">Receiving Frequency</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="number" id="rxFrequency" class="form-control " name="rxFrequency" min="0" max="7000" value="<?php echo $this->repeater[0]['rxFrequency']; ?>" required>
                </div>

            </div>
            <div class="form-group">
                <div class="col-lg-4">
                     <label for="maxLevel" class="control-label "><span class="badge">Max Received Level</span></label>
                </div>
                <div class="col-lg-5">
                    <input type="number" id="maxLevel" class="form-control " name="maxLevel" min="0" max="150" value="<?php echo $this->repeater[0]['maxLevel']; ?>" style="width: 110px" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-4">
                     <label for="minLevel" class="control-label"><span class="badge">Min Received Level</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="number" id="minLevel" class="form-control " name="minLevel" min="0" max="150" value="<?php echo $this->repeater[0]['minLevel']; ?>"style="width: 110px" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-4">
                     <label for="remarks" class="control-label "><span class="badge">Remarks</span></label>
                </div>
                <div class="col-lg-8">
                    <textarea id="remarks" class="form-control" name="remarks"  ><?php echo $this->repeater[0]['remarks']; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                
                <div class="text-right col-lg-12">
                    <div class="btn-group" role="group" >
                        <button type="submit" class="btn btn-success">Edit <span class="glyphicon glyphicon-edit"></span></button>
                    </div>
                    <a href="<?php echo URL . 'repeater'; ?>" ><span class="glyphicon glyphicon-backward" ></span>&nbsp;Back&nbsp;<span class="glyphicon glyphicon-backward" ></span></a>
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