<div id="pagesBackgorund" class="row container-fluid">
    <div class="col-lg-12">
        <lable class="lead">Duty Exchange Application</lable>
    </div> 
    <form method="post" id="exForm" class="form-horizontal" action="<?php echo URL; ?>exchange/create" >
        <div class="col-lg-6 well">
            <div hidden>
                <div class="col-lg-6 form-group">
                    <input type="text"  class="form-control exDatepicker" name="date"  required>
                </div>
                <div class="form-group col-lg-6">
                    <input type="number" class="form-control" id="noOfDays" name="noOfDays" value='1' required/>
                </div>
            </div>
            <!------------------------------Applicant 1------------------------------------------->
            <div class="form-group">
                <div class="col-lg-4 ">
                    <label for="applicant1" class="control-label "><span class="badge">Applicant 1</span></label>
                </div>
                <div class="col-lg-8">
                    <select id="applicant1" name="applicant1" class="form-control" required>
                        <option value=""  selected>-- Select Name --</option> 
                        <?php
                        //getting employe names from user table
                        foreach ($this->userList as $key => $value) {
                            echo '<option value=' . $value['serviceNumber'] . '>' . $value['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <!--------- Applicant 1 -- exDate1 --------------->
            <div class="exDate1">
                <div class="form-group">
                    <div class="col-lg-12 badge">
                        <div id="Datepicker1"  class="noVehi">
                                <div >
                                    Vehicle is not available on this day.
                                </div>
                            </div>
                        <lable>Applicant 1 Exchange Date 1</lable>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-4 ">
                        <input type="text" id="exDatepicker1" class="form-control exDatepicker" readonly id="exDate13" name="exDate11" style="padding: 0" >
                    </div>
                    <div class="col-lg-1">
                        <label for="exDate11From" class="control-label " style="padding: 0"><span class="badge">From</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select id="exDate11From" name="exDate11From" class="form-control" style="padding: 0">
                            <option value="00">0000</option>
                            <option value="04">0400</option>
                            <option value="08">0800</option>
                            <option value="12" selected="selected">1200</option>
                            <option value="16">1600</option>
                            <option value="20">2000</option>
                        </select>
                    </div>
                    <div class="col-lg-1">
                        <label for="exDate11To" class="control-label" style="padding: 0;" ><span class="badge">To</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select id="exDate11To" name="exDate11To" class="form-control" style="padding: 0">
                            <option value="24" selected="selected">2400</option>
                            <option value="04">0400</option>
                            <option value="08">0800</option>
                            <option value="12">1200</option>
                            <option value="16">1600</option>
                            <option value="20">2000</option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <input type='button'class="btn btn-success" value='Next Day' onclick="showNextDate(1)" style="padding: 0"/>
                    </div>
                </div>
            </div>
            <!--------- Applicant 1 -- exDate2 --------------->
            <div class="exDate2" hidden>
                <div class="form-group">
                    <div class="col-lg-12 badge">
                        <div id="Datepicker2"  class="noVehi">
                                <div >
                                    Vehicle is not available on this day.
                                </div>
                            </div>
                        <lable>Applicant 1 Exchange Date 2</lable>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-4">
                        <input type="text" id="exDatepicker2" class="form-control exDatepicker" readonly id="exDate12" name="exDate12" style="padding: 0">
                    </div>
                    <div class="col-lg-1">
                        <label for="exDate12From" class="control-label " style="padding: 0"><span class="badge">From</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select id="exDate12From" name="exDate12From" class="form-control" style="padding: 0">
                            <option value="00" selected="selected">0000</option>
                            <option value="04">0400</option>
                            <option value="08">0800</option>
                            <option value="12">1200</option>
                            <option value="16">1600</option>
                            <option value="20">2000</option>
                        </select>
                    </div>
                    <div class=" col-lg-1">
                        <label for="exDate12To" class="control-label" style="padding: 0;" ><span class="badge">To</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select id="exDate12To" name="exDate12To" class="form-control" style="padding: 0">
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
            <!--------- Applicant 1 -- exDate3 --------------->
            <div class="exDate3" hidden>
                <div class="form-group">
                    <div class="col-lg-12 badge">
                        <div id="Datepicker3"  class="noVehi">
                                <div >
                                    Vehicle is not available on this day.
                                </div>
                            </div>
                        <lable>Applicant 1 Exchange Date 3</lable>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-4">
                        <input type="text" id="exDatepicker3" class="form-control exDatepicker" readonly id="exDate13" name="exDate13" style="padding: 0" >
                    </div>
                    <div class="col-lg-1">
                        <label for="exDate13From" class="control-label " style="padding: 0"><span class="badge">From</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select id="exDate13From" name="exDate13From" class="form-control" style="padding: 0">
                            <option value="00" selected="selected">0000</option>
                            <option value="04">0400</option>
                            <option value="08">0800</option>
                            <option value="12">1200</option>
                            <option value="16">1600</option>
                            <option value="20">2000</option>
                        </select>
                    </div>
                    <div class="col-lg-1">
                        <label for="exDate13To" class="control-label" style="padding: 0;" ><span class="badge">To</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select id="exDate13To" name="exDate13To" class="form-control" style="padding: 0">
                            <option value="24">2400</option>
                            <option value="04">0400</option>
                            <option value="08">0800</option>
                            <option value="12" selected="selected">1200</option>
                            <option value="16">1600</option>
                            <option value="20">2000</option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <!-- -->
                    </div>
                </div>
            </div>
        </div>

        <!------------------------------Applicant 2------------------------------------------->
        <div class="col-lg-6 well">
            <div class="form-group">
                <div class="col-lg-4 ">
                    <label for="applicant2" class="control-label "><span class="badge">Applicant 2</span></label>
                </div>
                <div class="col-lg-8">
                    <select id="applicant2" name="applicant2" class="form-control" required>
                        <option value=""  selected>-- Select Name --</option> 
                        <?php
                        //getting employe names from user table
                        foreach ($this->userList as $key => $value) {
                            echo '<option value=' . $value['serviceNumber'] . '>' . $value['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <!--------- Applicant 2 -- exDate1 --------------->
            <div class="form-group">
                <div class="col-lg-12 badge">
                    <div id="Datepicker4"  class="noVehi">
                                <div >
                                    Vehicle is not available on this day.
                                </div>
                            </div>
                    <lable>Applicant 2 Exchange Date 1</lable>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-4 ">
                    <input type="text" id="exDatepicker4" class="form-control exDatepicker" readonly id="exDate21" name="exDate21" style="padding: 0" required>
                </div>
                <div class="col-lg-1">
                    <label for="exDate21From" class="control-label " style="padding: 0"><span class="badge">From</span></label>
                </div>
                <div class="col-lg-2">
                    <select id="exDate21From" name="exDate21From" class="form-control" style="padding: 0">
                        <option value="00">0000</option>
                        <option value="04">0400</option>
                        <option value="08">0800</option>
                        <option value="12" selected="selected">1200</option>
                        <option value="16">1600</option>
                        <option value="20">2000</option>
                    </select>
                </div>
                <div class="col-lg-1">
                    <label for="exDate21To" class="control-label" style="padding: 0;" ><span class="badge">To</span></label>
                </div>
                <div class="col-lg-2">
                    <select id="exDate21To" name="exDate21To" class="form-control" style="padding: 0">
                        <option value="24" selected="selected">2400</option>
                        <option value="04">0400</option>
                        <option value="08">0800</option>
                        <option value="12">1200</option>
                        <option value="16">1600</option>
                        <option value="20">2000</option>
                    </select>
                </div>
                <div class="col-lg-2">
                    <input type='button'class="btn btn-success" value='Next Day' onclick="showNextDate(1)" style="padding: 0"/>
                </div>
            </div>
            <!--------- Applicant 2 -- exDate2 --------------->
            <div class="exDate2" hidden>
                <div class="form-group">
                    <div class="col-lg-12 badge">
                        <div id="Datepicker5"  class="noVehi">
                                <div >
                                    Vehicle is not available on this day.
                                </div>
                            </div>
                        <lable>Applicant 2 Exchange Date 2</lable>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-4">
                        <input type="text" id="exDatepicker5" class="form-control exDatepicker" readonly id="exDate22" name="exDate22" style="padding: 0" >
                    </div>
                    <div class="col-lg-1">
                        <label for="exDate22From" class="control-label " style="padding: 0"><span class="badge">From</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select id="exDate22From" name="exDate22From" class="form-control" style="padding: 0">
                            <option value="00" selected="selected">0000</option>
                            <option value="04">0400</option>
                            <option value="08">0800</option>
                            <option value="12">1200</option>
                            <option value="16">1600</option>
                            <option value="20">2000</option>
                        </select>
                    </div>
                    <div class=" col-lg-1">
                        <label for="exDate22To" class="control-label" style="padding: 0;" ><span class="badge">To</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select id="exDate22To" name="exDate22To" class="form-control" style="padding: 0">
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
            <!--------- Applicant 2 -- exDate3 --------------->
            <div class="exDate3" hidden>
                <div class="form-group">
                    <div class="col-lg-12 badge">
                        <div id="Datepicker6"  class="noVehi">
                                <div >
                                    Vehicle is not available on this day.
                                </div>
                            </div>
                        <lable>Applicant 2 Exchange Date 3</lable>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-4">
                        <input type="text" id="exDatepicker6" class="form-control exDatepicker" readonly id="exDate23" name="exDate23" style="padding: 0" >
                    </div>
                    <div class="col-lg-1">
                        <label for="exDate23From" class="control-label " style="padding: 0"><span class="badge">From</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select id="exDate23From" name="exDate23From" class="form-control" style="padding: 0">
                            <option value="00" selected="selected">0000</option>
                            <option value="04">0400</option>
                            <option value="08">0800</option>
                            <option value="12">1200</option>
                            <option value="16">1600</option>
                            <option value="20">2000</option>
                        </select>
                    </div>
                    <div class="col-lg-1">
                        <label for="exDate23To" class="control-label" style="padding: 0;" ><span class="badge">To</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select id="exDate23To" name="exDate23To" class="form-control" style="padding: 0">
                            <option value="24">2400</option>
                            <option value="04">0400</option>
                            <option value="08">0800</option>
                            <option value="12" selected="selected">1200</option>
                            <option value="16">1600</option>
                            <option value="20">2000</option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <!-- -->
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group well">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-4">
                <label for="exNumber" class="control-label " style="float: right"><span class="badge">Duty Exchange Number</span></label>
            </div>
            <div class="col-lg-1">
                <input type="number" id="exNumber" name="exNumber" class="form-control" required/>
            </div>
            <div class="text-left col-lg-5">
                <div class="btn-group">
                    <button type="submit" class="btn btn-success addButton">Add&nbsp;<span class="glyphicon glyphicon-plus"></span></button>
                    <button type="reset"  class="btn btn-warning reset">Refresh&nbsp;<span class="glyphicon glyphicon-refresh"></span></button>
                </div>
            </div>
        </div>
    </form>

</div>
<div class="row well">
    <div id="exchange_wrapper" class="form-inline dt-bootstrap">
        <div class="row">
            <div class="col-lg-12">
                <table id="exchange" class="table table-striped table-bordered " cellspacing="0" width="100%" role="grid">
                    <thead>
                        <tr role="row">
                            <th   rowspan="1" colspan="1" >Applicant 1</th>
                            <th   rowspan="1" colspan="1"  >Date</th>
                            <th   rowspan="1" colspan="1" >Applicant 2</th>
                            <th   rowspan="1" colspan="1" >Date</th>
                            <th   rowspan="1" colspan="1">Number</th>
                            <th class="no-sort"  rowspan="1" colspan="1" >View</th>
                            <th class="no-sort"  rowspan="1" colspan="1" >Delete</th></tr>
                    </thead>
                    <tbody><?php
                        foreach ($this->exchangeList as $key => $value) {
                            echo '<tr>';
                            echo '<td>' . $value['name'][0] . '</td>';
                            echo '<td>' . $value['exDate11'] . ', ' . $value['exDate12'] . ', ' . $value['exDate13'] . '</td>';
                            echo '<td>' . $value['name'][1] . '</td>';
                            echo '<td>' . $value['exDate21'] . ', ' . $value['exDate22'] . ', ' . $value['exDate23'] . '</td>';
                            echo '<td>' . $value['exNumber'] . '</td>';
                            echo '<td style="text-align: center;"><a href=" ' . URL . 'exchange/view/' . $value['exchangeId'] . ' "><span class="glyphicon glyphicon-eye-open" style="color:blue; text-align: center"></span>';
                            echo '<td style="text-align: center;"><a href=" ' . URL . 'exchange/Delete/' . $value['exchangeId'] . ' " class="deleteButton"><span class="glyphicon glyphicon-trash" style="color:red"></td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
