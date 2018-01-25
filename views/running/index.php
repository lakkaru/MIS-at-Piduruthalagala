<div class='row'>
    <div class="col-lg-4 well">
        <form method="post" class="form-horizontal" action="<?php echo URL; ?>running/ruRunning" >
            <div class="container-fluid">
                <div class="col-lg-12">
                    <legend class='lead'>Rupavahini Running Hours Reading</legend>
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-3">
                    <label for="rdate" class="control-label"><span class="badge">Date</span></label>
                </div>
                <div class="col-lg-4">
                    <input type="text" id="rdate" class="form-control datepicker" name="date" required/>
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-3">
                    <label for="rhours" class="control-label "><span class="badge">Hours</span></label>
                </div>
                <div class="col-lg-5">
                    <input type="number" id="rhours" class="form-control" name="hours" min="0" required value="<?php echo ($this->ruRunningLast[0]['hours'])+21; ?>"/>
                </div>
            </div>
            <div class="form-group" >
                <div class=" col-lg-3">
                    <label for="rminutes" class="control-label"><span class="badge">Minutes</span></label>
                </div>
                <div class="col-lg-5">
                    <input type="number" id="rminutes" class="form-control" name="minutes" min="0" max="59" readonly value="0"/>
                    <!--<textarea class="form-control" name="notice"></textarea>-->
                </div>
            </div>
            <div class="form-group">
                <div class="text-right col-lg-12">
                    <div class="btn-group">
                        <button type="submit" id="ruRunningAdd" class="btn btn-success">Add&nbsp;<span class="glyphicon glyphicon-plus"></span></button>
                        <button type="reset"  class="btn btn-warning reset">Refresh&nbsp;<span class="glyphicon glyphicon-refresh"></span></button>
                    </div>
                </div>
            </div>
        </form>
        <!--    <div class="form-group">
                <div class="text-right col-lg-9">
                    <a href="<?php echo URL . ''; ?>" ><span class="glyphicon glyphicon-filter" ></span>&nbsp;Running Hours Report&nbsp;<span class="glyphicon glyphicon-filter" ></span></a>
                </div>
            </div>-->
        <div  class="dataTables_wrapper form-inline dt-bootstrap" style="padding: 0">
            <div class="row">
                <div class="col-lg-12">
                    <table  class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" >
                        <thead>
                            <tr role="row">
                                <th   rowspan="1" colspan="1">Date</th>
                                <th class="no-sort"  rowspan="1" colspan="1" >Hours</th>
                                <!--<th class="no-sort"  rowspan="1" colspan="1">Minutes</th>-->
                                <th style="text-align: center;"  class="no-sort"  rowspan="1" colspan="1">Edit</th>
                                <th style="text-align: center;"  class="no-sort"  rowspan="1" colspan="1">Delete</th></tr>
                        </thead>
                        <tbody><?php
                            foreach ($this->ruRunningList as $key => $value) {
                                echo '<tr>';
                                echo '<td>' . $value['date'] . '</td>';
                                // echo '<td>' . $value['equipment'] . '</td>';
                                echo '<td>' . $value['hours'] . '</td>';
//                                echo '<td>' . $value['minutes'] . '</td>';
                                echo '<td style="text-align: center;"><a href=" ' . URL . 'running/edit/' . $value['runningId'] . '/rurunning "><span class="glyphicon glyphicon-edit" style="color:blue; text-align: center"></span>';
                                echo '<td style="text-align: center;"><a href=" ' . URL . 'running/Delete/' . $value['runningId'] . '/rurunning " class="deleteButton"><span class="glyphicon glyphicon-trash" style="color:red"></td>';
                                echo '</tr>';
                            
                                $rurunning=$value['date'];
                            }
                            
                            ?></tbody>
                    </table>
                </div>
            </div>   
        </div>
    </div>
    <div class="col-lg-4 well">
        <form method="post" class="form-horizontal" name='eyeruning' action="<?php echo URL; ?>running/eyeRunning">
            <div >
                <div class="col-lg-12">
                    <legend class='lead'>Eye Running Hours Reading</legend>
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-3">
                    <label for="edate" class="control-label"><span class="badge">Date</span></label>
                </div>
                <div class="col-lg-4">
                    <input type="text" id="edate" class="form-control datepicker" name="date" required>
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-3">
                    <label for="ehours" class="control-label"><span class="badge">Hours</span></label>
                </div>
                <div class="col-lg-5">
                    <input type="number" id="ehours" class="form-control" name="hours" min="0" required value="<?php echo ($this->eyeRunningLast[0]['hours'])+18; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-3">
                    <label for="eminutes" class="control-label"><span class="badge">Minutes</span></label>
                </div>
                <div class="col-lg-5">
                    <input type="number" id="eminutes" class="form-control" name="minutes" min="0" max="59" readonly value="0">
                </div>
            </div>
            <div class="form-group">
                <div class="text-right col-lg-12">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-success">Add&nbsp;<span class="glyphicon glyphicon-plus"></span></button>
                        <button type="reset"  class="btn btn-warning reset">Refresh&nbsp;<span class="glyphicon glyphicon-refresh"></span></button>
                    </div>
                </div>
            </div>
        </form>
        <!--    <div class="form-group">
                <div class="text-right col-lg-9">
                    <a href="<?php echo URL . ''; ?>" ><span class="glyphicon glyphicon-filter" ></span>&nbsp;Running Hours Report&nbsp;<span class="glyphicon glyphicon-filter" ></span></a>
                </div>
            </div>-->
<!--        <div class="panel">
        <div class="panel panel-heading">Test</div>
        <div class="panel panel-body">-->
            <div   class="container-fluid dataTables_wrapper form-inline dt-bootstrap" style="padding: 0">
                <div class="row">
                    <div class="col-lg-12">
                        <table  class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" >
                            <thead>
                                <tr role="row">
                                    <th   rowspan="1" colspan="1">Date</th>
                                    <th class="no-sort"  rowspan="1" colspan="1">Hours</th>
                                    <!--<th class="no-sort"  rowspan="1" colspan="1">Minutes</th>-->
                                    <th style="text-align: center;" class="no-sort"  rowspan="1" colspan="1">Edit</th>
                                    <th style="text-align: center;" class="no-sort"  rowspan="1" colspan="1">Delete</th></tr>
                            </thead>
                            <tbody><?php
                                foreach ($this->eyeRunningList as $key => $value) {
                                    echo '<tr>';
                                    echo '<td>' . $value['date'] . '</td>';
                                    // echo '<td>' . $value['equipment'] . '</td>';
                                    echo '<td>' . $value['hours'] . '</td>';
//                                    echo '<td>' . $value['minutes'] . '</td>';
                                    echo '<td style="text-align: center;"><a href=" ' . URL . 'running/edit/' . $value['runningId'] . '/eyerunning "><span class="glyphicon glyphicon-edit" style="color:blue; text-align: center"></span>';
                                    echo '<td style="text-align: center;"><a href=" ' . URL . 'running/Delete/' . $value['runningId'] . '/eyerunning " class="deleteButton"><span class="glyphicon glyphicon-trash" style="color:red"></td>';
                                    echo '</tr>';
                                }
                                ?></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <!--    </div>
        </div>-->

    <div class="col-lg-4 well">
        <form method="post" class="form-horizontal" name='genruning' action="<?php echo URL; ?>running/genRunning">
            <div >
                <div class=" col-lg-12">
                    <legend class='lead'>Generator Running Hours Reading</legend>
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-3">
                    <label for="gdate" class="control-label"><span class="badge">Date</span></label>
                </div>
                <div class=" col-lg-4">
                    <input type="text" id="gdate" class="form-control datepicker" name="date" required>
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-3">
                    <label for="ghours" class="control-label"><span class="badge">Hours</span></label>
                </div>
                <div class="col-lg-5">
                    <input type="number" id="ghours" class="form-control" name="hours" min="0" required value="<?php echo ($this->genRunningLast[0]['hours']); ?>">
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-3">
                    <label for="gminutes" class="control-label"><span class="badge">Minutes</span></label>
                </div>
                <div class="col-lg-5">
                    <input type="number" id="gminutes" class="form-control" name="minutes" min="0" max="59" required value="<?php echo ($this->genRunningLast[0]['minutes']); ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="text-right col-lg-12">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-success">Add&nbsp;<span class="glyphicon glyphicon-plus"></span></button>
                        <button type="reset"  class="btn btn-warning reset">Refresh&nbsp;<span class="glyphicon glyphicon-refresh"></span></button>
                    </div>
                </div>
            </div>
        </form>
        <!--    <div class="form-group">
                <div class="text-right col-lg-9">
                    <a href="<?php echo URL . ''; ?>" ><span class="glyphicon glyphicon-filter" ></span>&nbsp;Running Hours Report&nbsp;<span class="glyphicon glyphicon-filter" ></span></a>
                </div>
            </div>-->
        <div  class="container-fluid dataTables_wrapper form-inline dt-bootstrap" style="padding: 0">
            <div class="row">
                <div class="col-lg-12">
                    <table  class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" >
                        <thead>
                            <tr role="row">
                                <th class="sorting_desc"  rowspan="1" colspan="1">Date</th>
                                <th class="no-sort"  rowspan="1" colspan="1">Hours</th>
                                <th class="no-sort"  rowspan="1" colspan="1">Minutes</th>
                                <th style="text-align: center;" class="no-sort"  rowspan="1" colspan="1">Edit</th>
                                <th style="text-align: center;" class="no-sort"  rowspan="1" colspan="1">Delete</th></tr>
                        </thead>
                        <tbody><?php
                            foreach ($this->genRunningList as $key => $value) {
                                echo '<tr>';
                                echo '<td>' . $value['date'] . '</td>';
                                // echo '<td>' . $value['equipment'] . '</td>';
                                echo '<td>' . $value['hours'] . '</td>';
                                echo '<td>' . $value['minutes'] . '</td>';
                                echo '<td style="text-align: center;"><a href=" ' . URL . 'running/edit/' . $value['runningId'] . '/genrunning "><span class="glyphicon glyphicon-edit" style="color:blue; text-align: center"></span>';
                                echo '<td style="text-align: center;"><a href=" ' . URL . 'running/Delete/' . $value['runningId'] . '/genrunning " class="deleteButton"><span class="glyphicon glyphicon-trash" style="color:red"></td>';
                                echo '</tr>';
                            }
                            ?></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
