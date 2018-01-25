<div id="pagesBackgorund" class="row container-fluid">
    <div class="col-lg-12">
        <lable class="lead">Applied Duty Exchange</lable>
    </div> 
    <form method="post" class="form-horizontal" action="<?php echo URL; ?>exchange/create" >
        <div class="col-lg-6 well">
            <div hidden>
                <div class="col-lg-3 form-group">
                    <label for="date" class="control-label ">Date</label>
                </div>
                <div class="col-lg-3 form-group">
                    <input type="text" class="form-control datepicker " name="date"  required>
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
                    <select name="applicant1" class="form-control" readonly>
                        <option selected><?php echo $this->exchange[0]['name'][0]?></option> 
                    </select>
                </div>
            </div>
            <!--------- Applicant 1 -- exDate1 --------------->
            <div class="exDate1">
                <div class="form-group">
                    <div class="col-lg-12 badge">
                        <lable>Applicant 1 Exchange Date 1</lable>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-4 ">
                        <input type="text" class="form-control"readonly  value='<?php echo $this->exchange[0]['exDate11']?>' style="padding: 0" >
                    </div>
                    <div class="col-lg-1">
                        <label for="exDate11From" class="control-label " style="padding: 0"><span class="badge">From</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select name="exDate11From" class="form-control" readonly style="padding: 0"><!for leave date1 duty turn from-->
                           <option value="" selected="selected"><?php echo $this->exchange[0]['exDate11From']?></option>
                        </select>
                    </div>
                    <div class="col-lg-1">
                        <label for="exDate11To" class="control-label" style="padding: 0;" ><span class="badge">To</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select name="exDate11To" class="form-control" readonly style="padding: 0"><!for leave date1 duty turn from-->
                            <option value="" selected="selected"><?php echo $this->exchange[0]['exDate11To']?></option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <!--<input type='button'class="btn btn-success" value='Next Day' onclick="showNextDate(1)" style="padding: 0"/>-->
                    </div>
                </div>
            </div>
            <!--------- Applicant 1 -- exDate2 --------------->
            <div class="exDate2">
                <div class="form-group">
                    <div class="col-lg-12 badge">
                        <lable>Applicant 1 Exchange Date 2</lable>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-4">
                        <input type="text" class="form-control" readonly  value='<?php echo $this->exchange[0]['exDate12']?>' style="padding: 0" >
                    </div>
                    <div class="col-lg-1">
                        <label for="exDate12From" class="control-label " style="padding: 0"><span class="badge">From</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select name="exDate12From" class="form-control" readonly style="padding: 0">
                            <option value="" selected="selected"><?php echo $this->exchange[0]['exDate12From']?></option>
                        </select>
                    </div>
                    <div class=" col-lg-1">
                        <label for="exDate12To" class="control-label" style="padding: 0;" ><span class="badge">To</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select name="exDate12To" class="form-control" readonly style="padding: 0"><!for leave date1 duty turn from-->
                            <option value="" selected="selected"><?php echo $this->exchange[0]['exDate12To']?></option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <!--<input type='button' class="btn btn-success" value='Next Day' onclick="showNextDate(2)" style="padding: 0"/>-->
                    </div>
                </div>
            </div>
            <!--------- Applicant 1 -- exDate3 --------------->
            <div class="exDate3">
                <div class="form-group">
                    <div class="col-lg-12 badge">
                        <lable>Applicant 1 Exchange Date 1</lable>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-4">
                        <input type="text" class="form-control" readonly  value='<?php echo $this->exchange[0]['exDate13']?>' style="padding: 0" >
                    </div>
                    <div class="col-lg-1">
                        <label for="exDate13From" class="control-label " style="padding: 0"><span class="badge">From</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select name="exDate13From" class="form-control" readonly style="padding: 0">
                            <option value="" selected="selected"><?php echo $this->exchange[0]['exDate13From']?></option>
                        </select>
                    </div>
                    <div class="col-lg-1">
                        <label for="exDate13To" class="control-label" style="padding: 0;" ><span class="badge">To</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select name="exDate13To" class="form-control" readonly style="padding: 0"><!for leave date1 duty turn from-->
                            <option value="" selected="selected"><?php echo $this->exchange[0]['exDate13To']?></option>
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
                    <select name="applicant2" class="form-control" readonly>
                         <option selected><?php echo $this->exchange[0]['name'][1]?></option> 
                    </select>
                </div>
            </div>
            <!--------- Applicant 2 -- exDate1 --------------->
            <div class="form-group">
                <div class="col-lg-12 badge">
                    <lable>Applicant 2 Exchange Date 1</lable>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-4 ">
                    <input type="text" class="form-control"readonly  value='<?php echo $this->exchange[0]['exDate21']?>' style="padding: 0" >
                </div>
                <div class="col-lg-1">
                    <label for="exDate21From" class="control-label " style="padding: 0"><span class="badge">From</span></label>
                </div>
                <div class="col-lg-2">
                    <select name="exDate21From" class="form-control" readonly style="padding: 0">
                        <option value="" selected="selected"><?php echo $this->exchange[0]['exDate21From']?></option>
                    </select>
                </div>
                <div class="col-lg-1">
                    <label for="exDate21To" class="control-label" style="padding: 0;" ><span class="badge">To</span></label>
                </div>
                <div class="col-lg-2">
                    <select name="exDate21To" class="form-control" readonly style="padding: 0">
                       <option value="" selected="selected"><?php echo $this->exchange[0]['exDate21To']?></option>
                    </select>
                </div>
                <div class="col-lg-2">
                    <!--<input type='button'class="btn btn-success" value='Next Day' onclick="showNextDate(1)" style="padding: 0"/>-->
                </div>
            </div>
            <!--------- Applicant 2 -- exDate2 --------------->
            <div class="exDate2">
                <div class="form-group">
                    <div class="col-lg-12 badge">
                        <lable>Applicant 2 Exchange Date 2</lable>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-4">
                        <input type="text" class="form-control"readonly  value='<?php echo $this->exchange[0]['exDate22']?>' style="padding: 0" >
                    </div>
                    <div class="col-lg-1">
                        <label for="exDate22From" class="control-label " style="padding: 0"><span class="badge">From</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select name="exDate22From" class="form-control" readonly style="padding: 0"><!for leave date1 duty turn from-->
                           <option value="" selected="selected"><?php echo $this->exchange[0]['exDate22From']?></option>
                        </select>
                    </div>
                    <div class=" col-lg-1">
                        <label for="exDate22To" class="control-label" style="padding: 0;" ><span class="badge">To</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select name="exDate22To" class="form-control" readonly style="padding: 0"><!for leave date1 duty turn from-->
                           <option value="" selected="selected"><?php echo $this->exchange[0]['exDate22To']?></option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <!--<input type='button' class="btn btn-success" value='Next Day' onclick="showNextDate(2)" style="padding: 0"/>-->
                    </div>
                </div>
            </div>
            <!--------- Applicant 2 -- exDate3 --------------->
            <div class="exDate3">
                <div class="form-group">
                    <div class="col-lg-12 badge">
                        <lable>Applicant 2 Exchange Date 3</lable>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-4">
                        <input type="text" class="form-control" readonly  value='<?php echo $this->exchange[0]['exDate23']?>' style="padding: 0" >
                    </div>
                    <div class="col-lg-1">
                        <label for="exDate23From" class="control-label " style="padding: 0"><span class="badge">From</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select name="exDate23From" class="form-control" readonly style="padding: 0">
                            <option value="" selected="selected"><?php echo $this->exchange[0]['exDate23From']?></option>
                        </select>
                    </div>
                    <div class="col-lg-1">
                        <label for="exDate23To" class="control-label" style="padding: 0;" ><span class="badge">To</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select name="exDate23To" class="form-control" readonly style="padding: 0">
                           <option value="" selected="selected"><?php echo $this->exchange[0]['exDate23To']?></option>
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
                <input type="number" name="exNumber" class="form-control" readonly  value='<?php echo $this->exchange[0]['exNumber']?>'/>
            </div>
            <div class="text-left col-lg-5"> 
                <div class="text-left col-lg-12">
                    <div id="addUserGroup" class="form-group" role="group" >
                        <a href="<?php echo URL . 'exchange'; ?>" ><span class="glyphicon glyphicon-backward" ></span>&nbsp;Back&nbsp;<span class="glyphicon glyphicon-backward" ></span></a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


