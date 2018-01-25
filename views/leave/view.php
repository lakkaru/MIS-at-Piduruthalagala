<div id="pagesBackgorund" class="row container-fluid">
    <div class="col-lg-5 well">     
        <div class="col-lg-12">   
            <legend class="lead">Applied Leave Information</legend>
        </div> 
        <form method="post" class="form-horizontal" action="" >
            <div class="form-group">
                <div class="col-lg-4 ">
                    <label for="applicant" class="control-label "><span class="badge">Applicant</span></label>
                </div>
                <div class="col-lg-8">
                    <select name="applicant" class="form-control"  readonly><!for leave date1 duty turn from-->
                        <?php
                        //getting applicant name
                        echo '<option value="' . $this->leave[0][serviceNumber][1] . '" selected="selected">' . $this->leave[0][name][0] . '</option>';
                        ?>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-lg-4 ">
                    <label for="lType" class="control-label "><span class="badge">Leave Type</span></label>
                </div>
                <div class="col-lg-8">
                    <select id="lType" name="lType" class="form-control" readonly style="padding: 0" required>
                        <?php
                        
                        echo '<option>' . $this->leave[0][lType] . '</option>';
                        ?>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-lg-4 ">
                    <label for="covering" class="control-label"><span class="badge">Duty Covered By</span></label>
                </div>
                <div class="col-lg-8">
                    <select name="covering" class="form-control"  readonly ><!for leave date1 duty turn from-->
                        <?php
                        //getting covering officer name
                        echo '<option value="' . $this->leave[0][serviceNumber][2] . '" selected="selected">' . $this->leave[0][name][1] . '</option>';
                        ?>
                    </select>
                </div>
            </div>
             <div class="form-group">
                <div class="col-lg-4 ">
                    <label for="noOfLeaveDays" class="control-label "><span class="badge">No of Days</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="number" id="noOfLeaveDays" class="form-control" readonly name="noOfLeaveDays" style="width: 100px" value="<?php echo $this->leave[0]['lNumber']?>"/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-4 ">
                    <label for="lNumber" class="control-label "><span class="badge">Leave Number</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="number" class="form-control"  readonly name="lNumber" style="width: 100px" value="<?php echo $this->leave[0]['lNumber']; ?>" />
                </div>
            </div>
            
            <div id="leaveDate1">
                <div class="form-group">
                    <div class="col-lg-12 badge">
                        <lable>Leave Date 1</lable>
                    </div> 
                </div>
                <div class="form-group  container-fluid">
                    <div class="col-lg-3 ">
                        <input type="text" class="form-control"  readonly id="lDate1" name="lDate1" readonly value='<?php echo $this->leave[0]['lDate1'] ?>' style="padding: 0" >
                    </div>
                    <div class="col-lg-2">
                        <label for="from1" class="control-label " style="padding: 0"><span class="badge">From</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select name="from1" class="form-control"  readonly style="padding: 0"><!for leave date1 duty turn from-->
                            <option value="" selected="selected"><?php echo $this->leave[0]['from1'] ?></option>
                        </select>
                    </div>
                    <div class="col-lg-1">
                        <label for="to1" class="control-label" style="padding: 0;" ><span class="badge">To</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select name="to1" class="form-control"  readonly style="padding: 0"><!for leave date1 duty turn from-->
                            <option value="" selected="selected"><?php echo $this->leave[0]['to1'] ?></option>
                        </select>
                    </div>
                    <div class=" btn-group col-lg-2">
                    </div>
                </div>
            </div>
            <div>
                <div class="form-group container-fluid ">
                    <div class="form-group">
                        <div class="col-lg-12 badge">
                            <lable>Leave Date 2</lable>
                        </div>
                    </div>
                    <div class="col-lg-3 ">
                        <input type="text" class="form-control"  readonly id="lDate1" name="lDate1" readonly value='<?php echo $this->leave[0]['lDate2'] ?>' style="padding: 0" >
                    </div>
                    <div class="col-lg-2">
                        <label for="from2" class="control-label " style="padding: 0"><span class="badge">From</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select name="from2" class="form-control"  readonly style="padding: 0"><!for leave date1 duty turn from-->
                            <option value="" selected="selected"><?php echo $this->leave[0]['from2'] ?></option>
                        </select>
                    </div>
                    <div class="col-lg-1">
                        <label for="to2" class="control-label" style="padding: 0;" ><span class="badge">To</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select name="to2" class="form-control"  readonly style="padding: 0"><!for leave date1 duty turn from-->
                            <option value="" selected="selected"><?php echo $this->leave[0]['to2'] ?></option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                    </div>
                </div>
            </div>
            <div>
                <div class="form-group container-fluid" >
                    <div class="form-group">
                        <div class="col-lg-12 badge">
                            <lable>Leave Date 3</lable>
                        </div>
                    </div>
                    <div class="col-lg-3 ">
                        <input type="text" class="form-control"  readonly id="lDate1" name="lDate1" readonly value='<?php echo $this->leave[0]['lDate3'] ?>' style="padding: 0" >
                    </div>
                    <div class="col-lg-2">
                        <label for="from3" class="control-label" style="padding: 0"><span class="badge">From</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select name="from3" class="form-control"  readonly style="padding: 0"><!for leave date1 duty turn from-->
                            <option value="" selected="selected"><?php echo $this->leave[0]['from3'] ?></option>
                        </select>
                    </div>
                    <div class="col-lg-1">
                        <label for="to3" class="control-label" style="padding: 0;" ><span class="badge">To</span></label>
                    </div>
                    <div class="col-lg-2">
                        <select name="to3" class="form-control"  readonly style="padding: 0"><!for leave date1 duty turn from-->
                            <option value="" selected="selected"><?php echo $this->leave[0]['to3'] ?></option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="text-right col-lg-12">
                    <div id="addUserGroup" class="form-group" role="group" >
                        <a href="<?php echo URL . 'leave'; ?>" ><span class="glyphicon glyphicon-backward" ></span>&nbsp;Back&nbsp;<span class="glyphicon glyphicon-backward" ></span></a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-7 well">
        <div class="col-lg-12" style="text-align: center">
            <h3 style="text-decoration: underline">Leave summery of <?php echo $this->leave[0]['name'][0]?> on year <?php echo $year=date('Y') ?>.</h3>
        </div>
        <!--for leave count hidden display-->
        <div hidden>
            <lable id="casual"><?php echo $this->noOfLeaveTypes['casual'] ?></lable>
            <lable id="vacation"><?php echo $this->noOfLeaveTypes['vacation'] ?></lable>
            <lable id="medical"><?php echo $this->noOfLeaveTypes['medical'] ?></lable>
        </div>
        <div class="col-lg-12">
        <div id="casual_div" class="col-lg-4" style="  margin: 0 auto;"></div>
        <div id="vaccation_div" class="col-lg-4" style="   margin: 0 auto;"></div>
        <div id="medical_div" class="col-lg-4" style="  margin: 0 auto;"></div>
        </div>
    </div>
</div>


