<div class="row" >
    <div class="col-lg-4" >
        <form method="post" class="form-horizontal well" action="<?php echo URL; ?>running/editSave/<?php echo $this->running[0]['runningId']; ?>/<?php echo $this->table ?>" >
            <div>
                <div class="col-lg-12">
                    <legend class='lead'>Edit <?php
                        switch ($this->table) {
                            case 'rurunning':
                                $tableName = 'Rupavahini';
                                $runningList = $this->ruRunningList;
                                break;
                            case 'eyerunning':
                                $tableName = 'Eye';
                                $runningList = $this->eyeRunningList;
                                break;
                            case 'genrunning':
                                $tableName = 'Generator ';
                                $runningList = $this->genRunningList;
                                break;
                        }echo $tableName
                        ?> Running Hours</legend>
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="date" class="control-label"><span class="badge">Date</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="text" id="date" class="form-control datepicker " name="date" autofocus/>
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="hours" class="control-label "><span class="badge">Hours</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="number"id="hours" class="form-control" name="hours" required value="<?php echo $this->running[0]['hours']; ?>"/>
                </div>
            </div>
            
            <div class="form-group">
                <div class=" col-lg-4">
                    <label for="minutes" class="control-label "><span class="badge">Minutes</span></label>
                </div>
                <div class="col-lg-8">
                    <input type="number" id="minutes" class="form-control" name="minutes" min="0" max="59" required <?php if ($this->table == 'genrunning') {echo "value='".$this->running[0]['minutes']."'";}else{echo "value='0' readonly";} ?>/>
                </div>
            </div>
                    
            <div class="row form-group">
                <div class="text-right col-lg-12">
                    <div class="btn">
                        <button type="submit" class="btn btn-success">Edit <span class="glyphicon glyphicon-edit"></span></button>
                        <a href="<?php echo URL . 'running'; ?>" ><span class="glyphicon glyphicon-backward" ></span>&nbsp;Back&nbsp;<span class="glyphicon glyphicon-backward" ></span></a>
                    </div> 
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-8">
        <div   class="container-fluid dataTables_wrapper form-inline dt-bootstrap" style="padding: 0">
            <div class="col-lg-12">
                <table  class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" >
                    <thead>
                        <tr role="row">
                            <th   rowspan="1" colspan="1">Date</th>
                            <th class="no-sort"  rowspan="1" colspan="1">Hours</th>
                            <?php if ($this->table == 'genrunning') {
                            echo '<th class="no-sort"  rowspan="1" colspan="1">Minutes</th>';
                            }?>
                            <th style="text-align: center;" class="no-sort"  rowspan="1" colspan="1">Edit</th>
                            <th style="text-align: center;" class="no-sort"  rowspan="1" colspan="1">Delete</th></tr>
                    </thead>
                    <tbody><?php
//                    $tableName;
                        foreach ($runningList as $key => $value) {
                            echo '<tr>';
                            echo '<td>' . $value['date'] . '</td>';
                            // echo '<td>' . $value['equipment'] . '</td>';
                            echo '<td>' . $value['hours'] . '</td>';
                            if ($this->table == 'genrunning') {
                                echo '<td>' . $value['minutes'] . '</td>';
                            }
                            echo '<td style="text-align: center;"><a href=" ' . URL . 'running/edit/' . $value['runningId'] . '/' . $this->table . '"><span class="glyphicon glyphicon-edit" style="color:blue; text-align: center"></span>';
                            echo '<td style="text-align: center;"><a href=" ' . URL . 'running/Delete/' . $value['runningId'] . '/' . $this->table . ' " class="deleteButton"><span class="glyphicon glyphicon-trash" style="color:red"></td>';
                            echo '</tr>';
                        }
                        ?></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>