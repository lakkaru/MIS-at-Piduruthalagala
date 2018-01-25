<!--for vehicle availability dialog-->
<div id="vehicle" hidden title="Warning">
    <p style="position:absolute" id="reserveMsg">test</p>
</div>
<?php // echo 'Leave index';?>
<div id="pagesBackgorund" class="row container-fluid">
    <div class="col-lg-5 well">     
        <div class="col-lg-12">
            <legend class="lead">Leave Application</legend>
        </div> 
        <form method="post" id="leaveForm"class="form-horizontal" action="<?php echo URL; ?>leave/create" >
            <div class="form-group">
                <div class="col-lg-4 ">
                    <label for="applicant" class="control-label "><span class="badge">Applicant</span></label>
                </div>
                <div class="col-lg-8">
                    <select id="applicant" name="applicant" class="form-control" required><!for leave date1 duty turn from-->
                        <option value="" disabled selected>-- Select Name --</option> 
                        <?php
                        //getting employe names from user table
                        foreach ($this->userList as $key => $value) {
                            echo '<option value=' . $value['serviceNumber'] . '>' . $value['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-4 ">
                    <label for="lType" class="control-label "><span class="badge">Leave Type</span></label>
                </div>
                <div class="col-lg-8">
                    <select id="lType" name="lType" class="form-control" style="padding: 0" required>
                        <option value="" selected disabled>- Select Leave Type -</option>
                        <option value="Casual Leave">Casual Leave</option>
                        <option value="Vacation Leave">Vacation Leave</option>
                        <option value="Medical Leave">Medical Leave</option>
                        <option value="Duty Leave">Duty Leave</option>
                        <option value="Lieu Leave">Lieu Leave</option>
                        <option value="Nopay Leave">Nopay</option>
                    </select>
                </div>
            </div>  
            <div class="form-group">
                <div class="col-lg-4 ">
                    <label for="covering" class="control-label"><span class="badge">Duty Covered By</span></label>
                </div>
                <div class="col-lg-8">
                    <select id="covering" name="covering" class="form-control" required>
                        <option value="" disabled selected>-- Select Name --</option> 
                        <?php
                        //getting employe names from user table
                        foreach ($this->userList as $key => $value) {
                            echo '<option value=' . $value['serviceNumber'] . '>' . $value['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-4 ">
                    <label for="noOfLeaveDays" class="control-label "><span class="badge">No of Days</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="number" id="noOfLeaveDays" class="form-control" name="noOfLeaveDays" min="1" style="width: 100px" required/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-4 ">
                    <label for="lNumber" class="control-label "><span class="badge">Leave Number</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="number" id="lNumber" class="form-control" name="lNumber" style="width: 100px" required/>
                </div>
            </div>
            
            
            <div class="form-group hidden">
                <div class="col-lg-6">
                    <input type="text" class="form-control datepicker" name="date"  required>
                </div>
                <div class="col-lg-6">
                    <input type="number" class="form-control" id="noOfDays" name="noOfDays" value='1' required/>
                </div>
            </div>
            <div class="leaveDate1">
                <div class="form-group">
                    <div class="col-lg-12 badge">
                        <div id="Datepicker1"  class="noVehi">
                            <div >
                                Vehicle is not available on this day.
                            </div>
                        </div>
                        <lable>Leave Date 1</lable>
                    </div> 
                </div>
                <div class="form-group  container-fluid">

                    <div class="col-lg-3 ">

                        <input type="text" id="leaveDatepicker1" class="form-control leaveDatepicker" readonly  name="lDate1"  style="padding: 0" required>
                    </div>
                    <div class="col-lg-2">
                        <label for="from1" class="control-label " style="padding: 0"><span class="badge">From</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select id="from1" name="from1" class="form-control" style="padding: 0"><!for leave date1 duty turn from-->
                            <option value="00">0000</option>
                            <option value="04">0400</option>
                            <option value="08">0800</option>
                            <option value="12" selected="selected">1200</option>
                            <option value="16">1600</option>
                            <option value="20">2000</option>
                        </select>
                    </div>
                    <div class="col-lg-1">
                        <label for="to1" class="control-label" style="padding: 0;" ><span class="badge">To</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select id="to1" name="to1" class="form-control" style="padding: 0"><!for leave date1 duty turn from-->
                            <option value="24" selected="selected">2400</option>
                            <option value="04">0400</option>
                            <option value="08">0800</option>
                            <option value="12">1200</option>
                            <option value="16">1600</option>
                            <option value="20">2000</option>
                        </select>
                    </div>
                    <div class=" btn-group col-lg-2">
                        <input type='button' class="btn btn-success" value='Next Day' onclick="showNextDate(1)" style="padding: 0"/>
                    </div>
                </div>
            </div>
            <div hidden  class="leaveDate2">
                <div class="form-group container-fluid ">
                    <div class="form-group">
                        <div class="col-lg-12 badge">
                            <div id="Datepicker2"  class="noVehi">
                                <div >
                                    Vehicle is not available on this day.
                                </div>
                            </div>
                            <lable>Leave Date 2</lable>
                        </div>
                    </div>
                    <div class="col-lg-3 ">
                        <input type="text" id="leaveDatepicker2" class="form-control leaveDatepicker" readonly name="lDate2"  style="padding: 0" required>
                    </div>
                    <div class="col-lg-2">
                        <label for="from2" class="control-label " style="padding: 0"><span class="badge">From</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select id="from2" name="from2" class="form-control" style="padding: 0"><!for leave date1 duty turn from-->
                            <option value="00" selected="selected">0000</option>
                            <option value="04">0400</option>
                            <option value="08">0800</option>
                            <option value="12">1200</option>
                            <option value="16">1600</option>
                            <option value="20">2000</option>
                        </select>
                    </div>
                    <div class="col-lg-1">
                        <label for="to2" class="control-label" style="padding: 0;" ><span class="badge">To</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select id="to2" name="to2" class="form-control" style="padding: 0">
                            <option value="24" selected="selected">2400</option>
                            <option value="04">0400</option>
                            <option value="08">0800</option>
                            <option value="12">1200</option>
                            <option value="16">1600</option>
                            <option value="20">2000</option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <input type='button' class="btn btn-success" value='Next Day' onclick="showNextDate(2)" style="padding: 0"/>
                    </div>
                </div>
            </div>
            <div hidden class="leaveDate3">
                <div class="form-group container-fluid" >
                    <div class="form-group">
                        <div class="col-lg-12 badge">
                            <div id="Datepicker3"  class="noVehi">
                                <div >
                                    Vehicle is not available on this day.
                                </div>
                            </div>
                            <lable>Leave Date 3</lable>
                        </div>
                    </div>
                    <div class="col-lg-3 ">
                        <input type="text" id="leaveDatepicker3" class="form-control leaveDatepicker" readonly name="lDate3" style="padding: 0" required>
                    </div>
                    <div class="col-lg-2">
                        <label for="from3" class="control-label" style="padding: 0"><span class="badge">From</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select id="from3" name="from3" class="form-control" style="padding: 0"><!for leave date1 duty turn from-->
                            <option value="00" selected="selected">0000</option>
                            <option value="04">0400</option>
                            <option value="08">0800</option>
                            <option value="12">1200</option>
                            <option value="16">1600</option>
                            <option value="20">2000</option>
                        </select>
                    </div>
                    <div class="col-lg-1">
                        <label for="to3" class="control-label" style="padding: 0;" ><span class="badge">To</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select id="to3" name="to3" class="form-control" style="padding: 0"><!for leave date1 duty turn from-->
                            <option value="24">2400</option>
                            <option value="04">0400</option>
                            <option value="08">0800</option>
                            <option value="12" selected="selected">1200</option>
                            <option value="16">1600</option>
                            <option value="20">2000</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="text-right col-lg-12">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-success addButton">Add&nbsp;<span class="glyphicon glyphicon-plus"></span></button>
                        <button type="reset"  class="btn btn-warning reset">Refresh&nbsp;<span class="glyphicon glyphicon-refresh"></span></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-7">
        <div class="row well">
            <div id="leave_wrapper" class="form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-lg-12">
                        <table id="leave" class="table table-striped table-bordered " cellspacing="0" width="100%" role="grid">
                            <thead>
                                <tr role="row">
                                    <th   rowspan="1" colspan="1"  >Applicant</th>
                                    <th    rowspan="1" colspan="1" >Date</th>
                                    <th    rowspan="1" colspan="1">Covering</th>
                                    <th    rowspan="1" colspan="1">Leave No.</th>
                                    <th class="no-sort"  rowspan="1" colspan="1" >View</th>
                                    <th class="no-sort"  rowspan="1" colspan="1" >Delete</th></tr>
                            </thead>
                            <tbody><?php
                                foreach ($this->leaveList as $key => $value) {
                                    echo '<tr>';
                                    echo '<td>' . $value['name'][0] . '</td>';
                                    echo '<td>' . $value['lDate1'] . ', ' . $value['lDate2'] . ', ' . $value['lDate3'] . '</td>';
                                    echo '<td>' . $value['name'][1] . '</td>';
                                    echo '<td>' . $value['lNumber'] . '</td>';
                                    echo '<td style="text-align: center;"><a href=" ' . URL . 'leave/view/' . $value['leaveId'] .'/'.$value['applicant']. ' "><span class="glyphicon glyphicon-eye-open" style="color:blue; text-align: center"></span>';
                                    echo '<td style="text-align: center;"><a href=" ' . URL . 'leave/Delete/' . $value['leaveId'] . ' " class="deleteButton"><span class="glyphicon glyphicon-trash" style="color:red"></td>';
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

